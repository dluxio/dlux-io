function me(usr) {
    console.log(usr)
    usr.hbd = { balance: usr.hive.hbd_balance }
    User.hbd = { balance: usr.hive.hbd_balance }
    document.getElementById('hiveactions').firstElementChild.innerText = usr.hive.balance
    document.getElementById('hbdactions').firstElementChild.innerText = usr.hive.hbd_balance
    document.getElementById('savingsactions').firstElementChild.innerText = User.hive.savings_hbd_balance
    document.getElementById('govbal').innerText = `${parseFloat((User.dlux.gov + User.dlux.heldCollateral)/ 1000).toFixed(3)} DLUXG`
    document.getElementById('powerdluxamountlab').innerHTML = `Amount (Balance <a href="#" onClick="insertBal(parseFloat(parseInt(User.dlux.balance)/1000),'powerupdluxamount')">${parseFloat(parseInt(usr.dlux.balance)/1000).toFixed(3)} DLUX</a>):`
    document.getElementById('dluxactions').firstElementChild.innerText = `${parseFloat(parseInt(usr.dlux.balance)/1000).toFixed(3)} DLUX`
    document.getElementById('dluxpactions').firstElementChild.innerText = `${parseFloat(parseInt(usr.dlux.poweredUp)/1000).toFixed(3)} DLUX`
    document.getElementById('hivepactions').firstElementChild.innerText = parseFloat((parseFloat(usr.hstats.total_vesting_fund_hive) * parseFloat(usr.hive.vesting_shares)) / parseFloat(usr.hstats.total_vesting_shares)).toFixed(3) + ' HP'
    document.getElementById('hiveval').firstElementChild.innerText = `$${parseFloat((parseFloat(( parseFloat(usr.hstats.total_vesting_fund_hive) * parseFloat(usr.hive.vesting_shares)) / parseFloat(usr.hstats.total_vesting_shares)) + parseFloat(usr.hive.balance))*usr.price).toFixed(2)}`
    document.getElementById('dluxval').firstElementChild.innerText = `$${parseFloat(((parseInt(usr.dlux.balance) + parseInt(usr.dlux.poweredUp))/1000)*parseFloat(usr.dex.markets.hive.tick)*parseFloat(usr.price)).toFixed(2)}`
    document.getElementById('buylink').addEventListener("click", function() {
        User.opts.type = 'Buy'
        dexmodal("hive", "Buy");
    })
    setVotePower(usr.dlux.poweredUp, usr.dlux.up, usr.dlux.down, usr.hive.voting_power, usr, hstats.head_block_number)
    document.getElementById('buyDluxTitle').innerText = 'Buy With:'
    document.getElementById('selllink').addEventListener("click", function() {
        User.opts.type = 'Sell'
        dexmodal("hive", "Sell");
    })
    document.getElementById('dluxpowerdownModalButton').addEventListener("click", function() {
        document.getElementById('powerdowndluxammount').innerHTML = `Amount (Balance <a href="#" onClick="insertBal(parseFloat(User.dlux.poweredUp/1000),'powerupdluxamount')">${parseFloat(parseInt(User.dlux.poweredUp)/1000).toFixed(3)} DLUX</a>):`
    })
    document.getElementById('senddluxmodalbutton').addEventListener("click", function() {
        document.getElementById('sendmodalsend').addEventListener("click", function() {
            dluxsend('senddluxto', 'senddluxamount', 'senddluxmemo')
        })
        document.getElementById('sendDluxTitle').innerText = `Send DLUX`
        document.getElementById('sendformunits').innerText = 'DLUX'
        document.getElementById('senddluxamountlab').innerHTML = `Amount (Balance <a href="#" onClick="insertBal(parseFloat(User.dlux.balance/1000),'senddluxamount')">${parseFloat(parseInt(User.dlux.balance)/1000).toFixed(3)} DLUX</a>):`
        document.getElementById('senddluxamount').max = parseFloat(parseInt(User.dlux.balance) / 1000)
    })
    document.getElementById('freezedluxbutton').addEventListener("click", function() {
        document.getElementById('powerdluxsubmitbutton').addEventListener("click", function() {
            dluxgovup('powerupdluxamount')
        })
        document.getElementById('powerDluxTitle').innerText = `Lock DLUX for Governance Ops`
        document.getElementById('sendformunits').innerText = 'DLUX'
        document.getElementById('powerdluxamountlab').innerHTML = `Amount (Balance <a href="#" onClick="insertBal(parseFloat(User.dlux.balance/1000),'powerupdluxamount')">${parseFloat(parseInt(User.dlux.balance)/1000).toFixed(3)} DLUX</a>):`
        document.getElementById('powerupdluxamount').max = parseFloat(parseInt(User.dlux.balance) / 1000)
    })
    document.getElementById('powerupdluxbutton').addEventListener("click", function() {
        document.getElementById('powerdluxsubmitbutton').addEventListener("click", function() {
            powerUp('powerupdluxamount', 'powerupdluxto', 'powerupdluxmemo')
        })
        $("#powerupdluxmemo").addClass("d-none");
        document.getElementById('powerDluxTitle').innerText = `Power Up DLUX`
        document.getElementById('sendformunits').innerText = 'DLUX'
        document.getElementById('powerdluxamountlab').innerHTML = `Amount (Balance <a href="#" onClick="insertBal(parseFloat(User.dlux.balance/1000),'powerupdluxamount')">${parseFloat(parseInt(User.dlux.balance)/1000).toFixed(3)} DLUX</a>):`
        document.getElementById('powerupdluxamount').max = parseFloat(parseInt(User.dlux.balance) / 1000)
    })
    document.getElementById('poweruphivebutton').addEventListener("click", function() {
        document.getElementById('sendmodalsend').addEventListener("click", function() {
            hivepower('senddluxto', 'senddluxamount', 'senddluxmemo')
        })
        console.log('triggered')
        $("#senddluxmemo").addClass("d-none");
        document.getElementById('sendDluxTitle').innerText = `Power up HIVE`
        document.getElementById('sendformunits').innerText = 'HIVE'
        document.getElementById('senddluxamountlab').innerHTML = `Amount (Balance <a href="#" onClick="insertBal(parseFloat(User.hive.balance),'senddluxamount')">${User.hive.balance}</a>):`
        document.getElementById('senddluxamount').max = parseFloat(User.hive.balance)
    })
    document.getElementById('govtopowerbutton').addEventListener("click", function() {
        document.getElementById('sendmodalsend').addEventListener("click", function() {
            govtopower('senddluxto', 'senddluxamount', 'senddluxmemo')
        })
        console.log('triggered')
        $("#senddluxmemo").addClass("d-none");
        document.getElementById('sendDluxTitle').innerText = `Convert DLUX Gov to DLUX Power`
        document.getElementById('sendformunits').innerText = 'GOV'
        document.getElementById('senddluxamountlab').innerHTML = `Amount (Balance <a href="#" onClick="insertBal(parseFloat(User.gov.balance),'senddluxamount')">${User.gov.balance}</a>):`
        document.getElementById('senddluxamount').max = parseFloat(User.gov.balance) / 1000
    })
    document.getElementById('sendhivemodalbutton').addEventListener("click", function() {
        document.getElementById('sendmodalsend').addEventListener("click", function() {
            hivesend('senddluxto', 'senddluxamount', 'senddluxmemo')
        })
        document.getElementById('sendDluxTitle').innerText = `Send HIVE`
        document.getElementById('sendformunits').innerText = 'HIVE'
        document.getElementById('senddluxamountlab').innerHTML = `Amount (Balance <a href="#" onClick="insertBal(parseFloat(User.hive.balance),'senddluxamount')">${User.hive.balance}</a>):`
        document.getElementById('senddluxamount').max = parseFloat(usr.hive.balance)
    })
    document.getElementById('sendhbdmodalbutton').addEventListener("click", function() {
        document.getElementById('sendmodalsend').addEventListener("click", function() {
            hbdsend('senddluxto', 'senddluxamount', 'senddluxmemo')
        })
        document.getElementById('sendDluxTitle').innerText = `Send HBD`
        document.getElementById('sendformunits').innerText = 'HBD'
        document.getElementById('senddluxamountlab').innerHTML = `Amount (Balance <a href="#" onClick="insertBal(parseFloat(usr.hive.hbd_balance),'senddluxamount')">${User.hbd.balance}</a>):`
        document.getElementById('senddluxamount').max = parseFloat(usr.hive.hbd_balance)
    })
    document.getElementById('updateNode').addEventListener("click", function() {
        updateNode()
    })

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

    fetch('https://token.dlux.io/markets')
        .then(r => {
            return r.json()
        })
        .then(result => {
            const blogger = window.location.pathname.split('/')[1].split('@')[1]
            var node
            if (blogger) {
                node = result.markets.node[blogger]
            } else {
                node = result.markets.node[user]
                document.getElementById('nodeDomainSet').value = node.domain.split('//')[1]
                document.getElementById('nodeBidRateSet').value = parseFloat(node.bidRate / 100).toFixed(1)
                document.getElementById('nodeDaoRateSet').value = parseFloat(node.marketingRate / 100).toFixed(1)
                document.getElementById('escrowCheckSet').checked = node.escrow
                document.getElementById('mirrorCheckSet').checked = node.mirror || false
            }
            document.getElementById('nodeDomain').value = node.domain.split('//')[1]
            document.getElementById('nodeBidRate').value = parseFloat(node.bidRate / 100).toFixed(1)
            document.getElementById('nodeDaoRate').value = parseFloat(node.marketingRate / 100).toFixed(1)
            document.getElementById('escrowCheck').checked = node.escrow
            document.getElementById('mirrorCheck').checked = node.mirror || false
        })
        .catch(e => { console.log(e) })

    fetch("https://anyx.io", {
            body: `{\"jsonrpc\":\"2.0\", \"method\":\"condenser_api.get_account_history\", \"params\":[\"${user}\", -1, 100], \"id\":1}`,
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            method: "POST"
        })
        .then(r => { return r.json() })
        .then(r => {
            console.log(r)
            let node = document.createElement('h4')
            node.innerHTML = 'Transactions:'
            node.class = "mb-3"
            let txholder = document.getElementById('hivetxs')
            console.log(r.result[0][1].op[0])
            for (i in r.result) {
                console.log(r.result[i][1].op[0])
                let txnode = document.createElement('div')
                txnode.innerHTML = `
                    <p class="my-2">${r.result[i][1].op[0]}<br>${JSON.stringify(r.result[i][1].op[1])}</p>
                    <hr class="my-3 bg-light">`
                txholder.insertAdjacentElement('beforeend', txnode)
            }
            txholder.insertAdjacentElement('afterbegin', node)
        })
}

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
        .then(r => { feedback(r) })
        .catch(e => { feedback(e) })
}

