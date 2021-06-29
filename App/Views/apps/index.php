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
		<div class="col-md-6 text-white text-center order-md-2">
        <div class="display-4">Virtual Reality</div>
        <p class="lead">Responsive WebXR across mobile, desktop, and headset.<br>
          <a href="/vr" class="lead" target="_blank"><i class="fas fa-vr-cardboard mr-2"></i>Enter Metaverse</a></p>
      </div>
      <div class="col-md-4 text-center m-auto order-md-12"> <a class="btn btn-primary btn-lg m-1 btn-1" href="/docs" role="button">Learn<i class="fas fa-shapes ml-2"></i></a><a class="btn btn-primary btn-lg m-1 btn-1" href="/new" role="button">Create<i class="fas fa-plus-circle ml-2"></i></a></div>
	  <div class="col-md-2 text-white m-auto text-center order-md-1">
		<a id="pairmenustatus"class="btn btn-outline-primary btn-lg dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">NEW
    			<span class="sr-only">Toggle Dropdown</span>
  				</a>
  				<div class="dropdown-menu">
    				<a id="hivepairselect" class="dropdown-item">NEW</a>
    				<a id="hbdpairselect" class="dropdown-item">HOT</a>
					<a id="hbdpairselect" class="dropdown-item">TRENDING</a>
				</div>
	  </div>
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
      <a href="#detailModal" class="a-1" data-toggle="modal" dmx-on:click="data_detail.select(url)" dmx-bind:onclick="window.history.pushState('{{url}}','{{dluxLoad.data.result.title}}', '/blog/@{{author}}/{{permlink}}');updateModalData('{{dluxLoad.data.result.created}}', '{{dluxLoad.data.result.json_metadata.parseJSON().toString()}}', '{{dluxLoad.data.result.title}}', 'dluxLoad.data.result.body.removeQuotes()', '{{dluxLoad.data.result.active_votes.toString()}}', '{{dluxLoad.data.result.children.toString()}}', '{{dluxLoad.data.result.total_payout_value}}', '{{dluxLoad.data.result.author}}', '{{dluxLoad.data.result.permlink}}');"><!-- ; updateModalData('{{dluxLoad.data.result.created}}', '{{dluxLoad.data.result.json_metadata.parseJSON().toString()}}', '{{dluxLoad.data.result.title}}', '{{dluxLoad.data.result.body}}', '{{dluxLoad.data.result.active_votes.toString()}}', '{{dluxLoad.data.result.children.toString()}}', '{{dluxLoad.data.result.total_payout_value}}')-->
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
                <div class="float-left" ><a id="modal_author_href1" ><img id="modal_author_img" alt="" class="rounded-circle bg-light img-fluid mr-2 cover author-img"></a></div>
                <div class="float-left">
                  <p class="mt-0 mb-0 text-muted text-semibold"><a class="a-1" id="modal_author"><span class="ml-2 badge badge-pill badge-light">{{data_detail.data.author_reputation.toString().rep()}}</span></a></p>
                  <small class="text-muted" id="modal_created"></small></div>
              </div>
              <div class="float-right p-2"><span class="badge badge-secondary" id="modal_scat"></span>
                <button type="button" class="close text-white ml-3" data-dismiss="modal" aria-label="Close" onclick="window.history.back();"><span aria-hidden="true">×</span></button>
              </div>
            </div>
            <a id="modal_blog_link" class="text-white">
              <h3 class="card-title mt-2 text-center text-capitalize p-2" id="modal_title"></h3>
            </a> <img src="..."  alt="Card image cap" class="card-img-top" id="modal_pic"/>
            <div class="card-body">
              <p class="p-2" id="modal_body"></p>
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
                <div class="ml-auto"id="modal_total_payout"><i class="ml-1 fab fa-fw fa-hive"></i></div>
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
function updateModalData(created, json_metadata, title, body, active_votes, children, total_payout_value, author, permlink){
  modalData = {
    author,
    permlink,
    created,
    json_metadata: scat(JSON.parse(json_metadata.replace(/&QO/g, '"').replace(/&SQO/g, "'"))),
    title,
    body = body.replace(/&QO/g, '"').replace(/&SQO/g, "'").replace(/&OPR/g, '(').replace(/&CPR/g, ')'),
    active_votes: JSON.parse(active_votes.replace(/&QO/g, '"').replace(/&SQO/g, "'")),
    children: JSON.parse(children.replace(/&QO/g, '"').replace(/&SQO/g, "'")),
    total_payout_value
  }
  document.getElementById('modal_created').innerHTML = formatDate(modalData.created, "MMM dd, yyyy")modalData.created //.formatDate("MMM dd, yyyy")
  document.getElementById('modal_scat').innerHTML = modalData.json_metadata // {{modalData.json_metadata.scat()}}
  document.getElementById('modal_body').innerHTML = removeMD(modalData.body) //{{modalData.body.removeMD()}}
  document.getElementById('modal_title').innerHTML = modalData.title // {{modalData.title}}
  document.getElementById('modal_author').innerHTML = '@' + modalData.author //{{data_detail.data.author}}
  document.getElementById('modal_author').href = `/@${modalData.author}`
  document.getElementById('modal_author_href1').href = `/@${modalData.author}`
  document.getElementById('modal_author_img').src = `https://images.hive.blog/u/${modalData.author}/avatar`
  document.getElementById('modal_total_payout').innerHTML = modalData. ' ' + modalData.total_payout_value //{{modalData.total_payout_value}}
  document.getElementById('modal_blog_link').href = `/blog/@${modalData.author}/${modalData.permlink}`
  document.getElementById('modal_pic').src = picFind(modalData.json_metadata)
  document.getElementById('modal_blog_link').href = `/blog/@${modalData.author}/${modalData.permlink}`
  document.getElementById('modal_blog_link').href = `/blog/@${modalData.author}/${modalData.permlink}`
}
function picFind(json) {
            var arr
            try {
                arr = json.image[0]
            } catch (e) {

            }
            if (typeof json.image == 'string') {
                return json.image
            } else if (typeof arr == 'string') {
                return arr
            } else if (typeof json.Hash360 == 'string') {
                return `https://ipfs.io/ipfs/${json.Hash360}`
            } else {
                /*
                var looker
                try {
                    looker = body.split('![')[1]
                    looker = looker.split('(')[1]
                    looker = looker.split(')')[0]
                } catch (e) {
                    */
                return '/img/dluxdefault.svg'
            }
        }
