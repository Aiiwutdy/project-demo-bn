<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div>
    <div class="bg-blue">
        <form>
            <div class="container page-section">
                <div class="mt-4 mb-4">
                    <h2 class="intity_om_text"><?= $intity[0]['intity_online_marketing'] ?></h2>
                    <p class="intity_sub_om_text"><?= $intity[0]['intity_sub_online_marketing'] ?></p>
                </div>
                <div class="row pt-2 pb-3">
                    <?php
                    foreach ($online_marketing as $row) {
                        if ($row['om_status'] == 1) {
                    ?>
                            <div class="col-md-6 col-lg-4">
                                <div class="card-body">
                                    <a href="<?= base_url('user/view_online_marketing/') . $row['om_id']; ?>" class="om-link">
                                        <img src="<?= base_url('assets/img/admin/') . $row['om_img']; ?>" alt="..." class="d-block m-auto img_om" />
                                        <p class="om_title_text m-2"><?= $row['om_title']; ?></p>
                                    </a>
                                    <p class="om_sub_title_text"><?= $row['om_sub_title']; ?></p>
                                </div>
                            </div>
                    <?php }
                    }
                    ?>
                </div>

            </div>
        </form>
    </div>
</div>