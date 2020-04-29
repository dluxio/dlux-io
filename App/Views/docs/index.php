<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - Documentation</title>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/header.php";
   include_once($path);
?>
<style>
.docs-nav {
  overflow-y: auto;
  padding: 1rem;
}
.docs-nav .section-title {
  font-size: 1rem;
  margin-bottom: 1rem;
}
.docs-nav .section-title a:hover {
  text-decoration: none;
}
.docs-nav .section-items {
  font-size: 0.875rem;
  position: relative;
}
.docs-nav .nav-item {
  margin-left: 2.5rem;
}
.docs-nav .nav-item.section-title {
  margin-left: 0;
}
.docs-nav .nav-item.section-title .nav-link {
  padding: 0;
}
.docs-nav .nav-item.section-title .nav-link:before {
  display: none;
}
.docs-nav .nav-link {
  display: inline-block;
  position: relative;
  padding: 0.5rem 1rem;
  color: #fff;
}
.docs-nav .nav-link .theme-icon-holder {
  font-size: 0.875rem;
  padding-top: 0.375rem;
}
.docs-nav .nav-link.active {
  color: #FB00FF;
}
.docs-nav .nav-link.active:before {
  background-color: #FB00FF;
}
.docs-nav .nav-link.active .theme-icon-holder {
  color: #fff;
  background: #FB00FF;
}
.docs-nav .nav-link:before {
  background-color: #f4fcf6;
  content: " ";
  display: inline-block;
  height: inherit;
  left: 0;
  margin-top: -0.5rem;
  position: absolute;
  width: 3px;
  height: 100%;
  border-radius: 1rem;
}    
</style>
</head>
<body>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/nav.php";
   include_once($path);
?>
<div class="container-fluid d-flex flex-column vh-100 overflow-hidden">
    <div class="row flex-grow-1 overflow-hidden" style="margin-top:60px;">
        <div class="col-lg-2 col-md-3 col-sm-4 mh-100 bg-darker overflow-auto py-2">
            <div class="top-search-box py-3">
                <form class="search-form">
		            <input type="text" placeholder="Search the docs..." name="search" class="form-control search-input">
		        </form>
            </div>
            <div class="container">
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">About</button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <ul>
                                    <li>Introduction</li>
                                    <li>FAQ</li>
                                    <li>Whitepaper</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingBuild">
                            <h5 class="mb-0 d-inline">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseBuild" aria-expanded="true" aria-controls="collapseBuild">Create</button>
                            </h5>
                        </div>
                        <div id="collapseBuild" class="collapse" aria-labelledby="headingBuild" data-parent="#accordion">
                            <div class="card-body" id="buildContainer">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="#" data-toggle="collapse" data-target="#collapseBuildInfo">Publishing Apps</a>
                                    </div>
                                    <div class="card-body collapse" data-parent="#buildContainer" id="collapseBuildInfo">
                                        <ul>
                                            <li>Supercraft VR</li>
                                            <li>VR Builder</li>
                                            <li>App Uploader</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a href="#" data-toggle="collapse" data-target="#collapseBuildAssets">Assets</a>
                                    </div>
                                    <div class="card-body collapse" data-parent="#buildContainer" id="collapseBuildAssets">
                                        <ul>
                                            <li>3D Models</li>
                                            <li>Images</li>
                                            <li>Text</li>
                                            <li>Shapes</li>
                                            <li>Audio</li>
                                            <li>Video</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a href="#" data-toggle="collapse" data-target="#collapseBuildComponents">XR Components</a>
                                    </div>
                                    <div class="card-body collapse" data-parent="#buildContainer" id="collapseBuildComponents">
                                        <ul>
                                            <li>Environment</li>
                                            <li>Collisions</li>
                                            <li>Physics</li>
                                            <li>Navmesh</li>
                                            <li>Player Rig</li>
                                            <li>Controls</li>
                                            <li>AR Marker</li>
                                            <li>UI Overlay</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">dlux Chain</button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                                <ul>
                                    <li>Token</li>
                                    <li>NFTs</li>
                                    <li>Nodes</li>
                                    <li>Exchange</li>
                                    <li>API</li>
                                    <li>Hive</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='col-lg-10 col-md-9 col-sm-8 mh-100 bg-light overflow-auto'>
            <div class='row flex-grow-1'>
                <div class="col mh-100 overflow-auto py-2">
                    <article class="docs-article" id="introduction">
                        <h3>Welcome to dlux! Start building anything.</h3>
                        <p>The goal of this project is to incentivize XR adoption in the best possible way we can imagine: open-source and on-chain.</p>
                        <p>The economics of this are possible. By combining WebVR, AR.js, and HIVE, we buildd a platform free for everyone to use that rewards good content with real cryptocurrency you can spend or transfer.</p>
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
<script>checkCookie();</script>
</body>
</html>