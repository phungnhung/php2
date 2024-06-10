<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bao gồm Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Bảng Sản Phẩm</title>
    <style>
    #totalProduct {
      color: #fff;
      background-color: red;
      font-size: 12px;
      padding: 5px;
      border-radius: 50%;
    }
  </style>
</head>

<body>

    <div class="container mt-5">
        <h2 class="mb-4">Danh sách Sản Phẩm</h2>

        <!-- Nút Thêm -->
        <a href="index.php?url=add-product" class="btn btn-primary mb-3">Thêm</a>
        <a href="index.php?url=list-category" class="btn btn-primary mb-3">Danh mục</a>
        <a href="index.php?url=list-cart" class="btn btn-primary mb-3">Giỏ hàng  <span id="totalProduct"><?= !empty($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?></span></a>
        <!-- Bảng Bootstrap -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên Sản Phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Hình Ảnh</th>
                    <th scope="col">Danh Mục</th>
                    <th scope="col">Thao Tác</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as  $key => $value) { ?>
                    <tr>
                        <th scope="row"><?php echo $value["id"] ?></th>
                        <td><?php echo $value["name"] ?></td>
                        <td><?php echo $value["price"] ?></td>
                        <td><img src="<?php echo $value["image"] ?>" alt="Hình ảnh sản phẩm 1" style="max-width: 100px;"></td>
                        <td><?php echo $value["category_name"] ?></td>
                        <td>
                            <button data-id="<?php echo $value['id'] ?>" class="btn btn-primary" onclick="addToCart(<?php echo $value['id'] ?>, '<?php echo $value['name'] ?>', <?php echo $value['price'] ?>)">Thêm vào giỏ hàng</button>
                            <a href="index.php?url=update-product&product_id=<?php echo $value["id"] ?>" class="btn btn-warning">Sửa</a> <a href="index.php?url=delete-product&product_id=<?php echo $value["id"] ?>" class="btn btn-danger">Xóa</a></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <!-- Kết thúc Bảng Bootstrap -->
    </div>

    <!-- Bao gồm Bootstrap JS và Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        let totalProduct = document.getElementById('totalProduct');

        function addToCart(productId, productName, productPrice) {
            // console.log(productId, productName, productPrice);
            // Sử dụng jQuery
            $.ajax({
                type: 'POST',
                // Đường dẫ tới tệp PHP xử lý dữ liệu
                url: 'views/cart/addToCart.php',
                data: {
                    id: productId,
                    name: productName,
                    price: productPrice
                },
                success: function(response) {
                    totalProduct.innerText = response;
                    alert('Bạn đã thêm sản phẩm vào giỏ hàng thành công!')
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    </script>
</body>

</html>