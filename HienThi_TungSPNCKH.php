<?php include 'header.php'?>
<?php include 'db.php' ?>
<?php include 'menu_dn.php'?>
<div class="container">
<?php if(isset($_GET["MaSP"]))
{
    $MaSP=$_GET["MaSP"];
} 
?>
<?php
$res = Database::GetData("SELECT * FROM sanphamnckh Where MaSP = '".$_GET["MaSP"]."'");
?>
    <div class="card">
        <div class="card-header">
            <h2 class="text-danger" style="text-align: center"><b>DANH MỤC SẢN PHẨM NGHIÊN CỨU KHOA HỌC ĐÃ KÊ KHAI</b></h2>
        </div>
        <div class="card-body">
            <table>
                <?php foreach($res as $r) {  ?>
                <tr>
                    
                    <td style="font-size:20px;">
                        
                        <lable><b> Mã sản phẩm: </b><?php echo $r["MaSP"] ?></lable><br>
                        <lable><b> Tên sản phẩm: </b><?php echo $r["TenSP"] ?></lable><br>
                        <lable><b> Trường hợp: </b><?php echo $r["MaTH"] ?></lable><br>
                    </td>
                </tr> <?php } ?>
            </table>
            <br>
            <a href="HienThi_sanphamNCKH.php" class="btn btn-primary">Quay lại</a>
        </div>
    </div>
    <?php include 'footer.php'?>