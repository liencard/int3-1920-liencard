<?php

require_once( __DIR__ . '/DAO.php');

class OrderDAO extends DAO {

  public function selectById($id){
    $sql = "SELECT * FROM `orders` WHERE `id`= :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectOrderById($id){
    $sql = "SELECT * FROM `orders_products` WHERE `id`=:id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function insertGegevens($data){
    $errors = $this->validateCheckout( $data );
    if (empty($errors)) {
      $sql = "INSERT INTO `orders` (`firstname`, `lastname`, `email`, `adres`, `housenumber`, `postcode`, `city`) VALUES (:firstname, :lastname, :email, :adres, :housenumber, :postcode, :city)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':firstname', $data['firstname']);
      $stmt->bindValue(':lastname', $data['lastname']);
      $stmt->bindValue(':email', $data['email']);
      $stmt->bindValue(':adres', $data['adres']);
      $stmt->bindValue(':housenumber', $data['housenumber']);
      $stmt->bindValue(':postcode', $data['postcode']);
      $stmt->bindValue(':city', $data['city']);
      if($stmt->execute()){
            return $this->selectById($this->pdo->lastInsertId());
        }
    }
   return false;
  }

public function insertOrder($data){
    $sql = "INSERT INTO `orders_products` (`order_id`, `product_id`, `quantity`) VALUES(:order_id,:product_id,:quantity)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':order_id',$data['order_id']);
    $stmt->bindValue(':product_id',$data['product_id']);
    $stmt->bindValue(':quantity',$data['quantity']);

    if($stmt->execute()){
        return $this->selectOrderById($this->pdo->lastInsertId());
    }
  }

public function validateCheckout($data){
    $errors = [];
    if (empty($data['firstname'])) {
      $errors['firstname'] = 'Gelieve je voornaam in te vullen';
    }
    if (empty($data['lastname'])) {
      $errors['lastname'] = 'Gelieve je familienaam in te vullen';
    }
    if (empty($data['email'])) {
      $errors['email'] = 'E-mail is verplicht';
    }
    if (empty($data['adres'])) {
      $errors['adres'] = 'Gelieve je straatnaam op te geven';
    }
    if (empty($data['housenumber'])) {
      $errors['housenumber'] = 'Gelieve je huisnummer op te geven';
    }
    if (empty($data['postcode'])) {
      $errors['postcode'] = 'Gelieve een postcode op te geven';
    }
    if (empty($data['city'])) {
      $errors['city'] = 'Gelieve een gemeente op te geven';
    }
    return $errors;
  }

}