function powerUp(amt, tol, memol) {
    let amount = parseInt(document.getElementById(amt).value * 1000),
        to = document.getElementById(tol).value || '',
        memo = document.getElementById(memol).value || '',
        params = {
            "required_auths": [user],
            "required_posting_auths": 0,
            "id": "dlux_power_up",
            "json": JSON.stringify({
                amount,
                to,
                memo
            })
        }
    console.log(params)
    reqsign(['custom_json', params], ['active', user])
        .then(r => { feedback(r) })
        .catch(e => { feedback(e) })
}

function powerDown(amt, tol, memol) {
    let amount = parseInt(document.getElementById(amt).value * 1000),
        to = document.getElementById(tol).value,
        memo = document.getElementById(memol).value,
        params = {
            "required_auths": [user],
            "required_posting_auths": 0,
            "id": "dlux_power_down",
            "json": JSON.stringify({
                amount,
                to,
                memo
            })
        }
    console.log(params)
    reqsign(['custom_json', params], ['active', user])
        .then(r => { feedback(r) })
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
            .then(r => { resolve(r) })
            .catch(e => { reject(e) })
    });
}

function setVotePower(pow, upobj, downobj, vp, block) {
    let up, dp, hp
    if (!Object.keys(up).length) {
        up = {
            max: pow * 50,
            last: 0,
            power: pow * 50
        }
        down = {
            max: pow * 50,
            last: 0,
            power: pow * 50
        }
    }
    const newPower = downPowerMagic(up, down, block)
    up = newPower.up.power
    dp = newPower.down.power
    hp = parseInt(vp / 100)
    $('upvotePower').style = `width: ${up}%`
    $('downvotePower').style = `width: ${dp}%`
    $('resourceCredit').style = `width: ${hp}%`
    $('upvotePower')['aria-valuenow'] = `${up}`
    $('downvotePower')['aria-valuenow'] = `${dp}`
    $('resourceCredit')['aria-valuenow'] = `${hp}`
    $('upvotePowerSpan').innerText = `${up}%`
    $('downvotePowerSpan').innerText = `${dp}%`
    $('resourceCreditSpan').innerText = `${hp}%`
    return newPower.vote
}

