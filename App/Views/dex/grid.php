<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - ORDER BOOK</title>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/header.php";
   include_once($path);
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.4.0/nouislider.min.js" integrity="sha512-mZXUH8DAODwCHioWP3gltQwa953LbABMlzTYwYkKqv8eNxOk37B1HgNNuCMfFxgrpW5C34WJbxPDcM58+s1dJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.4.0/nouislider.css" integrity="sha512-DGB74Gyw93qON+V0QxSRs1er6sqoPyFoy23HBL5LN7MRJBcjeCU22zega+vOEGE0XQLoVrv4ExcaesSTwZQA2w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/nav.php";
   include_once($path);
?>
<dmx-api-datasource id="dexapi" is="dmx-fetch" url="https://token.dlux.io/dex/"></dmx-api-datasource>
<dmx-data-view id="hbdsellsview" dmx-bind:data="dexapi.data.markets.hbd.sells" filter="" sorton="" sortdir="" pagesize=""></dmx-data-view>
<dmx-data-view id="hbdbuysview" dmx-bind:data="dexapi.data.markets.hbd.buys" filter="(amount >= 100000) && (amount <= 900000)"></dmx-data-view>
<dmx-data-view id="hivesellsview" dmx-bind:data="dexapi.data.markets.hive.sells" ></dmx-data-view>
<dmx-data-view id="hivesellsviewamount" dmx-bind:data="dexapi.data.markets.hive.sells" sorton="amount"></dmx-data-view>
<dmx-data-view id="hivesellsviewhive" dmx-bind:data="dexapi.data.markets.hive.sells" sorton="hive" ></dmx-data-view>
<dmx-data-view id="hivebuysview" dmx-bind:data="dexapi.data.markets.hive.buys" pagesize="15"></dmx-data-view>
<main role="main" class="flex-shrink-0">
  <section class="content">
    <div class="container">
		<!-- BUY DLUX -->
      <div class="jumbotron bg-dark my-4 p-2 text-center">
        <h1>BUY DLUX</h1>

	    <div class="d-flex flex-column justify-content-between align-items-center">
		 <div class="col-12 mx-2">
	    <div class="d-flex justify-content-between align-items-center">
			  <input class="form-control col-2 text-center" type="" id="amountmin" placeholder="MIN" dmx-bind:value="hivesellsviewamount.data[0].amountnai.nai()"></input>
		  	  <div class="flex-fill col-6" id="amountslider"></div>
		  	  <input class="form-control col-2 text-center" type="" id="amountmax" placeholder="MAX" dmx-bind:value="hivesellsviewamount.data[hivesellsviewamount.data.length -1].amountnai.nai()"></input>

        </div>
	  <div class="d-flex justify-content-between align-items-center">
			  <input class="form-control col-2 text-center" type="" id="hivemin" placeholder="MIN" dmx-bind:value="hivesellsviewhive.data[0].hivenai.nai()"></input>
		  	  <div class="flex-fill col-6" id="hiveslider"></div>
		  	  <input class="form-control col-2 text-center" type="" id="hivemax" placeholder="MAX" dmx-bind:value="hivesellsviewhive.data[hivesellsviewhive.data.length -1].hivenai.nai()"></input>
		</div>
	</div>

