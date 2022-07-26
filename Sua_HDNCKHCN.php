<?php include 'header.php'?>
<?php include 'db.php' ?>
<?php include 'menu_dn.php'?>
<div class="container">
    <?php if(isset($_GET["ID2"]))
{
    $id=$_GET["ID2"];
} 
?>
    <?php
// Sửa
    if(isset($_POST["suahd"])) {
        $magv = isset($_POST["magv"]) ? $_POST["magv"] : "";
        $mahd = isset($_POST["mahd"]) ? $_POST["mahd"] : "";
        $manh = isset($_POST["manh"]) ? $_POST["manh"] : "";
        $tsnguoi = isset($_POST["tsnguoi"]) ? $_POST["tsnguoi"] : "";
        $thutu = isset($_POST["thutu"]) ? $_POST["thutu"] : "";
        $gio = isset($_POST["gio"]) ? $_POST["gio"] : "";
        $tgnghiemthu = isset($_POST["tgnghiemthu"]) ? $_POST["tgnghiemthu"] : "";
        $minhchung = isset($_POST["minhchung"]) ? $_POST["minhchung"] : "";
        $sql = "UPDATE THUCHIENHDNCKH SET MaGV = '$magv', MaHD='$mahd', MaNH='$manh', TongSoNguoi2='$tsnguoi', ThuTu2='$thutu', TGKeKhai2='$gio', TGianNghiemThu='$tgnghiemthu', MinhChung2='$minhchung '
        WHERE ID2 = '$id'";
        if(Database::NonQuery($sql)) {
            echo 'Cập nhật thành công';
        }
    }
?>
    <?php
$res = Database::GetData("SELECT* FROM thuchienhdnckh WHERE ID2 = '$id'")[0];
//var_dump($res)
?>
    <div class="card">
        <div class="card-header">
            <h2 class="text-danger" style="text-align: center"><b>SỬA DANH MỤC HOẠT ĐỘNG</b></h2>
        </div>
        <div class="card-body">
            <form action=" " method="POST">
                Mã giảng viên: <input type="text" Class="form-control" name="magv" value="<?php echo $res['MaGV'];  ?>"></br>
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
            $sql = "select * from hoatdongnckh where MaHD = 'b-1.1'";
            $data1 = Database::GetData($sql);
             ?>
                    <p id="para"><?=$data1[0]["TenHD"]?></p>
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
                        <span class="input-group-text">Giờ quy đổi: </span>
                    </div>
                    <input type="text" class="form-control" name="gio">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Thời gian nghiệm thu: </span>
                    </div>
                    <input type="date" class="form-control" name="tgnghiemthu" value="<?php echo $res['TGianNghiemThu'];  ?>">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Minh chứng: </span>
                    </div>
                    <input type="text" class="form-control" name="minhchung" value="<?php echo $res['MinhChung2'];  ?>">>
                </div>
                <input type="submit" class="btn btn-primary" name="suahd" value="Sửa">
                <a href="HienThi_HoatDongNCKH.php" class="btn btn-primary">Quay lại</a>
            </form>
        </div>
    </div>
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
// var thang = $('input[name="thang"]')[0];

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
        if (<?=$_SESSION['role']?> == '1') {
            if (thutu.value == 1) {
                gio.value = test.GioQDThu1;
            } else {
                gio.value = parseInt(test.GioQDDTG / (tsnguoi.value - 1));
            }
        } else {
            gio.value = parseInt(test.GioQDKVC / tsnguoi.value);
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
        if (<?=$_SESSION['role']?> == '1') {
            if (thutu.value == 1) {
                gio.value = test.GioQDThu1;
            } else {
                gio.value = parseInt(test.GioQDDTG / (tsnguoi.value - 1));
            }
        } else {
            gio.value = parseInt(test.GioQDKVC / tsnguoi.value);
        }
    }
}
</script>
<?php include 'footer.php'?>