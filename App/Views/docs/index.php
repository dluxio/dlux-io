<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - Documentation</title>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/header.php";
   include_once($path);
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.css" />

</head>
<body class="d-flex flex-column h-100">
<a class="skippy sr-only sr-only-focusable" href="#content">
  <span class="skippy-text">Skip to main content</span>
</a>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/nav.php";
   include_once($path);
?>
    <div class="container-fluid text-white-50">
      <div class="row flex-xl-nowrap">
        <div class="col-md-3 col-xl-2 bd-sidebar">
          <form role="search" class="bd-search d-flex align-items-center">
              <span class="algolia-autocomplete" style="position: relative; display: inline-block; direction: ltr;">
                  <input type="search" class="form-control ds-input" id="search-input" placeholder="Search..." aria-label="Search for..." autocomplete="off" data-docs-version="4.4" spellcheck="false" role="combobox" aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0" dir="auto" style="position: relative; vertical-align: top;">
                  <pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: normal; text-indent: 0px; text-rendering: auto; text-transform: none;"></pre>
                  <span class="ds-dropdown-menu" role="listbox" id="algolia-autocomplete-listbox-0" style="position: absolute; top: 100%; z-index: 100; display: none; left: 0px; right: auto;">
                  <div class="ds-dataset-1"></div>
                  </span>
              </span>
              <button class="btn btn-link bd-search-docs-toggle d-md-none p-0 ml-3" type="button" data-toggle="collapse" data-target="#bd-docs-nav" aria-controls="bd-docs-nav" aria-expanded="false" aria-label="Toggle docs navigation"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img" focusable="false"><title>Menu</title><path stroke="#fff" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg></button>
        </form>

<nav class="collapse bd-links mx-1" id="bd-docs-nav" aria-label="Main navigation">
                <div class="d-flex">
                    <div class="btn-group flex-fill my-1" role="group" aria-label="Expand / Collapse">
                        <button type="button" id="expand" class="btn btn-secondary">Expand</button>
                        <button type="button" id="collapse" class="btn btn-secondary">Collapse</button>
                    </div>
                </div>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingAbout">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseAbout" aria-expanded="false" aria-controls="collapseAbout"><i class="fas fa-info-circle fa-fw mr-2"></i>About<i class="fas fa-angle-down fa-fw ml-1"></i></button>
                            </h5>
                        </div>
                        <div id="collapseAbout" class="collapse show" aria-labelledby="headingAbout">
                            <div class="card-body">
                                <ul class="nav flex-column">
                                    <li class="nav-item"><a class="nav-link scrollto" href="#introduction">Introduction</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#faq">FAQ</a></li>
                                    <li class="nav-item"><a class="nav-link scrollto" href="#whitepaper">Whitepaper</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingCreate">
                            <h5 class="mb-0 d-inline">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseCreate" aria-expanded="true" aria-controls="collapseCreate"><i class="fas fa-drafting-compass fa-fw mr-2"></i>Create<i class="fas fa-angle-down fa-fw ml-1"></i></button>
                            </h5>
                        </div>
                        <div id="collapseCreate" class="collapse" aria-labelledby="headingCreate">
                            <div class="card-body p-2" id="createContainer">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="#" data-toggle="collapse" data-target="#collapseCreateInfo"><i class="fas fa-plus fa-fw mr-2"></i>Publishing<i class="fas fa-angle-down fa-fw ml-1"></i></a>
                                    </div>
                                    <div class="card-body collapse show" id="collapseCreateInfo">
                                        <ul class="nav flex-column">
                                            <li class="nav-item"><a class="nav-link" href="#supercraft">Supercraft VR</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#builder">VR Builder</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#uploader">App Uploader</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a href="#" data-toggle="collapse" data-target="#collapseCreateAssets"><i class="fas fa-shapes fa-fw mr-2"></i>Assets<i class="fas fa-angle-down fa-fw ml-1"></i></a>
                                    </div>
                                    <div class="card-body collapse" id="collapseCreateAssets">
                                        <ul class="nav flex-column">
                                            <li class="nav-item"><a class="nav-link" href="#3d-models">3D Models</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#images">Images</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#text">Text</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#shapes">Shapes</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#audio">Audio</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#video">Video</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a href="#" data-toggle="collapse" data-target="#collapseCreateComponents"><i class="fas fa-cogs fa-fw mr-2"></i>Components<i class="fas fa-angle-down fa-fw ml-1"></i></a>
                                    </div>
                                    <div class="card-body collapse" id="collapseCreateComponents">
                                        <ul class="nav flex-column">
                                            <li class="nav-item"><a class="nav-link" href="#environment">Environment</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#collisions">Collisions</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#physics">Physics</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#navmesh">Navmesh</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#player-rig">Player Rig</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#controls">Controls</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#ar-marker">AR Marker</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#ui-overlay">UI Overlay</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a href="#" data-toggle="collapse" data-target="#collapseCreateSDK"><i class="fas fa-layer-group fa-fw mr-2"></i>SDK<i class="fas fa-angle-down fa-fw ml-1"></i></a>
                                    </div>
                                    <div class="card-body collapse" id="collapseCreateSDK">
                                        <ul class="nav flex-column">
                                            <li class="nav-item scrollto"><a class="nav-link" href="#blockchain-ops">Blockchain Operations</a></li>
                                            <li class="nav-item scrollto"><a class="nav-link" href="#second-layer">Second Layer</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingExchange">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseExchange" aria-expanded="false" aria-controls="collapseThree"><i class="fas fa-store fa-fw mr-2"></i>Market<i class="fas fa-angle-down fa-fw ml-1"></i></button>
                            </h5>
                        </div>
                        <div id="collapseExchange" class="collapse" aria-labelledby="headingExchange">
                            <div class="card-body">
                                <ul class="nav flex-column">
                                    <li class="nav-item"><a class="nav-link" href="#token">DLUX Token</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#dex">Exchange</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#nft-smt">NFT / SMT</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#accounts">Account Creation</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#pinning">Asset Pinning</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingBlockchain">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseBlockchain" aria-expanded="false" aria-controls="collapseBlockchain"><i class="fas fa-link fa-fw mr-2"></i>Blockchain<i class="fas fa-angle-down fa-fw ml-1"></i></button>
                            </h5>
                        </div>
                        <div id="collapseBlockchain" class="collapse" aria-labelledby="headingBlockchain">
                            <div class="card-body">
                                <ul class="nav flex-column">
                                    <li class="nav-item"><a class="nav-link" href="#nodes">Nodes</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#api">API</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#ipfs">IPFS</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#hive">Hive</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
    </nav>
</div>
<main class="col-md-9 col-xl-10 py-md-3 pl-md-5 bd-content" role="main">
<article class="docs-article" id="introduction">
    <h1 class="bd-title" id="content">Welcome to dlux! Start building anything.</h1>
    <p class="bd-lead">The goal of this project is to incentivize XR adoption in the best possible way we can imagine: open-source and on-chain.</p>
    <p>The economics of this are possible. By combining WebVR, AR.js, and HIVE, we buildd a platform free for everyone to use that rewards good content with real cryptocurrency you can spend or transfer.</p>
    <p>We recognize that in order for vr to take off, its creation needs to reach a point of enabling everyone to participate, so we lowered the barrier to entry as far as we possibly could.</p>
    <p>Remix our Glitch projects to immediately begin building experiences that earn you rewards by publishing to Steem. Experiences that run on nearly any device, computer, and head mounted display through the web browser.</p>
    <p>Deploy your next game, video, or experience at no cost with no programming expertise. We'll show you how.</p>
    <h2>Quickstart</h2>
    <p class="bd-lead">We've made it easy to get up and running by integrating all the technical stuff so you can start creating right away!</p>
    <p>To fully utilize our platform, you must have a <a href="https://signup.hive.io/" target="_blank">HIVE account</a>. It can take some time for your account to activate, but you can start building apps immediately.</p>
