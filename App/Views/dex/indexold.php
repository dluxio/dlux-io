<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - DEX</title>
<?php include '../mod/header.php';?>
<!--page specific-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>	
<script type="text/javascript">
       /*
        MIT License
  
        Copyright (c) 2018 Steven Ettinger | @dlux-io
  
        Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
  
        The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
  
        THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
        */
        var postKey; //this page will be posted in IPFS and will need a way to display current state about itself. This key will be passed to declare its current state on Hive.
        var permlink, author

        //API for hive and dlux
        var iam = "Init", bal = 0, hivebal = 0, hbdbal = 0, hiveHis = [], hiveTick, hbdHis = [], hbdTick, contracts, opts = {to:'inconceivable', agent: 'heyhey', fee: '0.000 STEEM', expire_time: 120}
 
	function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
        function iAm(message) { //This is the unsecure identifier that returns logged in hive user
            iam = message;
            fetch(`https://token.dlux.io/@${iam}`)
                .then(function (response) {
                    return response.json();
                })
                .then(function (myJson) {
                    var balDiv = document.getElementsByClassName('balance')
                    bal = myJson.balance
                    var balf = parseFloat(myJson.balance / 1000).toFixed(3)
                    balDiv[0].innerHTML = `<h4>Balance: ${balf} DLUX</h4>`
                    balDiv[1].innerHTML = `<h4>Balance: ${balf} DLUX</h4>`
                    document.getElementById('sellqtyhbd').value = parseFloat(balf).toFixed(3)
                    document.getElementById('sellqtyhive').value = parseFloat(balf).toFixed(3)
                    fetch("https://anyx.io", {
                        body: `{\"jsonrpc\":\"2.0\", \"method\":\"database_api.find_accounts\", \"params\": {\"accounts\":[\"${iam}\"]}, \"id\":1}`,
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        method: "POST"
                    }).then(res => res.json()
                    ).then(json => {
                        const res = json.result.accounts[0]
                        console.log(res)
                        hivebal = res.balance.amount
                        hbdbal = res.sbd_balance.amount
                        document.getElementsByClassName('text-center text-secondary')[0].innerHTML = `BALANCE: ${parseFloat(res.balance.amount / 1000).toFixed(3)} HIVE`
                        document.getElementsByClassName('text-center text-secondary')[1].innerHTML = `BALANCE: ${parseFloat(res.balance.amount / 1000).toFixed(3)} HIVE`
                        document.getElementById('buytotalhive').value = parseFloat(hivebal / 1000).toFixed(3)
                        document.getElementById('buytotalhbd').value = parseFloat(hbdbal / 1000).toFixed(3)
                        document.getElementsByClassName('text-center text-secondary')[2].innerHTML = `BALANCE: ${parseFloat(res.sbd_balance.amount / 1000).toFixed(3)} HBD`
                        document.getElementsByClassName('text-center text-secondary')[3].innerHTML = `BALANCE: ${parseFloat(res.sbd_balance.amount / 1000).toFixed(3)} HBD`
                    })
                });
        }
        function reqsign(op, req) { //requests keychain to sign and broadcast
            return new Promise ((resolve, reject) => {
	    	Dluxsession.hive_sign([req[1],[op], req[0]])
	    })
        }	
</script>
</head>

<body class="d-flex flex-column h-100 text-white">
<?php include '../mod/nav.php';?>
<main role="main" class="flex-shrink-0 padme-t70">
<div class="container">
	
