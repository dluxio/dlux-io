<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - LARYNX DEX</title>
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/header.php";
include_once( $path );
?>
<script type="text/javascript" src="/dlux-io/dmxAppConnect/dmxAppConnect.js"></script>
<script src="https://cdn.jsdelivr.net/npm/luxon@1.26.0"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.1/dist/chart.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@1.0.0"></script> 
<script type="text/javascript" src="/js/chartf.js"></script>
<style>
.col-sort {
    background-color: cornflowerblue;
    color: #282828;
}
input.disabled-input {
    pointer-events: none;
    background-color: #e9ecef;
    opacity: 1;
}
.r-radius-hotfix {
    border-top-right-radius: 0.25rem !important;
    border-bottom-right-radius: 0.25rem !important;
}
.l-radius-hotfix {
    border-top-left-radius: 0.25rem !important;
    border-bottom-left-radius: 0.25rem !important;
}
</style>
<script type="text/javascript" src="/dlux-io/dmxAppConnect/dmxFormatter/dmxFormatter.js"></script>
</head>
<body class="d-flex flex-column bg-darker text-white h-100 padme-t70" id="index" is="dmx-app">
<dmx-api-datasource id="hiveprice" is="dmx-fetch" url="https://api.coingecko.com/api/v3/simple/price?ids=hive&amp;vs_currencies=usd"></dmx-api-datasource>
<dmx-api-datasource id="hbdprice" is="dmx-fetch" url="https://api.coingecko.com/api/v3/simple/price?ids=hive_dollar&amp;vs_currencies=usd"></dmx-api-datasource>
<dmx-api-datasource id="nodes" is="dmx-fetch" url="https://spkinstant.hivehoneycomb.com/runners" ></dmx-api-datasource>
<!--<dmx-api-datasource id="openordersapi" is="dmx-fetch" url="https://spkinstant.hivehoneycomb.com/@imno" ></dmx-api-datasource>-->
<!--<dmx-api-datasource id="recenthiveapi" is="dmx-fetch" url="https://spkinstant.hivehoneycomb.com/api/recent/HIVE_LARYNX" dmx-param:limit="1000" ></dmx-api-datasource>-->
<dmx-data-view id="marketnodes" dmx-bind:data="nodes.data.result" sorton="g" sortdir="ndesc" pagesize="10"></dmx-data-view>
<dmx-data-view id="openorders" dmx-bind:data="openordersapi.data.contracts" sorton="block" pagesize="10"></dmx-data-view>
<dmx-data-view id="accountinfo" dmx-bind:data="accountapi.data.result"></dmx-data-view>
<dmx-data-view id="recenthive" dmx-bind:data="recenthiveapi.data.recent_trades" sorton="trade_timestamp" sortdir="ndesc" pagesize="25"></dmx-data-view>
<dmx-data-view id="recenthbd" dmx-bind:data="recenthbdapi.data.recent_trades" sorton="trade_timestamp" sortdir="ndesc" pagesize="25"></dmx-data-view>
<dmx-data-view id="recenthive24h" dmx-bind:data="recenthiveapi.data.recent_trades" sorton="trade_timestamp" sortdir="ndesc" filter="trade_timestamp.inRange(timeoffset.value,timenow.value)" ></dmx-data-view>
<dmx-data-view id="recenthbd24h" dmx-bind:data="recenthbdapi.data.recent_trades" sorton="trade_timestamp" sortdir="ndesc" filter="trade_timestamp.inRange(timeoffset.value,timenow.value)" ></dmx-data-view>
<dmx-data-view id="hivebuys" dmx-bind:data="dexapi.data.markets.hive.buys" sorton="rate" sortdir="ndesc" pagesize="15"></dmx-data-view>
<dmx-data-view id="hivesells" dmx-bind:data="dexapi.data.markets.hive.sells" sorton="rate" sortdir="nasc" pagesize="15"></dmx-data-view>
<dmx-data-view id="hbdbuys" dmx-bind:data="dexapi.data.markets.hbd.buys" sorton="rate" sortdir="ndesc" pagesize="15"></dmx-data-view>
<dmx-data-view id="hbdsells" dmx-bind:data="dexapi.data.markets.hbd.sells" sorton="rate" sortdir="nasc" pagesize="15"></dmx-data-view>
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/nav.php";
$lapi = "https://spkinstant.hivehoneycomb.com";
if ( isset( $_COOKIE[ 'lapi' ] ) ) {$lapi = $_COOKIE[ 'lapi' ];};
if ( isset( $_COOKIE[ 'user' ] ) ) {

  echo "<dmx-api-datasource id=\"dexapi\" is=\"dmx-fetch\" url=\"" . $lapi . "/dex\" ></dmx-api-datasource>\n";
  echo "<dmx-api-datasource id=\"recenthiveapi\" is=\"dmx-fetch\" url=\"" . $lapi . "/api/recent/HIVE_LARYNX/\" dmx-param:limit=\"1000\"></dmx-api-datasource>\n";
  echo "<dmx-api-datasource id=\"recenthbdapi\" is=\"dmx-fetch\" url=\"" . $lapi . "/api/recent/HBD_LARYNX/\" dmx-param:limit=\"1000\"></dmx-api-datasource>\n";
  echo "<dmx-api-datasource id=\"openordersapi\" is=\"dmx-fetch\" url=\"" . $lapi . "/@" . $_COOKIE[ 'user' ] . "\"></dmx-api-datasource>\n";
  echo "<dmx-api-datasource id=\"accountapi\" is=\"dmx-fetch\" url=\"" . $lapi . "/hapi/condenser_api/get_accounts\" dmx-param:0=\"'" . $_COOKIE[ 'user' ] . "'\"></dmx-api-datasource>\n";
} else {
  echo "<dmx-api-datasource id=\"dexapi\" is=\"dmx-fetch\" url=\"" . $lapi . "/dex\" ></dmx-api-datasource>\n";
  echo "<dmx-api-datasource id=\"recenthiveapi\" is=\"dmx-fetch\" url=\"" . $lapi . "/api/recent/HIVE_LARYNX/\" dmx-param:limit=\"1000\"></dmx-api-datasource>\n";
  echo "<dmx-api-datasource id=\"recenthbdapi\" is=\"dmx-fetch\" url=\"" . $lapi . "/api/recent/HBD_LARYNX/\" dmx-param:limit=\"1000\"></dmx-api-datasource>\n";
};
include_once( $path );
?>
<main role="main" class="flex-shrink-0 text-white">
  <div class="container-fluid px-0 ">
    <div class="container-fluid fixed-top bg-dark px-0" style="margin-top: 66px; z-index: 900;">
      <div class="d-flex flex-column justify-content-between align-items-center px-3 py-1" style="background-color: black;">
        <div class="d-flex align-itmes-center justify-content-between w-100">
          <div class="d-flex align-itmes-center">
            <div class="dropdown show"> <a class="btn btn-sm btn-dark dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Token </a>
              <div class="dropdown-menu">
                <h6 class="dropdown-header">HIVE / HBD</h6>
                <div class="dropdown-divider bg-light"></div>
                <a class="dropdown-item" href="/dex/dlux">DLUX</a> <a class="dropdown-item" href="/dex/larynx">LARYNX</a></div>
            </div>
            <div class="d-flex" dmx-bind:title="{{dexapi.data.behind}} Blocks Behind Hive">
              <button class="text-center btn btn-sm align-items-center ml-4" 
						 dmx-class:btn-outline-success="dexapi.data.behind < 30"	
						 dmx-class:btn-outline-warning="dexapi.data.behind >= 30"
						 dmx-class:btn-outline-danger="dexapi.data.behind > 100"
						type="button" data-toggle="collapse" data-target="#nodedrawer" aria-expanded="false" aria-controls="nodedrawer">
				  <span class=" p-0 m-0 mr-1">LARYNX:</span>
				  <span class=" p-0 m-0" dmx-show="dexapi.data.behind < 30">ONLINE -</span>
				  <span class=" p-0 m-0" dmx-show="dexapi.data.behind >= 30 && dexapi.data.behind <=100">LAGGING -</span>
				  <span class=" p-0 m-0" dmx-show="dexapi.data.behind > 100">OFFLINE -</span>
				  <span class=" p-0 m-0 ml-1">{{dexapi.data.behind}} BBH</span></button>
            </div>
          </div>
          <div class="d-flex text-white-50">
            <div id="userdlux" class="mx-4 text-warning">{{(openordersapi.data.balance/1000).formatNumber(3,'.',',')}} LARYNX</div>
            <div id="userdpwr" class="mx-4 text-primary" dmx-show="openordersapi.data.poweredUp > 0">{{(openordersapi.data.poweredUp/1000).formatNumber(3,'.',',')}} LARYNXP</div>
            <div id="userdgov" class="mx-4 text-info" dmx-show="openordersapi.data.gov > 0">{{(openordersapi.data.gov/1000).formatNumber(3,'.',',')}} LARYNXG</div>
            <div id="userhive" class="mx-4 text-danger">{{accountapi.data.result[0].balance}}</div>
            <div id="userhbd" class="mx-4 text-success">{{accountapi.data.result[0].hbd_balance}}</div>
          </div>
        </div>
        <div id="nodedrawer" class="collapse">
          <div class="py-5">
			  <div class="d-flex align-items-center mb-3">
				  <div class="">
			  		<div role="group" class="input-group" dmx-show="filtertype.checked == false">
				  <div class="input-group-prepend l-radius-hotfix"><span class="input-group-text bg-dark border-dark text-secondary" dmx-on:click="filteraccount.focus()"><i class="fas fa-search"></i></span></div>
                      <input type="text" class="form-control bg-dark border-dark text-info" id="filteraccount" aria-required="true" placeholder="Users">
                      <div class="input-group-append p-0 m-0" >
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix p-0 m-0" style="width: 30px">
							<span dmx-show="filteraccount.value">
								<a href="#" class="badge badge-secondary" dmx-on:click="filteraccount.setValue(null)"><i class="fas fa-times"></i></a>
							</span>
						 </div>
                      </div>
                  </div>
					  </div>
			  <div class="">
			  <div role="group" class="input-group" dmx-show="filtertype.checked == true">
				  <div class="input-group-prepend l-radius-hotfix"><span class="input-group-text bg-dark border-dark text-secondary" dmx-on:click="filterapi.focus()"><i class="fas fa-search"></i></span></div>
                      <input type="text" class="form-control bg-dark border-dark text-info" id="filterapi" aria-required="true" placeholder="APIs">
                      <div class="input-group-append p-0 m-0">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix p-0 m-0" style="width: 30px">
							<span dmx-show="filterapi.value"><a href="#" class="badge badge-secondary" dmx-on:click="filterapi.setValue(null)"><i class="fas fa-times"></i></a></span></div>
                      </div>
                  </div>
				  </div>
			 <div class="d-flex ml-2">
				  <label for="filtertype" class="m-0 px-2 py-1 border l-radius-hotfix" dmx-class:border-primary="filtertype.checked == false" dmx-class:bg-primary="filtertype.checked == false" dmx-class:border-secondary="filtertype.checked == true" style="border-width: 2px !important"><span dmx-class:text-white="filtertype.checked == false" dmx-class:text-secondary="filtertype.checked == true">Users</label>
				  <label for="filtertype" class="m-0 px-2 py-1 border r-radius-hotfix" dmx-class:border-primary="filtertype.checked == true" dmx-class:bg-primary="filtertype.checked == true" dmx-class:border-secondary="filtertype.checked == false" style="border-width: 2px !important"><span class="" dmx-class:text-white="filtertype.checked == true" dmx-class:text-secondary="filtertype.checked == false">APIs</span></label>
				  <div class="custom-control custom-switch d-none">
  					<input type="checkbox" class="custom-control-input d-none" id="filtertype">
				</div>
			</div>
			</div>

            <div class="table-responsive rounded border border-dark">
              <table role="table" aria-busy="false" aria-colcount="3" class="table table-dark bg-darker text-white-50 table-striped table-hover table-borderless mb-0" id="larynxnodes">
                <thead role="rowgroup" class="">
                  <tr role="row" class="">
                    <th role="columnheader" class="" aria-colindex="1" dmx-class:col-sort="marketnodes.sort.on == 'account'"> <div class="d-flex align-items-center">
                      <div class="mr-3">USER NAME</div>
                      <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" dmx-on:click="marketnodes.sort('account','asc')" dmx-class:bg-primary="marketnodes.sort.dir == 'asc'  && marketnodes.sort.on == 'account'"> <i class="fas fa-caret-up"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" dmx-on:click="marketnodes.sort('account','desc')" dmx-class:bg-primary="marketnodes.sort.dir == 'desc'  && marketnodes.sort.on == 'account'"> <i class="fas fa-caret-down"></i></button>
                    </div>
                    </th>
                    <th role="columnheader" class="" aria-colindex="2" dmx-class:col-sort="marketnodes.sort.on == 'g'"> <div class="d-flex align-items-center">
                      <div class="mr-3">GOV BAL</div>
                      <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" dmx-on:click="marketnodes.sort('g','asc')" dmx-class:bg-primary="marketnodes.sort.dir == 'asc'  && marketnodes.sort.on == 'g'"> <i class="fas fa-caret-up"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" dmx-on:click="marketnodes.sort('g','desc')" dmx-class:bg-primary="marketnodes.sort.dir == 'desc'  && marketnodes.sort.on == 'g'"> <i class="fas fa-caret-down"></i></button>
                    </div>
                    </th>
                    <th role="columnheader" class="" aria-colindex="3" dmx-class:col-sort="marketnodes.sort.on == 'api'"> <div class="d-flex align-items-center">
                      <div class="mr-3">API (Click to load)</div>
                      <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" dmx-on:click="marketnodes.sort('api','asc')" dmx-class:bg-primary="marketnodes.sort.dir == 'asc'  && marketnodes.sort.on == 'api'"> <i class="fas fa-caret-up"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" dmx-on:click="marketnodes.sort('api','desc')" dmx-class:bg-primary="marketnodes.sort.dir == 'desc'  && marketnodes.sort.on == 'api'"> <i class="fas fa-caret-down"></i></button>
                    </div>
                    </th>
                    <th role="columnheader" class="" aria-colindex="4"> <div class="d-flex align-items-center">
                      <div>
                        <div class="dropdown show"> <a class="btn btn-sm btn-dark " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-satellite-dish"></i></a>
                          <div class="dropdown-menu">
                            <h6 class="dropdown-header">CURRENT API</h6>
                            <p class="dropdown-item">{{openordersapi.data.node.eval('getCookie(`lapi`)')}}</p>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" onClick="setAPI('lapi','https://spkinstant.hivehoneycomb.com/')"><i class="fas fa-bolt mr-2"></i>Load Latest</a> </div>
                        </div>
                      </div>
                    </div></th>
                  </tr>
                <tbody role="rowgroup">
                  <!--repeat region-->
                  <tr class="" role="row" dmx-repeat:openordersrepeat="marketnodes.data.where(`account`, filteraccount.value, 'fuzzySearch')" dmx-show="filtertype.checked == false">
                    <td role="cell" class="" aria-colindex="1"><a dmx-bind:href="/@{{account}}">@{{account}}</a></td>
                    <td role="cell" class="" aria-colindex="2">{{(g/1000).formatNumber('3','.',',')}}</td>
                    <td role="cell" class="" aria-colindex="3" colspan="2"><a href="#" dmx-on:click="javascript:setAPI('lapi','{{api}}')">{{api}}</a></td>
                  </tr>
					<tr class="" role="row" dmx-repeat:openordersrepeat="marketnodes.data.where(`api`, filterapi.value, 'fuzzySearch')" dmx-show="filtertype.checked == true">
                    <td role="cell" class="" aria-colindex="1"><a dmx-bind:href="/@{{account}}">@{{account}}</a></td>
                    <td role="cell" class="" aria-colindex="2">{{(g/1000).formatNumber('3','.',',')}}</td>
                    <td role="cell" class="" aria-colindex="3" colspan="2"><a href="#" dmx-on:click="javascript:setAPI('lapi','{{api}}')">{{api}}</a></td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr role="row" class="" >
                    <td role="cell" class="" colspan="7" aria-colindex="1"><!-- pagination -->
                      <div class="d-flex flex-fill justify-content-between align-items-center" dmx-show="marketnodes.pages > 1">
                        <div class="col-1 m-0 p-0 text-left"><a class="btn btn-secondary" href="javascript:void(0);" dmx-on:click="marketnodes.prev()" dmx-show="marketnodes.has.prev"><i class="fa fa-angle-left"></i></a></div>
                        <div class="d-flex">
                          <p class="m-0 p-0 text-muted">Page {{marketnodes.page}} of {{marketnodes.pages}}</p>
                        </div>
                        <div class="col-1 m-0 p-0 text-right"><a class="btn btn-secondary" href="javascript:void(0)" dmx-on:click="marketnodes.next()" dmx-show="marketnodes.has.next"><i class="fa fa-angle-right"></i></a></div>
                      </div></td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    
	  <div class="container text-white" style="margin-top: 50px;">
	<input id="timenow" class="d-none" dmx-bind:value="{{nodes.data.node.getTimeOffset(0)}}">
	<input id="timeoffset" class="d-none" dmx-bind:value="{{nodes.data.node.getTimeOffset(86400000)}}">

      <div class="row">
        <div class="col-4">
          <div class="jumbotron p-3 bg-dark">
            <div id="hivequote">
              <h2 class="lead my-0"><b>HIVE: ${{hiveprice.data.hive.usd.toFixedTrunc('6')}}</b></h2>
            </div>
            <input id="hiveusd" dmx-bind:value="{{hiveprice.data.hive.usd}}" class="d-none">
          </div>
        </div>
        <div class="col-4">
          <div class="jumbotron p-3 bg-dark">
            <div id="hbdquote">
              <h2 class="lead my-0"><b>HBD: ${{hbdprice.data.hive_dollar.usd.toFixedTrunc('6')}}</b></h2>
            </div>
            <input id="hbdusd" dmx-bind:value="{{hbdprice.data.hive_dollar.usd}}" class="d-none">
          </div>
        </div>
        <div class="col-4">
          <div class="jumbotron p-3 bg-dark" dmx-show="buyhive.checked">
            <div id="dluxhivequote">
              <h2 class="lead my-0"><b>LARYNX: ${{(dexapi.data.markets.hive.tick*hiveprice.data.hive.usd).toFixedTrunc('6')}}</b></h2>
            </div>
            <input id="dluxhiveusd" dmx-bind:value="{{dexapi.data.markets.hive.tick}}" class="d-none">
          </div>
          <div class="jumbotron p-3 bg-dark" dmx-show="buyhbd.checked">
            <div id="dluxhbdquote">
              <h2 class="lead my-0"><b>LARYNX: ${{(dexapi.data.markets.hbd.tick*hbdprice.data.hive_dollar.usd).toFixedTrunc('6')}}</b></h2>
            </div>
            <input id="dluxhbdusd" dmx-bind:value="{{dexapi.data.markets.hbd.tick}}" class="d-none">
          </div>
        </div>
      </div>
      <div id="market" class="row text-center">
        <div class="mt-2 col-lg-3">
          <h5>Market</h5>
          <div class="container-fluid mt-3">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-outline-warning active">
                <input name="buypair" type="radio" id="buyhive" checked dmx-on:click="buy.buyHiveTotal.setValue('');sell.sellHiveTotal.setValue('');buy.buyHBDTotal.setValue('0');sell.sellHBDTotal.setValue('0')">
                HIVE </label>
              <label class="btn btn-outline-warning">
                <input type="radio" name="buypair" id="buyhbd" dmx-on:click="buy.buyHBDTotal.setValue('');sell.sellHBDTotal.setValue('');buy.buyHiveTotal.setValue('0');sell.sellHiveTotal.setValue('0')">
                HBD </label>
            </div>
          </div>
        </div>
        <div class="col-lg-9" dmx-show="buyhive.checked">
          <div class="row">
            <div class="mt-2 col">
              <h5>Bid</h5>
              <i class="fab fa-hive mr-1"></i>{{hivebuyorders[0].$key.toNumber().formatNumber('6','.',',')}}<br>
              <i class="fas fa-dollar-sign mx-1"></i>{{(hivebuyorders[0].$key*hiveusd.value).formatNumber('6','.',',')}} </div>
            <div class="mt-2 col">
              <h5>Ask</h5>
              <i class="fab fa-hive mr-1"></i>{{hivesellorders[0].$key.toNumber().formatNumber('6','.',',')}}<br>
              <i class="fas fa-dollar-sign mx-1"></i>{{(hivesellorders[0].$key*hiveusd.value).formatNumber('6','.',',')}} </div>
            <div class="mt-2 col">
              <h5>Last</h5>
              <i class="fab fa-hive mr-1"></i>{{dexapi.data.markets.hive.tick.toNumber().formatNumber('6','.',',')}} <br>
              <i class="fas fa-dollar-sign mx-1"></i>{{(dexapi.data.markets.hive.tick*hiveusd.value).formatNumber('6','.',',')}} </div>
            <div class="mt-2 col">
              <h5>24h Volume</h5>
              <i class="fab fa-hive mr-1"></i>{{recenthive24h.data.sum('target_volume').formatNumber('6','.',',')}}<br>
			  <i class="fas fa-dollar-sign mx-1"></i>{{(recenthive24h.data.sum('target_volume')*hiveusd.value).formatNumber('6','.',',')}}
            </div>
          </div>
        </div>
        <div class="col-lg-9" dmx-show="buyhbd.checked">
          <div class="row">
            <div class="mt-2 col">
              <h5>Bid</h5>
              <i class="fab fa-hive mr-1"></i>{{hbdbuyorders[0].$key.toNumber().formatNumber('6','.',',')}}<br>
              <i class="fas fa-dollar-sign mx-1"></i>{{(hbdbuyorders[0].$key*hbdusd.value).formatNumber('6','.',',')}} </div>
            <div class="mt-2 col">
              <h5>Ask</h5>
              <i class="fab fa-hive mr-1"></i>{{hbdsellorders[0].$key.toNumber().formatNumber('6','.',',')}}<br>
              <i class="fas fa-dollar-sign mx-1"></i>{{(hbdsellorders[0].$key*hbdusd.value).formatNumber('6','.',',')}} </div>
            <div class="mt-2 col">
              <h5>Last</h5>
              <i class="fab fa-hive mr-1"></i>{{dexapi.data.markets.hive.tick.toNumber().formatNumber('6','.',',')}} <br>
              <i class="fas fa-dollar-sign mx-1"></i>{{(dexapi.data.markets.hive.tick*hbdusd.value).formatNumber('6','.',',')}} </div>
            <div class="mt-2 col">
              <h5>24h Volume</h5>
              <i class="fab fa-hive mr-1"></i>{{recenthbd24h.data.sum('target_volume').formatNumber('6','.',',')}}<br>
			  <i class="fas fa-dollar-sign mx-1"></i>{{(recenthbd24h.data.sum('target_volume')*hiveusd.value).formatNumber('6','.',',')}}
            </div>
          </div>
        </div>
      </div>
      <div class="marketChart mt-3 mb-3">
        <div class="">
          <div class="chartjs-size-monitor">
            <div class="chartjs-size-monitor-expand">
              <div class=""></div>
            </div>
            <div class="chartjs-size-monitor-shrink">
              <div class=""></div>
            </div>
          </div>
          <canvas id="chart" width="2220" height="800" class="chartjs-render-monitor" style="display: block; height: 400px; width: 1110px;"></canvas>
        </div>
        <div class="mt-2 text-center d-flex justify-content-between">
          <div>
            <button id="refreshChart" class="btn btn-outline-secondary" onClick="updateChart()"><i class="fas fa-sync-alt mr-2"></i>REFRESH CHART</button>
          </div>
          <div id="settimescale" class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-info active">
              <input type="radio" name="timescale" id="hourbtn" is="dmx-radio">
              1H </label>
            <label class="btn btn-info">
              <input type="radio" name="timescale" id="daybtn" is="dmx-radio">
              1D </label>
            <label class="btn btn-info">
              <input type="radio" name="timescale" id="weekbtn" is="dmx-radio">
              1W </label>
            <label class="btn btn-info">
              <input type="radio" name="timescale" id="monthbtn" is="dmx-radio">
              1M </label>
            <label class="btn btn-info">
              <input type="radio" name="timescale" id="yearbtn" is="dmx-radio">
              1Y </label>
          </div>
          <div>
            <button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#openordersdrawer" aria-expanded="false" aria-controls="openordersdrawer">OPEN ORDERS ({{openorders.data.count()}}) <i class="fas fa-book-reader ml-2"></i></button>
          </div>
        </div>
        <div id="openordersdrawer" class="collapse ">
          <div class="py-5">
            <div dmx-show="openorders.data.count() == 0" class="text-center text-white-50">
              <h5>No open orders</h5>
            </div>
            <div class="table-responsive rounded border border-dark" dmx-show="openorders.data.count() > 0">
              <table role="table" aria-busy="false" aria-colcount="6" class="table table-dark bg-darker text-white-50 table-striped table-hover table-borderless mb-0" id="useropenorders">
                <thead role="rowgroup" class="">
                  <tr role="row" class="">
                    <th role="columnheader" class="" aria-colindex="1" dmx-class:col-sort="openorders.sort.on == 'block'"> <div class="d-flex align-items-center">
                      <div class="mr-3">BLOCK</div>
                      <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" dmx-on:click="openorders.sort('block','asc')" dmx-class:bg-primary="openorders.sort.dir == 'asc'  && openorders.sort.on == 'block'"> <i class="fas fa-caret-up"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" dmx-on:click="openorders.sort('block','desc')" dmx-class:bg-primary="openorders.sort.dir == 'desc'  && openorders.sort.on == 'block'"> <i class="fas fa-caret-down"></i></button>
                    </div>
                    </th>
                    <th role="columnheader" class="" aria-colindex="2" dmx-class:col-sort="openorders.sort.on == 'amount'"> <div class="d-flex align-items-center">
                      <div class="mr-3">DLUX</div>
                      <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" dmx-on:click="openorders.sort('amount','asc')" dmx-class:bg-primary="openorders.sort.dir == 'asc'  && openorders.sort.on == 'amount'"> <i class="fas fa-caret-up"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" dmx-on:click="openorders.sort('amount','desc')" dmx-class:bg-primary="openorders.sort.dir == 'desc'  && openorders.sort.on == 'amount'"> <i class="fas fa-caret-down"></i></button>
                    </div>
                    </th>
                    <th role="columnheader" class="" aria-colindex="3" dmx-class:col-sort="openorders.sort.on == 'hbd'"> <div class="d-flex align-items-center">
                      <div class="mr-3">HBD</div>
                      <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" dmx-on:click="openorders.sort('hbd','asc')" dmx-class:bg-primary="openorders.sort.dir == 'asc'  && openorders.sort.on == 'hbd'"> <i class="fas fa-caret-up"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" dmx-on:click="openorders.sort('hbd','desc')" dmx-class:bg-primary="openorders.sort.dir == 'desc'  && openorders.sort.on == 'hbd'"> <i class="fas fa-caret-down"></i></button>
                    </div>
                    </th>
                    <th role="columnheader" class="" aria-colindex="4" dmx-class:col-sort="openorders.sort.on == 'hive'"> <div class="d-flex align-items-center">
                      <div class="mr-3">HIVE</div>
                      <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" dmx-on:click="openorders.sort('hive','asc')" dmx-class:bg-primary="openorders.sort.dir == 'asc'  && openorders.sort.on == 'hive'"> <i class="fas fa-caret-up"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" dmx-on:click="openorders.sort('hive','desc')" dmx-class:bg-primary="openorders.sort.dir == 'desc'  && openorders.sort.on == 'hive'"> <i class="fas fa-caret-down"></i></button>
                    </div>
                    </th>
                    <th role="columnheader" class="" aria-colindex="5" dmx-class:col-sort="openorders.sort.on == 'rate'"> <div class="d-flex align-items-center">
                      <div class="mr-3">RATE</div>
                      <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" dmx-on:click="openorders.sort('rate','asc')" dmx-class:bg-primary="openorders.sort.dir == 'asc'  && openorders.sort.on == 'rate'"> <i class="fas fa-caret-up"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" dmx-on:click="openorders.sort('rate','desc')" dmx-class:bg-primary="openorders.sort.dir == 'desc'  && openorders.sort.on == 'rate'"> <i class="fas fa-caret-down"></i></button>
                    </div>
                    </th>
                    <th role="columnheader" class="" aria-colindex="6" dmx-class:col-sort="openorders.sort.on == 'type'"> <div class="d-flex align-items-center">
                      <div class="mr-3">TYPE</div>
                      <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" dmx-on:click="openorders.sort('type','asc')" dmx-class:bg-primary="openorders.sort.dir == 'asc'  && openorders.sort.on == 'type'"> <i class="fas fa-caret-up"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" dmx-on:click="openorders.sort('type','desc')" dmx-class:bg-primary="openorders.sort.dir == 'desc'  && openorders.sort.on == 'type'"> <i class="fas fa-caret-down"></i></button>
                    </div>
                    </th>
                    <th role="columnheader" class="" aria-colindex="7"> <div class="d-flex align-items-center">
                      <div class="mr-3">&nbsp;</div>
                    </div>
                    </th>
                  </tr>
                <tbody role="rowgroup">
                  <!--repeat region-->
                  <tr role="row" class="" dmx-repeat:openordersrepeat="openorders.data">
                    <td role="cell" class="" aria-colindex="1">{{block}}</td>
                    <td role="cell" class="" aria-colindex="2">{{amount/1000}}</td>
                    <td role="cell" class="" aria-colindex="3">{{hbd/1000}}</td>
                    <td role="cell" class="" aria-colindex="4">{{hive/1000}}</td>
                    <td role="cell" class="" aria-colindex="5" dmx-class:text-danger="(type == 'hive:sell' || type == 'hbd:sell')" dmx-class:text-success="(type == 'hive:buy' || type == 'hbd:buy')">{{rate}}</td>
                    <td role="cell" class="" aria-colindex="6" dmx-class:text-danger="(type == 'hive:sell' || type == 'hbd:sell')" dmx-class:text-success="(type == 'hive:buy' || type == 'hbd:buy')">{{type.uppercase()}}</td>
                    <td role="cell" class="" aria-colindex="7"><button class="btn btn-sm btn-outline-warning" id="cancelbtn" dmx-on:click="cancelDEX('{{txid}}','spkcc_')">CANCEL</button></td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr role="row" class="" >
                    <td role="cell" class="" colspan="7" aria-colindex="1"><!-- pagination -->
                      <div class="d-flex flex-fill justify-content-between align-items-center" dmx-show="openorders.pages > 1">
                        <div class="col-1 m-0 p-0 text-left"><a class="btn btn-secondary" href="javascript:void(0);" dmx-on:click="openorders.prev()" dmx-show="openorders.has.prev"><i class="fa fa-angle-left"></i></a></div>
                        <div class="d-flex">
                          <p class="m-0 p-0 text-muted">Page {{openorders.page}} of {{openorders.pages}}</p>
                        </div>
                        <div class="col-1 m-0 p-0 text-right"><a class="btn btn-secondary" href="javascript:void(0)" dmx-on:click="openorders.next()" dmx-show="openorders.has.next"><i class="fa fa-angle-right"></i></a></div>
                      </div></td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div id="tradeForms">
        <div class="row">
          <div class="mt-3 col-md-6">
            <h4>Buy LARYNX</h4>
            <form name="buy" class="form-horizontal needs-validation" dmx-bind:action="javascript:buyDEX('{{buyHiveTotal.value}}','{{buyHBDTotal.value}}','{{buyQuantity.value}}','{{buyHours.value}}','spkcc_')">
              <div class="form-group" id="buy-type" aria-labelledby="buy-type-label">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 bv-no-focus-ring col-form-label" id="buy-type-label">Order Type</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-warning active">
                          <input type="radio" name="buyType" id="buylimit" checked dmx-on:click="buyQuantity.setValue('');buyHours.setValue('720')">
                          LIMIT </label>
                        <label class="btn btn-outline-warning">
                          <input type="radio" name="buyType" id="buymarket" dmx-on:click="buyQuantity.setValue('0');buyHours.setValue('0')">
                          MARKET </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group"for="buyQuantity" id="buy-qty" aria-labelledby="buy-qty-label" dmx-hide="buymarket.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="buy-qty-label">Quantity</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" required class="form-control bg-dark border-dark text-white-50" id="buyQuantity" placeholder="0" min="0.001" step="0.001" aria-required="true" dmx-bind:readonly="buymarket.checked">
                      <div class="input-group-append">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">LARYNX</div>
                      </div>
                      <div class="invalid-feedback"> Minimum quantity is 0.001 </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" for="buyPrice" id="buy-price" aria-labelledby="buy-price-label" dmx-hide="buymarket.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="buy-total-label">Price</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input id="buyPrice" type="number" placeholder="0" required step="0.000001" min="0" aria-required="true" class="form-control bg-dark border-dark text-white-50"  dmx-bind:readonly="buymarket.checked">
                      <div class="input-group-append">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix"><span dmx-show="buyhive.checked">HIVE</span><span dmx-show="buyhbd.checked">HBD</span>/LARYNX</div>
                      </div>
                      <div class="invalid-feedback"> Minimum price is 0.000001 </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" for="buyHours" id="buy-hours" aria-labelledby="buy-hours-label" dmx-hide="buymarket.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="buy-total-label">Expiration</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input id="buyHours" type="number" value="720" required step="1" min="1" max="720" aria-required="true" class="form-control bg-dark border-dark text-white-50"  dmx-bind:readonly="buymarket.checked">
                      <div class="input-group-append">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">HOURS</div>
                      </div>
                      <div class="invalid-feedback"> Expiration must be between 1 and 720 hours </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" for="buyHiveTotal" id="buy-hive-total" aria-labelledby="buy-hive-total-label" dmx-show="buyhive.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="buy-hive-total-label">Total</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" class="form-control bg-dark border-dark text-info" dmx-class:disabled-input="buylimit.checked" dmx-bind:readonly="buyhbd.checked" dmx-bind:value="buyhive.checked.then((buyPrice.value*buyQuantity.value).toFixed(3),'0')" id="buyHiveTotal" placeholder="0" min="0.001" step="0.001" aria-required="true" dmx-bind:max="">
                      <div class="input-group-append">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">HIVE</div>
                      </div>
                      <div class="invalid-feedback"> Minimum total is 0.001 - increase the quantity or price </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" for="buyHBDTotal" id="buy-hbd-total" aria-labelledby="buy-hbd-total-label" dmx-show="buyhbd.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="buy-hbd-total-label">Total</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" class="form-control bg-dark border-dark text-info" dmx-class:disabled-input="buylimit.checked" dmx-bind:readonly="buyhive.checked" id="buyHBDTotal" dmx-bind:value="buyhbd.checked.then((buyPrice.value*buyQuantity.value).toFixed(3),'0')" placeholder="0" min="0.001" step="0.001" dmx-bind:max="" aria-required="true">
                      <div class="input-group-append">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">HBD</div>
                      </div>
                      <div class="invalid-feedback"> Minimum total is 0.001 - increase the quantity or price </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-success">Buy</button>
              </div>
            </form>
          </div>
          <div class="mt-3 col-md-6">
            <h4>Sell LARYNX</h4>
            <form name="sell" class="form-horizontal needs-validation" dmx-bind:action="javascript:sellDEX('{{sellQuantity.value}}','{{sellHiveTotal.value}}','{{sellHBDTotal.value}}','{{sellHours.value}}','spkcc_')">
              <div class="form-group" id="sell-type" aria-labelledby="sell-type-label">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 bv-no-focus-ring col-form-label" id="sell-type-label">Order Type</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-warning active">
                          <input type="radio" name="sellType" id="selllimit" checked dmx-on:click="sellPrice.setValue('');sellHours.setValue('720')">
                          LIMIT </label>
                        <label class="btn btn-outline-warning">
                          <input type="radio" name="sellType" id="sellmarket" dmx-on:click="sellPrice.setValue('0');sellHours.setValue('0')">
                          MARKET </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" for="sellQuantity" id="sell-qty" aria-labelledby="sell-qty-label">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="sell-qty-label">Quantity</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" required class="form-control bg-dark border-dark text-white-50" id="sellQuantity" placeholder="0" min="0.004" step="0.001" aria-required="true" >
                      <div class="input-group-append">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">LARYNX</div>
                      </div>
                      <div class="invalid-feedback"> Minimum quantity is 0.004 </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" for="sellPrice" id="sell-price" aria-labelledby="sell-price-label" dmx-hide="sellmarket.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="sell-total-label">Price</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input id="sellPrice" type="number" placeholder="0" required step="0.000001" min="0" aria-required="true" class="form-control bg-dark border-dark text-white-50"  dmx-bind:readonly="sellmarket.checked">
                      <div class="input-group-append">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix"><span dmx-show="buyhive.checked">HIVE</span><span dmx-show="buyhbd.checked">HBD</span>/LARYNX</div>
                      </div>
                      <div class="invalid-feedback"> Minimum price is 0.000001 </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" for="sellHours" id="sell-hours" aria-labelledby="sell-hours-label" dmx-hide="sellmarket.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="sell-total-label">Expiration</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input id="sellHours" type="number" value="720" required step="1" min="1" max="720" aria-required="true" class="form-control bg-dark border-dark text-white-50"  dmx-bind:readonly="sellmarket.checked">
                      <div class="input-group-append">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">HOURS</div>
                      </div>
                      <div class="invalid-feedback"> Expiration must be between 1 and 720 hours </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" for="sellHiveTotal" id="sell-hive-total" aria-labelledby="sell-hive-total-label" dmx-show="buyhive.checked && selllimit.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="sell-hive-total-label">Total</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" class="form-control bg-dark border-dark text-info disabled-input" 
							 dmx-bind:readonly="buyhbd.checked || sellmarket.checked" id="sellHiveTotal" 
							 dmx-bind:value="buyhive.checked.then((sellPrice.value*sellQuantity.value).toFixed(3),'0')" 
							  placeholder="0" min="0.004" step="0.001" aria-required="true" dmx-bind:max="">
                      <div class="input-group-append">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">HIVE</div>
                      </div>
                      <div class="invalid-feedback"> Minimum total is 0.004 - increase the quantity or price </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" for="sellHBDTotal" id="sell-hbd-total" aria-labelledby="sell-hbd-total-label" dmx-show="buyhbd.checked && selllimit.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="sell-hbd-total-label">Total</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" class="form-control bg-dark border-dark text-info disabled-input" 
							 dmx-bind:readonly="buyhive.checked || sellmarket.checked" id="sellHBDTotal" 
							 dmx-bind:value="buyhbd.checked.then((sellPrice.value*sellQuantity.value).toFixed(3),'0')" 
							 placeholder="0" min="0.004" step="0.001" dmx-bind:max="" aria-required="true">
                      <div class="input-group-append">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">HBD</div>
                      </div>
                      <div class="invalid-feedback"> Minimum total is 0.004 - increase the quantity or price </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-danger">Sell</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div id="hiveData"  dmx-show="buyhive.checked">
        <div id="hiveMarketOrders">
          <div class="row">
            <div class="mt-3 col-md-6">
              <h4>Buy Orders</h4>
              <div class="table-responsive">
                <table role="table" aria-busy="false" aria-colcount="4" class="table table-dark bg-darker text-white table-striped table-hover table-borderless" id="hivebuyordertable">
                  <thead role="rowgroup" class="">
                    <tr role="row" class="">
                      <th role="columnheader" scope="col" aria-colindex="1" class="">TOTAL HIVE</th>
                      <th role="columnheader" scope="col" aria-colindex="2" class=""><div>HIVE</div></th>
                      <th role="columnheader" scope="col" aria-colindex="3" class="">LARYNX</th>
                      <th role="columnheader" scope="col" aria-colindex="4" class=""><div>BID</div></th>
                    </tr>
                  </thead>
                  <tbody role="rowgroup">
                    <!--repeat region-->
                    <tr class="" role="row" dmx-repeat:hivebuyorders="hivebuys.data.groupBy('rate')">
                      <td aria-colindex="1" role="cell" class=""></td>
                      <td aria-colindex="2" role="cell" class="">{{($value.sum('hive')/1000).formatNumber('3','.',',')}}</td>
                      <td aria-colindex="3" role="cell" class="">{{($value.sum('amount')/1000).formatNumber('3','.',',')}}</td>
                      <td aria-colindex="4" role="cell" class="text-primary"><a href="#" dmx-on:click="javascript:insertBal('{{$key}}', 'buyPrice')">{{$key}}</a></td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr role="row" class="" >
                      <td role="cell" class="" colspan="7" aria-colindex="1"><!-- pagination -->
                        <div class="d-flex flex-fill justify-content-between align-items-center" dmx-show="hivebuys.pages > 1">
                          <div class="col-1 m-0 p-0 text-left"><a class="btn btn-secondary" href="javascript:void(0);" dmx-on:click="hivebuys.prev()" dmx-show="hivebuys.has.prev"><i class="fa fa-angle-left"></i></a></div>
                          <div class="d-flex">
                            <p class="m-0 p-0 text-muted">Page {{hivebuys.page}} of {{hivebuys.pages}}</p>
                          </div>
                          <div class="col-1 m-0 p-0 text-right"><a class="btn btn-secondary" href="javascript:void(0)" dmx-on:click="hivebuys.next()" dmx-show="hivebuys.has.next"><i class="fa fa-angle-right"></i></a></div>
                        </div></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <div class="mt-3 col-md-6">
              <h4>Sell Orders</h4>
              <div class="table-responsive">
                <table role="table" aria-busy="false" aria-colcount="4" class="table table-dark bg-darker text-white table-striped table-hover table-borderless" id="hivesellorderstable">
                  <thead role="rowgroup" class="">
                    <tr role="row" class="">
                      <th role="columnheader" scope="col" aria-colindex="1" class=""><div>ASK</div></th>
                      <th role="columnheader" scope="col" aria-colindex="2" class="">LARYNX</th>
                      <th role="columnheader" scope="col" aria-colindex="3" class=""><div>HIVE</div></th>
                      <th role="columnheader" scope="col" aria-colindex="4" class="">TOTAL HIVE</th>
                    </tr>
                  </thead>
                  <tbody role="rowgroup">
                    <!--repeat region-->
                    <tr class="" role="row" dmx-repeat:hivesellorders="hivesells.data.groupBy('rate')">
                      <td aria-colindex="1" role="cell" class="text-primary"><a href="#" dmx-on:click="javascript:insertBal('{{$key}}', 'sellPrice')">{{$key}}</a></td>
                      <td aria-colindex="2" role="cell" class="">{{($value.sum('amount')/1000).formatNumber('3','.',',')}}</td>
                      <td aria-colindex="3" role="cell" class="">{{($value.sum('hive')/1000).formatNumber('3','.',',')}}</td>
                      <td aria-colindex="4" role="cell" class=""></td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr role="row" class="" >
                      <td role="cell" class="" colspan="7" aria-colindex="1"><!-- pagination -->
                        <div class="d-flex flex-fill justify-content-between align-items-center" dmx-show="hivesells.pages > 1">
                          <div class="col-1 m-0 p-0 text-left"><a class="btn btn-secondary" href="javascript:void(0);" dmx-on:click="hivesells.prev()" dmx-show="hivesells.has.prev"><i class="fa fa-angle-left"></i></a></div>
                          <div class="d-flex">
                            <p class="m-0 p-0 text-muted">Page {{hivesells.page}} of {{hivesells.pages}}</p>
                          </div>
                          <div class="col-1 m-0 p-0 text-right"><a class="btn btn-secondary" href="javascript:void(0)" dmx-on:click="hivesells.next()" dmx-show="hivesells.has.next"><i class="fa fa-angle-right"></i></a></div>
                        </div></td>
                    </tr>
                  </tfoot>
                  <!---->
                </table>
              </div>
            </div>
          </div>
        </div>
        <div id="hiveTradeHistory">
          <div class="row">
            <div class="mt-3 col-12">
              <h4>Trade History</h4>
              <div class="table-responsive">
                <table role="table" aria-busy="false" aria-colcount="4" class="table table-dark bg-darker text-white table-striped table-hover table-borderless" id="hivetradehistorytable">
                  <thead role="rowgroup" class="">
                    <tr role="row">
                      <th role="columnheader" scope="col" aria-colindex="1" class="" >PRICE</th>
                      <th role="columnheader" scope="col" aria-colindex="2" class="">QTY</th>
                      <th role="columnheader" scope="col" aria-colindex="3" class="">TIME</th>
                    </tr>
                  </thead>
                  <tbody role="rowgroup">
                    <!--repeat region-->
                    <tr class="" role="row" dmx-repeat:hiveorderhistory="recenthive.data">
                      <td aria-colindex="1" role="cell" class="" dmx-class:text-danger="type == 'sell'" dmx-class:text-success="type == 'buy'">{{price}}</td>
                      <td aria-colindex="2" role="cell" class="">{{target_volume}}</td>
                      <td aria-colindex="3" role="cell" class="">{{trade_timestamp.toBetterDate()}}</td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr role="row" class="" >
                      <td role="cell" class="" colspan="7" aria-colindex="1"><!-- pagination -->
                        <div class="d-flex flex-fill justify-content-between align-items-center" dmx-show="recenthive.pages > 1">
                          <div class="col-1 m-0 p-0 text-left"><a class="btn btn-secondary" href="javascript:void(0);" dmx-on:click="recenthive.prev()" dmx-show="recenthive.has.prev"><i class="fa fa-angle-left"></i></a></div>
                          <div class="d-flex">
                            <p class="m-0 p-0 text-muted">Page {{recenthive.page}} of {{recenthive.pages}}</p>
                          </div>
                          <div class="col-1 m-0 p-0 text-right"><a class="btn btn-secondary" href="javascript:void(0)" dmx-on:click="recenthive.next()" dmx-show="recenthive.has.next"><i class="fa fa-angle-right"></i></a></div>
                        </div></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="hbdData"  dmx-show="buyhbd.checked">
        <div id="hbdMarketOrders">
          <div class="row">
            <div class="mt-3 col-md-6">
              <h4>Buy Orders</h4>
              <div class="table-responsive">
                <table role="table" aria-busy="false" aria-colcount="4" class="table table-dark bg-darker text-white table-striped table-hover table-borderless" id="hbdbuyordertable">
                  <thead role="rowgroup" class="">
                    <tr role="row" class="">
                      <th role="columnheader" scope="col" aria-colindex="1" class="">TOTAL HBD</th>
                      <th role="columnheader" scope="col" aria-colindex="2" class=""><div>HBD</div></th>
                      <th role="columnheader" scope="col" aria-colindex="3" class="">LARYNX</th>
                      <th role="columnheader" scope="col" aria-colindex="4" class=""><div>BID</div></th>
                    </tr>
                  </thead>
                  <tbody role="rowgroup">
                    <!--repeat region-->
                    <tr class="" role="row" dmx-repeat:hbdbuyorders="hbdbuys.data.groupBy('rate')">
                      <td aria-colindex="1" role="cell" class=""></td>
                      <td aria-colindex="2" role="cell" class="">{{($value.sum('hbd')/1000).formatNumber('3','.',',')}}</td>
                      <td aria-colindex="3" role="cell" class="">{{($value.sum('amount')/1000).formatNumber('3','.',',')}}</td>
                      <td aria-colindex="4" role="cell" class=""><a href="#" dmx-on:click="javascript:insertBal('{{$key}}', 'buyPrice')">{{$key}}</a></td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr role="row" class="" >
                      <td role="cell" class="" colspan="7" aria-colindex="1"><!-- pagination -->
                        <div class="d-flex flex-fill justify-content-between align-items-center" dmx-show="hbdbuys.pages > 1">
                          <div class="col-1 m-0 p-0 text-left"><a class="btn btn-secondary" href="javascript:void(0);" dmx-on:click="hbdbuys.prev()" dmx-show="hbdbuys.has.prev"><i class="fa fa-angle-left"></i></a></div>
                          <div class="d-flex">
                            <p class="m-0 p-0 text-muted">Page {{hbdbuys.page}} of {{hbdbuys.pages}}</p>
                          </div>
                          <div class="col-1 m-0 p-0 text-right"><a class="btn btn-secondary" href="javascript:void(0)" dmx-on:click="hbdbuys.next()" dmx-show="hbdbuys.has.next"><i class="fa fa-angle-right"></i></a></div>
                        </div></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <div class="mt-3 col-md-6">
              <h4>Sell Orders</h4>
              <div class="table-responsive">
                <table role="table" aria-busy="false" aria-colcount="4" class="table table-dark bg-darker text-white table-striped table-hover table-borderless" id="hbdsellorderstable">
                  <thead role="rowgroup" class="">
                    <tr role="row" class="">
                      <th role="columnheader" scope="col" aria-colindex="1" class=""><div>ASK</div></th>
                      <th role="columnheader" scope="col" aria-colindex="2" class="">LARYNX</th>
                      <th role="columnheader" scope="col" aria-colindex="3" class=""><div>HBD</div></th>
                      <th role="columnheader" scope="col" aria-colindex="4" class="">TOTAL HBD</th>
                    </tr>
                  </thead>
                  <tbody role="rowgroup">
                    <!--repeat region-->
                    <tr class="" role="row" dmx-repeat:hbdsellorders="hbdsells.data.groupBy('rate')" dmx-class:border-warning="txid == 'DLUXICO'">
                      <td aria-colindex="1" role="cell" class=""><a href="#" dmx-on:click="javascript:insertBal('{{$key}}', 'sellPrice')">{{$key}}</a></td>
                      <td aria-colindex="2" role="cell" class="">{{($value.sum('amount')/1000).formatNumber('3','.',',')}}</td>
                      <td aria-colindex="3" role="cell" class="">{{($value.sum('hbd')/1000).formatNumber('3','.',',')}}</td>
                      <td aria-colindex="4" role="cell" class=""></td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr role="row" class="" >
                      <td role="cell" class="" colspan="7" aria-colindex="1"><!-- pagination -->
                        <div class="d-flex flex-fill justify-content-between align-items-center" dmx-show="hbdsells.pages > 1">
                          <div class="col-1 m-0 p-0 text-left"><a class="btn btn-secondary" href="javascript:void(0);" dmx-on:click="hbdsells.prev()" dmx-show="hbdsells.has.prev"><i class="fa fa-angle-left"></i></a></div>
                          <div class="d-flex">
                            <p class="m-0 p-0 text-muted">Page {{hbdsells.page}} of {{hbdsells.pages}}</p>
                          </div>
                          <div class="col-1 m-0 p-0 text-right"><a class="btn btn-secondary" href="javascript:void(0)" dmx-on:click="hbdsells.next()" dmx-show="hbdsells.has.next"><i class="fa fa-angle-right"></i></a></div>
                        </div></td>
                    </tr>
                  </tfoot>
                  <!---->
                </table>
              </div>
            </div>
          </div>
        </div>
        <div id="hbdTradeHistory">
          <div class="row">
            <div class="mt-3 col-12">
              <h4>Trade History</h4>
              <div class="table-responsive">
                <table role="table" aria-busy="false" aria-colcount="4" class="table table-dark bg-darker text-white table-striped table-hover table-borderless" id="hbdtradehistorytable">
                  <thead role="rowgroup" class="">
                    <tr role="row">
                      <th role="columnheader" scope="col" aria-colindex="1" class="" >PRICE</th>
                      <th role="columnheader" scope="col" aria-colindex="2" class="">QTY</th>
                      <th role="columnheader" scope="col" aria-colindex="3" class="">TIME</th>
                    </tr>
                  </thead>
                  <tbody role="rowgroup">
                    <!--repeat region-->
                    <tr class="" role="row" dmx-repeat:hbdorderhistory="recenthbd.data">
                      <td aria-colindex="1" role="cell" class="" dmx-class:text-danger="type == 'sell'" dmx-class:text-success="type == 'buy'">{{price}}</td>
                      <td aria-colindex="2" role="cell" class="">{{target_volume}}</td>
                      <td aria-colindex="3" role="cell" class="">{{trade_timestamp.toBetterDate()}}</td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr role="row" class="" >
                      <td role="cell" class="" colspan="7" aria-colindex="1"><!-- pagination -->
                        <div class="d-flex flex-fill justify-content-between align-items-center" dmx-show="recenthbd.pages > 1">
                          <div class="col-1 m-0 p-0 text-left"><a class="btn btn-secondary" href="javascript:void(0);" dmx-on:click="recenthbd.prev()" dmx-show="recenthbd.has.prev"><i class="fa fa-angle-left"></i></a></div>
                          <div class="d-flex">
                            <p class="m-0 p-0 text-muted">Page {{recenthbd.page}} of {{recenthbd.pages}}</p>
                          </div>
                          <div class="col-1 m-0 p-0 text-right"><a class="btn btn-secondary" href="javascript:void(0)" dmx-on:click="recenthbd.next()" dmx-show="recenthbd.has.next"><i class="fa fa-angle-right"></i></a></div>
                        </div></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/footer.php";
