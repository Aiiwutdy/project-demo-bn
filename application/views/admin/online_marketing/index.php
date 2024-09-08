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
                        <h6 class="m-0 font-weight-bold text-main ">-ข้อมูล การตลาดออนไลน์</h6>
                        <div class="dropdown no-arrow">
                            <a href="<?= base_url('admin/online_marketing/add_online_marketing') ?>">
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
                                        <th>การตลาดออนไลน์</th>
                                        <th>สถานะ</th>
                                        <th>ลำดับการแสดง</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $num = 0;
                                    foreach ($get_online_marketing as $row) {
                                        $num++;
                                    ?>
                                        <tr>
                                            <td><?php echo $num; ?></td>
                                            <td class="text-left">
                                                <img src="<?= base_url('assets/img/admin/') . $row['om_img']; ?> " alt="" width="100px">
                                                <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $row['om_title']; ?></span>
                                            </td>
                                            <td><?php echo $row['om_num']; ?></td>
                                            <td>
                                                <?php if ($row['om_status'] == 1) { ?>
                                                    <button type="button" class="btn btn-success">แสดง</button>
                                                <?php
                                                } else { ?>
                                                    <button type="button" class="btn btn-danger">ไม่แสดง</button>
                                                <?php
                                                } ?>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-warning-action btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-cog"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="<?= base_url(); ?>admin/online_marketing/view_online_marketing/<?php echo $row['om_id']; ?>">แก้ไขข้อมูล</a>
                                                        <a class="dropdown-item" href="<?= base_url(); ?>admin/online_marketing/del_online_marketing/<?php echo $row['om_id']; ?>">ลบข้อมูล</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php  } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>