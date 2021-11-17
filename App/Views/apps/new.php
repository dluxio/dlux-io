<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - Apps</title>

<script src="/dlux-io/dmxAppConnect/dmxAppConnect.js"></script>
<script src="/dlux-io/dmxAppConnect/dmxMoment.js"></script>
<script src="/dlux-io/dmxAppConnect/dmxFormatter/dmxFormatter.js"></script>
<script src="/dlux-io/dmxAppConnect/dmxDataTraversal/dmxDataTraversal.js"></script>
<style>
	.img-wrap{
    position: relative;
    .img-content{
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        > img{
            max-width: 100%;
            max-height: 100%;
            width: auto;
        }
    }
    &.ratio-4-3{
        padding-top: 75%;
    }
    &.ratio-16-9{
        padding-top: 56.25%;
    }
    &.ratio-3-2{
        padding-top: 66.66%;
    }
    &.ratio-8-5{
        padding-top: 62.5%;
    }
}
	</style>
</head>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/header.php";
   include_once($path);
?>
<body class="d-flex flex-column h-100 padme-t70" id="new" is="dmx-app">
<main>
<div class="container">
	<div class="container-fluid">

<dmx-api-datasource id="api1" is="dmx-fetch" url="https://dluxdata.herokuapp.com/new"></dmx-api-datasource>
<button id="btn1" dmx-on:click="data_view1.size('1')">size('1')</button>
<button id="btn2" dmx-on:click="data_view1.sort('author','asc')">sort('author','asc')</button>
<dmx-data-view id="data_view1" dmx-bind:data="api1.data.result"></dmx-data-view>
<div class="row row-cols-md-2 row-cols-1" >
<div dmx-repeat:repeat1="data_view1.data" class="text-white">
	
<div class="card bg-none m-2">
	<div class="card-header">
	<a dmx-bind:href="/@{{author}}">
	<div class="d-flex">
			<img dmx-bind:src="https://images.hive.blog/u/{{author}}/avatar" dmx-bind:alt="{{author}} pfp" class="rounded-circle bg-light img-fluid mr-2 cover author-img">
			<h3 class="text-primary">{{author}}</h3>
	</div></a>
	
	<h2 class="d-none">Author: {{author}} | Permlink: {{permlink}} | Block: {{block}} | Votes: {{votes}} | Vote Weight: {{voteweight}} | Promote: {{promote}} | Paid: {{paid}} | URL: {{url}}</h2>
  <dmx-api-datasource id="api1load" is="dmx-fetch" dmx-bind:url="https://dluxdata.herokuapp.com/api/condenser_api/get_content?author={{author}}&permlink={{permlink}}"></dmx-api-datasource>
		<a href="#">
		<h3 class="lead">{{api1load.data.result.title.trunc(50,true,"... ")}}</h3>
		<div class="text-white-50">{{api1load.data.result.body.removeMD().trunc(50,true,"... ")}}<span class="small text-primary">Read More</span></div>
		</a>
</div>
  <div class="card-body p-0">
	 
  <div class=""><span class="badge badge-secondary">{{api1load.data.result.json_metadata.scat()}}</span>
	  <a dmx-bind:href="{{url}}" type="button"><img src="..."  alt="Card image cap" class="card-img-top img-fluid" dmx-bind:src="{{api1load.data.result.json_metadata.parseJSON().picFind()}}" style="width: 640px; height: 360px; object-fit: cover;"/></a>
		  </div>

	  <div class="d-none" dmx-bind:id="{{api1load.data.result.author}}{{api1load.data.result.permlink}}dataload">
		<div>Author: {{api1load.data.result.author}}</div>
		<div>Permlink: {{api1load.data.result.permlink}}</div>
		<div>Category: {{api1load.data.result.category}}</div>
		<div>Title: {{api1load.data.result.title}}</div>
		<div>Body: {{api1load.data.result.body.removeMD()}}</div>
		<div>JSON Metadata: {{api1load.data.result.json_metadata}}</div>
		<div>Last Update: {{api1load.data.result.last_update}}</div>
		<div>Depth: {{api1load.data.result.depth}}</div>
		<div>Children: {{api1load.data.result.children}}</div>
		<div>Last Payout: {{api1load.data.result.last_payout}}</div>
		<div>Cashout Time: {{api1load.data.result.cashout_time}}</div> 
		<div>Payout Value: {{api1load.data.result.total_payout_value}}</div> 
		<div>Curator Payout Value: {{api1load.data.result.curator_payout_value}}</div>
		<div>Pending Payout Value: {{api1load.data.result.pending_payout_value}}</div>
		<div>Promoted: {{api1load.data.result.promoted}}</div>
		<div>Replies: {{api1load.data.result.replies}}</div>
		<div>Body Length: {{api1load.data.result.body_length}}</div>
		<div>Author Reputation: {{api1load.data.result.author_reputation.toString().rep()}}</div> 
		<div>Parent Author: {{api1load.data.result.parent_author}}</div>
		<div>Parent Permlink: {{api1load.data.result.parent_permlink}}</div>
		<div>URL: {{api1load.data.result.url}}</div>
		<div>Room Title: {{api1load.data.result.room_title}}</div> 
		<div>Beneficiaries: {{api1load.data.result.beneficiaries.account}}</div> 
		<div>Max Accepted Payout: {{api1load.data.result.max_accepted_payout}}</div>
		<div>Percent HBD: {{api1load.data.result.percent_hbd}}</div>
		<div>ID: {{api1load.data.result.id}}</div>
		<div>Author Rewards: {{api1load.data.result.author_rewards}}</div>
		<div>Max Cashout Time: {{api1load.data.result.max_cashout_time}}</div>
		<div>Reward Weight: {{api1load.data.result.reward_weight}}</div>
		<div>Root Author: {{api1load.data.result.root_author}}</div>
		<div>Root Permlink: {{api1load.data.result.root_permlink}}</div>
		<div>Allow Replies: {{api1load.data.result.allow_replies}}</div>
		<div>Allow Votes: {{api1load.data.result.allow_votes}}</div>
		<div>Allow Curation Rewards: {{api1load.data.result.allow_curation_rewards}}</div>
		<div>Reblogged By: {{api1load.data.result.reblogged_by}}</div>
		<div>Net Votes: {{api1load.data.result.net_votes}}</div>
		<div>Children Abs Rshares: {{api1load.data.result.children_abs_rshares}}</div>
		<div>Total Pending Payout Value: {{api1load.data.result.total_pending_payout_value}}</div>
		<div>Total Vote Weight: {{api1load.data.result.total_vote_weight}}</div>
		<div>Vote Rshares: {{api1load.data.result.vote_rshares}}</div>
		<div>Net Rshares: {{api1load.data.result.net_rshares}}</div>
		<div>Abs Rshares: {{api1load.data.result.abs_rshares}}</div>
		  
    	<div id="repeat_active_votes" is="dmx-repeat" dmx-bind:repeat="api1load.data.result.active_votes">
	    	<div>Percent: {{percent}}</div>
			<div>Reputation: {{reputation}}</div>
			<div>Rshares: {{rshares}}</div>
			<div>Time: {{time}}</div>
			<div>Voter: {{voter}}</div>
			<div>Weight: {{weight}}</div>
		</div>
  </div>
</div>
	<div class="card-footer">
		Launch
	</div>
		</div>
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
   $path .= "/mod/nav.php";
   include_once($path);
?>

<script src="/js/jquery-3.4.1.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap-4.4.1.js"></script>
</body></html>
