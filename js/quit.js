function getCookie(name) 
{ 
    var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
 
    if(arr=document.cookie.match(reg))
 
        return unescape(arr[2]); 
    else 
        return null; 
} 

function delCookie(name) {
		    var exp = new Date(); 
		    exp.setTime(exp.getTime() - 1); 
		    var cval=getCookie(name); 
		    if(cval!=null) 
		        document.cookie= name + "="+cval+";expires="+exp.toGMTString(); 
} 

function quit(){
   		ajax({
		    url : "php/quit.php",  // url---->地址
		    type : "POST",   // type ---> 请求方式
		    async : true,   // async----> 同步：false，异步：true 
		    data : {   //传入信息
		    		
		    },
		    success : function(data){   //返回接受信息
		    	 delCookie('user');
		         alert('退出成功');
		         window.location.href='http://www.work.com/bgPage/login.html';
		        
		        
		    }
		    });
		    
	
   	
}