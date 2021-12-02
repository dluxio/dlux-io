var barCount = 100;
var now = new Date()
var pair = 'HIVE'
var width = 3600000 * 24
var initialDateStr = new Date(now - (width * barCount)).toISOString()

var ctx = document.getElementById('chart').getContext('2d');
ctx.canvas.width = 1000;
ctx.canvas.height = 250;

var barData = getHistorical(pair, width, barCount);
function lineData() { return barData.map(d => { return { x: d.x, y: d.c} }) };

function getHistorical(pair, width, bc){
    const numbars = bc || 100
    const period = width || 3600000 * 24 //days
    console.log('fetching history...')
    promises = [fetch(`https://token.dlux.io/api/recent/${pair.toUpperCase()}_DLUX?depth=200`)]
    promises.push(fetch(`https://token.dlux.io/dex`))
    Promise.all(promises).then(res =>
    Promise.all(res.map(res => res.json()))
    ).then(jsons => {
        const now = new Date().getTime()
        console.log({now})
        var startdate = new Date(now - (period * numbars)).getTime()
        console.log({startdate}, {now})
        var currentBucket = startdate
        const dex = jsons[1], recent = jsons[0]
        const current_block = dex.stats.lastIBlock
        const buckets = Object.keys(dex.markets[pair.toLowerCase()].days)
        buckets.sort(function (a,b){return parseInt(a) - parseInt(b)})
        var bars = [], current = {o:0, h:0, l:0, c:0, v:0}
        for (var i = 0; i < buckets.length; i++) {
            if (new Date(now - (3000 * (current_block - parseInt(buckets[i])))).getTime() > currentBucket) {
                if(!bars.length){
                    while(new Date(now - (3000 * (current_block - parseInt(buckets[i])))).getTime() > currentBucket + period){
                        bars.push({x: currentBucket, o: 0, h: 0, l: 0, c: 0, v: 0})
                        currentBucket = new Date(currentBucket + period).getTime()
                    }
                } else {
                    while(new Date(now - (3000 * (current_block - parseInt(buckets[i])))).getTime() > currentBucket + period){
                        bars.push({x: currentBucket, o: bars[bars.length - 1].c, h: bars[bars.length - 1].c, l: bars[bars.length - 1].c, c: bars[bars.length - 1].c, v: 0})
                        currentBucket = new Date(currentBucket + period).getTime()
                    }
                }
                if(current.o){
                    if(dex.markets[pair.toLowerCase()].days[buckets[i]].t > current.h)current.h = dex.markets[pair.toLowerCase()].days[buckets[i]].t
                    if(dex.markets[pair.toLowerCase()].days[buckets[i]].b < current.l)current.l = dex.markets[pair.toLowerCase()].days[buckets[i]].b
                    current.c = dex.markets[pair.toLowerCase()].days[buckets[i]].c
                    current.v += dex.markets[pair.toLowerCase()].days[buckets[i]].v
                } else {
                    current.o = dex.markets[pair.toLowerCase()].days[buckets[i]].o
                    current.h = dex.markets[pair.toLowerCase()].days[buckets[i]].h
                    current.l = dex.markets[pair.toLowerCase()].days[buckets[i]].l
                    current.c = dex.markets[pair.toLowerCase()].days[buckets[i]].c
                    current.v = dex.markets[pair.toLowerCase()].days[buckets[i]].v
                }
                if(buckets[i+1] && new Date(now - (3000 * (current_block - parseInt(buckets[i+1])))).getTime() > currentBucket + period){
                    bars.push({x: currentBucket, o: current.o, h: current.h, l: current.l, c: current.c, v: current.v})
                    currentBucket = new Date(currentBucket + period).getTime()
                    current.o = 0
                    current.h = current.c
                    current.l = current.c
                    current.v = 0
                } else if (!buckets[i+1]) {
                    bars.push({x: currentBucket, o: current.o, h: current.h, l: current.l, c: current.c, v: current.v})
                }
            } else {
                console.log(new Date(now - (3000 * (current_block - parseInt(buckets[i])))), new Date(currentBucket))
            }
        }
        let items = Object.keys(dex.markets[pair.toLowerCase()].his)
        for (var i = 0; i < items.length; i++) {
            if (new Date(now - (3000 * (current_block - parseInt(items[i].split(':')[0])))).getTime() > currentBucket) {
                if(!bars.length){
                    while(new Date(now - (3000 * (current_block - parseInt(items[i].split(':')[0])))).getTime() > currentBucket + period){
                        bars.push({x: currentBucket, o: 0, h: 0, l: 0, c: 0, v: 0})
                        currentBucket = new Date(currentBucket + period).getTime()
                    }
                } else {
                    while(new Date(now - (3000 * (current_block - parseInt(items[i].split(':')[0])))).getTime() > currentBucket + period){
                        bars.push({x: currentBucket, o: bars[bars.length - 1].c, h: bars[bars.length - 1].c, l: bars[bars.length - 1].c, c: bars[bars.length - 1].c, v: 0})
                        currentBucket = new Date(currentBucket + period).getTime()
                    }
                }
                if(current.o){
                    if(dex.markets[pair.toLowerCase()].his[items[i]].price > current.h)current.h = dex.markets[pair.toLowerCase()].his[items[i]].price
                    if(dex.markets[pair.toLowerCase()].his[items[i]].price < current.l)current.l = dex.markets[pair.toLowerCase()].his[items[i]].price
                    current.c = dex.markets[pair.toLowerCase()].his[items[i]].price
                    current.v += dex.markets[pair.toLowerCase()].his[items[i]].target_vol
                } else {
                    current.o = dex.markets[pair.toLowerCase()].his[items[i]].price
                    current.h = dex.markets[pair.toLowerCase()].his[items[i]].price
                    current.l = dex.markets[pair.toLowerCase()].his[items[i]].price
                    current.c = dex.markets[pair.toLowerCase()].his[items[i]].price
                    current.v = dex.markets[pair.toLowerCase()].his[items[i]].varget_vol
                }
                if(items[i+1] && new Date(now - (3000 * (current_block - parseInt(items[i+1].split(':')[0])))).getTime() > currentBucket + period){
                    bars.push({x: currentBucket, o: current.o, h: current.h, l: current.l, c: current.c, v: current.v})
                    currentBucket = new Date(currentBucket + period).getTime()
                    current.o = 0
                    current.h = current.c
                    current.l = current.c
                    current.v = 0
                } else if (!items[i+1]) {
                    bars.push({x: currentBucket, o: current.o, h: current.h, l: current.l, c: current.c, v: current.v})
                }
            } else {
                console.log(new Date(now - (3000 * (current_block - parseInt(buckets[i])))), new Date(currentBucket))
            }
        }
        console.log(bars)
        return bars
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