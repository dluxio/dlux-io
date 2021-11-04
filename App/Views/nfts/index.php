<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - NFTS</title>
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/header.php";
include_once( $path );
?>
<?php
if ( isset( $_COOKIE[ 'user' ] ) ) {
  echo "<dmx-api-datasource id=\"inventoryapi\" is=\"dmx-fetch\" url=\"https://token.dlux.io/api/nfts/" . $_COOKIE[ 'user' ] . "\"></dmx-api-datasource>";
} else {
  echo "<dmx-api-datasource id=\"inventoryapi\" is=\"dmx-fetch\" url=\"https://token.dlux.io/api/nfts/robotolux\"></dmx-api-datasource>";
};
?>
<!--page specific-->
<script type="text/javascript" src="/dlux-io/dmxAppConnect/dmxAppConnect.js"></script>
<script src="/js/dex.js"></script>
<script src="/js/ico.js"></script>
</head>
<body class="d-flex flex-column h-100 padme-t70 text-white" id="index" is="dmx-app">

<dmx-api-datasource id="hiveprice" is="dmx-fetch" url="https://api.coingecko.com/api/v3/simple/price?ids=hive&amp;vs_currencies=usd"></dmx-api-datasource>
<dmx-api-datasource id="statsapi" is="dmx-fetch" url="https://token.dlux.io/stats/"></dmx-api-datasource>
<dmx-api-datasource id="dexapi" is="dmx-fetch" url="https://token.dlux.io/dex/"></dmx-api-datasource>
<dmx-api-datasource id="salesapi" is="dmx-fetch" url="https://token.dlux.io/api/sales"></dmx-api-datasource>
<dmx-api-datasource id="auctionsapi" is="dmx-fetch" url="https://token.dlux.io/api/auctions"></dmx-api-datasource>
<dmx-api-datasource id="mintsupplyapi" is="dmx-fetch" url="https://token.dlux.io/api/mintsupply"></dmx-api-datasource>
<dmx-data-view id="statsview" dmx-bind:data="statsapi.data.result" ></dmx-data-view>
<dmx-data-view id="dexview1" dmx-bind:data="dexapi.data.markets.hive.sells" sorton="key" ></dmx-data-view>
<dmx-data-view id="salesview" dmx-bind:data="salesapi.data.result" sorton="time"></dmx-data-view>
<dmx-data-view id="auctionsview" dmx-bind:data="auctionsapi.data.result" sorton="time"></dmx-data-view>
<dmx-data-view id="mintsupplyview" dmx-bind:data="mintsupplyapi.data.result" sorton="qty" sortdir="desc"></dmx-data-view>
<dmx-data-view id="inventoryview" dmx-bind:data="inventoryapi.data"></dmx-data-view>
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
	.card-ft {
		width: 26em;
	}
