var barCount = 60;
var now = new Date()
var pair = 'HIVE'
var width = 3600000
var initialDateStr = new Date(now - (width * barCount)).toISOString()

var ctx = document.getElementById('chart').getContext('2d');
ctx.canvas.width = 1000;
ctx.canvas.height = 250;

var barData = getHistorical(pair, width);
function lineData() { return barData.map(d => { return { x: d.x, y: d.c} }) };

function getHistorical(pair, width){
    console.log('fetching history...')
    fetch(`https://token.dlux.io/api/historical/${pair.toUpperCase()}_DLUX?depth=200`)
    .then(res => res.json())
    .then(data => {
        var arr = data.sell
        for (var i = 0; i < arr.length; i++) {
            for(var j = 0; j < data.buy.length; j++){
                if(data.buy[j].trade_timestamp > arr[i].trade_timestamp){
                    arr.splice(i, 0, data.buy.shift())
                    j--
                }
            }
        }
        var bars = []
        var barnum = 1
        let thisbar = []
        const now = new Date()
        for (var i = 0; i < arr.length; i++) {
            while(!(now - arr[1].trade_timestamp > (width * barnum)) && barnum <= barCount){barnum++}
            if(now - arr[1].trade_timestamp > (width * barnum)){
                thisbar.push(arr.shift())
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
                    x: now - (width * (barnum - 1)),
                    o: open,
                    h: high,
                    l: low,
                    c: close
                })
            }
            barnum++
        }
        return arr;
    })
}

var chart = new Chart(ctx, {
	type: 'candlestick',
	data: {
		datasets: [{
			label: `DLUX/${pair}`,
			data: barData
		}]
	}
});

function randomBar(date, lastClose) {
	var open = +randomNumber(lastClose * 0.95, lastClose * 1.05).toFixed(2);
	var close = +randomNumber(open * 0.95, open * 1.05).toFixed(2);
	var high = +randomNumber(Math.max(open, close), Math.max(open, close) * 1.1).toFixed(2);
	var low = +randomNumber(Math.min(open, close) * 0.9, Math.min(open, close)).toFixed(2);
	return {
		x: date.valueOf(),
		o: open,
		h: high,
		l: low,
		c: close
	};

}

function getRandomData(dateStr, count) {
	var date = luxon.DateTime.fromRFC2822(dateStr);
	var data = [randomBar(date, 30)];
	while (data.length < count) {
		date = date.plus({days: 1});
		if (date.weekday <= 5) {
			data.push(randomBar(date, data[data.length - 1].c));
		}
	}
	return data;
}

var update = function() {
	var dataset = chart.config.data.datasets[0];

	// candlestick vs ohlc
	var type = document.getElementById('type').value;
	dataset.type = type;

	// linear vs log
	var scaleType = document.getElementById('scale-type').value;
	chart.config.options.scales.y.type = scaleType;

	// color
	var colorScheme = document.getElementById('color-scheme').value;
	if (colorScheme === 'dlux') {
		dataset.color = {
			up: '21ffb5',
			down: '#fb00ff',
			unchanged: '#033efd',
		};
	} else {
		delete dataset.color;
	}

	// border
	var border = document.getElementById('border').value;
	var defaultOpts = Chart.defaults.elements[type];
	if (border === 'true') {
		dataset.borderColor = defaultOpts.borderColor;
	} else {
		dataset.borderColor = {
			up: defaultOpts.color.up,
			down: defaultOpts.color.down,
			unchanged: defaultOpts.color.up
		};
	}

	// mixed charts
	var mixed = document.getElementById('mixed').value;
	if(mixed === 'true') {
		chart.config.data.datasets = [
			{
				label: 'CHRT - Chart.js Corporation',
				data: barData
			},
			{
				label: 'Close price',
				type: 'line',
				data: lineData()
			}	
		]
	}
	else {
		chart.config.data.datasets = [
			{
				label: 'CHRT - Chart.js Corporation',
				data: barData
			}	
		]
	}

	chart.update();
};

document.getElementById('update').addEventListener('click', update);

document.getElementById('randomizeData').addEventListener('click', function() {
	barData = getRandomData(initialDateStr, barCount);
	update();
});