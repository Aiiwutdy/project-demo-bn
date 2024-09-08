<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <title>Admin</title>
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/img/user/logo.png" type="image/x-icon" />
    <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/sb-admin-2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fontawesome/css/all.css">
    <link href="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/custom.css">

    <!-- <link href='https://cdn.jsdelivr.net/npm/froala-editor@4.0.8/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' /> -->
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require '_nav.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require '_topbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php if (isset($_SESSION['success']) && $_SESSION['success'] == false) { ?>
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <div class="alert alert-dismissible alert-danger" id="error-alert">
                                    <button type="button" class="close btn btn-sm" data-dismiss="alert">&times;</button>
                                    <span><?php if (isset($_SESSION['topic'])) {
                                                echo $_SESSION['topic'];
                                            }
                                            unset($_SESSION['success']);
                                            unset($_SESSION['topic']); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (isset($_SESSION['success']) && $_SESSION['success'] == true) { ?>
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <div class="alert alert-dismissible alert-success" id="success-alert">
                                    <button type="button" class="close btn btn-sm" data-dismiss="alert">&times;</button>
                                    <span><?php if (isset($_SESSION['topic'])) {
                                                echo $_SESSION['topic'];
                                            }
                                            unset($_SESSION['success']);
                                            unset($_SESSION['topic']); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <script>
                        $(document).ready(function() {
                            window.setTimeout(function() {
                                $("#success-alert").fadeTo(1000, 500).slideUp(500, function() {
                                    $(this).remove();
                                });
                            }, 2000);
                        });
                        $(document).ready(function() {
                            window.setTimeout(function() {
                                $("#error-alert").fadeTo(1000, 500).slideUp(500, function() {
                                    $(this).remove();
                                });
                            }, 2000);
                        });
                    </script>