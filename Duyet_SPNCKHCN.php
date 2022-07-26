<?php include 'header.php'?>
<?php include 'db.php' ?>
<?php include 'menu_dn.php'?>
<div class="container">
    <?php if(isset($_GET["ID"]))
{
    $ID=$_GET["ID"];
} 
?>
    <?php
// Sửa
    if(isset($_POST["duyet"])) {
        $trangthai= isset($_POST["trangthai"]) ? $_POST["trangthai"] : "";
        $sql = "UPDATE thuchienspnckh SET TrangThai='$trangthai' WHERE ID = '$ID'";
        if(Database::NonQuery($sql)) {
            echo 'Duyệt thành công';
        }
    }
?>

    <?php
$res = Database::GetData("SELECT* FROM thuchienspnckh WHERE ID = '$ID'")[0];
//var_dump($res)
?>
    <div class="card">
        <div class="card-header">
            <h2 class="text-danger" style="text-align: center"><b>DUYỆT BÀI NGHIÊN CỨU KHOA HỌC</b></h2>
        </div>
        <div class="card-body">
            <form action=" " method="POST">
                STT: <input type="text" Class="form-control" name="id" ReadOnly="true"
                    value="<?php echo $res['ID'];  ?>"></br>
                Mã giảng viên: <input type="text" Class="form-control" name="magv" ReadOnly="true"
                    value="<?php echo $res['MaGV'];  ?>"></br>
                Mã sản phẩm: <input type="text" Class="form-control" name="masp" ReadOnly="true"
                    value="<?php echo $res['MaSP'];  ?>"></br>
                Năm học: <input type="text" Class="form-control" name="namhoc" ReadOnly="true"
                    value="<?php echo $res['MaNH'];  ?>"></br>
                Tổng số người: <input type="text" Class="form-control" name="tsnguoi" ReadOnly="true"
                    value="<?php echo $res['TongSoNguoi'];  ?>"></br>
                Thứ tự: <input type="text" Class="form-control" name="thutu" ReadOnly="true"
                    value="<?php echo $res['ThuTu'];  ?>"></br>
                Giờ quy đổi: <input type="text" Class="form-control" name="gioqd" ReadOnly="true"
                    value="<?php echo $res['GioQuyDoi'];  ?>"></br>
                Trạng thái:<br>
                <input type="radio" name="trangthai" value="Duyệt">Duyệt<br>
                <input type="radio" name="trangthai" value="Không duyệt">Không duyệt<br>
                <br><br>
                <input type="submit" class="btn btn-primary" name="duyet" value="Cập nhật">
                <a href="HienThi_sanphamNCKH.php" class="btn btn-primary">Quay lại</a>
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php'?>