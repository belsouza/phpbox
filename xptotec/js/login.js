// JavaScript Document

let login = document.getElementById("cpf");
let senha = document.getElementById("senha");



document.getElementById("loginbtn").addEventListener("click", function(){
	
  "use strict";
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
	  alert(this.responseText);
      window.location.href = "index.php";
    }
  };
  xhttp.open("POST", "actions/r_login.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("cpf="+login.value+"&senha="+senha.value+"");
  
});
