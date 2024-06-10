<?php
class CategoryController
{
    function listCategory()
    {
        $category = new Category();
        $categorys = $category->getAllCategory();
        include "views/category/list.php";
    }
    function addCategory()
    {
        $category = new Category();
        if (isset($_POST['Save'])) {
            $name = $_POST['name'];
            $content = $_POST['content'];
            $date = $_POST['date'];
            $check = $category->insertCategory($name, $content, $date);
            if (!$check) {
                echo '<script>alert("Thêm danh mục thành công")</script>';
                echo '<script>window.location.href = "index.php?url=list-category";</script>';
            } else {
                echo '<script>alert("Thêm danh mục thất bại")</script>';
                echo '<script>window.location.href = "index.php?url=list-category";</script>';
            }
        }
        include "views/category/add.php";
    }
    function postUpdateCategory()
    {
        $category = new Category();
        if (isset($_GET['category_id'])) {
            $category_id = $_GET['category_id'];
            $one = $category->getCategory($category_id);
        }
        if (isset($_POST['gui'])) {
            $category_id = $_GET['category_id'];
            $name = $_POST['name'];
            $content = $_POST['content'];
            $date = $_POST['date'];
            $check = $category->updateCategory($category_id, $name, $content, $date);
            if (!$check) {
                echo '<script>alert("Cập nhật danh mục thành công")</script>';
                echo '<script>window.location.href = "index.php?url=list-category";</script>';
            } else {
                echo '<script>alert("Cập nhật danh mục thất bại")</script>';
                echo '<script>window.location.href = "index.php?url=list-category";</script>';
            }
        }
        include "views/category/update.php";
    }
    function postDeleleCategory()
    {
        $category_id = isset($_GET['category_id']) ? $_GET['category_id'] : null;
        $delete = new Category();
        $deletes = $delete->deleteCategory($category_id);
        echo '<script>alert("Xóa danh mục thành công")</script>';
        echo '<script>window.location.href = "index.php?url=list-category";</script>';
    }
}
