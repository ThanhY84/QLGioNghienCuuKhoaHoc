<?php include 'header.php'?>
<?php include 'db.php' ?>
<?php include 'menu_dn.php'?>
<?php
$res = Database::GetData("SELECT * FROM GiangVien");
//var_dump($res)
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="text-danger" style="text-align: center"><b>DANH SÁCH GIẢNG VIÊN</b></h2>
        </div>
        <div class="card-body">
            <form action="" method="get">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Tìm kiếm giảng viên: </span>
                    </div>
                    <div class="input-group-prepend">
                        <input type="text" class="form-control" style="width:500px" name="search" placeholder="Nhập tên giảng viên">
                    </div>
                    <button type="submit" class="btn btn-link"><i style="color:red" class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>

            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>Mã</th>
                        <th>Họ và tên</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Dân tộc</th>
                        <th>Địa chỉ</th>
                        <th>SĐT</th>
                        <th>Email</th>
                        <th>Hình ảnh</th>
                    </tr>
                </thead>
                <tbody>
        </div>
    </div>
    <?php
        $search = isset($_GET["search"]) ? " WHERE TenGV LIKE '%".$_GET["search"]."%'" : "";
        $sql="SELECT * FROM giangvien $search";
        $res = Database::GetData($sql);
            foreach($res as $r) {  ?>
    <tr>
        <td><?php echo $r["MaGV"] ?></td>
        <td><?php echo $r["TenGV"] ?></td>
        <td><?php echo $r["NgaySinhGV"] ?></td>
        <td><?php echo $r["GioiTinhGV"] ?></td>
        <td><?php echo $r["DanTocGV"] ?></td>
        <td><?php echo $r["DiaChiGV"] ?></td>
        <td><?php echo $r["SDT"] ?></td>
        <td><?php echo $r["Mail"] ?></td>

        <td><img src="<?php echo $r["Picture"] ?>" width="70" height="70" /></td>
    </tr>
    <?php } ?>
    </tbody>
    </table>
    <a href="Them_GiangVien_admin.php" class="btn btn-primary">Thêm</a>
</div>
<?php include 'footer.php'?>