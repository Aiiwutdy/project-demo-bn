<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="container">
    <?php if ($this->session->flashdata('result') == 'fail') { ?>
        <div class="alert alert-danger" role="alert">
            <?= $this->session->flashdata('message') ?>
        </div>
    <?php } else if ($this->session->flashdata('error') == 'duplicate') { ?>
        <div class="alert alert-danger" role="alert">
            <?= $this->session->flashdata('message') ?>
        </div>
    <?php }  ?>
    <div class="card">
        <form action="<?= base_url(); ?>admin/admin/edit_user/" onsubmit="return validateForm()" method="post">
            <input type="hidden" name="id" value="<?= $result[0]['ad_id']; ?>" />
            <input type="hidden" name="o_password" value="<?= $result[0]['ad_pass']; ?>" />

            <div class="card-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h5 class="card-title mt-4 mb-4" id="">แก้ไขข้อมูลผู้ใช้</h5>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>อีเมล์</label>
                            <input type="email" id="email" name="email" class="form-control" value="<?= $result[0]['ad_user']; ?>" readonly placeholder="อีเมล์" required />
                        </div>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>รหัสผ่าน</label>
                            <input type="password" id="password" name="password" class="form-control" value="" placeholder="รหัสผ่าน" />
                        </div>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>ชื่อผู้ใช้</label>
                            <input type="text" id="name" name="name" class="form-control" value="<?= $result[0]['ad_name']; ?>" placeholder="ชื่อผู้ใช้" required />
                        </div>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>สิทธฺิ์การเข้าถึง</label>
                            <select class="custom-select" id="status" name="status" value="<?= $result[0]['ad_status']; ?>" required>
                                <?php if ($result[0]['ad_status'] == 0) {
                                    $success1 = "selected";
                                    $success2 = "";

                                    // echo 'ใช้งานอยู่';
                                } else {
                                    $success1 = "";
                                    $success2 = "selected";
                                    // echo 'ยกเลิกใช้งานอยู่';
                                }  ?>
                                <option value="0" <?= $success1; ?>>ใช้งานอยู่</option>
                                <option value="1" <?= $success2; ?>>ยกเลิกใช้งานอยู่</option>

                            </select>
                        </div>
                        <div class="col-md-2"></div>

                    </div>
                </div>

            </div>
            <div class="card-footer text-right">
                <a type="submit" class="btn btn-danger" href="<?= base_url('admin/admin/'); ?>">ยกเลิก</a>
                <button type="submit" class="btn btn-success">ยืนยัน</button>
            </div>
        </form>
    </div>
</div>