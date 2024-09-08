<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div>
    <form>
        <div class="bg-white">
            <div class="container page-section">
                <div class="row h-100 ">
                    <div class="row pt-5">
                        <div class="col-6 col-lg-6 col-md-12 pl-5 m-auto">
                            <div class="row">
                                <h2 class="text-left"><?php echo $product[0]['product_name']; ?></h2> &nbsp;
                                <h2 class="text-left" style="color: #FF5935;">MARKETING</h2>
                            </div>
                            <div class="row pt-2">
                                <div class="col-12 m-auto">
                                    <p><?php echo $product[0]['product_detail']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-6 col-md-12 text-center m-auto p-5">
                            <img src="<?= base_url('assets/img/admin/') . $album[2]['album_img']; ?>" alt="..." class="d-block w-100 m-auto p-3" /><br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>