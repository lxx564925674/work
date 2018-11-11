<?php
session_start();
define('ROOT',dirname(__DIR__));
require(ROOT.'/php/mysql/mysql.php');
require(ROOT.'/php/mysql/fun.php');
$isLogin =selectBlogger();


?>