<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>dlux User Dashboard</title>
  <!-- Common -->  
  <link href="../css/bootstrap-4.4.1.css" rel="stylesheet">
  <link href="../css/dlux.scss" rel="stylesheet" type="text/css">
  <script src="../js/session.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="https://kit.fontawesome.com/0f693ffc58.js" crossorigin="anonymous"></script>
  <!-- Dashboard -->  
  <link href="../css/dashboard.css" rel="stylesheet">
  <script src="https://unpkg.com/feather-icons"></script>
  <script src="https://aframe.io/releases/1.0.3/aframe.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
  <style type="text/css">
  /* Chart.js */
  @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}
  </style>
  </head>
	
  <body>
        <div class="modal fade" id="connectionsModal" tabindex="11" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-full modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add a connection:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body p-4" id="CMresult">
                <hr>
				<a href="#">
				<h4><strong>Steem Wallet</strong></h4>
				<p>Sign in with your Steem account for access to DLUX and STEEM</p></a>
				<hr>
				
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">DONE</button>
            </div>
        </div>
    </div>
</div>
  	<!-- body code goes here -->
 <?php include '../modules/nav.php';?>

<div class="container-fluid mt-5 text-white">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" >
              <span data-feather="home"></span>
              Home <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="avatar-tab" data-toggle="tab" href="#avatar" role="tab" aria-controls="avatar" aria-selected="true">
              <span data-feather="github"></span>
              Avatar
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="items-tab" data-toggle="tab" href="#items" role="tab" aria-controls="items">
              <span data-feather="star"></span>
              Items
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" id="videos-tab" data-toggle="tab" href="#videos" role="tab" aria-controls="videos">
              <span data-feather="youtube"></span>
              Videos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="scenes-tab" data-toggle="tab" href="#scenes" role="tab" aria-controls="scenes">
              <span data-feather="layers"></span>
            Scenes
          </a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings">
              <span data-feather="settings"></span>
              Settings
            </a>
          </li>
			<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">CONNECTIONS
           <a class="d-flex align-items-center text-muted" href="#connectionsModal" data-toggle="modal" aria-label="Add a new connection"><span data-feather="plus-circle"></span></a></h6>
			<li class="nav-item">
            <a class="nav-link" id="steem-wallet-tab" data-toggle="tab" href="#steem-wallet" role="tab" aria-controls="steem-wallet">
              <span data-feather="coffee"></span>
              HIVE Wallet
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="dlux-wallet-tab" data-toggle="tab" href="#dlux-wallet" role="tab" aria-controls="dlux-wallet">
              <span data-feather="codesandbox"></span>
              DLUX Wallet
            </a>
          </li>
			
        </ul>

        <ul class="nav flex-column mb-2">
          
			
        </ul>
      </div>
    </nav>
	 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"> 
	  <div class="tab-content">
	 
		  	 <!-- Home Tab -->
 <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Home</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Invite</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-toggle="dropdown">
            <span data-feather="award"></span>
            Overview
          </button>
			<div class="dropdown-menu">
    <a class="dropdown-item" href="#">All Active</a>
    <a class="dropdown-item" href="#">Leaderboards</a>
    <a class="dropdown-item" href="#">Party</a>
  </div>
        </div>
      </div>

       <div class="row">
        <div class="col-md-6 col-sm-12">
			<div class="jumbotron">
			  
			  
