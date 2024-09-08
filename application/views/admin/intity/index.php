<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <?php if ($this->session->flashdata('result') == 'success') { ?>
                    <div class="alert alert-success" role="alert">
                        <?= $this->session->flashdata('message') ?>
                    </div>
                <?php } else if ($this->session->flashdata('result') == 'fail') { ?>
                    <div class="alert alert-warning" role="alert">
                        <?= $this->session->flashdata('message') ?>
                    </div>
                <?php } else if ($this->session->flashdata('error') == 'duplicate') { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $this->session->flashdata('message') ?>
                    </div>
                <?php }  ?>
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-main ">-ข้อมูลบริษัทแต่ละหัวข้อ-</h6>
                        <div class="dropdown no-arrow">
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <?php if ($get_intity == null) { ?>
                            <form action="<?= base_url('admin/intity/create_intity'); ?>" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>หัวข้อหลักข้อมูลบริการ</label>
                                                <input type="text" id="service" name="service" class="form-control" value="" placeholder="หัวข้อหลักข้อมูลบริการ" required />
                                            </div>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>เนื้อหาย่อยข้อมูลบริการ</label>
                                                <input type="text" id="sub_service" name="sub_service" class="form-control" value="" placeholder="เนื้อหาย่อยข้อมูลบริการ" required />
                                            </div>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>หัวข้อหลักข้อมูลการตลาดออนไลน์</label>
                                                <input type="text" id="online_marketing" name="online_marketing" class="form-control" value="" placeholder="หัวข้อหลักข้อมูลการตลาดออนไลน์" required />
                                            </div>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>เนื้อหาย่อยข้อมูลการตลาดออนไลน์</label>
                                                <input type="text" id="sub_online_marketing" name="sub_online_marketing" class="form-control" value="" placeholder="เนื้อหาย่อยข้อมูลการตลาดออนไลน์" required />
                                            </div>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>หัวข้อหลักข้อมูลผลงาน</label>
                                                <input type="text" id="port" name="port" class="form-control" value="" placeholder="หัวข้อหลักข้อมูลผลงาน" required />
                                            </div>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>เนื้อหาย่อยข้อมูลผลงาน</label>
                                                <input type="text" id="sub_port" name="sub_port" class="form-control" value="" placeholder="เนื้อหาย่อยข้อมูลผลงาน" required />
                                            </div>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                    </form>
                <?php   } else { ?>
                    <form action="<?= base_url('admin/intity/edit_intity'); ?>" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>หัวข้อหลักข้อมูลบริการ</label>
                                        <input type="text" id="service" name="service" class="form-control" value="<?= $get_intity[0]['intity_service']; ?>" placeholder="หัวข้อหลักข้อมูลบริการ" required />
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>เนื้อหาย่อยข้อมูลบริการ</label>
                                        <input type="text" id="sub_service" name="sub_service" class="form-control" value="<?= $get_intity[0]['intity_sub_service']; ?>" placeholder="เนื้อหาย่อยข้อมูลบริการ" required />
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>หัวข้อหลักข้อมูลการตลาดออนไลน์</label>
                                        <input type="text" id="online_marketing" name="online_marketing" class="form-control" value="<?= $get_intity[0]['intity_online_marketing']; ?>" placeholder="หัวข้อหลักข้อมูลการตลาดออนไลน์" required />
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>เนื้อหาย่อยข้อมูลการตลาดออนไลน์</label>
                                        <input type="text" id="sub_online_marketing" name="sub_online_marketing" class="form-control" value="<?= $get_intity[0]['intity_sub_online_marketing']; ?>" placeholder="เนื้อหาย่อยข้อมูลการตลาดออนไลน์" required />
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>หัวข้อหลักข้อมูลผลงาน</label>
                                        <input type="text" id="port" name="port" class="form-control" value="<?= $get_intity[0]['intity_port']; ?>" placeholder="หัวข้อหลักข้อมูลผลงาน" required />
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>เนื้อหาย่อยข้อมูลผลงาน</label>
                                        <input type="text" id="sub_port" name="sub_port" class="form-control" value="<?= $get_intity[0]['intity_sub_port']; ?>" placeholder="เนื้อหาย่อยข้อมูลผลงาน" required />
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">แก้ไข</button>
                </div>
                </form>
            <?php  } ?>
            </div>

        </div>
    </div>
</div>
</div>
</div>
</div>