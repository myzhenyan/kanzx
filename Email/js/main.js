var big = document.getElementById('big'),
	link = document.getElementById('link'),
	yulan = document.getElementById('yulan'),
	outyulan = document.getElementById('outyulan'),
	centents = document.getElementById('centents'),
	yulan_iframe = document.getElementById('yulan_iframe');

//預覽
yulan.onclick = function(){
	var doc = window.yulan_ifr.document.open();
	yulan_iframe.style.display="block";
	doc.write(centents.value);
	doc.close();
}
outyulan.onclick = function(){
	yulan_iframe.style.display="none";
}

//模板
var template1 = document.getElementById('template1'),
	template2 = document.getElementById('template2'),
	template3 = document.getElementById('template3'),
	template4 = document.getElementById('template4'),
	template5_1 = document.getElementById('template5_1'),
	template5_2 = document.getElementById('template5_2');

template1.onclick = function(){ 
	templateAjax({
		url:'template/template1.html'
	});
}
template2.onclick = function(){ 
	templateAjax({
		url:'template/template2.html'
	});
}
template3.onclick = function(){ 
	templateAjax({
		url:'template/template3.html'
	});
}
template4.onclick = function(){ 
	templateAjax({
		url:'template/template4.html'
	});
}
template5_1.onclick = function(){ 
	templateAjax({
		url:'template/template5_1.html'
	});
}
template5_2.onclick = function(){ 
	templateAjax({
		url:'template/template5_2.html'
	});
}