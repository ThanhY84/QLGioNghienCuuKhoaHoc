<div class="full_container">
    <div class="inner_container">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar_blog_1">
                <div class="sidebar-header">
                    <div class="logo_section">
                        <a href="index.html"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png" alt="#" /></a>
                    </div>
                </div>
                <?php session_start() ?>
                <div class="sidebar_user_info">
                    <div class="icon_setting"></div>
                    <div class="user_profle_side">
                        <?php if(isset($_SESSION["user"]) && $_SESSION["user"] != "") { ?>
                        <div class="user_img"><img class="img-responsive" src="<?=$_SESSION["avatar"]?>" alt="#" />
                        </div>
                        <div class="user_info">

                            <h6><?=$_SESSION["user"]?></h6>
                            <p><span class="online_animation"></span> Online</p>
                        </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
            <div class="sidebar_blog_2">
                <h4>Menu</h4>
                <ul class="list-unstyled components">
                    <li class="active">
                        <a href="index_dn.php"><i class="fa-solid fa-house"></i><span>Trang chủ</span></a>
                    </li>
                    <?php if (isset($_SESSION['role']) && $_SESSION['role']=='0')
                            { ?>
                    <li><a href="HienThi_sanphamNCKH.php"><i class="fa-solid fa-user-pen"></i><span>Kê khai sản phẩm
                                NCKH</span></a></li>
                    <li><a href="HienThi_HoatDongNCKH.php"><i class="fa-solid fa-user-pen"></i><span>Kê khai hoạt
                                động NCKH</span></a></li>
                    <li><a href="HienThi_ChitietSPNCKHCN_admin.php"><i class="fa-solid fa-angles-right"></i><span>Danh
                                mục sản phẩm NCKH</span></a></li>
                    <li><a href="HienThi_ChitietHDNCKHCN_admin.php"><i class="fa-solid fa-angles-right"></i><span>Danh
                                mục hoạt động NCKH</span></a></li>
                    <li><a href="HienThi_TruongHop.php"><i class="fa-solid fa-angles-right"></i><span>Danh mục trường
                                hợp</span></a></li>
                    <li><a href="QL_ChucNangKekhai.php"><i class="fa-solid fa-unlock-keyhole"></i><span>Quản lý chức năng kê khai</span></a></li>

                    <?php } else {?>
                    <li><a href="User_HienThi_sanphamNCKH.php"><i class="fa-solid fa-user-pen"></i><span>Kê khai sản
                                phẩm NCKH</span></a></li>
                    <li><a href="User_HienThi_HoatDongNCKH.php"><i class="fa-solid fa-user-pen"></i><span>Kê khai
                                hoạt động NCKH</span></a></li>
                    <?php }?>
                    <?php if (isset($_SESSION['role']) && $_SESSION['role']=='0')
                            { ?>
                    <li><a href="HienThi_GiangVien.php"><i class="fa-solid fa-people-group"></i><span>Quản lý giảng
                                viên</span></a></li>
                    <li><a href="ql_user.php"><i class="fa-solid fa-users-viewfinder"></i><span>Quản lý
                                người dùng KVC</span></a></li>
                    <li><a href="thongke.php"><i class="fa fa-bar-chart-o"></i><span>Thống kê</span></a></li>
                    <?php } ?>
                    <li>
                        <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa-solid fa-user"></i> <span>Tài khoản</span></a>
                        <ul class="collapse list-unstyled" id="dashboard">
                            <?php if (isset($_SESSION['role']) && $_SESSION['role']=='1')
                            { ?>
                            <li>
                                <a href="thongtintk_vc.php"><i class="fa-solid fa-circle-info"></i><span>Thông tin
                                        tài khoản</span></a>
                            </li>
                            <li>
                                <a href="Sua_TaiKhoan.php"><i class="fa-solid fa-key"></i><span>Đổi mật khẩu</span></a>
                            </li>
                            <?php } else {?>
                            <li>
                                <a href="thongtintk.php"><i class="fa-solid fa-circle-info"></i><span>Thông tin
                                        tài khoản</span></a>
                            </li>
                            <?php }?>
                            <li>
                                <a href="dangxuat.php"><i class="fa-solid fa-right-from-bracket"></i> <span>Đăng
                                        xuất</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- end sidebar -->
        <!-- right content -->
        <div id="content">
            <!-- topbar -->
            <div class="topbar">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section" style="color:white">
                            <a href="https://www.tvu.edu.vn/"><img class="img-responsive" src="img/logotvu.png" alt="logotvu" />QUẢN
                                LÝ GIỜ NGHIÊN CỨU KHOA HỌC CỦA GIẢNG VIÊN | KHOA KỸ THUẬT VÀ CÔNG NGHỆ</a>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- end topbar -->
            <div style="color:FF5722">
                <marquee>Bộ môn Công nghệ Thông tin | Khoa Kỹ thuật và Công nghệ | Trường Đại học Trà Vinh | Số 126 Nguyễn Thiện Thành, Khóm 4,
                    Phường 5, TP. Trà Vinh, tỉnh Trà Vinh | Điện thoại: 02943 603688, 02943 855246-247; Fax: 02943
                    855217 | E-mail: ktcn@tvu.edu.vn</marquee>
            </div>