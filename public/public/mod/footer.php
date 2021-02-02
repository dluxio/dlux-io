<!-- Footer -->
<footer class="footer mt-auto bg-dark pt-5">

  <!-- Footer Elements -->
  <div class="container text-center">

        <div class="mb-5 ">
		
          <!-- Github -->
          <a href="https://github.com/dluxio/dluxio" target="_blank">
            <i class="fab fa-github fa-lg mx-md-3 mx-2 fa-2x"></i>
          </a>
          <!-- Discord -->
          <a href="https://discord.gg/Beeb38j" target="_blank">
            <i class="fab fa-discord fa-lg mx-md-3 mx-2 fa-2x"></i>
          </a>
          <!-- Hive -->
          <a href="https://peakd.com/@dlux-io" target="_blank">
            <img src="/img/peakd_logo.svg" class="responsive pb-3" width="40px">
          </a>
          <!--Twitter -->
          <a href="https://twitter.com/dluxxr" target="_blank">
            <i class="fab fa-twitter fa-lg mx-md-3 mx-2 fa-2x"></i>
          </a>
        </div>


  </div>
  <!-- Footer Elements -->

  <!-- Copyright -->
  <div class="footer-copyright bg-darker text-center text-white py-3">© 2020 Copyright: 
    <a href="https://www.dlux.io/" class="">dlux.io</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
<script>
function hiveKeychain () {
    let username = document.getElementById('hk-username').value
    console.log('value: ' + username)
    sessionStorage.setItem("user", username);
    let session = new Dluxsession(hive, {hiveidip:username})
} 
   window.addEventListener('load', function () {
    let use = document.getElementById("hiveKeychain");
    let get = document.getElementById("getKeychain");
    let count = 0;
    let kc_interval = setInterval(function() {
      count++
      if(window.hive_keychain) {
          get.style.display = "none";
      } else {
          use.style.display = "none";
      }
      if (count >= 8) clearInterval(kc_interval)
    }, 250);
  checkCookie()
}) 

</script>
