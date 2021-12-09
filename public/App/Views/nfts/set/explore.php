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
<script src="/js/dex.js"></script>
<script src="/js/ico.js"></script>
</head>
<body class="d-flex flex-column h-100 padme-t70 text-white" id="index" is="dmx-app">

<dmx-data-view id="dataView1" dmx-bind:data="api1.data.result" sorton="uid"></dmx-data-view>
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
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/nav.php";
include_once( $path );
?>
<main role="main" class="flex-shrink-0">
    <div class="container-fluid">
		<div class="container">
       <h1>Explore NFTs</h1>
			
		<div class="card-columns">
		<div class="card col-md-6">
			
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
