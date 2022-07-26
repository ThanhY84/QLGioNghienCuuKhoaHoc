<?php include'connect.php' ?>
<?php include'header.php' ?>
<?php
 $image_path = '';
         if($_FILES['avt']["name"] != "") {
             $image_size = $_FILES['avt']['size'];
             $image_path = "avatar/" .  $_FILES['avt']['name'];
       move_uploaded_file($_FILES['avt']['tmp_name'], $image_path);
        }
?>
<?php
    if(isset($_POST["them"]))
    {
        $name=$_POST[tentk];
        $p1=$_POST[pass1];
        $p2=$_POST[pass2];
        $ht=$_POST[hoten];
        $dt=$_POST[sdt];
        $e=$_POST[email];
        if($name!=null && $p1==$p2 && $p1!=null && $ht!=null &&$dt!=null && $e!=null)
        {
            $sql="INSERT INTO taikhoan (Username, Password, Fullname, Phone, Email) VALUES ('$name', sha1('$pass1'),'$ht','$dt','$e')";
            $result = $conn->query($sql);
            header("location:ql_user.php");
        }
    }

?>