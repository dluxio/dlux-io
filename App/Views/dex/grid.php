<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<title>Order Book</title>

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
</head>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/nav.php";
   include_once($path);
?>
<body is="dmx-app" class="d-flex flex-column h-100 padme-t70 text-white ">
<dmx-api-datasource id="api1" is="dmx-fetch" url="https://token.dlux.io/dex/"></dmx-api-datasource>
<dmx-data-view id="dexSellOrders" dmx-bind:data="api1.data.markets.hive.sells" pagesize="15"></dmx-data-view>
	
<main role="main" class="flex-shrink-0">
<section class="content">
  <div class="container">
  <div class="jumbotron bg-dark my-4 p-2">
	  <h1 class="text-center">Data View &#40;Pagination&#41;</h1>
		<div class="jumbotron bg-darker my-4 p-2">
			<h1>Data Repeat</h1>
		<div id="dexSellOrdersTable ">
			  <table class="table table-hover table-bordered table-dark table-striped text-white mb-0">
			  	<thead>
			  		<tr>
						<th scope="col" dmx-class:table-primary="dexSellOrders.sort.on == 'rate'" >
							<div class="d-flex justify-content-between align-items-end flex-wrap">
							<div class="d-flex flex-fill text-center"><p class="mx-2 my-0 p-0 text-center align-self-center">RATE</p></div>
							<div class="d-flex">
                  			<button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-light" dmx-on:click="dexSellOrders.sort('rate','asc')" dmx-class:bg-primary="dexSellOrders.sort.dir == 'asc' && dexSellOrders.sort.on == 'rate'"><i class="fas fa-sort-amount-down-alt"></i></button>
                  			<button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-light" dmx-on:click="dexSellOrders.sort('rate','desc')" dmx-class:bg-primary="dexSellOrders.sort.dir == 'desc' && dexSellOrders.sort.on == 'rate'"><i class="fas fa-sort-amount-down"></i></button>
                			</div>
							</div>
						</th>
						<th scope="col" dmx-class:table-primary="dexSellOrders.sort.on == 'amount'">
							<div class="d-flex justify-content-between align-items-end flex-wrap">
							<div class="d-flex flex-fill text-center"><p class="mx-2 my-0 p-0 text-center align-self-center">DLUX</p></div>
							<div class="d-flex">
                  			<button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-light"  dmx-on:click="dexSellOrders.sort('amount','asc')" dmx-class:bg-primary="dexSellOrders.sort.dir == 'asc' && dexSellOrders.sort.on == 'amount'"><i class="fas fa-sort-amount-down-alt"></i></button>
                  			<button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-light" dmx-on:click="dexSellOrders.sort('amount','desc')" dmx-class:bg-primary="dexSellOrders.sort.dir == 'desc' && dexSellOrders.sort.on == 'amount'"><i class="fas fa-sort-amount-down"></i></button>
                			</div>
						</th>
                		<th scope="col" dmx-class:table-primary="dexSellOrders.sort.on == 'hive'">
							<div class="d-flex justify-content-between align-items-end flex-wrap">
							<div class="d-flex flex-fill text-center"><p class="mx-2 my-0 p-0 text-center align-self-center">HIVE</p></div>
							<div class="d-flex">
                  			<button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-light" dmx-on:click="dexSellOrders.sort('hive','asc')" dmx-class:bg-primary="dexSellOrders.sort.dir == 'asc'  && dexSellOrders.sort.on == 'hive'"><i class="fas fa-sort-amount-down-alt"></i></button>
                  			<button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-light" dmx-on:click="dexSellOrders.sort('hive','desc')" dmx-class:bg-primary="dexSellOrders.sort.dir == 'desc'  && dexSellOrders.sort.on == 'hive'"><i class="fas fa-sort-amount-down"></i></button>
               				</div>
						</th>
					</tr>
					
			  </thead>
			  <tbody>
			  	<tr dmx-repeat:repeat1="dexSellOrders.data" dmx-on:click="iteratedluxsellorders.select($index); dexSellOrdersDetail.select(txid)" dmx-class:table-primary="dexSellOrdersDetail.data.txid ==  txid">
						<td>{{rate}}</td>
						<td>{{amount.nai()}}</td>
						<td>{{hive.nai()}}</td>
					</tr>
				  
			</tbody>
			</table>
			<div class="d-flex justify-content-between mt-2">
           		<div><a class="btn btn-light" href="javascript:void(0);" dmx-on:click="dexSellOrders.prev()" dmx-show="dexSellOrders.has.prev"><i class="fa fa-angle-left"></i></a></div>
           		<div class="align-self-center"><p class="m-0 p-0">Page {{dexSellOrders.page}} of {{dexSellOrders.pages}}</p></div>
           		<div><a class="btn btn-light" href="javascript:void(0)" dmx-on:click="dexSellOrders.next()" dmx-show="dexSellOrders.has.next"><i class="fa fa-angle-right"></i></a></div>
         </div>
		</div>
			</div>
		<div class="jumbotron bg-darker my-4">
			<h1>Data Iterator</h1>
		<div id="dexSellOrdersIterate" class="d-flex justify-content-between align-items-center">
			<button class="btn btn-primary" dmx-on:click="iteratedluxsellorders.prev()">&larr;</button>
			<dmx-data-iterator id="iteratedluxsellorders" dmx-bind:data="dexSellOrders.data" loop="true"><a href="#" dmx-on:click="dexSellOrdersDetail.select(value.txid)"><h3 class="mx-2">{{index}} | {{value.amount.nai()}} DLUX | {{value.hive.nai()}} HIVE | {{value.rate}} RATE | {{value.fee.nai()}} FEE</h3>
				<h5 class="text-break mx-2">{{value.txid}}</h5></a></dmx-data-iterator>
			<button class="btn btn-primary" dmx-on:click="iteratedluxsellorders.next()">&rarr;</button>
		</div>
		</div>
	  <div class="jumbotron bg-darker my-4">
			<h1>Data Detail</h1>
		<dmx-data-detail id="dexSellOrdersDetail" dmx-bind:data="dexSellOrders.data" key="txid" >
			<h3>RATE&#58; {{dexSellOrdersDetail.data.rate}}</h3>
			<h3>DLUX&#58; {{dexSellOrdersDetail.data.amount.nai()}}</h3>
			<h3>HIVE&#58; {{dexSellOrdersDetail.data.hive.nai()}}</h3>
			<h3>FEE&#58; {{dexSellOrdersDetail.data.fee.nai()}}</h3>
		 <small class="text-break text-muted">TXID&#58; {{dexSellOrdersDetail.data.txid}}</small>
        </dmx-data-detail>
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
?></html>