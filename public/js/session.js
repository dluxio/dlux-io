let HP

function validateResponse(response) {
    if (!response.ok) {
        throw Error(response.statusText);
    }
    return response;
}

function updateprogress(id) {
    User[`id-iterator-${id}`]++
        document.getElementById(`progressbar${id}`).style.width = `${parseInt(User[`id-iterator-${id}`]*5)}%`
        document.getElementById(`progressbarlabel${id}`).innerText = `${User[`id-iterator-${id}`]} Confirmations. 20 Required`
        if(User[`id-iterator-${id}`] >= 21 ){
            delete User[`id-iterator-${id}`]
            if (window.location.pathname.split('/')[1] == 'me'){
                pageSpecfic(User)
            } else {
                pageSpecfic(window.location.pathname.split('/')[0].split('@')[1])
            }
        } else {
            setTimeout(updateprogress(id), 3000)
        }
    }

 function feedback(r, cb) {
     console.log(r)
     cb(r)
 }

 function picFinder(body, json){
     if (typeof json.parseJSON().image == 'string'){
        return json.parseJSON().image
     } else if (typeof json.parseJSON().image[0] == 'string'){
        return json.parseJSON().image[0]
     } else if (typeof json.parseJSON().hash360 == 'string'){
        return `https://ipfs.io/ipfs/${json.parseJSON().Hash360}`
     }else {
        var looker 
        try{
        looker = body.split('![')[1]
        looker = looker.split('(')[1]
        looker = looker.split(')')[0]
        } catch (e){
            return '/img/dluxdefault.svg'
        }
        return looker
     }
 }

 function readResponseAsBlob(response) {
     return response.blob();
 }
 var user, dlux, User = { dlux: {}, hive: {}, dex: {}, stats: {}, opts: { to: 0, agent: 0, fee: '0.000 HIVE', dfee: 25, type: 'Buy' } }

 function checkCookie() {
     console.log('Checking for login')
     user = sessionStorage.getItem('user');
     console.log('user=' + user)
     if (user != null) {
         propCheck(user)
         .then(r=>{
            if (r.one71){
                var el = document.getElementById('propVotePlead')
                el.parentElement.removeChild(el)
            } else {
document.getElementById('propVotePlead').innerHTML = `<div class="alert alert-danger alert-dismissible text-center">
  		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<span>Our proposals to improve the token software and multi-signature wallet need your support.</span>
		<a href="https://peakd.com/proposals/171" target="_blank" class="alert-link">Prop #171</a>
  		<a href="#" class="alert-link"></a>
		<button class="btn btn-danger ml-3" onclick="voteProp([171],'${user}')">Vote Now</button>
	</div>`
            }
         })
         .catch(e=>console.log(e))

         let account = sessionStorage.getItem('account')
         if (account != 'undefined') {
             console.log(account)
             dlux = new Dluxsession({ hiveid: user, account });
         } else {
             dlux = new Dluxsession({ hiveidip: user });
         }
         $('.no-session').addClass('d-none');
         document.getElementById('userImage').src = 'https://images.hive.blog/u/' + user + '/avatar'
         document.getElementById('userName').innerText = '@' + user;
         let dex, stats, hive, feed
         var urls = [`https://token.dlux.io/@${user}`, 'https://token.dlux.io/dex', 'https://token.dlux.io/stats', 'https://api.coingecko.com/api/v3/simple/price?ids=hive&vs_currencies=usd'] //datasources
         let promises = urls.map(u => fetch(u))
         promises.push(fetch("https://anyx.io", {
             body: "{\"jsonrpc\":\"2.0\", \"method\":\"condenser_api.get_dynamic_global_properties\", \"params\":[], \"id\":1}",
             headers: {
                 "Content-Type": "application/x-www-form-urlencoded"
             },
             method: "POST"
         }))
         promises.push(fetch("https://anyx.io", {
             body: `{\"jsonrpc\":\"2.0\", \"method\":\"condenser_api.get_accounts\", \"params\":[[\"${user}\"]], \"id\":1}`,
             headers: {
                 "Content-Type": "application/x-www-form-urlencoded"
             },
             method: "POST"
         }))
         
         Promise.all(promises).then(res =>
             Promise.all(res.map(res => res.json()))
         ).then(jsons => {
             User.dlux = jsons[0]
             User.dex = jsons[1]
             User.stats = jsons[2].stats
             User.price = jsons[3].hive.usd
             User.hstats = jsons[4].result
             User.hive = jsons[5].result[0]
             try { 
                if (window.location.pathname.split('/')[1] == 'me' || window.location.pathname.split('/')[1] == 'dex'|| window.location.pathname.split('/')[1] == undefined){
                    pageSpecfic(User)
                } else {
                    console.log(window.location.pathname.split('/')[1].split('@')[1])
                    const blogger = window.location.pathname.split('/')[1].split('@')[1]
                    var urls = [`https://token.dlux.io/@${blogger}`]
                    let promises = urls.map(u => fetch(u))
                    promises.push(fetch("https://anyx.io", {
                        body: `{\"jsonrpc\":\"2.0\", \"method\":\"condenser_api.get_accounts\", \"params\":[[\"${blogger}\"]], \"id\":1}`,
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                            method: "POST"
                        }))
                    Promise.all(promises).then(res =>
                        Promise.all(res.map(res => res.json()))
                        .catch(e=>console.log(e))
                        ).then(jsons => {
                            let Blogger = {
                                dlux: jsons[0],
                                dex: User.dex,
                                stats: User.stats,
                                price: User.price,
                                hstats: User.hstats,
                                hive: jsons[1]
                            }
                        pageSpecfic(Blogger)
                
                        }).catch(e=>console.log(e))
                    }
              } catch (e) {}
         })
     } else {
         $('.active-session').addClass('d-none');
     }
 }

 function me(usr) {
    console.log(usr)
    usr.hbd = { balance: usr.hive.hbd_balance }
    User.hbd = { balance: usr.hive.hbd_balance }

    document.getElementById('hiveactions').firstElementChild.innerText = usr.hive.balance
    document.getElementById('hbdactions').firstElementChild.innerText = usr.hive.hbd_balance
    document.getElementById('savingsactions').firstElementChild.innerText = User.hive.savings_hbd_balance
    document.getElementById('govbal').innerText = `${parseFloat((User.dlux.gov)/ 1000).toFixed(3).commafy()} DLUXG`
    if(User.dlux.heldCollateral){
        document.getElementById('escrowbal').innerHTML = `(${parseFloat(User.dlux.heldCollateral / 1000).toFixed(3).commafy()} DLUXG)<a data-toggle="collapse" id="escrowtxbutton" href="#escrowtx" role="button" aria-expanded="false" aria-controls="collapse"><i class="fas fa-search ml-2"></i></a>`
    } else {
        document.getElementById('escrowbal').innerHTML = ``
    }
    document.getElementById('powerdluxamountlab').innerHTML = `Amount (Balance <a href="#" onClick="insertBal(parseFloat(parseInt(User.dlux.balance)/1000),'powerupdluxamount')">${parseFloat(parseInt(usr.dlux.balance)/1000).toFixed(3).commafy()} DLUX</a>):`
    document.getElementById('dluxactions').firstElementChild.innerText = `${parseFloat(parseInt(usr.dlux.balance)/1000).toFixed(3).commafy()} DLUX`
    document.getElementById('dluxpactions').firstElementChild.innerText = `${parseFloat(parseInt(usr.dlux.poweredUp)/1000).toFixed(3).commafy()} DLUX`
    document.getElementById('hivepactions').firstElementChild.innerText = parseFloat((parseFloat(usr.hstats.total_vesting_fund_hive) * parseFloat(usr.hive.vesting_shares)) / parseFloat(usr.hstats.total_vesting_shares)).toFixed(3).commafy() + ' HP'

    document.getElementById('hiveval').firstElementChild.innerText = `$${parseFloat((parseFloat(( parseFloat(usr.hstats.total_vesting_fund_hive) * parseFloat(usr.hive.vesting_shares)) / parseFloat(usr.hstats.total_vesting_shares)) + parseFloat(usr.hive.balance))*usr.price).toFixed(2)}`
    document.getElementById('dluxval').firstElementChild.innerText = `$${parseFloat(((parseInt(usr.dlux.balance) + parseInt(usr.dlux.gov) + parseInt(usr.dlux.poweredUp))/1000)*parseFloat(usr.dex.markets.hive.tick)*parseFloat(usr.price)).toFixed(2)}`
    document.getElementById('buylink').addEventListener("click", function() {
        User.opts.type = 'Buy'
        dexmodal("hive", "Buy");
    })

    User.dlux.nextVoteWeight = setVotePower(usr.dlux.poweredUp, usr.dlux.up, usr.dlux.down, usr.hive.voting_power, usr.hstats.head_block_number)
    document.getElementById('buyDluxTitle').innerText = 'Buy With:'
    document.getElementById('selllink').addEventListener("click", function() {
        User.opts.type = 'Sell'
        dexmodal("hive", "Sell");
    })

    //power down modal ops
    document.getElementById('dluxpowerdownModalButton').addEventListener("click", function() {
        document.getElementById('powerdowndluxsubmit').innerText = `Powerdown`
        document.getElementById('powerdownDluxTitle').innerText = `Power Down Tokens`
        var el = document.getElementById('powerdowndluxsubmit'),
            elClone = el.cloneNode(true);
            el.parentNode.replaceChild(elClone, el);
        document.getElementById('powerdowndluxsubmit').addEventListener('click', function (){
            powerDown('powerdowndluxamount', 'powerdowndluxto', 'powerdowndluxmemo')
        })
        document.getElementById('dluxamountlab').innerHTML = `Amount (Balance <a href="#" onClick="insertBal(parseFloat(User.dlux.poweredUp/1000),'powerdowndluxamount')">${parseFloat(parseInt(usr.dlux.poweredUp)/1000).toFixed(3).commafy()} DLUX</a>):`
    })

    document.getElementById('dluxgovdownModalButton').addEventListener("click", function() {
        document.getElementById('powerdownDluxTitle').innerText = `Unlock Governance Tokens`
        document.getElementById('powerdowndluxsubmit').innerText = `Unlock`
        var el = document.getElementById('powerdowndluxsubmit'), // should clone without event listeners 
            elClone = el.cloneNode(true);
            el.parentNode.replaceChild(elClone, el);
        document.getElementById('powerdowndluxsubmit').addEventListener('click', function (){
            govDown('powerdowndluxamount', 'powerdowndluxto', 'powerdowndluxmemo')
        })
        document.getElementById('dluxamountlab').innerHTML = `Amount (Balance <a href="#" onClick="insertBal(parseFloat(User.dlux.gov/1000),'powerdowndluxamount')">${parseFloat(parseInt(usr.dlux.gov)/1000).toFixed(3).commafy()} DLUX</a>):`
    })


    // lock gov tokens
    document.getElementById('freezedluxbutton').addEventListener("click", function() {
        document.getElementById('powerdluxsubmitbutton').addEventListener("click", function() {
            dluxgovup('powerupdluxamount')
        })
        document.getElementById('powerDluxTitle').innerText = `Lock DLUX for Governance Ops`
        document.getElementById('sendformunits').innerText = 'DLUX'
        document.getElementById('dluxamountlab').innerHTML = `Amount (Balance <a href="#" onClick="insertBal(parseFloat(User.dlux.balance/1000),'powerupdluxamount')">${parseFloat(parseInt(User.dlux.balance)/1000).toFixed(3).commafy()} DLUX</a>):`
        document.getElementById('powerupdluxamount').max = parseFloat(parseInt(User.dlux.balance) / 1000)
    })

    console.log('running check')
    document.getElementById('senddluxmodalbutton').addEventListener("click", function() {
        document.getElementById('sendmodalsend').addEventListener("click", function() {
            dluxsend('senddluxto', 'senddluxamount', 'senddluxmemo')
        })
        console.log('execution check')
        document.getElementById('sendDluxTitle').innerText = `Send DLUX`
        document.getElementById('sendformunits').innerText = 'DLUX'
        document.getElementById('senddluxamountlab').innerHTML = `Amount (Balance <a href="#" onClick="insertBal(parseFloat(User.dlux.balance/1000),'senddluxamount')">${parseFloat(User.dlux.balance/1000).toFixed(3).commafy()} DLUX</a>):`
        document.getElementById('senddluxamount').max = parseFloat(parseInt(User.dlux.balance) / 1000).toFixed(3).commafy()
    })
    document.getElementById('powerupdluxbutton').addEventListener("click", function() {
        document.getElementById('powerdluxsubmitbutton').addEventListener("click", function() {
            powerUp('powerupdluxamount', 'powerupdluxto', 'powerupdluxmemo')
        })
        $("#powerupdluxmemo").addClass("d-none");
        document.getElementById('powerDluxTitle').innerText = `Power Up DLUX`
        document.getElementById('sendformunits').innerText = 'DLUX'
        document.getElementById('powerdluxamountlab').innerHTML = `Amount (Balance <a href="#" onClick="insertBal(parseFloat(User.dlux.balance/1000),'powerupdluxamount')">${parseFloat(parseInt(User.dlux.balance)/1000).toFixed(3).commafy()} DLUX</a>):`
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
    document.getElementById('escrowtxbutton').addEventListener("click", function() {
        document.getElementById('escrowtx').innerHTML = `<hr class="my-2 bg-light">`
        let loading = document.createElement('p')
        loading.id = 'loadingtx'
        loading.innerText = `Retrieving orders.`
        document.getElementById('escrowtx').appendChild(loading)
        var myVar = setInterval(myTimer, 500);
        fetch('https://token.dlux.io/dex')
        .then(function(response) {
            return response.json();
        })
        .then(r => {
            for (type in r.markets){
                for( order in r.markets[type].sellOrders){
                    if(user == r.markets[type].sellOrders[order].agent){
                        let coll = document.createElement('p')
                        coll.innerText = `${parseFloat(r.markets[type].sellOrders[order].amount / 500).toFixed(3).commafy()} held to earn ${parseFloat(r.markets[type].sellOrders[order].amount * 0.000001).toFixed(3).commafy()} upon purchase of ${r.markets[type].sellOrders[order].txid} by ${r.markets[type].sellOrders[order].co}`
                        document.getElementById('escrowtx').appendChild(coll)
                    }
                    if(user == r.markets[type].sellOrders[order].tagent){
                        let coll = document.createElement('p')
                        coll.innerText = `${parseFloat(r.markets[type].sellOrders[order].amount / 500).toFixed(3).commafy()} held to earn ${parseFloat(r.markets[type].sellOrders[order].amount * 0.000001).toFixed(3).commafy()} upon purchase of ${r.markets[type].sellOrders[order].txid} by ${r.markets[type].sellOrders[order].co}`
                        document.getElementById('escrowtx').appendChild(coll)
                    }
                }
                for( order in r.markets[type].buyOrders){
                    if(user == r.markets[type].buyOrders[order].agent){
                        let coll = document.createElement('p')
                        coll.innerText = `${parseFloat(r.markets[type].buyOrders[order].amount / 500).toFixed(3).commafy()} held to earn ${parseFloat(r.markets[type].buyOrders[order].amount * 0.000001).toFixed(3).commafy()} upon purchase of ${r.markets[type].buyOrders[order].txid} by ${r.markets[type].buyOrders[order].eo}`
                        document.getElementById('escrowtx').appendChild(coll)
                    }
                    if(user == r.markets[type].buyOrders[order].tagent){
                        let coll = document.createElement('p')
                        coll.innerText = `${parseFloat(r.markets[type].buyOrders[order].amount / 500).toFixed(3).commafy()} held to earn ${parseFloat(r.markets[type].buyOrders[order].amount * 0.000001).toFixed(3).commafy()} upon purchase of ${r.markets[type].buyOrders[order].txid} by ${r.markets[type].buyOrders[order].eo}`
                        document.getElementById('escrowtx').appendChild(coll)
                    }
                }              
            }
            myStopFunction()
            document.getElementById('loadingtx').innerText = `Orders your node is facilitating:`
        })

        function myTimer() {
            document.getElementById("loadingtx").innerText += '.';
        }

        function myStopFunction() {
            clearInterval(myVar);
        } 
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

 function vote(author, permlink, weightid) {
     return new Promise((resolve, reject) => {
         var weight = parseInt(document.getElementById(weightid).value) * 100
         Dluxsession.hive_sign([user, [
                 ['vote', { voter:user, author, permlink, weight }]
             ], 'posting'])
             .then(r => {
                 resolve(r)
             })
             .catch(e => { reject(e) })
     });
 }

 function dluxsend(toid, amountid, memoid) {
    return new Promise((resolve, reject) => {
        var to = document.getElementById(toid).value,
            amount = parseInt(document.getElementById(amountid).value * 1000),
            memo = document.getElementById(memoid).value
        if (amount){
         checkAccount(to)
             .then(r => {
                 Dluxsession.hive_sign([user, [
                         ['custom_json', {
                             "required_auths": [user],
                             "required_posting_auths": [],
                             "id": "dlux_send",
                             "json": JSON.stringify({
                                 to,
                                 amount,
                                 memo
                             })
                         }]
                     ], 'active'])
                     .then(r => {
                         resolve(r)
                     })
                     .catch(e => { reject(e) })
             })
             .catch(e => { alert(e) })
        } else {
            alert('Please enter an amount to send.')
        }
    });
 }

 function reply(parent_author, parent_permlink, titleid, bodyid) {
     return new Promise((resolve, reject) => {
         var title = document.getElementById(titleid).value
         var body = document.getElementById(bodyid).value
         var author = sessionStorage.getItem('user')
         Dluxsession.hive_sign([author, [
                 ['comment', {
                     author,
                     title,
                     body,
                     parent_author,
                     parent_permlink,
                     permlink: 're_' + parent_permlink,
                     json_metadata: ""
                 }]
             ], 'posting'])
             .then(r => {
                 resolve(r)
             })
             .catch(e => { reject(e) })
     });
 }

 function setCookie(cname, cvalue, exdays) {
     var d = new Date();
     d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
     var expires = "expires=" + d.toUTCString();
     document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
 }

 function logout() {
     sessionStorage.clear()
     $('.active-session').addClass('d-none');
     $('.no-session').removeClass('d-none');
     user = ''
     User = ''
 }

 function loginDismiss() {
     $('.active-session').removeClass('d-none');
     $('.no-session').addClass('d-none');
     $('#loginModal').modal('hide');
     checkCookie();
 }

 function showProfileImage(responseAsBlob) {
     try {
         var container = document.getElementById('user-name');
         container.removeChild(container.childNodes[0])
         var imgElem = document.createElement('img');
         imgElem.width = "24"
         imgElem.height = "25"
         imgElem.class = "img-fluid bg-light rounded-circle"
         container.appendChild(imgElem);
         var imgUrl = URL.createObjectURL(responseAsBlob);
         imgElem.src = imgUrl;
     } catch (e) { console.log(e) }
 }

 function setdata(account) {
     try {
         document.getElementById('user-name').innerHTML = document.getElementById('user-name').innerHTML + ' @' + account

     } catch (e) { console.log(e) }
 }

 class Dluxsession {
     constructor(ip) {
         const opts = ip || {}
         this.email = opts.email || ''
         this.keychain = {
             installed: !!window.hive_keychain,
             active: false,
             posting: false,
             memo: false
         }
         this.hiveidip = ip.hiveidip
         this.hive = window.hive
         //this.account = opts.account
         this.hiveid = opts.hiveid || ''
         this.jwt = opts.jwt || ''
     }

     set account(obj) {
         return new Promise((r, e) => {
             if (obj !== null) {
                 setdata(obj.name)
                 this.metadata = JSON.parse(obj.json_metadata)
                 fetch(`/api/proxy?url=${this.metadata.profile.profile_image}`)
                     .then(validateResponse)
                     .then(readResponseAsBlob)
                     .then(showProfileImage)
                     .then(s => { r(s) })
                     .catch(err => {
                         console.log(err);
                         e(err)
                     });
             }
         });
     }

     set hiveidip(id) {
         var account = {},
             itr = {}
         return new Promise((resolve, reject) => {
             if (!user) {
                 console.log('Fresh login')
                 let ids = sessionStorage.getItem("user")
                 let idPromises = [Dluxsession.handshake(ids)]
                 Promise.all(idPromises)
                     .then(r => {
                         account = r[0].account
                         console.log(account)
                         let challengePromises = [Dluxsession.decode(ids, r[0].challenges[0])]
                         Promise.all(challengePromises)
                             .then(ret => {
                                 let itr = {}
                                 itr.jwt = ret[0]
                                 itr.user = ids
                                 itr.challenges = r[0].challenges
                                 itr.hiveid = ids
                                 let storables = ['email', 'hiveid', 'jwt', 'account']
                                 for (var i = 0; i < storables.length; i++) {
                                     console.log(itr[storables[i]])
                                     window.sessionStorage.setItem(storables[i], JSON.stringify(itr[storables[i]]))
                                 }
                                 loginDismiss()
                                 setCookie('user', itr.hiveid, 5)
                                 resolve(this.jwt)
                             })
                     })
             } else {
                 resolve(this.jwt)
             }
         });
     }

     static hive_sign(op) {
         return new Promise((resolve, reject) => {
             if (window.hive_keychain) {
                 try {
                     window.hive_keychain.requestBroadcast(op[0], op[1], op[2], function(response) {
                         console.log(response)
                         resolve(response)
                     });
                 } catch (e) {
                     reject(e)
                 }
             } else {
                 reject({ "error": "Hive Keychain is not installed." })
             }
         })
     }

     static handshake(id) {
         return new Promise((resolve, reject) => {
            let subid = id 
            if(subid.split('.')[1]){
                 subid.replace('.','-dot-')
             }
             fetch(`https://${subid}.ipfs.dlux.io/api/account/${id}`)
                 .then((response) => {
                     return response.json();
                 })
                 .then((myJson) => {
                     resolve(myJson)
                 })
                 .catch((error) => {
                     reject(error)
                 })
         });
     }

     static iam(id) {
         return new Promise((resolve, reject) => {
             this.hive.api.getAccounts([id], function(err, response) {
                 if (err) {
                     reject(err)
                 } else {
                     resolve(response)
                 }
             });
         });
     }

     static challengeMe(id) {
         return new Promise((resolve, reject) => {
             this.hive.api.getAccounts([id], function(err, response) {
                 if (err) {
                     reject(err)
                 } else {
                     resolve(response)
                 }
             });
         });
     }

     static decode(self, encoded) {
         return new Promise((resolve, reject) => {
             var jwt = ''
             if (window.hive_keychain) {
                 try {
                     window.hive_keychain.requestVerifyKey(self, encoded[0], encoded[1], function(response) {
                         console.log(response);
                         jwt = response.result.substring(1, response.result.length - 1)
                         resolve(jwt)
                     });
                 } catch (e) {
                     reject('plant')
                 }
             } else {
                 let key = prompt(`Enter @${this.name}'s memo private key`, '5blahlblah')
                 try {
                     jwt = this.hive.memo.decode(key, encoded[0])
                     resolve(jwt)
                 } catch (e) {
                     reject('food')
                 }
             }
         })
     }

     static encode(msg, to) {
         return new Promise((resolve, reject) => {
             let encoded = this.hive.memo.encode(this.account.memoKey, encoded);
         })
     }

 }

 function setVotePower(pow, upobj, downobj, vp, block) {
    console.log(pow, upobj, downobj, vp, block)
    let up, dp, hp
    if (!Object.keys(upobj).length) {
        upobj = {
            max: pow * 50,
            last: 0,
            power: pow * 50
        }
        downobj = {
            max: pow * 50,
            last: 0,
            power: pow * 50
        }
    }
    const newPower = downPowerMagic(upobj, downobj, block)
    console.log({ newPower })
    up = parseInt(newPower.up.power / newPower.up.max) * 100
    console.log({ up })
    dp = parseInt(newPower.down.power / newPower.down.max) * 100
    console.log({ dp })
    hp = parseInt(vp / 100)
    console.log({ hp })
    document.getElementById('upvotePower').style = `width: ${up}%`
    document.getElementById('downvotePower').style = `width: ${dp}%`
    document.getElementById('resourceCredits').style = `width: ${hp}%`
    document.getElementById('upvotePower')['aria-valuenow'] = `${up}`
    document.getElementById('downvotePower')['aria-valuenow'] = `${dp}`
    document.getElementById('resourceCredits')['aria-valuenow'] = `${hp}`
    document.getElementById('upvotePowerSpan').innerText = `${up}%`
    document.getElementById('downvotePowerSpan').innerText = `${dp}%`
    document.getElementById('resourceCreditsSpan').innerText = `${hp}%`
    return newPower.vote
}

function downPowerMagic(up, down, block_num) {
    const downHealTime = block_num - down.last //144000 blocks in 5 days
    const downHeal = parseInt(down.max * downHealTime / 144000)
    const weight = 10000
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
    //var bigSpender = false
    var vote = parseInt(newDownPower * weight / 500000) //5 from max AND 10000 from full weight
        //newDownPower -= downvote
    const newUp = {
        max: up.max,
        last: block_num,
        power: newPower
    }
    const newDown = {
        max: down.max,
        last: block_num,
        power: newDownPower
    }
    return { up: newUp, down: newDown, vote: vote }
}

function propCheck(user){
    return new Promise((resolve, reject)=>{
    var url171 = fetch("https://api.hive.blog", {
        body: "{\"jsonrpc\":\"2.0\", \"method\":\"condenser_api.list_proposal_votes\", \"params\":[[171], 1000, \"by_proposal_voter\", \"ascending\", \"active\"], \"id\":1}",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        method: "POST"
        })
    Promise.all([url171])
        .then(res=>Promise.all(res.map(res => res.json())))
        .then(r=>{
            var one71 = false
            for(i=0;i<r[0].result.length;i++){
                if(r[0].result[i].proposal.id != 171){
                    break;
                }
                if(r[0].result[i].voter == user){
                    one71 = true
                    break;
                }
            }
            resolve({one71})
        })
        .catch(e=>reject(e))
    });
}

String.prototype.commafy = function() {
    return this.replace(/(^|[^\w.])(\d{4,})/g, function($0, $1, $2) {
        return $1 + $2.replace(/\d(?=(?:\d\d\d)+(?!\d))/g, "$&,");
    });
};

Number.prototype.commafy = function() {
    return String(this).commafy();
};

function reqsign(op, req) { //requests keychain to sign and broadcast
    return new Promise((resolve, reject) => {
        Dluxsession.hive_sign([req[1],
                [op], req[0]
            ])
            .then(r => { resolve(r) })
            .catch(e => reject(e))
    })
}

function voteProp(props, user) {
    reqsign([
            "update_proposal_votes",
            {
                "voter": user,
                "proposal_ids": props,
                "approve": true
            }
        ], ['active', user])
        .then(r => { feedback(r) })
        .catch(e => { feedback(e) })
}