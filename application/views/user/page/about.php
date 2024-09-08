<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>

<html lang="en">

<head>
    <title>เกี่ยวกับเรา</title>
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
            <div class="row pt-5">
                <a href="<?= base_url(); ?>" class="sidebar-link">
                    <span class="sidebar-text">หน้าหลัก&nbsp;>&nbsp;</span>
                </a>
                <a href="<?= base_url('user/get_about') ?>">
                    <span class="sidebar-text">เกี่ยวกับเรา</span>
                </a>
            </div>
            <h3 class="pt-4 pl-3">เกี่ยวกับเรา</h3>

            <div class="row">
                <div class="col-md-12 col-lg1-12">
                    <p><?= $contrack[0]['ct_about'] ?></p>
                </div>
                <div class="col-md-12 col-lg1-12">
                    <p><?= $contrack[0]['ct_about_general'] ?></p>
                </div>
            </div>
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