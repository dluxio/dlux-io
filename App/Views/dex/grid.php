<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - ORDER BOOK</title>
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/header.php";
include_once( $path );
?>

<style>	
.arrow2 {
		position: absolute;
		left: 50%;
    	transform: translate(-50%, -50%);
		z-index: 1;
	}
	</style>
<script type="text/javascript" src="/dlux-io/dmxAppConnect/dmxAppConnect.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.4.0/nouislider.min.js" integrity="sha512-mZXUH8DAODwCHioWP3gltQwa953LbABMlzTYwYkKqv8eNxOk37B1HgNNuCMfFxgrpW5C34WJbxPDcM58+s1dJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.4.0/nouislider.css" integrity="sha512-DGB74Gyw93qON+V0QxSRs1er6sqoPyFoy23HBL5LN7MRJBcjeCU22zega+vOEGE0XQLoVrv4ExcaesSTwZQA2w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--page specific-->
<script src="/js/dex.js"></script>
<script src="/js/ico.js"></script>
</head>
<body class="d-flex flex-column h-100 padme-t70 text-white" id="grid" is="dmx-app">

<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/nav.php";
include_once( $path );
?>
<dmx-api-datasource id="hiveprice" is="dmx-fetch" url="https://api.coingecko.com/api/v3/simple/price?ids=hive&amp;vs_currencies=usd"></dmx-api-datasource>
<dmx-api-datasource id="dexapi" is="dmx-fetch" url="https://token.dlux.io/dex/"></dmx-api-datasource>
<dmx-data-view id="orderbookmath1" dmx-bind:data="dexapi.data.markets.hive.sells"></dmx-data-view>
<dmx-data-view id="orderbookview1" dmx-bind:data="dexapi.data.markets.hive.sells" filter="(amount >= 1000) && (amount <= 900000)" sorton="" sortdir="" pagesize=""></dmx-data-view>
<!-- hidden orderbook math -->
<div class="col d-none">
  <div class="form-group">
    <label>Total Orders</label>
    <input type="number" id="totalorders" dmx-bind:value="orderbookmath1.items">
  </div>
  <div class="form-group">
    <label>Enabled Orders</label>
    <input type="number" id="countenabledorders" dmx-bind:value="(orderbookmath1.data.where('rate',maxprice.value,'<=').count())">
  </div>
  <div class="form-group">
    <label>Disabled Orders</label>
    <input type="number" id="countdisabledorders" dmx-bind:value="orderbookmath1.data.where('rate',maxprice.value,'>').count()">
  </div>
  <div class="form-group">
    <label>Low Price</label>
    <input type="number" id="lowprice" dmx-bind:value="orderbookmath1.data.min('rate').formatNumber('6','.',',')">
  </div>
  <div class="form-group">
    <label>Avg Price</label>
    <input type="number" id="avgprice" dmx-bind:value="(orderbookmath1.data.sum('hive')/orderbookmath1.data.sum('amount')).formatNumber('6','.',',')">
  </div>
  <div class="form-group">
    <label>Max Price</label>
    <input type="number" id="maxprice" dmx-bind:value="(orderbookmath1.data.min('rate')*1.01).formatNumber('6','.',',')">
  </div>
  <div class="form-group">
    <label>High Price</label>
    <input type="number" id="highprice" dmx-bind:value="orderbookmath1.data.max('rate').formatNumber('6','.',',')">
  </div>
  <div class="form-group">
    <label>Total DLUX</label>
    <input type="number" id="totalamount1" dmx-bind:value="(orderbookmath1.data.sum('amount')/1000).formatNumber('3','.',',')">
  </div>
  <div class="form-group">
    <label>Total HIVE</label>
    <input type="number" id="totalamount2" dmx-bind:value="(orderbookmath1.data.sum('hive')/1000).formatNumber('3','.',',')">
  </div>
  <div class="form-group">
    <label>HIVE USD</label>
    <input type="number" id="hiveusd" dmx-bind:value="hiveprice.data.hive.usd">
  </div>
