<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - DEX</title>
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/header.php";
include_once( $path );
?>
<script type="text/javascript" src="/dmxAppConnect/dmxAppConnect.js"></script> 
<script type="text/javascript" src="/dmxAppConnect/dmxFormatter/dmxFormatter.js"></script>

</head>
<body class="d-flex flex-column bg-darker text-white h-100 padme-t70" id="index" is="dmx-app">
<dmx-api-datasource id="hiveprice" is="dmx-fetch" url="https://api.coingecko.com/api/v3/simple/price?ids=hive&amp;vs_currencies=usd"></dmx-api-datasource>
<dmx-api-datasource id="dexapi" is="dmx-fetch" url="https://token.dlux.io/dex/"></dmx-api-datasource>
<dmx-data-view id="hivesells" dmx-bind:data="dexapi.data.markets.hive.sells" sorton="rate" sortdir="asc"></dmx-data-view>
<dmx-data-view id="hbdsells" dmx-bind:data="dexapi.data.markets.hbd.sells" sorton="rate" sortdir="asc"></dmx-data-view>
<dmx-data-view id="hivebuys" dmx-bind:data="dexapi.data.markets.hive.buys" sorton="rate" sortdir="desc"></dmx-data-view>
<dmx-data-view id="hbdbuys" dmx-bind:data="dexapi.data.markets.hbd.buys" sorton="rate" sortdir="desc"></dmx-data-view>
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/nav.php";
include_once( $path );
?>
<main role="main" class="flex-shrink-0 text-white">
  <div class="container-fluid px-0 ">
    <div class="container text-white">
      <div id="market" class="row text-center">
        <div class="mt-2 col-lg-3">
          <h5>Market</h5>
          <div class="container-fluid">
\
			  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-outline-warning active">
                      <input type="radio" name="buyhive" id="buy-hive" checked>
                      HIVE </label>
                    <label class="btn btn-outline-warning">
                      <input type="radio" name="buyhbd" id="buy-hbd">
                      HBD </label>
                  </div>
			
          </div>
        </div>
        <div class="col-lg-9">
          <div class="row">
            <div class="mt-2 col">
              <h5>Bid</h5>
              0.09007400 <br>
              $0.203 </div>
            <div class="mt-2 col">
              <h5>Ask</h5>
              0.10635200 <br>
              $0.239 </div>
            <div class="mt-2 col">
              <h5>Last</h5>
              0.11000200 <br>
              $0.248 </div>
            <div class="mt-2 col">
              <h5>24h Volume</h5>
              903.15937252 <br>
              $2032.109 </div>
          </div>
        </div>
      </div>
      <div class="marketChart mt-3 mb-3">
          <div id="chart" style="height: 440px"></div>
        </div>
      <div id="tradeForms">
        <div class="row">
          <div class="mt-3 col-md-6">
            <h4>Buy DLUX</h4>
            <form class="form-horizontal needs-validation" dmx-bind:action="javascript:buyDEX('{{buyHiveTotal.value}}','{{buyHBDTotal.value}}','{{buyQuantity.value}','{{buyHours.value}}')">
              <div class="form-group" id="buy-type" aria-labelledby="buy-type-label">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 bv-no-focus-ring col-form-label" id="buy-type-label">Order Type</legend>
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-outline-warning active">
                      <input type="radio" name="buyType" id="buy-limit" checked>
                      LIMIT </label>
                    <label class="btn btn-outline-warning">
                      <input type="radio" name="buyType" id="buy-market" dmx-on:click="buyHiveTotal.setValue('0');buyHBDTotal.setValue('0');buyHours.setValue('0')">
                      MARKET </label>
                  </div>
                </div>
              </div>
              <div class="form-group" for="buyQuantity" id="buy-qty" aria-labelledby="buy-qty-label">
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
              <div class="form-group" for="buyHiveTotal" id="buy-hive-total" aria-labelledby="buy-hive-total-label">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="buy-hive-total-label">Total</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" required class="form-control" id="buyHiveTotal" placeholder="0" min="0.001" step="0.001" aria-required="true" dmx-bind:max="" dmx-bind:readonly="buyhbd.checked">
                      <div class="input-group-append">
                        <div class="input-group-text">HIVE</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
			  <div class="form-group" for="buyHBDTotal" id="buy-hbd-total" aria-labelledby="buy-hbd-total-label">
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
              <div class="form-group" for="buyHours" id="buy-hours" aria-labelledby="buy-hours-label">
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
            <form class="form-horizontal needs-validation" dmx-bind:action="javascript:sellDEX({{sellQuantity.value.toNumber()}},{{sellTotal.value.toNumber()}},0,{{sellHours.value.toNumber()}})">
              <div class="form-group" id="sell-type" aria-labelledby="sell-type-label">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 bv-no-focus-ring col-form-label" id="sell-type-label">Order Type</legend>
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-outline-warning active">
                      <input type="radio" name="sellType" id="sell-limit" checked>
                      LIMIT </label>
                    <label class="btn btn-outline-warning">
                      <input name="sellType" type="radio" id="sell-market" dmx-on:click="form.sellTotal.setValue('0');form.sellHours.setValue('0')">
                      MARKET </label>
                  </div>
                </div>
              </div>
              <div class="form-group" for="sellQuantity" id="sell-qty" aria-labelledby="sell-qty-label">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="sell-qty-label">Quantity</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" required class="form-control" id="sellQuantity" placeholder="0" min="0.002" step="0.001" aria-required="true">
                      <div class="input-group-append">
                        <div class="input-group-text">DLUX</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" for="sellTotal" id="sell-total" aria-labelledby="sell-total-label">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="sell-total-label">Total</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" required class="form-control" id="sellTotal" placeholder="0" min="0.001" step="0.001" aria-required="true" dmx-bind:readonly="sellmarket.checked">
                      <div class="input-group-append">
                        <div class="input-group-text">HIVE</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" for="sellHours" id="sell-hours" aria-labelledby="sell-hours-label">
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
                    <td aria-colindex="1" role="cell" class=""> {{(('buyTable'+($index-1)).value)}}
                      <input dmx-bind:id="buyTable{{$index}}" dmx-bind:value="$value.sum('hive')">
                      {{($value.sum('hive')/1000).formatNumber('3','.',',')}}</td>
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
<script src="/js/jquery-3.4.1.min.js"></script> 
<script src="/js/popper.min.js"></script> 
<script src="/js/bootstrap-4.4.1.js"></script>
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
</html>
