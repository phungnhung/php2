<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bao gồm Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Bảng Danh Mục</title>
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Danh sách Danh Mục</h2>

    <!-- Nút Thêm -->
    <a href="index.php?url=add-category" class="btn btn-primary mb-3">Thêm</a>
    <a href="index.php?url=/" class="btn btn-primary mb-3">Sản Phẩm</a>
    <!-- Bảng Bootstrap -->
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên Danh Mục</th>
            <th scope="col">Mô Tả</th>
            <th scope="col">Ngày Nhập</th>
            <th scope="col">Thao Tác</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($categorys as  $key => $value){?>
        <tr>
            <th scope="row"><?php echo $value["id"] ?></th>
            <td><?php echo $value["category_name"] ?></td>
            <td><?php echo $value["mo_ta"] ?></td>
            <td><?php echo $value["ngay_nhap"] ?></td>
            <td><a href="index.php?url=update-category&category_id=<?php echo $value["id"] ?>" class="btn btn-warning">Sửa</a><a href="index.php?url=delete-category&category_id=<?php echo $value["id"] ?>" class="btn btn-danger">Xóa</a></button></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <!-- Kết thúc Bảng Bootstrap -->
</div>

<!-- Bao gồm Bootstrap JS và Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
