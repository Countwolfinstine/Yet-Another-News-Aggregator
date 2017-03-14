
	var xhr=new XMLHttpRequest();
	var xhr1=new XMLHttpRequest();
	function login(){
		us=document.getElementById("log_U").value;
		pas=document.getElementById("log_P").value;		
		lg="login.php?userName="+us+"&password="+pas;
		xhr.onreadystatechange=loginphp;
		xhr.open("GET","login.php?userName="+us+"&password="+pas,true);
		xhr.send();
	}
	
	function loginphp()
 	{ 
		if(xhr.readyState == 4 && xhr.status == 200){
			console.log(xhr.responseText);
			document.getElementById("logstat").innerHTML=xhr.responseText;
		}
	}

	function register(){
		us=document.getElementById("reg_U").value;
		pas=document.getElementById("reg_P").value;		
		cpas=document.getElementById("reg_Pr").value;
		eml=document.getElementById("reg_E").value;
		xhr1.onreadystatechange=regisphp;
		console.log(us);
		console.log(cpas);
		console.log(pas);
		console.log(eml);
		console.log("login.php?name="+us+"&password="+pas+"&cpassword="+cpas+"&email="+eml);
		xhr1.open("GET","register.php?name="+us+"&password="+pas+"&cpassword="+cpas+"&email="+eml, true);
		xhr1.send();
	}

	function regisphp()
 	{ 
		if(xhr1.readyState == 4 && xhr1.status == 200){
			console.log(xhr1.responseText);

			document.getElementById("regstat").innerHTML=xhr1.responseText;
		}
	}
