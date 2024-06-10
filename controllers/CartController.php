<?php
require_once 'models/Order.php';
class CartController extends Order
{
    function listCart()
    {
        if (!empty($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];

            $productId = array_column($cart, 'id');
            $idList = implode(',', $productId);
            $dataDb = $this->loadone_sanphamCart($idList);
            // var_dump($dataDb);
            // die();
        }
        include "views/cart/listCartOrder.php";
    }
    function addOrderDB(){
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            if (isset($_POST['order_confirm'])) {
                $hoten = $_POST['hoten'];
                $sdt = $_POST['sdt'];
                $email = $_POST['email'];
                $diachi = $_POST['diachi'];
                $pttt = $_POST['pttt'];
                $this-> addOrder($hoten, $sdt, $email, $diachi, $_SESSION['resultTotal'], $pttt);
                $id=$this->oneOrder();
                foreach($id as $Bill){
                    $idBill=$Bill;
                }
                foreach ($cart as $item) {
                    $this->addOrderDetail($idBill, $item['id'], $item['price'], $item['quantity'], $item['price'] * $item['quantity']);
                }
                unset($_SESSION['cart']);
                $_SESSION['success'] = $idBill;
                header("Location: index.php?url=succes");
            }
            include "views/cart/order.php";
        } else {
            header("Location: index.php?url=list-cart");
        }
    }
}