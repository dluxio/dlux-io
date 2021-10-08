<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - ORDER BOOK</title>
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
<script src="/dlux-io/dmxAppConnect/dmxFormatter/dmxFormatter.js"></script>
	
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
<dmx-data-view id="hbdsellsview" dmx-bind:data="dexapi.data.markets.hbd.sells" pagesize="15"></dmx-data-view>
<dmx-data-view id="hbdbuysview" dmx-bind:data="dexapi.data.markets.hbd.buys" pagesize="15"></dmx-data-view>
<dmx-data-view id="hivesellsview" dmx-bind:data="dexapi.data.markets.hive.sells" pagesize="15"></dmx-data-view>
<dmx-data-view id="hivebuysview" dmx-bind:data="dexapi.data.markets.hive.buys" pagesize="15"></dmx-data-view>
<main role="main" class="flex-shrink-0">
  <section class="content">
    <div class="container">
		<!-- BUY DLUX -->
      <div class="jumbotron bg-dark my-4 p-2">
        <h1 class="text-center">BUY DLUX &#40;SELL HIVE&#41;</h1>
		  <div class="jumbotron bg-darker my-4 p-2">
          <h1>Data Repeat Group By &#40;Rate&#41;</h1>
          <div>
		  	  <div dmx-repeat:repeat1="hivesellsview.data.groupBy('rate')">
				  <div>
					<p class="lead mt-3 mb-1 p-2"><small><b>RATE&#58;</b></small> <span dmx-class:text-success="dexapi.data.markets.hive.sells[0].rate == $key" dmx-class:text-danger="$key.toNumber().inRange(dexapi.data.markets.hive.sells[0].rate, (dexapi.data.markets.hive.sells[0].rate*1.01)) ==  false">{{$key}}</span></p>
					
					 <div class="card-deck bg-dark mx-0 my-2 p-2">
                			<div dmx-repeat:repeat3="$value">
								 <div class="card bg-darker ml-0">
								<div class="card-body">
								<div>{{amount.nai()}}</div>
                  				<div>{{hive.nai())}}</div>
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
                  <th scope="col" dmx-class:table-primary="hivesellsview.sort.on == 'hive.rate'" > <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <div class="d-flex flex-fill text-center">
                      <p class="mx-2 my-0 p-0 text-center align-self-center">RATE</p>
                    </div>
                    <div class="d-flex">
                      <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-light" dmx-on:click="hivesellsview.sort('value.rate','asc')" dmx-class:bg-primary="hivesellsview.sort.dir == 'asc' && hivesellsview.sort.on == 'rate'"><i class="fas fa-sort-amount-down-alt"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-light" dmx-on:click="hivesellsview.sort('rate','desc')" dmx-class:bg-primary="hivesellsview.sort.dir == 'desc' && hivesellsview.sort.on == 'rate'"><i class="fas fa-sort-amount-down"></i></button>
                    </div>
                  </div>
                  </th>
                  <th scope="col" dmx-class:table-primary="hivesellsview.sort.on == 'amount'"> <div class="d-flex justify-content-between align-items-end flex-wrap">
                    <div class="d-flex flex-fill text-center">
                      <p class="mx-2 my-0 p-0 text-center align-self-center">DLUX</p>
                    </div>
                    <div class="d-flex">
                      <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-light"  dmx-on:click="hivesellsview.sort('amount.price()','asc')" dmx-class:bg-primary="hivesellsview.sort.dir == 'asc' && hivesellsview.sort.on == 'amount'"><i class="fas fa-sort-amount-down-alt"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-light" dmx-on:click="hivesellsview.sort('amount.price()','desc')" dmx-class:bg-primary="hivesellsview.sort.dir == 'desc' && hivesellsview.sort.on == 'amount'"><i class="fas fa-sort-amount-down"></i></button>
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
                  <td>{{rate}}</td>
                  <td>{{amount.nai()}}</td>
                  <td>{{hive.amount.nai())}}</td>
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
</body>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/footer.php";
   include_once($path);
?>
</body>
</html>
