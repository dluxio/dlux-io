<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>body {
  font-size: 18px;
  font-family: 'Roboto', Arial, sans-serif;
  background: linear-gradient(to bottom, antiquewhite 0%, #B89D80 100%);
}

.flex-1 {
  flex: 1;
}

a:hover {
  text-decoration: none;
  color: currentColor;
}

.breadcrumb {
  background: transparent;
  padding: 0;
}

.breadcrumb a {
  color: black;
  text-decoration: none;
}

.breadcrumb * {
  font-size: 1rem;
}

.banner {
  position: relative;
  background: url(../img/banner.jpg) center / cover no-repeat;
  height: 50vh;
}

.banner::after {
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background: linear-gradient(to bottom,rgba(0,0,0,.6) 0,rgba(0,0,0,.4) 50%,rgba(0,0,0,.15) 100%);
}

.banner-title {
  font-size: 3.5rem;
  color: white;
  z-index: 2;
}

.main {
  margin: 1rem 0;
}

.intro {
  font-size: 1.5rem;
  margin: 1rem 0;
}

img {
  margin-bottom: 1rem;
}

.nav-mytabs {
  margin-top: 2rem;
}

.nav-mytabs li:not(:last-child) {
  margin-right: 7px;
}

.nav-mytabs a {
  position: relative;
  top: 4px;
  padding: 10px 25px;
  border-radius: 2px 2px 0 0;
  background: white;
  color: black;
  opacity: 0.7;
  transition: all 0.1s ease-in-out;
}

.nav-mytabs a.active, 
.nav-mytabs a:hover {
  opacity: 1;
  top: 0;
}

.mytab-content {
  position: relative;
  z-index: 2;
  padding: 25px;
  border-radius: 0 4px 4px 4px;
  background: white;
}

footer {
  background: #333;
  padding: 20px;
}

footer * {
  font-size: .9rem;
  color: white;
}</style>
    <title>How to Add Deep Linking to the Bootstrap 4 Tabs Component</title>
  </head>
  <body>
    <section class="banner d-flex align-items-center">
      <div class="container">
        <div class="row flex-1">
          <h1 class="banner-title">Meet the City</h1>
        </div>
      </div>
    </section>
    <section class="main">
      <div class="container">
        <div class="row">
          <div class="col">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Company</li>
              </ol>
            </nav>
            <div class="intro">
              But I must explain to you how all this <strong>mistaken idea</strong> of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the <strong>great explorer</strong> of the truth, the master-builder of human happiness.
            </div>
            <ul class="nav nav-mytabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active show" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="true">History</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="city-attractions-tab" data-toggle="tab" href="#city-attractions" role="tab" aria-controls="city-attractions" aria-selected="false">City Attractions</a>
              </li>
            </ul>
            <div class="tab-content mytab-content" id="myTabContent">
              <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                <p>The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words.</p>
                <p>Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words.</p>
                <ul>
                  <li>Pronunciation</li>
                  <li>Individual Languages</li>
                  <li>Expensive Translators</li>
                  <li>Existence</li>
                  <li>Bla Bla</li>
                </ul>
              </div>
              <div class="tab-pane fade active show" id="history" role="tabpanel" aria-labelledby="history-tab">
                <p>If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages. It will be as simple as Occidental; in fact, it will be Occidental.</p><p>
                <img class="img-fluid" src="img/smiling.jpg" alt="">
                </p><p>To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators.</p>
              </div>
              <div class="tab-pane fade" id="city-attractions" role="tabpanel" aria-labelledby="city-attractions-tab">
                <p>The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words.</p>
                <img class="img-fluid" src="img/man.jpg" alt="">
                <p>If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages. It will be as simple as Occidental; in fact, it will be Occidental.</p>
                <p>To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div>Photos from <a href="http://unsplash.com/" target="_blank">Unsplash</a> &amp; <a href="https://tutsplus.com/" target="_blank">Tuts+</a>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>$(document).ready(() => {
  let url = location.href.replace(/\/$/, "");
  
  if (location.hash) {
    const hash = url.split("#");
    $('#myTab a[href="#'+hash[1]+'"]').tab("show");
    url = location.href.replace(/\/#/, "#");
    history.replaceState(null, null, url);
    setTimeout(() => {
      $(window).scrollTop(0);
    }, 400);
  } 
  
  $('a[data-toggle="tab"]').on("click", function() {
    let newUrl;
    const hash = $(this).attr("href");
    if(hash == "#home") {
      newUrl = url.split("#")[0];
    } else {
      newUrl = url.split("#")[0] + hash;
    }
    newUrl += "/";
    history.replaceState(null, null, newUrl);
  });
});</script>
  
</body></html>