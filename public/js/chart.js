var barCount = 60;
var now = new Date()
var pair = 'HIVE'
var width = 3600000
var initialDateStr = new Date(now - (width * barCount)).toISOString()

var ctx = document.getElementById('chart').getContext('2d');
ctx.canvas.width = 1000;
ctx.canvas.height = 250;

var barData = getHistorical(pair, width, barCount);
function lineData() { return barData.map(d => { return { x: d.x, y: d.c} }) };

function getHistorical(pair, width, bc){
    console.log('fetching history...')
    fetch(`https://token.dlux.io/api/recent/${pair.toUpperCase()}_DLUX?depth=200`)
    .then(res => res.json())
    .then(data => {
        var arr = data.recent_trades
        var bars = []
        var barnum = 1
        let thisbar = []
        const now = Date.now()
        let open = arr[arr.length -1].price, close = arr[arr.length -1].price, high = arr[arr.length -1].price, low = arr[arr.length -1].price, vol = 0
        makechart: for (var i = arr.length -1; i >= 0 ; i--) {
            console.log(now, arr[i].trade_timestamp , (width * (bars.length + 1)) , bars.length , barCount)
            while(!(now - arr[i].trade_timestamp > (width * (bars.length + 1))) && bars.length <= barCount){
                console.log(`len:`, bars.length)
                bars.push({
                        date: new Date(now - (width * (bars.length + 1))),
                        o: parseFloat(close),
                        h: parseFloat(close),
                        l: parseFloat(close),
                        c: parseFloat(close)
                    })
                if(bars.length <= barCount)break makechart
            }
            if(i && now - arr[i-1].trade_timestamp > (width * barnum)){
                thisbar.push(arr[i])
            } else {
                for(var j = thisbar.length - 1; j >= 0; j--){
                    if(j == thisbar.length)close = thisbar[j].price
                    if(j == 0)open = thisbar[j].price
                    if(thisbar[j].price > high)high = thisbar[j].price
                    if(thisbar[j].price < low)low = thisbar[j].price
                }
                bars.push({
                    date: new Date(now - (width * (bars.length + 1))),
                    o: parseFloat(open),
                    h: parseFloat(high),
                    l: parseFloat(low),
                    c: parseFloat(close)
                })
                open = arr[i].price, close = arr[i].price, high = arr[i].price, low = arr[i].price
            }
            barnum++
        }
        console.log(bars)
        while(bars.length <= barCount){
                bars.push({
                        date: new Date(now - (width * (bars.length + 1))),
                        o: parseFloat(close),
                        h: parseFloat(close),
                        l: parseFloat(close),
                        c: parseFloat(close)
                    })
            }
        return bars;
    })
}

var chart = new Chart(ctx, {
	type: 'candlestick',
	data: {
		datasets: [{
			label: `DLUX/${pair}`,
			data: barData,
            color: {
                up: '21ffb5',
                down: '#fb00ff',
                unchanged: '#033efd'
            }
		}]
	}
});

var update = function(pr, wd, bc) {
    pair = pr
    width = wd
    barCount = bc
	chart.config.data.datasets = [
			{
				label: `DLUX/${pair}`,
				data: getHistorical(pair, width, barCount)
			}	
		]

	chart.update();
};


document.getElementById('refreshChart').addEventListener('click', update(pair, width, barCount));
/*
document.getElementById('randomizeData').addEventListener('click', function() {
	barData = getRandomData(initialDateStr, barCount);
	update();
});
*/