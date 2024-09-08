<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div>
    <form>
        <div class="bg-whit">
            <div class="container page-section">
                <div class="mt-4 mb-4">
                    <h2 class="text-center"> <?= $intity[0]['intity_port']; ?></h2>
                    <p class="intity_sub_port_text"> <?= $intity[0]['intity_sub_port']; ?></p>
                </div>
                <div class="row">
                    <?php foreach ($port as $row) {
                        if ($row['port_status'] == 1) { ?>
                            <div class="col-md-6 col-lg-3">
                                <a href="<?= base_url('user/view_port/' . $row['port_id']) ?>" class="port">
                                    <div class="hover mt-2 mb-2 border-shadow-port p-3">
                                        <p class="port_title_text"><?= $row['port_title']; ?></p>
                                        <img src="<?= base_url('assets/img/admin/') . $row['port_img']; ?>" alt="..." class="d-block img_port" />
                                        <p class="text-port"><?= $row['port_sub_title']; ?></p>
                                    </div>
                                </a>
                            </div>
                    <?php }
                    } ?>
                    <div class="row">
                        <div class="col-12 pt-3">
                            <a href="<?= base_url('user/get_port') ?>">
                                <span class="float-right right_text">ดูเพิ่มเติม</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>