<?php include 'connect.php' ?>
<?php session_start(); ?>
<?php
//lấy dữ kiệu từ form lên
$u=$_POST['username'];
$p=$_POST['password'];
//Truy vấn dữ liệu
$sql="SELECT * FROM giangvien WHERE MaGV = '$u' and Pass = sha1('$p')";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc ($query);
$checkuser = mysqli_num_rows($query);
//Thực thi
if ($checkuser == 1) {
      $_SESSION['user'] = $data['TenGV'];
      $_SESSION['magv'] = $data['MaGV'];
      $_SESSION['role'] = $data['Quyen'];
      $_SESSION['avatar'] = $data['Picture'];
      if($data['Quyen']==0)
      {
        header("location:index_dn.php");
      }
      else if($data['Quyen']==1)
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