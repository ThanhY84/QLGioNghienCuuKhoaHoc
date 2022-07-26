<?php include 'header.php'?>
<?php include 'db.php' ?>
<?php include 'menu_dn.php'?>
<div class="container">

    <?php
     if(isset($_POST)) {
        $magv = "";
        $mahd = "";
        $manh = "";
        $tsnguoi = "";
        $thutu = "";
        $id ="";
        $user="";
        $trangthai= "Chưa duyệt";
        if(isset($_POST["magv"])) {
            $magv = $_POST["magv"];
        }
        if(isset($_POST["mahd"])) {
        $mahd = $_POST["mahd"];
        }
        if(isset($_POST["manh"])) {
            $manh = $_POST["manh"];
        }
        if(isset($_POST["tsnguoi"])) {
            $tsnguoi = $_POST["tsnguoi"];
        }
        if(isset($_POST["thutu"])) {
            $thutu = $_POST["thutu"];
        }
        if(isset($_POST["user"])) {
            $user = $_POST["user"];
        }

        $sql = "insert into thuchienhdnckh values ('$tsnguoi','$thutu','$manh','$magv','$mahd', '$trangthai','$id','$user')";
        if(Database::NonQuery($sql)) {
            echo 'Thêm thành công';
        }
    }
        
    ?>
    <h3 style="color:red"><i class="fa-solid fa-calendar-plus" style='font-size:25px;color:red'></i> THÊM HOẠT ĐỘNG KH&CN
        QUY ĐỔI GIỜ NGHIÊN CỨU KHOA HỌC</h3>
    <form method="POST">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Giảng viên: </span>
            </div>
            <select class="form-control" name="magv">
                <?php
                        $sql = "select * from giangvien";
                        $data = Database::GetData($sql);
                        foreach($data as $row) {
                            echo '<option value="'.$row['MaGV'].'">'.$row['TenGV'].'</option>';
                        }
                    ?>
            </select>
        </div>
        <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Hoạt động: </span>
                </div>
                <select class="form-control" name="mahd">
                    <?php
                        $sql = "select * from hoatdongnckh";
                        $data = Database::GetData($sql);
                        foreach($data as $row) {
                            echo '<option value="'.$row['MaHD'].'">'.$row['TenHD'].'</option>';
                        }
                    ?>
                </select>
            </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Nhập năm học: </span>
            </div>
            <select class="form-control" name="manh">
                <?php
                        $sql = "select * from namhoc";
                        $data = Database::GetData($sql);
                        foreach($data as $row) {
                            echo '<option value="'.$row['MaNH'].'">'.$row['TenNH'].'</option>';
                        }
                    ?>
            </select>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Tổng số người:</span>
            </div>
            <input type="number" class="form-control" name="tsnguoi">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Thứ tự: </span>
            </div>
            <input type="number" class="form-control" name="thutu">
        </div>
        Người thực hiện: <input type="text" Class="form-control" name="user" ReadOnly="true" value="<?=$_SESSION['user']?>"></br>
        <button type="submit" class="btn btn-primary">Thêm</button>
        <a href="HienThi_HoatDongNCKH.php" class="btn btn-primary">Quay lại</a>
    </form>
</div>
<?php include 'footer.php'?>