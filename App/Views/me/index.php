<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - Username</title>
<?php include '../mod/header.php';?>
<!--dmxAppConnect-->
<script src="../dmxAppConnect/dmxAppConnect.js"></script>
<script src="../dmxAppConnect/dmxMoment.js"></script>
<script src="../dmxAppConnect/dmxFormatter.js"></script>
<script src="../dmxAppConnect/dmxDataTraversal/dmxDataTraversal.js"></script>
<!--page specific-->
<script src="../js/dex.js"></script>
<script src="../js/me.js"></script>
<script>
	let type
	function changeTab(url){
 		$(`[href="#${url}"]`).tab('show');
		window.scrollTo(0, 0);
}
</script>
</head>
<body class="d-flex flex-column h-100" id="apps" is="dmx-app">
<?php 
	if(isset($_COOKIE['user'])){
    	echo "<dmx-api-datasource id=\"dluxGetBlog\" is=\"dmx-fetch\" url=\"https://token.dlux.io/getwrap?\" dmx-param:method=\"'condenser_api.get_blog'\" dmx-param:params=\"'[%22" . $_COOKIE['user'] . "%22,0,20]'\"></dmx-api-datasource>";
        }
    else{
        echo "<dmx-api-datasource id=\"dluxGetBlog\" is=\"dmx-fetch\" url=\"https://token.dlux.io/getwrap?\" dmx-param:method=\"'condenser_api.get_blog'\" dmx-param:params=\"'[%22robotolux%22,0,10]'\"></dmx-api-datasource>";
        }
;?>
<?php include '../mod/nav.php';?>
<main role="main" class="flex-shrink-0 text-white">
  <div class="container-fluid px-0 ">
	  <div class="container-fluid bg-darker border-bottom">
	  <div class="container">
		<div class="row mt-3  padme-t70">
      <div class="col-md-8 text-white">
		  
		  <div class="d-inline-block">
        <div class="float-left"><img dmx-bind:src="https://token.dlux.io/getauthorpic/{{dluxGetBlog.data.result[0].blog}}" alt="" class="rounded-circle bg-light img-fluid mr-4 cover profile-img"></div>
			  <div class="float-left"><p class="display-4 mb-0">{{dluxGetBlog.data.result[0].blog}}</p>
        <small class="lead p-2">description needs an api or helper</small>
			  </div></div></div>
      <div class="col-md-4 text-center m-auto"> <a class="btn btn-outline-primary btn-lg m-1" role="button" dmx-bind:href="../@{{dluxGetBlog.data.result[0].blog}}" target="_blank">VR Page<i class="fas fa-vr-cardboard mx-2 fa-lg"></i></a>
		 <div class="btn-group">
  <button type="button" class="btn btn-outline-primary dropdown-toggle drop-no-arrow btn-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Actions<i class="fas fa-ellipsis-h ml-2"></i>
  </button>
  <div class="dropdown-menu nav-item dropdown-menu-right">
    <button class="dropdown-item" type="button" onClick="changeTab('settings')"><i class="fas fa-cog fa-fw mr-2"></i>Settings</button>
    <button class="dropdown-item" type="button">Something else here</button>
  </div>
