<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - New NFT</title>
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/header.php";
include_once( $path );
?>
<script type="text/javascript" src="/dlux-io/dmxAppConnect/dmxAppConnect.js"></script>
</head>
<body class="d-flex flex-column h-100 padme-t70 text-white" id="new" is="dmx-app">
<dmx-api-datasource id="statsapi" is="dmx-fetch" url="https://token.dlux.io/stats/"></dmx-api-datasource>
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/nav.php";
include_once( $path );
?>
<main role="main" class="flex-shrink-0">
<div class="container">
  <div class="container-fluid bg-dark rounded my-5 py-3">
    <h3>Create An NFT - ALPHA v0.2</h3>
	<div class="form-row"><div class="m-0">Type</div><input id="newNFTtype" type="text" class="form-control mx-2" value="1" readonly style="width:2em"><div>NFT</div></div>
    <p class="lead">Turn a layered SVG into a set of unique, tradeable tokens!</p>
    <p>Non Fungible Tokens are now available on DLUX, each one unique, all based on a set definition that started as an SVG (scaleable vector graphics) file.</p>
    <p>At this time there are several manual steps that must have been done prior to using this form:
    <ul>
      <li>Already created an SVG file</li>
      <li>Already preppared the HTML file with SVG description data</li>
      <li>Already uploaded the HTML file to IPFS, and pinned the IPFS file</li>
    </ul>
    To proceed, you must have the IPFS hash of your file, and know the Base64 limits of your set.
    </p>
    <b>You must also be logged in as @disregardfiat - restriction lifting soon</b>
    </p>
    <p>
    <form class="needs-validation mt-4" validate dmx-bind:action="javascript:defineNFT('{{newNFTname.value}}','{{newNFTtype.value}}','{{newNFTscript.value}}','{{newNFTpermlink.value}}','{{newNFTstart.value}}','{{newNFTend.value}}','{{newNFTqty.value}}','{{newNFTscript.royalty}}','{{newNFThandling.value}}','{{newNFTmaxfee.value}}','{{newNFTbond.value}}')">
      <div class="my-4 rounded p-2 border border-primary">
        <div class="form-row">
          <div class="form-group col-6">
            <label for="newNFTname">Set Name</label>
            <input type="text" class="form-control" id="newNFTname" placeholder="Set Name" required>
            <div class="invalid-feedback"> Please enter the set name</div>
            <small class="form-text text-muted">This will be the main name of your set</small> </div>
          <div class="form-group col-6">
            <label for="newNFTpermlink">Set Permlink</label>
            <input type="text" class="form-control" id="newNFTpermlink" placeholder="/user/set-name" required>
            <div class="invalid-feedback"> Please enter the set permlink</div>
            <small class="form-text text-muted">This should be your announcment post</small> </div>
        </div>
        <div class="form-row">
          <div class="form-group col-4">
            <label for="newNFTroyalty">Royalty (0-50%)</label>
            <input type="number" class="form-control" id="newNFTroyalty" step="0.01" min="0" max="50" value="10">
            <small class="form-text text-muted">The percent paid back to you from each future DLUX contract containing any asset from the set.</small> </div>
          <div class="form-group col-4">
            <label for="newNFTbond">Bond Value (0-?)</label>
            <input type="number" class="form-control" id="newNFTbond" step="0.001" min="0" value="0">
            <small class="form-text text-muted">Enter any amount of DLUX you would like to bond into each asset. The asset can be melted by the owner to receive the bond inside.</small> </div>
          <div class="form-group col-4">
            <label for="newNFThandling">Handling</label>
            <input type="text" class="form-control" id="newNFThandling" value="svg" required readonly>
            <div class="invalid-feedback">Only SVG is available at this time.</div>
            <small class="form-text text-muted">What type of asset are you using to create this set?</small> </div>
        </div>
        <div class="form-row">
          <div class="form-group col-12">
            <label for="newNFTroyalty">Script</label>
            <input type="text" class="form-control" id="newNFTscript" required>
            <small class="form-text text-muted">The IPFS hash of the html file containing the SVG information and range</small> </div>
        </div>
      </div>
      <div class="my-4 rounded p-2 border border-info">
        <div class="form-row">
          <div class="form-group col-4">
            <label for="newNFTstart">Mint Range Start</label>
            <input type="text" class="form-control" id="newNFTstart" placeholder="Base64 number" required>
            <div class="invalid-feedback">You must enter the end of the possible minting range</div>
            <small class="form-text text-muted">What is the start of the range you wish to issue mints from?<br>
            <b>Must be in Base64</b></small> </div>
          <div class="form-group col-4">
            <label for="newNFTend">Mint Range End</label>
            <input type="text" class="form-control" id="newNFTend" placeholder="Base64 number" required>
            <div class="invalid-feedback">You must enter the end of the possible minting range</div>
            <small class="form-text text-muted">What is the end of the range you wish to issue mints from?<br>
            <b>Must be in Base64</b></small> </div>
          <div class="form-group col-4">
            <label for="newNFTqty">Mint Quantity (1-?)</label>
            <input type="number" class="form-control" id="newNFTqty" step="1" min="1" value="1" required>
            <div class="invalid-feedback"> Please enter the number of mints you'd like to purchase now.</div>
            <small class="form-text text-muted">How many mints are you purchasing at this time?</small> </div>
        </div>
      </div>
      <div class="form-row">
		<div class="col-6">
    <ul>
	  <li>Mint Purchase Qty: {{form.newNFTqty.value}}</li>
      <li>Set Definition Fee: {{(statsapi.data.result.nft_fee_1/1000).formatNumber('3','.',',')}} DLUX</li>
      <li>Minting Fee (each byte): {{(statsapi.data.result.nft_byte_cost/1000).formatNumber('3','.',',')}} DLUX</li>
	<li>Total Minting Fee (each): {{bytecost.value*(39+(newNFTname.value.split("").length)+((newNFTend.value.split("").length)*2))}} DLUX</li>
      <li>Bond Value (each): {{newNFTbond.value}} DLUX</li>
	  <li>Total Bond Value: {{newNFTbond.value*newNFTqty.value}} DLUX</li>
		<li>Total Cost Per: {{((bytecost.value.toNumber()*(39+(newNFTname.value.split("").length.toNumber())+((newNFTend.value.split("").length)*2)))+newNFTbond.value.toNumber()}}</li>
      <li>Total: {{( ( ( ( 39 + newNFTset.value.split("").length + (2*(newNFTend.value.split("").length)) ) * bytecost.value ) + (newNFTbond.value)) * newNFTqty.value ) + setfee.value }}</li>
      <li>Total: ( ( ( ( ( {{39}} + {{newNFTname.value.split("").length}} + {{(2*(newNFTend.value.split("").length))}} ) * {{bytecost.value}} ) + {{newNFTbond.value}} ) * {{newNFTqty.value}} ) + {{setfee.value}} ) * 1.1 = {{newNFTmaxfee.value}}</li>
		<input id="setfee" type="number" class="d-none" dmx-bind:value="{{(statsapi.data.result.nft_fee_1/1000).formatNumber('3','.',',')}}">
		<input id="bytecost" type="number" class="d-none" dmx-bind:value="{{(statsapi.data.result.nft_byte_cost/1000).formatNumber('3','.',',')}}">
		<input class="" id="newNFTmaxfee" dmx-bind:value="(((((( 39 + newNFTset.value.split("").length + (2*(newNFTend.value.split("").length)) ) * bytecost.value ) + (newNFTbond.value)) * newNFTqty.value ) + setfee.value ))">
    </ul>
		  </div>
		<div class="col-6 text-center">
		  <button id="newNFTsubmit" type="submit" class="btn btn-primary btn-lg">DO IT</button></center>
		</div>
    </form>
  </div>
  </main>
  <?php
  $path = $_SERVER[ 'DOCUMENT_ROOT' ];
  $path .= "/mod/footer.php";
  include_once( $path );
  ?>
</div>
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
