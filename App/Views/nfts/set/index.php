<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - DEX</title>
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
	
<!--page specific-->
<script src="/js/dex.js"></script>
<script src="/js/ico.js"></script>

</head>
<body class="d-flex flex-column h-100 padme-t70 text-white" id="index" is="dmx-app">

<dmx-api-datasource id="api1" is="dmx-fetch" url="https://token.dlux.io/api/set/dlux"></dmx-api-datasource>
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
</style>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/nav.php";
   include_once($path);
?>
<main role="main" class="flex-shrink-0">
  <div class="container">
    <div class="container-fluid" style="padding: 0">
		<div>
		<button class="btn btn-primary" id="sortbase64asc" dmx-on:click="dataView1.sort('uid.Base64toNumber()','asc')">Sort on base64 <i class="fas fa-arrow-alt-circle-up"></i></button>
		<button class="btn btn-primary" id="sortbase64desc" dmx-on:click="dataView1.sort('uid.Base64toNumber()','desc')">Sort on base64 <i class="fas fa-arrow-alt-circle-down"></i></button>
		<button class="btn btn-primary" id="sortuidasc" dmx-on:click="dataView1.sort('uid','asc')">Sort on uid <i class="fas fa-arrow-alt-circle-up"></i></button>
		<button class="btn btn-primary" id="sortuiddesc" dmx-on:click="dataView1.sort('uid','desc')">Sort on uid <i class="fas fa-arrow-alt-circle-down"></i></button>
		<button class="btn btn-primary" id="sortasc" dmx-on:click="dataView1.sort('owner','asc')">Sort on owner <i class="fas fa-arrow-alt-circle-up"></i></button>
		<button class="btn btn-primary" id="sortasc" dmx-on:click="dataView1.sort('owner','desc')">Sort on owner <i class="fas fa-arrow-alt-circle-down"></i></button>
		</div>
      <div class="card-columns my-3" id="auctions-token-cards">
        <div class="card text-white bg-dark" dmx-repeat:repeat1="dataView1.data"> <a href="#itemModal" class="a-1" data-toggle="modal" dmx-on:click="iterator1.select($index);detail1.select(uid)">
          <div class="card-header d-flex" style="color:;background: linear-gradient(dodgerblue,cornflowerblue)">
            <div class="circle">{{uid}}</div>
            <h3 class="card-title lead border rounded p-2 ml-auto">{{set}} NFT</h3>
          </div>
			{{$index}}
          <div class="card-img-top p-1" dmx-bind:id="image-{{set}}-{{uid}}" dmx-bind:alt="image-{{set}}-{{uid}}">{{uid.nftImageWell(script, set)}}</div>
          <div class="card-body d-flex flex-column text-center">
			#{{uid.Base64toNumber()}} / {{api1.data.set.max}}
			</div>
          </a>
          <div class="card-footer text-center d-flex justify-content-between align-items-center"> <span>Owner: <a dmx-bind:href="/@{{owner}}#inventory">{{owner}}</a> </div>
        </div>
      </div>
    
	
    <dmx-data-iterator id="iterator1" dmx-bind:data="dataView1.data" loop="true"></dmx-data-iterator>
    <dmx-data-detail id="detail1" dmx-bind:data="dataView1.data" key="uid">
      <div class="modal fade " id="itemModal" tabindex="11" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-full modal-xl modal-dialog-centered" role="document">
          <div class="modal-content bg-dark text-white">
            <div class="card text-white bg-dark ">
              <div class="card-header d-flex align-items-baseline justify-content-between" style="background: #9200A6">
				  <div></div>
            		<h3 class="card-title lead border rounded p-2">{{detail1.data.set}} NFT</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="card-body row d-flex ">
                <div class="order-md-last col-lg-6 px-0 px-sm-2">
                  <div class="d-flex align-items-center justify-content-between">
                    <h2><a class="text-muted p-3" href="#" dmx-on:click="iterator1.prev();detail1.select(iterator1.value.uid)"><i class="fas fa-caret-square-left"></i></a></h2>
                    <h3 style="color:aqua;">{{detail1.data.uid}}</h3>
                    <h2><a class="text-muted p-3" href="#" dmx-on:click="iterator1.next();detail1.select(iterator1.value.uid)"><i class="fas fa-caret-square-right"></i></a></h2>
                  </div>
                  <div class="card-img-top" dmx-bind:id="detail-image-{{detail1.data.set}}-{{detail1.data.uid}}" dmx-bind:alt="{{detail1.data.set}}-{{detail1.data.uid}}"> {{detail1.data.uid.nftDetailWell(detail1.data.script, detail1.data.set)}} </div>
                  <div class="text-center mt-2 text-white-50">
                    <p>Owner: <a dmx-bind:href="/@{{detail1.data.owner}}#inventory/" dmx-bind:title="/{{detail1.data.owner}}#inventory/">{{detail1.data.owner}}</a></p>
                  </div>
                </div>
                <div class="col-lg-6 px-0 px-sm-2">
                  <div class="d-flex flex-column">
                    <div>Set: {{api1.data.set.set}}</div>
                    <div>Link: {{api1.data.set.link}}</div>
                    <div>Fee: {{api1.data.set.fee.nai()}}</div>
                    <div>Bond: {{api1.data.set.bond.nai()}} </div>
                    <div>Link: {{api1.data.set.permlink}}</div>
                    <div>Author: {{api1.data.set.author}}</div>
                    <div>Script: {{api1.data.set.script}}</div>
                    <div>Encoding: {{api1.data.set.encoding}}</div>
                    <div>Type: {{api1.data.set.type}}</div>
                    <div>Royalty: {{api1.data.set.royalty}}</div>
                    <div>Name: {{api1.data.set.name}}</div>
                    <div>Minted: {{api1.data.set.minted}}</div>
                    <div>Max: {{api1.data.set.max}}</div>
                  </div>
						
                </div>
              </div>
              <div class="card-footer d-flex align-items-center"></div>
            </div>
          </div>
        </div>
      </div>
    </dmx-data-detail>
		
		        <!-- data table -->
	<div class="tab-pane fade" id="table" role="tabpanel" aria-labelledby="table-tab">
        <div class="tab-pane fade" id="table" role="tabpanel" aria-labelledby="table-tab">
          <div class="jumbotron bg-darker my-4 p-2">
            <div >
              <table class="table table-hover table-bordered table-dark table-striped text-white mb-0">
                <thead>
                  <tr>
                    <th scope="col" dmx-class:table-primary="orderbookview1.sort.on == 'rate'" > <div class="d-flex justify-content-between align-items-end flex-wrap">
                      <div class="d-flex flex-fill text-center">
                        <p class="mx-2 my-0 p-0 text-center align-self-center">RATE</p>
                      </div>
                      <div class="d-flex">
                        <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-light" dmx-on:click="orderbookview1.sort('rate','asc')" dmx-class:bg-primary="orderbookview1.sort.dir == 'asc' && orderbookview1.sort.on == 'rate'"><i class="fas fa-sort-amount-down-alt"></i></button>
                        <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-light" dmx-on:click="orderbookview1.sort('rate','desc')" dmx-class:bg-primary="orderbookview1.sort.dir == 'desc' && orderbookview1.sort.on == 'rate'"><i class="fas fa-sort-amount-down"></i></button>
                      </div>
                    </div>
                    </th>
                    <th scope="col" dmx-class:table-primary="orderbookview1.sort.on == 'amount'"> <div class="d-flex justify-content-between align-items-end flex-wrap">
                      <div class="d-flex flex-fill text-center">
                        <p class="mx-2 my-0 p-0 text-center align-self-center">DLUX</p>
                      </div>
                      <div class="d-flex">
                        <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-light"  dmx-on:click="orderbookview1.sort('amount','asc')" dmx-class:bg-primary="orderbookview1.sort.dir == 'asc' && orderbookview1.sort.on == 'amount'"><i class="fas fa-sort-amount-down-alt"></i></button>
                        <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-light" dmx-on:click="orderbookview1.sort('amount','desc')" dmx-class:bg-primary="orderbookview1.sort.dir == 'desc' && orderbookview1.sort.on == 'amount'"><i class="fas fa-sort-amount-down"></i></button>
                      </div>
                    </div></th>
                    <th scope="col" dmx-class:table-primary="orderbookview1.sort.on == 'hive'"> <div class="d-flex justify-content-between align-items-end flex-wrap">
                      <div class="d-flex flex-fill text-center">
                        <p class="mx-2 my-0 p-0 text-center align-self-center">HIVE</p>
                      </div>
                      <div class="d-flex">
                        <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-light" dmx-on:click="orderbookview1.sort('hive','asc')" dmx-class:bg-primary="orderbookview1.sort.dir == 'asc'  && orderbookview1.sort.on == 'hive'"><i class="fas fa-sort-amount-down-alt"></i></button>
                        <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-light" dmx-on:click="orderbookview1.sort('hive','desc')" dmx-class:bg-primary="orderbookview1.sort.dir == 'desc'  && orderbookview1.sort.on == 'hive'"><i class="fas fa-sort-amount-down"></i></button>
                      </div>
                    </div></th>
                  </tr>
                </thead>
                <tbody>
                  <tr dmx-repeat:hivesellsrepeat="orderbookview1.data" dmx-on:click="iterator1.select($index); orderbookview1Detail.select(txid)" dmx-class:table-primary="orderbookview1Detail.data.txid ==  txid" dmx-class:table-danger="rate.toNumber().inRange(dexapi.data.markets.hive.sells[0].rate, (dexapi.data.markets.hive.sells[0].rate*1.01)) ==  false" >
                    <td>{{rate.toNumber().formatNumber(3,'.',',')}}</td>
                    <td>{{amount}}</td>
                    <td>{{hive}}</td>
                  </tr>
                </tbody>
              </table>
              <div class="d-flex justify-content-between mt-2">
                <div><a class="btn btn-light" href="javascript:void(0);" dmx-on:click="orderbookview1.prev()" dmx-show="orderbookview1.has.prev"><i class="fa fa-angle-left"></i></a></div>
                <div class="align-self-center">
                  <p class="m-0 p-0">Page {{orderbookview1.page}} of {{orderbookview1.pages}}</p>
                </div>
                <div><a class="btn btn-light" href="javascript:void(0)" dmx-on:click="orderbookview1.next()" dmx-show="orderbookview1.has.next"><i class="fa fa-angle-right"></i></a></div>
              </div>
            </div>
          </div>
        </div>
		  </div>
	</div>
  </div>
</main>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/footer.php";
   include_once($path);
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
