<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ProductDAO.php';

class ProductsController extends Controller {

  private $productDAO;

  function __construct() {
    $this->productDAO = new ProductDAO();
  }

  public function index() {
    $products = $this->productDAO->selectAllProducts();
    $this->set('products', $products);
  }

  public function detail() {

    if(!empty($_GET['id'])){
      $product = $this->productDAO->selectProductById($_GET['id']);
    }

    if(empty($product)){
      header('Location: index.php');
      exit();
    }

    $this->set('product', $product);
  }


}
