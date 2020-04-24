function dex(usr, pair, type) {
    console.log('dex js')
    User.opts.pair = pair || 'hive'
    User.opts.type = type || 'buy'
    usr.hbd = { balance: usr.hive.sbd_balance }
    User.hbd = { balance: usr.hive.sbd_balance }
    document.getElementById('jumbobal').innerHTML = `<h4>Balances: ${parseFloat(parseInt(usr.dlux.balance)/1000).toFixed(3)} DLUX & ${usr[User.opts.pair].balance}</h4>`
    document.getElementById('senddluxfrom').value = user
    document.getElementById('menupricelab').innerHTML = `Calculated Price: (<a href="#" onClick="insertBal('${parseFloat(User.dex.markets[User.opts.pair].tick)}', 'menuprice')">Market Price: ${parseFloat(User.dex.markets[User.opts.pair].tick).toFixed(4)} ${User.opts.pair.toUpperCase()}</a>):`
    document.getElementById('menupairlab').innerHTML = `For: (<a href="#" onClick="insertBal(parseFloat(User[User.opts.pair].balance),'menupair')">Balance: ${User[User.opts.pair].balance}</a>):`
    console.log('I know youre getting here')
    popOrderTable('buyorderstable', 'buyOrders')
    popOrderTable('sellorderstable', 'sellOrders')
    document.getElementById('buyTab').addEventListener("click", function() {
        dexview(User.opts.pair, "buy");
    })
    document.getElementById('sellTab').addEventListener("click", function() {
        dexview(User.opts.pair, "sell");
    })
    document.getElementById('hivepairselect').addEventListener("click", function() {
        dexview("hive", User.opts.type);
    })
    document.getElementById('hbdpairselect').addEventListener("click", function() {
        dexview("hbd", User.opts.type);
    })
    var info = document.getElementsByClassName('text-center market-info-item')
    console.log('market info:', info)
    var ip1 = parseFloat(User.stats.tokenSupply / 1000000 * User.dex.markets.hive.tick).toFixed(1),
        m = 'K'
    var is1 = parseFloat(User.stats.tokenSupply / 1000000 * User.dex.markets.hbd.tick).toFixed(1),
        n = 'K'
    if (ip1 > 1000) {
        ip1 = parseFloat(ip1 / 1000).toFixed(1)
        m = 'M'
    }
    if (ip1 > 1000) {
        ip1 = parseFloat(ip1 / 1000).toFixed(1)
        m = 'B'
    }
    console.log({ ip1 })
    info[0].innerHTML = `<h3><span>${ip1}${m} HIVE</span></h3>
				<div>
					<label>Market Cap</label>
				</div>`
    if (is1 > 1000) {
        is1 = parseFloat(is1 / 1000).toFixed(1)
        n = 'M'
    }
    if (is1 > 1000) {
        is1 = parseFloat(is1 / 1000).toFixed(1)
        n = 'B'
    }
    console.log({ is1 })
    info[5].innerHTML = `<h3><span>${is1}${n} HBD</span></h3>
				<div>
					<label>Market Cap</label>
				</div>`
    var ip2 = parseFloat(User.stats.tokenSupply / 1000000000).toFixed(1),
        l = 'M'

    if (ip2 > 1000) {
        ip3 = parseFloat(ip3 / 1000).toFixed(1);
        l = 'B'
    }
    console.log(ip2)
    info[2].innerHTML = `<h3><span>${ip2}${l} DLUX</span></h3>
				<div>
					<label>Supply</label>
				</div>`
    info[7].innerHTML = `<h3><span>${ip2}${l} DLUX</span></h3>
				<div>
					<label>Supply</label>
				</div>`
    fetch('https://token.dlux.io/feed')
        .then(r => {
            return r.json()
        })
        .then(result => {
            let node = document.createElement('h4')
            node.innerHTML = 'Transactions:<form><input type="checkbox" id="hideReportsCB" name="report" value="No" checked></input></form>'
            node.class = "mb-3"
            let txholder = document.getElementById('dluxtxs')

            for (i in result.feed) {
                if (result.feed[i].match(user) && !result.feed[i].match('Report')) {
                    let txnode = document.createElement('div')
                    txnode.innerHTML = `
					   <p class="my-2">${i}<br>${result.feed[i]}</p>
					   <hr class="my-3 bg-light">`
                    txholder.insertAdjacentElement('afterbegin', txnode)
                }
            }
            txholder.insertAdjacentElement('afterbegin', node)
        })
        .catch(e => { console.log(e) })
}

