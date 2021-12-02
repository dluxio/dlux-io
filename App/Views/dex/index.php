<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - DEX</title>
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/header.php";
include_once( $path );
?>

<script src="https://cdn.jsdelivr.net/npm/luxon@1.26.0"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.1/dist/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@1.0.0"></script>
<script type="text/javascript" src="/js/chartf.js"></script>

</head>
<body class="d-flex flex-column bg-darker text-white h-100 padme-t70" id="index" is="dmx-app">
<dmx-api-datasource id="hiveprice" is="dmx-fetch" url="https://api.coingecko.com/api/v3/simple/price?ids=hive&amp;vs_currencies=usd"></dmx-api-datasource>
<dmx-api-datasource id="dexapi" is="dmx-fetch" url="https://token.dlux.io/dex/" ></dmx-api-datasource>
<dmx-api-datasource id="recenthiveapi" is="dmx-fetch" url="https://token.dlux.io/api/recent/HIVE_DLUX" dmx-param:depth="200"></dmx-api-datasource>
<dmx-api-datasource id="recenthbdapi" is="dmx-fetch" url="https://token.dlux.io/api/recent/HBD_DLUX" dmx-param:depth="200"></dmx-api-datasource>
<dmx-data-view id="recenthive" dmx-bind:data="recenthiveapi.data.recent_trades" sorton="rate" sortdir="desc"></dmx-data-view>
<dmx-data-view id="recenthbd" dmx-bind:data="recenthbdapi.data.recent_trades" sorton="rate" sortdir="desc"></dmx-data-view>
<dmx-data-view id="hivebuys" dmx-bind:data="dexapi.data.markets.hive.buys" sorton="rate" sortdir="desc"></dmx-data-view>
<dmx-data-view id="hivesells" dmx-bind:data="dexapi.data.markets.hive.sells" sorton="rate" sortdir="asc"></dmx-data-view>
<dmx-data-view id="hbdbuys" dmx-bind:data="dexapi.data.markets.hbd.buys" sorton="rate" sortdir="desc"></dmx-data-view>
<dmx-data-view id="hbdsells" dmx-bind:data="dexapi.data.markets.hbd.sells" sorton="rate" sortdir="asc"></dmx-data-view>