<h2>Welcome To DLUX</h2>
          <hr>
          <div class="row">
            <div class="col-6">
              <h4>Get to know the place</h4>
            </div>
            <div class="col-6">
              <h5 class="text-right"><span aria-hidden="true"></span> Started Jan 2020</h5>
            </div>
          </div>
          <h5><span class="badge badge-secondary">Welcome</span></h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, recusandae, corporis, tempore nam fugit deleniti sequi excepturi quod repellat laboriosam soluta laudantium amet dicta non ratione distinctio nihil dignissimos esse!</p>
          </div>
			</div>
        <div class="col-md-6 col-sm-12">
          <h2>Progress</h2>
          <hr>
          <div class="progress mt-4">
            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%"> DAILY CHECK IN</div>
          </div>
          <div class="progress mt-4">
            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"> COMPLETE PROFILE</div>
          </div>
          <div class="progress mt-4">
            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%"> CONNECT WALLETS</div>
          </div>
          <div class="progress mt-4">
            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"> SHARE ON SOCIAL</div>
          </div>
          <div class="progress mt-4">
            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%"> ACCEPT QUESTS</div>
          </div>
          <div class="progress mt-4">
            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%"> VR VIDEO</div>
          </div>
          <div class="progress mt-4">
            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%"> XR SCENE</div>
          </div>
        </div>
      </div>
	 
      <h2>New Quests Available</h2>
	 <hr>
	 <div class="container testimonial-group">
	 		<div class="row mt-2 text-center flex-nowrap" data-binding-id="repeat3" data-binding-repeat-children="{{quests.items}}">
          <div class="col-lg-4 col-md-6 col-sm-12 text-center col-quests">
            <a href="{{link}}" target="_blank"><img src="../images/140X140.gif" alt="140x140" class="rounded-circle mt-4" style="width: 140px; height: 140px;" data-holder-rendered="true" data-binding-src="{{media.m}}"></a>
            <h3>{{title}}</h3>
            <p>{{date_taken}}</p>
          </div>
        </div>
	 </div>
	 
	 <h2 class="mt-4">Posts And Updates</h2>
	 <hr>
	  <div class="container">
      <div class="row">
            <div class="col-sm-4 col-12">
              <div class="card">
                <img class="card-img-top" src="../images/400X200.gif" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">360 Video Vacation</h5>
                  <p class="card-text">My family gets out of control on our yearly trip to exotic places. Stream it at Platform, the only place for premium VR video.</p>
                  <a href="#" class="btn btn-primary"><i class="fas fa-external-link-alt"></i> Platform</a>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-12">
              <div class="card">
                <img class="card-img-top" src="../images/400X200.gif" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Duman Gallery VR</h5>
                  <p class="card-text">Free to view on mobile, desktop, and headset. You won't believe your eyes when you see.</p>
                  <a href="#" class="btn btn-primary"><i class="fas fa-external-link-alt"></i> WebVR</a>
                </div>
              </div>
            </div>
			  <div class="col-sm-4 col-12">
              <div class="card">
                <img class="card-img-top" src="../images/400X200.gif" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Duman Gallery VR</h5>
                  <p class="card-text">Free to view on mobile, desktop, and headset. You won't believe your eyes when you see.</p>
                  <a href="#" class="btn btn-primary"><i class="fas fa-external-link-alt"></i> WebVR</a>
                </div>
              </div>
            </div>
          </div>
		  
          <div class="row">
            <div class="col-sm-4 col-12">
              <div class="card">
                <img class="card-img-top" src="../images/400X200.gif" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">VR Chat Room</h5>
                  <p class="card-text">Pick a spot and invite your friends. Works in Oculus Quest browser. It includes touch support for hands. Play games.</p>
                  <a href="#" class="btn btn-primary"><i class="fas fa-external-link-alt"></i> WebVR</a>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-12">
              <div class="card">
                <img class="card-img-top" src="../images/400X200.gif" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">3D 180 </h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary"><i class="fas fa-external-link-alt"></i> Platform</a>
                </div>
              </div>
            </div>
			  <div class="col-sm-4 col-12">
              <div class="card">
                <img class="card-img-top" src="../images/400X200.gif" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">3D 180 </h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary"><i class="fas fa-external-link-alt"></i> Platform</a>
                </div>
              </div>
            </div>
          </div>
        </div>
		  </div>
		  
		  <!-- Avatar Tab -->
	    <div class="tab-pane fade show" id="avatar" role="tabpanel" aria-labelledby="avatar-tab">
			<div class="alert alert-danger alert-dismissible text-center">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <a href="#" class="alert-link">The dlux Avatar builder is under construction. Have a look around and let us know what you think!</a>
</div>
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<h1 class="h2">Avatar</h1>
			<div class="float-right btn-group btn-group-sm">
		  <ul class="nav">
    <li class="nav-item">
        <a href="#avatar-design" class="btn-sm btn-outline-secondary nav-link active mr-2" data-toggle="tab"><span data-feather="grid"></span> Design</a>
    </li>
    <li class="nav-item">
        <a href="#avatar-upload" class="btn-sm btn-outline-secondary nav-link mr-2" data-toggle="tab"><span data-feather="plus-square"></span> Import</a>
    </li>
    <li class="nav-item">
        <a href="#avatar-download" class="btn-sm btn-outline-secondary nav-link mr-2" data-toggle="tab"><span data-feather="box"></span> Export</a>
    </li>
</ul>
		</div>
		</div>		