<div class="alert alert-danger alert-dismissible text-center">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <a href="#" class="alert-link">The dlux DEX is under construction. Have a look around and let us know what you think!</a>
</div>
      <div>
            <ul id="pagenav" class="nav nav-pills justify-content-center" role="tablist">
                <li class="nav-item"> <a class="nav-link active" href="#info" id="infotab" role="tab" data-toggle="tab"
                        aria-controls="info" aria-expanded="true">INFO</a></li>
                <li class="nav-item"> <a class="nav-link" href="#hive" id="hivetab" role="tab"
                        data-toggle="tab" aria-controls="hive" aria-expanded="true">HIVE</a></li>
                <li class="nav-item"> <a class="nav-link" href="#hbd" role="tab" id="hbdtab" data-toggle="tab"
                        aria-controls="hbd">HBD</a></li>
                <li class="nav-item"> <a class="nav-link" href="#ticker" role="tab" id="tickertab" data-toggle="tab"
                        aria-controls="ticker">FEED</a></li>
            </ul>
            <!-- Content Panel -->
            <div id="pagecontent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade show active" id="info" aria-labelledby="infotab">
                    <div class="container my-5">
						
				<div class="row">
					<div class="col-12 jumbotron bg-darker">
              <h1 class="display-4">Goodbye Centralization, Hello DEX</h1>
                            <p class="lead ">The dlux DEX (Decentralized Exchange) offers no information asymetry or central control</p>
                            <hr class="my-4 bg-light">
						<p>DLUX has pioneered a method to cooperate via HIVE and provide liquidity while being decentralized in every sense of the word: Open source and self-incentivizing, holding it's own keys collectively between it's users.</p>
					</div>
						</div>
						
						<div class="row">
							
					<div class="col-6">
						<p class="lead">What to expect when using the exchange</p>
				<p> Exchanges are atomic swaps, which means these are smart contracts with crypto that you can buy for exactly the listed price. This exchange will over collateralize escrow transactions and pay for these transactions upon completion from an inflationary source.</p>
						<div class="text-center">	
						<a class="btn btn-outline-light m-3" href="#">Start Trading</a>
							</div>
							</div>
							<div class="col-6">graphic here</div>
						</div>
						
						<div class="row">
							<div class="col-6">graphic here</div>
							<div class="col-6">
								<p class="lead">Preventing double spend on the network</p>
				<p>The last irreversible block is used to verify transactions. What this means is your account may not be credited with the hive amount until about 2-3 minutes from purchase time. Trust metrics will be maintained, fees and minimums may be enforced by some nodes depending on volume conditions. Our visionaries will get to choose which accounts are entrusted with their escrow transactions.</p>
								<div class="text-center">	
						<a class="btn btn-outline-light m-3" href="#">Read FAQ</a>
							</div>
							</div></div>
						
							<div class="row">
								<div class="col-6">
									<p class="lead">Introducing the DLUX node network</p>
				<p>In addition to maintaining consensus about the dlux token balances, it maintains consensus about external data using nodes as oracles. The most trusted nodes are elected to hold a portion of the owner authority of a community controlled account to provide for escrow services for markets such as Account Creation Tokens and IPFS content pinning.</p>
				<div class="text-center">	
						<a class="btn btn-outline-light m-3" href="#">Run A Node</a>
							</div>
								</div>
								<div class="col-6">graphic here</div>
								</div>
						
			    
                        </div>
                    </div>
             
                <div role="tabpanel" class="tab-pane fade show" id="hive" aria-labelledby="hivetab">
                    <div class="container-fluid" style="padding:0">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="price-info">
                                    <canvas id="historicpricehive" height="250" class="price-chart"></canvas>
                                    <div class="d-flex justify-content-center">
                                        <div class="btn-group btn-group-toggle set-timescale" data-toggle="buttons">
                                            <label class="btn btn-primary active">
                                                <input type="radio" name="options" id="hourhive" autocomplete="off"
                                                    checked> 1H
                                            </label>
                                            <label class="btn btn-primary">
                                                <input type="radio" name="options" id="dayhive" autocomplete="off"> 1D
                                            </label>
                                            <label class="btn btn-primary">
                                                <input type="radio" name="options" id="weekhive" autocomplete="off"> 1W
                                            </label>
                                            <label class="btn btn-primary">
                                                <input type="radio" name="options" id="monthhive" autocomplete="off">
                                                1M
                                            </label>
                                            <label class="btn btn-primary">
                                                <input type="radio" name="options" id="yearhive" autocomplete="off"> 1Y
                                            </label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="text-center market-info-item">
                                            <h3><span>$125.1K</span></h3>
                                            <div>
                                                <label>Market Cap</label>
                                            </div>
                                        </div>
                                        <div class="text-center market-info-item">
                                            <h1>|</h1>
                                        </div>
                                        <div class="text-center market-info-item">
                                            <h3><span>6M DLUX</span></h3>
                                            <div>
                                                <label>Supply</label>
                                            </div>
                                        </div>
                                        <div class="text-center market-info-item">
                                            <h1>|</h1>
                                        </div>
                                        <div class="text-center market-info-item">
                                            <h3><span>$1.3K</span></h3>
                                            <div>
                                                <label>Volume</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="balance">
                                        <h4>BAL: 62382 DLUX</h4>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-4">
                                <div>
                                    <div class="widget">
                                        <ul id="orderwidget" class="nav nav-pills justify-content-center"
                                            role="tablist">
                                            <li class="nav-item"> <a class="nav-link active" href="#buyhive"
                                                    id="buytabhive" role="tab" data-toggle="tab"
                                                    aria-controls="buyhive" aria-expanded="true">Buy DLUX</a></li>
                                            <li class="nav-item"> <a class="nav-link" href="#sellhive" role="tab"
                                                    id="selltabhive" data-toggle="tab" aria-controls="sellhive">Sell
                                                    DLUX</a></li>
                                        </ul>
                                        <!-- Content Panel -->
                                        <div id="orderformhive" class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade show active" id="buyhive"
                                                aria-labelledby="buytabhive">
                                                <form>
                                                    <div class="form-group" style="padding-top: 10px">
                                                        <label for="inputbuypricehive">Exchange Rate</label>
                                                        <input class="form-control" id="buypricehive"
                                                            placeholder="Amount in HIVE">
                                                        <div class="text-center" style="padding-top: 10px">
                                                            <button type="button"
                                                                class="btn btn-outline-primary btn-sm">Lowest
                                                                Ask</button>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputbuyqtyhive">DLUX</label>
                                                        <input type="number" min="0.001" step="0.001"
                                                            class="form-control" id="buyqtyhive"
                                                            placeholder="How many">
                                                        <div class="text-center" style="padding-top: 10px">
                                                            <button type="button"
                                                                class="btn btn-outline-primary btn-sm">Max</button>
                                                            <button type="button"
                                                                class="btn btn-outline-primary btn-sm">1/2</button>
                                                            <button type="button"
                                                                class="btn btn-outline-primary btn-sm">1/4</button>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputbuytotalhive">Hive</label>
                                                        <input type="number" min="0.001" step="0.001"
                                                            class="form-control" id="buytotalhive"
                                                            placeholder="Order total">
                                                        <div class="text-center text-secondary"
                                                            style="padding-top: 10px">HIVE BALANCE</div>
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="button" class="btn btn-outline-success"
                                                            onclick="placeHiveBuy()">Place Buy Order</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="sellhive"
                                                aria-labelledby="selltabhive">
                                                <form>
                                                    <div class="form-group" style="padding-top: 10px">
                                                        <label for="inputsellpricehive">Ask Price</label>
                                                        <input class="form-control" id="sellpricehive"
                                                            placeholder="Amount in HIVE">
                                                        <div class="text-center" style="padding-top: 10px">
                                                            <button type="button"
                                                                class="btn btn-outline-primary btn-sm">Highest
                                                                Bid</button>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputsellqtyhive">Qty.</label>
                                                        <input type="number" min="0.001" step="0.001"
                                                            class="form-control" id="sellqtyhive"
                                                            placeholder="How many">
                                                        <div class="text-center" style="padding-top: 10px">
                                                            <button type="button"
                                                                class="btn btn-outline-primary btn-sm">Max</button>
                                                            <button type="button"
                                                                class="btn btn-outline-primary btn-sm">1/2</button>
                                                            <button type="button"
                                                                class="btn btn-outline-primary btn-sm">1/4</button>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputselltotalhive">Total</label>
                                                        <input type="number" min="0.001" step="0.001"
                                                            class="form-control" id="selltotalhive"
                                                            placeholder="Order total">
                                                        <div class="text-center text-secondary"
                                                            style="padding-top: 10px">HIVE BALANCE</div>
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="button" class="btn btn-outline-danger"
                                                            onclick="placeHiveAsk()">Place Sell Order</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <canvas id="marketordershive" height="125" class="orderbook-chart"></canvas>
                                <div class="container orderbook-table">
                                    <div class="row text-center">
                                        <div class="col-lg-6">
                                            <h5 style="padding-top: 10px">BUY ORDERS</h5>
                                            <table width="100%">
                                                <tbody>
                                                    <tr>
                                                        <th scope="col">TOTAL</th>
                                                        <th scope="col">QTY</th>
                                                        <th scope="col">BID</th>
                                                        <th scope="col">&nbsp;</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-lg-6">
                                            <h5 style="padding-top: 10px">SELL ORDERS</h5>
                                            <table width="100%">
                                                <tbody>
                                                    <tr>
                                                        <th scope="col">TOTAL</th>
                                                        <th scope="col">QTY</th>
                                                        <th scope="col">ASK</th>
                                                        <th scope="col">&nbsp;</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 text-center mt-4">

                                <div class="history">
                                    <div>&nbsp;</div>
                                    <h5>TRADE HISTORY</h5>



                                    <table width="100%" class="history-table">
                                        <tbody>
                                            <tr>
                                                <th scope="col">DATE</th>
                                                <th scope="col">PRICE</th>
                                                <th scope="col">QTY</th>
                                                <th scope="col">TOTAL</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="hbd" aria-labelledby="hbdtab">
                    <div class="container-fluid" style="padding:0">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="price-info">
                                    <canvas id="historicpricehbd" class="price-chart"
                                        style="height:250px !important;"></canvas>
                                    <div class="d-flex justify-content-center">
                                        <div class="btn-group btn-group-toggle set-timescale" data-toggle="buttons">
                                            <label class="btn btn-primary active">
                                                <input type="radio" name="options" id="hourhbd" autocomplete="off"
                                                    checked> 1H
                                            </label>
                                            <label class="btn btn-primary">
                                                <input type="radio" name="options" id="dayhbd" autocomplete="off"> 1D
                                            </label>
                                            <label class="btn btn-primary">
                                                <input type="radio" name="options" id="weekhbd" autocomplete="off"> 1W
                                            </label>
                                            <label class="btn btn-primary">
                                                <input type="radio" name="options" id="monthhbd" autocomplete="off"> 1M
                                            </label>
                                            <label class="btn btn-primary">
                                                <input type="radio" name="options" id="yearhbd" autocomplete="off"> 1Y
                                            </label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="text-center market-info-item">
                                            <h3><span>$125.1K</span></h3>
                                            <div>
                                                <label>Market Cap</label>
                                            </div>
                                        </div>
                                        <div class="text-center market-info-item">
                                            <h1>|</h1>
                                        </div>
                                        <div class="text-center market-info-item">
                                            <h3><span>6M DLUX</span></h3>
                                            <div>
                                                <label>Supply</label>
                                            </div>
                                        </div>
                                        <div class="text-center market-info-item">
                                            <h1>|</h1>
                                        </div>
                                        <div class="text-center market-info-item">
                                            <h3><span>$1.3K</span></h3>
                                            <div>
                                                <label>Volume</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="balance">
                                        <h4>DLUX BALANCE</h4>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-4">
                                <div>
                                    <div class="widget">
                                        <ul id="orderwidgethbd" class="nav nav-pills justify-content-center"
                                            role="tablist">
                                            <li class="nav-item"> <a class="nav-link active" href="#buyhbd"
                                                    id="buytabhbd" role="tab" data-toggle="tab" aria-controls="buy"
                                                    aria-expanded="true">Buy DLUX</a></li>
                                            <li class="nav-item"> <a class="nav-link" href="#sellhbd" role="tab"
                                                    id="selltabhbd" data-toggle="tab" aria-controls="sell">Sell DLUX</a>
                                            </li>
                                        </ul>
                                        <!-- Content Panel -->
                                        <div id="orderformhbd" class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade show active" id="buyhbd"
                                                aria-labelledby="buytabhbd">
                                                <form>
                                                    <div class="form-group" style="padding-top: 10px">
                                                        <label for="inputbuypricehbd">Exchange Rate</label>
                                                        <input class="form-control" id="buypricehbd"
                                                            placeholder="Amount in HBD">
                                                        <div class="text-center" style="padding-top: 10px">
                                                            <button type="button"
                                                                class="btn btn-outline-primary btn-sm">Lowest
                                                                Ask</button>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputbuyqtyhbd">DLUX</label>
                                                        <input type="number" min="0.001" step="0.001"
                                                            class="form-control" id="buyqtyhbd" placeholder="How many">
                                                        <div class="text-center" style="padding-top: 10px">
                                                            <button type="button"
                                                                class="btn btn-outline-primary btn-sm">Max</button>
                                                            <button type="button"
                                                                class="btn btn-outline-primary btn-sm">1/2</button>
                                                            <button type="button"
                                                                class="btn btn-outline-primary btn-sm">1/4</button>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputbuytotalhbd">HBD</label>
                                                        <input type="number" min="0.001" step="0.001"
                                                            class="form-control" id="buytotalhbd"
                                                            placeholder="Order total">
                                                        <div class="text-center text-secondary"
                                                            style="padding-top: 10px">HBD BALANCE</div>
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="button" class="btn btn-outline-success"
                                                            onclick="placeHbdBuy()">Place Buy Order</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="sellhbd"
                                                aria-labelledby="selltabhbd">
                                                <form>
                                                    <div class="form-group" style="padding-top: 10px">
                                                        <label for="inputsellpricehbd">Ask Price</label>
                                                        <input class="form-control" id="sellpricehbd"
                                                            placeholder="Amount in HBD">
                                                        <div class="text-center" style="padding-top: 10px">
                                                            <button type="button"
                                                                class="btn btn-outline-primary btn-sm">Highest
                                                                Bid</button>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputsellqtyhbd">Qty.</label>
                                                        <input type="number" min="0.001" step="0.001"
                                                            class="form-control" id="sellqtyhbd" placeholder="How many">
                                                        <div class="text-center" style="padding-top: 10px">
                                                            <button type="button"
                                                                class="btn btn-outline-primary btn-sm">Max</button>
                                                            <button type="button"
                                                                class="btn btn-outline-primary btn-sm">1/2</button>
                                                            <button type="button"
                                                                class="btn btn-outline-primary btn-sm">1/4</button>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputselltotalhbd">Total</label>
                                                        <input type="number" min="0.001" step="0.001"
                                                            class="form-control" id="selltotalhbd"
                                                            placeholder="Order total">
                                                        <div class="text-center text-secondary"
                                                            style="padding-top: 10px">HBD BALANCE</div>
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="button" class="btn btn-outline-danger"
                                                            onclick="placeHbdAsk()">Place Sell Order</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <canvas id="marketordershbd" height="125" class="orderbook-chart"></canvas>
                                <div class="container orderbook-table">
                                    <div class="row text-center">
                                        <div class="col-lg-6">
                                            <h5 style="padding-top: 10px">BUY ORDERS</h5>
                                            <table width="100%">
                                                <tbody>
                                                    <tr>
                                                        <th scope="col">TOTAL</th>
                                                        <th scope="col">QTY</th>
                                                        <th scope="col">BID</th>
                                                        <th scope="col">&nbsp;</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-lg-6">
                                            <h5 style="padding-top: 10px">SELL ORDERS</h5>
                                            <table width="100%">
                                                <tbody>
                                                    <tr>
                                                        <th scope="col">TOTAL</th>
                                                        <th scope="col">QTY</th>
                                                        <th scope="col">ASK</th>
                                                        <th scope="col">&nbsp;</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 text-center">
                                <h5 style="padding-top: 40px">TRADE HISTORY</h5>
                                <div class="history">

                                    <table width="100%" class="history-table">
                                        <tbody>
                                            <tr>
                                                <th scope="col">DATE</th>
                                                <th scope="col">PRICE</th>
                                                <th scope="col">QTY</th>
                                                <th scope="col">TOTAL</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div role="tabpanel" class="tab-pane fade" id="ticker" aria-labelledby="tickertab">
                    <div class="container-fluid" style="padding:0">
                        <div class="col-lg-12 text-center" style="padding: 0">
                            <h5 style="padding-top: 40px">DLUX TRANSACTION FEED</h5>
                            <div class="feed">

                                <table width="100%" class="feed-table">
                                    <tbody>
                                        <tr>
                                            <th scope="col">BLOCK</th>
                                            <th scope="col">USER</th>
                                            <th scope="col">ACTION</th>
                                            <th scope="col">TXID</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include '../mod/footer.php';?>