</article>
<article class="docs-article" id="faq">
    <h1 class="bd-title">FAQ</h1>
    <p class="bd-lead">Find answers to Frequently Asked Questions</p>
    <p></p>
</article>
<article class="docs-article" id="whitepaper">
    <h1 class="bd-title">Whitepaper</h1>
    <p class="bd-lead">The original dlux whitepaper was written by Steven Ettinger and Mark Giles.</p>
    <h3><a href="https://docs.google.com/document/d/1_jHIJsX0BRa5ujX0s-CQg3UoQC2CBW4wooP2lSSh3n0/" target="_blank">Read it here.</a></h3>
    <p>It details the philosophy and design principles behind the dlux-io platform. Back then, HIVE was called STEEM.</p>
    <p>If pictures are more your thing, check out the <a href="https://docs.google.com/presentation/d/1L0ZhqUsetBB2jI8fcHqUIOt7ddDKFtn4VV_C2-Uogcw/" target="_blank">Slide Deck</a> instead.</p>
</article>
<article class="docs-article" id="supercraft">
    <h1 class="bd-title">Supercraft VR Publishing</h1>
    <p class="bd-lead"></p>
</article>
<article class="docs-article" id="builder">
    <h1 class="bd-title">DLUX Glitch VR Boilerplate</h1>
    <p class="bd-lead">dlux Builder is integrated with Glitch for free & easy remixing, prototyping, and publishing.</p>
    <h3>Add 3D Model</h3>
    <p>Models must be in <code class="highlighter-rouge">glTF</code> format (unpacked .gltf, embedded .gltf, binary .glb), Use <a href="https://blackthread.io/gltf-converter/" target="_blank">blackthread.io/gltf-converter</a> to convert other formats to glTF.</p>
    <ul>
    <li>Click Add 3D Model</li>
    <li>Set your options</li>
    <li>Drag-and-drop all required files</li>
    </ul>
    <h3>Add Images</h3>
    <p>Max photo resolution is 4096px, and must be in power of 2, such as 512x512px, or 1024x512px (.png or .jpg)</p>
    <ul>
    <li>Click Add Images</li>
    <li>Set your options</li>
    <li>Drag and drop photos (no limit)</li>
    </ul>
    <p>If [X] Add to scene is checked, the photos dropped in will be applied to box geometry and inserted into your scene. You can then use the inspector to place the photos in your scene.</p>

    <h3>Description</h3>
    <p>Posting to Hive requires a Title, Body, and Tags. This allows your experience to be discovered and enjoyed by others on the network.</p>
    <p>Get a Hive Account.</p>

    <h3>Views</h3>
    <ul>In our Glitch boilerplate you have access to the following views:
        <li>Glitch: modify the code in each file of your experience</li>
        <li>dlux Builder: adds a toolbar to the Glitch view</li>
        <li>Asset Upload: Drag-&-Drop asset well</li>
        <li>App View: Live build of your app</li>
    </ul>
    <p>Glitch is a collaborative development environment that allows users to quickly duplicate and modify apps. We've built on top of this to offer a social XR boilerplate with drag-and-drop asset upload and Steem publishing.</p>
    <p>We recommend creating a Glitch account so you can keep track of all your apps and collaborate easily.</p>
    <p>The dlux vr boilerplate is accessible on Glitch here:</p>
    <p>App URL: <a href="dlux-vr.glitch.me" target="_blank">dlux-vr.glitch.me</a></p>
    <p>Remix URL: <a href="glitch.com/remix/#!/dlux-vr" target="_blank">glitch.com/remix/#!/dlux-vr</a></p>
    <p>Your very own web based development environment at one click.</p>
   
Remix a dlux experience on Glitch
Click Remix to edit ðŸŽ¤
Click Show Live ðŸ•¶
Click onto the experience to activate it
Press ctl + alt + i to open the inspector
Click the rocket button ðŸš€
Remix any experience on dlux
Open an XR post on dlux
Click onto the experience to activate it
Press ctl + alt + i to open the inspector
Click the rocket button ðŸš€
Follow 1-5 above to remix
Setup your Glitch options:
 Change Theme (user preference)
 Refresh App on Changes OFF
 Wrap Text ON

On the left you have a Glitch instance which is collaborative, auto-saves, and has the ability to rewind your code.

On the right you have a running version of your app. Changes made to the code on the left are not shown on the right until you click the Refresh App button at the top.

At the bottom is the browsers web inspector.

If you need to edit the Steem post that contains your dApp, such as update the preview images or html, follow these steps:
Ensure you are logged in as the owner of the dApp(the username that posted it)
Navigate to your dapp on dlux.io or localhost
/dlux/@username/permLink in the address bar needs to be changed to /post/edit/@username/permLink
Now you have the screen to change the metadata that is the ipfs reference to your app. As well as the title and blog post.
Press Submit at the bottom and your steempost will be updated. This action takes Resource Credits. Once you're happy with how your app is working, you need to generate the preview so others know what they're clicking on.

For the blog, you need a traditional preview image, and for the portal inside dlux that goes to your experience, you need a 360 preview image.

Take a 16x9 traditional photo for the Steem blog entry by pressing Ctl-Alt-S

Take a 360 photo for the portal preview by pressing Ctl-Alt-Shift-S</p>
</article>
<article class="docs-article" id="uploader">
    <h1 class="bd-title">Advanced App Uploader</h1>
                        
</article>
<article class="docs-article" id="3d-models">
    <h1 class="bd-title">Working With 3D Models</h1>
    <p>A-Frame recommends glTF</p>
    <p>glTF is the rising star of 3D asset distribution viewing. In comparison to the older OBJ format, which supports only vertices, normals, texture coordinates, and basic materials, glTF provides a more powerful set of features.</p>
                        <ul>In addition to all of the above, glTF offers:
                            <li>Hierarchical objects</li>
                            <li>Scene information (light sources, cameras)</li>
                            <li>Skeletal structure and animation</li>
                            <li>More robust materials and shaders</li>
                        </ul>
                        <ul>Models can be created or downloaded in glTF:
                            <li>Sketchup Make 2017 + glTF Exporter is free and great for architecture</li>
                            <li>Blender 2.8 (beta) is a free, open-source, professional 3D modeling program with glTF export</li>
                            <li>Blender 2.79 + glTF Exporter if you're not on 2.8 (beta)</li>
                            <li>Sketchfab has thousands of free MIT license models auto-converted to glTF</li>
                            <li>Google Poly also has some free downloadable models in glTF</li>
                        </ul>
                        <p>If the model you want isn't available in glTF, try this converter: <a href="https://blackthread.io/gltf-converter/" target="_blank">https://blackthread.io/gltf-converter/</a></p>

glTF Overview:
Your model should be under 3MB, and can include textures in power of 2 (1024x512). Animations are supported with animation-mixer.

1. Export or download your model as a glTF 2.0:
unpacked .glTF .bin .png .jpg
embedded .glTF
binary .glb
2. Click Add 3D Model in the dlux Builder
 Convert png to jpg (beta)
 KHR Unlit option (see below)
 Pin to IPFS for 6 months (100MB limit)
