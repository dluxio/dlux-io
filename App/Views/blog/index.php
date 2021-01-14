<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
<title>DLUX - Apps</title>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/header.php";
   include_once($path);
?>
<!--dmxAppConnect-->
<script src="/dmxAppConnect/dmxAppConnect.js"></script>
<script src="/dmxAppConnect/dmxMoment.js"></script>
<script src="/dmxAppConnect/dmxFormatter.js"></script>
<script src="/dmxAppConnect/dmxDataTraversal/dmxDataTraversal.js"></script>
<script src="/dmxAppConnect/dmxFormatter/dmxFormatter.js"></script>
<!--page specific-->
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
</head>
<body class="d-flex flex-column h-100" id="blog" is="dmx-app" class="text-white">
<?php
	echo "<dmx-api-datasource id=\"dluxGetContent\" is=\"dmx-fetch\" url=\"https://token.dlux.io/api/condenser_api/get_content/\" dmx-param:author=\"'".$author."'\" dmx-param:permlink=\"'".$permlink."'\"></dmx-api-datasource>";
	echo "<dmx-api-datasource id=\"dluxGetReplies\" is=\"dmx-fetch\" url=\"https://token.dlux.io/api/condenser_api/get_content_replies/\" dmx-param:author=\"'".$author."'\" dmx-param:permlink=\"'".$permlink."'\"></dmx-api-datasource>";
?>	
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/nav.php";
   include_once($path);
?>

<main role="main" class="flex-shrink-0 ">
  <div class="container bg-dark text-white pb-2 mb-3">
    <div class="d-flex align-items-center">
      <div> <a dmx-bind:href="/@{{dluxGetContent.data.result.author}}"><img dmx-bind:src="https://token.dlux.io/getauthorpic/{{dluxGetContent.data.result.author}}" alt="" class="rounded-circle bg-light img-fluid mr-2 cover author-img"/></a> </div>
      <div>
        <p class="mt-0 mb-0 text-muted text-semibold"> <a dmx-bind:href="/@{{dluxGetContent.data.result.author}}" class="a-1">{{dluxGetContent.data.result.author}}<span class="ml-2 badge badge-pill badge-light">{{dluxGetContent.data.result.author_reputation.toString().rep()}}</span></a><br>
          <small class="text-muted ml-2">{{dluxGetContent.data.result.created.formatDate("MMM dd, yyyy")}}</small> </p>
      </div>
      <div class="ml-auto"> <span class="badge badge-secondary">{{dluxGetContent.data.result.json_metadata.scat()}}</span> </div>
    </div>
    <hr class="mt-0" />
    <div class="d-flex">
      <h4 class="text-center p-2">{{dluxGetContent.data.result.title}}</h4>
    </div>
    <div class="d-flex"> <img src="..." alt="Card image cap" class="card-img-top" dmx-bind:src="{{dluxGetContent.data.result.json_metadata.parseJSON().image}}"/> </div>
    <div class="d-flex">
      <p class="p-2">{{dluxGetContent.data.result.body.removeMD()}}</p>
    </div>
    <div class="d-flex justify-content-center"> <a dmx-bind:href="{{dluxGetContent.data.result.url}}" type="button" class="btn btn-outline-danger mb-4 btn-launch">Launch App</a> </div>
	  <div class="card-footer">
    <div class="collapse" dmx-bind:id="vote{{dluxGetContent.data.result.id}}">
      <form id="voteForm">
        <div class="d-flex align-items-center text-white-50">
          <div>
            <button type="button" class="btn btn-primary" dmx-bind:id="voteBtn{{dluxGetContent.data.result.id}}" dmx-bind:onclick="vote('{{dluxGetContent.data.result.author}}','{{dluxGetContent.data.result.permlink}}','slider{{dluxGetContent.data.result.id}}')" style="width:70px">100%</button>
            <button type="button" class="btn btn-secondary" data-toggle="collapse" dmx-bind:data-target='{{"#"}}vote{{dluxGetContent.data.result.id}}'><span class="close text-white">×</span></button>
          </div>
          <div class="flex-fill mx-2">
            <p class="my-1">
              <input type="range" class="form-control-range" value="100" dmx-bind:id="hiveSlider{{dluxGetContent.data.result.id}}" dmx-bind:onchange="updateVoteSubmit('voteBtn{{dluxGetContent.data.result.id}}','slider{{dluxGetContent.data.result.id}}');"/>
            </p>
          </div>
          <div class="text-right">
            <p class="my-0"><span class="mr-1"  id="commentVal">0</span><img src="/img/hextacular.svg" alt="" width="17"/></p>
          </div>
        </div>
      </form>
    </div>
    <div class="d-flex align-items-center my-2">
      <div><a data-toggle="collapse" dmx-bind:data-target='{{"#"}}vote{{dluxGetContent.data.result.id}}'><i class="fas fa-heart fa-fw mr-1"></i></a>{{dluxGetContent.data.result.active_votes.countUpVotes()}}<i class="fas fa-comment fa-fw ml-2 mr-1"></i>{{dluxGetContent.data.result.children}} <i class="fas fa-gift fa-fw ml-2"></i> </div>
      <div class="ml-auto">{{dluxGetContent.data.result.total_payout_value}} <img src="/img/hextacular.svg" alt="" width="17" /></div>
    </div>
		  </div>
	   <hr class="mb-0" />
    <div>
      <form>
        <div class="d-flex">
          <div class="flex-fill">
            <textarea class="form-control" rows="2" id="validationCustomDescription" placeholder="Add a comment" required></textarea>
          </div>
        </div>
        <div class="d-flex justify-content-end">
          <button class="btn btn-primary float-right" id="submit-btn" type="submit">Reply</button>
        </div>
      </form>
    </div>
    <hr />
    <div class="container" id="comments" is="dmx-repeat" dmx-bind:repeat="dluxGetReplies.data.result">
      <div class="d-flex align-items-center">
        <div> <a dmx-bind:href="/@{{author}}"><img dmx-bind:src="https://token.dlux.io/getauthorpic/{{author}}" alt="" class="rounded-circle bg-light img-fluid mr-2 cover author-img"/></a> </div>
        <div>
          <p class="mt-0 mb-0 text-muted text-semibold"> <a dmx-bind:href="/@{{author}}" class="a-1">{{author}}<span class="ml-2 badge badge-pill badge-light">{{author_reputation.toString().rep()}}</span></a> <small class="text-muted ml-2">{{created.formatDate("MMM dd, yyyy")}}</small> </p>
        </div>
      </div>
      <div class="d-flex">
        <p class="my-2">{{body}}</p>
      </div>
      <div class="collapse" dmx-bind:id="vote{{id}}">
        <div class="d-flex align-items-center">
          <div class="text-white-50">
            <button type="button" class="btn btn-primary" dmx-bind:id="voteBtn{{dluxGetContent.data.result.id}}" dmx-bind:onclick="vote('{{dluxGetContent.data.result.author}}','{{dluxGetContent.data.result.permlink}}','slider{{dluxGetContent.data.result.id}}')" style="width:70px">100%</button>
            <button type="button" class="btn btn-secondary" data-toggle="collapse" dmx-bind:data-target='{{&quot;#&quot;}}vote{{id}}'><span class="close text-white">×</span></button>
          </div>
          <div class="flex-fill mx-2">
            <p class="my-1">
              <input type="range" class="form-control-range" value="100" dmx-bind:id="slider{{dluxGetContent.data.result.id}}" dmx-bind:onchange="updateVoteSubmit('voteBtn{{dluxGetContent.data.result.id}}','slider{{dluxGetContent.data.result.id}}');"/>
            </p>
          </div>
          <div class="text-right">
            <p class="my-0"><span class="mr-1"  id="commentHiveVal">0.10</span><img src="/img/hextacular.svg" alt="" width="17"/></p>
          </div>
        </div>
      </div>
      <div class="d-flex align-items-center">
        <div> <a data-toggle="collapse" dmx-bind:data-target='{{"#"}}vote{{id}}' role="button" aria-expanded="false" dmx-bind:aria-controls='{{"#"}}vote{{id}}'><i class="fas fa-heart mr-1"></i></a>{{active_votes.countUpVotes()}} </div>
        <div class="mx-2">&#8226;</div>
        <div> {{total_payout_value}} <img src="/img/hextacular.svg" alt="" width="17" /> </div>
        <div class="mx-2">&#8226;</div>
        <div><a data-toggle="collapse" dmx-bind:href='{{"#"}}reply{{id}}' role="button" aria-expanded="false" dmx-bind:aria-controls='{{"#"}}reply{{id}}'>Reply</a></div>
      </div>
      <div class="collapse" dmx-bind:id="reply{{id}}">
        <div class="d-flex my-2">
          <textarea class="form-control" rows="2" id="validationCustomDescription" placeholder="Add a comment" required></textarea>
        </div>
        <div class="d-flex justify-content-end my-1">
          <button class="btn btn-primary" id="submit-btn" type="submit">Reply</button>
        </div>
      </div>
      <hr class="my-2">
    </div>
  </div>
