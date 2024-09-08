<!-- Slide -->
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
        <form action="<?= base_url(); ?>admin/slide/edit_slide" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $result[0]['slider_id']; ?>" />
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h5 class="card-title mt-4 mb-4" id="">แก้ไขข้อมูลภาพสไลด์</h5>
                    </div>
                    <div class="col-md-3"></div>

                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ชื่อรูปภาพ</label>
                            <input type="text" id="slider_name" name="slider_name" class="form-control" value="<?= $result[0]['slider_name']; ?>" placeholder="ชื่อรูปภาพ" />
                        </div>
                    </div>
                    <div class="col-md-3"></div>

                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>รูปภาพ</label>
                            <div class="custom-file">
                                <input type="file" name="slider_img" class="custom-file-input" id="slider_img">
                                <label class="custom-file-label" for="slider_img" id="slider_img_text"><?php echo $result[0]['slider_img']; ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>

                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ลำดับการแสดง</label>
                            <input type="number" id="slider_num" name="slider_num" class="form-control" value="<?= $result[0]['slider_num']; ?>" placeholder="ลำดับการแสดง" required />
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
            <div class="card-footer text-right">
                <a type="submit" class="btn btn-danger" href="<?= base_url('admin/slide/'); ?>">ยกเลิก</a>
                <button type="submit" class="btn btn-success">ยืนยัน</button>
            </div>
        </form>
    </div>
</div>

<!-- End Slider Modal -->

<script>
    $('#slider_img').on('change', function() {
        //get the file name
        var fileName_banner = $(this).val();
        var banner = fileName_banner.replace('C:\\fakepath\\', " ");
        //replace the "Choose a file" label
        $('#slider_img_text').html(banner);
    })
</script>