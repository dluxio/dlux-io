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
	  <h1>CREATE NFT SET</h1>
		<h4>ALPHA v0.2</h4>
    <div class="form-row">
		<select id="newNFTtype" class="btn btn-secondary btn-lg my-3">
		<option value="1" selected>Type 1: LAYERS+COLORS</option>
		</select>
    </div>
    <p class="lead">Turn a layered SVG into a set of unique, tradeable tokens</p>
    <p>Non Fungible Tokens are now available on DLUX, each one unique, all based on a set definition.</p>
	  <p>SVG (Scaleable Vector Graphic) files have layers, and output as HTML code, so it's possible to set up layers that contain multiple possible item options (such as different types of glasses), each with their own color options.</p>
    <p>At this time there are several manual steps that must have been done prior to using this form:
    <ul>
      <li>Already created an SVG file</li>
      <li>Already preppared the HTML file with SVG description data</li>
      <li>Already uploaded the HTML file to IPFS, and pinned the IPFS file</li>
    </ul>
    To proceed, you must have the IPFS hash of your file, and know the Base64 limits of your set.
    </p>
    <b>You must also be logged in as @disregardfiat </b>
    </p>
	<div id="preview">
				<!-- Test FT repeat -->
          <div class="card-columns cc-3 pt-5" id="test-ft-cards" >
			  <input id="testscript" value="QmRGMg6VoqyvLnETtDpgQjm3LWQWfyjN7QhsrCnmXeHbP9">
 			<input id="testuid" value="8X">
 			<input id="testset" value="test">
            <div dmx-bind:id="{{testscript.value}}-test-card" class="card text-white" style="border: none;"> {{testscript.value.getSetDetailsColors('-test-card')}}
              <div class="card-header d-flex align-items-center justify-content-between" >
                <div>
                  <div class="card-img-top" dmx-bind:id="image-{{testset.value}}-{{testuid.value}}" dmx-bind:alt="{{testscript.value}}">{{testuid.value.nftImageWell(testscript.value, testset.value)}}</div>
                   </div>
              </div>
              <div class="card-body text-center d-flex flex-column lead">
                <div class="px-2 py-5 text-center rounded" style="background-color: rgba(0,0,0,0.75)">{{testscript.value.getSetDetailsIcon('-test-icon')}}
                  <h1 class="text-center rainbow-text"><i dmx-bind:id="{{testscript.value}}-test-icon"></i></h1>
                </div>
              </div>
             
            </div>
          </div>
	</div>
    <p>
    <form class="needs-validation mt-4" validate dmx-bind:action="javascript:defineNFT('{{newNFTsetname.value}}','{{newNFTtype.value}}','{{newNFTscript.value}}','{{newNFTpermlink.value}}','{{newNFTstart.value}}','{{newNFTend.value}}','{{newNFTqty.value}}','{{newNFTroyalty.value}}','{{newNFThandling.value}}','{{newNFTmaxfee.value}}','{{newNFTbond.value}}')">
      <div class="my-4 rounded p-2 border border-primary">
        <div class="form-row">
          <div class="form-group col-6">
            <label for="newNFTsetname">Set Name*</label>
            <input type="text" class="form-control" id="newNFTsetname" placeholder="Set Name" required>
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
            <label for="newNFTstart">Mint Range Start</label>
            <input type="text" class="form-control" id="newNFTstart" placeholder="Base64 number" required>
            <div class="invalid-feedback">Please enter the start of the possible minting range</div>
            <small class="form-text text-muted">What is the start of the range to issue mints from?<br>
            <b>Must be in Base64</b></small> </div>
          <div class="form-group col-4">
            <label for="newNFTend">Mint Range End**</label>
            <input type="text" class="form-control" id="newNFTend" placeholder="Base64 number" required>
            <div class="invalid-feedback">Please enter the end of the possible minting range</div>
            <small class="form-text text-muted">What is the end of the range to issue mints from?<br>
            <b>Must be in Base64</b></small> </div>
          <div class="form-group col-4">
            <label for="newNFThandling">Handling</label>
            <input type="text" class="form-control" id="newNFThandling" value="svg" required readonly>
            <div class="invalid-feedback">Only SVG is available at this time.</div>
            <small class="form-text text-muted">What type of asset are you using to create this set?</small> </div>
        </div>
        <div class="form-row">
          <div class="form-group col-12">
            <label for="newNFTroyalty">Script</label>
            <input type="text" class="form-control" id="newNFTscript" required placeholder="QmIPFShash">
            <small class="form-text text-muted">The IPFS hash of the HTML file containing the SVG information and attribute options, the range is the combination of all potential attributes in Base64</small> </div>
        </div>
      </div>
      <div class="my-4 rounded p-2 border border-info">
        <div class="form-row">
          <div class="form-group col-4">
            <label for="newNFTroyalty">Royalty (0-50%)</label>
            <input type="number" class="form-control" id="newNFTroyalty" step="0.01" min="0" max="50" value="10">
            <small class="form-text text-muted">The percent paid back to you from each future DLUX contract containing any asset from the set</small> </div>
          <div class="form-group col-4">
            <label for="newNFTbond">Bond Value (>=0)</label>
            <input type="number" class="form-control" id="newNFTbond" step="0.001" min="0" value="0">
            <small class="form-text text-muted">Enter any amount of DLUX you would like to bond into each asset - melting destroys it and deposits the value</small> </div>
          <div class="form-group col-4">
            <label for="newNFTqty">Mint Quantity (>=1)</label>
            <input type="number" class="form-control" id="newNFTqty" step="1" min="1" value="1" required>
            <div class="invalid-feedback"> Please enter the number of mints you'd like to purchase now.</div>
            <small class="form-text text-muted">How many mints are you issuing at this time?</small></div>
        </div>
      </div>
      <div class="form-row">
      <div class="col-6">
		<div class="card bg-darker text-white-50">
			<div class="card-header">
				<div class="text-center small"><span class="ml-0 mr-1">MARGIN</span><span class="ml-1 mr-1">DEFINITION</span><span class="ml-1 mr-1">QTY</span><span class="ml-1 mr-1">BOND</span><span class="ml-5 mr-5">FEE</span><span class="ml-3 mr-5">BYTES</div>
				<div class="text-center">1.1 x ( {{setfee.value}} + ( {{newNFTqty.value.toNumber().formatNumber('','.',',')}} x ( {{newNFTbond.value.toNumber().formatNumber('3','.',',')}} + ( {{bytecost.value}} x ( {{39}} + {{newNFTsetname.value.split("").length}} + {{(2*(newNFTend.value.split("").length))}} )))))</div>
		  <input id="setfee" type="number" class="d-none" dmx-bind:value="{{(statsapi.data.result.nft_fee_1/1000).formatNumber('3','.',',')}}">
          <input id="bytecost" type="number" class="d-none" dmx-bind:value="{{(statsapi.data.result.nft_byte_cost/1000).formatNumber('3','.',',')}}">

			</div>
			<div class="card-body">
		  <ul>
          <li>Bytes: <span class="float-right">{{(39+(newNFTsetname.value.split("").length)+((newNFTend.value.split("").length)*2)).formatNumber('','.',',')}}</span></li>
          <li>Minting Fee (each byte): <span class="float-right">{{(statsapi.data.result.nft_byte_cost/1000).formatNumber('3','.',',')}} DLUX</span></li>
          <li>Minting Fee (each): <span class="float-right">{{(bytecost.value*(39+(newNFTsetname.value.split("").length)+((newNFTend.value.split("").length)*2))).formatNumber('3','.',',')}} DLUX</span></li>
          <li>Bond Value (each): <span class="float-right">{{newNFTbond.value.toNumber().formatNumber('3','.',',')}} DLUX</span></li>
          <li>Total Cost (each): <span class="float-right">{{((bytecost.value*(39+(newNFTsetname.value.split("").length)+((newNFTend.value.split("").length)*2)))+newNFTbond.value.toNumber()).formatNumber('3','.',',')}} DLUX</span></li>
		  <li>Issue Qty: <span class="float-right">{{newNFTqty.value.toNumber().formatNumber('','.',',')}}</span></li>
		  <hr>
		<li>Set Definition: <span class="float-right">{{(statsapi.data.result.nft_fee_1/1000).formatNumber('3','.',',')}} DLUX</span></li>
		  <li>Minting Fee: <span class="float-right">{{(newNFTqty.value*(bytecost.value*(39+(newNFTsetname.value.split("").length)+((newNFTend.value.split("").length)*2)))).formatNumber('3','.',',')}} DLUX</span></li>
		  <li>Bond Value: <span class="float-right">{{(newNFTbond.value*newNFTqty.value).formatNumber('3','.',',')}} DLUX</span></li>
          <li>Grand Total: <span class="float-right">{{(setfee.value.toNumber()+(newNFTqty.value*((bytecost.value*(39+(newNFTsetname.value.split("").length)+((newNFTend.value.split("").length)*2)))+newNFTbond.value.toNumber()))).formatNumber('3','.',',')}} DLUX</span></li>
          <li>+10% Margin: <span class="float-right">{{((setfee.value.toNumber()+(newNFTqty.value*((bytecost.value*(39+(newNFTsetname.value.split("").length)+((newNFTend.value.split("").length)*2)))+newNFTbond.value.toNumber())))*1.1).formatNumber('3','.',',')}} DLUX</span></li>
        </ul>
				</div>
			<div class="card-footer">
		  <small>* Characters in set name are single weighted for byte-cost evaluation (x1)</small><br>
		  <small>** Characters in range end are double weighted for byte-cost evaluation (x2)</small>		  
		</div>
      </div>
		  </div>
      <div class="col-6 text-center">
		<div class="d-flex h-100">
		 <div class="m-auto flex-column rounded border border-warning p-3">
		<div class="form-group my-2">
			<label for="newNFTmaxfee">ENTER THIS LAST<br>Max Cost Safety Measure</label>
			<input class="form-control" id="newNFTmaxfee" type="number" placeholder="Total + 10% Margin" required step="0.001">
			<div class="invalid-feedback">Enter the +10% Margin Total calculated on the left</div>
        	<small class="form-text text-muted">This value is calculated on the left (+10% Margin)</small>
			</div>
        <div class="my-2"><button type="submit" class="btn btn-warning btn-lg" id="newNFTsubmit">Define Set and Issue Mints</button></div>
        </div>
			</div>
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
