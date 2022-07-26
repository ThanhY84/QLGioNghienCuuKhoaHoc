<?php include 'header.php'?>
<?php include 'connect.php' ?>
<?php include 'menu.php'?>
<div class="container">
<div class="login_form">
    <form action="dangky_xl.php" method="POST" enctype='multipart/form-data'>
    <h3 style="color:red ; text-align: center"><i  style='font-size:25px;color:red'></i><b>ĐĂNG KÝ</b></h3>
        Tên tài khoản: <input type="text" Class="form-control" name="user" placeholder="Nhập tên tài khoản..."> </br>
        Nhập mật khẩu: <input type="password" Class="form-control" name="pass1" placeholder="Nhập mật khẩu..."></br>
        Nhập lại mật khẩu: <input type="password" Class="form-control" name="pass2"
            placeholder="Nhập lại mật khẩu..."></br>
        Họ tên: <input type="text" Class="form-control" name="name" placeholder="Nhập họ tên..."></br>
        Số điện thoại: <input type="text" Class="form-control" name="phone" placeholder="Nhập số điện thoại..."></br>
        Email: <input type="email" Class="form-control" name="email" placeholder="Nhập email..."></br>
        Avatar: <input type="file" Class="form-control" name="avt"></br>     
        </br>
        <button type="submit" class="btn btn-primary">Đăng ký</button>
    </form>
</div>
</div>
<?php include 'footer.php'?>