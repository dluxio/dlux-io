<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - DEX</title>
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/header.php";
   include_once($path);
?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

  <title>dlux DEX</title>
</head>
<body class="d-flex flex-column h-100 text-white">
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/nav.php";
   include_once($path);
?>
<main role="main" class="flex-shrink-0 padme-t70">
<div class="container">
	<div class="alert alert-danger alert-dismissible text-center">
  		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  		<a href="#" class="alert-link">The dlux DEX is under construction. Have a look around and let us know what you think!</a>
	</div>
	<div class="alert alert-success alert-dismissible">
  		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  		<a href="#" class="alert-link"><strong>Buy DLUX from @robotolux!</strong></a> The current price is 0.22 STEEM.
	</div>
  <div class="container-fluid" style="padding: 0">
	  <ul id="pagenav" class="nav nav-pills justify-content-center" role="tablist">
		  <li class="nav-item"> <a class="nav-link" href="#info" id="infotab" role="tab" data-toggle="tab" aria-controls="info" aria-expanded="true">INFO</a></li>
	      <li class="nav-item">
			
  				<a class="nav-link active" href="#trade" id="tradetab" role="tab" data-toggle="tab" aria-controls="trade" aria-expanded="true">TRADE</a>

  				
		  </li>
		  <li class="nav-item"> <a class="nav-link" href="#ticker" role="tab" id="tickertab" data-toggle="tab" aria-controls="ticker">FEED</a></li>
	  </ul>
	  <!-- Content Panel -->
	  <div id="pagecontent" class="tab-content">
		  <div role="tabpanel" class="tab-pane fade show" id="info" aria-labelledby="infotab">
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
		<div role="tabpanel" class="tab-pane fade show active" id="trade" aria-labelledby="tradetab">
			<div class="container-fluid p-0">
		<ul class="nav nav-pills ml-3" role="tablist"><span class="p-2">Trade Pairs:</span>
		  	<li class="nav-item">
				<a href="javascript:dexmodal('hive', User.opts.type)" class="nav-link active" id="buywithhivetab" onClick="toggleActive()">DLUX:HIVE</a></li>
			<li class="nav-item">
				<a href="javascript:dexmodal('hbd', User.opts.type)" class="nav-link" id="buywithhbdtab" onClick="toggleActive()">DLUX:HBD</a></li>
			<li class="nav-item">
				<a href="javascript:dexmodal('hbd', User.opts.type)" class="nav-link" id="buywithhbdtab" onClick="toggleActive()">DLUX:BTC</a></li>
			<li class="nav-item">
				<a href="javascript:dexmodal('hbd', User.opts.type)" class="nav-link" id="buywithhbdtab" onClick="toggleActive()">DLUX:ETH</a></li>
		  </ul>
				
				<a class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">DLUX:HIVE
    			<span class="sr-only">Toggle Dropdown</span>
  				</a>
  				<div class="dropdown-menu">
    				<a class="dropdown-item" href="#">DLUX:HIVE</a>
    				<a class="dropdown-item" href="#">DLUX:HBD</a>
					<a class="dropdown-item" href="#">DLUX:BTC</a>
					<a class="dropdown-item" href="#">DLUX:ETH</a>
				</div>
				
	      <div class="row">
	    <div class="col-lg-8">
		<div class="price-info">
		<canvas id="historicPriceChart" height="250" class="price-chart"></canvas>
		<div class="d-flex justify-content-center">
		  <div class="btn-group btn-group-toggle set-timescale" data-toggle="buttons">
  				<label class="btn btn-primary active">
    				<input type="radio" name="options" id="hoursteem" autocomplete="off" checked> 1H
  				</label>
  				<label class="btn btn-primary">
    				<input type="radio" name="options" id="daysteem" autocomplete="off"> 1D
  				</label>
  				<label class="btn btn-primary">
    			<input type="radio" name="options" id="weeksteem" autocomplete="off"> 1W
  				</label>
			  	<label class="btn btn-primary">
    			<input type="radio" name="options" id="monthsteem" autocomplete="off"> 1M
  				</label>
			  	<label class="btn btn-primary">
    			<input type="radio" name="options" id="yearsteem" autocomplete="off"> 1Y
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
			<div class="text-center market-info-item"><h1>|</h1></div>
			<div class="text-center market-info-item">
				<h3><span>6M DLUX</span></h3>
				<div>
					<label>Supply</label>
				</div>
			</div>
			<div class="text-center market-info-item"><h1>|</h1></div>
			<div class="text-center market-info-item">
				<h3><span>$1.3K</span></h3>
				<div>
					<label>Volume</label>
				</div>
			</div>
		  </div>
			<div class="balance"><h4>BAL: 62382 DLUX</h4></div>
		  </div>
			
	</div>
	  <div class="col-lg-4">
		  <div>
			  <div class="widget">
			<ul id="orderwidget" class="nav nav-pills justify-content-center" role="tablist">
			  <li class="nav-item"> <a class="nav-link active" href="#buysteem" id="buytabsteem" role="tab" data-toggle="tab" aria-controls="buysteem" aria-expanded="true">Buy DLUX</a></li>
			  <li class="nav-item"> <a class="nav-link" href="#sellsteem" role="tab" id="selltabsteem" data-toggle="tab" aria-controls="sellsteem">Sell DLUX</a></li>
			</ul>
			  <!-- Content Panel -->
		    <div id="orderformsteem" class="tab-content">
			    <div role="tabpanel" class="tab-pane fade show active" id="buysteem" aria-labelledby="buytabsteem">
			      <form>
	    	<div class="form-group" style="padding-top: 10px">
	    	  <label for="inputbuypricesteem">Bid Price</label>
	    	  <input type="number" class="form-control" id="buypricesteem" placeholder="Amount in STEEM">
			<div class="text-center" style="padding-top: 10px">
				<button type="button" class="btn btn-outline-primary btn-sm">Lowest Ask</button>
			</div>
        	</div>
		    <div class="form-group">
		      <label for="inputbuyqtysteem">Qty.</label>
		      <input type="number" class="form-control" id="buyqtysteem" placeholder="How many">
				<div class="text-center" style="padding-top: 10px">
				<button type="button" class="btn btn-outline-primary btn-sm">Max</button>
				<button type="button" class="btn btn-outline-primary btn-sm">1/2</button>
				<button type="button" class="btn btn-outline-primary btn-sm">1/4</button>
				</div>
	        </div>
			<div class="form-group">
		      <label for="inputbuytotalsteem">Total</label>
		      <input type="number" class="form-control" id="buytotalsteem" placeholder="Order total">
			  <div class="text-center text-secondary" style="padding-top: 10px">STEEM BALANCE</div>
	        </div>
			<div class="text-center">
		    <button type="submit" class="btn btn-outline-success">Place Buy Order</button>
			</div>
	      </form>
		        </div>
			    <div role="tabpanel" class="tab-pane fade" id="sellsteem" aria-labelledby="selltabsteem">
			      <form>
	    <div class="form-group" style="padding-top: 10px">
	      <label for="inputsellpricesteem">Ask Price</label>
	      <input type="number" class="form-control" id="sellpricesteem" placeholder="Amount in STEEM">
			<div class="text-center" style="padding-top: 10px">
				<button type="button" class="btn btn-outline-primary btn-sm">Highest Bid</button>
			</div>
        </div>
		    <div class="form-group">
		      <label for="inputsellqtysteem">Qty.</label>
		      <input type="number" class="form-control" id="sellqtysteem" placeholder="How many">
			  <div class="text-center" style="padding-top: 10px">
				<button type="button" class="btn btn-outline-primary btn-sm">Max</button>
				<button type="button" class="btn btn-outline-primary btn-sm">1/2</button>
				<button type="button" class="btn btn-outline-primary btn-sm">1/4</button>
				</div>
	        </div>
					  <div class="form-group">
		      <label for="inputselltotalsteem">Total</label>
		      <input type="number" class="form-control" id="selltotalsteem" placeholder="Order total">
			  <div class="text-center text-secondary" style="padding-top: 10px">STEEM BALANCE</div>
	        </div>
		    <div class="text-center">
		    <button type="submit" class="btn btn-outline-danger">Place Sell Order</button>
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
	<canvas id="marketOrdersChart" height="125" class="orderbook-chart"></canvas>
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
    <tr>
      <td>34513</td>
      <td>34513</td>
      <td>.22</td>
      <td><button class="btn btn-outline-danger btn-sm" type="submit">Sell</button></td>
    </tr>
    <tr>
      <td>6826</td>
      <td>6826</td>
      <td>.21</td>
      <td><button class="btn btn-outline-danger btn-sm" type="submit">Sell</button></td>
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
    <tr>
      <td>7657</td>
      <td>7657 </td>
      <td>.23</td>
      <td><button class="btn btn-outline-success btn-sm" type="submit">Buy</button></td>
    </tr>
    <tr>
      <td>5632</td>
      <td>5632 </td>
      <td>.24</td>
      <td><button class="btn btn-outline-success btn-sm" type="submit">Buy</button></td>
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
    <tr>
      <td>1 Hour Ago</td>
      <td>.225</td>
      <td>332</td>
      <td>332</td>
    </tr>
    <tr>
      <td>2 Hours Ago</td>
      <td>.224</td>
      <td>998</td>
      <td>998</td>
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
      <th scope="col">HASH</th>
      <th scope="col">BLOCK</th>
      <th scope="col">USER</th>
      <th scope="col">ACTION</th>
    </tr>
    <tr>
      <td>f4ef62eaa6dd5498e3b593497fd1eb76b2773d19</td>
      <td>32100072</td>
      <td>@disregardfiat</td>
      <td>report has been processed</td>
    </tr>
    <tr>
      <td>370534d95d25a223eee8080c12487fc32c7dc502</td>
      <td>32086802</td>
      <td>@chrismgiles</td>
      <td>bought 45.454 DLUX with 0.010 STEEM</td>
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
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mod/footer.php";
   include_once($path);
