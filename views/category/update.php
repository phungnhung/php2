<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bao gồm Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Form Sửa Danh Mục</title>
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Sửa Danh Mục</h2>
    <form action="index.php?url=update-category&category_id=<?php echo $one['id'] ?>" method="POST">
        <div class="mb-3">
            <label for="tenDanhMuc" class="form-label">Tên Danh Mục</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $one['category_name']?>" placeholder="Nhập tên danh mục">
        </div>

        <div class="mb-3">
            <label for="moTa" class="form-label">Mô Tả</label>
            <input type="text" class="form-control" id="content" value="<?php echo $one['mo_ta']?>" name="content" placeholder="Nhập mô tả danh mục">
        </div>

        <div class="mb-3">
            <label for="ngayNhap" class="form-label">Ngày Nhập</label>
            <input type="date" class="form-control" id="date" name="date" value="<?php echo $one['ngay_nhap']?>" placeholder="Nhập ngày">
        </div>
        <button type="submit" class="btn btn-primary" name="gui">Sửa</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
