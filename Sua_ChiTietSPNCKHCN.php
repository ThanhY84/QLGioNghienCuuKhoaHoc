<?php include 'header.php'?>
<?php include 'db.php' ?>
<?php include 'menu_dn.php'?>
<div class="container">
    <?php if(isset($_GET["MaSP"]))
{
    $masp=$_GET["MaSP"];
} 
?>
    <?php
// Sửa
    if(isset($_POST["suachitietsp"])) {
        $tensp = "";
        $masp = "";
        $math = "";
        if(isset($_POST["tensp"])) {
            $tensp = $_POST["tensp"];
        }
        if(isset($_POST["masp"])) {
            $masp = $_POST["masp"];
        }
        if(isset($_POST["math"])) {
            $math = $_POST["math"];
        }        
        $sql = "UPDATE sanphamnckh SET MaSP = '$masp', TenSP='$tensp', MaTH='$math'
        WHERE MaSP = '$masp'";
                    if(Database::NonQuery($sql)) {
                        echo 'Cập nhật thành công';
                    }
                }
            ?>
    <?php
$res = Database::GetData("SELECT* FROM sanphamnckh WHERE MaSP = '$masp'")[0];

?>
    <div class="card">
        <div class="card-header">
            <h2 class="text-danger" style="text-align: center"><b>SỬA DANH MỤC SẢN PHẨM NGHIÊN CỨU KHOA HỌC CÔNG
                    NGHỆ</b></h2>
        </div>
        <div class="card-body">
            <form action=" " method="POST">
                Mã sản phẩm: <input type="text" Class="form-control" name="masp"
                    value="<?php echo $res['MaSP'];  ?>"></br>
                Tên sản phẩm: <input type="text" Class="form-control" name="tensp"
                    value="<?php echo $res['TenSP'];  ?>"></br>
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
                <input type="submit" class="btn btn-primary" name="suachitietsp" value="Cập nhật">
                <a href="HienThi_ChitietSPNCKHCN_admin.php" class="btn btn-primary">Quay lại</a>
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php'?>