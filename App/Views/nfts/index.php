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
  echo "<dmx-api-datasource id=\"openordersapi\" is=\"dmx-fetch\" url=\"https://token.dlux.io/@" . $_COOKIE[ 'user' ] . "\"></dmx-api-datasource>";
  echo "<dmx-api-datasource id=\"accountapi\" is=\"dmx-fetch\" url=\"https://token.dlux.io/hapi/condenser_api/get_accounts\" dmx-param:0=\"'" . $_COOKIE[ 'user' ] . "'\"></dmx-api-datasource>";
} else {
  echo "<dmx-api-datasource id=\"inventoryapi\" is=\"dmx-fetch\" url=\"https://token.dlux.io/api/nfts/\"></dmx-api-datasource>";
};
?>
<!--page specific--> 
<script type="text/javascript" src="/dlux-io/dmxAppConnect/dmxAppConnect.js"></script> 
<script src="/js/dex.js"></script> 
<script src="/js/ico.js"></script> 
<script type="text/javascript" src="/dlux-io/dmxAppConnect/dmxFormatter/dmxFormatter.js"></script>
</head>
<body class="d-flex flex-column h-100 padme-t70 text-white" id="index" is="dmx-app">
<dmx-api-datasource id="hiveprice" is="dmx-fetch" url="https://api.coingecko.com/api/v3/simple/price?ids=hive&amp;vs_currencies=usd"></dmx-api-datasource>
<dmx-api-datasource id="statsapi" is="dmx-fetch" url="https://token.dlux.io/stats/"></dmx-api-datasource>
<dmx-api-datasource id="dexapi" is="dmx-fetch" url="https://token.dlux.io/dex/"></dmx-api-datasource>
<dmx-api-datasource id="salesapi" is="dmx-fetch" url="https://token.dlux.io/api/sales"></dmx-api-datasource>
<dmx-api-datasource id="auctionsapi" is="dmx-fetch" url="https://token.dlux.io/api/auctions"></dmx-api-datasource>
<dmx-api-datasource id="mintsupplyapi" is="dmx-fetch" url="https://token.dlux.io/api/mintsupply"></dmx-api-datasource>
<dmx-data-view id="statsview" dmx-bind:data="statsapi.data.result" ></dmx-data-view>
<dmx-data-view id="dexview1" dmx-bind:data="dexapi.data.markets.hive.sells" sorton="rate" ></dmx-data-view>
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
	.nav-pills > li > a.active {
    background-color: #17a2b8 !important;
    color: #ffffff !important;
}
.nav-pills > li > a {
    color: #17a2b8 !important;
}
.r-radius-hotfix {
	border-top-right-radius: 0.25rem !important;
	border-bottom-right-radius: 0.25rem !important;
}
	.l-radius-hotfix {
	border-top-left-radius: 0.25rem !important;
	border-bottom-left-radius: 0.25rem !important;
}
		.max-160 {
		max-width: 160px;
	}
	.border-black {
		border-color: black;
	}
			.attribute-name {
		text-decoration: underline;
		margin-top: 5px;
	}
	.attribute-value {
		font-weight: bold;
		margin-bottom: 5px;
	}
	.attribute-container{
		position:absolute;
		width: 100%;
		overflow: hidden;
		z-index: 11;
	}
	</style>
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/nav.php";
include_once( $path );
?>
<main role="main" class="flex-shrink-0">
<div class="container" style="max-width: 1800px !important">
<div class="container-fluid" style="padding: 0"> 
  <!-- jumbo -->
  <div class="jumbotron text-white mt-5" 
           style="background: linear-gradient(217deg, rgba(33,255,181,.8), rgba(33,255,181,0) 70.71%),
          linear-gradient(127deg, rgba(251,0,255,.8), rgba(251,0,255,0) 70.71%),
                              linear-gradient(336deg, rgba(3,62,253,.8), rgba(3,62,253,0) 70.71%);">
    <div class="d-flex flex-fill flex-wrap justify-content-around">
      <div class="d-flex justify-content-around align-items-center mx-3">
        <div class="d-flex p-2 rounded flex-column mx-3" style="max-width:400px;">
          <div class="mb-5">
            <h1 class="display-4 text-left">Discover, collect, and sell NFTs</h1>
            <p class="lead">All with no gas fees at near cost</p>
            <div class="my-2 text-left"> <a id="nftexplore" class="btn btn-lg btn-primary px-4 mr-3" href="/nfts/explore">Explore</a> <a id="nftcreate" class="btn btn-lg btn-secondary px-4 ml-3 disabled" href="#">Create</a> </div>
          </div>
          <div class="my-0 py-1 px-4 d-flex flex-column flex-wrap" style="background-color: rgba(0,0,0,1); border-radius: 15px 15px 0px 0px;">
            <div class="d-flex flex-row flex-fill align-items-center mt-2 mb-2">
              <div class="d-flex align-items-center">
                <div class="circle2 d-flex align-items-center justify-content-around"><img src="/img/dlux-hive-logo-alpha.svg" width="70%"></div>
                <h2 class="p-0 m-0 ml-2 font-weight-bold" >DLUX</h2>
              </div>
              <div class="ml-auto"><a href="/about/" style="color:silver">About<i class="fas fa-info-circle ml-2"></i></a></div>
            </div>
            <div class="d-flex justify-content-around my-0">
              <div class="d-flex align-items-center p-3">
                <p class="small my-0 py-0 mr-2 text-white-50">BALANCE:</p>
                <h3 class="my-0 py-0 font-weight-bolder" style="color:#21FFB5"><u>{{(openordersapi.data.balance/1000).formatNumber(3,'.',',')}}</u></h3>
              </div>
            </div>
            <div class="mt-4 text-right">
              <button class="btn btn-outline-primary" href="#buyDluxModal" class="a-1" data-toggle="modal">
              Get DLUX
              </button>
            </div>
          </div>
          <div style="border-radius: 0px 0px 0px 0px; background-color: black">
            <div class="" style="background-color: rgba(227, 19, 55, 0.6 ); border-radius: 0px 0px 0px 0px; border-left: 2px solid black; border-right: 2px solid black; color:#e7e7f1">
              <div style="border-radius: 0px 0px 15px 15px; background-color: black">&nbsp;</div>
              <div class="mx-5 mt-2 d-flex">
                <p class="m-0"><b><i class="fab fa-hive"></i> HIVE</b></p>
                <p class="ml-auto small my-0 py-0 mr-2 text-white-50">BALANCE: {{accountapi.data.result[0].balance}}</span></p>
              </div>
            </div>
          </div>
          <div class="" style="background-color: rgba(0, 150, 15, 1); border-radius: 0px 0px 15px 15px;  border-left: 2px solid black; border-right: 2px solid black; border-bottom: 2px solid black;">
            <div style="border-radius: 0px 0px 15px 15px; background-color: black">
              <div style="border-radius: 0px 0px 15px 15px; background-color: rgba(227, 19, 55, 0.6 ); border-left: 2px solid black; border-right: 2px solid black; border-bottom: 2px solid black; color:#e7e7f1; line-height: 10px;">&nbsp;</div>
            </div>
            <div class="my-2 mx-5 d-flex">
              <p class="m-0"><b><i class="fab fa-hive"></i> HBD</b></p>
              <p class="ml-auto small my-0 py-0 mr-2 text-white-50">BALANCE: {{accountapi.data.result[0].hbd_balance}}</span></p>
            </div>
          </div>
          <div class="modal fade" id="buyDluxModal" tabindex="-1" role="dialog" aria-labelledby="buyDluxModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" id="buy-modal">
              <div class="modal-content bg-dark text-white">
                <form class="needs-validation" validate id="marketorderform" dmx-bind:action="javascript:buyDEX('{{markethive.value}}','{{markethbd.value}}','{{marketqty.value}}','{{markettime.value}}')" >
                  <input id="markethbd" value="0" class="d-none">
                  <input id="marketqty" value="0" class="d-none">
                  <input id="markettime" value="0" class="d-none">
                  <div class="card-header d-flex flex-fill justify-content-between align-items-center">
                    <div>&nbsp;</div>
                    <h3 class="lead m-0">MARKET ORDER</h3>
                    <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close"> <span class="close text-white m-0 p-0"><i class="fas fa-times"></i></span></button>
                  </div>
                  <div class="card-body">
                    <p class="small text-white-50">Market Orders utilize multisig to complete partial fills of open orders on the DEX, starting with the lowest rate to ensure you're getting the best price.</p>
                    <p class="small text-white-50"> If no orders are available, the ICO price of 1 HIVE per 1 DLUX is in effect.</p>
                    <div class="d-flex flex-column">
                      <div class="d-flex flex-column flex-fill rounded-lg p-3 my-1 bg-darker" >
                        <div class="d-flex flex-row flex-fill align-items-center">
                          <p style="font-size: 18px;" class="p-0 m-0 font-weight-light">From</p>
                          <div class="d-flex ml-auto align-items-baseline">
                            <div class="d-flex small justify-content-between">
                              <p class="my-0 text-white-50" >Available<i class="fab fa-hive mx-1"></i></p>
                              <p class="my-0 text-primary">{{accountapi.data.result[0].balance}}</p>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex flex-row flex-fill mt-1">
                          <div class="d-flex align-items-center">
                            <div class="circle2"><i class="fab fa-hive"></i></div>
                            <h2 class="p-0 m-0 ml-2 font-weight-bold">HIVE</h2>
                          </div>
                          <div class="d-flex ml-auto flex-column">
                            <p class="ml-auto my-0 text-white-50 font-weight-bolder" style="font-size: 30px;">
                              <input class="form-control text-white" style="background-color: rgba(0,0,0,0.5); max-width: 150px" id="markethive" value="1" placeholder="0" type="number" min="0.004" step="0.001" required dmx-bind:max="{{accountapi.data.result[0].balance.split(' ')[0]}}">
                            </p>
                            <p class="ml-auto my-0 text-muted font-weight-bold" style="font-size: 16px;">&asymp; {{(markethive.value*hiveprice.data.hive.usd).formatCurrency()}}</p>
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
                            <p style="font-size: 16px;" class="p-0 m-0 text-white-50 ml-auto">1 HIVE &asymp; {{1/dexview1.data[0].rate}} DLUX</p>
                          </div>
                          <div class="d-flex">
                            <p style="font-size: 12px;" class="p-0 m-0 text-muted ml-auto text-success">1 DLUX &asymp; {{dexview1.data[0].rate}} HIVE</p>
                          </div>
                          <hr width="100%" style="border: #333 thin solid">
                          <div class="d-flex">
                            <p style="font-size: 18px;" class="p-0 m-0 text-white-50 font-weight-light">Swap Fee<small class="rounded-pill border border-secondary p-1 ml-2">0.1%</small></p>
                            <p style="font-size: 16px;" class="p-0 m-0 text-white-50 ml-auto">&asymp;
                              <input id="marketfee" class="d-none" dmx-bind:value="{{((markethive.value/dexview1.data[0].rate)*0.001).formatNumber(3,'.',',')}}">
                              {{marketfee.value}} DLUX</p>
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
                            <p class="ml-auto my-0 text-warning font-weight-bolder" style="font-size: 30px;">&asymp; {{((markethive.value/dexview1.data[0].rate)-(marketfee.value.toNumber())).formatNumber(3,'.',',')}}</p>
                          </div>
                        </div>
                        <p class="pt-3">DLUX is your ticket to the metaverse. Purchase NFTs, power-up to vote on proposals, and use it across a variety of XR games and apps.</p>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="d-flex justify-content-around">
                      <button type="submit" class="btn btn-lg btn-primary">Convert</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="d-flex flex-column">
        <div class="jumbotron px-5 py-4" style="background: linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0)); border: none;">
          <div class="d-flex justify-content-between align-items-center"></div>
          <div class="" id="sales-mint">
            <div id="buymintcards" is="dmx-repeat" dmx-bind:repeat="mintsupplyapi.data.result.sort('set')" class="row">
              <div dmx-bind:id="{{script}}-card" class="card card-ft text-white m-2 " style="border: none;"> {{script.getSetDetailsColors('-card')}}
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
                    <div class="pr-2"><small>SUPPLY: </small></div>
                    <div class="px-2">
                      <h2 dmx-bind:id="{{set}}-inventory" class="m-0">
                        <div>{{qty}}</div>
                      </h2>
                    </div>
                  </div>
                  <div> <a dmx-bind:href="/nfts/set/{{set}}">
                    <h3 class="card-title lead shimmer rounded p-2 m-0 ml-auto" style="color: black"><b>{{set}} NFT</b></h3>
                    </a></div>
                </div>
                <div class="card-body text-center d-flex flex-column p-2">
                  <div class="card panel-group h-100" dmx-bind:id="{{set}}-panel" style="background-color: rgba(0,0,0,0.8)">
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
                          <div dmx-bind:id="{{script}}wrapped"> {{script.getSetPhotos('','wrapped','rounded max-160')}}</div>
                          <div dmx-bind:id="{{script}}header"  style="background-image: linear-gradient(magenta,aqua);-webkit-background-clip: text;color: transparent;">{{script.getSetDetailsColorsTxt('header')}}
                            <div class="mt-3">
                              <h1 class="text-center">sealed NFT<i dmx-bind:id="{{script}}icon" class="ml-3"></i></h1>
                              {{script.getSetDetailsIcon('icon')}}</div>
                          </div>
                          <h5>Unwrap to see what's inside</h5>
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
                                      <th scope="col" class="small">SUPPLY</th>
                                      <th scope="col" class="small">PRICE</th>
                                      <th scope="col" class="small">QTY</th>
                                      <th scope="col"></th>
                                    </tr>
                                  </thead>
                                  <tbody id="salesrepeat" is="dmx-repeat" dmx-bind:repeat="sales.reverse()" >
                                    <tr dmx-show="pb.length > 0">
                                      <th scope="row" class="" colspan="4"> <p class="my-2"><span class="small bg-warning text-dark rounded px-2 py-1">ACCOUNT COMMENT OR POST BETWEEN</span></p>
                                        <p>{{pb}}</p>
                                      </th>
                                    </tr>
                                    <tr>
                                      <form dmx-bind:id="{{set}}{{uid}}form" class="needs-validation" novalidate>
                                        <th scope="row" style="vertical-align: middle">{{qty}} </th>
                                        <td style="vertical-align: middle">{{pricenai.nai()}}</td>
                                        <td><span dmx-show="(pricenai.token != 'DLUX')">
                                          <center>
                                            <input value="1" required dmx-bind:max="{{max}}" dmx-bind:id="{{set}}{{uid}}buyftqty" class="bg-none border-light rounded text-white text-center form-control" style="max-width: 50px">
                                          </center>
                                          </span> <span dmx-show="(pricenai.token == 'DLUX')">{{qty}} </span></td>
                                        <td><div>
                                            <button type="submit" class="btn btn-primary" dmx-bind:id="{{set}}-{{uid}}-buyfthivebtn" dmx-show="(pricenai.token != 'DLUX') && (by != userCookie.value)" dmx-on:click="buyFTHive('{{set}}','{{uid}}',{{price}},'{{pricenai.token}}','{{set}}{{uid}}buyftqty')">Buy</button>
                                            <button class="btn btn-primary" dmx-bind:id="{{set}}-{{uid}}-buyftbtn" dmx-show="(pricenai.token == 'DLUX') && (by != userCookie.value)" dmx-on:click="buyFT('{{set}}','{{uid}}',{{price}})">Buy</button>
                                            <button class="btn btn-warning" dmx-bind:id="{{set}}-{{uid}}-sellftcancelbtn" dmx-show="(by == userCookie.value)" dmx-on:click="sellFTcancel('{{set}}','{{uid}}','{{pricenai.token}}')">Cancel</button>
                                          </div></td>
                                      </form>
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
                                    <td><button class="btn btn-secondary" dmx-show="(by == userCookie.value)">Bid</button>
                                      <button dmx-bind:id="{{set}}-{{uid}}-buyFTbtn" class="btn btn-primary" dmx-show="(by != userCookie.value)" dmx-on:click="bidFT('{{set}}','{{uid}}')">Bid</button>
                                </div>
                                </td>
                                
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
              <div class="card-footer p-2">
                <div class="rounded p-2" style="background-color: rgba(0,0,0,0.8)">
                  <div class="d-flex justify-content-around">
                    <div class="d-flex align-items-center">
                      <div class="pr-2"> <small>OWNED: </small> </div>
                      <div class="px-2">
                        <h2 dmx-bind:id="{{set}}-inventory" class="m-0">
                          <div dmx-bind:id="{{set}}-inventory-none" dmx-class:d-none="inventoryapi.data.mint_tokens.where('set',set,'==').hasItems()"><span style="color: aqua">0</span></div>
                          <div dmx-bind:id="{{set}}-inventory-any" is="dmx-repeat" dmx-bind:repeat="inventoryapi.data.mint_tokens.where('set', set, '==')" dmx-show="inventoryapi.data.mint_tokens.where('set',set,'==').hasItems()"><span style="color: aqua">{{qty}}</span></div>
                        </h2>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex mt-3 justify-content-between align-items-center">
                    <div class="col-5 px-0">
                      <div dmx-bind:id="{{set}}-open-none" dmx-class:d-none="inventoryapi.data.mint_tokens.where('set',set,'==').hasItems()">
                        <button type="button" class="btn btn-outline-light w-100 disabled">Open<i class="fas fa-box-open ml-3"></i></button>
                      </div>
                      <div dmx-bind:id="{{set}}-open-some" is="dmx-repeat" dmx-bind:repeat="inventoryapi.data.mint_tokens.where('set', set, '==')" dmx-show="inventoryapi.data.mint_tokens.where('set',set,'==').hasItems()">
                        <button type="button" class="btn btn-outline-light w-100" dmx-on:click="openFT('{{set}}')">Open<i class="fas fa-box-open ml-3"></i></button>
                      </div>
                    </div>
                    <div class="col-5 px-0">
                      <div dmx-bind:id="{{set}}-transfer-none" dmx-class:d-none="inventoryapi.data.mint_tokens.where('set',set,'==').hasItems()">
                        <button type="button" class="btn btn-outline-light w-100 disabled">Transfer<i class="fas fa-exchange-alt ml-3"></i></button>
                      </div>
                      <div dmx-bind:id="{{set}}-transfer-some" is="dmx-repeat" dmx-bind:repeat="inventoryapi.data.mint_tokens.where('set', set, '==')" dmx-show="inventoryapi.data.mint_tokens.where('set',set,'==').hasItems()">
                        <button type="button" class="btn btn-outline-light w-100" data-toggle="modal" href="#mintTransferModal" dmx-on:click="mint_detail.select(set)">Transfer<i class="fas fa-exchange-alt ml-3"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Mint FT Iterator -->
