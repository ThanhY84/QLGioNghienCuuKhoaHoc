<?php include 'header.php'?>
<?php include 'db.php' ?>
<?php include 'menu_dn.php'?>
<div class="container">
    <?php
    if(isset($_POST)) {
        $id = "";
        $name = "";
        $hour = "";
        $hour1 = "";
        $hour2 = ""; 
        $hour3= "";       
        if(isset($_POST["id"])) {
            $id = $_POST["id"];
        }
        if(isset($_POST["name"])) {
            $name = $_POST["name"];
        }
        if(isset($_POST["hour"])) {
            $hour = $_POST["hour"];
        } 
        if(isset($_POST["hour1"])) {
            $hour1 = $_POST["hour1"];
        }  
        if(isset($_POST["hour2"])) {
            $hour2 = $_POST["hour2"];
        }         
        if(isset($_POST["hour3"])) {
            $hour3 = $_POST["hour3"];
        } 
        
        $sql = "insert into truonghop values ('$id', '$name', '$hour', '$hour1', '$hour2', '$hour3')"; 
        if(Database::NonQuery($sql)) {
            echo 'Thêm thành công';
        }
    }   
    ?>
    <h3 style="color:red"><i class="fa-solid fa-calendar-plus" style='font-size:25px;color:red'></i> THÊM TRƯỜNG HỢP</h3>
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Mã trường hợp:</span>
                </div>
                <input type="text" class="form-control" name="id">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Tên trường hợp:</span>
                </div>
                <input type="text" class="form-control" name="name">
            </div>
             <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Giờ tác giả độc lập: </span>
                </div>
                <input type="text" class="form-control" name="hour">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Giờ tác giả thứ nhất: </span>
                </div>
                <input type="text" class="form-control" name="hour1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Giờ đồng tác giả: </span>
                </div>
                <input type="text" class="form-control" name="hour2">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Giờ đồng tác giả 1 không viên chức trường: </span>
                </div>
                <input type="number" class="form-control" name="hour3">
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
            <a href="" class="btn btn-primary">Quay lại</a>
        </form>
    </div>
</div>
<?php include 'footer.php'?>