<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - Status</title>
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/header.php";
include_once( $path );
?>
<script type="text/javascript" src="/dmxAppConnect/dmxAppConnect.js"></script>
<script type="text/javascript" src="/dlux-io/dmxAppConnect/dmxDataTraversal/dmxDataTraversal.js"></script>
<script type="text/javascript" src="/dlux-io/dmxAppConnect/dmxFormatter/dmxFormatter.js"></script>
</head>
<body class="d-flex flex-column bg-darker h-100 padme-t70" id="status" is="dmx-app">
<dmx-data-view id="witnessdata" dmx-bind:data="markets.data.markets.node" sorton="report.block_num"></dmx-data-view>
<dmx-api-datasource id="markets" is="dmx-fetch" url="https://token.dlux.io/markets"></dmx-api-datasource>

<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/nav.php";
include_once( $path );
?>
<main role="main" class="flex-shrink-0 text-white">
  <div class="container-fluid px-0 ">
    <div class="container">
      <div class="jumbotron bg-dark">
        <h1 class="display-4">DLUX S.O.S. (Status of Services)</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
		  
		  <div dmx-repeat:repeat1="witnessdata.data">
		    <dmx-value id="var1" dmx-bind:value="_['actifit-dlux']">  </dmx-value>
            <div dmx-repeat:repeat2="_['actifit-dlux']">
              <p>{{block_num}} {{$key}} {{$value}} {{$index}} here</p>
            </div>
		  </div>
        <p class="lead"> <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
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
</html>
