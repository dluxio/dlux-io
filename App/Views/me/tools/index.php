<!doctype html>
<html lang="en" class="h-100"><head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>DLUX - Create</title>
<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon" />
<link href="../css/bootstrap-4.4.1.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/session.js"></script>
<script type="text/javascript" src="https://kit.fontawesome.com/0f693ffc58.js" crossorigin="anonymous"></script>
<!--page specific-->

</head>

<body>
<?php include '../modules/nav.php';?>
<div class="container-fluid text-white">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-dark sidebar">
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

      </div>
    </nav>
	  <main role="main" class="flex-shrink-0">
</main>
	</div>
	</div>


<script type="text/javascript" src="../js/popper.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-4.4.1.js"></script>
<script>checkCookie()</script>
</body></html>