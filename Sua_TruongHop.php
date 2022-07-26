<?php include 'header.php'?>
<?php include 'db.php' ?>
<?php include 'menu_dn.php'?>
<div class="container">
    <?php if(isset($_GET["MaTH"]))
{
    $math=$_GET["MaTH"];
} 
?>
    <?php
// Sửa
    if(isset($_POST["suath"])) {
        $math = isset($_POST["math"]) ? $_POST["math"] : "";
        $tenth = isset($_POST["tenth"]) ? $_POST["tenth"] : "";
        $gioqddl = isset($_POST["gioqddl"]) ? $_POST["gioqddl"] : "";
        $gioqdt1 = isset($_POST["gioqdt1"]) ? $_POST["gioqdt1"] : "";
        $gioqddtg = isset($_POST["gioqddtg"]) ? $_POST["gioqddtg"] : "";
        $gioqdkvc = isset($_POST["gioqdkvc"]) ? $_POST["gioqdkvc"] : "";
        $sql = "UPDATE truonghop SET MaTH = '$math', TenTruongHop='$tenth', GioQDDL='$gioqddl', GioQDThu1='$gioqdt1', GioQDDTG='$gioqddtg', GioQDKVC='$gioqdkvc'
        WHERE MaTH = '$math'";
                    if(Database::NonQuery($sql)) {
                        echo 'Cập nhật thành công';
                    }
                }
   ?>
    <?php
$res = Database::GetData("SELECT* FROM TRUONGHOP WHERE MaTH = '$math'")[0];
?>
    <div class="card">
        <div class="card-header">
            <h2 class="text-danger" style="text-align: center"><b>SỬA TRƯỜNG HỢP</b></h2>
        </div>
        <div class="card-body">
            <form method="POST">
                Mã trường hợp: <input type="text" Class="form-control" name="math"
                    value="<?php echo $res['MaTH'];  ?>"></br>
                Tên trường hợp: <input type="text" Class="form-control" name="tenth"
                    value="<?php echo $res['TenTruongHop'];  ?>"></br>
                Giờ quy đổi tác giả độc lập:<input type="number" Class="form-control" name="gioqddl"
                    value="<?php echo $res['GioQDDL'];  ?>"></br>
                Giờ quy đổi tác giả thứ nhất:<input type="text" Class="form-control" name="gioqdt1"
                    value="<?php echo $res['GioQDThu1'];  ?>"></br>
                Giờ quy đổi đồng tác giả:<input type="number" Class="form-control" name="gioqddtg"
                    value="<?php echo $res['GioQDDTG'];  ?>"></br>
                Giờ quy đổi không viên chức: <input type="number" Class="form-control" name="gioqdkvc"
                    value="<?php echo $res['GioQDKVC'];  ?>"></br>
                <input type="submit" class="btn btn-primary" name="suath" value="Cập nhật">
                <a href=" " class="btn btn-primary">Quay lại</a>
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php'?>