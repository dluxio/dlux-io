function me(usr) {
    usr.hbd = { balance: usr.hive.sbd_balance }
    User.hbd = { balance: usr.hive.sbd_balance }
    document.getElementById('hiveactions').firstElementChild.innerText = usr.hive.balance
    document.getElementById('hbdactions').firstElementChild.innerText = usr.hive.sbd_balance
    document.getElementById('savingsactions').firstElementChild.innerText = User.hive.savings_sbd_balance

    document.getElementById('powerdluxamountlab').innerHTML = `Amount (Balance <a href="#" onClick="insertBal(parseFloat(parseInt(User.dlux.balance)/1000),'powerupdluxamount')">${parseFloat(parseInt(usr.dlux.balance)/1000).toFixed(3)} DLUX</a>):`
    document.getElementById('dluxactions').firstElementChild.innerText = `${parseFloat(parseInt(usr.dlux.balance)/1000).toFixed(3)} DLUX`
    document.getElementById('dluxpactions').firstElementChild.innerText = `${parseFloat(parseInt(usr.dlux.poweredUp)/1000).toFixed(3)} DLUX`
    document.getElementById('hivepactions').firstElementChild.innerText = parseFloat((parseFloat(usr.hstats.total_vesting_fund_steem) * parseFloat(usr.hive.vesting_shares)) / parseFloat(usr.hstats.total_vesting_shares)).toFixed(3) + ' HP'
    document.getElementById('hiveval').firstElementChild.innerText = `$${parseFloat((parseFloat(( parseFloat(usr.hstats.total_vesting_fund_steem) * parseFloat(usr.hive.vesting_shares)) / parseFloat(usr.hstats.total_vesting_shares)) + parseFloat(usr.hive.balance))*usr.price).toFixed(2)}`
    document.getElementById('dluxval').firstElementChild.innerText = `$${parseFloat(((parseInt(usr.dlux.balance) + parseInt(usr.dlux.poweredUp))/1000)*parseFloat(usr.dex.markets.hive.tick)*parseFloat(usr.price)).toFixed(2)}`
    document.getElementById('buylink').addEventListener("click", function() {
        User.opts.type = 'buy'
        dexmodal("hive", "buy");
    })
    document.getElementById('buyDluxTitle').innerText = 'Buy With:'
    document.getElementById('selllink').addEventListener("click", function() {
        User.opts.type = 'sell'
        dexmodal("hive", "sell");
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
    document.getElementById('sendhivemodalbutton').addEventListener("click", function() {
        document.getElementById('sendmodalsend').addEventListener("click", function() {
            hivesend('senddluxto', 'senddluxamount', 'senddluxmemo')
        })
        document.getElementById('sendDluxTitle').innerText = `Send HIVE`
        document.getElementById('sendformunits').innerText = 'HIVE'
        document.getElementById('senddluxamountlab').innerHTML = `Amount (Balance <a href="#" onClick="insertBal(parseFloat(User.hive.balance),'senddluxamount')">${User.hive.balance}</a>):`
        document.getElementById('senddluxamount').max = parseFloat(User.hive.balance)
    })
    document.getElementById('sendhbdmodalbutton').addEventListener("click", function() {
        document.getElementById('sendmodalsend').addEventListener("click", function() {
            hbdsend('senddluxto', 'senddluxamount', 'senddluxmemo')
        })
        document.getElementById('sendDluxTitle').innerText = `Send HBD`
        document.getElementById('sendformunits').innerText = 'HBD'
        document.getElementById('senddluxamountlab').innerHTML = `Amount (Balance <a href="#" onClick="insertBal(parseFloat(User.hbd.balance),'senddluxamount')">${User.hbd.balance}</a>):`
        document.getElementById('senddluxamount').max = parseFloat(User.hbd.balance)
    })

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