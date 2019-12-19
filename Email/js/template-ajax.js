function templateAjax(options){
	//存储默认参数
	var defaults = {
		type:'GET'
	};
	var xhr = new XMLHttpRequest();
	xhr.open(defaults.type,options.url);
	//发送
	xhr.send();
	//響應
	xhr.onload = function(){
		centents.value = xhr.responseText;
	}
}