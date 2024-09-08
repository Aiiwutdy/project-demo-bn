<!-- Port -->
<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="container">
    <?php if ($this->session->flashdata('result') == 'fail') { ?>
        <div class="alert alert-danger" role="alert">
            <?= $this->session->flashdata('message') ?>
        </div>
    <?php } else if ($this->session->flashdata('result') == 'duplicate') {
    ?> <div class="alert alert-danger" role="alert">
            <?= $this->session->flashdata('message') ?>
        </div>
    <?php } ?>
    <div class="card">
        <form action="<?= base_url(); ?>admin/port/edit_port" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $result[0]['port_id']; ?>" />
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h5 class="card-title mt-4 mb-4" id="">แก้ไขข้อมูลผลงาน</h5>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>หัวข้อหลัก</label>
                            <input type="text" id="port_title" name="port_title" class="form-control" value="<?= $result[0]['port_title']; ?>" placeholder="หัวข้อหลัก" required />
                        </div>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>เนื้อหาย่อย</label>
                            <input type="text" id="port_sub_title" name="port_sub_title" class="form-control" value="<?= $result[0]['port_sub_title']; ?>" placeholder="เนื้อหาย่อย" required />
                        </div>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>รูปภาพ</label>
                            <div class="custom-file">
                                <input type="file" name="port_img" class="custom-file-input" id="port_img">
                                <label class="custom-file-label" for="port_img" id="port_img_text"><?= $result[0]['port_img']; ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>ลำดับการแสดง</label>
                            <input type="number" id="port_num" name="port_num" class="form-control" value="<?= $result[0]['port_num']; ?>" placeholder="ลำดับการแสดง" required />
                        </div>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>รายละเอียด</label>
                            <textarea id="texteditor" name="port_detail" class="form-control"><?= $result[0]['port_detail']; ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-check text-center">
                            <?php if ($result[0]['port_status'] == 1) { ?>
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
                <a type="submit" class="btn btn-danger" href="<?= base_url('admin/port/'); ?>">ยกเลิก</a>
                <button type="submit" class="btn btn-success">ยืนยัน</button>
            </div>
        </form>
    </div>
</div>

<!-- End Port  -->

<script>
    $('#port_img').on('change', function() {
        //get the file name
        var fileName_banner = $(this).val();
        var banner = fileName_banner.replace('C:\\fakepath\\', " ");
        //replace the "Choose a file" label
        $('#port_img_text').html(banner);
    })
</script>