</div>
	</div>
    </div>
  <ul class="nav nav-tabs bg-darker mx-0 px-0 mt-5 border-bottom-0" role="tablist">
	    <li class="nav-item">
			<a class="nav-link active" href="#blog" id="blogtab" role="tab" data-toggle="tab" aria-controls="blog" aria-expanded="true">Blog</a> </li>
	    <li class="nav-item"> 
			<a class="nav-link" id="wallettab" role="tab" data-toggle="tab" aria-controls="wallet" aria-expanded="true" href="#wallet">Wallet</a> </li>
	  <li class="nav-item"> 
			<a class="nav-link" id="inventorytab" role="tab" data-toggle="tab" aria-controls="inventory" aria-expanded="true" href="#inventory">Inventory</a> </li>
	  <li class="nav-item"> 
			<a class="nav-link" id="nodetab" role="tab" data-toggle="tab" aria-controls="node" aria-expanded="true" href="#node">Node</a> </li>
	    <li class="nav-item d-none"> 
			<a class="nav-link" id="settingstab" role="tab" data-toggle="tab" aria-controls="settings" aria-expanded="true" href="#settings">Settings</a> </li>
    </ul>
	</div></div>
	 <div id="pagecontent" class="tab-content">
       <div role="tabpanel" class="tab-pane fade show active" id="blog" aria-labelledby="blogtab">
 <div class="card-columns p-3" id="blogResult" is="dmx-repeat" dmx-bind:repeat="dluxGetBlog.data.result">
  <div class="card text-white bg-dark mt-2 mb-3">
    <div class="card-header">
      <div class="d-inline-block">
        <div class="float-left" ><a dmx-bind:href="/@{{comment.author}}"><img dmx-bind:src="https://token.dlux.io/getauthorpic/{{comment.author}}" alt="" class="rounded-circle bg-light img-fluid mr-2 cover author-img"></a></div>
        <div class="float-left">
          <p class="mt-0 mb-0 text-muted text-semibold"><a dmx-bind:href="/@{{comment.author}}" class="a-1">{{comment.author}}<span class="ml-2 badge badge-pill badge-light">{{comment.author_reputation.toString().rep()}}</span></a></p>
          <small class="text-muted">{{comment.created.formatDate("MMM dd, yyyy")}}</small></div>
      </div>
      <div class="float-right"><span class="badge badge-secondary">{{comment.json_metadata.scat()}}</span></div>
    </div>
    <a href="#detailModal" class="a-1" data-toggle="modal" dmx-on:click="app_detail.select(entry_id)" dmx-bind:onclick="window.history.pushState('{{comment.url}}','{{comment.title}}', '/blog/@{{comment.author}}/{{comment.permlink}}');">
      <h5 class="card-title mt-2 text-center text-capitalize">{{comment.title}}</h5>
      <img src="..."  alt="Card image cap" class="card-img-top" dmx-bind:src="{{comment.json_metadata.parseJSON().image}}" /></a>
    <div class="card-body"><a href="#detailModal" data-toggle="modal" class="a-1">
      <p class="preview-text">{{comment.body.removeMD().trunc(100,true,"...")}}</p>
    </a></div>
    <center>
      <a dmx-bind:href="{{comment.url}}" type="button" class="btn btn-outline-danger mb-4 btn-launch">Launch App</a>
    </center>
    <div class="card-footer">
		<div class="collapse" dmx-bind:id="vote{{entry_id}}">
		<form id="voteForm">
  		<div class="form-group">

    	<ul class="list-unstyled">
			<li class="float-left px-1"><button type="button" class="btn btn-primary" dmx-bind:id="voteBtn{{entry_id}}" dmx-bind:onclick="vote('{{comment.author}}','{{comment.permlink}}','slider{{entry_id}}')" style="width:70px">100%</button></li>
			<li class="float-left px-1"><button type="button" class="btn btn-secondary" data-toggle="collapse" dmx-bind:data-target="{{&quot;#&quot;}}vote{{entry_id}}"><span class="close text-white">×</span></button></li>
		</ul>
		<ul class="float-right list-unstyled">
			<li>###.###  <img src="../img/hextacular.svg" alt="" width="17"/></li>
		</ul>
			<div class="">
    	<div style="display: flex; flex-grow: 1" class="px-3"><input type="range" class="form-control-range" value="100" dmx-bind:id="slider{{entry_id}}" dmx-bind:onchange="updateVoteSubmit('voteBtn{{entry_id}}','slider{{entry_id}}');"></div>
  </div>
			</div>
</form>
			</div>
      <div class="d-inline-block">
        <div class="float-left"><a data-toggle="collapse" dmx-bind:data-target="{{&quot;#&quot;}}vote{{entry_id}}"><i class="fas fa-heart mr-1"></i></a>{{comment.active_votes.countUpVotes()}} <i class="fas fa-comment ml-2 mr-1"></i>{{comment.children}}</div>
      </div>
      <div class="float-right">{{comment.total_payout_value}} <img src="../img/hextacular.svg" alt="" width="17"/></div>
    </div>
  </div>
</div>
<div class="modal fade" id="detailModal" tabindex="11" role="dialog" aria-hidden="true">
 <div class="modal-dialog modal-full modal-dialog-centered" role="document">
   <div class="modal-content bg-dark text-white">
	<dmx-data-detail id="app_detail" dmx-bind:data="dluxGetBlog.data.result" key="entry_id">
		<div class="d-inline-block p-2">
	  <div class="float-left" ><a dmx-bind:href="/@{{comment.author}}"><img dmx-bind:src="https://token.dlux.io/getauthorpic/{{data.comment.author}}" alt="" class="rounded-circle bg-light img-fluid mr-2 cover author-img"></a></div>
        <div class="float-left">
          <p class="mt-0 mb-0 text-muted text-semibold"><a dmx-bind:href="/@{{comment.author}}" class="a-1">{{data.comment.author}}<span class="ml-2 badge badge-pill badge-light">{{data.comment.author_reputation.toString().rep()}}</span></a></p>
          <small class="text-muted">{{data.comment.created.formatDate("MMM dd, yyyy")}}</small></div>
		</div>
      <div class="float-right p-2"><span class="badge badge-secondary">{{data.comment.json_metadata.scat()}}</span><button type="button" class="close text-white ml-3" data-dismiss="modal" aria-label="Close" onclick="window.history.back();"><span aria-hidden="true">×</span></button></div>
		<hr class="mt-0">
    <a dmx-bind:href="/blog/@{{data.comment.author}}/{{data.comment.permlink}}"><h4 class="text-center p-2">{{data.comment.title}}</h4></a>
    

	 <img src="..."  alt="Card image cap" class="card-img-top" dmx-bind:src="{{data.comment.json_metadata.parseJSON().image}}" />  
    <p class="p-2">{{data.comment.body.removeMD()}}</p>
		  <center>
      <a dmx-bind:href="{{data.comment.url}}" type="button" class="btn btn-outline-danger mb-4 btn-launch">Launch App</a>
    </center>
