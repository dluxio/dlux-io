<!DOCTYPE html>
<html>
<head>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/header.php";
   include_once($path);
?>
<script>
    function validateForm() {
        return true;
      }
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css"/>
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>   
<style>.editor-toolbar {
        background-color: #C7C7C7;
      }</style>
</head>
<body class="d-flex flex-column h-100">
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/nav.php";
   include_once($path);
?>
<main role="main" class="flex-shrink-0 text-white">
<div class="padme-t70"></div>
    <div class="container-fluid header-layer">
      <div class="container header-content">
        <br />
        <h1 class="text-center">dApp Description</h1>
        <h4
          class="text-center"
          style="max-width: 700px; margin-left: auto; margin-right:auto;"
        >
          Enter some details about your XR scene so it can be posted to the
          HIVE blockchain and monetized for crypto.
        </h4>
      </div>
    </div>
    <br />
    <div class="container-fluid form-layer">
      <div class="container form-content">
        <form class="needs-validation" novalidate="">
          <div class="form-group">
            <label for="validationCustomUN">Author (requires a <a href="https://signup.hive.io/" target="_blank">HIVE account</a> active key signed in to the<a href="https://chrome.google.com/webstore/detail/hive-keychain/jcacnejopjdphbnjgfaaobbfafkihpep)" target="_blank">Chrome</a>
              or
              <a
                href="https://addons.mozilla.org/en-US/firefox/addon/hive-keychain/"
                target="_blank"
                >Firefox</a
              >
              extension)</label
            >
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
              </div>
              <input
                class="form-control"
                id="validationCustomUN"
                type="text"
                placeholder="username"
                required=""
              />
            </div>
          </div>
          <div class="form-group">
            <label for="validationCustomPermlink"
              >Permlink (dlux.io/dlux/@username/...)</label
            >
            <div class="input-group">
              <input
                class="form-control"
                id="validationCustomPermlink"
                type="text"
                placeholder="your-post-permlink-goes-here"
                required=""
              />
            </div>
          </div>
          <div class="form-group">
            <label for="validationCustomTitle">Title</label>
            <div class="input-group">
              <input
                class="form-control"
                id="validationCustomTitle"
                type="text"
                placeholder="Title"
                required=""
              />
            </div>
          </div>
          <div class="form-group">
            <label for="validationCustomDescription">Description</label
            ><textarea
              class="form-control"
              id="validationCustomDescription"
              rows="3"
              required=""
            ></textarea>
          </div>
          <div class="form-group">
            <label for="validationCustomTags"
              >Tags (comma seperated, no spaces)</label
            >
            <div class="input-group">
              <input
                class="form-control text-lowercase"
                id="validationCustomTags"
                type="text"
                onkeyup="addTags()"
                placeholder="tags, look-like, this"
                required=""
              />
            </div>
          </div>
         <div class="form-group">
            <label for="json-input">Custom JSON</label>
            <div class="input-group">
              <textarea
                id="json-input"
                autocomplete="off"
                style="width: 100%; height: 400px;"
              ></textarea>
            </div>
          </div>
          <center>
            <button
              class="btn btn-primary"
              type="submit"
              onclick="updateDapp()"
            >
              Save
            </button>
          </center>
        </form>
      </div>
    </div>

    <div>
      <br />
    </div>
    </div>
	</main>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/footer.php";
   include_once($path);
?>
<script>
      var simplemde = new SimpleMDE({
        element: document.getElementById("validationCustomDescription")
      });
      simplemde.codemirror.on("keyup", function() {
        currentJson();
      });
</script>
<script src="/jquery.json-editor.min.js" crossorigin="anonymous"></script>
<script>
      var postData,
        pass = localStorage.getItem("pass");
      getData();
      function getData() {
        fetch(`/postdata`)
          .then(function(response) {
            return response.json();
          })
          .then(function(pd) {
            postData = JSON.parse(JSON.stringify(pd));
            document.querySelector("#json-input").value = JSON.stringify(
              pd.customJson,
              null,
              2
            );
            var text = "";
            for (var i = 0; i < pd.customJson.tags.length + 1; i++) {
              if (pd.customJson.tags[i]) {
                text += pd.customJson.tags[i] + ", ";
              } else {
                text = text.substr(0, text.length - 2);
                break;
              }
            }
            document.querySelector("#validationCustomTags").value = text;
            simplemde.value(pd.body);
            document.querySelector("#validationCustomTitle").value = pd.title;
            document.querySelector("#validationCustomPermlink").value =
              pd.permlink;
            document.querySelector("#validationCustomUN").value = pd.account;
          });
      }

      function updateDapp() {
        var changes = postData;
        changes.account = document.querySelector("#validationCustomUN").value;
        changes.title = document.querySelector("#validationCustomTitle").value;
        changes.body = simplemde.value();
        changes.customJson = JSON.parse(
          document.querySelector("#json-input").value,
          null,
          2
        );
        changes.permlink = encodeURI(
          document.querySelector("#validationCustomPermlink").value
        );
        fetch(`/update/${pass}`, {
          method: "POST",
          headers: {
            "Content-Type": "application/json"
            // "Content-Type": "application/x-www-form-urlencoded",
          },
          body: JSON.stringify(changes)
        })
          .then(response => response.text())
          .catch(error => console.error("Error:", error));
      }

      function currentJson() {
        const mdlinks = new RegExp(/\[(.*?)\]\((.*?)\)/g);
        const mdimgs = new RegExp(/(?:!\[(.*?)\]\((.*?)\))/g);
        const text = simplemde.value();
        const links = text.match(mdlinks) || [];
        const imgs = text.match(mdimgs) || [];
        var json = JSON.parse(document.querySelector("#json-input").value);
        delete json.links;
        delete json.image;
        for (var i = 0; i < links.length; i++) {
          var j = mdlinks.exec(
            simplemde.value().substr(links[i], simplemde.value().length)
          )[2];
          if (!json.links) {
            json.links = [j];
          } else {
            if (json.links.indexOf(j) == -1) {
              json.links.push(j);
            }
          }
        }
        for (var i = 0; i < imgs.length; i++) {
          var j = mdimgs.exec(
            simplemde.value().substr(imgs[i], simplemde.value().length)
          )[2];
          if (json.links.indexOf(j)) {
            json.links.splice(json.links.indexOf(j), 1);
          }
          if (!json.image) {
            json.image = [j];
          } else {
            json.image.push(j);
          }
        }
        document.querySelector("#json-input").value = JSON.stringify(
          json,
          null,
          2
        );
      }

      function addTags() {
        var tags = document
          .querySelector("#validationCustomTags")
          .value.split(",")
          .map(item => item.trim());
        var json = JSON.parse(document.querySelector("#json-input").value);
        json.tags = tags.slice(0, 4);
        document.querySelector("#json-input").value = JSON.stringify(
          json,
          null,
          2
        );
      }
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
                  if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
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
      //JSON editor
      // get JSON
      function getJson() {
        try {
          return JSON.parse($("#json-input").val());
        } catch (ex) {
          alert("Wrong JSON Format: " + ex);
        }
      }
    </script>
  </body>
</html>
