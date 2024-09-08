<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <?php if ($this->session->flashdata('result') == 'success') { ?>
                    <div class="alert alert-success" role="alert">
                        <?= $this->session->flashdata('message') ?>
                    </div>
                <?php } ?>
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-main ">-ข้อมููลผู้ใช้-</h6>
                        <div class="dropdown no-arrow">
                            <a href="<?= base_url('admin/admin/add_user') ?>">
                                <button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-plus">&nbsp;เพิ่ม</i></button>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-center" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อผู้ใช้</th>
                                        <th>อีเมล์</th>
                                        <th>สิทธฺิ์การเข้าถึง</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $num = 0;
                                    foreach ($get_user as $row) {
                                        $num++;
                                    ?>
                                        <tr>
                                            <td><?php echo $num; ?></td>
                                            <td><?php echo $row['ad_name']; ?></td>
                                            <td><?php echo $row['ad_user']; ?></td>
                                            <td>
                                                <?php if ($row['ad_status'] == 0) { ?>
                                                    <button type="button" class="btn btn-success">ใช้งานอยู่</button>
                                                <?php
                                                } else { ?>
                                                    <button type="button" class="btn btn-danger">ไม่ใช้งานอยู่</button>
                                                <?php
                                                } ?>
                                            </td>
                                            <td>
                                                <!-- Small button groups (default and split) -->
                                                <div class="btn-group">
                                                    <button class="btn btn-warning-action btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-cog"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="<?= base_url(); ?>admin/admin/view_user/<?php echo $row['ad_id']; ?>">แก้ไขข้อมูล</a>
                                                        <a class="dropdown-item" href="<?= base_url(); ?>admin/admin/del_user/<?php echo $row['ad_id']; ?>">ลบข้อมูล</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Page level plugins -->
    <script src="<?= base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>
    <script src="dashboard_chart.js"></script>