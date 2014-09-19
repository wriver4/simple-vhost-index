<?php
opcache_reset();
require 'C:\xampp\dirlinks\Dirlinks.php';
$show = new Dirlinks;
$show->header(__DIR__, "http://local:81/");
$show->show(__DIR__);
$show->footer("http://local:81/");
