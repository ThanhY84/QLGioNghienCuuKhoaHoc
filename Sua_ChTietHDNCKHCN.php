<?php include 'header.php'?>
<?php include 'db.php' ?>
<?php include 'menu_dn.php'?>
<div class="container">
<?php if(isset($_GET["MaHD"]))
{
    $mahd=$_GET["MaHD"];
} 
?>
<?php
// Sửa
    if(isset($_POST["suachitiethd"])) {
        $mahd = "";
        $tenhd = "";
        $math = "";
        if(isset($_POST["mahd"])) {
            $mahd = $_POST["mahd"];
        }
        if(isset($_POST["tenhd"])) {
            $tenhd = $_POST["tenhd"];
        }
        if(isset($_POST["math"])) {
            $math = $_POST["math"];
        }        
        $sql = "UPDATE hoatdongnckh SET MaHD = '$mahd', TenHD='$tenhd', MaTH='$math'
        WHERE MaHD = '$mahd'";
        if(Database::NonQuery($sql)) {
            echo 'Cập nhật thành công';
        }
     }
?>
<?php
$res = Database::GetData("SELECT* FROM hoatdongnckh WHERE MaHD = '$mahd'")[0];
?>
    <div class="card">
        <div class="card-header">
            <h2 class="text-danger" style="text-align: center"><b>SỬA DANH MỤC HOẠT ĐỘNG NGHIÊN CỨU KHOA HỌC CÔNG
                    NGHỆ</b></h2>
        </div>
        <div class="card-body">
            <form action=" " method="POST">
                Mã danh mục: <input type="text" Class="form-control" name="mahd"
                    value="<?php echo $res['MaHD'];  ?>"></br>
                Tên hoạt động: <input type="text" Class="form-control" name="tenhd"
                    value="<?php echo $res['TenHD'];  ?>"></br>
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

                <input type="submit" class="btn btn-primary" name="suachitiethd" value="Cập nhật">
                <a href="HienThi_ChitietSPNCKHCN_admin.php" class="btn btn-primary">Quay lại</a>
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php'?>