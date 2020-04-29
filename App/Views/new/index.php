<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - Create</title>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/header.php";
   include_once($path);
?>
</head>

<body class="d-flex flex-column h-100">
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/nav.php";
   include_once($path);
?>
<main role="main" class="flex-shrink-0">
<div class="padme-t70"></div>
  <div class="container">
	<div class="card w-100 border-danger bg-none my-5">
      <div class="card-body text-center text-white">
    	<h5 class="card-title">DLUX VR BUILDER</h5>
    	<p class="card-text">Remix our boilerplate on Glitch and upload your own images and 3D models</p>
		<hr class="bg-light">
		<center>
		<ul class="text-left">
		<li>App Type: VR</li>
		<li>Builder: 2D drag-and-drop asset upload, code panel, and publishing form; 3D A-Frame inspector</li>
		<li>Difficulty: Intermediate</li>
		</ul>
		</center>
    	<a href="https://dlux-vr.glitch.me/build.html" target="_blank" class="btn btn-danger">Get Started</a>
  	  </div>
	</div>
	<div class="card w-100 border-danger bg-none my-5">
      <div class="card-body text-center text-white">
    	<h5 class="card-title">SUPERCRAFT</h5>
    	<p class="card-text">Use a VR headset to build scenes with your hands, then publish to DLUX</p>
		<hr class="bg-light">
		<center>
		<ul class="text-left">
		<li>App Type: VR</li>
		<li>Builder: VR with Touch Controls, 2D publishing form</li>
		<li>Difficulty: Easy</li>
		</ul>
		</center>
    	<a href="/new/supercraft" class="btn btn-danger">Get Started</a>
  	  </div>
	</div>
	<div class="card w-100 border-danger bg-none my-5">
      <div class="card-body text-center text-white">
    	<h5 class="card-title">ADVANCED XR UPLOADER</h5>
    	<p class="card-text">Remix our boilerplate on Glitch and upload your own images and 3D models</p>
		<hr class="bg-light">
		<center>
		<ul class="text-left">
		<li>App Type: XR</li>
		<li>Builder: 2D drag-and-drop asset upload and publishing form</li>
		<li>Difficulty: Easy</li>
		</ul>
		</center>
    	<a href="/new/advanced" class="btn btn-danger">Get Started</a>
  	  </div>
	</div>	
	</div>
	</main>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/footer.php";
   include_once($path);
?>
<script>checkCookie()</script>
</body></html>
