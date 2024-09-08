<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>


<div id="contact">
    <form>
        <div class="bg-footer">
            <div class="container page-section">
                <div class="row m-auto">
                    <div class="col-md-12 col-lg-7 m-auto">
                        <img src="<?= base_url('assets/img/admin/') . $contrack[0]['ct_logo']; ?>" alt="" class="d-block img_contrack" />
                        <p class="contrack_name"><?= $contrack[0]['ct_name_office']; ?></p>
                        <p class="address_text">ที่อยู่ : <?= $contrack[0]['ct_address']; ?></p>
                        <div class="row">
                            <i class="fas fa-map-marker-alt"></i> &nbsp; &nbsp;
                            <p class="contrack_text">สถานที่ตั้ง : </p>&nbsp;
                            <a href="#" type="button" data-toggle="modal" data-target="#myModal" class="contact">
                                <p class="map_text">(แผนที่ออนไลน์)</p>
                            </a>
                        </div>
                        <div class="row">
                            <i class="fas fa-phone-alt"></i> &nbsp; &nbsp;
                            <p class="contrack_text">เบอร์โทรศัพท์ : &nbsp; </p>
                            <a href="tel:<?php echo $contrack[0]['ct_tel']; ?>" class="contact">
                                <p class="map_text"><?= $contrack[0]['ct_tel']; ?></p>
                            </a>
                        </div>
                        <div class="row">
                            <i class="far fa-envelope"></i> &nbsp; &nbsp;
                            <p class="contrack_text">อีเมล์ : &nbsp; </p>
                            <p class="contrack_input_text"><?= $contrack[0]['ct_email']; ?></p>
                        </div>
                        <div class="row">
                            <i class="fas fa-globe"></i> &nbsp; &nbsp;
                            <p class="contrack_text">เว็บไซต์ : &nbsp; </p>
                            <p class="contrack_input_text"><?= $contrack[0]['ct_web']; ?></p>
                        </div>
                        <div class="row">
                            <i class="fas fa-clock" style="padding-top: 3px;"></i> &nbsp; &nbsp;
                            <p class="contrack_text" style="padding-top: 3px;">เวลาทำการ : &nbsp;<?= $contrack[0]['ct_time']; ?></p>
                        </div>

                    </div>
                    <div class="col-md-12 col-lg-5 m-auto p-3">
                        <div class="row">
                            <p>ช่องทางอื่นๆ :</p>
                            <div class="row pl-3">
                                <i class="fab fa-facebook"></i> &nbsp; &nbsp;
                                <p class="contrack_text mt-2">Facebook Fan Page : &nbsp;</p>
                                <a href="<?= $contrack[0]['ct_link_facebook']; ?>" target="_blank" class="contact">
                                    <p class="map_text mt-2"><?= $contrack[0]['ct_name_facebook']; ?></p>
                                </a>
                            </div>
                            <div class="row pt-2 pl-3">
                                <i class="fab fa-line"></i> &nbsp; &nbsp;
                                <p class="contrack_text mt-2">line add ID : &nbsp;</p>
                                <a href="<?= $contrack[0]['ct_link_line']; ?>" target="_blank" class="contact">
                                    <p class="map_text mt-2"><?= $contrack[0]['ct_name_line']; ?></p>
                                </a>
                            </div>
                            <div class="row m-auto pl-4">
                                <img src="<?= base_url('assets/img/admin/') . $contrack[0]['ct_qr']; ?>" alt="" class="d-block img_contrack" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">แผนที่ออนไลน์ NEXT SOFTWARE SOLUTION</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <iframe src="<?= $contrack[0]['ct_map_online']; ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
            </div>

        </div>
    </div>
</div>