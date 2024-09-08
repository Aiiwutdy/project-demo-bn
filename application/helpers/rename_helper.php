<?php 

defined('BASEPATH') or exit('No direct script access allowed');

function gennamepic($num)
{
    $rundom = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $genname = "";
    for ($i = 0; $i < $num; $i++) {
        $genname .= substr($rundom, rand(0, strlen($rundom)), 1);
    }
    return $genname;
}