<div class="tab-content">
	<!-- must be active for XR to display -->
    <div class="tab-pane fade show active" id="avatar-design">
		<div id="container">
			<div class="row">
			  <div class="col-xl-8">
				<div class="container">
				  <div class="row">
				    
					  
					  <div class="container-fluid">
					    <ul id="avatar-nav" class="nav nav-pills" role="tablist" style="text-align: center">
					      <li class="nav-item"> <a class="nav-link active" href="#avatar-body" id="avatar-body-tab" role="tab" data-toggle="tab" aria-controls="avatar-body" aria-expanded="true"><i class="fas fa-universal-access"></i><br>BODY</a> </li>
					      <li class="nav-item"> <a class="nav-link" href="#avatar-face" role="tab" id="avatar-face-tab" data-toggle="tab" aria-controls="avatar-face"><i class="fas fa-smile-beam"></i><br>FACE</a> </li>
						  <li class="nav-item"> <a class="nav-link" href="#avatar-hair" role="tab" id="avatar-hair-tab" data-toggle="tab" aria-controls="avatar-hair"><i class="fas fa-spray-can"></i><br>HAIR</a> </li>
						  <li class="nav-item"> <a class="nav-link" href="#avatar-hat" role="tab" id="avatar-hat-tab" data-toggle="tab" aria-controls="avatar-hat"><i class="fas fa-hat-wizard"></i><br>HAT</a> </li>
						  <li class="nav-item"> <a class="nav-link" href="#avatar-shirt" role="tab" id="avatar-shirt-tab" data-toggle="tab" aria-controls="avatar-shirt"><i class="fas fa-tshirt"></i><br>SHIRT</a> </li>
						  <li class="nav-item"> <a class="nav-link" href="#avatar-shoes" role="tab" id="avatar-shoes-tab" data-toggle="tab" aria-controls="avatar-shoes"><i class="fas fa-shoe-prints"></i><br>SHOES</a> </li>
						  <li class="nav-item"> <a class="nav-link" href="#avatar-accessories" role="tab" id="avatar-accessories-tab" data-toggle="tab" aria-controls="avatar-accessories"><i class="fab fa-jedi-order"></i><br>ACCESSORIES</a> </li>
					    </ul>
					    <!-- Content Panel -->
					    <div id="avatar-content" class="tab-content mt-4">
					      <div role="tabpanel" class="tab-pane fade show active" id="avatar-body" aria-labelledby="avatar-body-tab">
					       <div class="mt-4">
							  <h6 >COLOR</h6>
							 	<ul class="list-group list-group-horizontal">
                    			<li id="color0" class="active">
                        			
                    			</li>
                    			<li id="color1">
                        			
                    			</li>
                    			<li id="color2">
                        			
                    			</li>
                  				</ul>
							</div>  
							  <div class="mt-4">
							  <h6 >SHAPE</h6>
							 	<ul class="list-group list-group-horizontal">
                   				 <li id="shape0">
                       				 
                    			</li>
                    			<li id="shape1" class="active">
                        			
                    			</li>
                    			<li id="shape2">
                        			
                    			</li>
                  				</ul>
							</div>  
					        </div>
					      <div role="tabpanel" class="tab-pane fade" id="avatar-face" aria-labelledby="avatar-face-tab">
					        <div class="container-fluid">
					          <ul id="avatar-face-nav" class="nav nav-tabs" role="tablist">
					            <li class="nav-item"> <a class="nav-link active" href="#face-eyebrows" id="face-eyebrows-tab" role="tab" data-toggle="tab" aria-controls="face-eyebrows" aria-expanded="true">Eyebrows</a> </li>
					            <li class="nav-item"> <a class="nav-link" href="#face-eyes" role="tab" id="face-eyes-tab" data-toggle="tab" aria-controls="face-eyes">Eyes</a> </li>
					            <li class="nav-item"> <a class="nav-link" href="#face-mouth" role="tab" id="face-mouth-tab" data-toggle="tab" aria-controls="face-mouth">Mouth</a> </li>
								<li class="nav-item"> <a class="nav-link" href="#face-facial-hair" role="tab" id="face-facial-hair-tab" data-toggle="tab" aria-controls="face-facial-hair">Facial Hair</a> </li>
								<li class="nav-item"> <a class="nav-link" href="#face-glasses" role="tab" id="face-glasses-tab" data-toggle="tab" aria-controls="face-glasses">Glasses</a> </li>
					            </ul>
					          <!-- Content Panel -->
					          <div id="avatar-face-content" class="tab-content mt-4">
					            <div role="tabpanel" class="tab-pane fade show active" id="face-eyebrows" aria-labelledby="face-eyebrows-tab">
					              <p>Eyebrows</p>
					              </div>
					            <div role="tabpanel" class="tab-pane fade" id="face-eyes" aria-labelledby="face-eyes-tab">
					              <p>Eyes</p>
					              </div>
					            <div role="tabpanel" class="tab-pane fade" id="face-mouth" aria-labelledby="face-mouth-tab">
					              <p>Mouth</p>
					              </div>
					            <div role="tabpanel" class="tab-pane fade" id="face-facial-hair" aria-labelledby="face-facial-hair-tab">
					              <p>Facial Hair</p>
					              </div>
								  <div role="tabpanel" class="tab-pane fade" id="face-glasses" aria-labelledby="face-glasses-tab">
					              <p>Glasses</p>
					              </div>
					            </div>
					          </div>
                          </div>
					      <div role="tabpanel" class="tab-pane fade" id="avatar-hair" aria-labelledby="avatar-hair-tab">
					        <div class="mt-4">
							  <h6 >COLOR</h6>
							 	<ul class="list-group list-group-horizontal">
                    			<li id="color0" class="active">
                        			
                    			</li>
                    			<li id="color1">
                        			
                    			</li>
                    			<li id="color2">
                        			
                    			</li>
                  				</ul>
							</div>  
							  <div class="mt-4">
							  <h6 >SHAPE</h6>
							 	<ul class="list-group list-group-horizontal">
                   				 <li id="shape0">
                       				 
                    			</li>
                    			<li id="shape1" class="active">
                        			
                    			</li>
                    			<li id="shape2">
                        			
                    			</li>
                  				</ul>
							 
							</div>
					        </div>
					      <div role="tabpanel" class="tab-pane fade" id="avatar-hat" aria-labelledby="avatar-hat-tab">
					        <p>Hat</p>
					        </div>
							<div role="tabpanel" class="tab-pane fade" id="avatar-shirt" aria-labelledby="avatar-shirt-tab">
					        <p>Shirt</p>
					        </div>
							<div role="tabpanel" class="tab-pane fade" id="avatar-shoes" aria-labelledby="avatar-shoes-tab">
					        <p>Shoes</p>
					        </div>
							<div role="tabpanel" class="tab-pane fade" id="avatar-accessories" aria-labelledby="avatar-accessories-tab">
					        <p>Accessories</p>
					        </div>
					      </div>
					    </div>
                  </div>
                </div>
              </div>
			  <div class="col-xl-4">
				  <div id="content3D">
                <a-scene antialias="true" embedded>
                  <a-assets>
                    <img id="skymap" src="assets/images/sky.jpg" crossorigin="anonymous" alt="">
                    <img id="floor" src="assets/images/floor.jpg" crossorigin="anonymous" alt="">
                  </a-assets>
                  <a-light type="point" light="color: #fff; intensity:0.5" position="3 10 1"></a-light>
                  <a-light type="point" light="color: #fff; intensity:0.1" position="-3 10 0"></a-light>
                  <a-light type="hemisphere" groundcolor="#888" intensity="0.8"></a-light>
            
                  <a-entity id="ground" geometry="primitive: box; width: 12; height: 0.01; depth: 12" material="shader:flat; src: #floor" xr="ar: false"></a-entity>
                  <a-entity id="cameraRig">
                    <!-- camera -->
                    <a-entity id="acamera" camera position="0 1.2 0" look-controls></a-entity>
                    <!-- hand controls -->
                    <a-entity id="left-hand" store-controls="hand: left" laser-controls="hand: left" raycaster="objects: .collidable" xr="ar: false"></a-entity>
                    <a-entity id="right-hand" store-controls="hand: right" laser-controls="hand: right" raycaster="objects: .collidable" line="color: #118A7E" xr="ar: false"></a-entity>
                  </a-entity>
                  <!-- Meshes -->
                  <a-entity class="collidable" id="avatarModel" position="0 1.3 -1.5" rotation="180 0 180">
					  <a-entity>
            			<a-entity geometry="primitive: sphere" material="color:#21FFB5" scale="0.45 0.5 0.4"></a-entity>
            			<a-entity position="0 0.05 0">
              				<a-entity geometry="primitive: sphere" class="eye" material="color:#efefef" position="0.16 0.1 -0.35" scale="0.12 0.12 0.12">
                				<a-entity geometry="primitive: sphere" class="pupil"  material="color:#000;" position="0 0 -1" scale="0.2 0.2 0.2"></a-entity>
             				 </a-entity>
              				<a-entity geometry="primitive: sphere" class="eye"  material="color:#efefef" position="-0.16 0.1 -0.35" scale="0.12 0.12 0.12">
               				 	<a-entity geometry="primitive: sphere" class="pupil" material="color:#000;" position="0 0 -1" scale="0.2 0.2 0.2"></a-entity>
             				 </a-entity>
           				 </a-entity>
          			</a-entity>
                </a-entity>
                  <a-entity id="sky" geometry="primitive:sphere; radius:30; phiLength:360; phiStart:0; thetaLength:90" material="shader:flat; side:back; height:2048; src:#skymap; width:2048" xr="ar: false"></a-entity>
                  <a-entity id="skyFloor" geometry="primitive:sphere; radius:30; phiLength:360; phiStart:0; thetaLength:90; thetaStart: 90" material="shader:flat; color: white; side:back; height:2048; width:2048" xr="ar: false"></a-entity>
                  <a-entity reticle geometry="primitive: ring; radiusInner: 0.04; radiusOuter: 0.05" material="color: #ffffff"></a-entity>
                </a-scene>
              </div>
				</div>
			  </div>
			
      </div>
		</div>
	
	
	<div class="tab-pane fade show " id="avatar-upload">
       <div class="container">
		   <p>Upload a 3D model to use as your Avatar</p>
			</div>
		  </div>
	
	<div class="tab-pane fade show " id="avatar-download">
       <div class="container">
		   <p>Export and share your Avatar</p>
			</div>
		  </div>
			</div>
		  </div>
	
 <!-- Items Tab -->
	    <div class="tab-pane fade show " id="items" role="tabpanel" aria-labelledby="items-tab">
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<h1 class="h2">Items</h1>
			<div class="float-right btn-group btn-group-sm">
		  <ul class="nav">
    <li class="nav-item">
        <a href="#items-browse" class="btn-sm btn-outline-secondary nav-link active mr-2" data-toggle="tab"><span data-feather="gift"></span> Browse</a>
    </li>
    <li class="nav-item">
        <a href="#items-make" class="btn-sm btn-outline-secondary nav-link mr-2" data-toggle="tab"><span data-feather="zap"></span> Forge</a>
    </li>
    <li class="nav-item">
        <a href="#items-inventory" class="btn-sm btn-outline-secondary nav-link mr-2" data-toggle="tab"><span data-feather="archive"></span> Inventory</a>
    </li>