3. Drag and drop your files
Open the logs if you want to see progress and confirmation of your asset being converted to a binary glTF (if not already in .glb format)
Once your asset is uploaded to IPFS, it will be inserted into A-Frame's asset manager, and placed in your scene at the origin
Your window will refresh with the updated changes
Now you can use the inspector to place your model where you'd like and save the changes back to your scene.

PBR (Lit)
PBR-Lit

KHR (Unlit)
KHR-Unlit 3. Drag and drop your file(s)

Manually tinkering with glTF and OBJ
If you're not using our drag and drop uploader, you may want to better understand inside the files

glTF contains these files
.gltf (model and material information)
.bin (geometry and animation)
.jpg, .png (textures)
OBJ contains these files
.obj (model information)
.mtl (material information)
.jpg, .png (textures)
.gltf, .obj, and .mtl are all text files that can be created in Glitch by clicking the button + New File, while .bin, .jpg, and .png must be uploaded to assets or somewhere. Note anything in your assets folder won't be uploaded to IPFS, it will instead be served from Glitch CDN.

â† assets
Drag in assets you'd like to use, such as glTF .bin files, .jpg or .png texture photos, music .mp3 files, and whatever else is needed to build your scene.

Steps for glTF .bin and texture .jpg or .png files
1. Upload all .bin, .jpg, and .png files to assets
Drag and drop the files into the assets folder in the left sidebar
Copy the URL of each file
2. Paste URL(s) into model containers
glTF:

Open yourmodel.gltf with a word processor and search for "uri"
Update "uri": "model.bin" with the correct URL copied from assets
Update all instances of "uri": "texture.jpg" with the correct URL(s) copied from assets
MTL:

Open yourmodel.mtl with a word processor and search for "map"
Update all instances of map_Kd texture.jpg with the correct URL(s) copied from assets
â† New Files
Click the + New File button in the left sidepanel

    <ul>Create corresponding files on Glitch
        <li>yourmodel.gltf (if using glTF)</li>
        <li>yourmodel.obj (if using OBJ)</li>
        <li>yourmodel.mtl (if using OBJ)</li>
        <li>Open the .gltf, or .obj and .mtl files you downloaded, or created. They can be viewed with any word processor on your desktop</li>
        <li>Copy the contents of each file</li>
        <li>Paste into the corresponding new file on Glitch index.html</li>
    </ul>
    <ul>Now that you have either:
        <li>an updated .gltf pointing to the .bin and any .jpg or .png textures in assets</li>
        <li>an .obj and updated .mtl pointing to any .jpg or .png textures in assets</li>
    you can set it up in index.html</ul>
    <h3>Add Animation</h3>
    <p>Animation mixer does not work for OBJs.</p>
    <div class="bd-clipboard"><button type="button" class="btn-clipboard" title="" data-original-title="Copy to clipboard">Copy</button></div><figure class="highlight"><pre><code class="language-html" data-lang="html">
    &lt;a-entity gltf-model=&quot;#object&quot; animation-mixer&gt;&lt;/a-entity&gt;
    </code></pre></figure>
    <p>If your model wasn't exported with animation, you can still animate it using A-Frame. This works for both OBJ and glTF:</p>
    <div class="bd-clipboard"><button type="button" class="btn-clipboard" title="" data-original-title="Copy to clipboard">Copy</button></div><figure class="highlight"><pre><code class="language-html" data-lang="html">
    &lt;a-obj-model src="#some-obj" 
             mtl="#some-mtl" 
             rotation="0 -135 0" 
             scale=".1 .1 .1" &gt;
     &lt;!-- Add A-Frame animation --&gt;
     &lt;a-animation attribute="rotation"
                   dur="10000"
                   fill="forwards"
                   to="0 360 0"
    repeat="indefinite"&gt;&lt;/a-animation&gt;&lt;/a-obj-model&gt;
    </code></pre></figure>                        
    <p>Learn more about A-Frame animation: <a href="https://aframe.io/docs/0.8.0/core/animations.html" target="_blank">https://aframe.io/docs/0.8.0/core/animations.html</a></p>
    <ul>A-Frame recommends glTF, and supports the following:
        <li>glTF .gltf or .glb <a href="https://aframe.io/docs/0.8.0/components/gltf-model.html" target="_blank">https://aframe.io/docs/0.8.0/components/gltf-model.html</a></li>
        <li>Object .obj https://aframe.io/docs/0.8.0/components/obj-model.html</li>
        <li>Collada .dae https://aframe.io/docs/0.8.0/components/collada-model.html</li>
    </ul>
    <ul>A-Frame Extras includes additional THREE.js loaders which you may try to varying success:
        <li>Filmbox .fbx https://github.com/donmccurdy/aframe-extras/tree/master/src/loaders</li>
        <li>Convert your glTF to glb here: https://glb-packer.glitch.me</li>
        <li>View your model here: https://sandbox.babylonjs.com/</li>
    </ul>
    <h3>OBJ</h3>
    <p>Objects can use .MTL to define their material, including texture files. They may also use A-Frame's material component.</p>
    <h3>Example 1</h3>
    <div class="bd-clipboard"><button type="button" class="btn-clipboard" title="" data-original-title="Copy to clipboard">Copy</button></div><figure class="highlight"><pre><code class="language-html" data-lang="html">
    &lt;a-assets&gt;
        &lt;a-asset-item id=&quot;window-obj&quot; src=&quot;url...&quot;&gt;&lt;/a-asset-item&gt;
        &lt;a-asset-item id=&quot;window-mtl&quot; src=&quot;url...&quot;&gt;&lt;/a-asset-item&gt;
     &lt;/a-assets&gt;

     &lt;a-obj-model src=&quot;#window-obj&quot; mtl=&quot;#window-mtl&quot; material=&quot;transparent: true&quot;&gt;&lt;/a-obj-model&gt;
    </code></pre></figure>
    <h3>Example 2</h3>
    <div class="bd-clipboard"><button type="button" class="btn-clipboard" title="" data-original-title="Copy to clipboard">Copy</button></div><figure class="highlight"><pre><code class="language-html" data-lang="html">
     &lt;a-assets&gt;
        &lt;a-asset-item id=&quot;tree&quot; src=&quot;url...&quot;&gt;&lt;/a-asset-item&gt;
     &lt;/a-assets&gt;

     &lt;a-entity obj-model=&quot;obj:#tree&quot; material=&quot;shader: flat; color: green; visible: false&quot;&gt;&lt;/a-obj-model&gt;
    </code></pre></figure>

glTF (GitHub Source)
glTF contains a .bin for geometry and animation data. glTFs and can use texture files, but cannot use A-Frame's material property.

Learn more about using glTF with A-Frame: https://aframe.io/docs/0.8.0/components/gltf-model.html

Textures
Texture files for both OBJ and glTF should be .jpg or .png with a resolution power of 2. This means the following are okay:

1024x1024
1024x2048
512x512
2048x512
2x2 pairs tend to be most optimal.
Animation

https://github.com/donmccurdy/aframe-extras/tree/master/src/loaders#animation

glTF loader example</p>
</article>
<article class="docs-article" id="images">
    <h1 class="bd-title">Working With Images</h1>
    <p>Images for STEEM and dlux posts.
Posting through dlux includes both traditional 16x9 rectangular images for all front ends, and 360 equirectangular images for portal preview images in VR on dlux.

Capture Images
16x9 Images can be captured inside an A-Frame scene by pressing ctl-alt-s
360 Images can be captured inside an A-Frame scene by pressing ctl-alt-shift-s
Upload Images
Drag and drop your images onto the IPFS uploader
If you want your images to appear in the scene, whether traditional or 360, select the "Add to scene" checkbox. This will create either a box (traditional) or sphere (360) geometry with src set to your uploaded item so it appears in your scene.

