<?php
require('ini.php');
echo json_encode(selectComment($_POST['artid']));
$_POST=array();
?>