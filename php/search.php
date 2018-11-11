<?php
require('ini.php');
echo json_encode(selectSearch($_POST['like']));
$_POST=array();
?>