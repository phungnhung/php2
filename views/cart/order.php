<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bao gồm Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Thanh Toán</title>
    <style>
        h2 {
            margin-bottom: 20px;
            margin-top: 10px;
            font-size: 24px;
        }

        input[type="text"],
        input[type="tel"],
        input[type="email"] {
            padding: 8px 10px;
            width: 300px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            margin-top: 15px;
        }

        .page-order {
            display: flex;
        }

        .form-order {
            width: 70%;
        }

        .sub-order {
            width: 30%;
        }

        .sub-order td,
        .sub-order th {
            padding: 5px;
        }

        .sub-order td:first-child,
        .sub-order th:first-child {
            width: 70%;
        }

        .sub-order td:last-child,
        .sub-order th:last-child {
            text-align: right;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h2 class="mb-4">Thông Tin Đơn Hàng</h2>

        <!-- Nút Thêm -->
        <a href="index.php?url=list-cart" class="btn btn-primary mb-3">Giỏ Hàng</a>
        <!-- Bảng Bootstrap -->
        <div class="page-order">
            <div class="form-order">
                <form action="" method="post">
                    <h2>Thông tin khách hàng</h2>
                    <div><input type="text" name="hoten" id="" placeholder="Họ và tên" required></div>
                    <div><input type="tel" name="sdt" id="" placeholder="Số điện thoại" required></div>
                    <div><input type="email" name="email" id="" placeholder="Email" required></div>
                    <div><input type="text" name="diachi" id="" placeholder="Địa chỉ" required></div>
                    <h3>Phương thức thanh toán</h3>
                    <p><input type="radio" name="pttt" id="" value="1" required> Thanh toán khi giao hàng</p>
                    <p><input type="radio" name="pttt" id="" value="2" required> Chuyển khoản ngân hàng</p>
                    <input type="submit" value="Xác nhận đặt hàng" name="order_confirm">
                </form>
            </div>
            <div class="sub-order">
                <h2>Đơn hàng</h2>
                <table>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Thành tiền</th>
                    </tr>
                    <?php
                    // print_r($cart);
                    foreach ($cart as $item) {
                    ?>
                        <tr>
                            <td>
                                <?php echo $item['name']; ?><br>
                                <small>SL: <?php echo $item['quantity']; ?></small>
                            </td>
                            <td><?php echo number_format($item['quantity'] * $item['price'], 0, ",", "."); ?> .000₫</td>
                        </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <td><b>Tổng tiền</b></td>
                        <td><b><?php echo number_format($_SESSION['resultTotal'], 0, ",", "."); ?> .000₫</b></td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Kết thúc Bảng Bootstrap -->
    </div>

    <!-- Bao gồm Bootstrap JS và Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>