.shimmer {
    background-image: linear-gradient( to right, rgb(194, 255, 182), rgb(255, 163, 182), rgb(221, 169, 255), rgb(162, 209, 255) )
	}
	.rainbow-text {
  background-image: linear-gradient( magenta, aqua);
		 -webkit-background-clip: text;
		 color: transparent;
}
	.mint-panel-heading-top .accordion-toggle:after {
    /* symbol for "opening" panels */
    font-family: 'FontAwesome';  /* essential for enabling glyphicon */
    content: "\f102";    /* adjust as needed, taken from bootstrap.css */
    margin-left: 10px;        /* adjust as needed */

}
.mint-panel-heading-top .accordion-toggle.collapsed:after {
    /* symbol for "collapsed" panels */
    content: "\f103";    /* adjust as needed, taken from bootstrap.css */
}
	.mint-panel-heading-bottom .accordion-toggle:after {
    /* symbol for "opening" panels */
    font-family: 'FontAwesome';  /* essential for enabling glyphicon */
    content: "\f102";    /* adjust as needed, taken from bootstrap.css */
    margin-left: 10px;        /* adjust as needed */

}
.mint-panel-heading-bottom .accordion-toggle.collapsed:after {
    /* symbol for "collapsed" panels */
    content: "\f103";    /* adjust as needed, taken from bootstrap.css */
}
	</style>
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/nav.php";
include_once( $path );
?>
<main role="main" class="flex-shrink-0">
  <div id="hidden-stats-inputs" class="d-none">
    <input type="number" id="hiveperdlux" dmx-bind:value="statsapi.data.hiveVWMA.rate">
    <input type="number" id="dollarperhive" dmx-bind:value="hiveprice.data.hive.usd">
    <input type="number" id="dluxperdollar" dmx-bind:value="hiveperdlux.value*dollarperhive.value">
  </div>
  <div class="container" style="max-width: 1800px !important">
    <div class="container-fluid" style="padding: 0">
      <!-- jumbo -->
      <div class="jumbotron text-white text-center mt-5" 
           style="background: linear-gradient(217deg, rgba(33,255,181,.8), rgba(33,255,181,0) 70.71%),
          linear-gradient(127deg, rgba(251,0,255,.8), rgba(251,0,255,0) 70.71%),
                              linear-gradient(336deg, rgba(3,62,253,.8), rgba(3,62,253,0) 70.71%);">
        <div class="d-flex flex-fill flex-wrap justify-content-around">
          <div class="d-flex justify-content-around align-items-center mx-3">
            <div class="d-flex p-2 rounded flex-column mx-3" style="max-width:400px;">
              <h1 class="display-4 text-left">Discover, collect, and sell NFTs</h1>
              <div class="my-2 text-left">
                <button id="nftexplore" class="btn btn-lg btn-primary px-4 mr-3">Explore</button>
                <button id="nftcreate" class="btn btn-lg btn-secondary px-4 ml-3">Create</button>
              </div>
              <div class="my-4 text-left"><a href="/about/"><i class="fas fa-info-circle"></i> Learn more about DLUX</a></div>
            </div>
          </div>
          <div class="d-flex flex-column">
            <div class="jumbotron px-5 py-4" style="background: linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0))">
              <div class="d-flex justify-content-between align-items-center"></div>
              <div class="" id="sales-mint">
                <div id="buymintcards" is="dmx-repeat" dmx-bind:repeat="mintsupplyapi.data.result.sort('set').reverse()" class="row">
                  <div dmx-bind:id="{{script}}-card" class="card card-ft text-white m-2 " > {{script.getSetDetailsColors('-card')}}
                    <div id="hidden-detail-inputs" class="d-none">
                      <input dmx-bind:id="{{script}}-color1-text" type="text">
                      {{script.getSetDetails('Color1', '-color1-text', 'value')}}
                      <input dmx-bind:id="{{script}}-color2-text" type="text">
                      {{script.getSetDetails('Color2', '-color2-text', 'value')}}
                      <input dmx-bind:id="{{script}}-description-text" type="text">
                      {{script.getSetDetails('Description', '-description-text', 'value')}}
                      <input dmx-bind:id="{{script}}-icon-text" type="text">
                      {{script.getSetDetails('faicon', '-icon-text', 'value')}} </div>
                    <div class="card-header d-flex align-items-center justify-content-between" >
                      <div class="rounded-pill d-flex align-items-center p-2" style="background-color: black">
                        <div class="pr-2"><small>OWN: </small></div>
                        <div class="px-2">
                          <h2 dmx-bind:id="{{set}}-inventory" class="m-0">
                            <div dmx-bind:id="{{set}}-inventory-any" is="dmx-repeat" dmx-bind:repeat="inventoryapi.data.mint_tokens.where('set', set, '==')" dmx-show="inventoryapi.data.mint_tokens.where('set',set,'==').hasItems()">{{qty.pad(3)}}</div>
                            <div dmx-bind:id="{{set}}-inventory-none" is="dmx-repeat" dmx-bind:repeat="inventoryapi.data.mint_tokens.where('set',set,'!=')" dmx-show="inventoryapi.data.mint_tokens.where('set',set,'!=').hasItems()">000</div>
                          </h2>
                        </div>
                      </div>
                      <div> <a href="/nfts/set/">
                        <h3 class="card-title lead shimmer rounded p-2 m-0 ml-auto" style="color: black"><b>{{set}} NFT</b></h3>
                      </a></div>
                    </div>
                    <div class="card-body text-center d-flex flex-column p-2">
                      <div class="card panel-group" dmx-bind:id="{{set}}-panel" style="background-color: rgba(0,0,0,0.8)">
                        <div class="panel panel-default">
                          <div class="card-heading mint-panel-heading-top">
                            <p class="card-title mb-0 p-1"> <a class="collapsed accordion-toggle" data-toggle="collapse" dmx-bind:data-parent="#{{set}}-panel" dmx-bind:href="#{{set}}-description-collapse" dmx-on:click="toggleMintDescription('{{set}}')"><i class="far fa-list-alt mr-3"></i>Description</a></p>
                          </div>
                          <div class="panel-collapse collapse" dmx-bind:id="{{set}}-description-collapse">
                            <div class="card-body">
                              <p dmx-bind:id="{{script}}-description-p"> {{script.getSetDetails('Description', '-description-p', 'innerText')}} </p>
                            </div>
                          </div>
                        </div>
                        <div class="panel panel-default">
                          <div class="card-heading d-none">
                            <h4 class="card-title"> <a class="accordion-toggle" data-toggle="collapse" dmx-bind:data-parent="#{{set}}-panel" dmx-bind:href="#{{set}}-info-collapse">Info</a></h4>
                          </div>
                          <div class="panel-collapse collapse show" dmx-bind:id="{{set}}-info-collapse">
                            <div class="card-body">
                              <div class="px-2 py-5 text-center rounded" >{{script.getSetDetailsIcon('-icon')}}
                                <h1 class="text-center rainbow-text"><i dmx-bind:id="{{script}}-icon"></i></h1>
                                <div class="d-flex justify-content-around">
                                  <h3 class="rainbow-text">sealed NFT</h3>
                                </div>
                                <h5>Unwrap to see what's inside</h5>
								  
                                <div class="btn btn-outline-light btn-lg" dmx-on:clck="buyFT('{{set}}','{{uid}}')">&asymp; {{((sales.min('price')/1000)*dluxperdollar.value).formatCurrency()}}</div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="panel panel-default">
                          <div class="card-heading mint-panel-heading-bottom d-none">
                            <p class="card-title mb-0 p-1"> <a class="collapsed accordion-toggle" data-toggle="collapse" dmx-bind:data-parent="#{{set}}-panel" dmx-bind:href="#{{set}}-market-collapse" dmx-on:click="toggleMintMarket('{{set}}')"><i class="fas fa-store mr-3"></i>Market ({{qty}})</a></p>
                          </div>
                          <div class="panel-collapse collapse show" dmx-bind:id="{{set}}-market-collapse">
                            <div class="card-body p-0">
                              <div>
                                <ul id="{{set}}-mint-tabnav" class="nav nav-tabs" role="tablist">
                                  <li class="nav-item p-0"> <a class="nav-link active" dmx-bind:href="#{{set}}-mint-salestab" dmx-bind:id="{{set}}-mint-saleslink" role="tab" data-toggle="tab" aria-controls="mintsalestab" aria-expanded="true">
                                    <div class="d-flex align-items-center">
                                      <div dmx-on:click="">SALES</div>
                                      <div class="mb-3"><span class=" badge badge-pill badge-danger" style="font-size: .7em">{{qty_sales}}</span></div>
                                    </div>
                                  </a></li>
                                  <li class="nav-item p-0"> <a class="nav-link" dmx-bind:href="#{{set}}-mint-auctionstab" role="tab" dmx-bind:id="{{set}}-mint-auctionslink" data-toggle="tab" aria-controls="mintauctionstab">
                                    <div class="d-flex align-items-center">
                                      <div>AUCTIONS</div>
                                      <div class="mb-3"><span class=" badge badge-pill badge-danger" style="font-size: .7em">{{qty_auctions}}</span></div>
                                    </div>
                                  </a></li>
                                </ul>
                                <!-- Content Panel -->
                                <div dmx-bind:id="{{set}}-mint-tabs" class="tab-content">
                                  <div dmx-bind:id="{{set}}-mint-salestab" role="tabpanel" class="tab-pane fade show active" aria-labelledby="mintsalestab">
                                    <table class="table table-sm table-dark bg-none">
                                      <thead>
                                        <tr>
                                          <th scope="col" class="small">QTY</th>
                                          <th scope="col" class="small">PRICE</th>
                                          <th scope="col" class="small">TOTAL</th>
                                          <th scope="col"></th>
                                        </tr>
                                      </thead>


                                      <tbody id="salesrepeat" is="dmx-repeat" dmx-bind:repeat="sales.reverse()" >
                                        <tr>
                                          <th scope="row">1</th>
                                          <td>{{pricenai.nai()}}</td>
                                          <td>&asymp; {{((price/1000)*dluxperdollar.value).formatCurrency())}}</td>
                                          <td><div>
                                            <button class="btn btn-warning" id="cancelFTbtn1" dmx-show="(by == userCookie.value)" dmx-on:click="cancelFTsell('{{set}}','{{uid}}')">Cancel</button>
                                            <button class="btn btn-primary" dmx-bind:id="{{set}}-buyFTbtn1" dmx-show="(by != userCookie.value)" dmx-on:click="buyFT('{{set}}','{{uid}}')">Buy</button>
                                          </div></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                  <div role="tabpanel" class="tab-pane fade show" dmx-bind:id="{{set}}-mint-auctionstab" aria-labelledby="mintauctionstab">
                                    <table class="table table-sm table-dark bg-none">
                                      <thead>
                                        <tr>
                                          <th scope="col" class="small">QTY</th>
                                          <th scope="col" class="small">BID</th>
                                          <th scope="col" class="small">TOTAL</th>
                                          <th scope="col" class="small">HIGH BIDDER</th>
                                      <tbody is="dmx-repeat" dmx-bind:repeat="auctions" id="mintauctionsorders">
    									<tr>
										  <th scope="row" colspan="4" style="background-color: crimson"><span dmx-bind:id="timer-{{set}}-{{uid}}">{{time.animateTime(set, uid)}}</span></th>
										  </tr>
										  <tr>
                                            <th scope="row">1</th>
                                            <td>{{pricenai.nai()}}</td>
                                            <td>&asymp; {{((price/1000)*dluxperdollar.value).formatCurrency())}}</td>
                                            <td>{{bidder}}</td>
                                          </tr>
                                          <tr>
											  <th scope="row" colspan="2"></th>
											  <td><input dmx-bind:id="{{set}}-{{uid}}-bid" class="form-control " type="number" dmx-bind:placeholder="{{(price/1000+1).formatNumber('3','.',',')}}"></td>
											  <td><button id="{{set}}-{{uid}}-cancelFTbtn" class="btn btn-warning" dmx-show="(by == userCookie.value)" dmx-on:click="cancelFTauction('{{set}}','{{uid}}')">Cancel</button>
                                            <button id="{{set}}-{{uid}}-buyFTbtn" class="btn btn-primary" dmx-show="(by != userCookie.value)" dmx-on:click="bidFT('{{set}}','{{uid}}','document.getElementById(`{{set}}-{{uid}}-bid)`).value')">Bid</button></td>
                                          </tr>
                                      </tbody>
                                      <th scope="col" class="small"></th>
                                        <th scope="col" class="small"></th>
                                      </tr>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer d-flex flex-column p-2">
                      <div class="d-flex justify-content-between align-items-center">
                        <button type="button" class="btn btn-outline-dark mt-1 col-5" dmx-on:click="openMintToken('{{set}}')">Open<i class="fas fa-box-open ml-3"></i></button>
                        <button type="button" class="btn btn-outline-dark mt-1 col-5 disabled">Transfer<i class="fas fa-exchange-alt ml-3"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- sealed NFTs -->
        <div class="mt-4 d-none" style="border-bottom: #FFFFFF thick solid">
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
            <div class="card" style="color:black; background:radial-gradient(#8D42EB,purple)" dmx-repeat:repeatsalesmint2="$value"> <a href="#auctionsModal" class="a-1" data-toggle="modal" dmx-on:click="auctions_iterator.select($index);auctions_detail.select(uid)">
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
      </div>
      <!-- NFT Auction -->
      <div class="d-flex justify-content-between align-items-center" style="border-bottom: #FFFFFF thick solid">
        <h1 class="text-white p-0 m-0">NFT Auctions</h1>
        <div class="d-none d-xl-block">
          <div class="d-flex align-items-center">
            <h5 class="m-0">Columns:</h5>
            <select id="auctionNFTsizeXL" name="Max Columns" class="btn btn-secondary ml-2">
              <option value="5" selected>5</option>
              <option value="4">4</option>
              <option value="3">3</option>
              <option value="2">2</option>
              <option value="1">1</option>
            </select>
          </div>
        </div>
        <div class="d-none d-lg-block d-xl-none">
          <div class="d-flex align-items-center">
            <h5 class="m-0">Columns:</h5>
            <select id="auctionNFTsizeLG" name="Max Columns" class="btn btn-secondary ml-2">
              <option value="4" selected>4</option>
              <option value="3">3</option>
              <option value="2">2</option>
              <option value="1">1</option>
            </select>
          </div>
        </div>
        <div class="d-none d-md-block d-lg-none">
          <div class="d-flex align-items-center">
            <h5 class="m-0">Columns:</h5>
            <select id="auctionNFTsizeMD" name="Max Columns" class="btn btn-secondary ml-2">
              <option value="3" selected>3</option>
              <option value="2">2</option>
              <option value="1">1</option>
            </select>
          </div>
        </div>
        <div class="d-none d-sm-block d-md-none">
          <div class="d-flex align-items-center">
            <h5 class="m-0">Columns:</h5>
            <select id="auctionNFTsizeSM" name="Max Columns" class="btn btn-secondary ml-2">
              <option value="2" selected>2</option>
              <option value="1">1</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1"
		   dmx-bind:class="row row-cols-xl-{{auctionNFTsizeXL.value}} row-cols-lg-{{auctionNFTsizeLG.value}} row-cols-md-{{auctionNFTsizeMD.value}} row-cols-sm-{{auctionNFTsizeSM.value}} row-cols-1"
		   
		   style="margin-left: -8px; margin-right: -8px">
        <div dmx-repeat:repeatauctiontoken1="auctionsview.data">
          <div class="m-2  bg-dark card text-white">
            <div class="card-header d-flex" style="background: linear-gradient(dodgerblue,cornflowerblue)">
              <div class="circle">{{uid}}</div>
              <h3 class="card-title lead border rounded p-2 ml-auto"><a href="/nfts/set/" class="text-white">{{set}} NFT</a></h3>
            </div>
            <a href="#auctionsModal" class="a-1" data-toggle="modal" dmx-on:click="auctions_iterator.select($index);auctions_detail.select(uid)">
              <div class="card-img-top p-1" dmx-bind:id="image-{{set}}-{{uid}}" dmx-bind:alt="image-{{set}}-{{uid}}">{{uid.nftImageWell(script, set)}}</div>
              <div class="text-center " style="background: crimson">
                <h5 dmx-bind:id="timer-{{set}}-{{uid}}" class="mb-0 lead">{{time.animateTime(set, uid)}}</h5>
              </div>
              <div class="card-body d-flex flex-column text-center"> <span>High Bidder: {{bidder}}</span> <span>Bid: <u>{{price.nai()}}</u></span></div>
            </a>
            <div class="card-footer text-center d-flex justify-content-between align-items-center"> <span>{{bids}} Bids</span>
              <button href="#auctionsModal" class="btn btn-primary btn-lg" style="min-width:100px" data-toggle="modal" dmx-on:click="auctions_iterator.select($index);auctions_detail.select(uid)" role="button">Bid</button>
            </div>
          </div>
        </div>
      </div>
      <!-- NFT Auction Modal -->
      <!-- NFT Auctions Iterator -->
      <dmx-data-iterator id="auctions_iterator" dmx-bind:data="auctionsview.data" loop="true"></dmx-data-iterator>
      <!-- NFT Auctions Detail -->
      <dmx-data-detail id="auctions_detail" dmx-bind:data="auctionsview.data" key="uid">
      <div class="modal fade " id="auctionsModal" tabindex="11" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-full modal modal-dialog-centered" role="document">
          <div class="modal-content bg-dark text-white">
            <div class="card text-white bg-dark ">
              <div class="card-header d-flex align-items-baseline justify-content-between" style="background: linear-gradient(dodgerblue,cornflowerblue)">
                <div class="circle">{{auctions_detail.data.uid}}</div>
                <h3 class="card-title lead border rounded p-2"><a href="/nfts/set/" class="text-white">{{auctions_detail.data.set}} NFT</a></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
            </div>
            <div class="card-img-top" dmx-bind:id="detail-image-{{auctions_detail.data.set}}-{{auctions_detail.data.uid}}" dmx-bind:alt="{{auctions_detail.data.set}}-{{auctions_detail.data.uid}}">{{auctions_detail.data.uid.nftDetailWell(auctions_detail.data.script, auctions_detail.data.set)}}</div>
            <div class="text-center " style="background: crimson">
              <h5 dmx-bind:id="detail-timer-{{auctions_detail.data.set}}-{{auctions_detail.data.uid}}" class="mb-0 lead">{{auctions_detail.data.time.animateTime(auctions_detail.data.set, auctions_detail.data.uid)}}{{auctions_detail.data.time}}{{auctions_detail.data.set}}{{auctions_detail.data.uid}}</h5>
            </div>
            <div class="card-body text-center">
              <div>{{auctions_detail.data.by}} is auctioning {{auctions_detail.data.uid}}</div>
              <div>Set: {{auctions_detail.data.set}}</div>
              <div>Initial Price: {{auctions_detail.data.initial_price.nai()}}</div>
              <div>Current Bid: {{auctions_detail.data.price.nai()}}</div>
              <form class="">
                <div class="form-group d-flex justify-content-center align-items-center">
                  <div class="p-2">
                    <label>Bid Amount: </label>
                  </div>
                  <div>
                    <input id="auctionNFTbid" class="form-control" type="number" required step="0.001" placeholder="1.000">
                  </div>
                </div>
                <button class="btn btn-lg btn-primary" dmx-on:click="bidNFT('{{auctions_detail.data.set}}','{{auctions_detail.data.uid}}','{{auctionNFTbid.value}}', statusWaiter)">Place Bid</button>
              </form>
            </div>
            <div class="card-footer d-flex align-items-center">
              <h2><a class="text-muted p-3" href="#" dmx-on:click="auctions_iterator.prev();auctions_detail.select(auctions_iterator.value.uid)"><i class="fas fa-caret-square-left"></i></a></h2>
              <small class="ml-auto text-muted"><i>Item {{auctions_iterator.index + 1}} of {{auctionsview.data.count()}}</i></small>
              <h2 class="ml-auto"><a class="text-muted p-3" href="#" dmx-on:click="auctions_iterator.next();auctions_detail.select(auctions_iterator.value.uid)"><i class="fas fa-caret-square-right"></i></a></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    </dmx-data-detail>
    <!-- NFT Sales -->
    <div style="border-bottom: #FFFFFF thick solid">
      <h1 class="text-white p-0 m-0">NFT Sales</h1>
    </div>
    <!-- NFT Sales Repeat -->
    <div class="card-columns my-3" id="sales-token-cards">
      <div class="card text-white bg-dark" dmx-repeat:repeatsalesview1="salesview.data"> <a href="#salesModal" class="a-1" data-toggle="modal" dmx-on:click="sales_iterator.select($index);sales_detail.select(uid)">
        <div class="card-header d-flex" style="background: linear-gradient(blueviolet,darkorchid)">
          <div class="circle">{{uid}}</div>
          <h3 class="card-title lead border rounded p-2 ml-auto">{{set}} NFT</h3>
        </div>
        <div class="card-img-top" dmx-bind:id="image-{{set}}-{{uid}}" dmx-bind:alt="image-{{set}}-{{uid}}">{{uid.nftImageWell(script, set)}}</div>
        <div class="card-body">
          <p class="card-text text-center">Price: <u>{{price.nai()}}</u></p>
        </div>
        </a>
        <div class="card-footer text-center">
          <p class="lead">
            <button id="cancelNFTbtn1" class="btn btn-warning btn-lg" dmx-show="(by == userCookie.value)" dmx-on:click="cancelNFTsell('{{set}}','{{uid}}')">Take Back</button>
            <button id="buyNFTbtn1" class="btn btn-primary btn-lg" dmx-show="(by != userCookie.value)" href="#salesModal" data-toggle="modal" dmx-on:click="sales_iterator.select($index);sales_detail.select(uid)">Buy NFT</button>
          </p>
        </div>
      </div>
    </div>
    <!-- NFT Sales Modal -->
    <!-- NFT Sales Iterator -->
    <dmx-data-iterator id="sales_iterator" dmx-bind:data="salesview.data" loop="true"></dmx-data-iterator>
    <!-- NFT Sales Detail -->
    <dmx-data-detail id="sales_detail" dmx-bind:data="salesview.data" key="uid">
    <div class="modal fade " id="salesModal" tabindex="11" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-full modal modal-dialog-centered" role="document">
        <div class="modal-content bg-dark text-white">
          <div class="card text-white bg-dark ">
            <div class="card-header d-flex align-items-baseline justify-content-between" style="background: linear-gradient(blueviolet,darkorchid)">
              <div class="circle">{{sales_detail.data.uid}}</div>
              <h3 class="card-title lead border rounded p-2"><a href="/nfts/set/" class="text-white">{{sales_detail.data.set}} NFT</a></h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
          </div>
          <div class="card-img-top" dmx-bind:id="detail-image-{{sales_detail.data.set}}-{{sales_detail.data.uid}}" dmx-bind:alt="{{sales_detail.data.set}}-{{sales_detail.data.uid}}">{{sales_detail.data.uid.nftDetailWell(sales_detail.data.script, sales_detail.data.set)}}</div>
          <div class="card-body text-center">
            <div>{{sales_detail.data.by}} is selling {{sales_detail.data.uid}}</div>
            <div>Set: {{sales_detail.data.set}}</div>
            <div>Price: {{sales_detail.data.price.nai()}}</div>
            <form class="my-3">
              <button class="btn btn-lg btn-primary" dmx-on:click="buyNFT('{{sales_detail.data.set}}','{{sales_detail.data.uid}}','{{sales_detail.data.price.amount}}')">Buy NFT</button>
            </form>
          </div>
          <div class="card-footer d-flex align-items-center">
            <h2><a class="text-muted p-3" href="#" dmx-on:click="sales_iterator.prev();sales_detail.select(sales_iterator.value.uid)"><i class="fas fa-caret-square-left"></i></a></h2>
            <small class="ml-auto text-muted"><i>Item {{sales_iterator.index + 1}} of {{salesview.data.count()}}</i></small>
            <h2 class="ml-auto"><a class="text-muted p-3" href="#" dmx-on:click="sales_iterator.next();sales_detail.select(sales_iterator.value.uid)"><i class="fas fa-caret-square-right"></i></a></h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  </dmx-data-detail>
</main>
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/footer.php";
include_once( $path );
?>
<script src="/dlux-io/js/popper.min.js"></script>
<script src="/dlux-io/js/bootstrap-4.4.1.js"></script>
<script>


/* always keep at least 1 open by preventing the current to close itself */

		function (e,s){
	console.log(s)
    if ( $(this).parents('.{{set}}-mint-accordion').find('.collapse.show') ){
		
        var idx = $(this).index('[data-toggle="collapse"]');

        if (idx == $('.collapse.show').index('.collapse')) {

            // prevent collapse

            e.stopPropagation();

        }

    }

});


</script>
</body>
</html>
