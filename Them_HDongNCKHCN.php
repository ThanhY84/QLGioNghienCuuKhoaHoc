<?php include 'header.php'?>
<?php include 'db.php' ?>
<?php include 'menu_dn.php'?>
<div class="container">
    <?php
     if(isset($_POST)) {
        $magv = "";
        $mahd = "";
        $tenhoatdong = "";
        $manh = "";
        $tsnguoi = "";
        $thutu = "";
        $gio = "";
        $tgnghiemthu = "";
        $id ="";
        $user ="";
        $minhchung = "";
        $trangthai= "Chưa duyệt";
   
        if(isset($_POST["magv"])) {
            $magv = $_POST["magv"];
        }
        if(isset($_POST["mahd"])) {
        $mahd = $_POST["mahd"];
        }
        if(isset($_POST["tenhoatdong"])) {
            $tenhoatdong = $_POST["tenhoatdong"];
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
        if(isset($_POST["gio"])) {
            $gio = $_POST["gio"];
        }
        if(isset($_POST["tgnghiemthu"])) {
            $tgnghiemthu = $_POST["tgnghiemthu"];
            }
       if(isset($_POST["minhchung"])) {
        $minhchung = $_POST["minhchung"];
            }
        $sql = "insert into thuchienhdnckh values ('$thutu','$gio','$magv','$manh','$mahd', '$id', '$trangthai','$tsnguoi','$user', '$tenhoatdong', '$tgnghiemthu', '$minhchung')";
        if(Database::NonQuery($sql)) {
            echo 'Thêm thành công';
        }
    }
    ?>
    <h3 style="color:red"><i class="fa-solid fa-calendar-plus" style='font-size:25px;color:red'></i> THÊM KÊ KHAI GIỜ
        NGHIÊN CỨU KHOA HỌC BẰNG SẢN PHẨM NCKH</h3>
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
                <span class="input-group-text">Năm học: </span>
            </div>
            <?php $namHienTai = date('Y') . "-" . (date('Y') + 1);?>
            <select class="form-control" name="manh">
                <?php
                        $sql = "select * from namhoc";
                        

                        $data = Database::GetData($sql);
                        foreach($data as $row) {
                            $selected = $namHienTai == $row["TenNH"] ? "selected" : "";
                            echo '<option value="'.$row['MaNH'].'" '.$selected.'>'.$row['TenNH'].'</option>';
                        }
                    ?>
            </select>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Chọn danh mục hoạt động: </span>
            </div>
            <?php
                        $sql = "SELECT * FROM `truonghop`, `hoatdongnckh` WHERE `truonghop`.`MaTH` = `hoatdongnckh`.`MaTH`";
                        $hoatdongnckhs = Database::GetData($sql);
                        ?>
            <select class="form-control" name="mahd">
                <?php
                        foreach($hoatdongnckhs as $row) {
                            echo '<option value="'.$row['MaHD'].'">'.$row['MaHD'].'</option>';
                        }
                    ?>
            </select>
        </div>
        <div class="input-group mb-3">
            <?php
            $sql = "select * from hoatdongnckh where MaHD = 'hd-1'";
            $data1 = Database::GetData($sql);
             ?>
            <p id="para"><?=$data1[0]["TenHD"]?></p>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Tên hoạt động:</span>
            </div>
            <input type="text" class="form-control" name="tenhoatdong">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Tổng số người:</span>
            </div>
            <input type="number" class="form-control" name="tsnguoi" min="1" value="1">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Thứ tự: </span>
            </div>
            <input type="number" class="form-control" name="thutu" value="1">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Giờ quy đổi: </span>
            </div>
            <input type="number" class="form-control" name="gio">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Thời gian nghiệm thu: </span>
            </div>
            <input type="date" class="form-control" name="tgnghiemthu">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Minh chứng: </span>
            </div>
            <input type="text" class="form-control" name="minhchung">
        </div>
        Người thực hiện: <input type="text" Class="form-control" name="user" ReadOnly="true"
            value="<?=$_SESSION['user']?>"></br>
        <button type="submit" class="btn btn-primary">Thêm</button>
        <a href="HienThi_sanphamNCKH.php" class="btn btn-primary">Quay lại</a>
    </form>
</div>
<script>
var select = $('select[name="mahd"]')[0];
var hdkh = <?=json_encode($hoatdongnckhs);?>

select.onchange = function() {
    hdkh.forEach(element => {
        if (element.MaHD == select.value) {
            $("#para").html(element.TenHD);
        }
    });
}
var tsnguoi = $('input[name="tsnguoi"]')[0];
var thutu = $('input[name="thutu"]')[0];
var gio = $('input[name="gio"]')[0];
console.log(tsnguoi);
tsnguoi.onchange = function() {
    var test;
    hdkh.forEach(element => {
        if (element.MaHD == select.value) {
            test = element;
        }
    });

    if (tsnguoi.value == 1 && thutu.value == 1) {
        gio.value = test.GioQDDL;
    } else {
        if (thutu.value == 1) {
            gio.value = test.GioQDThu1;
        } else {
            gio.value = parseInt(test.GioQDDTG / (tsnguoi.value - 1));
        }
    }
}
thutu.onchange = function() {
    var test;
    hdkh.forEach(element => {
        if (element.MaHD == select.value) {
            test = element;
        }
    });

    if (tsnguoi.value == 1 && thutu.value == 1) {
        gio.value = test.GioQDDL;
    } else {
        if (thutu.value == 1) {
            gio.value = test.GioQDThu1;
        } else {
            gio.value = parseInt(test.GioQDDTG / (tsnguoi.value - 1));
        }
    }
}
</script>
<?php include 'footer.php'?>