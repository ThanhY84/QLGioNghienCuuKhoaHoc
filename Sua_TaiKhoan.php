<?php include 'header.php'?>
<?php include 'db.php' ?>
<?php include 'menu_dn.php'?>
<div class="container">
    <?php if(isset($_GET["MaGV"]))
{
    $magv=$_GET["MaGV"];
} 
?>

    <?php
// Sửa
if(isset($_POST["suatk"])) {
    $magv = isset($_POST["magv"]) ? $_POST["magv"] : "";
    $pass1 = isset($_POST["pass1"]) ? $_POST["pass1"] : "";
    $pass2 = isset($_POST["pass2"]) ? $_POST["pass2"] : "";
    if($pass1 != $pass2)
    {
        $err['pass2'] = 'Mật khẩu nhập lại không đúng!';
    }
    if (empty($err))
{
        $sql = "UPDATE giangvien SET MaGV = '$magv', Pass=sha1('$pass1') WHERE MaGV = '$magv'";
        if(Database::NonQuery($sql)) {
            echo 'Đổi mật khẩu thành công!';
        }
                }
            else echo 'Mật khẩu nhập lại không đúng!'; }
            ?>

    <div class="card">
        <div class="card-header">
            <h2 class="text-danger" style="text-align: center"><b>ĐỔI MẬT KHẨU</b></h2>
        </div>
        <div class="card-body">
            <form action=" " method="POST">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Mã giảng viên:</span>
                    </div>
                    <input type="text" class="form-control" name="magv" value="<?=$_SESSION['magv']?>">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nhập mật khẩu mới:</span>
                    </div>
                    <input type="password" class="form-control" name="pass1">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nhập lại mật khẩu mới :</span>
                    </div>
                    <input type="password" class="form-control" name="pass2">
                </div>
                <input type="submit" class="btn btn-primary" name="suatk" value="Cập nhật">
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php'?>