<hr class="mb-0">
		<div class="collapse" dmx-bind:id="vote{{entry_id}}">
		<form id="voteForm">
  		<div class="form-group">

    	<ul class="list-unstyled">
			<li class="float-left px-1"><button type="button" class="btn btn-primary" dmx-bind:id="voteBtn{{entry_id}}" dmx-bind:onclick="vote('{{comment.author}}','{{comment.permlink}}','slider{{entry_id}}')" style="width:70px">100%</button></li>
			<li class="float-left px-1"><button type="button" class="btn btn-secondary" data-toggle="collapse" dmx-bind:data-target="{{&quot;#&quot;}}vote{{entry_id}}"><span class="close text-white">×</span></button></li>
		</ul>
		<ul class="float-right list-unstyled">
			<li>###.###  <img src="../img/hextacular.svg" alt="" width="17"/></li>
		</ul>
			<div class="">
    	<div style="display: flex; flex-grow: 1" class="px-3"><input type="range" class="form-control-range" value="100" dmx-bind:id="slider{{entry_id}}" dmx-bind:onchange="updateVoteSubmit('voteBtn{{entry_id}}','slider{{entry_id}}');"></div>
  </div>
			</div>
</form>
			</div>
		<div class="d-inline-block p-2">
        <a data-toggle="collapse" dmx-bind:data-target="{{&quot;#&quot;}}vote{{entry_id}}"><i class="fas fa-heart mr-1"></i></a>{{data.comment.active_votes.countUpVotes()}} <i class="fas fa-comment ml-2 mr-1"></i>{{data.comment.children}}</div>
      
      <div class="float-right p-2">{{data.comment.total_payout_value}} <img src="../img/hextacular.svg" alt="" width="17"/></div>
	 