</ul>
		</div>
		</div>		
<div class="tab-content">
	
    <div class="tab-pane fade show active" id="items-browse">
       <div class="container">
			  <div class="row" data-binding-repeat-children="{{photo.items}}" data-binding-id="repeat1">
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12"> 
				<div class="card mb-2"><img src="../images/card-img.png" alt="Card image cap" class="card-img-top img-fluid" data-binding-src="{{media.m}}">
		      <div class="card-body">
		        <h5 class="card-title">{{title}}		        </h5>
		        <a href="{{link}}" class="btn btn-primary" target="_blank">Get It</a> </div>
		      </div>
			</div>
			  </div>
		  
		  <div class="text-center mt-4"><p><a href="#">Show More</a></p></div>
      </div>
	</div>
	
	<div class="tab-pane fade show " id="items-make">
       <div class="container">
		   <p>Make an item</p>
			</div>
		  </div>
	
	<div class="tab-pane fade show " id="items-inventory">
       <div class="container">
		   <p>All of your items</p>
			</div>
		  </div>
			</div>
		  </div>
		  
		<!-- Videos Tab -->
	<div class="tab-pane fade show " id="videos" role="tabpanel" aria-labelledby="videos-tab">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<h1 class="h2">Videos</h1>
			<div class="float-right btn-group btn-group-sm">
		  <ul class="nav">
    <li class="nav-item">
        <a href="#videos-watch" class="btn-sm btn-outline-secondary nav-link active mr-2" data-toggle="tab"><span data-feather="tv"></span> Watch</a>
    </li>
    <li class="nav-item">
        <a href="#videos-upload" class="btn-sm btn-outline-secondary nav-link mr-2" data-toggle="tab"><span data-feather="upload"></span> Upload</a>
    </li>
    <li class="nav-item">
        <a href="#videos-library" class="btn-sm btn-outline-secondary nav-link mr-2" data-toggle="tab"><span data-feather="book-open"></span> Library</a>
    </li>
