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

<body class="d-flex flex-column h-100 padme-t70" id="index" is="dmx-app">
<dmx-api-datasource id="dluxList" is="dmx-fetch" url="https://dluxdata.herokuapp.com/new"></dmx-api-datasource> // new | hot | trending
<!--<dmx-api-datasource id="dluxGetContent" is="dmx-fetch" url="https://token.dlux.io/api/condenser_api/get_content?author=dlux-io&permlink=testing-dlux-vr"></dmx-api-datasource>-->

<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/nav.php";
   include_once($path);
?>
<main role="main" class="flex-shrink-0">
  <div class="container-fluid">
    <div class="row mt-3">
		<div class="col-md-1 text-white m-auto text-center">
		<a id="pairmenustatus"class="btn btn-outline-primary btn-lg dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">NEW
    			<span class="sr-only">Toggle Dropdown</span>
  				</a>
  				<div class="dropdown-menu">
    				<a id="hivepairselect" class="dropdown-item">NEW</a>
    				<a id="hbdpairselect" class="dropdown-item">HOT</a>
					<a id="hbdpairselect" class="dropdown-item">TRENDING</a>
				</div>
	  </div>
      <div class="col-md-7 text-white text-center">
        <div class="display-4">Virtual Reality</div>
        <p class="lead">Responsive WebXR across mobile, desktop, and headset.<br>
          <a href="/vr" class="lead" target="_blank"><i class="fas fa-vr-cardboard mr-2"></i>Enter Metaverse</a></p>
      </div>
      <div class="col-md-4 text-center m-auto"> <a class="btn btn-primary btn-lg m-1 btn-1" href="/docs" role="button">Learn<i class="fas fa-shapes ml-2"></i></a><a class="btn btn-primary btn-lg m-1 btn-1" href="/new" role="button">Create<i class="fas fa-plus-circle ml-2"></i></a></div>
    </div>
  </div>
  <div class="card-columns p-3" id="dluxCards" is="dmx-repeat" dmx-bind:repeat="dluxList.data.result">
    <dmx-api-datasource id="dluxLoad" is="dmx-fetch" dmx-bind:url="https://dluxdata.herokuapp.com/api/condenser_api/get_content?author={{author}}&permlink={{permlink}}"></dmx-api-datasource>
    <div class="card text-white bg-dark mt-2 mb-3">
      <div class="card-header">
        <div class="d-inline-block">
          <div class="float-left" ><a dmx-bind:href="/@{{author}}"><img dmx-bind:src="https://images.hive.blog/u/{{author}}/avatar" alt="" class="rounded-circle bg-light img-fluid mr-2 cover author-img"></a></div>
          <div class="float-left">
            <p class="mt-0 mb-0 text-muted text-semibold"><a dmx-bind:href="/@{{author}}" class="a-1">{{author}}<span class="ml-2 badge badge-pill badge-light">{{author_reputation.toString().rep()}}</span></a></p>
            <small class="text-muted">{{dluxLoad.data.result.created.formatDate("MMM dd, yyyy")}}</small></div>
        </div>
        <div class="float-right"><span class="badge badge-secondary">{{dluxLoad.data.result.json_metadata.scat()}}</span></div>
      </div>
      <a href="#detailModal" class="a-1" data-toggle="modal" dmx-on:click="data_detail.select(url)" dmx-bind:onclick="window.history.pushState('{{url}}','{{dluxLoad.data.result.title}}', '/blog/@{{author}}/{{permlink}}');updateModalData('{{dluxLoad.data.result.created}}', '{{dluxLoad.data.result.json_metadata.parseJSON().toString()}}', '{{dluxLoad.data.result.title}}', '{{dluxLoad.data.result.body}}', '{{dluxLoad.data.result.active_votes.toString()}}', '{{dluxLoad.data.result.children.toString()}}', '{{dluxLoad.data.result.total_payout_value}}')">
        <h5 class="card-title mt-2 text-center text-capitalize">{{dluxLoad.data.result.title}}</h5>
        <img src="..."  alt="Card image cap" class="card-img-top" dmx-bind:src="{{dluxLoad.data.result.json_metadata.parseJSON().picFind()}}" />
        <div class="card-body">
          <p class="preview-text">{{dluxLoad.data.result.body.removeMD().trunc(100,true,"...")}}</p>
        </div>
      </a>
      <center>
        <a dmx-bind:href="{{url}}" type="button" class="btn btn-outline-danger mb-4 btn-launch" target="_blank">Launch App</a>
      </center>
      <div class="card-footer">
        <div class="collapse" dmx-bind:id="vote{{dluxLoad.data.result.id}}">
          <form id="voteForm">
            <div class="d-flex align-items-center text-white-50">
              <div>
                <button type="button" class="btn btn-primary" dmx-bind:id="voteBtn{{dluxLoad.data.result.id}}" dmx-bind:onclick="vote('{{dluxLoad.data.result.author}}','{{dluxLoad.data.result.permlink}}','slider{{dluxLoad.data.result.id}}');">100%</button>
                <button type="button" class="btn btn-secondary" data-toggle="collapse" dmx-bind:data-target="{{&quot;#&quot;}}vote{{dluxLoad.data.result.id}}"><span class="close text-white">×</span></button>
              </div>
              <div class="flex-fill mx-2">
                <p class="my-1">
                  <input type="range" class="form-control-range" step="0.01" value="100" dmx-bind:id="slider{{dluxLoad.data.result.id}}" dmx-bind:onchange="updateVoteSubmit('voteBtn{{dluxLoad.data.result.id}}','slider{{dluxLoad.data.result.id}}');">
                </p>
              </div>
              <div>
                <p class="my-0"><span class="mr-1"  id="commentVal">0</span><i class="ml-1 fab fa-fw fa-hive"></i></p>
              </div>
            </div>
          </form>
        </div>
        <div class="d-flex align-items-center my-2">
          <div><a data-toggle="collapse" dmx-bind:data-target="{{&quot;#&quot;}}vote{{dluxLoad.data.result.id}}"><i class="fas fa-heart fa-fw mr-1"></i></a>{{dluxLoad.data.result.active_votes.countUpVotes()}} <i class="fas fa-comment fa-fw ml-2 mr-1"></i>{{dluxLoad.data.result.children}}</div>
          <div class="ml-auto">{{dluxLoad.data.result.total_payout_value}}<i class="ml-1 fab fa-fw fa-hive"></i></div>
        </div>
      </div>
    </div>
  </div>
  <dmx-data-detail id="data_detail" dmx-bind:data="dluxList.data.result" key="url">
    <div class="modal fade" id="detailModal" tabindex="11" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-full modal-xl modal-dialog-centered" role="document">
        <div class="modal-content bg-dark text-white">
          <div class="card text-white bg-dark">
            <div class="card-header">
              <div class="d-inline-block p-2">
                <div class="float-left" ><a dmx-bind:href="/@{{data_detail.data.author}}"><img dmx-bind:src="https://images.hive.blog/u/{{data_detail.data.author}}/avatar" alt="" class="rounded-circle bg-light img-fluid mr-2 cover author-img"></a></div>
                <div class="float-left">
                  <p class="mt-0 mb-0 text-muted text-semibold"><a dmx-bind:href="/@{{data_detail.data.author}}" class="a-1">{{data_detail.data.author}}<span class="ml-2 badge badge-pill badge-light">{{data_detail.data.author_reputation.toString().rep()}}</span></a></p>
                  <small class="text-muted">{{modalData.created.formatDate("MMM dd, yyyy")}}</small></div>
              </div>
              <div class="float-right p-2"><span class="badge badge-secondary"> {{modalData.json_metadata.scat()}}</span>
                <button type="button" class="close text-white ml-3" data-dismiss="modal" aria-label="Close" onclick="window.history.back();"><span aria-hidden="true">×</span></button>
              </div>
            </div>
            <a dmx-bind:href="/blog/@{{data_detail.data.author}}/{{data_detail.data.permlink}}" class="text-white">
              <h3 class="card-title mt-2 text-center text-capitalize p-2">{{modalData.title}}</h3>
            </a> <img src="..."  alt="Card image cap" class="card-img-top" dmx-bind:src="{{data_detail.data.json_metadata.parseJSON().picFind()}}" />
            <div class="card-body">
              <p class="p-2">{{modalData.body.removeMD()}}</p>
            </div>
            <center>
              <a dmx-bind:href="{{data_detail.data.url}}" type="button" class="btn btn-outline-danger mb-4 btn-launch">Launch App</a>
            </center>
            <div class="card-footer">
              <div class="collapse" dmx-bind:id="vote{{id}}">
                <form id="voteForm">
                  <div class="d-flex align-items-center text-white-50">
                    <div>
                      <button type="button" class="btn btn-primary" dmx-bind:id="voteBtn{{id}}" dmx-bind:onclick="vote('{{comment.author}}','{{data_detail.data.comment.permlink}}','slider{{id}}')">100%</button>
                      <button type="button" class="btn btn-secondary" data-toggle="collapse" dmx-bind:data-target="{{&quot;#&quot;}}vote{{id}}"><span class="close text-white">×</span></button>
                    </div>
                    <div class="flex-fill mx-2">
                      <p class="my-1">
                        <input type="range" class="form-control-range" step="0.01" value="100" dmx-bind:id="slider{{id}}" dmx-bind:onchange="updateVoteSubmit('voteBtn{{id}}','slider{{id}}');">
                      </p>
                    </div>
                    <p class="my-0"><span class="mr-1"  id="commentVal">0</span><i class="ml-1 fab fa-fw fa-hive"></i></p>
                  </div>
                </form>
              </div>
              <div class="d-flex align-items-center my-2">
                <div><a data-toggle="collapse" dmx-bind:data-target="{{&quot;#&quot;}}vote{{id}}"><i class="fas fa-heart mr-1"></i></a>{{modalData.active_votes.countUpVotes()}} <i class="fas fa-comment ml-2 mr-1"></i>{{modalData.children}}</div>
                <div class="ml-auto"> {{modalData.total_payout_value}}<i class="ml-1 fab fa-fw fa-hive"></i></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </dmx-data-detail>
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
var modalData = {}
function updateModalData(created, json_metadata, title, body, active_votes, children, total_payout_value){
  modalData = {
    created,
    json_metadata: JSON.parse(json_metadata.replace(/&QO/g, '"').replace(/&SQO/g, "'")),
    title,
    body,
    active_votes: JSON.parse(active_votes.replace(/&QO/g, '"').replace(/&SQO/g, "'")),
    children: JSON.parse(children.replace(/&QO/g, '"').replace(/&SQO/g, "'")),
    total_payout_value
  }
}
function updateVoteSubmit(id,val) {
    document.getElementById(id).innerHTML = document.getElementById(val).value + '%'; 
}
</script>
</body></html>
