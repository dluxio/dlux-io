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
<script type="text/javascript" src="market.js"></script>
    <style type="text/css">/* Chart.js */
/*
 * DOM element rendering detection
 * https://davidwalsh.name/detect-node-insertion
 */
@keyframes chartjs-render-animation {
	from { opacity: 0.99; }
	to { opacity: 1; }
}

.chartjs-render-monitor {
	animation: chartjs-render-animation 0.001s;
}

/*
 * DOM element resizing detection
 * https://github.com/marcj/css-element-queries
 */
.chartjs-size-monitor,
.chartjs-size-monitor-expand,
.chartjs-size-monitor-shrink {
	position: absolute;
	direction: ltr;
	left: 0;
	top: 0;
	right: 0;
	bottom: 0;
	overflow: hidden;
	pointer-events: none;
	visibility: hidden;
	z-index: -1;
}

.chartjs-size-monitor-expand > div {
	position: absolute;
	width: 1000000px;
	height: 1000000px;
	left: 0;
	top: 0;
}

.chartjs-size-monitor-shrink > div {
	position: absolute;
	width: 200%;
	height: 200%;
	left: 0;
	top: 0;
}
</style>
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
            <ul id="clothingnav1" class="nav nav-tabs" role="tablist">
              <li class="nav-item"> <a class="nav-link active" href="#home1" id="hometab1" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Tab 1</a> </li>
              <li class="nav-item"> <a class="nav-link" href="#paneTwo1" role="tab" id="hatstab1" data-toggle="tab" aria-controls="hats">Tab 2</a> </li>
              <!-- Dropdown -->
              <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> Tab 3 Dropdown </a>
                <div class="dropdown-menu"> <a class="dropdown-item" href="#tabDropDownOne1" role="tab" id="dropdownshoestab1" data-toggle="tab" aria-controls="dropdownShoes">Dropdown Link 1</a> <a class="dropdown-item" href="#tabDropDownTwo1" role="tab" id="dropdownbootstab1" data-toggle="tab" aria-controls="dropdownBoots">Dropdown Link 2</a> </div>
              </li>
            </ul>
            <!-- Content Panel -->
            <div id="clothingnavcontent1" class="tab-content">
              <div role="tabpanel" class="tab-pane fade show active" id="home1" aria-labelledby="hometab1">
                <p>Content in <b>Tab Panel 1</b></p>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="paneTwo1" aria-labelledby="hatstab1">
                <p>Content 2</p>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="tabDropDownOne1" aria-labelledby="dropdownshoestab1">
                <p>Dropdown content#1</p>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="tabDropDownTwo1" aria-labelledby="dropdownbootstab1">
                <p>Dropdown content#2</p>
              </div>
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
      <div class="marketChart mt-3 mb-3"><!---->
        <div class="">
          <div class="chartjs-size-monitor">
            <div class="chartjs-size-monitor-expand">
              <div class=""></div>
            </div>
            <div class="chartjs-size-monitor-shrink">
              <div class=""></div>
            </div>
          </div>
          <canvas id="candlestick-chart" width="1020" height="800" style="display: block; height: 400px; width: 510px;"></canvas>
        </div>
        <!---->
        <div class="mt-2 text-center">
          <button type="button" class="btn btn-info btn-sm">Candlestick</button>
          <button type="button" class="btn btn-info btn-sm">Depth</button>
          <button type="button" class="btn btn-info btn-sm">Volume</button>
        </div>
      </div>
      <div id="tradeForms">
        <div class="row">
          <div class="mt-3 col-md-6">
            <h4>Buy DLUX</h4>
            <form class="form-horizontal needs-validation" dmx-bind:action="javascript:buyDEX('{{buyPrice.value}}','{{buyTotal.value}}','{{buyQuantity.value}}','{{buyHours.value}}'">
              <fieldset class="form-group" id="buy-type" aria-labelledby="buy-type-label">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 bv-no-focus-ring col-form-label" id="buy-type-label">Order Type</legend>
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-outline-warning active">
                      <input type="radio" name="buyType" id="buy-limit" checked>
                      LIMIT </label>
                    <label class="btn btn-outline-warning">
                      <input type="radio" name="buyType" id="buy-market">
                      MARKET </label>
                  </div>
                </div>
              </fieldset>
              <fieldset class="form-group" for="buyPrice" id="buy-price" aria-labelledby="buy-price-label">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="buy-price-label">Price</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" required class="form-control" id="buyPrice" placeholder="0" min="0.001" step="any" aria-required="true" dmx-bind:readonly="buymarket.checked">
                      <div class="input-group-append">
                        <div class="input-group-text">HIVE/DLUX</div>
                      </div>
                    </div>
                  </div>
                </div>
              </fieldset>
              <fieldset class="form-group" for="buyQuantity" id="buy-qty" aria-labelledby="buy-qty-label">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="buy-qty-label">Quantity</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" required class="form-control" id="buyQuantity" placeholder="0" min="0.001" step="any" aria-required="true" dmx-bind:readonly="buymarket.checked">
                      <div class="input-group-append">
                        <div class="input-group-text">DLUX</div>
                      </div>
                    </div>
                  </div>
                </div>
              </fieldset>
              <fieldset class="form-group" for="buyTotal" id="buy-total" aria-labelledby="buy-total-label">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="buy-total-label">Total</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" required class="form-control" id="buyTotal" placeholder="0" min="0.001" step="any" aria-required="true" dmx-bind:readonly="buylimit.checked" dmx-bind:value="buyPrice.value*buyQuantity.value">
                      <div class="input-group-append">
                        <div class="input-group-text">HIVE</div>
                      </div>
                    </div>
                  </div>
                </div>
              </fieldset>
              <fieldset class="form-group" for="buyHours" id="buy-hours" aria-labelledby="buy-hours-label">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="buy-total-label">Time</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input id="buyHours" type="number" value="720" required step="any" aria-required="true" class="form-control">
                      <div class="input-group-append">
                        <div class="input-group-text">Hours</div>
                      </div>
                    </div>
                  </div>
                </div>
              </fieldset>
              <div class="text-right">
                <button type="submit" class="btn btn-success">Buy</button>
              </div>
            </form>
          </div>
          <div class="mt-3 col-md-6">
            <h4>Sell DLUX</h4>
            <form class="form-horizontal needs-validation" dmx-bind:action="javascript:sellDEX('{{sellPrice.value}}','{{sellTotal.value}}','{{sellQuantity.value}}','{{sellHours.value}}'">
              <fieldset class="form-group" id="sell-type" aria-labelledby="sell-type-label">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 bv-no-focus-ring col-form-label" id="sell-type-label">Order Type</legend>
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-outline-warning active">
                      <input type="radio" name="sellType" id="sell-limit" checked>
                      LIMIT </label>
                    <label class="btn btn-outline-warning">
                      <input type="radio" name="sellType" id="sell-market">
                      MARKET </label>
                  </div>
                </div>
              </fieldset>
              <fieldset class="form-group" for="sellPrice" id="sell-price" aria-labelledby="sell-price-label">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="sell-price-label">Price</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" required class="form-control readonly" id="sellPrice" placeholder="0" min="0.001" step="any" aria-required="true" dmx-bind:readonly="sellmarket.checked">
                      <div class="input-group-append">
                        <div class="input-group-text">HIVE/DLUX</div>
                      </div>
                    </div>
                  </div>
                </div>
              </fieldset>
              <fieldset class="form-group" for="sellQuantity" id="sell-qty" aria-labelledby="sell-qty-label">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="sell-qty-label">Quantity</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" required class="form-control" id="sellQuantity" placeholder="0" min="0.001" step="any" aria-required="true">
                      <div class="input-group-append">
                        <div class="input-group-text">DLUX</div>
                      </div>
                    </div>
                  </div>
                </div>
              </fieldset>
              <fieldset class="form-group" for="sellTotal" id="sell-total" aria-labelledby="sell-total-label">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="sell-total-label">Total</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" required class="form-control" id="sellTotal" placeholder="0" min="0.001" step="any" aria-required="true" dmx-bind:readonly="sellmarket.checked" dmx-bind:value="sellPrice.value*sellQuantity.value">
                      <div class="input-group-append">
                        <div class="input-group-text">HIVE</div>
                      </div>
                    </div>
                  </div>
                </div>
              </fieldset>
              <fieldset class="form-group" for="sellHours" id="sell-hours" aria-labelledby="sell-hours-label">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="sell-total-label">Time</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input id="sellHours" type="number" value="720" required step="any" aria-required="true" class="form-control">
                      <div class="input-group-append">
                        <div class="input-group-text">Hours</div>
                      </div>
                    </div>
                  </div>
                </div>
              </fieldset>
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
