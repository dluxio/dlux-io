<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - New Node</title>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/header.php";
   include_once($path);
?>
</head>

<body class="d-flex flex-column h-100 padme-t70">
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/nav.php";
   include_once($path);
?>
<main role="main" class="flex-shrink-0">
  <div class="container">
	  <h1 class="text-center text-white">Run A DLUX Node</h1>
	  <div class="card-deck">
	<div class="card border-danger bg-dark my-5">
      <div class="card-body text-center text-white">
    	<h5 class="card-title">BYOS</h5>
    	<p class="card-text">Bring Your Own Server</p>
		<hr class="bg-light">
		<center>
		<ul class="text-left">
		<li>Node.js</li>
		<li>npm</li>
		<li>Price: varies</li>
		</ul>
		</center>
    	<a href="/docs/#nodes" class="btn btn-danger">Get Started</a>
  	  </div>
	</div>
	<div class="card border-danger bg-dark my-5">
      <div class="card-body text-center text-white">
    	<h5 class="card-title">CLOUD</h5>
    	<p class="card-text">Use a cloud service</p>
		<hr class="bg-light">
		<center>
		<ul class="text-left">
		<li>Heroku</li>
		<li>AWS</li>
		<li>Price: $0-10</li>
		</ul>
		</center>
    	<a href="/docs/#nodes" class="btn btn-danger">Get Started</a>
  	  </div>
	</div>
	<div class="card border-danger bg-dark my-5">
      <div class="card-body text-center text-white">
    	<h5 class="card-title">RISHI SERVER</h5>
    	<p class="card-text">Presetup Servers For A Quick Start</p>
		<hr class="bg-light">
		<center>
		<ul class="text-left">
		<li>SSH</li>
		<li>Auto install</li>
		<li>Price: $5</li>
		</ul>
		</center>
    	<a href="#" class="btn btn-danger disabled">Get Started</a>
  	  </div>
	</div>	
	</div>
	  </div>
	</main>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/footer.php";
   include_once($path);
?>
</body></html>
