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
        <form action="<?= base_url(); ?>admin/service/create_service" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h5 class="card-title mt-4 mb-4" id="">เพิ่มข้อมูลบริการ</h5>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>หัวข้อบริการ</label>
                            <input type="text" name="titleService" class="form-control" value="" placeholder="หัวข้อบริการ" required>
                        </div>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>เนื้อหาหลัก</label>
                            <input type="text" name="service_sub_tiitle" class="form-control" value="" placeholder="เนื้อหาหลัก" required>
                        </div>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>รูปภาพ</label>
                            <div class="custom-file">
                                <input type="file" name="imgService" class="custom-file-input" id="imgService" required>
                                <label class="custom-file-label" for="imgService" id="imgService_text">เลือกไฟล์รูปภาพ</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>ตำแหน่งการจัดวาง</label>
                            <select class="custom-select" id="group_id" name="group_id" required>
                                <option selected>เลือกตำแหน่ง</option>
                                <?php
                                foreach ($get_group as $row) {
                                ?>
                                    <option value="<?= $row['group_id']; ?>"><?= $row['group_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>ลำดับการแสดง</label>
                            <input type="number" id="service_position" name="service_position" class="form-control" value="" placeholder="ลำดับการแสดง" required />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>สีพื้นหลัง</label>
                            <input class="form-control" type="color" id="text_color" name="bg_color" value="" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>สีตัวหนังสือ</label>
                            <input class="form-control" type="color" id="text_color" name="text_color" value="" />
                        </div>
                    </div>
                    <div class="col-md-3"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>รายละเอียด</label>
                            <textarea id="texteditor1" name="detailService" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-check text-center">
                            <?php if ($get_service[0]['service_status'] == 1) { ?>
                                <input class="form-check-input" type="checkbox" value="1" name="status" id="status">
                            <?php } else { ?>
                                <input class="form-check-input" type="checkbox" value="0" name="status" id="status">
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

<script>
    $('#imgService').on('change', function() {
        //get the file name
        var fileName_banner = $(this).val();
        var banner = fileName_banner.replace('C:\\fakepath\\', " ");
        //replace the "Choose a file" label
        $('#imgService_text').html(banner);
    })
</script>