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
	$sql ='select artid,catid,title,pubtime,comment_num,art_img,introduction,content from art where artid='.$_GET['artid'];
	echo json_encode(resSelect($sql));
	$_GET=array();
	exit();
}else if(!empty($_POST)){
	$_POST['content']=str_replace('#','&nbsp;',$_POST['content']);
	$arr=$_POST;
	$where=array_pop($arr);
	
	$table='art';
	$where=addslashes($where);
	myUpdata($table,$arr,$where);
	$_POST=array();
}

?>