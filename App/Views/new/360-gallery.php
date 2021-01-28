<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - 360° Image Gallery</title>
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
			}
	#img-well.drag {
		background: #8ED2C9;		
			}
</style>
<script src="../js/buffer.js"></script>
<script src="../js/drag-drop.js"></script>
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
	<div class="d-flex flex-wrap justify-content-center">
	  <div class="flex-column mb-4">
		<div class="flex-row py-2">
			<h1 class="px-4 font-weight-bold">DLUX 360°</h1>
			<h1 class="px-4 font-weight-bold" style="font-variant:small-caps;">Image Gallery Builder</h1>
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
		    <input type="text" class="form-control" id="title" onkeyup="permlink()" placeholder="Enter an attention grabbing title">
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
      </div>
		<div class="flex-column flex-shrink mx-3">
			<div id="img-well" class="border-danger alert-danger p-5 mb-3">
				<h3>Drag and drop your images here</h3>
				<h6>.JPG, .JPEG, and .PNG up to 4096x2048 are supported</h6>
				<a href="#" class="alert-link">Click or tap to browse</a>
			</div>
		<div id="listOfImgs" >
			<!--<div id="item01" class="p-3 mb-3 bg-dark" style="border-radius: 10px;">
				<div class="d-flex align-items-center flex-row pb-2 mb-2" style="border-bottom-style: solid; border-bottom-color: #909090">
					<div class="d-flex"><input class="form-control form-control-sm mr-2" type="text" placeholder="Item name" disabled><button class="btn btn-secondary btn-sm ml-auto" data-toggle="tooltip" data-placement="top" title="Edit Name"><i class="fas fa-fw fa-pencil-alt"></i></button></div>
					<div class="ml-auto"><button class="btn btn-primary btn-sm mr-2" data-toggle="tooltip" data-placement="top" title="Asset Pinned to IPFS"><i class="fas fa-fw fa-thumbtack"></i></button><button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete Asset"><i class="fas fa-fw fa-trash-alt"></i></button></div>
				</div>
				<div class="d-flex flex-row">
		  		<div id="source01" class="mr-3">
					<div><img id="sImg01" src="/img/equirectangular.jpeg" height="150"/></div>
					<div class="small"><a href="#" id="sHashImg01" target="_blank">Source</a></div>
		  		</div>
		  		<div id="thumb01">
					<div><img id="tImg01" src="/img/equirectangular_thumb.jpg" height="150"/></div>
					<div class="small"><a href="#" id="tHashImg01" target="_blank">Thumbnail</a></div>
		  		</div>
			</div>
		</div>-->
		</div>
			</div>
	  <div class="flex-column flex-fill">
		<iframe id="aframePreview" src="https://turnkey-360-gallery.glitch.me/post.html" width="100%" height="100%" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
	</div>
</main>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/footer.php";
   include_once($path);
?>
<script src="../js/img-ipfs.js"></script>
<script>
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
      "vrHash": "QmaQ2rrr7EV6VouPpb1Uvv5MTG716u8VW63kVBt9M3ozMB"
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
				custom_json.assets.push({
					hash: assets[i].hash,
					name: assets[i].path,
					size: assets[i].size,
					pin: true,
					type: "ts",
					thumbHash: assets[i].hash
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
		  document.getElementById('listOfImgs').innerHTML = ``
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
		item.innerHTML = `<div class="d-flex align-items-center flex-row pb-2 mb-2" style="border-bottom-style: solid; border-bottom-color: #909090">
					<div class="d-flex"><input id="nameOf${img.hash}" class="form-control form-control-sm mr-2" type="text" value="${img.name}" disabled><button onclick="toggleNameEdit('${img.hash}')" class="btn btn-secondary btn-sm ml-auto" data-toggle="tooltip" data-placement="top" title="Edit Name"><i id="editName${img.hash}" class="fas fa-fw fa-pencil-alt"></i></button></div>
					<div class="ml-auto"><button type="button" onclick="togglePin('${img.hash}')" class="btn ${btnclass} btn-sm mr-2" data-toggle="tooltip" data-placement="top" title="Asset Pinned to IPFS"><i class="fas fa-fw fa-thumbtack"></i></button><button class="btn btn-danger btn-sm" onclick="deleteImg('${img.hash}')" data-toggle="tooltip" data-placement="top" title="Delete Asset"><i class="fas fa-fw fa-trash-alt"></i></button></div>
				</div>
				<div class="d-flex flex-row">
		  		<div id="source${i}" class="mr-3">
					<div><img id="sImg${i}" src="https://ipfs.io/ipfs/${img.hash}" height="150"/></div>
					<div class="small"><a href="#" id="sHashImg${i}" target="_blank">Source</a></div>
		  		</div>
		  		<div id="thumb${i}">
					<div><img id="tImg${i}" src="https://ipfs.io/ipfs/${img.thumbHash}" height="150"/></div>
					<div class="small"><a href="#" id="tHashImg${i}" target="_blank">Thumbnail</a></div>
				  </div>`
		document.getElementById('listOfImgs').appendChild(item)
	}
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
		  //buildList ()
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
	function post(){

	}
	function permlink(text){
		if(text){
		text.replace(/[\W_]+/g, '-')
		document.getElementById(permlink).innerText = `permlink: ${text}`
		permlink = text
		} else {
			text = document.getElementById('title').value
			text.replace(/[\W_]+/g, '-')
		document.getElementById(permlink).innerText = `permlink: ${text}`
		permlink = text
		}
	}
	if(sessionStorage.getItem('user')){document.getElementById('username').value = sessionStorage.getItem('user')}

	function post(){
		var tags = document.getElementById('tags').value.toLowerCase().split(',')
		for (i = 0; i < tags.length; i++){
			custom_json.tags.push(tags[i].replace(/[\W_]+/g, '-'))
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
