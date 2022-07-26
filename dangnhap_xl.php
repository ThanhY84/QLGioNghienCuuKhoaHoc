<?php include 'connect.php' ?>
<?php session_start(); ?>
<?php
//lấy dữ kiệu từ form lên
$u=$_POST['username'];
$p=$_POST['password'];
//Truy vấn dữ liệu
$sql="SELECT * FROM taikhoan WHERE Username = '$u' and Password = sha1('$p')";
//$sql="SELECT * FROM tbluser, tblhosouv WHERE tbluser.Username = tblhosouv.TaiKhoan AND username = '$u' and password = sha1('$p')";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc ($query);
$checkuser = mysqli_num_rows($query);
//Thực thi
if ($checkuser == 1) {
      $_SESSION['user'] = $u;
      $_SESSION['role'] = $data['Role'];
      $_SESSION['avatar'] = $data['Avatar'];
      if($data['Role']==0)
      {
        header("location:index_dn.php");
      }
      else if($data['Role']==1)
      {
        header("location:index_dn.php");
      }     
      else {
        header("location:index_dn.php");
      }
  }
else 
{
  echo "Tài khoản hoặc mật khẩu không hợp lệ!";
}
  
  mysqli_close($conn);
  ?>