<?php
require('ini.php');
if(isset($_SESSION['username'])){
	if($_SESSION['username']!=$_COOKIE['user']){
		exit();
	}
}else{
	exit();
}
$sql ='select artid,catid,title,pubtime,comment_num from art';
echo json_encode(resSelect($sql));
?>