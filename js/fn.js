function get_get(){ 
		querystr = window.location.href.split("?")
		
		if(querystr[1]){
			GETs = querystr[1].split("&")
			GET =new Array()
			for(i=0;i<GETs.length;i++){
				tmp_arr = GETs[i].split("=")
				key=tmp_arr[0]
				GET[key] = tmp_arr[1]
			}
		}
			
		
		return querystr[1];
}


function getfileImg(){
	       var data = new FormData();
        //为FormData对象添加数据
	        $.each($('#fileImg')[0].files, function(i, file) {
	            data.append('upload_file'+i, file);
	        });
	        //发送数据
	        $.ajax({
	            url:'php/fileImage.php', /*去过那个php文件*/
	            type:'POST',  /*提交方式*/
	            data:data,
	            cache: false,
	            contentType: false,        /*不可缺*/
	            processData: false,         /*不可缺*/
	            success:function(data){        
	                art_Img=data;   
	                console.log(art_Img);
	 
	            },
	            error:function(){
	                alert('上传出错');
	            }
	        });
		  
	   }