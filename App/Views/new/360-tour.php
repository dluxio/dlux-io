<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX 360° Tour</title>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/header.php";
   include_once($path);
?>
<style>
	#img-well {
		border-style: solid;
		border-radius: 10px;
		border-width: 5px;
		border-color:#96242F;
			}
	#img-well.drag {
		background: #8ED2C9;		
			}
	.specs {
		color: #431015;
		border-style: solid;
		border-radius: 5px;
		border-color: #721C24;
	}
	.flex {
  		display: flex;
  		flex-direction: row;
}
	.gutter {
		background-repeat: no-repeat;
     	background-position: 50%;
	}
	.gutter.gutter-horizontal {cursor: col-resize;background-image:  url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAeCAYAAADkftS9AAAAIklEQVQoU2M4c+bMfxAGAgYYmwGrIIiDjrELjpo5aiZeMwF+yNnOs5KSvgAAAABJRU5ErkJggg=='); }
	.gutter.gutter-vertical {cursor: row-resize;background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAFAQMAAABo7865AAAABlBMVEVHcEzMzMzyAv2sAAAAAXRSTlMAQObYZgAAABBJREFUeF5jOAMEEAIEEFwAn3kMwcB6I2AAAAAASUVORK5CYII='); }
</style>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/svg.js/2.6.6/svg.min.js"
    integrity="sha256-M8IkAPnXdVChgPQwts/KeepRP4ogs+hzBtPmVhUj5YA="
    crossorigin="anonymous"
  ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/svg.connectable.js/2.0.1/svg.connectable.min.js"></script>
<script src="../js/buffer.js"></script>
<script src="../js/drag-drop.js"></script>
<script src="../js/svg.draw.min.js"></script>
<script src="../js/svg.draggable.min.js"></script>
<script src="../js/svg.resize.min.js"></script>
<script src="../js/svg.select.min.js"></script>
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
<script src="https://unpkg.com/ipfs-http-client@29.1.1/dist/index.min.js"></script>
</head>
<body class="d-flex flex-column h-100 padme-t70 text-center text-white">
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/nav.php";
   include_once($path);
?>
<main role="main" class="p-3 flex-shrink-0">
  <section class="flex">
  	<div id="one">
	  <div class="flex-column mb-4 px-3">
		<div class="flex-row py-2">
			<h1 class="px-4 font-weight-bold">DLUX 360°</h1>
			<h1 class="px-4 font-weight-bold" style="font-variant:small-caps;">image tour builder</h1>
			<hr class="bg-light">
		</div>
		<div class="flex-row text-left mt-2">
		<form>
		  <div class="form-group">
		    <label for="username">Author</label>
			  <div class="input-group">
			  	<div class="input-group-prepend">
          			<div class="input-group-text">@</div>
        		</div>
		    	<input type="text" class="form-control" readonly id="username" placeholder="Please login">
			</div>
		  </div>
		  <div class="form-group">
		    <label for="title">Title</label>
		    <input type="text" class="form-control" id="title" onfocusout="keyupwrap()" placeholder="Enter an attention grabbing title">
			<small id="permlinkPreview" class="form-text text-muted d-flex"><span id="permlink" class="mr-auto">Permlink: build-permlink-here</span><a href="#" class="ml-auto">Edit Permlink</a></small>
	      </div>
		  <div class="form-group">
		    <label for="description">Description</label>
		    <textarea class="form-control" rows="2" id="validationCustomDescription" placeholder="Add a comment" required></textarea>
	      </div>
		  <div class="form-group">
		    <label for="title">Tags</label>
		    <input type="text" class="form-control" id="tags" placeholder="tags,look-like,this">
			<small id="tagsHelp" class="form-text text-muted">Add up to 4 tags, comma separated, no spaces</small>
	      </div>
		  <div class="text-center">
		    <button type="button" onclick="post()" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Publish Gallery to HIVE">Publish</button>
		  </div>
	    </form>
		</div>
      </div></div>
  <div id="two">
	  <div class="flex-column flex-shrink mx-3">
			<div id="img-well" class="p-5 mb-3 alert-danger">
				<h3 style="color: #721C24;">Drag and drop images here</h3>
				<a href="#" class="alert-link disabled" >Click or tap to browse (coming soon)</a>
				<div class="d-flex">
				<div class="specs mx-auto pt-3 pr-3 mt-3">
				<h6 class="text-left"><ul>
						<li>Equirectangular - 2:1</li>
						<li>.JPG, .JPEG, .PNG</li>
				  		<li>Max 5MB 4096x2048</li>
                </ul>
			  </h6></div></div>
			</div>
		<div id="listOfItems" >
			<!--<div id="image01" class="p-3 mb-3 bg-dark" style="border-radius: 10px;">
				<div class="d-flex align-items-center flex-row pb-2 mb-2" style="border-bottom-style: solid; border-bottom-color: #909090">
					<div class="d-flex">
						<input id="image01Name" class="form-control form-control-sm mr-2" type="text" placeholder="Image Name" disabled>
						<button id="image01NameEdit" class="btn btn-secondary btn-sm ml-auto" data-toggle="tooltip" data-placement="top" title="Edit Image Name"><i class="fas fa-fw fa-pencil-alt"></i></button>
					</div>
					<div class="ml-auto">
						<button id="image01Pin" class="btn btn-primary btn-sm mr-2" data-toggle="tooltip" data-placement="top" title="Asset Pinned to IPFS"><i class="fas fa-fw fa-thumbtack"></i></button>
						<button id="image01Delete" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete Asset"><i class="fas fa-fw fa-trash-alt"></i></button></div>
				</div>
				<div class="d-flex flex-row">
		  		<div>
						<div><img id="image01Src" src="/img/equirectangular.jpeg" width="700"/></div>
						<div class="small"><a href="#" id="image01SrcLnk" target="_blank">Source Link</a></div>
		  		</div>
			</div>
			<div class="pt-2 mb-3 text-left" style="border-bottom-style: solid; border-bottom-color: #909090">
				<h4>Link Hotspots <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Click and drag on the image to add a link hotspot."></i></h4>
			</div>
			<div id="listOfImage01Spots">
				<div id="image01Spot01">
					<div class="d-flex pb-3" style="border-bottom-style: solid; border-bottom-color: #909090">
						<input id="image01Spot01Name" class="form-control form-control-sm mr-2" type="text" placeholder="Link Name" disabled>
						<button id="image01Spot01NameEdit" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit Link Name"><i class="fas fa-fw fa-pencil-alt"></i></button>
						<select id="image01Spot01Link" class="form-control form-control-sm ml-5" type="text" placeholder="Link to Image" data-toggle="tooltip" data-placement="top" title="Select the image this hotspot links to.">
					 		<option>Image Name 1</option><option>Image Name 2</option><option>Image Name 3</option>
						</select>
						<button id="image01Spot01Delete" class="btn btn-danger btn-sm ml-2" data-toggle="tooltip" data-placement="top" title="Delete Link"><i class="fas fa-fw fa-trash-alt"></i></button>
					</div>
				</div>
			</div>
		  </div>	
		</div>-->
		</div>
			</div>
</div>
  <div id="three">
	  <div class="flex-column flex-fill h-100 ml-3">
		<iframe id="aframePreview" src="https://turnkey-360-tour.glitch.me/post.html" width="100%" height="100%" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>			
	</div>
</section>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/split.js/1.3.5/split.min.js"></script>
	<script>
const GUTTER_SIZE = 100;

const gutterStyle = dimension => ({
  'flex-basis': `${GUTTER_SIZE}px`,
});

const elementStyle = (dimension, size) => ({
  'flex-basis': `calc(${size}% - ${GUTTER_SIZE}px)`,
})

Split(['#one', '#two', '#three'], {
  sizes: [350, 350, 600],
  minSize: 200,
  elementStyle,
  gutterStyle
});</script>
</main>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/footer.php";
   include_once($path);
?>
<script src="../js/img-ipfs.js"></script>
<script>
	var bodyVars = {} //{"QmUgit7bQH4m2eR1cmwWWWmo2ZKis1kKsk3g5SbgZwgScv":{links:[{hash:"QmR6kb8uqRKEf9i54xrkWDkv3xM5vMZvFrg3kgf2TE1cRb", pos:"10 0 -10", text: "test text"}]}}
	var programVars = {}
	var simplemde = new SimpleMDE({
        element: document.getElementById("validationCustomDescription")
      });
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        "use strict";
        window.addEventListener(
          "load",
          function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName("needs-validation");
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener(
                "submit",
                function(event) {
                  console.log("button");
                  if (
                    document.getElementById("validationCustomDescription")
                      .innerHTML == "Sign In"
                  ) {
                    sendLink("/auth");
                  }
                  var tagField = document.getElementById(
                    "validationCustomReferal"
                  ).value;
                  var tags = tagField.split(",").map(item => item.trim());
                  let otherTags = tags.slice(0, 4);
                  var customJSON = JSON.stringify({
                    tags: otherTags,
                    subApp: "SuperCraftLoader/v0.1",
                    xr: false,
                    vrHash: "QmTzKnzxEm3ZXcqFMxytt3fnJZvSSvtRnMCZTuzzMxwG7y",
                    superCraft: document.getElementById(
                      "validationCustomLoader"
                    ).value
                  });
                  var postData = {
                    title: document.getElementById("validationCustomTitle")
                      .value,
                    message: document.getElementById(
                      "validationCustomDescription"
                    ).value,
                    customJSON: customJSON
                  };
                  console.log(postData);
                  if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                  } else {
                    window.parent.postMessage(
                      {
                        func: "advPost",
                        message: postData
                      },
                      "*"
                    );
                  }
                  form.classList.add("was-validated");
                },
                false
              );
            });
          },
          false
        );
      })();
      //onpageloaded();
    </script>
	<script>

	var custom_json = {
      "app": "dlux/0.0.9",
      "xr": true,
      "Hash360": "",
      "format": "markdown",
      "assets": [
      ],
      "tags": [
         "dlux"
      ],
      "vrHash": "QmNby3SMAAa9hBVHvdkKvvTqs7ssK4nYa2jBdZkxqmRc16"
   },
   permlink
    const ipfs = window.IpfsHttpClient({ host: 'ipfs.infura.io', port: '5001', protocol: 'https' })
    function saveToIpfs(ar, pin, is360, newAsset){
      console.log(`You've requested to upload and pin(${pin}) 360(${is360}) image(s) and create assets(${newAsset})\nIPFS maky take some time to upload...`)
      var ipfsIP = []
      var info = []
      for (var name in ar){
        ipfsIP.push({'path':`${ar[name][1]}`,'content':ar[name][0]})
        info.push([name,ar[name][1]])
      }
    ipfs.add(ipfsIP, (err, ipfsReturn) => {
            if (!err){
              iloaded(ipfsReturn, info)
            } else {
        console.log('IPFS Upload Failed', err)}
          })
	}
	function iloaded(assets, info){
		if(assets){
			for (var i = 0; i < assets.length; i++){
				if (bodyVars[assets[i].hash] == undefined){
					bodyVars[assets[i].hash] = {links:[]}
				}
			}
			for (var i = 0; i < assets.length; i++){
				custom_json.assets.push({
					hash: assets[i].hash,
					name: assets[i].path,
					size: assets[i].size,
					pin: true,
					type: "ts"
				})
				if(!custom_json.Hash360){
					custom_json.Hash360 = assets[i].hash
				}
			}
		}
        hive.api.getContent('markegiles', 'dlux-vr-tutorial-sm-test', function(err, result) {
          result.json_metadata = JSON.stringify(custom_json)
      var target = document.getElementById('aframePreview').contentWindow
      var un = 'Guest'
      if(sessionStorage.getItem('user')){un = sessionStorage.getItem('user')}
      target.postMessage({
      'func': 'iAm',
      'message': un,
      }, "*");
      target.postMessage({
      'func': 'key',
      'message': 'markegiles/dlux-vr-tutorial-sm-test',
      }, "*");
      target.postMessage({
      'func': 'hiveState',
      'message': result,
      }, "*");
	  })
	  buildList()
	  }
	  function buildList (){
		  document.getElementById('listOfItems').innerHTML = ``
for(var i = 0; i < custom_json.assets.length; i++){
		const img = custom_json.assets[i]
		if(img.type == 'ts'){
		var btnclass = 'btn-primary'
		if(!img.pin){
			btnclass = 'btn-outline-primary'
		}
		var item = document.createElement('div')
		item.id = `item${i}`
		item.class = `p-3 mb-3 bg-dark`
		item.setAttribute('style', 'border-radius', '10px')
		item.innerHTML = `
		<div id="image${i}" class="p-3 mb-3 bg-dark" style="border-radius: 10px;">
				<div class="d-flex align-items-center flex-row pb-2 mb-2" style="border-bottom-style: solid; border-bottom-color: #909090">
					<div class="d-flex">
						<input id="image${i}Name" class="form-control form-control-sm mr-2" type="text" placeholder="Image Name" disabled>
						<button id="image${i}NameEdit" class="btn btn-secondary btn-sm ml-auto" data-toggle="tooltip" data-placement="top" title="Edit Image Name"><i class="fas fa-fw fa-pencil-alt"></i></button>
					</div>
					<div class="ml-auto">
						<button id="image${i}Pin" class="btn btn-primary btn-sm mr-2" data-toggle="tooltip" data-placement="top" title="Asset Pinned to IPFS"><i class="fas fa-fw fa-thumbtack"></i></button>
						<button id="image${i}Delete" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete Asset"><i class="fas fa-fw fa-trash-alt"></i></button>
					</div>
				</div>
			<div class="d-flex flex-row">
		  		<div>
						<div id="imageGraph${i}"><img id="image${i}Src" crossorigin="anonymous" src="https://ipfs.io/ipfs/${custom_json.assets[i].hash}" width="700"/></div>
						<div class="small"><a href="https://ipfs.io/ipfs/${custom_json.assets[i].hash}" id="image${i}SrcLnk" target="_blank">https://ipfs.io/ipfs/${custom_json.assets[i].hash}</a></div>
		  		</div>
			</div>
			<div class="pt-2 mb-3 text-left" style="border-bottom-style: solid; border-bottom-color: #909090">
				<h4>Link Hotspots <i class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Click and drag on the image to add a link hotspot."></i></h4>
			</div>
			<div id="listOfImage${i}Spots">
			</div>
		</div>
		`
		document.getElementById('listOfItems').appendChild(item)
		window[`image${i}SVG`] = new SVG(`imageGraph${i}`);
		programVars[`image${i}SVG`] = {
			rects: [],
  			in_shape: !1,
  			shape_selected: -1
		}
		window[`image${i}Src`] = document.getElementById(`image${i}Src`)
		window[`image${i}Src`].i = i 
		window[`image${i}Src`].onload = (function (i){return function() {
			const img = document.getElementById(`image${i}Src`)
			console.log({i}, img)
      		window[`image${i}SVG`].setAttribute("viewBox", "0 0 " + img.width + " " + img.height);
		}})(i);
		window[`image${i}SVG`].on(
  "mousedown",
  function(a) {
    deselect_shapes();
    rects.push([`image${i}SVG`].circle())
    programVars[`image${i}SVG`].in_shape = !0;
    r = rects[rects.length - 1];
    r.aid = rects.length - 1;
    "poly" == set_shape
      ? r.draw().opacity(".3")
      : r
          .draw(a)
          .fill("#333")
          .opacity(".3");
    r.draggable().on("dragmove", function(a) {
      generate_bodyVars();
    });
    r.on("drawstop", function() {
      console.log("drawstop");
      add_href_input(this);
    });
    r.on(
      "mousedown",
      function(a) {
        deselect_shapes();
        "poly" == set_shape
          ? this.selectize(!0, { deepSelect: !0, rotationPoint: !1 }).resize()
          : this.selectize(!0, { deepSelect: !1, rotationPoint: !1 }).resize();
        shape_selected = this.aid;
      },
      !1
    );
  },
  !1
);
window[`image${i}SVG`].on(
  "mouseup",
  function(a) {
    if ("poly" == set_shape) return !1;
    r = rects[rects.length - 1];
    r.draw("stop", a);
    programVars[`image${i}SVG`].in_shape = !1;
    if (0 == r.width() || 0 == r.height())
      console.log(
        "deleting empty shape ",
        r.attr("x"),
        r.attr("y"),
        r.width(),
        r.height()
      ),
        delete_shape(a, r.aid);
    generate_bodyVars();
  },
  !1
);
		for (k = 0; k < bodyVars[custom_json.assets[i].hash].links.length; k++){
			document.getElementById(`listOfImage${i}Spots`).appendChild(buildLinkList(i,k))
		}
	}
}
	  }

