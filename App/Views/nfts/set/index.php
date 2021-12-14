<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - NFTs</title>
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/header.php";
include_once( $path );
?>
<!--page specific-->
<script type="text/javascript" src="/dmxAppConnect/dmxAppConnect.js"></script>
<script src="/js/dex.js"></script>
<script src="/js/ico.js"></script>
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
.bannner-img {
		width: 1400px; height: 230px; object-fit: cover;
	}
</style>
</head>
<body class="d-flex flex-column h-100 padme-t70 text-white" id="index" is="dmx-app">
<?php
	echo '<dmx-api-datasource id="setapi" is="dmx-fetch" url="https://token.dlux.io/api/set/' . $set . '"></dmx-api-datasource>';
?>

<dmx-data-view id="setview" dmx-bind:data="setapi.data.result" sorton="uid"></dmx-data-view>

<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/nav.php";
include_once( $path );
?>
<main role="main" class="flex-shrink-0">

    <div class="container-fluid">

    <div class="card bg-dark text-white">
		<div>
      <div dmx-bind:id="{{setapi.data.set.script}}banner">{{setapi.data.set.script.getSetPhotos('','banner','banner-img w-100 img-fluid')}}</div>
		<div class="center-circle rounded-circle bg-darker" style="border: solid black 3px;">
            <div dmx-bind:id="{{setapi.data.set.script}}logo" class="rounded-circle" style="width: 100px"> {{setapi.data.set.script.getSetPhotos('','logo','rounded-circle')}}</div>
          </div>
			</div>
      <div class="card-body p-0" dmx-bind:id="{{setapi.data.set.script}}body" style="border: none; "> {{setapi.data.set.script.getSetDetailsColors('body')}}
        
		  <div class="m-3 p-3 rounded" style="background-color: rgba(0,0,0,0.7)">
              <div class="d-flex justify-content-between align-items-center">
			  <h2 class="card-title">{{setapi.data.set.set}}</h2>
              <p class="m-0"><a dmx-bind:href="/@{{setapi.data.set.author}}">@{{setapi.data.set.author}}</a></p>
                  </div>
        <div class="mb-3 d-flex align-items-center " >
			
			<div class="mr-3"><p class="text-white-50 m-0" dmx-bind:id="{{setapi.data.set.script}}descriptionp"> {{setapi.data.set.script.getSetDetails('Description', 'descriptionp', 'innerText')}} </p></div>
		
			  <div dmx-bind:id="{{setapi.data.set.script}}wrapped"> {{setapi.data.set.script.getSetPhotos('','wrapped','rounded max-80')}}</div>
            
      </div>
             <div class="d-flex justify-content-between align-items-center">
            <span class="small bg-secondary rounded text-white px-2 py-1">Royalty: {{setapi.data.set.royalty}}</span>
            <span class="small mx-2"><a dmx-bind:href="/blog/@{{setapi.data.set.link}}">{{setapi.data.set.permlink}}</a></span>
                 <span class="small bg-secondary rounded text-white px-2 py-1">Bond: {{setapi.data.set.bond.amount}}</span>
        </div>    
    </div>
  </div>
        <div class="card-footer">
             <div class="d-flex justify-content-between align-items-center">
             <div class="flex-grow-1 mr-3">
                 <div class="progress">
                
  <div class="progress-bar" role="progressbar" dmx-bind:style="width: {{(setapi.data.set.minted/setapi.data.set.max)*100}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{((setapi.data.set.minted/setapi.data.set.max)*100).formatNumber(2,','.',')}}% minted</div>
</div></div>
                 <div class="">
            <p class="m-0">{{setapi.data.set.minted}} of {{setapi.data.set.max}} minted</p>
        </div>
                 </div>
            </div>
            </div>

      <div class="text-center my-3">
        <button class="btn btn-primary mx-2" id="sortuidasc" dmx-on:click="setview.sort('uid','asc')">Sort id<i class="fas fa-arrow-alt-circle-up mx-2"></i></button>
        <button class="btn btn-primary mx-2" id="sortuiddesc" dmx-on:click="setview.sort('uid','desc')">Sort id<i class="fas fa-arrow-alt-circle-down mx-2"></i></button>
        <button class="btn btn-primary mx-2" id="sortasc" dmx-on:click="setview.sort('owner','asc')">Sort owner <i class="fas fa-arrow-alt-circle-up mx-2"></i></button>
        <button class="btn btn-primary mx-2" id="sortasc" dmx-on:click="setview.sort('owner','desc')">Sort owner <i class="fas fa-arrow-alt-circle-down mx-2"></i></button>
      </div>
      <div class="row row-cols-xl-6 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1">
        <div class="col mb-4" dmx-repeat:repeat1="setview.data">
          <div class="card text-white bg-dark"> 
             <div class="card-header d-flex align-items-center" dmx-bind:id="{{script}}{{uid}}-header">{{script.getSetDetailsColors(uid+'-header')}}
              <div class="rounded-pill d-flex align-items-center p-2" style="background-color: black"><h2 class="m-0 px-2">{{uid}}</h2></div>
              <h3 class="card-title lead border rounded border-dark p-2 ml-auto mb-0 "><a dmx-bind:href="/nfts/set/{{set}}" class="lead" style="color: black">{{set}} NFT</a></h3>
            </div>
			  <a href="#itemModal" class="a-1" data-toggle="modal" dmx-on:click="iterator1.select($index);detail1.select(uid)">
            <div class="card-img-top p-1" dmx-bind:id="image-{{set}}-{{uid}}" dmx-bind:alt="image-{{set}}-{{uid}}">{{uid.nftImageWell(script, set)}}</div>
            <div class="card-body d-flex flex-column text-center"> #{{uid.Base64toNumber()}} / {{api1.data.set.max}} </div>
            </a>
			  <!-- user -->
            <div class="card-footer text-center d-flex justify-content-between align-items-center"> <span>Owner: <a dmx-bind:href="/@{{owner}}#inventory">{{owner}}</a> </div>
			  <!-- auction -->
            <div class="card-footer text-center d-flex justify-content-between align-items-center" dmx-show:> <span>Owner: <a dmx-bind:href="/@{{owner}}#inventory">{{owner}}</a> </div> 
			  <!-- sale -->
            <div class="card-footer text-center d-flex justify-content-between align-items-center" dmx-show:> <span>Owner: <a dmx-bind:href="/@{{owner}}#inventory">{{owner}}</a> </div>
          </div>
        </div>
      </div>
			</	div>
      <dmx-data-iterator id="iterator1" dmx-bind:data="setview.data" loop="true"></dmx-data-iterator>
      <dmx-data-detail id="detail1" dmx-bind:data="setview.data" key="uid">
        <div class="modal fade " id="itemModal" tabindex="11" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-full modal-xl modal-dialog-centered" role="document">
            <div class="modal-content bg-dark text-white">
              <div class="card text-white bg-dark ">
                <div class="card-header d-flex align-items-center justify-content-between" dmx-bind:id="{{detail1.data.script}}{{detail1.data.uid}}-nftdetailheader">{{detail1.data.script.getSetDetailsColors(detail1.data.uid+'-nftdetailheader')}}
              <div class="rounded-pill d-flex align-items-center p-2" style="background-color: black"><h2 class="m-0 px-2">{{detail1.data.uid}}</h2></div>
                <h3 class="card-title lead border border-dark rounded mb-0 p-2"><a dmx-bind:href="/nfts/set/{{detail1.data.set}}" style="color: black">{{detail1.data.set}} NFT</a></h3>
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
