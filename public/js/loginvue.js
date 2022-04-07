export default {
  data() {
    return {
      count: 0
    }
  },
  template: `<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
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
</div>`
}

//<div id="notificationholder" class="fixed-bottom"></div>