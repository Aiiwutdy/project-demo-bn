<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <!-- <img src="<?php base_url(); ?> assets/img/admin/6.jpg" alt="รูปโปร์ไฟล์" class="image-admin" width="40" /> -->
                <span class="mr-2 d-none d-lg-inline title_user mx-2">
                    Administrator
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <!-- <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    ข้อมูลส่วนตัว
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    กำหนดสิทธิ์
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    ประวัติการใช้งาน
                </a>
                <div class="dropdown-divider"></div> -->
                <a class="dropdown-item" href="<?= base_url() ?>Auth/logout" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    ออกจากระบบ
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->