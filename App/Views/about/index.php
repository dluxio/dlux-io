<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - Me</title>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/header.php";
   include_once($path);
?>
<!--page specific-->
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

		  <nav class="navbar navbar-dark">
			  <div class="m-auto">
  <ul class="nav nav-tabs navbar py-0 border-bottom-0" role="tablist">
	    <li class="nav-item">
			<a class="nav-link active" id="aboutTab" role="tab" data-toggle="tab" aria-controls="about" aria-expanded="true" href="#about" >About</a></li>
	  <li class="nav-item"> 
			<a class="nav-link" id="storiesTab" role="tab" data-toggle="tab" aria-controls="stories" aria-expanded="true" href="#stories">Stories</a></li>
	    <li class="nav-item"> 
			<a class="nav-link" id="brandTab" role="tab" data-toggle="tab" aria-controls="brand" aria-expanded="true" href="#brand">Brand Kit</a></li>
	  <li class="nav-item" > 
			<a class="nav-link " id="privacyTab" role="tab" data-toggle="tab" aria-controls="privacy" aria-expanded="true" href="#privacy" >Privacy Policy</a></li>
	  <li class="nav-item" > 
			<a class="nav-link " id="tosTab" role="tab" data-toggle="tab" aria-controls="tos" aria-expanded="true" href="#tos" >Terms Of Service</a></li>
	  <li class="nav-item"> 
			<a class="nav-link " id="techTab" role="tab" data-toggle="tab" aria-controls="tech" aria-expanded="true" href="#tech">Technologies</a></li>
	  <li class="nav-item"> 
			<a class="nav-link " id="faqTab" role="tab" data-toggle="tab" aria-controls="faq" aria-expanded="true" href="#faq">FAQ</a></li>
				  </ul></div></nav>
</div>
	<div id="pagecontent" class="tab-content padme-t70 pb-5 text-whited-flex">
		
       <div role="tabpanel" class="tab-pane fade show active" id="about" aria-labelledby="aboutTab">
		   <div class="jumbotron container bg-darker text-left">
  				<h1 class="display-4 text-center">About</h1>
  				<p class="lead text-center">Decentralized Limitless User Experiences</p>
 				 <hr class="my-4 bg-light">
			   	<h1 class="mb-4">Part social. Part crypto. Limitless user experiences.</h1>
			   <h3 style="color: #0ED18C;">dApps: Decentralized Applications</h3>
 				 <p>DLUX is an open source project built on the Hive blockchain that started as a way for users to build, post, and monetize virtual reality experiences without needing to know any code themselves. By leveraging networked A-Frame, visitor avatars spawn into social VR rooms with interconnecting portals to other places, all in-browser across mobile, headsets, and desktop computers. With full Hive wallet integration, the ability to purchase and tip became a reality for VR art galleries, AR menu systems, and 2D web dApps.</p>
			   	<h3 style="color: #FFA300;">DeFi: Decentralized Finance</h3>
			   	 <p>As the project grew, the need for an oracle arose to control how user assets can be packaged, pinned, and distributed. Now much more than a decentralized metaverse, DLUX is a full DeFi (decentralized finance) solution. The DLUX token architecture includes the ability to time lock tokens for vote power or governance collateral, and a DEX (decentralized exchange) enables atomic swaps of assets between users. No central authority exists, instead the novel use of a DAO (decentralized autonomous organization) with governance collateral held in escrow by smart contracts ensures orders placed on the DEX are safe. The users maintain consensus in a deterministic way by reading the Hive chain block-by-block and broadcasting their response in the form of a hash.</p>
			   <h3 style="color: #E31337;">Hive: Social Blockchain</h3>
			   	 <p>Building on the blazing fast blockchain foundation of Hive, DLUX has been first to market with many exciting L2 (layer two) features already in public beta. Updates in closed alpha that are coming soon include a community controlled multi-signature wallet that will enable bridges to other cryptocurrencies, partial fill orders on the DEX (nonatomic swaps), and community proposals. Accounts holding DLUX Governance will be able to vote on code changes and how various community funds are spent.</p>
			   <h3 style="color: #9300FF;">Open: Free</h3>
			   <p>Move past a scarcity mindset by building on Hive, with no fees, and no code required. The barrier to entry for VR, dApps, and crypto projects is gone, making DLUX the most accessible dApp platform in the crypto space. And it's open source so anyone can improve the software or remix it for their projects.</p>
			   	 <div class="d-flex flex-column col-md-6 mx-auto pt-5">
			   <p class="lead text-center">If you're interested in building VR, or just chatting about the future, drop into our Discord server and say hi!</p>
 				   <a class="btn btn-outline-primary btn-lg col-md-6 mx-auto" href="https://discord.gg/Beeb38j" target="_blank" role="button">Chat on Discord<i class="fab fa-discord fa-fw ml-2"></i></a></div>
			</div>
		</div>
		
		<div role="tabpanel" class="tab-pane fade show" id="stories" aria-labelledby="storiesTab">
		   <div class="jumbotron container bg-darker text-left">
  				<h1 class="display-4 text-center">Stories</h1>
  				<p class="lead text-center">Ground breaking project collaborations</p>
 				 <hr class="my-4 bg-light">
			   
 				 <div class="row align-items-center pb-5">
							<div class="col-lg-6 order-lg-2">
								<iframe width="560" height="315" src="https://www.youtube.com/embed/0uKWQFqtIuA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							</div>
							<div class="col-lg-6 order-lg-1">
						<p class="lead pt-3">Discover Davinci</p>
						<p>Discover DaVinci is a novel augmented reality system that incorporates blockchain technology with experiential learning to engage participants in an interactive discovery of Leonardo da Vinci’s ouvre. In the true spirit of this “Renaissance man”, Discover DaVinci explores new ideas and technologies “ahead of their time”.