</dmx-data-detail>
		   </div>
		   </div>
	 </div>
	</div>
       <div role="tabpanel" class="tab-pane fade show" id="wallet" aria-labelledby="wallettab">
	<div class="p-3">
		   <ul class="nav nav-pills justify-content-center" role="tablist">
	    <li class="nav-item">
			<a class="nav-link active" href="#dlux" id="dluxtab" role="tab" data-toggle="tab" aria-controls="dlux" aria-expanded="true">DLUX</a> </li>
	    <li class="nav-item"> 
			<a class="nav-link" id="hivetab" role="tab" data-toggle="tab" aria-controls="hive" aria-expanded="true" href="#hive">HIVE</a> </li>
    </ul>
		   </div>
		   <div id="walletcontent" class="tab-content">
       <div role="tabpanel" class="tab-pane fade show active" id="dlux" aria-labelledby="dluxtab">
		   <div class="container">
			  <div class="jumbotron pt-4 bg-darker">
				  <h1 class="display-5">Introducing DLUX OpenToken</h1>
                  <p class="lead ">The smartest, most decentralized token powering games, apps, and the multiverse</p>
                  <hr class="my-4 bg-light">
				  <div class="clearfix">
				  	<div class="float-left">
			  		  <h4>DLUX Token</h4>
				  		<p class="text-white-50">The utility token for content distribution and smart contracts, also called a smart media token (SMT)</p>
				  	</div>
				  	<div id="dluxactions" class="float-right text-right">
						<h5>846.068 DLUX</h5>
						<div class="btn-group" role="group" aria-label="DLUX Actions">
  							<button type="button" class="btn btn-info mr-half" data-toggle="modal" id="senddluxmodalbutton" data-target="#sendDluxModal"><i class="fas fa-paper-plane mr-2"></i>Send</button>
  							<div class="btn-group" role="group">
    						<button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
    						<div class="dropdown-menu dropdown-menu-right text-white" aria-labelledby="btnGroupDrop1">
      							<a class="dropdown-item" href="#" id="powerupdluxbutton" data-toggle="modal" data-target="#powerupDluxModal"><i class="fas fa-angle-double-up fa-fw mr-2"></i>Power Up</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#" id="buylink" data-toggle="modal" data-target="#buyDluxModal"><i class="fas fa-cart-arrow-down fa-fw mr-2"></i>Buy DLUX</a>
								<a class="dropdown-item" href="#" id="selllink" data-toggle="modal" data-target="#buyDluxModal"><i class="fas fa-coins fa-fw mr-2"></i>Sell DLUX</a>
    						</div>
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
						</ul>
				  	</div>
				  	<div id="dluxpactions" class="float-right text-right">
						<h5>468.848 DLUX</h5>
						<div class="btn-group" role="group" aria-label="DLUX Actions">
							<button type="button" class="btn btn-info mr-half" disabled title="Coming soon!" style="pointer-events: none;"><i class="fas fa-user-friends mr-2"></i>Delegate</button>
  							<div class="btn-group" role="group">
    						<button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ></button>
    						<div class="dropdown-menu dropdown-menu-right text-white" aria-labelledby="btnGroupDrop1">
      							<a class="dropdown-item" href="#" data-toggle="modal" id="dluxpowerdownModalButton" data-target="#powerdownDluxModal"><i class="fas fa-angle-double-down fa-fw mr-2"></i>Power Down</a>
    						</div>
  							</div>
						</div>
				  	</div>
				  </div>
				  <hr class="my-4 bg-light">
				  <div class="clearfix">
				  	<div class="float-left">
			  		  <h4>Estimated Account Value</h4>
				  		<p class="text-white-50">The approximate US Dollar value for all DLUX in your account</p>
				  	</div>
				  	<div id="dluxval" class="float-right text-right">
						<h5>$187.50</h5>
				  	</div>
				  </div>
			   </div>
			   <div id="dluxtxs" class="jumbotron pt-3 bg-darker text-white">
			   </div>
		   </div>
			   </div>
			  <div role="tabpanel" class="tab-pane fade show" id="hive" aria-labelledby="hivetab">
				  <div class="container">
			  <div class="jumbotron pt-4 bg-darker">
				  <h1 class="display-5">Hive is the new Steem</h1>
                  <p class="lead ">A proof-of-stake blockchain built for censorship resistant content and apps</p>
                  <hr class="my-4 bg-light">
				  <div class="clearfix">
				  	<div class="float-left">
			  		  <h4>HIVE Token</h4>
				  		<p class="text-white-50">The main token of the chain, often rewarded for content.</p>
				  	</div>
				  	<div id="hiveactions" class="float-right text-right">
						<h5>768.186 HIVE</h5>
						<div class="btn-group" role="group" aria-label="DLUX Actions">
  							<button type="button" class="btn btn-info mr-half" data-toggle="modal" id="sendhivemodalbutton" data-target="#sendDluxModal"><i class="fas fa-paper-plane mr-2"></i>Send</button>
  							<div class="btn-group" role="group">
    						<button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
    						<div class="dropdown-menu dropdown-menu-right text-white" aria-labelledby="btnGroupDrop1">
      							<a class="dropdown-item" href="#"  id="poweruphivebutton" data-toggle="modal" data-target="#powerupDluxModal"><i class="fas fa-angle-double-up fa-fw mr-2"></i>Power Up</a>
    						</div>
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
						<h5>352.153 HP</h5>
						<div class="btn-group" role="group" aria-label="DLUX Actions">
  							<button type="button" class="btn btn-info mr-half"><i class="fas fa-user-friends mr-2"></i>Delegate</button>
  							<div class="btn-group" role="group">
    						<button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
    						<div class="dropdown-menu dropdown-menu-right text-white" aria-labelledby="btnGroupDrop1">
      							<a class="dropdown-item" href="#"><i class="fas fa-angle-double-down fa-fw mr-2"></i>Power Down</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="../dex/">Claim Account Creation Token</a>
    						</div>
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
						<h5>63.189 HBD</h5>
						<div class="btn-group" role="group" aria-label="DLUX Actions">
  							<button type="button" class="btn btn-info mr-half" data-toggle="modal" id="sendhbdmodalbutton" data-target="#sendDluxModal"><i class="fas fa-paper-plane mr-2"></i>Send</button>
  							<div class="btn-group" role="group">
    						<button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
    						<div class="dropdown-menu dropdown-menu-right text-white" aria-labelledby="btnGroupDrop1">
      							<a class="dropdown-item" href="#"><i class="fas fa-random fa-fw mr-2"></i>Convert to HIVE</a>
								<a class="dropdown-item" href="#"><i class="fas fa-piggy-bank fa-fw mr-2"></i>Transfer to Savings</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="../dex/"><i class="fas fa-store fa-fw mr-2"></i>Trade</a>
    						</div>
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
						<h5>69.841 HBD</h5>
				  	</div>
				  </div>
				  <hr class="my-4 bg-light">
				  <div class="clearfix">
				  	<div class="float-left">
			  		  <h4>Estimated Account Value</h4>
				  		<p class="text-white-50">The approximate US Dollar value for all HIVE in your account</p>
				  	</div>
				  	<div id="hiveval" class="float-right text-right">
						<h5>$126.35</h5>
				  	</div>
				  </div>
			   </div>
			   <div id="hivetxs" class="jumbotron pt-3 bg-darker text-white">
			   </div>
		   </div>
		   </div>
			   
		   </div>
		</div>
		 
		 <div role="tabpanel" class="tab-pane fade show" id="inventory" aria-labelledby="inventorytab">
		    <p>inventory</p>
			 </div>
		 
		 <div role="tabpanel" class="tab-pane fade show " id="node" aria-labelledby="nodetab">
		    <p>node</p>
			 </div>

       <div role="tabpanel" class="tab-pane fade show" id="settings" aria-labelledby="settingstab">
	
	<div class="p-3">
		   <ul class="nav nav-pills justify-content-center" role="tablist">
	    <li class="nav-item">
			<a class="nav-link active" href="#general" id="generaltab" role="tab" data-toggle="tab" aria-controls="general" aria-expanded="true">General</a> </li>
	    <li class="nav-item"> 
			<a class="nav-link" id="contenttab" role="tab" data-toggle="tab" aria-controls="content" aria-expanded="true" href="#content">Content</a> </li>
    </ul>
		   </div>
			   <div id="pagecontent" class="tab-content">
       <div role="tabpanel" class="tab-pane fade show active" id="general" aria-labelledby="generaltab">
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
			  		  <h4>DLUX Beneficiary Ammount</h4>
				  		<p class="text-white-50">Adjust the beneficiary ammount paid to dlux on new posts, 10-100</p>
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
		<div role="tabpanel" class="tab-pane fade show" id="content" aria-labelledby="contenttab">		   
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
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="close text-white">×</span>
        </button>
      </div>
		<form>
      <div class="modal-body">
	  <div class="form-group">
	   <label for="senddluxfrom">From:</label>
		<div class="input-group">
			<div class="input-group-prepend">
      		  <div class="input-group-text">@</div>
    		</div>
        	<input class="form-control" id="senddluxfrom" type="text" dmx-bind:placeholder="{{dluxGetBlog.data.result[0].blog}}" readonly>
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
	   <label id="senddluxamountlab" for="senddluxammount">Amount (Balance <a href="#" onClick="insertBal(parseFloat(User.dlux.balance/1000), 'senddluxamount')">917.26</a>):</label>
		<div class="input-group">
			<input class="form-control" id="senddluxamount" type="number" step="0.001" min="0.001" placeholder="1.000">
			<div class="input-group-append">
      		  <div class="input-group-text" id="sendformunits">DLUX</div>
    		</div>
		  </div>
			 </div>
		  <div class="form-group">
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
<!-- Power Up DLUX Modal -->
<div class="modal fade" id="powerupDluxModal" tabindex="-1" role="dialog" aria-labelledby="powerupDluxModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-darker text-white">
      <div class="modal-header">
        <h5 class="modal-title" id="sendDluxTitle">Power Up DLUX</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="close text-white">×</span>
        </button>
      </div>
		<form>
      <div class="modal-body">
	  <div class="form-group">
	   <label for="powerupdluxfrom">From:</label>
		<div class="input-group">
			<div class="input-group-prepend">
      		  <div class="input-group-text">@</div>
    		</div>
        	<input class="form-control" id="powerupdluxfrom" type="text" dmx-bind:placeholder="{{dluxGetBlog.data.result[0].blog}}" readonly>
		  </div>
			 </div>
		  <div class="form-group">
	   <label for="powerupdluxto">To:</label>
		<div class="input-group">
			<div class="input-group-prepend">
      		  <div class="input-group-text">@</div>
    		</div>
        	<input class="form-control" id="powerupdluxto" type="text" dmx-bind:placeholder="{{dluxGetBlog.data.result[0].blog}}" readonly>
		  </div>
			 </div>
        <div class="form-group">
	   <label id="powerdluxamountlab" for="powerupdluxammount">Amount (Balance <a href="#" onClick="insertBal(parseFloat(User.dlux.poweredUp/1000), 'powerupdluxamount')"></a>):</label>
		<div class="input-group">
			<input class="form-control" id="powerupdluxamount" type="number" step="0.001" min="0.001" placeholder="1.000">
			<div class="input-group-append">
      		  <div class="input-group-text">DLUX</div>
    		</div>
		  </div>
			 </div>
		  <div class="form-group">
	   <label for="powerupdluxmemo">Memo:</label>
		<div class="input-group">
        	<input class="form-control" id="powerupdluxmemo" type="text" placeholder="Include a memo (optional)">
		  </div>
			 </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onClick="powerUp('powerupdluxamount', 'powerupdluxto', 'powerupdluxmemo')">Continue</button>
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
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="close text-white">×</span>
        </button>
      </div>
		<form>
      <div class="modal-body">
	  <div class="form-group">
	   <label for="powerdowndluxfrom">From:</label>
		<div class="input-group">
			<div class="input-group-prepend">
      		  <div class="input-group-text">@</div>
    		</div>
        	<input class="form-control" id="powerdowndluxfrom" type="text" dmx-bind:placeholder="{{dluxGetBlog.data.result[0].blog}}" readonly>
		  </div>
			 </div>
		  <div class="form-group">
	   <label for="powerdowndluxto">To:</label>
		<div class="input-group">
			<div class="input-group-prepend">
      		  <div class="input-group-text">@</div>
    		</div>
        	<input class="form-control" id="powerdowndluxto" type="text" dmx-bind:placeholder="{{dluxGetBlog.data.result[0].blog}}" readonly>
		  </div>
			 </div>
        <div class="form-group">
	   <label id="dluxamountlab" for="powerdowndluxammount">Amount (Balance <a href="#" onClick="insertBal(parseFloat(User.dlux.poweredUp/1000),'powerdowndluxamount')">917.26</a>):</label>
		<div class="input-group">
			<input class="form-control" id="powerdowndluxamount" type="number" step="0.001" min="0.001" placeholder="1.000">
			<div class="input-group-append">
      		  <div class="input-group-text">DLUX</div>
    		</div>
		  </div>
			 </div>
		  <div class="form-group">
	   <label for="powerdowndluxmemo">Memo:</label>
		<div class="input-group">
        	<input class="form-control" id="powerdowndluxmemo" type="text" placeholder="Include a memo (optional)">
		  </div>
			 </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onClick="powerDown('powerdowndluxamount', 'powerdowndluxto', 'powerdowndluxmemo')">Continue</button>
      </div>
	</form>
    </div>
  </div>
  </div>
