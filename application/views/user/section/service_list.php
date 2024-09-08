<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div>
    <div class="form">
        <div class="container-fluid">
            <div class="row">
                <?php
                foreach ($service as $row) {
                    if ($row['service_group_id'] == 1) {
                        if ($row['service_status'] == 1) {
                ?>
                            <div class="col-md-6 col-lg-4 service-list p-3" style="background-color: <?= $row['service_bg_color'];  ?> ;">
                                <div class="card-body card-service">
                                    <a href="<?= base_url('user/view_service/' . $row['service_id']) ?>" class="service-link">
                                        <img src="<?= base_url('assets/img/admin/') . $row['service_img']; ?> " alt="" class="d-block service-list-img" />
                                        <p style="color: <?= $row['service_text_color'];  ?> ;"><?= $row['service_title']; ?></p>
                                    </a>
                                    <span style="color: <?= $row['service_text_color'];  ?> ;"><?= $row['service_sub_tiitle']; ?></span>
                                </div>
                            </div>
                <?php }
                    }
                } ?>
            </div>
        </div>
    </div>
</div>