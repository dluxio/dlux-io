<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX</title>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/header.php";
   include_once($path);
?>
<!-- Initialization -->
<script>
	steem.api.setOptions({url:"https://anyx.io"})
	$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
</head>
<body class="d-flex flex-column h-100">
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/nav.php";
   include_once($path);
?>
<main class="flex-shrink-0">
  <div class="container-fluid padme-t70">
    <div class="jumbotron jumbotron-fluid text-center text-white mt-5 bg-win">
       <div class="container">
		<div class="row">
         <div class="col-xl-6"><h1 class="display-4">dlux</h1>
		   <h6>DECENTRALIZED LIMITLESS USER EXPERIENCES</h6>
		   <hr class="my-4">
       <p class="lead">The easiest way to build and distribute dApps on HIVE</p>
       
		<p></p>
       <p>Empower your  project with an open source token  and wallet backed by deterministic concensus on a distributed ledger</p>
       <p>Simple onboarding with magic link emails and HIVE wallet creation</p>
<p class="lead">
          <a class="btn btn-lg btn-outline-primary m-3" href="/apps" role="button">Explore<i class="fab fa-wpexplorer ml-2"></i></a>
	
	<a class="btn btn-lg btn-outline-secondary" href="/new" role="button">Create<i class="fas fa-plus-circle ml-2"></i></a>
       </p>

    </div>
         <div class="col-xl-6 order-first order-md-last"><img src="/img/dlux-sdk.png" alt="dlux logo" class="img-fluid"></div>
</div>
    </div> 
    </div>
	  
    <div class="container-fluid text-white bg-dark">
	  <div class="row">
		  <div class="col-xl-4">
			   <p class="lead">Smart</p>
			  <p><img src="/img/smart-img.png" class="img-fluid rounded" alt="smart"></p>
	    	<p>Dlux is turing complete and can handle smart contracts, non fungible tokens, escrow, voting, and any other programming logic.</p>
			<p class="text-center"><a class="btn btn-lg btn-outline-primary" href="https://github.com/dluxio/dluxio" role="button">Contribute code</a></p>
	    </div>
		  
	    <div class="col-xl-4">
			<p class="lead">Secure</p>
	    	<p><img src="/img/secure-img.png" class="img-fluid rounded" alt="secure"></p>
			<p>Dlux utilizes the HIVE proof-of-stake blockchain to maintain trustless concensus via node networks for peer-to-peer transactions in a deterministic way.</p>
			<p class="text-center"><a class="btn btn-lg btn-outline-primary" href="/docs/index.html" role="button">Run a node</a></p>
	    </div>
	    
	    <div class="col-xl-4">
			<p class="lead">Compatible</p>
	    	<p><img src="/img/compatible-img.png" class="img-fluid rounded" alt="compatible"></p>
			<p>Dlux works with all HTML5 web technologies, including OpenGL, A-Frame, JavaScript, WebXR, React, Vue, Bootstrap, and others.</p>
			<p class="text-center"><a class="btn btn-lg btn-outline-primary" href="https://dlux-vr.glitch.me/build.html" target="_blank" role="button">Build VR</a></p></div>
	</div>
  </div>
	</div>
	</main>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/footer.php";
   include_once($path);
?>
<script type="text/javascript">
	checkCookie()
    </script>
  </body>
</html>