In order to illustrate the emerging potential at the intersection of art and blockchain, we present a case study of a new interactive system produced at the University of Florida Digital Worlds Institute. </p>
						<div class="text-center">	
						<a class="btn btn-outline-light m-3" href="https://research.dwi.ufl.edu/page/discover-davinci-a-gamified-blockchain-learning-app/" target="_blank">Learn More</a>
							</div>
							</div>
						</div>
						
						<div class="row align-items-center py-5">
							<div class="col-lg-6 order-lg-1">
								<iframe width="560" height="315" src="https://www.youtube.com/embed/w38Je142aF0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
							<div class="col-lg-6 order-lg-2">
								<p class="lead pt-3">World IA Day</p>
				<p>By utilizing WebXR (augmented and virtual reality) and our custom sidechain, event organizers can gameify interactions in exciting new ways!</p>
								<div class="text-center">	
						<a class="btn btn-outline-light m-3" href="https://peakd.com/dlux/@dlux-io/introducing-steem-events-video-tokenized-networking" target="_blank">Learn More</a>
							</div>
							</div></div>
			   
			</div>
		</div>
		
		<div role="tabpanel" class="tab-pane fade show" id="brand" aria-labelledby="brandTab">
		   <div class="jumbotron container bg-darker text-left">
  				<h1 class="display-4 text-center">Brand Kit</h1>
  				<p class="lead text-center">Assets and color ways</p>
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
			   	 <img src="/img/dlux-hive-logo-alpha.svg">
					</div>
				   <div class="d-flex flex-column col-md-4 p-5">
 				 <p class="lead">PNG: Icon</p>
			   	 <img src="/img/dlux-hive-logo.svg">
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
 				 <p>The data you publish and access through DLUX is permanently publicly available on the Hive blockchain. Front ends such as DLUX can hide content from users, and assets stored on IPFS can be garbage collected, but the record of the data is immutably stored forever.</p>
 				 <div class="d-flex flex-column col-md-6 mx-auto pt-5">
			   <p class="lead text-center">Would you like to learn more about how your data is stored and accessed via the Hive blockchain?</p>
 				   <a class="btn btn-outline-primary btn-lg col-md-6 mx-auto" href="https://discord.gg/Beeb38j" target="_blank" role="button">Learn about Hive<i class="fab fa-hive fa-fw ml-2"></i></a></div>
			</div>
		</div>
		
		<div role="tabpanel" class="tab-pane fade show" id="tos" aria-labelledby="tosTab">
		   <div class="jumbotron container bg-darker text-left">
  				<h1 class="display-4 text-center">Terms of Service</h1>
  				<p class="lead text-center">What you can expect from us, and what we expect from you</p>
 				 <hr class="my-4 bg-light">
 				 <p>We offer no warranty or gurantee. This software is in public beta. We offer this software for users to test and debug. Report all bugs and issues via Discord</p>
 				 <div class="d-flex flex-column col-md-6 mx-auto pt-5">
			   <p class="lead text-center">Would you like to audit the code, issue a pull request, clone the repo, or just poke around?</p>
 				   <a class="btn btn-outline-primary btn-lg col-md-6 mx-auto" href="https://discord.gg/Beeb38j" target="_blank" role="button">Browse the Code<i class="fab fa-github fa-fw ml-2"></i></a></div>
			</div>
		</div>
		
		<div role="tabpanel" class="tab-pane fade show" id="tech" aria-labelledby="techTab">
		   <div class="jumbotron container bg-darker text-left">
  				<h1 class="display-4 text-center">Technologies</h1>
  				<p class="lead text-center">Open Source Libraries</p>
 				 <hr class="my-4 bg-light">
			   
			   <div class="row align-items-center pb-5">
							<div class="col-lg-2 text-center"><img src="/img/aframe.png" width="100%"></div>
							<div class="col-lg-8 px-5">
								<p class="lead pt-3">A-Frame</p>
								<p>Build AR and VR scenes with simple HTML tags</p>
							</div>
				   			<div class="col-lg-2 text-center"><a class="btn btn-outline-primary" href="https://aframe.io/" target="_blank">Learn More</a></div>
			   </div>
			   
						<div class="row align-items-center py-5">
							<div class="col-lg-2 text-center"><img src="/img/ipfs-logo.svg" width="100%"></div>
							<div class="col-lg-8 px-5">
								<p class="lead pt-3">IPFS</p>
								<p>Distribute content via the InterPlanetary File System</p>
							</div>
			   			<div class="col-lg-2 text-center"><a class="btn btn-outline-primary" href="https://ipfs.io/" target="_blank">Learn More</a></div>
			   </div>
						
							<div class="row align-items-center py-5">
								<div class="col-lg-2 text-center"><img src="/img/hextacular.svg" width="100%"></div>
								<div class="col-lg-8 px-5">
									<p class="lead pt-3">Hive</p>
				<p>Users own their account and content, which earns crypto rewards</p>
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
			   	 <p></p>
			   	 <p class="lead">What are dApps?</p>
			   	 <p></p>
				 <p class="lead">What is a DEX?</p>
			   	 <p></p>				 
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