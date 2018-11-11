<?php
require('ini.php');
$sql='select * from comment order by comment_time desc';
echo json_encode(resSelect($sql));
$_POST=array();
?>

