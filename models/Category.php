<?php
require_once "db.php";
class Category extends db
{
    function getAllCategory(){
        $sql = "SELECT * FROM category";
        return $this-> getData($sql);
    }
    function insertCategory($name, $content, $date){
        $sql = "insert into category(id, category_name, mo_ta, ngay_nhap) values ('null', '$name', '$content', '$date');";
        return $this->getData($sql, false);
    }
    function deleteCategory($category_id){
        $sql = "DELETE FROM category WHERE id='{$category_id}'";
        return $this->getData($sql, false);
    }
    function getCategory($category_id){
        $sql = "SELECT * FROM category WHERE id='$category_id'";
        return $this->getData($sql, false);
    }
    function updateCategory($category_id, $name, $content, $date) {
        $sql = "UPDATE category SET category_name='{$name}', mo_ta='{$content}', ngay_nhap='{$date}' WHERE id='{$category_id}' ";
        return $this-> getData($sql, false);
    }
}
