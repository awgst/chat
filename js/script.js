var messageBox = document.getElementById('message-box');
var text = document.getElementById('message');
// Create AJAX
var xhr = new XMLHttpRequest();
// Scroll to bot on load
var timer = setInterval(function(){
	messageBox.scrollTop = 999999999;
},100);
setInterval(function(){
	clearInterval(timer);
},500);
function sendMessage(){
	// Send a request using POST method
	xhr.onreadystatechange = function(){
		if (xhr.readyState == 4 && xhr.status == 200) {
			console.log(xhr.responseText);
		}
	}
	xhr.open('POST', 'send.php', true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send("message="+text.value);
	text.value = "";
}
function loadMessage(){
	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4 && xhr.status == 200){
			messageBox.innerHTML = xhr.responseText;
			console.log("Berhasil");
		}
	}
	xhr.open('GET', 'load.php', true);
	xhr.send();
}
setInterval(loadMessage, 100);