function cancel(txid) {
    var params = {
        "required_auths": [user],
        "required_posting_auths": 0,
        "id": "dlux_dex_clear",
        "json": JSON.stringify({
            txid
        })
    }
    console.log(params)
    reqsign(['custom_json', params], ['active', user])
        .then(r => { feedback(r) })
        .catch(e => { feedback(e) })
}

function reqsign(op, req) { //requests keychain to sign and broadcast
    return new Promise((resolve, reject) => {
        Dluxsession.hive_sign([req[1],
                [op], req[0]
            ])
            .then(r => { resolve(r) })
            .catch(e => reject(e))
    })
}

function dexsend(type, pair) {
    if (type == 'Buy' && pair == 'hbd') {
        placeHbdBuy()
    } else if (type == 'Buy' && pair == 'hive') {
        placeHiveBuy()
    } else if (type == 'Sell' && pair == 'hive') {
        placeHiveAsk()
    } else if (type == 'Sell' && pair == 'hbd') {
        placeHibdAsk()
    }

}

function placeHiveAsk() {
    var dlux = parseInt(parseFloat(document.getElementById('menudlux').value) * 1000),
        amount = parseInt(parseFloat(document.getElementById('menupair').value) * 1000),
        params = {
            "required_auths": [user],
            "required_posting_auths": 0,
            "id": "dlux_dex_hive_sell",
            "json": JSON.stringify({
                dlux,
                hive: amount,
                hours: document.getElementById('escrowExpire').value
            })
        }
    console.log(params)
    reqsign(['custom_json', params], ['active', user])
        .then(r => { feedback(r) })
        .catch(e => { feedback(e) })
}

function placeHbdAsk() {
    var dlux = parseInt(parseFloat(document.getElementById('menudlux').value) * 1000),
        amount = parseInt(parseFloat(document.getElementById('menupair').value) * 1000),
        params = {
            "required_auths": [user],
            "required_posting_auths": 0,
            "id": "dlux_dex_hbd_sell",
            "json": JSON.stringify({
                dlux,
                hbd: amount,
                hours: document.getElementById('escrowExpire').value
            })
        }
    console.log(params)
    reqsign(['custom_json', params], ['active', user])
        .then(r => { feedback(r) })
        .catch(e => { feedback(e) })
}

function checkAccount(name) {
    return new Promise((r, e) => {
        fetch("https://anyx.io", {
                body: `{\"jsonrpc\":\"2.0\", \"method\":\"condenser_api.get_accounts\", \"params\":[[\"${name}\"]], \"id\":1}`,
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                method: "POST"
            })
            .then(r => { return r.json() })
            .then(re => {
                if (re.result.length) r(re.result[0])
                else { e('No account by that name') }
            })
            .catch(re => { e(re) })
    })
}

function placeHiveBuy() {
    var dlux = parseInt(parseFloat(document.getElementById('menudlux').value) * 1000),
        amount = parseInt(parseFloat(document.getElementById('menupair').value) * 1000),
        hiveAmount = (amount / 1000).toFixed(3) + ' STEEM',
        hbdAmount = '0.000 SBD'
    fetch('https://token.dlux.io/dex')
        .then(function(response) {
            return response.json();
        })
        .then(function(myJson) {
            //var updex = myJson.markets
            //var queue = myJson.queue
            if (dlux > 0 && typeof dlux == 'number' && amount > 0 && typeof amount == 'number') {
                var escrowTimer = {}
                    //var agents = []
                    //var i = 0
                let until = document.getElementById('escrowExpire').value || 120
                let now = new Date();
                escrowTimer.ratifyIn = now.setHours(now.getHours() + 1);
                escrowTimer.ratifyUTC = new Date(escrowTimer.ratifyIn);
                escrowTimer.ratifyString = escrowTimer.ratifyUTC.toISOString().slice(0, -5);
                escrowTimer.expiryIn = now.setHours(now.getHours() + 1 + until);
                escrowTimer.expiryUTC = new Date(escrowTimer.expiryIn);
                escrowTimer.expiryString = escrowTimer.expiryUTC.toISOString().slice(0, -5);
                var formatter = amount / 1000
                formatter = formatter.toFixed(3)
                var eidi = Math.floor(Math.random() * 4294967296)
                let params = {
                    from: user,
                    to: User.opts.to,
                    sbd_amount: hbdAmount,
                    steem_amount: hiveAmount,
                    escrow_id: eidi,
                    agent: User.opts.agent,
                    fee: User.opts.fee,
                    ratification_deadline: escrowTimer.ratifyString,
                    escrow_expiration: escrowTimer.expiryString,
                    json_meta: JSON.stringify({
                        dextx: {
                            dlux,
                            fee: User.opts.dfee
                        }
                    })
                }
                console.log(params)
                reqsign(['escrow_transfer', params], ['active', user])
                    .then(r => { feedback(r) })
                    .catch(e => { feedback(e) })
            }
        })


}

