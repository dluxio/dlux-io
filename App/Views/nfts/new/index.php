<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - Create NFT</title>
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/header.php";
include_once( $path );
?>

</head>
<body class="d-flex flex-column bg-darker h-100 padme-t70">
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/nav.php";
include_once( $path );
?>
<main role="main" class="flex-shrink-0 text-white">
  <div class="container-fluid px-0 ">
    <div class="container">
      <div class="jumbotron bg-dark">
        <h1 class="display-4">STEP 1: Generate Script</h1>
        <p class="lead">In order to mint your NFT, you must first set up the script which defines it. We hope to streamline and automate these processes further in the future.</p>
        <hr class="my-4">
        <p>For now, you may use this form to build the script you will need in step 2.</p>

        <p class="lead"> <a class="btn btn-primary btn-lg" href="/nfts/new/script" role="button">Begin Step 1</a></p>
      </div>
	  <div class="jumbotron bg-dark">
        <h1 class="display-4">STEP 2: Mint Wrapped NFTs</h1>
        <p class="lead">Once you have your script generated and assets have been uploaded to IPFS, you can claim the namespace and mint wrapped tokens ready to distribute.</p>
        <hr class="my-4">
        <p>This form will further refine the financial parameters of your NFT set.</p>

        <p class="lead"> <a class="btn btn-primary btn-lg" href="/nfts/new/set" role="button">Begin Step 2</a></p>
      </div>
    </div>
  </div>
</main>
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/footer.php";
include_once( $path );
?>
</body>
</html>
