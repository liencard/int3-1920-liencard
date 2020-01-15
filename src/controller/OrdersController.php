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
        'option' => $_POST['option_id']
      );
    }
    $_SESSION['cart'][$_POST['product_id']]['option_id'];
  }

  // VERWIJDEREN
  private function _handleRemove() {
    if (isset($_SESSION['cart'][$_POST['remove']])) {
      unset($_SESSION['cart'][$_POST['remove']]);
    }
  }


}
