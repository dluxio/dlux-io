<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <title></title>
   <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/showdown/1.8.6/showdown.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@hiveio/hive-js/dist/hive.min.js"></script>
    <script src="/js/session.js"></script>
    <style>
        html,
        body {
            margin: 0;
            height: 100%;
        }
        
        iframe {
            border: 0;
            display: inline-block;
        }
    </style>
    <script>
        var stateObj
        var ipfsdomain
        <?php 
            echo "const author = '".$author."',";
            echo " permlink = '".$permlink."',";
            ;?>
         hiveKey = `${author}/${permlink}`
        //hive.api.setOptions({ url: 'https://anyx.io'})
        hive.api.getContent(author, permlink, (err, result) => {
            if(err)console.log(err)
            stateObj = result
            var metadata = result.json_metadata
            var hashy = JSON.parse(metadata).vrHash,
                vars = `?${location.href.split('?')[1]}` || `?`
            if (!hashy) {
                hashy = JSON.parse(metadata).arHash
            }
            if (!hashy) {
                hashy = JSON.parse(metadata).appHash
            }
            if (!hashy) {
                hashy = JSON.parse(metadata).audHash
            }
            if (hashy.split('/')[3] == 'ipfs') {
                hashy = hashy.split('/')[4];
            }
            var subauthor = author
            subauthor.replace('.', '-')
            ipfsdomain = `https://${subauthor}.ipfs.dlux.io`;
            location.href = ipfsdomain + `${vars}&hash=${hashy}&author=${author}&permlink=${permlink}&user=${sessionStorage.getItem('user')}`
            
        });
        if (isIOS()) {
            window.addEventListener('devicemotion', function(e) {
                document.getElementById('theIframe').contentWindow.postMessage({
                    type: 'devicemotion',
                    deviceMotionEvent: cloneDeviceMotionEvent(e),
                }, '*');
            });
        }

        function isIOS() {
            return /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
        }

        function cloneDeviceMotionEvent(e) {
            return {
                acceleration: {
                    x: e.acceleration.x,
                    y: e.acceleration.y,
                    z: e.acceleration.z,
                },
                accelerationIncludingGravity: {
                    x: e.accelerationIncludingGravity.x,
                    y: e.accelerationIncludingGravity.y,
                    z: e.accelerationIncludingGravity.z,
                },
                rotationRate: {
                    alpha: e.rotationRate.alpha,
                    beta: e.rotationRate.beta,
                    gamma: e.rotationRate.gamma,
                },
                interval: e.interval,
                timeStamp: e.timeStamp
            };
        }
        if (window.addEventListener) {
            window.addEventListener("message", onMessage, false);
        } else if (window.attachEvent) {
            window.attachEvent("onmessage", onMessage, false);
        }

        function onMessage(event) {
            if (event.origin !== ipfsdomain) return;
            console.log(event.data)
            let data = event.data
            if (typeof(window[data.func]) == "function") {
                if (data.func == 'advPost' || data.func == 'vote' || data.func == 'signDecode' || data.func == 'signEncode' || data.func == 'follow' || data.func == 'aVote' || data.func == 'sendLink' || data.func == 'iloaded' || data.func == 'passGenerateHotLink' || data.func == 'comment' || data.func == 'reqsign') {
                    window[data.func].call(null, data.message);
                }
            }
        }

        function sendLink(link) {
            if (link == '/auth') {
                setCookie('dropOff', `/dlux/@dlux-io/addmst758y8ajhiuvigmesxuj1yo4mve`, 15);
                location.href = '/auth';
            } else if (link.split('/')[0].includes(":")) {
                if (confirm('The was a request to navigate away from dlux.io | Would you like to navigate to | ' + link)) {
                    location.href = link;
                }
            } else if (link == 'back()') {
                window.history.back();
            } else {
                location.href = link;
            }
        }
        var memoRights = 0

        function signEncode(message) {
            if (!memoRights) {
                memoRights = confirm('Allow this app to encrypt and decrypt messages')
            }
            if (memoRights == true) {
                hive.api.getAccounts([message.to], (err, result) => {
                    if (err) {
                        console.log(err)
                    }
                    if (result.length === 0) {
                        console.log('No Such User')
                    }
                    var encoded = hive.memo.encode(localStorage.memoKey, result[0].memo_key, `#` + message.memo);
                    target.postMessage({
                        'func': 'encoded',
                        'message': {
                            'memo': encoded,
                            'msgid': message.msgid,
                        }
                    }, "*");
                });
            } else {}
        }

        function signDecode(message) {
            if (!memoRights) {
                memoRights = confirm('Allow this app to encrypt and decrypt messages')
            }
            if (memoRights == true) {
                var decoded = hive.memo.decode(localStorage.memoKey, message.encoded);
                target.postMessage({
                    'func': 'decoded',
                    'message': {
                        'memo': decoded,
                        'msgid': message.msgid,
                    }
                }, "*");
            } else {}
        }
        userLoggedIn = 'Guest'
        if (userLoggedIn == 'Guest' && sessionStorage.getItem('user')) {
            userLoggedIn = sessionStorage.getItem('user')
        } else if (window.hive_keychain) {
            iAm = prompt('Hive Username for Hive Keychain', 'no @')
        }

        function reqsign(op) {
            if (window.hive_keychain) {
                hive_keychain.requestBroadcast(op[1][1], [op[0]], op[1][0], function(response) {
                    console.log(response);
                    target.postMessage({
                        'func': 'keychainResponse',
                        'message': response
                    }, "*");
                });
            }
        }

    function iloaded(){
        hive.api.getContent(author, permlink, function(err, result) {
      var target = document.getElementById('theIframe').contentWindow
      var un = 'Guest'
      if(sessionStorage.getItem('user')){un = sessionStorage.getItem('user')}
      target.postMessage({
      'func': 'iAm',
      'message': un,
      }, "*");
      target.postMessage({
      'func': 'key',
      'message': hiveKey,
      }, "*");
      target.postMessage({
      'func': 'hiveState',
      'message': result,
      }, "*");
      })
          if(window.hive_keychain) {
            postable = true
        }
      }

        function pageSpecific(usr) {
            if (isIOS()) {
                window.addEventListener('devicemotion', function(e) {
                    document.getElementById('theIframe').contentWindow.postMessage({
                        type: 'devicemotion',
                        deviceMotionEvent: cloneDeviceMotionEvent(e),
                    }, '*');
                });
            }
            hive.api.getContent(author, permlink, function(err, result) {
                var target = document.getElementById('theIframe').contentWindow
                target.postMessage({
                    'func': 'iAm',
                    'message': user,
                }, "*");
                target.postMessage({
                    'func': 'key',
                    'message': `${author}/${permlink}`,
                }, "*");
                target.postMessage({
                    'func': 'hiveState',
                    'message': result,
                }, "*");
            });
            if (window.hive_keychain) {
                postable = true
            }
        }

        function to58lower (hash){
            var arr = hash.split('')
            for(var i = 0; i < arr.length; i++){
                if (i == 0){
                    arr[i] = 'q'
                } else if (arr[i].toLowerCase() != arr[i]){
                    arr[i] = `0${arr[i].toLowerCase()}`
                }
            }
            return arr.join('')
        }

        function to58 (hash){
            var arr = hash.split('')
            var uparr = []
            for(var i = 0; i < arr.length; i++){
                if (i == 0){
                    uparr.push('Q')
                } else if (arr[i] == '0'){
                    uparr.push(arr[i+1].toUpperCase())
                    arr.splice(i,0)
                } else {
                    uparr.push(arr[i])
                }
            }
            return uparr.join('')
        }
    </script>
</head>
 <body></body>
</html>
