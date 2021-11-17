<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - Honeycomb</title>
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/header.php";
include_once( $path );
?>
<style>
	.hive-c {
		color: #E31337
	}
	.hive-b {
		background: #E31337
	}
	.fusch-c {
		color: #FB00FF
	}
	.fusch-b {
		background: #FB00FF
	}
	.teal-c {
		color: #21FFB5
	}
	.teal-b {
		background: #21FFB5
	}
	.blue-c {
		color: #033EFD
	}
	.blue-b {
		background: #0052FE
	}
	.drop-shadow {
	filter: drop-shadow(3px 1px 1px #000);
	}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.4.0/nouislider.min.js" integrity="sha512-mZXUH8DAODwCHioWP3gltQwa953LbABMlzTYwYkKqv8eNxOk37B1HgNNuCMfFxgrpW5C34WJbxPDcM58+s1dJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.4.0/nouislider.css" integrity="sha512-DGB74Gyw93qON+V0QxSRs1er6sqoPyFoy23HBL5LN7MRJBcjeCU22zega+vOEGE0XQLoVrv4ExcaesSTwZQA2w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="d-flex flex-column h-100 padme-t70 bg-light">
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/nav.php";
include_once( $path );
?>
<main>
<div class="container">
	  <div class="container-fluid">
	    <img src="/img/honeycomb_alpha.png" class="img-fluid" alt="Hive Honeycomb">
    <header>
      <div class="jumbotron mt-5">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <h1 class="text-center">Build your community</h1>
				<hr>
              <p class="text-center">A honeycomb is a mass of hexagonal prismatic wax cells built by honey bees in their nests to contain their stores of honey and pollen.</p>
              <p class="text-center">Hive Honeycomb allows your community to run a constellation network around the HIVE blockchain.</p>
              <p class="text-center">Own every aspect of your community, on HIVE, powered by DLUX.</p>
              <p class="text-center"><a class="btn btn-info btn-lg" href="#" role="button"><i class="fas fa-project-diagram fa-flip-horizontal"></i><i class="fas fa-project-diagram fa-rotate-90 fa-flip-both"></i><i class="fas fa-project-diagram fa-flip-horizontal"></i><br><i class="fas fa-project-diagram"></i> <i class="fab fa-hive"></i> <i class="fas fa-project-diagram fa-flip-both"></i><br><i class="fas fa-project-diagram fa-flip-vertical"></i><i class="fas fa-project-diagram"></i><i class="fas fa-project-diagram fa-flip-vertical"></i></a><br><u class="text-info">Get Started now</u></p>
            </div>
          </div>
        </div>
      </div>
    </header>
    <section>

      <div class="container ">
        <div class="row bg-dark rounded pt-3 text-white">
          <div class="col-lg-4 col-md-6 col-sm-12 text-center">
            <center><div class="rounded-circle d-flex align-items-center justify-content-around teal-b mb-2" alt="140x140" style="width: 140px; height: 140px; color: #272C31; font-size: 5em;"><i class="fas fa-glass-cheers"></i></div></center>
            <h3>Free Forever</h3>
            <p>You may use this software free forever - the only cost to you will be the infrastructure you choose to run the software on</p>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 text-center">
            <center><div class="rounded-circle d-flex align-items-center justify-content-around blue-b mb-2" alt="140x140" style="width: 140px; height: 140px; color: #272C31; font-size: 5em;"><i class="fas fa-balance-scale"></i></div></center>
            <h3>Proof-of-Brain</h3>
            <p>Tribes, dApps, upvoting, Smart Contracts, Power-up accounts with token staking, Governance through token locking</p>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 text-center">
            <center><div class="rounded-circle d-flex align-items-center justify-content-around fusch-b mb-2" alt="140x140" style="width: 140px; height: 140px; color: #272C31; font-size: 5em;"><i class="fas fa-coins"></i></div></center>
            <h3>Tokens</h3>
            <p>Fungible tokens, Non fungible tokens (NFTs), Smart NFTs (Generative, Smart Contract), Decentralized Exchange (DEX)</p>
          </div>
			<div class="d-flex ml-auto mt-3 mr-2"><a href="https://dlux.io" class="text-white-50 drop-shadow"><h5><b>Powered by DLUX</b></h5></a></div>
        </div>
        <div class="row">
          <div class="col-sm-12 mt-4 mb-2 text-center">
            <h2>TESTIMONIALS</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-lg-6">
            <blockquote class="blockquote">
              <p class="mb-0">Holy crap this is exactly what I've been waiting for</p>
              <small class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></small> 
            </blockquote>
          </div>
          <div class="col-sm-6 col-lg-6">
            <blockquote class="blockquote">
              <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
              <small class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></small> 
            </blockquote>
          </div>
          <div class="col-sm-6 col-lg-6">
            <blockquote class="blockquote">
              <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
              <small class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></small> 
            </blockquote>
          </div>
          <div class="col-sm-6 col-lg-6">
            <blockquote class="blockquote">
              <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
              <small class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></small> 
            </blockquote>
          </div>
        </div>
      </div>
      <div class="jumbotron">
        <div class="container">
          <div class="row">
            <div class="text-center col-md-8 col-12 mx-auto">
              <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore, praesentium, autem, veritatis error quidem eos fuga atque asperiores magnam deleniti necessitatibus sequi</p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4 col-auto mx-auto"> <a class="btn btn-block btn-lg btn-success" href="#" title="">Sign up now!</a> </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-12 mb-2 text-center">
            <h2>OUR SERVICES</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-lg-4">
            <h3>Feature Description</h3>
            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt impedit est voluptatem doloremque architecto corporis suscipit quidem ratione! Quis laborum nam optio dolorem doloremque ex nobis quibusdam ad quo dolores? </p>
            <p><a class="btn btn-link" href="http://www.adobe.com">View details »</a></p>
          </div>
          <div class="col-sm-6 col-lg-4">
            <h3>Feature Description</h3>
            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate, illo, libero esse assumenda culpa consequatur exercitationem beatae odio praesentium nihil iste ipsum reiciendis pariatur. Recusandae, reiciendis quidem eaque aut ab. </p>
            <p><a class="btn btn-link" href="http://www.adobe.com">View details »</a></p>
          </div>
          <div class="col-sm-6 col-lg-4">
            <h3>Feature Description</h3>
            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, adipisci recusandae veniam laudantium distinctio temporibus eveniet dolorum earum iusto veritatis provident ducimus minima dolore quas vel omnis cumque voluptas quibusdam.</p>
            <p><a class="btn btn-link" href="http://www.adobe.com">View details »</a></p>
          </div>
          <div class="col-sm-6 col-lg-4">
            <h3>Feature Description</h3>
            <p> <em class="icon-desktop "></em> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, earum rem nostrum provident repellat inventore laborum deleniti quas facere Quasi impedit autem qui cupiditate modi vero vitae dolorum nisi explicabo ea dolores animi. Inventore, omnis.</p>
            <p><a class="btn btn-link" href="http://www.adobe.com">View details »</a></p>
          </div>
          <div class="col-sm-6 col-lg-4">
            <h3>Feature Description</h3>
            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, iure, perspiciatis, ab ad quia animi esse repudiandae tempore quisquam dolorem sequi voluptatum qui fugiat. Quasi impedit autem qui cupiditate iusto?</p>
            <p><a class="btn btn-link" href="http://www.adobe.com">View details »</a></p>
          </div>
          <div class="col-sm-6 col-lg-4">
            <h3>Feature Description</h3>
            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, aut, hic laudantium reprehenderit sapiente nemo consequatur corrupti accusantium! Hic, non rerum nihil reprehenderit excepturi explicabo error tempore aliquam eveniet odit.</p>
            <p><a class="btn btn-link" href="http://www.adobe.com">View details »</a></p>
          </div>
        </div>
      </div>
    </section>
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-8 mx-auto">
          <div class="jumbotron">
            <div class="row text-center">
              <div class="text-center col-12">
                <h2>Request a free quote</h2>
              </div>
              <div class="text-center col-12">
                <!-- CONTACT FORM https://github.com/jonmbake/bootstrap3-contact-form -->
                <form id="feedbackForm" class="text-center">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" aria-describedby="nameHelp">
                    <span id="nameHelp" class="form-text text-muted" style="display: none;">Please enter your name.</span>
                  </div>
                  <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" aria-describedby="emailHelp">
                    <span id="emailHelp" class="form-text text-muted" style="display: none;">Please enter a valid e-mail address.</span>
                  </div>
                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea rows="10" cols="100" class="form-control" id="message" name="message" placeholder="Message" aria-describedby="messageHelp"></textarea>
                    <span id="messageHelp" class="form-text text-muted" style="display: none;">Please enter a message.</span>
                  </div>
                  <button type="submit" id="feedbackSubmit" class="btn btn-primary btn-lg"> Send</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="text-center">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <p>Copyright © MyWebsite. All rights reserved.</p>
          </div>
        </div>
      </div>
    </footer>
	</div></div></main>
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/footer.php";
include_once( $path );
?>
</body>
</html>
