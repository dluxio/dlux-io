<html lang="en">

<head>
    <title>dlux decentralized VR</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/showdown/1.8.6/showdown.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
    <script src="https://aframe.io/releases/1.1.0/aframe.min.js"></script>
    <script src="https://unpkg.com/aframe-look-at-component@0.7.0/dist/aframe-look-at-component.min.js"></script>
    <script src="https://unpkg.com/aframe-text-geometry-component@0.5.0/dist/aframe-text-geometry-component.min.js"></script>
    <script src="https://rawgit.com/feiss/aframe-environment-component/master/dist/aframe-environment-component.min.js"></script>
    <script src="https://rawgit.com/donmccurdy/aframe-extras/master/dist/aframe-extras.js"></script>
    <script src="https://rawgit.com/Ctrl-Alt-Zen/aframe-mobile-controls/master/components/twoway-motion/twoway-motion.js"></script>
    <script src="https://rawgit.com/fernandojsg/aframe-teleport-controls/master/dist/aframe-teleport-controls.min.js"></script>
    <script src="https://unpkg.com/aframe-state-component@3.4.0/dist/aframe-state-component.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@hiveio/hive-js/dist/hive.min.js"></script>
    <script src="https://rawgit.com/ngokevin/kframe/master/components/layout/dist/aframe-layout-component.js"></script>
    <script src="https://unpkg.com/aframe-template-component@3.x.x/dist/aframe-template-component.min.js"></script>
    <script src="/js/nav.js"></script>
    <?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/header.php";
   include_once($path);
?>
    
    <script>
        function popData () {<?php 
	if(isset($author)){
    	echo "setDiscussionsByBlog('" . $author . "');";
        }
		else{
        echo "setDiscussionsByBlog('robotolux');";
        }
;?>
        doOnLoad()
        }
    </script>
</head>

