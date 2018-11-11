<?php
require('ini.php');
echo json_encode(selectArt($_POST['sort']));
$_POST=array();
?>