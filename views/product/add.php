<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bao gồm Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Form Thêm Sản Phẩm</title>
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Thêm Sản Phẩm</h2>
    <form action="index.php?url=add-product" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="tenSanPham" class="form-label">Tên Sản Phẩm</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên sản phẩm">
        </div>

        <div class="mb-3">
            <label for="gia" class="form-label">Giá</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Nhập giá sản phẩm">
        </div>

        <div class="mb-3">
            <label for="hinhAnh" class="form-label">Hình Ảnh</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>

        <div class="mb-3">
            <label for="danhMuc" class="form-label">Danh Mục</label>
            <select class="form-select" id="id_category" name="id_category">
                <?php foreach ($categorys as $valueCT){ ?>
                <option value="<?php echo $valueCT["id"] ?>"><?php echo $valueCT["category_name"] ?></option>
                <?php } ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary" name="Save">Lưu</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