</div>
<!-- hidden dev menu -->
<div id="devbar" class="row px-4 d-none">
  <!-- orderbook select -->
  <form p-2>
    <div class="form-row">
      <div class="dropdown show"> <a class="btn btn-lg dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Large Button </a>
        <div class="dropdown-menu">
          <h6 class="dropdown-header">Dropdown header 1</h6>
          <a class="dropdown-item" href="#">First Link</a> <a class="dropdown-item disabled" href="#" >Disabled Link</a> <a class="dropdown-item" href="#">Something else here</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Seperated Link</a> </div>
      </div>
      <select id="orderbookselect1">
        <option value="dexapi.data.markets.hive.sells">Buy DLUX for HIVE</option>
        <option value="dexapi.data.markets.hbd.sells">Buy DLUX for HBD</option>
        <option value="dexapi.data.markets.hive.buys">Sell DLUX for HIVE</option>
        <option value="dexapi.data.markets.hbd.sells">Sell DLUX for HBD</option>
      </select>
      {{orderbookselect1.value}} </div>
  </form>
  <!-- full action bar -->
  <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
    <div class="btn-group" role="group">
      <button type="button" class="btn btn-secondary dropdown-toggle" id="filterdrop" aria-expanded="false" aria-haspopup="true" data-toggle="dropdown"> Filter </button>
      <div class="dropdown-menu">
        <div class="d-flex justify-content-between align-items-center">
          <input type="" class="form-control col-2 text-center" id="amountmin2" placeholder="MIN" dmx-bind:value="(dexapi.data.markets.hive.sells.min('amount')/1000).formatNumber('3','.',',')">
          <div class="flex-fill col-6" id="amountslider2"></div>
          <input class="form-control col-2 text-center" type="" id="amountmax2" placeholder="MAX" dmx-bind:value="(dexapi.data.markets.hive.sells.max('amount')/1000).formatNumber('3','.',',')">
        </div>
        <div class="d-flex justify-content-between align-items-center">
          <input class="form-control col-2 text-center" type="" id="hivemin2" placeholder="MIN" dmx-bind:value="(dexapi.data.markets.hive.sells.min('hive')/1000).formatNumber('3','.',',')">
          <div class="flex-fill col-6" id="hiveslider2"></div>
          <input class="form-control col-2 text-center" type="" id="hivemax2" placeholder="MAX" dmx-bind:value="(dexapi.data.markets.hive.sells.max('hive')/1000).formatNumber('3','.',',')">
        </div>
      </div>
    </div>
    <div class="btn-group" role="group">
      <button type="button" class="btn btn-secondary dropdown-toggle" id="sortdrop" aria-expanded="false" aria-haspopup="true" data-toggle="dropdown"> Sort </button>
      <div class="dropdown-menu">
        <h6 class="dropdown-header text-center " dmx-class:text-primary="orderbookview1.sort.on == 'amount'">DLUX</h6>
        <div class="d-flex text-center"> <a class="dropdown-item" href="#" dmx-on:click="orderbookview1.sort('amount','asc')" dmx-class:active="orderbookview1.sort.on == 'amount' && orderbookview1.sort.dir == 'asc'"><i class="fas fa-sort-amount-down-alt"></i></a> <a class="dropdown-item" href="#" dmx-on:click="orderbookview1.sort('amount','desc')" dmx-class:active="orderbookview1.sort.on == 'amount' && orderbookview1.sort.dir == 'desc'"><i class="fas fa-sort-amount-up-alt"></i></a></div>
        <h6 class="dropdown-header text-center " dmx-class:text-primary="orderbookview1.sort.on == 'hive'">HIVE</h6>
        <div class="d-flex text-center"> <a class="dropdown-item" href="#" dmx-on:click="orderbookview1.sort('hive','asc')" dmx-class:active="orderbookview1.sort.on == 'hive' && orderbookview1.sort.dir == 'asc'"> <i class="fas fa-sort-amount-up"></i></a> <a class="dropdown-item" href="#" dmx-on:click="orderbookview1.sort('hive','desc')" dmx-class:active="orderbookview1.sort.on == 'hive' && orderbookview1.sort.dir == 'desc'"> <i class="fas fa-sort-amount-down"></i></a></div>
        <h6 class="dropdown-header text-center " dmx-class:text-primary="orderbookview1.sort.on == 'rate'">RATE</h6>
        <div class="d-flex text-center"> <a class="dropdown-item" href="#" dmx-on:click="orderbookview1.sort('rate','asc')" dmx-class:active="orderbookview1.sort.on == 'rate' && orderbookview1.sort.dir == 'asc'"> <i class="fas fa-sort-amount-down-alt"></i></a> <a class="dropdown-item" href="#" dmx-on:click="orderbookview1.sort('rate','desc')" dmx-class:active="orderbookview1.sort.on == 'rate' && orderbookview1.sort.dir == 'desc'"> <i class="fas fa-sort-amount-down"></i></a></div>
      </div>
    </div>
    <div class="btn-group" role="group">
      <button type="button" class="btn btn-secondary dropdown-toggle" id="showdrop" aria-expanded="false" aria-haspopup="true" data-toggle="dropdown"> Show </button>
      <div class="dropdown-menu"> <a href="#" class="dropdown-item" dmx-class:active="">All</a> <a class="dropdown-item" href="#">Buy Enabled</a> <a class="dropdown-item" href="#">Buy Blocked</a></div>
    </div>
    <div class="btn-group" role="group">
      <button type="button" class="btn btn-secondary dropdown-toggle" id="resultsperdrop" aria-expanded="false" aria-haspopup="true" data-toggle="dropdown"> Per </button>
      <div class="dropdown-menu"> <a href="#" class="dropdown-item" dmx-class:active="orderbookview1.items == 15">15</a> <a class="dropdown-item" href="#">30</a></div>
    </div>
    <div class="btn-group" role="group">
      <button type="button" class="btn btn-secondary dropdown-toggle" id="pagenumdrop" aria-expanded="false" aria-haspopup="true" data-toggle="dropdown"> Page </button>
      <div class="dropdown-menu">
        <div dmx-repeat:repeat5="orderbookview1.pages"> <a href="#" class="dropdown-item" dmx-on:click="orderbookview1.select(3)" dmx-class:active="orderbookview1.page == $index + 1">{{$value}}</a></div>
      </div>
    </div>
	</div>
