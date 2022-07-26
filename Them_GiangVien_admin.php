<?php include 'header.php'?>
<?php include 'db.php' ?>
<?php include 'menu_dn.php'?>
<div class="container">
    <?php
    // Add images
    $image_path = '';
    if (isset($_FILES['Picture'])) {
        $image_size = $_FILES['Picture']['size'];
        $image_path = 'picture/' . $_FILES['Picture']['name'];
        move_uploaded_file($_FILES['Picture']['tmp_name'], $image_path);
    }

    if(isset($_POST)) {
        $magv = "";
        $pass1="";
        $pass2="";
        $name = "";
        $date = "";
        $gtinh = "";
        $dtoc = "";
        $dchi = "";
        $sdt= "";
        $mail = "";
        $mabm = "";
        $role='1';

        if(isset($_POST["magv"])) {
            $magv = $_POST["magv"];
        }
        if(isset($_POST["pass1"])) {
            $pass1 = $_POST["pass1"];
        }
        if(isset($_POST["pass2"])) {
            $pass2 = $_POST["pass2"];
        }
        if(isset($_POST["name"])) {
            $name = $_POST["name"];
        }
        if(isset($_POST["date"])) {
            $date = $_POST["date"];
        }
        if(isset($_POST["gtinh"])) {
            $gtinh = $_POST["gtinh"];
        }
        if(isset($_POST["dtoc"])) {
            $dtoc= $_POST["dtoc"];
        }
        if(isset($_POST["dchi"])) {
            $dchi = $_POST["dchi"];
        }
        if(isset($_POST["sdt"])) {
            $sdt = $_POST["sdt"];
        }
        if(isset($_POST["mail"])) {
            $mail = $_POST["mail"];
        }
        if(isset($_POST["mabm"])) {
            $mabm = $_POST["mabm"];
        }
        if($pass1 != $pass2)
        {
            $err['pass2'] = 'Mật khẩu nhập lại không đúng!';
        }
        $sql = "insert into giangvien values ('$magv','$name', '$date', '$gtinh', '$dtoc', '$dchi', '$sdt', '$mail','$mabm','$image_path',sha1('$pass1'),'$role')";
        if(Database::NonQuery($sql)) {
            echo 'Thêm thành công';
        }
    }   
    ?>
    <div class="card">
        <div class="card-header">
            <h3 style="color:red ; text-align: center"><i style='font-size:25px;color:red'></i><b>ĐĂNG KÝ</b></h3>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Mã giảng viên:</span>
                    </div>
                    <input type="text" class="form-control" name="magv">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nhập mật khẩu:</span>
                    </div>
                    <input type="password" class="form-control" name="pass1">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nhập lại mật khẩu:</span>
                    </div>
                    <input type="password" class="form-control" name="pass2">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nhập họ tên:</span>
                    </div>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nhập ngày sinh:</span>
                    </div>
                    <input type="date" class="form-control" name="date">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Giới tính: </span>
                    </div>
                    <input type="radio" id="nam" name="gtinh" value="Nam">
                    <label for="nam">Nam</label><br>
                    <input type="radio" id="nu" name="gtinh" value="Nữ">
                    <label for="nu">Nữ</label><br>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Dân tộc: </span>
                    </div>
                    <input type="text" class="form-control" name="dtoc">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Địa chỉ: </span>
                    </div>
                    <input type="text" class="form-control" name="dchi">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Số điện thoại: </span>
                    </div>
                    <input type="number" class="form-control" name="sdt">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Mail: </span>
                    </div>
                    <input type="email" class="form-control" name="mail">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Bộ môn: </span>
                    </div>
                    <select class="form-control" name="mabm">
                        <?php
                        $sql = "select * from bomon";
                        $data = Database::GetData($sql);
                        foreach($data as $row) {
                            echo '<option value="'.$row['MaBM'].'">'.$row['TenBM'].'</option>';
                        }
                    ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Ảnh:</span>
                    </div>
                    <input type="file" class="form-control" name="Picture">
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
                <a href="HienThi_GiangVien.php" class="btn btn-primary">Quay lại</a>
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php'?>