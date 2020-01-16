<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ProductDAO.php';
require_once __DIR__ . '/../dao/OrderDAO.php';

class OrdersController extends Controller {

  private $orderDAO;

  function __construct() {
    $this->productDAO = new ProductDAO();
    $this->orderDAO = new OrderDAO();
  }

  public function cart() {

    if (!empty($_POST['action'])) {
      if ($_POST['action'] == 'add') {
        $this->_handleAdd();
        $_SESSION['info'] = 'Je product werd toegevoegd!';
        header('Location: index.php');
        exit();
      }
      if ($_POST['action'] == 'empty') {
        $_SESSION['cart'] = array();
      }
      if ($_POST['action'] == 'update') {
        $this->_handleUpdate();
      }
      if ($_POST['action'] == 'checkout') {
        header('Location: index.php?page=checkout');
        exit();
      }
      header('Location: index.php?page=cart');
      exit();
    }
    if (!empty($_POST['remove'])) {
      $this->_handleRemove();
      header('Location: index.php?page=cart');
      exit();
    }
    $this->set('title', 'Cart');
  }

  // TOEVOEGEN
  private function _handleAdd() {
    if (empty($_SESSION['cart'][$_POST['product_id']])) {
      $product= $this->productDAO->selectProductById($_POST['product_id']);
      if (empty($product)) {
        return;
      }
      $_SESSION['cart'][$_POST['product_id']] = array(
        'product' => $product,
        'option' => $_POST['option_id'],
        'quantity' => $_POST['quantity']
      );
    }
    // $_SESSION['cart'][$_POST['product_id']]['option_id'];
    $_SESSION['cart'][$_POST['product_id']]['quantity']++;
  }

  // VERWIJDEREN
  private function _handleRemove() {
    if (isset($_SESSION['cart'][$_POST['remove']])) {
      unset($_SESSION['cart'][$_POST['remove']]);
    }
  }

  // UPDATE QUANTITY
  private function _handleUpdate() {
    foreach ($_POST['quantity'] as $productId => $quantity) {
      if (!empty($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity'] = $quantity;
      }
    }
    $this->_removeWhereQuantityIsZero();
  }

  // DELETE WNR 0 QUANTITY
  private function _removeWhereQuantityIsZero() {
    foreach($_SESSION['cart'] as $productId => $info) {
      if ($info['quantity'] <= 0) {
        unset($_SESSION['cart'][$productId]);
      }
    }
  }

  // CHECKOUT  - STAP 1
  public function checkout() {
    if(!empty($_POST['action'])){
      if (!empty($_POST['action'])){
        if ($_POST['action'] == 'insertCheckout'){
          $insertedCheckout = $this->_handleCheckoutOrder();
           if(!$insertedCheckout){
              $errors = $this->orderDAO->validateCheckout($_POST);
              $this->set('errors',$errors);
        } else {
        $_SESSION['info'] = 'Bedankt voor je bestelling!';
        header('location: index.php?page=checkout');
        exit();
        }
      }
    }

    }
    $this->set('title', 'Checkout');
  }

  // CHECKOUT  - STAP 2
  private function _handleCheckoutOrder(){
    $data = $_POST;
    if($gegevensId = $this->orderDAO->insertGegevens($data)){
      $this->_handleCheckout($gegevensId);
    }
    exit();
  }

  // CHECKOUT  - STAP 3
  private function _handleCheckout($gegevensId) {
    $data = array();
    if(!empty($_SESSION['cart'])){
      foreach ($_SESSION['cart'] as $productId => $quantity) {
        array_push($data, array(
          'order_id' => $gegevensId['id'],
          'product_id' => $productId,
          'quantity' => $quantity['quantity']
        ));
      }
      foreach($data as $order){
        $this->orderDAO->insertOrder($order);
      }
        header('Location: index.php?page=payment');
        exit();
        }
  }

  public function payment() {

    $this->set('title', 'payment');
  }

  public function confirmation() {

    $this->set('title', 'confirmation');
  }

}
