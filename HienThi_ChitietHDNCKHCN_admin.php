<?php include 'header.php'?>
<?php include 'menu_dn.php'?>
<?php include 'db.php' ?>
<div class="container">


    <?php
if(isset($_GET["MaHD"])) {
    $res = Database::NonQuery("DELETE FROM hoatdongnckh where MaHD = '".$_GET["MaHD"]."'");
}  
?>

    <?php
$res = Database::GetData("SELECT *  FROM hoatdongnckh, truonghop where hoatdongnckh.MaTH = truonghop.MaTH");
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
                            <th>Trường hợp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($res as $r) {  ?>
                        <tr>
                            <td><?php echo $r["MaHD"] ?></td>
                            <td><?php echo $r["TenHD"] ?></td>
                            <td><?php echo $r["MaTH"] ?></td>
                            <td><a href='?MaHD=<?php echo $r["MaHD"] ?>'><i class='fa-solid fa-trash-can'></i></a></td>
                            <td><a href="Sua_ChTietHDNCKHCN.php?MaHD=<?php echo $r["MaHD"]?>"><i class='fa-solid fa-pen-to-square'></i></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <a href="Them_ChiTietHDNCKHCN.php" class="btn btn-primary">Thêm</a>
        <a href="HienThi_ChitietHDNCKHCN_admin.php" class="btn btn-primary">Quay lại</a>

    </div>
</div>
<?php include 'footer.php'?>