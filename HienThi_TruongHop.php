<?php include 'header.php'?>
<?php include 'menu_dn.php'?>
<?php include 'db.php' ?>
<div class="container">
    <div class="container">
        <?php if(isset($_GET["MaTH"]))
{
    $MaTH=$_GET["MaTH"];
} 
?>
        <?php
if(isset($_GET["MaTH"])) {
    $res = Database::NonQuery("DELETE FROM truonghop where MaTH = '".$_GET["MaTH"]."'");
}  
?>
        <?php
$res = Database::GetData("SELECT *  FROM truonghop");
?>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-danger" style="text-align: center"><b>DANH MỤC TRƯỜNG HỢP</b></h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Mã trường hợp</th>
                                <th>Tên trường hợp</th>
                                <th>Giờ quy đổi tác giả độc lập</th>
                                <th>Giờ quy đổi tác giả thứ nhất</th>
                                <th>Giờ quy đổi đồng tác giả</th>
                                <th>Giờ quy đổi tác giả không phải viên chức của trường</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($res as $r) {  ?>
                            <tr>
                                <td><?php echo $r["MaTH"] ?></td>
                                <td><?php echo $r["TenTruongHop"] ?></td>
                                <td><?php echo $r["GioQDDL"] ?></td>
                                <td><?php echo $r["GioQDThu1"] ?></td>
                                <td><?php echo $r["GioQDDTG"] ?></td>
                                <td><?php echo $r["GioQDKVC"] ?></td>
                                <td><a href='?MaTH=<?php echo $r["MaTH"] ?>'><i class='fa-solid fa-trash-can'></i></a></td>
                                <td><a href="Sua_TruongHop.php?MaTH=<?php echo $r["MaTH"]?>"><i class='fa-solid fa-pen-to-square'></i></a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <a href="Them_TruongHop.php" class="btn btn-primary">Thêm</a>
            <a href=" " class="btn btn-primary">Quay lại</a>
        </div>
    </div>
    <?php include 'footer.php'?>