<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - Me</title>
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/header.php";
include_once( $path );
?>
<!--page specific-->
<script type="text/javascript" src="/dlux-io/dmxAppConnect/dmxAppConnect.js"></script>
<script src="/js/dex.js"></script>
<script src="/js/me.js"></script>
<style>
@media (min-width: 1200px) {
.cc-3 {
    column-count: 3;
}
}
.max-350 {
    max-width: 350px;
}
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
.shimmer {
    background-image: linear-gradient( to right, rgb(194, 255, 182), rgb(255, 163, 182), rgb(221, 169, 255), rgb(162, 209, 255) )
}
.nav-pills > li > a.active {
    background-color: #17a2b8 !important;
    color: #ffffff !important;
}
.nav-pills > li > a {
    color: #17a2b8 !important;
}
.r-radius-hotfix {
    border-top-right-radius: 0.25rem !important;
    border-bottom-right-radius: 0.25rem !important;
}
.rainbow-text {
    background-image: linear-gradient( magenta, aqua);
    -webkit-background-clip: text;
    color: transparent;
}
.attribute-name {
    text-decoration: underline;
    margin-top: 5px;
}
.attribute-value {
    font-weight: bold;
    margin-bottom: 5px;
}
	.max-160 {
		max-width: 160px;
	}
</style>
<script type="text/javascript" src="/dlux-io/dmxAppConnect/dmxFormatter/dmxFormatter.js"></script>
<script type="text/javascript" src="/dlux-io/dmxAppConnect/dmxDataTraversal/dmxDataTraversal.js"></script>
</head>
<body class="d-flex flex-column bg-darker h-100 padme-t70" id="index" is="dmx-app" onLoad="getDate()">

