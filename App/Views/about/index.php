<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - About</title>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/header.php";
   include_once($path);
?>
<!--page specific-->
	<style>
		.btn-outline-fusch {
		color: #FFA300;
		border-color: #FFA300;
	}
		.middle-newsroom {
			border-right: solid;
			border-right-width: 2.5px;
			border-right-color: #191C20;
			border-left: solid;
			border-left-width: 2.5px;
			border-left-color: #191C20;
		}
		@media screen and (max-width: 991px) {
			.middle-newsroom {
			border-right: none;
			border-left: none;
			border-top: solid;
			border-top-width: 2.5px;
			border-top-color: #191C20;
			border-bottom: solid;
			border-bottom-width: 2.5px;
			border-bottom-color: #191C20;
		}
			}
	</style>
	</head>
<body class="d-flex flex-column bg-darker padme-t70" id="apps" is="dmx-app">	
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/nav.php";
   include_once($path);
?>
<main role="main" class="flex-shrink-0 text-white bg-color h-100">
  <div class="container-fluid px-0 text-center">
	  <div class="container-fluid fixed-top bg-dark" style="margin-top: 66px;">

		  <nav class="navbar navbar-dark navbar-expand-lg">
			  <div class="m-auto">
  <ul class="nav nav-tabs navbar py-0 border-bottom-0" role="tablist">
	    <li class="nav-item">
			<a class="nav-link active" id="aboutTab" role="tab" data-toggle="tab" aria-controls="about" aria-expanded="true" href="#about" >About</a></li>
	  <li class="nav-item"> 
			<a class="nav-link" id="storiesTab" role="tab" data-toggle="tab" aria-controls="stories" aria-expanded="true" href="#stories">Newsroom</a></li>
	    <li class="nav-item"> 
			<a class="nav-link" id="brandTab" role="tab" data-toggle="tab" aria-controls="brand" aria-expanded="true" href="#brand">Brand Kit</a></li>
		  <li class="nav-item"> 
			<a class="nav-link " id="techTab" role="tab" data-toggle="tab" aria-controls="tech" aria-expanded="true" href="#tech">Technologies</a></li>
	  <li class="nav-item"> 
			<a class="nav-link " id="faqTab" role="tab" data-toggle="tab" aria-controls="faq" aria-expanded="true" href="#faq">FAQ</a></li>
	  <li class="nav-item" > 
			<a class="nav-link " id="privacyTab" role="tab" data-toggle="tab" aria-controls="privacy" aria-expanded="true" href="#privacy" >Privacy Policy</a></li>
	  <li class="nav-item" > 
			<a class="nav-link " id="tosTab" role="tab" data-toggle="tab" aria-controls="tos" aria-expanded="true" href="#tos" >Terms Of Service</a></li>
	  
	  
				  </ul></div></nav>
