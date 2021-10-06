<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<title>Order Book</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
<style>
body {
	padding-top: 80px;
	background: #f2f2f2;
	

    font-family: 'Open Sans', sans-serif;
	font-weight: 400;


}
.side-menu .nav-container {
 background: #fff;
	border: 1px solid #e9e9e9;
}
.side-menu a{
	text-transform: uppercase;
	font-size: 12px;
	color: #777;
}
.side-menu li.active a{
	color: #444;
	background: #f7f7f7;
}
.table {
	background: #fff;
	table-layout: fixed; 
}
.table-bordered {
	border: 1px solid #e9e9e9;
}
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
	vertical-align:middle;
}
.table>tbody>tr>th, .table>tfoot>tr>th, .table>tbody>tr>td, .table>tfoot>tr>td {
	padding: 12px 15px;
}
.table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
	border-color: #e9e9e9;
}
.pager li > a {
	border-radius: 0;
	background: #fff;
	border: 1px solid #e9e9e9;
	color: #777;
    
}
.pager li > a:hover {
	color: #444;
	background: #f7f7f7; 
}
th {
	position: relative;
}
.sort-btns {
	position: absolute;
	right: 5px;
	top: 5px;
}
.sort-btns .btn {
		font-size: 12px;
	padding: 2px 8px;
}
.panel {
	margin-top: 20px;
	border: 1px solid #e9e9e9;
}
.panel-default > .panel-heading {
	    background: #f7f7f7;

}
.panel-title {
	    color: #444;
	font-size: 14px;
	margin: 0;
	font-weight: 500;
}
.list-group-item {
	font-size: 14px;
	font-weight: 400;
}
tr.customer {
	cursor: pointer;
}

</style>



	
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/header.php";
   include_once($path);
?>
<!--dmx App Connect-->
<script src="/dmxAppConnect/dmxAppConnect.js"></script>
<script src="/dmxAppConnect/dmxMoment.js"></script>
<script src="/dmxAppConnect/dmxFormatter.js"></script>
<script src="/dmxAppConnect/dmxDataTraversal/dmxDataTraversal.js"></script>
<script src="/dmxAppConnect/dmxFormatter/dmxFormatter.js"></script>
</head>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/nav.php";
   include_once($path);
?>
<body is="dmx-app" class="d-flex flex-column h-100 padme-t70 text-white ">
<dmx-api-datasource id="api1" is="dmx-fetch" url="https://token.dlux.io/dex/"></dmx-api-datasource>
<dmx-data-view id="dataView1" dmx-bind:data="api1.data.markets.hive.sellOrders" pagesize="15"></dmx-data-view>
<main role="main" class="flex-shrink-0">
<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <dmx-data-detail id="dataDetail1" dmx-bind:data="dataView1.data" key="$value.key">
        	
        	<div class="panel panel-default mt-0">
         <div class="panel-heading">
           <h3 class="panel-title">DETAIL</h3>
         </div>
         <ul class="list-group text-dark">
  			<li class="list-group-item">DLUX&#58; {{dataDetail1.data.$value.amount}}</li>
  			<li class="list-group-item">HIVE&#58; {{dataDetail1.data.$value.hive}}</li>
  			<li class="list-group-item">RATE&#58; {{dataDetail1.data.$value.rate}} </li>
  			<li class="list-group-item text-break">TXID&#58; {{dataDetail1.data.$value.txid}} </li>
			 <li class="list-group-item text-break">KEY &#40;RATE&#58;TXID&#41;&#58; {{dataDetail1.data.$value.key}} </li>
		</ul>
       </div>
        </dmx-data-detail>
      </div>
      <div class="col-md-9">
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
            
                <th dmx-class:success="dataView1.sort.on == 'amount'"> DLUX <span class="sort-btns">
                  <button type="button" class="btn btn-xs btn-default" title="Sort Ascending" dmx-on:click="dataView1.sort('amount','asc')"><i class="fa fa-sort-alpha-asc"></i></button>
                  <button title="Sort Descending" type="button" class="btn btn-xs btn-default" dmx-on:click="dataView1.sort('amount','desc')"><i class="fa fa-sort-alpha-desc"></i></button>
                </span></th>
                <th dmx-class:success="dataView1.sort.on == 'hive'"> HIVE <span class="sort-btns">
                  <button title="Sort Ascending" type="button" class="btn btn-xs btn-default" dmx-on:click="dataView1.sort('hive','asc')"><i class="fa fa-sort-alpha-asc"></i></button>
                  <button title="Sort Descending" type="button" class="btn btn-xs btn-default" dmx-on:click="dataView1.sort('hive','desc')"><i class="fa fa-sort-alpha-desc"></i></button>
                </span></th>
                <th dmx-class:success="dataView1.sort.on == 'rate'"> RATE <span class="sort-btns">
                  <button title="Sort Ascending" type="button" class="btn btn-xs btn-default" dmx-on:click="dataView1.sort('rate','asc')"><i class="fa fa-sort-alpha-asc"></i></button>
                  <button title="Sort Descending" type="button" class="btn btn-xs btn-default" dmx-on:click="dataView1.sort('rate','desc')"><i class="fa fa-sort-alpha-desc"></i></button>
                </span></th>
				  <th dmx-class:success="dataView1.sort.on == 'txid'"> TXID <span class="sort-btns">
                  <button title="Sort Ascending" type="button" class="btn btn-xs btn-default" dmx-on:click="dataView1.sort('txid','asc')"><i class="fa fa-sort-alpha-asc"></i></button>
                  <button title="Sort Descending" type="button" class="btn btn-xs btn-default" dmx-on:click="dataView1.sort('txid','desc')"><i class="fa fa-sort-alpha-desc"></i></button>
                </span></th>
				  <th dmx-class:success="dataView1.sort.on == 'rate'"> KEY &#40;RATE&#58;TXID&#41;<span class="sort-btns">
                  <button title="Sort Ascending" type="button" class="btn btn-xs btn-default" dmx-on:click="dataView1.sort('rate','asc')"><i class="fa fa-sort-alpha-asc"></i></button>
                  <button title="Sort Descending" type="button" class="btn btn-xs btn-default" dmx-on:click="dataView1.sort('rate','desc')"><i class="fa fa-sort-alpha-desc"></i></button>
                </span></th>
              </tr>
            </thead>
            <tbody>
              <tr class="customer" dmx-repeat:repeat1="dataView1.data" dmx-on:click="dataDetail1.select($value.key)" dmx-class:success="dataDetail1.data.$value.key ==  $value.key">
                
				<td> {{$value.amount}} </td>
                <td> {{$value.hive}} </td>
                <td> {{$value.rate}} </td>
				  <td class="text-break"> {{$value.txid}} </td>
				  <td class="text-break"> {{$value.key}} </td>
              </tr>
            </tbody>
          </table>
        </div>
        <ul class="pager">
          <li class="previous"> <a class="btn btn-default" href="javascript:void(0);" dmx-on:click="dataView1.prev()" dmx-show="dataView1.has.prev"><i class="fa fa-angle-left"></i></a></li>
          <li>Page {{dataView1.page}} of {{dataView1.pages}}</li>
          <li class="next"> <a class="btn btn-default" href="javascript:void(0)" dmx-on:click="dataView1.next()" dmx-show="dataView1.has.next"><i class="fa fa-angle-right"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</section>
	</main>
</body>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/footer.php";
   include_once($path);
?></html>