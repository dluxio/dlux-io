<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - New NFT</title>
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/header.php";
include_once( $path );
?>
<style>
[style*="--aspect-ratio"] > :first-child {
  width: 100%;
}
[style*="--aspect-ratio"] > img {  
  height: auto;
} 
@supports (--custom:property) {
  [style*="--aspect-ratio"] {
    position: relative;
  }
  [style*="--aspect-ratio"]::before {
    content: "";
    display: block;
    padding-bottom: calc(100% / (var(--aspect-ratio)));
  }  
  [style*="--aspect-ratio"] > :first-child {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
  }	
</style>
</head>
<body class="d-flex flex-column h-100 padme-t70 text-white" id="index">
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/nav.php";
include_once( $path );
?>
<main role="main" class="flex-shrink-0">
<div class="container">
<div class="container-fluid my-4">
 
    
      <form class="bg-darker p-4 border border-primary">
        <h2>NFT Script Creator</h2>
		  <p class="lead">Generate the script needed to mint your new NFT set</p>
        <h5>Logo image</h5>
        <p class="text-muted">This image will also be used for navigation. 350 x 350 recommended.</p>
        <div class="d-flex col-4 my-3 mx-0 p-1 rounded-circle cover" style="--aspect-ratio:350/350; border: .3em dashed grey; max-width: 350px">
          <div class="d-flex align-items-center text-center rounded-circle bg-dark px-3 py-4">
            <h1 class="ml-auto mr-auto" style="font-size:5em"><i class="fas fa-image"></i></h1>
          </div>
        </div>
        <h5>Featured image</h5>
        <p class="text-muted">This image will be used for featuring your collection on the homepage, category pages, or other promotional areas of DLUX. 600 x 400 recommended.</p>
        <div class="d-flex img-fluid my-3 mx-0 p-1" style="--aspect-ratio:600/400; border: .3em dashed grey; max-width: 600px;">
          <div class="d-flex align-items-center text-center m-0 bg-dark px-3 py-4" >
            <h1 class="ml-auto mr-auto" style="font-size:5em"><i class="fas fa-image"></i></h1>
          </div>
        </div>
        <h5>Banner image</h5>
        <p class="text-muted">This image will appear at the top of your collection page. Avoid including too much text in this banner image, as the dimensions change on different devices. 1400 x 400 recommended.</p>
        <div class="d-flex img-fluid my-3 mx-0 p-1" style="--aspect-ratio:1400/400; border: .3em dashed grey">
          <div class="d-flex align-items-center text-center m-0 bg-dark px-3 py-4" >
            <h1 class="ml-auto mr-auto" style="font-size:5em"><i class="fas fa-image"></i></h1>
          </div>
        </div>
        <div class="form-group">
          <h5>Name</h5>
          <input type="text" class="form-control" id="" placeholder="Example: Treasure of the multiverse">
        </div>
        <div class="form-group">
          <h5>URL</h5>
          <p id="emailHelp1" class="form-text text-muted my-2">Customize your URL on DLUX. Must only contain lowercase letters, numbers, and hyphens.</p>
          <input type="text" class="form-control" id="" placeholder="https://dlux.io/assets/treasure-of-the-multiverse">
        </div>
        <div class="form-group">
          <h5>Description</h5>
          <p class="form-text text-muted">Markdown syntax is supported. 0 of 1000 characters used.</p>
          <textarea class="form-control" rows="2" id="validationCustomDescription" placeholder="Provide a detailed description of your collection." required></textarea>
        </div>
		  <div class="form-row">
		 <div class="form-group col-4">
          <h5>Color 1</h5>
          <p class="form-text text-muted">Enter color 1 of your gradient</p>
          <input type="text" class="form-control" id="" placeholder="#000000">
        </div>
			 <div class="form-group col-4">
          <h5>Color 2</h5>
          <p class="form-text text-muted">Enter color 2 of your gradient</p>
          <input type="text" class="form-control" id="" placeholder="#ffffff">
        </div>
			  <div class="form-group col-4">
          <h5>Font Awesome Icon</h5>
          <p class="form-text text-muted">Enter your fa icon free only (list here)</p>
          <input type="text" class="form-control" id="" placeholder="fa fa-gem">
        </div>
		  
		  </div>
        <div class="form-group">
          <h5>Category</h5>
          <p id="emailHelp1" class="form-text text-muted my-2">Adding a category will help make your item discoverable on DLUX.</p>
          <div class="dropdown show"> <a class="btn btn-lg btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Add category </a>
            <div class="dropdown-menu"> <a class="dropdown-item" href="#">Art</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Trading Cards</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Collectibles</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Sports</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Utility</a> </div>
          </div>
        </div>
        <div class="form-group">
          <h5>Links</h5>
          <p id="emailHelp1" class="form-text text-muted my-2">Customize your URL on DLUX. Must only contain lowercase letters, numbers, and hyphens.</p>
          <input type="text" class="form-control" id="" placeholder="https://dlux.io/assets/treasure-of-the-multiverse">
        </div>

        <div class="form-group d-flex">
          <div class="flex-fill">
            <h5>Explicit &amp; sensitive content</h5>
            <p id="emailHelp1" class="form-text text-muted my-2">Set this collection as explicit and sensitive content.</p>
          </div>
          <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="nsfwset">
            <label class="custom-control-label" for="nsfwset"></label>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
      </form>

      <form class="bg-darker p-4 border border-info">
        <h2>Create new item</h2>
        <h5>Image, Video, Audio, or 3D Model</h5>
        <p class="text-muted">File types supported: JPG, PNG, GIF, SVG, MP4, WEBM, MP3, WAV, OGG, GLB, GLTF. Max size: 100 MB</p>
        <div class="d-flex my-3 mx-0 p-1" style="border: .3em dashed grey">
          <div class="flex-fill text-center m-0 bg-dark px-3 py-4" >
            <h1 class="m-0" style="font-size:5em"><i class="fas fa-image"></i></h1>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Item name">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">External Link</label>
          <p id="emailHelp1" class="form-text text-muted">DLUX will include a link to this URL on this item's detail page, so that users can click to learn more about it. You are welcome to link to your own webpage with more details.</p>
          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="https://yoursite.io/item/123">
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <p class="form-text text-muted">The description will be included on the item's detail page underneath its image. Markdown syntax is supported.</p>
          <textarea class="form-control" rows="2" id="validationCustomDescription" placeholder="Provide a detailed description of your item." required></textarea>
        </div>
        <div class="form-group">
          <h5>Collection</h5>
          <p id="emailHelp1" class="form-text text-muted my-2">This is the collection where your item will appear. </p>
          <div class="d-flex">
            <select class="btn btn-lg btn-secondary d-flex flex-fill">
              <option>Collection 1</option>
              <option>Collection 2</option>
              <option>Collection 3</option>
              <option>Collection 4</option>
            </select>
          </div>
          <ul class="p-0">
            <li class="d-flex justify-content-between border-bottom py-2">
              <div class="d-flex">
                <h4 class="mr-2"><i class="fas fa-list"></i></h4>
                <div class="d-flex flex-column">
                  <h4> Properties</h4>
                  <span class="small text-muted">Textual traits that show up as rectangles</span></div>
              </div>
              <button class="btn btn-outline-info"><span style="font-size: 2em"><i class="fas fa-plus"></i></span></button>
            </li>
            <li class="d-flex justify-content-between border-bottom py-2">
              <div class="d-flex">
                <h4 class="mr-2"><i class="fas fa-star"></i></h4>
                <div class="d-flex flex-column">
                  <h4> Levels</h4>
                  <span class="small text-muted">Numerical traits that show as a progress bar</span></div>
              </div>
              <button class="btn btn-outline-info"><span style="font-size: 2em"><i class="fas fa-plus"></i></span></button>
            </li>
            <li class="d-flex justify-content-between border-bottom py-2">
              <div class="d-flex">
                <h4 class="mr-2"><i class="fas fa-rotate-270 fa-align-left"></i></h4>
                <div class="d-flex flex-column">
                  <h4> Stats</h4>
                  <span class="small text-muted">Numerical traits that just show as numbers</span></div>
              </div>
              <button class="btn btn-outline-info"><span style="font-size: 2em"><i class="fas fa-plus"></i></span></button>
            </li>
            <li class="d-flex flex-column">
              <div class="d-flex">
                <div class="d-flex">
                  <h4 class="mr-2"><i class="fas fa-lock-open"></i></h4>
                  <div class="d-flex flex-column">
                    <h4> Unlockable Content</h4>
                    <span class="small text-muted">Include unlockable content that can only be revealed by the owner of the item.</span> </div>
                </div>
                <div class="custom-control custom-switch ml-auto">
                  <input type="checkbox" class="custom-control-input" id="unlockable">
                  <label class="custom-control-label" for="unlockable"></label>
                </div>
              </div>
              <textarea class="form-control my-2" rows="2" id="validationCustomDescription" placeholder="Enter content like access key, redemption code, link to a file, etc" required></textarea>
              <p class="form-text text-muted">Markdown syntax is supported. 0 of 1000 characters used.</p>
            </li>
            <li class="d-flex justify-content-between py-2">
              <div class="d-flex">
                <h4 class="mr-2"><i class="fas fa-exclamation-triangle"></i></h4>
                <div class="d-flex flex-column">
                  <h4> Explicit &amp; Sensitive Content</h4>
                  <span class="small text-muted">Set this item as explicit and sensitive content</span></div>
              </div>
              <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="nsfwitem">
                <label class="custom-control-label" for="nsfwitem"></label>
              </div>
            </li>
          </ul>
          <div class="form-group">
            <h5>Supply</h5>
            <p id="emailHelp1" class="form-text text-muted my-2">The number of copies that can be minted. </p>
            <input type="number" class="form-control" id="" placeholder="1">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
      </form>
 
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
