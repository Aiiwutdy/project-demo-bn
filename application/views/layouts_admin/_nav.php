<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!-- Sidebar -->
<ul class="navbar-nav backgroud-nav  sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>admin/admin/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fab fa-app-store"></i>
        </div>
        <div class="sidebar-brand-text mx-4">-next software-</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-1">

    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url(); ?>admin/contrack/" data-toggle=" collapse" data-target="#Contrack" aria-expanded="true" aria-controls="Contrack">
            <i class="fas fa-building"></i>
            <span>ข้อมูลบริษัท</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url(); ?>admin/intity/" data-toggle=" collapse" data-target="#Intity" aria-expanded="true" aria-controls="Intity">
            <i class="fas fa-heading"></i>
            <span>ข้อมูลแต่ละหัวข้อ</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#PhotoSilder" aria-expanded="true" aria-controls="PhotoSilder">
            <i class="fas fa-photo-video"></i>
            <span>ภาพสไลด์</span>
        </a>
        <div id="PhotoSilder" class="collapse" aria-labelledby="PhotoSilder" data-parent="#accordionSidebar">
            <div class="backgroud-nav-side py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url(); ?>admin/slide/">รายการทั้งหมด</a>
                <a class="collapse-item" href="<?= base_url(); ?>admin/slide/add_slide/">เพิ่มรายการ</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Service" aria-expanded="true" aria-controls="Service">
            <i class="fab fa-servicestack"></i>
            <span>ข้อมูลบริการ</span>
        </a>
        <div id="Service" class="collapse" aria-labelledby="Service" data-parent="#accordionSidebar">
            <div class="backgroud-nav-side py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url(); ?>admin/service/">รายการทั้งหมด</a>
                <a class="collapse-item" href="<?= base_url(); ?>admin/service/add_service/">เพิ่มรายการ</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Product" aria-expanded="true" aria-controls="Product">
            <i class="fas fa-cart-arrow-down"></i>
            <span>ข้อมูลสินค้า</span>
        </a>
        <div id="Product" class="collapse" aria-labelledby="Product" data-parent="#accordionSidebar">
            <div class="backgroud-nav-side py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url(); ?>admin/product/">รายการทั้งหมด</a>
                <a class="collapse-item" href="<?= base_url(); ?>admin/product/add_product/">เพิ่มรายการ</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Online_Marketing" aria-expanded="true" aria-controls="Online_Marketing">
            <i class="fas fa-globe"></i>
            <span>ข้อมูลการตลาดออนไลน์</span>
        </a>
        <div id="Online_Marketing" class="collapse" aria-labelledby="Online_Marketing" data-parent="#accordionSidebar">
            <div class="backgroud-nav-side py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url(); ?>admin/online_marketing/">รายการทั้งหมด</a>
                <a class="collapse-item" href="<?= base_url(); ?>admin/online_marketing/add_online_marketing">เพิ่มรายการ</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Port" aria-expanded="true" aria-controls="Port">
            <i class="fas fa-images"></i>
            <span>ข้อมูลผลงาน</span>
        </a>
        <div id="Port" class="collapse" aria-labelledby="Port" data-parent="#accordionSidebar">
            <div class="backgroud-nav-side py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url(); ?>admin/port/">รายการทั้งหมด</a>
                <a class="collapse-item" href="<?= base_url(); ?>admin/port/add_port/">เพิ่มรายการ</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Admin" aria-expanded="true" aria-controls="Admin">
            <i class="fas fa-users"></i>
            <span>ข้อมููลผู้ใช้</span>
        </a>
        <div id="Admin" class="collapse" aria-labelledby="Admin" data-parent="#accordionSidebar">
            <div class="backgroud-nav-side py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url(); ?>admin/admin/">รายการทั้งหมด</a>
                <a class="collapse-item" href="<?= base_url(); ?>admin/admin/add_user/">เพิ่มรายการ</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Group" aria-expanded="true" aria-controls="Service">
            <i class="fas fa-cog"></i>
            <span>ตั้งค่า</span>
        </a>
        <div id="Group" class="collapse" aria-labelledby="Group" data-parent="#accordionSidebar">
            <div class="backgroud-nav-side py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url(); ?>admin/group/"> <i class="fas fa-map-pin"></i> ตำแหน่งการจัดวาง</a>
            </div>
        </div>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Gallery" aria-expanded="true" aria-controls="Gallery">
            <i class="fas fa-image"></i>
            <span>ข้อมูลภาพ</span>
        </a>
        <div id="Gallery" class="collapse" aria-labelledby="Gallery" data-parent="#accordionSidebar">
            <div class="backgroud-nav-side py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url(); ?>admin/album/">รายการทั้งหมด</a>
                <a class="collapse-item" href="<?= base_url(); ?>admin/album/add_album/">เพิ่มรายการ</a>
            </div>
        </div>
    </li> -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#News" aria-expanded="true" aria-controls="News">
            <i class="fas fa-newspaper"></i>
            <span>ข้อมูลข่าวสาร</span>
        </a>
        <div id="News" class="collapse" aria-labelledby="News" data-parent="#accordionSidebar">
            <div class="backgroud-nav-side py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url(); ?>admin/news/">รายการทั้งหมด</a>
                <a class="collapse-item" href="<?= base_url(); ?>admin/news/add_news/">เพิ่มรายการ</a>
            </div>
        </div>
    </li> -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Navber" aria-expanded="true" aria-controls="Navber">
            <i class="fas fa-photo-video"></i>
            <span>เมนู</span>
        </a>
        <div id="Navber" class="collapse" aria-labelledby="Navber" data-parent="#accordionSidebar">
            <div class="backgroud-nav-side py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url(); ?>admin/navbar/">รายการทั้งหมด</a>
                <a class="collapse-item" href="<?= base_url(); ?>admin/navbar/add_navbar/">เพิ่มรายการ</a>
            </div>
        </div>
    </li> -->
</ul>
<!-- End of Sidebar -->