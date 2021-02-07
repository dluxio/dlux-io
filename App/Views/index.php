<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX</title>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/header.php";
   include_once($path);
?>
<style>
	#dapps {
		background-image: url("/img/jtree.jpg");
		background-size: cover;
		background-position: center;
		min-height: 600px;
	}
	#defi {
		background-image: url("/img/dex-alpha.png");
		background-size: cover;
		background-position: center;
		min-height: 600px;
	}
	#hive {
		background-image: url("/img/metaverse.png");
		background-size: cover;
		background-position: center;
		min-height: 600px;
	}
	#info {
		background-image: url("/img/foundersavatars.png");
		background-size: cover;
		background-position: center;
		min-height: 600px;
	}
	.dlux-header {
		border-bottom: solid;
		border-bottom-color: gray;
		border-width: 2px;
	}
	.dlux-is{
		text-decoration: underline; 
		text-decoration-color: white;
	}
	.dlux-turq {
		color: #21FFB5;
		border-color: #21FFB5;
		border-style: solid;
		border-width: 1.5px;
	}
	.dlux-blue {
		color: #033EFD;
		border-color: #033EFD;
		border-style: solid;
		border-width: 1.5px;
	}
	.dlux-fusch {
		color: #FB00FF;
		border-color: #FB00FF;
		border-style: solid;
		border-width: 1.5px;
	}
	.dlux-tang {
		color: #FFA300;
		border-color: #FFA300;
		border-style: solid;
		border-width: 1.5px;
	}
	
	.jumbo-dlux {
		background-color: rgba(0,0,0,0.8);
		-webkit-backdrop-filter: blur(10px);
  		backdrop-filter: blur(10px);
		border-radius: 1000px;
		max-width: 600px;
	}
	.btn-dlux {
		min-width: 150px;
	}
	.btn-dlux:hover {
		color: cornflowerblue;
	}
	.btn-dlux:active {
		color: darkorange;
	}
	.border-turq {
		border-color: #21FFB5;
	}
	.btn-turq {
		color: #fff;
		background: #21FFB5;
	}
	.btn-outline-turq {
		color: #fff;
		border-color: #21FFB5;
	}
	.border-blue {
		border-color: #033EFD;
	}
	.btn-blue {
		color: #fff;
		background: #033EFD;
	}
	.btn-outline-blue {
		color: #fff;
		border-color: #033EFD;
		
	}
	.border-fusch {
		border-color: #FB00FF;
	}
	.btn-fusch {
		color: #fff;
		background: #FB00FF;
	}
	.btn-outline-fusch {
		color: #fff;
		border-color: #FB00FF;
	}
	.border-tang {
		border-color: #FFA300;
	}
	.btn-tang {
		color: #fff;
		background: #FFA300;
	}
	.btn-outline-tang {
		color: #fff;
		border-color: #FFA300;
	}	
</style>
</head>
<body class="d-flex flex-column h-100">
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/nav.php";
   include_once($path);
?>
<main class="d-flex flex-column text-center flex-shrink-0">
	<div id="dapps" class="d-flex flex-row px-2">
		<div class="d-flex flex-column dlux-blue jumbo-dlux container p-5 m-auto">
			<div class="dlux-header"><h1><span class="text-white">dlux is:</span> <span class="dlux-is">dApps</span></h1></div>
			<div class="mt-2"><h5 class="text-white">2D, 3D, AR, VR, XR, ANYTHING</h5></div>
			<div>
				<a class="btn btn-dlux btn-blue mt-2" href="/vr/">Enter Metaverse</a>
				<a class="btn btn-dlux btn-outline-blue mt-2" href="/apps/">Browse dApps</a>
			</div>
		</div>
	</div>
	<div id="defi" class="d-flex flex-row px-2">
		<div class="d-flex flex-column dlux-turq jumbo-dlux container p-5 m-auto">
			<div class="dlux-header"><h1><span class="text-white">dlux is:</span> <span class="dlux-is">DeFi</span></h1></div>
			<div class="mt-2"><h5 class="text-white">TOKEN EXCHANGE NETWORK</h5></div>
			<div>
				<a class="btn btn-dlux btn-turq mt-2" href="/dex/">Trade Tokens</a>
				<a class="btn btn-dlux btn-outline-turq mt-2" href="/new/node">Run A Node</a>
			</div>
		</div>
	</div>
	<div id="hive" class="d-flex flex-row px-2">
		<div class="d-flex flex-column dlux-fusch jumbo-dlux container p-5 m-auto">
			<div class="dlux-header"><h1><span class="text-white">dlux is:</span> <span class="dlux-is">Hive</span></h1></div>
			<div class="mt-2"><h5 class="text-white">OWN YOUR ACCOUNT &amp; CONTENT</h5></div>
			<div>
				<a class="btn btn-dlux btn-fusch mt-2" href="https://signup.hive.io/" target="_blank">Get Account</a>
				<a class="btn btn-dlux btn-outline-fusch mt-2" href="#" data-toggle="modal" data-target="#loginModal">Login</a>
			</div>
		</div>
	</div>
	<div id="info" class="d-flex flex-row px-2">
		<div class="d-flex flex-column dlux-tang jumbo-dlux container p-5 m-auto">
			<div class="dlux-header"><h1><span class="text-white">dlux is:</span> <span class="dlux-is">Open</span></h1></div>
			<div class="mt-2"><h5 class="text-white">LEARN MORE ABOUT THE PROJECT</h5></div>
			<div>
				<a class="btn btn-dlux btn-tang mt-2" href="/docs/#about">About Page</a>
				<a class="btn btn-dlux btn-outline-tang mt-2" href="/docs/">Documentation</a>
			</div>
		</div>
	</div>
</main>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/footer.php";
   include_once($path);
?>
<script>
function pageSpecific(info){
    me(info)
}
</script>
</body></html>
