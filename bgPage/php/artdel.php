<?php
require('ini.php');
if(isset($_SESSION['username'])){
	if($_SESSION['username']!=$_COOKIE['user']){
		exit();
	}
}else{
	exit();
}
$where=addslashes($_POST['where']);
$sql='delete from art where '.$where;
sql($sql);
?>