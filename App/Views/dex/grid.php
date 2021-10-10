<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - ORDER BOOK</title>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/header.php";
   include_once($path);
?>
<script src="/dmxAppConnect/dmxAppConnect.js"></script>
<script src="/js/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.4.0/nouislider.min.js" integrity="sha512-mZXUH8DAODwCHioWP3gltQwa953LbABMlzTYwYkKqv8eNxOk37B1HgNNuCMfFxgrpW5C34WJbxPDcM58+s1dJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.4.0/nouislider.css" integrity="sha512-DGB74Gyw93qON+V0QxSRs1er6sqoPyFoy23HBL5LN7MRJBcjeCU22zega+vOEGE0XQLoVrv4ExcaesSTwZQA2w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--dmx App Connect-->
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
<dmx-data-view id="hivesellsview" dmx-bind:data="dexapi.data.markets.hive.sells" pagesize="15"></dmx-data-view>
<dmx-data-view id="hivebuysview" dmx-bind:data="dexapi.data.markets.hive.buys" pagesize="15"></dmx-data-view>
<main role="main" class="flex-shrink-0">
  <section class="content">
    <div class="row">
		<!-- WIDGETS -->
  <div class="col-xl-3 mt-4 col-lg-6">
	  <div class="jumbotron bg-darker mx-2">
	    <div class="d-flex flex-column justify-content-between align-items-center">
			<!-- data filters -->
			<div class="d-flex flex-column">
			<h3 class="text-center">Filter Orders</h3>
			<div class="flex-fill col-12 my-3" id="amountslider"></div>  
			<div class="d-flex">
				<div class="form-group"><input type="" class="form-control text-center" id="amountmin" placeholder="MIN" dmx-bind:value="(dexapi.data.markets.hive.sells.min('amount')/1000).formatNumber('3','.',',')"></input><center><label>MIN DLUX</label</center></div>
		  		<div class="form-group"><input class="form-control text-center" type="" id="amountmax" placeholder="MAX" dmx-bind:value="(dexapi.data.markets.hive.sells.max('amount')/1000).formatNumber('3','.',',')"></input><center><label>MAX DLUX</label></center></div>
	  		</div>
			<div class="flex-fill col-12 my-3" id="hiveslider"></div>
        	<div class="d-flex">
				<div class="form-group"><input type="" class="form-control text-center" id="amountmin" placeholder="MIN" dmx-bind:value="(dexapi.data.markets.hive.sells.min('hive')/1000).formatNumber('3','.',',')"></input><center><label>MIN HIVE</label</center></div>
		  		<div class="form-group"><input class="form-control text-center" type="" id="amountmax" placeholder="MAX" dmx-bind:value="(dexapi.data.markets.hive.sells.max('hive')/1000).formatNumber('3','.',',')"></input><center><label>MAX HIVE</label></center></div>
	  		</div>
			</div>
			<!-- data stats -->
			<div class="d-flex card bg-none p-0 flex-column col-12">
				<div class="d-flex card-header justify-content-between lead"><div>Orders</div><div>{{hivesellsview.items}}</div></div>
			  <div class="card-body">
				<div class="d-flex justify-content-between"><div>Low Price</div><div class="text-success">{{hivesellsview.data.min('rate').formatNumber('6','.',',')}}</div></div>
				<div class="d-flex justify-content-between"><div>Avg Price</div><div>{{(hivesellsview.data.sum('hive')/hivesellsview.data.sum('amount')).formatNumber('6','.',',')}}</div></div>
				<div class="d-flex justify-content-between"><div>Max Price</div><div class="text-info">{{(hivesellsview.data.min('rate')*1.01).formatNumber('6','.',',')}}</div></div>
				</div>
				<div class="card-footer text-white-50">
				<div class="d-flex justify-content-between"><div>Total DLUX</div><div>{{(hivesellsview.data.sum('amount')/1000).formatNumber('3','.',',')}} DLUX</div></div>
				<div class="d-flex justify-content-between"><div>Total HIVE</div><div>{{(hivesellsview.data.sum('hive')/1000).formatNumber('3','.',',')}} HIVE</div></div>
					</div>
			</div>
			
		  </div>
	  </div>
	</div>

	  <!-- MAIN VIEW -->
      <div class="jumbotron bg-dark my-4 p-2 text-center col-xl-6 col-lg-12">
	    <div class="d-flex flex-fill justify-content-between align-items-center">
	<!-- data sorts -->
		<div class="d-flex flex-wrap justify-content-between ">
	<div class="btn-group mx-2" role="group">
	  <button type="button" class="btn btn-primary" dmx-on:click="hivesellsview.sort('amount','asc')" dmx-class:active="hivesellsview.sort.on == 'amount' && hivesellsview.sort.dir == 'asc'"><i class="fas fa-sort-amount-down-alt"></i></button>
		<div class="border border-primary p-1 text-white-50" dmx-class:bg-primary="hivesellsview.sort.on == 'amount'">DLUX</div>
	  <button type="button" class="btn btn-primary" dmx-on:click="hivesellsview.sort('amount','desc')" dmx-class:active="hivesellsview.sort.on == 'amount' && hivesellsview.sort.dir == 'desc'"><i class="fas fa-sort-amount-up-alt"></i></button>
	</div>
	<div class="btn-group mx-2" role="group">
	  <button type="button" class="btn btn-primary" dmx-on:click="hivesellsview.sort('hive','asc')" dmx-class:active="hivesellsview.sort.on == 'hive' && hivesellsview.sort.dir == 'asc'"> <i class="fas fa-sort-amount-up"></i></button>
		<div class="border border-primary p-1 text-white-50" dmx-class:bg-primary="hivesellsview.sort.on == 'hive'">HIVE</div>
		<button type="button" class="btn btn-primary" dmx-on:click="hivesellsview.sort('hive','desc')" dmx-class:active="hivesellsview.sort.on == 'hive' && hivesellsview.sort.dir == 'desc'"> <i class="fas fa-sort-amount-down"></i></button>
		</div>
	<div class="btn-group mx-2" role="group">
		<button type="button" class="btn btn-primary" dmx-on:click="hivesellsview.sort('rate','asc')" dmx-class:active="hivesellsview.sort.on == 'rate' && hivesellsview.sort.dir == 'asc'"> <i class="fas fa-sort-amount-down-alt"></i></button>
		<div class="border border-primary p-1 text-white-50" dmx-class:bg-primary="hivesellsview.sort.on == 'rate'">RATE</div>
		<button type="button" class="btn btn-primary" dmx-on:click="hivesellsview.sort('rate','desc')" dmx-class:active="hivesellsview.sort.on == 'rate' && hivesellsview.sort.dir == 'desc'"> <i class="fas fa-sort-amount-down"></i></button>
	  </div>
	</div>
	<!-- view nav -->
		<ul id="viewnav" class="nav nav-pills" role="tablist">
		<li class="nav-item"><a class="btn btn-secondary nav-link " href="#deck" id="decktab" role="tab" data-toggle="tab" aria-controls="data deck" aria-expanded="true"><i class="fas fa-grip-horizontal"></i></a></li>
		<li class="nav-item"><a class="btn btn-secondary nav-link " href="#groups" id="groupstab" role="tab" data-toggle="tab" aria-controls="data groups" aria-expanded="true"><i class="fas fa-layer-group"></i></a></li>
		<li class="nav-item"><a class="btn btn-secondary nav-link " href="#table" id="tabletab" role="tab" data-toggle="tab" aria-controls="data table" aria-expanded="true"><i class="fas fa-table"></i></a></li>
		<li class="nav-item"><a class="btn btn-secondary nav-link " href="#item" id="solotab" role="tab" data-toggle="tab" aria-controls="data item" aria-expanded="true"><i class="fas fa-dice-one"></i></a></li>
		</ul>
	</div>
	
		<div class="card bg-darker my-2 p-0 col-12">
			<div class="tab-content" id="hivesellsviewtabs">
				<!-- card deck -->
  				<div class="tab-pane fade show active" id="deck" role="tabpanel" aria-labelledby="deck-tab">
  					<div class="card-deck card-body m-2">
			  	<div dmx-repeat:repeat4="hivesellsview.data">
				  <div class="btn card bg-darker p-0 ml-0 my-1" dmx-class:border-success="dexapi.data.markets.hive.sells[0].rate == rate" dmx-class:border-info="rate.toNumber().inRange(dexapi.data.markets.hive.sells[0].rate, (dexapi.data.markets.hive.sells[0].rate*1.01)) == true && dexapi.data.markets.hive.sells[0].rate !== rate" dmx-class:border-danger="rate.toNumber().inRange(dexapi.data.markets.hive.sells[0].rate, (dexapi.data.markets.hive.sells[0].rate*1.01)) == false" dmx-class:btn-success="dexapi.data.markets.hive.sells[0].rate == rate" dmx-class:btn-info="rate.toNumber().inRange(dexapi.data.markets.hive.sells[0].rate, (dexapi.data.markets.hive.sells[0].rate*1.01)) == true && dexapi.data.markets.hive.sells[0].rate !== rate" dmx-class:btn-danger="rate.toNumber().inRange(dexapi.data.markets.hive.sells[0].rate, (dexapi.data.markets.hive.sells[0].rate*1.01)) == false" dmx-class:disabled="rate.toNumber().inRange(dexapi.data.markets.hive.sells[0].rate, (dexapi.data.markets.hive.sells[0].rate*1.01)) == false">
					<div class="card-header text-right" dmx-class:text-success="dexapi.data.markets.hive.sells[0].rate == rate" dmx-class:text-info="rate.toNumber().inRange(dexapi.data.markets.hive.sells[0].rate, (dexapi.data.markets.hive.sells[0].rate*1.01)) == true && dexapi.data.markets.hive.sells[0].rate !== rate" dmx-class:text-white-50="rate.toNumber().inRange(dexapi.data.markets.hive.sells[0].rate, (dexapi.data.markets.hive.sells[0].rate*1.01)) == false">
						<small>RATE: {{rate}}</small>
					</div>
				  <div class="card-body text-right text-white">
					<div>{{amountnai.nai()}}</div>
					<div>{{hivenai.nai()}}</div>					
				  </div>
				  <div class="card-footer text-center">			 
					<div><small class="text-muted">FEE: {{feenai.nai()}}</small></div>
				  </div>
				 </div>
				</div>
	    		</div>
				</div>
				<!-- card groups -->
 				 <div class="tab-pane fade" id="groups" role="tabpanel" aria-labelledby="groups-tab">
					<div class="jumbotron bg-darker my-4 p-2">
          			<div>			  
		  	  <div dmx-repeat:repeat1="hivesellsview.data.groupBy('rate')">
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
										<button class="btn btn-primary">Swap</button>
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
				</div>
				<!-- data item -->
  				 <div class="tab-pane fade" id="item" role="tabpanel" aria-labelledby="table-tab">
					 <div class="jumbotron bg-darker my-4">
          <!-- full action bar -->
		  <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
	  <div class="btn-group" role="group">
	  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Filter </button>
	  	 
		  <div class="dropdown-menu">
	    <div class="d-flex justify-content-between align-items-center">
			  <input type="" class="form-control col-2 text-center" id="amountmin" placeholder="MIN" dmx-bind:value="(dexapi.data.markets.hive.sells.min('amount')/1000).formatNumber('3','.',',')"></input>
		  	  <div class="flex-fill col-6" id="amountslider"></div>
		  	  <input class="form-control col-2 text-center" type="" id="amountmax" placeholder="MAX" dmx-bind:value="(dexapi.data.markets.hive.sells.max('amount')/1000).formatNumber('3','.',',')"></input>

        </div>
	  <div class="d-flex justify-content-between align-items-center">
			  <input class="form-control col-2 text-center" type="" id="hivemin" placeholder="MIN" dmx-bind:value="(dexapi.data.markets.hive.sells.min('hive')/1000).formatNumber('3','.',',')"></input>
		  	  <div class="flex-fill col-6" id="hiveslider"></div>
		  	  <input class="form-control col-2 text-center" type="" id="hivemax" placeholder="MAX" dmx-bind:value="(dexapi.data.markets.hive.sells.max('hive')/1000).formatNumber('3','.',',')"></input>
		</div>
	</div>
	</div>
