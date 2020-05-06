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
    console.log('clicked')
    let username = document.getElementById('hk-username').value
    console.log('value: ' + username)
    steem.api.setOptions({ url: "https://anyx.io" })
	sessionStorage.setItem("user", username);
	console.log('session set')
    let session = new Dluxsession(steem, {steemidip:username})
    console.log(session)
} 
      
setTimeout(function(){
    let use = document.getElementById("hiveKeychain");
    let get = document.getElementById("getKeychain");
    if(window.hive_keychain) {
        get.style.display = "none";
    } else {
        use.style.display = "none";
    }
}, 1000);
    
checkCookie()
</script>