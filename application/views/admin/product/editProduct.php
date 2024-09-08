<!-- Product -->
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
        <form action="<?= base_url(); ?>admin/product/edit_product" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $result[0]['product_id']; ?>" />
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h5 class="card-title mt-4 mb-4" id="">แก้ไขข้อมูลสินค้า</h5>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>ชื่อสินค้า</label>
                            <input type="text" id="productName" name="productName" class="form-control" value="<?= $result[0]['product_name']; ?>" placeholder="ชื่อสินค้า" required />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>เนื้อหาย่อย</label>
                            <input type="text" id="product_sub_name" name="product_sub_name" class="form-control" value="<?= $result[0]['product_sub_name']; ?>" placeholder="เนื้อหาย่อย" required />
                        </div>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>ราคา</label>
                            <input type="text" id="productPrice" name="productPrice" class="form-control" value="<?= $result[0]['product_price']; ?>" placeholder="ราคา" required />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>รูปภาพ</label>
                            <div class="custom-file">
                                <input type="file" name="productImg" class="custom-file-input" id="productImg">
                                <label class="custom-file-label" for="productImg" id="productImg_text"><?= $result[0]['product_img']; ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>ตำแหน่งรูป</label>
                            <select class="custom-select" id="product_layout" name="product_layout" value="<?= $result[0]['product_layout_position']; ?>" required>
                                <?php if ($result[0]['product_layout_position'] == 0) {
                                    $success1 = "selected";
                                    $success2 = "";

                                    // echo 'ด้านซ้าย';
                                } else {
                                    $success1 = "";
                                    $success2 = "selected";
                                    // echo 'ด้านขวา';
                                }  ?>
                                <option value="0" <?= $success1; ?>>ด้านซ้าย</option>
                                <option value="1" <?= $success2; ?>>ด้านขวา</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>ลำดับการแสดง</label>
                            <input type="number" id="product_num" name="product_num" class="form-control" value="<?= $result[0]['product_num']; ?>" placeholder="ลำดับการแสดง" required />
                        </div>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>รายละเอียด</label>
                            <textarea id="texteditor" name="productDetail" class="form-control" value=""><?= $result[0]['product_detail']; ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-check text-center">
                            <?php if ($result[0]['product_status'] == 1) { ?>
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
                <a type="submit" class="btn btn-danger" href="<?= base_url('admin/product/'); ?>">ยกเลิก</a>
                <button type="submit" class="btn btn-success">ยืนยัน</button>
            </div>
        </form>
    </div>
</div>

<!-- End Product  -->


<script>
    $('#productImg').on('change', function() {
        //get the file name
        var fileName_banner = $(this).val();
        var banner = fileName_banner.replace('C:\\fakepath\\', " ");
        //replace the "Choose a file" label
        $('#productImg_text').html(banner);
    })
</script>