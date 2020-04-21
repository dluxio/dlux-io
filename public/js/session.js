 function validateResponse(response) {
     if (!response.ok) {
         throw Error(response.statusText);
     }
     return response;
 }

 function feedback(r) {
     console.log(r)
 }

 function readResponseAsBlob(response) {
     return response.blob();
 }
 var user, dlux, User = { dlux: {}, hive: {}, dex: {}, stats: {}, opts: { to: 0, agent: 0, fee: '0.000 STEEM', dfee: 0, type: 'Buy' } }

 function checkCookie() {
     console.log('Checking for login')
     user = sessionStorage.getItem('user');
     console.log('user=' + user)
     if (user != null) {
         let account = sessionStorage.getItem('account')
         if (account != 'undefined') {
             console.log(account)
             dlux = new Dluxsession(steem, { steemid: user, account });
         } else {
             dlux = new Dluxsession(steem, { steemidip: user });
         }
         document.getElementById('no-session').style.display = 'none';
         document.getElementById('active-session').style.display = 'block';
         document.getElementById('userImage').src = 'https://token.dlux.io/getauthorpic/' + user
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
             User.stats = jsons[2]
             User.price = jsons[3].hive.usd
             User.hstats = jsons[4].result
             User.hive = jsons[5].result[0]
             try { pageSpecfic(User); } catch (e) {}
         })
     } else {
         document.getElementById('active-session').style.display = 'none';
     }
 }

 function vote(author, permlink, weightid) {
     return new Promise((resolve, reject) => {
         var weight = parseInt(document.getElementById(weightid).value) * 100
         Dluxsession.hive_sign([user, [
                 ['vote', { voter, author, permlink, weight }]
             ], 'posting'])
             .then(r => {
                 resolve(r)
             })
             .catch(e => { reject(e) })
     });
 }

 function dluxvote(author, permlink, weightid) {
     return new Promise((resolve, reject) => {
         var weight = parseInt(document.getElementById(weightid).value) * 100
         Dluxsession.hive_sign([user, [
                 ['custom_json', {
                     "required_auths": [],
                     "required_posting_auths": [user],
                     "id": "dlux_vote_content",
                     "json": JSON.stringify({
                         author,
                         permlink,
                         weight
                     })
                 }]
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
     document.getElementById('active-session').style.display = 'none';
     document.getElementById('no-session').style.display = 'block';
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
     constructor(steemClient, ip) {
         const opts = ip || {}
         this.email = opts.email || ''
         this.keychain = {
             installed: !!window.hive_keychain,
             active: false,
             posting: false,
             memo: false
         }
         this.steemidip = ip.steemidip
         this.steem = steemClient
         this.account = opts.account
         this.steemid = opts.steemid || ''
         this.jwt = opts.jwt || ''
     }

     set account(obj) {
         return new Promise((r, e) => {
             if (obj !== undefined) {
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

     set steemidip(id) {
         var account = {},
             itr = {}
         return new Promise((resolve, reject) => {
             if (window.location.pathname.substr(0, 6) === '/login') {
                 console.log('why')
                 let idPromises = [Dluxsession.handshake(id)]
                 Promise.all(idPromises)
                     .then(r => {
                         account = r[0].account
                         console.log(account)
                         let challengePromises = [Dluxsession.decode(id, r[0].challenges[0])]
                         Promise.all(challengePromises)
                             .then(ret => {
                                 let itr = {}
                                 itr.jwt = ret[0]
                                 itr.user = id
                                 itr.challenges = r[0].challenges
                                 itr.steemid = id
                                 let storables = ['email', 'steemid', 'jwt', 'account']
                                 for (var i = 0; i < storables.length; i++) {
                                     console.log(itr[storables[i]])
                                     window.sessionStorage.setItem(storables[i], JSON.stringify(itr[storables[i]]))
                                 }
                                 setCookie('user', itr.steemid, 5)
                                 if (window.location.pathname.substr(0, 6) === '/login') {
                                     // url param for return to url
                                     window.location = 'https://' + window.location.host
                                 }
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
             fetch(`/api/account/${id}`)
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
             this.steem.api.getAccounts([id], function(err, response) {
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
             this.steem.api.getAccounts([id], function(err, response) {
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
                     jwt = this.steem.memo.decode(key, encoded[0])
                     resolve(jwt)
                 } catch (e) {
                     reject('food')
                 }
             }
         })
     }

     static encode(msg, to) {
         return new Promise((resolve, reject) => {
             let encoded = this.steem.memo.encode(this.account.memoKey, encoded);
         })
     }

 }