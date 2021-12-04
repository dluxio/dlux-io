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
    return new Promise(function(resolve, reject) {
    const numbars = bc || 100
    const period = width || 3600000 * 24 //days
    promises = [fetch(`https://token.dlux.io/dex`)]
    Promise.all(promises).then(res =>
    Promise.all(res.map(res => res.json()))
    ).then(jsons => {
        const now = new Date().getTime()
        var startdate = new Date(now - (period * numbars)).getTime()
        var currentBucket = startdate
        const dex = jsons[0]
        const current_block = dex.stats.lastIBlock
        const buckets = Object.keys(dex.markets[pair.toLowerCase()].days)
        buckets.sort(function (a,b){return parseInt(a) - parseInt(b)})
        var bars = [], current = {o:0, h:0, l:0, c:0, v:0}
        for (var i = 0; i < buckets.length; i++) {
            if (new Date(now - (3000 * (current_block - parseInt(buckets[i])))).getTime() > currentBucket) {
                if(!bars.length){
                    while(new Date(now - (3000 * (current_block - parseInt(buckets[i])))).getTime() > currentBucket + period){
                        bars.push({
                            x: currentBucket, 
                            o: dex.markets[pair.toLowerCase()].days[buckets[i]].c, 
                            h: dex.markets[pair.toLowerCase()].days[buckets[i]].c, 
                            l: dex.markets[pair.toLowerCase()].days[buckets[i]].c, 
                            c: dex.markets[pair.toLowerCase()].days[buckets[i]].c, 
                            v: 0})
                        currentBucket = new Date(currentBucket + period).getTime()
                    }
                } else {
                    while(new Date(now - (3000 * (current_block - parseInt(buckets[i])))).getTime() > currentBucket + period){
                        bars.push({x: currentBucket, o: bars[bars.length - 1].c, h: bars[bars.length - 1].c, l: bars[bars.length - 1].c, c: bars[bars.length - 1].c, v: 0})
                        currentBucket = new Date(currentBucket + period).getTime()
                    }
                }
                if(current.v){
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
                    current.o = current.c
                    current.h = current.c
                    current.l = current.c
                    current.v = 0
                } else if (!buckets[i+1]) {
                    bars.push({x: currentBucket, o: current.o, h: current.h, l: current.l, c: current.c, v: current.v})
                }
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
                    if(parseFloat(dex.markets[pair.toLowerCase()].his[items[i]].price) > current.h)current.h = parseFloat(dex.markets[pair.toLowerCase()].his[items[i]].price)
                    if(parseFloat(dex.markets[pair.toLowerCase()].his[items[i]].price) < current.l)current.l = parseFloat(dex.markets[pair.toLowerCase()].his[items[i]].price)
                    current.c = parseFloat(dex.markets[pair.toLowerCase()].his[items[i]].price)
                    current.v += parseFloat(dex.markets[pair.toLowerCase()].his[items[i]].target_vol)
                } else {
                    current.o = parseFloat(dex.markets[pair.toLowerCase()].his[items[i]].price)
                    current.h = parseFloat(dex.markets[pair.toLowerCase()].his[items[i]].price)
                    current.l = parseFloat(dex.markets[pair.toLowerCase()].his[items[i]].price)
                    current.c = parseFloat(dex.markets[pair.toLowerCase()].his[items[i]].price)
                    current.v = parseFloat(dex.markets[pair.toLowerCase()].his[items[i]].target_vol)
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
            }
        }
        console.log('Chart data:', bars)
        resolve(bars)
    })
    .catch(e=>reject(e))
})
}
var chart
barData.then(bars=>{
    chart = new Chart(ctx, {
	type: 'candlestick',
	data: {
		datasets: [{
			label: `DLUX/${pair}`,
			data: bars,
            color: {
                up: '#21ffb5',
                down: '#fb00ff',
                unchanged: '#033efd'
            }
		}]
	}
});
})

var updateChart = function(pr, wd, bc) {
    pair = pr || pair
    width = wd || width
    barCount = bc || barCount
    console.log({pair, width, barCount})
    getHistorical(pair, width, barCount).then(bars=>{
        chart.config.data.datasets = [
			{
				label: `DLUX/${pair}`,
				data: bars,
                color: {
                    up: '#21ffb5',
                    down: '#fb00ff',
                    unchanged: '#033efd'
                }
			}	
		]

	chart.update();
    })
};


document.getElementById('refreshChart').addEventListener('click', ()=>{updateChart(pair, width, barCount)});
document.getElementById('buyhive').addEventListener('click', ()=>{updateChart('HIVE', width, barCount)});
document.getElementById('buyhbd').addEventListener('click', ()=>{updateChart('HBD', width, barCount)});
document.getElementById('hourbtn').addEventListener('click', ()=>{updateChart(pair, 180000, 120)});
document.getElementById('daybtn').addEventListener('click', ()=>{updateChart(pair, 15 * 60000, 96)});
document.getElementById('weekbtn').addEventListener('click', ()=>{updateChart(pair, 120 * 60000, 98)});
document.getElementById('monthbtn').addEventListener('click', ()=>{updateChart(pair, 6 * 60 * 60000, 120)});
document.getElementById('yearbtn').addEventListener('click', ()=>{updateChart(pair, 3 * 24 *60 * 60000, 120)});