The engine prefers images in power of 2 resolution.

This means the resolution should be 2,4,8,16,32,64,128,256,512,1024,2048,etc...

Note the original resolution of your image and append it or a ratio of it to the file name.

Ex. image.jpg is 1000x600px, rename to image_1.6.jpg

Scale your image using Photoshop or something similar.

Ex. scale image_1.6.jpg to 1024x512px</p>
</article>
<article class="docs-article" id="text">
    <h1 class="bd-title">Adding And Manipulating Text</h1>
    <p>Add font to asset manager

Talk about character wrap

Text geometry is computationally expensive</p>
</article>
<article class="docs-article" id="shapes">
    <h1 class="bd-title">Adding And Manipulating Shapes</h1>
    <p></p>
</article>
<article class="docs-article" id="audio">
    <h1 class="bd-title">Streaming Audio</h3>
    <p></p>
</article>
<article class="docs-article" id="video">
    <h1 class="bd-title">Streaming Video</h3>
    <p>Streaming Video Options
At the moment, video can be streamed from any platform supporting 3rd party players, such as Vimeo Pro or d.tube

Upload your video to d.tube, then

Load Video Assets
All videos should be loaded via the asset manager denoted

<!--<a-asset-item id="myVideo" src="d.tube/ipfsHash" crossorigin="anonymous"></a-asset-item>-->

You can use traditional 16x9 or 360 videos.

Create an entity with the appropriate geometry (plane, box, sphere) and set its src="#myVideo"</p>
</article>
<article class="docs-article" id="xr-components">
    <h1 class="bd-title">XR Components</h3>
    <p>The 3D world of dlux is built using WebXR.

We consider WebXR to be based on THREE.js including:

A-Frame, an HTML implementation of WebVR
AR.js, marker-based AR for A-Frame
WebXR-Polyfill, markerless AR built on WebVR
In the future, the WebXR Device API will be available, and will integrate ARKit and ARCore with WebVR.</p>
</article>
<article class="docs-article" id="environment">
    <h1 class="bd-title">Environment</h3>
    <p>Setup an Environment
Environment is a powerful component that allows you to quickly build out landscape and atmosphere for your scene. You do not have to use it, but is an easy way to get started and comes included in dlux!

Presets
A-Frame Environments

Customization
In a dlux A-Frame scene:

Open the inspector by pressing ctl-alt-i
Select the "env" entity in the left side-bar
Select a-entity env

Start with a preset you like, and customize it in right side-bar
When you're happy with it, click the Save button in the left side-bar
Environment Customization Options

active turns the entire component on or off
dressing changes the shape of the dressing objects (trees, pyramids, etc). You can further customize the amount, color, scale, and variance.
flatShading changes the rendered appearance
fog adds atmosphere
grid appears on the floor and can be helpful for layout and design, choose any color.
ground changes the way the geometry of the ground in the distance. Customize the color and texture style to change how the ground is rendered.
horizonColor adjusts the color of the horizon, and the position and type of light can be customized floor appearance, colors, sky type, and lighting.
preset fills all values with those defined by the preset
skyColor adjusts the color of the sky, it's type can be set to color, gradient, or atmosphere.
Working with the code
You can work with the code directly in Glitch.

Built In
Environment is built in to dlux boiler plates, select a preset and modify this line:

<!--<a-entity id="env" environment="preset: forest"></a-entity>-->
Install
Install A-Frame Environment Component by Diego Goberna (GitHub Source)

<!--<head>

<script src="https://rawgit.com/feiss/aframe-environment-component/master/dist/aframe-environment-component.min.js"></script>

</head>-->
Setup
Change the environment to any of the predefined ones

<!--<a-scene>

<a-entity id="env" environment="preset: forest"></a-entity>

</a-scene>--></p>
</article>
<article class="docs-article" id="collisions">
    <h1 class="bd-title">Collisions</h1>
    <p></p>
</article>
<article class="docs-article" id="physics">
    <h1 class="bd-title">Physics</h1>
    <p>Use
At this time, dlux does not use aframe-physics-system by Don McCurdy (GitHub Source) by default.

To create collisions with the ground, floor, and walls, we recommend a nav mesh to restrict player movement.

A nav mesh is an invisible floor that the player is allowed to move on. For example, if you do not want a player to walk through a wall, there should be a gap in the nav mesh so they are not permitted to move there.

This approach has better performance, and allows the use of glTF files with shapes more complex than primitive geometries, meaning your ground can be varied terrain, not just flat. Interaction with static and dynamic objects can be achieved with AABB Collider and SuperHands.

If you need physics, keep reading.

To use the physics system, you must attach body components to the entities you want to participate in the physics system:

static-body for the ground, floor, and walls
dynamic-body for anything that's moveable
kinematic-body for the camera rig (not required)
Each body requires a shape Ideally, we would use a model for our world, which would have varied terrain in a glTF format as we do with nav-mesh. Set its body type to static and its shape to mesh.

<!-- World -->
<!--<a-entity gltf-model="navmesh.gltf"
          static-body="shape: mesh"
          nav-mesh></a-entity>-->
    <p>Unfortunately, "shape: mesh" is depreciated, and does not work with the kinematic-body. Therefore, complex shapes are not supported, only simple geometries, like ramps, boxes, and spheres, where shape typically doesn't need to be defined, and the default is auto.</p>
    <p>The big drawback to using the physics system is you can't have varied terrain for the floor because shape: mesh is depreciated. If your scene has a flat floor and you want to use physics, here's how:</p>
    <h3>Install</h3>
    <ul>You will need:
        <li>A-Frame</li>
        <li>A-Frame Extras</li>
        <li>A-Frame Physics System</li>
        <li>A-Frame Teleport Controls</li>
    </ul>
    <div class="bd-clipboard"><button type="button" class="btn-clipboard" title="" data-original-title="Copy to clipboard">Copy</button></div><figure class="highlight"><pre><code class="language-html" data-lang="html">
    &lt;head&gt;
    &lt;script src=&quot;https://aframe.io/releases/0.8.2/aframe.min.js&quot;&gt;&lt;/script&gt;
    &lt;script src=&quot;https://rawgit.com/donmccurdy/aframe-extras/master/dist/aframe-extras.js&quot;&gt;&lt;/script&gt;
    &lt;script src=&quot;https://cdn.rawgit.com/donmccurdy/aframe-physics-system/v3.3.0/dist/aframe-physics-system.min.js&quot;&gt;&lt;/script&gt;
    &lt;script src=&quot;https://rawgit.com/fernandojsg/aframe-teleport-controls/master/dist/aframe-teleport-controls.min.js&quot;&gt;&lt;/script&gt;
    &lt;/head&gt;
    </code></pre></figure>
Add a static-body floor (primitives only)

