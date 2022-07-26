<?php include 'header.php'?>
<?php include 'connect.php'?>
<?php include 'menu_dn.php'?>
<?php 
$sql="SELECT * FROM giangvien, bomon WHERE giangvien.MaBM = bomon.MaBM AND TenGV='$_SESSION[user]'";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($result);
?>
<div class="card">
    <div class="card-header">
        <h2 class="text-danger" style="text-align: center"><b>THÔNG TIN TÀI KHOẢN</b></h2>
    </div>
    <div class="card-body">
        <table>
            <tr>
            
                <td><img src="<?=$_SESSION["avatar"]?>" alt="anhdaidien" width='110px';></td>
                <td>***</td>
                <td>
                    <label for="fname"><?=$_SESSION["user"]?></label><br>
                    Mã giảng viên: <label for="fname"><?php echo $rows['MaGV'];  ?></label><br>
                    Họ tên giảng viên: <label for="fname"><?php echo $rows['TenGV'];  ?></label><br>
                    Số điện thoại: <label for="fname"><?php echo $rows['SDT'];  ?></label><br>
                    Mail: <label for="fname"><?php echo $rows['Mail'];  ?></label><br>
                    Bộ môn: <label for="fname"><?php echo $rows['MaBM'];  ?></label>
                </td>
            </tr>
        </table>
    </div>
</div>
<?php include 'footer.php'?>