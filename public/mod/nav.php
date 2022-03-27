<script>function showTab(str) {
    $('#usertabs a[href="#'+str+'"]').tab("show");
  }</script>
<header class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:rgba(42, 48, 54, 0.8); -webkit-backdrop-filter: blur(10px);
  backdrop-filter: blur(10px);">
  <div class="container-fluid">
	<a class="navbar-brand" href="/"><img src="/img/dlux-hive-logo-alpha.svg" alt="dlux-logo" width="40" height="40"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item"> <a class="nav-link" href="/apps/">APPS</a></li>
        <li class="nav-item"> <a class="nav-link" href="/nfts/">NFTS</a></li>
        <li class="nav-item"> <a class="nav-link" href="/dex/">DEX</a></li>
        <li class="nav-item"> <a class="nav-link" href="/docs/">DOCS</a></li>
      </ul>
	<ul class="navbar-nav mr-5 no-session" id="loginMenu">
	<li class="nav-item"><a class="nav-link acct-link" href="/about/">About</a></li>
	<li class="nav-item"><a class="nav-link acct-link" href="https://signup.hive.io/">Get Account</a></li>
	<li class="nav-item"><a class="nav-link acct-link" href="#" data-toggle="modal" data-target="#loginModal">Login</a></li>
	</ul>
    <div class="mr-5 active-session" id="userMenu">
		<input id="userCookie" value="null" type="text" class="d-none">
		<input id="userPFP" value="null" type="text" class="d-none">
	  <ul class="nav navbar-nav">
		<li class="nav-item my-auto">
			<a class="nav-link" href="/new/" data-toggle="tooltip"  title="Create a new app">
				<i class="fas fa-fw fa-lg fa-plus mr-2"></i></a></li>
		<li class="nav-item dropdown">
		  <a class="nav-link dropdown-toggle text-white-50" id="userDropdown" data-toggle="dropdown" href="#">
			  <img src="" id="userImage" alt="" width="30" height="30" class="img-fluid rounded-circle bg-light mr-1 cover">
			  <span id="userName">username</span></a>
          <div class="dropdown-menu pt-0" aria-labelledby="userDropdown">
			 <a class="dropdown-item" href="/me#blog/" onClick="showTab('blog')"><i class="fas fa-user fa-fw mr-2"></i>Profile</a>
			 <a class="dropdown-item" href="/me#wallet/" onClick="showTab('wallet')"><i class="fas fa-wallet fa-fw mr-2"></i>Wallet</a>
			 <a class="dropdown-item" href="/me#inventory/" onClick="showTab('inventory')"><i class="fas fa-boxes fa-fw mr-2"></i>Inventory</a>
			 <a class="dropdown-item" href="/me#node/" onClick="showTab('node')"><i class="fas fa-robot fa-fw mr-2"></i>Node</a>
			 <a class="dropdown-item" href="/me#settings/" onClick="showTab('settings')"><i class="fas fa-cog fa-fw mr-2"></i>Settings</a>
             <div class="dropdown-divider"></div>
			 <a class="dropdown-item" href="/about/"><i class="fas fa-info-circle fa-fw mr-2"></i>About</a>
             <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="#" onclick="logout()" data-toggle="modal" data-target="#loginModal"><i class="fas fa-user-friends mr-2"></i>Switch User</a>
			 <a class="dropdown-item" href="#" onclick="logout()"><i class="fas fa-power-off fa-fw mr-2"></i>Logout</a></div>
        </li>
      </ul>
	</div>
    </div>
    </div>
</header>
<container id="propVotePlead" >
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
        <p class="small">By logging in you agree to our <a href="/about/">Terms of Service</a>.</p>
      </div>
    </div>
  </div>
</div>
<div id="notificationholder" class="fixed-bottom">
</div>