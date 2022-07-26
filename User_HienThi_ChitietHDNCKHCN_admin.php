<?php include 'header.php'?>
<?php include 'menu_dn.php'?>
<?php include 'db.php' ?>
<div class="container">
    <?php
$res = Database::GetData("SELECT *  FROM hoatdongnckh, giangvien, thuchienHDNCKH where hoatdongnckh.MaGV = giangvien.MaGV AND hoatdongnckh.MaHD = thuchienHDNCKH.MaHD AND Username='" . $_SESSION["user"] . "'");
?>
    <?php
if(isset($_GET["MaHD"])) {
    $res = Database::NonQuery("DELETE FROM hoatdongnckh where MaHD = '".$_GET["MaHD"]."'");
}  
?>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="text-danger" style="text-align: center"><b>DANH MỤC HOẠT ĐỘNG NGHIÊN CỨU KHOA HỌC</b></h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Mã hoạt động</th>
                            <th>Tên hoạt động</th>
                            <th>Thực hiện</th>
                            <th>Tổng số giờ</th>
                            <th></th>
                            <th width="120"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($res as $r) {  ?>
                        <tr>
                            <td><?php echo $r["MaHD"] ?></td>
                            <td><?php echo $r["TenHD"] ?></td>
                            <td><?php echo $r["TenGV"] ?></td>
                            <td><?php echo $r["TSGio"] ?></td>
                            <td><img src="<?php echo $r["MinhChungImg"] ?>" alt="Không có hình ảnh" width="100" height="100" />
                            </td>
                            <td><a target="_blank" href='<?php echo $r["MinhChungLink"] ?>'></a></td>
                            <td><a href='?MaHD=<?php echo $r["MaHD"] ?>'><i class='fa-solid fa-trash-can'></i></a></td>
                            <td><a href="Sua_ChiTietHDNCKHCN.php?MaHD=<?php echo $r["MaHD"]?>"><i class='fa-solid fa-pen-to-square'></i></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <a href="Them_ChiTietHDNCKHCN.php" class="btn btn-primary">Thêm</a>
        <a href="User_HienThi_ChitietHDNCKHCN_admin.php" class="btn btn-primary">Quay lại</a>

    </div>
</div>
<?php include 'footer.php'?>