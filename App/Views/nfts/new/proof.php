<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - Proof NFT</title>
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/header.php";
include_once( $path );
?>
<script type="text/javascript" src="/dlux-io/dmxAppConnect/dmxAppConnect.js"></script>
</head>
<body class="d-flex flex-column h-100 padme-t70 text-white" id="new" is="dmx-app">
<style>
  .img {
    width: 100%;
    height: 100%; 
    object-fit: contain;
}
</style>
<dmx-api-datasource id="statsapi" is="dmx-fetch" url="https://token.dlux.io/stats/"></dmx-api-datasource>
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/nav.php";
include_once( $path );
?>
<main role="main" class="flex-shrink-0">
<div class="container">
  <div class="container-fluid bg-dark rounded my-5 py-3">
	  <h1>PROOF NFT SET</h1>
		<h4>ALPHA v0.2</h4>
    <p class="lead">Proof your set before publishing</p>

	<div id="preview">
			<div dmx-bind:id="{{testscript.value}}banner"> {{testscript.value.getSetPhotos('','banner')}}</div>
          <div class="card-columns cc-3 pt-5" id="testftcards" >
			  <input id="testscript" value="QmSPm13knazJsN4C8b7mWqT8tG2CeFCRvbW1PifYZV9dVN">
 			<input id="testuid" value="7S">
 			<input id="testset" value="test">
            <div dmx-bind:id="{{testscript.value}}testcard" class="card text-white" style="border: none;"> {{testscript.value.getSetDetailsColors('testcard')}}
              <div class="card-header d-flex align-items-center justify-content-between" >
			 </div>
                <div>
                  <div class="card-img-top" dmx-bind:id="image-{{testset.value}}-{{testuid.value}}" dmx-bind:alt="{{testscript.value}}">{{testuid.value.nftImageWell(testscript.value, testset.value)}}</div>
                   </div>
             
              <div class="card-body text-center d-flex flex-column lead">
                <div class="px-2 py-5 text-center rounded" style="background-color: rgba(0,0,0,0.75)">{{testscript.value.getSetDetailsIcon('testicon')}}
                  <h1 class="text-center rainbow-text"><i dmx-bind:id="{{testscript.value}}testicon"></i></h1>
                </div>
              </div>
             
            </div>
          </div>
	</div>
    <p>
 
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
