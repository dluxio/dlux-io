<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - New Node</title>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/header.php";
   include_once($path);
?>
<style>
	#img-well {
		border-style: solid;
		border-radius: 5px;
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
	<h1 class="p-5">DLUX 360° Image Gallery Builder</h1>
	<div class="d-flex flex-wrap justify-content-center">
	  <div class="flex-column mb-4">
		<div class="flex-row">
			<div id="img-well" class="border-danger alert-danger p-5">
				<h3>Drag and drop your images here</h3>
				<h6>.JPG, .JPEG, and .PNG up to 4096x2048 are supported</h6>
				<p>Click or tap to browse</p>
			</div>
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
		    <input type="text" class="form-control" id="title" placeholder="Enter an attention grabbing title">
			<small id="permlinkPreview" class="form-text text-muted d-flex"><span id="permlink" class="mr-auto">Permlink: build-permlink-here</span><a href="#" class="ml-auto">Edit Permlink</a></small>
	      </div>
		  <div class="form-group">
		    <label for="description">Description</label>
		    <textarea class="form-control" rows="2" id="validationCustomDescription" placeholder="Add a comment" required></textarea>
	      </div>
		  <div class="form-group">
		    <label for="title">Tags</label>
		    <input type="text" class="form-control" id="tags" placeholder="tags,look,like,this">
			<small id="tagsHelp" class="form-text text-muted">Add up to 4 tags, comma separated, no spaces</small>
	      </div>
		  <div class="text-center">
		    <button type="submit" class="btn btn-primary">Publish</button>
		  </div>
	    </form>
		</div>
      </div>
		<div id="listOfImgs" class="flex-column flex-shrink mx-3">
			<div id="item01 px-3 mb-3">
				<div class="d-flex align-items-center flex-row pb-2 mb-2" style="border-bottom-style: solid; border-bottom-color: #909090">
					<div style="font-size: 1.3em; font-weight: bold">Item01</div>
					<div class="ml-auto"><button class="btn btn-primary btn-sm mr-2"><i class="fas fa-fw fa-thumbtack"></i></button><button class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash-alt"></i></button></div>
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
		</div>
		</div>
	  <div class="flex-column flex-fill">
		<iframe id="aframePreview" src="https://lumbar-encouraging-snarl.glitch.me/post.html" width="100%" height="100%" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
      function updateVoteSubmit(id, val) {
        document.getElementById(id).innerHTML =
          document.getElementById(val).value + "%";
      }

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
      "Hash360": "QmeDDfa2QUUhuTvVJrEQNRNB1qBCJCjUKmx2enmVjLqP8H",
      "format": "markdown",
      "assets": [
         {
            "hash": "QmaQ2rrr7EV6VouPpb1Uvv5MTG716u8VW63kVBt9M3ozMB",
            "size": 29907,
            "pin": false
         }
      ],
      "tags": [
         "dlux"
      ],
      "vrHash": "QmaQ2rrr7EV6VouPpb1Uvv5MTG716u8VW63kVBt9M3ozMB"
   }
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
		console.log({assets, info})
		for (var i = 0; i < assets.length; i++){
			custom_json.assets.push({
				hash: assets[i].hash,
				name: assets[i].path,
				size: assets[i].size,
				pin: true,
				type: "ts",
				thumbHash: assets[i].hash
			})
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
		item.class = `px-3 mb-3`
		item.innerHTML = `<div class="d-flex align-items-center flex-row pb-2 mb-2" style="border-bottom-style: solid; border-bottom-color: #909090">
					<div style="font-size: 1.3em; font-weight: bold">${img.name}</div>
					<div class="ml-auto"><button class="btn ${btnclass} btn-sm mr-2" onclick="togglePin('${img.hash}')"><i class="fas fa-fw fa-thumbtack"></i></button><button class="btn btn-danger btn-sm" onclick="deleteImg('${img.hash}')"><i class="fas fa-fw fa-trash-alt"></i></button></div>
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
buildList ()
	  }
    </script>
</body></html>
