<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>

<html lang="en">

<head>
    <title>สินค้าของเรา</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/img/user/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fontawesome/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/UserStyle.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet" />
</head>

<body>
    <?php $this->load->view('user/navbar'); ?>
    <div class="container">
        <div class="row pt-5">
            <a href="<?= base_url(); ?>" class="sidebar-link">
                <span class="sidebar-text">หน้าหลัก&nbsp;>&nbsp;</span>
            </a>
            <a href="<?= base_url('user/get_product') ?>">
                <span class="sidebar-text">สินค้าของเรา</span>
            </a>
        </div>
        <h3 class="pt-4 pl-3">สินค้าของเรา</h3>
        <div class="row">
            <?php
            foreach ($product as $row) {
            ?>
                <div class="col-md-6 col-lg-3 pt-3">
                    <div class="card card-pd">
                        <a href="<?= base_url('user/view_product_page/' . $row['product_id']) ?>">
                            <img src="<?= base_url('assets/img/admin/') . $row['product_img']; ?>" class="img_product rounded mx-auto d-block" alt="...">
                        </a>
                        <div class="card-body card-product">
                            <a href="<?= base_url('user/view_product_page/' . $row['product_id']) ?>" class="product_link">
                                <p class="card-title product_name_text"><?= $row['product_name']; ?></p>
                            </a>
                            <p class="card-text product_sub_name_text"><?= $row['product_sub_name']; ?></p>
                            <a href="<?= base_url('user/view_product_page/' . $row['product_id']) ?>">
                                <span class="text-right-pd float-right">รายละเอียด</span>
                            </a>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
            <?php
            if (!empty($limit)) {
                $limit =  $limit + 4;
            } else {
                $limit = 4;
            }
            ?>
        </div>
        <div class="row pt-5 pb-5">
            <div class="col-2"></div>
            <div class="col-8">
                <form action="" method="get">
                    <input name="limit" type="hidden" value="<?= $limit; ?>">
                    <?php
                    if ($product != null && $get_count['count'] > 4) {
                    ?>
                        <button type="submit" class="btn  btn-outline-blue btn-lg btn-block" <?php if ($get_count['count'] > count($product)) {
                                                                                                    echo '';
                                                                                                } else {
                                                                                                    echo 'hidden';
                                                                                                } ?>>
                            ดูเพิ่มเติม <i class="fas fa-angle-down"></i></button>
                    <?php
                    } else ?>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    <?php $this->load->view('user/section/contact.php'); ?>

    <button onclick="topFunction()" id="fab_wrapper" title="Go to top"><i class="fas fa-angle-up"></i></button>

</body>

<footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        var mybutton = document.getElementById("fab_wrapper");

        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
</footer>

</html>