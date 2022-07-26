<?php include'connect.php' ?>
<?php include'header.php' ?>
<?php include'menu_dn.php' ?>

<?php
// Sửa
    if(isset($_POST["sua"])) {
        $tentk = isset($_POST["tentk"]) ? $_POST["tentk"] : "";
        $hoten = isset($_POST["hoten"]) ? $_POST["hoten"] : "";
        $sdt = isset($_POST["sdt"]) ? $_POST["sdt"] : "";
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $quyen = isset($_POST["quyen"]) ? $_POST["quyen"] : "";

        $sql = "UPDATE taikhoan SET Fullname = '$hoten', Phone = '$sdt', Email = '$email', Role='$quyen' WHERE Username = '$tentk'";
        if($conn->query($sql)) {
            $message = "Cập nhật thành công!";
        }
    }
?>
<?php if(isset($_GET["username"]))
{
    $username=$_GET["username"];
} 
?>
<?php 
$sql="SELECT * FROM taikhoan WHERE Username='$username'";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($result);
?>

<div class="card">
    <?php
        if(isset($message)) {
            echo '<div class="alert alert-success" role="alert">
            '.$message.'
          </div>';
        }
    ?>
    <div class="card-header">
        <h2 class="text-danger" style="text-align: center">SỬA NGƯỜI DÙNG</h2>
    </div>
    <div class="card-body">
        <form method="POST">
            Tên tài khoản: <input type="text" Class="form-control" name="tentk" ReadOnly="true" value="<?=$rows['Username']?>"></br>
            Họ và tên: <input type="text" Class="form-control" name="hoten"
                value="<?php echo $rows['Fullname'];  ?>"></br>
            Số điện thoại: <input type="text" Class="form-control" name="sdt"
                value="<?php echo $rows['Phone'];  ?>"></br>
            Email: <input type="email" Class="form-control" name="email" value="<?=$rows['Email'];  ?>"></br>
            Quyền: <input type="text" Class="form-control" name="quyen"
                value="<?php echo $rows['Role'];  ?>"></br>
            <input type="submit" class="btn btn-primary" name="sua" value="Sửa">
            <a href="ql_user.php" class="btn btn-primary">Quay lại</a>
        </form>      
    </div>
</div>
<?php include'footer.php' ?>