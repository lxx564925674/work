<?php
require('ini.php');
if(isset($_SESSION['username'])){
	if($_SESSION['username']!=$_COOKIE['user']){
		exit();
	}
}else{
	exit();
}
if(!empty($_GET) && empty($_POST)){
	$sql ='select * from cat where cat_id='.$_GET['catid'];
	echo json_encode(resSelect($sql));
	$_GET=array();
	exit();
}else if(!empty($_POST)){
	$arr=$_POST;
	var_dump($arr);
	$where=array_pop($arr);
	$table='cat';
	$where=addslashes($where);
    myUpdata($table,$arr,$where);
    $_POST=array();
	
}