</ul>
		</div>
		</div>		
<div class="tab-content">
    <div class="tab-pane fade show active" id="videos-watch">
       <div class="container">
      <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel" style="background-color: grey">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active"> <img class="d-block mx-auto" src="../images/Carousel_Placeholder.png" alt="First slide">
            <div class="carousel-caption">
              <h5>First slide Heading</h5>
              <p>First slide Caption</p>
            </div>
          </div>
          <div class="carousel-item"> <img class="d-block mx-auto" src="../images/Carousel_Placeholder.png" alt="Second slide">
            <div class="carousel-caption">
              <h5>Second slide Heading</h5>
              <p>Second slide Caption</p>
            </div>
          </div>
          <div class="carousel-item"> <img class="d-block mx-auto" src="../images/Carousel_Placeholder.png" alt="Third slide">
            <div class="carousel-caption">
              <h5>Third slide Heading</h5>
              <p>Third slide Caption</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> 
		</div>
		
<div class="row text-center mt-4" data-binding-id="repeat2" data-binding-repeat-children="{{videos.items}}">
  <div class="col-md-4 pb-1 pb-md-0">
          <a href="{{link}}" target="_blank"><div class="card mb-2">
            <img src="../images/400X200.gif" alt="Card image cap" class="card-img-top" data-binding-src="{{media.m}}">
            <div class="card-body">
      <h6>{{title}} </h6>    
            </div>
          </div></a>
        </div> 
        </div>
         
		 <div class="text-center mt-4"><p><a href="#">Show More</a></p></div>
			 </div>
	    </div>
    <!-- Video Uploads -->
    <div class="tab-pane fade" id="videos-upload">
		<div class="container">
      <div class="panel panel-default">
        <div class="panel-heading"><strong>Supports</strong> <small>HEVC (H.265) up to 4K 60 FPS (4096x2160)</small></div>
        <div class="panel-body">

          <!-- Standar Form -->
          <h4 class="mt-4">Select</h4>
          <form action="" method="put" enctype="multipart/form-data" id="js-upload-form">
            <div class="form-inline">
              <div class="form-group">
                <input type="file" name="files[]" onchange="updatePreflight()" id="js-upload-files">
              </div>
              <button onclick="uploadSec()" class="btn btn-sm btn-primary" id="js-upload-submit">Upload files</button>
            </div>
          </form>

          <!-- Drop Zone -->
          <h4 class="mt-4">Drag and Drop</h4>
          <div class="upload-drop-zone" id="drop-zone">
            Just drag and drop files here
          </div>

          <!-- Progress Bar -->
          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
              <span class="sr-only">60% Complete</span>
            </div>
          </div>

          <!-- Upload Finished -->
          <div class="js-upload-finished mt-4">
            <h3>Processed files</h3>
            <div class="list-group">
              <a href="#" class="list-group-item list-group-item-success"><span class="badge alert-success pull-right">Success</span>wakeboarding-trip.mov</a>
              <a href="#" class="list-group-item list-group-item-success"><span class="badge alert-success pull-right">Success</span>skydiving.mov</a>
            </div>
          </div>
        </div>
      </div>
    </div>    
	</div>
	 <!-- Library -->
    <div class="tab-pane fade" id="videos-library">
        <p>Library tab content ...</p>
    </div>
