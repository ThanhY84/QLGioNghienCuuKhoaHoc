<?php include 'header.php'?>
<?php include 'db.php' ?>
<?php include 'menu_dn.php'?>
<div class="container">
    <?php
// Sửa
    if(isset($_POST["duyet"])) {
        $trangthai= isset($_POST["trangthai"]) ? $_POST["trangthai"] : "";
        $macn="";
        $sql = "UPDATE chucnangkekhai SET TrangThaiCN='$trangthai' where MaCN='cn'";

        if(Database::NonQuery($sql)) {
            echo 'Cập nhật thành công';
        }
    }
?>

    <?php
$res = Database::GetData("SELECT* FROM chucnangkekhai");
//var_dump($res)
?>
    <div class="card">
        <div class="card-header">
            <h2 class="text-danger" style="text-align: center"><b>CHỨC NĂNG KÊ KHAI DÀNH CHO GIẢNG VIÊN</b></h2>
        </div>
        <div class="card-body">
            <form action=" " method="POST">
                Trạng thái:<br>
                <input type="radio" name="trangthai" value="1">Mở khóa<br>
                <input type="radio" name="trangthai" value="0">Khóa<br>
                <br><br>
                <input type="submit" class="btn btn-primary" name="duyet" value="Cập nhật">
                <a href=" " class="btn btn-primary">Quay lại</a>
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php'?>