function scat (s) {
                let t = JSON.parse(s)
                if (t.vrHash) return 'VR'
                else if (t.arHash) return 'AR'
                else if (t.appHash) return 'dAPP'
                else return 'BLOG'
            }
            function removeMD(md, options) {
                options = options || {};
                options.listUnicodeChar = options.hasOwnProperty('listUnicodeChar') ? options.listUnicodeChar : false;
                options.stripListLeaders = options.hasOwnProperty('stripListLeaders') ? options.stripListLeaders : true;
                options.gfm = options.hasOwnProperty('gfm') ? options.gfm : true;
                options.useImgAltText = options.hasOwnProperty('useImgAltText') ? options.useImgAltText : false;
                var output = md || '';
                output = output.replace(/^(-\s*?|\*\s*?|_\s*?){3,}\s*$/gm, '');
                try {
                    if (options.stripListLeaders) {
                        if (options.listUnicodeChar)
                            output = output.replace(/^([\s\t]*)([\*\-\+]|\d+\.)\s+/gm, options.listUnicodeChar + ' $1');
                        else
                            output = output.replace(/^([\s\t]*)([\*\-\+]|\d+\.)\s+/gm, '$1');
                    }
                    if (options.gfm) {
                        output = output
                            .replace(/\n={2,}/g, '\n')
                            .replace(/~{3}.*\n/g, '')
                            .replace(/~~/g, '')
                            .replace(/`{3}.*\n/g, '');
                    }
                    output = output
                        .replace(/<[^>]*>/g, '')
                        .replace(/^[=\-]{2,}\s*$/g, '')
                        .replace(/\[\^.+?\](\: .*?$)?/g, '')
                        .replace(/\s{0,2}\[.*?\]: .*?$/g, '')
                        .replace(/\!\[(.*?)\][\[\(].*?[\]\)]/g, options.useImgAltText ? '$1' : '')
                        .replace(/\[(.*?)\][\[\(].*?[\]\)]/g, '$1')
                        .replace(/^\s{0,3}>\s?/g, '')
                        .replace(/^\s{1,2}\[(.*?)\]: (\S+)( ".*?")?\s*$/g, '')
                        .replace(/^(\n)?\s{0,}#{1,6}\s+| {0,}(\n)?\s{0,}#{0,} {0,}(\n)?\s{0,}$/gm, '$1$2$3')
                        .replace(/([\*_]{1,3})(\S.*?\S{0,1})\1/g, '$2')
                        .replace(/([\*_]{1,3})(\S.*?\S{0,1})\1/g, '$2')
                        .replace(/(`{3,})(.*?)\1/gm, '$2')
                        .replace(/`(.+?)`/g, '$1')
                        .replace(/\n{2,}/g, '\n\n');
                } catch (e) {
                    console.error(e);
                    return md;
                }
                return output;
            }
