


		
		function RightList(){
			var windowTop=document.body.clientHeight;
			if(document.documentElement.scrollTop>=Top ){
				willFiexd.style.position='fixed';
				willFiexd.style.top='0px';
				willFiexd.style.width='350px';
			}else{
				willFiexd.style.position='';
				willFiexd.style.top='';
			}
		}
		function leftList(){
			var recommendList=document.getElementsByClassName('recommend-list');
			for(var i=0;i<recommendList.length;i++){
				if(recommendList[i].offsetHeight+recommendList[i].offsetTop-document.documentElement.scrollTop>=840){
					recommendList[i].style.opacity="0";
					recommendList[i].style.marginBottom='100px';
				}else{
					recommendList[i].style.opacity="1";
					recommendList[i].style.marginBottom='20px';
				}
			}
			
		}
