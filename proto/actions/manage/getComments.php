<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../../config/init.php';
include_once $BASE_DIR . 'database/comments.php';


if ($_SESSION['permission'] != 1 && $_SESSION['permission'] != 2) {
    header('Location: ' . $NO_ACCESS);
}

$res = getComments();

print_r(json_encode($res));