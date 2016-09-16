totalCount=0;
myMenuJSON={};
myMenuJSON.myMenu={};
function addTC(num){
	if(totalCountSpan.innerHTML=="") totalCountSpan.innerHTML="0";
	totalCountSpan.innerHTML=parseInt(totalCountSpan.innerHTML)+num;
	document.getElementById('submit1').disabled='';
}
function minusTC(num){
	if(totalCountSpan.innerHTML=="" || totalCountSpan.innerHTML=="0") totalCountDiv.innerHTML="0";
	totalCountSpan.innerHTML=parseInt(totalCountSpan.innerHTML)-num;
	if(totalCountSpan.innerHTML=="0") {
		document.getElementById('submit1').disabled='disabled';
	}
}
function addDC(id){
	textBox=document.getElementById('count'+id);
	if(textBox.value=="") textBox.value="0";
	textBox.value=parseInt(textBox.value)+1;
	if(myMenuJSON.myMenu[id])myMenuJSON.myMenu[id]++;
	else myMenuJSON.myMenu[id]=1;
	document.getElementById('hiddenInput').value=JSON.stringify(myMenuJSON);
	addTC(1);
}
function minusDC(id){
	textBox=document.getElementById('count'+id);
	if(textBox.value=="" || textBox.value=="0") return 0;
	textBox.value=parseInt(textBox.value)-1;
	if(myMenuJSON.myMenu[id])myMenuJSON.myMenu[id]--;
	else myMenuJSON.myMenu[id]=0;
	document.getElementById('hiddenInput').value=JSON.stringify(myMenuJSON);
	minusTC(1);
}

function request(url){
   xmlhttp=new XMLHttpRequest();
   xmlhttp.onreadystatechange=function(){
      if (xmlhttp.readyState==4 && xmlhttp.status==200){
      }
   }
   xmlhttp.open("GET",url,false);
   xmlhttp.send();
   return xmlhttp.responseText;
}
var watchPage='';
function watchData(){
	var res = request("watchdata.php");
	if (res!=watchPage){
		watchPage=res;
		document.getElementById("menuListUl").innerHTML=watchPage;
	}
}
function repeatGetData(){
	watchData();
	var intv = setInterval("watchData()",3000);
}