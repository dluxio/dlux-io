function dex(usr, pair, type) {
    User.opts.pair = pair || 'hive'
    User.opts.type = type || 'Buy'
    usr.hbd = { balance: User.hive.hbd_balance }
    User.hbd = { balance: User.hive.hbd_balance }
    icoPop(usr)
    fillDelegate(usr)
    document.getElementById('jumbobal').innerHTML = `<h4>Balances: ${parseFloat(parseInt(usr.dlux.balance)/1000).toFixed(3)} DLUX & ${usr[User.opts.pair].balance}</h4>`
    document.getElementById('senddluxfrom').value = user
    document.getElementById('menupricelab').innerHTML = `Calculated Price: (<a href="#" onClick="insertBal('${parseFloat(User.dex.markets[User.opts.pair].tick)}', 'menuprice')">Market Price: ${parseFloat(User.dex.markets[User.opts.pair].tick).toFixed(4)} ${User.opts.pair.toUpperCase()}</a>):`
    document.getElementById('menupairlab').innerHTML = `For: (<a href="#" onClick="insertBal(parseFloat(User[User.opts.pair].balance),'menupair')">Balance: ${User[User.opts.pair].balance}</a>):`
    document.getElementById('buyTab').addEventListener("click", function() {
        dexview(User.opts.pair, "Buy");
    })
    document.getElementById('sellTab').addEventListener("click", function() {
        dexview(User.opts.pair, "Sell");
    })
    document.getElementById('hivepairselect').addEventListener("click", function() {
        dexview("hive", User.opts.type);
    })
    document.getElementById('hbdpairselect').addEventListener("click", function() {
        dexview("hbd", User.opts.type);
    })

    dexview(User.opts.pair, User.opts.type)
    popStats()
    fetch('https://token.dlux.io/feed')
        .then(r => {
            return r.json()
        })
        .then(result => {
            let node = document.createElement('h4')
            node.innerHTML = 'Transactions:'
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
        .then(r => { spinThings(txid) })
        .catch(e => { feedback(e) })
}


function dexsend(type, pair) {
    const dlux = parseFloat(document.getElementById('menudlux').value)
    const pairamount = parseFloat(document.getElementById('menupair').value)
    const tick = parseFloat(User.stats[`${User.opts.pair.replace('h', 'H')}VWMA`].rate)
    console.log('Current Average:', tick)
    if (type == 'Buy' && pair == 'hbd') {
        console.log(pairamount / dlux)
        if (pairamount / dlux > tick * 0.8 && pairamount / dlux < tick * 1.2) {
            if (User.opts.toBal > dlux * 4000 && User.opts.agentBal > dlux * 4000) {
                placeHbdBuy()
            } else {
                alert(`Select agents with higher liquid`)
            }
        } else {
            alert('Requested trade is too far from current price!')
        }
    } else if (type == 'Buy' && pair == 'hive') {
        if (pairamount / dlux > tick * 0.8 && pairamount / dlux < tick * 1.2) {
            if (User.opts.toBal > dlux * 4000 && User.opts.agentBal > dlux * 4000) {
                placeHiveBuy()
            } else {
                alert(`Select agents with higher liquid`)
            }
        } else {
            alert('Requested trade is too far from current price!')
        }
    } else if (type == 'Sell' && pair == 'hive') {
        if (pairamount / dlux > tick * 0.8 && pairamount / dlux < tick * 1.2) {
            placeHiveAsk()
        } else {
            alert('Requested trade is too far from current price!')
        }
    } else if (type == 'Sell' && pair == 'hbd') {
        if (pairamount / dlux > tick * 0.8 && pairamount / dlux < tick * 1.2) {
            placeHbdAsk()
        } else {
            alert('Requested trade is too far from current price!')
        }
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
    var dlux = parseInt(document.getElementById('menudlux').value * 1000),
        amount = parseInt(document.getElementById('menupair').value * 1000),
        hiveAmount = (amount / 1000).toFixed(3) + ' HIVE',
        hbdAmount = '0.000 HBD'
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
                    hbd_amount: hbdAmount,
                    hive_amount: hiveAmount,
                    escrow_id: eidi,
                    agent: User.opts.agent,
                    fee: User.opts.fee,
                    ratification_deadline: escrowTimer.ratifyString,
                    escrow_expiration: escrowTimer.expiryString,
                    json_meta: JSON.stringify({
                        dextx: {
                            dlux,
                            fee: User.opts.dfee,
                            hours: until
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
        hiveAmount = '0.000 HIVE',
        hbdAmount = (amount / 1000).toFixed(3) + ' HBD'
    fetch('https://token.dlux.io/dex')
        .then(function(response) {
            return response.json();
        })
        .then(function(myJson) {
            //var updex = myJson.markets
            //var queue = myJson.queue
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
                    hbd_amount: hbdAmount,
                    hive_amount: hiveAmount,
                    escrow_id: eid,
                    agent: User.opts.agent,
                    fee: "0.000 HBD",
                    ratification_deadline: escrowTimer.ratifyString,
                    escrow_expiration: escrowTimer.expiryString,
                    json_meta: JSON.stringify({
                        dextx: {
                            dlux,
                            fee: User.opts.dfee,
                            hours: until
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
    console.log('getItID:', txid)
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
                    type = ' HIVE'
                }
            } catch (e) {}
            if (!addr) {
                type = ' HBD'
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
                escrowTimer.ratifyIn = now.setHours(now.getHours() + 2);
                escrowTimer.ratifyUTC = new Date(escrowTimer.ratifyIn);
                escrowTimer.ratifyString = escrowTimer.ratifyUTC.toISOString().slice(0, -5);
                escrowTimer.expiryIn = now.setHours(now.getHours() + 4);
                escrowTimer.expiryUTC = new Date(escrowTimer.expiryIn);
                escrowTimer.expiryString = escrowTimer.expiryUTC.toISOString().slice(0, -5);
                var eidi = Math.floor(Math.random() * 4294967296)
                if (type === ' HIVE') {
                    hiveAmount = `${parseFloat(addr.hive / 1000).toFixed(3)} HIVE`
                    hbdAmount = '0.000 HBD'
                } else if (type === ' HBD') {
                    hbdAmount = `${parseFloat(addr.hbd / 1000).toFixed(3)} HBD`
                    hiveAmount = '0.000 HIVE'
                }
                let eid = parseInt(Math.random() * 1000000000) //escrow_id from DLUXQmxxxx<this
                let params = {
                    from: user,
                    to: User.opts.to,
                    hbd_amount: hbdAmount,
                    hive_amount: hiveAmount,
                    escrow_id: eid,
                    agent: User.opts.agent,
                    fee: "0.000 HBD",
                    ratification_deadline: escrowTimer.ratifyString,
                    escrow_expiration: escrowTimer.expiryString,
                    json_meta: JSON.stringify({
                        contract: txid,
                        for: addr.from
                    })
                }
                reqsign(['escrow_transfer', params], ['active', user])
                    .then(r => { spinThings(txid.split(':')[1]) })
                    .catch(e => { feedback(e) })
            }
        });
}

function getSellID(txid) {
    console.log('getSellID:', txid)
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
                    type = ' HIVE'
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
                        type = ' HBD'
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
                    .then(r => { spinThings(txid.split(':')[1]) })
                    .catch(e => { feedback(e) })
            }
        });
}

function fillDelegate(usr) {

    try {
        HP = parseFloat((parseFloat(usr.hstats.total_vesting_fund_hive) * parseFloat(usr.hive.vesting_shares)) / parseFloat(User.hstats.total_vesting_shares))
        document.getElementById('icoDelegationAvailible').innerHTML = `<center><small>Balance: <a href="#">${HP.toFixed(3)} HP</a></small></center>`
        document.getElementById('hiveDelegate').max = HP.toFixed(3)
        document.getElementById('delegateToDlux').addEventListener("click", function() {
            delegateToLeader("hiveDelegate");
        })
        console.log({ HP })
    } catch (e) { console.log(e) }
}

function delegateToLeader() {
    console.log('delegate to dlux-io:', document.getElementById('hiveDelegate').value)
    vests = parseInt((document.getElementById('hiveDelegate').value / HP) * usr.hive.vesting_shares)
    reqsign([
            'delegate_vesting_shares',
            {
                delegator: user,
                delegatee: 'dlux-io',
                vesting_shares: vests,
            },
        ], ['active', user])
        .then(r => { console.log(r) })
        .catch(e => { feedback(e) })
}

function insertBal(data, loc, atr) {
    if (!atr) {
        document.getElementById(loc).value = data
    } else {
        document.getElementById(loc)[atr] = data
    }
}

function insertCalc(data, loc, atr) {
    if (!atr) {
        if (document.getElementById('menudlux').value > 0) {
            document.getElementById(loc).value = parseFloat(data).toFixed(6)
            document.getElementById('menupair').value = parseFloat(parseFloat(data) * parseFloat(document.getElementById('menudlux').value)).toFixed(6)
        } else if (document.getElementById('menupair').value > 0) {
            document.getElementById(loc).value = parseFloat(data).toFixed(6)
            document.getElementById('menudlux').value = parseFloat(parseFloat(document.getElementById('menupair').value) / parseFloat(data)).toFixed(6)
        } else {
            document.getElementById(loc).value = parseFloat(data).toFixed(6)
        }
    } else {
        document.getElementById(loc)[atr] = parseFloat(data).toFixed(6)
    }
}

function dexview(pair, type) {
    User.opts.pair = pair
    User.opts.type = type
    popStats()
    popHist()
    setCharts()
    popOrderTable('buyorderstable', 'buyOrders')
    popOrderTable('sellorderstable', 'sellOrders')
    if (User.opts.type === 'Buy') {
        document.getElementById('listButton').innerText = 'Buy'
    } else {
        document.getElementById('listButton').innerText = 'Sell';
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
    document.getElementById('menupair').max = parseFloat(User[User.opts.pair].balance)
    document.getElementById('menupricelab').innerHTML = `Calculated Price: (<a href="#" onClick="insertCalc('${parseFloat(User.stats[`${User.opts.pair.replace('h', 'H')}VWMA`].rate)}', 'menuprice')">MP: ${parseFloat(User.stats[`${User.opts.pair.replace('h', 'H')}VWMA`].rate).toFixed(4)} ${User.opts.pair.toUpperCase()}</a>):`
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
        if (a == user) {
            delete User.dex.queue[a]
            break
        }
    }
    let bals = []
    for (a in User.dex.queue) {
        if (User.dex.queue[a].g) bals.push(User.dex.queue[a].g)
    }
    console.log(bals)
    bals.sort(function(a, b) {
        return a - b;
    });
    console.log(bals)
    if (!User.opts.to) {
        for (a in User.dex.queue) {
            if (User.dex.queue[a].g == bals[bals.length - 1]) {
                User.opts.to = a
                User.opts.toBal = User.dex.queue[a].g
                bals.pop()
            }
        }
    }
    if (!User.opts.agent) {
        for (a in User.dex.queue) {
            if (User.dex.queue[a].g == bals[bals.length - 1]) {
                User.opts.agent = a
                User.opts.agentBal = User.dex.queue[a].g
            }
        }
    }
    console.log(User.opts)
    document.getElementById('escrowAgent').innerText = User.opts.agent
    document.getElementById('custodialAgent').innerText = User.opts.to
    for (i in User.dex.queue) {
        if (User.opts.agent !== User.dex.queue[i] && User.dex.queue[i].g) {
            var node = document.createElement('li')
            node.innerHTML = `<a href="#" onclick="User.opts.to='${i}';User.opts.toBal='${User.dex.queue[i].g}';insertBal('${i}', 'custodialAgent', 'innerText');dexview(User.opts.pair,User.opts.type)">@${i} - DLUXG: ${parseFloat(User.dex.queue[i].g/1000).toFixed(3)} - Fee: 0.25% DLUX</a>`
            cAgentNode.appendChild(node)
        }
    }
    for (i in User.dex.queue) {
        if (User.opts.to !== User.dex.queue[i] && User.dex.queue[i].g) {
            var node = document.createElement('li')
            node.innerHTML = `<a href="#" onclick="User.opts.agent='${i}';User.opts.agentBal='${User.dex.queue[i].g}';dexview(User.opts.pair,User.opts.type)">@${i} - DLUXG: ${parseFloat(User.dex.queue[i].g/1000).toFixed(3)}  - Fee: 0.25% DLUX</a>`
            eAgentNode.appendChild(node)
        }
    }
}

function popStats() {
    var info = document.getElementsByClassName('text-center market-info-item')
    console.log(info)
    var ip1 = parseFloat(User.stats.tokenSupply / 1000000 * User.dex.markets[User.opts.pair].tick).toFixed(1),
        m = 'K'
    if (ip1 > 1000) {
        ip1 = parseFloat(ip1 / 1000).toFixed(1)
        m = 'M'
    }
    if (ip1 > 1000) {
        ip1 = parseFloat(ip1 / 1000).toFixed(1)
        m = 'B'
    }
    console.log({ ip1 })
    info[0].innerHTML = `<h3><span>${ip1}${m} ${User.opts.pair.toUpperCase()}</span></h3>
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
}

function blocktimer(num) {
    let ago = parseInt((User.hstats.head_block_number - num) * 3),
        unit = 'secs'
    if (ago > 60) {
        unit = 'mins'
        ago = parseFloat(ago / 60).toFixed(1)
    }
    if (ago > 60) {
        unit = 'hours'
        ago = parseFloat(parseFloat(ago) / 60).toFixed(1)
    }
    if (ago > 24 && unit == 'hours') {
        unit = 'days'
        ago = parseFloat(parseFloat(ago) / 86400).toFixed(1)
    }
    return `${ago} ${unit}`
}

function popHist() {
    var info = document.getElementsByClassName('text-center market-info-item')
    var vol = 0,
        m = '',
        tradeHist = document.getElementById('tradeHist')
    tradeHist.innerHTML = `<tr>
      <th scope="col">WHEN</th>
      <th scope="col">PRICE</th>
      <th scope="col">DLUX</th>
      <th scope="col">${User.opts.pair.toUpperCase()}</th>
    </tr>`
    for (i in User.dex.markets[User.opts.pair].his) {
        if (User.dex.markets[User.opts.pair].his[i].block > (User.hstats.head_block_number - 28800)) {
            var node = document.createElement('tr')
            node.innerHTML = `<td>${blocktimer(User.dex.markets[User.opts.pair].his[i].block)} ago</td>
      <td>${User.dex.markets[User.opts.pair].his[i].rate}</td>
      <td>${parseFloat(User.dex.markets[User.opts.pair].his[i].amount/1000)}</td>
      <td>${parseFloat(parseFloat(User.dex.markets[User.opts.pair].his[i].rate)*User.dex.markets[User.opts.pair].his[i].amount/1000).toFixed(1)}</td>`
        if (tradeHist.childNodes[1]){    
            tradeHist.insertBefore(node, tradeHist.childNodes[1])
        } else {
            tradeHist.appendChild(node)
        }
            vol += parseInt(User.dex.markets[User.opts.pair].his[i].amount)
        }
    }

    //volume
    vol = parseFloat(vol / 1000)
    if (vol > 1000) {
        vol = parseFloat(vol / 1000).toFixed(1)
        m = 'K'
    }
    if (vol > 1000) {
        vol = parseFloat(vol / 1000).toFixed(1)
        m = 'M'
    }
    info[4].innerHTML = `<h3><span>${vol}${m} DLUX</span></h3>
				<div>
					<label>Volume</label>
                </div>`
}

function popOrderTable(orderstable, type) {
    let func, lab, col
    if (type == 'sellOrders') {
        func = 'getItID'
        lab = 'Buy'
        col = 'success'
    } else if (type == 'buyOrders') {
        func = 'getSellID'
        lab = 'Sell'
        col = 'danger'
    }
    let buyOrdersTable = document.getElementById(orderstable)
    buyOrdersTable.innerHTML = `<tr>
      <th scope="col">DLUX</th>
      <th scope="col" id="pair1">${User.opts.pair.toUpperCase()}</th>
      <th scope="col">PRICE</th>
      <th scope="col">FEE</th>
      <th scope="col">&nbsp;</th>
    </tr>`
    for (i in User.dex.markets[User.opts.pair][type]) {
        let txnode = document.createElement('tr')
        let whos = `<button class ="btn btn-outline-${col} btn-sm" type="submit" onclick="${func}('${i}')"><span id="orderlabel${i.split(':')[1]}" aria-labelledby="$lab"> ${lab} </span> <span d-none id="orderspin${i.split(':')[1]} class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>`
        if (User.dex.markets[User.opts.pair][type][i].from == user) {
            whos = `<button id="orderbutton${i.split(':')[1]}" class="btn btn-outline-warning btn-sm" type="submit" onclick="cancel('${i.split(':')[1]}')"><span id="orderlabel${i.split(':')[1]}" aria-labelledby="$lab"> Cancel </span><span d-none id="orderspin${i.split(':')[1]} class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span></button>`
        }
        
        txnode.innerHTML = `
    <td>${parseFloat((parseInt(User.dex.markets[User.opts.pair][type][i].amount * 0.9975)-3)/1000).toFixed(3)}</td> 
    <td>${parseFloat(User.dex.markets[User.opts.pair][type][i][User.opts.pair]/1000).toFixed(3)}</td> 
    <td>${parseFloat(User.dex.markets[User.opts.pair][type][i].rate).toFixed(6)}</td> 
    <td>${parseFloat((parseInt(User.dex.markets[User.opts.pair][type][i].amount * 0.0025)+3)/1000).toFixed(3)}
    <td> ${whos}</td >`
        if (type == 'sellOrders') {
            buyOrdersTable.appendChild(txnode)
        } else {
            buyOrdersTable.insertBefore(txnode, buyOrdersTable.childNodes[1]);
        }
    }
}

function dexmodal(pair, type) {
    User.opts.pair = pair
    User.opts.type = type
    if (User.opts.type === 'Buy') {
        document.getElementById('buyDluxTitle').innerText = 'Buy With:'
        document.getElementById('menutitle').innerText = 'New Buy Order'
        popOrderTable('orders', 'buyOrders')
    } else {
        document.getElementById('buyDluxTitle').innerText = 'Sell for:'
        document.getElementById('menutitle').innerText = 'New Sell Order'
        popOrderTable('orders', 'sellOrders')
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
        if (a == user) {
            delete User.dex.queue[a]
        }
    }
    let bals = []
    for (a in User.dex.queue) {
        bals.push(User.dex.queue[a].g)
    }
    bals.sort(function(a, b) {
        return a - b;
    });
    if (!User.opts.to) {
        for (a in User.dex.queue) {
            if (User.dex.queue[a].g == bals[bals.length - 1]) {
                User.opts.to = a
                console.log(bals.pop())
                break;
            }
        }
    }
    if (!User.opts.agent) {
        for (a in User.dex.queue) {
            if (User.dex.queue[a].g == bals[bals.length - 1]) {
                User.opts.agent = a
                break;
            }
        }
    }
    console.log(User.opts)
    document.getElementById('escrowAgent').innerText = User.opts.agent
    document.getElementById('custodialAgent').innerText = User.opts.to
    for (i in User.dex.queue) {
        if (User.opts.agent !== User.dex.queue[i]) {
            var node = document.createElement('li')
            node.innerHTML = `<a href="#" onclick="User.opts.to='${i}';insertBal('${i}', 'custodialAgent', 'innerText');dexview(User.opts.pair,User.opts.type)">@${i} - Liquid: ${parseFloat(User.dex.queue[i].g/1000).toFixed(3)} - Fee: 0.25% DLUX</a>`
            cAgentNode.appendChild(node)
        }
    }
    for (i in User.dex.queue) {
        if (User.opts.to !== User.dex.queue[i]) {
            var node = document.createElement('li')
            node.innerHTML = `<a href="#" onclick="User.opts.agent='${i}';dexview(User.opts.pair,User.opts.type)">@${i} - Liquid: ${parseFloat(User.dex.queue[i].g/1000).toFixed(3)}  - Fee: 0.25% DLUX</a>`
            eAgentNode.appendChild(node)
        }
    }
}


function setCharts() {
    var historicPrice = document.getElementById('historicPriceChart').getContext('2d');

    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Helvetica';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#FFF';
    let chartlabels = [],
        chartdata = []
    for (i in User.dex.markets[User.opts.pair].his) {
        chartlabels.push(`${parseFloat(User.dex.markets[User.opts.pair].his[i].amount/1000)}@${User.dex.markets[User.opts.pair].his[i].rate} ${User.opts.pair.toUpperCase()}`)
        chartdata.push({
            x: parseInt(User.dex.markets[User.opts.pair].his[i].block),
            y: parseFloat(User.dex.markets[User.opts.pair].his[i].rate)
        })
    }
    var priceChart = new Chart(historicPrice, {

        type: 'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
        data: {
            labels: chartlabels,
            datasets: [{
                label: 'Price',
                data: chartdata,
                pointRadius: 0,
                borderWidth: 3,
                borderColor: 'rgba(75, 0, 255, .5)',
                hoverBorderWidth: 3,
                hoverBorderColor: '#000'
            }]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: `DLUX: ${parseFloat(User.dex.markets[User.opts.pair].tick).toFixed(4)} ${User.opts.pair.toUpperCase()}`,
                fontSize: 40,
                fontColor: '#000',
            },
            legend: {
                display: false,
                position: 'right',
                labels: {
                    fontColor: '#000'
                }
            },
            layout: {
                padding: {
                    left: -10,
                    right: 0,
                    bottom: -10,
                    top: 0
                }
            },
            tooltips: {
                enabled: true
            },
            scales: {
                xAxes: [{
                    ticks: {
                        display: false //removes the label
                    },
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        display: false //removes the label
                    },
                    gridLines: {
                        display: false
                    }
                }]
            }
        }
    });
    // populate the orders chart	
    var marketOrders = document.getElementById('marketOrdersChart').getContext('2d');
    var gradientGrn = marketOrders.createLinearGradient(0, 0, 0, 400);
    gradientGrn.addColorStop(0, 'rgba(90, 216, 154, 1)');
    gradientGrn.addColorStop(1, 'rgba(90, 216, 154, 0)');

    var gradientRed = marketOrders.createLinearGradient(0, 0, 0, 400);
    gradientRed.addColorStop(0, 'rgba(226, 94, 94, 1)');
    gradientRed.addColorStop(1, 'rgba(226, 94, 94, 0)');

    let orderlabels = []
    let orderdata = []
    let type = 'sellOrders'
    for (i in User.dex.markets[User.opts.pair][type]) {
        orderlabels.push(`${parseFloat(User.dex.markets[User.opts.pair][type][i].amount/1000).toFixed(3)}@${User.dex.markets[User.opts.pair][type][i].rate}${User.opts.pair.toUpperCase()}`)
        orderdata.push({ x: parseFloat(User.dex.markets[User.opts.pair][type][i].amount / 1000), y: User.dex.markets[User.opts.pair][type][i].rate })
    }
    type = 'buyOrders'
    for (i in User.dex.markets[User.opts.pair][type]) {
        orderlabels.push(`${parseFloat(User.dex.markets[User.opts.pair][type][i].amount/1000).toFixed(3)}@${User.dex.markets[User.opts.pair][type][i].rate}${User.opts.pair.toUpperCase()}`)
        orderdata.push({ x: parseFloat(User.dex.markets[User.opts.pair][type][i].amount / 1000), y: User.dex.markets[User.opts.pair][type][i].rate })
    }
    var buySellChart = new Chart(marketOrders, {
        type: 'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
        data: {
            labels: orderlabels,
            datasets: [{
                label: 'Price',
                data: orderdata,
                backgroundColor: [gradientGrn, gradientGrn, gradientGrn, gradientRed, gradientRed, gradientRed],
                hoverBackgroundColor: [gradientGrn, gradientGrn, gradientGrn, gradientRed, gradientRed, gradientRed],
                hoverBorderWidth: 2,
                hoverBorderColor: '#FFCE00'
            }]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: `DLUX - ${ User.opts.pair.toUpperCase() } ORDER BOOK`,
                fontSize: 25
            },
            legend: {
                display: false,
                position: 'right',
                labels: {
                    fontColor: '#000'
                }
            },
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    bottom: 0,
                    top: 0
                }
            },
            tooltips: {
                enabled: true
            },
            scales: {
                xAxes: [{
                    ticks: {
                        display: false //removes the label
                    },
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        display: false, //removes the label
                        beginAtZero: false
                    },
                    gridLines: {
                        display: false
                    }
                }]
            }

        }
    });
}

function spinThings (i){
$("#orderspin${i}").removeClass("d-none");
$("#orderlabel${i}").addClass("d-none");
}

function  countdown(t, s, u){
  const x = setInterval(function() {

  // Get today's date and time
  var now = new Date()
    const countDownDate = new Date(t)
  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  try{
    document.getElementById(`timer-${s}-${u}`).innerText = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
  } catch (e){
    console.log(s, u)
    clearInterval(x)
  }

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById(`timer-${s}-${u}`).innerText = "EXPIRED";
  }
}, 1000);
//x()
}