?>
	
<script>
// populate the price chart	
    var historicPriceSteem = document.getElementById('historicPriceChart').getContext('2d');
	
    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Helvetica';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#FFF';

    var priceChartSteem = new Chart(historicPriceSteem, {
		
      type:'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
        labels:['Boston', 'Worcester', 'Springfield', 'Lowell', 'Cambridge', 'New Bedford'],
        datasets:[{
          label:'Price',
          data:[
            117594,
            181045,
            153060,
            106519,
            105162,
            95072
          ],
		  pointRadius: 0,
          borderWidth:3,
          borderColor:'rgba(75, 0, 255, .5',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
		responsive: true,
        title:{
          display:true,
          text:'DLUX: 0.22 STEEM',
          fontSize:40,
		  fontColor:'#000',
        },
        legend:{
          display:false,
          position:'right',
          labels:{
            fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:-10,
            right:0,
            bottom:-10,
            top:0
          }
        },
        tooltips:{
          enabled:true
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
    var marketOrdersSteem = document.getElementById('marketOrdersChart').getContext('2d');
	var gradientGrnSteem = marketOrdersSteem.createLinearGradient(0, 0, 0, 400);
	gradientGrnSteem.addColorStop(0, 'rgba(90, 216, 154, 1)');   
	gradientGrnSteem.addColorStop(1, 'rgba(90, 216, 154, 0)');
	
	var gradientRedSteem = marketOrdersSteem.createLinearGradient(0, 0, 0, 400);
	gradientRedSteem.addColorStop(0, 'rgba(226, 94, 94, 1)');   
	gradientRedSteem.addColorStop(1, 'rgba(226, 94, 94, 0)');
	
    var buySellChartSteem = new Chart(marketOrdersSteem, {
      type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
        labels:['Boston', 'Worcester', 'Springfield', 'Lowell', 'Cambridge', 'New Bedford'],
        datasets:[{
          label:'Price',
          data:[
            22.34,
            22.33,
            22.32,
            22.33,
            22.35,
            22.36
          ],
          backgroundColor:[gradientGrnSteem, gradientGrnSteem, gradientGrnSteem, gradientRedSteem, gradientRedSteem, gradientRedSteem],
		  hoverBackgroundColor:[gradientGrnSteem, gradientGrnSteem, gradientGrnSteem, gradientRedSteem, gradientRedSteem, gradientRedSteem],
          hoverBorderWidth:2,
          hoverBorderColor:'#FFCE00'
        }]
      },
      options:{	
		responsive: true,
        title:{
          display:true,
          text:'DLUX-STEEM ORDER BOOK',
          fontSize:25
        },
        legend:{
          display:false,
          position:'right',
          labels:{
          fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:0,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
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
					beginAtZero:false
                },
				gridLines: {
					display: false
				}
			}]
		}
      
      }
    });

</script>
<!--check login-->
<script>checkCookie();iAm(getCookie("user"));</script>
</body>
</html>
