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
<body>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/nav.php";
   include_once($path);
?>
<main class="flex-shrink-0">
  <div class="container-fluid mx-0 px-0">
    <div class="jumbotron jumbotron-fluid text-center text-white mt-5 bg-win">
       <div class="container">
		<div class="row">
         <div class="col-xl-6"><h1 class="display-4">dlux</h1>
		   <h6>DECENTRALIZED LIMITLESS USER EXPERIENCES </h6>
		   <hr class="my-4">
       <p class="lead">The easiest way to build and distribute dApps on HIVE</p>
       <p>Empower your  project with an open source token and wallet backed by deterministic concensus on a distributed ledger</p>
<p class="lead">
          <a class="btn btn-lg btn-primary m-3" href="/apps" role="button">Explore<i class="fab fa-wpexplorer ml-2"></i></a>
	
	<a class="btn btn-lg btn-secondary" href="/new" role="button">Create<i class="fas fa-plus-circle ml-2"></i></a>
       </p>

    </div>
         <div class="col-xl-6 order-first order-md-last"><img src="/img/dlux-sdk.png" alt="dlux logo" class="img-fluid"></div>
</div>
    </div> 
    </div>
	  
    <div class="card-group text-white">
		  <div class="card bg-dark border-primary text-center">
              <div class="card-body d-flex align-items-center">
                  <div>
                      <h1>Virtual Reality</h1>
                      <p>Digital spaces resoponsive across mobile, desktop, and headset all connected via tags and the Hive social network.</p>
                  </div>
              </div>
              <div class="card-footer">
                  <a class="btn btn-lg btn-outline-primary" href="/vr/" role="button">Enter The Metaverse</a>
              </div>
	    </div>
		  
	    <div class="card bg-dark border-primary text-center">
             <div class="card-body d-flex align-items-center">
                 <div>
                     <h1>Decentralized Exchange</h1>
			         <p>Absolutely no data asymetry, only pure atomic swaps via smart contracts preventing any foul use of custodial funds.</p>
                </div>
            </div>
            <div class="card-footer">
			    <a class="btn btn-lg btn-outline-primary" href="/dex/" role="button">Start Trading</a>
            </div>
	    </div>
	    <div  class="card bg-dark border-primary text-center">
            <div class="card-body d-flex align-items-center">
                <div>
                    <h1>Node Network</h1>
			        <p>Dlux nodes enable a much deeper experience with the Hive blockchain, including automated markets for asset pinning and account creation.</p>
                </div>
            </div>
            <div class="card-footer">
			    <a class="btn btn-lg btn-outline-primary" href="/docs/#nodes" role="button">Run A Node</a>
            </div>
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
<script type="text/javascript">
	checkCookie()
    </script>
  </body>
</html>
