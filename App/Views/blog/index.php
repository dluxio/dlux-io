<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
<title>DLUX - Apps</title>
<?php include '../mod/header.php';?>
<!--dmxAppConnect-->
<script type="text/javascript" src="../dmxAppConnect/dmxAppConnect.js"></script>
<script type="text/javascript" src="../dmxAppConnect/dmxMoment.js"></script>
<script type="text/javascript" src="../dmxAppConnect/dmxFormatter.js"></script>
<script type="text/javascript" src="../dmxAppConnect/dmxDataTraversal/dmxDataTraversal.js"></script>
<!--page specific-->
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
</head>

  <body
    class="d-flex flex-column h-100"
    id="blog"
    is="dmx-app"
    class="text-white"
  >
    <dmx-api-datasource
      id="dluxGetContent"
      is="dmx-fetch"
      url="https://token.dlux.io/getwrap?"
      dmx-param:method="'condenser_api.get_content'"
      dmx-param:params="'[%22dlux-io%22,%22testing-dlux-vr%22]'"
    ></dmx-api-datasource>
    <dmx-api-datasource
      id="dluxGetReplies"
      is="dmx-fetch"
      url="https://token.dlux.io/getwrap?"
      dmx-param:method="'condenser_api.get_content_replies'"
      dmx-param:params="'[%22dlux-io%22,%22testing-dlux-vr%22]'"
    ></dmx-api-datasource>

    <?php include '../mod/nav.php';?>

    <main role="main" class="flex-shrink-0 ">
      <div class="container bg-dark text-white padme-t70 pb-2 mb-3">
        <div class="d-inline-block p-2">
          <div class="float-left">
            <a dmx-bind:href="/@{{dluxGetContent.data.result.author}}"
              ><img
                dmx-bind:src="https://token.dlux.io/getauthorpic/{{dluxGetContent.data.result.author}}"
                alt=""
                class="rounded-circle bg-light img-fluid mr-2 cover author-img"
            /></a>
          </div>
          <div class="float-left">
            <p class="mt-0 mb-0 text-muted text-semibold">
              <a
                dmx-bind:href="/@{{dluxGetContent.data.result.author}}"
                class="a-1"
                >{{dluxGetContent.data.result.author}}<span
                  class="ml-2 badge badge-pill badge-light"
                  >{{dluxGetContent.data.result.author_reputation.toString().rep()}}</span
                ></a
              >
            </p>
            <small class="text-muted"
              >{{dluxGetContent.data.result.created.formatDate("MMM dd,
              yyyy")}}</small
            >
          </div>
        </div>
        <div class="float-right p-2">
          <span class="badge badge-secondary"
            >{{dluxGetContent.data.result.json_metadata.scat()}}</span
          >
        </div>
        <hr class="mt-0" />
        <h4 class="text-center p-2">{{dluxGetContent.data.result.title}}</h4>

        <img
          src="..."
          alt="Card image cap"
          class="card-img-top"
          dmx-bind:src="{{dluxGetContent.data.result.json_metadata.parseJSON().image}}"
        />
        <p class="p-2">{{dluxGetContent.data.result.body.removeMD()}}</p>
        <center>
          <a
            dmx-bind:href="{{dluxGetContent.data.result.url}}"
            type="button"
            class="btn btn-outline-danger mb-4 btn-launch"
            >Launch App</a
          >
        </center>
        <hr class="mb-0" />
        <div
          class="collapse"
          dmx-bind:id="vote{{dluxGetContent.data.result.id}}"
        >
          <form id="voteForm">
            <div class="form-group text-white-50">
              <ul class="list-unstyled">
                <li class="float-left px-1">
                  <button
                    type="button"
                    class="btn btn-primary"
                    dmx-bind:id="voteBtn{{dluxGetContent.data.result.id}}"
                    dmx-bind:onclick="vote('{{dluxGetContent.data.result.author}}','{{dluxGetContent.data.result.permlink}}','slider{{dluxGetContent.data.result.id}}')"
                    style="width:70px"
                  >
                    100%
                  </button>
                </li>
                <li class="float-left px-1">
                  <button
                    type="button"
                    class="btn btn-secondary"
                    data-toggle="collapse"
                    dmx-bind:data-target='{{"#"}}vote{{dluxGetContent.data.result.id}}'
                  >
                    <span class="close text-white">×</span>
                  </button>
                </li>
              </ul>
              <ul class="float-right list-unstyled">
                <li>
                  ###.### <img src="../img/hextacular.svg" alt="" width="17" />
                </li>
              </ul>
              <div class="">
                <div style="display: flex; flex-grow: 1" class="px-3">
                  <input
                    type="range"
                    class="form-control-range"
                    value="100"
                    dmx-bind:id="slider{{dluxGetContent.data.result.id}}"
                    dmx-bind:onchange="updateVoteSubmit('voteBtn{{dluxGetContent.data.result.id}}','slider{{dluxGetContent.data.result.id}}');"
                  />
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="d-inline-block p-2">
          <a
            data-toggle="collapse"
            dmx-bind:data-target='{{"#"}}vote{{dluxGetContent.data.result.id}}'
            ><i class="fas fa-heart mr-1"></i></a
          >{{dluxGetContent.data.result.active_votes.countUpVotes()}}
          <i class="fas fa-comment ml-2 mr-1"></i
          >{{dluxGetContent.data.result.children}}
        </div>

        <div class="float-right p-2">
          {{dluxGetContent.data.result.total_payout_value}}
          <img src="../img/hextacular.svg" alt="" width="17" />
        </div>
        <hr class="mb-0" />
        <div>
          <form>
            <div class="form-group">
              <textarea
                class="form-control"
                rows="2"
                id="validationCustomDescription"
                placeholder="Add a comment"
                required
              ></textarea>
            </div>
            <div class="clearfix">
              <button
                class="btn btn-primary float-right"
                id="submit-btn"
                type="submit"
              >
                Reply
              </button>
            </div>
          </form>
        </div>
        <hr />

        <div
          class="container"
          id="comments"
          is="dmx-repeat"
          dmx-bind:repeat="dluxGetReplies.data.result"
        >
          <div class="row">
            <a dmx-bind:href="/@{{author}}"
              ><img
                dmx-bind:src="https://token.dlux.io/getauthorpic/{{author}}"
                alt=""
                class="rounded-circle bg-light img-fluid mr-2 cover author-img"
            /></a>
            <p class="mt-0 mb-0 text-muted text-semibold">
              <a dmx-bind:href="/@{{author}}" class="a-1"
                >{{author}}<span class="ml-2 badge badge-pill badge-light"
                  >{{author_reputation.toString().rep()}}</span
                ></a
              ><small class="text-muted"
                >{{created.formatDate("MMM dd, yyyy")}}</small
              >
            </p>

            <div
              class="collapse"
              dmx-bind:id="vote{{dluxGetContent.data.result.id}}"
            >
              <form id="voteForm">
                <div class="form-group text-white-50">
                  <ul class="list-unstyled">
                    <li class="float-left px-1">
                      <button
                        type="button"
                        class="btn btn-primary"
                        dmx-bind:id="voteBtn{{dluxGetContent.data.result.id}}"
                        dmx-bind:onclick="vote('{{dluxGetContent.data.result.author}}','{{dluxGetContent.data.result.permlink}}','slider{{dluxGetContent.data.result.id}}')"
                        style="width:70px"
                      >
                        100%
                      </button>
                    </li>
                    <li class="float-left px-1">
                      <button
                        type="button"
                        class="btn btn-secondary"
                        data-toggle="collapse"
                        dmx-bind:data-target='{{&quot;#&quot;}}vote{{dluxGetContent.data.result.id}}'
                      >
                        <span class="close text-white">×</span>
                      </button>
                    </li>
                  </ul>
                  <ul class="float-right list-unstyled">
                    <li>
                      ###.###
                      <img src="../img/hextacular.svg" alt="" width="17" />
                    </li>
                  </ul>
                  <div class="">
                    <div style="display: flex; flex-grow: 1" class="px-3">
                      <input
                        type="range"
                        class="form-control-range"
                        value="100"
                        dmx-bind:id="slider{{dluxGetContent.data.result.id}}"
                        dmx-bind:onchange="updateVoteSubmit('voteBtn{{dluxGetContent.data.result.id}}','slider{{dluxGetContent.data.result.id}}');"
                      />
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="d-inline-block p-2">
              <a data-toggle="collapse" dmx-bind:data-target='{{"#"}}vote{{id}}'
                ><i class="fas fa-heart mr-1"></i></a
              >{{active_votes.countUpVotes()}}
              <i class="fas fa-comment ml-2 mr-1"></i>{{children}}
            </div>

            <div class="float-right p-2">
              {{total_payout_value}}
              <img src="../img/hextacular.svg" alt="" width="17" />
            </div>
            <hr class="mb-0" />
            <div>
              <form>
                <div class="form-group">
                  <textarea
                    class="form-control"
                    rows="2"
                    id="validationCustomDescription"
                    placeholder="Add a comment"
                    required
                  ></textarea>
                </div>
                <div class="clearfix">
                  <button
                    class="btn btn-primary float-right"
                    id="submit-btn"
                    type="submit"
                  >
                    Reply
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
    <?php include '../mod/footer.php';?>
    <script>
      function updateVoteSubmit(id, val) {
        document.getElementById(id).innerHTML =
          document.getElementById(val).value + "%";
      }
    </script>
    <script>
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
                    vrHash: "QmYbyqtGKg5TYLmpLFs2Aqt3po4qQdhab29Xba7mkwNWYo",
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
      onpageloaded();
    </script>
    <script>
      checkCookie();
    </script>
  </body>
</html>
