<?php
session_start();
require_once "controllers/ProductController.php";
require_once "controllers/CategoryController.php";
require_once "controllers/CartController.php";
$url = (isset($_GET['url'])) ? $_GET['url'] : "/";

$productController = new ProductController();
$CategoryController = new CategoryController();
$CartController = new CartController();
switch ($url) {
    case '/':
        $productController->listProduct();
        break;
    case 'add-product':
        $productController->addProducts();
        break;
    case 'update-product':
        $productController->postUpdateProduct();
        break;
    case 'delete-product':
        $productController->postDeleleProduct();
        break;

        // Category
    case 'list-category':
        $CategoryController->listCategory();
        break;
    case 'add-category';
        $CategoryController->addCategory();
        break;
    case 'update-category':
        $CategoryController->postUpdateCategory();
        break;
    case 'delete-category':
        $CategoryController->postDeleleCategory();
        break;

        // Cart
    case 'list-cart':
        $CartController->listCart();
        break;
    case 'order':
        $CartController->addOrderDB();
        break;
    case 'succes';
        include "views/cart/succes.php";
        break;
}