<script>

        var historicPriceHive = document.getElementById('historicpricehive').getContext('2d');

        // Global Options
        Chart.defaults.global.defaultFontFamily = 'Helvetica';
        Chart.defaults.global.defaultFontSize = 18;
        Chart.defaults.global.defaultFontColor = '#FFF';

        var priceChartHive = new Chart(historicPriceHive, {
            type: 'bubble',
            data: {
                labels: "History",
                datasets: []
            },
            options: {
                title: {
                    display: true,
                    text: ''
                }, scales: {
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: "Price",
                            min: 0
                        }
                    }],
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: "Time",
                            min: 31900000
                        }
                    }]
                }
            }
        });


        var marketOrdersHive = document.getElementById('marketordershive').getContext('2d');
        var gradientGrnHive = marketOrdersHive.createLinearGradient(0, 0, 0, 400);
        gradientGrnHive.addColorStop(0, 'rgba(90, 216, 154, 1)');
        gradientGrnHive.addColorStop(1, 'rgba(90, 216, 154, 0)');

        var gradientRedHive = marketOrdersHive.createLinearGradient(0, 0, 0, 400);
        gradientRedHive.addColorStop(0, 'rgba(226, 94, 94, 1)');
        gradientRedHive.addColorStop(1, 'rgba(226, 94, 94, 0)');

        var buySellChartHive = new Chart(marketOrdersHive, {
            type: 'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data: {
                datasets: [{
                    data: [
                    ],
                    backgroundColor: '#C02525',
                    hoverBorderWidth: 2,
                    steppedLine: true,
                    hoverBorderColor: '#FFCE00'
                }, {
                    data: [
                    ],
                    backgroundColor: '#25C025',
                    hoverBorderWidth: 2,
                    steppedLine: true,
                    hoverBorderColor: '#FFCE00'
                }]
            },
            options: {
                responsive: false,
                title: {
                    display: true,
                    text: 'DLUX-HIVE ORDER BOOK',
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
                        left: 10,
                        right: 10,
                        bottom: 10,
                        top: 10
                    }
                },
                tooltips: {
                    enabled: true
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            display: true //removes the label
                        },
                        gridLines: {

                            labelString: "Price",
                        }
                    }],
                    yAxes: [{
                        stacked: true,
                        type: 'linear',
                        ticks: {
                            display: true, //removes the label

                            labelString: "Volume",
                        },
                        gridLines: {
                            display: false
                        }
                    }]
                }

            }
        });
        var historicPriceHbd = document.getElementById('historicpricehbd').getContext('2d');

        var priceChartHbd = new Chart(historicPriceHbd, {
            type: 'bubble',
            data: {
                labels: "History",
                datasets: []
            },
            options: {
                title: {
                    display: true,
                    text: ''
                }, scales: {
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: "Price",
                            min: 0
                        }
                    }],
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: "Time",
                            min: 31900000
                        }
                    }]
                }
            }
        });

        var marketOrdersHbd = document.getElementById('marketordershbd').getContext('2d');

        var gradientGrnHbd = marketOrdersHbd.createLinearGradient(0, 0, 0, 400);
        gradientGrnHbd.addColorStop(0, 'rgba(90, 216, 154, 1)');
        gradientGrnHbd.addColorStop(1, 'rgba(90, 216, 154, 0)');

        var gradientRedHbd = marketOrdersHbd.createLinearGradient(0, 0, 0, 400);
        gradientRedHbd.addColorStop(0, 'rgba(226, 94, 94, 1)');
        gradientRedHbd.addColorStop(1, 'rgba(226, 94, 94, 0)');
        var buySellChartHbd = new Chart(marketOrdersHbd, {
            type: 'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data: {
                datasets: [{
                    label: 'Bids',
                    data: [
                    ],
                    backgroundColor: [gradientGrnHive, gradientGrnHive, gradientGrnHive, gradientRedHive, gradientRedHive, gradientRedHive],
                    hoverBackgroundColor: [gradientGrnHive, gradientGrnHive, gradientGrnHive, gradientRedHive, gradientRedHive, gradientRedHive],
                    hoverBorderWidth: 2,
                    steppedLine: true,
                    hoverBorderColor: '#FFCE00'
                }, {
                    label: 'Asks',
                    data: [
                    ],
                    backgroundColor: [gradientGrnHive, gradientGrnHive, gradientGrnHive, gradientRedHive, gradientRedHive, gradientRedHive],
                    hoverBackgroundColor: [gradientGrnHive, gradientGrnHive, gradientGrnHive, gradientRedHive, gradientRedHive, gradientRedHive],
                    hoverBorderWidth: 2,
                    steppedLine: true,
                    hoverBorderColor: '#FFCE00'
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'DLUX-HIVE ORDER BOOK',
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
                            display: true //removes the label
                        },
                        gridLines: {
                            display: false,

                            labelString: "Price",
                        }
                    }],
                    yAxes: [{
                        stacked: true,
                        ticks: {
                            display: true, //removes the label
                            labelString: "Volume",
                        },
                        gridLines: {
                            display: false
                        }
                    }]
                }

            }
        });
        //onpageloaded()
        let dex, stats, hive, feed
        var urls = ['https://token.dlux.io/stats', 'https://token.dlux.io/dex', 'https://token.dlux.io/feed']
        Promise.all(urls.map(u => fetch(u))).then(res =>
            Promise.all(res.map(res => res.json()))
        ).then(jsons => {
            dex = jsons[1]
            stats = jsons[0]
            feed = jsons[2].feed
            start()
        })

        function fillInDlux(rateID, dluxID, amountID) {
            if (parseFloat(document.getElementById('buytotalhive').value) * 1000 > hivebal) { document.getElementById('buytotalhive').value = parseFloat(hivebal / 1000).toFixed(3) }
            if (parseFloat(document.getElementById('buytotalhbd').value) * 1000 > hbdbal) { document.getElementById('buytotalhbd').value = parseFloat(hbdbal.amount / 1000).toFixed(3) }
            if (parseFloat(document.getElementById('buyqtyhbd').value) * 1000 > bal) { document.getElementById('sellqtyhbd').value = parseFloat(bal).toFixed(3) }
            if (parseFloat(document.getElementById('buyqtyhive').value) * 1000 > bal) { document.getElementById('sellqtyhive').value = parseFloat(bal).toFixed(3) }
            document.getElementById(dluxID).value = parseFloat(parseFloat(document.getElementById(amountID).value) / parseFloat(document.getElementById(rateID).value)).toFixed(3)
        }
        function adjustAmount(amount, rateID, dluxID, amountID) {
            document.getElementById(dluxID).value = parseFloat(amount / 1000).toFixed(3)
            if (parseFloat(document.getElementById('buytotalhive').value) * 1000 > hivebal) { document.getElementById('buytotalhive').value = parseFloat(hivebal / 1000).toFixed(3) }
            if (parseFloat(document.getElementById('buytotalhbd').value) * 1000 > hbdbal) { document.getElementById('buytotalhbd').value = parseFloat(hbdbal.amount / 1000).toFixed(3) }
            if (parseFloat(document.getElementById('buyqtyhbd').value) * 1000 > bal) { document.getElementById('sellqtyhbd').value = parseFloat(bal).toFixed(3) }
            if (parseFloat(document.getElementById('buyqtyhive').value) * 1000 > bal) { document.getElementById('sellqtyhive').value = parseFloat(bal).toFixed(3) }
            document.getElementById(amountID).value = parseFloat(parseFloat(document.getElementById(dluxID).value) * parseFloat(document.getElementById(rateID).value)).toFixed(3)
        }
        function autoDlux(tick, rateID, dluxID, amountID) {
            document.getElementById(rateID).value = parseFloat(tick).toFixed(5)
            if (parseFloat(document.getElementById('buytotalhive').value) * 1000 > hivebal) { document.getElementById('buytotalhive').value = parseFloat(hivebal / 1000).toFixed(3) }
            if (parseFloat(document.getElementById('buytotalhbd').value) * 1000 > hbdbal) { document.getElementById('buytotalhbd').value = parseFloat(hbdbal.amount / 1000).toFixed(3) }
            if (parseFloat(document.getElementById('buyqtyhbd').value) * 1000 > bal) { document.getElementById('sellqtyhbd').value = parseFloat(bal).toFixed(3) }
            if (parseFloat(document.getElementById('buyqtyhive').value) * 1000 > bal) { document.getElementById('sellqtyhive').value = parseFloat(bal).toFixed(3) }
            document.getElementById(dluxID).value = parseFloat(parseFloat(document.getElementById(amountID).value) / tick).toFixed(3)
        }
        function fillInRate(rateID, dluxID, amountID) {
            if (parseFloat(document.getElementById('buytotalhive').value) * 1000 > hivebal) { document.getElementById('buytotalhive').value = parseFloat(hivebal / 1000).toFixed(3) }
            if (parseFloat(document.getElementById('buytotalhbd').value) * 1000 > hbdbal) { document.getElementById('buytotalhbd').value = parseFloat(hbdbal.amount / 1000).toFixed(3) }
            if (parseFloat(document.getElementById('buyqtyhbd').value) * 1000 > bal) { document.getElementById('sellqtyhbd').value = parseFloat(bal).toFixed(3) }
            if (parseFloat(document.getElementById('buyqtyhive').value) * 1000 > bal) { document.getElementById('sellqtyhive').value = parseFloat(bal).toFixed(3) }
            document.getElementById(rateID).value = parseFloat(parseFloat(parseFloat(parseFloat(document.getElementById(amountID).value) / parseFloat(document.getElementById(dluxID).value)))).toFixed(5)

        }
        function adjustDlux(amount, rateID, dluxID, amountID) {
            document.getElementById(amountID).value = parseFloat(amount / 1000).toFixed(3)
            if (parseFloat(document.getElementById('buytotalhive').value) * 1000 > hivebal) { document.getElementById('buytotalhive').value = parseFloat(hivebal / 1000).toFixed(3) }
            if (parseFloat(document.getElementById('buytotalhbd').value) * 1000 > hbdbal) { document.getElementById('buytotalhbd').value = parseFloat(hbdbal.amount / 1000).toFixed(3) }
            if (parseFloat(document.getElementById('buyqtyhbd').value) * 1000 > bal) { document.getElementById('sellqtyhbd').value = parseFloat(bal).toFixed(3) }
            if (parseFloat(document.getElementById('buyqtyhive').value) * 1000 > bal) { document.getElementById('sellqtyhive').value = parseFloat(bal).toFixed(3) }
            document.getElementById(dluxID).value = parseFloat(parseFloat(document.getElementById(amountID).value) / parseFloat(document.getElementById(rateID).value)).toFixed(3)
        }
        function fillInAmount(rateID, dluxID, amountID) {
            if (parseFloat(document.getElementById('buytotalhive').value) * 1000 > hivebal) { document.getElementById('buytotalhive').value = parseFloat(hivebal / 1000).toFixed(3) }
            if (parseFloat(document.getElementById('buytotalhbd').value) * 1000 > hbdbal) { document.getElementById('buytotalhbd').value = parseFloat(hbdbal.amount / 1000).toFixed(3) }
            if (parseFloat(document.getElementById('buyqtyhbd').value) * 1000 > bal) { document.getElementById('sellqtyhbd').value = parseFloat(bal).toFixed(3) }
            if (parseFloat(document.getElementById('buyqtyhive').value) * 1000 > bal) { document.getElementById('sellqtyhive').value = parseFloat(bal).toFixed(3) }
            document.getElementById(amountID).value = parseFloat(parseFloat(document.getElementById(dluxID).value) * parseFloat(document.getElementById(rateID).value)).toFixed(3)
        }
        function autoAmount(tick, rateID, dluxID, amountID) {
            document.getElementById(rateID).value = parseFloat(tick).toFixed(5)
            if (parseFloat(document.getElementById('buytotalhive').value) * 1000 > hivebal) { document.getElementById('buytotalhive').value = parseFloat(hivebal / 1000).toFixed(3) }
            if (parseFloat(document.getElementById('buytotalhbd').value) * 1000 > hbdbal) { document.getElementById('buytotalhbd').value = parseFloat(hbdbal.amount / 1000).toFixed(3) }
            if (parseFloat(document.getElementById('buyqtyhbd').value) * 1000 > bal) { document.getElementById('sellqtyhbd').value = parseFloat(bal).toFixed(3) }
            if (parseFloat(document.getElementById('buyqtyhive').value) * 1000 > bal) { document.getElementById('sellqtyhive').value = parseFloat(bal).toFixed(3) }
            document.getElementById(amountID).value = parseFloat(parseFloat(document.getElementById(dluxID).value) * tick).toFixed(3)
        }

        function start() {
            console.log({dex})
            var feedItems = Object.keys(feed)
            feedItems.reverse()
            for (p = 0; p < feedItems.length; p++) {
                if (feed[feedItems[p]].split('|')[1] != ' Report processed') addFeedRow(feedItems[p].split(':')[0], feed[feedItems[p]].split('|')[0], feed[feedItems[p]].split('|')[1], feedItems[p].split(':')[1])
            }
            hiveTick = dex.markets.hive.tick
            hbdTick = dex.markets.hbd.tick
            document.getElementById('buypricehbd').value = parseFloat(hbdTick).toFixed(5)
            document.getElementById('sellpricehbd').value = parseFloat(hbdTick).toFixed(5)
            document.getElementById('buypricehive').value = parseFloat(hiveTick).toFixed(5)
            document.getElementById('sellpricehive').value = parseFloat(hiveTick).toFixed(5)
            var info = document.getElementsByClassName('text-center market-info-item')
            var ip1 = parseFloat(stats.stats.tokenSupply / 1000000 * dex.markets.hive.tick).toFixed(1), m = 'K'
            var is1 = parseFloat(stats.stats.tokenSupply / 1000000 * dex.markets.hbd.tick).toFixed(1), n = 'K'
            if (ip1 > 1000) {
                ip1 = parseFloat(ip1 / 1000).toFixed(1)
                m = 'M'
            }
            if (ip1 > 1000) {
                ip1 = parseFloat(ip1 / 1000).toFixed(1)
                m = 'B'
            }
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
            info[5].innerHTML = `<h3><span>${is1}${n} HBD</span></h3>
				<div>
					<label>Market Cap</label>
				</div>`
            var ip2 = parseFloat(stats.stats.tokenSupply / 1000000000).toFixed(1), l = 'M'

            if (ip2 > 1000) { ip3 = parseFloat(ip3 / 1000).toFixed(1); l = 'B' }
            info[2].innerHTML = `<h3><span>${ip2}${l} DLUX</span></h3>
				<div>
					<label>Supply</label>
				</div>`
            info[7].innerHTML = `<h3><span>${ip2}${l} DLUX</span></h3>
				<div>
					<label>Supply</label>
				</div>`
            var ip3 = 0, k = ''
            var until1 = 0
            try { until1 = dex.markets.hive.his.length } catch (e) { }
            for (i = 0; i < until1; i++) {
                if (dex.markets.hive.his[i].block > dex.realtime - 28800) ip3 += dex.markets.hive.his[i].amount
            }
            ip3 = parseFloat(ip3 / 1000).toFixed(1)
            if (ip3 > 1000) { ip3 = parseFloat(ip3 / 1000).toFixed(1); k = 'K' }
            if (ip3 > 1000) { ip3 = parseFloat(ip3 / 1000).toFixed(1); k = 'M' }
            if (ip3 > 1000) { ip3 = parseFloat(ip3 / 1000).toFixed(1); k = 'B' }
            info[4].innerHTML = `<h3><span>${ip3}${k} HIVE</span></h3>
				<div>
					<label>Volume</label>
				</div>`
            var is3 = 0, o = ''
            var until2 = 0
            try { until2 = dex.markets.hbd.his.length } catch (e) { }
            for (var i = 0; i < until2; i++) {
                if (dex.markets.hbd.his[i].block > dex.realtime - 28800) is3 += dex.markets.hbd.his[i].amount
            }
            is3 = parseFloat(is3 / 1000).toFixed(1)
            if (ip3 > 1000) { is3 = parseFloat(ip3 / 1000).toFixed(1); o = 'K' }
            if (ip3 > 1000) { is3 = parseFloat(ip3 / 1000).toFixed(1); o = 'M' }
            if (ip3 > 1000) { is3 = parseFloat(ip3 / 1000).toFixed(1); o = 'B' }
            info[9].innerHTML = `<h3><span>${is3}${o} HIVE</span></h3>
				<div>
					<label>Volume</label>
				</div>`
	    let hbdhis = [], hivehis = []
	    
            for (var i in dex.markets.hive.his) {
                hivehis.unshift(dex.markets.hive.his[i])
            }
	    for (i in hivehis){
		addHistRow(hivehis[i])	    
	    }
            for (var i in dex.markets.hbd.his) {
            	hbdhis.unshift(dex.markets.hbd.his[i])
	    }
	    for (i in hbdhis){
	    	addHbdHistRow(hbdhis[i].block, parseFloat(hbdhis[i].rate).toFixed(5), parseFloat(hbdhis[i].amount / 1000).toFixed(3), '-')
                
	    }
            var c1 = [], c2 = [], c3 = [], c4 = [], c = 0, until3 = 0, until4 = 0, until5 = 0, until6 = 0
            try {
                until3 = Object.keys(dex.markets.hive.sellOrders).length
                console.log(`${until3} DLUX 4 STM sell orders`)
            } catch (e) {
                console.log(e)
            }
            for (var i in dex.markets.hive.sellOrders) {
                const r1 = parseFloat(dex.markets.hive.sellOrders[i].hive / 1000).toFixed(3)
                const r2 = parseFloat(dex.markets.hive.sellOrders[i].amount / 1000).toFixed(3)
                const r3 = parseFloat(dex.markets.hive.sellOrders[i].rate).toFixed(6)
                if (c1.length) { c = parseFloat(c1[c1.length - 1].y) }
                c1.push({ x: parseFloat(r3), y: parseFloat(r2 + c) })
                const r4 = dex.markets.hive.sellOrders[i].txid
                const o = (dex.markets.hive.sellOrders[i].from == iam)
                console.log(r1, r2, r3, r4, o, 0)
                addBuyRow(r1, r2, r3, r4, o)
            }
            c = 0
            for (var i in dex.markets.hive.buyOrders) {
                const r1 = parseFloat(dex.markets.hive.buyOrders[i].hive / 1000).toFixed(3)
                const r2 = parseFloat(dex.markets.hive.buyOrders[i].amount / 1000).toFixed(3)
                const r3 = parseFloat(dex.markets.hive.buyOrders[i].rate).toFixed(6)
                if (c2.length) { c = parseFloat(c2[0].y) }
                c2.unshift({ x: parseFloat(r3), y: parseFloat(parseFloat(r2) + parseFloat(c)) })
                const r4 = dex.markets.hive.buyOrders[i].txid
                const o = (dex.markets.hive.buyOrders[i].from == iam)
                addSellRow(r1, r2, r3, r4, o)
            }
            c = 0
            for (var i in dex.markets.hbd.sellOrders) {
                const r1 = parseFloat(dex.markets.hbd.sellOrders[i].hbd / 1000).toFixed(3)
                const r2 = parseFloat(dex.markets.hbd.sellOrders[i].amount / 1000).toFixed(3)
                const r3 = parseFloat(dex.markets.hbd.sellOrders[i].rate).toFixed(6)
                if (c3.length) { c = parseFloat(c3[c3.length - 1].y) }
                c3.push({ x: r3, y: parseFloat(r2 + c) })
                const r4 = dex.markets.hbd.sellOrders[i].txid
                const o = (dex.markets.hbd.sellOrders[i].from == iam)
                addHbdBuyRow(r1, r2, r3, r4, o)
            }
            c = 0
            for (var i in dex.markets.hbd.buyOrders) {
                const r1 = parseFloat(dex.markets.hbd.buyOrders[i].hbd / 1000).toFixed(3)
                const r2 = parseFloat(dex.markets.hbd.buyOrders[i].amount / 1000).toFixed(3)
                const r3 = parseFloat(dex.markets.hbd.buyOrders[i].rate).toFixed(6)
                if (c4.length) { c = parseFloat(c4[0].y) }
                c4.unshift({ x: r3, y: parseFloat(r2 + c) })
                const r4 = dex.markets.hbd.buyOrders[i].txid
                const o = (dex.markets.hbd.buyOrders[i].from == iam)
                addHbdSellRow(r1, r2, r3, r4, o)
            }
            //c1.unshift({x:c2[0].x,y:0})
            //c2.push({s:c1[c1.length-1].x,y:0})
            //c3.unshift({x:c4[0].x,y:0})
            //c4.push({s:c3[c3.length-1].x,y:0})
            updateConfigByMutating(priceChartHive)
            updateHBDConfigByMutating(priceChartHbd)
            updateHiveConfigByMutating(buySellChartHive)
            updateHBDBookConfigByMutating(buySellChartHbd)
            function updateHiveConfigByMutating(chart) {
                chart.data.datasets[0].data = c1
                chart.data.datasets[1].data = c2
                chart.update();
            }
            function updateHBDBookConfigByMutating(chart) {
                chart.data.datasets[0].data = c3
                chart.data.datasets[1].data = c4
                chart.update();
            }

            function updateConfigByMutating(chart) {
                for (var i = 0; i < until1; i++) {
                    var color = "rgba(100,100,100,0.6)"
                    var bcolor = "rgba(100,100,100,0.2)"
                    if (dex.markets.hive.his[i].dir == 'up') {
                        color = "rgba(0,255,0,0.6)";
                        bcolor = "rgba(0,255,0,0.2)"
                    }
                    if (dex.markets.hive.his[i].dir == 'down') {
                        color = "rgba(255,0,0,0.6)";
                        bcolor = "rgba(255,0,0,0.2)"
                    }
                    hiveHis.push({
                        backgroundColor: bcolor,
                        borderColor: color,
                        data: [{
                            x: dex.markets.hive.his[i].block,
                            y: parseFloat(dex.markets.hive.his[i].rate),
                            r: Math.sqrt(parseFloat(dex.markets.hive.his[i].amount / 1000) / 3.14)
                        }]
                    })
                }
                chart.data.datasets[0] = hiveHis
                chart.options.title.text = `DLUX : ${parseFloat(hiveTick).toFixed(3)} HIVE`;
                chart.update();
            }

            function updateHBDConfigByMutating(chart) {
                for (var i = 0; i < until2; i++) {
                    var color = "rgba(100,100,100,0.6)"
                    var bcolor = "rgba(100,100,100,0.2)"
                    if (dex.markets.hbd.his[i].dir == 'up') {
                        color = "rgba(0,255,0,0.6)";
                        bcolor = "rgba(0,255,0,0.2)"
                    }
                    if (dex.markets.hbd.his[i].dir == 'down') {
                        color = "rgba(255,0,0,0.6)";
                        bcolor = "rgba(255,0,0,0.2)"
                    }
                    hbdHis.push({
                        backgroundColor: bcolor,
                        borderColor: color,
                        data: [{
                            x: dex.markets.hbd.his[i].block,
                            y: parseFloat(dex.markets.hbd.his[i].rate),
                            r: Math.sqrt(parseFloat(dex.markets.hbd.his[i].amount / 1000) / 3.14)
                        }]
                    })
                }
                chart.data.datasets[0] = hbdHis
                chart.options.title.text = `DLUX : ${parseFloat(hbdTick).toFixed(3)} HBD`;
                chart.update();
            }

            function addHistRow(ip) {
                const content = ip.block, morecontent = parseFloat(ip.rate).toFixed(5), morecontent2 = parseFloat(ip.amount / 1000).toFixed(3), morecontent3 = ip.dir || '-'
                var histTab = document.getElementsByClassName('history-table').item(0)
                var tabBody = histTab.getElementsByTagName("tbody").item(0);
                var row = document.createElement("tr");
                var cell1 = document.createElement("td");
                var cell2 = document.createElement("td");
                var cell3 = document.createElement("td");
                var cell4 = document.createElement("td");
                const textnode1 = document.createTextNode(content);
                const textnode2 = document.createTextNode(morecontent);
                const textnode3 = document.createTextNode(morecontent2);
                const textnode4 = document.createTextNode(morecontent3);
                cell1.appendChild(textnode1);
                cell2.appendChild(textnode2);
                cell3.appendChild(textnode3);
                cell4.appendChild(textnode4);
                row.appendChild(cell1);
                row.appendChild(cell2);
                row.appendChild(cell3);
                row.appendChild(cell4);
                tabBody.appendChild(row);


            }

            function addHbdHistRow(content, morecontent, morecontent2, morecontent3) {
                var histTab = document.getElementsByClassName('history-table').item(1)
                var tabBody = histTab.getElementsByTagName("tbody").item(0);
                var row = document.createElement("tr");
                var cell1 = document.createElement("td");
                var cell2 = document.createElement("td");
                var cell3 = document.createElement("td");
                var cell4 = document.createElement("td");
                const textnode1 = document.createTextNode(content);
                const textnode2 = document.createTextNode(morecontent);
                const textnode3 = document.createTextNode(morecontent2);
                const textnode4 = document.createTextNode(morecontent3);
                cell1.appendChild(textnode1);
                cell2.appendChild(textnode2);
                cell3.appendChild(textnode3);
                cell4.appendChild(textnode4);
                row.appendChild(cell1);
                row.appendChild(cell2);
                row.appendChild(cell3);
                row.appendChild(cell4);
                tabBody.appendChild(row);


            }

            function addBuyRow(content, morecontent, morecontent2, morecontent3, o) {
                var orders = document.getElementsByClassName('container orderbook-table').item(0)
                var tabBody = orders.getElementsByTagName("tbody").item(1);
                var row = document.createElement("tr");
                var cell1 = document.createElement("td");
                var cell2 = document.createElement("td");
                var cell3 = document.createElement("td");
                var cell4 = document.createElement("td");
                const textnode1 = document.createTextNode(content);
                const textnode2 = document.createTextNode(morecontent);
                const textnode3 = document.createTextNode(morecontent2);
                const button = document.createElement("button");
                if (o) {
                    button.innerHTML = "Cancel"
                    button.setAttribute("onclick", `cancel('${morecontent3}')`)
                    button.setAttribute('class', 'btn btn-outline-warning btn-sm')
                } else {
                    button.innerHTML = "Buy"
                    button.setAttribute("onclick", `getItID('${morecontent2}:${morecontent3}')`)
                    button.setAttribute('class', 'btn btn-outline-success btn-sm')
                }
                cell1.appendChild(textnode1);
                cell2.appendChild(textnode2);
                cell3.appendChild(textnode3);
                cell4.appendChild(button);
                row.appendChild(cell1);
                row.appendChild(cell2);
                row.appendChild(cell3);
                row.appendChild(cell4);
                tabBody.appendChild(row);


            }
            function addHbdBuyRow(content, morecontent, morecontent2, morecontent3, o) {
                var orders = document.getElementsByClassName('container orderbook-table').item(1)
                var tabBody = orders.getElementsByTagName("tbody").item(1);
                var row = document.createElement("tr");
                var cell1 = document.createElement("td");
                var cell2 = document.createElement("td");
                var cell3 = document.createElement("td");
                var cell4 = document.createElement("td");
                const textnode1 = document.createTextNode(content);
                const textnode2 = document.createTextNode(morecontent);
                const textnode3 = document.createTextNode(morecontent2);
                const button = document.createElement("button");
                if (o) {
                    button.innerHTML = "Cancel"
                    button.setAttribute("onclick", `cancel('${morecontent3}')`)
                    button.setAttribute('class', 'btn btn-outline-warning btn-sm')
                } else {
                    button.innerHTML = "Buy"
                    button.setAttribute("onclick", `getItID('${morecontent2}:${morecontent3}')`)
                    button.setAttribute('class', 'btn btn-outline-success btn-sm')
                }
                cell1.appendChild(textnode1);
                cell2.appendChild(textnode2);
                cell3.appendChild(textnode3);
                cell4.appendChild(button);
                row.appendChild(cell1);
                row.appendChild(cell2);
                row.appendChild(cell3);
                row.appendChild(cell4);
                tabBody.appendChild(row);


            }

            function addSellRow(content, morecontent, morecontent2, morecontent3, o) {
                var orders = document.getElementsByClassName('container orderbook-table').item(0)
                var tabBody = orders.getElementsByTagName("tbody").item(0);
                console.log(orders.getElementsByTagName("tbody"))
                var row = document.createElement("tr");
                var cell1 = document.createElement("td");
                var cell2 = document.createElement("td");
                var cell3 = document.createElement("td");
                var cell4 = document.createElement("td");
                const textnode1 = document.createTextNode(content);
                const textnode2 = document.createTextNode(morecontent);
                const textnode3 = document.createTextNode(morecontent2);
                const button = document.createElement("button");
                if (o) {
                    button.innerHTML = "Cancel"
                    button.setAttribute("onclick", `cancel('${morecontent3}')`)
                    button.setAttribute('class', 'btn btn-outline-warning btn-sm')
                } else {
                    button.innerHTML = "Sell"
                    button.setAttribute("onclick", `getSellID('${morecontent2}:${morecontent3}')`)
                    button.setAttribute('class', 'btn btn-outline-danger btn-sm')
                }
                cell1.appendChild(textnode1);
                cell2.appendChild(textnode2);
                cell3.appendChild(textnode3);
                cell4.appendChild(button);
                row.appendChild(cell1);
                row.appendChild(cell2);
                row.appendChild(cell3);
                row.appendChild(cell4);
                tabBody.appendChild(row);


            }
            function addHbdSellRow(content, morecontent, morecontent2, morecontent3, o) {
                var orders = document.getElementsByClassName('container orderbook-table').item(1)
                var tabBody = orders.getElementsByTagName("tbody").item(0);
                console.log(orders.getElementsByTagName("tbody"))
                var row = document.createElement("tr");
                var cell1 = document.createElement("td");
                var cell2 = document.createElement("td");
                var cell3 = document.createElement("td");
                var cell4 = document.createElement("td");
                const textnode1 = document.createTextNode(content);
                const textnode2 = document.createTextNode(morecontent);
                const textnode3 = document.createTextNode(morecontent2);
                const button = document.createElement("button");
                if (o) {
                    button.innerHTML = "Cancel"
                    button.setAttribute("onclick", `cancel('${morecontent3}')`)
                    button.setAttribute('class', 'btn btn-outline-warning btn-sm')
                } else {
                    button.innerHTML = "Sell"
                    button.setAttribute("onclick", `getSellID('${morecontent2}:${morecontent3}')`)
                    button.setAttribute('class', 'btn btn-outline-danger btn-sm')
                }
                cell1.appendChild(textnode1);
                cell2.appendChild(textnode2);
                cell3.appendChild(textnode3);
                cell4.appendChild(button);
                row.appendChild(cell1);
                row.appendChild(cell2);
                row.appendChild(cell3);
                row.appendChild(cell4);
                tabBody.appendChild(row);


            }
            function addFeedRow(a, b, c, d) {
                var histTab = document.getElementsByClassName('feed-table').item(0)
                var tabBody = histTab.getElementsByTagName("tbody").item(0);
                var row = document.createElement("tr");
                var cell1 = document.createElement("td");
                var cell2 = document.createElement("td");
                var cell3 = document.createElement("td");
                var cell4 = document.createElement("td");
                const textnode1 = document.createTextNode(a);
                const textnode2 = document.createTextNode(b);
                const textnode3 = document.createTextNode(c);
                const textnode4 = document.createTextNode(d);
                cell1.appendChild(textnode1);
                cell2.appendChild(textnode2);
                cell3.appendChild(textnode3);
                cell4.appendChild(textnode4);
                row.appendChild(cell1);
                row.appendChild(cell2);
                row.appendChild(cell3);
                row.appendChild(cell4);
                tabBody.appendChild(row);


            }
        }
        function cancel(txid) {
            var params = {
                "required_auths": [iam],
                "required_posting_auths": 0,
                "id": "dlux_dex_clear",
                "json": JSON.stringify({
                    txid
                })
            }
            console.log(params)
            reqsign(['custom_json', params], ['active', iam])
        }



        function placeHiveAsk() {
            var dlux = parseInt(parseFloat(document.getElementById('sellqtyhive').value) * 1000),
                amount = parseInt(parseFloat(document.getElementById('selltotalhive').value) * 1000),
                params = {
                    "required_auths": [iam],
                    "required_posting_auths": 0,
                    "id": "dlux_dex_hive_sell",
                    "json": JSON.stringify({
                        dlux,
                        hive: amount,
			hours: opts.expire_time
                    })
                }
            console.log(params)
            reqsign(['custom_json', params], ['active', iam])
        }
        function placeHbdAsk() {
            var dlux = parseInt(parseFloat(document.getElementById('sellqtyhbd').value) * 1000),
                amount = parseInt(parseFloat(document.getElementById('selltotalhbd').value) * 1000),
                params = {
                    "required_auths": [iam],
                    "required_posting_auths": 0,
                    "id": "dlux_dex_hbd_sell",
                    "json": JSON.stringify({
                        dlux,
                        hbd: amount,
			hours: opts.expire_time
                    })
                }
            console.log(params)
            reqsign(['custom_json', params], ['active', iam])
        }

        function placeHiveBuy() {
            var dlux = parseInt(parseFloat(document.getElementById('buyqtyhive').value) * 1000),
                amount = parseInt(parseFloat(document.getElementById('buytotalhive').value) * 1000),
                hiveAmount = (amount / 1000).toFixed(3) + ' STEEM', hbdAmount = '0.000 SBD'
            fetch('https://token.dlux.io/dex')
                .then(function (response) {
                    return response.json();
                })
                .then(function (myJson) {
                    var updex = myJson.markets
                    var queue = myJson.queue
                    if (dlux > 0 && typeof dlux == 'number' && amount > 0 && typeof amount == 'number') {
                        var escrowTimer = {}
                        var agents = []
                        var i = 0
                        let now = new Date();
                        escrowTimer.ratifyIn = now.setHours(now.getHours() + 72);
                        escrowTimer.ratifyUTC = new Date(escrowTimer.ratifyIn);
                        escrowTimer.ratifyString = escrowTimer.ratifyUTC.toISOString().slice(0, -5);
                        escrowTimer.expiryIn = now.setHours(now.getHours() + opts.expire_time);
                        escrowTimer.expiryUTC = new Date(escrowTimer.expiryIn);
                        escrowTimer.expiryString = escrowTimer.expiryUTC.toISOString().slice(0, -5);
                        var formatter = amount / 1000
                        formatter = formatter.toFixed(3)
                        var eidi = Math.floor(Math.random() * 4294967296)
                        let params = {
                            from: iam,
                            to: opts.to,
                            sbd_amount: hbdAmount,
                            steem_amount: hiveAmount,
                            escrow_id: eidi,
                            agent: opts.agent,
                            fee: opts.fee,
                            ratification_deadline: escrowTimer.ratifyString,
                            escrow_expiration: escrowTimer.expiryString,
                            json_meta: JSON.stringify({
                                dextx: {
                                    dlux
                                }
                            })
                        }
                        console.log(params)
                        reqsign(['escrow_transfer', params], ['active', iam])
                    }
                })


        }


        function placeHbdBuy() {
            var dlux = parseInt(parseFloat(document.getElementById('buyqtyhbd').value) * 1000),
                amount = parseInt(parseFloat(document.getElementById('buytotalhbd').value) * 1000),
                hiveAmount = '0.000 STEEM', hbdAmount = (amount / 1000).toFixed(3) + ' SBD'
            fetch('https://token.dlux.io/dex')
                .then(function (response) {
                    return response.json();
                })
                .then(function (myJson) {
                    var updex = myJson.markets
                    var queue = myJson.queue
                    if (dlux > 0 && typeof dlux == 'number' && amount > 0 && typeof amount == 'number') {
                        var escrowTimer = {}
                        var agents = []
                        var i = 0
                        let now = new Date();
                        escrowTimer.ratifyIn = now.setHours(now.getHours() + 1);
                        escrowTimer.ratifyUTC = new Date(escrowTimer.ratifyIn);
                        escrowTimer.ratifyString = escrowTimer.ratifyUTC.toISOString().slice(0, -5);
                        escrowTimer.expiryIn = now.setHours(now.getHours() + opts.expire_time);
                        escrowTimer.expiryUTC = new Date(escrowTimer.expiryIn);
                        escrowTimer.expiryString = escrowTimer.expiryUTC.toISOString().slice(0, -5);
                        var formatter = amount / 1000
                        formatter = formatter.toFixed(3)
                        var eid = Math.floor(Math.random() * 4294967296)
                        let params = {
                            from: iam,
                            to: opts.to,
                            sbd_amount: hbdAmount,
                            steem_amount: hiveAmount,
                            escrow_id: eid,
                            agent: opts.agent,
                            fee: opts.fee,
                            ratification_deadline: escrowTimer.ratifyString,
                            escrow_expiration: escrowTimer.expiryString,
                            json_meta: JSON.stringify({
                                dextx: {
                                    dlux
                                }
                            })
                        }
                        console.log(params)
                        reqsign(['escrow_transfer', params], ['active', iam])
                    }
                })
        }

        function getItID(txid) {
            fetch('https://token.dlux.io/dex')
                .then(function (response) {
                    return response.json();
                })
                .then(function (myJson) {
                    var updex = myJson.markets
                    var queue = myJson.queue
                    var addr = '', receiver = '', amount, type
		    try {
			    if (updex.hive.sellOrders[txid]) {
				console.log(updex.hive.sellOrders[txid].txid)
				addr = updex.hive.sellOrders[txid]
				reciever = updex.hive.sellOrders[txid].from
				type = ' STEEM'
			    }
		    } catch (e){}
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
                        console.log(addr, iam)
                        for (var agent in queue) {
                            if (queue[agent] !== addr.from && queue[agent] !== iam) {
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
                            from: iam,
                            to: agents[0],
                            sbd_amount: hbdAmount,
                            steem_amount: hiveAmount,
                            escrow_id: eid,
                            agent: agents[1],
                            fee: '0.000 STEEM',
                            ratification_deadline: escrowTimer.ratifyString,
                            escrow_expiration: escrowTimer.expiryString,
                            json_meta: JSON.stringify({
                                contract: txid,
                                for: addr.from
                            })
                        }
                        /*
                        escrow_transfer(prompt('Enter Active Key','5blahblah'), iam, agents[0], agents[1], eid, hbdAmount, hiveAmount, "0.000 HIVE", escrowTimer.ratifyString, escrowTimer.expiryString, JSON.stringify({
                                contract: txid,
                                for: addr.from
                            }))
                      */
                        reqsign(['escrow_transfer', params], ['active', iam]);
                    }
                });
        }
        function getSellID(txid) {
            fetch('https://token.dlux.io/dex')
                .then(function (response) {
                    return response.json();
                })
                .then(function (myJson) {
                    var updex = myJson.markets, u
                    var addr = '', receiver = '', amount, type
                    var type = '', addr = '', reciever = ''
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
                            "required_auths": [iam],
                            "required_posting_auths": [],
                            "id": "dlux_dex_buy",
                            "json": JSON.stringify({
                                contract: txid,
                                for: receiver,
                                dlux: u
                            })
                        }
                        console.log(params)
                        reqsign(['custom_json', params], ['active', iam]);
                    }
                });
        }
</script>
<script>checkCookie();iAm(getCookie("user"));</script>
</body></html>