<!--<a plane id="floor" static-body height="20" width="20"></plane>-->
Add a kinematic-body camera rig</p>
</article>
<article class="docs-article" id="navmesh">
    <h1 class="bd-title">Navmesh</h1>
    <p>What & Why</p>
    <p>As the player moves around the world, we must define where the player may and may not go. The best way to achieve high performance is by defining a navmesh.</p>
    <p>A navigation mesh, or navmesh, is an abstract data structure used in artificial intelligence applications to aid agents in pathfinding through complicated spaces. This approach has been known since at least the mid-1980s in robotics, where it has been called a meadow map, and was popularized in video game AI in 2000. Wikipedia</p>
    <p>A navmesh is a simplified version of the floor, and can be used for collision detection with teleportation controls, as well as constraining movement controls.</p>
    <h3>Built into dlux</h3>
    <p>Navmesh comes built into dlux boilerplates, and should be updated as the scene changes. Once you build your scene, create a navmesh, then reference it in the scene by linking to it in this line of code:</p>
    <div class="bd-clipboard"><button type="button" class="btn-clipboard" title="" data-original-title="Copy to clipboard">Copy</button></div><figure class="highlight"><pre><code class="language-html" data-lang="html">
    &lt;a-entity gltf-model=&quot;navmesh.gltf&quot; nav-mesh&gt;&lt;/a-entity&gt;
    </code></pre></figure>
    <h3>How to Create a Navmesh</h3>
    <p>In the easiest case, a nav mesh can just be a simple mesh covering parts of the scene where characters are allowed to travel. Stairs become ramps, and obstacles are holes in the mesh. Don McCurdy</p>
    <p>There are many different ways to create the glTF for your navmesh. Here are some of the workflows we have had success with.</p>
    <h3>Navigation Mesh A-Frame Inspector Plugin</h3>
    <p>Don McCurdy's plugin for the A-Frame Inspector allows creating of a navigation mesh from an existing A-Frame scene</p>
    <ul>A-Frame Inspector Plugin Recast
        <li>Create your scene</li>
        <li>Use this plugin to create and test a navigation mesh</li>
        <li>Add the script to your scene head:</li>
        <div class="bd-clipboard"><button type="button" class="btn-clipboard" title="" data-original-title="Copy to clipboard">Copy</button></div><figure class="highlight"><pre><code class="language-html" data-lang="html">
        &lt;script src=&quot;https://recast-api.donmccurdy.com/aframe-inspector-plugin-recast.js&quot;&gt;&lt;/script&gt;
        </code></pre></figure>
        <li>Add inspector-plugin-recast to your &lt;a-scene&gt; tag:</li>
        <div class="bd-clipboard"><button type="button" class="btn-clipboard" title="" data-original-title="Copy to clipboard">Copy</button></div><figure class="highlight"><pre><code class="language-html" data-lang="html">
        &lt;a-scene inspector-plugin-recast&gt;
        </code></pre></figure>
        <li>Press Ctl-Alt-I to access the inspector</li>
        <li>Click Build to see the mesh</li>
        <li>Adjust parameters and click Build until desired mesh is achieved</li>
        <li>Export the navigation mesh as a glTF file</li>
        <li>Load the final navigation mesh into your scene as a normal model</li>
        <div class="bd-clipboard"><button type="button" class="btn-clipboard" title="" data-original-title="Copy to clipboard">Copy</button></div><figure class="highlight"><pre><code class="language-html" data-lang="html">
        &lt;a-entity gltf-model=&quot;navmesh.gltf&quot; nav-mesh&gt;&lt;/a-entity&gt;
        </code></pre></figure>
    </ul>
    <h3>In Blender</h3>
    <p>See Don McCurdy's post here: <a href="https://medium.com/@donmccurdy/creating-a-nav-mesh-for-a-webvr-scene-b3fdb6bed918" target="_blank">https://medium.com/@donmccurdy/creating-a-nav-mesh-for-a-webvr-scene-b3fdb6bed918</a></p>
    <h3>Using A-Frame Primitives</h3>
    <p>You can make a navigation mesh in A-Frame using a primitive, but only one navmesh is supported in a scene. This works fine for a big flat floor, but being limited to one primitive doesn't work for building varied terrain, which instead requires one of the other methods of generating a glTF to use for the navmesh.</p>
    <div class="bd-clipboard"><button type="button" class="btn-clipboard" title="" data-original-title="Copy to clipboard">Copy</button></div><figure class="highlight"><pre><code class="language-html" data-lang="html">
    &lt;a-scene renderer=&quot;gammaOutput: true&quot; background=&quot;color: lightblue;&quot;&gt;
      &lt;!-- CAMERA --&gt;
      &lt;!--&lt;a-entity id=&quot;rig&quot; movement-controls=&quot;constrainToNavMesh: true;&quot;&gt;
        &lt;a-entity camera look-controls=&quot;pointerLockEnabled: true;&quot; position=&quot;0 1.6 0&quot;&gt;&lt;/a-entity&gt;
      &lt;/a-entity&gt;--&gt;
  
      &lt;!-- STAGE --&gt;
     &lt;!-- &lt;a-entity scale=&quot;0.5 1 1&quot;&gt;
        &lt;a-entity geometry=&quot;primitive: plane; height: 10; width: 10;&quot;
              material=&quot;color: indigo; side: double;&quot;
              rotation=&quot;-90 0 0&quot;
              nav-mesh&gt;&lt;/a-entity&gt;
      &lt;/a-entity&gt;
    &lt;/a-scene&gt;
    </code></pre></figure>
    <h3>How to Test a Navmesh</h3>
    <p>Go to <a href="https://gltf-viewer.donmccurdy.com" target="_blank">https://gltf-viewer.donmccurdy.com</a> and drop in your glTF file.</p>
    <p>Click on the Performance disclosure triangle to view performance stats. Your navmesh.gltf should achieve 60 fps or higher for smooth performance.</p>
    <h3>How to Use a Navmesh</h3>
    <p>Now that you have created a navmesh for your scene, you must reference it in your scene.</p>
    <h4>Built in to dlux</h4>
    <p>If you're working from a dlux boilerplate, this is as simple as linking to it in the line</p>
    <div class="bd-clipboard"><button type="button" class="btn-clipboard" title="" data-original-title="Copy to clipboard">Copy</button></div><figure class="highlight"><pre><code class="language-html" data-lang="html">
    &lt;a-entity gltf-model=&quot;navmesh.gltf&quot; nav-mesh&gt;&lt;/a-entity&gt;
    </code></pre></figure>
    <h4>Start from scratch</h4>
    <p>If you're not, here are some step-by-step instructions to get navmesh working in A-Frame.</p>
    <ul>We will be using:
        <li>Pathfinding in A-Frame Extras by Don McCurdy (GitHub Source)</li>
        <li>Controls in A-Frame Extras by Don McCurdy (GitHub Source)</li>
        <li>A-Frame Teleport Controls by Fernando Serrano (GitHub Source)</li>
    </ul>
    <div class="bd-clipboard"><button type="button" class="btn-clipboard" title="" data-original-title="Copy to clipboard">Copy</button></div><figure class="highlight"><pre><code class="language-html" data-lang="html">
    &lt;html&gt;
    &lt;head&gt;
    &lt;script src=&quot;https://rawgit.com/donmccurdy/aframe-extras/master/dist/aframe-extras.js&quot;&gt;&lt;/script&gt;
    &lt;script src=&quot;https://rawgit.com/fernandojsg/aframe-teleport-controls/master/dist/aframe-teleport-controls.min.js&quot;&gt;&lt;/script&gt;
    &lt;/head&gt;
    </code></pre></figure>
    <p>Define the navmesh in your scene</p>
    <div class="bd-clipboard"><button type="button" class="btn-clipboard" title="" data-original-title="Copy to clipboard">Copy</button></div><figure class="highlight"><pre><code class="language-html" data-lang="html">
    &lt;body&gt;
      &lt;a-scene&gt;
        &lt;a-entity gltf-model=&quot;navmesh.gltf&quot; nav-mesh&gt;&lt;/a-entity&gt;
    </code></pre></figure>
    <p>Your player should be set up as a camera rig, with the head being your camera, and look something like this:</p>
    <div class="bd-clipboard"><button type="button" class="btn-clipboard" title="" data-original-title="Copy to clipboard">Copy</button></div><figure class="highlight"><pre><code class="language-html" data-lang="html">
