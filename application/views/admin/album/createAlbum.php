<!-- Album -->
<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="container">
    <div class="card">
        <form action="<?= base_url(); ?>admin/album/create_album" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h5 class="card-title mt-4 mb-4" id="">เพิ่มข้อมูลภาพ</h5>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>กลุ่มผลงาน</label>
                            <select class="custom-select" id="port_id" name="port_id">
                                <?php foreach ($get_port as $row) { ?>
                                    <option value="<?php echo $row['port_id'] ?>"><?php echo $row['port_title'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>รูปผลงาน</label>
                            <div class="custom-file">
                                <input type="file" name="albumImg" class="custom-file-input" id="inputGroupFile02">
                                <label class="custom-file-label" for="inputGroupFile02" id="albumImg">เลือกไฟล์รูปภาพ</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-danger" href="<?= base_url('admin/album/'); ?>">ยกเลิก</a>
                    <button type="submit" class="btn btn-success">ยืนยัน</button>
                </div>

            </div>
        </form>
    </div>
</div>

<!-- End Album  -->

<script>
    $('#inputGroupFile02').on('change', function() {
        //get the file name
        var fileName_banner = $(this).val();
        var banner = fileName_banner.replace('C:\\fakepath\\', " ");
        //replace the "Choose a file" label
        $('#albumImg').html(banner);
    })
</script>