<?php include 'header.php'?>
<?php include 'db.php' ?>
<?php include 'menu_dn.php'?>
<div class="container">
    <?php
     if(isset($_POST)) {
        $magv = "";
        $masp = "";
        $tensanpham = "";
        $manh = "";
        $tsnguoi = "";
        $thutu = "";
        $gio = "";
        $tgnghiemthu = "";
        $id ="";
        $user ="";
        $minhchung = "";
        $trangthai= "Chưa duyệt";
        $thang = "";
   
        if(isset($_POST["magv"])) {
            $magv = $_POST["magv"];
        }
        if(isset($_POST["masp"])) {
        $masp = $_POST["masp"];
        }
        if(isset($_POST["tensanpham"])) {
            $tensanpham = $_POST["tensanpham"];
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
       if(isset($_POST["thang"])) {
                $thang = $_POST["thang"];
            }
        $sql = "insert into thuchienspnckh values ('$thutu','$gio','$magv','$manh','$masp', '$id', '$trangthai','$tsnguoi','$user', '$tensanpham', '$tgnghiemthu', '$minhchung','$thang')";
        if(Database::NonQuery($sql)) {
            echo 'Thêm thành công';
        }
    }
    ?>
    <h3 style="color:red"><i class="fa-solid fa-calendar-plus" style='font-size:25px;color:red'></i> THÊM KÊ KHAI GIỜ
        NGHIÊN CỨU KHOA HỌC BẰNG SẢN PHẨM NCKH</h3>
    <form method="POST">
        <?php if (isset($_SESSION['role']) && $_SESSION['role']=='0')
                            { ?>
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
        <?php } else {?>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Giảng viên: </span>
            </div>
            <input type="text" Class="form-control" name="magv" ReadOnly="true" value="<?=$_SESSION['magv']?>"></br>
            <input type="text" Class="form-control" name="user" ReadOnly="true" value="<?=$_SESSION['user']?>"></br>
        </div>
        <?php }?>
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
                <span class="input-group-text">Chọn danh mục sản phẩm: </span>
            </div>
            <?php
                        $sql = "SELECT * FROM `truonghop`, `sanphamnckh` WHERE `truonghop`.`MaTH` = `sanphamnckh`.`MaTH`";
                        $sanphamnckhs = Database::GetData($sql);
                        ?>
            <select class="form-control" name="masp">
                <?php
                        foreach($sanphamnckhs as $row) {
                            echo '<option value="'.$row['MaSP'].'">'.$row['MaSP'].'</option>';
                        }
                    ?>
            </select>
        </div>
        <div class="input-group mb-3">
            <?php
            $sql = "select * from sanphamnckh where MaSP = 'a-1-a'";
            $data1 = Database::GetData($sql);
             ?>
            <p id="para"><?=$data1[0]["TenSP"]?></p>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Tên sản phẩm:</span>
            </div>
            <input type="text" class="form-control" name="tensanpham">
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
            <input type="number" class="form-control" name="thutu" min="1" value="1">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Tháng: </span>
            </div>
            <input type="number" class="form-control" name="thang" min="0">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Giờ quy đổi: </span>
            </div>
            <input type="text" class="form-control" name="gio">
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
        <button type="submit" class="btn btn-primary">Thêm</button>
        <a href="HienThi_sanphamNCKH.php" class="btn btn-primary">Quay lại</a>
    </form>
</div>
<script>
var select = $('select[name="masp"]')[0];
var spkh = <?=json_encode($sanphamnckhs);?>

select.onchange = function() {
    spkh.forEach(element => {
        if (element.MaSP == select.value) {
            $("#para").html(element.TenSP);
        }
    });
}
var tsnguoi = $('input[name="tsnguoi"]')[0];
var thutu = $('input[name="thutu"]')[0];
var gio = $('input[name="gio"]')[0];
var thang = $('input[name="thang"]')[0];

tsnguoi.onchange = function() {
    var test;
    spkh.forEach(element => {
        if (element.MaSP == select.value) {
            test = element;
        }
    });
    if (tsnguoi.value == 1 && thutu.value == 1) {
        gio.value = test.GioQDDL;
    } else {
        if (<?=$_SESSION['role']?> == '1') {
            if (thutu.value == 1) {
                gio.value = test.GioQDThu1;
            } else {
                gio.value = Math.round(test.GioQDDTG / (tsnguoi.value - 1));
            }
        } else {
            gio.value = Math.round(test.GioQDKVC / tsnguoi.value);
        }
    }
}
thutu.onchange = function() {
    var test;
    spkh.forEach(element => {
        if (element.MaSP == select.value) {
            test = element;
        }
    });
    if (tsnguoi.value == 1 && thutu.value == 1) {
        gio.value = test.GioQDDL;
    } else {
        console.log($_SESSION['role']);
        if (<?=$_SESSION['role']?> == '1') {
            if (thutu.value == 1) {
                gio.value = test.GioQDThu1;
            } else {
                gio.value = Math.round(test.GioQDDTG / (tsnguoi.value - 1));
            }
        } else {
            gio.value = Math.round(test.GioQDKVC / tsnguoi.value);
        }
    }
}
thang.onchange = function() {
    var test;
    spkh.forEach(element => {
        if (element.MaSP == select.value) {
            test = element;
        }
    });
    if (thutu.value <= tsnguoi.value) {
        if (<?=$_SESSION['role']?> == '1') {
            if (thang.value >= 9) {
                gio.value = test.GioQDDL;
            } else {
                gio.value = Math.round(thang.value * test.GioQDDTG);
            }
        } else {
            gio.value = Math.round(thang.value * test.GioQDKVC);
        }
    }
}
</script>
<?php include 'footer.php'?>