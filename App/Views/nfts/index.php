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

</head>
<body class="d-flex flex-column h-100 padme-t70 text-white" id="index" is="dmx-app">

<dmx-api-datasource id="dex" is="dmx-fetch" url="https://token.dlux.io/dex/"></dmx-api-datasource>
<dmx-data-view id="dexSellOrders" dmx-bind:data="dex.data.markets.hive.sells" sorton="key" ></dmx-data-view>
	
<dmx-api-datasource id="sales" is="dmx-fetch" url="https://token.dlux.io/api/sales"></dmx-api-datasource>
<dmx-data-view id="salesToken" dmx-bind:data="sales.data.result" sorton="time" pagesize="4"></dmx-data-view>
<dmx-data-view id="salesMint" dmx-bind:data="sales.data.mint" sorton="price.amount" pagesize="3" ></dmx-data-view>
<dmx-api-datasource id="auctions" is="dmx-fetch" url="https://token.dlux.io/api/auctions"></dmx-api-datasource>
<dmx-data-view id="auctionsToken" dmx-bind:data="auctions.data.result" sorton="time" pagesize="4"></dmx-data-view>
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
	.circle2 {
  width: 75px;
  height: 75px;
  line-height: 75px;
  border-radius: 50%;
  font-size: 50px;
  color: crimson;
  text-align: center;
  background: #000;
		
}
	.arrow {
	position: absolute;
	background: #ffc107;
	border-radius: 50%;
	border: black thick solid;
	text-align: center;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 4rem;
    height: 4rem;
    z-index: 1;
	color: crimson;
	
	}
	.arrow2 {
		position: absolute;
		left: 50%;
    	transform: translate(-50%, -50%);
		z-index: 1;
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
	
		
      <div class="jumbotron text-white text-center p-4 mt-5" 
           style="background: linear-gradient(217deg, rgba(33,255,181,.8), rgba(33,255,181,0) 70.71%),
          linear-gradient(127deg, rgba(251,0,255,.8), rgba(251,0,255,0) 70.71%),
                              linear-gradient(336deg, rgba(3,62,253,.8), rgba(3,62,253,0) 70.71%);">
 
      <div class="jumbotron text-white text-left bg-none m-5 p-4">
        <div class="d-flex flex-wrap row">
            <div class="d-flex flex-column col-lg-6">
                <h1 class="display-4">Discover, collect, and sell NFTs</h1>
                <div class="my-2">
                    <button id="nftexplore" class="btn btn-lg btn-primary px-4 mr-3">Explore</button>
                    <button id="nftcreate" class="btn btn-lg btn-secondary px-4 ml-3">Create</button>
                </div>
                <div class="my-4"><a href="/about/"><i class="fas fa-info-circle"></i> Learn more about DLUX</a></div>
            </div>
            <div class="d-flex flex-column col-lg-6">
                <div class="jumbotron" style="background: rgba(0,0,0,0.5)">
                    <p class="col-12 text-center">Featured</p>
                </div>
            </div>
        </div>
      </div>

				<div class="d-none jumbotron m-0 p-3" style="background: rgba(0,0,0,0.5)">
					<h3 class="text-left pb-2">Currency Exchange</h3>
				<div class="card-deck" >
					
					<div class="card" style="color:black;background:linear-gradient(orange,yellow)">
						<a href="#buyDluxModal" class="a-1" data-toggle="modal">
		  			<div class="card-header">
						<div class="d-flex m-2 text-dark">
			  				<div>DLUX</div>
			  				<div class="ml-auto ">0.54372&#37;</div>
						</div>
						<h4 class="text-center text-success">&#36;0.2513</h4>
						</div>
						<div class="card-footer text-white" style="background: rgba(0,0,0,0.5)">
							<div class="d-flex">
          						<p class="ml-auto mb-2">Balance&#58;<u class="ml-2 font-weight-bold" style="font-size:1.1em;">1,234.567 DLUX</u></p>
        					</div>
		  				</div>
						</a>
					</div>
			
		<div class="card" style="color:black;background:linear-gradient(red,orangered)">
			<div class="card-header">
			<div class="d-flex m-2">
			  <div>HIVE</div>
			  <div class="ml-auto">0.54372&#37;</div>
			</div>
			<h4 class="text-center">&#36;1.05</h4>
			</div>
			<div class="card-footer text-white" style="background: rgba(0,0,0,0.5)">
							<div class="d-flex">
          						<p class="ml-auto mb-2">Balance&#58;<u class="ml-2 font-weight-bold" style="font-size:1.1em;">125.635 HIVE</u></p>
        					</div>
		  				</div>
		  </div>
		
		<div class="card" style="color:black;background:linear-gradient(#43C45F,lawngreen)">
			<div class="card-header">
			<div class="d-flex m-2">
			  <div>HBD</div>
			  <div class="ml-auto" dmx-class="">0.65898&#37;</div>
			</div>
			<h4 class="text-center">&#36;0.97089</h4>
			</div>
			<div class="card-footer text-white" style="background: rgba(0,0,0,0.5)">
							<div class="d-flex">
          						<p class="ml-auto mb-2">Balance&#58;<u class="ml-2 font-weight-bold" style="font-size:1.1em;">34.281 HBD</u></p>
        					</div>
		  				</div>
		  </div>
					
		</div>
		</div>
			</div>
		
		
      <div class="mt-4" style="border-bottom: #FFFFFF thick solid">
        <h1 class="text-white p-0 m-0">Sealed NFTs</h1>
      </div>
      <div class="card-columns my-3" id="sales-mint-cards" >
        <div dmx-repeat:repeatsalesmint1="salesMint.data">
          <div class="card d-none" style="color:black; background:radial-gradient(yellow,darkorange)"> <a href="#buyDluxModal" class="a-1" data-toggle="modal">
            <div class="card-header text-center" style="color: black;background:linear-gradient(darkorange,yellow)">
              <h5 class="card-title lead">COIN</h5>
            </div>
            <div class="card-img-top" alt="dlux-coin">
              <h1 class="py-3 mb-0 text-center text-primary"><i class="fas fa-coins"></i></h1>
              <h3 class="text-center mb-0" style="color:  black;">DLUX Token</h3>
              <p class="card-text lead text-center pt-1" style="color: black">Powering the multiverse!</p>
            </div>
            <div class="card-body" style="color: black;">
              <div class="text-center"><u>0.254 HIVE</u></div>
            </div>
            <div class="card-footer text-center">
              <p class="lead">
                <button class="btn btn-primary btn-lg" href="#" role="button">Get DLUX</button>
              </p>
            </div>
          </a></div>
          <div class="card" style="color:black; background:radial-gradient(#8D42EB,purple)" dmx-repeat:repeatsalesmint2="$value"> 
			  <a href="#auctionsModal" class="a-1" data-toggle="modal" dmx-on:click="auctions_iterator.select($index);auctions_detail.select(uid)">
            <div class="card-header text-center" style="background: linear-gradient(purple,#8D42EB) ">
              <h5 class="card-title lead">MINT</h5>
            </div>
            <div class="card-img-top" dmx-bind:id="image-{{set}}" dmx-bind:alt="image-{{set}}">
              <h1 class="py-3 mb-0 text-center" ><i class="far fa-gem"></i></h1>
              <h3 class="text-center mb-0">{{set}} NFT</h3>
              <p class="lead card-text text-center pt-1">Unwrap to see attributes.</p>
            </div>
            <div class="card-body">
              <div class="text-center"><u>{{items[0].price.nai()}}</u></div>
            </div>
            </a>
            <div class="card-footer text-center">
              <p class="lead"> <a class="btn btn-primary btn-lg" href="/dex/dlux/" role="button">Buy NFT</a></p>
            </div>
          </div>
        </div>
      </div>
      <div style="border-bottom: #FFFFFF thick solid">
        <h1 class="text-white p-0 m-0">NFT Auctions</h1>
      </div>
      <div class="card-columns my-3" id="auctions-token-cards">
        <div class="card text-white bg-dark" dmx-repeat:repeatauctiontoken1="auctionsToken.data"> <a href="#auctionsModal" class="a-1" data-toggle="modal" dmx-on:click="auctions_iterator.select($index);auctions_detail.select(uid)">
          <div class="card-header d-flex" style="color:;background: linear-gradient(dodgerblue,cornflowerblue)">
            <div class="circle">{{uid}}</div>
            <h3 class="card-title lead border rounded p-2 ml-auto">{{set}} NFT</h3>
          </div>
          <div class="card-img-top p-1" dmx-bind:id="image-{{set}}-{{uid}}" dmx-bind:alt="image-{{set}}-{{uid}}">{{uid.nftImageWell(script, set)}}</div>
          <div class="text-center " style="background: crimson">
            <h5 dmx-bind:id="timer-{{set}}-{{uid}}" class="mb-0 lead">{{time.animateTime(set, uid)}}</h5>
          </div>
          <div class="card-body d-flex flex-column text-center">
            <span>High Bidder: {{bidder}}</span>
			  <span>Bid: <u>{{price.nai()}}</u></span>
			
          </div>
          </a>
          <div class="card-footer text-center d-flex justify-content-between align-items-center">
			  <span>{{bids}} Bids</span>
            <a href="#auctionsModal" class="a-1 btn btn-primary btn-lg" data-toggle="modal" dmx-on:click="auctions_iterator.select($index);auctions_detail.select(uid)" role="button">Place Bid</a>
          </div>
        </div>
      </div>
      <div style="border-bottom: #FFFFFF thick solid">
        <h1 class="text-white p-0 m-0">NFT Sales</h1>
      </div>
      <div class="card-columns my-3" id="sales-token-cards">
        <div class="card text-white bg-dark" dmx-repeat:repeatsalestoken1="salesToken.data"> <a href="#auctionsModal" class="a-1" data-toggle="modal" dmx-on:click="auctions_iterator.select($index);auctions_detail.select(uid)">
          <div class="card-header d-flex" style="background: linear-gradient(blueviolet,darkorchid)">
            <div class="circle">{{uid}}</div>
            <h3 class="card-title lead border rounded p-2 ml-auto">{{set}} NFT</h3>
          </div>
          <div class="card-img-top" dmx-bind:id="image-{{set}}-{{uid}}" dmx-bind:alt="image-{{set}}-{{uid}}">{{uid.nftImageWell(script, set)}}</div>
          <div class="text-center " style="background: crimson">
            <h5 dmx-bind:id="timer-{{set}}-{{uid}}" class="mb-0 lead">{{time.animateTime(set, uid)}}</h5>
          </div>
          <div class="card-body">
            <p class="card-text text-center">Price: <u>{{price.nai()}}</u></p>
          </div>
          </a>
          <div class="card-footer text-center">
            <p class="lead"><a href="#auctionModal" class="a-1" data-toggle="modal" dmx-on:click="auctions_iterator.select($index);auctions_detail.select(uid)"> </a><a class="btn btn-primary btn-lg" href="#" role="button">Buy NFT</a></p>
          </div>
        </div>
      </div>

      <div class="modal fade" id="buyDluxModal" tabindex="-1" role="dialog" aria-labelledby="buyDluxModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" id="buy-modal">
          <div class="modal-content bg-dark text-white">
            <div class="modal-header d-flex flex-fill justify-content-between align-items-center" style="border-bottom-color: #333; background:linear-gradient(darkorange,yellow)">
              <div></div>
              <h3 class="ml-auto lead" id="buyDluxTitle" style="color: black">GET DLUX</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span class="close text-white">x</span></button>
            </div>
            <div class="modal-body">
              <div class="d-flex flex-column">
                <div class="d-flex justify-content-between">
                  <h2><a href="#" class="text-muted p-3" dmx-on:click="dexOrders.prev()"><i class="fas fa-caret-square-left"></i></a></h2>
                  <h2 style="color: greenyellow">{{value.amount}}{{$value}}<i class="fab fa-hive"></i></h2>
                  <h2 class=""><a href="#" class="text-muted p-3" dmx-on:click="dexOrders.next()"><i class="fas fa-caret-square-right"></i></a></h2>
                </div>
                <div class="d-flex flex-column flex-fill rounded-lg p-3 my-1 bg-darker" >
                  <div class="d-flex flex-row flex-fill align-items-center">
                    <p style="font-size: 18px;" class="p-0 m-0 font-weight-light">From</p>
                    <div class="d-flex ml-auto align-items-baseline">
                      <div class="d-flex small justify-content-between">
                        <p class="my-0 text-white-50" >Available<i class="fab fa-hive mx-1"></i></p>
                        <p class="my-0 text-primary">1,256.234{{value.hive}}</p>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex flex-row flex-fill mt-1">
                    <div class="d-flex align-items-center">
                      <div class="circle2"><i class="fab fa-hive"></i></div>
                      <h2 class="p-0 m-0 ml-2 font-weight-bold">HIVE</h2>
                    </div>
                    <div class="d-flex ml-auto flex-column">
                      <p class="ml-auto my-0 text-white-50 font-weight-bolder" style="font-size: 30px;">25.000{{value.hive}}</p>
                      <p class="ml-auto my-0 text-muted font-weight-bold" style="font-size: 16px;">&asymp; &#36;15.33</p>
                    </div>
                  </div>
                  <div class="d-flex justify-content-between">
                    <div></div>
                    <div>
                      <button class="btn btn-outline-secondary btn-sm text-muted" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-info-circle"></i></button>
                    </div>
                  </div>
                  <div class="collapse" id="collapseExample">
                    <div class="d-flex">
                      <p style="font-size: 18px;" class="p-0 m-0 text-white-50 font-weight-light">Rate</p>
                      <p style="font-size: 16px;" class="p-0 m-0 text-white-50 ml-auto">1 HIVE = 4.111 DLUX</p>
                    </div>
                    <div class="d-flex">
                      <p style="font-size: 12px;" class="p-0 m-0 text-muted ml-auto text-success">1 DLUX = 0.251 HIVE</p>
                    </div>
                    <hr width="100%" style="border: #333 thin solid">
                    <div class="d-flex">
                      <p style="font-size: 18px;" class="p-0 m-0 text-white-50 font-weight-light">Swap Fee<small class="rounded-pill border border-secondary p-1 ml-2">0.25&#37;</small></p>
                      <p style="font-size: 16px;" class="p-0 m-0 text-white-50 ml-auto">2.5 DLUX</p>
                    </div>
                  </div>
                </div>
                <div class"p-0 m-0 bg-dark">
                  <div class="arrow2 rounded-circle border border-warning bg-darker text-warning">
                    <h1 class="m-2 px-3 py-1"><i class="fas fa-angle-double-down"></i></h1>
                  </div>
                </div>
                <div class="d-flex flex-column flex-fill rounded-lg p-3 my-1 border border-warning" style="background: radial-gradient(#222,#111);">
                  <div class="d-flex flex-row flex-fill align-items-center">
                    <p style="font-size: 18px;" class="p-0 m-0 font-weight-light">To</p>
                  </div>
                  <div class="d-flex flex-row flex-fill mt-1 align-items-center">
                    <div class="d-flex align-items-center">
                      <div class="circle2 d-flex align-items-center justify-content-around"><img src="/img/dlux-hive-logo-alpha.svg" width="70%"></div>
                      <h2 class="p-0 m-0 ml-2 font-weight-bold">DLUX</h2>
                    </div>
                    <div class="d-flex ml-auto">
                      <p class="ml-auto my-0 text-warning font-weight-bolder" style="font-size: 30px;">100.000</p>
                    </div>
                  </div>
                  <p class="pt-3">DLUX is your ticket to the metaverse. Purchase NFTs, power-up to vote on proposals, and use it across a variety of XR games and apps.</p>
                </div>
              </div>
              <div class="d-flex justify-content-around my-1 py-3">
                <button class="btn btn-lg btn-primary">Trade Tokens</button>
              </div>
            </div>
          </div>
        </div>
      </div>
		
		<dmx-data-iterator id="auctions_iterator" dmx-bind:data="auctionsToken.data" loop="true"></dmx-data-iterator>
		 <dmx-data-detail id="auctions_detail" dmx-bind:data="auctionsToken.data" key="uid">
            <div class="modal fade " id="auctionsModal" tabindex="11" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-full modal-xl modal-dialog-centered" role="document">
                <div class="modal-content bg-dark text-white">
                  <div class="card text-white bg-dark ">
                    <div class="card-header d-flex align-items-baseline" style="background: #9200A6">
                      <div class="ml-auto">
                        <h5 class="card-title">{{auctions_detail.data.set}} <span style="color:aqua;">{{auctions_detail.data.uid}}</span></h5>
                      </div>
                      <div class="ml-auto">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      </div>
                    </div>
                    <div class="card-body row d-flex ">
                      <div class="col-lg-6 px-0 px-sm-2">
                        <div class="col-12 px-0 px-sm-2">
                          <div class="card-img-top" dmx-bind:id="detail-image-{{auctions_detail.data.set}}-{{auctions_detail.data.uid}}" dmx-bind:alt="{{auctions_detail.data.set}}-{{auctions_detail.data.uid}}">{{auctions_detail.data.uid.nftDetailWell(auctions_detail.data.script, auctions_detail.data.set)}}</div>
                        </div>
                      </div>
                      <div class="col-lg-6 px-0 px-sm-2">
                        <div id="accordion" class="col-12 px-0 px-sm-2">
                          <div class="card bg-dark text-white">
                            <div class="card-header" id="headingDescription">
                              <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseDescription" aria-expanded="true" aria-controls="collapseDescription"> DESCRIPTION </button>
                              </h5>
                            </div>
                            <div id="collapseDescription" class="collapse" aria-labelledby="headingDescription" data-parent="#accordion">
                              <div class="card-body">
                                <p class="card-text">Behold! The DLUX Founders Token. Own a piece of dlux in the form of an NFT that is redeemable for 100 DLUX (your NFT will be burned and 100 DLUX will be placed in your wallet).</p>
                              </div>
                            </div>
                          </div>
                          <div class="card bg-dark text-white">
                            <div class="card-header" id="headingAttributes">
                              <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseAttributes" aria-expanded="false" aria-controls="collapseAttributes"> ATTRIBUTES </button>
                              </h5>
                            </div>
                            <div id="collapseAttributes" class="collapse" aria-labelledby="headingAttributes" data-parent="#accordion">
                              <div class="card-body p-0">
                                <div class="d-flex flex-wrap rounded bg-darker" style="border: 1px solid #9200A6">
                                  <div class="d-flex col-12 justify-content-center pt-2">
                                    <h2 style="color: #9200A6">Legendary</h2>
                                  </div>
                                  <div class="d-flex flex-wrap flex-sm-nowrap  justify-content-around py-3 my-0 col-12">
                                    <div class="d-flex flex-wrap justify-content-center m-1" style="border: 4px solid #6C1112 !important; border-radius: .5em;">
                                      <div class="d-flex m-2">COLOR 01</div>
                                      <div class="d-flex col-12" style="background-color: #6C1112">&nbsp;</div>
                                      <div class="d-flex m-2">#6C1112</div>
                                    </div>
                                    <div class="d-flex flex-wrap justify-content-center m-1" style="border: 4px solid #E7F742 !important; border-radius: .5em;">
                                      <div class="d-flex m-2">COLOR 02</div>
                                      <div class="d-flex col-12" style="background-color: #E7F742">&nbsp;</div>
                                      <div class="d-flex m-2">#E7F742</div>
                                    </div>
                                    <div class="d-flex flex-wrap justify-content-center m-1" style="border: 4px solid #774323 !important; border-radius: .5em;">
                                      <div class="d-flex m-2">COLOR 03</div>
                                      <div class="d-flex col-12" style="background-color: #774323">&nbsp;</div>
                                      <div class="d-flex m-2">#774323</div>
                                    </div>
                                  </div>
                                  <div class="d-flex"></div>
                                  <div class="d-flex ml-auto px-3 py-1">
                                    <h3>#348</h3>
                                    <span class="ml-3 small">/4096</span></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card bg-dark text-white" style="width: 100">
                            <div class="card-header" id="headingMarket">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseMarket" aria-expanded="false" aria-controls="collapseMarket"> MARKET </button>
                              </h5>
                            </div>
                            <div id="collapseMarket" class="collapse" aria-labelledby="headingMarket" data-parent="#accordion">
                              <div class="card-body p-0">
                                <div class="d-flex align-self-end text-center">
                                  <div class="border border-info bg-darker mx-auto px-5 py-3 rounded col-12">
                                    <div>Rolling Average Market Price (7-days):</div>
                                    <div>
                                      <h1><span style="color: lawngreen">151.24 DLUX</span></h1>
                                    </div>
                                    <hr class="bg-light">
                                    <div class="container-fluid">
                                      <ul class="nav nav-pills bg-darker justify-content-center" role="tablist">
                                        <li class="nav-item"> <a class="nav-link " id="tradetab" role="tab" data-toggle="tab" aria-controls="trade" aria-expanded="true" href="#trade">Trade</a></li>
                                        <li class="nav-item"> <a class="nav-link" id="selltab" role="tab" data-toggle="tab" aria-controls="sell" aria-expanded="true" href="#sell">Sell</a></li>
                                        <li class="nav-item"> <a class="nav-link" id="auctiontab" role="tab" data-toggle="tab" aria-controls="auction" aria-expanded="true" href="#auction">Auction</a></li>
                                      </ul>
                                      <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade show " id="trade" aria-labelledby="tradetab">
                                          <form class="needs-validation mt-4" novalidate>
                                            <div class="form-row my-2">
                                              <div class="col-12">
                                                <label for="validationSendUsername">Username</label>
                                                <div class="input-group">
                                                  <div class="input-group-prepend"> <span class="input-group-text" id="inputGroupPrepend">@</span></div>
                                                  <input type="text" class="form-control" id="validationSendUsername" aria-describedby="inputGroupPrepend" required>
                                                  <div class="invalid-feedback"> Please enter the username you'd like to trade with. </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="form-row my-2">
                                              <div class="col-12">
                                                <label for="validationReceiveItem">Item Hash</label>
                                                <div class="input-group">
                                                  <div class="input-group-prepend"> <span class="input-group-text" id="inputGroupPrepend">#</span></div>
                                                  <input type="text" class="form-control" id="validationReceiveItem" aria-describedby="inputGroupPrepend" required>
                                                  <div class="invalid-feedback"> Please enter an item hash from the users inventory. </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="form-row col-12 align-items-center my-2">
                                              <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input" id="giftTrade">
                                                <label class="form-check-label" for="giftTrade">This is a gift, no item in return</label>
                                              </div>
                                            </div>
                                            <button class="btn btn-info my-2" type="submit">Propose Trade</button>
                                          </form>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade show " id="sell" aria-labelledby="selltab">
                                          <form class="needs-validation mt-4" novalidate>
                                            <div class="form-row my-2">
                                              <div class="col-12">
                                                <label for="validationSellPrice">Sale Price</label>
                                                <div class="input-group">
                                                  <input type="number" class="form-control" id="validationSellPrice" aria-describedby="sellcoin" required>
                                                  <div class="input-group-append">
                                                    <div class="input-group-text" id="sellcoin">DLUX</div>
                                                  </div>
                                                </div>
                                                <div class="invalid-feedback"> Please enter the ammount of DLUX you'd like to receive. </div>
                                              </div>
                                            </div>
                                            <div class="form-row my-2">
                                              <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input" id="sellOwnership">
                                                <label class="form-check-label" for="sellOwnership">I agree to transfer ownership to the DAO Listing Service for 30 days.</label>
                                                <div class="invalid-feedback"> You must agree before submitting. </div>
                                              </div>
                                            </div>
                                            <button class="btn btn-info my-2" type="submit">List Item</button>
                                          </form>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade show " id="auction" aria-labelledby="auctiontab">
                                          <form class="needs-validation mt-4" novalidate>
                                            <div class="form-row my-2">
                                              <div class="col-12">
                                                <label for="validationAuctionPrice">Starting Bid</label>
                                                <div class="input-group">
                                                  <input type="number" class="form-control" id="validationAuctionPrice" aria-describedby="auctioncoin" required>
                                                  <div class="input-group-append">
                                                    <div class="input-group-text" id="auctioncoin">DLUX</div>
                                                  </div>
                                                </div>
                                                <div class="invalid-feedback"> Please enter the ammount of DLUX you'd like to start the bidding. </div>
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label for="validationReservePrice">Reserve Price</label>
                                              <div class="input-group">
                                                <input class="form-control" id="validationReservePrice" type="number" required>
                                                <div class="input-group-append">
                                                  <div class="input-group-text" id="reservecoin">DLUX</div>
                                                </div>
                                              </div>
                                              <div class="invalid-feedback"> Please enter the ammount of DLUX that must be reached. </div>
                                            </div>
                                            <div class="form-group">
                                              <label for="buyNowPrice">Buy It Now Price</label>
                                              <div class="input-group">
                                                <input class="form-control" id="buyNowPrice" type="number" step="0.001" min="0.001" required>
                                                <div class="input-group-append">
                                                  <div class="input-group-text" id="buyNowcoin">DLUX</div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="form-row my-2">
                                              <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input" id="auctionOwnership">
                                                <label class="form-check-label" for="auctionOwnership">I agree to transfer ownership to the DAO Auction House for 30 days.</label>
                                                <div class="invalid-feedback"> You must agree before submitting. </div>
                                              </div>
                                            </div>
                                            <button class="btn btn-info my-2" type="submit">List Item</button>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card bg-dark text-white">
                            <div class="card-header" id="headingRedeem">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseRedeem" aria-expanded="false" aria-controls="collapseRedeem"> REDEEM </button>
                              </h5>
                            </div>
                            <div id="collapseRedeem" class="collapse show" aria-labelledby="headingRedeem" data-parent="#accordion">
                              <div class="card-body p-0">
                                <div class="d-flex align-self-end">
                                  <div class="border border-warning rounded bg-darker col-12 p-4">
                                    <div class="d-flex align-items-center justify-content-between">
                                      <div class="d-flex mr-1">
                                        <h4>Redemption Value:</h4>
                                      </div>
                                      <div class="d-flex ml-1">
                                        <h1><u>100 DLUX</u></h1>
                                      </div>
                                    </div>
                                    <div class="pt-2">
                                      <p class="text-uppercase text-muted">This NFT can be traded, sold, or auctioned until redeemed. Once redeemed it will disappear forever.</p>
                                      <center>
                                        <button type="button" class="btn btn-warning m-1">Redeem <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span></button>
                                      </center>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer d-flex align-items-center">
                      <h2><a class="text-muted p-3" href="#" dmx-on:click="auctions_iterator.prev();auctions_detail.select(auctions_iterator.value.uid)"><i class="fas fa-caret-square-left"></i></a></h2>
                      <small class="ml-auto text-muted"><i>Token acquired September 20th, 2021</i></small>
                      <h2 class="ml-auto"><a class="text-muted p-3" href="#" dmx-on:click="auctions_iterator.next();auctions_detail.select(auctions_iterator.value.uid)"><i class="fas fa-caret-square-right"></i></a></h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </dmx-data-detail>
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