&lt;a-entity id=&quot;player&quot;
     position=&quot;0 0 0&quot;
     movement-controls=&quot;constrainToNavMesh: true&quot;&gt;
   &lt;a-entity camera id=&quot;head&quot;
     position=&quot;0 1.6 0&quot;
     look-controls=&quot;pointerLockEnabled: true&quot;&gt;
      &lt;a-cursor nav-pointer
           raycaster=&quot;objects: [nav-mesh]&quot;&gt;&lt;/a-cursor&gt;
   &lt;/a-entity&gt;
   &lt;a-entity laser-controls=&quot;hand: left;&quot;
        teleport-controls=&quot;button: trigger; collision-entities: [nav-mesh]; cameraRig: #rig; teleportOrigin: [camera];&quot;&gt;
   &lt;/a-entity&gt;
   &lt;a-entity laser-controls=&quot;hand: right;&quot;
         teleport-controls=&quot;button: trigger; collision-entities: [nav-mesh]; cameraRig: #rig; teleportOrigin: [camera];&quot; &gt;
   &lt;/a-entity&gt;
&lt;/a-entity&gt;
&lt;/a-scene&gt;
&lt;/body&gt;
&lt;/html&gt;
</code></pre></figure>
<p>Finally, you need to add a bit of script for nav-pointer. This is already done in dlux.js, and can be added to an existing file, or inline:</p>
<div class="bd-clipboard"><button type="button" class="btn-clipboard" title="" data-original-title="Copy to clipboard">Copy</button></div><figure class="highlight"><pre><code class="language-html" data-lang="html">
&lt;head&gt;
...
&lt;script&gt;
AFRAME.registerComponent('nav-pointer', {
  init: function () {
    const el = this.el;
    // On click, send the NPC to the target location.
    el.addEventListener('click', (e) =&gt; {
      const ctrlEl = el.sceneEl.querySelector('[nav-agent]');
      ctrlEl.setAttribute('nav-agent', {
        active: true,
        destination: e.detail.intersection.point
      });
    });
    // When hovering on the nav mesh, show a green cursor.
    el.addEventListener('mouseenter', () =&gt; {
      el.setAttribute('material', {color: 'green'});
    });
    el.addEventListener('mouseleave', () =&gt; {
      el.setAttribute('material', {color: 'crimson'})
    });
 
    // Refresh the raycaster after models load.
    el.sceneEl.addEventListener('object3dset', () =&gt; {
      this.el.components.raycaster.refreshObjects();
    });
  }
});
&lt;/script&gt;
&lt;/head&gt;
</code></pre></figure>
</article>
<article class="docs-article" id="player-rig">
    <h1 class="bd-title">Player Rig</h1>
    <p></p>
</article>
<article class="docs-article" id="controls">
    <h1 class="bd-title">Player Controls</h1>
    <p></p>
</article>
<article class="docs-article" id="ar-marker">
    <h1 class="bd-title">AR Marker</h1>
    <p></p>
</article>
<article class="docs-article" id="ui-overlay">
    <h1 class="bd-title">UI Overlay</h1>
    <p></p>
</article>
<article class="docs-article" id="blockchain-ops">
    <h1 class="bd-title">Blockchain Operations</h1>
    <p></p>