<dmx-data-iterator id="mint_iterator" dmx-bind:data="inventoryapi.data.mint_tokens" loop="true" dmx-bind:index="1"></dmx-data-iterator>
<!-- Transfer FT Mint -->
<dmx-data-detail id="mint_detail" dmx-bind:data="inventoryapi.data.mint_tokens" key="set">
  <div class="modal fade show" id="mintTransferModal" tabindex="11" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-full modal-dialog-centered" role="document">
      <div class="modal-content bg-dark text-white">
        <div class="border border-info bg-darker mx-auto px-5 py-3 rounded col-12">
          <div class="container-fluid">
            <h3 class="text-center">Transfer {{mint_detail.data.set}} FT</h3>
            <ul class="nav nav-pills bg-darker justify-content-center" role="tablist">
              <li class="nav-item"> <a class="nav-link active" id="giveFTlink" role="tab" data-toggle="tab" aria-controls="giveFT" aria-expanded="true" href="#giveFTtab">Give</a></li>
              <li class="nav-item"> <a class="nav-link" id="tradeFTlink" role="tab" data-toggle="tab" aria-controls="tradeFT" aria-expanded="true" href="#tradeFTtab">Trade</a></li>
              <li class="nav-item"> <a class="nav-link" id="sellFTlink" role="tab" data-toggle="tab" aria-controls="sellFT" aria-expanded="true" href="#sellFTtab">Sell</a></li>
              <li class="nav-item"> <a class="nav-link" id="auctionFTlink" role="tab" data-toggle="tab" aria-controls="auctionFT" aria-expanded="true" href="#auctionFTtab">Auction</a></li>
              <li class="nav-item"> <a class="nav-link" id="airdropFTlink" role="tab" data-toggle="tab" aria-controls="airdropFT" aria-expanded="true" href="#airdropFTtab">Airdrop</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade show active" id="giveFTtab" aria-labelledby="giveFT">
                <form class="needs-validation mt-4" validate dmx-bind:action="javascript:giveFT('{{mint_detail.data.set}}','{{giveFTusername.value}}','{{giveFTqty.value}}')">
                  <div class="form-row my-2">
                    <div class="col-12">
                      <label for="giveFTusername">Username</label>
                      <div class="input-group">
                        <div class="input-group-prepend"> <span class="input-group-text" id="giveFTuserprep">@</span></div>
                        <input type="text" class="form-control r-radius-hotfix" id="giveFTusername" aria-describedby="giveFTuserprep" required>
                        <div class="invalid-feedback"> Please enter the username you'd like to give to. </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-row my-2">
                    <div class="col-12">
                      <label for="giveFTqty">Quantity</label>
                      <div class="input-group">
                        <input type="number" class="form-control" id="giveFTqty" aria-describedby="giveFTqtyappend" value="1" step="1" min="1" required>
                        <div class="input-group-append"> <span class="input-group-text r-radius-hotfix" id="giveFTqtyappend">{{mint_detail.data.set}} FT</span> </div>
                        <div class="invalid-feedback"> Please enter the number of FTs to send. </div>
                      </div>
                    </div>
                  </div>
                  <center>
                    <button id="giveFTbutton" class="btn btn-info my-2" type="submit">Give</button>
                  </center>
                </form>
              </div>
              <div role="tabpanel" class="tab-pane fade show " id="tradeFTtab" aria-labelledby="tradeFT">
                <form class="needs-validation mt-4" validate dmx-bind:action="javascript:tradeFT('{{mint_detail.data.set}}','{{tradeFTusername.value}}','{{tradeFTamount.value}}')">
                  <div class="form-row my-2">
                    <div class="col-12">
                      <label for="tradeFTusername">Username</label>
                      <div class="input-group">
                        <div class="input-group-prepend"> <span class="input-group-text" id="tradeFTuserprep">@</span></div>
                        <input type="text" class="form-control r-radius-hotfix" id="tradeFTusername" aria-describedby="tradeFTuserprep" required>
                        <div class="invalid-feedback"> Please enter the username you'd like to trade with. </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-row my-2">
                    <div class="col-6">
                      <label for="tradeFTqty">Quantity</label>
                      <div class="input-group">
                        <input type="number" class="form-control" id="tradeFTqty" aria-describedby="tradeFTqtyappend" placeholder="1" step="1" min="1" required readonly>
                        <div class="input-group-append"> <span class="input-group-text r-radius-hotfix" id="tradeFTqtyappend">{{mint_detail.data.set}} FT</span> </div>
                        <div class="invalid-feedback"> Please enter the number of FTs to trade. </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <label for="tradeFTamount">Amount</label>
                      <div class="input-group">
                        <input type="number" class="form-control" id="tradeFTamount" aria-describedby="tradeFTamountappend" placeholder="0.000" step="0.001" min="0.001" required  dmx-class:readonly="">
						  <div class="input-group-append"> <span class="input-group-text r-radius-hotfix" id="tradeFTamountappend">DLUX</span> </div>
                        <div class="invalid-feedback"> Please enter the amount of DLUX you'd like to receive. </div>
                      </div>
                    </div>
                  </div>
                  <center>
                    <button id="tradeFTbutton" class="btn btn-info my-2" type="submit">Propose Trade</button>
                  </center>
                </form>
              </div>
              <div role="tabpanel" class="tab-pane fade show " id="sellFTtab" aria-labelledby="sellFT">
                <form class="needs-validation mt-4" validate dmx-bind:action="javascript:sellFT('{{mint_detail.data.set}}','{{sellFTprice.value}}')">
                  <div class="form-row my-2">
                    <div class="col-6">
                      <label for="sellFTqty">Quantity</label>
                      <div class="input-group">
                        <input type="number" class="form-control" id="sellFTqty" aria-describedby="sellFTqtyappend" placeholder="1" step="1" min="1" required readonly>
                        <div class="input-group-append"> <span class="input-group-text r-radius-hotfix" id="sellFTqtyappend">{{mint_detail.data.set}} FT</span> </div>
                        <div class="invalid-feedback"> Please enter the number of FTs to sell. </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <label for="sellFTprice">Sale Price</label>
                      <div class="input-group">
                        <input type="number" class="form-control" id="sellFTprice" aria-describedby="sellFTpriceappend" placeholder="0.000" step="0.001" min="0.001" required>
                        <div class="input-group-append">
                          <div class="input-group-text r-radius-hotfix" id="sellFTpriceappend">DLUX</div>
                        </div>
                        <div class="invalid-feedback"> Please enter the amount of DLUX you'd like to receive. </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-row my-2">
                    <p class="text-white-50 small">Ownership will be transferred to the DAO listing service and sold publicly. Cancel anytime to return immediately.</p>
                  </div>
                  <center>
                  <button id="sellFTbutton" class="btn btn-info my-2" type="submit" >List Item</button>
                </form>
              </div>
              <div role="tabpanel" class="tab-pane fade show " id="auctionFTtab" aria-labelledby="auctionFT">
                <form class="needs-validation mt-4" validate dmx-bind:action="javascript:auctionFT('{{mint_detail.data.set}}','{{auctionFTprice.value}}','{{Date.now()}}','{{auctionFTdays.value}}'),'{{auctionFTpriceType.value}}'">
                  <div class="form-row my-2">
                    <div class="col-6">
                      <label for="auctionFTqty">Quantity</label>
                      <div class="input-group">
                        <input type="number" class="form-control" id="auctionFTqty" aria-describedby="auctionFTqtyappend" placeholder="1" step="1" min="1" required readonly>
                        <div class="input-group-append"> <span class="input-group-text r-radius-hotfix" id="auctionFTqtyappend">{{mint_detail.data.set}} FT</span> </div>
                        <div class="invalid-feedback"> Please enter the number of FTs to auction. </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <label for="auctionFTprice">Starting Bid</label>
                      <div class="input-group">
                        <input type="number" class="form-control" id="auctionFTprice" aria-describedby="auctionFTpriceappend" placeholder="0.000" step="0.001" min="0.001" required>
                        <div class="input-group-append"> <span class="input-group-text r-radius-hotfix" id="auctionFTqtyappend">DLUX</span> </div>
                        <div class="invalid-feedback"> Please enter the amount of DLUX you'd like to start the bidding. </div>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex justify-content-around">
                    <div class="form-row my-2 d-flex align-items-center">
                      <label for="auctionFTdays" class="m-0">Duration: </label>
                      <select class="mx-2 btn btn-lg btn-secondary" class="form-control" id="auctionFTdays" required >
                      <option value="1">1 Day</option>
                      <option value="2">2 Days</option>
                      <option value="3">3 Days</option>
                      <option value="4">4 Days</option>
                      <option value="5">5 Days</option>
                      <option value="6">6 Days</option>
                      <option value="7" selected>7 Days</option>
                      <option value="8">8 Days</option>
                      <option value="9">9 Days</option>
                      <option value="10">10 Days</option>
                      <option value="11">11 Days</option>
                      <option value="12">12 Days</option>
                      <option value="13">13 Days</option>
                      <option value="14">14 Days</option>
                      <option value="15">15 Days</option>
                      <option value="16">16 Days</option>
                      <option value="17">17 Days</option>
                      <option value="18">18 Days</option>
                      <option value="19">19 Days</option>
                      <option value="20">20 Days</option>
                      <option value="21">21 Days</option>
                      <option value="22">22 Days</option>
                      <option value="23">23 Days</option>
                      <option value="24">24 Days</option>
                      <option value="25">25 Days</option>
                      <option value="26">26 Days</option>
                      <option value="27">27 Days</option>
                      <option value="28">28 Days</option>
                      <option value="29">29 Days</option>
                      <option value="30">30 Days</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-row my-2">
                    <p class="text-white-50 small">Ownership will be transferred to the DAO listing service and auctioned publicly. Once submitted this cannot be cancelled. If there are no bids at the end of the auction period, it will be returned to you immediately.</p>
                  </div>
                  <center>
                    <button class="btn btn-info my-2" type="submit">List Item</button>
                  </center>
                </form>
              </div>
              <div role="tabpanel" class="tab-pane fade show " id="airdropFTtab" aria-labelledby="airdropFT">
                <form class="needs-validation mt-4" validate dmx-bind:action="javascript:airdropFT('{{mint_detail.data.set}}','{{airdropFTusers.value}}')">
                  <div class="form-row my-2">
                    <div class="col-12">
                      <label for="airdropFTusers">Airdrop to:</label>
                      <div class="input-group">
                        <textarea name="paragraph_text" cols="50" rows="2" class="form-control r-radius-hotfix" id="airdropFTusers" aria-describedby="airdropFT" required placeholder="name user-name"></textarea>
                        <div class="invalid-feedback"> Please enter at least one user name to airdrop tokens to. </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-row my-2">
                    <div class="col-12">
                      <label for="airdropFTqty">Quantity sent to each:</label>
                      <div class="input-group">
                        <input type="number" class="form-control" id="airdropFTqty" aria-describedby="airdropFTqtyappend" placeholder="1" step="1" min="1" required readonly>
                        <div class="input-group-append"> <span class="input-group-text r-radius-hotfix" id="airdropFTqtyappend">{{mint_detail.data.set}} FT</span> </div>
                        <div class="invalid-feedback"> Please enter the number of FTs to send to each account. </div>
                      </div>
                    </div>
                  </div>
                  <center>
                    <button class="btn btn-info my-2" type="submit">Airdrop Tokens</button>
                  </center>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</dmx-data-detail>
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
	<!-- NFT Repeat -->
  <div dmx-repeat:repeatauctiontoken1="auctionsview.data">
    <div class="m-2 bg-dark card text-white">
      <div class="card-header d-flex align-items-center border-0" dmx-bind:id="{{script}}{{uid}}-nftauctionheader">{{script.getSetDetailsColors(uid+'-nftauctionheader')}}
        <div class="rounded-pill d-flex align-items-center p-2" style="background-color: black">
          <h2 class="m-0 px-2">{{uid}}</h2>
        </div>
        <h3 class="card-title lead border rounded border-dark p-2 ml-auto mb-0 "><a dmx-bind:href="/nfts/set/{{set}}" class="lead" style="color: black">{{set}} NFT</a></h3>
      </div>
      <a href="#auctionsModal" class="a-1" data-toggle="modal" dmx-on:click="auctions_iterator.select($index);auctions_detail.select(uid)">
      <div class="card-img-top" dmx-bind:id="image-{{set}}-{{uid}}" dmx-bind:alt="image-{{set}}-{{uid}}">{{uid.nftImageWell(script, set)}}</div>
      <div class="text-center " style="background: crimson">
        <h5 dmx-bind:id="timer-{{set}}-{{uid}}" class="mb-0 lead">{{time.animateTime(set, uid)}}</h5>
      </div>
      <div class="card-body d-flex flex-column text-center"><span>Bid: <u>{{price.nai()}}</u></span></div>
      </a>
      <div class="card-footer text-center d-flex justify-content-between align-items-center"> <span>{{bids}} Bids</span>
        <button href="#auctionsModal" class="btn btn-primary btn-lg" style="min-width:100px" data-toggle="modal" dmx-show="(by != userCookie.value)" dmx-on:click="auctions_iterator.select($index);auctions_detail.select(uid)" role="button">Bid</button>
        <button href="#auctionsModal" class="btn btn-secondary btn-lg" style="min-width:100px" data-toggle="modal" dmx-show="(by == userCookie.value)" dmx-on:click="auctions_iterator.select($index);auctions_detail.select(uid)" role="button">Auctioned</button>
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
    <div class="modal-dialog modal-full modal-xl modal-dialog-centered" role="document">
      <div class="modal-content bg-dark text-white">
        <div class="card border-0 text-white bg-dark ">
          <div class="card-header border-0 d-flex align-items-center justify-content-between" dmx-bind:id="{{auctions_detail.data.script}}{{auctions_detail.data.uid}}-nftauctiondetailheader">{{auctions_detail.data.script.getSetDetailsColors(auctions_detail.data.uid+'-nftauctiondetailheader')}}
            <div class="rounded-pill d-flex align-items-center p-2" style="background-color: black">
              <h2 class="m-0 px-2">{{auctions_detail.data.uid}}</h2>
            </div>
            <h3 class="card-title lead border border-dark rounded mb-0 p-2"><a dmx-bind:href="/nfts/set/{{auctions_detail.data.set}}" style="color: black">{{auctions_detail.data.set}} NFT</a></h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
			<div class="row">
			<div class="col-md-6">
          <div class="card-img-top w-100" dmx-bind:id="detail-image-{{auctions_detail.data.set}}-{{auctions_detail.data.uid}}" dmx-bind:alt="{{auctions_detail.data.set}}-{{auctions_detail.data.uid}}">{{auctions_detail.data.uid.nftDetailWell(auctions_detail.data.script, auctions_detail.data.set)}}</div>
          </div>
			<div class="col-md-6">
			<div dmx-bind:id="{{auctions_detail.data.script}}{{auctions_detail.data.uid}}-header"  style="-webkit-background-clip: text;color: transparent;">{{auctions_detail.data.script.getSetDetailsColorsTxt(auctions_detail.data.uid+'-header')}}
                  <div class="mt-3">
                    <h1 class="text-center">{{auctions_detail.data.name_long}}<i dmx-bind:id="{{auctions_detail.data.script}}{{auctions_detail.data.uid}}icon" class="ml-3"></i></h1>
                    {{auctions_detail.data.script.getSetDetailsIcon(auctions_detail.data.uid+'icon')}}</div>
                </div>
								<p dmx-bind:id="{{auctions_detail.data.script}}descriptionp"> {{auctions_detail.data.script.getSetDetails('Description', 'descriptionp', 'innerText')}} </p>

				 <div dmx-bind:id="{{auctions_detail.data.script}}-{{auctions_detail.data.uid}}-attributes" class="d-flex flex-wrap"> {{auctions_detail.data.script.getNFTDetails(auctions_detail.data.uid)}} </div>
			</div>
				</div>
				
          <div class="text-center " style="background: crimson">
            <h5 dmx-bind:id="detail-timer-{{auctions_detail.data.set}}-{{auctions_detail.data.uid}}" class="mb-0 lead">{{auctions_detail.data.time.animateTime(auctions_detail.data.set, auctions_detail.data.uid, 1)}}</h5>
          </div>
			
          <div class="card-body text-center">
			  <div class="d-flex justify-content-around">

				  <div><small><u>Seller</u></small>
                <h6><a dmx-bind:href="/@{{auctions_detail.data.by}}#inventory">{{auctions_detail.data.by}}</a></h6>
              </div>
				<div><small><u>Starting Price</u></small>
                <h6>{{auctions_detail.data.initial_price.nai()}}</h6>
              </div>
				  <div><small><u>High Bidder</u></small>
                <h6><a dmx-bind:href="/@{{auctions_detail.data.bidder}}#inventory">{{auctions_detail.data.bidder}}</a></h6>
              </div>
              <div><small><u>Current Bid</u></small>
                <h6>{{auctions_detail.data.price.nai()}}</h6>
              </div>
            </div>
            <form dmx-show="(auctions_detail.data.by != userCookie.value)">
				  <div class="form-group" for="buyQuantity" id="buy-qty" aria-labelledby="buy-qty-label" dmx-hide="buymarket.checked">
                <div class="form-row col-lg-6 my-3 mx-auto">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="auctionNFTbid">Bid Amount:</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" required class="form-control bg-dark border-black text-info" id="auctionNFTbid" dmx-bind:value="{{((auctions_detail.data.price.amount/1000)+1)}}" placeholder="0" min="0.001" step="0.001" aria-required="true" >
                      <div class="input-group-append">
                        <div class="input-group-text bg-dark border-black r-radius-hotfix text-white-50">{{auctions_detail.data.price.token}}</div>
                      </div>
						<div class="invalid-feedback"> Minimum quantity is 0.001 </div>
                    </div>
                  </div>
                </div>
              </div>
              <button class="btn btn-lg btn-info" dmx-on:click="bidNFT('{{auctions_detail.data.set}}','{{auctions_detail.data.uid}}','{{auctionNFTbid.value}}','{{auctions_detail.data.price.token}}', statusWaiter)">Place Bid</button>
            </form>
			  
			  </div>
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