<body onload="popData()">
    <a-scene antialias="true">
        <!-- Asset Manager-->
        <a-assets><img id="nav-trending-icon" src="https://cdn.glitch.com/5ba0e9a1-e1be-470c-be6c-b6bd1b8e349e%2FFire_Emoji.png" crossorigin="anonymous" /><img id="nav-new-icon" src="https://cdn.glitch.com/5ba0e9a1-e1be-470c-be6c-b6bd1b8e349e%2Forange-new-512.gif" crossorigin="anonymous" /><img id="nav-random-icon" src="https://cdn.glitch.com/5ba0e9a1-e1be-470c-be6c-b6bd1b8e349e%2Fwhitedice.png" crossorigin="anonymous" /><img id="nav-browse-icon" src="https://cdn.glitch.com/5ba0e9a1-e1be-470c-be6c-b6bd1b8e349e%2F29506-200.png" crossorigin="anonymous" /><img id="nav-create-icon" src="https://cdn.glitch.com/5ba0e9a1-e1be-470c-be6c-b6bd1b8e349e%2Fdocument.png" crossorigin="anonymous" /><img id="nav-hive-icon" src="https://cdn.glitch.com/5ba0e9a1-e1be-470c-be6c-b6bd1b8e349e%2Fhive-coin.png" crossorigin="anonymous" /><img id="nav-profile-icon" src="https://cdn.glitch.com/5ba0e9a1-e1be-470c-be6c-b6bd1b8e349e%2Fmarkegiles.jpg" crossorigin="anonymous" /><img id="greeter-pic-photo" src="https://cdn.glitch.com/5ba0e9a1-e1be-470c-be6c-b6bd1b8e349e%2Frobotolux.png" crossorigin="anonymous" /><img id="voteButtonPic" src="https://cdn.glitch.com/5ba0e9a1-e1be-470c-be6c-b6bd1b8e349e%2Fupvote.png?1528448497979" crossorigin="anonymous" />
            <a-assets-item id="obfont" src="https://rawgit.com/mrdoob/three.js/dev/examples/fonts/optimer_bold.typeface.json"></a-assets-item><template id="hand-template"><a-entity><a-box scale="0.1 0.1 0.1"></a-box></a-entity></template></a-assets>
        <!-- DLUX-->
        <a-entity id="dlux-container" look-at="[camera]" position="0 1.6 -14">
            <!-- DLUX Navigation-->
            <a-entity id="nav" position="0 9 1" scale="2 2 2">
                <a-entity id="nav-trending" trending="" geometry="primitive:plane" material="side:double;src:#nav-trending-icon;transparent:true;alphaTest:0.32" position="-3.2 0 0"></a-entity>
                <a-entity id="nav-new" new="" geometry="primitive:plane" material="side:double;src:#nav-new-icon;transparent:true;alphaTest:0.5" position="-1.6 0 0"></a-entity>
                <a-entity id="nav-random" url="https://otolux.la" geometry="primitive:plane" material="side:double;src:#nav-random-icon;transparent:true;alphaTest:0.5" position="0 0 0"></a-entity>
                <!-- Browse button 0.325 spacing-->
                <a-entity id="nav-browse" show-menu="" geometry="primitive:plane" material="side:double;src:#nav-browse-icon;transparent:true;alphaTest:0.5" position="1.6 0 0">
                    <a-entity class="hiddenMenu" id="nav-browse-items" position="0 -.5 0" visible="false">
                        <a-entity geometry="primitive:plane;height:1;width:3" material="opacity:0;depthWrite:false" position="0 0 0"></a-entity>
                        <a-entity id="browse-hr" geometry="primitive:plane;height:.1;width:3" material="side:double;color:#9100b5" position="0 -.25 0"></a-entity>
                        <a-entity id="browse-videos" geometry="primitive:plane;height:.6;width:3" material="side:double;color:#4C4C4C;" position="0 -.6 0" url="/feed/videos">
                            <a-entity id="browse-videos-text" text="value:Videos;width: 9; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: center; color:;" material="color:#FFF" position="-1.3 0 0.1" scale="1 1 .01"></a-entity>
                        </a-entity>
                        <a-entity class="hr" geometry="primitive:plane;height:.05;width:3" material="side:double;color:#7F7F7F;" position="0 -.925 0"></a-entity>
                        <a-entity id="browse-games" geometry="primitive:plane;height:.6;width:3" material="side:double;color:#4C4C4C;" position="0 -1.25 0" url="/feed/games">
                            <a-entity id="browse-games-text" text="value:Games;width: 9; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: center; color:;" material="color:#FFF" position="-1.3 0 0.1" scale="1 1 .01"></a-entity>
                        </a-entity>
                        <a-entity class="hr" geometry="primitive:plane;height:.05;width:3" material="side:double;color:#7F7F7F;" position="0 -1.575 0"></a-entity>
                        <a-entity id="browse-apps" geometry="primitive:plane;height:.6;width:3" material="side:double;color:#4C4C4C;" position="0 -1.9 0" url="/feed/apps">
                            <a-entity id="browse-apps-text" text="value:Apps;width: 9; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: center; color:;" material="color:#FFF" position="-1.3 0 0.1" scale="1 1 .01"></a-entity>
                        </a-entity>
                        <a-entity class="hr" geometry="primitive:plane;height:.05;width:3" material="side:double;color:#7F7F7F;" position="0 -2.225 0"></a-entity>
                        <a-entity id="browse-art" geometry="primitive:plane;height:.6;width:3" material="side:double;color:#4C4C4C;" position="0 -2.550 0" url="/feed/art">
                            <a-entity id="browse-art-text" text="value:Art;width: 9; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: center; color:;" material="color:#FFF" position="-1.3 0 0.1" scale="1 1 .01"></a-entity>
                        </a-entity>
                        <a-entity class="hr" geometry="primitive:plane;height:.05;width:3" material="side:double;color:#7F7F7F;" position="0 -2.875 0"></a-entity>
                        <a-entity id="browse-education" geometry="primitive:plane;height:.6;width:3" material="side:double;color:#4C4C4C;" position="0 -3.2 0" url="/feed/eductation">
                            <a-entity id="browse-education-text" text="value:Education;width: 9; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: center; color:;" material="color:#FFF" position="-1.3 0 0.1" scale="1 1 .01"></a-entity>
                        </a-entity>
                    </a-entity>
                </a-entity>
                <a-entity id="nav-hive" show-menu="" geometry="primitive:circle;radius:.5" material="side:double;src:#nav-hive-icon" position="3.2 0 0">
                    <a-entity class="hiddenMenu" id="nav-hive-items" position="0 -.5 0" visible="false">
                        <a-entity geometry="primitive:plane;height:1;width:3" material="opacity:0;depthWrite:false" position="0 0 0"></a-entity>
                        <a-entity id="hive-hr" geometry="primitive:plane;height:.1;width:3" material="side:double;color:#1b5199" position="0 -.25 0"></a-entity>
                        <a-entity id="hive-login" geometry="primitive:plane;height:.6;width:3" material="side:double;color:#4C4C4C;" position="0 -.6 0" url="/auth">
                            <a-entity id="hive-login-text" text="value:Login;width: 9; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: center; color:;" material="color:#FFF" position="-1.3 0 0.1" scale="1 1 .01"></a-entity>
                        </a-entity>
                        <a-entity class="hr" geometry="primitive:plane;height:.05;width:3" material="side:double;color:#7F7F7F;" position="0 -.925 0"></a-entity>
                        <a-entity id="join-hive" geometry="primitive:plane;height:.6;width:3" material="side:double;color:#4C4C4C;" position="0 -1.25 0" url="https://signup.hiveit.com">
                            <a-entity id="join-hive-text" text="value:Join Hive;width: 9; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: center; color:;" material="color:#FFF" position="-1.3 0 0.1" scale="1 1 .01"></a-entity>
                        </a-entity>
                    </a-entity>
                </a-entity>
            </a-entity>
            <a-entity id="greeting" geometry="primitive:plane;width:18;height:6.5" material="side:double;color:#4C4C4C;opacity:0.7" position="0 3.5 0" scale=".7 .7 .7" rotation="">
                <a-entity id="greeter-pic" geometry="primitive:circle" crossorigin="anonymous" material="side:double;src:#greeter-pic-photo" position="-9 3.25 0.1" scale="2 2 2" do-on-assetsload="#user"></a-entity>
                <a-entity id="greeter-name" text="value:@robotolux; width: 7; wrapCount: 17; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:;" position="-6.47 1.23 0.1" rotation="" scale="2 2 0.01" material=""></a-entity>
                <a-entity id="greeter-pinned-post" text="value:Welcome to dlux, sign in with Hive to start building.;width: 8.5; wrapCount: 32.5; lineHeight: 60; letterSpacing: 5; anchor: left; baseline: bottom; color:;" position="-7.6 -2.06 0.1" rotation="" scale="2 2 0.01" material=""></a-entity>
            </a-entity>
        </a-entity>
        <!-- DLUX Spotlight-->
        <a-entity id="spot-light" light="angle:35;intensity:0.2;type:spot" position="0 8.5 31" rotation="-10.5 0 0"></a-entity>
        <!-- Environment-->
        <a-entity environment="preset: forest"></a-entity>
        <a-entity id="ambient-light" light="type:ambient;intensity:0.5"></a-entity>
        <!-- Camera-->
        <a-entity id="player" movement-controls="speed: 0.1;" position="0 0 0">
            <a-camera id="head" set-camera="" look-controls="pointerLockEnabled: true" position="0 1.6 0">
                <a-cursor id="myCursor"></a-cursor>
            </a-camera>
        </a-entity>
        <!-- Portals-->
        <a-entity id="portalsHolder" position="1 1.6 -1" rotation="0 58 0" layout="type: circle; radius: 10;angle: 14.5;plane:xz">
            <a-entity class="poster-image" bind__visible="p1.visible" visible="" bind__material.src="p1.Hash360" material="side:double;src:" show-info="" geometry="primitive:sphere" crossorigin="anonymous" position="0 0 0" rotation="0 180 0" scale="1 1 1">
                <a-sphere bind__url="p1.postUrl" url="" opacity="0" scale="1.001 1.001 1.001"></a-sphere>
                <a-entity look-at="[camera]">
                    <a-plane class="voteButton" bind__vote="p1.postUrl" vote="" position="-1.25 0 .5" depth="0.5" width="0.5" material="side:double;src:#voteButtonPic;transparent:true;alphaTest:0.82"></a-plane>
                </a-entity>
                <a-entity class="hidebutton" look-at="[camera]" visible="false" position="0 1.2 0">
                    <a-entity class="col-1" position="0 3.6 0">
                        <a-entity class="r1-title" geometry="primitive:plane;width:6;height:1" material="side:double;color:#16398D;opacity:0.7" position="0 0.5 0">
                            <a-entity class="title-text" bind__text.value="p1.title" text="width: 6; wrapCount: 28; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="-2.765 -0.381 0.199" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r2-author" geometry="primitive:plane;width:6;height:1" material="side:double;color:#25D193;opacity:0.7" position="0 -0.5 0" rotation="0 0 0" url="/@${author}">
                            <a-entity class="author-pic" geometry="primitive:circle;radius:0.45" material="side:double;src:" bind__material.src="authorImage" crossorigin="anonymous" position="-2.34 0 0.1" scale="1 1 1"></a-entity>
                            <a-entity class="username" bind__text.value="p1.author" text="width: 3.7; wrapCount: 21; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: center; color:black; value:;" position="-1.627 .025 0.207" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="rep" bind__text.value="p1.rep" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:black; value:;" position="2.194796349166291 -0.12506570270188472 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r3-body" geometry="primitive:plane;width:6;height:2" material="side:double;opacity:0.7" position="0 -2 0">
                            <a-entity class="body-text" bind__text.value="p1.body" text="width: 5.8; wrapCount: 40; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: top; color: black; value:;" position="-2.884 .804 0.147" rotation="" scale="1 1 .01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r4-voting" geometry="primitive:plane;width:6;height:1" material="side:double;color:#999999;opacity:0.7" position="0 -3.5 0">
                            <a-entity class="value" bind__text.value="p1.votesVal" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="1.385 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="value" bind__text.value="p1.votesNum" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="0.25 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                    </a-entity>
                </a-entity>
            </a-entity>
            <a-entity class="poster-image" bind__visible="p2.visible" visible="" bind__material.src="p2.Hash360" material="side:double;src:" show-info="" geometry="primitive:sphere" crossorigin="anonymous" position="0 0 0" rotation="0 180 0" scale="1 1 1">
                <a-sphere bind__url="p2.postUrl" url="" opacity="0" scale="1.001 1.001 1.001"></a-sphere>
                <a-entity look-at="[camera]">
                    <a-plane class="voteButton" bind__vote="p2.postUrl" vote="" position="-1.25 0 .5" depth="0.5" width="0.5" material="side:double;src:#voteButtonPic;transparent:true;alphaTest:0.82"></a-plane>
                </a-entity>
                <a-entity class="hidebutton" look-at="[camera]" visible="false" position="0 1.2 0">
                    <a-entity class="col-1" position="0 3.6 0">
                        <a-entity class="r1-title" geometry="primitive:plane;width:6;height:1" material="side:double;color:#16398D;opacity:0.7" position="0 0.5 0">
                            <a-entity class="title-text" bind__text.value="p2.title" text="width: 6; wrapCount: 28; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="-2.765 -0.381 0.199" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r2-author" geometry="primitive:plane;width:6;height:1" material="side:double;color:#25D193;opacity:0.7" position="0 -0.5 0" rotation="0 0 0" url="/@${author}">
                            <a-entity class="author-pic" geometry="primitive:circle;radius:0.45" material="side:double;src:" bind__material.src="authorImage" crossorigin="anonymous" position="-2.34 0 0.1" scale="1 1 1"></a-entity>
                            <a-entity class="username" bind__text.value="p2.author" text="width: 3.7; wrapCount: 21; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: center; color:black; value:;" position="-1.627 .025 0.207" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="rep" bind__text.value="p2.rep" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:black; value:;" position="2.194796349166291 -0.12506570270188472 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r3-body" geometry="primitive:plane;width:6;height:2" material="side:double;opacity:0.7" position="0 -2 0">
                            <a-entity class="body-text" bind__text.value="p2.body" text="width: 5.8; wrapCount: 40; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: top; color: black; value:;" position="-2.884 .804 0.147" rotation="" scale="1 1 .01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r4-voting" geometry="primitive:plane;width:6;height:1" material="side:double;color:#999999;opacity:0.7" position="0 -3.5 0">
                            <a-entity class="value" bind__text.value="p2.votesVal" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="1.385 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="value" bind__text.value="p2.votesNum" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="0.25 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                    </a-entity>
                </a-entity>
            </a-entity>
            <a-entity class="poster-image" bind__visible="p3.visible" visible="" bind__material.src="p3.Hash360" material="side:double;src:" show-info="" geometry="primitive:sphere" crossorigin="anonymous" position="0 0 0" rotation="0 180 0" scale="1 1 1">
                <a-sphere bind__url="p3.postUrl" url="" opacity="0" scale="1.001 1.001 1.001"></a-sphere>
                <a-entity look-at="[camera]">
                    <a-plane class="voteButton" bind__vote="p3.postUrl" vote="" position="-1.25 0 .5" depth="0.5" width="0.5" material="side:double;src:#voteButtonPic;transparent:true;alphaTest:0.82"></a-plane>
                </a-entity>
                <a-entity class="hidebutton" look-at="[camera]" visible="false" position="0 1.2 0">
                    <a-entity class="col-1" position="0 3.6 0">
                        <a-entity class="r1-title" geometry="primitive:plane;width:6;height:1" material="side:double;color:#16398D;opacity:0.7" position="0 0.5 0">
                            <a-entity class="title-text" bind__text.value="p3.title" text="width: 6; wrapCount: 28; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="-2.765 -0.381 0.199" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r2-author" geometry="primitive:plane;width:6;height:1" material="side:double;color:#25D193;opacity:0.7" position="0 -0.5 0" rotation="0 0 0" url="/@${author}">
                            <a-entity class="author-pic" geometry="primitive:circle;radius:0.45" material="side:double;src:" bind__material.src="authorImage" crossorigin="anonymous" position="-2.34 0 0.1" scale="1 1 1"></a-entity>
                            <a-entity class="username" bind__text.value="p3.author" text="width: 3.7; wrapCount: 21; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: center; color:black; value:;" position="-1.627 .025 0.207" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="rep" bind__text.value="p3.rep" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:black; value:;" position="2.194796349166291 -0.12506570270188472 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r3-body" geometry="primitive:plane;width:6;height:2" material="side:double;opacity:0.7" position="0 -2 0">
                            <a-entity class="body-text" bind__text.value="p3.body" text="width: 5.8; wrapCount: 40; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: top; color: black; value:;" position="-2.884 .804 0.147" rotation="" scale="1 1 .01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r4-voting" geometry="primitive:plane;width:6;height:1" material="side:double;color:#999999;opacity:0.7" position="0 -3.5 0">
                            <a-entity class="value" bind__text.value="p3.votesVal" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="1.385 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="value" bind__text.value="p3.votesNum" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="0.25 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                    </a-entity>
                </a-entity>
            </a-entity>
            <a-entity class="poster-image" bind__visible="p4.visible" visible="" bind__material.src="p4.Hash360" material="side:double;src:" show-info="" geometry="primitive:sphere" crossorigin="anonymous" position="0 0 0" rotation="0 180 0" scale="1 1 1">
                <a-sphere bind__url="p4.postUrl" url="" opacity="0" scale="1.001 1.001 1.001"></a-sphere>
                <a-entity look-at="[camera]">
                    <a-plane class="voteButton" bind__vote="p4.postUrl" vote="" position="-1.25 0 .5" depth="0.5" width="0.5" material="side:double;src:#voteButtonPic;transparent:true;alphaTest:0.82"></a-plane>
                </a-entity>
                <a-entity class="hidebutton" look-at="[camera]" visible="false" position="0 1.2 0">
                    <a-entity class="col-1" position="0 3.6 0">
                        <a-entity class="r1-title" geometry="primitive:plane;width:6;height:1" material="side:double;color:#16398D;opacity:0.7" position="0 0.5 0">
                            <a-entity class="title-text" bind__text.value="p4.title" text="width: 6; wrapCount: 28; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="-2.765 -0.381 0.199" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r2-author" geometry="primitive:plane;width:6;height:1" material="side:double;color:#25D193;opacity:0.7" position="0 -0.5 0" rotation="0 0 0" url="/@${author}">
                            <a-entity class="author-pic" geometry="primitive:circle;radius:0.45" material="side:double;src:" bind__material.src="authorImage" crossorigin="anonymous" position="-2.34 0 0.1" scale="1 1 1"></a-entity>
                            <a-entity class="username" bind__text.value="p4.author" text="width: 3.7; wrapCount: 21; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: center; color:black; value:;" position="-1.627 .025 0.207" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="rep" bind__text.value="p4.rep" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:black; value:;" position="2.194796349166291 -0.12506570270188472 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r3-body" geometry="primitive:plane;width:6;height:2" material="side:double;opacity:0.7" position="0 -2 0">
                            <a-entity class="body-text" bind__text.value="p4.body" text="width: 5.8; wrapCount: 40; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: top; color: black; value:;" position="-2.884 .804 0.147" rotation="" scale="1 1 .01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r4-voting" geometry="primitive:plane;width:6;height:1" material="side:double;color:#999999;opacity:0.7" position="0 -3.5 0">
                            <a-entity class="value" bind__text.value="p4.votesVal" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="1.385 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="value" bind__text.value="p4.votesNum" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="0.25 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                    </a-entity>
                </a-entity>
            </a-entity>
            <a-entity class="poster-image" bind__visible="p5.visible" visible="" bind__material.src="p5.Hash360" material="side:double;src:" show-info="" geometry="primitive:sphere" crossorigin="anonymous" position="0 0 0" rotation="0 180 0" scale="1 1 1">
                <a-sphere bind__url="p5.postUrl" url="" opacity="0" scale="1.001 1.001 1.001"></a-sphere>
                <a-entity look-at="[camera]">
                    <a-plane class="voteButton" bind__vote="p5.postUrl" vote="" position="-1.25 0 .5" depth="0.5" width="0.5" material="side:double;src:#voteButtonPic;transparent:true;alphaTest:0.82"></a-plane>
                </a-entity>
                <a-entity class="hidebutton" look-at="[camera]" visible="false" position="0 1.2 0">
                    <a-entity class="col-1" position="0 3.6 0">
                        <a-entity class="r1-title" geometry="primitive:plane;width:6;height:1" material="side:double;color:#16398D;opacity:0.7" position="0 0.5 0">
                            <a-entity class="title-text" bind__text.value="p5.title" text="width: 6; wrapCount: 28; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="-2.765 -0.381 0.199" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r2-author" geometry="primitive:plane;width:6;height:1" material="side:double;color:#25D193;opacity:0.7" position="0 -0.5 0" rotation="0 0 0" url="/@${author}">
                            <a-entity class="author-pic" geometry="primitive:circle;radius:0.45" material="side:double;src:" bind__material.src="authorImage" crossorigin="anonymous" position="-2.34 0 0.1" scale="1 1 1"></a-entity>
                            <a-entity class="username" bind__text.value="p5.author" text="width: 3.7; wrapCount: 21; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: center; color:black; value:;" position="-1.627 .025 0.207" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="rep" bind__text.value="p5.rep" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:black; value:;" position="2.194796349166291 -0.12506570270188472 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r3-body" geometry="primitive:plane;width:6;height:2" material="side:double;opacity:0.7" position="0 -2 0">
                            <a-entity class="body-text" bind__text.value="p5.body" text="width: 5.8; wrapCount: 40; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: top; color: black; value:;" position="-2.884 .804 0.147" rotation="" scale="1 1 .01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r4-voting" geometry="primitive:plane;width:6;height:1" material="side:double;color:#999999;opacity:0.7" position="0 -3.5 0">
                            <a-entity class="value" bind__text.value="p5.votesVal" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="1.385 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="value" bind__text.value="p5.votesNum" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="0.25 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                    </a-entity>
                </a-entity>
            </a-entity>
            <a-entity class="poster-image" bind__visible="p6.visible" visible="" bind__material.src="p6.Hash360" material="side:double;src:" show-info="" geometry="primitive:sphere" crossorigin="anonymous" position="0 0 0" rotation="0 180 0" scale="1 1 1">
                <a-sphere bind__url="p6.postUrl" url="" opacity="0" scale="1.001 1.001 1.001"></a-sphere>
                <a-entity look-at="[camera]">
                    <a-plane class="voteButton" bind__vote="p6.postUrl" vote="" position="-1.25 0 .5" depth="0.5" width="0.5" material="side:double;src:#voteButtonPic;transparent:true;alphaTest:0.82"></a-plane>
                </a-entity>
                <a-entity class="hidebutton" look-at="[camera]" visible="false" position="0 1.2 0">
                    <a-entity class="col-1" position="0 3.6 0">
                        <a-entity class="r1-title" geometry="primitive:plane;width:6;height:1" material="side:double;color:#16398D;opacity:0.7" position="0 0.5 0">
                            <a-entity class="title-text" bind__text.value="p6.title" text="width: 6; wrapCount: 28; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="-2.765 -0.381 0.199" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r2-author" geometry="primitive:plane;width:6;height:1" material="side:double;color:#25D193;opacity:0.7" position="0 -0.5 0" rotation="0 0 0" url="/@${author}">
                            <a-entity class="author-pic" geometry="primitive:circle;radius:0.45" material="side:double;src:" bind__material.src="authorImage" crossorigin="anonymous" position="-2.34 0 0.1" scale="1 1 1"></a-entity>
                            <a-entity class="username" bind__text.value="p6.author" text="width: 3.7; wrapCount: 21; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: center; color:black; value:;" position="-1.627 .025 0.207" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="rep" bind__text.value="p6.rep" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:black; value:;" position="2.194796349166291 -0.12506570270188472 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r3-body" geometry="primitive:plane;width:6;height:2" material="side:double;opacity:0.7" position="0 -2 0">
                            <a-entity class="body-text" bind__text.value="p6.body" text="width: 5.8; wrapCount: 40; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: top; color: black; value:;" position="-2.884 .804 0.147" rotation="" scale="1 1 .01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r4-voting" geometry="primitive:plane;width:6;height:1" material="side:double;color:#999999;opacity:0.7" position="0 -3.5 0">
                            <a-entity class="value" bind__text.value="p6.votesVal" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="1.385 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="value" bind__text.value="p6.votesNum" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="0.25 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                    </a-entity>
                </a-entity>
            </a-entity>
            <a-entity class="poster-image" bind__visible="p7.visible" visible="" bind__material.src="p7.Hash360" material="side:double;src:" show-info="" geometry="primitive:sphere" crossorigin="anonymous" position="0 0 0" rotation="0 180 0" scale="1 1 1">
                <a-sphere bind__url="p7.postUrl" url="" opacity="0" scale="1.001 1.001 1.001"></a-sphere>
                <a-entity look-at="[camera]">
                    <a-plane class="voteButton" bind__vote="p7.postUrl" vote="" position="-1.25 0 .5" depth="0.5" width="0.5" material="side:double;src:#voteButtonPic;transparent:true;alphaTest:0.82"></a-plane>
                </a-entity>
                <a-entity class="hidebutton" look-at="[camera]" visible="false" position="0 1.2 0">
                    <a-entity class="col-1" position="0 3.6 0">
                        <a-entity class="r1-title" geometry="primitive:plane;width:6;height:1" material="side:double;color:#16398D;opacity:0.7" position="0 0.5 0">
                            <a-entity class="title-text" bind__text.value="p7.title" text="width: 6; wrapCount: 28; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="-2.765 -0.381 0.199" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r2-author" geometry="primitive:plane;width:6;height:1" material="side:double;color:#25D193;opacity:0.7" position="0 -0.5 0" rotation="0 0 0" url="/@${author}">
                            <a-entity class="author-pic" geometry="primitive:circle;radius:0.45" material="side:double;src:" bind__material.src="authorImage" crossorigin="anonymous" position="-2.34 0 0.1" scale="1 1 1"></a-entity>
                            <a-entity class="username" bind__text.value="p7.author" text="width: 3.7; wrapCount: 21; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: center; color:black; value:;" position="-1.627 .025 0.207" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="rep" bind__text.value="p7.rep" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:black; value:;" position="2.194796349166291 -0.12506570270188472 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r3-body" geometry="primitive:plane;width:6;height:2" material="side:double;opacity:0.7" position="0 -2 0">
                            <a-entity class="body-text" bind__text.value="p7.body" text="width: 5.8; wrapCount: 40; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: top; color: black; value:;" position="-2.884 .804 0.147" rotation="" scale="1 1 .01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r4-voting" geometry="primitive:plane;width:6;height:1" material="side:double;color:#999999;opacity:0.7" position="0 -3.5 0">
                            <a-entity class="value" bind__text.value="p7.votesVal" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="1.385 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="value" bind__text.value="p7.votesNum" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="0.25 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                    </a-entity>
                </a-entity>
            </a-entity>
            <a-entity class="poster-image" bind__visible="p8.visible" visible="" bind__material.src="p8.Hash360" material="side:double;src:" show-info="" geometry="primitive:sphere" crossorigin="anonymous" position="0 0 0" rotation="0 180 0" scale="1 1 1">
                <a-sphere bind__url="p8.postUrl" url="" opacity="0" scale="1.001 1.001 1.001"></a-sphere>
                <a-entity look-at="[camera]">
                    <a-plane class="voteButton" bind__vote="p8.postUrl" vote="" position="-1.25 0 .5" depth="0.5" width="0.5" material="side:double;src:#voteButtonPic;transparent:true;alphaTest:0.82"></a-plane>
                </a-entity>
                <a-entity class="hidebutton" look-at="[camera]" visible="false" position="0 1.2 0">
                    <a-entity class="col-1" position="0 3.6 0">
                        <a-entity class="r1-title" geometry="primitive:plane;width:6;height:1" material="side:double;color:#16398D;opacity:0.7" position="0 0.5 0">
                            <a-entity class="title-text" bind__text.value="p8.title" text="width: 6; wrapCount: 28; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="-2.765 -0.381 0.199" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r2-author" geometry="primitive:plane;width:6;height:1" material="side:double;color:#25D193;opacity:0.7" position="0 -0.5 0" rotation="0 0 0" url="/@${author}">
                            <a-entity class="author-pic" geometry="primitive:circle;radius:0.45" material="side:double;src:" bind__material.src="authorImage" crossorigin="anonymous" position="-2.34 0 0.1" scale="1 1 1"></a-entity>
                            <a-entity class="username" bind__text.value="p8.author" text="width: 3.7; wrapCount: 21; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: center; color:black; value:;" position="-1.627 .025 0.207" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="rep" bind__text.value="p8.rep" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:black; value:;" position="2.194796349166291 -0.12506570270188472 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r3-body" geometry="primitive:plane;width:6;height:2" material="side:double;opacity:0.7" position="0 -2 0">
                            <a-entity class="body-text" bind__text.value="p8.body" text="width: 5.8; wrapCount: 40; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: top; color: black; value:;" position="-2.884 .804 0.147" rotation="" scale="1 1 .01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r4-voting" geometry="primitive:plane;width:6;height:1" material="side:double;color:#999999;opacity:0.7" position="0 -3.5 0">
                            <a-entity class="value" bind__text.value="p8.votesVal" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="1.385 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="value" bind__text.value="p8.votesNum" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="0.25 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                    </a-entity>
                </a-entity>
            </a-entity>
            <a-entity class="poster-image" bind__visible="p8.visible" visible="" bind__material.src="p8.Hash360" material="side:double;src:" show-info="" geometry="primitive:sphere" crossorigin="anonymous" position="0 0 0" rotation="0 180 0" scale="1 1 1">
                <a-sphere bind__url="p8.postUrl" url="" opacity="0" scale="1.001 1.001 1.001"></a-sphere>
                <a-entity look-at="[camera]">
                    <a-plane class="voteButton" bind__vote="p8.postUrl" vote="" position="-1.25 0 .5" depth="0.5" width="0.5" material="side:double;src:#voteButtonPic;transparent:true;alphaTest:0.82"></a-plane>
                </a-entity>
                <a-entity class="hidebutton" look-at="[camera]" visible="false" position="0 1.2 0">
                    <a-entity class="col-1" position="0 3.6 0">
                        <a-entity class="r1-title" geometry="primitive:plane;width:6;height:1" material="side:double;color:#16398D;opacity:0.7" position="0 0.5 0">
                            <a-entity class="title-text" bind__text.value="p8.title" text="width: 6; wrapCount: 28; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="-2.765 -0.381 0.199" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r2-author" geometry="primitive:plane;width:6;height:1" material="side:double;color:#25D193;opacity:0.7" position="0 -0.5 0" rotation="0 0 0" url="/@${author}">
                            <a-entity class="author-pic" geometry="primitive:circle;radius:0.45" material="side:double;src:" bind__material.src="authorImage" crossorigin="anonymous" position="-2.34 0 0.1" scale="1 1 1"></a-entity>
                            <a-entity class="username" bind__text.value="p8.author" text="width: 3.7; wrapCount: 21; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: center; color:black; value:;" position="-1.627 .025 0.207" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="rep" bind__text.value="p8.rep" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:black; value:;" position="2.194796349166291 -0.12506570270188472 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r3-body" geometry="primitive:plane;width:6;height:2" material="side:double;opacity:0.7" position="0 -2 0">
                            <a-entity class="body-text" bind__text.value="p8.body" text="width: 5.8; wrapCount: 40; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: top; color: black; value:;" position="-2.884 .804 0.147" rotation="" scale="1 1 .01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r4-voting" geometry="primitive:plane;width:6;height:1" material="side:double;color:#999999;opacity:0.7" position="0 -3.5 0">
                            <a-entity class="value" bind__text.value="p8.votesVal" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="1.385 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="value" bind__text.value="p8.votesNum" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="0.25 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                    </a-entity>
                </a-entity>
            </a-entity>
            <a-entity class="poster-image" bind__visible="p9.visible" visible="" bind__material.src="p9.Hash360" material="side:double;src:" show-info="" geometry="primitive:sphere" crossorigin="anonymous" position="0 0 0" rotation="0 180 0" scale="1 1 1">
                <a-sphere bind__url="p9.postUrl" url="" opacity="0" scale="1.001 1.001 1.001"></a-sphere>
                <a-entity look-at="[camera]">
                    <a-plane class="voteButton" bind__vote="p9.postUrl" vote="" position="-1.25 0 .5" depth="0.5" width="0.5" material="side:double;src:#voteButtonPic;transparent:true;alphaTest:0.82"></a-plane>
                </a-entity>
                <a-entity class="hidebutton" look-at="[camera]" visible="false" position="0 1.2 0">
                    <a-entity class="col-1" position="0 3.6 0">
                        <a-entity class="r1-title" geometry="primitive:plane;width:6;height:1" material="side:double;color:#16398D;opacity:0.7" position="0 0.5 0">
                            <a-entity class="title-text" bind__text.value="p9.title" text="width: 6; wrapCount: 28; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="-2.765 -0.381 0.199" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r2-author" geometry="primitive:plane;width:6;height:1" material="side:double;color:#25D193;opacity:0.7" position="0 -0.5 0" rotation="0 0 0" url="/@${author}">
                            <a-entity class="author-pic" geometry="primitive:circle;radius:0.45" material="side:double;src:" bind__material.src="authorImage" crossorigin="anonymous" position="-2.34 0 0.1" scale="1 1 1"></a-entity>
                            <a-entity class="username" bind__text.value="p9.author" text="width: 3.7; wrapCount: 21; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: center; color:black; value:;" position="-1.627 .025 0.207" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="rep" bind__text.value="p9.rep" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:black; value:;" position="2.194796349166291 -0.12506570270188472 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r3-body" geometry="primitive:plane;width:6;height:2" material="side:double;opacity:0.7" position="0 -2 0">
                            <a-entity class="body-text" bind__text.value="p9.body" text="width: 5.8; wrapCount: 40; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: top; color: black; value:;" position="-2.884 .804 0.147" rotation="" scale="1 1 .01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r4-voting" geometry="primitive:plane;width:6;height:1" material="side:double;color:#999999;opacity:0.7" position="0 -3.5 0">
                            <a-entity class="value" bind__text.value="p9.votesVal" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="1.385 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="value" bind__text.value="p9.votesNum" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="0.25 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                    </a-entity>
                </a-entity>
            </a-entity>
            <a-entity class="poster-image" bind__visible="p10.visible" visible="" bind__material.src="p10.Hash360" material="side:double;src:" show-info="" geometry="primitive:sphere" crossorigin="anonymous" position="0 0 0" rotation="0 180 0" scale="1 1 1">
                <a-sphere bind__url="p10.postUrl" url="" opacity="0" scale="1.001 1.001 1.001"></a-sphere>
                <a-entity look-at="[camera]">
                    <a-plane class="voteButton" bind__vote="p10.postUrl" vote="" position="-1.25 0 .5" depth="0.5" width="0.5" material="side:double;src:#voteButtonPic;transparent:true;alphaTest:0.82"></a-plane>
                </a-entity>
                <a-entity class="hidebutton" look-at="[camera]" visible="false" position="0 1.2 0">
                    <a-entity class="col-1" position="0 3.6 0">
                        <a-entity class="r1-title" geometry="primitive:plane;width:6;height:1" material="side:double;color:#16398D;opacity:0.7" position="0 0.5 0">
                            <a-entity class="title-text" bind__text.value="p10.title" text="width: 6; wrapCount: 28; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="-2.765 -0.381 0.199" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r2-author" geometry="primitive:plane;width:6;height:1" material="side:double;color:#25D193;opacity:0.7" position="0 -0.5 0" rotation="0 0 0" url="/@${author}">
                            <a-entity class="author-pic" geometry="primitive:circle;radius:0.45" material="side:double;src:" bind__material.src="authorImage" crossorigin="anonymous" position="-2.34 0 0.1" scale="1 1 1"></a-entity>
                            <a-entity class="username" bind__text.value="p10.author" text="width: 3.7; wrapCount: 21; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: center; color:black; value:;" position="-1.627 .025 0.207" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="rep" bind__text.value="p10.rep" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:black; value:;" position="2.194796349166291 -0.12506570270188472 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r3-body" geometry="primitive:plane;width:6;height:2" material="side:double;opacity:0.7" position="0 -2 0">
                            <a-entity class="body-text" bind__text.value="p10.body" text="width: 5.8; wrapCount: 40; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: top; color: black; value:;" position="-2.884 .804 0.147" rotation="" scale="1 1 .01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r4-voting" geometry="primitive:plane;width:6;height:1" material="side:double;color:#999999;opacity:0.7" position="0 -3.5 0">
                            <a-entity class="value" bind__text.value="p10.votesVal" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="1.385 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="value" bind__text.value="p10.votesNum" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="0.25 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                    </a-entity>
                </a-entity>
            </a-entity>
            <a-entity class="poster-image" bind__visible="p11.visible" visible="" bind__material.src="p11.Hash360" material="side:double;src:" show-info="" geometry="primitive:sphere" crossorigin="anonymous" position="0 0 0" rotation="0 180 0" scale="1 1 1">
                <a-sphere bind__url="p11.postUrl" url="" opacity="0" scale="1.001 1.001 1.001"></a-sphere>
                <a-entity look-at="[camera]">
                    <a-plane class="voteButton" bind__vote="p11.postUrl" vote="" position="-1.25 0 .5" depth="0.5" width="0.5" material="side:double;src:#voteButtonPic;transparent:true;alphaTest:0.82"></a-plane>
                </a-entity>
                <a-entity class="hidebutton" look-at="[camera]" visible="false" position="0 1.2 0">
                    <a-entity class="col-1" position="0 3.6 0">
                        <a-entity class="r1-title" geometry="primitive:plane;width:6;height:1" material="side:double;color:#16398D;opacity:0.7" position="0 0.5 0">
                            <a-entity class="title-text" bind__text.value="p11.title" text="width: 6; wrapCount: 28; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="-2.765 -0.381 0.199" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r2-author" geometry="primitive:plane;width:6;height:1" material="side:double;color:#25D193;opacity:0.7" position="0 -0.5 0" rotation="0 0 0" url="/@${author}">
                            <a-entity class="author-pic" geometry="primitive:circle;radius:0.45" material="side:double;src:" bind__material.src="authorImage" crossorigin="anonymous" position="-2.34 0 0.1" scale="1 1 1"></a-entity>
                            <a-entity class="username" bind__text.value="p11.author" text="width: 3.7; wrapCount: 21; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: center; color:black; value:;" position="-1.627 .025 0.207" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="rep" bind__text.value="p11.rep" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:black; value:;" position="2.194796349166291 -0.12506570270188472 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r3-body" geometry="primitive:plane;width:6;height:2" material="side:double;opacity:0.7" position="0 -2 0">
                            <a-entity class="body-text" bind__text.value="p11.body" text="width: 5.8; wrapCount: 40; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: top; color: black; value:;" position="-2.884 .804 0.147" rotation="" scale="1 1 .01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r4-voting" geometry="primitive:plane;width:6;height:1" material="side:double;color:#999999;opacity:0.7" position="0 -3.5 0">
                            <a-entity class="value" bind__text.value="p11.votesVal" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="1.385 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="value" bind__text.value="p11.votesNum" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="0.25 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                    </a-entity>
                </a-entity>
            </a-entity>
            <a-entity class="poster-image" bind__visible="p12.visible" visible="" bind__material.src="p12.Hash360" material="side:double;src:" show-info="" geometry="primitive:sphere" crossorigin="anonymous" position="0 0 0" rotation="0 180 0" scale="1 1 1">
                <a-sphere bind__url="p12.postUrl" url="" opacity="0" scale="1.001 1.001 1.001"></a-sphere>
                <a-entity look-at="[camera]">
                    <a-plane class="voteButton" bind__vote="p12.postUrl" vote="" position="-1.25 0 .5" depth="0.5" width="0.5" material="side:double;src:#voteButtonPic;transparent:true;alphaTest:0.82"></a-plane>
                </a-entity>
                <a-entity class="hidebutton" look-at="[camera]" visible="false" position="0 1.2 0">
                    <a-entity class="col-1" position="0 3.6 0">
                        <a-entity class="r1-title" geometry="primitive:plane;width:6;height:1" material="side:double;color:#16398D;opacity:0.7" position="0 0.5 0">
                            <a-entity class="title-text" bind__text.value="p12.title" text="width: 6; wrapCount: 28; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="-2.765 -0.381 0.199" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r2-author" geometry="primitive:plane;width:6;height:1" material="side:double;color:#25D193;opacity:0.7" position="0 -0.5 0" rotation="0 0 0" url="/@${author}">
                            <a-entity class="author-pic" geometry="primitive:circle;radius:0.45" material="side:double;src:" bind__material.src="authorImage" crossorigin="anonymous" position="-2.34 0 0.1" scale="1 1 1"></a-entity>
                            <a-entity class="username" bind__text.value="p12.author" text="width: 3.7; wrapCount: 21; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: center; color:black; value:;" position="-1.627 .025 0.207" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="rep" bind__text.value="p12.rep" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:black; value:;" position="2.194796349166291 -0.12506570270188472 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r3-body" geometry="primitive:plane;width:6;height:2" material="side:double;opacity:0.7" position="0 -2 0">
                            <a-entity class="body-text" bind__text.value="p12.body" text="width: 5.8; wrapCount: 40; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: top; color: black; value:;" position="-2.884 .804 0.147" rotation="" scale="1 1 .01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r4-voting" geometry="primitive:plane;width:6;height:1" material="side:double;color:#999999;opacity:0.7" position="0 -3.5 0">
                            <a-entity class="value" bind__text.value="p12.votesVal" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="1.385 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="value" bind__text.value="p12.votesNum" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="0.25 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                    </a-entity>
                </a-entity>
            </a-entity>
            <a-entity class="poster-image" bind__visible="p13.visible" visible="" bind__material.src="p13.Hash360" material="side:double;src:" show-info="" geometry="primitive:sphere" crossorigin="anonymous" position="0 0 0" rotation="0 180 0" scale="1 1 1">
                <a-sphere bind__url="p13.postUrl" url="" opacity="0" scale="1.001 1.001 1.001"></a-sphere>
                <a-entity look-at="[camera]">
                    <a-plane class="voteButton" bind__vote="p13.postUrl" vote="" position="-1.25 0 .5" depth="0.5" width="0.5" material="side:double;src:#voteButtonPic;transparent:true;alphaTest:0.82"></a-plane>
                </a-entity>
                <a-entity class="hidebutton" look-at="[camera]" visible="false" position="0 1.2 0">
                    <a-entity class="col-1" position="0 3.6 0">
                        <a-entity class="r1-title" geometry="primitive:plane;width:6;height:1" material="side:double;color:#16398D;opacity:0.7" position="0 0.5 0">
                            <a-entity class="title-text" bind__text.value="p13.title" text="width: 6; wrapCount: 28; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="-2.765 -0.381 0.199" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r2-author" geometry="primitive:plane;width:6;height:1" material="side:double;color:#25D193;opacity:0.7" position="0 -0.5 0" rotation="0 0 0" url="/@${author}">
                            <a-entity class="author-pic" geometry="primitive:circle;radius:0.45" material="side:double;src:" bind__material.src="authorImage" crossorigin="anonymous" position="-2.34 0 0.1" scale="1 1 1"></a-entity>
                            <a-entity class="username" bind__text.value="p13.author" text="width: 3.7; wrapCount: 21; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: center; color:black; value:;" position="-1.627 .025 0.207" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="rep" bind__text.value="p13.rep" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:black; value:;" position="2.194796349166291 -0.12506570270188472 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r3-body" geometry="primitive:plane;width:6;height:2" material="side:double;opacity:0.7" position="0 -2 0">
                            <a-entity class="body-text" bind__text.value="p13.body" text="width: 5.8; wrapCount: 40; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: top; color: black; value:;" position="-2.884 .804 0.147" rotation="" scale="1 1 .01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r4-voting" geometry="primitive:plane;width:6;height:1" material="side:double;color:#999999;opacity:0.7" position="0 -3.5 0">
                            <a-entity class="value" bind__text.value="p13.votesVal" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="1.385 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="value" bind__text.value="p13.votesNum" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="0.25 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                    </a-entity>
                </a-entity>
            </a-entity>
            <a-entity class="poster-image" bind__visible="p14.visible" visible="" bind__material.src="p14.Hash360" material="side:double;src:" show-info="" geometry="primitive:sphere" crossorigin="anonymous" position="0 0 0" rotation="0 180 0" scale="1 1 1">
                <a-sphere bind__url="p14.postUrl" url="" opacity="0" scale="1.001 1.001 1.001"></a-sphere>
                <a-entity look-at="[camera]">
                    <a-plane class="voteButton" bind__vote="p14.postUrl" vote="" position="-1.25 0 .5" depth="0.5" width="0.5" material="side:double;src:#voteButtonPic;transparent:true;alphaTest:0.82"></a-plane>
                </a-entity>
                <a-entity class="hidebutton" look-at="[camera]" visible="false" position="0 1.2 0">
                    <a-entity class="col-1" position="0 3.6 0">
                        <a-entity class="r1-title" geometry="primitive:plane;width:6;height:1" material="side:double;color:#16398D;opacity:0.7" position="0 0.5 0">
                            <a-entity class="title-text" bind__text.value="p14.title" text="width: 6; wrapCount: 28; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="-2.765 -0.381 0.199" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r2-author" geometry="primitive:plane;width:6;height:1" material="side:double;color:#25D193;opacity:0.7" position="0 -0.5 0" rotation="0 0 0" url="/@${author}">
                            <a-entity class="author-pic" geometry="primitive:circle;radius:0.45" material="side:double;src:" bind__material.src="authorImage" crossorigin="anonymous" position="-2.34 0 0.1" scale="1 1 1"></a-entity>
                            <a-entity class="username" bind__text.value="p14.author" text="width: 3.7; wrapCount: 21; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: center; color:black; value:;" position="-1.627 .025 0.207" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="rep" bind__text.value="p14.rep" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:black; value:;" position="2.194796349166291 -0.12506570270188472 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r3-body" geometry="primitive:plane;width:6;height:2" material="side:double;opacity:0.7" position="0 -2 0">
                            <a-entity class="body-text" bind__text.value="p14.body" text="width: 5.8; wrapCount: 40; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: top; color: black; value:;" position="-2.884 .804 0.147" rotation="" scale="1 1 .01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r4-voting" geometry="primitive:plane;width:6;height:1" material="side:double;color:#999999;opacity:0.7" position="0 -3.5 0">
                            <a-entity class="value" bind__text.value="p14.votesVal" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="1.385 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="value" bind__text.value="p14.votesNum" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="0.25 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                    </a-entity>
                </a-entity>
            </a-entity>
            <a-entity class="poster-image" bind__visible="p15.visible" visible="" bind__material.src="p15.Hash360" material="side:double;src:" show-info="" geometry="primitive:sphere" crossorigin="anonymous" position="0 0 0" rotation="0 180 0" scale="1 1 1">
                <a-sphere bind__url="p15.postUrl" url="" opacity="0" scale="1.001 1.001 1.001"></a-sphere>
                <a-entity look-at="[camera]">
                    <a-plane class="voteButton" bind__vote="p15.postUrl" vote="" position="-1.25 0 .5" depth="0.5" width="0.5" material="side:double;src:#voteButtonPic;transparent:true;alphaTest:0.82"></a-plane>
                </a-entity>
                <a-entity class="hidebutton" look-at="[camera]" visible="false" position="0 1.2 0">
                    <a-entity class="col-1" position="0 3.6 0">
                        <a-entity class="r1-title" geometry="primitive:plane;width:6;height:1" material="side:double;color:#16398D;opacity:0.7" position="0 0.5 0">
                            <a-entity class="title-text" bind__text.value="p15.title" text="width: 6; wrapCount: 28; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="-2.765 -0.381 0.199" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r2-author" geometry="primitive:plane;width:6;height:1" material="side:double;color:#25D193;opacity:0.7" position="0 -0.5 0" rotation="0 0 0" url="/@${author}">
                            <a-entity class="author-pic" geometry="primitive:circle;radius:0.45" material="side:double;src:" bind__material.src="authorImage" crossorigin="anonymous" position="-2.34 0 0.1" scale="1 1 1"></a-entity>
                            <a-entity class="username" bind__text.value="p15.author" text="width: 3.7; wrapCount: 21; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: center; color:black; value:;" position="-1.627 .025 0.207" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="rep" bind__text.value="p15.rep" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:black; value:;" position="2.194796349166291 -0.12506570270188472 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r3-body" geometry="primitive:plane;width:6;height:2" material="side:double;opacity:0.7" position="0 -2 0">
                            <a-entity class="body-text" bind__text.value="p15.body" text="width: 5.8; wrapCount: 40; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: top; color: black; value:;" position="-2.884 .804 0.147" rotation="" scale="1 1 .01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r4-voting" geometry="primitive:plane;width:6;height:1" material="side:double;color:#999999;opacity:0.7" position="0 -3.5 0">
                            <a-entity class="value" bind__text.value="p15.votesVal" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="1.385 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="value" bind__text.value="p15.votesNum" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="0.25 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                    </a-entity>
                </a-entity>
            </a-entity>
            <a-entity class="poster-image" bind__visible="p16.visible" visible="" bind__material.src="p16.Hash360" material="side:double;src:" show-info="" geometry="primitive:sphere" crossorigin="anonymous" position="0 0 0" rotation="0 180 0" scale="1 1 1">
                <a-sphere bind__url="p16.postUrl" url="" opacity="0" scale="1.001 1.001 1.001"></a-sphere>
                <a-entity look-at="[camera]">
                    <a-plane class="voteButton" bind__vote="p16.postUrl" vote="" position="-1.25 0 .5" depth="0.5" width="0.5" material="side:double;src:#voteButtonPic;transparent:true;alphaTest:0.82"></a-plane>
                </a-entity>
                <a-entity class="hidebutton" look-at="[camera]" visible="false" position="0 1.2 0">
                    <a-entity class="col-1" position="0 3.6 0">
                        <a-entity class="r1-title" geometry="primitive:plane;width:6;height:1" material="side:double;color:#16398D;opacity:0.7" position="0 0.5 0">
                            <a-entity class="title-text" bind__text.value="p16.title" text="width: 6; wrapCount: 28; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="-2.765 -0.381 0.199" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r2-author" geometry="primitive:plane;width:6;height:1" material="side:double;color:#25D193;opacity:0.7" position="0 -0.5 0" rotation="0 0 0" url="/@${author}">
                            <a-entity class="author-pic" geometry="primitive:circle;radius:0.45" material="side:double;src:" bind__material.src="authorImage" crossorigin="anonymous" position="-2.34 0 0.1" scale="1 1 1"></a-entity>
                            <a-entity class="username" bind__text.value="p16.author" text="width: 3.7; wrapCount: 21; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: center; color:black; value:;" position="-1.627 .025 0.207" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="rep" bind__text.value="p16.rep" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:black; value:;" position="2.194796349166291 -0.12506570270188472 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r3-body" geometry="primitive:plane;width:6;height:2" material="side:double;opacity:0.7" position="0 -2 0">
                            <a-entity class="body-text" bind__text.value="p16.body" text="width: 5.8; wrapCount: 40; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: top; color: black; value:;" position="-2.884 .804 0.147" rotation="" scale="1 1 .01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r4-voting" geometry="primitive:plane;width:6;height:1" material="side:double;color:#999999;opacity:0.7" position="0 -3.5 0">
                            <a-entity class="value" bind__text.value="p16.votesVal" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="1.385 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="value" bind__text.value="p16.votesNum" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="0.25 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                    </a-entity>
                </a-entity>
            </a-entity>
            <a-entity class="poster-image" bind__visible="p17.visible" visible="" bind__material.src="p17.Hash360" material="side:double;src:" show-info="" geometry="primitive:sphere" crossorigin="anonymous" position="0 0 0" rotation="0 180 0" scale="1 1 1">
                <a-sphere bind__url="p17.postUrl" url="" opacity="0" scale="1.001 1.001 1.001"></a-sphere>
                <a-entity look-at="[camera]">
                    <a-plane class="voteButton" bind__vote="p17.postUrl" vote="" position="-1.25 0 .5" depth="0.5" width="0.5" material="side:double;src:#voteButtonPic;transparent:true;alphaTest:0.82"></a-plane>
                </a-entity>
                <a-entity class="hidebutton" look-at="[camera]" visible="false" position="0 1.2 0">
                    <a-entity class="col-1" position="0 3.6 0">
                        <a-entity class="r1-title" geometry="primitive:plane;width:6;height:1" material="side:double;color:#16398D;opacity:0.7" position="0 0.5 0">
                            <a-entity class="title-text" bind__text.value="p17.title" text="width: 6; wrapCount: 28; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="-2.765 -0.381 0.199" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r2-author" geometry="primitive:plane;width:6;height:1" material="side:double;color:#25D193;opacity:0.7" position="0 -0.5 0" rotation="0 0 0" url="/@${author}">
                            <a-entity class="author-pic" geometry="primitive:circle;radius:0.45" material="side:double;src:" bind__material.src="authorImage" crossorigin="anonymous" position="-2.34 0 0.1" scale="1 1 1"></a-entity>
                            <a-entity class="username" bind__text.value="p17.author" text="width: 3.7; wrapCount: 21; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: center; color:black; value:;" position="-1.627 .025 0.207" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="rep" bind__text.value="p17.rep" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:black; value:;" position="2.194796349166291 -0.12506570270188472 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r3-body" geometry="primitive:plane;width:6;height:2" material="side:double;opacity:0.7" position="0 -2 0">
                            <a-entity class="body-text" bind__text.value="p17.body" text="width: 5.8; wrapCount: 40; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: top; color: black; value:;" position="-2.884 .804 0.147" rotation="" scale="1 1 .01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r4-voting" geometry="primitive:plane;width:6;height:1" material="side:double;color:#999999;opacity:0.7" position="0 -3.5 0">
                            <a-entity class="value" bind__text.value="p17.votesVal" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="1.385 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="value" bind__text.value="p17.votesNum" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="0.25 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                    </a-entity>
                </a-entity>
            </a-entity>
            <a-entity class="poster-image" bind__visible="p18.visible" visible="" bind__material.src="p18.Hash360" material="side:double;src:" show-info="" geometry="primitive:sphere" crossorigin="anonymous" position="0 0 0" rotation="0 180 0" scale="1 1 1">
                <a-sphere bind__url="p18.postUrl" url="" opacity="0" scale="1.001 1.001 1.001"></a-sphere>
                <a-entity look-at="[camera]">
                    <a-plane class="voteButton" bind__vote="p18.postUrl" vote="" position="-1.25 0 .5" depth="0.5" width="0.5" material="side:double;src:#voteButtonPic;transparent:true;alphaTest:0.82"></a-plane>
                </a-entity>
                <a-entity class="hidebutton" look-at="[camera]" visible="false" position="0 1.2 0">
                    <a-entity class="col-1" position="0 3.6 0">
                        <a-entity class="r1-title" geometry="primitive:plane;width:6;height:1" material="side:double;color:#16398D;opacity:0.7" position="0 0.5 0">
                            <a-entity class="title-text" bind__text.value="p18.title" text="width: 6; wrapCount: 28; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="-2.765 -0.381 0.199" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r2-author" geometry="primitive:plane;width:6;height:1" material="side:double;color:#25D193;opacity:0.7" position="0 -0.5 0" rotation="0 0 0" url="/@${author}">
                            <a-entity class="author-pic" geometry="primitive:circle;radius:0.45" material="side:double;src:" bind__material.src="authorImage" crossorigin="anonymous" position="-2.34 0 0.1" scale="1 1 1"></a-entity>
                            <a-entity class="username" bind__text.value="p18.author" text="width: 3.7; wrapCount: 21; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: center; color:black; value:;" position="-1.627 .025 0.207" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="rep" bind__text.value="p18.rep" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:black; value:;" position="2.194796349166291 -0.12506570270188472 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r3-body" geometry="primitive:plane;width:6;height:2" material="side:double;opacity:0.7" position="0 -2 0">
                            <a-entity class="body-text" bind__text.value="p18.body" text="width: 5.8; wrapCount: 40; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: top; color: black; value:;" position="-2.884 .804 0.147" rotation="" scale="1 1 .01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r4-voting" geometry="primitive:plane;width:6;height:1" material="side:double;color:#999999;opacity:0.7" position="0 -3.5 0">
                            <a-entity class="value" bind__text.value="p18.votesVal" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="1.385 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="value" bind__text.value="p18.votesNum" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="0.25 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                    </a-entity>
                </a-entity>
            </a-entity>
            <a-entity class="poster-image" bind__visible="p19.visible" visible="" bind__material.src="p19.Hash360" material="side:double;src:" show-info="" geometry="primitive:sphere" crossorigin="anonymous" position="0 0 0" rotation="0 180 0" scale="1 1 1">
                <a-sphere bind__url="p19.postUrl" url="" opacity="0" scale="1.001 1.001 1.001"></a-sphere>
                <a-entity look-at="[camera]">
                    <a-plane class="voteButton" bind__vote="p19.postUrl" vote="" position="-1.25 0 .5" depth="0.5" width="0.5" material="side:double;src:#voteButtonPic;transparent:true;alphaTest:0.82"></a-plane>
                </a-entity>
                <a-entity class="hidebutton" look-at="[camera]" visible="false" position="0 1.2 0">
                    <a-entity class="col-1" position="0 3.6 0">
                        <a-entity class="r1-title" geometry="primitive:plane;width:6;height:1" material="side:double;color:#16398D;opacity:0.7" position="0 0.5 0">
                            <a-entity class="title-text" bind__text.value="p19.title" text="width: 6; wrapCount: 28; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="-2.765 -0.381 0.199" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r2-author" geometry="primitive:plane;width:6;height:1" material="side:double;color:#25D193;opacity:0.7" position="0 -0.5 0" rotation="0 0 0" url="/@${author}">
                            <a-entity class="author-pic" geometry="primitive:circle;radius:0.45" material="side:double;src:" bind__material.src="authorImage" crossorigin="anonymous" position="-2.34 0 0.1" scale="1 1 1"></a-entity>
                            <a-entity class="username" bind__text.value="p19.author" text="width: 3.7; wrapCount: 21; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: center; color:black; value:;" position="-1.627 .025 0.207" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="rep" bind__text.value="p19.rep" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:black; value:;" position="2.194796349166291 -0.12506570270188472 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r3-body" geometry="primitive:plane;width:6;height:2" material="side:double;opacity:0.7" position="0 -2 0">
                            <a-entity class="body-text" bind__text.value="p19.body" text="width: 5.8; wrapCount: 40; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: top; color: black; value:;" position="-2.884 .804 0.147" rotation="" scale="1 1 .01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r4-voting" geometry="primitive:plane;width:6;height:1" material="side:double;color:#999999;opacity:0.7" position="0 -3.5 0">
                            <a-entity class="value" bind__text.value="p19.votesVal" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="1.385 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="value" bind__text.value="p19.votesNum" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="0.25 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                    </a-entity>
                </a-entity>
            </a-entity>
            <a-entity class="poster-image" bind__visible="p20.visible" visible="" bind__material.src="p20.Hash360" material="side:double;src:" show-info="" geometry="primitive:sphere" crossorigin="anonymous" position="0 0 0" rotation="0 180 0" scale="1 1 1">
                <a-sphere bind__url="p20.postUrl" url="" opacity="0" scale="1.001 1.001 1.001"></a-sphere>
                <a-entity look-at="[camera]">
                    <a-plane class="voteButton" bind__vote="p20.postUrl" vote="" position="-1.25 0 .5" depth="0.5" width="0.5" material="side:double;src:#voteButtonPic;transparent:true;alphaTest:0.82"></a-plane>
                </a-entity>
                <a-entity class="hidebutton" look-at="[camera]" visible="false" position="0 1.2 0">
                    <a-entity class="col-1" position="0 3.6 0">
                        <a-entity class="r1-title" geometry="primitive:plane;width:6;height:1" material="side:double;color:#16398D;opacity:0.7" position="0 0.5 0">
                            <a-entity class="title-text" bind__text.value="p20.title" text="width: 6; wrapCount: 28; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="-2.765 -0.381 0.199" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r2-author" geometry="primitive:plane;width:6;height:1" material="side:double;color:#25D193;opacity:0.7" position="0 -0.5 0" rotation="0 0 0" url="/@${author}">
                            <a-entity class="author-pic" geometry="primitive:circle;radius:0.45" material="side:double;src:" bind__material.src="authorImage" crossorigin="anonymous" position="-2.34 0 0.1" scale="1 1 1"></a-entity>
                            <a-entity class="username" bind__text.value="p20.author" text="width: 3.7; wrapCount: 21; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: center; color:black; value:;" position="-1.627 .025 0.207" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="rep" bind__text.value="p20.rep" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:black; value:;" position="2.194796349166291 -0.12506570270188472 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r3-body" geometry="primitive:plane;width:6;height:2" material="side:double;opacity:0.7" position="0 -2 0">
                            <a-entity class="body-text" bind__text.value="p20.body" text="width: 5.8; wrapCount: 40; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: top; color: black; value:;" position="-2.884 .804 0.147" rotation="" scale="1 1 .01" material=""></a-entity>
                        </a-entity>
                        <a-entity class="r4-voting" geometry="primitive:plane;width:6;height:1" material="side:double;color:#999999;opacity:0.7" position="0 -3.5 0">
                            <a-entity class="value" bind__text.value="p20.votesVal" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="1.385 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                            <a-entity class="value" bind__text.value="p20.votesNum" text="width: 10; lineHeight: 50; letterSpacing: 5; anchor: left; baseline: bottom; color:; value:;" position="0.25 -0.09268436887713527 0.1" rotation="" scale="1 1 0.01" material=""></a-entity>
                        </a-entity>
                    </a-entity>
                </a-entity>
            </a-entity>
        </a-entity>
        <!-- otolux tag-->
        <a-entity id="ototag" url="http://otolux.la" geometry="primitive:plane;height:0.77;width:5.91" material="side:double" position="0 0.369 10" rotation="0 -180 0">
            <a-entity id="heart" obj-model="obj:/viz/love.obj" material="color:#ff0000" position="" rotation="" scale="0.015 0.015 0.015" url="http://otolux.la"></a-entity>
            <a-entity id="madein" text="value:made in LA        by OTOLUX;width: 8.5; wrapCount: 40; lineHeight: 50; letterSpacing: 5; align: center; anchor: center; baseline: center; color:black;" position="0 0 .1" scale="1 1 0.01" visible="" material="" rotation=""></a-entity>
            <a-entity id="madeout" text="value:made in LA        by OTOLUX;width: 8.5; wrapCount: 40; lineHeight: 50; letterSpacing: 5; align: center; anchor: center; baseline: center; color:black;" position="0 0 -.1" scale="1 1 0.01" visible="" material="" rotation="0 180 0"></a-entity>
        </a-entity>
    </a-scene>
</body>
</html>