<div class="d-flex flex-fill text-center">

			<div class="flex-column">
				<h6 class="dropdown-header text-center border-bottom" dmx-class:text-primary="hivesellsview.sort.on == 'amount'">DLUX</h6>
				<div class="d-flex text-center border">
					<a class="dropdown-item text-white-50" href="#" dmx-on:click="hivesellsview.sort('amount','asc')" dmx-class:active="hivesellsview.sort.on == 'amount' && hivesellsview.sort.dir == 'asc'"><i class="fas fa-sort-amount-up"></i></a>
					<a class="dropdown-item text-white-50" href="#" dmx-on:click="hivesellsview.sort('amount','desc')" dmx-class:active="hivesellsview.sort.on == 'amount' && hivesellsview.sort.dir == 'desc'"><i class="fas fa-sort-amount-down"></i></a>
				</div>
			</div>
			<div class="flex-column ">
				<h6 class="dropdown-header text-center border-bottom" dmx-class:text-primary="hivesellsview.sort.on == 'hive'">HIVE</h6>
				<div class="d-flex text-center border">
					<a class="dropdown-item text-white-50" href="#" dmx-on:click="hivesellsview.sort('hive','asc')" dmx-class:active="hivesellsview.sort.on == 'hive' && hivesellsview.sort.dir == 'asc'"> <i class="fas fa-sort-amount-up"></i></a>
					<a class="dropdown-item text-white-50" href="#" dmx-on:click="hivesellsview.sort('hive','desc')" dmx-class:active="hivesellsview.sort.on == 'hive' && hivesellsview.sort.dir == 'desc'"> <i class="fas fa-sort-amount-down"></i></a> 
				</div>
			</div>
			<div class="flex-column">
				<h6 class="dropdown-header text-center border-bottom" dmx-class:text-primary="hivesellsview.sort.on == 'rate'">RATE</h6>
				<div class="d-flex text-center border">
	      			<a class="dropdown-item text-white-50" href="#" dmx-on:click="hivesellsview.sort('rate','asc')" dmx-class:active="hivesellsview.sort.on == 'rate' && hivesellsview.sort.dir == 'asc'"> <i class="fas fa-sort-amount-up"></i></a>
					<a class="dropdown-item text-white-50" href="#" dmx-on:click="hivesellsview.sort('rate','desc')" dmx-class:active="hivesellsview.sort.on == 'rate' && hivesellsview.sort.dir == 'desc'"> <i class="fas fa-sort-amount-down"></i></a>
				</div>
			</div>

	
  <div class="btn-group d-none" role="group" aria-label="Button group with nested dropdown">
		  <button type="button" class="btn btn-secondary">Filter</button>
		  <div class="btn-group" role="group">
		    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Sort By &#124; Direction</button>
		    <div class="dropdown-menu dropdown-menu-right ">
				<h6 class="dropdown-header text-center">DLUX</h6>
				<div class="d-flex text-center">
				<a class="dropdown-item" href="#" dmx-on:click="hivesellsview.sort('amount','asc')" dmx-class:active="hivesellsview.sort.on == 'amount' && hivesellsview.sort.dir == 'asc'"><i class="fas fa-sort-amount-down-alt"></i></a>
				<a class="dropdown-item" href="#" dmx-on:click="hivesellsview.sort('amount','desc')" dmx-class:active="hivesellsview.sort.on == 'amount' && hivesellsview.sort.dir == 'desc'"><i class="fas fa-sort-amount-down"></i></a>
				</div>
				<div class="dropdown-divider"></div>
				<h6 class="dropdown-header text-center">HIVE</h6>
				<div class="d-flex text-center">
				<a class="dropdown-item" href="#" dmx-on:click="hivesellsview.sort('hive','asc')" dmx-class:active="hivesellsview.sort.on == 'hive' && hivesellsview.sort.dir == 'asc'"> <i class="fas fa-sort-amount-down-alt"></i></a>
				<a class="dropdown-item" href="#" dmx-on:click="hivesellsview.sort('hive','desc')" dmx-class:active="hivesellsview.sort.on == 'hive' && hivesellsview.sort.dir == 'desc'"> <i class="fas fa-sort-amount-down"></i></a> 
				</div>
				<div class="dropdown-divider"></div>
				<h6 class="dropdown-header text-center">RATE</h6>
				<div class="d-flex text-center">
	      		<a class="dropdown-item" href="#" dmx-on:click="hivesellsview.sort('rate','asc')" dmx-class:active="hivesellsview.sort.on == 'rate' && hivesellsview.sort.dir == 'asc'"> <i class="fas fa-sort-amount-down-alt"></i></a>
				<a class="dropdown-item" href="#" dmx-on:click="hivesellsview.sort('rate','desc')" dmx-class:active="hivesellsview.sort.on == 'rate' && hivesellsview.sort.dir == 'desc'"> <i class="fas fa-sort-amount-down"></i></a>
				</div>
			 </div>
	 		 </div>
		    </div>
	
		  </div>
		
    </div>
	
	    
		

