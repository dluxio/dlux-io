<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
        hive.api.setOptions({ url: 'https://anyx.io'})
        hive.api.getContent(author, permlink, (err, result) => {
            document.title = `DLUX | ${result.title}`
            stateObj = result
            var metadata = result.json_metadata
            var hashy = JSON.parse(metadata).vrHash
            var scrolling = JSON.parse(metadata).scrolling
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
            var vars = location.href.split('?')[1]
            var iframe = document.createElement('iframe');
            iframe.id = 'theIframe'
            iframe.scrolling = scrolling || 'yes'
            iframe.width = '100%'
            iframe.height = '100%'
            iframe.setAttribute('allowfullscreen', true)
            iframe.setAttribute('allow', 'gyroscope; accelerometer; microphone; camera')
            ipfsdomain = `https://${hashy}.ipfs.dlux.io`.toLowerCase();
            iframe.src = ipfsdomain + `/ipfs/${hashy}?${vars}`
            document.body.appendChild(iframe);
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
            var data = event.data;
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
            } else if (link.includes("steemconnect.com")) {
                location.href = link;
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
        if (userLoggedIn == 'Guest' && localStorage.getItem('skn')) {
            userLoggedIn = localStorage.getItem('skn')
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
    </script>

    <body></body>
</head>

</html>
