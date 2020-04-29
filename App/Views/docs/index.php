<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - Documentation</title>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/header.php";
   include_once($path);
?>
<script src="https://raw.githubusercontent.com/showdownjs/showdown/master/dist/showdown.min.js"></script>
</head>
<body>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/nav.php";
   include_once($path);
?>
<div class="container-fluid d-flex flex-column vh-100 overflow-hidden">
    <div class="row flex-grow-1 overflow-hidden" style="margin-top:60px;">
        <div class="col-2 mh-100 bg-darker overflow-auto py-2">
            <div class="top-search-box py-3">
                <form class="search-form">
		            <input type="text" placeholder="Search the docs..." name="search" class="form-control search-input">
		        </form>
            </div>
            <ul class="nav flex-column rounded">
                <li class="nav-item section-title"><a class="nav-link scrollto active" href="#section-1"><span class="theme-icon-holder mr-2"><i class="fas fa-map-signs"></i></span>Introduction</a></li>
                <li class="nav-item"><a class="nav-link scrollto text-white" href="#">Introduction</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scrollto text-white" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scrollto text-white" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scrollto text-white" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scrollto text-white" href="#">Link</a>
                </li>
            </ul>
        </div>
        <div class='col mh-100 bg-light overflow-auto'>
            <div class='row flex-grow-1'>
                <div class="col mh-100 overflow-auto py-2">
                    <article class="docs-article" id="introduction">
                        <h3>Welcome to dlux! Start building anything.</h3>
                        <p>The goal of this project is to incentivize XR adoption in the best possible way we can imagine: open-source and on-chain.</p>
                        <p>The economics of this are possible. By combining WebVR, AR.js, and HIVE, we created a platform free for everyone to use that rewards good content with real cryptocurrency you can spend or transfer.</p>
                        <p>We recognize that in order for vr to take off, its creation needs to reach a point of enabling everyone to participate, so we lowered the barrier to entry as far as we possibly could.</p>
                        <p>Remix our Glitch projects to immediately begin building experiences that earn you rewards by publishing to Steem. Experiences that run on nearly any device, computer, and head mounted display through the web browser.</p>
                        <p>Deploy your next game, video, or experience at no cost with no programming expertise. We'll show you how.</p>
                        <h5>We've made it easy to get up and running by integrating all the technical stuff so you can start creating right away!</h5>
                        <p>To fully utilize our platform, you must have a HIVE account. It can take some time for your account to activate, but you can start building apps immediately.</p>
					
			    </article>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>