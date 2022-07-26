<?php include 'header.php'?>
<?php include 'connect.php' ?>
<?php include 'menu.php'?>
<div class="card">
    <div class="card-header">
        <h3 style="color:red ; text-align: center"><i style='font-size:25px;color:red'></i><b>ĐĂNG KÝ</b></h3>
    </div>
    <div class="card-body">
        <form action="dangky_xl_kvc.php" method="POST" enctype='multipart/form-data'>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Tên tài khoản:</span>
                </div>
                <input type="text" class="form-control" id="user" placeholder="Nhập tên tài khoản..." name="username"
                    required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Nhập mật khẩu:</span>
                </div>
                <input type="password" Class="form-control" name="pass1" placeholder="Nhập mật khẩu...">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Nhập lại mật khẩu:</span>
                </div>
                <input type="password" Class="form-control" name="pass2" placeholder="Nhập lại mật khẩu..."></br>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Họ tên:</span>
                </div>
                <input type="text" Class="form-control" name="name" placeholder="Nhập họ tên..."></br>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Số điện thoại:</span>
                </div>
                <input type="text" Class="form-control" name="phone" placeholder="Nhập số điện thoại..."></br>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Email:</span>
                </div>
                <input type="email" Class="form-control" name="email" placeholder="Nhập email..."></br>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"> Avatar:</span>
                </div>
                <input type="file" Class="form-control" name="avt"></br>
            </div>
            <button type="submit" class="btn btn-primary">Đăng ký</button>
        </form>
    </div>
</div>


<?php include 'footer.php'?>