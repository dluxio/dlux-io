function hivesend(toid, amountid, memoid) {
    return new Promise((resolve, reject) => {
        var to = document.getElementById(toid).value,
            amount = parseFloat(document.getElementById(amountid).value).toFixed(3) + ' HIVE',
            memo = document.getElementById(memoid).value
        checkAccount(to)
            .then(r => {
                Dluxsession.hive_sign([user, [
                        ['transfer', {
                            "from": user,
                            to,
                            memo,
                            amount
                        }]
                    ], 'active'])
                    .then(r => {
                        resolve(r)
                    })
                    .catch(e => { reject(e) })
            })
            .catch(e => { alert(e) })
    });
}

function hbdsend(toid, amountid, memoid) {
    return new Promise((resolve, reject) => {
        var to = document.getElementById(toid).value,
            amount = parseFloat(document.getElementById(amountid).value).toFixed(3) + ' HBD',
            memo = document.getElementById(memoid).value
        checkAccount(to)
            .then(r => {
                Dluxsession.hive_sign([user, [
                        ['transfer', {
                            "from": user,
                            to,
                            memo,
                            amount
                        }]
                    ], 'active'])
                    .then(r => {
                        resolve(r)
                    })
                    .catch(e => { reject(e) })
            })
            .catch(e => { alert(e) })
    });
}

function hivepower(toid, amountid, memoid) {
    return new Promise((resolve, reject) => {
        var to = document.getElementById(toid).value || "",
            amount = parseFloat(document.getElementById(amountid).value).toFixed(3) + ' HIVE',
            memo = document.getElementById(memoid).value
        if (to) {
            checkAccount(to)
                .then(r => {
                    Dluxsession.hive_sign([user, [
                            ['transfer_to_vesting', {
                                "from": user,
                                to: to,
                                amount
                            }]
                        ], 'active'])
                        .then(r => {
                            resolve(r)
                        })
                        .catch(e => { reject(e) })
                })
                .catch(e => { alert(e) })
        } else {
            Dluxsession.hive_sign([user, [
                    ['transfer_to_vesting', {
                        "from": user,
                        to: "",
                        amount
                    }]
                ], 'active'])
                .then(r => {
                    resolve(r)
                })
                .catch(e => { reject(e) })
        }
    });
}

function dluxgovup(amt) {
    let amount = parseInt(document.getElementById(amt).value * 1000),
        params = {
            "required_auths": [user],
            "required_posting_auths": 0,
            "id": "dlux_gov_up",
            "json": JSON.stringify({
                amount
            })
        }
    console.log(params)
    reqsign(['custom_json', params], ['active', user])
        .then(r => { statusWaiter (r, `Trying to gov up...`);feedback(r) })
        .catch(e => { feedback(e) })
}

function claim(gov) {
    let amount = parseInt(document.getElementById(amt).value * 1000),
        params = {
            "required_auths": [user],
            "required_posting_auths": 0,
            "id": "dlux_claim",
            "json": JSON.stringify({
                gov: gov ? true : false
            })
        }
    console.log(params)
    reqsign(['custom_json', params], ['active', user])
        .then(r => { statusWaiter (r, `Trying to gov up...`);feedback(r) })
        .catch(e => { feedback(e) })
}

function govDown(amt, to, memo) {
    let amount = parseInt(document.getElementById(amt).value * 1000),
        params = {
            "required_auths": [user],
            "required_posting_auths": 0,
            "id": "dlux_gov_down",
            "json": JSON.stringify({
                amount
            })
        }
    console.log(params)
    reqsign(['custom_json', params], ['active', user])
        .then(r => { statusWaiter (r, `Trying to gov down...`);feedback(r) })
        .catch(e => { feedback(e) })
}

function powerUp(amt, tol, memol) {
    let amount = parseInt(document.getElementById(amt).value * 1000),
        to = document.getElementById(tol).value || '',
        //memo = document.getElementById(memol).value || '',
        params = {
            "required_auths": [user],
            "required_posting_auths": 0,
            "id": "dlux_power_up",
            "json": JSON.stringify({
                amount,
                //to,
                //memo
            })
        }
    console.log(params)
    reqsign(['custom_json', params], ['active', user])
        .then(r => { statusWaiter (r, `Trying to power up...`);feedback(r) })
        .catch(e => { feedback(e) })
}

function powerGrant(amt, tol) {
    let amount
    if (typeof amt == 'number') {
        amount = amt
    } else {
        amount = parseInt(document.getElementById(amt).value * 1000)
    }
    let to = document.getElementById(tol).value || '',
        //memo = document.getElementById(memol).value || '',
        params = {
            "required_auths": [user],
            "required_posting_auths": 0,
            "id": "dlux_power_up",
            "json": JSON.stringify({
                amount,
                to,
                //memo
            })
        }
    console.log(params)
    reqsign(['custom_json', params], ['active', user])
        .then(r => { statusWaiter (r, `Trying to grant power...`);feedback(r) })
        .catch(e => { feedback(e) })
}

function powerDown(amt, tol, memol) {
    let amount = parseInt(document.getElementById(amt).value * 1000),
        //to = document.getElementById(tol).value,
        //memo = document.getElementById(memol).value,
        params = {
            "required_auths": [user],
            "required_posting_auths": 0,
            "id": "dlux_power_down",
            "json": JSON.stringify({
                amount,
                //to,
                //memo
            })
        }
    console.log(params)
    reqsign(['custom_json', params], ['active', user])
        .then(r => { statusWaiter (r, `Trying to power down...`);feedback(r) })
        .catch(e => { feedback(e) })
}


function updateNode() {
    return new Promise((resolve, reject) => {
        var nodeDomain = document.getElementById('nodeDomainSet').value,
            nodeBidRate = document.getElementById('nodeBidRateSet').value,
            nodeDaoRate = document.getElementById('nodeDaoRateSet').value,
            nodeEscrow = document.getElementById('escrowCheckSet').checked,
            nodeMirror = document.getElementById('mirrorCheckSet').checked
        if (nodeDomain.split('//')[1]) {
            nodeDomain = 'https://' + nodeDomain.split('//')[1]
        } else {
            nodeDomain = 'https://' + nodeDomain
        }
        nodeBidRate = parseInt(nodeBidRate * 100)
        nodeDaoRate = parseInt(nodeDaoRate * 100)
        const params = {
            "required_auths": [user],
            "required_posting_auths": 0,
            "id": "dlux_node_add",
            "json": JSON.stringify({
                domain: nodeDomain,
                bidRate: nodeBidRate,
                marketingRate: nodeDaoRate,
                escrow: nodeEscrow,
                mirror: nodeMirror
            })
        }
        console.log(params)
        reqsign(['custom_json', params], ['active', user])
            .then(r => { statusWaiter (r, `Trying to update node...`);resolve(r) })
            .catch(e => { reject(e) })
    });
}