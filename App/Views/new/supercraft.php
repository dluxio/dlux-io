<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>dlux Supercraft VR publishing</title>
<link href="../css/bootstrap-4.4.1.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/session.js"></script>
<script type="text/javascript" src="https://kit.fontawesome.com/0f693ffc58.js" crossorigin="anonymous"></script>


  <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">

<style>
  @charset "UTF-8";
.form-content {
    max-width: 500px;
}
.super-pink{
    color: #FA5BA7;
}
.steem-green {
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
  function iAm(message) { //This is the unsecure identifier that returns logged in hive user
    console.log({message})
      iam = message;
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
	<?php include '../modules/nav.php';?>
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
          <h2 class="steem-green">HIVE</h2>
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
            vrHash: 'QmYbyqtGKg5TYLmpLFs2Aqt3po4qQdhab29Xba7mkwNWYo',
            superCraft: document.getElementById('validationCustomLoader').value
          })
        var postData = {
          title: document.getElementById('validationCustomTitle').value,
          message: document.getElementById('validationCustomDescription').value,
          customJSON: customJSON,
        }
        console.log(postData)
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        } else {
          window.parent.postMessage({
            'func': 'advPost',
            'message': postData
          }, "*");
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
	
</body>
<footer class="footer">
  <div class="container footer-content">
    <p class="text-center">Join our <a href="https://discord.gg/Beeb38j">Discord server</a> to get in touch.</p>
  </div>
	  </footer>
</html>
	
<?php include '../modules/footer.php';?>
<script type="text/javascript" src="../js/popper.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-4.4.1.js"></script>
<script>checkCookie()</script>
</body>
</html>