<?php include 'header.php'?>
<?php include 'db.php' ?>
<?php include 'menu.php'?>
<div class="card">
    <div class="card-header">
        <h3 style="color:red ; text-align: center"><i style='font-size:25px;color:red'></i><b>ĐĂNG NHẬP</b></h3>
    </div>
    <div class="card-body">
        <form action="dangnhap_xl.php" class="was-validated" method="POST">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Tên tài khoản:</span>
                </div>
                <input type="text" class="form-control" id="username" placeholder="Nhập tên tài khoản..."
                    name="username" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Mật khẩu:</span>
                </div>
                <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu..." name="password"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
        </form>
    </div>
</div>
<?php include 'footer.php'?>