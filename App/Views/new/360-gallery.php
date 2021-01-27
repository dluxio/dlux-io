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
	.imgwell {
		background: #FCF4D9;
		color: #FF7A5A;
		border: #FF7A5A;
		border-style: solid;
		border-radius: 5px;
		border-width: 5px;
			}
	.imgwell.drag {
		background: #8ED2C9;		
			}
</style>
<script src="../js/img-ipfs.js"></script>
<script src="https://unpkg.com/ipfs-http-client@29.1.1/dist/index.min.js"></script>
    <script>
    const ipfs = window.IpfsHttpClient({ host: 'ipfs.infura.io', port: '5001', protocol: 'https' })
    function saveToIpfs(ar, pin, is360, newAsset){
      console.log(`You've requested to upload and pin(${pin}) 360(${is360}) image(s) and create assets(${newAsset})\nIPFS maky take some time to upload...`)
      var ipfsIP = []
      var info = []
      for (var name in ar){
        ipfsIP.push({'path':`${ar[name][1]}`,'content':ar[name][0]})
        info.push([name,ar[name][1]])
      }
    ipfs.add(ipfsIP, (err, ipfsReturn) => {
            if (!err){
              var pass = localStorage.getItem('pass')
              if (!pass){
              pass = alert('enter the edit password', 'set this in .env')
                localStorage.setItem('pass', pass)
              }
              fetch(`/img/${pass}`, {
                method: 'POST',
                headers: {
            "Content-Type": "application/json",
            // "Content-Type": "application/x-www-form-urlencoded",
        },
                body: JSON.stringify({refs:ipfsReturn, info, pin, is360,new:newAsset})
              })
              .then(response => response.text())
              .then(response => console.log('IPFS Complete, glitches turn...', response))
              .catch(error => console.error('Error:', error));
            } else {
        console.log('IPFS Upload Failed', err)}
          })
    }
    </script>
</head>

<body class="d-flex flex-column h-100 padme-t70 text-center text-white">
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/nav.php";
   include_once($path);
?>
<main role="main" class="p-3 flex-shrink-0">
	<h1 class="p-5">DLUX 360° Image Gallery</h1>
	<div class="d-flex flex-wrap justify-content-center">
	  <div class="flex-column mb-4">
		<div class="flex-row">
			<div class="imgwell p-5">
				<h3>Drag and drop your images here</h3>
				<h6>Supports .JPG, .JPEG, .PNG up to 5 MB</h6>
			  <div class="option">
					<input type="checkbox" id="pinthis" checked /> Request to pin asset upon post.
				</div>
			</div>
		</div>
		<div class="flex-row text-left">
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
		    <button type="submit" class="btn btn-danger">Publish</button>
		  </div>
	    </form>
		</div>
      </div>
		<div class="flex-column flex-shrink mx-3">
			<div id="item01" class="d-flex flex-row px-3 mb-3">
		  		<div id="pano01" class="mr-3">
					<div><img id="pImg01" src="/img/equirectangular.jpeg" height="150"/></div>
					<div class="small"><a href="#" id="deleteItem01">Delete</a></div>
		  		</div>
		  		<div id="thumb01">
					<div><img id="tImg01" src="/img/equirectangular_thumb.jpg" height="150"/></div>
					<div class="small"><a href="#" id="editThumb01">Edit</a></div>
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
