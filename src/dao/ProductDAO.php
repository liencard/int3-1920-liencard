<?php

require_once( __DIR__ . '/DAO.php');

class ProductDAO extends DAO {

  public function selectAllProducts(){
    $sql = "
    SELECT `products`.*, MIN(`product_images`.`image`) AS `image` FROM `products`
      RIGHT JOIN `product_images` ON `products`.`id` = `product_images`.`product_id`
      GROUP BY `products`.`id`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // public function selectProductById($id) {
  //   $sql = "
  //     SELECT `products`.*, MIN(`product_images`.`image`) AS `image` FROM `products`
  //     RIGHT JOIN `product_images` ON `products`.`id` = `product_images`.`product_id`
  //     WHERE `products`.`id` = :id
  //     GROUP BY `products`.`id`
  //   ";
  //   $stmt = $this->pdo->prepare($sql);
  //   $stmt->bindValue(':id', $id);
  //   $stmt->execute();
  //   return $stmt->fetch(PDO::FETCH_ASSOC);
  // }

  public function selectProductById($id) {
    $sql = "
      SELECT `products`.*, `options`.`name`, `product_options`.`name`, `product_options`.`price`
	    FROM `products`
      RIGHT JOIN `product_images` ON `products`.`id` = `product_images`.`product_id`
      LEFT JOIN `options` ON `products`.`option_id` = `options`.`id`
      LEFT JOIN `product_options` ON `product_options`.`option_id` = `options`.`id`
      WHERE `products`.`id` = :id
    ";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectProductByType($type){
    $sql = "
    SELECT `products`.*, MIN(`product_images`.`image`) AS `image` FROM `products`
    RIGHT JOIN `product_images` ON `products`.`id` = `product_images`.`product_id`
    WHERE `type` = :type
    GROUP BY `products`.`id`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':type', $type);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // SELECTEERT BOEK & EXTRA
  public function selectTypes(){
    $sql = "SELECT DISTINCT `type` FROM `products` ORDER BY `type`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectOptionsById($id){
    $sql = "SELECT * FROM `products`
        INNER JOIN `product_options` ON `products`.`option_id` = `product_options`.`option_id`
		    WHERE `products`.`id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

   public function selectProductByOption($product, $option){
    $sql = "SELECT `products`.`title`, `products`.`tumbnail`, `products`.`subtitle`, `products`.`id`, `product_options`.`price`, `product_options`.`name`
      FROM `products`
      LEFT JOIN `options`
      ON `products`.`option_id` = `options`.`id`
      LEFT JOIN `product_options`
      ON `product_options`.`option_id` = `options`.`id`
      WHERE `products`.`id` = :product
      AND `product_options`.`id` = :option";

      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':product',$product);
      $stmt->bindValue(':option',$option);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectImagesById($id){
    $sql = "SELECT * FROM `products`
        INNER JOIN `product_images` ON `products`.`id` = `product_images`.`product_id`
		    WHERE `products`.`id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function delete($id){
    $sql = "DELETE FROM `todos` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    return $stmt->execute();
  }

  public function insert($data) {
    $errors = $this->validate( $data );
    if (empty($errors)) {
      $sql = "INSERT INTO `todos` (`created`, `modified`, `checked`, `text`) VALUES (:created, :modified, :checked, :text)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':created', $data['created']);
      $stmt->bindValue(':modified', $data['modified']);
      $stmt->bindValue(':checked', $data['checked']);
      $stmt->bindValue(':text', $data['text']);
      if ($stmt->execute()) {
        return $this->selectById($this->pdo->lastInsertId());
      }
    }
    return false;
  }

  public function validate( $data ){
    $errors = [];
    if (!isset($data['created'])) {
      $errors['created'] = 'Gelieve created in te vullen';
    }
    if (!isset($data['modified'])) {
      $errors['modified'] = 'Gelieve modified in te vullen';
    }
    if (!isset($data['checked'])) {
      $errors['checked'] = 'Gelieve checked in te vullen';
    }
    if (empty($data['text']) ){
      $errors['text'] = 'Gelieve een text in te vullen';
    }
    return $errors;
  }

}
