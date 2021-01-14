<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - Apps</title>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/header.php";
   include_once($path);
?>
<!--dmxAppConnect-->
<script src="/dmxAppConnect/dmxAppConnect.js"></script>
<script src="/dmxAppConnect/dmxMoment.js"></script>
<script src="/dmxAppConnect/dmxFormatter.js"></script>
<script src="/dmxAppConnect/dmxDataTraversal/dmxDataTraversal.js"></script>
</head>

<body id="index" is="dmx-app" class="d-flex flex-column h-100">
<dmx-api-datasource id="dluxGetBlog" is="dmx-fetch" url="https://token.dlux.io/api/condenser_api/get_discussions_by_blog/" dmx-param:tag="'robotolux'" dmx-param:limit="10"></dmx-api-datasource>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/nav.php";
   include_once($path);
?>
<main role="main" class="flex-shrink-0">
  <div class="container-fluid">
    <div class="row mt-3">
      <div class="col-md-8 text-white text-center">
        <div class="display-4">Virtual Reality</div>
        <p class="lead">Responsive WebXR across mobile, desktop, and headset.<br>
          <a href="/vr" class="lead" target="_blank"><i class="fas fa-vr-cardboard mr-2"></i>Enter Metaverse</a></p>
      </div>
      <div class="col-md-4 text-center m-auto"> <a class="btn btn-primary btn-lg m-1 btn-1" href="/docs" role="button">Learn<i class="fas fa-shapes ml-2"></i></a><a class="btn btn-primary btn-lg m-1 btn-1" href="/new" role="button">Create<i class="fas fa-plus-circle ml-2"></i></a></div>
    </div>
  </div>
  <div class="card-columns p-3" id="blogResult" is="dmx-repeat" dmx-bind:repeat="dluxGetBlog.data.result">
    <div class="card text-white bg-dark mt-2 mb-3">
      <div class="card-header">
        <div class="d-inline-block">
          <div class="float-left" ><a dmx-bind:href="/@{{author}}"><img dmx-bind:src="https://token.dlux.io/getauthorpic/{{author}}" alt="" class="rounded-circle bg-light img-fluid mr-2 cover author-img"></a></div>
          <div class="float-left">
            <p class="mt-0 mb-0 text-muted text-semibold"><a dmx-bind:href="/@{{author}}" class="a-1">{{author}}<span class="ml-2 badge badge-pill badge-light">{{author_reputation.toString().rep()}}</span></a></p>
            <small class="text-muted">{{formatDate("MMM dd, yyyy")}}</small></div>
        </div>
        <div class="float-right"><span class="badge badge-secondary">{{json_metadata.scat()}}</span></div>
      </div>
      <a href="#detailModal" class="a-1" data-toggle="modal" dmx-on:click="data_detail.select(url)" dmx-bind:onclick="window.history.pushState('{{url}}','{{title}}', '/blog/@{{author}}/{{permlink}}');">
        <h5 class="card-title mt-2 text-center text-capitalize">{{title}}</h5>
        <img src="..."  alt="Card image cap" class="card-img-top" dmx-bind:src="{{json_metadata.parseJSON().image}}" />
        <div class="card-body">
          <p class="preview-text">{{body.removeMD().trunc(100,true,"...")}}</p>
        </div>
      </a>
      <center>
        <a dmx-bind:href="{{url}}" type="button" class="btn btn-outline-danger mb-4 btn-launch" target="_blank">Launch App</a>
      </center>
      <div class="card-footer">
               <div class="collapse" dmx-bind:id="vote{{post_id}}">
                 <form id="voteForm">
					<div class="d-flex align-items-center text-white-50">
 					  <div>
                         <button type="button" class="btn btn-primary" dmx-bind:id="voteBtn{{post_id}}" dmx-bind:onclick="vote('{{author}}','{{permlink}}','slider{{post_id}}')" style="width:70px">100%</button>
                         <button type="button" class="btn btn-secondary" data-toggle="collapse" dmx-bind:data-target="{{&quot;#&quot;}}vote{{post_id}}"><span class="close text-white">×</span></button>
					  </div>
				      <div class="flex-fill mx-2">
			            <p class="my-1">
							<input type="range" class="form-control-range" value="100" dmx-bind:id="slider{{post_id}}" dmx-bind:onchange="updateVoteSubmit('voteBtn{{post_id}}','slider{{post_id}}');">
						  </p>
					</div>
						<div>
			            <p class="my-0"><span class="mr-1"  id="commentVal">0</span><img src="/img/hextacular.svg" alt="" width="17"/></p>
						</div>
                   </div>
                 </form>
               </div> 
               <div class="d-flex align-items-center my-2">
                 <div><a data-toggle="collapse" dmx-bind:data-target="{{&quot;#&quot;}}vote{{post_id}}"><i class="fas fa-heart fa-fw mr-1"></i></a>{{active_votes.countUpVotes()}} <i class="fas fa-comment fa-fw ml-2 mr-1"></i>{{children}}</div>
                 <div class="ml-auto">{{total_payout_value}} <img src="../img/hextacular.svg" alt="" width="17"/></div>
               </div>
           </div>
    </div>
  </div>
  <dmx-data-detail id="data_detail" dmx-bind:data="dluxGetBlog.data.result" key="url">
  <div class="modal fade" id="detailModal" tabindex="11" role="dialog" aria-hidden="true">
 <div class="modal-dialog modal-full modal-xl modal-dialog-centered" role="document">
   <div class="modal-content bg-dark text-white">
	   		<div class="d-inline-block p-2">
	  <div class="float-left" ><a dmx-bind:href="/@{{data_detail.data.author}}"><img dmx-bind:src="https://token.dlux.io/getauthorpic/{{data_detail.data.author}}" alt="" class="rounded-circle bg-light img-fluid mr-2 cover author-img"></a></div>
        <div class="float-left">
          <p class="mt-0 mb-0 text-muted text-semibold"><a dmx-bind:href="/@{{data_detail.data.author}}" class="a-1">{{data_detail.data.author}}<span class="ml-2 badge badge-pill badge-light">{{data_detail.data.author_reputation.toString().rep()}}</span></a></p>
          <small class="text-muted">{{data_detail.data.created.formatDate("MMM dd, yyyy")}}</small></div>
		</div>
      <div class="float-right p-2"><span class="badge badge-secondary">{{data_detail.data.json_metadata.scat()}}</span><button type="button" class="close text-white ml-3" data-dismiss="modal" aria-label="Close" onclick="window.history.back();"><span aria-hidden="true">×</span></button></div>
		<hr class="mt-0">
    <a dmx-bind:href="/blog/@{{data_detail.data.author}}/{{data_detail.data.permlink}}"><h4 class="text-center p-2">{{data_detail.data.title}}</h4></a>
    

	 <img src="..."  alt="Card image cap" class="card-img-top" dmx-bind:src="{{data_detail.data.json_metadata.parseJSON().image}}" />  
    <p class="p-2">{{data_detail.data.body.removeMD()}}</p>
		  <center>
      <a dmx-bind:href="{{data_detail.data.url}}" type="button" class="btn btn-outline-danger mb-4 btn-launch">Launch App</a>
    </center>
	<div class="card-footer">
		<div class="collapse" dmx-bind:id="vote{{post_id}}">
		<form id="voteForm">
  		<div class="d-flex align-items-center text-white-50">
          <div>
			<button type="button" class="btn btn-primary" dmx-bind:id="voteBtn{{post_id}}" dmx-bind:onclick="vote('{{comment.author}}','{{data_detail.data.comment.permlink}}','slider{{post_id}}')" style="width:70px">100%</button>
			<button type="button" class="btn btn-secondary" data-toggle="collapse" dmx-bind:data-target="{{&quot;#&quot;}}vote{{post_id}}"><span class="close text-white">×</span></button>
		  </div>
		  <div class="flex-fill mx-2">
            <p class="my-1">
			<input type="range" class="form-control-range" value="100" dmx-bind:id="slider{{post_id}}" dmx-bind:onchange="updateVoteSubmit('voteBtn{{post_id}}','slider{{post_id}}');">
			</p>
		  </div>
			<p class="my-0"><span class="mr-1"  id="commentVal">0</span><img src="/img/hextacular.svg" alt="" width="17"/></p>
 		 </div>
	  </form>
	 </div>
		<div class="d-flex align-items-center my-2">
		<div><a data-toggle="collapse" dmx-bind:data-target="{{&quot;#&quot;}}vote{{post_id}}"><i class="fas fa-heart mr-1"></i></a>{{data_detail.data.active_votes.countUpVotes()}} <i class="fas fa-comment ml-2 mr-1"></i>{{data_detail.data.children}}</div>
     	<div class="ml-auto"> {{data_detail.data.total_payout_value}} <img src="../img/hextacular.svg" alt="" width="17"/></div>
		</div>
	   </div>
</dmx-data-detail>
		   </div>
		   </div>
	 </div>
</dmx-data-detail>
	 </div>
	</div>
	</div>
</main>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/footer.php";
   include_once($path);
?>
<script>

function updateVoteSubmit(id,val) {
    document.getElementById(id).innerHTML = document.getElementById(val).value + '%'; 
}
</script>
</body></html>
