<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<nav class="navbar navbar-expand-lg navbar-white ">
  <a class="navbar-brand  logo-nav" href="<?= base_url(); ?>" style="color:aliceblue">
    <img src="<?= base_url('assets/img/admin/') . $contrack[0]['ct_logo']; ?>" alt="" class="d-block" />
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-bars"></i>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url(); ?>">หน้าหลัก <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/get_about') ?>">เกี่ยวกับ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/get_service') ?>">บริการ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/get_product') ?>">สินค้า</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/get_port') ?>">ผลงาน</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#contact">ติดต่อ</a>
      </li>
    </ul>
  </div>
</nav>