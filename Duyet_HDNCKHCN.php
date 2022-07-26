<?php include 'header.php'?>
<?php include 'db.php' ?>
<?php include 'menu_dn.php'?>
<div class="container">
    <?php if(isset($_GET["ID2"]))
{
    $ID2=$_GET["ID2"];
} 
?>
    <?php
// Sửa
    if(isset($_POST["duyet"])) {
        $trangthai= isset($_POST["trangthai"]) ? $_POST["trangthai"] : "";
        $sql = "UPDATE thuchienhdnckh SET TrangThai2='$trangthai' WHERE ID2 = '$ID2'";
        if(Database::NonQuery($sql)) {
            echo 'Duyệt thành công';
        }  
    }
?>

    <?php
$res = Database::GetData("SELECT* FROM THUCHIENHDNCKH WHERE ID2 = '$ID2'")[0];
//var_dump($res)
?>
    <div class="card">
        <div class="card-header">
            <h2 class="text-danger" style="text-align: center"><b>DUYỆT HOẠT ĐỘNG NGHIÊN CỨU KHOA HỌC</b></h2>
        </div>
        <div class="card-body">
            <form action=" " method="POST">
                STT: <input type="text" Class="form-control" name="id" ReadOnly="true"
                    value="<?php echo $res['ID2'];  ?>"></br>
                Mã giảng viên: <input type="text" Class="form-control" name="magv" ReadOnly="true"
                    value="<?php echo $res['MaGV'];  ?>"></br>
                Mã hoạt động: <input type="text" Class="form-control" name="mahd" ReadOnly="true"
                    value="<?php echo $res['MaHD'];  ?>"></br>
                Năm học: <input type="text" Class="form-control" name="namhoc" ReadOnly="true"
                    value="<?php echo $res['MaNH'];  ?>"></br>
                Tổng số người: <input type="text" Class="form-control" name="tsnguoi" ReadOnly="true"
                    value="<?php echo $res['TongSoNguoi2'];  ?>"></br>
                Thứ tự: <input type="text" Class="form-control" name="thutu" ReadOnly="true"
                    value="<?php echo $res['ThuTu2'];  ?>"></br>
                Trạng thái:<br>
                <input type="radio" name="trangthai" value="Duyệt">Duyệt<br>
                <input type="radio" name="trangthai" value="Không duyệt">Không duyệt<br>
                <br><br>
                <input type="submit" class="btn btn-primary" name="duyet" value="Cập nhật">
                <a href="HienThi_HoatDongNCKH.php" class="btn btn-primary">Quay lại</a>
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php'?>