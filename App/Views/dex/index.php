<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - DEX</title>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/header.php";
   include_once($path);
?>
<!--dmx App Connect-->
<script src="/dmxAppConnect/dmxAppConnect.js"></script>
<script src="/dmxAppConnect/dmxMoment.js"></script>
<script src="/dmxAppConnect/dmxFormatter.js"></script>
<script src="/dmxAppConnect/dmxDataTraversal/dmxDataTraversal.js"></script>
<script src="/dmxAppConnect/dmxFormatter/dmxFormatter.js"></script>
	
<!--page specific-->
<script src="/js/dex.js"></script>
<script src="/js/ico.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

</head>
<body class="d-flex flex-column h-100 padme-t70 text-white" id="index" is="dmx-app">
<dmx-api-datasource id="sales" is="dmx-fetch" url="https://token.dlux.io/api/sales"></dmx-api-datasource>
<dmx-data-view id="salesToken" dmx-bind:data="sales.data.result" sorton="time" pagesize="10"></dmx-data-view>
<dmx-data-view id="salesMint" dmx-bind:data="sales.data.mint" sorton="time" pagesize="10"></dmx-data-view>
<dmx-api-datasource id="auctions" is="dmx-fetch" url="https://token.dlux.io/api/auctions"></dmx-api-datasource>
<dmx-data-view id="salesToken" dmx-bind:data="sales.data.result" sorton="time" pagesize="10"></dmx-data-view>
<dmx-data-view id="salesMint" dmx-bind:data="sales.data.mint" sorton="time" pagesize="10"></dmx-data-view>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/nav.php";
   include_once($path);
?>
	
<main role="main" class="flex-shrink-0">
  <div class="container">
    <div class="container-fluid" style="padding: 0">
		
	   <div class="jumbotron text-dark mt-5 text-center" style="background:radial-gradient(gold,orange)">
		  <h1 class="display-4">DLUX OpenToken</h1>
		   <hr class="my-4">
		  <p class="lead">The most decentralized token powering the multiverse!</p>
		  <p class="lead"> <a class="btn btn-primary btn-lg" href="/dex/dlux/" role="button">Get DLUX</a> </p>
	  </div>
		
		<div style="border-bottom: #FFFFFF thick solid"><h1 class="text-white p-0 m-0">Minted NFTs</h1></div>
	   <div class="card-columns my-3" id="sales-token-cards">
		<div class="card text-white bg-dark" dmx-repeat:repeatToken1="salesToken.data">
		 <a href="#inventoryModal" class="a-1" data-toggle="modal" dmx-on:click="inventory_iterator.select($index);inventory_detail.select(uid)">
		  <div class="card-header text-center" style="background: purple"><h5 class="card-title">{{set}} <span style="color:aqua;">{{uid}}</span></h5></div>
		  <div class="card-img-top" dmx-bind:id="image-{{set}}-{{uid}}" dmx-bind:alt="{{script}}">{{uid.nftImageWell(script, set)}}</div>
		  <div class="card-body"><p class="card-text">Behold&#33; The DLUX Founders Token. Own a piece of dlux in the form of an NFT that is redeemable for...</p></div>
		 </a>
		 <div class="card-footer text-center">{{price.nai()}}</div>
		</div>
	   </div>


		
		<div dmx-repeat:repeatMint1="salesMint.data">
			<div dmx-repeat:repeatMint2="$value">
	  			<div style="border-bottom: #FFFFFF thick solid"><h1 class="text-white p-0 m-0">Unminted - {{set}}</h1></div>
	   			<div class="card-columns my-3" id="sales-mint-cards" >
					<div class="card text-white bg-dark" dmx-repeat:repeatMint3="items">
					<a href="#inventoryModal" class="a-1" data-toggle="modal" dmx-on:click="inventory_iterator.select($index);inventory_detail.select(uid)">
						<div class="card-header text-center" style="background: #43C45F"><h5 class="card-title" dmx-bind:id="timer-{{set}}-{{uid}}">{{time.animateTime(set, uid)}}</h5></div>
						<div class="card-img-top" dmx-bind:id="image-{{set}}-{{uid}}" dmx-bind:alt="image-{{set}}-{{uid}}"><h1 class="p-5 text-center" style="color: #43C45F"><i class="far fa-gem"></i></h1></div>
						<div class="card-body"><p class="card-text">MINT DLUX FOUNDERS TOKEN. Unwrap to see color, redeemable for 100 DLUX.</p></div>
					</a>
					<div class="card-footer text-center">{{price.nai()}}</div>
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

</body>
</html>