<!-- NFT Sales Repeat -->
<div class="d-flex justify-content-between align-items-center" style="border-bottom: #FFFFFF thick solid">
  <h1 class="text-white p-0 m-0">NFT Sales</h1>
  <div class="d-none d-xl-block">
    <div class="d-flex align-items-center">
      <h5 class="m-0">Columns:</h5>
      <select id="sellNFTsizeXL" name="Max Columns" class="btn btn-secondary ml-2">
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
      <select id="sellNFTsizeLG" name="Max Columns" class="btn btn-secondary ml-2">
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
      <select id="sellNFTsizeMD" name="Max Columns" class="btn btn-secondary ml-2">
        <option value="3" selected>3</option>
        <option value="2">2</option>
        <option value="1">1</option>
      </select>
    </div>
  </div>
  <div class="d-none d-sm-block d-md-none">
    <div class="d-flex align-items-center">
      <h5 class="m-0">Columns:</h5>
      <select id="sellNFTsizeSM" name="Max Columns" class="btn btn-secondary ml-2">
        <option value="2" selected>2</option>
        <option value="1">1</option>
      </select>
    </div>
  </div>
</div>
<div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1"
		   dmx-bind:class="row row-cols-xl-{{sellNFTsizeXL.value}} row-cols-lg-{{sellNFTsizeLG.value}} row-cols-md-{{sellNFTsizeMD.value}} row-cols-sm-{{sellNFTsizeSM.value}} row-cols-1"
		   
		   style="margin-left: -8px; margin-right: -8px">
  <div dmx-repeat:repeatsalesview1="salesview.data">
    <div class="card text-white bg-dark m-2" >
      <div class="card-header border-0 d-flex align-items-center" dmx-bind:id="{{script}}{{uid}}-nftauctionheader">{{script.getSetDetailsColors(uid+'-nftauctionheader')}}
        <div class="rounded-pill d-flex align-items-center p-2" style="background-color: black">
          <h2 class="m-0 px-2">{{uid}}</h2>
        </div>
        <h3 class="card-title lead border rounded border-dark p-2 ml-auto mb-0 "><a dmx-bind:href="/nfts/set/{{set}}" class="lead" style="color: black">{{set}} NFT</a></h3>
      </div>
      <a href="#salesModal" class="a-1" data-toggle="modal" dmx-on:click="sales_iterator.select($index);sales_detail.select(uid)">
      <div class="card-img-top" dmx-bind:id="image-{{set}}-{{uid}}" dmx-bind:alt="image-{{set}}-{{uid}}">{{uid.nftImageWell(script, set)}}</div>
      <div class="card-body">
        <p class="card-text text-center">Price: <u>{{price.nai()}}</u></p>
      </div>
      </a>
      <div class="card-footer text-center">
        <p class="lead">
          <button id="cancelNFTbtn1" class="btn btn-warning btn-lg" dmx-show="(by == userCookie.value)" dmx-on:click="sellNFTcancel('{{set}}','{{uid}}')">Cancel</button>
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
    <div class="modal-dialog modal-full modal-xl modal-dialog-centered" role="document">
      <div class="modal-content bg-dark text-white">
        <div class="card border-0 text-white bg-dark ">
          <div class="card-header border-0 d-flex align-items-center justify-content-between" dmx-bind:id="{{sales_detail.data.script}}{{sales_detail.data.uid}}-nftsalesdetailheader">{{sales_detail.data.script.getSetDetailsColors(sales_detail.data.uid+'-nftsalesdetailheader')}}
            <div class="rounded-pill d-flex align-items-center p-2" style="background-color: black">
              <h2 class="m-0 px-2">{{sales_detail.data.uid}}</h2>
            </div>
            <h3 class="card-title lead border border-dark rounded mb-0 p-2"><a dmx-bind:href="/nfts/set/{{sales_detail.data.set}}" style="color: black">{{sales_detail.data.set}} NFT</a></h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
			<div class="row">
			<div class="col-md-6">
          <div class="card-img-top w-100" dmx-bind:id="detail-image-{{sales_detail.data.set}}-{{sales_detail.data.uid}}" dmx-bind:alt="{{sales_detail.data.set}}-{{sales_detail.data.uid}}">{{sales_detail.data.uid.nftDetailWell(sales_detail.data.script, sales_detail.data.set)}}</div>
          </div>
			<div class="col-md-6">
			<div dmx-bind:id="{{sales_detail.data.script}}{{sales_detail.data.uid}}-header"  style="-webkit-background-clip: text;color: transparent;">{{sales_detail.data.script.getSetDetailsColorsTxt(sales_detail.data.uid+'-header')}}
                  <div class="mt-3">
                    <h1 class="text-center">{{sales_detail.data.name_long}}<i dmx-bind:id="{{sales_detail.data.script}}{{sales_detail.data.uid}}-icon" class="ml-3"></i></h1>
                    {{sales_detail.data.script.getSetDetailsIcon(sales_detail.data.uid+'-icon')}}</div>
                </div>
								<p dmx-bind:id="{{sales_detail.data.script}}descriptionp"> {{sales_detail.data.script.getSetDetails('Description', 'descriptionp', 'innerText')}} </p>

				 <div dmx-bind:id="{{sales_detail.data.script}}-{{sales_detail.data.uid}}-attributes" class="d-flex flex-wrap"> {{sales_detail.data.script.getNFTDetails(sales_detail.data.uid)}} </div>
			</div>
				</div>
				
          <div class="text-center " style="background: crimson">
            <h5 dmx-bind:id="detail-timer-{{sales_detail.data.set}}-{{sales_detail.data.uid}}" class="mb-0 lead">{{sales_detail.data.time.animateTime(sales_detail.data.set, sales_detail.data.uid, 1)}}</h5>
          </div>
			
          <div class="card-body text-center">
			  <div class="d-flex justify-content-around">

				  <div><small><u>Seller</u></small>
                <h6><a dmx-bind:href="/@{{sales_detail.data.by}}#inventory">{{sales_detail.data.by}}</a></h6>
              </div>
	
              <div><small><u>Price</u></small>
                <h6>{{sales_detail.data.price.nai()}}</h6>
              </div>
            </div>
			  
   			 <button id="cancelNFTbtn1" class="btn btn-warning btn-lg" dmx-show="(sales_detail.data.by == userCookie.value)" dmx-on:click="sellNFTcancel('{{sales_detail.data.set}}','{{sales_detail.data.uid}}')">Cancel</button>
              <button class="btn btn-lg btn-info" dmx-show="(sales_detail.data.by != userCookie.value)" dmx-on:click="buyNFT('{{sales_detail.data.set}}','{{sales_detail.data.uid}}','{{sales_detail.data.price.amount}}','{{sales_detail.data.price.token}}')">Buy</button>
         
			  
			  </div>
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
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
</body>
</html>