function placeHbdBuy() {
    var dlux = parseInt(parseFloat(document.getElementById('menudlux').value) * 1000),
        amount = parseInt(parseFloat(document.getElementById('menupair').value) * 1000),
        hiveAmount = '0.000 STEEM',
        hbdAmount = (amount / 1000).toFixed(3) + ' SBD'
    fetch('https://token.dlux.io/dex')
        .then(function(response) {
            return response.json();
        })
        .then(function(myJson) {
            var updex = myJson.markets
            var queue = myJson.queue
            if (dlux > 0 && typeof dlux == 'number' && amount > 0 && typeof amount == 'number') {
                var escrowTimer = {}
                let now = new Date();
                let until = document.getElementById('escrowExpire').value || 120
                escrowTimer.ratifyIn = now.setHours(now.getHours() + 1);
                escrowTimer.ratifyUTC = new Date(escrowTimer.ratifyIn);
                escrowTimer.ratifyString = escrowTimer.ratifyUTC.toISOString().slice(0, -5);
                escrowTimer.expiryIn = now.setHours(now.getHours() + 1 + until);
                escrowTimer.expiryUTC = new Date(escrowTimer.expiryIn);
                escrowTimer.expiryString = escrowTimer.expiryUTC.toISOString().slice(0, -5);
                var formatter = amount / 1000
                formatter = formatter.toFixed(3)
                var eid = Math.floor(Math.random() * 4294967296)
                let params = {
                    from: user,
                    to: User.opts.to,
                    sbd_amount: hbdAmount,
                    steem_amount: hiveAmount,
                    escrow_id: eid,
                    agent: User.opts.agent,
                    fee: User.opts.fee,
                    ratification_deadline: escrowTimer.ratifyString,
                    escrow_expiration: escrowTimer.expiryString,
                    json_meta: JSON.stringify({
                        dextx: {
                            dlux,
                            fee: User.opts.dfee
                        }
                    })
                }
                console.log(params)
                reqsign(['escrow_transfer', params], ['active', user])
                    .then(r => { feedback(r) })
                    .catch(e => { feedback(e) })
            }
        })
}

function getItID(txid) {
    fetch('https://token.dlux.io/dex')
        .then(function(response) {
            return response.json();
        })
        .then(function(myJson) {
            var updex = myJson.markets
            var queue = myJson.queue
            var addr = '',
                receiver = '',
                amount, type
            try {
                if (updex.hive.sellOrders[txid]) {
                    console.log(updex.hive.sellOrders[txid].txid)
                    addr = updex.hive.sellOrders[txid]
                    reciever = updex.hive.sellOrders[txid].from
                    type = ' STEEM'
                }
            } catch (e) {}
            if (!addr) {
                type = ' SBD'
                if (updex.hbd.sellOrders[txid]) {
                    console.log(updex.hbd.sellOrders[txid].txid)
                    addr = updex.hbd.sellOrders[txid]
                    reciever = updex.hbd.sellOrders[txid].from
                }
            }
            if (addr) {
                var escrowTimer = {}
                var agents = []
                console.log(addr, user)
                for (var agent in queue) {
                    if (queue[agent] !== addr.from && queue[agent] !== user) {
                        agents.push(queue[agent])
                    }
                }
                let now = new Date();
                escrowTimer.ratifyIn = now.setHours(now.getHours() + 1);
                escrowTimer.ratifyUTC = new Date(escrowTimer.ratifyIn);
                escrowTimer.ratifyString = escrowTimer.ratifyUTC.toISOString().slice(0, -5);
                escrowTimer.expiryIn = now.setHours(now.getHours() + 2);
                escrowTimer.expiryUTC = new Date(escrowTimer.expiryIn);
                escrowTimer.expiryString = escrowTimer.expiryUTC.toISOString().slice(0, -5);
                var eidi = Math.floor(Math.random() * 4294967296)
                if (type === ' STEEM') {
                    hiveAmount = `${parseFloat(addr.hive / 1000).toFixed(3)} STEEM`
                    hbdAmount = '0.000 SBD'
                } else if (type === ' SBD') {
                    hbdAmount = `${parseFloat(addr.hbd / 1000).toFixed(3)} SBD`
                    hiveAmount = '0.000 STEEM'
                }
                let eid = parseInt(Math.random() * 1000000000) //escrow_id from DLUXQmxxxx<this
                let params = {
                    from: user,
                    to: User.opts.to,
                    sbd_amount: hbdAmount,
                    steem_amount: hiveAmount,
                    escrow_id: eid,
                    agent: User.opts.agent,
                    fee: User.opts.fee,
                    ratification_deadline: escrowTimer.ratifyString,
                    escrow_expiration: escrowTimer.expiryString,
                    json_meta: JSON.stringify({
                        contract: txid,
                        for: addr.from
                    })
                }
                reqsign(['escrow_transfer', params], ['active', user])
                    .then(r => { feedback(r) })
                    .catch(e => { feedback(e) })
            }
        });
}

