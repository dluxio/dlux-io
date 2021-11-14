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
        .listing-btn {
            background-color: #f8f9fa;
            border-color: #000;
            border-width: 2px;
            border-style: solid;
        }
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
			<a class="nav-link" id="newsroomTab" role="tab" data-toggle="tab" aria-controls="newsroom" aria-expanded="true" href="#newsroom">Newsroom</a></li>
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
			   	<h3 style="color:#FB00FF">S-NFTs: Smart Non Fungible Tokens</h3>
			   	 <p>Transcend current media limitations with Smart NFTs, tokens that can be distributed to users that are interactive. Build Generative NFT sets with SVG layers (Scaleable Vector Graphics) as attributes. Issue awards, trophies, and achievements. Users can set their SNFTs as their PFP (ProFile Picture) which are verifiable by any front end choosing to recognize them.</p>
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
		
		<div role="tabpanel" class="tab-pane fade show " id="newsroom" aria-labelledby="newsroomTab">
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
                    <div class="m-auto"><h3 style="color:#FB00FF">Project Listings</h3></div>
                    
                    <div class="d-flex flex-wrap justify-content-center">
                        <div class="d-flex m-4 p-2 listing-btn rounded"><a href="https://hiveprojects.io/projects/p/dlux/" target="_blank"><img src="https://hiveprojects.io/static/img/logo_hiveprojects.png" height="50px" title="Hive Projects"/></a></div>
                         <div class="d-flex m-4 p-2 listing-btn rounded"><a href="https://marketsquare.io/projects/dlux" target="_blank"><img src="https://marketsquare.io/images/logo.svg" height="50px" title="Market Square"/></a></div>
                        <div class="d-flex m-4 p-2 listing-btn rounded"><a href="https://dappradar.com/hive/social/dlux" target="_blank"><svg xmlns="http://www.w3.org/2000/svg"  height="50" viewBox="0 0 126.676 20.376" fill="#000"><path d="M22.615 9.167L17.905 1a2.036 2.036 0 00-1.753-1H6.731a2.025 2.025 0 00-1.753 1.012L.268 9.176a2.043 2.043 0 000 2.024l4.71 8.164a2.015 2.015 0 001.753 1.012h9.42a2.025 2.025 0 001.753-1.012l4.71-8.164a2.059 2.059 0 00.001-2.033zm-11.174 8.025v-1.4a5.609 5.609 0 10-5.609-5.609 5.539 5.539 0 001.143 3.384l1.012-.986a4.16 4.16 0 01-.75-2.4 4.213 4.213 0 114.213 4.213v-1.4a2.809 2.809 0 10-2.817-2.809 2.765 2.765 0 00.375 1.4l1.047-1.021a1.343 1.343 0 01-.052-.375 1.439 1.439 0 111.439 1.439 1.3 1.3 0 01-.41-.07l-3.62 3.532a.56.56 0 01-.113.087c-.009.009-.026.009-.035.017a.407.407 0 01-.087.044c-.017.009-.035.009-.052.017l-.079.026a.111.111 0 00-.049.01c-.026 0-.052.009-.07.009-.026 0-.052-.009-.079-.009a.17.17 0 01-.061-.009l-.079-.026c-.017-.009-.035-.009-.052-.017a.354.354 0 01-.079-.044.191.191 0 01-.044-.026.5.5 0 01-.07-.061c-.009-.009-.026-.017-.035-.035a7.007 7.007 0 115.015 2.12zM28.285 3.62h4.309c4.169-.044 7.24 2.652 7.179 6.542.061 3.812-3.009 6.682-7.179 6.62h-4.309zm4.283 10.738c2.652 0 4.431-1.657 4.431-4.187 0-2.556-1.736-4.108-4.431-4.108h-1.6v8.3h1.6zM49.647 16.791H47.17v-.959a4.089 4.089 0 01-3.009 1.195c-2.093 0-3.411-1.221-3.411-2.948 0-1.779 1.439-2.87 3.733-2.87h2.477v-.436a1.613 1.613 0 00-1.83-1.736 3.372 3.372 0 00-2.617 1.361l-1.4-1.657a5.365 5.365 0 014.317-2.033 3.88 3.88 0 014.23 4.23v5.853zm-2.7-3.812h-2.106c-.881 0-1.378.34-1.378.994s.558 1.073 1.413 1.073a1.965 1.965 0 002.076-1.954zM57.383 17.027a3.947 3.947 0 01-2.957-1.195v4.544h-2.7V6.919h2.477v1.237a3.741 3.741 0 013.18-1.457 4.844 4.844 0 014.789 5.146 4.874 4.874 0 01-4.789 5.182zm-.5-7.894a2.462 2.462 0 00-2.495 2.713 2.477 2.477 0 002.495 2.73 2.551 2.551 0 002.556-2.713 2.537 2.537 0 00-2.553-2.73zM69.429 17.027a3.947 3.947 0 01-2.957-1.195v4.544h-2.7V6.919h2.485v1.237a3.741 3.741 0 013.172-1.457 4.844 4.844 0 014.789 5.146 4.874 4.874 0 01-4.789 5.182zm-.5-7.894a2.462 2.462 0 00-2.495 2.713 2.477 2.477 0 002.495 2.73 2.551 2.551 0 002.556-2.713 2.532 2.532 0 00-2.553-2.73zM84.014 16.791l-3.411-4.649h-1.971v4.649h-2.7V3.62h4.946c2.756 0 4.745 1.718 4.745 4.248a4.081 4.081 0 01-2.311 3.751l3.733 5.164h-3.031zm-5.39-7.021h2.253a1.811 1.811 0 002-1.893 1.825 1.825 0 00-2-1.875h-2.25zM96.094 16.791h-2.477v-.959a4.089 4.089 0 01-3.009 1.195c-2.093 0-3.411-1.221-3.411-2.948 0-1.779 1.439-2.87 3.733-2.87h2.477v-.436a1.613 1.613 0 00-1.832-1.736 3.372 3.372 0 00-2.617 1.361l-1.4-1.657a5.365 5.365 0 014.309-2.032 3.88 3.88 0 014.23 4.23v5.853zm-2.7-3.812h-2.111c-.881 0-1.378.34-1.378.994s.558 1.073 1.413 1.073a1.965 1.965 0 002.076-1.954zM108.062 1.823v14.959h-2.477v-1.221a3.741 3.741 0 01-3.175 1.457 4.849 4.849 0 01-4.789-5.164 4.849 4.849 0 014.789-5.164 3.842 3.842 0 012.957 1.178V1.823zm-5.146 7.31a2.551 2.551 0 00-2.556 2.713 2.532 2.532 0 002.556 2.73 2.462 2.462 0 002.495-2.713 2.486 2.486 0 00-2.495-2.73zM118.511 16.791h-2.477v-.959a4.089 4.089 0 01-3.009 1.195c-2.093 0-3.411-1.221-3.411-2.948 0-1.779 1.439-2.87 3.733-2.87h2.477v-.436a1.613 1.613 0 00-1.832-1.736 3.372 3.372 0 00-2.617 1.361l-1.4-1.657a5.365 5.365 0 014.309-2.032 3.88 3.88 0 014.23 4.23v5.853zm-2.687-3.812h-2.11c-.881 0-1.378.34-1.378.994s.558 1.073 1.413 1.073a1.965 1.965 0 002.076-1.954zM126.667 9.29h-.715a2.385 2.385 0 00-2.652 2.573v4.928h-2.7V6.917h2.477v1.178a3.412 3.412 0 012.713-1.3 2.723 2.723 0 01.881.122V9.29z"><title>DappRadar</title></path></svg></a></div>
                        <div class="d-flex m-4 p-2 listing-btn rounded"><a href="https://www.dapp.com/app/dlux" target="_blank"><img src="https://www.dapp.com/_nuxt/img/dapp_logo.f9fb95f.png" height="50px"  title="dapp.com"/></a></div>
                        
                         <div class="d-flex m-4 p-2 listing-btn rounded"><a href="https://www.stateofthedapps.com/dapps/dlux" target="_blank"><svg height="50" x="0px" y="0px" viewBox="0 0 1280 269.1" class="TheLogo" data-v-1d319c08="" data-v-80d6695a=""><path d="M531.9,34.4c25.3,0,45.5,20.4,45.5,45.6s-20.2,45.4-45.5,45.4c-25.3,0-45.4-20.1-45.4-45.4
		S506.7,34.4,531.9,34.4z M531.9,112.7c18.1,0,32.9-14.7,32.9-32.7c0-17.9-14.8-33-32.9-33c-17.9,0-32.7,15-32.7,33
		C499.2,98,514,112.7,531.9,112.7z M585.4,38c0-1.3,1-2.4,2.4-2.4h50.6c1.4,0,2.4,1.1,2.4,2.4v7.1c0,1.3-1,2.4-2.4,2.4h-40v29.2
		h33.8c1.3,0,2.4,1.1,2.4,2.4v7c0,1.3-1.1,2.4-2.4,2.4h-33.8v33.2c0,1.3-1.1,2.4-2.4,2.4h-8.2c-1.4,0-2.4-1.1-2.4-2.4V38z
		 M505.1,150.3h-20.6c-1.4,0-2.4-1.1-2.4-2.4v-7.1c0-1.3,1-2.4,2.4-2.4h54.4c1.4,0,2.4,1.1,2.4,2.4v7.1c0,1.3-1,2.4-2.4,2.4h-20.6
		v74.2c0,1.3-1.1,2.4-2.4,2.4h-8.4c-1.3,0-2.4-1.1-2.4-2.4L505.1,150.3L505.1,150.3z M547.3,140.8c0-1.3,1.1-2.4,2.4-2.4h8.4
		c1.4,0,2.4,1.1,2.4,2.4v35.2h38.8v-35.2c0-1.3,1-2.4,2.4-2.4h8.4c1.3,0,2.4,1.1,2.4,2.4v83.7c0,1.3-1.1,2.4-2.4,2.4h-8.4
		c-1.4,0-2.4-1.1-2.4-2.4V188h-38.8v36.5c0,1.3-1,2.4-2.4,2.4h-8.3c-1.3,0-2.4-1.1-2.4-2.4L547.3,140.8L547.3,140.8z M626.9,140.8
		c0-1.3,1-2.4,2.4-2.4h47.5c1.4,0,2.4,1.1,2.4,2.4v7.1c0,1.3-1,2.4-2.4,2.4h-36.9v25.8h30.7c1.3,0,2.4,1.1,2.4,2.4v7.1
		c0,1.4-1.1,2.4-2.4,2.4h-30.7v27.2h36.9c1.4,0,2.4,1.1,2.4,2.4v7c0,1.3-1,2.4-2.4,2.4h-47.5c-1.4,0-2.4-1.1-2.4-2.4V140.8z
		 M56.1,188.3c0-18.6-5-26.1-23.8-45.8C8.8,116.7,0.1,103.8,0.1,69.3V45.5C0.1,10.2,8.4,0,40.7,0h15.9c32.2,0,40.6,10.2,40.6,45.5
		v47.4H58.9V50.4c0-8.7-1.1-11.8-7.9-11.8h-2.3c-6.8,0-8,3-8,11v21.3c0,19,5,26.1,23.8,46.2c23.5,25.4,32.6,38.3,32.6,72.8v33.8
		c0,35.2-8.4,45.5-40.6,45.5H40.6C8.4,269.1,0,258.9,0,223.6v-58h38.3v53.1c0,8.7,0.7,11.8,8,11.8h2.3c6.8,0,7.6-3,7.6-11.8V188.3z
		 M124.7,267.1v-227h-22V1.8h84.9v38.3h-22v227L124.7,267.1L124.7,267.1z M242.6,231.9h-23.1l-3,35.2h-36.7L205.1,1.8h56.5
		L287,267.1h-41.3L242.6,231.9z M222.5,195.5h17c-3.8-56.5-6.8-103.1-8.7-150.5C229,92.4,225.9,139,222.5,195.5z M301,267.1v-227
		h-22V1.8h84.9v38.3h-22v227L301,267.1L301,267.1z M412.8,109.8h28.4v38.7h-28.4v80h36v38.7h-76.9V1.8h76.9v38.7h-36L412.8,109.8
		L412.8,109.8z M728.5,148.5h-15.3v-38.7h15.3V1.8H797c32.2,0,40.6,10.2,40.6,45.5v174.4c0,35.2-8.4,45.5-40.6,45.5h-68.4V148.5z
		 M788.7,228.5c7.2,0,8-3,8-11.8V52.2c0-8.7-0.7-11.8-8-11.8h-19.2v69.4h17.7v38.7h-17.7v80L788.7,228.5L788.7,228.5z M908,231.9
		h-23.1l-3,35.2h-36.8L870.5,1.8H927l25.4,265.3h-41.3L908,231.9z M888,195.5h17c-3.8-56.5-6.8-103.1-8.7-150.5
		C894.4,92.4,891.4,139,888,195.5z M961.9,1.8h59.5c32.2,0,40.6,10.2,40.6,45.5v78.1c0,35.2-8.4,45.5-40.6,45.5h-18.6V267h-41V1.8z
		 M1013,132.2c6.8,0,7.9-3,7.9-11.8V52.2c0-8.7-1.1-11.8-7.9-11.8h-10.2v91.8H1013z M1073.3,1.8h59.5c32.2,0,40.6,10.2,40.6,45.5
		v78.1c0,35.2-8.4,45.5-40.6,45.5h-18.6V267h-41V1.8z M1124.5,132.2c6.8,0,7.9-3,7.9-11.8V52.2c0-8.7-1.1-11.8-7.9-11.8h-10.2v91.8
		H1124.5z M1239,188.3c0-18.6-5-26.1-23.8-45.8c-23.5-25.8-32.2-38.7-32.2-73.2V45.5c0-35.2,8.4-45.5,40.6-45.5h15.9
		c32.2,0,40.6,10.2,40.6,45.5v47.4h-38.3V50.4c0-8.7-1.1-11.8-8-11.8h-2.3c-6.8,0-7.9,3-7.9,11v21.3c0,19,5,26.1,23.8,46.2
		c23.5,25.4,32.6,38.3,32.6,72.8v33.8c0,35.2-8.4,45.5-40.6,45.5h-15.9c-32.2,0-40.6-10.2-40.6-45.5v-58h38.3v53.1
		c0,8.7,0.7,11.8,7.9,11.8h2.3c6.8,0,7.6-3,7.6-11.8L1239,188.3L1239,188.3z" class="st0 black" data-v-1d319c08=""><title>State of the Dapps</title></path></svg></a></div>
                        <div class="d-flex m-4 p-2 listing-btn rounded"><a href="https://dapp.review/dapp/dlux-01" target="_blank"><img src="https://assets.dapp.review/assets/logo.svg" height="50px" title="Dapp Review"/></a></div>
                        <div class="d-flex m-4 p-2 listing-btn rounded"><a href="https://hivedapps.com/apps/dlux" target="_blank"><svg height="50px" viewBox="0 0 142 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" data-v-f55f2e06=""><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Group-3" fill-rule="nonzero"><g id="Group" transform="translate(0.000000, 4.891566)" fill="#E31337"><path d="M26.5279127,18.0927131 C26.6504324,18.0927131 26.726948,18.225548 26.6655699,18.3316928 L18.7799694,31.9687377 C18.7515339,32.0179131 18.6990739,32.0481928 18.6423121,32.0481928 L13.8219438,32.0481928 C13.6994241,32.0481928 13.6229085,31.9153577 13.6842866,31.8092129 L21.569887,18.172168 C21.5983227,18.1229926 21.6507826,18.0927131 21.7075443,18.0927131 L26.5279127,18.0927131 Z M21.8396156,14.1838785 C21.7828539,14.1838785 21.7303938,14.1535989 21.7019583,14.1044234 L13.6842866,0.238979804 C13.6229085,0.132834954 13.6994241,0 13.8219438,0 L18.6423121,0 C18.6990739,0 18.7515339,0.0302796171 18.7799694,0.079455043 L26.7976412,13.9448987 C26.8590192,14.0510435 26.7825037,14.1838785 26.6599839,14.1838785 L21.8396156,14.1838785 Z" id="Shape"></path> <path d="M22.7927432,0.238902745 C22.7312518,0.132757822 22.8080126,9.48371234e-16 22.9308771,9.48371234e-16 L27.7581122,9.48371234e-16 C27.815084,9.48371234e-16 27.8677329,0.030313236 27.8962462,0.0795321007 L37.0870131,15.9444111 C37.1155739,15.993712 37.1155739,16.0544807 37.0870131,16.1037817 L27.8962462,31.9686606 C27.8677329,32.0178796 27.815084,32.0481928 27.7581122,32.0481928 L22.9308771,32.0481928 C22.8080126,32.0481928 22.7312518,31.915435 22.7927432,31.80929 L31.9373473,16.0240964 L22.7927432,0.238902745 Z M18.869675,15.9438211 C18.8987258,15.9931871 18.8988721,16.0542148 18.870058,16.1037172 L9.63558024,31.9685962 C9.5739752,32.0744338 9.42011783,32.0747967 9.3580064,31.9692507 L0.021891212,16.1043717 C-0.00715952754,16.0550057 -0.00730572325,15.993978 0.0215081708,15.9444756 L9.25598603,0.0795966217 C9.31759107,-0.0262411328 9.47144844,-0.0266039013 9.53355986,0.0789421517 L18.869675,15.9438211 Z" id="Shape"></path></g> <path d="M62.6639838,0 L67.9942883,0 L67.9942883,19.700953 L62.6639838,19.700953 L62.6639838,12.0175814 L55.0893407,12.0175814 L55.0893407,19.700953 L49.7590361,19.700953 L49.7590361,0 L55.0893407,0 L55.0893407,7.12048732 L62.6639838,7.12048732 L62.6639838,0 Z M79.2159821,0 L84.476151,0 L84.476151,19.700953 L79.2159821,19.700953 L79.2159821,0 Z M101.661921,19.700953 L93.944455,0.253297969 L93.944455,0 L99.7255383,0 L104.552462,13.3685039 L109.379386,0 L115.16047,0 L115.16047,0.253297969 L107.443004,19.700953 L101.661921,19.700953 Z M129.795227,14.8601475 L140.759958,14.8601475 L140.759958,19.700953 L124.453435,19.700953 L124.453435,0 L140.563155,0 L140.563155,4.8408056 L129.795227,4.8408056 L129.795227,7.57079483 L136.627098,7.57079483 L136.627098,12.0738699 L129.795227,12.0738699 L129.795227,14.8601475 Z" id="Shape" fill="#212529"></path> <path d="M56.0790663,39.4698795 C57.1135166,39.4698795 58.0886672,39.288686 59.0045181,38.9262989 C59.920369,38.5639119 60.7044428,38.0697477 61.3567395,37.4438065 C62.0090361,36.8178652 62.5246141,36.0667357 62.9034733,35.1904179 C63.2823325,34.3141002 63.471762,33.3784827 63.471762,32.3835655 C63.471762,31.3886483 63.2823325,30.4530309 62.9034733,29.5767131 C62.5246141,28.7003953 62.0090361,27.9492658 61.3567395,27.3233245 C60.7044428,26.6973833 59.920369,26.2032191 59.0045181,25.8408321 C58.0886672,25.478445 57.1135166,25.2972515 56.0790663,25.2972515 L56.0790663,25.2972515 L49.9118976,25.2972515 L49.9118976,39.4698795 L56.0790663,39.4698795 Z M56.0790663,35.9514307 L53.7564947,35.9514307 L53.7564947,28.8255836 L56.0790663,28.8255836 C57.1266943,28.8255836 57.9799511,29.1533791 58.6388366,29.8089703 C59.2977221,30.4645614 59.6271649,31.3227598 59.6271649,32.3835655 C59.6271649,33.4377824 59.2960749,34.2959808 58.633895,34.9581608 C57.971715,35.6203407 57.1201054,35.9514307 56.0790663,35.9514307 L56.0790663,35.9514307 Z M72.7221033,39.4698795 L73.5325325,37.3252071 L79.5415686,37.3252071 L80.3717644,39.4698795 L84.5425099,39.4698795 L84.5425099,39.2722139 L78.61254,25.2972515 L74.4813277,25.2972515 L68.5513578,39.2722139 L68.5513578,39.4698795 L72.7221033,39.4698795 Z M78.3160415,34.1032568 L74.7679429,34.1032568 L76.5469338,29.467997 L78.3160415,34.1032568 Z M94.1486493,39.4698795 L94.1486493,35.3189006 L98.1316124,35.3189006 C99.6141049,35.3189006 100.837985,34.8510919 101.803252,33.9154744 C102.768519,32.9798569 103.251153,31.7740964 103.251153,30.2981928 C103.251153,28.828878 102.766872,27.6280591 101.79831,26.6957361 C100.829749,25.763413 99.607516,25.2972515 98.1316124,25.2972515 L98.1316124,25.2972515 L90.3040521,25.2972515 L90.3040521,39.4698795 L94.1486493,39.4698795 Z M97.6077984,31.9981175 L94.1486493,31.9981175 L94.1486493,28.6575678 L97.6077984,28.6575678 C98.1349068,28.6575678 98.5664768,28.8140531 98.9025085,29.1270237 C99.2385401,29.4399944 99.4065559,29.8501506 99.4065559,30.3574925 C99.4065559,30.8450678 99.2385401,31.2403991 98.9025085,31.5434864 C98.5664768,31.8465738 98.1349068,31.9981175 97.6077984,31.9981175 L97.6077984,31.9981175 Z M113.381106,39.4698795 L113.381106,35.3189006 L117.36407,35.3189006 C118.846562,35.3189006 120.070442,34.8510919 121.035709,33.9154744 C122.000977,32.9798569 122.48361,31.7740964 122.48361,30.2981928 C122.48361,28.828878 121.999329,27.6280591 121.030768,26.6957361 C120.062206,25.763413 118.839973,25.2972515 117.36407,25.2972515 L117.36407,25.2972515 L109.536509,25.2972515 L109.536509,39.4698795 L113.381106,39.4698795 Z M116.840256,31.9981175 L113.381106,31.9981175 L113.381106,28.6575678 L116.840256,28.6575678 C117.367364,28.6575678 117.798934,28.8140531 118.134966,29.1270237 C118.470997,29.4399944 118.639013,29.8501506 118.639013,30.3574925 C118.639013,30.8450678 118.470997,31.2403991 118.134966,31.5434864 C117.798934,31.8465738 117.367364,31.9981175 116.840256,31.9981175 L116.840256,31.9981175 Z M134.511154,39.7762613 C135.828925,39.7762613 136.980328,39.6016566 137.965361,39.2524473 C138.950395,38.903238 139.731175,38.364599 140.3077,37.6365305 C140.884224,36.908462 141.172487,36.0272026 141.172487,34.9927523 C141.172487,34.6303652 141.134601,34.2959808 141.058829,33.989599 C140.983057,33.6832172 140.887519,33.411427 140.772214,33.1742282 C140.656909,32.9370294 140.495482,32.7163027 140.287933,32.5120482 C140.080384,32.3077937 139.87613,32.1348362 139.675169,31.9931758 C139.474209,31.8515154 139.220538,31.7164439 138.914157,31.5879612 C138.607775,31.4594785 138.329396,31.3557041 138.079019,31.2766378 C137.828643,31.1975715 137.515672,31.1201525 137.140107,31.0443806 C136.764543,30.9686088 136.440041,30.9076619 136.166604,30.8615399 C135.893166,30.8154179 135.552193,30.7627071 135.143684,30.7034074 C133.878624,30.5189194 133.048428,30.3525508 132.653097,30.2043016 C132.257765,30.0560523 132.0601,29.830384 132.0601,29.5272967 C132.0601,28.7234563 132.837585,28.3215361 134.392555,28.3215361 C136.14519,28.3215361 137.20929,28.8255836 137.584855,29.8336785 L137.584855,29.8336785 L140.668439,28.2721197 C140.226986,27.2969691 139.474209,26.5079537 138.410109,25.9050734 C137.346009,25.3021931 136.026591,25.000753 134.451854,25.000753 C132.587208,25.000753 131.081655,25.4372647 129.935194,26.310288 C128.788733,27.1833114 128.215503,28.3709526 128.215503,29.8732116 C128.215503,30.3278426 128.27645,30.7396461 128.398343,31.108622 C128.520237,31.4775979 128.666839,31.7905685 128.838149,32.0475339 C129.00946,32.3044992 129.261483,32.5384036 129.594221,32.749247 C129.926958,32.9600904 130.228398,33.126459 130.498541,33.2483528 C130.768684,33.3702466 131.145896,33.488846 131.630177,33.604151 C132.114458,33.7194559 132.508142,33.8034639 132.811229,33.8561747 C133.114317,33.9088855 133.545887,33.9780685 134.105939,34.0637236 C134.67917,34.1427899 135.137095,34.2136201 135.479716,34.2762142 C135.822336,34.3388084 136.127071,34.4014025 136.393919,34.4639966 C136.660768,34.5265907 136.855139,34.5924793 136.977033,34.6616623 C137.098927,34.7308453 137.187877,34.8082643 137.243882,34.8939194 C137.299887,34.9795745 137.32789,35.0817018 137.32789,35.2003012 C137.32789,35.9975527 136.477927,36.3961785 134.778003,36.3961785 C132.643213,36.3961785 130.893872,35.8163592 129.529979,34.6567206 L129.529979,34.6567206 L127.889354,37.8490211 C129.754,39.1338479 131.961267,39.7762613 134.511154,39.7762613 Z" id="DAPPS" fill-opacity="0.732025787" fill="#212529"><title>Hive Dapps</title></path></g></g></svg></a></div>
                       
                  
                    
                </div>
               </div>
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