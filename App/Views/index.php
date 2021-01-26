<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX</title>
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
<main>
	  <div class="d-flex flex-column align-items-center h-100 text-white">
	<div class="jumbotron jumbotron-fluid text-center text-white bg-color">
       <div class="container">
		<div class="row">
         <div class="col-xl-6"><h1 class="display-4">dlux</h1>
		   <h6 class="text-uppercase">Decentralized Limitless User Experiences</h6>
		   <hr class="bg-light">
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
	<div class="jumbotron bg-dark border-danger mb-5" style="border-style:solid">
		<h1 class="text-center">Support Our Hive Proposals</h1>
		<hr class="bg-light">
	<h6 class="text-uppercase text-center">We currently have 2 proposals on HIVE</h6>
		<ul>
		<li><a href="https://peakd.com/proposals/148" target="_blank">#148</a> - Funds the development of our Token and DEX to further our decentralized finance architecture.</li>
		<li><a href="https://peakd.com/proposals/152" target="_blank">#152</a> - Funds the development of our DAO multi-signature wallet to enable higher security and more features.</li>
		</ul>
	<hr class="bg-light">
		<p class="text-center">Vote on both at once by clicking the button below.</p>
		<center><button class="btn btn-danger">Vote Now</button></center>
	</div>
	<div class="mt-auto">
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
			    <a class="btn btn-lg btn-outline-primary" href="/new/node/" role="button">Run A Node</a>
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
<script>
function pageSpecific(info){
    me(info)
}
</script>
</body></html>
