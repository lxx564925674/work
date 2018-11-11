<?php
require('ini.php');
echo json_encode(selectCatArt($_POST['catid']));
$_POST=array();
?>