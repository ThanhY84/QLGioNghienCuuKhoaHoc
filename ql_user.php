<?php include 'connect.php' ?>
<?php include 'header.php' ?>
<?php include 'menu_dn.php' ?>
<?php
if(isset($_GET["username"])) {
    $sql = "DELETE FROM taikhoan where Username = '".$_GET["username"]."'";
    mysqli_query($conn,$sql);
}
    
?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="text-danger" style="text-align: center"><b>QUẢN LÝ TÀI KHOẢN KHÔNG PHẢI VIÊN CHỨC CỦA TRƯỜNG</b></h3>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <tr>
                    <th>Tên tài khoản</th>
                    <th>Họ và tên</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php
        $sql="SELECT * FROM taikhoan";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) 
        {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) 
            {echo"
              <tr>
              <td>".$row['Username']."</td>
              <td>".$row['Fullname']."</td>
              <td>".$row['Phone']."</td>
              <td>".$row['Email']."</td>
              <td><a href='admin_sua_user.php?username=".$row['Username']."'><i class='fa-solid fa-pen-to-square'></i>  </a></td>
              <td><a href='?username=".$row['Username']."'><i class='fa-solid fa-trash-can'></i></a></td>
              </tr>";
            }
        } else {
            echo "0 results";
          }  
          mysqli_close($conn);
          ?>
            </table>
        </div>
    </div>
    <a href="admin_them_user.php" class="btn btn-primary">Thêm</a>
    <a href="index_dn.php" class="btn btn-primary">Quay lại</a>
</div>
<!-- <?php
if ($_SESSION['role']=='1')
{?>
    <form action="them_vieclam.php" method="post">
        <button type="submit" class="btn btn-primary">Đăng tin</button>
    </form>
    <?php }?> -->
<?php include 'footer.php' ?>