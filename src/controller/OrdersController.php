<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ProductDAO.php';
require_once __DIR__ . '/../dao/OrderDAO.php';

class OrdersController extends Controller {

  private $orderDAO;

  function __construct() {
    $this->orderDAO = new OrderDAO();
  }

  public function cart() {

  }
}