<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/nav.php";
include_once( $path );
?>
<?php
if ( isset( $author ) ) {
  echo "<dmx-api-datasource id=\"dluxGetBlog\" is=\"dmx-fetch\" url=\"https://token.dlux.io/api/condenser_api/get_discussions_by_blog\" dmx-param:tag=\"'" . $author . "'\"></dmx-api-datasource>";
  echo "<dmx-api-datasource id=\"dluxGetAccount\" is=\"dmx-fetch\" url=\"https://token.dlux.io/api/condenser_api/get_accounts\" dmx-param:0=\"'" . $author . "'\"></dmx-api-datasource>";
  echo "<dmx-api-datasource id=\"inventorydata\" is=\"dmx-fetch\" url=\"https://token.dlux.io/api/nfts/" . $author . "\"></dmx-api-datasource>";
  echo "<dmx-api-datasource id=\"usertoken\" is=\"dmx-fetch\" url=\"https://token.dlux.io/@" . $author . "\"></dmx-api-datasource>";
  echo "<dmx-api-datasource id=\"larynxtoken\" is=\"dmx-fetch\" url=\"https://spkgiles.hivehoneycomb.com/@" . $author . "\"></dmx-api-datasource>";
  echo "<dmx-api-datasource id=\"accountapi\" is=\"dmx-fetch\" url=\"https://token.dlux.io/hapi/condenser_api/get_accounts\" dmx-param:0=\"'" . $author . "'\"></dmx-api-datasource>";
} else if ( isset( $_COOKIE[ 'user' ] ) ) {
  echo "<dmx-api-datasource id=\"dluxGetBlog\" is=\"dmx-fetch\" url=\"https://token.dlux.io/api/condenser_api/get_discussions_by_blog\" dmx-param:tag=\"'" . $_COOKIE[ 'user' ] . "'\"></dmx-api-datasource>";
  echo "<dmx-api-datasource id=\"dluxGetAccount\" is=\"dmx-fetch\" url=\"https://token.dlux.io/api/condenser_api/get_accounts\" dmx-param:0=\"'" . $_COOKIE[ 'user' ] . "'\"></dmx-api-datasource>";
  echo "<dmx-api-datasource id=\"inventorydata\" is=\"dmx-fetch\" url=\"https://token.dlux.io/api/nfts/" . $_COOKIE[ 'user' ] . "\"></dmx-api-datasource>";
  echo "<dmx-api-datasource id=\"tradefts\" is=\"dmx-fetch\" url=\"https://token.dlux.io/api/trades/fts/" . $_COOKIE[ 'user' ] . "\"></dmx-api-datasource>";
  echo "<dmx-api-datasource id=\"tradenfts\" is=\"dmx-fetch\" url=\"https://token.dlux.io/api/trades/nfts/" . $_COOKIE[ 'user' ] . "\"></dmx-api-datasource>";
  echo "<dmx-api-datasource id=\"usertoken\" is=\"dmx-fetch\" url=\"https://token.dlux.io/@" . $_COOKIE[ 'user' ] . "\"></dmx-api-datasource>";
  echo "<dmx-api-datasource id=\"larynxtoken\" is=\"dmx-fetch\" url=\"https://spkgiles.hivehoneycomb.com/@" . $_COOKIE[ 'user' ] . "\"></dmx-api-datasource>";
  echo "<dmx-api-datasource id=\"accountapi\" is=\"dmx-fetch\" url=\"https://token.dlux.io/hapi/condenser_api/get_accounts\" dmx-param:0=\"'" . $_COOKIE[ 'user' ] . "'\"></dmx-api-datasource>";
} else {
};
?>
<!--<dmx-api-datasource id="larynxtoken" is="dmx-fetch" url="https://spkgiles.hivehoneycomb.com/@markegiles"></dmx-api-datasource>-->
<!--<dmx-api-datasource id="accountapi" is="dmx-fetch" url="https://token.dlux.io/hapi/condenser_api/get_accounts" dmx-param:0="markegiles"></dmx-api-datasource>-->
<dmx-api-datasource id="hivehistory" is="dmx-fetch" url="https://token.dlux.io/hapi/account_history_api/get_account_history" dmx-param:account="markegiles"></dmx-api-datasource>
<dmx-data-view id="userhivehistory" dmx-bind:data="hivehistory.data.result.history"></dmx-data-view>
<dmx-api-datasource id="hivestatsapi" is="dmx-fetch" url="https://token.dlux.io/hapi/condenser_api/get_dynamic_global_properties"></dmx-api-datasource>
<dmx-api-datasource id="hiveprice" is="dmx-fetch" url="https://api.coingecko.com/api/v3/simple/price?ids=hive&amp;vs_currencies=usd"></dmx-api-datasource>
<dmx-api-datasource id="hbdprice" is="dmx-fetch" url="https://api.coingecko.com/api/v3/simple/price?ids=hive_dollar&amp;vs_currencies=usd"></dmx-api-datasource>
<dmx-api-datasource id="dexapi" is="dmx-fetch" url="https://token.dlux.io/dex/" ></dmx-api-datasource>
<dmx-api-datasource id="larynxdexapi" is="dmx-fetch" url="https://spkgiles.hivehoneycomb.com/dex/" ></dmx-api-datasource>
<dmx-api-datasource id="dluxfeed" is="dmx-fetch" url="https://token.dlux.io/feed/" ></dmx-api-datasource>
<dmx-data-view id="data_view1"></dmx-data-view>
<main role="main" class="flex-shrink-0 text-white">
<div class="container-fluid px-0 ">
  <!-- Page header area -->
  <div class="container-fluid bg-darker border-bottom">
    <div class="container">
      <!-- pfp and info -->
      <div class="row pt-3">
        <div class="col-md-8 text-white">
          <div class="d-flex flex-wrap">
            <div class="d-flex"><img dmx-bind:src="https://images.hive.blog/u/{{dluxGetAccount.data.result[0].name}}/avatar" alt="" class="rounded-circle bg-light mr-4 cover profile-img"></div>
            <div class="d-flex flex-column">
              <div class="d-flex">
                <p class="display-4 mb-0">{{dluxGetAccount.data.result[0].name}}</p>
              </div>
              <div class="d-flex"><small class="lead p-2">{{dluxGetAccount.data.result[0].posting_json_metadata.parseJSON().profile.about}}</small></div>
            </div>
          </div>
        </div>
        <div class="col-md-4 text-center m-auto"> <a target="_blank" class="btn btn-outline-primary btn-lg m-1" role="button" dmx-bind:href="/vr/@{{dluxGetAccount.data.result[0].name}}">VR Page<i class="fas fa-vr-cardboard mx-2 fa-lg"></i></a>
          <button type="button" class="btn btn-outline-primary dropdown-toggle drop-no-arrow btn-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Actions<i class="fas fa-ellipsis-h ml-2"></i></button>
          <div class="dropdown-menu nav-item dropdown-menu-right"> <a class="dropdown-item" type="button">Follow</a> <a class="dropdown-item" type="button">Unfollow</a> <a class="dropdown-item" type="button">Send DLUX</a> <a class="dropdown-item" type="button" href="#settings">Settings</a></div>
        </div>
      </div>
      <!-- nav tabs -->
      <ul id="usertabs" class="nav nav-tabs bg-darker mx-0 px-0 mt-5 border-bottom-0" role="tablist">
        <li class="nav-item"> <a class="nav-link active" id="blogtab" role="tab" data-toggle="tab" aria-controls="blog" aria-expanded="true" href="#blog">Blog</a></li>
        <li class="nav-item"> <a class="nav-link" id="wallettab" role="tab" data-toggle="tab" aria-controls="wallet" aria-expanded="true" href="#wallet">Wallet</a></li>
        <li class="nav-item"> <a class="nav-link" id="inventorytab" role="tab" data-toggle="tab" aria-controls="inventory" aria-expanded="true" href="#inventory">Inventory</a></li>
        <li class="nav-item"> <a class="nav-link" id="nodetab" role="tab" data-toggle="tab" aria-controls="node" aria-expanded="true" href="#node">Node</a></li>
        <li class="nav-item"> <a class="nav-link" id="settingstab" role="tab" data-toggle="tab" aria-controls="settings" aria-expanded="true" href="#settings">Settings</a></li>
      </ul>
    </div>
  </div>
  <!-- page tab content -->
  <div class="tab-content bg-color">
    <!-- blog tab -->
    <div role="tabpanel" class="tab-pane fade show active" id="blog" aria-labelledby="blogtab">
      <!-- blog repeat -->
      <div class="card-columns p-3" id="blogResult" is="dmx-repeat" dmx-bind:repeat="dluxGetBlog.data.result">
        <div class="card text-white bg-dark mt-2 mb-3">
          <div class="card-header">
            <div class="d-inline-block">
              <div class="float-left" ><a dmx-bind:href="/@{{author}}"><img dmx-bind:src="https://images.hive.blog/u/{{author}}/avatar" alt="" class="rounded-circle bg-light img-fluid mr-2 cover author-img"></a></div>
              <div class="float-left">
                <p class="mt-0 mb-0 text-muted text-semibold"><a dmx-bind:href="/@{{author}}" class="a-1">{{author}}<span class="ml-2 badge badge-pill badge-light">{{author_reputation.toString().rep()}}</span></a></p>
                <small class="text-muted">{{created.formatDate("MMM dd, yyyy")}}</small></div>
            </div>
            <div class="float-right"><span class="badge badge-secondary">{{json_metadata.scat()}}</span></div>
          </div>
          <a href="#detailModal" class="a-1" data-toggle="modal" dmx-on:click="data_detail.select(url)" dmx-bind:onclick="window.history.pushState('{{url}}','{{title}}', '/blog/@{{author}}/{{permlink}}');">
            <h5 class="card-title mt-2 text-center text-capitalize">{{title}}</h5>
            <img src="..."  alt="Card image cap" class="card-img-top" dmx-bind:src="{{json_metadata.parseJSON().picFind()}}" /></a>
          <div class="card-body"><a href="#detailModal" class="a-1" data-toggle="modal" dmx-on:click="data_detail.select(url)" dmx-bind:onclick="window.history.pushState('{{url}}','{{title}}', '/blog/@{{author}}/{{permlink}}');">
            <p class="preview-text">{{body.removeMD().trunc(100,true,"...")}}</p>
          </a></div>
          <center>
            <a dmx-bind:href="{{url}}" type="button" class="btn btn-outline-danger mb-4 btn-launch" target="_blank">Launch App</a>
          </center>
          <div class="card-footer">
            <div class="collapse" dmx-bind:id="vote{{post_id}}">
              <form id="voteForm">
                <div class="d-flex align-items-center text-white-50">
                  <div>
                    <button type="button" class="btn btn-primary" dmx-bind:id="voteBtn{{post_id}}" dmx-bind:onclick="vote('{{author}}','{{permlink}}','slider{{post_id}}')">100%</button>
                    <button type="button" class="btn btn-secondary" data-toggle="collapse" dmx-bind:data-target="{{&quot;#&quot;}}vote{{post_id}}"><span class="close text-white">×</span></button>
                  </div>
                  <div class="flex-fill mx-2">
                    <p class="my-1">
                      <input type="range" class="form-control-range" step="0.01" value="100" dmx-bind:id="slider{{post_id}}" dmx-bind:onchange="updateVoteSubmit('voteBtn{{post_id}}','slider{{post_id}}');">
                    </p>
                  </div>
                  <div>
                    <p class="my-0"><span class="mr-1"  id="commentVal">0</span><i class="ml-1 fab fa-fw fa-hive"></i></p>
                  </div>
                </div>
              </form>
            </div>
            <div class="d-flex align-items-center my-2">
              <div><a data-toggle="collapse" dmx-bind:data-target="{{&quot;#&quot;}}vote{{post_id}}"><i class="fas fa-heart fa-fw mr-1" style="color: {{active_votes.hasVoted('disregardfiat')}}"></i></a>{{active_votes.countUpVotes()}}<i class="fas fa-comment fa-fw ml-2 mr-1"></i>{{children}}</div>
              <div class="ml-auto">{{total_payout_value}}<i class="ml-1 fab fa-fw fa-hive"></i></div>
            </div>
          </div>
        </div>
      </div>
      <!-- blog detail -->
      <dmx-data-detail id="data_detail" dmx-bind:data="dluxGetBlog.data.result" key="url">
        <div class="modal fade" id="detailModal" tabindex="11" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-full modal-xl modal-dialog-centered" role="document">
            <div class="modal-content bg-dark text-white">
              <div class="card text-white bg-dark">
                <div class="card-header">
                  <div class="d-inline-block p-2">
                    <div class="float-left" ><a dmx-bind:href="/@{{data_detail.data.author}}"><img dmx-bind:src="https://images.hive.blog/u/{{data_detail.data.author}}/avatar" alt="" class="rounded-circle bg-light img-fluid mr-2 cover author-img"></a></div>
                    <div class="float-left">
                      <p class="mt-0 mb-0 text-muted text-semibold"><a dmx-bind:href="/@{{data_detail.data.author}}" class="a-1">{{data_detail.data.author}}<span class="ml-2 badge badge-pill badge-light">{{data_detail.data.author_reputation.toString().rep()}}</span></a></p>
                      <small class="text-muted">{{data_detail.data.created.formatDate("MMM dd, yyyy")}}</small></div>
                  </div>
                  <div class="float-right p-2"><span class="badge badge-secondary">{{data_detail.data.json_metadata.scat()}}</span>
                    <button type="button" class="close text-white ml-3" data-dismiss="modal" aria-label="Close" onclick="window.history.back();"><span aria-hidden="true">×</span></button>
                  </div>
                </div>
                <a dmx-bind:href="/blog/@{{data_detail.data.author}}/{{data_detail.data.permlink}}" class="text-white">
                  <h3 class="text-center p-2">{{data_detail.data.title}}</h3>
                </a> <img src="..."  alt="Card image cap" class="card-img-top" dmx-bind:src="{{data_detail.data.json_metadata.parseJSON().picFind()}}" />
                <div class="card-body">
                  <p class="p-2">{{data_detail.data.body.removeMD()}}</p>
                </div>
                <center>
                  <a dmx-bind:href="{{data_detail.data.url}}" type="button" class="btn btn-outline-danger mb-4 btn-launch">Launch App</a>
                </center>
                <div class="card-footer">
                  <div class="collapse" dmx-bind:id="vote{{post_id}}">
                    <form id="voteForm">
                      <div class="d-flex align-items-center text-white-50">
                        <div>
                          <button type="button" class="btn btn-primary" dmx-bind:id="voteBtn{{post_id}}" dmx-bind:onclick="vote('{{comment.author}}','{{data_detail.data.comment.permlink}}','slider{{post_id}}')">100%</button>
                          <button type="button" class="btn btn-secondary" data-toggle="collapse" dmx-bind:data-target="{{&quot;#&quot;}}vote{{post_id}}"><span class="close text-white">×</span></button>
                        </div>
                        <div class="flex-fill mx-2">
                          <p class="my-1">
                            <input type="range" class="form-control-range" step="0.01" value="100" dmx-bind:id="slider{{post_id}}" dmx-bind:onchange="updateVoteSubmit('voteBtn{{post_id}}','slider{{post_id}}');">
                          </p>
                        </div>
                        <p class="my-0"><span class="mr-1"  id="commentVal">0</span><i class="ml-1 fab fa-fw fa-hive"></i></p>
                      </div>
                    </form>
                  </div>
                  <div class="d-flex align-items-center my-2">
                    <div><a data-toggle="collapse" dmx-bind:data-target="{{&quot;#&quot;}}vote{{post_id}}"><i class="fas fa-heart mr-1"></i></a>{{data_detail.data.active_votes.countUpVotes()}}<i class="fas fa-fw fa-comment ml-2 mr-1"></i>{{data_detail.data.children}}</div>
                    <div class="ml-auto">{{data_detail.data.total_payout_value}}<i class="ml-1 fab fa-fw fa-hive"></i></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </dmx-data-detail>
    </div>
    <!-- wallet tab -->
    <div role="tabpanel" class="tab-pane fade show" id="wallet" aria-labelledby="wallettab">
      <div id="walletBanner" class="container no-session">
        <div class="alert alert-danger mt-5" role="alert"> Please log in to see balance information. </div>
      </div>
      <div class="p-3">
        <ul class="nav nav-pills justify-content-center" role="tablist">
          <li class="nav-item"> <a class="nav-link active" href="#dlux" id="dluxtab" role="tab" data-toggle="tab" aria-controls="dlux" aria-expanded="true">DLUX</a></li>
		  <li class="nav-item"> <a class="nav-link " href="#larynx" id="larynxtab" role="tab" data-toggle="tab" aria-controls="larynx" aria-expanded="true">LARYNX</a></li>
          <li class="nav-item"> <a class="nav-link" href="#hive" id="hivetab" role="tab" data-toggle="tab" aria-controls="hive" aria-expanded="true">HIVE</a></li>
        </ul>
      </div>
		 
      <div id="walletcontent" class="tab-content">
		   <!-- dlux wallet tab-->
        <div role="tabpanel" class="tab-pane fade show active" id="dlux" aria-labelledby="dluxtab">
          <div class="container">
            <div class="jumbotron pt-4 bg-darker">
             <div class="d-flex align-items-center pb-2"> <h1 class="display-5 p-0 m-0">DLUX</h1><div class="text-center small p-0 m-0 ml-4" 
						 dmx-class:text-success="dexapi.data.behind < 30"	
						 dmx-class:text-warning="dexapi.data.behind >= 30"
						 dmx-class:text-danger="dexapi.data.behind > 100"> 
			<span dmx-show="dexapi.data.behind < 30">ONLINE - </span> 
			<span dmx-show="dexapi.data.behind >= 30 && dexapi.data.behind <=100">LAGGING - </span> 
			<span dmx-show="dexapi.data.behind > 100">OFFLINE - </span> 
			<span>{{dexapi.data.behind}} BBH</span> </div>
		  </div>
              <p class="lead ">A completely open source platform for p2p games, apps, and experiences.</p>
              <div class="clearfix" dmx-show="usertoken.data.claim > 0">
                <hr class="my-4 bg-light">
                <div class="float-left">
                  <h4>Claim DLUX</h4>
                  <p class="text-white-50">Tokens from earnings, delegation, PoB, node rewards, etc.</p>
                </div>
                <div id="claimdluxbtn" class="float-right text-right d-column">
                  <h5 id="dluxclaim">{{((usertoken.data.claim)/1000).formatNumber(3,'.',',')}} DLUX</h5>
                  <div class="btn-group" role="group" aria-label="DLUX Claim">
                    <button type="submit" class="btn btn-info mr-half" dmx-on:click="claim('{{govcheck.checked}}')"><i class="fas fa-coin"></i><i class="fas fa-money-bill-wave-alt mr-2"></i>Claim</button>
                  </div>
                  <div> <span class="small" dmx-hide="govcheck.checked" >50% Liquid | 50% Power</span> <span class="small" dmx-show="govcheck.checked">50% Liquid | 50% Gov</span> </div>
                  <div dmx-show="usertoken.data.gov > 0" class="bg-dark text-white">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <input id="govcheck" class="btn-outline-secondary" type="checkbox" aria-label="Claim GOV not PWR">
                        </div>
                      </div>
                      <input type="text" class="form-control" placeholder="Claim GOV not PWR">
                    </div>
                  </div>
                </div>
              </div>
              <hr class="my-4 bg-light">
              <div class="clearfix">
                <div class="float-left">
                  <h4>DLUX Token</h4>
                  <p class="text-white-50">The utility token for content distribution and smart contracts, also called a smart media token (SMT)</p>
                </div>
                <div id="dluxactions" class="float-right text-right">
                  <h5 id="dluxbalance">{{((usertoken.data.balance)/1000).formatNumber(3,'.',',')}} DLUX</h5>
                  <div class="btn-group" role="group" aria-label="DLUX Actions">
                    <button type="button" class="btn btn-info mr-half" data-toggle="modal" id="senddluxmodalbutton" data-target="#sendDluxModal"><i class="fas fa-paper-plane mr-2"></i>Send</button>
                    <div class="btn-group" role="group">
                      <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                      <div class="dropdown-menu dropdown-menu-right text-white" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item" href="#" id="powerupdluxbutton" data-toggle="modal" data-target="#powerupDluxModal"><i class="fas fa-angle-double-up fa-fw mr-2"></i>Power Up</a> <a class="dropdown-item" href="#" id="freezedluxbutton" data-toggle="modal" data-target="#lockgovDluxModal"><i class="fas fa-lock fa-fw mr-2"></i>Lock GOV</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" id="buylink" data-toggle="modal" data-target="#buyDluxModal"><i class="fas fa-cart-arrow-down fa-fw mr-2"></i>Buy DLUX</a> <a class="dropdown-item" href="#" id="selllink" data-toggle="modal" data-target="#buyDluxModal"><i class="fas fa-coins fa-fw mr-2"></i>Sell DLUX</a></div>
                    </div>
                  </div>
                </div>
              </div>
              <hr class="my-4 bg-light">
              <div class="clearfix">
                <div class="float-left">
                  <h4>DLUX Power</h4>
                  <p class="text-white-50">Staked tokens (Powered Up) allowing for inflationary rewards on new content</p>
                  <p class="text-white-50">Benefits of DLUX Power:</p>
                  <ul class="text-white-50">
                    <li>Increased voting power on content</li>
                    <li>Increased rewards from content</li>
                    <li>Increased resource credits</li>
                    <li>Instant Power Up | 4 Week Power Down | 1 Week Convert</li>
                  </ul>
                </div>
                <div id="dluxpactions" class="float-right text-right">
                  <h5 id="pwrbalance">{{((usertoken.data.poweredUp)/1000).formatNumber(3,'.',',')}} DLUX</h5>
                  <a data-toggle="collapse" id="delegationsbtn" href="#delegations" role="button" aria-expanded="false" aria-controls="Show delegations" class="text-white d-none" style="text-decoration: none">
                    <h6 id="delegatebal">(-0 G)<i class="fas fa-search ml-2"></i></h6>
                  </a>
                  <div class="btn-group" role="group" aria-label="DLUX Actions">
                    <button type="button" class="btn btn-info mr-half disabled" data-toggle="modal" title="Delegate DLUX" id="delegatedluxbtn" data-target="#sendDluxModal" style="pointer-events: none"><i class="fas fa-user-friends fa-fw mr-2"></i>Delegate</button>
                    <div class="btn-group" role="group">
                      <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ></button>
                      <div class="dropdown-menu dropdown-menu-right text-white" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item" href="#" data-toggle="modal" id="dluxpowerdownModalButton" data-target="#powerdownDluxModal"><i class="fas fa-angle-double-down fa-fw mr-2"></i>Power Down</a> <a class="dropdown-item disabled" href="#" data-toggle="modal" id="powertogovbutton" data-target="#sendDluxModal"><i class="fas fa-random fa-fw mr-2"></i>Convert to GOV</a></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="collapse" id="delegations">
                <hr class="my-2 bg-light">
                <div class="clearfix">
                  <p class="float-left pt-2">@username was delegated 1000 DP 5 Days Ago</p>
                  <div class="float-right">
                    <button class="btn btn-secondary"><i class="fas fa-fw fa-user-edit"></i></button>
                    <button class="btn btn-danger ml-1"><i class="fas fa-fw fa-trash-alt"></i></button>
                  </div>
                </div>
              </div>
              <hr class="my-4 bg-light">
              <div class="clearfix">
                <div class="float-left">
                  <h4>DLUX Governance</h4>
                  <p class="text-white-50">Locked tokens used to determine concensus and earn rewards for running a node</p>
                  <p class="text-white-50">Benefits of DLUX Governance:</p>
                  <ul class="text-white-50">
                    <li>Provides liquid funds to DAO multi-sig wallet</li>
                    <li>Ensures collateral for DEX escrow transactions</li>
                    <li>Enables voting on proposed community measures</li>
                    <li>1 Week Lock | 4 Week Unlock | 1 Week Convert</li>
                  </ul>
                </div>
                <div id="dluxgactions" class="float-right text-right">
                  <h5 id="govbalance">{{((usertoken.data.gov)/1000).formatNumber(3,'.',',')}} DLUX</h5>
                  <a data-toggle="collapse" id="escrowtxbutton" href="#escrowtx" role="button" aria-expanded="false" aria-controls="Show escrow transactions" class="text-white" style="text-decoration: none">
                    <h6 id="escrowbal">(-0 DG)<i class="fas fa-search ml-2"></i></h6>
                  </a>
                  <div class="btn-group" role="group" aria-label="DLUX Actions">
                    <button type="button" class="btn btn-info mr-half" disabled title="Coming soon!" style="pointer-events: none;"><i class="fas fa-balance-scale fa-fw mr-2"></i>Measures</button>
                    <div class="btn-group" role="group">
                      <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                      <div class="dropdown-menu dropdown-menu-right text-white" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item" href="#" data-toggle="modal" id="dluxgovdownModalButton" data-target="#unlockgovDluxModal"><i class="fas fa-lock-open fa-fw mr-2"></i>Unlock GOV</a> <a class="dropdown-item disabled" href="#" data-toggle="modal" id="govtopowerbutton" data-target="#sendDluxModal"><i class="fas fa-random fa-fw mr-2"></i>Convert to PWR</a></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="collapse" id="escrowtx">
                <hr class="my-2 bg-light">
              </div>
              <hr class="my-4 bg-light">
              <div class="clearfix">
                <div class="float-left">
                  <h4>Estimated Account Value</h4>
                  <p class="text-white-50">The approximate US Dollar value for all DLUX in your account</p>
                </div>
                <div id="dluxval" class="float-right text-right">
                  <h5 id="totaldbal">{{(((usertoken.data.balance+usertoken.data.poweredUp+usertoken.data.gov)/1000)*(dexapi.data.markets.hive.tick*hiveprice.data.hive.usd)).formatCurrency()}}</h5>
                </div>
              </div>
            </div>
            <div id="dluxtxs" class="jumbotron pt-3 bg-darker text-white"></div>
          </div>
        </div>
		  <!-- larynx wallet tab-->
		   <div role="tabpanel" class="tab-pane fade show " id="larynx" aria-labelledby="larynxtab">
          <div class="container">
            <div class="jumbotron pt-4 bg-darker">
              <div class="d-flex align-items-center pb-2"><h1 class="display-5 m-0 p-0">LARYNX</h1>
				<div class="text-center small m-0 p-2 ml-2" 
						 dmx-class:text-success="larynxdexapi.data.behind < 30"	
						 dmx-class:text-warning="larynxdexapi.data.behind >= 30"
						 dmx-class:text-danger="larynxdexapi.data.behind > 100"> 
			<span dmx-show="larynxdexapi.data.behind < 30">ONLINE - </span> 
			<span dmx-show="larynxdexapi.data.behind >= 30 && larynxdexapi.data.behind <=100">LAGGING - </span> 
			<span dmx-show="larynxdexapi.data.behind > 100">OFFLINE - </span> 
			<span>{{larynxdexapi.data.behind}} BBH</span> 
		  </div></div>
              <p class="lead ">Powering the spk network.</p>
              <div class="clearfix"  dmx-show="larynxtoken.data.drop.last_claim.parseInt(16) != frmDate.value && larynxtoken.data.claim > 0">
                <hr class="my-4 bg-light">
                <div class="float-left">
                  <h4>Claim LARYNX</h4>
                  <p class="text-white-50">This months claimable tokens based on a January 6th HIVE blockchain snapshot.</p>
					<p>Tokens not claimed do not roll over to next month.</p>
					<input type="text" name="frmDateReg" required id="frmDate" value="" class="d-none">
                </div>
                <div id="claimlarynxbtn" class="float-right text-right d-column">
                  <h5>{{((larynxtoken.data.drop.availible.amount)/1000).formatNumber(3,'.',',')}} LARYNX</h5>
                  <div class="btn-group" role="group" aria-label="LARYNX Claim">
                    <button type="submit" class="btn btn-info mr-half" dmx-on:click="claimLarynx()"><i class="fas fa-coin"></i><i class="fas fa-money-bill-wave-alt mr-2"></i>Claim</button>
                  </div>
                  </div>
                </div>
              <hr class="my-4 bg-light">
              <div class="clearfix">
                <div class="float-left">
                  <h4>LARYNX Token</h4>
                  <p class="text-white-50">The utility token for the spk network.</p>
                </div>
                <div id="larynxactions" class="float-right text-right">
                  <h5 id="larynxbalance">{{((larynxtoken.data.balance)/1000).formatNumber(3,'.',',')}} LARYNX</h5>
                  <div class="btn-group" role="group" aria-label="DLUX Actions">
                    <button type="button" class="btn btn-info mr-half" data-toggle="modal" id="sendlarynxmodalbutton" data-target="#sendLarynxModal"><i class="fas fa-paper-plane mr-2"></i>Send</button>
                    <div class="btn-group" role="group">
                      <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                      <div class="dropdown-menu dropdown-menu-right text-white" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item disabled" href="#" id="powerupdluxbutton" data-toggle="modal" data-target="#powerupDluxModal"><i class="fas fa-angle-double-up fa-fw mr-2"></i>Power Up</a> <a class="dropdown-item" href="#" id="freezedluxbutton" data-toggle="modal" data-target="#powerupDluxModal"><i class="fas fa-lock fa-fw mr-2"></i>Lock GOV</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item disabled" href="#" id="buylink" data-toggle="modal" data-target="#buyDluxModal"><i class="fas fa-cart-arrow-down fa-fw mr-2"></i>Buy LARYNX</a> <a class="dropdown-item disabled" href="#" id="selllink" data-toggle="modal" data-target="#buyDluxModal"><i class="fas fa-coins fa-fw mr-2"></i>Sell LARYNX</a></div>
                    </div>
                  </div>
                </div>
              </div>
              <hr class="my-4 bg-light">
              <div class="clearfix">
                <div class="float-left">
                  <h4>LARYNX Power</h4>
                  <p class="text-white-50">Not yet available</p>
                  <p class="text-white-50">Benefits of LARYNX Power:</p>
                  <ul class="text-white-50">
                    <li>Similar to running mining hardware</li>
                    <li>Instant Power Up</li>
					<li>Cannot be Powered Down, sold, or traded</li>
                  </ul>
                </div>
                <div id="larynxpactions" class="float-right text-right">
                  <h5 id="larynxpwrbalance">{{((larynxtoken.data.poweredUp)/1000).formatNumber(3,'.',',')}} LARYNX</h5>
                  <a data-toggle="collapse" id="delegationsbtn" href="#delegations" role="button" aria-expanded="false" aria-controls="Show delegations" class="text-white d-none" style="text-decoration: none">
                    <h6 id="delegatebal">(-0 DG)<i class="fas fa-search ml-2"></i></h6>
                  </a>
                  <div class="btn-group" role="group" aria-label="DLUX Actions">
                    <button type="button" class="btn btn-info mr-half disabled" data-toggle="modal" title="Delegate DLUX" id="delegatedluxbtn" data-target="#sendDluxModal" style="pointer-events: none"><i class="fas fa-user-friends fa-fw mr-2"></i>Delegate</button>
                    <div class="btn-group" role="group">
                      <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ></button>
                      <div class="dropdown-menu dropdown-menu-right text-white" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item disabled" href="#" data-toggle="modal" id="dluxpowerdownModalButton" data-target="#powerdownDluxModal"><i class="fas fa-angle-double-down fa-fw mr-2"></i>Power Down</a> <a class="dropdown-item disabled" href="#" data-toggle="modal" id="powertogovbutton" data-target="#sendDluxModal"><i class="fas fa-random fa-fw mr-2"></i>Convert to GOV</a></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="collapse" id="delegations">
                <hr class="my-2 bg-light">
                <div class="clearfix">
                  <p class="float-left pt-2">@username was delegated 1000 DP 5 Days Ago</p>
                  <div class="float-right">
                    <button class="btn btn-secondary"><i class="fas fa-fw fa-user-edit"></i></button>
                    <button class="btn btn-danger ml-1"><i class="fas fa-fw fa-trash-alt"></i></button>
                  </div>
                </div>
              </div>
              <hr class="my-4 bg-light">
              <div class="clearfix">
                <div class="float-left">
                  <h4>LARYNX Governance</h4>
                  <p class="text-white-50">Locked tokens used to determine concensus and earn rewards for running a node</p>
                  <p class="text-white-50">Benefits of LARYNX Governance:</p>
                  <ul class="text-white-50">
                    <li>Provides liquid funds to DAO multi-sig wallet</li>
                    <li>Ensures collateral for DEX escrow transactions</li>
                    <li>Enables voting on proposed community measures</li>
                    <li>1 Week Lock | 4 Week Unlock | 1 Week Convert</li>
                  </ul>
                </div>
                <div id="larynxgactions" class="float-right text-right">
                  <h5 id="govbalance">{{((larynxtoken.data.gov)/1000).formatNumber(3,'.',',')}} LARYNX</h5>
                  <a data-toggle="collapse" id="larynxescrowtxbutton" href="#larynxescrowtx" role="button" aria-expanded="false" aria-controls="Show escrow transactions" class="text-white" style="text-decoration: none">
                    <h6 id="escrowbal">(-0 G)<i class="fas fa-search ml-2"></i></h6>
                  </a>
                  <div class="btn-group" role="group" aria-label="LARYNX Actions">
                    <button type="button" class="btn btn-info mr-half" disabled title="Coming soon!" style="pointer-events: none;"><i class="fas fa-balance-scale fa-fw mr-2"></i>Measures</button>
                    <div class="btn-group" role="group">
                      <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                      <div class="dropdown-menu dropdown-menu-right text-white" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item" href="#" data-toggle="modal" id="dluxgovdownModalButton" data-target="#powerdownDluxModal"><i class="fas fa-lock-open fa-fw mr-2"></i>Unlock GOV</a> <a class="dropdown-item disabled" href="#" data-toggle="modal" id="govtopowerbutton" data-target="#sendDluxModal"><i class="fas fa-random fa-fw mr-2"></i>Convert to PWR</a></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="collapse" id="larynxescrowtx">
                <hr class="my-2 bg-light">
              </div>
              <hr class="my-4 bg-light">
              <div class="clearfix">
                <div class="float-left">
                  <h4>Estimated Account Value</h4>
                  <p class="text-white-50">The approximate US Dollar value for all LARYNX in your account</p>
                </div>
                <div class="float-right text-right">
                  <h5 id="totallarynx">{{(((larynxtoken.data.balance+larynxtoken.data.poweredUp+larynxtoken.data.gov)/1000)*(larynxdexapi.data.markets.hive.tick*hiveprice.data.hive.usd)).formatCurrency()}}</h5>
                </div>
              </div>
            </div>
            <div id="larynxtxs" class="jumbotron pt-3 bg-darker text-white">
			  </div>
          </div>
		  </div>
		  <!-- hive wallet tab-->
        <div role="tabpanel" class="tab-pane fade show" id="hive" aria-labelledby="hivetab">
          <div class="container">
            <div class="jumbotron pt-4 bg-darker">
              <h1 class="display-5">HIVE</h1>
              <p class="lead ">A proof-of-stake blockchain built for censorship resistant content and apps</p>
              <hr class="my-4 bg-light">
              <div class="clearfix">
                <div class="float-left">
                  <h4>HIVE Token</h4>
                  <p class="text-white-50">The main token of the chain, often rewarded for content.</p>
                </div>
                <div id="hiveactions" class="float-right text-right">
                  <h5 id="hivebalance">{{accountapi.data.result[0].balance}}</h5>
                  <div class="btn-group" role="group" aria-label="DLUX Actions">
                    <button type="button" class="btn btn-info mr-half" data-toggle="modal" id="sendhivemodalbutton" data-target="#sendDluxModal"><i class="fas fa-paper-plane mr-2"></i>Send</button>
                    <div class="btn-group" role="group">
                      <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                      <div class="dropdown-menu dropdown-menu-right text-white" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item disabled" href="#"  id="poweruphivebutton" data-toggle="modal" data-target="#powerupDluxModal"><i class="fas fa-angle-double-up fa-fw mr-2"></i>Power Up</a> <a class="dropdown-item disabled" href="#"><i class="fas fa-random fa-fw mr-2"></i>Convert to HBD</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/dex/"><i class="fas fa-store fa-fw mr-2"></i>Trade</a></div>
                    </div>
                  </div>
                </div>
              </div>
              <hr class="my-4 bg-light">
              <div class="clearfix">
                <div class="float-left">
                  <h4>HIVE Power</h4>
                  <p class="text-white-50">Staked tokens (Powered Up) allowing for inflationary rewards on new content</p>
                  <p class="text-white-50">Benefits of HIVE Power:</p>
                  <ul class="text-white-50">
                    <li>Increased voting power on content</li>
                    <li>Increased rewards from content</li>
                    <li>Increased resource credits</li>
                  </ul>
                </div>
                <div id="hivepactions" class="float-right text-right">
                  <h5 id="hpbal"> {{((hivestatsapi.data.result.total_vesting_fund_hive.parseFloat()*accountapi.data.result[0].vesting_shares.parseFloat())/hivestatsapi.data.result.total_vesting_shares.parseFloat()).formatNumber('3','.',',')}} HP</h5>
                  <div class="btn-group" role="group" aria-label="DLUX Actions">
                    <button type="button" class="btn btn-info mr-half" style="pointer-events: none;" disabled><i class="fas fa-user-friends mr-2"></i>Delegate</button>
                    <div class="btn-group" role="group">
                      <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                      <div class="dropdown-menu dropdown-menu-right text-white" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item disabled" href="#"><i class="fas fa-angle-double-down fa-fw mr-2"></i>Power Down</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item disabled" href="../dex/">Claim Account Creation Token</a></div>
                    </div>
                  </div>
                </div>
              </div>
              <hr class="my-4 bg-light">
              <div class="clearfix">
                <div class="float-left">
                  <h4>HIVE Backed Dollar</h4>
                  <p class="text-white-50">Also a reward for content, this token is pegged to the US Dollar</p>
                </div>
                <div id="hbdactions" class="float-right text-right">
                  <h5 id="hbdbalance">{{accountapi.data.result[0].hbd_balance}}</h5>
                  <div class="btn-group" role="group" aria-label="DLUX Actions">
                    <button type="button" class="btn btn-info mr-half" data-toggle="modal" id="sendhbdmodalbutton" data-target="#sendDluxModal"><i class="fas fa-paper-plane mr-2"></i>Send</button>
                    <div class="btn-group" role="group">
                      <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                      <div class="dropdown-menu dropdown-menu-right text-white" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item disabled" href="#"><i class="fas fa-random fa-fw mr-2"></i>Convert to HIVE</a> <a class="dropdown-item disabled" href="#"><i class="fas fa-piggy-bank fa-fw mr-2"></i>Transfer to Savings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/dex/"><i class="fas fa-store fa-fw mr-2"></i>Trade</a></div>
                    </div>
                  </div>
                </div>
              </div>
              <hr class="my-4 bg-light">
              <div class="clearfix">
                <div class="float-left">
                  <h4>HIVE Savings</h4>
                  <p class="text-white-50 mb-0">A 3 day waiting period is imposed on withdrawl</p>
                </div>
                <div id="savingsactions" class="float-right text-right">
                  <h5 id="savbal">{{accountapi.data.result[0].savings_hbd_balance}}</h5>
                </div>
              </div>
              <hr class="my-4 bg-light">
              <div class="clearfix">
                <div class="float-left">
                  <h4>Estimated Account Value</h4>
                  <p class="text-white-50">The approximate US Dollar value for all HIVE in your account</p>
                </div>
                <div id="hiveval" class="float-right text-right">
                  <h5 id="totalhivebalance">{{(((((hivestatsapi.data.result.total_vesting_fund_hive.parseFloat()*accountapi.data.result[0].vesting_shares.parseFloat())/hivestatsapi.data.result.total_vesting_shares.parseFloat())+accountapi.data.result[0].balance.parseFloat())*hiveprice.data.hive.usd)+((accountapi.data.result[0].hbd_balance.parseFloat()+accountapi.data.result[0].savings_hbd_balance.parseFloat())*hbdprice.data.hive_dollar.usd)).formatCurrency()}} </h5>
                </div>
              </div>
            </div>
            <div id="hivetransactions" class="jumbotron pt-3 bg-darker text-white">
				
			  
				</div>
			  </div>
          </div>
        </div>
      </div>
    <!-- inventory tab -->
    <div role="tabpanel" class="tab-pane fade show" id="inventory" aria-labelledby="inventorytab">
      <div class="container">
        <!-- Trade FT repeat -->
        <div class="card-columns cc-3 pt-5" id="trade-ft-cards" is="dmx-repeat" dmx-bind:repeat="tradefts.data.result">
          <div dmx-bind:id="{{script}}-trade-card" class="card text-white" style="border: none;"> {{script.getSetDetailsColors('-trade-card')}}
            <div class="card-header border-0 d-flex align-items-center justify-content-between" >
              <div class="rounded-pill d-flex align-items-center p-2" style="background-color: black">
                <div class="pr-2"><small>QTY: </small></div>
                <div class="px-2">
                  <h2 class="m-0">{{1.pad(3)}}</h2>
                </div>
              </div>
              <div> <a dmx-bind:href="/nfts/set/{{set}}">
                <h3 class="card-title lead shimmer rounded p-2 m-0 ml-auto" style="color: black"><b>{{set}} NFT</b></h3>
              </a></div>
            </div>
            <div class="card-body text-center d-flex flex-column lead">
              <div class="px-2 py-5 text-center rounded" style="background-color: rgba(0,0,0,0.75)">{{script.getSetDetailsIcon('-trade-icon')}}
                <h1 class="text-center rainbow-text"><i dmx-bind:id="{{script}}-trade-icon"></i></h1>
                <h3 class="my-0 mx-2 p-0 p-2 ml-auto rainbow-text">sealed NFT</h3>
                <h5>Unwrap to see what's inside.</h5>
              </div>
              From: {{from}} To: {{to}} Price: {{price}} </div>
            <div class="card-footer" dmx-show="(to == userCookie.value)" style="background: rgba(0,0,0,0.8)">
              <div class="d-flex flex-wrap justify-content-between">
                <button type="button" class="btn btn-success mr-auto ml-auto mt-1" dmx-on:click="tradeFTaccept('{{set}}','{{uid}}')">Accept<i class="fas fa-check-square ml-3"></i></button>
                <button type="button" class="btn btn-danger mr-auto ml-auto mt-1" dmx-on:click="tradeFTreject('{{set}}','{{uid}}')">Reject<i class="fas fa-window-close ml-3"></i></button>
              </div>
            </div>
            <div class="card-footer" dmx-show="(from == userCookie.value)">
              <div class="d-flex flex-wrap justify-content-around">
                <button type="button" class="btn btn-warning mr-auto ml-auto mt-1" dmx-on:click="tradeFTcancel('{{set}}','{{uid}}')">Cancel<i class="fas fa-window-close ml-3"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- Trade NFT repeat -->
        <div class="card-columns cc-3 pt-5" id="trade-nft-cards" is="dmx-repeat" dmx-bind:repeat="tradenfts.data.result">
          <div class="card text-white bg-dark ">
            <div class="card-header border-0 d-flex align-items-center" dmx-bind:id="{{script}}{{uid}}-nftheader">{{script.getSetDetailsColors(uid+'-nftheader')}}
              <div class="rounded-pill d-flex align-items-center p-2" style="background-color: black">
                <h2 class="m-0 px-2">{{uid}}</h2>
              </div>
              <h3 class="card-title lead border rounded border-dark p-2 ml-auto mb-0 "><a dmx-bind:href="/nfts/set/{{set}}" class="lead" style="color: black">{{set}} NFT</a></h3>
            </div>
            <div class="card-img-top" dmx-bind:id="image-{{set}}-{{uid}}" dmx-bind:alt="{{script}}">{{uid.nftImageWell(script, set)}}</div>
            <div class="text-center d-flex flex-column">
              <div> <span dmx-show="to == userCookie.value">From: <a dmx-bind:href="/@{{from}}">{{from}}</a></span> <span dmx-show="from == userCookie.value">To: <a dmx-bind:href="/@{{to}}">{{to}}</a></span> </div>
              <div>Price: {{nai.nai()}}</div>
            </div>
            <div class="card-footer" dmx-show="(to == userCookie.value)">
              <div class="d-flex flex-wrap justify-content-between">
                <button type="button" class="btn btn-success mr-auto ml-auto mt-1" dmx-on:click="tradeNFTaccept('{{set}}','{{uid}}','{{price}}','{{nai.token}}')">Accept<i class="fas fa-check-square ml-3"></i></button>
                <button type="button" class="btn btn-danger mr-auto ml-auto mt-1" dmx-on:click="tradeNFTreject('{{set}}','{{uid}}')">Reject<i class="fas fa-window-close ml-3"></i></button>
              </div>
            </div>
            <div class="card-footer" dmx-show="(from == userCookie.value)">
              <div class="d-flex flex-wrap justify-content-around">
                <button type="button" class="btn btn-warning mr-auto ml-auto mt-1" dmx-on:click="tradeNFTcancel('{{set}}','{{uid}}')">Cancel<i class="fas fa-window-close ml-3"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- Mint repeat -->
        <div class="card-columns cc-3 pt-5" id="inventory-mint" is="dmx-repeat" dmx-bind:repeat="inventorydata.data.mint_tokens">
          <div dmx-bind:id="{{script}}-card" class="card text-white border-0"> {{script.getSetDetailsColors('-card')}}
            <div class="card-header d-flex align-items-center justify-content-between" >
              <div class="rounded-pill d-flex align-items-center p-2" style="background-color: black">
                <div class="pr-2"><small>QTY: </small></div>
                <div class="px-2">
                  <h2 class="m-0">{{qty.pad(3)}}</h2>
                </div>
              </div>
              <div> <a dmx-bind:href="/nfts/set/{{set}}">
                <h3 class="card-title lead shimmer rounded p-2 m-0 ml-auto" style="color: black"><b>{{set}} NFT</b></h3>
              </a></div>
            </div>
            <div class="card-body text-center d-flex flex-column lead">
              <div class="px-2 py-5 text-center rounded" style="background-color: rgba(0,0,0,0.75)">
                <div dmx-bind:id="{{script}}wrapped"> {{script.getSetPhotos('','wrapped','rounded max-160')}}</div>
                <div dmx-bind:id="{{script}}-header"  style="-webkit-background-clip: text;color: transparent;">{{script.getSetDetailsColorsTxt('-header')}}
                  <h3 class="my-0 mx-2 p-0 p-2 ml-auto">sealed NFT</h3>
                </div>
                <h5>Unwrap to see what's inside.</h5>
              </div>
            </div>
            <div class="card-footer" dmx-show="(inventorydata.data.user == userCookie.value)">
              <div class="d-flex flex-wrap justify-content-between">
                <button type="button" class="btn btn-outline-dark mr-auto ml-auto mt-1" dmx-on:click="openFT('{{set}}')">Open<i class="fas fa-box-open ml-3"></i></button>
                <button type="button" class="btn btn-outline-dark mr-auto ml-auto mt-1" data-toggle="modal" href="#mintTransferModal" dmx-on:click="mint_detail.select(set)">Transfer<i class="fas fa-exchange-alt ml-3"></i></button>
              </div>
            </div>
          </div>
        </div>
		
        <!-- Transfer FT Mint -->
        <dmx-data-detail id="mint_detail" dmx-bind:data="inventorydata.data.mint_tokens" key="set">
        <div class="modal fade show" id="mintTransferModal" tabindex="11" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-full modal-dialog-centered" role="document">
            <div class="modal-content bg-dark text-white">
              <div class="border border-info bg-darker mx-auto px-5 py-3 rounded col-12">
                <div class="container-fluid">
                  <h3 class="text-center">Transfer {{mint_detail.data.set}} FT</h3>
                  <ul class="nav nav-pills bg-darker justify-content-center" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" id="giveFTlink" role="tab" data-toggle="tab" aria-controls="giveFT" aria-expanded="true" href="#giveFTtab">Give</a></li>
                    <li class="nav-item"> <a class="nav-link" id="tradeFTlink" role="tab" data-toggle="tab" aria-controls="tradeFT" aria-expanded="true" href="#tradeFTtab">Trade</a></li>
                    <li class="nav-item"> <a class="nav-link" id="sellFTlink" role="tab" data-toggle="tab" aria-controls="sellFT" aria-expanded="true" href="#sellFTtab">Sell</a></li>
                    <li class="nav-item"> <a class="nav-link" id="auctionFTlink" role="tab" data-toggle="tab" aria-controls="auctionFT" aria-expanded="true" href="#auctionFTtab">Auction</a></li>
                    <li class="nav-item"> <a class="nav-link" id="airdropFTlink" role="tab" data-toggle="tab" aria-controls="airdropFT" aria-expanded="true" href="#airdropFTtab">Airdrop</a></li>
                  </ul>
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade show active" id="giveFTtab" aria-labelledby="giveFT">
                      <form class="needs-validation mt-4" validate dmx-bind:action="javascript:giveFT('{{mint_detail.data.set}}','{{giveFTusername.value}}','{{giveFTqty.value}}')">
                        <div class="form-row my-2">
                          <div class="col-12">
                            <label for="giveFTusername">Username</label>
                            <div class="input-group">
                              <div class="input-group-prepend"> <span class="input-group-text" id="giveFTuserprep">@</span></div>
                              <input type="text" class="form-control r-radius-hotfix" id="giveFTusername" aria-describedby="giveFTuserprep" required>
                              <div class="invalid-feedback"> Please enter the username you'd like to give to. </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-row my-2">
                          <div class="col-12">
                            <label for="giveFTqty">Quantity</label>
                            <div class="input-group">
                              <input type="number" class="form-control" id="giveFTqty" aria-describedby="giveFTqtyappend" value="1" step="1" min="1" required>
                              <div class="input-group-append"> <span class="input-group-text r-radius-hotfix" id="giveFTqtyappend">{{mint_detail.data.set}} FT</span></div>
                              <div class="invalid-feedback"> Please enter the number of FTs to send. </div>
                            </div>
                          </div>
                        </div>
                        <center>
                          <button id="giveFTbutton" class="btn btn-info my-2" type="submit">Give</button>
                        </center>
                      </form>
                    </div>
                    <div role="tabpanel" class="tab-pane fade show" id="tradeFTtab" aria-labelledby="tradeFT">
                      <form class="needs-validation mt-4" validate dmx-bind:action="javascript:tradeFT('{{mint_detail.data.set}}','{{tradeFTusername.value}}','{{tradeFTamount.value}}')">
                        <div class="form-row my-2">
                          <div class="col-12">
                            <label for="tradeFTusername">Username</label>
                            <div class="input-group">
                              <div class="input-group-prepend"> <span class="input-group-text" id="tradeFTuserprep">@</span></div>
                              <input type="text" class="form-control r-radius-hotfix" id="tradeFTusername" aria-describedby="tradeFTuserprep" required>
                              <div class="invalid-feedback"> Please enter the username you'd like to trade with. </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-row my-2">
                          <div class="col-6">
                            <label for="tradeFTqty">Quantity</label>
                            <div class="input-group">
                              <input type="number" class="form-control" id="tradeFTqty" aria-describedby="tradeFTqtyappend" placeholder="1" step="1" min="1" required readonly>
                              <div class="input-group-append"> <span class="input-group-text r-radius-hotfix" id="tradeFTqtyappend">{{mint_detail.data.set}} FT</span></div>
                              <div class="invalid-feedback"> Please enter the number of FTs to trade. </div>
                            </div>
                          </div>
                          <div class="col-6">
                            <label for="tradeFTamount">Amount</label>
                            <div class="input-group">
                              <input type="number" class="form-control" id="tradeFTamount" aria-describedby="tradeFTamountappend" placeholder="0.000" step="0.001" min="0.001" required>
                              <div class="input-group-append"> <span class="input-group-text r-radius-hotfix" id="tradeFTamountappend">DLUX</span> </div>
                              <div class="invalid-feedback"> Please enter the amount of DLUX you'd like to receive. </div>
                            </div>
                          </div>
                        </div>
                        <center>
                          <button id="tradeFTbutton" class="btn btn-info my-2" type="submit">Propose Trade</button>
                        </center>
                      </form>
                    </div>
                    <div role="tabpanel" class="tab-pane fade show " id="sellFTtab" aria-labelledby="sellFT">
                      <form class="needs-validation mt-4" validate dmx-bind:action="javascript:sellFT('{{mint_detail.data.set}}','{{sellFTprice.value}}','{{sellFTpriceType.value}}')">
                        <div class="form-row my-2">
                          <div class="col-6">
                            <label for="sellFTqty">Quantity</label>
                            <div class="input-group">
                              <input type="number" class="form-control" id="sellFTqty" aria-describedby="sellFTqtyappend" placeholder="1" step="1" min="1" required readonly>
                              <div class="input-group-append"> <span class="input-group-text r-radius-hotfix" id="sellFTqtyappend">{{mint_detail.data.set}} FT</span></div>
                              <div class="invalid-feedback"> Please enter the number of FTs to sell. </div>
                            </div>
                          </div>
                          <div class="col-6">
                            <label for="sellFTprice">Sale Price</label>
                            <small class="ml-auto mb-2 align-self-center text-white-50" id="sellFTfeeDlux" dmx-show="sellFTpriceType.value == 'DLUX'">0% FEE</small> <small class="ml-auto mb-2 align-self-center text-white-50" id="sellFTfeeHive" dmx-show="sellFTpriceType.value != 'DLUX'">1% FEE</small>
                            <div class="input-group">
                              <input type="number" class="form-control bg-dark border-dark text-info" id="sellFTprice" aria-describedby="sellFTpriceappend" placeholder="0.000" step="0.001" min="0.001" required>
                              <div class="input-group-append"> <span class="input-group-text bg-dark border-dark r-radius-hotfix m-0" id="sellFTpriceappend">
                                <select class="form-select border-0 text-white-50 bg-none w-100 h-100" id="sellFTpriceType" aria-label="Sell price type select">
                                  <option value="DLUX" selected>DLUX</option>
                                  <option value="HIVE">HIVE</option>
                                  <option value="HBD">HBD</option>
                                </select>
                              </span></div>
                              <div class="invalid-feedback"> Please enter the amount of {{sellFTpriceType.value}} you'd like to receive. </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-row my-2">
                          <p class="text-white-50 small">Ownership will be transferred to the DAO listing service and sold publicly. Cancel anytime to return immediately.</p>
                        </div>
                        <center>
                          <button id="sellFTbutton" class="btn btn-info my-2" type="submit" >List Item</button>
                        </center>
                      </form>
                    </div>
                    <center>
                      <div role="tabpanel" class="tab-pane fade show " id="auctionFTtab" aria-labelledby="auctionFT">
                        <form class="needs-validation mt-4" validate dmx-bind:action="javascript:auctionFT('{{mint_detail.data.set}}','{{auctionFTprice.value}}','{{Date.now()}}','{{auctionFTdays.value}}')">
                          <div class="form-row my-2">
                            <div class="col-6">
                              <label for="auctionFTqty">Quantity</label>
                              <div class="input-group">
                                <input type="number" class="form-control" id="auctionFTqty" aria-describedby="auctionFTqtyappend" placeholder="1" step="1" min="1" required readonly>
                                <div class="input-group-append"> <span class="input-group-text r-radius-hotfix" id="auctionFTqtyappend">{{mint_detail.data.set}} FT</span></div>
                                <div class="invalid-feedback"> Please enter the number of FTs to auction. </div>
                              </div>
                            </div>
                            <div class="col-6">
                              <label for="auctionFTprice">Starting Bid</label>
                              <div class="input-group">
                                <input type="number" class="form-control" id="auctionFTprice" aria-describedby="auctionFTpriceappend" placeholder="0.000" step="0.001" min="0.001" required>
                                <div class="input-group-append">
                                  <div class="input-group-text" id="auctionFTpriceappend">DLUX</div>
                                </div>
                                <div class="invalid-feedback"> Please enter the amount of DLUX you'd like to start the bidding. </div>
                              </div>
                            </div>
                          </div>
                          <div class="d-flex justify-content-around">
                            <div class="form-row my-2 d-flex align-items-center">
                              <label for="auctionFTdays" class="m-0">Duration: </label>
                              <select class="mx-2 btn btn-lg btn-secondary" id="auctionFTdays" required >
                                <option value="1">1 Day</option>
                                <option value="2">2 Days</option>
                                <option value="3">3 Days</option>
                                <option value="4">4 Days</option>
                                <option value="5">5 Days</option>
                                <option value="6">6 Days</option>
                                <option value="7" selected>7 Days</option>
                                <option value="8">8 Days</option>
                                <option value="9">9 Days</option>
                                <option value="10">10 Days</option>
                                <option value="11">11 Days</option>
                                <option value="12">12 Days</option>
                                <option value="13">13 Days</option>
                                <option value="14">14 Days</option>
                                <option value="15">15 Days</option>
                                <option value="16">16 Days</option>
                                <option value="17">17 Days</option>
                                <option value="18">18 Days</option>
                                <option value="19">19 Days</option>
                                <option value="20">20 Days</option>
                                <option value="21">21 Days</option>
                                <option value="22">22 Days</option>
                                <option value="23">23 Days</option>
                                <option value="24">24 Days</option>
                                <option value="25">25 Days</option>
                                <option value="26">26 Days</option>
                                <option value="27">27 Days</option>
                                <option value="28">28 Days</option>
                                <option value="29">29 Days</option>
                                <option value="30">30 Days</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-row my-2">
                            <p class="text-white-50 small">Ownership will be transferred to the DAO listing service and auctioned publicly. Once submitted this cannot be cancelled. If there are no bids at the end of the auction period, it will be returned to you immediately.</p>
                          </div>
                          <center>
                            <button class="btn btn-info my-2" type="submit">List Item</button>
                          </center>
                        </form>
                      </div>
                      <div role="tabpanel" class="tab-pane fade show " id="airdropFTtab" aria-labelledby="airdropFT">
                        <form class="needs-validation mt-4" validate dmx-bind:action="javascript:airdropFT('{{mint_detail.data.set}}','{{airdropFTusers.value}}')">
                          <div class="form-row my-2">
                            <div class="col-12">
                              <label for="airdropFTusers">Airdrop to:</label>
                              <div class="input-group">
                                <textarea name="paragraph_text" cols="50" rows="2" class="form-control r-radius-hotfix" id="airdropFTusers" aria-describedby="airdropFT" required placeholder="name user-name"></textarea>
                                <div class="invalid-feedback"> Please enter at least one user name to airdrop tokens to. </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-row my-2">
                            <div class="col-12">
                              <label for="airdropFTqty">Quantity sent to each:</label>
                              <div class="input-group">
                                <input type="number" class="form-control" id="airdropFTqty" aria-describedby="airdropFTqtyappend" placeholder="1" step="1" min="1" required readonly>
                                <div class="input-group-append"> <span class="input-group-text r-radius-hotfix" id="airdropFTqtyappend">{{mint_detail.data.set}} FT</span></div>
                                <div class="invalid-feedback"> Please enter the number of FTs to send to each account. </div>
                              </div>
                            </div>
                          </div>
                          <center>
                            <button class="btn btn-info my-2" type="submit">Airdrop Tokens</button>
                          </center>
                        </form>
                      </div>
                    </center>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <center>
          </dmx-data-detail>
          <!-- NFT repeat -->
          <div class="card-columns cc-3 pt-5" id="inventory-cards" is="dmx-repeat" dmx-bind:repeat="inventorydata.data.result">
            <div class="card text-white bg-dark ">
              <div class="card-header border-0 d-flex align-items-center" dmx-bind:id="{{script}}{{uid}}-nftheader">{{script.getSetDetailsColors(uid+'-nftheader')}}
                <div class="rounded-pill d-flex align-items-center p-2" style="background-color: black">
                  <h2 class="m-0 px-2">{{uid}}</h2>
                </div>
                <h3 class="card-title lead border rounded border-dark p-2 ml-auto mb-0 "><a dmx-bind:href="/nfts/set/{{set}}" class="lead" style="color: black">{{set}} NFT</a></h3>
              </div>
              <a href="#inventoryModal" class="a-1" data-toggle="modal" dmx-on:click="inventory_iterator.select($index);inventory_detail.select(uid)">
                <div class="card-img-top" dmx-bind:id="image-{{set}}-{{uid}}" dmx-bind:alt="{{script}}">{{uid.nftImageWell(script, set)}}</div>
              </a></div>
          </div>
          <!-- NFT iterator -->
          <dmx-data-iterator id="inventory_iterator" dmx-bind:data="inventorydata.data.result" loop="true"></dmx-data-iterator>
          <!-- NFT detail modal -->
          <dmx-data-detail id="inventory_detail" dmx-bind:data="inventorydata.data.result" key="uid">
          <div class="modal fade show" id="inventoryModal" tabindex="11" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-full modal-xl modal-dialog-centered" role="document">
              <div class="modal-content bg-dark text-white">
                <div class="card text-white bg-dark ">
                  <div class="card-header border-0 d-flex align-items-center justify-content-between" dmx-bind:id="{{inventory_detail.data.script}}{{inventory_detail.data.uid}}-nftdetailheader">{{inventory_detail.data.script.getSetDetailsColors(inventory_detail.data.uid+'-nftdetailheader')}}
                    <div class="rounded-pill d-flex align-items-center p-2" style="background-color: black">
                      <h2 class="m-0 px-2">{{inventory_detail.data.uid}}</h2>
                    </div>
                    <h3 class="card-title lead border border-dark rounded p-2 mb-0"><a dmx-bind:href="/nfts/set/{{inventory_detail.data.set}}" style="color:black;">{{inventory_detail.data.set}} NFT</a></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="card-body row d-flex ">
                    <!-- NFT detail col 1 -->
                    <div class="col-lg-6 px-0 px-sm-2">
                      <div class="col-12 px-0 px-sm-2">
                        <!-- NFT img -->
                        <div class="card-img-top" dmx-bind:id="detail-image-{{inventory_detail.data.set}}-{{inventory_detail.data.uid}}" dmx-bind:alt="{{inventory_detail.data.set}}-{{inventory_detail.data.uid}}">{{inventory_detail.data.uid.nftDetailWell(inventory_detail.data.script, inventory_detail.data.set)}}</div>
                      </div>
                      <div class="text-center my-3">
                        <button class="btn btn-lg btn-outline-primary" dmx-on:click="setPFP('{{inventory_detail.data.set}}','{{inventory_detail.data.uid}}')" dmx-show="(inventory_detail.data.set + ':' + inventory_detail.data.uid != userPFP.value)"><i class="far fa-user-circle mr-2"></i>Set as PFP</button>
                        <button class="btn btn-lg btn-secondary" dmx-show="(inventory_detail.data.set + ':' + inventory_detail.data.uid == userPFP.value)"><i class="far fa-user-circle mr-2"></i>Currently set as your PFP</button>
                      </div>
                    </div>
                    <!-- NFT detail col 2 -->
                    <div class="col-lg-6 px-0 px-sm-2">
                      <!-- NFT Accordion -->
                      <div id="accordion" class="col-12 px-0 px-sm-2">
                        <!-- NFT DESCRIPTION -->
                        <div class="card bg-dark text-white">
                          <div class="card-header" id="headingDescription">
                            <h5 class="mb-0">
                              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseDescription" aria-expanded="true" aria-controls="collapseDescription"><i class="fas fa-list mr-3"></i>DESCRIPTION</button>
                            </h5>
                          </div>
                          <div id="collapseDescription" class="collapse" aria-labelledby="headingDescription" data-parent="#accordion">
                            <div class="card-body">
                              <p dmx-bind:id="{{inventory_detail.data.script}}-description-p"> {{inventory_detail.data.script.getSetDetails('Description', '-description-p', 'innerText')}} </p>
                            </div>
                          </div>
                        </div>
                        <!-- NFT ATTRIBUTES -->
                        <div class="card bg-dark text-white">
                          <div class="card-header" id="headingAttributes">
                            <h5 class="mb-0">
                              <button class="btn btn-link collapsed text-success" data-toggle="collapse" data-target="#collapseAttributes" aria-expanded="false" aria-controls="collapseAttributes"><i class="fas fa-star mr-3"></i>ATTRIBUTES </button>
                            </h5>
                          </div>
                          <div id="collapseAttributes" class="collapse show" aria-labelledby="headingAttributes" data-parent="#accordion">
                            <div class="card-body">
                              <div dmx-bind:id="{{inventory_detail.data.script}}-{{inventory_detail.data.uid}}-attributes" class="attribute-container d-flex flex-wrap"> {{inventory_detail.data.script.getNFTDetails(inventory_detail.data.uid)}} </div>
                            </div>
                          </div>
                        </div>
                        <!-- TRANSFER NFT -->
                        <div class="card bg-dark text-white" style="width: 100">
                          <div class="card-header" id="headingMarket">
                            <h5 class="mb-0">
                              <button class="btn btn-link collapsed text-info" data-toggle="collapse" data-target="#collapseMarket" aria-expanded="false" aria-controls="collapseMarket"><i class="fas fa-exchange-alt mr-3"></i>TRANSFER</button>
                            </h5>
                          </div>
                          <div id="collapseMarket" class="collapse" aria-labelledby="headingMarket" data-parent="#accordion">
                            <div class="card-body p-0 bg-dark text-white">
                              <div class="border-warning border rounded p-3 my-3" dmx-show="(inventory_detail.data.set + ':' + inventory_detail.data.uid == userPFP.value)">
                                <p class="text-warning m-0">Transferring this NFT will remove it from your PFP</p>
                              </div>
                              <div class="border border-info bg-darker mx-auto px-5 py-3 rounded col-12">
                                <div class="container-fluid">
                                  <ul class="nav nav-pills bg-darker justify-content-center" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" id="giveNFTlink" role="tab" data-toggle="tab" aria-controls="giveNFT" aria-expanded="true" href="#giveNFTtab">Give</a></li>
                                    <li class="nav-item"> <a class="nav-link" id="tradeNFTlink" role="tab" data-toggle="tab" aria-controls="tradeNFT" aria-expanded="true" href="#tradeNFTtab">Trade</a></li>
                                    <li class="nav-item"> <a class="nav-link" id="sellNFTlink" role="tab" data-toggle="tab" aria-controls="sellNFT" aria-expanded="true" href="#sellNFTtab">Sell</a></li>
                                    <li class="nav-item"> <a class="nav-link" id="auctionNFTlink" role="tab" data-toggle="tab" aria-controls="auctionNFT" aria-expanded="true" href="#auctionNFTtab">Auction</a></li>
                                  </ul>
                                  <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade show active" id="giveNFTtab" aria-labelledby="giveNFT">
                                      <form class="needs-validation mt-4" validate dmx-bind:action="javascript:giveNFT('{{inventory_detail.data.set}}','{{inventory_detail.data.uid}}','{{giveNFTusername.value}}')">
                                        <div class="form-row my-2">
                                          <div class="col-12">
                                            <label for="giveNFTusername">Username</label>
                                            <div class="input-group">
                                              <div class="input-group-prepend"> <span class="input-group-text bg-dark border-dark text-white-50" id="giveNFTuserprep">@</span></div>
                                              <input type="text" class="form-control bg-dark border-dark text-info r-radius-hotfix" id="giveNFTusername" aria-describedby="giveNFTuserprep" required>
                                              <div class="invalid-feedback"> Please enter the username you'd like to give to. </div>
                                            </div>
                                          </div>
                                        </div>
                                        <center>
                                          <button id="giveNFTbutton" class="btn btn-info my-2" type="submit">Give</button>
                                        </center>
                                      </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade show" id="tradeNFTtab" aria-labelledby="tradeNFT">
                                      <form class="needs-validation mt-4" validate dmx-bind:action="javascript:tradeNFT('{{inventory_detail.data.set}}','{{inventory_detail.data.uid}}','{{tradeNFTusername.value}}','{{tradeNFTamount.value}}','{{tradeNFTpriceType.value}}')">
                                        <div class="form-row my-2">
                                          <div class="col-12">
                                            <label for="tradeNFTusername">Username</label>
                                            <div class="input-group">
                                              <div class="input-group-prepend"> <span class="input-group-text bg-dark border-dark text-white-50" id="tradeNFTuserprep">@</span></div>
                                              <input type="text" class="form-control bg-dark border-dark text-info r-radius-hotfix" id="tradeNFTusername" aria-describedby="tradeNFTuserprep" required>
                                              <div class="invalid-feedback"> Please enter the username you'd like to trade with. </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group form-row my-2">
                                          <label for="tradeNFTamount">Amount</label>
                                          <small class="ml-auto mb-2 align-self-center text-white-50" id="tradeNFTfeeDlux" dmx-show="tradeNFTpriceType.value == 'DLUX'">0% FEE</small> <small class="ml-auto mb-2 align-self-center text-white-50" id="tradeNFTfeeHive" dmx-show="tradeNFTpriceType.value != 'DLUX'">1% FEE</small>
                                          <div class="input-group">
                                            <input type="number" class="form-control bg-dark border-dark text-info" id="tradeNFTamount" aria-describedby="tradeNFTamountappend" placeholder="0.000" step="0.001" min="0.001" required>
                                            <div class="input-group-append"> <span class="input-group-text bg-dark border-dark r-radius-hotfix m-0" id="tradeNFTamountappend">
                                              <select class="form-select border-0 text-white-50 bg-none w-100 h-100" id="tradeNFTpriceType" aria-label="Trade price type select">
                                                <option value="DLUX" selected>DLUX</option>
                                                <option value="HIVE">HIVE</option>
                                                <option value="HBD">HBD</option>
                                              </select>
                                            </span></div>
                                            <div class="invalid-feedback"> Please enter the amount of {{tradeNFTpriceType.value}} you'd like to receive. </div>
                                          </div>
                                        </div>
                                        <center>
                                          <button id="tradeNFTbutton" class="btn btn-info my-2" type="submit">Propose Trade</button>
                                        </center>
                                      </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade show " id="sellNFTtab" aria-labelledby="sellNFT">
                                      <form class="needs-validation mt-4" validate dmx-bind:action="javascript:sellNFT('{{inventory_detail.data.set}}','{{inventory_detail.data.uid}}','{{sellNFTprice.value}}','{{sellNFTpriceType.value}}')">
                                        <div class="form-group form-row my-2">
                                          <label for="sellNFTprice">Sale Price</label>
                                          <small class="ml-auto mb-2 align-self-center text-white-50" id="sellNFTfeeDlux" dmx-show="sellNFTpriceType.value == 'DLUX'">0% FEE</small> <small class="ml-auto mb-2 align-self-center text-white-50" id="sellNFTfeeHive" dmx-show="sellNFTpriceType.value != 'DLUX'">1% FEE</small>
                                          <div class="input-group">
                                            <input type="number" class="form-control bg-dark border-dark text-info" id="sellNFTprice" aria-describedby="sellNFTpriceappend" placeholder="0.000" step="0.001" min="0.001" required>
                                            <div class="input-group-append"> <span class="input-group-text bg-dark border-dark r-radius-hotfix m-0" id="sellNFTpriceappend">
                                              <select class="form-select border-0 text-white-50 bg-none w-100 h-100" id="sellNFTpriceType" aria-label="Sell price type select">
                                                <option value="DLUX" selected>DLUX</option>
                                                <option value="HIVE">HIVE</option>
                                                <option value="HBD">HBD</option>
                                              </select>
                                            </span></div>
                                            <div class="invalid-feedback"> Please enter the amount of {{sellNFTpriceType.value}} you'd like to receive. </div>
                                          </div>
                                        </div>
                                        <div class="form-row my-2">
                                          <p class="text-white-50 small">Ownership will be transferred to the DAO listing service and sold publicly. Cancel anytime to return immediately.</p>
                                        </div>
                                        <center>
                                          <button id="sellNFTbutton" class="btn btn-info my-2" type="submit" >List Item</button>
                                        </center>
                                      </form>
                                    </div>
                                    <center>
                                      <div role="tabpanel" class="tab-pane fade show " id="auctionNFTtab" aria-labelledby="auctionNFT">
                                        <form class="needs-validation mt-4" validate dmx-bind:action="javascript:auctionNFT('{{inventory_detail.data.set}}','{{inventory_detail.data.uid}}','{{auctionNFTprice.value}}','{{Date.now()}}','{{auctionNFTdays.value}}','{{auctionNFTpriceType.value}}')">
                                          <div class="form-group form-row my-2">
                                            <label for="auctionNFTprice">Starting Bid</label>
                                            <small class="ml-auto mb-2 align-self-center text-white-50" id="auctionNFTfeeDlux" dmx-show="auctionNFTpriceType.value == 'DLUX'">0% FEE</small> <small class="ml-auto mb-2 align-self-center text-white-50" id="auctionNFTfeeHive" dmx-show="auctionNFTpriceType.value != 'DLUX'">1% FEE</small>
                                            <div class="input-group">
                                              <input type="number" class="form-control bg-dark border-dark text-info" id="auctionNFTprice" aria-describedby="auctionNFTpriceappend" placeholder="0.000" step="0.001" min="0.001" required>
                                              <div class="input-group-append"> <span class="input-group-text bg-dark border-dark r-radius-hotfix m-0" id="auctionNFTpriceappend">
                                                <select class="form-select border-0 text-white-50 bg-none w-100 h-100" id="auctionNFTpriceType" aria-label="Auction price type select" dmx-on:updated="inventory_detail.form.auctionNFTdays.setValue('7')">
                                                  <option value="DLUX" selected>DLUX</option>
                                                  <option value="HIVE">HIVE</option>
                                                  <option value="HBD">HBD</option>
                                                </select>
                                              </span></div>
                                              <div class="invalid-feedback"> Please enter the amount of {{auctionNFTpriceType.value}} you'd like to start the bidding. </div>
                                            </div>
                                          </div>
                                          <div class="d-flex justify-content-around">
                                            <div class="form-row my-2 d-flex align-items-center">
                                              <label for="auctionNFTdays" class="m-0">Duration: </label>
                                              <select class="mx-2 btn btn-lg btn-secondary" id="auctionNFTdays" required >
                                                <option value="1">1 Day</option>
                                                <option value="2">2 Days</option>
                                                <option value="3">3 Days</option>
                                                <option value="4">4 Days</option>
                                                <option value="5">5 Days</option>
                                                <option value="6">6 Days</option>
                                                <option value="7" selected>7 Days</option>
                                                <option value="8" dmx-hide="auctionNFTpriceType.value != 'DLUX'">8 Days</option>
                                                <option value="9" dmx-hide="auctionNFTpriceType.value != 'DLUX'">9 Days</option>
                                                <option value="10" dmx-hide="auctionNFTpriceType.value != 'DLUX'">10 Days</option>
                                                <option value="11" dmx-hide="auctionNFTpriceType.value != 'DLUX'">11 Days</option>
                                                <option value="12" dmx-hide="auctionNFTpriceType.value != 'DLUX'">12 Days</option>
                                                <option value="13" dmx-hide="auctionNFTpriceType.value != 'DLUX'">13 Days</option>
                                                <option value="14" dmx-hide="auctionNFTpriceType.value != 'DLUX'">14 Days</option>
                                                <option value="15" dmx-hide="auctionNFTpriceType.value != 'DLUX'">15 Days</option>
                                                <option value="16" dmx-hide="auctionNFTpriceType.value != 'DLUX'">16 Days</option>
                                                <option value="17" dmx-hide="auctionNFTpriceType.value != 'DLUX'">17 Days</option>
                                                <option value="18" dmx-hide="auctionNFTpriceType.value != 'DLUX'">18 Days</option>
                                                <option value="19" dmx-hide="auctionNFTpriceType.value != 'DLUX'">19 Days</option>
                                                <option value="20" dmx-hide="auctionNFTpriceType.value != 'DLUX'">20 Days</option>
                                                <option value="21" dmx-hide="auctionNFTpriceType.value != 'DLUX'">21 Days</option>
                                                <option value="22" dmx-hide="auctionNFTpriceType.value != 'DLUX'">22 Days</option>
                                                <option value="23" dmx-hide="auctionNFTpriceType.value != 'DLUX'">23 Days</option>
                                                <option value="24" dmx-hide="auctionNFTpriceType.value != 'DLUX'">24 Days</option>
                                                <option value="25" dmx-hide="auctionNFTpriceType.value != 'DLUX'">25 Days</option>
                                                <option value="26" dmx-hide="auctionNFTpriceType.value != 'DLUX'">26 Days</option>
                                                <option value="27" dmx-hide="auctionNFTpriceType.value != 'DLUX'">27 Days</option>
                                                <option value="28" dmx-hide="auctionNFTpriceType.value != 'DLUX'">28 Days</option>
                                                <option value="29" dmx-hide="auctionNFTpriceType.value != 'DLUX'">29 Days</option>
                                                <option value="30" dmx-hide="auctionNFTpriceType.value != 'DLUX'">30 Days</option>
                                              </select>
                                            </div>
                                          </div>
                                          <div class="form-row my-2">
                                            <p class="text-white-50 small">Ownership will be transferred to the DAO listing service and auctioned publicly. Once submitted this cannot be cancelled. If there are no bids at the end of the auction period, it will be returned to you immediately.</p>
                                          </div>
                                          <center>
                                            <button class="btn btn-info my-2" type="submit">List Item</button>
                                          </center>
                                        </form>
                                      </div>
                                    </center>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <center>
                          <!-- MELT NFT -->
                          <div class="card bg-dark text-white">
                            <div class="card-header" id="headingRedeem">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed text-warning" data-toggle="collapse" data-target="#collapseRedeem" aria-expanded="false" aria-controls="collapseRedeem"><i class="fas fa-burn mr-3"></i>MELT</button>
                              </h5>
                            </div>
                            <div id="collapseRedeem" class="collapse" aria-labelledby="headingRedeem" data-parent="#accordion">
                              <div class="card-body p-0">
                                <div class="d-flex align-self-end">
                                  <div class="border border-warning rounded bg-darker col-12 p-4">
                                    <div class="d-flex align-items-center justify-content-between">
                                      <div class="d-flex mr-1">
                                        <h4>Melt Value:</h4>
                                      </div>
                                      <div class="d-flex no-wrap ml-1"> <u>
                                        <h1 dmx-bind:id="{{inventory_detail.data.set}}-bond-value">{{inventory_detail.data.set.getSetDetailsBond()}}</h1>
                                      </u></div>
                                    </div>
                                    <div class="pt-2">
                                      <p class="text-uppercase text-muted">This NFT can be traded, sold, or auctioned until melted. Once melted it will disappear forever.</p>
                                      <div class="d-flex justify-content-around">
                                        <div class ="d-flex align-items-center my-4">
                                          <div class="text-center p-4">
                                            <h1 class="text-warning" style="font-size: 4em"><i class="fas fa-exclamation-triangle"></i></h1>
                                          </div>
                                          <ul>
                                            <li>This action cannot be undone</li>
                                            <li>Your NFT will be deleted</li>
                                            <li>You will receive the melt value</li>
                                          </ul>
                                        </div>
                                      </div>
                                      <div class="text-center pb-4">
                                        <button type="button" class="btn btn-warning" data-toggle="collapse" href="#melt-confirmation">Melt </button>
                                      </div>
                                      <div class="collapse bg-danger rounded" id="melt-confirmation">
                                        <div class="text-center pt-4">
                                          <h2><b>/////// IRREVERSIBLE \\\\\\\</b></h2>
                                          <p>Are you sure you want to proceed?</p>
                                        </div>
                                        <div class="d-flex justify-content-around p-3">
                                          <button class="btn btn-secondary" data-toggle="collapse" href="#melt-confirmation">CANCEL <i class="fas fa-running"></i></button>
                                          <button class="btn btn-danger border-white" dmx-on:click="deleteNFT('{{inventory_detail.data.set}}','{{inventory_detail.data.uid}}')">DESTROY <i class="fas fa-bomb"></i> <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span></button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- / NFT Accordion -->
                        </center>
                      </div>
                    </div>
                  </div>
                </div>
                <center>
                  <!-- NFT detail footer -->
                  <div class="card-footer d-flex align-items-center">
                    <h2><a class="text-muted p-3" href="#" dmx-on:click="inventory_iterator.prev();inventory_detail.select(inventory_iterator.value.uid)"><i class="fas fa-caret-square-left"></i></a></h2>
                    <small class="ml-auto text-muted"><i>Item {{inventory_iterator.index + 1}} of {{inventorydata.data.result.count()}}</i></small>
                    <h2 class="ml-auto"><a class="text-muted p-3" href="#" dmx-on:click="inventory_iterator.next();inventory_detail.select(inventory_iterator.value.uid)"><i class="fas fa-caret-square-right"></i></a></h2>
                  </div>
                </center>
              </div>
            </div>
          </div>
          <center>
            </dmx-data-detail>
          </center>
        </center>
      </div>
    </div>
        <!-- node tab -->
        <div role="tabpanel" class="tab-pane fade show" id="node" aria-labelledby="nodetab">
          <div id="nodeBanner" class="container no-session">
            <div class="alert alert-danger mt-5" role="alert"> Please log in to see node information. </div>
          </div>
          <div class="container"> <br>
            <form>
              <div class="form-row">
                <div class="form-group col-lg-6 p-2">
                  <label for="nodeDomain">Domain</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">https://</div>
                    </div>
                    <input type="text" class="form-control" id="nodeDomain" placeholder="yourname-dluxtoken.herokuapp.com" readonly>
                  </div>
                </div>
                <div class="form-group col-lg-2 p-2">
                  <label for="nodeBidRate">Node Inflation Vote</label>
                  <div class="input-group mb-2">
                    <input type="number" class="form-control" id="nodeBidRate" placeholder="0.0 - 20.0" readonly>
                    <div class="input-group-append">
                      <div class="input-group-text">%</div>
                    </div>
                  </div>
                </div>
                <div class="form-group col-lg-2 p-2">
                  <label for="nodeDaoRate">DAO Inflation Vote</label>
                  <div class="input-group mb-2">
                    <input type="number" class="form-control" id="nodeDaoRate" placeholder="0.0 - 20.0" readonly>
                    <div class="input-group-append">
                      <div class="input-group-text">%</div>
                    </div>
                  </div>
                </div>
                <div class="form-group col-lg-2 p-2"> <br>
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="escrowCheck" checked disabled>
                    <label class="custom-control-label" for="escrowCheck">Escrow Agent</label>
                  </div>
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="mirrorCheck" disabled>
                    <label class="custom-control-label" for="mirrorCheck">Mirror Leader</label>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- settings tab -->
        <div role="tabpanel" class="tab-pane fade show" id="settings" aria-labelledby="settingstab">
          <div class="container">
            <div class="alert alert-warning mt-5" role="alert"> Settings is under development and coming soon. </div>
            <div class="p-3">
              <ul class="nav nav-pills justify-content-center" role="tablist">
                <li class="nav-item"> <a class="nav-link active" id="generalSettingsTab" role="tab" data-toggle="tab" aria-controls="generalsettings" aria-expanded="true" href="#generalsettings">General</a></li>
                <li class="nav-item"> <a class="nav-link" id="contentSettingsTab" role="tab" data-toggle="tab" aria-controls="contentsettings" aria-expanded="true" href="#contentsettings">Content</a></li>
                <li class="nav-item"> <a class="nav-link" id="nodeSettingsTab" role="tab" data-toggle="tab" aria-controls="nodesettings" aria-expanded="true" href="#nodesettings">Node</a></li>
              </ul>
            </div>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade show active" id="generalsettings" aria-labelledby="generalSettingsTab">
                <div class="container">
                  <form>
                    <div class="jumbotron pt-4 bg-darker">
                      <h1 class="display-5">DLUX Settings</h1>
                      <p class="lead ">Control your voting and rewards settings</p>
                      <hr class="my-4 bg-light">
                      <div class="clearfix">
                        <div class="float-left">
                          <h4>Default DLUX Weight For Posts</h4>
                          <p class="text-white-50">Adjust the default DLUX weight you vote on posts, 1-100</p>
                        </div>
                        <div class="float-right">
                          <div class="input-group">
                            <input type="number" class="form-control input-75" id="dluxweightposts" placeholder="100">
                            <div class="input-group-append">
                              <div class="input-group-text">%</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr class="my-4 bg-light">
                      <div class="clearfix">
                        <div class="float-left">
                          <h4>Default DLUX Weight For Comments</h4>
                          <p class="text-white-50">Adjust the default DLUX weight you vote on comments, 1-100</p>
                        </div>
                        <div class="float-right">
                          <div class="input-group">
                            <input type="number" class="form-control input-75" id="dluxweightcomments" placeholder="100">
                            <div class="input-group-append">
                              <div class="input-group-text">%</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr class="my-4 bg-light">
                      <div class="clearfix">
                        <div class="float-left">
                          <h4>Default DLUX Payout</h4>
                          <p class="text-white-50">Adjust the default DLUX reward for new posts</p>
                        </div>
                        <div class="float-right">
                          <select class="form-control" id="dluxreward">
                            <option value="1">50% DLUX and 50% DP</option>
                            <option value="2">100% DLUX Power</option>
                            <option value="3">Decline Rewards</option>
                          </select>
                        </div>
                      </div>
                      <hr class="my-4 bg-light">
                      <div class="clearfix">
                        <div class="float-left">
                          <h4>DLUX Beneficiary Amount</h4>
                          <p class="text-white-50">Adjust the beneficiary amount paid to dlux on new posts, 10-100</p>
                        </div>
                        <div class="float-right">
                          <div class="input-group">
                            <input type="number" class="form-control input-75" id="dluxbeneficiary" placeholder="10">
                            <div class="input-group-append">
                              <div class="input-group-text">%</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr class="my-4 bg-light">
                      <div class="clearfix">
                        <div class="float-left">
                          <h4>Default DLUX Escrow Agent</h4>
                          <p class="text-white-50">Choose your preffered 3rd party node for handling DEX transactions</p>
                        </div>
                        <div class="float-right">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">@</div>
                            </div>
                            <input type="text" class="form-control" id="dluxbeneficiary" placeholder="disregardfiat">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="jumbotron pt-4 bg-darker">
                      <h1 class="display-5">HIVE Settings</h1>
                      <p class="lead ">Control your voting and rewards settings</p>
                      <hr class="my-4 bg-light">
                      <div class="clearfix">
                        <div class="float-left">
                          <h4>Default HIVE Weight For Posts</h4>
                          <p class="text-white-50">Adjust the default HIVE weight you vote on posts, 1-100</p>
                        </div>
                        <div class="float-right">
                          <div class="input-group">
                            <input type="number" class="form-control input-75" id="hiveweightposts" placeholder="100">
                            <div class="input-group-append">
                              <div class="input-group-text">%</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr class="my-4 bg-light">
                      <div class="clearfix">
                        <div class="float-left">
                          <h4>Default HIVE Weight For Comments</h4>
                          <p class="text-white-50">Adjust the default HIVE weight you vote on comments, 1-100</p>
                        </div>
                        <div class="float-right">
                          <div class="input-group">
                            <input type="number" class="form-control input-75" id="hiveweightcomments" placeholder="100">
                            <div class="input-group-append">
                              <div class="input-group-text">%</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr class="my-4 bg-light">
                      <div class="clearfix">
                        <div class="float-left">
                          <h4>Default HIVE Payout</h4>
                          <p class="text-white-50">Adjust the default HIVE rewards for new posts</p>
                        </div>
                        <div class="float-right">
                          <select class="form-control" id="hivereward">
                            <option value="1">50% HBD and 50% HP</option>
                            <option value="2">100% HIVE Power</option>
                            <option value="3">Decline Rewards</option>
                          </select>
                        </div>
                      </div>
                      <hr class="my-4 bg-light">
                      <div class="clearfix">
                        <div class="float-left">
                          <h4>Default HIVE API Node</h4>
                          <p class="text-white-50">Select the API node with which to retrieve data from the HIVE blockchain</p>
                        </div>
                        <div class="float-right">
                          <select class="form-control" id="hivereward">
                            <option value="1">anyx.io</option>
                            <option value="2">api.hive.blog</option>
                            <option value="3">api.hivekings.com</option>
                            <option value="3">api.openhive.network</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="text-center mb-4">
                      <button type="submit" class="btn btn-primary btn-lg">Save</button>
                    </div>
                  </form>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade show" id="contentsettings" aria-labelledby="contentSettingsTab">
                <div class="container">
                  <form>
                    <div class="jumbotron pt-4 bg-darker">
                      <h1 class="display-5">Content Settings</h1>
                      <p class="lead ">Control what you see</p>
                      <hr class="my-4 bg-light">
                      <div class="clearfix">
                        <div class="float-left">
                          <h4>NSFW Posts</h4>
                          <p class="text-white-50">Configure how NSFW (Not Safe For Work) posts appear</p>
                        </div>
                        <div class="float-right">
                          <select class="form-control" id="nsfwselect">
                            <option value="1">Hide</option>
                            <option value="2">Click to show</option>
                            <option value="3">Show</option>
                          </select>
                        </div>
                      </div>
                      <hr class="my-4 bg-light">
                      <div class="clearfix">
                        <div class="float-left">
                          <h4>Author Muting</h4>
                          <p class="text-white-50">Use author's list of ignored accounts when viewing comments</p>
                        </div>
                        <div class="float-right my-3">
                          <div class="custom-control custom-switch py-2">
                            <input type="checkbox" class="custom-control-input" id="muteswitch">
                            <label class="custom-control-label" for="muteswitch"></label>
                          </div>
                        </div>
                      </div>
                      <hr class="my-4 bg-light">
                      <div class="clearfix">
                        <div class="float-left">
                          <h4>Global Blacklist</h4>
                          <p class="text-white-50">Display a warning on accounts found in <a href="https://peakd.com/utopian-io/@themarkymark/global-blacklist-api-2-0-released" target="_blank">The Global Blacklist</a> maintained by @themarkymark</p>
                        </div>
                        <div class="float-right my-3">
                          <div class="custom-control custom-switch py-2">
                            <input type="checkbox" class="custom-control-input" id="bkacklistswitch" checked>
                            <label class="custom-control-label" for="blacklistswitch"></label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="text-center mb-4">
                      <button type="submit" class="btn btn-primary btn-lg">Save</button>
                    </div>
                  </form>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade show" id="nodesettings" aria-labelledby="nodeSettingsTab">
                <div class="container">
                  <form>
                    <div class="form-row">
                      <div class="form-group col-lg-6 p-2">
                        <label for="nodeDomainSet">Domain</label>
                        <div class="input-group mb-2">
                          <div class="input-group-prepend">
                            <div class="input-group-text">https://</div>
                          </div>
                          <input type="text" class="form-control" id="nodeDomainSet" placeholder="yourname-dluxtoken.herokuapp.com">
                        </div>
                      </div>
                      <div class="form-group col-lg-2 p-2">
                        <label for="nodeBidRateSet">Node Inflation Vote</label>
                        <div class="input-group mb-2">
                          <input type="number" class="form-control" id="nodeBidRateSet" placeholder="0.0 - 20.0">
                          <div class="input-group-append">
                            <div class="input-group-text">%</div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-lg-2 p-2">
                        <label for="nodeDaoRateSet">DAO Inflation Vote</label>
                        <div class="input-group mb-2">
                          <input type="number" class="form-control" id="nodeDaoRateSet" placeholder="0.0 - 20.0">
                          <div class="input-group-append">
                            <div class="input-group-text">%</div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-lg-2 p-2"> <br>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="escrowCheckSet" checked>
                          <label class="custom-control-label" for="escrowCheckSet">Escrow Agent</label>
                        </div>
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="mirrorCheckSet">
                          <label class="custom-control-label" for="mirrorCheckSet">Mirror Leader</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-4">
                        <label for="mswitpubkey">Dlux MS Witness Pub Key</label>
                        <input type="text" class="form-control" id="mswitpubkey">
                      </div>
                      <div class="form-group col-4">
                        <label for="bytecost">byte cost</label>
                        <input type="number" class="form-control" id="bytecost" min=".001" step=".001">
                      </div>
                    </div>
                    <div class="form-group"> <br>
                      <center>
                        <button id="updateNode" type="submit" class="btn btn-primary">Update Node</button>
                      </center>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
  </div>
