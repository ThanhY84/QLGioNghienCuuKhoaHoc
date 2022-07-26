<?php include 'header.php'?>
<?php include 'connect.php'?>
<?php include 'menu_dn.php'?>
<?php 
$sql="SELECT * FROM taikhoan WHERE Username='$_SESSION[user]'";
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
                    <i class="fa-solid fa-user"></i>: <label for="fname"><?php echo $rows['Fullname'];  ?></label><br>
                    <i class="fa-solid fa-phone"></i>: <label for="fname"><?php echo $rows['Phone'];  ?></label><br>
                    <i class="fa-solid fa-envelope"></i>: <label for="fname"><?php echo $rows['Email'];  ?></label>
                </td>
            </tr>
        </table>
    </div>
</div>
<?php include 'footer.php'?>