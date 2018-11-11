<?php
require('ini.php');

if($isLogin[0]['blogerName']==$_POST['user']){
	if($isLogin[0]['PASSWORD']==$_POST['psd']){
		updateBloger($_POST['user'],$_POST['newPsd']);
		echo '修改成功';
	}
}else{
	echo '修改失败';
	exit();
}


?>