<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ProductDAO.php';

class ProductsController extends Controller {

  private $productDAO;

  function __construct() {
    $this->productDAO = new ProductDAO();
  }

  public function index() {

    if(empty($_GET['type']) || $_GET['type'] === 'all'){
      $products = $this->productDAO->selectAllProducts();
    }else{
      $products = $this->productDAO->selectProductByType($_GET['type']);
    }

    // $products = $this->productDAO->selectAllProducts();
    $this->set('products', $products);
    $this->set('types',$this->productDAO->selectTypes());
    $this->set('title', 'Overview');

    if ($_SERVER['HTTP_ACCEPT'] == 'application/json') {
      echo json_encode($products);
      exit();
    }
  }

  public function detail() {

    if(!empty($_GET['id'])){
      $product = $this->productDAO->selectProductById($_GET['id']);
      $options = $this->productDAO->selectOptionsById($_GET['id']);
      $images = $this->productDAO->selectImagesById($_GET['id']);
    }

    if(empty($product)){
      header('Location: index.php');
      exit();
    }

    $this->set('product', $product);
    $this->set('options', $options);
    $this->set('images', $images);
    $this->set('title', 'Detail');
  }

  public function longread() {

    $this->set('title', 'Longread');
  }


}
