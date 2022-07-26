<?php include 'header.php'?>
<?php include 'db.php' ?>
<?php include 'menu_dn.php'?>
<div class="container">

    <?php
if(isset($_GET["ID2"])) {
    $res = Database::NonQuery("DELETE FROM thuchienhdnckh where ID2 = '".$_GET["ID2"]."'");
}  
?>
    <?php
$res = Database::GetData("SELECT * FROM thuchienhdnckh, giangvien, hoatdongnckh WHERE thuchienhdnckh.MaGV=giangvien.MaGV AND thuchienhdnckh.MaHD = hoatdongnckh.MaHD");
//var_dump($res)
?>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="text-danger" style="text-align: center"><b>KÊ KHAI GIỜ NGHIÊN CỨU KHOA HỌC BẰNG HOẠT ĐỘNG NGHIÊN CỨU KHOA HỌC</b></h3>
            </div>
            <div class="card-body">
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Chọn giảng viên: </span>
                        </div>
                        <select class="form-control" name="magv">
                            <?php
                        $sql = "select * from giangvien";
                        $data = Database::GetData($sql);
                        foreach($data as $row) {
                            echo '<option value="'.$row['MaGV'].'">'.$row['TenGV'].'</option>';
                        }
                    ?>
                        </select>
                        <input type="submit" class="btn btn-light" value="Tìm">
                    </div>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Giảng viên</th>
                            <th>Tên hoạt động</th>
                            <th>Năm học</th>
                            <th>Tổng số người</th>
                            <th>Thứ tự</th>
                            <th>Giờ quy đổi</th>
                            <th>Minh chứng</th>
                            <th>Trạng thái</th>
                            <th>a</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                 $search = isset($_GET["magv"]) ? " WHERE giangvien.MaGV LIKE '%".$_GET["magv"]."%' and" : " where ";
                 $sql="SELECT * FROM thuchienhdnckh, giangvien, hoatdongnckh $search thuchienhdnckh.MaGV=giangvien.MaGV AND thuchienhdnckh.MaHD = hoatdongnckh.MaHD ";
                 $res = Database::GetData($sql);
                foreach($res as $r) {  ?>
                        <tr>
                            <td><?php echo $r["ID2"] ?></td>
                            <td><?php echo $r["TenGV"] ?></td>
                            <td><?php echo $r["TenHD"] ?>
                            <td><?php echo $r["MaNH"] ?></td>
                            <td><?php echo $r["TongSoNguoi2"] ?></td>
                            <td><?php echo $r["ThuTu2"] ?></td>
                            <td><?php echo round ($r["TGKeKhai2"] , 2) ?></td>
                            <td><a target="_blank" href='<?php echo $r["MinhChung"] ?>'><i class="fa-solid fa-eye"></i></a>
                            </td>
                            <?php if($r["TrangThai2"] == "Duyệt") { ?>
                            <td><span class="badge badge-primary"><?php echo $r["TrangThai2"] ?></span></td>
                            <?php } else if($r["TrangThai2"] == "Không duyệt") { ?>
                            <td><span class="badge badge-secondary"><?php echo $r["TrangThai2"] ?></span></td>
                            <?php } else { ?>
                            <td><span class="badge badge-danger"><?php echo $r["TrangThai2"] ?></span></td>
                            <?php } ?>
                            <td><a href="HienThi_TungHDNCKH.php?MaHD=<?php echo $r["MaHD"]?>"><i class="fa-solid fa-book-open"></i></td>
                            <td><a href="Sua_HDNCKHCN.php?ID2=<?php echo $r["ID2"] ?>"><i class="fa-solid fa-pen-to-square"></i>
                            </td>
                            <td><a href='?ID2=<?php echo $r["ID2"] ?>'><i class='fa-solid fa-trash-can'></i></a></td>
                            <?php if (isset($_SESSION['role']) && $_SESSION['role']=='0')
                            { ?>
                            <td><a href="Duyet_HDNCKHCN.php?ID2=<?php echo $r["ID2"]?>"><i class="fa-solid fa-clipboard-check"></i></td>
                            <?php } ?>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php if($data=='2'){?>
        <a href="Them_SPNCKHCN.php" class="btn btn-primary"><i class="fa-solid fa-lock-open"></i>Thêm</a>
        <?php }else {?>
        <a href="" class="btn btn-primary"><i class="fa-solid fa-lock"></i>Thêm</a>
        <?php } ?>
        <a href="index_dn.php" class="btn btn-primary">Quay lại</a>
    </div>
</div>
<?php include 'footer.php'?>