<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="content">
    <form>
        <div class="bg-white">
            <div class="container page-section">
                <div class="mt-4 mb-4">
                    <h2 class="new_gen_text"> <?= $intity[0]['intity_service']; ?></h2>
                    <p class="new_gen__sub_text"> <?= $intity[0]['intity_sub_service']; ?></p>
                </div>
                <div class="row pt-2">
                    <?php
                    foreach ($service as $row) {
                        if ($row['service_group_id'] == 2) {
                            if ($row['service_status'] == 1) {
                    ?>
                                <div class="col-md-12 col-lg-6">
                                    <a href="<?= base_url('user/view_service_page/' . $row['service_id']) ?>" class="new_gen">
                                        <div class="hover mt-2 mb-2 border-shadow">
                                            <div class="row">
                                                <div class="col-4 m-auto">
                                                    <img src="<?= base_url('assets/img/admin/') . $row['service_img']; ?>" alt="..." class="d-block w-100" />
                                                </div>
                                                <div class="col-8 m-auto pd-10">
                                                    <p class="service_title_text m-2"><?= $row['service_title']; ?></p>
                                                    <p class="text-blue text-sub-service "><?= $row['service_sub_tiitle']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                    <?php }
                        }
                    } ?>
                    <div class="row">
                        <div class="col-12 pt-3">
                            <a href="<?= base_url('user/get_service') ?>">
                                <span class="float-right right_text">ดูเพิ่มเติม</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>