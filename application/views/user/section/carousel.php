<!DOCTYPE html>

<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php
        $i = 0;
        foreach ($slide as $row) {
            $active = '';
            if ($i == 0) {
                $active = 'active';
            }
        ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="<?php echo $active; ?>"></li>
        <?php $i++;
        } ?>
    </ol>
    <div class="carousel-inner">
        <?php
        $i = 0;
        foreach ($slide as $row) {
            $active = '';
            if ($i == 0) {
                $active = 'active';
            }
        ?>
            <div class="carousel-item <?php echo $active; ?>">
                <img class="d-block carousel-width" src="<?= base_url('assets/img/admin/') . $row['slider_img']; ?> ">
            </div>
        <?php $i++;
        } ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true" style="color:red;"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>


</div>