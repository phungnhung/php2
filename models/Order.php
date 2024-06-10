<?php
require_once "db.php";
class Order extends db{
    function loadone_sanphamCart($idList) {
        $sql = "SELECT * FROM product WHERE id IN ($idList)";
        return $this->getData($sql);
    }
    function addOrder($hoten, $sdt, $email, $diachi, $tongtien, $pttt){
        $sql="INSERT INTO tb_order (ho_ten, sdt, email, dia_chi, tong_tien, pttt) VALUES ( '$hoten', '$sdt', '$email', '$diachi', $tongtien, $pttt);";
        return $this->getData($sql,false);
    }
    function oneOrder(){
        $sql="SELECT id_order FROM tb_order ORDER BY id_order DESC LIMIT 1";
        return $this->getData($sql,false);
    }

    function addOrderDetail($id_order, $id_san_pham, $price, $soluong, $thanhtien){
        $sql="INSERT INTO tb_order_detail(id_order, id_san_pham, price, soluong, thanhtien) VALUES ($id_order, $id_san_pham, $price, $soluong, $thanhtien );";
        return $this->getData($sql,false);
    }
}

?>