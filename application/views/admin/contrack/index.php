<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <?php
                if ($this->session->flashdata('result') == 'success') { ?>
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
                <?php }
                ?>
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-main ">-ข้อมูลบริษัท-</h6>
                        <div class="dropdown no-arrow">
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="<?= base_url('admin/contrack/edit_contrack'); ?>" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <p class="pb-2" style="color: #000; font-size: 17px;">*ข้อมูลเกี่ยวกับ</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>ข้อมูลเกี่ยวกับ</label>
                                            <textarea id="texteditor" name="about" class="form-control" value="" placeholder="ข้อมูลเกี่ยวกับ" required><?php echo $get_contrack[0]['ct_about']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>ข้อมูลทั่วไป</label>
                                            <textarea id="texteditor1" name="about_general" class="form-control" value="" placeholder="ข้อมูลทั่วไป"><?php echo $get_contrack[0]['ct_about_general']; ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <hr style="border-bottom: 2px dashed #192353;">
                                <p class="pb-2" style="color: #000; font-size: 18px;">*ข้อมูลติดต่อ</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="table-responsive">
                                            <table>
                                                <tr>
                                                    <td colspan="2">
                                                        <div class="form-group">
                                                            <label>ชื่อบริษัท</label>
                                                            <textarea id="texteditor2" name="name_office" class="form-control" value="" placeholder="ชื่อบริษัท" required><?php echo $get_contrack[0]['ct_name_office']; ?></textarea>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div class="form-group">
                                                            <label>เวลาทำการ</label>
                                                            <textarea id="texteditor3" name="time" class="form-control" value="" placeholder="เวลาทำการ" required><?php echo $get_contrack[0]['ct_time']; ?></textarea>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="table-responsive">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="pr-3" width="50%">
                                                            <div class="form-group">
                                                                <label>โลโก้บริษัท</label>
                                                                <div class="custom-file">
                                                                    <input type="file" name="logo" class="custom-file-input" id="logo">
                                                                    <label class="custom-file-label" for="logo" id="logo_text"><?php echo $get_contrack[0]['ct_logo']; ?></label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group ">
                                                                <label>ลิ้งค์บริษัท</label>
                                                                <input type="text" id="web" name="web" class="form-control" value="<?php echo $get_contrack[0]['ct_web']; ?>" placeholder="ลิ้งค์บริษัท" required />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-3">
                                                            <div class="form-group">
                                                                <label>เบอร์โทรติดต่อ</label>
                                                                <input type="tel" id="tel" name="tel" class="form-control" value="<?php echo $get_contrack[0]['ct_tel']; ?>" placeholder=" เบอร์โทรติดต่อ" required />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <label>อีเมล์</label>
                                                                <input type="email" id="email" name="email" class="form-control" value="<?php echo $get_contrack[0]['ct_email']; ?>" placeholder="อีเมล์" required />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <label>ลิ้งค์แผนที่</label>
                                                                <input type="text" id="map_online" name="map_online" class="form-control" value="<?php echo $get_contrack[0]['ct_map_online']; ?>" placeholder="ลิ้งค์แผนที่" required />
                                                            </div>
                                                        </td>
                                                        </td>
                                                        <td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <div class="form-group">
                                                                <label>ที่อยู่</label>
                                                                <input id="address" name="address" value="<?php echo $get_contrack[0]['ct_address']; ?>" class="form-control" placeholder="ที่อยู่" required />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <hr style="border-bottom: 2px dashed #192353;">

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-3" width="50%">
                                                            <div class="form-group">
                                                                <label>ชื่อเฟสบุ๊ก</label>
                                                                <input type="text" id="name_facebook" name="name_facebook" class="form-control" value="<?php echo $get_contrack[0]['ct_name_facebook']; ?>" placeholder="ชื่อเฟสบุ๊ก" required />
                                                            </div>
                                                        </td>
                                                        <td width="50%">
                                                            <div class="form-group">
                                                                <label>ลิ้งค์เฟสบุ๊ก</label>
                                                                <input type="text" id="link_facebook" name="link_facebook" class="form-control" value="<?php echo $get_contrack[0]['ct_link_facebook']; ?>" placeholder="ลิ้งค์เฟสบุ๊ก" required />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-3">
                                                            <div class="form-group ">
                                                                <label>ชื่อไลน์</label>
                                                                <input type="text" id="name_line" name="name_line" class="form-control" value="<?php echo $get_contrack[0]['ct_name_line']; ?>" placeholder="ชื่อไลน์" required />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <label>ลิ้งค์ไลน์</label>
                                                                <input type="text" id="link_line" name="link_line" class="form-control" value="<?php echo $get_contrack[0]['ct_link_line']; ?>" placeholder="ลิ้งค์ไลน์" required />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-3">
                                                            <div class="form-group">
                                                                <label>QR Line</label>
                                                                <div class="custom-file">
                                                                    <input type="file" name="qr_code" class="custom-file-input" id="qr_code">
                                                                    <label class="custom-file-label" for="qr_code" id="qr_code_text"><?php echo $get_contrack[0]['ct_qr']; ?></label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-success">บันทึก</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>


<script>
    $('#logo').on('change', function() {
        //get the file name
        var fileName_banner = $(this).val();
        var banner = fileName_banner.replace('C:\\fakepath\\', " ");
        //replace the "Choose a file" label
        $('#logo_text').html(banner);
    })
    $('#qr_code').on('change', function() {
        //get the file name
        var fileName_banner = $(this).val();
        var banner = fileName_banner.replace('C:\\fakepath\\', " ");
        //replace the "Choose a file" label
        $('#qr_code_text').html(banner);
    })
</script>