</article>
<article class="docs-article" id="second-layer">
    <h1 class="bd-title">Second Layer</h1>
    <p>The dlux side chain is comprised of several nodes running the same token software that determine their state from only signed transactions on the steem blockchain. Together these nodes communicate through steem and perform complex tasks. Forming a distributed trusted third party for open ended transactions, multiparty contracts, and multi step processes. These node will arrive at consensus and maintain sharding information for each node.</p>
    <h2>DLUX Node Framework</h2>
    <ul>
        <li>State Nodes maintain state in RAM</li>
        <li>Every 100 blocks, a state file is posted to IPFS</li>
        <li>Each node then queries the API of each node to see what file was posted and broadcasts agreements so a deterministic state can be calculated using the blockchain as a gossip protocol.</li>
        off-chain services now have deterministic consensus that can be rewarded via PoB.</ul>
    <h3>Decentralized Mesh Network</h3>
    <p>Each node queries every other node to make sure there is consensus to verify the non-reversible block every 100 blocks that issues block rewards, which are determined by the bid rate (cost of running a node) determined by the users running nodes, and the users querying</p>
    <p>An average of the top 20 nodes in each category sets the bid rate (price per unity).</p>
    <p>The hash is deterministic and already agreed on, the outcome is easy to know, because the if statement is known.</p>
    <p>Configuration: env vars:</p>
    <div class="bd-clipboard"><button type="button" class="btn-clipboard" title="" data-original-title="Copy to clipboard">Copy</button></div><figure class="highlight"><pre><code class="language-html" data-lang="html">
    posting posting key
    active active key Can perform escrow transactions for rewards
    ACCOUNT steem account ie dlux-io
    DOMAIN Public / ie https://token.dlux.io
    BIDRATE If elected a runner, used to determine node payouts
    STARTING Hash from a recent block. Find one at https://token.dlux.io
    </code></pre></figure>
    <p>API: Read:</p>
    <div class="bd-clipboard"><button type="button" class="btn-clipboard" title="" data-original-title="Copy to clipboard">Copy</button></div><figure class="highlight"><pre><code class="language-html" data-lang="html">
    /@username -> DLUX balance and Powered Balance
    /stats -> Current Info
    /state -> State dump, for testing
    /runners -> Who is trusted to process blocks
    /markets -> DEX Info, in progress(80%)
    /dex -> DEX Info, in progress(80%)
    </code></pre></figure>
    <p>Write: CURRENTLY dlux_test_ prefix!!! Custom JSON:</p>
    <div class="bd-clipboard"><button type="button" class="btn-clipboard" title="" data-original-title="Copy to clipboard">Copy</button></div><figure class="highlight"><pre><code class="language-html" data-lang="html">
    send | to (account to not checked) & amount (integer, no float)
    power_up | amount (dlux to power up for voting)
    power_down | amount to schedule for power down 1
    vote_content | author permlink weight(1-10000)
    node_add | domain(https://token.example.com) bidRate(1-1000) marketingRate(1-2000}
    node_delete
    set_delegation_reward | @dlux-io to set delegation reward rate (0-2000)
    expire_post | @dlux-io to expire resteem rewards for specified post permlink
    set_resteem_reward | @dlux-io to set resteem reward rate (0-10000)
    </code></pre></figure>
    <p>Operations</p>
    <div class="bd-clipboard"><button type="button" class="btn-clipboard" title="" data-original-title="Copy to clipboard">Copy</button></div><figure class="highlight"><pre><code class="language-html" data-lang="html">
    Setting bennifactor rewards to @dlux-io >= 10% to make post votable 1
    Transfers to @robotolux automatically distributes ICO auction
    Delegations to @dlux-io paid daily and tracked automaticly
    Votes tallied and paid after ~10 days
    </code></pre></figure>
    </p>
</article>
<article class="docs-article" id="exchange">
    <h1 class="bd-title">Decentralized Exchange</h1>
    <p>The Hive accounts running DLUX software in consensus are able to facilitate token swaps utilizing the following protocol.</p>
    <p>Alice has 10 Hive, and wants to buy  10 DLUX. There are no buyers yet, so Alice checks the network to see which nodes are active(fills out escrow fields in advanced area of form), and selects Charlie as an escrow agent, and David to forward the transaction to a buyer, A collateralized escrow agent as well.</p>
    <p>Alice signs an 'escrow_transaction' to Charlie and David. The Hive blockchain will ensure all the security around accepting this transaction. The DLUX network will read the transaction, verify it's acceptable, and let all nodes know that Charlie and David both have enough collateral to hold this trade.</p>
    <p>Charlie and David will autonomously sign and broadcast the expected 'escrow_approve' transactions. Hive is in escrow between Charlie and David, each of whom have collateralized 10 DLUX. Bob sees the contract: 10 Hive for 10 DLUX, and buys it, That is sends a 'custom_json' transaction on hive with dlux header information.</p>
    <p>The dlux network sees this transaction and the 10 DLUX is sent to Alice, and the 10 Hive is released from escrow to David, (David autonomously signs 'escrow_dispute', and charlie autonomously signs 'escrow_release'). The Dlux network withholds 10 more DLUX from each as the custody changes. Once David recieves the Hive Charlie has his dlux retruned plus a fee. David sends the 10 Hive to Bob and then has his dlux returned plus his fee.</p>
    <p>At any time the trade will be upto 150% garanteed by the network. Since any one actor can hold any number of accounts some of the held escrow would be burned(sent to null) to prevent attacks that could withdraw dlux voting power early. On inflow trades like this holding a trade will be more costly as the escrow must be held longer.</p>
    <p>While nearly the same chain of custody happens in the reverse direction, the order sits on the dlux side with out the need to collateralize the trade until execution.</p>
    <p>Because collateralizing these trades requires liquidity, these trades can not be free. Especially inflow  and time based fees are being implemented(the listing fee is 1/2 of the execution fee, and would need to be paid incrementally to keep an order open).</p>
    <p>Collateralization is also a finite resource, as such the network itself must regulate acceptable trades and autonomously cancel orders that fall out of acceptable bands to free liquidity at market prices.</p>
    <p>No information asymmetry either way, all transactions on the DX are open.</p>
</article>
<article class="docs-article" id="token">
    <h1 class="bd-title">DLUX OpenToken</h1>
    <p>The first dlux tokens are being sold at auction in VR right now dlux.io/ico</p>
    <p>dlux tokens allow us to reward user actions like re-steeming our ads, sharing dlux on other social platforms, and other types of engagement.</p>
    <ul>
        <li>Incentivize to participate in the dlux p2p economy</li>
        <li>Distribute tokens from the reward pool to token holders, based on Hive rewards</li>
        <li>Incentives for any action a webserver can verify</li>
        <li>Decentralized exchanges with asset transfer</li>
        <li>Issue tokens from our auction pool daily</li>
        <li>New tokens added to the reward pool can be earned by token holders for dlux content based on beneficiary rewards.</li>
        <li>The first dlux token is built using steem-state</li>
        <li>dlux maintains a steem-state node to generate the reward pool</li>
        <li>the reward pool pays for the node and incentivizes other nodes</li>
        <li>the more nodes, the stronger the network gets</li>
        <li>At ~5% APY inflation</li>
        <li>Every 100 blocks 1 DLUX token is minted for every 2100.000 DLUX in existence.</li>
    </ul>
    <p>The reward pool is used to incentivize others to run steem-state nodes to verify integrity and that we're running our code fairly and correctly, provable through the hash. The 20 fastest verification responses earn rewards.</p>
</article>
<article class="docs-article" id="dex">
    <h1 class="bd-title">Decentralized Exchange (DEX)</h1>
    <p></p>
<article class="docs-article" id="nft-smt">
    <h1 class="bd-title">Non Fungible Tokens (NFTs)</h1>
    <p>In addition to the dlux Token, we have created a smart contract framework for building Non-fungible Tokens (NFT). They can contain key-pairs for activation, meaning you can ship devices deactivated and require codes for activation, similar to the electric scooter model. Our NFT framework creates a path forward for Internet of Things (IoT) governance.</p>
    <h3>EXAMPLES</h3>
    <p>Auctions, Prediction Markets, Equities</p>
    <h3>IPFS Pinning Service</h3>
    <p>Content uploaded to dlux automatically receives an IPFS NFT smart contract that looks for IPFS pinning services currently bidding to host content, and chooses the cheapest one to place your content. The contract is funded through the dlux rewards pool.</p>
    <h3>Free Physical Security</h3>
    <p>Increase your level safety anytime there's danger by inviting your family and a jury of your peers to watch and listen in. Push a single button to initiate a contract that contacts your next-of-kin (NoK) capable of taking legal action, and your 12 closest friends familiar with your life. Send your location and open a one-way audio call, or activate the camera. Broadcast irrefutable evidence to the people you trust, instantly and automatically.</p>
    <h3>AR Scavenger Hunt (Augmented Reality Location Based Experience)</h3>
    <p>Cryptographically run a location based experience with side-chain soft and hard consensus (dlux) on a distributed computing platform (STEEM) inside an augmented reality container (WebXR) on the decentralized storage system (IPFS).</p>
    <ul>Flow
        <li>Attendees are on-boarded to STEEM through dlux</li>
        <li>Event NFT is transferred to their dlux Wallet</li>
        <li>Attendees physically search the event for AR markers with their mobile using WebXR</li>
        <li>Each marker seen by the camera signs a checks a box inside the Event NFT</li>
        <li>The Event NFT can be completed, or expire at the end of the event</li>
        <li>At completion, the NFT pays out, and the user recieves DLUX tokens, trophy NFT, or anything else</li>
        <li>At expiration, the NFT pays out according to the table for the quest progress, and returns the remainder to the event</li>
    </ul>
</article>
<article class="docs-article" id="accounts">
    <h1 class="bd-title">Account Creation Tokens</h1>
    <p></p>
</article>
<article class="docs-article" id="pinning">
    <h1 class="bd-title">Asset Pinning</h1>
    <p></p>
</article>
<article class="docs-article" id="nodes">
    <h1 class="bd-title">DLUX Node Network</h1>
    <p>dlux is the ultimate decentralized computer</p>
    <p>Out of the box dlux supports the Hive blockchain, a social media proof-of-brain system utilizing upvotes to reward content creators from a rewards pool.</p>
    <p>We offer one-click publishing to the Hive blockchain in a monetize-able vessel that pays crypto currency for upvotes.</p>
    <p>Hive functionality is built into both the 2D apps, and VR / AR scenes themselves, so for the first time people can interact with the blockchain from inside another reality.</p>
    <p>dApp's will also have the ability to utilize our IPFS infrastructure to host data from user apps. Allowing dApps to be built with no upfront infrastructure cost.</p>
    <ul>dlux.io Wallet & Sandbox
        <li>Smart Tokens</li>
        <li>Cryptographic Transactions</li>
        <li>Asset Storage, Exchange, Licensing</li>
        <li>JSON Smart Contracts</li>
    </ul>
    <ul>Encrypted Relay
        <li>P2P Free Markets</li>
        <li>Communications</li>
        <li>Side Chains</li>
    </ul>
    <ul>Custom IPFS
        <li>Pinning Service</li>
        <li>Public Node</li>
        <li>Serve Custom Data</li>
    </ul>
    <ul>Third Party APIs
        <li>Reticulum VR Chat rooms</li>
        <li>WebRTC</li>
        <li>Turn Server</li>
    </ul>
    <p>The dlux token architecture is unique in that it uses web worker nodes listening to every signed Hive Transaction (HTx) via DSTEEM (GitHub Source) to determine state. The can also perform actions on those signed HTx because the nodes have Hive Credentials (HC), which they can use to place the transaction back into the DSTEEM transaction stream.</p>
    <p>DLUX nodes form a consensus. And can even collectively hold the keys to their HIVE funding accounts using multi-signature account authorities.</p>
    <p>dlux Node listening to HTx</p>
    <ul>dlux nodes use steem-state, are super easy to run, and can do things like:
        <li>Content Management System (CMS) to build databases of private, encrypted information</li>
        <li>Internet of Things (IoT) governance such as resource management</li>
        <li>Create and sign Smart Contracts, witness transactions, hold and release escrow</li>
    </ul>
    <p>dlux nodes power the decentralized exchange, dlux Token, and dlux NFT smart contract framework.</p>
</article>
<article class="docs-article" id="api">
    <h1 class="bd-title">DLUX API</h1>
    <p>dlux is the ultimate Hive blockchain infrastructure. Not only does it publish any type of dApp you can imagine to the chain, it allows those posts to make posts!
    <h3>Token API</h3>
    <ul>Read-only, allows you to see token stats
        <li>api:port/markets //json markets (has list of api's)</li>
        <li>api:port/stats //json stats</li>
        <li>api:port/@username //json balances</li>
    Writen via customJSON messages.</ul>
    <h3>Post API</h3>
    <p>The following API allows users of your dApp to request to post new content to dlux:</p>
    <p>Triggering the following code from the XR container will prompt the dApp user to make a Hive post</p>
    <div class="bd-clipboard"><button type="button" class="btn-clipboard" title="" data-original-title="Copy to clipboard">Copy</button></div><figure class="highlight"><pre><code class="language-html" data-lang="html">
    window.parent.postMessage({
            'func': 'advPost',
            'message': postData
          }, "*");
          
    var postData = {
          title: title, //required
          body: body, //required
          permlink: permLink, //optional: will autogenerate if not supplied
          parentAuthor: '', //optional: make comments
          parentPermlink: '', //optional: make comments | change categories
          beneficiaries: {disregardfiat:1000, markegiles:1000}, //optional: incentivize yourself. (Max 3000)
          customJSON: JSON.stringify({
            tags: otherTags, // you are responsible for tags
            subApp: 'SuperCraftLoader/v0.1', //name the application that will be posted
            xr: false, //if you'd like the XR interface or 
            vrHash: 'QmbDb84sAVJYYw7qHFwiX88QRswWu8d7sf4Wr5sYWHSzJZ', //an ar or vr hash must be specified
            appSpecificData: userVar //anything else needed to make the dApp work
          }),
        }
    </code></pre></figure>
    <p>On the user's side a few items will be added to this data, such as the dlux main app and dlux beneficiary information as well as an "attorney" so users will be able to see which users dApp helped them make a this post.</p>
    <h3>Integrated Wallet</h3>
    <p>Our wallet handles HIVE assets, as well as DLUX assets.</p>
    <h3>Unified Asset View</h3>
    <ul>See all your assets in one place:
        <li>Cryptocurrency Tokens</li>
        <li>Smart Contract Non-Fungible Tokens</li>
    </ul>
    <ul>Authenticated users can perform:
        <li>Asset Transfers</li>
        <li>Escrow Transactions</li>
        <li>Voting</li>
        <li>Delegation</li>
    </ul>
    <h3>Send API</h3>
    code here
    <h3>Balance Inquiry API</h3>
    code here
</article>
<article class="docs-article" id="ipfs">
    <h1 class="bd-title">IPFS Gateway</h1>
    <p>IPFS Upload
Upload assets to IPFS from dlux.

IPFS Pinning
dlux pins content that is uploaded to IPFS and .

Others are encouraged to build competing pinning services and bid in Open Markets.

IPFS API
js-ipfs-api (GitHub Source)
    <div class="bd-clipboard"><button type="button" class="btn-clipboard" title="" data-original-title="Copy to clipboard">Copy</button></div><figure class="highlight"><pre><code class="language-html" data-lang="html">
    const ipfs = window.IpfsApi({ host: 'ipfs.infura.io', port: '5001', protocol: 'https'}) // Connect to IPFS
        const buf = buffer.Buffer(reader.result) // Convert data into buffer
        ipfs.files.add(buf, (err, result) => { // Upload buffer to IPFS
          if(err) {
            console.error(err)
            return
          }
          let url = `https://dlux.io/ipfs/${result[0].hash}`
                            console.log(`Url --> ${url}`)
    </code></pre></figure>
    <p>IPFS Oracles are hosting nodes that pin assets to storage.</p>
    <p>Others are encouraged to provide services and bid the cost down, just like on AWS (Amazon Web Services).</p>
    <p>Here is a data structure for our IPFS pinning service:</p>
    <div class="bd-clipboard"><button type="button" class="btn-clipboard" title="" data-original-title="Copy to clipboard">Copy</button></div><figure class="highlight"><pre><code class="language-html" data-lang="html">
    stats: {
        hashLastIBlock: '',
        tokensSupply: 100000000000,
        interestsRate: 5000,
        nodeRate: 10000,
        IPFSRate: 20000,
        relayRate: 10000,
        contributorRate: 20000,
        savingsRate: 10000,
        marketingRate: 20000,
        contentRate: 10000,
        currationRate: 25000
      },
  markets: {
    node: {
      'dlux-io': {
        domain: 'https://dlux-token.herokuapp.com',
        blocksBehind: 0,
        bidRate: 10000
      }
    },
    ipfs: {
      'dlux-io': {
        domain: 'https://ipfs.dlux.io',
        alive: 0,
        bidRate: 20000,
        kbStored: 0
      }
    },
    relay: {
      'dlux-io': {
        domain: 'https://chat.dlux.io',
        alive: 1,
        bidRate: 10000
      }
    },
    contributors: {
      'disregardfiat': {
        bidRate: 0
      },
      'markegiles': {
        bidRate: 0
      }
    }
  }
}
    </code></pre></figure>
    <h3>How it works</h3>
    <p>All participating witness nodes bid, and the lowest 20 bids are averaged to determine the price. Reward tokens are paid out equally. The program verifies your service is online, and tokens are distributed from the rewards pool per kb stored.</p>
    <ul>Call dlux-token for stats
        <li>dlux-token returns the preferred IPFS nodes you can upload to</li>
        <li>Upload event happens, program records kbs data transfer</li>
        <li>kb/reward amount paid out from rewards pool</li>
    </ul>
</article>
<article class="docs-article" id="hive">
    <h1 class="bd-title">Hive Integrations</h1>
    <p>The Hive blockchain provides our foundation through authentication.</p>
    <ul>It has two forms of currency tokens, HIVE and Hive Backed Dollars (HBD):
        <li>HBD is a peg to USD</li>
        <li>HIVE can be powered up, into Hive Power, which gives the Hive Account more stake on the Hive Network, this can also be delegated risk free.</li>
    </ul>
    <p>Running a Hivemind witness node would allow dlux to run plugins that monitor HIVE data, which would allow for things like search, and notifications. Currently this is part of our roadmap.</p>
</article>
</div>
</main>
      </div>
    </div>
<script>
$('#expand').on('click', function () {
$('#accordion .collapse').collapse('show');
});
$('#collapse').on('click', function () {
$('#accordion .collapse').collapse('hide');
});
checkCookie()
</script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.js"></script>
<script type="text/javascript"> docsearch({
apiKey: '61a41f1f483bb427deded79575d31c9a',
indexName: 'dlux',
inputSelector: '#search-input',
debug: false // Set debug to true if you want to inspect the dropdown
});
</script>

</body></html>
