<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>

<html lang="en">

<head>
    <title>Next Software Company Limited</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/img/user/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fontawesome/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/UserStyle.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet" />
</head>

<body>
    <?php $this->load->view('user/navbar'); ?>
    <div>
        <div class="container">
            <?php
            foreach ($online_marketing as $row) {
                if ($row['om_status'] == 1) {
                    // if
            ?>
                    <div class="row pt-5">
                        <a href="<?= base_url(); ?>" class="sidebar-link">
                            <span class="sidebar-text">หน้าหลัก&nbsp;>&nbsp;</span>
                        </a>
                        <a href="<?= base_url('user/view_online_marketing/') . $row['om_id']; ?>" class="sidebar-link">
                            <span class="sidebar-text">การตลาดออนไลน์&nbsp;>&nbsp;</span>
                        </a>
                        <a href="<?= base_url('user/view_online_marketing/') . $row['om_id']; ?>">
                            <span class="sidebar-text"><?= $row['om_title']; ?></span>
                        </a>
                    </div>
                    <h3 class="pt-4 pl-3"><?= $row['om_title']; ?></h3>
                    <div class="row pb-5">
                        <div class="col-12 pd-product">
                            <p><?= $row['om_detail']; ?></p>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
    <?php $this->load->view('user/section/contact.php'); ?>
</body>

<footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</footer>