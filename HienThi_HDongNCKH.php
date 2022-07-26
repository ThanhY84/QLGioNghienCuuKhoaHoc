<?php include 'header.php'?>
<?php include 'db.php' ?>
<?php include 'menu_dn.php'?>
<div class="container">

    <?php
// Lấy dữ liệu là Database::GetData
// Thêm sửa xoá là Database::NonQuery nha
if(isset($_GET["ID"])) {
    $res = Database::NonQuery("DELETE FROM thuchienhdnckh where ID2 = '".$_GET["ID2"]."'");
}  
?>
    <?php                     
    $res = Database::GetData("SELECT * FROM thuchienhdnckh, giangvien, hoatdongnckh WHERE thuchienhdnckh.MaGV=giangvien.MaGV AND thuchienhdnckh.MaHD = hoatdongnckh.MaHD");
?>
    <div class="container">
        <div class="card-header">
            <h3 style="color:red"><i class="fa-solid fa-chalkboard-user" style='font-size:25px;color:red'></i> GIẢNG
                VIÊN QUY ĐỔI GIỜ NCKH BẰNG HOẠT ĐỘNG KH&CN </h3>
        </div>
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
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mã giảng viên</th>
                    <th>Tên hoạt động</th>
                    <th>Năm học</th>
                    <th>Tổng số người</th>
                    <th>Thứ tự</th>
                    <th>Giờ quy đổi</th>
                    <th>Minh chứng</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                        $search = isset($_GET["magv"]) ? " WHERE GIANGVIEN.MaGV LIKE '%".$_GET["magv"]."%' and" : " where ";
                        $sql="SELECT * FROM THUCHIENHDNCKH, GIANGVIEN, HOATDONGNCKH $search THUCHIENHDNCKH.MaGV=GIANGVIEN.MaGV AND THUCHIENHDNCKH.MaHD = HOATDONGNCKH.MaHD ";
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
                    <td><a target="_blank" href='<?php echo $r["MinhChungLink"] ?>'><i class="fa-solid fa-eye"></i></a>
                    </td>
                    <?php if($r["TrangThai"] == "Duyệt") { ?>
                    <td><span class="badge badge-primary"><?php echo $r["TrangThai"] ?></span></td>
                    <?php } else if($r["TrangThai"] == "Không duyệt") { ?>
                    <td><span class="badge badge-secondary"><?php echo $r["TrangThai"] ?></span></td>
                    <?php } else { ?>
                    <td><span class="badge badge-danger"><?php echo $r["TrangThai"] ?></span></td>
                    <?php } ?>

                    <td><a href="HienThi_TungSPNCKH.php?MaSP=<?php echo $r["MaHD"]?>"><i
                                class="fa-solid fa-book-open"></i></td>
                    <td><a href="Sua_SPNCKHCN.php?ID2=<?php echo $r["ID2"] ?>"><i class="fa-solid fa-pen-to-square"></i>
                    </td>
                    <td><a href='?ID2=<?php echo $r["ID2"] ?>'><i class='fa-solid fa-trash-can'></i></a></td>
                    <?php if (isset($_SESSION['role']) && $_SESSION['role']=='0')
                            { ?>
                    <td><a href="Duyet_SPNCKHCN.php?ID=<?php echo $r["ID2"]?>"><i
                                class="fa-solid fa-clipboard-check"></i></td>
                    <?php } ?>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="Them_HDongNCKHCN.php" class="btn btn-primary">Thêm</a>
        <a href="index_dn.php" class="btn btn-primary">Quay lại</a>
    </div>
</div>
<?php include 'footer.php'?>