<?php include 'header.php'?>
<?php include 'db.php' ?>
<?php include 'menu_dn.php'?>
<div class="container">
<?php if(isset($_GET["MaHD"]))
{
    $MaHD=$_GET["MaHD"];
} 
?>
<?php
$res = Database::GetData("SELECT * FROM hoatdongnckh Where MaHD = '".$_GET["MaHD"]."'");
?>
    <div class="card">
        <div class="card-header">
            <h2 class="text-danger" style="text-align: center"><b>HIỂN THỊ HOẠT ĐỘNG NGHIÊN CỨU KHOA HỌC</b></h2>
        </div>
        <div class="card-body">
            <table>
                <?php foreach($res as $r) {  ?>
                <tr>
                    <td style="font-size:20px;">
                        
                        <lable><b> Mã hoạt động: </b><?php echo $r["MaHD"] ?></lable><br>
                        <lable><b> Tên hoạt động: </b><?php echo $r["TenHD"] ?></lable><br>
                        <lable><b> Trường hợp: </b><?php echo $r["MaTH"] ?></lable><br>
                        
                    </td>
                </tr> <?php } ?>
            </table>
            <br>
            <a href="HienThi_HoatDongNCKH.php" class="btn btn-primary">Quay lại</a>
        </div>
    </div>
    <?php include 'footer.php'?>