<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - LARYNX DEX</title>
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/header.php";
include_once( $path );
?>
<script src="https://cdn.jsdelivr.net/npm/luxon@1.26.0"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.1/dist/chart.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@1.0.0"></script> 
<script type="text/javascript" src="/js/chartf.js"></script>
<style>
.col-sort {
    background-color: cornflowerblue;
    color: #282828;
}
input.disabled-input {
    pointer-events: none;
    background-color: #e9ecef;
    opacity: 1;
}
.r-radius-hotfix {
    border-top-right-radius: 0.25rem !important;
    border-bottom-right-radius: 0.25rem !important;
}
.l-radius-hotfix {
    border-top-left-radius: 0.25rem !important;
    border-bottom-left-radius: 0.25rem !important;
}
.tbody-scroll-orders {
    display:block;
    height:400px;
    overflow:auto;
}
.tbody-scroll-history {
    display:block;
    height:600px;
    overflow:auto;
}
.tbody-scroll-nodes {
    display:block;
    height:600px;
    overflow:auto;
}
thead, tbody tr {
    display:table;
    width:100%;
    table-layout:fixed;
}


</style>
<script type="module">
  import { createApp } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
  let user = localStorage.getItem('user') || 'GUEST'
  let lapi = localStorage.getItem('lapi') || 'https://spkinstant.hivehoneycomb.com'
  let hapi = localStorage.getItem('hapi') || 'https://api.hive.blog'


  createApp({
    data() {
      return {
        nowtime: new Date().getTime(),
        agoTime: new Date().getTime() - 86400000,
        account: user,
        balance: "0.000",
        bartoken: "",
        barhive: "",
        barhbd: "",
        bargov: "",
        barpow: "",
        lapi: lapi,
        hapi: hapi,
        accountapi: {},
        hiveprice: {
          hive: {
            usd: 0
          }
        },
        hbdprice: {
          hive_dollar: {
            usd: 0
          }
        },
        nodes: {},
        runners: [],
        runnersSearch: [],
        marketnodes: {},
        hivebuys: [],
        hivesells: [],
        hbdbuys: [],
        hbdsells: [],
        dexapi: {},
        prefix: '',
        multisig: '',
        jsontoken: '',
        node: '',
        behind: '',
        stats: {},
        behindTitle: '',
        TOKEN: 'LARYNX',
        bform: {
          cl: false,
          tl: false,
          pl: true,
        },
        sform: {
          cl: false,
          tl: false,
          pl: true,
        },
        buyHiveTotal: 0,
        buyPrice: 0,
        sellPrice: 0,
        buyHBDTotal: 0,
        sellHiveTotal: 0,
        sellHBDTotal: 0,
        buyQuantity: 0,
        sellQuantity: 0,
        buyHours: 720,
        sellHours: 720,
        volume:{
          hive: 0,
          hbd: 0,
          token_hive: 0,
          token_hbd: 0,
          hive_usd: 0,
          hbd_usd: 0
        },
        recenthive: {},
        recenthbd: {},
        openorders: [],
        orders: {
          filleda: false,
          filledd: false,
          blocka: false,
          blockd: true,
          coina: false,
          coind: false,
          tokena: false,
          tokend: false,
          ratea: false,
          rated: false,
          typea: false,
          typed: false
        },
        accountinfo: {},
        filterusers: {
          checked: true,
          value: '',
        },
        filteraccount: {
          checked: false,
          value: '',
          usera: false,
          userd: false,
          gova: false,
          govd: true,
          apia: false,
          apid: false
        },
        buyhive: {
          checked: true
        },
        buyhbd: {
          checked: false
        },
        buylimit: {
          checked: true
        },
        buymarket: {
          checked: false
        },
        selllimit: {
          checked: true
        },
        sellmarket: {
          checked: false
        },
      }
    },
    methods: {
      bcalc(k){
        switch(k){
          case 't':
          this.buyQuantity = parseFloat(this.buyQuantity)
            if(this.bform.cl){
              if(this.buyhive.checked)this.buyPrice = (this.buyHiveTotal / this.buyQuantity).toFixed(6)
              else this.buyPrice = (this.buyHBDTotal / this.buyQuantity).toFixed(6)
            } else {
              if(this.buyhive.checked)this.buyHiveTotal = (this.buyPrice * this.buyQuantity).toFixed(3)
              else this.buyHBDTotal = (this.buyPrice * this.buyQuantity).toFixed(3)
            }
            break;
          case 'p':
            this.buyPrice = parseFloat(this.buyPrice)
            if(this.bform.cl){
              if(this.buyhive.checked)this.buyQuantity = (this.buyHiveTotal / this.buyPrice).toFixed(3)
              else this.buyQuantity = (this.buyHBDTotal / this.buyPrice).toFixed(3)
            } else {
              if(this.buyhive.checked)this.buyHiveTotal = (this.buyPrice * this.buyQuantity).toFixed(3)
              else this.buyHBDTotal = (this.buyPrice * this.buyQuantity).toFixed(3)
            }
            break;
          case 'c':
            if(this.buyhive.checked)this.buyHiveTotal = parseFloat(this.buyHiveTotal)
            else this.buyHBDTotal = parseFloat(this.buyHBDTotal)
            if(this.buylimit.checked){
              if(this.bform.pl){
                if(this.buyhive.checked)this.buyQuantity = (this.buyHiveTotal / this.buyPrice).toFixed(3)
                else this.buyQuantity = (this.buyHBDTotal / this.buyPrice).toFixed(3)
              } else {
                if(this.buyhive.checked)this.buyPrice = (this.buyHiveTotal / this.buyQuantity).toFixed(6)
                else this.buyPrice = (this.buyHBDTotal / this.buyQuantity).toFixed(6)
              }
            }
            break;
          default:
        }
      },
      scalc(k){
        switch(k){
          case 't':
            this.sellQuantity = parseFloat(this.sellQuantity)
            if(this.sform.cl){
              if(this.buyhive.checked)this.sellPrice = (this.sellHiveTotal / this.sellQuantity).toFixed(6)
              else this.sellPrice = (this.sellHBDTotal / this.sellQuantity).toFixed(6)
            } else {
              if(this.buyhive.checked)this.sellHiveTotal = (this.sellPrice * this.sellQuantity).toFixed(3)
              else this.sellHBDTotal = (this.sellPrice * this.sellQuantity).toFixed(3)
            }
            break;
          case 'p':
            this.sellPrice = parseFloat(this.sellPrice)
            if(this.sform.cl){
              if(this.buyhive.checked)this.sellQuantity = (this.sellHiveTotal / this.sellPrice).toFixed(3)
              else this.sellQuantity = (this.sellHBDTotal / this.sellPrice).toFixed(3)
            } else {
              if(this.buyhive.checked)this.sellHiveTotal = (this.sellPrice * this.sellQuantity).toFixed(3)
              else this.sellHBDTotal = (this.sellPrice * this.sellQuantity).toFixed(3)
            }
            break;
          case 'c':
            if(this.buyhive.checked)this.sellHiveTotal = parseFloat(this.sellHiveTotal)
            else this.sellHBDTotal = parseFloat(this.sellHBDTotal)
            if(this.selllimit.checked){
              if(this.sform.pl){
                if(this.buyhive.checked)this.sellQuantity = (this.sellHiveTotal / this.sellPrice).toFixed(3)
                else this.sellQuantity = (this.sellHBDTotal / this.sellPrice).toFixed(3)
              } else {
                if(this.buyhive.checked)this.sellPrice = (this.sellHiveTotal / this.sellQuantity).toFixed(6)
                else this.sellPrice = (this.sellHBDTotal / this.sellQuantity).toFixed(6)
              }
            }
            break;
          default:
        }
      },
      block(o){
        switch(o){
          case 't':
            this.bform.tl = !this.bform.tl
            this.bform.cl = false
            this.bform.pl = !this.bform.tl
            break;
          case 'c':
            this.bform.cl = !this.bform.cl
            this.bform.tl = false
            this.bform.pl = !this.bform.cl
            break;
          case 'p':
            this.bform.pl = !this.bform.pl
            this.bform.cl = !this.bform.pl
            this.bform.tl = false
            break;
          default:
            this.bform.cl = false
            this.bform.tl = false
            this.bform.pl = true
            break;
        }
      },
      slock(o){
        switch(o){
          case 't':
            this.sform.tl = !this.sform.tl
            this.sform.cl = false
            this.sform.pl = !this.sform.tl
            break;
          case 'c':
            this.sform.cl = !this.sform.cl
            this.sform.tl = false
            this.sform.pl = !this.sform.cl
            break;
          case 'p':
            this.sform.pl = !this.sform.pl
            this.sform.cl = !this.sform.pl
            this.sform.tl = false
            break;
          default:
            this.sform.cl = false
            this.sform.tl = false
            this.sform.pl = true
            break;
        }
      },
      toFixed(value, decimals) {
        return Number(value).toFixed(decimals)
      },
      parseFloat(value) {
        return parseFloat(value)
      },
      toUpperCase(value) {
        return value.toUpperCase()
      },
      togglecoin(coin) {
        this.buyhive.checked = coin == 'hive' ? true : false
        this.buyhbd.checked = coin == 'hbd' ? true : false
        if(coin == 'hive') {
          this.buyPrice = this.hivesells[0].rate
          this.sellPrice = this.hivebuys[0].rate
        } else {
          this.buyPrice = this.hbdsells[0].rate
          this.sellPrice = this.hbdbuys[0].rate
        }
      },
      togglebuylimit(type) {
        this.buylimit.checked = type == 'limit' ? true : false
        this.buymarket.checked = type == 'market' ? true : false
      },
      toggleselllimit(type) {
        this.selllimit.checked = type == 'limit' ? true : false
        this.sellmarket.checked = type == 'market' ? true : false
      },
      toggleAPI(ip) {
        this.filteraccount.usera = ip == 'usera' ? true : false
        this.filteraccount.userd = ip == 'userd' ? true : false
        this.filteraccount.apia = ip == 'apia' ? true : false
        this.filteraccount.apid = ip == 'apid' ? true : false
        this.filteraccount.gova = ip == 'gova' ? true : false
        this.filteraccount.govd = ip == 'govd' ? true : false
      },
      toggleOrders(ip) {
        this.orders.blocka = ip == 'blocka' ? true : false
        this.orders.blockd = ip == 'blockd' ? true : false
        this.orders.coina = ip == 'coina' ? true : false
        this.orders.coind = ip == 'coind' ? true : false
        this.orders.tokena = ip == 'tokena' ? true : false
        this.orders.tokend = ip == 'tokend' ? true : false
        this.orders.ratea = ip == 'ratea' ? true : false
        this.orders.rated = ip == 'rated' ? true : false
        this.orders.typea = ip == 'typea' ? true : false
        this.orders.typed = ip == 'typed' ? true : false
        this.orders.filleda = ip == 'filleda' ? true : false
        this.orders.filledd = ip == 'filledd' ? true : false
      },
      setValue(key, value) {
        if(key.split('.').length > 1) {
          let keys = key.split('.')
          let obj = this[keys[0]]
          for(let i = 1; i < keys.length; i++) {
            if(i == keys.length - 1) {
              obj[keys[i]] = value
            } else {
              obj = obj[keys[i]]
            }
          }
        } else {
          this[key] = value
        }
      },
      atref(key) {
        return `/@${key}`
      },
      setMem(key, value, reload) {
        if(value.indexOf('https://') == -1) {
          alert('https:// is required for security reasons')
          return
        } else if(value[value.length - 1] == '/'){
          value = value.substring(0, value.length - 1)
        }
        localStorage.setItem(key, value)
        if (reload) {
          location.reload()
        }
      },
      sort(item, key, method){
        switch(method){
          case 'asc':
            this[item].sort((a, b) => {
              return a[key] < b[key] ? -1 : 1
            })
            break;
          case 'desc':
          default:
            this[item].sort((a, b) => {
              return a[key] > b[key] ? -1 : 1
            })
        }
      },
      focus(id){
        document.getElementById(id).focus()
      },
      searchRunners(){
        const term = this.filteraccount.value
        if(term){
          this.filteraccount.checked = true
          this.filteraccount.value = term
          this.filterusers.checked = false
          this.filterusers.value = ''
          this.runnersSearch = this.runners.reduce((acc, runner) => {
          if(runner.account.toLowerCase().includes(term.toLowerCase())){
            acc.push(runner)
          } else if (runner.api.toLowerCase().includes(term.toLowerCase())){
            acc.push(runner)
          }
          return acc
        }, [])
        } else {
          this.filteraccount.checked = false
          this.filteraccount.value = ''
          this.filterusers.checked = true
          this.filterusers.value = ''
        }
      },
      buyDEX(hive, hbd, dlux, hours, prefix = 'dlux_', callback){
        if(document.getElementById('buyform').classList.contains('needs-validation')){
          return
        }
        var token, msaccount, statusapi
        switch (prefix){
            case 'spkcc_':
                token = 'LARYNX'
                msaccount = 'spk-cc'
                statusapi = 'spkinstant.hivehoneycomb.com'
                break;
            default:
                token = 'DLUX'
                msaccount = 'dlux-cc'
        }
        dlux = parseInt(parseFloat(dlux)*1000)
        hive = parseInt(parseFloat(hive)*1000)
        hbd = parseInt(parseFloat(hbd)*1000)
        var andthen = ' at market rate', rate = undefined, hours = 720
        if (dlux){
            rate = parseFloat((hive? hive : hbd)/dlux).toFixed(6)
            andthen = ` at ${rate} ${hive?'HIVE':'HBD'} per ${token}`
        }
        if(this.buyhive.checked && hive) broadcastTransfer({ to: msaccount, hive, memo:JSON.stringify({rate, hours})}, `Buying ${token} with ${parseFloat((hive||hbd)/1000).toFixed(3)} ${hive?'HIVE':'HBD'} ${andthen}`, statusapi)
        else if (!this.buyhive.checked && hbd)broadcastTransfer({ to: msaccount, hbd, memo:JSON.stringify({rate, hours})}, `Buying ${token} with ${parseFloat((hive||hbd)/1000).toFixed(3)} ${hive?'HIVE':'HBD'} ${andthen}`, statusapi)
      },
      sellDEX(dlux, hive, hbd, hours, prefix = 'dlux_', callback){
        if(document.getElementById('sellform').classList.contains('needs-validation')){
          return
        }
        var token, statusapi
        switch (prefix){
            case 'spkcc_':
                token = 'LARYNX'
                statusapi = 'spkinstant.hivehoneycomb.com'
                break;
            default:
                token = 'DLUX'
        }
        var andthen = ' at market rate'
        dlux = parseInt(parseFloat(dlux)*1000)
        hive = parseInt(parseFloat(hive)*1000)
        hbd = parseInt(parseFloat(hbd)*1000)
        hours = parseInt(hours)
        if (hive || hbd){
            const price = parseFloat(dlux/(hive? hive : hbd)).toFixed(6)
            andthen = ` at ${price} ${hive?'HIVE':'HBD'} per ${token}`
        }
        if(this.buyhive.checked && dlux) broadcastCJA({ [this.TOKEN.toLocaleLowerCase()]:dlux, hive, hours}, `${prefix}dex_sell`, `Selling ${parseFloat(dlux/1000).toFixed(3)} ${token}${andthen}`, statusapi)
        else if (!this.buyhive.checked && dlux) broadcastCJA({ [this.TOKEN.toLocaleLowerCase()]:dlux, hbd, hours}, `${prefix}dex_sell`, `Selling ${parseFloat(dlux/1000).toFixed(3)} ${token}${andthen}`, statusapi)
      },
      cancelDEX(txid, prefix = 'dlux_') {
        var token, statusapi
        switch (prefix){
          case 'spkcc_':
              token = 'LARYNX'
              statusapi = 'spkinstant.hivehoneycomb.com'
              break;
          default:
              token = 'DLUX'
        }
        var txidstring = txid
        if (typeof txid === 'array'){
            txidstring = txid.join(',')
        }
        if(txid)broadcastCJA({ txid}, `${prefix}dex_clear`, `Canceling: ${txidstring}`, statusapi)
      }
    },
    mounted() {
      fetch('https://api.coingecko.com/api/v3/simple/price?ids=hive&amp;vs_currencies=usd')
        .then(response => response.json())
        .then(data => {
          this.hiveprice = data
        })
      fetch('https://api.coingecko.com/api/v3/simple/price?ids=hive_dollar&amp;vs_currencies=usd')
        .then(response => response.json())
        .then(data => {
          this.hbdprice = data
        })
      fetch(this.lapi + '/runners')
        .then(response => response.json())
        .then(data => {
          this.runners = data.result.sort((a,b) => {return b.g - a.g})
        })
      fetch(this.lapi + '/markets')
        .then(response => response.json())
        .then(data => {
          this.nodes = data.markets.node
          this.stats = data.stats
        })
      fetch(this.lapi + '/api/protocol')
        .then(response => response.json())
        .then(data => {
          this.prefix = data.prefix
          this.multisig = data.multisig
          this.jsontoken = data.jsontoken
          this.TOKEN = data.jsontoken.toUpperCase()
          this.node = data.node
          this.behind = data.behind
          this.behindTitle = data.behind + ' Blocks Behind Hive'
          fetch(this.lapi + '/api/recent/HIVE_' + this.TOKEN + '?limit=1000')
            .then(response => response.json())
            .then(data => {
              this.volume.hive = data.recent_trades.reduce((a, b) => {
                if(b.trade_timestamp > this.agoTime)return a + parseInt(parseFloat(b.target_volume) * 1000)
                else return a
                }, 0) / 1000
              this.volume.token_hive = data.recent_trades.reduce((a, b) => {
                if(b.trade_timestamp > this.agoTime)return a + parseInt(parseFloat(b.base_volume) * 1000)
                else return a
                }, 0) / 1000
              this.recenthive = data.recent_trades.sort((a, b) => {
                return parseInt(b.trade_timestamp) - parseInt(a.trade_timestamp)
              })
            })
          fetch(this.lapi + '/api/recent/HBD_' + this.TOKEN +'?limit=1000')
            .then(response => response.json())
            .then(data => {
              this.volume.hbd = data.recent_trades.reduce((a, b) => {
                if(b.trade_timestamp > this.agoTime)return a + parseInt(parseFloat(b.target_volume) * 1000)
                else return a
                }, 0) / 1000
              this.volume.token_hbd = data.recent_trades.reduce((a, b) => {
                if(b.trade_timestamp > this.agoTime)return a + parseInt(parseFloat(b.base_volume) * 1000)
                else return a
                }, 0) / 1000
              this.recenthbd = data.recent_trades.sort((a, b) => {
                return parseInt(b.trade_timestamp) - parseInt(a.trade_timestamp)
              })
            })
        })
      fetch(this.lapi + '/dex')
        .then(response => response.json())
        .then(data => {
          this.hivebuys = data.markets.hive.buys.sort(function(a, b) {
            return parseFloat(b.rate) - parseFloat(a.rate)
          }).reduce((acc, cur) => {
            if(!acc.length || acc[acc.length-1].rate != cur.rate) {
              cur.total = cur.hive + (acc[acc.length-1]?.total || 0)
              acc.push(cur)
            } else {
              acc[acc.length-1].total = cur.hive + acc[acc.length-1].total
              acc[acc.length-1].hive = cur.hive + acc[acc.length-1].hive
              acc[acc.length-1].amount = cur.amount + acc[acc.length-1].amount
            }
            return acc
          }, [])
          this.hivesells = data.markets.hive.sells.sort(function(a, b) {
            return parseFloat(a.rate) - parseFloat(b.rate)
          }).reduce((acc, cur) => {
            if(!acc.length || acc[acc.length-1].rate != cur.rate) {
              cur.total = cur.hive + (acc[acc.length-1]?.total || 0)
              acc.push(cur)
            } else {
              acc[acc.length-1].total = cur.hive + acc[acc.length-1].total
              acc[acc.length-1].hive = cur.hive + acc[acc.length-1].hive
              acc[acc.length-1].amount = cur.amount + acc[acc.length-1].amount
            }
            return acc
          }, [])
          this.hbdbuys = data.markets.hbd.buys.sort(function(a, b) {
            return parseFloat(b.rate) - parseFloat(a.rate)
          }).reduce((acc, cur) => {
            if(!acc.length || acc[acc.length-1].rate != cur.rate) {
              cur.total = cur.hbd + (acc[acc.length-1]?.total || 0)
              acc.push(cur)
            } else {
              acc[acc.length-1].total = cur.hbd + acc[acc.length-1].total
              acc[acc.length-1].hbd = cur.hbd + acc[acc.length-1].hbd
              acc[acc.length-1].amount = cur.amount + acc[acc.length-1].amount
            }
            return acc
          }, [])
          this.hbdsells = data.markets.hbd.sells.sort(function(a, b) {
            return parseFloat(a.rate) - parseFloat(b.rate)
          }).reduce((acc, cur) => {
            if(!acc.length || acc[acc.length-1].rate != cur.rate) {
              cur.total = cur.hbd + (acc[acc.length-1]?.total || 0)
              acc.push(cur)
            } else {
              acc[acc.length-1].total = cur.hbd + acc[acc.length-1].total
              acc[acc.length-1].hbd = cur.hbd + acc[acc.length-1].hbd
              acc[acc.length-1].amount = cur.amount + acc[acc.length-1].amount
            }
            return acc
          }, [])
          this.dexapi = data
          if(this.hivesells[0])this.buyPrice = this.hivesells[0].rate
          if(this.hivebuys[0])this.sellPrice = this.hivebuys[0].rate
        })
      if(user != 'GUEST')fetch(this.lapi + '/@' + user)
        .then(response => response.json())
        .then(data => {
          this.balance = (data.balance/1000).toFixed(3)
          this.bartoken = this.balance
          this.barpow = ((data.poweredUp + data.granted - data.granting)/1000).toFixed(3)
          this.bargov = (data.gov/1000).toFixed(3)
          this.accountapi = data
          console.log(data.contracts)
          this.openorders = data.contracts
            .reduce((acc, cur) => {
              cur.nai = `${cur.type.split(':')[0] == 'hive' ? parseFloat(cur.hive/1000).toFixed(3) : parseFloat(cur.hbd/1000).toFixed(3)} ${cur.type.split(':')[0] == 'hive' ? 'HIVE' : 'HBD'}`
              if(cur.partials && cur.partials.length && cur.type.split(':')[1] == 'sell') {
                const filled = cur.partials.reduce(function (a, c) {
                  return a + c.coin
                  }, 0)
                cur.percentFilled = parseFloat(100 * filled / (cur.hive ? cur.hive : cur.hbd + filled)).toFixed(2)
                acc.push(cur)
              } else if (cur.partials && cur.partials.length){
                const filled = cur.partials.reduce(function (a, c) {
                  return a + c.token
                  }, 0)
                cur.percentFilled = parseFloat(100 * filled / (cur.amount + filled)).toFixed(2)
                acc.push(cur)
              } else {
                cur.percentFilled = "0.00"
                acc.push(cur)
              }
              console.log({acc})
              return acc
            }, [])
        })
      if(user != 'GUEST')fetch(hapi, {
          body: `{"jsonrpc":"2.0", "method":"condenser_api.get_accounts", "params":[["${user}"]], "id":1}`,
          headers: {
            "Content-Type": "application/x-www-form-urlencoded"
          },
          method: "POST"
        })
        .then(response => response.json())
        .then(data => {
          this.accountinfo = data.result[0]
          this.barhive = this.accountinfo.balance
          this.barhbd = this.accountinfo.hbd_balance
        })
    },
    computed: {
      minbuy:{
        get() {
          return parseFloat(parseFloat(parseFloat(this.buyPrice/1000).toFixed(3))+0.001).toFixed(3)
        }
      },
      minsell:{
        get() {
          return parseFloat(parseFloat(parseFloat(this.sellPrice).toFixed(3))+0.001).toFixed(3)
        }
      },
      maxhbuy:{
        get() {
          return (this.dexapi.hive.tick * (this.stats.dex_max/100) * (1 - (this.stats.dex_slope/100))) * this.stats.safetyLimit/1000).toFixed(3)
        }
      },
      maxdbuy:{
        get() {
          return (this.dexapi.hbd.tick * (this.stats.dex_max/100) * (1 - (this.stats.dex_slope/100))) * this.stats.safetyLimit/1000).toFixed(3)
        }
      },
      marketCap:{
        get() {
          if(this.buyhive.checked)return `$${parseFloat((this.stats.tokenSuply/1000) * this.hiveprice.hive.usd * this.dexapi.hive.tick)}`
          else return `$${parseFloat((this.stats.tokenSuply/1000) * this.hbdprice.hive_dollar.usd * this.dexapi.hbd.tick)}`
        }
      }
    }
  }).mount('#app')
  
