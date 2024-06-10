<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bao gồm Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Bảng Giỏ Hàng</title>
</head>

<body>

    <div class="container mt-5">
        <h2 class="mb-4">Danh sách Giỏ Hàng</h2>

        <!-- Nút Thêm -->
        <a href="index.php?url=/" class="btn btn-primary mb-3">Sản Phẩm</a>
        <!-- Bảng Bootstrap -->
        <?php
        if (empty($dataDb)) {
            echo '<h1>Chưa có sản phẩm trong giỏ hàng</h1>';
        } else {
        ?>
            <table border="1" width="100%" style="margin: 0 auto;">
                <thead>
                    <tr align="center">
                        <td>STT</td>
                        <td>Ảnh </td>
                        <td>Tên sp</td>
                        <td>Giá</td>
                        <td>Số lượng</td>
                        <td>Thành tiền</td>
                        <td>Chức năng</td>
                    </tr>
                </thead>
                <tbody id="order">
                    <?php
                    $sum_total = 0;
                    foreach ($dataDb as $key => $product) :
                        $quantityInCart = 0;
                        foreach ($_SESSION['cart'] as $item) {
                            if ($item['id'] == $product['id']) {
                                $quantityInCart = $item['quantity'];
                                break;
                            }
                        }
                    ?>
                        <tr align="center">
                            <td><?= $key + 1 ?></td>
                            <td>
                                <img src="<?=$product['image'] ?>" alt="<?= $product['name'] ?>" style="width: 100px; height: auto">
                            </td>
                            <td><?= $product['name'] ?></td>
                            <td><?= number_format((int)$product['price'], 0, ",", ".")  ?> <u>.000đ</u></td>
                            <td>
                                <input type="number" value="<?= $quantityInCart ?>" min="1" id="quantity_<?= $product['id'] ?>" oninput="updateQuantity(<?= $product['id'] ?>, <?= $key ?>)">
                            </td>
                            <td>
                                <?= number_format((int)$product['price'] * (int)$quantityInCart, 0, ",", ".") ?> <u>.000đ</u>
                            </td>
                            <td>
                                <button onclick="removeFormCart(<?= $product['id'] ?>)">Xóa</button>
                            </td>
                        </tr>
                    <?php
                        // Tính tổng giá đơn hàng
                        $sum_total += ((int)$product['price'] * (int)$quantityInCart);

                        // Lưu tổng giá trị vào sesion
                        $_SESSION['resultTotal'] = $sum_total;
                    endforeach;
                    ?>

                    <tr>
                        <td colspan="5" align="center">
                            <h2>Tổng tiền hàng:</h2>
                        </td>
                        <td colspan="2" align="center">
                            <h2>
                                <span>
                                    <?= number_format((int)$sum_total, 0, ",", ".")  ?> <u>.000đ</u>
                                </span>
                            </h2>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <form action="index.php?url=order" method="post">
                <input type="submit" style="padding:10px;" name="order" value="Đặt Hàng">
            </form>
        <?php
        }
        ?>
        <!-- Kết thúc Bảng Bootstrap -->
    </div>

    <!-- Bao gồm Bootstrap JS và Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    // hàm cập nhật số lượng
    function updateQuantity(id, index) {
        // lấy giá trị của ô input
        let newQuantity = $('#quantity_' + id).val();
        if (newQuantity <= 0) {
            newQuantity = 1
        }

        // Gửi yêu cầu bằng ajax để cập nhật giỏ hàng
        $.ajax({
            type: 'POST',
            url: 'views/cart/updateQuantity.php',
            data: {
                id: id,
                quantity: newQuantity
            },
            success: function(response) {
                // Sau khi cập nhật thành công
                $.post('views/cart/tableCartOrder.php', function(data) {
                    $('#order').html(data);
                })
            },
            error: function(error) {
                console.log(error);
            },
        })
    }

    function removeFormCart(id) {
        if (confirm("Bạn có đồng ý xóa sản phẩm hay không?")) {
            // Gửi yêu cầu bằng ajax để cập nhật giỏ hàng
            $.ajax({
                type: 'POST',
                url: 'views/cart/removeFormCart.php',
                data: {
                    id: id
                },
                success: function(response) {
                    // Sau khi cập nhật thành công
                    $.post('views/cart/tableCartOrder.php', function(data) {
                        $('#order').html(data);
                    })
                },
                error: function(error) {
                    console.log(error);
                },
            })
        }
    }
</script>
</body>

</html>