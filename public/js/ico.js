String.prototype.commafy = function() {
    return this.replace(/(^|[^\w.])(\d{4,})/g, function($0, $1, $2) {
        return $1 + $2.replace(/\d(?=(?:\d\d\d)+(?!\d))/g, "$&,");
    });
};

Number.prototype.commafy = function() {
    return String(this).commafy();
};

function icoPop(usr) {
    var urls = [`https://token.dlux.io/@ri`, 'https://token.dlux.io/stats'] //datasources
    let promises = urls.map(u => fetch(u))
    Promise.all(promises).then(res =>
        Promise.all(res.map(res => res.json()))
    ).then(jsons => {
        let availible = jsons[0].balance
        document.getElementById('icoTokensRemain').innerHTML = `<h3><span>${parseFloat(availible/1000).toFixed(3).commafy()} DLUX</span></h3><div><label>Tokens Available</label></div>`
        if (user) {
            document.getElementById('icoSendButton').addEventListener("click", function() {
                let hive_val = parseFloat(document.getElementById('hiveDonate').value).toFixed(3)
                Dluxsession.hive_sign([user, [
                        ['transfer', { to: 'robotolux', from: user, amount: `${hive_val} HIVE`, memo: '' }]
                    ], 'active']).then(r => {
                        console.log(`Sent ${ hive_val.toFixed(3) } HIVE to Robotolux for ICO`, r)
                    })
                    .catch(e => { console.log(e) })
            })
            document.getElementById('hiveDonate').max = parseFloat(usr.hive.balance).toFixed(3)
            document.getElementById('icoHiveBalance').innerHTML = `<center><small>Balance: <a href="#">${usr.hive.balance}</a></small></center>`
        } else {
            document.getElementById('icoHiveBalance').innerHTML = `<center><small>Login to donate</small></center>`
        }

        function updateTimer(blockNum) {
            let left = 30240 - ((blockNum - 19980) % 30240)
            let secs = (left % 20) * 3
            let mins = (left % 1200) / 20
            let hours = parseInt(left / 1200)
            if (secs < 10) {
                secs = '0' + secs
            } else {
                secs = `${secs}`
            }
            if (mins < 10) {
                mins = `0${mins}`
            } else {
                mins = `${mins}`
            }
            document.getElementById('icoHoursRemain').innerHTML = `<h3><span>${hours}:${mins}:${secs}</span></h3>
				<div>
					<label>Time Remaining</label>
                </div>` // (num - 20000) % 30240 === 0
            setTimeout(function() {
                updateTimer(blockNum++)
            }, 3000);
        }
        if (jsons[1].stats.icoRound) {
            updateTimer(jsons[1].realtime)
            document.getElementById('icoRound').innerText = `ROUND ${jsons[1].stats.icoRound}`
            document.getElementById('dluxForHive').innerText = `${parseFloat(jsons[1].stats.icoPrice/1000).toFixed(3)} DLUX for 1.000 HIVE`
            document.getElementById('icoTokensRemain').innerHTML = `<h3><span>${parseFloat(jsons[1].stats.icoPrice/1000).toFixed(3)} HIVE</span></h3>
				<div>
					<label>Current Price</label>
				</div>`
        }
        if (jsons[1].stats.outOnBlock) {
            document.getElementById('icoAuctionPanel').innerHTML = `
        <div id="icoHiveSpent" class="text-center market-info-item">
				<h3><span>1817.438 HIVE</span></h3>
				<div>
					<label>Donated This Round</label>
				</div>
			</div>
			<div class="text-center market-info-item"><h1>|</h1></div>
			<div id="icoDluxPool" class="text-center market-info-item">
				<h3><span>0 DLUX</span></h3>
				<div>
					<label>At Auction</label>
				</div>
			</div>
			<div class="text-center market-info-item"><h1>|</h1></div>
			<div id="icoFuturePrice" class="text-center market-info-item">
				<h3><span>1.000 HIVE</span></h3>
				<div>
					<label>Next Round Price</label>
				</div>
			</div>
        `
        } else {
            document.getElementById('icoAuctionPanel').innerHTML = ``
            node = document.getElementById('auctionSpacer')
            if (node.parentNode) {
                node.parentNode.removeChild(node);
            }
        }

    }).catch(e => console.log(e))
}
/* For auction panel reference
if (bals.ri == 0) {
                                        stats.tokenSupply += 100000000
                                        bals.ri = 100000000
                                        var ago = num - stats.outOnBlock,
                                            dil = ' seconds'
                                        if (ago !== num) {
                                            bals.rl = parseInt(ago / 30240 * 50000000)
                                            bals.ri = 100000000 - parseInt(ago / 30240 * 50000000)
                                            stats.icoPrice = stats.icoPrice * (1 + (ago / 30240) / 2)
                                        }
                                        if (ago > 20) {
                                            dil = ' minutes';
                                            ago = parseFloat(ago / 20)
                                                .toFixed(1)
                                        } else {
                                            ago = ago * 3
                                        }
                                        if (ago > 60) {
                                            dil = ' hours';
                                            ago = parseFloat(ago / 60)
                                                .toFixed(1)
                                        }
                                        post = post + `### We sold out ${ago}${dil}!\nThere are now ${parseFloat(bals.ri/1000).toFixed(3)} ${config.TOKEN} for sale from @${config.mainICO} for ${parseFloat(stats.icoPrice/1000).toFixed(3)} HIVE each.\n`
                                    } else {
                                        var left = bals.ri
                                        stats.tokenSupply += 100000000 - left
                                        bals.ri = 100000000
                                        stats.icoPrice = stats.icoPrice - (left / 1000000000)
                                        if (stats.icoPrice < 1000) stats.icoPrice = 1000 //price floor
                                        post = post + `### We Sold out ${100000000 - left} today.\nThere are now ${parseFloat(bals.ri/1000).toFixed(3)} ${config.TOKEN} for sale from @${config.mainICO} for ${parseFloat(stats.icoPrice/1000).toFixed(3)} HIVE each.\n`
                                    }
*/