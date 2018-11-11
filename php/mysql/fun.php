<?php
	function selectArt($by){
		$sql='select art.*,cat.cat_name from art,cat where cat.cat_id=art.catid order by '.$by.' desc';
	    return resSelect($sql) ;
	}
	function selectArtId($id){
		$sql='select art.*,cat.cat_name from art,cat where cat.cat_id=art.catid and art.artid='.$id;
	    return resSelect($sql) ;
	}
	
	function selectThreeArt($id){
		if($id==1){
			$sql='select art.*,cat.cat_name from art,cat where cat.cat_id=art.catid and art.artid>=1 and art.artid<=3' ;
		}else{
			$sql='select art.*,cat.cat_name from art,cat where cat.cat_id=art.catid and art.artid>='.$id.'-1 and art.artid<='.$id.'+1' ;
		}
		
	    return resSelect($sql) ;
	}
	function selectComment($id){
		$sql='select * from comment where art_id='.$id;
	    return resSelect($sql) ;
	}
	function selectCatArt($id){
		$sql='select art.*,cat.cat_name from art,cat where cat.cat_id=art.catid and art.catid='.$id;
	    return resSelect($sql) ;
	}
	
	function selectSearch($like){
		$sql='select art.*,cat.cat_name from art,cat where cat.cat_id=art.catid and art.title like \'%'.$like.'%\'';

	    return resSelect($sql) ;
	}
	
	function UpdataReadNum($id){
		$sql='update art set read_num=read_num+1 where artid='.$id;
	    sql($sql);
	}
	function UpdataGoodNum($id){
		$sql='update art set good_num=good_num+1 where artid='.$id;
	    return sql($sql);
	}

		
function verify($width,$height){
	$code='';
	$img=imagecreatetruecolor($width,$height);
	$write=imagecolorallocate($img,255,255,255);
	$randColor=function($img){
		$r=imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
		return $r;
	};
	imagefill($img,$width,$height,$write);
	$x=20;
	static $str;
	$string=function(){
		$s =substr(str_shuffle('abcdefghijkmnpkistuvwxyzABCDEFGHIJKMNPQRSTUVWXYZ23456789'),0,1);
		return $s;
	};
	
	for($i=0;$i<4;$i++){
		$size=mt_rand(15,$width/4);
		$edg=mt_rand(0,60);
		$str=$string();
		$code.=$str;
		imagettftext($img,$size,$edg,$x,$height/2+15,$randColor($img),'fonts/MSYHBD.ttc',$str);
		$x+=($width-30)/4;
	}
	for($i=0;$i<500;$i++){
		imagesetpixel($img,mt_rand(0,$width),mt_rand(0,$height),$randColor($img));
	};
	for($i=0;$i<3;$i++){
		
		imageline($img,mt_rand(0,$width),mt_rand(0,$height),mt_rand(0,$width),mt_rand(0,$height),$randColor($img));
		imagearc($img,mt_rand(0,$width),mt_rand(0,$height),mt_rand($width/6,$width/2),mt_rand($width/6,$height/2),0,mt_rand(30,180),$randColor($img));
	};
	$path ='verify/test.png';
	imagepng($img,$path);
	imagedestroy($img);
	setcookie('code',$code,time()+3600,'/');
	setcookie('path',$path,time()+3600,'/');
	return 'php/'.$path;
};
?>