</script>
</head>
<body class="d-flex flex-column bg-darker text-white h-100 padme-t70" id="index">
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/nav.php";
include_once( $path );
?>
<div id="app">
<main role="main" class="flex-shrink-0 text-white">
  <div class="container-fluid px-0 ">
    <div class="container-fluid fixed-top bg-dark px-0" style="margin-top: 66px; z-index: 900;">
      <div class="d-flex flex-column justify-content-between align-items-center px-3 py-1" style="background-color: black;">
        <div class="d-flex align-itmes-center justify-content-between w-100">
          <div class="d-flex align-itmes-center">
            <div class="dropdown show"> <a class="btn btn-sm btn-dark dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Token </a>
              <div class="dropdown-menu">
                <h6 class="dropdown-header">HIVE / HBD</h6>
                <div class="dropdown-divider bg-light"></div>
                <a class="dropdown-item" href="/dex/dlux">DLUX</a> <a class="dropdown-item" href="/dex/larynx">LARYNX</a></div>
            </div>
            <div class="d-flex" :title="behindTitle">
              <button class="text-center btn btn-sm align-items-center ml-4" 
						 :class="{'btn-outline-success':'behind < 30'}" 
             :class="{'btn-outline-warning':'behind >= 30 && behind < 60'}"
             :class="{'btn-outline-danger':'behind >= 60'}"	
						type="button" data-toggle="collapse" data-target="#nodedrawer" aria-expanded="false" aria-controls="nodedrawer">
				  <span class="small p-0 m-0"><i class="fas fa-circle mr-2"></i>{{ TOKEN }} | </span>
				  <span class="small p-0 m-0" v-show="behind < 30">ONLINE</span>
				  <span class="small p-0 m-0" v-show="behind >= 30 && behind <=100">LAGGING</span>
				  <span class="small p-0 m-0" v-show="behind > 100">OFFLINE</span>
				  <span class="small p-0 m-0"> | {{behind}} BBH | {{runners.length}} NODES</span></button>
            </div>
          </div>
          <div class="d-flex align-items-center text-white-50">
            <div id="userdlux" class="mx-4 text-warning">{{bartoken}} {{TOKEN}}</div>
            <div id="userdpwr" class="mx-4 text-primary" v-if="accountapi.poweredUp > 0">{{barpow}} {{TOKEN}}P</div>
            <div id="userdgov" class="mx-4 text-info" v-if="accountapi.gov > 0">{{bargov}} {{TOKEN}}G</div>
            <div id="userhive" class="mx-4 text-danger">{{barhive}}</div>
            <div id="userhbd" class="mx-4 text-success">{{barhbd}}</div>
          </div>
        </div>
		  <!-- node collapse region -->
        <div id="nodedrawer" class="collapse">
          <div class="py-5">
			  <div class="container">
			  <div class="d-flex align-items-center mb-3">
				  <div class="">
			  		<div role="group" class="input-group" >
              <div class="input-group-prepend l-radius-hotfix"><span class="input-group-text bg-dark border-dark text-secondary" @click="focus('filteraccount')"><i class="fas fa-search"></i></span></div>
                <input type="text" v-on:keyup="searchRunners()" class="form-control bg-dark border-dark text-info" id="filteraccount" v-model="filteraccount.value" @ aria-required="true" placeholder="Search">
                          <div class="input-group-append p-0 m-0" >
                            <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix" style="width: 42px">
                  <span v-if="filteraccount.value">
                    <a href="#" class="badge badge-secondary" @click="setValue('filteraccount.value','')"><i class="fas fa-times"></i></a>
                  </span>
                </div>
                          </div>
                      </div>
              </div>
			  </div>
            <div class="table-responsive rounded border border-dark">
              <table role="table" aria-busy="false" aria-colcount="3" class="table table-dark bg-darker text-white-50 table-striped table-hover table-borderless mb-0" id="larynxnodes">
                <thead role="rowgroup" class="">
                  <tr role="row" class="">
                    <th role="columnheader" v-bind:class="{'col-sort':filteraccount.usera || filteraccount.userd}" class="" aria-colindex="1" > <div class="d-flex align-items-center">
                      <div class="mr-3">USER NAME</div>
                      <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" v-bind:class="{'bg-primary':filteraccount.usera}" @click="sort(!filteraccount.value ? 'runners' : 'runnersSearch','account','asc');toggleAPI('usera')"> <i class="fas fa-caret-up"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" v-bind:class="{'bg-primary':filteraccount.userd}" @click="sort(!filteraccount.value ? 'runners' : 'runnersSearch','account','desc');toggleAPI('userd')"> <i class="fas fa-caret-down"></i></button>
                    </div>
                    </th>
                    <th role="columnheader" v-bind:class="{'col-sort':filteraccount.gova || filteraccount.govd}" class="" aria-colindex="2" > <div class="d-flex align-items-center">
                      <div class="mr-3">GOV BAL</div>
                      <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" v-bind:class="{'bg-primary':filteraccount.gova}" @click="sort(!filteraccount.value ? 'runners' : 'runnersSearch','g','asc');toggleAPI('gova')" > <i class="fas fa-caret-up"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" v-bind:class="{'bg-primary':filteraccount.govd}" @click="sort(!filteraccount.value ? 'runners' : 'runnersSearch','g','desc');toggleAPI('govd')" > <i class="fas fa-caret-down"></i></button>
                    </div>
                    </th>
                    <th role="columnheader" v-bind:class="{'col-sort':filteraccount.apia || filteraccount.apid}" class="" aria-colindex="3" > <div class="d-flex align-items-center">
                      <div class="mr-3">API (Click to load)</div>
                      <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" v-bind:class="{'bg-primary':filteraccount.apia}" @click="sort(!filteraccount.value ? 'runners' : 'runnersSearch','api','asc');toggleAPI('apia')" > <i class="fas fa-caret-up"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" v-bind:class="{'bg-primary':filteraccount.apid}" @click="sort(!filteraccount.value ? 'runners' : 'runnersSearch','api','desc');toggleAPI('apid')" > <i class="fas fa-caret-down"></i></button>
                    </div>
                    </th>
                    <th role="columnheader" class="" aria-colindex="4"> 
						<div class="d-flex justify-content-end">
                     
                        <div class="dropdown show"> <a class="btn btn-sm btn-dark " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-satellite-dish"></i></a>
                          <div class="dropdown-menu">
                            <h6 class="dropdown-header">CURRENT API</h6>
                            <p class="dropdown-item">{{lapi}}</p>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" @click="setMem('lapi','https://spkinstant.hivehoneycomb.com', true)"><i class="fas fa-bolt mr-2"></i>Load Latest</a> </div>
                        </div>
                    
                    </div>
					 </th>
                  </tr>
                <tbody role="rowgroup"  class="tbody-scroll-nodes">
                  <tr class="" role="row" v-for="node in runners" v-if="!filteraccount.value">
                    <td role="cell" class="" aria-colindex="1"><a :href="atref(node.account)">@{{node.account}}</a></td>
                    <td role="cell" class="" aria-colindex="2">{{(node.g/1000)}}</td>
                    <td role="cell" class="" aria-colindex="3" colspan="2"><a href="#" @click="setMem('lapi',node.api, true)">{{node.api}}</a></td>
                  </tr>
					        <tr class="" role="row" v-for="node in runnersSearch" v-if="filteraccount.value">
                    <td role="cell" class="" aria-colindex="1"><a :href="atref(node.account)">@{{node.account}}</a></td>
                    <td role="cell" class="" aria-colindex="2">{{(node.g/1000)}}</td>
                    <td role="cell" class="" aria-colindex="3" colspan="2"><a href="#" @click="setMem('lapi',node.api, true)">{{node.api}}</a></td>
                  </tr>
                </tbody>
              </table>
           </div>
		 </div>
          </div>
        </div>
      </div>
    </div>
	<div class="container text-white" style="margin-top: 50px;">
	      <div class="row">
        <div class="col-4">
          <div class="jumbotron p-3 bg-dark">
            <div id="hivequote">
              <h2 class="lead my-0"><b>HIVE: ${{hiveprice.hive.usd}}</b></h2>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="jumbotron p-3 bg-dark">
            <div id="hbdquote">
              <h2 class="lead my-0"><b>HBD: ${{hbdprice.hive_dollar.usd}}</b></h2>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="jumbotron p-3 bg-dark" v-if="buyhive.checked">
            <div id="dluxhivequote">
              <h2 class="lead my-0"><b>{{TOKEN}}: ${{toFixed((dexapi.markets ? dexapi.markets.hive.tick : 0) * hiveprice.hive.usd, 6)}}</b><b>Supply: {{stats.tokenSupply}}</b><b>Market Cap: {{marketCap}}</b></h2>
            </div>
          </div>
          <div class="jumbotron p-3 bg-dark" v-if="buyhbd.checked">
            <div id="dluxhbdquote">
              <h2 class="lead my-0"><b>{{TOKEN}}: ${{toFixed((dexapi ? dexapi.markets.hbd.tick : 0 )* hbdprice.hive_dollar.usd, 6)}}</b></h2>
            </div>
          </div>
        </div>
      </div>
      <div id="market" class="row text-center">
        <div class="mt-2 col-lg-3">
          <h5>Market</h5>
          <div class="container-fluid mt-3">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-outline-warning active">
                <input name="buypair" type="radio" id="buyhive" checked @click="togglecoin('hive');setValue('buyHiveTotal', 0);setValue('sellHiveTotal', 0);setValue('buyHBDTotal', 0);setValue('sellHBDTotal', 0)">
                HIVE </label>
              <label class="btn btn-outline-warning">
                <input type="radio" name="buypair" id="buyhbd" @click="togglecoin('hbd');setValue('buyHBDTotal', 0);setValue('sellHBDTotal', 0);setValue('buyHiveTotal', 0);setValue('sellHiveTotal', 0)">
                HBD </label>
            </div>
          </div>
        </div>
        <div class="col-lg-9" v-if="buyhive.checked">
          <div class="row">
            <div class="mt-2 col">
              <h5>Bid</h5>
              <i class="fab fa-hive mr-1"></i>{{hivebuys[0] ? hivebuys[0].rate : 0}}<br>
              <i class="fas fa-dollar-sign mx-1"></i>{{toFixed((hivebuys[0] ? hivebuys[0].rate : 0 ) * hiveprice.hive.usd, 6)}} </div>
            <div class="mt-2 col">
              <h5>Ask</h5>
              <i class="fab fa-hive mr-1"></i>{{hivesells[0] ? hivesells[0].rate : 0}}<br>
              <i class="fas fa-dollar-sign mx-1"></i>{{toFixed((hivesells[0] ? hivesells[0].rate : 0 ) * hiveprice.hive.usd, 6)}} </div>
            <div class="mt-2 col">
              <h5>Last</h5>
              <i class="fab fa-hive mr-1"></i>{{dexapi.markets ? dexapi.markets.hive.tick : 0}} <br>
              <i class="fas fa-dollar-sign mx-1"></i>{{toFixed((dexapi.markets ? dexapi.markets.hive.tick : 0 ) * hiveprice.hive.usd, 6)}} </div>
            <div class="mt-2 col">
              <h5>24h Volume</h5>
              <i class="fab fa-hive mr-1"></i>{{volume.hive}}<br>
			        <i class="fas fa-dollar-sign mx-1"></i>{{toFixed(volume.hive * hiveprice.hive.usd, 2)}}
            </div>
          </div>
        </div>
        <div class="col-lg-9" v-if="buyhbd.checked">
          <div class="row">
            <div class="mt-2 col">
              <h5>Bid</h5>
              <i class="fab fa-hive mr-1"></i>{{hbdbuys[0] ? hbdbuys[0].rate : 0}}<br>
              <i class="fas fa-dollar-sign mx-1"></i>{{toFixed((hbdbuys[0] ? hbdbuys[0].rate : 0 ) * hbdprice.hive_dollar.usd, 6)}} </div>
            <div class="mt-2 col">
              <h5>Ask</h5>
              <i class="fab fa-hive mr-1"></i>{{hbdsells[0] ? hbdsells[0].rate : 0}}<br>
              <i class="fas fa-dollar-sign mx-1"></i>{{toFixed((hbdsells[0] ? hbdsells[0].rate : 0 ) * hbdprice.hive_dollar.usd, 6)}} </div>
            <div class="mt-2 col">
              <h5>Last</h5>
              <i class="fab fa-hive mr-1"></i>{{dexapi.markets ? dexapi.markets.hive.tick : 0}} <br>
              <i class="fas fa-dollar-sign mx-1"></i>{{toFixed((dexapi.markets ? dexapi.markets.hive.tick : 0 ) * hbdprice.hive_dollar.usd, 6)}} </div>
            <div class="mt-2 col">
              <h5>24h Volume</h5>
              <i class="fab fa-hive mr-1"></i>{{volume.hbd}}<br>
              <i class="fas fa-dollar-sign mx-1"></i>{{toFixed(volume.hbd * hbdprice.hive_dollar.usd, 2)}}
            </div>
          </div>
        </div>
      </div>
      <div class="marketChart mt-3 mb-3">
        <div class="">
          <div class="chartjs-size-monitor">
            <div class="chartjs-size-monitor-expand">
              <div class=""></div>
            </div>
            <div class="chartjs-size-monitor-shrink">
              <div class=""></div>
            </div>
          </div>
          <canvas id="chart" width="2220" height="800" class="chartjs-render-monitor" style="display: block; height: 400px; width: 1110px;"></canvas>
        </div>
        <div class="mt-2 text-center d-flex justify-content-between">
          <div>
            <button id="refreshChart" class="btn btn-outline-secondary" onClick="updateChart()"><i class="fas fa-sync-alt mr-2"></i>REFRESH CHART</button>
          </div>
          <div id="settimescale" class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-info active">
              <input type="radio" name="timescale" id="hourbtn" >
              1H </label>
            <label class="btn btn-info">
              <input type="radio" name="timescale" id="daybtn" >
              1D </label>
            <label class="btn btn-info">
              <input type="radio" name="timescale" id="weekbtn" >
              1W </label>
            <label class="btn btn-info">
              <input type="radio" name="timescale" id="monthbtn" >
              1M </label>
            <label class="btn btn-info">
              <input type="radio" name="timescale" id="yearbtn" >
              1Y </label>
          </div>
          <div>
            <button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#openordersdrawer" aria-expanded="false" aria-controls="openordersdrawer">OPEN ORDERS ({{openorders.length}}) <i class="fas fa-book-reader ml-2"></i></button>
          </div>
        </div>
        <div id="openordersdrawer" class="collapse ">
          <div class="py-5">
            <div v-if="openorders.length == 0" class="text-center text-white-50">
              <h5>No open orders</h5>
            </div>
            <div class="table-responsive rounded border border-dark" v-if="openorders.length > 0">
              <table role="table" aria-busy="false" aria-colcount="7" class="table table-dark bg-darker text-white-50 table-striped table-hover table-borderless mb-0" id="useropenorders">
                <thead role="rowgroup" class="">
                  <tr role="row" class="">
                    <th role="columnheader" class="" v-bind:class="{'col-sort':orders.blocka || orders.blockd}" aria-colindex="1" > <div class="d-flex align-items-center">
                      <div class="mr-3">BLOCK</div>
                      <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" @click="sort('openorders','block','asc');toggleOrders('blocka')" v-bind:class="{'bg-primary':orders.blocka}"> <i class="fas fa-caret-up"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" @click="sort('openorders','block','desc');toggleOrders('blockd')" v-bind:class="{'bg-primary':orders.blockd}"> <i class="fas fa-caret-down"></i></button>
                    </div>
                    </th>
                    <th role="columnheader" class="" v-bind:class="{'col-sort':orders.tokena || orders.tokend}" aria-colindex="2" > <div class="d-flex align-items-center">
                      <div class="mr-3">{{TOKEN}}</div>
                      <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" @click="sort('openorders','amount','asc');toggleOrders('tokena')" v-bind:class="{'bg-primary':orders.tokena}"> <i class="fas fa-caret-up"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" @click="sort('openorders','amount','desc');toggleOrders('tokend')" v-bind:class="{'bg-primary':orders.tokend}"> <i class="fas fa-caret-down"></i></button>
                    </div>
                    </th>
                    <th role="columnheader" class="" v-bind:class="{'col-sort':orders.coina || orders.coind}" aria-colindex="3" > <div class="d-flex align-items-center">
                      <div class="mr-3">HIVE/HBD</div>
                      <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" @click="sort('openorders','nai','asc');toggleOrders('coina')" v-bind:class="{'bg-primary':orders.coina}"> <i class="fas fa-caret-up"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" @click="sort('openorders','nai','desc');toggleOrders('coind')" v-bind:class="{'bg-primary':orders.coind}"> <i class="fas fa-caret-down"></i></button>
                    </div>
                    </th>
                    <th role="columnheader" class="" v-bind:class="{'col-sort':orders.filleda || orders.filledd}" aria-colindex="4" > <div class="d-flex align-items-center">
                      <div class="mr-3">Filled</div>
                      <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" @click="sort('openorders','percentFilled','asc');toggleOrders('filleda')" v-bind:class="{'bg-primary':orders.filleda}"> <i class="fas fa-caret-up"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" @click="sort('openorders','percentFilled','desc');toggleOrders('filledd')" v-bind:class="{'bg-primary':orders.filledd}"> <i class="fas fa-caret-down"></i></button>
                    </div>
                    </th>
                    <th role="columnheader" class="" v-bind:class="{'col-sort':orders.ratea || orders.rated}" aria-colindex="5" > <div class="d-flex align-items-center">
                      <div class="mr-3">RATE</div>
                      <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" @click="sort('openorders','rate','asc');toggleOrders('ratea')" v-bind:class="{'bg-primary':orders.ratea}"> <i class="fas fa-caret-up"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" @click="sort('openorders','rate','desc');toggleOrders('rated')" v-bind:class="{'bg-primary':orders.rated}"> <i class="fas fa-caret-down"></i></button>
                    </div>
                    </th>
                    <th role="columnheader" class="" v-bind:class="{'col-sort':orders.typea || orders.typed}" aria-colindex="6" > <div class="d-flex align-items-center">
                      <div class="mr-3">TYPE</div>
                      <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" @click="sort('openorders','type','asc');toggleOrders('typea')" v-bind:class="{'bg-primary':orders.typea}"> <i class="fas fa-caret-up"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" @click="sort('openorders','type','desc');toggleOrders('typed')" v-bind:class="{'bg-primary':orders.typed}"> <i class="fas fa-caret-down"></i></button>
                    </div>
                    </th>
                    <th role="columnheader" class="" aria-colindex="7"> <div class="d-flex align-items-center">
                      <div class="mr-3">&nbsp;</div>
                    </div>
                    </th>
                  </tr>
                </thead>
                <tbody role="rowgroup">
                  <tr role="row" class="" v-for="order in openorders" v-if="!orders.value">
                    <td role="cell" class="" aria-colindex="1">{{order.block}}</td>
                    <td role="cell" class="" aria-colindex="2">{{(order.amount/1000).toFixed(3)}}</td>
                    <td role="cell" class="" aria-colindex="3">{{order.nai}}</td>
                    <td role="cell" class="" aria-colindex="4">{{order.percentFilled}}%</td>
                    <td role="cell" class="" aria-colindex="5" v-bind:class="{'text-danger':(order.type == 'hive:sell' || order.type == 'hbd:sell'), 'text-success':(order.type == 'hive:buy' || order.type == 'hbd:buy')}">{{order.rate}}</td>
                    <td role="cell" class="" aria-colindex="6" v-bind:class="{'text-danger':(order.type == 'hive:sell' || order.type == 'hbd:sell'), 'text-success':(order.type == 'hive:buy' || order.type == 'hbd:buy')}">{{toUpperCase(order.type)}}</td>
                    <td role="cell" class="" aria-colindex="7"><button class="btn btn-sm btn-outline-warning" id="cancelbtn" @click="cancelDEX('{{order.txid}}','spkcc_')">CANCEL</button></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div id="tradeForms">
        <div class="row">
          <div class="mt-3 col-md-6">
            <h4>Buy {{TOKEN}}</h4>
            <form name="buy" id="buyform" class="form-horizontal needs-validation" novalidate>
              <div class="form-group" id="buy-type" aria-labelledby="buy-type-label">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 bv-no-focus-ring col-form-label" id="buy-type-label">Order Type</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-warning active">
                          <input type="radio" name="buyType" id="buylimit" checked @click="togglebuylimit('limit');setValue('buyQuantity', 0);setValue('buyHours','720');block()">
                          LIMIT </label>
                        <label class="btn btn-outline-warning">
                          <input type="radio" name="buyType" id="buymarket" @click="togglebuylimit('market');setValue('buyQuantity','0');setValue('buyHiveTotal',0);setValue('buyHBDTotal',0);block()">
                          MARKET </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group"for="buyQuantity" id="buy-qty" aria-labelledby="buy-qty-label" v-if="buylimit.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="buy-qty-label">Quantity</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" v-on:keyup="bcalc('t')" required class="form-control bg-dark border-dark text-info" v-model="buyQuantity" id="buyQuantity" placeholder="0" :min="minbuy" step="0.001" aria-required="true" :readonly="bform.tl">
                      <div class="input-group-append">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">
							{{TOKEN}}
							<a href="#/" class="ml-3 text-secondary" @click="block('t')"><i class="fas" :class="{'fa-lock':bform.tl, 'fa-unlock-alt':!bform.tl}"></i></a>
							 </div>
                      </div>
                      <div class="invalid-feedback"> Minimum quantity is {{minbuy}} </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" for="buyPrice" id="buy-price" aria-labelledby="buy-price-label" v-if="buylimit.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="buy-total-label">Price</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
						<input id="buyPrice" type="number" v-on:keyup="bcalc('p')" v-model="buyPrice" placeholder="0" required step="0.000001" min="0.000001" aria-required="true" class="form-control bg-dark border-dark text-info"  :readonly="bform.pl">
                      <div class="input-group-append">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">
							
							<span v-if="buyhive.checked">HIVE</span>
							<span v-if="buyhbd.checked">HBD</span>
							/{{TOKEN}}
						  <a href="#/" class="ml-3 text-secondary" @click="block('p')"><i class="fas" :class="{'fa-lock':bform.pl, 'fa-unlock-alt':!bform.pl}"></i></a>
						  </div>
						  
                      </div>
                      <div class="invalid-feedback"> Minimum price is 0.000001 </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group" for="buyHiveTotal" id="buy-hive-total" aria-labelledby="buy-hive-total-label" v-if="buyhive.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="buy-hive-total-label">Total</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" class="form-control bg-dark text-info border-dark" :readonly="bform.cl" v-model="buyHiveTotal" id="buyHiveTotal" required v-on:keyup="bcalc('c')" placeholder="0" :min="minbuy" step="0.001" :max="parseFloat(barhive) > maxhbuy ? toFixed(parseFloat(barhive),3) : maxhbuy" aria-required="true">
                      <div class="input-group-append">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">HIVE
						  <a href="#/" class="ml-3 text-secondary" @click="block('c')" v-if="buylimit.checked"><i class="fas" :class="{'fa-lock':bform.cl, 'fa-unlock-alt':!bform.cl}"></i></a>
						  </div>
                      </div>
                      <div class="invalid-feedback"> Your balance is {{barhive}} - minimum: {{minbuy}} - max: {{parseFloat(barhive) > maxhbuy ? toFixed(parseFloat(barhive),3) : maxhbuy}}{{parseFloat(barhive) > maxhbuy ? '' : '(Liquidity)'}}</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" for="buyHBDTotal" id="buy-hbd-total" aria-labelledby="buy-hbd-total-label" v-if="buyhbd.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="buy-hbd-total-label">Total</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" class="form-control bg-dark text-info border-dark" :readonly="bform.cl" v-model="buyHBDTotal" id="buyHBDTotal" required v-on:keyup="bcalc('c')" placeholder="0" :min="minbuy" step="0.001" :max="parseFloat(barhbd) > maxdbuy ? toFixed(parseFloat(barhbd),3) : maxdbuy" aria-required="true">
                      <div class="input-group-append">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">HBD
						  <a href="#/" class="ml-3 text-secondary" @click="block('c')" v-if="buylimit.checked"><i class="fas" :class="{'fa-lock':bform.cl, 'fa-unlock-alt':!bform.cl}"></i></a>
						  </div>
                      </div>
                      <div class="invalid-feedback"> Your balance is {{barhbd}} - minimum: {{minbuy}} - max: {{parseFloat(barhbd) > maxdbuy ? toFixed(parseFloat(barhbd),3) : maxdbuy}}{{parseFloat(barhbd) > maxdbuy ? '' : '(Liquidity)'}}</div>
                    </div>
                  </div>
                </div>
              </div>
				              <div class="form-group" for="buyHours" id="buy-hours" aria-labelledby="buy-hours-label" v-if="buylimit.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="buy-total-label">Expiration</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input id="buyHours" v-model="buyHours" type="number" required step="1" min="1" max="720" aria-required="true" class="form-control bg-dark border-dark text-info"  :readonly="buymarket.checked">
                      <div class="input-group-append">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">HOURS</div>
                      </div>
                      <div class="invalid-feedback"> Expiration must be between 1 and 720 hours </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-success" @click="buyDEX(buyHiveTotal,buyHBDTotal,buyQuantity,buyHours,prefix)">Buy</button>
              </div>
            </form>
          </div>
          <div class="mt-3 col-md-6">
            <h4>Sell {{TOKEN}}</h4>
            <form id="sellform" name="sell" class="form-horizontal needs-validation" novalidate>
              <div class="form-group" id="sell-type" aria-labelledby="sell-type-label">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 bv-no-focus-ring col-form-label" id="sell-type-label">Order Type</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-warning active">
                          <input type="radio" name="sellType" id="selllimit" checked @click="toggleselllimit('limit');setValue('sellHours', 720);slock()">
                          LIMIT </label>
                        <label class="btn btn-outline-warning">
                          <input type="radio" name="sellType" id="sellmarket" @click="toggleselllimit('market');setValue('sellHours', 0);setValue('sellHiveTotal', 0);setValue('sellHBDTotal', 0);slock()">
                          MARKET </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" for="sellQuantity" id="sell-qty" aria-labelledby="sell-qty-label">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="sell-qty-label">Quantity</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" v-on:keyup="scalc('t')" required class="form-control bg-dark border-dark text-info" v-model="sellQuantity" id="sellQuantity" placeholder="0" :min="minsell" step="0.001" :readonly="sform.tl" aria-required="true" :max="parseFloat(bartoken)">
                      <div class="input-group-append">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">{{TOKEN}}<a href="#/" class="ml-3 text-secondary" @click="slock('t')" v-if="selllimit.checked"><i class="fas" :class="{'fa-lock':sform.tl, 'fa-unlock-alt':!sform.tl}"></i></a></div>
                      </div>
                      <div class="invalid-feedback"> Your balance is {{(accountapi.balance/1000)}} - minimum quantity is {{minsell}} </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" for="sellPrice" id="sell-price" aria-labelledby="sell-price-label" v-if="!sellmarket.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="sell-total-label">Price</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input id="sellPrice" v-on:keyup="scalc('p')" v-model="sellPrice" type="number" placeholder="0" required step="0.000001" min="0.000001" aria-required="true" class="form-control bg-dark border-dark text-info"  :readonly="sform.pl">
                      <div class="input-group-append">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix"><span v-if="buyhive.checked">HIVE</span><span v-if="buyhbd.checked">HBD</span>/{{TOKEN}}<a href="#/" class="ml-3 text-secondary" @click="slock('p')" v-if="selllimit.checked"><i class="fas" :class="{'fa-lock':sform.pl, 'fa-unlock-alt':!sform.pl}"></i></a></div>
                      </div>
                      <div class="invalid-feedback"> Minimum price is 0.000001 </div>
                    </div>
                  </div>
                </div>
              </div>
             
              <div class="form-group" for="sellHiveTotal" id="sell-hive-total" aria-labelledby="sell-hive-total-label" v-if="buyhive.checked && selllimit.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="sell-hive-total-label">Total</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" class="form-control bg-dark border-dark text-info" 
							 :readonly="sform.cl" id="sellHiveTotal" required
							 v-model="sellHiveTotal" v-on:keyup="scalc('c')"
							  placeholder="0" :min="minsell" step="0.001" aria-required="true">
                      <div class="input-group-append">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">HIVE<a href="#/" class="ml-3 text-secondary" @click="slock('c')" v-if="selllimit.checked"><i class="fas" :class="{'fa-lock':sform.cl, 'fa-unlock-alt':!sform.cl}"></i></a></div>
                      </div>
                      <div class="invalid-feedback"> Minimum total is {{minsell}} - increase the quantity or price </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" for="sellHBDTotal" id="sell-hbd-total" aria-labelledby="sell-hbd-total-label" v-if="buyhbd.checked && selllimit.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="sell-hbd-total-label">Total</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" class="form-control bg-dark border-dark text-info" 
							 :readonly="sform.cl" id="sellHBDTotal" 
							 v-model="sellHBDTotal" required
							 placeholder="0" min="0.004" step="0.001" aria-required="true">
                      <div class="input-group-append">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">HBD<a href="#/" class="ml-3 text-secondary" @click="slock('c')" v-if="selllimit.checked"><i class="fas" :class="{'fa-lock':sform.cl, 'fa-unlock-alt':!sform.cl}"></i></a></div>
                      </div>
                      <div class="invalid-feedback"> Minimum total is 0.004 - increase the quantity or price </div>
                    </div>
                  </div>
                </div>
              </div>
				 <div class="form-group" for="sellHours" id="sell-hours" aria-labelledby="sell-hours-label" v-if="!sellmarket.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="sell-total-label">Expiration</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input id="sellHours" v-on:keyup="scalc('c')" v-model="sellHours" type="number" required step="1" min="1" max="720" aria-required="true" class="form-control bg-dark border-dark text-info"  :readonly="sellmarket.checked">
                      <div class="input-group-append">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">HOURS</div>
                      </div>
                      <div class="invalid-feedback"> Expiration must be between 1 and 720 hours </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-danger" @click="sellDEX(sellQuantity,sellHiveTotal,sellHBDTotal,sellHours,prefix)">Sell</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div id="hiveData"  v-if="buyhive.checked">
        <div id="hiveMarketOrders">
          <div class="row">
            <div class="mt-3 col-md-6">
              <h4>Buy Orders</h4>
              <div class="table-responsive">
                <table role="table" aria-busy="false" aria-colcount="4" class="table table-dark bg-darker text-white table-striped table-hover table-borderless" id="hivebuyordertable">
                  <thead role="rowgroup">
                    <tr role="row">
                      <th role="columnheader" scope="col" aria-colindex="1" class="">TOTAL HIVE</th>
                      <th role="columnheader" scope="col" aria-colindex="2" class=""><div>HIVE</div></th>
                      <th role="columnheader" scope="col" aria-colindex="3" class="">{{TOKEN}}</th>
                      <th role="columnheader" scope="col" aria-colindex="4" class=""><div>BID</div></th>
                    </tr>
                  </thead>
                  <tbody role="rowgroup" class="tbody-scroll-orders">
                    <tr role="row" v-for="item in hivebuys">
                      <td aria-colindex="1" role="cell" class="">{{(item.total/1000).toFixed(3)}}</td>
                      <td aria-colindex="2" role="cell" class="">{{(item.hive/1000).toFixed(3)}}</td>
                      <td aria-colindex="3" role="cell" class="">{{(item.amount/1000).toFixed(3)}}</td>
                      <td aria-colindex="4" role="cell" class="text-primary"><a href="#/" @click="setValue('buyPrice', item.rate);setValue('sellPrice', item.rate)">{{item.rate}}</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="mt-3 col-md-6">
              <h4>Sell Orders</h4>
              <div class="table-responsive">
                <table role="table" aria-busy="false" aria-colcount="4" class="table table-dark bg-darker text-white table-striped table-hover table-borderless" id="hivesellorderstable">
                  <thead role="rowgroup" class="">
                    <tr role="row" class="">
                      <th role="columnheader" scope="col" aria-colindex="1" class=""><div>ASK</div></th>
                      <th role="columnheader" scope="col" aria-colindex="2" class="">{{TOKEN}}</th>
                      <th role="columnheader" scope="col" aria-colindex="3" class=""><div>HIVE</div></th>
                      <th role="columnheader" scope="col" aria-colindex="4" class="">TOTAL HIVE</th>
                    </tr>
                  </thead>
                  <tbody role="rowgroup" class="tbody-scroll-orders">
                    <tr class="" role="row" v-for="item in hivesells">
                      <td aria-colindex="1" role="cell" class="text-primary"><a href="#/" @click="setValue('buyPrice', item.rate);setValue('sellPrice', item.rate)">{{item.rate}}</a></td>
                      <td aria-colindex="2" role="cell" class="">{{(item.amount/1000).toFixed(3)}}</td>
                      <td aria-colindex="3" role="cell" class="">{{(item.hive/1000).toFixed(3)}}</td>
                      <td aria-colindex="4" role="cell" class="">{{(item.total/1000).toFixed(3)}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div id="hiveTradeHistory">
          <div class="row">
            <div class="mt-3 col-12">
              <h4>Trade History</h4>
              <div class="table-responsive">
                <table role="table" aria-busy="false" aria-colcount="4" class="table table-dark bg-darker text-white table-striped table-hover table-borderless" id="hivetradehistorytable">
                  <thead role="rowgroup" class="">
                    <tr role="row">
                      <th role="columnheader" scope="col" aria-colindex="1" class="" >PRICE</th>
                      <th role="columnheader" scope="col" aria-colindex="2" class="">QTY</th>
                      <th role="columnheader" scope="col" aria-colindex="3" class="">TIME</th>
                    </tr>
                  </thead>
                  <tbody role="rowgroup" class="tbody-scroll-history">
                    <tr class="" role="row" v-for="item in recenthive">
                      <td aria-colindex="1" role="cell" class="" v-bind:class="{'text-danger': (item.type == 'sell'), 'text-success': (item.type == 'buy')}">{{item.price}}</td>
                      <td aria-colindex="2" role="cell" class="">{{item.target_volume}}</td>
                      <td aria-colindex="3" role="cell" class="">{{new Date(item.trade_timestamp).toLocaleTimeString()}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="hbdData"  v-if="buyhbd.checked">
        <div id="hbdMarketOrders">
          <div class="row">
            <div class="mt-3 col-md-6">
              <h4>Buy Orders</h4>
              <div class="table-responsive table-scroll">
                <table role="table" aria-busy="false" aria-colcount="4" class="table table-dark bg-darker text-white table-striped table-hover table-borderless" id="hbdbuyordertable">
                  <thead role="rowgroup" class="">
                    <tr role="row" class="">
                      <th role="columnheader" scope="col" aria-colindex="1" class="">TOTAL HBD</th>
                      <th role="columnheader" scope="col" aria-colindex="2" class=""><div>HBD</div></th>
                      <th role="columnheader" scope="col" aria-colindex="3" class="">{{TOKEN}}</th>
                      <th role="columnheader" scope="col" aria-colindex="4" class=""><div>BID</div></th>
                    </tr>
                  </thead>
                  <tbody role="rowgroup"  class="tbody-scroll-orders">
                    <tr class="" role="row" v-for="item in hbdbuys">
                      <td aria-colindex="1" role="cell" class="">{{(item.total/1000).toFixed(3)}}</td>
                      <td aria-colindex="2" role="cell" class="">{{(item.hbd/1000).toFixed(3)}}</td>
                      <td aria-colindex="3" role="cell" class="">{{(item.amount/1000).toFixed(3)}}</td>
                      <td aria-colindex="4" role="cell" class=""><a href="#/" @click="setValue('buyPrice', item.rate);setValue('sellPrice', item.rate)">{{item.rate}}</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="mt-3 col-md-6">
              <h4>Sell Orders</h4>
              <div class="table-responsive table-scroll">
                <table role="table" aria-busy="false" aria-colcount="4" class="table table-dark bg-darker text-white table-striped table-hover table-borderless" id="hbdsellorderstable">
                  <thead role="rowgroup" class="">
                    <tr role="row" class="">
                      <th role="columnheader" scope="col" aria-colindex="1" class=""><div>ASK</div></th>
                      <th role="columnheader" scope="col" aria-colindex="2" class="">{{TOKEN}}</th>
                      <th role="columnheader" scope="col" aria-colindex="3" class=""><div>HBD</div></th>
                      <th role="columnheader" scope="col" aria-colindex="4" class="">TOTAL HBD</th>
                    </tr>
                  </thead>
                  <tbody role="rowgroup" class="tbody-scroll-orders">
                    <tr class="" role="row" v-for="item in hbdsells">
                      <td aria-colindex="1" role="cell" class=""><a href="#/" @click="setValue('buyPrice', item.rate);setValue('sellPrice', item.rate)">{{item.rate}}</a></td>
                      <td aria-colindex="2" role="cell" class="">{{(item.amount/1000).toFixed(3)}}</td>
                      <td aria-colindex="3" role="cell" class="">{{(item.hbd/1000).toFixed(3)}}</td>
                      <td aria-colindex="4" role="cell" class="">{{(item.total/1000).toFixed(3)}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div id="hbdTradeHistory">
          <div class="row">
            <div class="mt-3 col-12">
              <h4>Trade History</h4>
              <div class="table-responsive">
                <table role="table" aria-busy="false" aria-colcount="4" class="table table-dark bg-darker text-white table-striped table-hover table-borderless" id="hbdtradehistorytable">
                  <thead role="rowgroup" class="">
                    <tr role="row">
                      <th role="columnheader" scope="col" aria-colindex="1" class="" >PRICE</th>
                      <th role="columnheader" scope="col" aria-colindex="2" class="">QTY</th>
                      <th role="columnheader" scope="col" aria-colindex="3" class="">TIME</th>
                    </tr>
                  </thead>
                  <tbody role="rowgroup" class="tbody-scroll-history">
                    <tr class="" role="row" v-for="item in recenthbd">
                      <td aria-colindex="1" role="cell" class="" v-bind:class="{'text-danger': (item.type == 'sell'), 'text-success': (item.type == 'buy')}">{{price}}</td>
                      <td aria-colindex="2" role="cell" class="">{{item.target_volume}}</td>
                      <td aria-colindex="3" role="cell" class="">{{new Date(item.trade_timestamp).toLocaleTimeString()}}</td>
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
</div>
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/footer.php";
include_once( $path );
?>
</body>
<script>
	
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    })
});
})()
</script>
<script>
var disabletab = document.getElementsByClassName("disabled-input");
for (var i = 0; i < disabletab.length;i++){disabletab[i].setAttribute('tabindex', '-1')}
	</script>
<script type="text/javascript" src="/js/chart.js"></script>
</html>
