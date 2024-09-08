<!-- News -->
<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="container">
    <div class="card">
        <form action="<?= base_url(); ?>admin/news/create_news" onsubmit="return validateForm()" method="post">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h5 class="card-title mt-4 mb-4" id="">เพิ่มข้อมูลข่าวสาร</h5>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>หัวข้อข่าวสาร</label>
                            <input type="text" id="titleNews" name="titleNews" class="form-control" value="" placeholder="หัวข้อข่าวสาร" required />
                        </div>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>เนื้อหา</label>
                            <textarea id="detailNews" name="detailNews" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>วันที่ประกาศ</label>
                            <input type="date" id="dateNews" name="dateNews" class="form-control" value="<?php echo date('Y-m-d'); ?>" placeholder="วันที่ประกาศ" required />
                        </div>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>สถานะ</label>
                            <select class="custom-select" id="status" name="status" required>
                                <option selected>สถานะ...</option>
                                <option value="0">แสดง</option>
                                <option value="1">ไม่แสดง</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2"></div>

                </div>
                <div class="modal-footer">
                    <a type="submit" class="btn btn-danger" href="<?= base_url('admin/news/'); ?>">ยกเลิก</a>
                    <button type="submit" class="btn btn-success">ยืนยัน</button>
                </div>

            </div>
        </form>
    </div>
</div>

<!-- End News Modal -->