<!-- Buy DLUX Modal -->
<div class="modal fade" id="buyDluxModal" tabindex="-1" role="dialog" aria-labelledby="buyDluxModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" id="buy-modal">
    <div class="modal-content bg-darker text-white">
      <div class="modal-header">
		  <h3 class="modal-title" id="buyDluxTitle">Buy With: </h3>
		  <ul class="nav nav-pills ml-3" role="tablist">
		  	<li class="nav-item"><a href="javascript:dexmodal('hive', User.opts.type)" class="nav-link active" id="buywithhivetab" onClick="toggleActive()">HIVE</a></li>
			<li class="nav-item"><a href="javascript:dexmodal('hbd', User.opts.type)" class="nav-link" id="buywithhbdtab" onClick="toggleActive()">HBD</a></li>
		  </ul>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="close text-white">×</span>
        </button>
	</div>
		<div class="container-fluid">
		<div class="row" id="buy-main-row">
			
		<div class="col-lg-12 col-md-12 col-sm-12" id="buy-form">
			<div class="pt-4 pl-3 pr-3">
				<button class="btn btn-dark float-right d-none d-lg-block" onClick="toggleOrders()"><i class="fas fa-book-open mr-2"></i>Orders</button>
				<h4 id="menutitle" class="text-white-50 mt-2">New Buy Order</h4>
				
			</div>
		<form>
      <div class="modal-body">
		  <div class="alert alert-dark text-center" role="alert">
 		<small>This will place a buy order on the <a href="../dex/">DEX (Decentralized Exchange)</a></small>
		</div>
	  <div class="form-group">
	   <label for="buydluxfrom">Buyer:</label>
		<div class="input-group">
			<div class="input-group-prepend">
      		  <div class="input-group-text">@</div>
    		</div>
        	<input class="form-control" id="senddluxfrom" type="text" dmx-bind:placeholder="{{dluxGetBlog.data.result[0].blog}}" readonly>
		  </div>
			 </div>
		  
		  <div class="form-group">
	   <label id="menudluxlab" for="buydluxquantity">Desired Quantity:</label>
		<div class="input-group">
			<input class="form-control" id="menudlux" type="number" step="0.001" min="0.001" placeholder="1.000">
			<div class="input-group-append">
      		  <div class="input-group-text">DLUX</div>
    		</div>
		  </div>
			 </div>
        <div class="form-group">
	   <label id="menupricelab" for="buydluxprice">Desired Price Each (<a href="#" onClick="insertBal(User.dex.markets[User.opts.type].tick, 'menuprice')">Market Price: 0.2 HIVE</a>):</label>
		<div class="input-group">
			<input class="form-control" id="menuprice" type="number" placeholder="1.000">
			<div class="input-group-append">
      		  <div class="input-group-text" id="menupairdiv">HIVE</div>
    		</div>
		  </div>
			 </div>
		  <div class="form-group">
	   <label id="menupairlab" for="buydluxtotal">Order Total (<a href="#" onClick="insertBal(parseFloat(User[User.opts.type].balance), 'menupair')">HIVE Balance: 486 HIVE</a>):</label>
		<div class="input-group">
			<input class="form-control" id="menupair" type="number" step="0.001" min="0.001" placeholder="1.000">
			<div class="input-group-append">
      		  <div class="input-group-text" id="paycoin">HIVE</div>
    		</div>
		  </div>
			 </div>
		 <p><a data-toggle="collapse" href="#buydluxadvanced" role="button" aria-expanded="false" aria-controls="collapseExample">Advanced Options<i class="fas fa-angle-double-down ml-2"></i></a></p>
	   <div class="collapse" id="buydluxadvanced">
	

 <div class="form-group">
	 <label for="custodialAgent">Custodial Agent:</label>
	 <div class="input-group">
	 	<div class="input-group-prepend">
      		  <label class="input-group-text">@</label>
    	</div>	
    	<button class="btn btn-light dropdown-toggle form-control text-left" type="button" id="custodialAgent" data-toggle="dropdown">Custodial Agent</button>
    	<ul class="dropdown-menu custodial-drop form-control agent-input-ul" id="custodialAgentUl">
      		<input class="form-control agent-input" id="custodialAgentSearch" type="text" placeholder="Search..">
      		<li><a href="#">disregardfiat - Fee: .1DLUX - Trust: 99 - Liquid: 1000000000</a></li>
      		<li><a href="#">markegiles - Fee: .1DLUX - Trust: 99 - Liquid: 1000000000</a></li>
      		<li><a href="#">dlux-io - Fee: .1DLUX - Trust: 99 - Liquid: 1000000000</a></li>
      		<li><a href="#">heyhey - Fee: .1DLUX - Trust: 99 - Liquid: 1000000000</a></li>
      		<li><a href="#">inconcievable - Fee: .1DLUX - Trust: 99 - Liquid: 1000000000</a></li>
      		<li><a href="#">robotolux - Fee: .1DLUX - Trust: 99 - Liquid: 1000000000</a></li>
		</ul>
	 	<div class="input-group-append">
			<button id="custodialAgentSort" type="button" class="btn btn-light append-radius" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-sort-amount-down"></i></button>
			<div class="dropdown-menu dropdown-menu-right text-white">
    			<a class="dropdown-item" href="#"><i class="fas fa-hand-holding-usd mr-2"></i>Sort By Fee</a>
				<a class="dropdown-item" href="#"><i class="fas fa-award fa-fw mr-2"></i>Sort By Trust</a>
				<a class="dropdown-item" href="#"><i class="fas fa-fish fa-fw mr-2"></i>Sort By Liquidity</a>
    		</div>
  		</div>
	</div>
