<?php
require_once "models/Category.php";
require_once "models/Product.php";
class ProductController
{
    function listProduct()
    {
        $product = new Product();
        $products = $product->getAllProduct();
        include "views/product/list.php";
    }
    function addProducts()
    {
        $product = new Product();
        $category = new Category();
        if (isset($_POST['Save'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $id_category = $_POST['id_category'];
            $image = $_FILES['image'];
            // thư mục sẽ được lưu ảnh vào thư mục image
            $targetDir = "public/image/";
            //Đường dẫn đến file được lưu
            $targetFile = $targetDir . $image['name'];
            // Tiến hành upload file ảnh
            if (move_uploaded_file($image['tmp_name'], $targetFile)) {
                $image_url = $targetFile;
            }
            $check = $product->insertProduct($name, $price, $image_url, $id_category);
            if (!$check) {
                echo '<script>alert("Thêm sản phẩm thành công")</script>';
                echo '<script>window.location.href = "index.php";</script>';
            } else {
                echo '<script>alert("Thêm sản phẩm thất bại")</script>';
                echo '<script>window.location.href = "index.php";</script>';
            }
        }
        $categorys = $category->getAllCategory();
        include "views/product/add.php";
    }
    // function updateView()
    // {
    //     $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : null;
    //     $one = new Product();
    //     $ones = $one-> getProduct($product_id);
    //     $category = new Category();
    //     $categorys = $category->getAllCategory();
    //     include "views/product/update.php";
    // }

    function postUpdateProduct()
    {
        $product = new Product();
        $category = new Category();
        if (isset($_GET['product_id'])) {
            $product_id = $_GET['product_id'];
            $one = new Product();
            $ones = $one->getProduct($product_id);
        }
        if (isset($_POST['update'])) {

            $product_id = $_POST['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $image = $_FILES['image'];
            $id_category = $_POST['id_category'];

            // nếu cập nhật ảnh mới thì chạy phần này
            if ($image['size'] != 0) {
                // thư mục sẽ được lưu ảnh vào thư mục image
                $targetDir = "public/image/";
                //Đường dẫn đến file được lưu
                $targetFile = $targetDir . $image['name'];
                // Tiến hành upload file ảnh
                if (move_uploaded_file($image['tmp_name'], $targetFile)) {
                    $image_url = $targetFile;
                }
            } else {
                $image_url = $ones['image'];
            }
            $updates = $product->updateProduct($product_id, $name, $price, $image_url, $id_category);
            if (!$updates) {
                echo '<script>alert("Cập nhật sản phẩm thành công")</script>';
                echo '<script>window.location.href = "index.php";</script>';
            } else {
                echo '<script>alert("Cập nhật sản phẩm thất bại")</script>';
                echo '<script>window.location.href = "index.php";</script>';
            }
        }
        $categorys = $category->getAllCategory();
        include "views/product/update.php";
    }

    function postDeleleProduct()
    {
        $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : null;
        $delete = new Product();
        $deletes = $delete->deleteProduct($product_id);
        echo '<script>alert("Xóa sản phẩm thành công")</script>';
        echo '<script>window.location.href = "index.php";</script>';
    }
    
}