function deselect_shapes() {
	for (img in programVars){	
		if (-1 < programVars[img].shape_selected) {
			for (i = 0; i < programVars[img].rects.length; i++) programVars[img].rects[i].selectize(!1);
			programVars[img].shape_selected = -1;
		}
	}
}

function generate_bodyVars(){

}
	  function buildLinkList (i, k){
		var opts = ''
		for(var j = 0; j < custom_json.assets.length; j++){
			const img = custom_json.assets[j]
			if(img.type == 'ts' && i != j){
				opts += `<option>${img.name}</option>`
			}	
		}
		if(opts){
			var litem = document.createElement('div')
			litem.id = `image${i}Spot${k}`
			litem.innerHTML = `
				<div class="d-flex pb-3" style="border-bottom-style: solid; border-bottom-color: #909090">
					<input id="image${i}Spot${k}Name" class="form-control form-control-sm mr-2" type="text" placeholder="Link Name" disabled>
					<button id="image${i}Spot${k}NameEdit" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit Link Name"><i class="fas fa-fw fa-pencil-alt"></i></button>
					<select id="image${i}Spot${k}Link" class="form-control form-control-sm ml-5" type="text" placeholder="Link to Image" data-toggle="tooltip" data-placement="top" title="Select the image this hotspot links to.">
						${opts}
					</select>
					<button id="image${i}Spot${k}Delete" class="btn btn-danger btn-sm ml-2" data-toggle="tooltip" data-placement="top" title="Delete Link"><i class="fas fa-fw fa-trash-alt"></i></button>
				</div>
				`
			return litem
		}
	  }

	  function togglePin(hash){
		  for(var i = 0; i < custom_json.assets.length; i++){
			  const img = custom_json.assets[i]
			  if(img.hash == hash){
			  	if(img.pin){custom_json.assets[i].pin = false}
			  	else {custom_json.assets[i].pin = true}
			  }
		  }
		  buildList ()
	  }
	  function deleteImg(hash){
		  for(var i = 0; i < custom_json.assets.length; i++){
			  const img = custom_json.assets[i]
			  if(img.hash == hash){
				  custom_json.assets.splice(i,1)
			  }
		  }
		  delete bodyVars[hash]
		  iloaded()
	  }
	  function deleteLink(hash, link){
		  for(var i = 0; i < bodyVars[hash].length; i++){
			  if(bodyVars[hash].links[i].hash == link){
				  bodyVars[hash].links.splice(i,1)
				  break;
			  }
		  }
		  iloaded()
	  }
	  function nameLink(hash, link, name){
		  for(var i = 0; i < bodyVars[hash].length; i++){
			  if(bodyVars[hash].links[i].hash == link){
				  bodyVars[hash].links[i].text = name
				  break;
			  }
		  }
		  iloaded()
	  }
	  function posLink(hash, link, pos){
		  for(var i = 0; i < bodyVars[hash].length; i++){
			  if(bodyVars[hash].links[i].hash == link){
				  bodyVars[hash].links[i].pos = pos
				  break;
			  }
		  }
		  iloaded()
	  }
	  function toggleNameEdit(hash){
		  var enabled = document.getElementById(`nameOf${hash}`).disabled
		  document.getElementById(`nameOf${hash}`).disabled = !enabled
		  document.getElementById(`editName${hash}`).setAttribute('class', 'fas fa-fw fa-check')
		  console.log(enabled)
		  if(!enabled){
			  //document.getElementById(`editName${hash}`).addClass('fa-pencil-alt')
			  //document.getElementById(`editName${hash}`).removeClass('fa-check')
			  for(var i = 0; i < custom_json.assets.length; i++){
				const img = custom_json.assets[i]
				if(img.hash == hash){
					custom_json.assets[i].name = document.getElementById(`nameOf${hash}`).value
					break;
				}
			}
			//buildList()
			iloaded()
		  }
	  }
	function keyupwrap(){
		try{
			permlink()
		} catch (e){}
	}

	function permlink(text){
		if(text){
		text.replace(/[\W_]+/g, '-').replace(' ', '-').toLowerCase()
		text = text.replace(' ', '-')
			text = text.replace(/[\W_]+/g, '')
			text = text.toLowerCase()
		document.getElementById('permlink').innerText = `permlink: ${text}`
		permlink = text
		} else {
			text = document.getElementById('title').value
			text = text.replace(' ', '-')
			text = text.replace(/[\W_]+/g, '-')
			text = text.toLowerCase()
		document.getElementById('permlink').innerText = `permlink: ${text}`
		permlink = text
		}
	}

	if(sessionStorage.getItem('user')){document.getElementById('username').value = sessionStorage.getItem('user')}

	function post(){
		var tags = document.getElementById('tags').value.toLowerCase().split(',')
		custom_json.tags = ['dlux']
		for (i = 0; i < tags.length; i++){
			if(tags[i] != 'dlux'){
			custom_json.tags.push(tags[i].replace(/[\W_]+/g, '-'))
			}
		}
		console.log(custom_json.tags)
		if (sessionStorage.getItem('user')){
			const operations = [["comment", 
                                 {"parent_author": "", 
                                  "parent_permlink": "dlux", 
                                  "author": sessionStorage.getItem('user'), 
                                  "permlink": permlink, 
                                  "title": document.getElementById('title').value, 
                                  "body": simplemde.value() + `\n***\n#### [View in VR @ dlux.io](https://dlux.io/dlux/@${sessionStorage.getItem('user')}/${permlink})\n`, 
                                  "json_metadata": JSON.stringify(custom_json)}], 
                                ["comment_options", 
                                 {"author": sessionStorage.getItem('user'), 
                                  "permlink": permlink, 
                                  "max_accepted_payout": "1000000.000 HBD", 
                                  "percent_hbd": 10000, 
                                  "allow_votes": true, 
                                  "allow_curation_rewards": true, 
                                  "extensions": 
                                  [[0, 
                                    {"beneficiaries":
                                     [{"account":"dlux-io",
                                       "weight":1000}]}]]}]]
            hive_keychain.requestBroadcast(sessionStorage.getItem('user'), operations, 'active', function(response) {
              console.log(response);
            });
		} else {
			alert('Please Log In')
		}
	}
    </script>
</body></html>
