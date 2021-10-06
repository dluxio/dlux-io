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
		<div class="jumbotron bg-darker mt-0 mb-2">
			<h1>Data View</h1>
		<div id="dexSellOrdersTable">
			  <table class="table table-hover table-bordered table-dark table-striped text-white">
			  	<thead>
			  		<tr>
						<th scope="col" dmx-class:table-primary="dexSellOrders.sort.on == 'rate'" >
							<div class="d-flex align-items-end">
							<p class="m-0 p-0">RATE</p> 
							<span class="ml-4">
                  			<button title="Sort Ascending" type="button" class="btn btn-sm btn-light" dmx-on:click="dexSellOrders.sort('rate','asc')" dmx-class:bg-primary="dexSellOrders.sort.dir == 'asc' && dexSellOrders.sort.on == 'rate'"><i class="fas fa-sort-amount-down-alt"></i></button>
                  			<button title="Sort Descending" type="button" class="btn btn-sm btn-light" dmx-on:click="dexSellOrders.sort('rate','desc')" dmx-class:bg-primary="dexSellOrders.sort.dir == 'desc' && dexSellOrders.sort.on == 'rate'"><i class="fas fa-sort-amount-down"></i></button>
                			</span>
							</div>
						</th>
						<th scope="col" dmx-class:table-primary="dexSellOrders.sort.on == 'amount'">
							<div class="d-flex align-items-end">
							<p class="m-0 p-0">DLUX</p>
							<span class="ml-4">
                  			<button title="Sort Ascending" type="button" class="btn btn-sm btn-light"  dmx-on:click="dexSellOrders.sort('amount','asc')" dmx-class:bg-primary="dexSellOrders.sort.dir == 'asc' && dexSellOrders.sort.on == 'amount'"><i class="fas fa-sort-amount-down-alt"></i></button>
                  			<button title="Sort Descending" type="button" class="btn btn-sm btn-light" dmx-on:click="dexSellOrders.sort('amount','desc')" dmx-class:bg-primary="dexSellOrders.sort.dir == 'desc' && dexSellOrders.sort.on == 'amount'"><i class="fas fa-sort-amount-down"></i></button>
                			</span>
						</th>
                		<th scope="col" dmx-class:table-primary="dexSellOrders.sort.on == 'hive'">
							<div class="d-flex align-items-end">
							<p class="m-0 p-0">HIVE</p>
							<span class="ml-4">
                  			<button title="Sort Ascending" type="button" class="btn btn-sm btn-light" dmx-on:click="dexSellOrders.sort('hive','asc')" dmx-class:bg-primary="dexSellOrders.sort.dir == 'asc'  && dexSellOrders.sort.on == 'hive'"><i class="fas fa-sort-amount-down-alt"></i></button>
                  			<button title="Sort Descending" type="button" class="btn btn-sm btn-light" dmx-on:click="dexSellOrders.sort('hive','desc')" dmx-class:bg-primary="dexSellOrders.sort.dir == 'desc'  && dexSellOrders.sort.on == 'hive'"><i class="fas fa-sort-amount-down"></i></button>
               				</span>
						</th>
					</tr>
					
			  </thead>
			  <tbody>
			  	<tr dmx-repeat:repeat1="dexSellOrders.data" dmx-on:click="iteratedluxsellorders.select($index); dexSellOrdersDetail.select(txid)" dmx-class:table-primary="iteratedluxsellorders.value.txid ==  txid">
						<td>{{rate}}</td>
						<td>{{amount}}</td>
						<td>{{hive}}</td>
					</tr>
				  
			</tbody>
			</table> 
		</div>
			</div>
		<div class="jumbotron bg-darker mt-2 mb-0">
			<h1>Data Iterator</h1>
		<div id="dexSellOrdersIterate" class="d-flex justify-content-between align-items-center">
			<button class="btn btn-secondary" dmx-on:click="iteratedluxsellorders.prev()">&larr;</button>
			<dmx-data-iterator id="iteratedluxsellorders" dmx-bind:data="dexSellOrders.data" loop="true"><a href="#" dmx-on:click="dexSellOrdersDetail.select(value.txid)"><h3>{{index}} | {{value.amount}} DLUX | {{value.hive}} HIVE | {{value.rate}} RATE | {{value.fee}} FEE</h3>
				<h5 class="text-break">{{value.txid}}</h5></a></dmx-data-iterator>
			<button class="btn btn-secondary" dmx-on:click="iteratedluxsellorders.next()">&rarr;</button>
		</div>
		</div>
	  <div class="jumbotron bg-darker my-2">
			<h1>Data Detail</h1>
		<dmx-data-detail id="dexSellOrdersDetail" dmx-bind:data="dexSellOrders.data" key="txid">
			<h3>RATE&#58; {{dexSellOrdersDetail.data.rate}}</h3>
			<h3>DLUX&#58; {{dexSellOrdersDetail.data.amount}}</h3>
			<h3>HIVE&#58; {{dexSellOrdersDetail.data.hive}}</h3>
			<h3>FEE&#58; {{dexSellOrdersDetail.data.fee}}</h3>
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