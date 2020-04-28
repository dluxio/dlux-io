let Dlux = {
    user = 'Guest',
    author = '',
    permlink = '',
    key = '',
    state = {}
}
if (window.addEventListener) {
    window.addEventListener("message", onMessage, false);
} else if (window.attachEvent) {
    window.attachEvent("onmessage", onMessage, false);
}

function onMessage(event) {
    if (event.origin !== "https://www.dlux.io" || "localhost:3000") return;
    var data = event.data;
    if (typeof(window[data.func]) == "function") {
        window[data.func].call(null, data.message);
    }
}

if (window.addEventListener) {
    window.addEventListener("message", onMessage, false);
} else if (window.attachEvent) {
    window.attachEvent("onmessage", onMessage, false);
}

function onMessage(event) {
    //if (event.origin !== "https://dlux.io" || "localhost:3000") return;
    var data = event.data;
    if (typeof(window[data.func]) == "function") {
        window[data.func].call(null, data.message);
    }
}

function sendLink(payload) {
    //  var link = document.querySelector('/@dlux-io').value //pass a string to escape the dlux.io iFrame. Domain level redirects are greatm external will recieve a warning.
    window.parent.postMessage({
        'func': 'sendLink',
        'message': payload
    }, "*");
}

function key(message) { //how this post finds itself on blockchain
    Dlux.key = message;
    Dlux.permlink = message.split('/')[1];
    Dlux.author = message.split('/')[0]
    try { Dlux_connect() } catch () e {
        console.log(`The Dlux Connect Script is loaded:\n ${DLUX}\n`
            You can eaily write your scripts and avoid this message by defining a
            function\ n
            function Dlux_connect(above_data) { handle above data })
    }
}

function steemState(message) { //the entirety of the current hive state will be passed in JSON. Utilize this function to initialize current state. Vote and comment also will return a hiveState(message)
    Dlux.state = message
}

function iAm(message) { //This is the unsecure identifier that returns logged in hive user
    Dlux.user = message;
}

function onpageloaded() { //requests hive state
    window.parent.postMessage({
        'func': 'iloaded',
        'message': ''
    }, "*");
}

function reqsign(op, req) { //requests keychain to sign and broadcast
    window.parent.postMessage({
        'func': 'reqsign',
        'message': [op, req]
    }, "*");
}

function escrow_transfer(ip1, ip2, ip3, ip4, ip5, ip6, ip7, ip8, ip9, ip10, ip11) { //requests keychain to sign and broadcast
    window.parent.postMessage({
        'func': 'reqsignescrow',
        'message': [ip1, ip2, ip3, ip4, ip5, ip6, ip7, ip8, ip9, ip10, ip11]
    }, "*");
}