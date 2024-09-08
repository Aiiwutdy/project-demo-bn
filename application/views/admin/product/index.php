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
                        <h6 class="m-0 font-weight-bold text-main ">-ข้อมูลสินค้า-</h6>
                        <div class="dropdown no-arrow">
                            <a href="<?= base_url('admin/product/add_product') ?>">
                                <button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-plus">&nbsp;เพิ่ม</i></button>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-center " id="dataTable">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>สินค้า</th>
                                        <th>ราคา</th>
                                        <th>ตำแหน่งรูป</th>
                                        <th>ลำดับการแสดง</th>
                                        <th>สถานะ</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $num = 0;
                                    foreach ($get_product as $row) {
                                        $num++;
                                    ?>
                                        <tr>
                                            <td><?php echo $num; ?></td>
                                            <td>
                                                <img src="<?= base_url('assets/img/admin/') . $row['product_img']; ?> " alt="" width="100px">
                                                <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $row['product_name']; ?></span>
                                            </td>
                                            <td><?php echo $row['product_price']; ?></td>
                                            <td>
                                                <?php if ($row['product_layout_position'] == 0) {
                                                    echo 'ด้านซ้าย';
                                                } else {
                                                    echo 'ด้านขวา';
                                                } ?>
                                            </td>
                                            <td><?php echo $row['product_num']; ?></td>
                                            <td>
                                                <?php if ($row['product_status'] == 1) { ?>
                                                    <button type="button" class="btn btn-success">แสดง</button>
                                                <?php
                                                } else { ?>
                                                    <button type="button" class="btn btn-danger">ไม่แสดง</button>
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
                                                        <a class="dropdown-item" href="<?= base_url(); ?>admin/product/view_product/<?php echo $row['product_id']; ?>">แก้ไขข้อมูล</a>
                                                        <a class="dropdown-item" href="<?= base_url(); ?>admin/product/del_product/<?php echo $row['product_id']; ?>">ลบข้อมูล</a>
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