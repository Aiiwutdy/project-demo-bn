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
                        <h6 class="m-0 font-weight-bold text-main ">-ข้อมูลผลงานของบริษัท-</h6>
                        <div class="dropdown no-arrow">
                            <a href="<?= base_url('admin/port/add_port') ?>">
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
                                        <th>ผลงาน</th>
                                        <th>ลำดับการแสดง</th>
                                        <th>สถานะการแสดง</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $num = 0;
                                    foreach ($get_port as $row) {
                                        $num++;
                                    ?>
                                        <tr>
                                            <td><?php echo $num; ?></td>
                                            <td class="text-left">
                                                <img src="<?= base_url('assets/img/admin/') . $row['port_img']; ?> " alt="<?php echo $row['port_title']; ?>" width="100px">
                                                <?php echo $row['port_title']; ?>
                                            </td>
                                            <td><?php echo $row['port_num']; ?></td>
                                            <td>
                                                <?php if ($row['port_status'] == 1) { ?>
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
                                                        <a class="dropdown-item" href="<?= base_url(); ?>admin/port/view_port/<?php echo $row['port_id']; ?>">แก้ไขข้อมูล</a>
                                                        <a class="dropdown-item" href="<?= base_url(); ?>admin/port/del_port/<?php echo $row['port_id']; ?>">ลบข้อมูล</a>
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