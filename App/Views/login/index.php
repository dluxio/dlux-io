<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>dlux Login</title>
    <!-- Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="../css/login.css" rel="stylesheet">  
	<script src="https://kit.fontawesome.com/0f693ffc58.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/steem/dist/steem.min.js"></script>
    <script src="../js/session.js" type="application/javascript"></script>
  </head>
  <body class="text-center">
	  
	<div class="form-signin" >
		<img src="../img/dluxcolorlogo.png" alt="Placeholder image" width="72" height="72" class="img-fluid rounded">
<h1 class="mt-2">Please sign in</h1>
		<br>
<div class="container">
  
  <div id="magicLink" class="input-group mb-3 ">
  <input type="text" class="form-control" id="ml-email" placeholder="Email" aria-label="Email" aria-describedby="ml-addon">
  <div class="input-group-append">
    <button type="" class="btn btn-form btn-primary mb-2 mt-0"><i class="fas fa-paper-plane"></i> Magic Link</button>
  </div>
  </div>
  
	<hr>
  
  <div id="hiveKeychain" class="input-group mb-3 ">
  <div class="input-group-prepend">
    <span class="input-group-text" id="sk-addon">@</span>
  </div>
  <input type="text" class="form-control" id="sk-username" placeholder="username" aria-label="Username" aria-describedby="sk-addon">
  <div class="input-group-append">
    <button type="" class="btn btn-form btn-danger mb-2 mt-0" onclick="hiveKeychain()"><i class="fas fa-key"></i> Hive Keychain</button>
  </div>
  </div>
  
    <div id="getKeychain" class="input-group mb-3">
   <a href="https://github.com/stoodkev/hive-keychain" target="_blank" class="btn btn-get btn-outline-danger btn-block">Get <i class="fas fa-key"></i> Hive Keychain</a>
  </div>
  
	</div>
    
	  <br>
	  <p><a href="../">Cancel</a></p>
</div>
  <!-- body code goes here --> 
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
    function hiveKeychain () {
	console.log('clicked')
      let username = document.getElementById('sk-username').value
      console.log('value: ' + username)
      steem.api.setOptions({ url: "https://anyx.io" })
	sessionStorage.setItem("user", username);
	console.log('session set')
      let session = new Dluxsession(steem, {steemidip:username})
      	console.log(session)
    } 
      
    setTimeout(function(){
     let use = document.getElementById("hiveKeychain");
		 let get = document.getElementById("getKeychain");
		 if(window.hive_keychain) {
			 get.style.display = "none";
		 } else {
			use.style.display = "none";
		 }
    }, 1000);
    </script>
  </body>
</html>
