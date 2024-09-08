<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <title>เข้าสู่ระบบ</title>
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/img/user/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/sb-admin-2.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fontawesome/css/all.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/custom.css">
</head>

<body>
    <div class="bg-login-admin ">
        <div class="container">
            <div class="row justify-content-center auth-login">
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="card o-hidden my-5 border-left-orange shadow ">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block img-login">
                                    <img src="<?= base_url(); ?>assets/img/admin/logo-main.png" alt="" />
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">เข้าสู่ระบบ</h1>
                                        </div>
                                        <?php if ($this->session->flashdata('error') == 'error') {
                                        ?>
                                            <div class="alert alert-danger text-center" role="alert">

                                                <b>อีเมลล์หรือรหัสผ่านไม่ถูกต้อง !</b>
                                            </div>
                                        <?php } ?>
                                        <form class="user" name="user" action="<?php base_url() ?>auth/login" onsubmit="return validateForm()" method="post">
                                            <div class="form-group">
                                                <span>ชื่อผู้ใช้งาน</span>
                                                <input type="email" name="email" class="form-control form-control-user mt-3" id="" aria-describedby="email" placeholder="ชื่อผู้ใช้งาน">
                                            </div>
                                            <div class="form-group">
                                                <span>รหัสผ่าน</span>
                                                <input type="password" name="password" class="form-control form-control-user mt-3" id="" placeholder="รหัสผ่าน">
                                            </div>

                                            <button type="submit" class="btn btn-primary btn-user btn-block mt-4 ">เข้าสู่ระบบ</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>