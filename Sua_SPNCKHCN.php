<?php include 'header.php'?>
<?php include 'db.php' ?>
<?php include 'menu_dn.php'?>
<div class="container">
    <?php if(isset($_GET["ID"]))
{
    $id=$_GET["ID"];
} 
?>
    <?php
// Sửa
    if(isset($_POST["suabd"])) {
        $magv = isset($_POST["magv"]) ? $_POST["magv"] : "";
        $masp = isset($_POST["masp"]) ? $_POST["masp"] : "";
        $manh = isset($_POST["manh"]) ? $_POST["manh"] : "";
        $tsnguoi = isset($_POST["tsnguoi"]) ? $_POST["tsnguoi"] : "";
        $thutu = isset($_POST["thutu"]) ? $_POST["thutu"] : "";
        $thang = isset($_POST["thang"]) ? $_POST["thang"] : "";
        $gio = isset($_POST["gio"]) ? $_POST["gio"] : "";
        $tgnghiemthu = isset($_POST["tgnghiemthu"]) ? $_POST["tgnghiemthu"] : "";
        $minhchung = isset($_POST["minhchung"]) ? $_POST["minhchung"] : "";
        
        $sql = "UPDATE thuchienspnckh SET MaGV = '$magv', MaSP='$masp', MaNH='$manh', TongSoNguoi='$tsnguoi', ThuTu='$thutu', GioQuyDoi='$gio', TGNghiemThu='$tgnghiemthu', MinhChung= '$minhchung', Thang = '$thang'
        WHERE ID = '$id'";
        if(Database::NonQuery($sql)) {
            echo 'Cập nhật thành công';
        }
    }
?>

    <?php
$res = Database::GetData("SELECT* FROM thuchienspnckh WHERE ID = '$id'")[0];
//var_dump($res)
?>
    <div class="card">
        <div class="card-header">
            <h2 class="text-danger" style="text-align: center"><b>SỬA</b></h2>
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
                    <input type="number" class="form-control" name="thang" min="0" value="0">
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
                    <input type="date" class="form-control" name="tgnghiemthu" value="<?php echo $res['TGNghiemThu'];  ?>">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Minh chứng: </span>
                    </div>
                    <input type="text" class="form-control" name="minhchung" value="<?php echo $res['MinhChung'];  ?>">
                </div>
                <input type="submit" class="btn btn-primary" name="suabd" value="Sửa">
            </form>
        </div>
    </div>
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