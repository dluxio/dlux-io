<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - Explore NFTs</title>
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/header.php";
include_once( $path );
?>
<!--page specific-->
<script type="text/javascript" src="/dlux-io/dmxAppConnect/dmxAppConnect.js"></script>
<script src="/js/dex.js"></script>
<script src="/js/ico.js"></script>
<script type="text/javascript" src="/dlux-io/dmxAppConnect/dmxDataTraversal/dmxDataTraversal.js"></script>
	<style>
.circle {
  width: 50px;
  height: 50px;
  line-height: 50px;
  border-radius: 50%;
  font-size: 25px;
  color: #fff;
  text-align: center;
  background: #000
}
.img {
    width: 100%;
    height: 100%; 
    object-fit: contain;
}
</style>
</head>
<body class="d-flex flex-column h-100 padme-t70 text-white" id="explore" is="dmx-app">
<dmx-api-datasource id="setsapi" is="dmx-fetch" url="https://token.dlux.io/api/sets"></dmx-api-datasource>
<dmx-data-view id="setsview" dmx-bind:data="setsapi.data.result" sorton="set"></dmx-data-view>

<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/nav.php";
include_once( $path );
?>
<main role="main" class="flex-shrink-0">
  <div class="container-fluid">
    <div class="container">
      <h1>Explore NFTs</h1>
     
       
      <div class="row row-cols-1 row-cols-md-2">
  <div class="col mb-4" dmx-repeat:setsrepeat="setsview.data">
    <div class="card bg-dark text-white">
      <div dmx-bind:id="{{script}}featured">{{script.getSetPhotos('','featured')}}</div>
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
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
const Base64 = {

    glyphs :
    "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz+=",
toNumber : function(chars) {
        var result = 0;
        chars = chars.split('');
        for (var e = 0; e < chars.length; e++) {
            result = (result * 64) + this.glyphs.indexOf(chars[e]);
        }
        return result;
    }
}	
</script>
</html>
