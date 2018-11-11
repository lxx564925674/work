<?php
	//连接数据库
	function conn(){
		static $conn=null;  //定义一个可改但是不可重复定义的初值
		
		if($conn===null){ //判断是否是第一次定义，否则不重复定义
			$config =require('config.php');
			$conn=mysqli_connect($config['host'],$config['username'],$config['password'],$config['datebase']);
			mysqli_query($conn,'set names '.$config['character']);
			if(mysqli_connect_error($conn)){
				echo(mysqli_connect_errno());//数据库连接出错编号 
				echo(':'.mysqli_connect_error());//数据库连接出错信息 
				exit('请重新登录数据库');
			}
		}
		return $conn;
	}
	//预处理insert函数
	//参数： $arr:想要传递的数据数组  $table:表名
	function myInsert($table,$arr){
		$conn=conn();
		$a='?';
		$type=array_shift($arr); 
		for($i=0;$i<sizeof($arr)-1;$i++){
			$a.=',?';
		};
		$sql ="insert into $table "."(".implode(',',array_keys($arr)).") values($a)";
		$stmt = $conn->prepare($sql);
		$argument=array($type);
		foreach($arr as $key=>$v){
			$$key=$v;
			array_push($argument,$$key);
		}
		$stmt->bind_param(...$argument);
		// 设置参数并执行
		if($stmt->execute()){
			echo '执行成功';
		}else{
			echo $sql;
			echo '执行失败';
		}
		$stmt->close();
		$conn->close();
	}
	
	function myUpdata($table,$arr,$where){
		$conn=conn();
		$a='?';
		$b='set ';
		var_dump($arr);
		$type=array_shift($arr); 
		for($i=0;$i<sizeof($arr);$i++){
			$a.=',?';
			$b.=' '.array_keys($arr)[$i].'=?,';
			
		};
		$b=rtrim($b,',');
		$sql ="update $table $b where $where";
		$stmt = $conn->prepare($sql);
		$argument=array($type);
		foreach($arr as $key=>$v){
			$$key=$v;
			array_push($argument,$$key);
		}
		var_dump($argument);
		$stmt->bind_param(...$argument);
		// 设置参数并执行
		if($stmt->execute()){
			echo '执行成功';
		}else{
			echo '执行失败';
		}
		$stmt->close();
		$conn->close();
	}
	
	
	

	
   //返回一个sql语句结果
	function sql($sql){
		$conn=conn();
	
		$res= mysqli_query($conn,$sql);
		
		return $res;
	}
	
    //查询全部语句
	function resSelect($sql){
		$mysqli = conn();
		$res=sql($sql);
		if($res){
			$arr=[];
			while($result=mysqli_fetch_assoc($res)){
				$arr[]=$result;
			}
			return $arr;
		}else{
			return false;
		}
	}
	

	//创建文件夹
	function mkdirs($dir, $mode = 0777){
	    if (is_dir($dir) || @mkdir($dir, $mode)) return TRUE;
	    if (!mkdirs(dirname($dir), $mode)) return FALSE;
	    return @mkdir($dir, $mode);
	}	
	
?>