</div>
		
 <div class="form-group">
	 <label for="escrowAgent">Escrow Agent:</label>
	 <div class="input-group">
	 	<div class="input-group-prepend">
      		  <label class="input-group-text">@</label>
    	</div>	
    	<button class="btn btn-light dropdown-toggle form-control text-left" type="button" id="escrowAgent" data-toggle="dropdown">Escrow Agent</button>
    	<ul class="dropdown-menu escrow-drop form-control agent-input-ul mx-auto" id="escrowAgentUl">
      		<input class="form-control agent-input" id="escrowAgentSearch" type="text" placeholder="Search..">
      		<li><a href="#">disregardfiat - Fee: .1DLUX - Trust: 99 - Liquid: 1000000000</a></li>
      		<li><a href="#">markegiles - Fee: .1DLUX - Trust: 99 - Liquid: 1000000000</a></li>
      		<li><a href="#">dlux-io - Fee: .1DLUX - Trust: 99 - Liquid: 1000000000</a></li>
      		<li><a href="#">heyhey - Fee: .1DLUX - Trust: 99 - Liquid: 1000000000</a></li>
      		<li><a href="#">inconcievable - Fee: .1DLUX - Trust: 99 - Liquid: 1000000000</a></li>
      		<li><a href="#">robotolux - Fee: .1DLUX - Trust: 99 - Liquid: 1000000000</a></li>
    	</ul>
	 	<div class="input-group-append">
			<button type="button" id="escrowAgentSort" class="btn btn-light append-radius" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-sort-amount-down"></i></button>
			<div class="dropdown-menu dropdown-menu-right text-white">
    			<a class="dropdown-item" href="#"><i class="fas fa-hand-holding-usd mr-2"></i>Sort By Fee</a>
				<a class="dropdown-item" href="#"><i class="fas fa-award fa-fw mr-2"></i>Sort By Trust</a>
				<a class="dropdown-item" href="#"><i class="fas fa-fish fa-fw mr-2"></i>Sort By Liquidity</a>
    		</div>
  		</div>
	</div>
