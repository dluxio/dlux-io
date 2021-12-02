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
        const now = new Date()
        let open = arr[arr.length -1].price, close = arr[arr.length -1].price, high = arr[arr.length -1].price, low = arr[arr.length -1].price, vol = 0
        makechart: for (var i = arr.length -1; i >= 0 ; i--) {
            console.log(thisbar)
            while(!(now - arr[i].trade_timestamp > (width * (bars.length + 1))) && bars.length <= barCount){
                bars.push({
                        x: now - (width * (bars.length + 1)),
                        o: close,
                        h: close,
                        l: close,
                        c: close
                    })
                if(bars.length <= barCount)break makechart
            }
            if(i && now - arr[i-1].trade_timestamp > (width * barnum)){
                thisbar.push(arr[i])
            } else {
                let open = 0, close = 0, high = 0, low = 0, vol = 0
                for(var j = thisbar.length - 1; j >= 0; j--){
                    if(j == thisbar.length)close = thisbar[j].price
                    if(j == 0)open = thisbar[j].price
                    if(thisbar[j].price > high)high = thisbar[j].price
                    if(thisbar[j].price < low)low = thisbar[j].price
                }
                while(bars.length < barnum - 2){
                    bars.push({
                        x: now - (width * bars.length),
                        o: close,
                        h: close,
                        l: close,
                        c: close
                    })
                }
                bars.push({
                    x: now - (width * (barnum)),
                    o: open,
                    h: high,
                    l: low,
                    c: close
                })
            }
            barnum++
        }
        console.log(bars)
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


document.getElementById('refreshChart').addEventListener('click', update);
/*
document.getElementById('randomizeData').addEventListener('click', function() {
	barData = getRandomData(initialDateStr, barCount);
	update();
});
*/