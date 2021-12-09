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
.center-circle {
		position: absolute;
		left: 50%;
    	transform: translate(-50%, -50%);
		z-index: 1;
	}
	.max-80 {
		max-width: 80px;
	}
.img {
    width: 100%;
    height: 100%; 
    object-fit: contain;
}
</style>
<script type="text/javascript" src="/dlux-io/dmxAppConnect/dmxFormatter/dmxFormatter.js"></script>
</head>
<body class="d-flex flex-column h-100 padme-t70 text-white" id="explore" is="dmx-app">
<dmx-api-datasource id="setsapi" is="dmx-fetch" url="https://token.dlux.io/api/sets"></dmx-api-datasource>
<dmx-data-view id="setsview" dmx-bind:data="setsapi.data.result"></dmx-data-view>

<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/nav.php";
include_once( $path );
?>
<main role="main" class="flex-shrink-0">
  <div class="container-fluid">
    <div class="container">
		<div class="my-4">
      <h1>Explore NFTs</h1>
     </div>
       
      <div class="row row-cols-1 row-cols-md-2">
  <div class="col mb-4" dmx-repeat:setsrepeat="setsview.data">
	  <a dmx-bind:href="/set/{{set}}" style="text-decoration: none">
    <div class="card bg-dark text-white">
		<div>
      <div dmx-bind:id="{{script}}featured">{{script.getSetPhotos('','featured')}}</div>
		<div class="center-circle rounded-circle bg-darker" style="border: solid black 3px;">
            <div dmx-bind:id="{{script}}logo" class="rounded-circle" style="width: 100px"> {{script.getSetPhotos('','logo','rounded-circle')}}</div>
          </div>
			</div>
      <div class="card-footer p-0" dmx-bind:id="{{script}}body" style="border: none; "> {{script.getSetDetailsColors('body')}}
        
		  <div class="m-3 p-2 rounded" style="background-color: rgba(0,0,0,0.7)">
			  <h2 class="card-title my-2 mx-3">{{set}}</h2>
        <div class="my-2 mx-3 d-flex align-items-center " >
			
			<div><p class="text-white-50" dmx-bind:id="{{script}}descriptionp" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box;
   -webkit-line-clamp: 2; /* number of lines to show */
           line-clamp: 2; 
   -webkit-box-orient: vertical;"> {{script.getSetDetails('Description', 'descriptionp', 'innerText')}} </p></div>
		
			  <div dmx-bind:id="{{script}}wrapped"> {{script.getSetPhotos('','wrapped','rounded max-80')}}</div>
			  </div>
      </div>

    </div>
		
  </div>
		</a>
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
