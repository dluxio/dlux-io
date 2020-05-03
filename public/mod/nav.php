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
	<ul class="navbar-nav mr-5" id="no-session">
	<li class="nav-item"><a class="nav-link acct-link" href="/login/">Login</a></li>
	<li class="nav-item"><a class="nav-link acct-link" href="https://signup.hive.io/">Sign up</a></li>
	</ul>
    <div class="mr-5" id="active-session">
	  <ul class="nav navbar-nav">
		<li class="nav-item my-auto">
			<a class="nav-link" href="/new/" data-toggle="tooltip"  title="Create a new app">
				<i class="fas fa-fw fa-lg fa-plus mr-2"></i></a></li>
		<li class="nav-item dropdown">
		  <a class="nav-link dropdown-toggle text-white-50" id="userDropdown" data-toggle="dropdown" href="#">
			  <img src="https://token.dlux.io/getauthorpic/{{author}}" id="userImage" alt="" width="30" height="30" class="img-fluid rounded-circle bg-light mr-1 cover">
			  <span id="userName">username</span></a>
          <div class="dropdown-menu" aria-labelledby="userDropdown">
              <div class="p-2" style="background-color: lightgray; border-radius: 3px 3px 0px 0px">
			  <div class="border border-secondary">
			  <div class="progress" style="height: 3px;">
  				<div class="progress-bar" id="dluxVotePower" role="progressbar" style="width: 70%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
			<div class="progress" style="height: 3px;">
  				<div class="progress-bar bg-danger" id="hiveVotePower" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
			<div class="progress" style="height: 3px;">
  				<div class="progress-bar bg-info" id="hiveResources" role="progressbar" style="width: 80%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
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
             <a class="dropdown-item" href="/login/"><i class="fas fa-user-friends mr-2"></i>Switch User</a>
			 <a class="dropdown-item" href="javascript:logout()"><i class="fas fa-power-off fa-fw mr-2"></i>Logout</a></div>
        </li>
      </ul>
	</div>
    </div>
    </div>
</header>
