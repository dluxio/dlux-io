<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - New Node</title>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/header.php";
   include_once($path);
?>
<style>
	.img-well {
		border-style: solid;
		border-radius: 5px;
		border-width: 5px;
			}
	.img-well.drag {
		background: #8ED2C9;		
			}
</style>
</head>

<body class="d-flex flex-column h-100 padme-t70 text-center text-white">
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/nav.php";
   include_once($path);
?>
<main role="main" class="p-3 flex-shrink-0">
	<h1 class="p-5">DLUX 360° Image Gallery Builder</h1>
	<div class="d-flex flex-wrap justify-content-center">
	  <div class="flex-column mb-4">
		<div class="flex-row">
			<div class="border-danger alert-danger img-well p-5">
				<h3>Drag and drop your images here</h3>
				<h6>.JPG, .JPEG, and .PNG up to 4096x2048 are supported</h6>
				<p>Click or tap to browse</p>
			</div>
		</div>
		<div class="flex-row text-left mt-2">
		<form>
		  <div class="form-group">
		    <label for="username">Author</label>
			  <div class="input-group">
			  	<div class="input-group-prepend">
          			<div class="input-group-text">@</div>
        		</div>
		    	<input type="text" class="form-control" readonly id="username" placeholder="Please login">
			</div>
		  </div>
		  <div class="form-group">
		    <label for="title">Title</label>
		    <input type="text" class="form-control" id="title" placeholder="Enter an attention grabbing title">
			<small id="permlinkPreview" class="form-text text-muted d-flex"><span id="permlink" class="mr-auto">Permlink: build-permlink-here</span><a href="#" class="ml-auto">Edit Permlink</a></small>
	      </div>
		  <div class="form-group">
		    <label for="title">Description</label>
		    <input type="password" class="form-control" id="title" placeholder="Enter an attention grabbing title">
	      </div>
		  <div class="form-group">
		    <label for="title">Tags</label>
		    <input type="text" class="form-control" id="tags" placeholder="tags,look,like,this">
			<small id="tagsHelp" class="form-text text-muted">Add up to 4 tags, comma separated, no spaces</small>
	      </div>
		  <div class="text-center">
		    <button type="submit" class="btn btn-primary">Publish</button>
		  </div>
	    </form>
		</div>
      </div>
		<div class="flex-column flex-shrink mx-3">
			<div id="item01 px-3 mb-3">
				<div class="d-flex align-items-center flex-row pb-2 mb-2" style="border-bottom-style: solid; border-bottom-color: #909090">
					<div style="font-size: 1.3em; font-weight: bold">Item01</div>
					<div class="ml-auto"><button class="btn btn-primary btn-sm mr-2"><i class="fas fa-fw fa-thumbtack"></i></button><button class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash-alt"></i></button></div>
				</div>
				<div class="d-flex flex-row">
		  		<div id="source01" class="mr-3">
					<div><img id="sImg01" src="/img/equirectangular.jpeg" height="150"/></div>
					<div class="small"><a href="#" id="sHashImg01" target="_blank">Source</a></div>
		  		</div>
		  		<div id="thumb01">
					<div><img id="tImg01" src="/img/equirectangular_thumb.jpg" height="150"/></div>
					<div class="small"><a href="#" id="tHashImg01" target="_blank">Thumbnail</a></div>
		  		</div>
			</div>
		</div>
		</div>
	  <div class="flex-column flex-fill">
		<iframe src="https://volcano-aware-cardboard.glitch.me/" width="100%" height="100%" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
	</div>
</main>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/footer.php";
   include_once($path);
?>
</body></html>