</div>
		   
<script>
$(document).ready(function(){
  $("#custodialAgentSearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".custodial-drop li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
$(document).ready(function(){
  $("#escrowAgentSearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".escrow-drop li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script> 
		  <!-- <div class="form-group">
			   <label for="menuexpire">Expiration Date and Time:</label>
				<input class="form-control" id="buydluxexpire" />
			 </div>-->
<div class="form-group">
    <label for="escrowExpire">Expiration:</label>
    <select class="form-control" id="escrowExpire">
      <option value=1>1 hour</option>
      <option value=3>3 hours</option>
      <option value=6>6 hours</option>
      <option value=12>12 hours</option>
      <option value=24>1 day</option>
	  <option value=72>3 days</option>
	  <option value=120 selected>5 days</option>
	  <option value=336>14 days</option>
	  <option value=720>30 days</option>
    </select>
</div>
		  
      </div>
			</div>
      <div class="modal-footer">
		<div class="mr-auto d-lg-none">
		  <button type="button" class="btn btn-dark " onClick="toggleOrdersSM()"><i class="fas fa-book-open mr-2"></i>Orders</button>
        </div>
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onClick="dexsend(document.getElementById('buyDluxTitle').innerText.split(' ')[0], User.opts.pair)">Continue</button>
		
		  </div>
	  </form>
		</div>
			
			<div class="col-lg-6 col-md-12 col-sm-12 overflow-auto d-none" id="orders">
				<div class="p-4">
				<h4 class="text-center text-white-50">DLUX-HIVE Order Book</h4>
				</div>
				<div class="container" id="order-container">
				<div class="modal-body mt-3 mb-5">
				<div class="container">
				<h5 class="text-white-50 text-uppercase">Your Open Buy Orders</h5>
				<hr class="bg-dark mt-0 mb-4">
				<div class="clearfix">
				<div class="float-left">
				<p>Buy 100 DLUX for 25 HIVE</p>
				</div>
				<div class="float-right">
				<button class="btn btn-75 btn-outline-warning">Cancel</button>
				</div>
      			</div>
				<hr class="bg-dark mx-2">
				<div class="clearfix">
				<div class="float-left">
				<p>Buy 100 DLUX for 25 HIVE</p>
				</div>
				<div class="float-right">
				<button class="btn btn-75 btn-outline-warning">Cancel</button>
				</div>
      			</div>
				<hr class="bg-dark mx-2">
				<div class="clearfix">
				<div class="float-left">
				<p>Buy 100 DLUX for 25 HIVE</p>
				</div>
				<div class="float-right">
				<button class="btn btn-75 btn-outline-warning">Cancel</button>
				</div>
      			</div>	
				</div>	
					
				<div class="container mt-5 mb-3">
				<h5 class="text-white-50 text-uppercase">Sell Orders on DEX</h5>
				<hr class="bg-dark mt-0 mb-4">
				<div class="clearfix">
				<div class="float-left">
				<p>Buy 100 DLUX for 25 HIVE</p>
				</div>
				<div class="float-right">
				<button class="btn btn-75 btn-outline-success">Buy</button>
				</div>
      			</div>
				<hr class="bg-dark mx-2">
				<div class="clearfix">
				<div class="float-left">
				<p>Buy 100 DLUX for 25 HIVE</p>
				</div>
				<div class="float-right">
				<button class="btn btn-75 btn-outline-success">Buy</button>
				</div>
      			</div>
				<hr class="bg-dark mx-2">
				<div class="clearfix">
				<div class="float-left">
				<p>Buy 100 DLUX for 25 HIVE</p>
				</div>
				<div class="float-right">
				<button class="btn btn-75 btn-outline-success">Buy</button>
				</div>
      			</div>
				<hr class="bg-dark mx-2">
				<div class="clearfix">
				<div class="float-left">
				<p>Buy 100 DLUX for 25 HIVE</p>
				</div>
				<div class="float-right">
				<button class="btn btn-75 btn-outline-success">Buy</button>
				</div>
      			</div>
				<hr class="bg-dark mx-2">
				<div class="clearfix">
				<div class="float-left">
				<p>Buy 100 DLUX for 25 HIVE</p>
				</div>
				<div class="float-right">
				<button class="btn btn-75 btn-outline-success">Buy</button>
				</div>
      			</div>
				<hr class="bg-dark mx-2">
				<div class="clearfix">
				<div class="float-left">
				<p>Buy 100 DLUX for 25 HIVE</p>
				</div>
				<div class="float-right">
				<button class="btn btn-75 btn-outline-success">Buy</button>
				</div>
      			</div>
				<hr class="bg-dark mx-2">
				<div class="clearfix">
				<div class="float-left">
				<p>Buy 100 DLUX for 25 HIVE</p>
				</div>
				<div class="float-right">
				<button class="btn btn-75 btn-outline-success">Buy</button>
				</div>
      			</div>

				</div>
				</div>
				</div>
			</div>
			
			</div>
    </div>
	  </div>
  </div>
</div>
	
</div>
<?php include '../mod/footer.php';?>

	<script>
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
// Javascript to enable link to tab
var url = document.location.toString();
if (url.match('#')) {
    $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
} 

// Change hash for page-reload
$('.nav-tabs a').on('shown.bs.tab', function (e) {
    window.location.hash = e.target.hash;
    window.scrollTo(0, 0);
})
function updateVoteSubmit(id,val) {
    document.getElementById(id).innerHTML = document.getElementById(val).value + '%'; 
        }</script>
<script>
checkCookie();
function pageSpecfic(usr){
	me(usr);
}</script>
</body></html>