function formatData(t, n) {
                var r = h(t);
                if ("Invalid Date" == r.toString()) return null;
                var e = function(t) {
                        return ("00" + t).substr(-2);
                    },
                    u = [
                        "January",
                        "February",
                        "March",
                        "April",
                        "May",
                        "June",
                        "July",
                        "August",
                        "September",
                        "October",
                        "November",
                        "December"
                    ],
                    a = [
                        "Jan",
                        "Feb",
                        "Mar",
                        "Apr",
                        "May",
                        "Jun",
                        "Jul",
                        "Aug",
                        "Sep",
                        "Oct",
                        "Nov",
                        "Dec"
                    ],
                    i = [
                        "Sunday",
                        "Monday",
                        "Tuesday",
                        "Wednesday",
                        "Thursday",
                        "Friday",
                        "Saturday"
                    ],
                    o = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                    c = r.getFullYear(),
                    s = r.getMonth(),
                    l = r.getDate(),
                    f = r.getDay(),
                    d = r.getHours(),
                    g = r.getMinutes(),
                    m = r.getSeconds();
                return n.replace(/[yMdHhmsaA]+/g, function(t) {
                    switch (t) {
                        case "yyyy":
                            return ("0000" + c).substr(-4);
                        case "yy":
                            return e(c);
                        case "y":
                            return c;
                        case "MMMM":
                            return u[s];
                        case "MMM":
                            return a[s];
                        case "MM":
                            return e(s + 1);
                        case "M":
                            return s + 1;
                        case "dddd":
                            return i[f];
                        case "ddd":
                            return o[f];
                        case "dd":
                            return e(l);
                        case "d":
                            return l;
                        case "HH":
                            return e(d);
                        case "H":
                            return d;
                        case "hh":
                            return e(d % 12 || 12);
                        case "h":
                            return d % 12 || 12;
                        case "mm":
                            return e(g);
                        case "m":
                            return g;
                        case "ss":
                            return e(m);
                        case "s":
                            return m;
                        case "a":
                            return d < 12 ? "am" : "pm";
                        case "A":
                            return d < 12 ? "AM" : "PM";
                    }
                    return t;
                });
            }
function updateVoteSubmit(id,val) {
    document.getElementById(id).innerHTML = document.getElementById(val).value + '%'; 
}
</script>
</body></html>
