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

<body class="d-flex flex-column h-100 padme-t70">
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/nav.php";
   include_once($path);
?>
<main role="main" class="flex-shrink-0">
  <div class="container">
	  <h1 class="text-center text-white">Build A DLUX App</h1>
	  <div class="card-deck">
		 	  <div class="card border-danger bg-dark my-5">
      <div class="card-body text-center text-white">
    	<h5 class="card-title">360° GALLERY</h5>
    	<p class="card-text">Upload 360° images to view in VR</p>
		<hr class="bg-light">
		<center>
		<ul class="text-left">
		<li>App Type: VR</li>
		<li>Builder: 2D drag-and-drop asset upload and publishing form; 3D A-Frame preview</li>
		<li>Difficulty: Easy</li>
		</ul>
		</center>
				  </div>
		  <div class="card-footer text-center">
    	<a href="/new/360-gallery" class="btn btn-danger">Get Started</a>
		  </div>
  	  </div>

		  	  <div class="card border-danger bg-dark my-5">
      <div class="card-body text-center text-white">
    	<h5 class="card-title">360° TOUR</h5>
    	<p class="card-text">Upload 360° images to view in VR</p>
		<hr class="bg-light">
		<center>
		<ul class="text-left">
		<li>App Type: VR</li>
		<li>Builder: 2D drag-and-drop asset upload and publishing form; 3D A-Frame preview</li>
		<li>Difficulty: Easy</li>
		</ul>
		</center>
		  </div>
		  <div class="card-footer text-center">
    	<a href="/new/360-tour" class="btn btn-danger disabled">Coming Soon</a>
		  </div>
	</div>
		  
		  <div class="card border-danger bg-dark my-5">
      <div class="card-body text-center text-white">
    	<h5 class="card-title">360° VIDEO</h5>
    	<p class="card-text">Link a 360° video to view in VR</p>
		<hr class="bg-light">
		<center>
		<ul class="text-left">
		<li>App Type: VR</li>
		<li>Builder: 2D drag-and-drop asset upload and publishing form; 3D A-Frame preview</li>
		<li>Difficulty: Easy</li>
		</ul>
		</center>
		  </div>
		  <div class="card-footer text-center">
    	<a href="/new/360-tour" class="btn btn-danger disabled">Coming Soon</a>
		  </div>
	</div>	  
	  </div>
	  
	<div class="card-deck">
	<div class="card border-danger bg-dark my-5">
      <div class="card-body text-center text-white">
    	<h5 class="card-title">VR BUILDER</h5>
    	<p class="card-text">Remix our boilerplate on Glitch and upload your own images and 3D models</p>
		<hr class="bg-light">
		<center>
		<ul class="text-left">
		<li>App Type: VR</li>
		<li>Builder: 2D drag-and-drop asset upload, code panel, and publishing form; 3D A-Frame inspector</li>
		<li>Difficulty: Intermediate</li>
		</ul>
		</center>
		  </div>
		  <div class="card-footer text-center">
    	<a href="https://dlux-vr.glitch.me/build.html" target="_blank" class="btn btn-danger">Get Started</a>
		  </div>
  	  </div>
	
		<div class="card border-danger bg-dark my-5">
      <div class="card-body text-center text-white">
    	<h5 class="card-title">VR GALLERY</h5>
    	<p class="card-text">Choose a 3D gallery template and upload your assets</p>
		<hr class="bg-light">
		<center>
		<ul class="text-left">
		<li>App Type: VR</li>
		<li>Builder: 2D drag-and-drop asset upload, code panel, and publishing form; 3D A-Frame inspector</li>
		<li>Difficulty: Intermediate</li>
		</ul>
		</center>
		  </div>
		  <div class="card-footer text-center">
    	<a href="#" target="_blank" class="btn btn-danger disabled">Coming Soon</a>
		  </div>
  	  </div>

	<div class="card border-danger bg-dark my-5">
      <div class="card-body text-center text-white">
    	<h5 class="card-title">SUPERCRAFT</h5>
    	<p class="card-text">Use a VR headset with SUPERMEDIUM to build scenes with your hands </p>
		<hr class="bg-light">
		<center>
		<ul class="text-left">
		<li>App Type: VR</li>
		<li>Builder: VR with Touch Controls, 2D publishing form</li>
		<li>Difficulty: Easy</li>
		</ul>
		</center>
		  </div>
		  <div class="card-footer text-center">
    	<a href="/new/supercraft" class="btn btn-danger">Get Started</a>
		  </div>
  	  </div>
	
	  </div>
		<div class="card-deck">
	<div class="card border-danger bg-dark my-5">
      <div class="card-body text-center text-white">
    	<h5 class="card-title">ADVANCED UPLOADER</h5>
    	<p class="card-text">Upload any HTML5 Single Page App (SPA)</p>
		<hr class="bg-light">
		<center>
		<ul class="text-left">
		<li>App Type: AR/VR/2D</li>
		<li>Builder: 2D publishing form with drag-and-drop support for images</li>
		<li>Difficulty: Easy</li>
		</ul>
		</center>
		  </div>
		  <div class="card-footer text-center">
    	<a href="/new/advanced" class="btn btn-danger">Get Started</a>
		  </div>
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