</div>
		  
		 </div>
		 
	 
		  <!-- Scenes Tab -->
		   <div class="tab-pane fade show " id="scenes" role="tabpanel" aria-labelledby="scenes-tab">
    
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Scenes</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Upload</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Build</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-toggle="dropdown">
            <span data-feather="box"></span>
            My Models
          </button>
			<div class="dropdown-menu">
    <a class="dropdown-item" href="#">Purchased</a>
    <a class="dropdown-item" href="#">Uploaded</a>
    <a class="dropdown-item" href="#">Shared</a>
  </div>
        </div>
      </div>

     <div class="container">
       <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel" style="background-color: grey">
         <ol class="carousel-indicators">
           <li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
           <li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
           <li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
         </ol>
         <div class="carousel-inner" role="listbox">
           <div class="carousel-item active"> <img class="d-block mx-auto" src="../images/Carousel_Placeholder.png" alt="First slide">
             <div class="carousel-caption">
               <h5>First slide Heading</h5>
               <p>First slide Caption</p>
             </div>
           </div>
           <div class="carousel-item"> <img class="d-block mx-auto" src="../images/Carousel_Placeholder.png" alt="Second slide">
             <div class="carousel-caption">
               <h5>Second slide Heading</h5>
               <p>Second slide Caption</p>
             </div>
           </div>
           <div class="carousel-item"> <img class="d-block mx-auto" src="../images/Carousel_Placeholder.png" alt="Third slide">
             <div class="carousel-caption">
               <h5>Third slide Heading</h5>
               <p>Third slide Caption</p>
             </div>
           </div>
         </div>
         <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> 
		 </div>
		 
