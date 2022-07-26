<?php include'connect.php' ?>
<?php include'header.php' ?>
<?php include'menu_dn.php' ?>

<div class="card">
    <div class="card-header">
        <h2 class="text-danger" style="text-align: center"><b>THÊM NGƯỜI DÙNG</b></h2>
    </div>
    <div class="card-body">
        <form action="xl_them.php" method="POST" enctype='multipart/form-data'>
            Tên tài khoản: <input type="text" Class="form-control" name="tentk"></br>
            Mật khẩu: <input type="password" Class="form-control" name="pass1"></br>
            Nhập lại mật khẩu: <input type="password" Class="form-control" name="pass2"></br>
            Họ và tên: <input type="text" Class="form-control" name="hoten"></br>
            Số điện thoại: <input type="text" Class="form-control" name="sdt"></br>
            Email: <input type="email" Class="form-control" name="email"></br>
            Avatar: <input type="file" Class="form-control" name="avt"></br>
            <input type="submit" class="btn btn-primary" name="them" value="Thêm">
        </form>
    </div>
</div>

<?php include'footer.php' ?>