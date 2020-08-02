/*跳转*/
function pastTime(){
	window.setInterval(function(){//间隔执行
		var span=document.getElementById("timespan");//获取span标签
		span.innerHTML=span.innerHTML-1;
		//时间到0是跳转
		if(span.innerHTML==0){
			location.href="https://myzhenyan99.tk/";
		}
	},1000);
}