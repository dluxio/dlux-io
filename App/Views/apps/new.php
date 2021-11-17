<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - Apps</title>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/header.php";
   include_once($path);
?>
<script type="text/javascript" src="/dlux-io/dmxAppConnect/dmxAppConnect.js"></script>
<script type="text/javascript" src="/dlux-io/dmxAppConnect/dmxDataTraversal/dmxDataTraversal.js"></script>
</head>

<body class="d-flex flex-column h-100 padme-t70" id="index" is="dmx-app">
<dmx-data-view id="data_view1" dmx-bind:data="api1.data.result"></dmx-data-view>
<dmx-api-datasource id="api1" is="dmx-fetch" url="https://dluxdata.herokuapp.com/new"></dmx-api-datasource>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/nav.php";
   include_once($path);
?>
<main role="main" class="flex-shrink-0">
  <div class="container-fluid"></div>
</main>
</body></html>
