<?php
require('ini.php');
UpdataReadNum($_POST['artid']);
echo json_encode(selectThreeArt($_POST['artid']));
$_POST=array();
?>