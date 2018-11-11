<?php
require('ini.php');
setcookie("user", "",time()-3600,'/');
unset($_SESSION['username']);
?>