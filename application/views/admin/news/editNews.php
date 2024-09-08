<!-- News -->
<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="container">
    <div class="card">
        <form action="<?= base_url(); ?>admin/news/edit_news" onsubmit="return validateForm()" method="post">
            <input type="hidden" name="id" value="<?= $result[0]['new_id']; ?>" />
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h5 class="card-title mt-4 mb-4" id="">แก้ไขข้อมูลข่าวสาร</h5>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>หัวข้อข่าวสาร</label>
                            <input type="text" id="titleNews" name="titleNews" class="form-control" value="<?= $result[0]['new_title']; ?>" placeholder="หัวข้อข่าวสาร" required />
                        </div>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>เนื้อหา</label>
                            <textarea id="detailNews" name="detailNews" class="form-control" value="<?= $result[0]['new_detail']; ?>" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>วันที่ประกาศ</label>
                            <input type="date" id="dateNews" name="dateNews" class="form-control" value="<?= $result[0]['new_date']; ?>" placeholder="วันที่ประกาศ" required />
                        </div>
                    </div>
                    <div class="col-md-2"></div>

                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>สถานะ</label>
                            <select class="custom-select" id="status" name="status" value="<?= $result[0]['new_status']; ?>" required>
                                <?php if ($result[0]['new_status'] == 0) {
                                    $success1 = "selected";
                                    $success2 = "";

                                    // echo 'ใช้งานอยู่';
                                } else {
                                    $success1 = "";
                                    $success2 = "selected";
                                    // echo 'ยกเลิกใช้งานอยู่';
                                }  ?>
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