</div>
    </main>
    <!-- Send DLUX Modal -->
    <div class="modal fade" id="sendDluxModal" tabindex="-1" role="dialog" aria-labelledby="sendDluxModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-darker text-white">
          <div class="modal-header">
            <h5 class="modal-title" id="sendDluxTitle">Send DLUX</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span class="close text-white">×</span></button>
          </div>
          <form>
            <div class="modal-body">
              <div class="form-group">
                <label for="senddluxfrom">From:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">@</div>
                  </div>
                  <input class="form-control" id="senddluxfrom" type="text" dmx-bind:placeholder="{{dluxGetAccount.data.result[0].name}}" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="senddluxto">To:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">@</div>
                  </div>
                  <input class="form-control" id="senddluxto" type="text" placeholder="Recipient">
                </div>
              </div>
              <div class="form-group">
                <label id="senddluxamountlab" for="senddluxamount">Amount (Balance <a href="#" onClick="insertBal(parseFloat(User.dlux.balance/1000), 'senddluxamount')">{{((usertoken.data.balance)/1000).formatNumber(3,'.',',')}}</a>):</label>
                <div class="input-group">
                  <input class="form-control" id="senddluxamount" type="number" step="0.001" min="0.001" placeholder="1.000">
                  <div class="input-group-append">
                    <div class="input-group-text" id="sendformunits">DLUX</div>
                  </div>
                </div>
              </div>
              <div class="form-group" id="senddluxmemogroup">
                <label for="senddluxmemo">Memo:</label>
                <div class="input-group">
                  <input class="form-control" id="senddluxmemo" type="text" placeholder="Include a memo (optional)">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button id="sendmodalsend" type="button" class="btn btn-primary">Continue</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Send LARYNX Modal -->
    <div class="modal fade" id="sendLarynxModal" tabindex="-1" role="dialog" aria-labelledby="sendLarynxModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-darker text-white">
          <div class="modal-header">
            <h5 class="modal-title" id="sendLarynxTitle">Send LARYNX</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span class="close text-white">×</span></button>
          </div>
          <form>
            <div class="modal-body">
              <div class="form-group">
                <label for="senddluxfrom">From:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">@</div>
                  </div>
                  <input class="form-control" id="sendlarynxfrom" type="text" dmx-bind:placeholder="{{dluxGetAccount.data.result[0].name}}" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="sendlarynxto">To:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">@</div>
                  </div>
                  <input class="form-control" id="sendlarynxto" type="text" placeholder="Recipient">
                </div>
              </div>
              <div class="form-group">
                <label id="sendlarynxamountlab" for="sendlarynxamount">Amount (Balance <a href="#" onClick="insertBal(parseFloat(User.larynx.balance/1000), 'senddluxamount')">{{((larynxtoken.data.balance)/1000).formatNumber(3,'.',',')}}</a>):</label>
                <div class="input-group">
                  <input class="form-control" id="sendlarynxamount" type="number" step="0.001" min="0.001" placeholder="1.000">
                  <div class="input-group-append">
                    <div class="input-group-text" id="sendformunits">LARYNX</div>
                  </div>
                </div>
              </div>
              <div class="form-group" id="sendlarynxmemogroup">
                <label for="sendlarynxmemo">Memo:</label>
                <div class="input-group">
                  <input class="form-control" id="sendlarynxmemo" type="text" placeholder="Include a memo (optional)">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button id="sendlarynxmodalsend" type="button" class="btn btn-primary">Continue</button>
            </div>
          </form>
        </div>
      </div>
    </div>
	<!-- Power Up DLUX Modal -->
    <div class="modal fade" id="powerupDluxModal" tabindex="-1" role="dialog" aria-labelledby="powerupDluxModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-darker text-white">
          <div class="modal-header">
            <h5 class="modal-title" id="powerDluxTitle">Power Up DLUX</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span class="close text-white">×</span></button>
          </div>
          <form>
            <div class="modal-body">
              <div class="form-group">
                <label for="powerupdluxfrom">From:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">@</div>
                  </div>
                  <input class="form-control" id="powerupdluxfrom" type="text" dmx-bind:placeholder="{{dluxGetAccount.data.result[0].name}}" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="powerupdluxto">To:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">@</div>
                  </div>
                  <input class="form-control" id="powerupdluxto" type="text" dmx-bind:placeholder="{{dluxGetAccount.data.result[0].name}}" readonly>
                </div>
              </div>
              <div class="form-group">
                <label id="powerdluxamountlab" for="powerupdluxmmount">Amount (Balance <a href="#" onClick="insertBal(parseFloat(User.dlux.balance/1000), 'powerupdluxamount')">{{((usertoken.data.balance)/1000).formatNumber(3,'.',',')}}</a>):</label>
                <div class="input-group">
                  <input class="form-control" id="powerupdluxamount" type="number" step="0.001" min="0.001" placeholder="1.000">
                  <div class="input-group-append">
                    <div class="input-group-text">DLUX</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary" id="powerdluxsubmitbutton">Continue</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Power Down DLUX Modal -->
    <div class="modal fade" id="powerdownDluxModal" tabindex="-1" role="dialog" aria-labelledby="powerdownDluxModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-darker text-white">
          <div class="modal-header">
            <h5 class="modal-title" id="powerdownDluxTitle">Power Down DLUX</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span class="close text-white">×</span></button>
          </div>
          <form>
            <div class="modal-body">
              <div class="form-group">
                <label for="powerdowndluxfrom">From:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">@</div>
                  </div>
                  <input class="form-control" id="powerdowndluxfrom" type="text" dmx-bind:placeholder="{{dluxGetAccount.data.result[0].name}}" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="powerdowndluxto">To:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">@</div>
                  </div>
                  <input class="form-control" id="powerdowndluxto" type="text" dmx-bind:placeholder="{{dluxGetAccount.data.result[0].name}}" readonly>
                </div>
              </div>
              <div class="form-group">
                <label id="dluxamountlab" for="powerdowndluxamount">Amount (Balance <a href="#" onClick="insertBal(parseFloat(User.dlux.poweredUp/1000),'powerdowndluxamount')">{{((usertoken.data.poweredUp)/1000).formatNumber(3,'.',',')}}</a>):</label>
                <div class="input-group">
                  <input class="form-control" id="powerdowndluxamount" type="number" step="0.001" min="0.001" placeholder="1.000">
                  <div class="input-group-append">
                    <div class="input-group-text">DLUX</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" id="powerdowndluxsubmit" class="btn btn-primary" onClick="powerDown('powerdowndluxamount', 'powerdowndluxto', 'powerdowndluxmemo')">Continue</button>
            </div>
          </form>
        </div>
      </div>
    </div>
	<!-- Lock Gov DLUX Modal -->
    <div class="modal fade" id="lockgovDluxModal" tabindex="-1" role="dialog" aria-labelledby="lockgovDluxModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-darker text-white">
          <div class="modal-header">
            <h5 class="modal-title" id="powerDluxTitle">Lock Gov DLUX</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span class="close text-white">×</span></button>
          </div>
          <form>
            <div class="modal-body">
              <div class="form-group">
                <label for="lockgovdluxfrom">From:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">@</div>
                  </div>
                  <input class="form-control" id="lockgovdluxfrom" type="text" dmx-bind:placeholder="{{dluxGetAccount.data.result[0].name}}" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="lockgovdluxto">To:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">@</div>
                  </div>
                  <input class="form-control" id="lockgovdluxto" type="text" dmx-bind:placeholder="{{dluxGetAccount.data.result[0].name}}" readonly>
                </div>
              </div>
              <div class="form-group">
                <label id="lockgovdluxamountlab" for="lockgovdluxmmount">Amount (Balance <a href="#" onClick="insertBal(parseFloat(User.dlux.balance/1000), 'lockgovdluxamount')">{{((usertoken.data.balance)/1000).formatNumber(3,'.',',')}}</a>):</label>
                <div class="input-group">
                  <input class="form-control" id="lockgovdluxamount" type="number" step="0.001" min="0.001" placeholder="1.000">
                  <div class="input-group-append">
                    <div class="input-group-text">DLUX</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary" id="lockgovdluxsubmitbutton">Continue</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Unlock Gov DLUX Modal -->
    <div class="modal fade" id="unlockgovDluxModal" tabindex="-1" role="dialog" aria-labelledby="unlockgovDluxModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-darker text-white">
          <div class="modal-header">
            <h5 class="modal-title" id="unlockgovDluxTitle">Unlock Gov DLUX</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span class="close text-white">×</span></button>
          </div>
          <form>
            <div class="modal-body">
              <div class="form-group">
                <label for="unlockgovdluxfrom">From:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">@</div>
                  </div>
                  <input class="form-control" id="unlockgovdluxfrom" type="text" dmx-bind:placeholder="{{dluxGetAccount.data.result[0].name}}" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="unlockgovdluxto">To:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">@</div>
                  </div>
                  <input class="form-control" id="unlockgovdluxto" type="text" dmx-bind:placeholder="{{dluxGetAccount.data.result[0].name}}" readonly>
                </div>
              </div>
              <div class="form-group">
                <label id="unlockgovamountlab" for="unlockgovdluxamount">Amount (Balance <a href="#" onClick="insertBal(parseFloat(User.dlux.gov/1000),'unlockgovdluxamount')">{{((usertoken.data.gov)/1000).formatNumber(3,'.',',')}}</a>):</label>
                <div class="input-group">
                  <input class="form-control" id="unlockgovdluxamount" type="number" step="0.001" min="0.001" placeholder="1.000">
                  <div class="input-group-append">
                    <div class="input-group-text">DLUX</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" id="unlockgovdluxsubmit" class="btn btn-primary" onClick="unlockgov('unlockgovdluxamount', 'unlockgovdluxto', 'unlockgovdluxmemo')">Continue</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Buy DLUX Modal -->
     <div class="modal fade" id="buyDluxModal" tabindex="-1" role="dialog" aria-labelledby="buyDluxModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" id="buy-modal">
              <div class="modal-content bg-dark text-white">
                <form class="needs-validation" validate id="marketorderform" dmx-bind:action="javascript:buyDEX('{{markethive.value}}','{{markethbd.value}}','{{marketqty.value}}','{{markettime.value}}')" >
                  <input id="markethbd" value="0" class="d-none">
                  <input id="marketqty" value="0" class="d-none">
                  <input id="markettime" value="0" class="d-none">
                  <div class="card-header d-flex flex-fill justify-content-between align-items-center">
                    <div>&nbsp;</div>
                    <h3 class="lead m-0">MARKET ORDER</h3>
                    <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close"> <span class="close text-white m-0 p-0"><i class="fas fa-times"></i></span></button>
                  </div>
                  <div class="card-body">
                    <p class="small text-white-50">Market Orders utilize multisig to complete partial fills of open orders on the DEX, starting with the lowest rate to ensure you're getting the best price.</p>
                    <p class="small text-white-50"> If no orders are available, the ICO price of 1 HIVE per 1 DLUX is in effect.</p>
                    <div class="d-flex flex-column">
                      <div class="d-flex flex-column flex-fill rounded-lg p-3 my-1 bg-darker" >
                        <div class="d-flex flex-row flex-fill align-items-center">
                          <p style="font-size: 18px;" class="p-0 m-0 font-weight-light">From</p>
                          <div class="d-flex ml-auto align-items-baseline">
                            <div class="d-flex small justify-content-between">
                              <p class="my-0 text-white-50" >Available<i class="fab fa-hive mx-1"></i></p>
                              <p class="my-0 text-primary">{{accountapi.data.result[0].balance}}</p>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex flex-row flex-fill mt-1">
                          <div class="d-flex align-items-center">
                            <div class="circle2"><i class="fab fa-hive"></i></div>
                            <h2 class="p-0 m-0 ml-2 font-weight-bold">HIVE</h2>
                          </div>
                          <div class="d-flex ml-auto flex-column">
                            <p class="ml-auto my-0 text-white-50 font-weight-bolder" style="font-size: 30px;">
                              <input class="form-control text-white" style="background-color: rgba(0,0,0,0.5); max-width: 150px" id="markethive" value="1" placeholder="0" type="number" min="0.004" step="0.001" required dmx-bind:max="{{accountapi.data.result[0].balance.split(' ')[0]}}">
                            </p>
                            <p class="ml-auto my-0 text-muted font-weight-bold" style="font-size: 16px;">&asymp; {{(markethive.value*hiveprice.data.hive.usd).formatCurrency()}}</p>
                          </div>
                        </div>
                        <div class="d-flex justify-content-between">
                          <div></div>
                          <div>
                            <button class="btn btn-outline-secondary btn-sm text-muted" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-info-circle"></i></button>
                          </div>
                        </div>
                        <div class="collapse" id="collapseExample">
                          <div class="d-flex">
                            <p style="font-size: 18px;" class="p-0 m-0 text-white-50 font-weight-light">Rate</p>
                            <p style="font-size: 16px;" class="p-0 m-0 text-white-50 ml-auto">1 HIVE &asymp; {{1/dexview1.data[0].rate}} DLUX</p>
                          </div>
                          <div class="d-flex">
                            <p style="font-size: 12px;" class="p-0 m-0 text-muted ml-auto text-success">1 DLUX &asymp; {{dexview1.data[0].rate}} HIVE</p>
                          </div>
                          <hr width="100%" style="border: #333 thin solid">
                          <div class="d-flex">
                            <p style="font-size: 18px;" class="p-0 m-0 text-white-50 font-weight-light">Swap Fee<small class="rounded-pill border border-secondary p-1 ml-2">0.1%</small></p>
                            <p style="font-size: 16px;" class="p-0 m-0 text-white-50 ml-auto">&asymp;
                              <input id="marketfee" class="d-none" dmx-bind:value="{{((markethive.value/dexview1.data[0].rate)*0.001).formatNumber(3,'.',',')}}">
                              {{marketfee.value}} DLUX</p>
                          </div>
                        </div>
                      </div>
                      <div class"p-0 m-0 bg-dark">
                        <div class="arrow2 rounded-circle border border-warning bg-darker text-warning">
                          <h1 class="m-2 px-3 py-1"><i class="fas fa-angle-double-down"></i></h1>
                        </div>
                      </div>
                      <div class="d-flex flex-column flex-fill rounded-lg p-3 my-1 border border-warning" style="background: radial-gradient(#222,#111);">
                        <div class="d-flex flex-row flex-fill align-items-center">
                          <p style="font-size: 18px;" class="p-0 m-0 font-weight-light">To</p>
                        </div>
                        <div class="d-flex flex-row flex-fill mt-1 align-items-center">
                          <div class="d-flex align-items-center">
                            <div class="circle2 d-flex align-items-center justify-content-around"><img src="/img/dlux-hive-logo-alpha.svg" width="70%"></div>
                            <h2 class="p-0 m-0 ml-2 font-weight-bold">DLUX</h2>
                          </div>
                          <div class="d-flex ml-auto">
                            <p class="ml-auto my-0 text-warning font-weight-bolder" style="font-size: 30px;">&asymp; {{((markethive.value/dexview1.data[0].rate)-(marketfee.value.toNumber())).formatNumber(3,'.',',')}}</p>
                          </div>
                        </div>
                        <p class="pt-3">DLUX is your ticket to the metaverse. Purchase NFTs, power-up to vote on proposals, and use it across a variety of XR games and apps.</p>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="d-flex justify-content-around">
                      <button type="submit" class="btn btn-lg btn-primary">Convert</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
    <?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/footer.php";
