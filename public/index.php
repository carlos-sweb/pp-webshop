<?php
require __DIR__.'/../vendor/autoload.php';
$f3 = \Base::instance();
$f3->config(__DIR__.'/../routes.ini');
$f3->config(__DIR__.'/../config.ini');
$f3->run();
?>