function getSellID(txid) {
    fetch('https://token.dlux.io/dex')
        .then(function(response) {
            return response.json();
        })
        .then(function(myJson) {
            var updex = myJson.markets,
                u
            var addr = '',
                receiver = '',
                amount, type
            var type = '',
                addr = '',
                reciever = ''
            console.log(`Buying ${txid}`, updex)
            for (var i in updex.hive.buyOrders) {
                if (updex.hive.buyOrders[i].txid == txid.split(':')[1]) {
                    console.log(updex.hive.buyOrders[i].txid)
                    addr = updex.hive.buyOrders[i]
                    receiver = updex.hive.buyOrders[i].from
                    type = ' STEEM'
                    u = `${parseFloat(updex.hive.buyOrders[i].amount / 1000).toFixed(3)} DLUX`
                }
            }
            console.log({ addr, receiver })
            if (!type) {
                for (var i in updex.hbd.buyOrders) {
                    if (updex.hbd.buyOrders[i].txid == txid.split(':')[1]) {
                        console.log(updex.hbd.buyOrders[i].txid)
                        addr = updex.hbd.buyOrders[i]
                        receiver = updex.hbd.buyOrders[i].from
                        type = ' SBD'
                        u = `${parseFloat(updex.hbd.buyOrders[i].amount / 1000).toFixed(3)} DLUX`
                    }
                }
            }
            console.log({ addr, receiver })
            if (type) {
                var params = {
                    "required_auths": [user],
                    "required_posting_auths": [],
                    "id": "dlux_dex_buy",
                    "json": JSON.stringify({
                        contract: txid,
                        for: receiver,
                        dlux: u
                    })
                }
                console.log(params)
                reqsign(['custom_json', params], ['active', user])
                    .then(r => { feedback(r) })
                    .catch(e => { feedback(e) })
            }
        });
}

function insertBal(data, loc, atr) {
    if (!atr) {
        document.getElementById(loc).value = data
    } else {
        document.getElementById(loc)[atr] = data
    }
}

