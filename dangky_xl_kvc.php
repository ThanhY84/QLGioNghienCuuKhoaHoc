<?php include 'connect.php' ?>

<?php
//lấy dữ kiệu từ form lên
$image_path = '';
if($_FILES['avt']["name"] != "") {
            $image_size = $_FILES['avt']['size'];
            $image_path = "avatar/" .  $_FILES['avt']['name'];
            move_uploaded_file($_FILES['avt']['tmp_name'], $image_path);
 }
$err=[];
$user=$_POST['user'];
$pass1=$_POST['pass1'];
$pass2=$_POST['pass2'];
$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$role='2';
//Kiểm tra
if(empty($user))
{
  $err['user'] = 'Bạn chưa nhập tên tài khoản';
}
if(empty($name))
{
  $err['name'] = 'Bạn chưa nhập họ tên';
}
if(empty($phone))
{
  $err['phone'] = 'Bạn chưa nhập số điện thoại';
}
if(empty($email))
{
  $err['email'] = 'Bạn chưa nhập email';
}
if($pass1 != $pass2)
{
  $err['pass2'] = 'Mật khẩu nhập lại không đúng!';
}
if (empty($err))
{
          $sql="INSERT INTO taikhoan(Username, Password, Fullname, Phone, Email, Role, Avatar) VALUES ('$user', sha1('$pass1'), '$name', '$phone', '$email',2,'$image_path')";
        //Thực th
        if (mysqli_query($conn, $sql)) 
        {
          echo "Thêm thành công!";
          header("location:dangnhap.php");
        } else 
        { 
          echo "Thêm thất bại!";
        }
}


mysqli_close($conn);
?>