</main>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/footer.php";
   include_once($path);
?>
<script>
      function updateVoteSubmit(id, val) {
        document.getElementById(id).innerHTML =
          document.getElementById(val).value + "%";
      }

      var simplemde = new SimpleMDE({
        element: document.getElementById("validationCustomDescription")
      });
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        "use strict";
        window.addEventListener(
          "load",
          function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName("needs-validation");
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener(
                "submit",
                function(event) {
                  console.log("button");
                  if (
                    document.getElementById("validationCustomDescription")
                      .innerHTML == "Sign In"
                  ) {
                    sendLink("/auth");
                  }
                  var tagField = document.getElementById(
                    "validationCustomReferal"
                  ).value;
                  var tags = tagField.split(",").map(item => item.trim());
                  let otherTags = tags.slice(0, 4);
                  var customJSON = JSON.stringify({
                    tags: otherTags,
                    subApp: "SuperCraftLoader/v0.1",
                    xr: false,
                    vrHash: "QmTzKnzxEm3ZXcqFMxytt3fnJZvSSvtRnMCZTuzzMxwG7y",
                    superCraft: document.getElementById(
                      "validationCustomLoader"
                    ).value
                  });
                  var postData = {
                    title: document.getElementById("validationCustomTitle")
                      .value,
                    message: document.getElementById(
                      "validationCustomDescription"
                    ).value,
                    customJSON: customJSON
                  };
                  console.log(postData);
                  if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                  } else {
                    window.parent.postMessage(
                      {
                        func: "advPost",
                        message: postData
                      },
                      "*"
                    );
                  }
                  form.classList.add("was-validated");
                },
                false
              );
            });
          },
          false
        );
      })();
      //onpageloaded();
    </script>
</body>
</html>
