<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - Apps</title>

<script src="/dlux-io/dmxAppConnect/dmxAppConnect.js"></script>
<script src="/dlux-io/dmxAppConnect/dmxMoment.js"></script>
<script src="/dlux-io/dmxAppConnect/dmxFormatter.js"></script>
<script src="/dlux-io/dmxAppConnect/dmxDataTraversal/dmxDataTraversal.js"></script>

</head>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/header.php";
   include_once($path);
?>
<body class="d-flex flex-column h-100 padme-t70" id="new" is="dmx-app">
<dmx-api-datasource id="api1" is="dmx-fetch" url="https://dluxdata.herokuapp.com/new"></dmx-api-datasource>
<button id="btn1" dmx-on:click="data_view1.size('1')">size('1')</button>
<button id="btn2" dmx-on:click="data_view1.sort('author','asc')">sort('author','asc')</button>
<dmx-data-view id="data_view1" dmx-bind:data="api1.data.result"></dmx-data-view>
<div dmx-repeat:repeat1="data_view1.data" class="text-white">
<div class="rounded border border-success"><h1 class="text-success">{{$index+1}}. Sortable Items</h1><h2>Author: {{author}} | Permlink: {{permlink}} | Block: {{block}} | Votes: {{votes}} | Vote Weight: {{voteweight}} | Promote: {{promote}} | Paid: {{paid}} | URL: {{url}}</div></h2>
  <dmx-api-datasource id="api1load" is="dmx-fetch" dmx-bind:url="https://dluxdata.herokuapp.com/api/condenser_api/get_content?author={{author}}&permlink={{permlink}}"></dmx-api-datasource>
  <div class="rounded border border-info">
	  <h1 class="text-info">Children</h1>
	<div>Author: {{api1load.data.result.author}}</div>
		<div>Permlink: {{api1load.data.result.permlink}}</div>
		<div>Category: {{api1load.data.result.category}}</div>
		<div>Title: {{api1load.data.result.title}}</div>
	 <img src="..."  alt="Card image cap" class="card-img-top" dmx-bind:src="{{dluxLoad.data.result.json_metadata.parseJSON().picFind()}}" />
		<div>Body: {{api1load.data.result.body.removeMD().trunc(100,true,"...")}}</div>
		<div>JSON Metadata: {{api1load.data.result.json_metadata}}</div>
	
	<div class="row">
		<div class="col-6">
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
				</div>
		<div class="col-6">
			
<p>
  <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Link with href
  </a>
  <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Button with data-bs-target
  </button>
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
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
			

	  </div>
	</div>
</div>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/nav.php";
   include_once($path);
?>
<main role="main" class="flex-shrink-0">
  <div class="container-fluid"></div>
</main>
<script src="/js/jquery-3.4.1.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap-4.4.1.js"></script>
</body></html>
