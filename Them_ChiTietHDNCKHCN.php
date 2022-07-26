<?php include 'header.php'?>
<?php include 'db.php' ?>
<?php include 'menu_dn.php'?>
<div class="container">
    <?php
    if(isset($_POST)) {
        $id = "";
        $name = "";
        $math = "";
        if(isset($_POST["id"])) {
            $id = $_POST["id"];
        }
        if(isset($_POST["name"])) {
            $name = $_POST["name"];
        }
        if(isset($_POST["math"])) {
            $math= $_POST["math"];
        }       
        $sql = "insert into hoatdongnckh values ('$id', '$name', '$math')"; 
        if(Database::NonQuery($sql)) {
            echo 'Thêm thành công';
        }
    }   
    ?>
    <h3 style="color:red"><i class="fa-solid fa-calendar-plus" style='font-size:25px;color:red'></i> THÊM DANH MỤC HOẠT
         ĐỘNG NGHIÊN CỨU KHOA HỌC</h3>
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Nhập mã hoạt động:</span>
                </div>
                <input type="text" class="form-control" name="id">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Nhập tên hoạt động:</span>
                </div>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Chọn trường hợp: </span>
                </div>
                <select class="form-control" name="math">
                    <?php
                        $sql = "select * from truonghop";
                        $data = Database::GetData($sql);
                        foreach($data as $row) {
                            echo '<option value="'.$row['MaTH'].'">'.$row['MaTH'].'</option>';
                        }
                    ?>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Thêm</button>
            <a href="HienThi_ChiTietHDNCKHCN_admin.php" class="btn btn-primary">Quay lại</a>
        </form>
    </div>
</div>
<?php include 'footer.php'?>