function downPowerMagic(up, down, block_num) {
    const downHealTime = block_num - down.last //144000 blocks in 5 days
    const downHeal = parseInt(down.max * downHealTime / 144000)
    weight = 10000
    var newDownPower = down.power + downHeal
    if (newDownPower > down.max) {
        newDownPower = down.max
    }
    const healTime = block_num - up.last //144000 blocks in 5 days
    const heal = parseInt(up.max * healTime / 144000)
    var newPower = up.power + heal
    if (newPower > up.max) {
        newPower = up.max
    }
    var bigSpender = false
    var vote
    var downvote = parseInt(newDownPower * weight / 500000) //5 from max AND 10000 from full weight
    newDownPower -= downvote
    if (newDownPower < down.max * 0.9) { //further down power vote effect up and down power meters
        bigSpender = true
    }
    if (bigSpender) {
        vote = parseInt(newPower * weight / 500000) //50 from max AND 10000 from full weight
        if (vote > downVote) {
            newPower -= vote
            newDownPower -= vote
        } else {
            newPower -= downVote
            newDownPower -= downVote
        }
    }
    const newUp = {
        max: up.max,
        last: json.block_num,
        power: newPower
    }
    const newDown = {
        max: down.max,
        last: json.block_num,
        power: newDownPower
    }
    return { up: newUp, down: newDown, vote: vote }
}