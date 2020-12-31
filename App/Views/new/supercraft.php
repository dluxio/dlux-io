<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - Create</title>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/header.php";
   include_once($path);
?>
<style>
  @charset "UTF-8";
.form-content {
    max-width: 500px;
}
.super-pink{
    color: #FA5BA7;
}
.hive-green {
    color: #23D199;
}
.form-layer {
	margin-top: 50px;
	margin-bottom: 50px;
}
.btn-primary {
	background-color: #2E8CEB;
}
.header-layer {
	background-color: #000000;
	padding-top: 50px;
	padding-bottom: 50px;
}
.header-content {
	max-width: 500px;
}
a {
	color: #2D8CEB;
}
p {
  color: #FFFFFF;
}
h1 {
	color: #FFFFFF;
	font-size: 6em;
}
h2 {
	color: #2D8CEB;
}
label {
  color: #C7C7C7;
}
body {
	display: flex;
  flex-direction: column;
  background-color: #2A2A2A;
}
.editor-toolbar {
  background-color: #C7C7C7;
}
.editor-toolbar a {
  color: #2A2A2A !important;
} 
.footer {
	width: 100%;
	background-color: #000000;
	color: white;
	text-align: center;
	padding-top: 10px;
}
.footer-content {
	padding-right: 20px;
	padding-left: 20px;
}
  </style>
<meta name="description" content="dlux xr account creation tool for onboarding new users into the Hive blockchain">
<script>
  var postKey; //this page will be posted in IPFS and will need a way to display current state about itself. This key will be passed to declare its current state on Hive.
  var permlink; //manage networked room conection
      // Define custom schema for syncing avatar color, set by random-color, non-secure username from blockchain onSceneLoad(username) ...  or user prompt
  var hasMemoKey = false;
  var iam = 'Guest'
  if (window.addEventListener) {
    window.addEventListener("message", onMessage, false);
    }
    else if (window.attachEvent) {
    window.attachEvent("onmessage", onMessage, false);
    }
    function onMessage(event) {
    //if (event.origin !== "https://dlux.io" || "localhost:3000") return;
    var data = event.data;
    if (typeof(window[data.func]) == "function") {
    window[data.func].call(null, data.message);
    }
    }
    function key (message) { //how this post finds itself on blockchain
      postKey = message;
      permlink = message.split('/');
      onSceneLoad(iam);
    }
  function onSceneLoad(msg) {
        if (iam == 'Guest'){
document.getElementById('submit-btn').innerHTML = `Sign In`
      } else {
document.getElementById('submit-btn').innerHTML = `Post as @${iam}`
    }
  }
  function sendLink(payload) {
    //  var link = document.querySelector('/@dlux-io').value //pass a string to escape the dlux.io iFrame. Domain level redirects are greatm external will recieve a warning.
    window.parent.postMessage({
    'func': 'sendLink',
    'message': payload
    }, "*");
    }
  function pageSpecific(usr) { //This is the unsecure identifier that returns logged in hive user
    User = usr
      iam = user;
    }
  function onpageloaded() { //requests hive state
      window.parent.postMessage({
      'func': 'iloaded',
      'message': ''
    }, "*");
    }
</script>
</head>

<body>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/nav.php";
   include_once($path);
?>
<div class="container-fluid header-layer">
	<div class="container header-content">
	  <h1 class="text-center">dlux</h1>
	  <h2 class="text-center">Supercraft VR Publishing</h2>
    <p class="text-center">First, use the <a href="https://supermedium.com/supercraft">Supercraft</a> tool in your VR web browser to create a virtual world saved to Supermedium.</p>
	  <p class="text-center">Then, add the site name and give your HIVE post a title, tags, and description.</p>
	</div>
</div>
<div class="container-fluid form-layer">
  <div class="container form-content">
	<form class="needs-validation" novalidate>
        <div class="container">
          <h2 class="super-pink">Supercraft</h2>
          <div class="form-group">
   			<label for="validationCustomLoader">Loader Name</label>
   				<input type="text" class="form-control" id="validationCustomLoader" placeholder="famed-examples" required>
			</div>
          <!--
          <div class="form-group">
            <label for="validationCustomVisualizer">Visualizer Name</label>
            <input type="text" class="form-control" id="validationCustomVisualizer" placeholder="Visualizer name from Supercraft" required>
            </div>-->
        </div>
		
        <div class="container">
          <h2 class="hive-green">Hive</h2>
          <div class="form-group">
    <label for="validationCustomTitle">Title</label>
    <input type="text" class="form-control" id="validationCustomTitle" placeholder="Give your post a title" required>
  </div>
          <div class="form-group">
            <label for="validationCustomDescription">Description</label>
            <textarea class="form-control" rows="3" id="validationCustomDescription" placeholder="Enter a description about your scene" required></textarea>
          </div>
          <div class="form-group">
            <label for="validationCustomTags">Tags (comma separated, no spaces) </label>
            <input type="text" class="form-control text-lowercase" id="validationCustomReferal" placeholder="Add up to 4 tags" required>
          </div>
      </div>
      <div class="container text-center">
        <button class="btn btn-primary" id="submit-btn" type="submit">Post as @username</button>
      </div>
    </form>

<script>
  var simplemde = new SimpleMDE({ element: document.getElementById('validationCustomDescription') });
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        console.log('button')
        if (document.getElementById('validationCustomDescription').innerHTML == 'Sign In'){sendLink('/auth')}
        var tagField = document.getElementById('validationCustomReferal').value
        var tags = tagField.split(',').map(item => item.trim())
        let otherTags = tags.slice(0, 4)
        var customJSON = JSON.stringify({
            tags: otherTags,
            subApp: 'SuperCraftLoader/v0.1',
            xr: false,
            vrHash: 'QmTzKnzxEm3ZXcqFMxytt3fnJZvSSvtRnMCZTuzzMxwG7y',
            superCraft: document.getElementById('validationCustomLoader').value
          })
        var postData = {
          title: document.getElementById('validationCustomTitle').value,
          message: document.getElementById('validationCustomDescription').value,
          customJSON: customJSON,
        }
            const operations = [["comment", 
                                 {"parent_author": "", 
                                  "parent_permlink": "dlux", 
                                  "author": user, 
                                  "permlink": `${user}-supercraft-${document.getElementById('validationCustomLoader').value}`, 
                                  "title": document.getElementById('validationCustomTitle').value, 
                                  "body": document.getElementById('validationCustomDescription').value + `\n***\n#### [View in VR @dlux-io](https://dlux.io/dlux/@${user}/${user}-supercraft-${document.getElementById('validationCustomLoader').value})\n`, 
                                  "json_metadata": customJSON}], 
                                ["comment_options", 
                                 {"author": user, 
                                  "permlink": `${user}-supercraft-${document.getElementById('validationCustomLoader').value}`, 
                                  "max_accepted_payout": "1000000.000 SBD", 
                                  "percent_hive_dollars": 10000, 
                                  "allow_votes": true, 
                                  "allow_curation_rewards": true, 
                                  "extensions": 
                                  [[0, 
                                    {"beneficiaries":
                                     [{"account":"dlux-io",
                                       "weight":1000}]}]]}]] 
        console.log(postData)
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        } else {
          hive_keychain.requestBroadcast(user, operations, 'active', function(response) {
              console.log(response);
            });
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
   onpageloaded()
</script>
	</div>
</div>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/footer.php";
   include_once($path);
?>
</body>
</html>