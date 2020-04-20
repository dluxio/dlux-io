<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - Apps</title>
<?php include '../mod/header.php';?>
<!--dmxAppConnect-->
<script type="text/javascript" src="../dmxAppConnect/dmxAppConnect.js"></script>
<script type="text/javascript" src="../dmxAppConnect/dmxMoment.js"></script>
<script type="text/javascript" src="../dmxAppConnect/dmxFormatter.js"></script>
<script type="text/javascript" src="../dmxAppConnect/dmxDataTraversal/dmxDataTraversal.js"></script>
</head>

<body class="d-flex flex-column h-100" id="index" is="dmx-app">
<dmx-api-datasource id="dluxGetBlog" is="dmx-fetch" url="https://token.dlux.io/getwrap?" dmx-param:method="'condenser_api.get_blog'" dmx-param:params="'[%22robotolux%22,0,10]'"></dmx-api-datasource>
<?php include '../mod/nav.php';?>
<main role="main" class="flex-shrink-0">
  <div class="container-fluid padme-t70">
    <div class="row mt-3">
      <div class="col-md-8 text-white text-center">
        <div class="display-4">Virtual Reality</div>
        <p class="lead">Responsive WebXR across mobile, desktop, and headset.<br>
          <a href="/vr" class="lead" target="_blank"><i class="fas fa-vr-cardboard mr-2"></i>Enter Metaverse</a></p>
      </div>
      <div class="col-md-4 text-center m-auto"> <a class="btn btn-primary btn-lg m-1 btn-1" href="#" role="button">Learn<i class="fas fa-shapes ml-2"></i></a><a class="btn btn-primary btn-lg m-1 btn-1" href="../new/" role="button">Create<i class="fas fa-plus-circle ml-2"></i></a></div>
    </div>
  </div>
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
</div>
  </div>
</dmx-data-detail>
	 </div>
	</div>
	</div>
</main>
<?php include '../mod/footer.php';?>
<script>
	function updateVoteSubmit(id,val) {
          document.getElementById(id).innerHTML = document.getElementById(val).value + '%'; 
        }</script>
<script>checkCookie()</script>
</body></html>
