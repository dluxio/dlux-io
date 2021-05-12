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
		background-image: url("/img/metaverse-vr-comp.jpg");
		background-size: cover;
		background-position: center;
		min-height: 600px;
		margin-top: -70px;
	}
	#defi {
		background-image: url("/img/dex-vr-comp.jpg");
		background-size: cover;
		background-position: center;
		min-height: 600px;
	}
	#hive {
		background-image: url("/img/jtree-comp.jpg");
		background-size: cover;
		background-position: center;
		min-height: 600px;
	}
	#info {
		background-image: url("/img/gallery-vr-comp.jpg");
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
		color: #0ED18C;
		border-color: #0ED18C;
		border-style: solid;
		border-width: 2px;
	}
	.border-turq {
		border-color: #0ED18C;
	}
	.btn-turq {
		color: #fff;
		background: #0ED18C;
	}
	.btn-outline-turq {
		color: #fff;
		border-color: #14D695;
	}
	.dlux-blue {
		color: #033EFD;
		border-color: #033EFD;
		border-style: solid;
		border-width: 2px;
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
	.dlux-fusch {
		color: #FB00FF;
		border-color: #FB00FF;
		border-style: solid;
		border-width: 2px;
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
	.dlux-tang {
		color: #FFA300;
		border-color: #FFA300;
		border-style: solid;
		border-width: 1.5px;
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
	.dlux-purp {
		color: #9300FF;
		border-color: #9300FF;
		border-style: solid;
		border-width: 2px;
	}
	.border-purp {
		border-color: #9300FF;
	}
	.btn-purp {
		color: #fff;
		background: #9300FF;
	}
	.btn-outline-purp {
		color: #fff;
		border-color: #9300FF;
	}	
	.hive {
		color: #E31337;
		border-color: #E31337;
		border-style: solid;
		border-width: 1.5px;
	}
	.border-hive {
		border-color: #E31337;
	}
	.btn-hive {
		color: #fff;
		background: #E31337;
	}
	.btn-outline-hive {
		color: #fff;
		border-color: #E31337;
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
	.jumbo-dlux {
		background-color: rgba(0,0,0,0.8);
		-webkit-backdrop-filter: blur(10px);
  		backdrop-filter: blur(10px);
		max-width: 600px;
	}	
</style>
</head>
<body class="d-flex flex-column h-100 padme-t70">
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/nav.php";
   include_once($path);
?>
<main class="d-flex flex-column text-center flex-shrink-0">
	<div id="dapps" class="d-flex flex-row px-2">
		<div class="d-flex flex-column dlux-turq jumbo-dlux container p-5 m-auto">
			<div class="dlux-header"><h1><span class="text-white">dlux is:</span> <span class="dlux-is">dApps</span></h1></div>
			<div class="mt-2"><h5 class="text-white">2D, 3D, AR, VR, XR, ANYTHING</h5></div>
			<div>
				<a class="btn btn-dlux btn-lg btn-turq mt-2" href="/vr/">Enter Metaverse<i class="fas fa-vr-cardboard ml-2"></i></a>
				<a class="btn btn-dlux btn-lg btn-outline-turq mt-2" href="/apps/">Browse dApps<i class="fab fa-wpexplorer ml-2"></i></a>
			</div>
		</div>
	</div>
	<div id="defi" class="d-flex flex-row px-2">
		<div class="d-flex flex-column dlux-tang jumbo-dlux container p-5 m-auto">
			<div class="dlux-header"><h1><span class="text-white">dlux is:</span> <span class="dlux-is">DeFi</span></h1></div>
			<div class="mt-2"><h5 class="text-white">DECENTRALIZED TOKEN EXCHANGE</h5></div>
			<div>
				<a class="btn btn-dlux btn-lg btn-tang mt-2" href="/dex/">Trade Tokens<i class="fas fa-store fa-fw ml-2"></i></a>
				<a class="btn btn-dlux btn-lg btn-outline-tang mt-2" href="/new/node">Run A Node<i class="fas fa-robot fa-fw ml-2"></i></a>
			</div>
		</div>
	</div>
	<div id="hive" class="d-flex flex-row px-2">
		<div class="d-flex flex-column hive jumbo-dlux container p-5 m-auto">
			<div class="dlux-header"><h1><span class="text-white">dlux is:</span> <span class="dlux-is">Hive</span></h1></div>
			<div class="mt-2"><h5 class="text-white">OWN YOUR ACCOUNT &amp; CONTENT</h5></div>
			<div>
				<a class="btn btn-dlux btn-lg btn-hive mt-2" href="https://signup.hive.io/" target="_blank">Get Account<i class="fab fa-fw fa-hive ml-2"></i></a>
				<a class="btn btn-dlux btn-lg btn-outline-hive mt-2" href="#" data-toggle="modal" data-target="#loginModal">Login<i class="fas fa-fw fa-key ml-2"></i></a>
			</div>
		</div>
	</div>
	<div id="info" class="d-flex flex-row px-2">
		<div class="d-flex flex-column dlux-purp jumbo-dlux container p-5 m-auto">
			<div class="dlux-header"><h1><span class="text-white">dlux is:</span> <span class="dlux-is">Open</span></h1></div>
			<div class="mt-2"><h5 class="text-white">LEARN MORE ABOUT THE PROJECT</h5></div>
			<div>
				<a class="btn btn-dlux btn-lg btn-purp mt-2" href="/about/">About Page<i class="fas fa-fw fa-info-circle ml-2"></i></a>
				<a class="btn btn-dlux btn-lg btn-outline-purp mt-2" href="/docs/">Documentation<i class="fas fa-fw fa-book ml-2"></i></a>
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
