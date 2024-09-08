<!-- Service -->
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
        <form action="<?= base_url(); ?>admin/service/edit_service/" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $result[0]['service_id']; ?>" />
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h5 class="card-title mt-4 mb-4" id="">แก้ไขข้อมูลบริการ</h5>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>หัวข้อบริการ</label>
                            <input type="text" name="titleService" class="form-control" value="<?= $result[0]['service_title']; ?>">
                        </div>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>เนื้อหาหลัก</label>
                            <input type="text" name="service_sub_tiitle" class="form-control" value="<?= $result[0]['service_sub_tiitle']; ?>">
                        </div>
                    </div>
                    <div class="col-md-2"></div>


                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>รูปภาพ</label>
                            <div class="custom-file">
                                <input type="file" name="imgService" class="custom-file-input" id="imgService">
                                <label class="custom-file-label" for="imgService" id="imgService_text"><?= $result[0]['service_img']; ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>ตำแหน่งการจัดวาง</label>
                            <select class="custom-select" id="group_id" name="group_id">
                                <option selected value="<?= $result[0]['service_group_id']; ?>" style="background-color: #bcbcbc;"><?= $result[0]['group_name']; ?></option>
                                <?php
                                foreach ($get_group as $row) {
                                    if ($row['group_id'] != $result[0]['service_group_id']) { ?>
                                        <option value="<?= $row['group_id']; ?>"><?= $row['group_name']; ?></option>
                                <?php  }
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>ลำดับการแสดง</label>
                            <input type="number" id="service_position" name="service_position" class="form-control" value="<?= $result[0]['service_position']; ?>" placeholder="ลำดับการแสดง" required />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>สีพื้นหลัง</label>
                            <input class="form-control" type="color" id="text_color" name="bg_color" value="<?= $result[0]['service_bg_color']; ?>" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>สีตัวหนังสือ</label>
                            <input class="form-control" type="color" id="text_color" name="text_color" value="<?= $result[0]['service_text_color']; ?>" />
                        </div>
                    </div>
                    <div class="col-md-3"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>รายละเอียด</label>
                            <textarea id="texteditor1" name="detailService" class="form-control"><?= $result[0]['service_detail']; ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-check text-center">
                            <?php if ($result[0]['service_status'] == 1) { ?>
                                <input class="form-check-input" type="checkbox" value="1" name="status" id="status" checked>
                            <?php } else { ?>
                                <input class="form-check-input" type="checkbox" value="1" name="status" id="status">
                            <?php   } ?>
                            <label class="form-check-label" for="defaultCheck1">
                                สถานะการแสดง
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
            <div class="card-footer text-right">
                <a type="submit" class="btn btn-danger" href="<?= base_url('admin/service/'); ?>">ยกเลิก</a>
                <button type="submit" class="btn btn-success">ยืนยัน</button>
            </div>
        </form>
    </div>
</div>

<!-- End Service -->