</div>
	<div id="pagecontent" class="tab-content padme-t70 pb-5 text-whited-flex">
		
       <div role="tabpanel" class="tab-pane fade show active" id="about" aria-labelledby="aboutTab">
		   <div class="jumbotron container bg-darker text-left">
  				<h1 class="display-4 text-center">About</h1>
  				<p class="lead text-center">Decentralized Limitless User Experiences</p>
 				 <hr class="my-4 bg-light">
			   	<h1 class="mb-4">Part Social. Part Crypto. Limitless User Experiences.</h1>
			   <div class="py-3" style="border-bottom: solid; border-bottom-width: 2.5px; border-bottom-color: #191C20;">
			   <h3 style="color: #0ED18C;">dApps: Decentralized Applications</h3>
 				 <p>DLUX is an open source project built on the Hive blockchain that started as a way for users to build, post, and monetize virtual reality experiences without needing to know any code themselves. By leveraging networked A-Frame, visitor avatars spawn into social VR rooms with interconnecting portals to other places, all in-browser across mobile, headsets, and desktop computers. With full Hive wallet integration, the ability to purchase and tip became a reality for VR art galleries, AR menu systems, and 2D web dApps.</p>
			   </div>
			   <div class="py-3" style="border-bottom: solid; border-bottom-width: 2.5px; border-bottom-color: #191C20;">
			   	<h3 style="color: #FFA300;">DeFi: Decentralized Finance</h3>
			   	 <p>As the project grew, the need for an oracle arose to control how user assets can be packaged, pinned, and distributed. Now much more than a decentralized metaverse, DLUX is a full DeFi (decentralized finance) solution. The DLUX token architecture includes the ability to time lock tokens for vote power or governance collateral, and a DEX (decentralized exchange) enables atomic swaps of assets between users. No central authority exists, instead the novel use of a DAO (decentralized autonomous organization) with governance collateral held in escrow by smart contracts ensures orders placed on the DEX are safe. The users maintain consensus in a deterministic way by reading the Hive chain block-by-block and broadcasting their response.</p>
			   </div>
			   <div class="py-3" style="border-bottom: solid; border-bottom-width: 2.5px; border-bottom-color: #191C20;">
			   <h3 style="color: #E31337;">Hive: Social Blockchain</h3>
			   	 <p>Building on the blazing fast blockchain foundation of Hive, DLUX has been first to market with many exciting L2 (layer two) features already in public beta. Updates in closed alpha that are coming soon include a community controlled multi-signature wallet that will enable bridges to other cryptocurrencies, partial fill orders on the DEX (nonatomic swaps), and community proposals. Accounts holding DLUX Governance will be able to vote on code changes and how various community funds are spent.</p>
			   </div>
			   <div class="py-3" >
			   <h3 style="color: #9300FF;">Open: Free</h3>
			   <p>Move past a scarcity mindset by building on Hive, with no fees, and no code required. The barrier to entry for VR, dApps, and crypto projects is gone, making DLUX the most accessible dApp platform in the crypto space. And it's open source so anyone can improve the software or remix it for their projects.</p>
			   </div>
			   	 <div class="d-flex flex-column col-md-6 mx-auto pt-5">
			   <p class="lead text-center">If you're interested in building VR, or just chatting about the future, drop into our Discord server and say hi!</p>
 				   <a class="btn btn-outline-primary btn-lg col-md-6 mx-auto" href="https://discord.gg/Beeb38j" target="_blank" role="button">Chat on Discord<i class="fab fa-discord fa-fw ml-2"></i></a></div>
			</div>
		</div>
		
		<div role="tabpanel" class="tab-pane fade show " id="stories" aria-labelledby="storiesTab">
		   <div class="jumbotron container bg-darker text-left text-center">
  				<h1 class="display-4 text-center">Newsroom</h1>
  				<p class="lead text-center">Project collaborations and interviews</p>
 				 <hr class="my-4 bg-light">
			   
 				 <div class="row align-items-center py-5" style="border-bottom: solid; border-bottom-width: 2.5px; border-bottom-color: #191C20;">
							<div class="col-lg-6 order-lg-2">
								<div class="embed-responsive embed-responsive-16by9">
								<iframe width="560" height="315" src="https://www.youtube.com/embed/0uKWQFqtIuA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
								</div>
							</div>
							<div class="col-lg-6 order-lg-1 p-3">
						<h3 class="pt-3" style="color: #FB00FF">Discover DaVinci</h3>
						<p class="lead">University of Florida Digital Worlds Institute</p>
						<p>Discover DaVinci is a novel augmented reality system that incorporates blockchain technology with experiential learning to engage participants in an interactive discovery of Leonardo da Vinci’s ouvre. In the true spirit of this “Renaissance man”, Discover DaVinci explores new ideas and technologies “ahead of their time”.</p>
						<div class="text-center">	
						<a class="btn btn-outline-light m-3" href="https://research.dwi.ufl.edu/page/discover-davinci-a-gamified-blockchain-learning-app/" target="_blank">Learn More</a>
							</div>
							</div>
						</div>
						
						<div class="row align-items-center py-5" style="border-bottom: solid; border-bottom-width: 2.5px; border-bottom-color: #191C20;">
							<div class="col-lg-6 order-lg-1">
								<div class="embed-responsive embed-responsive-16by9">
								<iframe width="560" height="315" src="https://www.youtube.com/embed/w38Je142aF0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
								</div>
							</div>
							<div class="col-lg-6 order-lg-2">
								<h3 class="pt-3" style="color:#FB00FF">Emergent Virtues</h3>
								<p class="lead">World IA Day LA 2019</p>
				<p>A tentpole experience of this event with hundreds of attendees was a dlux AR camera app participant ice breaker. The goal: scan each other's badges to collect all six emergent virtue 3D models. As users moved around the room meeting eachother and scanning badges, a live leader board updated with their status of trophies found. Real networking gameified through AR and captured on blockchain!</p>
								<div class="text-center">	
						<a class="btn btn-outline-light m-3" href="https://peakd.com/dlux/@dlux-io/introducing-steem-events-video-tokenized-networking" target="_blank">Learn More</a>
							</div>
							</div></div>
               
                <div class="row align-items-center py-5" style="border-bottom: solid; border-bottom-width: 2.5px; border-bottom-color: #191C20;">
                   
			   	<div class="col-lg-4 order-lg-1 p-5">
					<h3 style="color:#FB00FF">The Cryptomaniacs</h3>
						<p class="lead">DLUX Token</p>
						<p>DLUX deep dive with @Taskmaster4450 &amp; Jon Olson</p>
						<div class="text-center">	
							<a class="btn btn-outline-light m-3" href="https://anchor.fm/cryptomaniacs/episodes/The-CryptoManiacs-Podcast---Episode-7-ish-w-DisregardFiat-of-Dlux-io-evplq5" target="_blank">Listen Now</a>
						</div>
				</div>
				   
            	<div class="col-lg-4 order-lg-1 p-5 middle-newsroom">
					<h3 style="color:#FB00FF">CyberBuzz</h3>
						<p class="lead">VR, AR &amp; DeFi</p>
						<p>@crimsonclad interviews @disregardfiat about #dlux</p>
						<div class="text-center">	
							<a class="btn btn-outline-light m-3" href="https://www.youtube.com/watch?v=YL53DgG8pk0" target="_blank">Watch Now</a>
						</div>
				</div>
				   
				   <div class="col-lg-4 order-lg-1 p-5">
					<h3 style="color:#FB00FF">Simulation Nation</h3>
						<p class="lead">Virtual Money</p>
						<p>@disregardfiat and @markegiles broadcast from inside Altspace VR</p>
						<div class="text-center">	
							<a class="btn btn-outline-light m-3" href="https://open.spotify.com/episode/3GdAkyh4bifBviocBndMD8?si=UKf-xmAyS3On5I-9Lvd-Hg" target="_blank">Listen Now</a>
						</div>
				</div>
				   
			   </div>
			   
			   <div class="row align-items-center py-5" style="border-bottom: solid; border-bottom-width: 2.5px; border-bottom-color: #191C20;">
				   
				     	<div class="col-lg-4 order-lg-1 p-5">
					<h3 style="color:#FB00FF">ARK.io</h3>
						<p class="lead">Market Square Hub</p>
						<p>Press Release: ARK Announces Partnership With DLUX</p>
						<div class="text-center">	
							<a class="btn btn-outline-light m-3" href="https://ark.io/blog/ark-announces-partnership-with-dlux/" target="_blank">Read Now</a>
						</div>
				</div> 
				   
                   <div class="col-lg-4 order-lg-1 p-5 middle-newsroom">
					<h3 style="color:#FB00FF">HiveCoffee</h3>
						<p class="lead">Side Chains</p>
						<p>Leo, Hive, and how Layer 2 solutions like DLUX add critical features</p>
						<div class="text-center">	
							<a class="btn btn-outline-light m-3" href="https://youtu.be/Wi8QwroY2bI" target="_blank">Watch Now</a>
						</div>
				</div>	
                   
                   <div class="col-lg-4 order-lg-1 p-5">
					<h3 style="color:#FB00FF">Altcoin Buzz</h3>
						<p class="lead">Time is Crypto</p>
						<p>The Crypto Godess interrogates @markegiles about the dlux ICO</p>
						<div class="text-center">	
							<a class="btn btn-outline-light m-3" href="https://www.youtube.com/watch?v=9mUcP3VrwXE" target="_blank">Watch Now</a>
						</div>
				</div>
                   
			   </div>
			   
			    <div class="row align-items-center py-5">
				
				
				   <div class="col-lg-4 order-lg-1 p-5">
					<h3 style="color:#FB00FF">Voyage LA</h3>
						<p class="lead">Introducing...</p>
						<p>Meet Mark Giles and Steven Ettinger of OTOLUX</p>
						<div class="text-center">	
							<a class="btn btn-outline-light m-3" href="http://voyagela.com/interview/meet-mark-giles-steven-ettinger-otolux-studio-city/" target="_blank">Read Now</a>
						</div>
				</div>
				   
				   
				   
			   </div>
					
			   
			</div>
		</div>
		
		<div role="tabpanel" class="tab-pane fade show " id="brand" aria-labelledby="brandTab">
		   <div class="jumbotron container bg-darker text-left">
  				<h1 class="display-4 text-center">Brand Kit</h1>
  				<p class="lead text-center">Assets and colorway</p>
 				 <hr class="my-4 bg-light">
			   <div class="d-flex d-row">
			   	<div class="d-flex flex-column col-md-4 p-5">
 				 <p class="lead">SVG: Logo</p>
			   	 <img src="/img/dlux-hive-logo-alpha.svg">
					</div>
				   <div class="d-flex flex-column col-md-4 p-5">
 				 <p class="lead">SVG: Icon</p>
			   	 <img src="/img/dlux-hive-logo.svg">
					</div>
				   <div class="d-flex flex-column col-md-4 p-5">
 				 <div class="lead">SVG: Hive XR</div>
			   	 <div class="my-auto"><img src="/img/ar-vr-icon.svg"></div>
					</div>
				   </div>
			   <div class="d-flex d-row">
			   	<div class="d-flex flex-column col-md-4 p-5">
 				 <p class="lead">PNG: Logo</p>
			   	 <img src="/img/dlux-logo.png" width="100%">
					</div>
				   <div class="d-flex flex-column col-md-4 p-5">
 				 <p class="lead">PNG: Icon</p>
			   	 <img src="/img/dlux-logo-icon.png" width="100%">
					</div>
				   <div class="d-flex flex-column col-md-4 p-5">
 				 <div class="lead">PNG: Hive XR</div>
			   	 <div class="my-auto"><img src="/img/ar-vr-icon.svg"></div>
					</div>
				   </div>
			   	 <p class="lead">HEX Values</p>
			    <div class="d-flex py-3">
			   	 <div class="d-flex flex-column text-center px-2">
			   		<div class="mx-auto" style="background-color: #21FFB5; width: 25px; height: 25px">&nbsp;</div>
					 <div class="mx-2 pt-2">#21FFB5</div>
			   	 </div>
			   <div class="d-flex flex-column text-center px-2">
			   		<div class="mx-auto" style="background-color: #033EFD; width: 25px; height: 25px">&nbsp;</div>
					 <div class="mx-2 pt-2">#033EFD</div>
			   	 </div>
			   <div class="d-flex flex-column text-cente px-2">
			   		<div class="mx-auto" style="background-color: #FB00FF; width: 25px; height: 25px">&nbsp;</div>
					 <div class="mx-2 pt-2">#FB00FF</div>
			   	 </div>
			   </div>
			</div>
		</div>

		<div role="tabpanel" class="tab-pane fade show" id="privacy" aria-labelledby="privacyTab">
		   <div class="jumbotron container bg-darker text-left">
  				<h1 class="display-4 text-center">Privacy Policy</h1>
  				<p class="lead text-center">We believe in data privacy and transparency</p>
 				 <hr class="my-4 bg-light">
 				 <p>The data you publish and access through DLUX is publicly available permanently on the Hive blockchain. Front ends like DLUX can hide content from users, and assets stored on IPFS can be garbage collected, but the record of the data is immutably saved forever.</p>
			   <p>DLUX, acting as a front end, stores no user data. Login happens via the Hive Keychain extension, so user keys are never exposed to DLUX. A user session is stored locally, and DLUX does no user data tracking whatsoever.</p>
 				 <div class="d-flex flex-column col-md-6 mx-auto pt-5">
			   <p class="lead text-center">Would you like to learn more about how your data is stored and accessed via the Hive blockchain?</p>
 				   <a class="btn btn-outline-primary btn-lg col-md-6 mx-auto" href="https://hive.io/whitepaper.pdf" target="_blank" role="button">Hive Whitepaper<i class="fab fa-hive fa-fw ml-2"></i></a></div>
			</div>
		</div>
		
		<div role="tabpanel" class="tab-pane fade show" id="tos" aria-labelledby="tosTab">
		   <div class="jumbotron container bg-darker text-left">
  				<h1 class="display-4 text-center">Terms of Service</h1>
  				<p class="lead text-center">What you can expect from us, and what we expect from you</p>
 				 <hr class="my-4 bg-light">
			   <p>All DLUX software is MIT License Open Source. Report all bugs and issues via Discord.</p>
			   <p>You are free to use the code for your own projects, and we encourage others to contribute improvements. We offer no warranty or gurantee and consider this software in public beta. Users are welcome to test, debug, provide feedback, and use at their own risk.</p>
 				 <div class="d-flex flex-column col-md-6 mx-auto pt-5">
			   <p class="lead text-center">Would you like to audit the code, issue a pull request, clone the repo, or just have a look around?</p>
 				   <a class="btn btn-outline-primary btn-lg col-md-6 mx-auto" href="https://github.com/dluxio/dluxio" target="_blank" role="button">Browse our Code<i class="fab fa-github fa-fw ml-2"></i></a></div>
			</div>
		</div>
		
		<div role="tabpanel" class="tab-pane fade show" id="tech" aria-labelledby="techTab">
		   <div class="jumbotron container bg-darker text-left">
  				<h1 class="display-4 text-center">Technologies</h1>
  				<p class="lead text-center">Open Source Libraries</p>
 				 <hr class="my-4 bg-light">
			   
			   <div class="row align-items-center py-5" style="border-bottom: solid; border-bottom-width: 2.5px; border-bottom-color: #191C20;">
							<div class="col-4 col-lg-2 text-center mx-auto my-5"><img src="/img/aframe.png" width="100%"></div>
							<div class="col-lg-8 px-5">
								<h3 style="color:#27BFF4">Networked A-Frame</h3>
								<p>Build AR and VR scenes from simple tags that are responsive across mobile, desktop, and headset via HTML5 with teleport controls, touch controls, magic window looking, and keyboard + cursor controls. Start by using a drag and drop uploader or remixing a boiler plate project.</p>
							</div>
				   			<div class="col-lg-2 text-center"><a class="btn btn-outline-primary" href="https://aframe.io/" target="_blank">Learn More</a></div>
			   </div>
			   
						<div class="row align-items-center py-5" style="border-bottom: solid; border-bottom-width: 2.5px; border-bottom-color: #191C20;">
							<div class="col-4 col-lg-2 text-center mx-auto my-5"><img src="/img/ipfs-logo.svg" width="100%"></div>
							<div class="col-lg-8 px-5">
								<h3 style="color:#139192">InterPlanetary File System</h3>
								<p>Distribute content peer-to-peer via the InterPlanetary File System (IPFS), with ultimate resiliancy and no file dupliation. Access your file from anywhere via it's finger print, or "hash" identity. DLUX pins uploaded content to avoid garbage collection.</p>
							</div>
			   			<div class="col-lg-2 text-center"><a class="btn btn-outline-primary" href="https://ipfs.io/" target="_blank">Learn More</a></div>
			   </div>
						
							<div class="row align-items-center py-5">
								<div class="col-4 col-lg-2 text-center mx-auto my-5"><img src="/img/hextacular.svg" width="100%"></div>
								<div class="col-lg-8 px-5">
									<h3 style="color:#E31337">Hive Blockchain</h3>
				<p>Users own their account and content, as well as their crypto currency. By powering up some crypto, users gain vote power enabling them to reward content creators and curators via upvotes that earn crypto from the reward pool which can be immediately withdrawn.</p>
								</div>
								<div class="col-lg-2 text-center"><a class="btn btn-outline-primary" href="https://hive.io/" target="_blank">Learn More</a></div>
								</div>
		
			</div>
		</div>
	
	  <div role="tabpanel" class="tab-pane fade show" id="faq" aria-labelledby="faqTab">
		   <div class="jumbotron container bg-darker text-left">
  				<h1 class="display-4 text-center">FAQ</h1>
  				<p class="lead text-center">Frequently Asked Questions</p>
 				 <hr class="my-4 bg-light">
 				 <p class="lead">What is Hive?</p>
			   	 <p>Hive is a delegated-proof-of-stake social media blockchain. Users have a wallet that holds Hive crypto, and by staking some of their crypto in a process called powering up they get vote power. There is built-in inflation that funds a reward pool, which is paid out to content creators that earn it via upvotes from users with Hive Power.</p>
			   	 <p class="lead">What are dApps?</p>
			   	 <p>Decentralized Applications are pieces of software that can run outside of centralized servers and app stores. They are resiliant in their ability to be distributed peer-to-peer, and their minimization on external dependencies.</p>
				 <p class="lead">What is a DEX?</p>
			   	 <p>A Decentralized EXchange is a market to swap assets that has no centralized account holding the assets or user keys, and instead escrows agent collateral to cover the cost of trades.</p>				 
			</div>
		</div>
	
	</div>
  </div>
</main>

<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/footer.php";
   include_once($path);
?>

<script>
$('.nav-tabs').stickyTabs();    

function pageSpecfic(usr){
	me(usr);
}
</script>
</body>
</html>