include_once( $path );
?>
	<script>
function getDate(){
   const d = new Date();
   const e =d.getMonth() + 1
   document.getElementById("frmDate").value = e;
  console.log('set month', e)
  } 
getDate(); 
	</script>
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
    <script>
// Show inventory
function toggleInventory(){
    $("#inventory-cards").toggleClass("d-none");

  }	
// Set active tab
function toggleActive(){
    $("#buywithhivetab").toggleClass("active");
    $("#buywithhbdtab").toggleClass("active");
  }
// Toggle Order Book LG
function toggleOrders() {
	$("#orders").toggleClass("d-none");
	$("#buy-form").toggleClass("col-lg-12 col-lg-6");
	$("#buy-modal").toggleClass("modal-xl");
	$("#order-container").addClass("pos-abs");
}
// Toggle Order Book MD SM XS
function toggleOrdersSM() {
	$("#orders").toggleClass("d-none");
	$("#order-container").removeClass("pos-abs");
}				       												      

function updateVoteSubmit(id,val) {
    document.getElementById(id).innerHTML = document.getElementById(val).value + '%'; 
}   

function pageSpecfic(usr){
	me(usr);
}


$('.nav-tabs').stickyTabs(); 
</script>
</center>
</center>
<script>
	$(document).ready(() => {
  let url = location.href.replace(/\/$/, "");
 
  if (location.hash) {
    const hash = url.split("#");
    $('#usertabs a[href="#'+hash[1]+'"]').tab("show");
    url = location.href.replace(/\/#/, "#");
    history.replaceState(null, null, url);
    setTimeout(() => {
      $(window).scrollTop(0);
    }, 400);
  } 
   
  $('a[data-toggle="tab"]').on("click", function() {
    let newUrl;
    const hash = $(this).attr("href");
    if(hash == "#blog") {
      newUrl = url.split("#")[0];
    } else {
      newUrl = url.split("#")[0] + hash;
    }
    newUrl += "/";
    history.replaceState(null, null, newUrl);
  });
});
	
	</script>
</body>
</html>
