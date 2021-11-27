<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - DEX</title>
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/header.php";
include_once( $path );
?>
</head>
<body class="d-flex flex-column bg-darker text-white h-100 padme-t70" id="index" is="dmx-app">
<dmx-api-datasource id="hiveprice" is="dmx-fetch" url="https://api.coingecko.com/api/v3/simple/price?ids=hive&amp;vs_currencies=usd"></dmx-api-datasource>
<dmx-api-datasource id="dexapi" is="dmx-fetch" url="https://token.dlux.io/dex/"></dmx-api-datasource>
<dmx-data-view id="hivesells" dmx-bind:data="dexapi.data.markets.hive.sells"></dmx-data-view>
<dmx-data-view id="hivebuys" dmx-bind:data="dexapi.data.markets.hive.buys"></dmx-data-view>
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/nav.php";
include_once( $path );
?>
<main role="main" class="flex-shrink-0 text-white">
  <div class="container-fluid px-0 "> 
    <div class="container text-white">
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
                <input type="number" required class="form-control" id="buyPrice" placeholder="0" min="0" step="any" aria-required="true" dmx-bind:readonly="buymarket.checked">
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
                <input type="number" required class="form-control" id="buyQuantity" placeholder="0" min="0" step="any" aria-required="true" dmx-bind:readonly="buymarket.checked">
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
                <input type="number" required class="form-control" id="buyTotal" placeholder="0" step="any" aria-required="true" dmx-bind:readonly="buylimit.checked" dmx-bind:value="buyPrice.value*buyQuantity.value">
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
                <input type="number" required class="form-control readonly" id="sellPrice" placeholder="0" min="0" step="any" aria-required="true" dmx-bind:readonly="sellmarket.checked">
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
                <input type="number" required class="form-control" id="sellQuantity" placeholder="0" min="0" step="any" aria-required="true" dmx-bind:readonly="sellmarket.checked">
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
                <input type="number" required class="form-control" id="sellTotal" placeholder="0" step="any" aria-required="true" dmx-bind:readonly="selllimit.checked" dmx-bind:value="sellPrice.value*sellQuantity.value">
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
            <!---->
            <tr role="row" class="">
              <th role="columnheader" scope="col" aria-colindex="1" class="">TOTAL HIVE</th>
              <th role="columnheader" scope="col" aria-colindex="2" class=""><div>HIVE</div></th>
              <th role="columnheader" scope="col" aria-colindex="3" class="">DLUX</th>
              <th role="columnheader" scope="col" aria-colindex="4" class=""><div>BID</div></th>
            </tr>
          </thead>
          <tbody role="rowgroup">
            <!--repeat region-->
            <tr class="" role="row" dmx-repeat:buyorders="hivebuys.data">
              <td aria-colindex="1" role="cell" class="">?</td>
              <td aria-colindex="2" role="cell" class="">{{hive}}</td>
              <td aria-colindex="3" role="cell" class="">{{amount}}</td>
              <td aria-colindex="4" role="cell" class=""><a href="#">{{rate}}</a></td>
            </tr>
          </tbody>
          <!---->
        </table>
      </div>
    </div>
    <div class="mt-3 col-md-6">
      <h4>Sell Orders</h4>
      <div class="table-responsive">
        <table role="table" aria-busy="false" aria-colcount="4" class="table table-dark bg-darker text-white table-striped table-hover table-borderless" id="sell-orders-table">
          <!----><!---->
          <thead role="rowgroup" class="">
            <!---->
            <tr role="row" class="">
              <th role="columnheader" scope="col" aria-colindex="1" class=""><div>ASK</div></th>
              <th role="columnheader" scope="col" aria-colindex="2" class="">DLUX</th>
              <th role="columnheader" scope="col" aria-colindex="3" class=""><div>HIVE</div></th>
              <th role="columnheader" scope="col" aria-colindex="4" class="">TOTAL HIVE</th>
            </tr>
          </thead>
          <tbody role="rowgroup">
            <!--repeat region-->
            <tr role="row" class="" dmx-repeat:buyorders="hivesells.data">
              <td aria-colindex="1" role="cell" class=""><a href="#">{{rate}}</a></td>
              <td aria-colindex="2" role="cell" class="">{{amount}}</td>
              <td aria-colindex="3" role="cell" class="">{{hive}}</td>
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