include_once( $path );
?>
</body>
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
    setTimeout(function(){ 
      totals()
  }, 1000);
});
})()
function totals (){
        var HBDBTotal = 0,
        HBDSTotal = 0,
        HBD24 = 0,
        HiveBTotal = 0,
        HiveSTotal = 0,
        Hive24 = 0,
        HBDH = '', HBDB = '', HBDS = '', HIVEH = '', HIVEB = '', HIVES = ''
      try {
        HBDH = document.getElementById('hbdtradehistorytable').getElementsByTagName('tbody')[0].getElementsByTagName('tr')
        HBDB = document.getElementById('hbdbuyordertable').getElementsByTagName('tbody')[0].getElementsByTagName('tr')
        HBDS = document.getElementById('hbdsellorderstable').getElementsByTagName('tbody')[0].getElementsByTagName('tr')
        HIVEH = document.getElementById('hivetradehistorytable').getElementsByTagName('tbody')[0].getElementsByTagName('tr')
        HIVEB = document.getElementById('hivebuyordertable').getElementsByTagName('tbody')[0].getElementsByTagName('tr')
        HIVES = document.getElementById('hivesellorderstable').getElementsByTagName('tbody')[0].getElementsByTagName('tr')
      } catch (e) {console.log(e);
      setTimeout(() => {
          totals()
        }, 1000);
      }
      if(HIVES.length ){
        for(var i = 0; i < HIVES.length; i++){
          HiveSTotal += parseFloat(HIVES[i].getElementsByTagName('td')[2].innerText.replace(/,/g, ''))
          HIVES[i].getElementsByTagName('td')[3].innerText = parseFloat(HiveSTotal).toFixed(3)
        }
        for(var i = 0; i < HBDS.length; i++){
          HBDSTotal += parseFloat(HBDS[i].getElementsByTagName('td')[2].innerText.replace(/,/g, ''))
          HBDS[i].getElementsByTagName('td')[3].innerText = parseFloat(HBDSTotal).toFixed(3)
        }
        for(var i = 0; i < HIVEB.length; i++){
          HiveBTotal += parseFloat(HIVEB[i].getElementsByTagName('td')[1].innerText.replace(/,/g, ''))
          HIVEB[i].getElementsByTagName('td')[0].innerText = parseFloat(HiveBTotal).toFixed(3)
        }
        for(var i = 0; i < HBDB.length; i++){
          HBDBTotal += parseFloat(HBDB[i].getElementsByTagName('td')[1].innerText.replace(/,/g, ''))
          HBDB[i].getElementsByTagName('td')[0].innerText = parseFloat(HBDBTotal).toFixed(3)
        }
        for(var i = 0; i < HIVEH.length; i++){
          //console.log(Date.now() - (new Date(HIVEH[i].getElementsByTagName('td')[2].innerText + ':00.000Z').valueOf()) , 86400000)
          try{
            if (Date.now() - (new Date(HIVEH[i].getElementsByTagName('td')[2].innerText + ':00.000Z').valueOf()) < 86400000)
              Hive24 += parseFloat(HIVEH[i].getElementsByTagName('td')[1].innerText)
          } catch (e){}
        }
        for(var i = 0; i < HBDH.length; i++){
          try {
            if(Date.now() - (new Date(HBDH[i].getElementsByTagName('td')[2].innerText + ':00.000Z').valueOf()) < 86400000){
              HBD24 += parseFloat(HBDH[i].getElementsByTagName('td')[1].innerText)
            }
          } catch (e){}
        }
        document.getElementById('hbd24').innerHTML = `<h5>24h Volume</h5>${parseFloat(HBD24).toFixed(3)} HBD<br>$${parseFloat(parseFloat(document.getElementById('hbdquote').innerText.split('$')[1]) * HBD24).toFixed(2)}`
        document.getElementById('hive24').innerHTML = `<h5>24h Volume</h5>${parseFloat(Hive24).toFixed(3)} HIVE<br>$${parseFloat(parseFloat(document.getElementById('hivequote').innerText.split('$')[1]) * Hive24).toFixed(2)}`
        //console.log({Hive24, HBD24})
      } else {
        setTimeout(() => {
          totals()
        }, 1000);
      }
    }
</script>
<script>
var disabletab = document.getElementsByClassName("disabled-input");
for (var i = 0; i < disabletab.length;i++){disabletab[i].setAttribute('tabindex', '-1')}
	</script>
<script type="text/javascript" src="/js/chart.js"></script>
</html>
