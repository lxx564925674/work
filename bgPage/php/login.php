<?php
require('ini.php');


//print_r($arr[0]['id']);
if($_POST['username']==$isLogin[0]['blogerName']){
	if($_POST['psd']==$isLogin[0]['PASSWORD']){
		$_SESSION['username']=$isLogin[0]['blogerName'];
		setcookie('user',$_POST['username'],time()+3600,'/');
		echo $_SESSION['username'];
	}else{
		echo '登录失败,请确认账号与密码是否匹配';
	}
}else{
	echo '查无此用户名';
}
?>