<div class="row text-center mt-4">
  <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="../images/400X200.gif" alt="Card image cap">
            <div class="card-body">
      <h6>AR Scene</h6>    
            </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="../images/400X200.gif" alt="Card image cap">
            <div class="card-body">
            <h6>VR Scene</h6> 
		  </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="../images/400X200.gif" alt="Card image cap">
            <div class="card-body">
            <h6>VR Scene</h6>  
            </div>
          </div>
        </div>
    </div>
		 
		 <div class="row text-center mt-4">
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="../images/400X200.gif" alt="Card image cap">
            <div class="card-body">
      <h6>VR Scene</h6>    
            </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="../images/400X200.gif" alt="Card image cap">
            <div class="card-body">
            <h6>AR Scene</h6> 
		  </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="../images/400X200.gif" alt="Card image cap">
            <div class="card-body">
            <h6>AR Scene</h6>  
            </div>
          </div>
        </div>
      </div>
		 <div class="text-center mt-4"><p><a href="#">Show More</a></p></div>
		     </div>
			   
      <div class="mt-4"><h2>3D Models</h2>
      </div>
			   <hr>
             <div class="container">
			   <div class="row">
			     <div class="card col-md-3"> <img class="card-img-top img-fluid rounded" src="../images/card-img.png" alt="Card image cap">
			       <div class="card-body">
			         <h5 class="card-title">USDZ</h5>
					 </div>
		         </div>
			     <div class="card col-md-3"> <img class="card-img-top img-fluid rounded" src="../images/card-img.png" alt="Card image cap">
			       <div class="card-body">
			         <h5 class="card-title">GLTF</h5>
				   </div>
		         </div>
			     <div class="card col-md-3"> <img class="card-img-top img-fluid rounded" src="../images/card-img.png" alt="Card image cap">
			       <div class="card-body">
			         <h5 class="card-title">OBJ</h5>
				   </div>
		         </div>
			     <div class="card col-md-3"> <img class="card-img-top img-fluid rounded" src="../images/card-img.png" alt="Card image cap">
			       <div class="card-body">
			         <h5 class="card-title">Collada</h5>
			         </div>
		         </div>
		       </div>
				 
				 <div class="row mt-4">
			     <div class="card col-md-3"> <img class="card-img-top img-fluid rounded" src="../images/card-img.png" alt="Card image cap">
			       <div class="card-body">
			         <h5 class="card-title">USDZ</h5>
					 </div>
		         </div>
			     <div class="card col-md-3"> <img class="card-img-top img-fluid rounded" src="../images/card-img.png" alt="Card image cap">
			       <div class="card-body">
			         <h5 class="card-title">GLTF</h5>
				   </div>
		         </div>
			     <div class="card col-md-3"> <img class="card-img-top img-fluid rounded" src="../images/card-img.png" alt="Card image cap">
			       <div class="card-body">
			         <h5 class="card-title">OBJ</h5>
				   </div>
		         </div>
			     <div class="card col-md-3"> <img class="card-img-top img-fluid rounded" src="../images/card-img.png" alt="Card image cap">
			       <div class="card-body">
			         <h5 class="card-title">Collada</h5>
			         </div>
		         </div>
		       </div>
				 
			   <div class="row mt-4">
			     <div class="card col-md-3"> <img class="card-img-top img-fluid rounded" src="../images/card-img.png" alt="Card image cap">
			       <div class="card-body">
			         <h5 class="card-title">USDZ</h5>
				   </div>
		         </div>
			     <div class="card col-md-3"> <img class="card-img-top img-fluid rounded" src="../images/card-img.png" alt="Card image cap">
			       <div class="card-body">
			         <h5 class="card-title">GLTF</h5>
				   </div>
		         </div>
			     <div class="card col-md-3"> <img class="card-img-top img-fluid rounded" src="../images/card-img.png" alt="Card image cap">
			       <div class="card-body">
			         <h5 class="card-title">OBJ</h5>
				   </div>
		         </div>
			     <div class="card col-md-3"> <img class="card-img-top img-fluid rounded" src="../images/card-img.png" alt="Card image cap">
			       <div class="card-body">
			         <h5 class="card-title">Collada</h5>
		           </div>
		         </div>
		       </div>
				 
             </div>
		     <div class="text-center mt-4"><p><a href="#">Show More</a></p></div>
        </div>
		
		  	 <!-- Settings Tab -->
		   <div class="tab-pane fade show " id="settings" role="tabpanel" aria-labelledby="settings-tab">

      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Settings</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>


    <div class="container">
  <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4 rounded" src="../images/dluxcolorlogo.png" alt="" width="72" height="72">
    <h2>Manage Payment and Subscriptions</h2>
    <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
  </div>

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your subscriptions</span>
        <span class="badge badge-secondary badge-pill">3</span>
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Fov Tube</h6>
            <small class="text-muted">360 video streaming</small>
          </div>
          <span class="text-muted">$12</span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Web hosting</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$8</span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Node security</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$5</span>
        </li>
        <li class="list-group-item d-flex justify-content-between bg-light">
          <div class="text-success">
            <h6 class="my-0">Promo code</h6>
            <small>EXAMPLECODE</small>
          </div>
          <span class="text-success">-$5</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (USD)</span>
          <strong>$20</strong>
        </li>
      </ul>

      <form class="card p-2">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Promo code">
          <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
      <form class="needs-validation" novalidate>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="username">Username</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">@</span>
            </div>
            <input type="text" class="form-control" id="username" placeholder="Username" required>
            <div class="invalid-feedback" style="width: 100%;">
              Your username is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Email <span class="text-muted">(Optional)</span></label>
          <input type="email" class="form-control" id="email" placeholder="you@example.com">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>

        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

        <div class="mb-3">
          <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
          <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
        </div>

        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="country">Country</label>
            <select class="custom-select d-block w-100" id="country" required>
              <option value="">Choose...</option>
              <option>United States</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid country.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="state">State</label>
            <select class="custom-select d-block w-100" id="state" required>
              <option value="">Choose...</option>
              <option>California</option>
            </select>
            <div class="invalid-feedback">
              Please provide a valid state.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="zip">Zip</label>
            <input type="text" class="form-control" id="zip" placeholder="" required>
            <div class="invalid-feedback">
              Zip code required.
            </div>
          </div>
        </div>
        <hr class="mb-4">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="same-address">
          <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
        </div>
        
        <hr class="mb-4">

        <h4 class="mb-3">Payment</h4>

        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
            <label class="custom-control-label" for="credit">DLUX</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="debit">STEEM</label>
          </div>
        </div>
       
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Save</button>
      </form>
    </div>
  </div>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017-2019 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>
      
		</div>
		 
		  <!-- STEEM Tab -->
		 <div class="tab-pane fade show " id="steem-wallet" role="tabpanel" aria-labelledby="steem-wallet-tab">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">STEEM Token</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Buy</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Sell</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-toggle="dropdown">
            <span data-feather="calendar"></span>
            This Week
          </button>
			<div class="dropdown-menu">
    <a class="dropdown-item" href="#">This Month</a>
    <a class="dropdown-item" href="#">This Year</a>
    <a class="dropdown-item" href="#">All Time</a>
  </div>
        </div>
      </div>

      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

      <h2>Order Book</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Header</th>
              <th>Header</th>
              <th>Header</th>
              <th>Header</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1,001</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>dolor</td>
              <td>sit</td>
            </tr>
            <tr>
              <td>1,002</td>
              <td>amet</td>
              <td>consectetur</td>
              <td>adipiscing</td>
              <td>elit</td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>Integer</td>
              <td>nec</td>
              <td>odio</td>
              <td>Praesent</td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>libero</td>
              <td>Sed</td>
              <td>cursus</td>
              <td>ante</td>
            </tr>
            <tr>
              <td>1,004</td>
              <td>dapibus</td>
              <td>diam</td>
              <td>Sed</td>
              <td>nisi</td>
            </tr>
            <tr>
              <td>1,005</td>
              <td>Nulla</td>
              <td>quis</td>
              <td>sem</td>
              <td>at</td>
            </tr>
            <tr>
              <td>1,006</td>
              <td>nibh</td>
              <td>elementum</td>
              <td>imperdiet</td>
              <td>Duis</td>
            </tr>
            <tr>
              <td>1,007</td>
              <td>sagittis</td>
              <td>ipsum</td>
              <td>Praesent</td>
              <td>mauris</td>
            </tr>
            <tr>
              <td>1,008</td>
              <td>Fusce</td>
              <td>nec</td>
              <td>tellus</td>
              <td>sed</td>
            </tr>
            <tr>
              <td>1,009</td>
              <td>augue</td>
              <td>semper</td>
              <td>porta</td>
              <td>Mauris</td>
            </tr>
            <tr>
              <td>1,010</td>
              <td>massa</td>
              <td>Vestibulum</td>
              <td>lacinia</td>
              <td>arcu</td>
            </tr>
            <tr>
              <td>1,011</td>
              <td>eget</td>
              <td>nulla</td>
              <td>Class</td>
              <td>aptent</td>
            </tr>
            <tr>
              <td>1,012</td>
              <td>taciti</td>
              <td>sociosqu</td>
              <td>ad</td>
              <td>litora</td>
            </tr>
            <tr>
              <td>1,013</td>
              <td>torquent</td>
              <td>per</td>
              <td>conubia</td>
              <td>nostra</td>
            </tr>
            <tr>
              <td>1,014</td>
              <td>per</td>
              <td>inceptos</td>
              <td>himenaeos</td>
              <td>Curabitur</td>
            </tr>
            <tr>
              <td>1,015</td>
              <td>sodales</td>
              <td>ligula</td>
              <td>in</td>
              <td>libero</td>
            </tr>
          </tbody>
        </table>
      </div>
   
	  </div>
		 
		  	 <!-- DLUX Tab -->
		 <div class="tab-pane fade show " id="dlux-wallet" role="tabpanel" aria-labelledby="dlux-wallet-tab">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dlux Token</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Buy</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Sell</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-toggle="dropdown">
            <span data-feather="calendar"></span>
            This Week
          </button>
			<div class="dropdown-menu">
    <a class="dropdown-item" href="#">This Month</a>
    <a class="dropdown-item" href="#">This Year</a>
    <a class="dropdown-item" href="#">All Time</a>
  </div>
        </div>
      </div>

      <canvas class="my-4 w-100" id="myChart2" width="900" height="380"></canvas>

      <h2>Order Book</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Header</th>
              <th>Header</th>
              <th>Header</th>
              <th>Header</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1,001</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>dolor</td>
              <td>sit</td>
            </tr>
            <tr>
              <td>1,002</td>
              <td>amet</td>
              <td>consectetur</td>
              <td>adipiscing</td>
              <td>elit</td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>Integer</td>
              <td>nec</td>
              <td>odio</td>
              <td>Praesent</td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>libero</td>
              <td>Sed</td>
              <td>cursus</td>
              <td>ante</td>
            </tr>
            <tr>
              <td>1,004</td>
              <td>dapibus</td>
              <td>diam</td>
              <td>Sed</td>
              <td>nisi</td>
            </tr>
            <tr>
              <td>1,005</td>
              <td>Nulla</td>
              <td>quis</td>
              <td>sem</td>
              <td>at</td>
            </tr>
            <tr>
              <td>1,006</td>
              <td>nibh</td>
              <td>elementum</td>
              <td>imperdiet</td>
              <td>Duis</td>
            </tr>
            <tr>
              <td>1,007</td>
              <td>sagittis</td>
              <td>ipsum</td>
              <td>Praesent</td>
              <td>mauris</td>
            </tr>
            <tr>
              <td>1,008</td>
              <td>Fusce</td>
              <td>nec</td>
              <td>tellus</td>
              <td>sed</td>
            </tr>
            <tr>
              <td>1,009</td>
              <td>augue</td>
              <td>semper</td>
              <td>porta</td>
              <td>Mauris</td>
            </tr>
            <tr>
              <td>1,010</td>
              <td>massa</td>
              <td>Vestibulum</td>
              <td>lacinia</td>
              <td>arcu</td>
            </tr>
            <tr>
              <td>1,011</td>
              <td>eget</td>
              <td>nulla</td>
              <td>Class</td>
              <td>aptent</td>
            </tr>
            <tr>
              <td>1,012</td>
              <td>taciti</td>
              <td>sociosqu</td>
              <td>ad</td>
              <td>litora</td>
            </tr>
            <tr>
              <td>1,013</td>
              <td>torquent</td>
              <td>per</td>
              <td>conubia</td>
              <td>nostra</td>
            </tr>
            <tr>
              <td>1,014</td>
              <td>per</td>
              <td>inceptos</td>
              <td>himenaeos</td>
              <td>Curabitur</td>
            </tr>
            <tr>
              <td>1,015</td>
              <td>sodales</td>
              <td>ligula</td>
              <td>in</td>
              <td>libero</td>
            </tr>
          </tbody>
        </table>
      </div>
   
	  </div>
		 
		 
		 
		  </div>

		 
	 </main>
	 </div>
	  </div>
 <script type="text/javascript" src="../js/popper.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap-4.4.1.js"></script>
	   <script>
      feather.replace()
    </script>
	  <script>checkCookie()</script>
  </body>
</html>
