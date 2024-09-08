<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div id="product">
    <form>
        <?php
        foreach ($product as $row) {
            // เช็คเลขคู่ เลขคี่
            if (($row['product_num']  % 2) == 0) {
                //    เช็คการแสดงหน้าแรก
                if ($row['product_status'] == 1) {
                    //  เช็คตำแหน่งรูป
                    if ($row['product_layout_position'] == 0) {
        ?>
                        <div class="row padding-px">
                            <div class="container page-section">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 m-auto p-5">
                                        <img src="<?= base_url('assets/img/admin/') . $row['product_img']; ?> " alt="" class="d-block img_pd_st" />
                                    </div>
                                    <div class="col-md-6 col-lg-6 m-auto">
                                        <h3 class="text-center"><?= $row['product_name']; ?></h3>
                                        <p class="product_sub_name mt-3"><?= $row['product_sub_name']; ?></p>
                                        <p class="product_price_text"><?= $row['product_price']; ?></p>
                                        <a href="<?= base_url('user/view_product_page/' . $row['product_id']) ?>">
                                            <span class="float-right right_text">ดูเพิ่มเติม</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else if ($row['product_layout_position'] == 1) { ?>
                        <div class="row padding-px">
                            <div class="container page-section">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 m-auto p-5">
                                        <h3 class="text-center"><?= $row['product_name']; ?></h3>
                                        <p class="product_sub_name mt-3"><?= $row['product_sub_name']; ?></p>
                                        <p class="product_price_text"><?= $row['product_price']; ?></p>
                                        <a href="<?= base_url('user/view_product_page/' . $row['product_id']) ?>">
                                            <span class="float-right right_text">ดูเพิ่มเติม</span>
                                        </a>
                                    </div>
                                    <div class="col-md-6 col-lg-6 m-auto">
                                        <img src="<?= base_url('assets/img/admin/') . $row['product_img']; ?> " alt="" class="d-block img_pd_st" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                }
            } else {
                if ($row['product_status'] == 1) {
                    //  เช็คตำแหน่งรูป
                    if ($row['product_layout_position'] == 0) {
                    ?>
                        <div class="row padding-px" style="background-color: #f2f2f2;">
                            <div class="container page-section">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 m-auto p-5">
                                        <img src="<?= base_url('assets/img/admin/') . $row['product_img']; ?> " alt="" class="d-block img_pd_st" />
                                    </div>
                                    <div class="col-md-6 col-lg-6 m-auto">
                                        <h3 class="text-center"><?= $row['product_name']; ?></h3>
                                        <p class="product_sub_name mt-3"><?= $row['product_sub_name']; ?></p>
                                        <p class="product_price_text"><?= $row['product_price']; ?></p>
                                        <a href="<?= base_url('user/view_product_page/' . $row['product_id']) ?>">
                                            <span class="float-right right_text">ดูเพิ่มเติม</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } else if ($row['product_layout_position'] == 1) { ?>
                        <div class="row padding-px" style="background-color: #f2f2f2;">
                            <div class="container page-section">
                                <div class="hide">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 m-auto p-5">
                                            <img src="<?= base_url('assets/img/admin/') . $row['product_img']; ?> " alt="" class="d-block img_pd_st" />
                                        </div>
                                        <div class="col-md-6 col-lg-6 m-auto">
                                            <h3 class="text-center"><?= $row['product_name']; ?></h3>
                                            <p class="product_sub_name mt-3"><?= $row['product_sub_name']; ?></p>
                                            <p class="product_price_text"><?= $row['product_price']; ?></p>
                                            <a href="<?= base_url('user/view_product_page/' . $row['product_id']) ?>">
                                                <span class="float-right right_text">ดูเพิ่มเติม</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="hide2">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 m-auto">
                                            <h3 class="text-center"><?= $row['product_name']; ?></h3>
                                            <p class="product_sub_name mt-3"><?= $row['product_sub_name']; ?></p>
                                            <p class="product_price_text"><?= $row['product_price']; ?></p>
                                            <a href="<?= base_url('user/view_product_page/' . $row['product_id']) ?>">
                                                <span class="float-right right_text">ดูเพิ่มเติม</span>
                                            </a>
                                        </div>
                                        <div class="col-md-6 col-lg-6 m-auto p-5">
                                            <img src="<?= base_url('assets/img/admin/') . $row['product_img']; ?> " alt="" class="d-block img_pd_st" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        <?php }
                }
            }
        } ?>
</div>
</form>
</div>