<div class="jumbotron  bg-darker my-4 p-2">
	      <h1>Data Repeat Card Deck</h1>
		  <div class="card-deck m-2">
			  	<div dmx-repeat:repeat4="hivesellsview.data">
				  <div class="card bg-darker border-primary ml-0 my-1">
					<div class="card-header text-right">
						<div><small class="text-muted">FEE: {{feenai.nai()}}</small></div>
					</div>
				  <div class="card-body text-right">
					<div>{{amountnai.nai()}}</div>
					<div>{{hivenai.nai()}}</div>					
				  </div>
				  <div class="card-footer text-center">			 
					<button class="btn btn-primary">Swap</button>
				  </div>
				 </div>
				</div>
		  </div>
	    </div>
		  <div class="jumbotron bg-darker my-4 p-2">
          <h1>Data Repeat Group By &#40;Rate&#41;</h1>
          <div>			  
		  	  <div dmx-repeat:repeat1="hivesellsview.data.groupBy('rate')">
				  <div>
					<p class="lead mt-3 mb-1 p-2"><small><b>EXCHANGE RATE {{$index + 1}}</b></small> &#124; <span dmx-class:text-success="dexapi.data.markets.hive.sells[0].rate == $key" dmx-class:text-warning="$key.toNumber().inRange(dexapi.data.markets.hive.sells[0].rate, (dexapi.data.markets.hive.sells[0].rate*1.01)) == true && dexapi.data.markets.hive.sells[0].rate !== $key" dmx-class:text-danger="$key.toNumber().inRange(dexapi.data.markets.hive.sells[0].rate, (dexapi.data.markets.hive.sells[0].rate*1.01)) == false">{{$key.toNumber().formatNumber(6,'.',',')}}</span> HIVE per DLUX</p>
					
					 <div class="card-deck bg-dark mx-0 my-2 p-2">
                			<div dmx-repeat:repeat3="$value">
							  <div class="card bg-darker border-primary ml-0">
									 <div class="card-header text-right">
									 	<div><small class="text-muted">FEE: {{feenai.nai()}}</small></div>
									 </div>
							    <div class="card-body text-right">
										 <div>{{amountnai.nai()}}</div>
										<div>{{hivenai.nai()}}</div>
										
								</div>
								<div class="card-footer text-center">
										 
										<button class="btn btn-primary">Swap</button>
							    </div>
								
								
								
							</div>
						 </div>
					</div>
				</div>
			</div>
		    </div>
	    </div>
			
        <div class="jumbotron bg-darker my-4 p-2">
          <h1>Data Repeat Table</h1>
          <div >
            <table class="table table-hover table-bordered table-dark table-striped text-white mb-0">
              <thead>
                <tr>
                  <th scope="col" dmx-class:table-primary="hivesellsview.sort.on == 'rate'" > <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <div class="d-flex flex-fill text-center">
                      <p class="mx-2 my-0 p-0 text-center align-self-center">RATE</p>
                    </div>
                    <div class="d-flex">
                      <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-light" dmx-on:click="hivesellsview.sort('rate','asc')" dmx-class:bg-primary="hivesellsview.sort.dir == 'asc' && hivesellsview.sort.on == 'rate'"><i class="fas fa-sort-amount-down-alt"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-light" dmx-on:click="hivesellsview.sort('rate','desc')" dmx-class:bg-primary="hivesellsview.sort.dir == 'desc' && hivesellsview.sort.on == 'rate'"><i class="fas fa-sort-amount-down"></i></button>
                    </div>
                  </div>
                  </th>
                  <th scope="col" dmx-class:table-primary="hivesellsview.sort.on == 'amount'"> <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <div class="d-flex flex-fill text-center">
                      <p class="mx-2 my-0 p-0 text-center align-self-center">DLUX</p>
                    </div>
                    <div class="d-flex">
                      <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-light"  dmx-on:click="hivesellsview.sort('amount','asc')" dmx-class:bg-primary="hivesellsview.sort.dir == 'asc' && hivesellsview.sort.on == 'amount'"><i class="fas fa-sort-amount-down-alt"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-light" dmx-on:click="hivesellsview.sort('amount','desc')" dmx-class:bg-primary="hivesellsview.sort.dir == 'desc' && hivesellsview.sort.on == 'amount'"><i class="fas fa-sort-amount-down"></i></button>
                    </div>
                  </div></th>
                  <th scope="col" dmx-class:table-primary="hivesellsview.sort.on == 'hive'"> <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <div class="d-flex flex-fill text-center">
                      <p class="mx-2 my-0 p-0 text-center align-self-center">HIVE</p>
                    </div>
                    <div class="d-flex">
                      <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-light" dmx-on:click="hivesellsview.sort('hive','asc')" dmx-class:bg-primary="hivesellsview.sort.dir == 'asc'  && hivesellsview.sort.on == 'hive'"><i class="fas fa-sort-amount-down-alt"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-light" dmx-on:click="hivesellsview.sort('hive','desc')" dmx-class:bg-primary="hivesellsview.sort.dir == 'desc'  && hivesellsview.sort.on == 'hive'"><i class="fas fa-sort-amount-down"></i></button>
                    </div>
                  </div></th>
                </tr>
              </thead>
              <tbody>
                <tr dmx-repeat:hivesellsrepeat="hivesellsview.data" dmx-on:click="iteratedluxsellorders.select($index); hivesellsviewDetail.select(txid)" dmx-class:table-primary="hivesellsviewDetail.data.txid ==  txid" dmx-class:table-danger="rate.toNumber().inRange(dexapi.data.markets.hive.sells[0].rate, (dexapi.data.markets.hive.sells[0].rate*1.01)) ==  false" >
                  <td>{{rate.toNumber().formatNumber(3,'.',',')}}</td>
                  <td>{{amount}}</td>
                  <td>{{hive}}</td>
                </tr>
              </tbody>
            </table>
            <div class="d-flex justify-content-between mt-2">
              <div><a class="btn btn-light" href="javascript:void(0);" dmx-on:click="hivesellsview.prev()" dmx-show="hivesellsview.has.prev"><i class="fa fa-angle-left"></i></a></div>
              <div class="align-self-center">
                <p class="m-0 p-0">Page {{hivesellsview.page}} of {{hivesellsview.pages}}</p>
              </div>
              <div><a class="btn btn-light" href="javascript:void(0)" dmx-on:click="hivesellsview.next()" dmx-show="hivesellsview.has.next"><i class="fa fa-angle-right"></i></a></div>
            </div>
          </div>
        </div>
        <div class="jumbotron bg-darker my-4">
          <h1>Data Iterator</h1>
          <div id="hivesellsviewIterate" class="d-flex justify-content-between align-items-center">
            <button class="btn btn-primary" dmx-on:click="iteratedluxsellorders.prev()">&larr;</button>
            <dmx-data-iterator id="iteratedluxsellorders" dmx-bind:data="hivesellsview.data" loop="true"><a href="#" dmx-on:click="hivesellsviewDetail.select(value.txid)">
              <h3 class="mx-2">{{index}} | {{value.amount.nai()}} DLUX | {{value.hive.nai()}} HIVE | {{value.rate}} RATE | {{value.fee.nai()}} FEE</h3>
              <h5 class="text-break mx-2">{{value.txid}}</h5>
            </a></dmx-data-iterator>
            <button class="btn btn-primary" dmx-on:click="iteratedluxsellorders.next()">&rarr;</button>
          </div>
        </div>
        <div class="jumbotron bg-darker my-4">
          <h1>Data Detail</h1>
          <dmx-data-detail id="hivesellsviewDetail" dmx-bind:data="hivesellsview.data" key="txid" >
            <h3>RATE&#58; {{hivesellsviewDetail.data.rate}}</h3>
            <h3>DLUX&#58; {{hivesellsviewDetail.data.amount.nai()}}</h3>
            <h3>HIVE&#58; {{hivesellsviewDetail.data.hive.nai()}}</h3>
            <h3>FEE&#58; {{hivesellsviewDetail.data.fee.nai()}}</h3>
            <small class="text-break text-muted">TXID&#58; {{hivesellsviewDetail.data.txid}}</small> </dmx-data-detail>
        </div>
      </div>
		
		<!-- SELL DLUX -->
      <div class="jumbotron bg-dark my-4 p-2 d-none">
        <h1 class="text-center">SELL DLUX &#40;BUY HIVE&#41;</h1>
        <div class="jumbotron bg-darker my-4 p-2">
          <h1>Sell Repeat</h1>
          <div>
            <table class="table table-hover table-bordered table-dark table-striped text-white mb-0">
              <thead>
                <tr>
                  <th scope="col" dmx-class:table-primary="hivebuysview.sort.on == 'rate'" > <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <div class="d-flex flex-fill text-center">
                      <p class="mx-2 my-0 p-0 text-center align-self-center">RATE</p>
                    </div>
                    <div class="d-flex">
                      <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-light" dmx-on:click="hivebuysview.sort('rate','asc')" dmx-class:bg-primary="hivebuysview.sort.dir == 'asc' && hivebuysview.sort.on == 'rate'"><i class="fas fa-sort-amount-down-alt"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-light" dmx-on:click="hivebuysview.sort('rate','desc')" dmx-class:bg-primary="hivebuysview.sort.dir == 'desc' && hivebuysview.sort.on == 'rate'"><i class="fas fa-sort-amount-down"></i></button>
                    </div>
                  </div>
                  </th>
                  <th scope="col" dmx-class:table-primary="hivebuysview.sort.on == 'amount'"> <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <div class="d-flex flex-fill text-center">
                      <p class="mx-2 my-0 p-0 text-center align-self-center">DLUX</p>
                    </div>
                    <div class="d-flex">
                      <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-light"  dmx-on:click="hivebuysview.sort('amount','asc')" dmx-class:bg-primary="hivebuysview.sort.dir == 'asc' && hivebuysview.sort.on == 'amount'"><i class="fas fa-sort-amount-down-alt"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-light" dmx-on:click="hivebuysview.sort('amount','desc')" dmx-class:bg-primary="hivebuysview.sort.dir == 'desc' && hivebuysview.sort.on == 'amount'"><i class="fas fa-sort-amount-down"></i></button>
                    </div>
                  </div></th>
                  <th scope="col" dmx-class:table-primary="hivebuyview.sort.on == 'hive'"> <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <div class="d-flex flex-fill text-center">
                      <p class="mx-2 my-0 p-0 text-center align-self-center">HIVE</p>
                    </div>
                    <div class="d-flex">
                      <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-light" dmx-on:click="hivebuysview.sort('hive','asc')" dmx-class:bg-primary="hivebuysview.sort.dir == 'asc'  && hivebuysview.sort.on == 'hive'"><i class="fas fa-sort-amount-down-alt"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-light" dmx-on:click="hivebuysview.sort('hive','desc')" dmx-class:bg-primary="hivebuysview.sort.dir == 'desc'  && hivebuysview.sort.on == 'hive'"><i class="fas fa-sort-amount-down"></i></button>
                    </div>
                  </div></th>
                </tr>
              </thead>
              <tbody>
                <tr dmx-repeat:repeat2="hivebuysview.data" dmx-on:click="iteratedluxsellorders.select($index); hivebuysviewDetail.select(txid)" dmx-class:table-primary="hivebuysviewDetail.data.txid ==  txid" dmx-class:table-danger="rate.toNumber().inRange(dexapi.data.markets.hive.buys[dexapi.data.markets.hive.buys.length -1].rate, (dexapi.data.markets.hive.buys[dexapi.data.markets.hive.buys.length -1].rate*0.99)) ==  false" >
                  <td>{{rate}}</td>
                  <td>{{amount.nai()}}</td>
                  <td>{{hive.nai()}}</td>
                </tr>
              </tbody>
            </table>
            <div class="d-flex justify-content-between mt-2">
              <div><a class="btn btn-light" href="javascript:void(0);" dmx-on:click="hivebuysview.prev()" dmx-show="hivebuysview.has.prev"><i class="fa fa-angle-left"></i></a></div>
              <div class="align-self-center">
                <p class="m-0 p-0">Page {{hivebuysview.page}} of {{hivebuysview.pages}}</p>
              </div>
              <div><a class="btn btn-light" href="javascript:void(0)" dmx-on:click="hivebuysview.next()" dmx-show="hivebuysview.has.next"><i class="fa fa-angle-right"></i></a></div>
            </div>
          </div>
        </div>
        <div class="jumbotron bg-darker my-4">
          <h1>Sell Iterator</h1>
          <div  class="d-flex justify-content-between align-items-center">
            <button class="btn btn-primary" dmx-on:click="iteratedluxsellorders.prev()">&larr;</button>
            <dmx-data-iterator id="iteratedluxsellorders" dmx-bind:data="hivebuysview.data" loop="true"><a href="#" dmx-on:click="hivebuysviewDetail.select(value.txid)">
              <h3 class="mx-2">{{index}} | {{value.amount.nai()}} DLUX | {{value.hive.nai()}} HIVE | {{value.rate}} RATE | {{value.fee.nai()}} FEE</h3>
              <h5 class="text-break mx-2">{{value.txid}}</h5>
            </a></dmx-data-iterator>
            <button class="btn btn-primary" dmx-on:click="iteratedluxsellorders.next()">&rarr;</button>
          </div>
        </div>
        <div class="jumbotron bg-darker my-4">
          <h1>Sell Detail</h1>
          <dmx-data-detail id="hivebuysviewDetail" dmx-bind:data="hivebuysview.data" key="txid" >
            <h3>RATE&#58; {{hivebuysviewDetail.data.rate}}</h3>
            <h3>DLUX&#58; {{hivebuysviewDetail.data.amount.nai()}}</h3>
            <h3>HIVE&#58; {{hivebuysviewDetail.data.hive.nai()}}</h3>
            <h3>FEE&#58; {{hivebuysviewDetail.data.fee.nai()}}</h3>
            <small class="text-break text-muted">TXID&#58; {{hivebuysviewDetail.data.txid}}</small> </dmx-data-detail>
        </div>
      </div>
    </div>
  </section>
</main>
<script src="/dlux-io/js/jquery-3.4.1.min.js"></script>
<script src="/dlux-io/js/popper.min.js"></script>
<script src="/dlux-io/js/bootstrap-4.4.1.js"></script>
</body>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/footer.php";
   include_once($path);
?>
</body>
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
</html>
