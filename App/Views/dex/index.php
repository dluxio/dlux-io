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
<dmx-api-datasource id="auctions" is="dmx-fetch" url="https://token.dlux.io/api/auctions"></dmx-api-datasource>
<dmx-data-view id="auctionsToken" dmx-bind:data="auctions.data.result" sorton="time" pagesize="4"></dmx-data-view>
<dmx-data-view id="salesToken" dmx-bind:data="sales.data.result" sorton="time" pagesize="4"></dmx-data-view>
<dmx-data-view id="salesMint" dmx-bind:data="sales.data.mint" sorton="price.amount" pagesize="3" ></dmx-data-view>
<style>
.circle {
  width: 50px;
  height: 50px;
  line-height: 50px;
  border-radius: 50%;
  font-size: 25px;
  color: #fff;
  text-align: center;
  background: #000
}
	</style>

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
		<div style="border-bottom: #FFFFFF thick solid"><h1 class="text-white p-0 m-0">Fungible Tokens</h1></div>
	   			<div class="card-columns my-3" id="sales-mint-cards" >
					<div dmx-repeat:repeatsalesmint1="salesMint.data">
					<div class="card" style="color:black; background:radial-gradient(gold,orange)">
					<a href="#inventoryModal" class="a-1" data-toggle="modal" dmx-on:click="inventory_iterator.select($index);inventory_detail.select(uid)">
						<div class="card-header text-center" style=""><h5 class="card-title lead" style="color: black">COIN</h5></div>
						<div class="card-img-top" alt="dlux-coin"><h1 class="py-3 mb-0 text-center text-primary"><i class="fas fa-coins"></i></h1><h3 class="text-center mb-0" style="color: black;">DLUX Token</h3><p class="card-text lead text-center pt-1" style="color: black">Powering the multiverse!</p></div>
						<div class="card-body" style="color: black;"><div class="text-center"><u>0.254 HIVE</u></div></div>
					</a>
						<div class="card-footer text-center"><p class="lead"> <a class="btn btn-primary btn-lg" href="/dex/dlux/" role="button">Get DLUX</a> </p></div>
					</div>
					<div class="card text-white bg-dark" style="color:black; background:radial-gradient(lawngreen,#43C45F)" dmx-repeat:repeatsalesmint2="$value">
					<a href="#inventoryModal" class="a-1" data-toggle="modal" dmx-on:click="inventory_iterator.select($index);inventory_detail.select(uid)">
						<div class="card-header text-center" style="background: linear-gradient(#43C45F,lawngreen)"><h5 class="card-title lead" style="color: black">MINT</h5></div>
						<div class="card-img-top" dmx-bind:id="image-{{set}}" dmx-bind:alt="image-{{set}}"><h1 class="py-3 mb-0 text-center text-primary" style="color: #43C45F"><i class="far fa-gem"></i></h1><h3 class="text-center mb-0" style="color: black;">{{set}} NFT</h3><p class="lead card-text text-center pt-1" style="color: black">Unwrap to see attributes.</p></div>
						<div class="card-body" style="color: black;"><div class="text-center"><u>{{items[0].price.nai()}}</u></div></div>
					</a>
						<div class="card-footer text-center"><p class="lead"> <a class="btn btn-primary btn-lg" href="/dex/dlux/" role="button">Buy NFT</a> </p></div>
					</div>
				</div>
			</div>
		
		
		
		<div style="border-bottom: #FFFFFF thick solid"><h1 class="text-white p-0 m-0">NFT Auctions</h1></div>
		<div class="card-columns my-3" id="auctions-token-cards">
		   <div class="card text-white bg-dark" dmx-repeat:repeatauctiontoken1="auctionsToken.data">
		 <a href="#inventoryModal" class="a-1" data-toggle="modal" dmx-on:click="inventory_iterator.select($index);inventory_detail.select(uid)">
		  <div class="card-header d-flex" style="color:;background: linear-gradient(dodgerblue,cornflowerblue)">
			  <div class="circle">{{uid}}</div>
			  <h3 class="card-title lead border rounded p-2 ml-auto">{{set}} NFT</h3>
			  
		</div>
		  <div class="card-img-top p-1" dmx-bind:id="image-{{set}}-{{uid}}" dmx-bind:alt="image-{{set}}-{{uid}}">{{uid.nftImageWell(script, set)}}</div>
			<div class="text-center " style="background: crimson"><h5 dmx-bind:id="timer-{{set}}-{{uid}}" class="mb-0 lead">{{time.animateTime(set, uid)}}</h5></div>
			 <div class="card-body"><p class="card-text text-center">Auction: <u>{{price.nai()}}</u></p></div>
		 <div class="card-footer text-center"><p class="lead"> <a class="btn btn-primary btn-lg" href="#" role="button">Bid NFT</a> </p></div>
		</a></div>
			
		
			
	   </div>
		<div style="border-bottom: #FFFFFF thick solid"><h1 class="text-white p-0 m-0">NFT Sales</h1></div>
	   <div class="card-columns my-3" id="sales-token-cards">
		<div class="card text-white bg-dark" dmx-repeat:repeatsalestoken1="salesToken.data">
		 <a href="#inventoryModal" class="a-1" data-toggle="modal" dmx-on:click="inventory_iterator.select($index);inventory_detail.select(uid)">
		  <div class="card-header d-flex" style="background: linear-gradient(blueviolet,darkorchid)">
			  <div class="circle">{{uid}}</div>
			  <h3 class="card-title lead border rounded p-2 ml-auto">{{set}} NFT</h3>
			 </div>
		  <div class="card-img-top" dmx-bind:id="image-{{set}}-{{uid}}" dmx-bind:alt="image-{{set}}-{{uid}}">{{uid.nftImageWell(script, set)}}</div>
		<div class="text-center " style="background: crimson"><h5 dmx-bind:id="timer-{{set}}-{{uid}}" class="mb-0 lead">{{time.animateTime(set, uid)}}</h5></div>
			 <div class="card-body"><p class="card-text text-center">Price: <u>{{price.nai()}}</u></p></div>
		 <div class="card-footer text-center"><p class="lead"> <a class="btn btn-primary btn-lg" href="#" role="button">Buy NFT</a> </p></div>
		</a></div>
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