<div class="btn-group" role="group">
	    <button type="	button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Sort </button>
	    <div class="dropdown-menu">  
				<h6 class="dropdown-header text-center " dmx-class:text-primary="hivesellsview.sort.on == 'amount'">DLUX</h6>
				<div class="d-flex text-center">
					<a class="dropdown-item" href="#" dmx-on:click="hivesellsview.sort('amount','asc')" dmx-class:active="hivesellsview.sort.on == 'amount' && hivesellsview.sort.dir == 'asc'"><i class="fas fa-sort-amount-down-alt"></i></a>
					<a class="dropdown-item" href="#" dmx-on:click="hivesellsview.sort('amount','desc')" dmx-class:active="hivesellsview.sort.on == 'amount' && hivesellsview.sort.dir == 'desc'"><i class="fas fa-sort-amount-up-alt"></i></a>
				</div>
		
			
				<h6 class="dropdown-header text-center " dmx-class:text-primary="hivesellsview.sort.on == 'hive'">HIVE</h6>
				<div class="d-flex text-center">
					<a class="dropdown-item" href="#" dmx-on:click="hivesellsview.sort('hive','asc')" dmx-class:active="hivesellsview.sort.on == 'hive' && hivesellsview.sort.dir == 'asc'"> <i class="fas fa-sort-amount-up"></i></a>
					<a class="dropdown-item" href="#" dmx-on:click="hivesellsview.sort('hive','desc')" dmx-class:active="hivesellsview.sort.on == 'hive' && hivesellsview.sort.dir == 'desc'"> <i class="fas fa-sort-amount-down"></i></a> 
				</div>

				<h6 class="dropdown-header text-center " dmx-class:text-primary="hivesellsview.sort.on == 'rate'">RATE</h6>
			  <div class="d-flex text-center">
	      			<a class="dropdown-item" href="#" dmx-on:click="hivesellsview.sort('rate','asc')" dmx-class:active="hivesellsview.sort.on == 'rate' && hivesellsview.sort.dir == 'asc'"> <i class="fas fa-sort-amount-down-alt"></i></a>
					<a class="dropdown-item" href="#" dmx-on:click="hivesellsview.sort('rate','desc')" dmx-class:active="hivesellsview.sort.on == 'rate' && hivesellsview.sort.dir == 'desc'"> <i class="fas fa-sort-amount-down"></i></a>
				</div>
	  </div>
	</div>
	<div class="btn-group" role="group">
	    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Show </button>
		<div class="dropdown-menu"> <a href="#" class="dropdown-item" dmx-class:active="">All</a> <a class="dropdown-item" href="#">Buy Enabled</a> <a class="dropdown-item" href="#">Buy Blocked</a> </div>
	    </div>
	  <div class="btn-group" role="group">
	    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Per </button>
	    <div class="dropdown-menu"> <a href="#" class="dropdown-item" dmx-class:active="hivesellsview.items == 15">15</a> <a class="dropdown-item" href="#">30</a> </div>
	    </div>
		<div class="btn-group" role="group">
	    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Page </button>
	    <div class="dropdown-menu"> <div dmx-repeat:repeat5="hivesellsview.pages">
		    <a href="#" class="dropdown-item" dmx-on:click="hivesellsview.select(3)" dmx-class:active="hivesellsview.page == $index + 1">{{$value}}</a>
		    </div></div>
	    </div>
	
	    </div>
	<!-- data iterator view -->
          <div id="hivesellsviewIterate" class="d-flex justify-content-between align-items-center">
            <button class="btn btn-primary" dmx-on:click="iteratedluxsellorders.prev()">&larr;</button>
            <dmx-data-iterator id="iteratedluxsellorders" dmx-bind:data="hivesellsview.data" loop="true"><a href="#" dmx-on:click="hivesellsviewDetail.select(value.txid)">
              <h3 class="mx-2">{{index}} | {{value.amount.nai()}} DLUX | {{value.hive.nai()}} HIVE | {{value.rate}} RATE | {{value.fee.nai()}} FEE</h3>
              <h5 class="text-break mx-2">{{value.txid}}</h5>
            </a></dmx-data-iterator>
            <button class="btn btn-primary" dmx-on:click="iteratedluxsellorders.next()">&rarr;</button>
          </div>
        </div>
				</div>
			</div>

			
	<!-- pagination -->
	<div class="d-flex card-footer mt-3">
		 <div class="d-flex flex-fill justify-content-between align-items-center mt-2">
            <div class="col-1 m-0 p-0 text-left"><a class="btn btn-secondary" href="javascript:void(0);" dmx-on:click="hivesellsview.prev()" dmx-show="hivesellsview.has.prev"><i class="fa fa-angle-left"></i></a></div>
			<div class="d-flex">
			<p class="m-0 p-0 text-muted">Page {{hivesellsview.page}} of {{hivesellsview.pages}}</p>
		    </div>
              <div class="col-1 m-0 p-0 text-right"><a class="btn btn-secondary" href="javascript:void(0)" dmx-on:click="hivesellsview.next()" dmx-show="hivesellsview.has.next"><i class="fa fa-angle-right"></i></a></div>
          </div>
    </div>
  </div>
      </div>
<!-- DETAIL VIEW -->
<div class="col-xl-3 col-lg-6">
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
</div>
  </section>
</main>
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
