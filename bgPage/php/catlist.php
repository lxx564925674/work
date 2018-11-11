<?php
require('ini.php');
if(isset($_SESSION['username'])){
	if($_SESSION['username']!=$_COOKIE['user']){
		exit();
	}
}else{
	exit();
}
$sql ='select * from cat';
echo json_encode(resSelect($sql));
?>