function dexview(pair, type) {
    User.opts.pair = pair
    User.opts.type = type
    if (User.opts.type === 'buy') {
        document.getElementById('buyTab').classList.add('active')
        document.getElementById('sellTab').classList.remove('active')
    } else {
        document.getElementById('buyTab').classList.remove('active')
        document.getElementById('sellTab').classList.add('active')
    }
    if (User.opts.pair === 'hive') {
        document.getElementById('pairmenustatus').innerText = 'DLUX:HIVE'
    } else if (User.opts.pair === 'hbd') {
        document.getElementById('pairmenustatus').innerText = 'DLUX:HBD'
    }
    document.getElementById('jumbobal').innerHTML = `<h4>Balances: ${parseFloat(parseInt(User.dlux.balance)/1000).toFixed(3)} DLUX & ${User[User.opts.pair].balance}</h4>`
    document.getElementById('menupairdiv').innerText = User.opts.pair.toUpperCase()
    document.getElementById('paycoin').innerText = User.opts.pair.toUpperCase()
    document.getElementById('menupairlab').innerHTML = `For: (<a href="#" onClick="insertBal(parseFloat(User[User.opts.pair].balance),'menupair')">Balance: ${User[User.opts.pair].balance}</a>):`
    document.getElementById('pair1').innerText = User.opts.pair.toUpperCase()
    document.getElementById('pair2').innerText = User.opts.pair.toUpperCase()
    document.getElementById('menupair').max = parseFloat(User[User.opts.pair].balance)
    document.getElementById('menupricelab').innerHTML = `Calculated Price: (<a href="#" onClick="insertCalc('${parseFloat(User.dex.markets[User.opts.pair].tick)}', 'menuprice')">MP: ${parseFloat(User.dex.markets[User.opts.pair].tick).toFixed(4)} ${User.opts.pair.toUpperCase()}</a>):`
    let eAgentNode = document.getElementById('escrowAgentUl'),
        cAgentNode = document.getElementById('custodialAgentUl')
    lis = eAgentNode.getElementsByTagName('li')
    lic = cAgentNode.getElementsByTagName('li')
    while (eAgentNode.getElementsByTagName('li')[0]) {
        eAgentNode.removeChild(eAgentNode.getElementsByTagName('li')[0]);
    }
    while (cAgentNode.getElementsByTagName('li')[0]) {
        cAgentNode.removeChild(cAgentNode.getElementsByTagName('li')[0]);
    }
    for (a in User.dex.queue) {
        if (User.dex.queue[a] == user) {
            delete User.dex.queue[a]
            break
        }
    }
    if (!User.opts.to) {
        User.opts.to = User.dex.queue[0] ? User.dex.queue[0] : User.dex.queue[2]
    }
    if (!User.opts.agent) {
        User.opts.agent = User.dex.queue[1] ? User.dex.queue[1] : User.dex.queue[2]
    }
    document.getElementById('escrowAgent').innerText = User.opts.agent
    document.getElementById('custodialAgent').innerText = User.opts.to
    var balsP = []
    for (i in User.dex.queue) {
        console.log(User.dex.queue[i])
        balsP.push(fetch(`https://token.dlux.io/@${User.dex.queue[i]}`))
    }
    Promise.all(balsP)
        .then(res =>
            Promise.all(res.map(res => res.json()))
        )
        .then(b => {
            a = {}, j = 0
            for (i in User.dex.queue) {
                a[i] = b[j]
                j++
            }
            console.log(a)
            for (i in User.dex.queue) {
                if (User.opts.agent !== User.dex.queue[i]) {
                    var node = document.createElement('li')
                    node.innerHTML = `<a href="#" onclick="User.opts.to='${User.dex.queue[i]}';insertBal('${User.dex.queue[i]}', 'custodialAgent', 'innerText');dexmodal(User.opts.pair,User.opts.type)">${User.dex.queue[i]} - Fee: .0DLUX - Trust: Hi - Liquid: ${parseInt(a[i].balance/1000)}</a>`
                    cAgentNode.appendChild(node)
                }
            }
            for (i in User.dex.queue) {
                if (User.opts.to !== User.dex.queue[i]) {
                    var node = document.createElement('li')
                    node.innerHTML = `<a href="#" onclick="User.opts.agent='${User.dex.queue[i]}';dexmodal(User.opts.pair,User.opts.type)">${User.dex.queue[i]} - Fee: .0DLUX - Trust: Hi - Liquid: ${parseInt(a[i].balance/1000)}</a>`
                    eAgentNode.appendChild(node)
                }
            }
        })
}

function popOrderTable(orderstable, type) {
    let buyOrdersTable = document.getElementById(orderstable)
    console.log({ buyOrdersTable })
    console.log(User.opts.pair)
    console.log(type)
    console.log(User.dex)
    console.log(User.dex.markets[User.opts.pair][type])
    for (i in User.dex.markets[User.opts.pair][type]) {
        let txnode = document.createElement('tr')
        let whos = `< button class = "btn btn-outline-danger btn-sm"
    type = "submit" onclick="getSellID('${User.dex.markets[User.opts.pair][type][i].txid}')"> Sell < /button>`
        if (User.dex.markets[User.opts.pair][type][i].from == user) {
            whos = `< button class = "btn btn-outline-warning btn-sm"
    type = "submit" onclick="cancel('${User.dex.markets[User.opts.pair][type][i].txid}')"> Cancel < /button>`
        }
        txnode.innerHTML = `
    <td>${parseFloat(User.dex.markets[User.opts.pair][type][i].amount/1000).toFixed(3)}</td> 
    <td>${parseFloat(User.dex.markets[User.opts.pair][type][i][User.opts.pair]/1000).toFixed(3)}</td> 
    <td>${parseFloat(User.dex.markets[User.opts.pair][type][i].rate).toFixed(6)}</td> 
    <td> ${whos}</td >`
        buyOrdersTable.appendChild(txnode)
    }
    console.log('fin')
}