<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/nav.php";
include_once( $path );
?>
<main role="main" class="flex-shrink-0 text-white">
  <div class="container-fluid px-0 ">
    <div class="container text-white">
		<center>
		<div class="col-md-6 border rounded mt-2 mx-1 px-2 py-1 text-center small" 
						 dmx-class:border-success="dexapi.data.behind < 30" 
						 dmx-class:text-success="dexapi.data.behind < 30"	
						 dmx-class:border-warning="dexapi.data.behind >= 30"
						 dmx-class:text-warning="dexapi.data.behind >= 30"
						 dmx-class:border-danger="dexapi.data.behind > 100"
						 dmx-class:text-danger="dexapi.data.behind > 100"> DLUX is currently {{dexapi.data.behind}} blocks behind HIVE</div></center>
      <div id="market" class="row text-center">
        <div class="mt-2 col-lg-3">
          <h5>Market</h5>
          <div class="container-fluid">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-outline-warning active">
                <input name="buypair" type="radio" id="buyhive" checked dmx-on:click="buy.buyHBDTotal.setValue('0');sell.sellHBDTotal.setValue('0')">
                HIVE </label>
              <label class="btn btn-outline-warning">
                <input type="radio" name="buypair" id="buyhbd" dmx-on:click="buy.buyHiveTotal.setValue('0');sell.sellHiveTotal.setValue('0')">
                HBD </label>
            </div>
          </div>
        </div>
        <div class="col-lg-9">
          <div class="row">
            <div class="mt-2 col">
              <h5>Bid</h5>
              ? <br>
              $? </div>
            <div class="mt-2 col">
              <h5>Ask</h5>
              ? <br>
              $? </div>
            <div class="mt-2 col">
              <h5>Last</h5>
              ? <br>
              $? </div>
            <div class="mt-2 col">
              <h5>24h Volume</h5>
              ? <br>
              $? </div>
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
			<div><button id="refreshChart" class="btn btn-outline-secondary">Refresh<i class="fas fa-redo-alt ml-2"></i></button></div>
          <div id="settimescale" class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-info active">
                      <input type="radio" name="timescale" id="hourbtn" is="dmx-radio">
                      1H </label>
                    <label class="btn btn-info">
                      <input type="radio" name="timescale" id="daybtn" is="dmx-radio">
                      1D </label>
                    <label class="btn btn-info">
                      <input type="radio" name="timescale" id="weekbtn" is="dmx-radio" checked>
                      1W </label>
                    <label class="btn btn-info">
                      <input type="radio" name="timescale" id="monthbtn" is="dmx-radio">
                      1M </label>
                    <label class="btn btn-info">
                      <input type="radio" name="timescale" id="yearbtn" is="dmx-radio">
                      1Y </label>
                  </div>
			<div><button class="btn btn-outline-primary">My Orders<i class="fas fa-book-reader ml-2"></i></button></div>
        </div>
      </div>
      <div id="tradeForms">
        <div class="row">
          <div class="mt-3 col-md-6">
            <h4>Buy DLUX</h4>
            <form name="buy" class="form-horizontal needs-validation" dmx-bind:action="javascript:buyDEX('{{buyHiveTotal.value}}','{{buyHBDTotal.value}}','{{buyQuantity.value}','{{buyHours.value}}')">
              <div class="form-group" id="buy-type" aria-labelledby="buy-type-label">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 bv-no-focus-ring col-form-label" id="buy-type-label">Order Type</legend>
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-outline-warning active">
                      <input type="radio" name="buyType" id="buylimit" checked dmx-on:click="buyHours.setValue('720')">
                      LIMIT </label>
                    <label class="btn btn-outline-warning">
                      <input type="radio" name="buyType" id="buymarket" dmx-on:click="buyQuantity.setValue('0');buyHours.setValue('0')">
                      MARKET </label>
                  </div>
                </div>
              </div>
              <div class="form-group" for="buyQuantity" id="buy-qty" aria-labelledby="buy-qty-label" dmx-hide="buymarket.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="buy-qty-label">Quantity</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" required class="form-control" id="buyQuantity" placeholder="0" min="0.001" step="0.001" aria-required="true" dmx-bind:readonly="buymarket.checked">
                      <div class="input-group-append">
                        <div class="input-group-text">DLUX</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" id="buy-hive-total" aria-labelledby="buy-hive-total-label" for="buyHiveTotal" dmx-show="buyhive.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="buy-hive-total-label">Total</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" required class="form-control" value="0" id="buyHiveTotal" placeholder="0" min="0.001" step="0.001" aria-required="true" dmx-bind:max="" dmx-bind:readonly="buyhbd.checked">
                      <div class="input-group-append">
                        <div class="input-group-text">HIVE</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" id="buy-hbd-total" aria-labelledby="buy-hbd-total-label" for="buyHBDTotal" dmx-show="buyhbd.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="buy-hbd-total-label">Total</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" required class="form-control" id="buyHBDTotal" value="0" placeholder="0" min="0.001" step="0.001" dmx-bind:max="" aria-required="true" dmx-bind:readonly="buyhive.checked">
                      <div class="input-group-append">
                        <div class="input-group-text">HBD</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" for="buyHours" id="buy-hours" aria-labelledby="buy-hours-label" dmx-hide="buymarket.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="buy-total-label">Time</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input id="buyHours" type="number" value="720" required step="1" min="0" aria-required="true" class="form-control"  dmx-bind:readonly="buymarket.checked">
                      <div class="input-group-append">
                        <div class="input-group-text">Hours</div>
                      </div>
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
            <h4>Sell DLUX</h4>
            <form name="sell" class="form-horizontal needs-validation" dmx-bind:action="javascript:sellDEX('{{sellQuantity.value}}','{{sellHiveTotal.value}}','{{sellHBDTotal.value}}','{{sellHours.value}}')">
              <div class="form-group" id="sell-type" aria-labelledby="sell-type-label">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 bv-no-focus-ring col-form-label" id="sell-type-label">Order Type</legend>
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-outline-warning active">
                      <input type="radio" name="sellType" id="selllimit" checked dmx-on:click="sellHours.setValue('720')">
                      LIMIT </label>
                    <label class="btn btn-outline-warning">
                      <input name="sellType" type="radio" id="sellmarket" dmx-on:click="sellHiveTotal.setValue('0');sellHBDTotal.setValue('0');sellHours.setValue('0')">
                      MARKET </label>
                  </div>
                </div>
              </div>
              <div class="form-group" for="sellQuantity" id="sellqty" aria-labelledby="sell-qty-label">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="sell-qty-label">Quantity</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" required class="form-control" id="sellQuantity" placeholder="0" min="0.004" step="0.001" aria-required="true">
                      <div class="input-group-append">
                        <div class="input-group-text">DLUX</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" id="sellhivetotal" aria-labelledby="sell-hive-total-label" for="sellHiveTotal" dmx-show="buyhive.checked && selllimit.checked" >
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="sell-hive-total-label">Total</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" required class="form-control" id="sellHiveTotal" value="0" placeholder="0" min="0.001" step="0.001" aria-required="true" dmx-bind:readonly="buyhbd.checked || sellmarket.checked">
                      <div class="input-group-append">
                        <div class="input-group-text">HIVE</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" for="sellTotal" id="sellhbdtotal" aria-labelledby="sell-hbd-total-label" dmx-show="buyhbd.checked && selllimit.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="sell-hbd-total-label">Total</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" required class="form-control" id="sellHBDTotal" value="0" placeholder="0" min="0.001" step="0.001" aria-required="true" dmx-bind:readonly="buyhive.checked || sellmarket.checked">
                      <div class="input-group-append">
                        <div class="input-group-text">HBD</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" for="sellHours" id="sell-hours" aria-labelledby="sell-hours-label" dmx-hide="sellmarket.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="sell-total-label">Time</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input id="sellHours" type="number" value="720" required step="1" min="0" aria-required="true" class="form-control"  dmx-bind:readonly="sellmarket.checked">
                      <div class="input-group-append">
                        <div class="input-group-text">Hours</div>
                      </div>
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
      <div id="marketOrders">
        <div class="row">
          <div class="mt-3 col-md-6">
            <h4>Buy Orders</h4>
            <div class="table-responsive">
              <table role="table" aria-busy="false" aria-colcount="4" class="table table-dark bg-darker text-white table-striped table-hover table-borderless" id="buy-order-table">
                <thead role="rowgroup" class="">
                  <tr role="row" class="">
                    <th role="columnheader" scope="col" aria-colindex="1" class="">TOTAL HIVE</th>
                    <th role="columnheader" scope="col" aria-colindex="2" class=""><div>HIVE</div></th>
                    <th role="columnheader" scope="col" aria-colindex="3" class="">DLUX</th>
                    <th role="columnheader" scope="col" aria-colindex="4" class=""><div>BID</div></th>
                  </tr>
                </thead>
                <tbody role="rowgroup">
                  <!--repeat region-->
                  <tr class="" role="row" dmx-repeat:buyorders="hivebuys.data.groupBy('rate')">
                    <td aria-colindex="1" role="cell" class="">?</td>
                    <td aria-colindex="2" role="cell" class="">{{($value.sum('hive')/1000).formatNumber('3','.',',')}}</td>
                    <td aria-colindex="3" role="cell" class="">{{($value.sum('amount')/1000).formatNumber('3','.',',')}}</td>
                    <td aria-colindex="4" role="cell" class=""><a href="#">{{$key}}</a></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="mt-3 col-md-6">
            <h4>Sell Orders</h4>
            <div class="table-responsive">
              <table role="table" aria-busy="false" aria-colcount="4" class="table table-dark bg-darker text-white table-striped table-hover table-borderless" id="sell-orders-table">
                <thead role="rowgroup" class="">
                  <tr role="row" class="">
                    <th role="columnheader" scope="col" aria-colindex="1" class=""><div>ASK</div></th>
                    <th role="columnheader" scope="col" aria-colindex="2" class="">DLUX</th>
                    <th role="columnheader" scope="col" aria-colindex="3" class=""><div>HIVE</div></th>
                    <th role="columnheader" scope="col" aria-colindex="4" class="">TOTAL HIVE</th>
                  </tr>
                </thead>
                <tbody role="rowgroup">
                  <!--repeat region-->
                  <tr class="" role="row" dmx-repeat:sellorders="hivesells.data.groupBy('rate')">
                    <td aria-colindex="1" role="cell" class=""><a href="#">{{$key}}</a></td>
                    <td aria-colindex="2" role="cell" class="">{{($value.sum('amount')/1000).formatNumber('3','.',',')}}</td>
                    <td aria-colindex="3" role="cell" class="">{{($value.sum('hive')/1000).formatNumber('3','.',',')}}</td>
                    <td aria-colindex="4" role="cell" class="">?</td>
                  </tr>
                </tbody>
                <!---->
              </table>
            </div>
          </div>
        </div>
      </div>
		 <div id="tradeHistory">
        <div class="row">
          <div class="mt-3 col-12">
            <h4>Trade History (DLUX:HIVE)</h4>
            <div class="table-responsive">
              <table role="table" aria-busy="false" aria-colcount="4" class="table table-dark bg-darker text-white table-striped table-hover table-borderless" id="tradehistorytable">
                <thead role="rowgroup" class="">
                  <tr role="row">
                    
                    <th role="columnheader" scope="col" aria-colindex="1" class="" >Price</th>
                    <th role="columnheader" scope="col" aria-colindex="2" class="">Qty</th>
					  <th role="columnheader" scope="col" aria-colindex="3" class="">Timestamp</th>
                  </tr>
                </thead>
                <tbody role="rowgroup">
                  <!--repeat region-->
                  <tr class="" role="row" dmx-repeat:orderhistory="recenthive.data">
                    <td aria-colindex="1" role="cell" class="" dmx-class:text-danger="type == 'sell'" dmx-class:text-success="type == 'buy'">{{price}}</td>
                    <td aria-colindex="2" role="cell" class="">{{target_volume}}</td>
					<td aria-colindex="3" role="cell" class="">{{trade_timestamp.toBetterDate()}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="d-none">
      <div dmx-repeat:repeat1="hivebuys.data" >
        <div class="d-flex text-white flex-column flex-wrap">
          <div>Amount: {{amount}} </div>
          <div>Block: {{block}} </div>
          <div>Expire Path: {{expire_path}} </div>
          <div>Fee: {{fee}} </div>
          <div>From: {{from}} </div>
          <div>HBD: {{hbd}} </div>
          <div>HIVE: {{hive}} </div>
          <div>Rate: {{rate}} </div>
          <div>Txid: {{txid}} </div>
          <div>Type: {{type}} </div>
          <div>Key: {{key}} </div>
        </div>
      </div>
      <div dmx-repeat:repeat2="hivesells.data" >
        <div class="d-flex text-white flex-column flex-wrap">
          <div>Amount: {{amount}} </div>
          <div>Block: {{block}} </div>
          <div>Expire Path: {{expire_path}} </div>
          <div>Fee: {{fee}} </div>
          <div>From: {{from}} </div>
          <div>HBD: {{hbd}} </div>
          <div>HIVE: {{hive}} </div>
          <div>Rate: {{rate}} </div>
          <div>Txid: {{txid}} </div>
          <div>Type: {{type}} </div>
          <div>Key: {{key}} </div>
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
  }, false);
})();
</script>
	<script type="text/javascript" src="/js/chart.js"></script>
</html>
