function disposeMenu(menuID,btn){
	res = request("dispose.php?mid="+menuID);
	btn.style.display="none";
}