function dexmodal(pair, type) {
    User.opts.pair = pair
    User.opts.type = type
    if (User.opts.type === 'buy') {
        document.getElementById('buyDluxTitle').innerText = 'Buy With:'
        document.getElementById('menutitle').innerText = 'New Buy Order'
    } else {
        document.getElementById('buyDluxTitle').innerText = 'Sell for:'
        document.getElementById('menutitle').innerText = 'New Sell Order'
    }
    document.getElementById('menupairdiv').innerText = User.opts.pair.toUpperCase()
    document.getElementById('paycoin').innerText = User.opts.pair.toUpperCase()
    document.getElementById('menupairlab').innerHTML = `Order Total (<a href="#" onClick="insertBal(parseFloat(User[User.opts.pair].balance),'menupair')">Balance: ${User[User.opts.pair].balance}</a>):`
    document.getElementById('menupair').max = parseFloat(User[User.opts.pair].balance)
    document.getElementById('menupricelab').innerHTML = `Desired Price Each (<a href="#" onClick="insertBal('${parseFloat(User.dex.markets[User.opts.pair].tick)}', 'menuprice')">Market Price: ${parseFloat(User.dex.markets[User.opts.pair].tick).toFixed(4)} ${User.opts.pair.toUpperCase()}</a>):`
    let eAgentNode = document.getElementById('escrowAgentUl'),
        cAgentNode = document.getElementById('custodialAgentUl')
    lis = eAgentNode.getElementsByTagName('li')
    lic = cAgentNode.getElementsByTagName('li')
    while (eAgentNode.getElementsByTagName('li')[0]) {
        eAgentNode.removeChild(eAgentNode.getElementsByTagName('li')[0]);
    }
    while (cAgentNode.getElementsByTagName('li')[0]) {
        cAgentNode.removeChild(cAgentNode.getElementsByTagName('li')[0]);
    }
    for (a in User.dex.queue) {
        if (User.dex.queue[a] == user) {
            delete User.dex.queue[a]
            break
        }
    }
    if (!User.opts.to) {
        User.opts.to = User.dex.queue[0] ? User.dex.queue[0] : User.dex.queue[2]
    }
    if (!User.opts.agent) {
        User.opts.agent = User.dex.queue[1] ? User.dex.queue[1] : User.dex.queue[2]
    }
    document.getElementById('escrowAgent').innerText = User.opts.agent
    document.getElementById('custodialAgent').innerText = User.opts.to
    var balsP = []
    for (i in User.dex.queue) {
        console.log(User.dex.queue[i])
        balsP.push(fetch(`https://token.dlux.io/@${User.dex.queue[i]}`))
    }
    Promise.all(balsP)
        .then(res =>
            Promise.all(res.map(res => res.json()))
        )
        .then(b => {
            a = {}, j = 0
            for (i in User.dex.queue) {
                a[i] = b[j]
                j++
            }
            console.log(a)
            for (i in User.dex.queue) {
                if (User.opts.agent !== User.dex.queue[i]) {
                    var node = document.createElement('li')
                    node.innerHTML = `<a href="#" onclick="User.opts.to='${User.dex.queue[i]}';insertBal('${User.dex.queue[i]}', 'custodialAgent', 'innerText');dexmodal(User.opts.pair,User.opts.type)">${User.dex.queue[i]} - Fee: .0DLUX - Trust: Hi - Liquid: ${parseInt(a[i].balance/1000)}</a>`
                    cAgentNode.appendChild(node)
                }
            }
            for (i in User.dex.queue) {
                if (User.opts.to !== User.dex.queue[i]) {
                    var node = document.createElement('li')
                    node.innerHTML = `<a href="#" onclick="User.opts.agent='${User.dex.queue[i]}';dexmodal(User.opts.pair,User.opts.type)">${User.dex.queue[i]} - Fee: .0DLUX - Trust: Hi - Liquid: ${parseInt(a[i].balance/1000)}</a>`
                    eAgentNode.appendChild(node)
                }
            }
        })
}