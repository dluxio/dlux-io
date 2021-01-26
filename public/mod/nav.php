<header class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:rgba(42, 48, 54, 0.8); -webkit-backdrop-filter: blur(10px);
  backdrop-filter: blur(10px);">
  <div class="container-fluid">
	<a class="navbar-brand" href="/"><img src="/img/dluxcolorlogo.png" alt="dlux-logo" width="32" height="32" class="rounded"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item"> <a class="nav-link" href="/apps/">APPS</a></li>
        <li class="nav-item"> <a class="nav-link" href="/dex/">EXCHANGE</a></li>
        <li class="nav-item"> <a class="nav-link" href="/docs/">DOCS</a></li>
      </ul>
	<ul class="navbar-nav mr-5 no-session" id="loginMenu">
	<li class="nav-item"><a class="nav-link acct-link" href="#" data-toggle="modal" data-target="#loginModal">Login</a></li>
	<li class="nav-item"><a class="nav-link acct-link" href="https://signup.hive.io/">Sign up</a></li>
	</ul>
    <div class="mr-5 active-session" id="userMenu">
	  <ul class="nav navbar-nav">
		<li class="nav-item my-auto">
			<a class="nav-link" href="/new/" data-toggle="tooltip"  title="Create a new app">
				<i class="fas fa-fw fa-lg fa-plus mr-2"></i></a></li>
		<li class="nav-item dropdown">
		  <a class="nav-link dropdown-toggle text-white-50" id="userDropdown" data-toggle="dropdown" href="#">
			  <img src="" id="userImage" alt="" width="30" height="30" class="img-fluid rounded-circle bg-light mr-1 cover">
			  <span id="userName">username</span></a>
          <div class="dropdown-menu pt-0" aria-labelledby="userDropdown">
              <div class="p-2">
			  <div class="progress border border-secondary" data-toggle="tooltip"  title="UPVOTE POWER" style="height: 10px; margin-bottom: 2px;">
  				<div class="progress-bar progress-bar-striped bg-primary" id="upvotePower" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><span id="upvotePowerSpan" class="small">100%</span></div>
			</div>
			<div class="progress border border-secondary" data-toggle="tooltip"  title="DOWNVOTE POWER" style="height: 10px;  margin-bottom: 2px;">
  				<div class="progress-bar progress-bar-striped bg-danger" id="downvotePower" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"><span id="downvotePowerSpan" class="small">90%</span></div>
			</div>
			<div class="progress border border-secondary" data-toggle="tooltip"  title="HIVE VOTE POWER" style="height: 10px;  margin-bottom: 2px;">
  				<div class="progress-bar progress-bar-striped bg-info" id="resourceCredits" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"><span id="resourceCreditsSpan" class="small">80%</span></div>
			</div>
				  </div>
			 <a class="dropdown-item" href="/me/#blog"><i class="fas fa-user fa-fw mr-2"></i>Profile</a>
			 <a class="dropdown-item" href="/me/#wallet"><i class="fas fa-wallet fa-fw mr-2"></i>Wallet</a>
			 <a class="dropdown-item" href="/me/#inventory"><i class="fas fa-boxes fa-fw mr-2"></i>Inventory</a>
			 <a class="dropdown-item" href="/me/#node"><i class="fas fa-robot fa-fw mr-2"></i>Node</a>
             <div class="dropdown-divider"></div>
			 <a class="dropdown-item" href="/me/#settings"><i class="fas fa-cog fa-fw mr-2"></i>Settings</a>
			 <a class="dropdown-item" href="/docs/"><i class="fas fa-info-circle fa-fw mr-2"></i>About</a>
             <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="#" onclick="logout()" data-toggle="modal" data-target="#loginModal"><i class="fas fa-user-friends mr-2"></i>Switch User</a>
			 <a class="dropdown-item" href="#" onclick="logout()"><i class="fas fa-power-off fa-fw mr-2"></i>Logout</a></div>
        </li>
      </ul>
	</div>
    </div>
    </div>
</header>
<container id="propVotePlead" class="m-auto">
</container>
<!-- Login Modal -->       
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content text-white bg-darker">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalTitle">Login to DLUX</h5>
        <button type="button" class="close" style="color: #fff !important;" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
          <div id="hiveKeychain">
              <p class="text-center">Using Hive Keychain</p>
              <div class="input-group mb-3 ">
                  <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                  </div>
                  <input type="text" autocorrect="off" autocapitalize="none" class="form-control" id="hk-username" placeholder="username" aria-label="Username" aria-describedby="addon">
                  <div class="input-group-append">
                      <button class="btn btn-form btn-danger" onclick="hiveKeychain()">Login<i class="fas fa-key mx-2"></i></button>
                  </div>
              </div>
          </div>
          <div id="getKeychain">
              <p class="text-center">Get Hive Keychain<i class="fas fa-key mx-2"></i></p>
              <div class="d-flex justify-content-center">
                  <a href="https://chrome.google.com/webstore/detail/hive-keychain/jcacnejopjdphbnjgfaaobbfafkihpep" target="_blank" class="btn btn-outline-danger mx-2"><i class="fab fa-chrome mr-2"></i>Chrome Extension</a>
                  <a href="https://addons.mozilla.org/firefox/addon/hive-keychain/" target="_blank" class="btn btn-outline-danger mx-2"><i class="fab fa-firefox mr-2"></i>Firefox Extension</a>
              </div>
          </div>
      </div>
      <div class="modal-footer justify-content-center">
        <p class="small">By logging in you agree to our <a href="#">Terms of Service</a>.</p>
      </div>
    </div>
  </div>
</div>