</div>
<main role="main" class="flex-shrink-0">
  <section class="content">
	  <div class="row">
	<!-- DETAIL ITERATOR VIEW -->
  <div class="col-md-6 col-lg-4 col-xl-3 order-xl-last">
    <div class="rounded bg-darker my-4">
      <dmx-data-iterator id="iterator1" dmx-bind:data="orderbookview1.data" loop="true">
        <div class="card-header d-flex flex-fill justify-content-between align-items-center" >
          <h2><a href="#" class="text-secondary p-3" dmx-on:click="iterator1.prev()"><i class="fas fa-caret-square-left"></i></a></h2>
          <h6 class="text-secondary">Item {{index + 1}} of {{orderbookview1.items}}</h6>
          <h2 class=""><a href="#" class="text-secondary p-3" dmx-on:click="iterator1.next()"><i class="fas fa-caret-square-right"></i></a></h2>
        </div>
        <div class="card-body">
          <div class="d-flex flex-column">
            <div class="d-flex flex-column text-center">
              <h2 class="mb-0"
					  dmx-class:text-success="(value.rate == lowprice.value)" 
					   dmx-class:text-info="((value.rate <= maxprice.value) && (value.rate !== lowprice.value))" 
					   dmx-class:text-warning="value.rate > maxprice.value"> {{value.rate}} <i class="fab fa-hive"></i></h2>
              <span class="small mb-3">PER {{value.amountnai.token}}</span> </div>
            <div class="d-flex flex-column flex-fill rounded-lg p-3 my-1 border border-danger" >
              <div class="d-flex flex-row flex-fill align-items-center">
                <p style="font-size: 18px;" class="p-0 m-0 font-weight-light">From</p>
                <div class="d-flex ml-auto align-items-baseline">
                  <div class="d-flex small justify-content-between">
                    <p class="my-0 text-white-50" >Available<i class="fab fa-hive mx-1"></i></p>
                    <p class="my-0 text-danger">1,234.567</p>
                  </div>
                </div>
              </div>
              <div class="d-flex flex-row flex-fill mt-1">
                <div class="d-flex align-items-center">
                  <h2 class="p-0 m-0 ml-2 font-weight-bold">{{value.hivenai.token}}</h2>
                </div>
                <div class="d-flex ml-auto flex-column">
                  <p class="ml-auto my-0 text-white-50 font-weight-bolder" style="font-size: 30px;"><u>{{(value.hivenai.amount/1000).formatNumber('3','.',',')}}</u></p>
                  <p class="ml-auto my-0 text-muted font-weight-bold" style="font-size: 16px;">&asymp; {{((value.hivenai.amount/1000)*(hiveusd.value)).formatCurrency()}}</p>
                </div>
              </div>
              <div class="d-flex justify-content-between">
                <div></div>
              </div>
              <div class="d-flex mt-4">
                <p style="font-size: 18px;" class="p-0 m-0 text-white-50 font-weight-light">Rate</p>
                <p style="font-size: 16px;" class="p-0 m-0 text-white-50 ml-auto">1 {{value.hivenai.token}} &#61; {{(1/value.rate)}} {{value.amountnai.token}}</p>
              </div>
              <div class="d-flex">
                <p style="font-size: 12px;" class="p-0 m-0 text-muted ml-auto text-success">1 {{value.amountnai.token}} &#61; {{value.rate}} {{value.hivenai.token}}</p>
              </div>
              <hr width="100%" style="border: #333 thin solid">
              <div class="d-flex">
                <p style="font-size: 18px;" class="p-0 m-0 text-white-50 font-weight-light">Fee <small class="rounded-pill border border-secondary px-2 ml-2">0&#46;3&#37; &#43; 0&#46;003 DLUX</small></p>
                <p style="font-size: 16px;" class="p-0 m-0 text-white-50 ml-auto">{{value.feenai.nai()}}</p>
              </div>
              <div class="d-flex justify-content-around">
                <p class="text-center my-3"><small class="text-break text-muted">{{value.txid}}</small></p>
              </div>
              <div class="my-2"></div>
            </div>
            <div class"p-0 m-0 bg-dark">
              <div class="arrow2 rounded-circle border border-primary bg-darker text-primary">
                <h1 class="m-2 px-3 py-1"><i class="fas fa-angle-double-down"></i></h1>
              </div>
            </div>
            <div class="d-flex flex-column flex-fill rounded-lg p-3 my-1 border border-primary" style="background: radial-gradient(#222,#111);">
              <div class="d-flex flex-row flex-fill align-items-center">
                <p style="font-size: 18px;" class="p-0 m-0 font-weight-light">To</p>
              </div>
              <div class="d-flex flex-row flex-fill mt-1 align-items-center">
                <div class="d-flex align-items-center">
                  <h2 class="p-0 m-0 ml-2 font-weight-bold">{{value.amountnai.token}}</h2>
                </div>
                <div class="d-flex ml-auto">
                  <p class="ml-auto my-0 text-primary font-weight-bolder" style="font-size: 30px;">{{value.amountnai.nai()}}</p>
                </div>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-around my-1 py-3">
            <div class="btn btn-lg ml-0 my-1" 
					 dmx-class:btn-outline-success="(value.rate == lowprice.value)" 
					 dmx-class:btn-outline-info="((value.rate <= maxprice.value) && (value.rate !== lowprice.value))" 
					 dmx-class:btn-outline-secondary="value.rate > maxprice.value" 
					 dmx-class:disabled="value.rate > maxprice.value">Trade Tokens</div>
          </div>
        </div>
      </dmx-data-iterator>
    </div>
  </div>
	  <!-- MAIN VIEW -->
  <div class="jumbotron bg-dark my-4 p-2 text-center col-xl-6">
    <div class="d-flex flex-fill justify-content-between align-items-center">
      <!-- data sorts -->
      <div class="d-flex flex-wrap justify-content-between ">
        <div class="btn-group mx-2" role="group">
          <button type="button" class="btn btn-primary" id="amtsort1asc" dmx-on:click="orderbookview1.sort('amount','asc')" dmx-class:active="orderbookview1.sort.on == 'amount' && orderbookview1.sort.dir == 'asc'"><i class="fas fa-sort-amount-down-alt"></i></button>
          <div class="border border-primary p-1 text-white-50" dmx-class:bg-primary="orderbookview1.sort.on == 'amount'">DLUX</div>
          <button type="button" class="btn btn-primary" id="amtsort1desc" dmx-on:click="orderbookview1.sort('amount','desc')" dmx-class:active="orderbookview1.sort.on == 'amount' && orderbookview1.sort.dir == 'desc'"><i class="fas fa-sort-amount-up-alt"></i></button>
        </div>
        <div class="btn-group mx-2" role="group">
          <button type="button" class="btn btn-primary" id="amtsort2asc" dmx-on:click="orderbookview1.sort('hive','asc')" dmx-class:active="orderbookview1.sort.on == 'hive' && orderbookview1.sort.dir == 'asc'"> <i class="fas fa-sort-amount-up"></i></button>
          <div class="border border-primary p-1 text-white-50" dmx-class:bg-primary="orderbookview1.sort.on == 'hive'">HIVE</div>
          <button type="button" class="btn btn-primary" id="amtsort2desc" dmx-on:click="orderbookview1.sort('hive','desc')" dmx-class:active="orderbookview1.sort.on == 'hive' && orderbookview1.sort.dir == 'desc'"> <i class="fas fa-sort-amount-down"></i></button>
        </div>
        <div class="btn-group mx-2" role="group">
          <button type="button" class="btn btn-primary" id="ratesortasc" dmx-on:click="orderbookview1.sort('rate','asc')" dmx-class:active="orderbookview1.sort.on == 'rate' && orderbookview1.sort.dir == 'asc'"> <i class="fas fa-sort-amount-down-alt"></i></button>
          <div class="border border-primary p-1 text-white-50" dmx-class:bg-primary="orderbookview1.sort.on == 'rate'">RATE</div>
          <button type="button" class="btn btn-primary" id="ratesortdesc" dmx-on:click="orderbookview1.sort('rate','desc')" dmx-class:active="orderbookview1.sort.on == 'rate' && orderbookview1.sort.dir == 'desc'"> <i class="fas fa-sort-amount-down"></i></button>
        </div>
      </div>
      <!-- view nav -->
      <ul id="viewnav" class="nav nav-pills" role="tablist">
        <li class="nav-item"><a class="btn btn-secondary nav-link active" href="#deck" id="decktab" role="tab" data-toggle="tab" aria-controls="data deck" aria-expanded="true"><i class="fas fa-grip-horizontal"></i></a></li>
        <li class="nav-item"><a class="btn btn-secondary nav-link" href="#groups" id="groupstab" role="tab" data-toggle="tab" aria-controls="data groups" aria-expanded="true"><i class="fas fa-layer-group"></i></a></li>
        <li class="nav-item"><a class="btn btn-secondary nav-link" href="#table" id="tabletab" role="tab" data-toggle="tab" aria-controls="data table" aria-expanded="true"><i class="fas fa-table"></i></a></li>
      </ul>
    </div>
    <div class="card bg-darker my-2 p-0 col-12">
      <div class="tab-content" id="orderbookview1tabs">
        <!-- card deck -->
        <div class="tab-pane fade show active" id="deck" role="tabpanel" aria-labelledby="deck-tab">
          <div class="card-deck card-body m-2">
            <div dmx-repeat:repeat4="orderbookview1.data" dmx-on:click="iterator1.select($index); orderbookview1Detail.select(txid)">
              <div class="btn card bg-darker p-0 ml-0 my-1" 
					 dmx-class:active="txid ==  iterator1.value.txid" 
					 dmx-class:border-success="(rate == lowprice.value)" 
					 dmx-class:border-info="((rate <= maxprice.value) && (rate !== lowprice.value))" 
					 dmx-class:border-warning="rate > maxprice.value" 
					 dmx-class:btn-success="(rate == lowprice.value)" 
					 dmx-class:btn-info="((rate <= maxprice.value) && (rate !== lowprice.value))" 
					 dmx-class:btn-warning="rate > maxprice.value" 
					 dmx-class:disabled="rate > maxprice.value">
                <div class="card-header text-right" 
					   dmx-class:text-success="(rate == lowprice.value)" 
					   dmx-class:text-info="((rate <= maxprice.value) && (rate !== lowprice.value))" 
					   dmx-class:text-white-50="rate > maxprice.value"> <small>RATE&#58; {{rate}}</small></div>
                <div class="card-body text-right text-white">
                  <div>{{amountnai.nai()}}</div>
                  <div>{{hivenai.nai()}}</div>
                </div>
                <div class="card-footer text-center">
                  <div><small class="text-muted">FEE&#58; {{feenai.nai()}}</small></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- card groups -->
        <div class="tab-pane fade" id="groups" role="tabpanel" aria-labelledby="groups-tab">
          <div class="jumbotron bg-darker my-4 p-2">
            <div>
              <div dmx-repeat:repeat1="orderbookview1.data.groupBy('rate')">
                <div>
                  <p class="lead mt-3 mb-1 p-2"><small><b>EXCHANGE RATE {{$index + 1}}</b></small> &#124; <span dmx-class:text-success="dexapi.data.markets.hive.sells[0].rate == $key" dmx-class:text-warning="$key.toNumber().inRange(dexapi.data.markets.hive.sells[0].rate, (dexapi.data.markets.hive.sells[0].rate*1.01)) == true && dexapi.data.markets.hive.sells[0].rate !== $key" dmx-class:text-danger="$key.toNumber().inRange(dexapi.data.markets.hive.sells[0].rate, (dexapi.data.markets.hive.sells[0].rate*1.01)) == false">{{$key.toNumber().formatNumber(6,'.',',')}}</span> HIVE per DLUX</p>
                  <div class="card-deck bg-dark mx-0 my-2 p-2">
                    <div dmx-repeat:repeat3="$value">
                      <div class="card bg-darker ml-0" style="border: #8D04FF solid thin">
                        <div class="card-header text-right">
                          <div><small class="text-muted">FEE: {{feenai.nai()}}</small></div>
                        </div>
                        <div class="card-body text-right">
                          <div>{{amountnai.nai()}}</div>
                          <div>{{hivenai.nai()}}</div>
                        </div>
                        <div class="card-footer text-center">
                          <button class="btn btn-primary" id="buybutton1">Swap</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- data table -->
        <div class="tab-pane fade" id="table" role="tabpanel" aria-labelledby="table-tab">
          <div class="jumbotron bg-darker my-4 p-2">
            <div >
              <table class="table table-hover table-bordered table-dark table-striped text-white mb-0">
                <thead>
                  <tr>
                    <th scope="col" dmx-class:table-primary="orderbookview1.sort.on == 'rate'" > <div class="d-flex justify-content-between align-items-end flex-wrap">
                      <div class="d-flex flex-fill text-center">
                        <p class="mx-2 my-0 p-0 text-center align-self-center">RATE</p>
                      </div>
                      <div class="d-flex">
                        <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-light" dmx-on:click="orderbookview1.sort('rate','asc')" dmx-class:bg-primary="orderbookview1.sort.dir == 'asc' && orderbookview1.sort.on == 'rate'"><i class="fas fa-sort-amount-down-alt"></i></button>
                        <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-light" dmx-on:click="orderbookview1.sort('rate','desc')" dmx-class:bg-primary="orderbookview1.sort.dir == 'desc' && orderbookview1.sort.on == 'rate'"><i class="fas fa-sort-amount-down"></i></button>
                      </div>
                    </div>
                    </th>
                    <th scope="col" dmx-class:table-primary="orderbookview1.sort.on == 'amount'"> <div class="d-flex justify-content-between align-items-end flex-wrap">
                      <div class="d-flex flex-fill text-center">
                        <p class="mx-2 my-0 p-0 text-center align-self-center">DLUX</p>
                      </div>
                      <div class="d-flex">
                        <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-light"  dmx-on:click="orderbookview1.sort('amount','asc')" dmx-class:bg-primary="orderbookview1.sort.dir == 'asc' && orderbookview1.sort.on == 'amount'"><i class="fas fa-sort-amount-down-alt"></i></button>
                        <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-light" dmx-on:click="orderbookview1.sort('amount','desc')" dmx-class:bg-primary="orderbookview1.sort.dir == 'desc' && orderbookview1.sort.on == 'amount'"><i class="fas fa-sort-amount-down"></i></button>
                      </div>
                    </div></th>
                    <th scope="col" dmx-class:table-primary="orderbookview1.sort.on == 'hive'"> <div class="d-flex justify-content-between align-items-end flex-wrap">
                      <div class="d-flex flex-fill text-center">
                        <p class="mx-2 my-0 p-0 text-center align-self-center">HIVE</p>
                      </div>
                      <div class="d-flex">
                        <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-light" dmx-on:click="orderbookview1.sort('hive','asc')" dmx-class:bg-primary="orderbookview1.sort.dir == 'asc'  && orderbookview1.sort.on == 'hive'"><i class="fas fa-sort-amount-down-alt"></i></button>
                        <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-light" dmx-on:click="orderbookview1.sort('hive','desc')" dmx-class:bg-primary="orderbookview1.sort.dir == 'desc'  && orderbookview1.sort.on == 'hive'"><i class="fas fa-sort-amount-down"></i></button>
                      </div>
                    </div></th>
                  </tr>
                </thead>
                <tbody>
                  <tr dmx-repeat:hivesellsrepeat="orderbookview1.data" dmx-on:click="iterator1.select($index); orderbookview1Detail.select(txid)" dmx-class:table-primary="orderbookview1Detail.data.txid ==  txid" dmx-class:table-danger="rate.toNumber().inRange(dexapi.data.markets.hive.sells[0].rate, (dexapi.data.markets.hive.sells[0].rate*1.01)) ==  false" >
                    <td>{{rate.toNumber().formatNumber(3,'.',',')}}</td>
                    <td>{{amount}}</td>
                    <td>{{hive}}</td>
                  </tr>
                </tbody>
              </table>
              <div class="d-flex justify-content-between mt-2">
                <div><a class="btn btn-light" href="javascript:void(0);" dmx-on:click="orderbookview1.prev()" dmx-show="orderbookview1.has.prev"><i class="fa fa-angle-left"></i></a></div>
                <div class="align-self-center">
                  <p class="m-0 p-0">Page {{orderbookview1.page}} of {{orderbookview1.pages}}</p>
                </div>
                <div><a class="btn btn-light" href="javascript:void(0)" dmx-on:click="orderbookview1.next()" dmx-show="orderbookview1.has.next"><i class="fa fa-angle-right"></i></a></div>
              </div>
            </div>
          </div>
        </div>
        <!-- pagination -->
        <div class="d-flex card-footer mt-3">
          <div class="d-flex flex-fill justify-content-between align-items-center mt-2">
            <div class="col-1 m-0 p-0 text-left"><a class="btn btn-secondary" href="javascript:void(0);" dmx-on:click="orderbookview1.prev()" dmx-show="orderbookview1.has.prev"><i class="fa fa-angle-left"></i></a></div>
            <div class="d-flex">
              <p class="m-0 p-0 text-muted">Page {{orderbookview1.page}} of {{orderbookview1.pages}}</p>
            </div>
            <div class="col-1 m-0 p-0 text-right"><a class="btn btn-secondary" href="javascript:void(0)" dmx-on:click="orderbookview1.next()" dmx-show="orderbookview1.has.next"><i class="fa fa-angle-right"></i></a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
 
		  <!-- WIDGETS -->
	<div class="col-xl-3 col-lg-4 col-md-6 order-xl-first">
 		<!-- orderbook widget -->
        <div class="card bg-dark d-flex flex-column">
			<div class="card-header text-center">
			<small>ORDERBOOK</small>
			  </div>
			  <div class="card-body d-flex flex-column">
				  <!-- orderbook selector -->
			  	<select class="btn btn-secondary btn-lg flex-fill" id="orderbookselect1">
          			<option value="dexapi.data.markets.hive.sells">Swap HIVE to DLUX</option>
          			<option value="dexapi.data.markets.hbd.sells">Swap HBD to DLUX</option>
          			<option value="dexapi.data.markets.hive.buys">Swap DLUX to HIVE</option>
          			<option value="dexapi.data.markets.hbd.sells">Swap DLUX to HBD</option>
        		</select>
			<!-- orderbook stats from hidden math -->
			 <div class="d-flex card bg-none p-0 my-2">
          		<div class="d-flex flex-column card-header">
            <div class="d-flex justify-content-between lead">
              <div>Orders</div>
              <div>{{totalorders.value}}</div>
            </div>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div>Low Price</div>
              <div dmx-class:text-success="(minprice.value == minprice.value)"> {{lowprice.value}}</div>
            </div>
            <div class="d-flex justify-content-between">
              <div>Avg Price</div>
              <div dmx-class:text-success="(avgprice.value == minprice.value)" dmx-class:text-info="((avgprice.value <= maxprice.value) && (avgprice.value !== minprice.value))" dmx-class:text-warning="(avgprice.value > maxprice.value)"> {{avgprice.value}}</div>
            </div>
            <div class="d-flex justify-content-between">
              <div>Max Price</div>
              <div dmx-class:text-success="(maxprice.value == minprice.value)" dmx-class:text-info="(maxprice.value !== minprice.value)"> {{maxprice.value}}</div>
            </div>
            <div class="d-flex justify-content-between">
              <div>High Price</div>
              <div dmx-class:text-info"(highprice.value <= maxprice.value)" dmx-class:text-warning="(highprice.value > maxprice.value)">
                {{highprice.value}}</div>
            </div>
          </div>
          <div class="card-footer text-white-50">
            <div class="d-flex justify-content-between">
              <div>Total {{orderbookmath1.data[0].amountnai.token}}</div>
              <div>{{totalamount1.value}} {{orderbookmath1.data[0].amountnai.token}}</div>
            </div>
            <div class="d-flex justify-content-between">
              <div>Total {{orderbookmath1.data[0].hivenai.token}}</div>
              <div>{{totalamount2.value}} {{orderbookmath1.data[0].hivenai.token}}</div>
            </div>
			<div class="d-flex justify-content-between">
              <div>Total USD</div>
              <div>{{(totalamount2.value*hiveusd.value).formatCurrency()}} USD</div>
            </div>
          </div>
        </div>
			  </div>
			  <div class="card-footer">
			  	<div class="d-flex flex-wrap justify-content-around">
					
		    		<div class="border rounded mt-2 mx-1 px-2 py-1 text-center small" 
						 dmx-class:border-success="dexapi.data.behind < 30" 
						 dmx-class:text-success="dexapi.data.behind < 30"	
						 dmx-class:border-warning="dexapi.data.behind >= 30"
						 dmx-class:text-warning="dexapi.data.behind >= 30"
						 dmx-class:border-danger="dexapi.data.behind > 100"
						 dmx-class:text-danger="dexapi.data.behind > 100">  {{orderbookselect1.value}} - {{dexapi.data.behind}} blocks behind HIVE</div>
            		<div class="border border-info rounded mt-2 mx-1 px-2 py-1 text-info text-center small"> {{countenabledorders.value}} Enabled </div>
            		<div class="border border-warning rounded mt-2 mx-1 px-2 py-1 text-warning text-center small">{{countdisabledorders.value}} Disabled </div>
			  	</div>
			  </div>
		  </div>
		  
	  <!-- filter widget -->
        <div class="card bg-dark">
		 <div class="card-header text-center">
			<small>FILTER</small>
		</div>
		<div class="card-body d-flex flex-column">
			<!-- Fuzzy search -->
            <div class="input-group input-group-lg">
              <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-search"></i></span> </div>
              <input type="text" class="form-control" placeholder="Search" >
              <div class="input-group-append"> <span class="input-group-text">TXID</span> </div>
            </div>

			<!-- Range amount1 -->
			<div class="p-3"><div id="amountslider"></div></div>
          <div class="d-flex">
            <div class="form-group">
              <input type="" class="form-control text-center" id="amountmin" placeholder="MIN" dmx-bind:value="(orderbookmath1.data.min('amount')/1000).formatNumber('3','.',',')">
              <center>
                <label>MIN</label
              </center>
            </div>
            <div class="form-group">
              <input class="form-control text-center" type="" id="amountmax" placeholder="MAX" dmx-bind:value="(orderbookmath1.data.max('amount')/1000).formatNumber('3','.',',')">
              <center>
                <label>MAX</label>
              </center>
            </div>
          </div>
			<!-- Range amount2 -->
          <div class="flex-fill col-12 my-3" id="hiveslider"></div>
          <div class="d-flex">
            <div class="form-group">
              <input type="" class="form-control text-center" id="amountmin" placeholder="MIN" dmx-bind:value="(orderbookmath1.data.min('hive')/1000).formatNumber('3','.',',')">
              <center>
                <label>MIN</label
              </center>
            </div>
            <div class="form-group">
              <input class="form-control text-center" type="" id="amountmax" placeholder="MAX" dmx-bind:value="(orderbookmath1.data.max('hive')/1000).formatNumber('3','.',',')">
              <center>
                <label>MAX</label>
              </center>
            </div>
		  </div>
			<!-- Hide disabled orders -->
			<div class="input-group mb-3">
	          <div class="input-group-prepend">
	            <div class="input-group-text">
	              <input type="checkbox" aria-label="Hide disabled orders">
                </div>
              </div>
	          <input type="text" class="form-control" placeholder="Hide disabled orders">
          </div>	  
          </div>
		</div>
		  <div class="card-footer">
			  
          </div>
        </div>

			</div>
	</section>
  </main>
  <script src="/dlux-io/js/popper.min.js"></script>
  <script src="/dlux-io/js/bootstrap-4.4.1.js"></script>
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/footer.php";
include_once( $path );
?>
</div>
<script>
var slider = document.getElementById('amountslider');

noUiSlider.create(slider, {
    start: [0, 100],
    connect: true,
    range: {
        'min': 0,
        'max': 100
    }
});
var slider = document.getElementById('hiveslider');

noUiSlider.create(slider, {
    start: [0, 100],
    connect: true,
    range: {
        'min': 0,
        'max': 100
    }
});
</script>
</body>
</html>
