<!DOCTYPE html>
<html>
  <head>
    <meta property="og:title" content="dlux" />
    <meta
      property="og:description"
      content="Blockchain powered social VR where everybody earns and there are no ads and no private tracking."
    />
    <meta
      property="og:image"
      content="https://ipfs.io/ipfs/QmQ84g5YwraX1cF87inZut2GaQiBAFaKEHsUaYT44oTs9h"
    />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title></title>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <script>
      function validateForm() {
        return true;
      }
    </script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css"
    />
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <style>
      body {
        background-color: #242424;
        color: white;
      }
      .editor-toolbar {
        background-color: #C7C7C7;
      }
      a:link {
        color: #8AD9E2;
        text-decoration: none;
      }

      /* visited link */
      a:visited {
        color: #8AD9E2;
        text-decoration: none;
      }

      /* mouse over link */
      a:hover {
        color: #417EF7;
        text-decoration: none;
      }

      /* selected link */
      a:active {
        color: #F7417E;
        text-decoration: none;
      }
    </style>
  </head>
  <body class="cf">
    <div class="container-fluid header-layer">
      <div class="container header-content">
        <br />
        <h1 class="text-center">dApp Description</h1>
        <h4
          class="text-center"
          style="max-width: 700px; margin-left: auto; margin-right:auto;"
        >
          Enter some details about your XR scene so it can be posted to the
          STEEM blockchain and monetized for crypto.
        </h4>
      </div>
    </div>
    <br />
    <div class="container-fluid form-layer">
      <div class="container form-content">
        <form class="needs-validation" novalidate="">
          <!--.form-group//label(for='validationCustomPermlink') Permlink
//input#validationCustomPermlink.form-control(type='text', placeholder='optional')-->
          <div class="form-group">
            <label for="validationCustomUN"
              >Author (requires a
              <a href="https://signup.steemit.com/" target="_blank"
                >STEEM account</a
              >
              active key signed in to the
              <a
                href="https://chrome.google.com/webstore/detail/steem-keychain/lkcjlnjfpbikmcmbachjpdbijejflpcm?hl=en"
                target="_blank"
                >Chrome</a
              >
              or
              <a
                href="https://addons.mozilla.org/en-US/firefox/addon/steem-keychain/"
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
              /><!--<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Type</button><div class="dropdown-menu"><a class="dropdown-item" href="#" onclick="templatejson(0)">Blog</a><div class="dropdown-divider" role="separator"></div><a class="dropdown-item" href="#" onclick="templatejson(1)">AR</a><div class="dropdown-divider" role="separator"></div><a class="dropdown-item" href="#" onclick="templatejson(2)">VR</a><div class="dropdown-divider" role="separator"></div><a class="dropdown-item" href="#" onclick="templatejson(3)">App</a><div class="dropdown-divider" role="separator"></div><!--a.dropdown-item(href='#', onclick='templatejson(4)') Video--><!--.dropdown-divider(role='separator')--><!--a.dropdown-item(href='#', onclick='templatejson(5)') Photo--><!--.dropdown-divider(role='separator')--><!--a.dropdown-item(href='#', onclick='templatejson(6)') Sound</div>-->
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
          <!--.form-group//label(for='validationCustomBeneficiaries') Beneficiaries
//.input-group
  //.input-group-prepend
    //span#inputGroupPrepend.input-group-text @
  //input#validationCustomBeneficiaries.form-control(type='text', placeholder='Username', aria-describedby='inputGroupPrepend', optional='')
  //input#validationCustomBeneficiariesValue.form-control(type='text', placeholder='Value', aria-describedby='inputGroupPrepend', optional='')-->
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
          <!--.form-group//.form-check
  //input#invalidCheck.form-check-input(type='checkbox', value='', required='')
  //label.form-check-label(for='invalidCheck')
    //| Agree to
    //a(href='#') terms and conditions
  //.invalid-feedback
    //| You must agree before submitting.-->

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
    <script
      src="https://code.jquery.com/jquery-3.2.1.min.js"
      integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
      crossorigin="anonymous"
    ></script
    ><script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"
    ></script
    ><script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"
    ></script
    ><script src="https://cdnjs.cloudflare.com/ajax/libs/showdown/1.8.6/showdown.min.js"></script
    ><script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script
    ><script src="https://cdn.jsdelivr.net/npm/steem/dist/steem.min.js"></script
    ><script>
      function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
      }
      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
      }</script
    ><script>
      var simplemde = new SimpleMDE({
        element: document.getElementById("validationCustomDescription")
      });
      simplemde.codemirror.on("keyup", function() {
        currentJson();
      });</script
    ><script src="/jquery.json-editor.min.js" crossorigin="anonymous"></script
    ><script>
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
