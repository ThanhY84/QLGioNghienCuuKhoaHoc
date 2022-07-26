<?php include 'header.php'?>
<?php include 'menu_dn.php'?>
<?php include 'db.php' ?>
<div class="container">
    <?php
$res = Database::GetData("SELECT *  FROM sanphamnckh, giangvien, thuchienspnckh where sanphamnckh.MaGV = giangvien.MaGV AND sanphamnckh.MaSP = thuchienSPNCKH.MaSP AND Username='" . $_SESSION["user"] . "'");
?>
    <?php
if(isset($_GET["MaSP"])) {
    $res = Database::NonQuery("DELETE FROM sanphamnckh where MaSP = '".$_GET["MaSP"]."'");
}  
?>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="text-danger" style="text-align: center"><b>DANH MỤC SẢN PHẨM NGHIÊN CỨU KHOA HỌC</b></h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Thực hiện</th>
                            <th>Tổng số giờ</th>
                            <th></th>
                            <th width="120"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($res as $r) {  ?>
                        <tr>
                            <td><?php echo $r["MaSP"] ?></td>
                            <td><?php echo $r["TenSP"] ?></td>
                            <td><?php echo $r["TenGV"] ?></td>
                            <td><?php echo $r["TongSoGio"] ?></td>
                            <td><img src="<?php echo $r["MinhChung"] ?>" alt="Không có hình ảnh" width="100" height="100" />
                            </td>
                            <td><a target="_blank" href='<?php echo $r["MinhChungLink"] ?>'></a></td>
                            <td><a href='?MaSP=<?php echo $r["MaSP"] ?>'><i class='fa-solid fa-trash-can'></i></a></td>
                            <td><a href="Sua_ChiTietSPNCKHCN.php?MaSP=<?php echo $r["MaSP"]?>"><i class='fa-solid fa-pen-to-square'></i></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="Them_ChiTietSPNCKHCN.php" class="btn btn-primary">Thêm</a>
                <a href="User_HienThi_ChitietSPNCKHCN_admin.php" class="btn btn-primary">Quay lại</a>

            </div>
        </div>
        <?php include 'footer.php'?>