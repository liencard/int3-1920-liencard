<?php

require_once( __DIR__ . '/DAO.php');

class OrderDAO extends DAO {

  public function selectAllProducts(){
    $sql = "
    SELECT `products`.*, MIN(`product_images`.`image`) AS `image` FROM `products`
      RIGHT JOIN `product_images` ON `products`.`id` = `product_images`.`product_id`
      GROUP BY `products`.`id`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

}
