<!doctype html>
<html lang="en" class="h-100">
<head>
<title>DLUX - LARYNX DEX</title>
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/header.php";
include_once( $path );
?>
<script type="text/javascript" src="/dlux-io/dmxAppConnect/dmxAppConnect.js"></script>
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
<script type="text/javascript" src="/dlux-io/dmxAppConnect/dmxFormatter/dmxFormatter.js"></script>
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
        behindTitle: '',
        TOKEN: 'LARYNX',
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
        accountinfo: {},
        filterusers: {
          checked: true,
          value: '',
        },
        filteraccount: {
          checked: false,
          value: '',
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
      togglecoin() {
        this.buyhive.checked = !this.buyhive.checked
        this.buyhbd.checked = !this.buyhbd.checked
      },
      togglebuylimit() {
        this.buylimit.checked = !this.buylimit.checked
        this.buymarket.checked = !this.buymarket.checked
      },
      toggleselllimit() {
        this.selllimit.checked = !this.selllimit.checked
        this.sellmarket.checked = !this.sellmarket.checked
      },
      setValue(key, value) {
        this[key] = value
      },
      atref(key) {
        return `/@${key}`
      },
      setMem(key, value, reload) {
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
        console.log({hive,hbd,dlux})
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
        if(!hbd && hive) broadcastTransfer({ to: msaccount, hive, memo:JSON.stringify({rate, hours})}, `Buying ${token} with ${parseFloat((hive||hbd)/1000).toFixed(3)} ${hive?'HIVE':'HBD'} ${andthen}`, statusapi)
        else if (!hive && hbd)broadcastTransfer({ to: msaccount, hbd, memo:JSON.stringify({rate, hours})}, `Buying ${token} with ${parseFloat((hive||hbd)/1000).toFixed(3)} ${hive?'HIVE':'HBD'} ${andthen}`, statusapi)
      },
      sellDEX(dlux, hive, hbd, hours, prefix = 'dlux_', callback){
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
        if(!hbd && dlux) broadcastCJA({ [token.toLocaleLowerCase()]:dlux, hive, hours}, `${prefix}dex_sell`, `Selling ${parseFloat(dlux/1000).toFixed(3)} ${token}${andthen}`, statusapi)
        else if (dlux) broadcastCJA({ [token.toLocaleLowerCase()]:dlux, hbd, hours}, `${prefix}dex_sell`, `Selling ${parseFloat(dlux/1000).toFixed(3)} ${token}${andthen}`, statusapi)
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
        })
      if(user != 'GUEST')fetch(this.lapi + '/@' + user)
        .then(response => response.json())
        .then(data => {
          this.balance = (data.balance/1000).toFixed(3)
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
                cur.percentFilled = 0
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
        })
    },
    computed: {
      
    }
  }).mount('#app')
  
</script>
</head>
<body class="d-flex flex-column bg-darker text-white h-100 padme-t70" id="index" is="dmx-app">
<!--<input id="timenow" class="d-none" :value="{{nodes.data.node.getTimeOffset(0)}}">
<input id="timeoffset" class="d-none" :value="{{nodes.data.node.getTimeOffset(86400000)}}">-->
<!-- <dmx-api-datasource id="hiveprice" is="dmx-fetch" url="https://api.coingecko.com/api/v3/simple/price?ids=hive&amp;vs_currencies=usd"></dmx-api-datasource>
<dmx-api-datasource id="hbdprice" is="dmx-fetch" url="https://api.coingecko.com/api/v3/simple/price?ids=hive_dollar&amp;vs_currencies=usd"></dmx-api-datasource>
<dmx-api-datasource id="nodes" is="dmx-fetch" url="https://spkinstant.hivehoneycomb.com/runners" ></dmx-api-datasource> -->
<!--<dmx-api-datasource id="openorders" is="dmx-fetch" url="https://spkinstant.hivehoneycomb.com/@imno" ></dmx-api-datasource>-->
<!--<dmx-api-datasource id="recenthiveapi" is="dmx-fetch" url="https://spkinstant.hivehoneycomb.com/api/recent/HIVE_LARYNX" dmx-param:limit="1000" ></dmx-api-datasource>-->
<!-- <dmx-data-view id="marketnodes" :data="nodes.data.result" sorton="g" sortdir="ndesc" pagesize="10"></dmx-data-view>
<dmx-data-view id="openorders" :data="openorders.data.contracts" sorton="block" pagesize="10"></dmx-data-view>
<dmx-data-view id="accountinfo" :data="accountapi.data.result"></dmx-data-view>
<dmx-data-view id="recenthive" :data="recenthiveapi.data.recent_trades" sorton="trade_timestamp" sortdir="ndesc" pagesize="25"></dmx-data-view>
<dmx-data-view id="recenthbd" :data="recenthbdapi.data.recent_trades" sorton="trade_timestamp" sortdir="ndesc" pagesize="25"></dmx-data-view>
<dmx-data-view id="recenthive24h" :data="recenthiveapi.data.recent_trades" sorton="trade_timestamp" sortdir="ndesc" filter="trade_timestamp.inRange(timeoffset.value,timenow.value)" ></dmx-data-view>
<dmx-data-view id="recenthbd24h" :data="recenthbdapi.data.recent_trades" sorton="trade_timestamp" sortdir="ndesc" filter="trade_timestamp.inRange(timeoffset.value,timenow.value)" ></dmx-data-view>
<dmx-data-view id="hivebuys" :data="dexapi.data.markets.hive.buys" sorton="rate" sortdir="ndesc" pagesize="15"></dmx-data-view>
<dmx-data-view id="hivesells" :data="dexapi.data.markets.hive.sells" sorton="rate" sortdir="nasc" pagesize="15"></dmx-data-view>
<dmx-data-view id="hbdbuys" :data="dexapi.data.markets.hbd.buys" sorton="rate" sortdir="ndesc" pagesize="15"></dmx-data-view>
<dmx-data-view id="hbdsells" :data="dexapi.data.markets.hbd.sells" sorton="rate" sortdir="nasc" pagesize="15"></dmx-data-view> -->
<?php
$path = $_SERVER[ 'DOCUMENT_ROOT' ];
$path .= "/mod/nav.php";
$lapi = "https://spkinstant.hivehoneycomb.com";
if ( isset( $_COOKIE[ 'lapi' ] ) ) {$lapi = $_COOKIE[ 'lapi' ];};
if ( isset( $_COOKIE[ 'user' ] ) ) {

  echo "<dmx-api-datasource id=\"dexapi\" is=\"dmx-fetch\" url=\"" . $lapi . "/dex\" ></dmx-api-datasource>\n";
  echo "<dmx-api-datasource id=\"recenthiveapi\" is=\"dmx-fetch\" url=\"" . $lapi . "/api/recent/HIVE_LARYNX/\" dmx-param:limit=\"1000\"></dmx-api-datasource>\n";
  echo "<dmx-api-datasource id=\"recenthbdapi\" is=\"dmx-fetch\" url=\"" . $lapi . "/api/recent/HBD_LARYNX/\" dmx-param:limit=\"1000\"></dmx-api-datasource>\n";
  echo "<dmx-api-datasource id=\"openorders\" is=\"dmx-fetch\" url=\"" . $lapi . "/@" . $_COOKIE[ 'user' ] . "\"></dmx-api-datasource>\n";
  echo "<dmx-api-datasource id=\"accountapi\" is=\"dmx-fetch\" url=\"" . $lapi . "/hapi/condenser_api/get_accounts\" dmx-param:0=\"'" . $_COOKIE[ 'user' ] . "'\"></dmx-api-datasource>\n";
} else {
  echo "<dmx-api-datasource id=\"dexapi\" is=\"dmx-fetch\" url=\"" . $lapi . "/dex\" ></dmx-api-datasource>\n";
  echo "<dmx-api-datasource id=\"recenthiveapi\" is=\"dmx-fetch\" url=\"" . $lapi . "/api/recent/HIVE_LARYNX/\" dmx-param:limit=\"1000\"></dmx-api-datasource>\n";
  echo "<dmx-api-datasource id=\"recenthbdapi\" is=\"dmx-fetch\" url=\"" . $lapi . "/api/recent/HBD_LARYNX/\" dmx-param:limit=\"1000\"></dmx-api-datasource>\n";
};
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
            <div id="userdlux" class="mx-4 text-warning">{{(accountapi.balance/1000)}} {{TOKEN}}</div>
            <div id="userdpwr" class="mx-4 text-primary" v-if="accountapi.poweredUp > 0">{{(accountapi.poweredUp/1000)}} {{TOKEN}}P</div>
            <div id="userdgov" class="mx-4 text-info" v-if="accountapi.gov > 0">{{(accountapi.gov/1000)}} {{TOKEN}}G</div>
            <div id="userhive" class="mx-4 text-danger">{{accountapi.balance}}</div>
            <div id="userhbd" class="mx-4 text-success">{{accountapi.hbd_balance}}</div>
          </div>
        </div>
		  <!-- node collapse region -->
        <div id="nodedrawer" class="collapse">
          <div class="py-5">
			  <div class="container">
			  <div class="d-flex align-items-center mb-3">
				  <div class="">
			  		<div role="group" class="input-group" >
              <div class="input-group-prepend l-radius-hotfix"><span class="input-group-text bg-dark border-dark text-secondary" @click="filteraccount.focus()"><i class="fas fa-search"></i></span></div>
                <input type="text" v-on:keyup="searchRunners()" class="form-control bg-dark border-dark text-info" id="filteraccount" v-model="filteraccount.value" @ aria-required="true" placeholder="Search">
                          <!-- <div class="input-group-append p-0 m-0" >
                            <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix" style="width: 42px">
                  <span v-if="filteraccount.value">
                    <a href="#" class="badge badge-secondary" @click="setValue('filteraccount',null)"><i class="fas fa-times"></i></a>
                  </span>
                </div>
                          </div> -->
                      </div>
              </div>
			  <!-- 
			<div class="">
			  <div role="group" class="input-group" v-if="filterapis.checked">
				  <div class="input-group-prepend l-radius-hotfix"><span class="input-group-text bg-dark border-dark text-secondary" @click="filterapi.focus()"><i class="fas fa-search"></i></span></div>
                      <input type="text" class="form-control bg-dark border-dark text-info" id="filterapi" aria-required="true" placeholder="APIs">
                      <div class="input-group-append p-0 m-0">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix" style="width: 42px">
							<span v-if="filterapi.value"><a href="#" class="badge badge-secondary" @click="setValue('filterapi',null)"><i class="fas fa-times"></i></a></span></div>
                      </div>
                  </div>
				  </div>
			 -->
			  </div>
            <div class="table-responsive rounded border border-dark">
              <table role="table" aria-busy="false" aria-colcount="3" class="table table-dark bg-darker text-white-50 table-striped table-hover table-borderless mb-0" id="larynxnodes">
                <thead role="rowgroup" class="">
                  <tr role="row" class="">
                    <th role="columnheader" class="" aria-colindex="1" > <div class="d-flex align-items-center">
                      <div class="mr-3">USER NAME</div>
                      <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" @click="sort(filterusers.checked ? 'runners' : 'runnersSearch','account','asc')"> <i class="fas fa-caret-up"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" @click="sort(filterusers.checked ? 'runners' : 'runnersSearch','account','desc')"> <i class="fas fa-caret-down"></i></button>
                    </div>
                    </th>
                    <th role="columnheader" class="" aria-colindex="2" > <div class="d-flex align-items-center">
                      <div class="mr-3">GOV BAL</div>
                      <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" @click="sort(filterusers.checked ? 'runners' : 'runnersSearch','g','asc')" > <i class="fas fa-caret-up"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" @click="sort(filterusers.checked ? 'runners' : 'runnersSearch','g','desc')" > <i class="fas fa-caret-down"></i></button>
                    </div>
                    </th>
                    <th role="columnheader" class="" aria-colindex="3" > <div class="d-flex align-items-center">
                      <div class="mr-3">API (Click to load)</div>
                      <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" @click="sort(filterusers.checked ? 'runners' : 'runnersSearch','api','asc')" > <i class="fas fa-caret-up"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" @click="sort(filterusers.checked ? 'runners' : 'runnersSearch','api','desc')" > <i class="fas fa-caret-down"></i></button>
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
                  <tr class="" role="row" v-for="node in runners" v-if="filterusers.checked">
                    <td role="cell" class="" aria-colindex="1"><a :href="atref(node.account)">@{{node.account}}</a></td>
                    <td role="cell" class="" aria-colindex="2">{{(node.g/1000)}}</td>
                    <td role="cell" class="" aria-colindex="3" colspan="2"><a href="#" @click="setMem('lapi',node.api, true)">{{node.api}}</a></td>
                  </tr>
					        <tr class="" role="row" v-for="node in runnersSearch" v-if="filteraccount.checked">
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
            <!-- <input id="hiveusd" :value="hiveprice.hive.usd" class="d-none"> -->
          </div>
        </div>
        <div class="col-4">
          <div class="jumbotron p-3 bg-dark">
            <div id="hbdquote">
              <h2 class="lead my-0"><b>HBD: ${{hbdprice.hive_dollar.usd}}</b></h2>
            </div>
            <!-- <input id="hbdusd" :value="hbdprice.hive_dollar.usd" class="d-none"> -->
          </div>
        </div>
        <div class="col-4">
          <div class="jumbotron p-3 bg-dark" v-if="buyhive.checked">
            <div id="dluxhivequote">
              <h2 class="lead my-0"><b>{{TOKEN}}: ${{((dexapi.markets ? dexapi.markets.hive.tick : 0) * hiveprice.hive.usd)}}</b></h2>
            </div>
            <!-- <input id="dluxhiveusd" :value="dexapi.markets ? dexapi.markets.hive.tick : 0" class="d-none"> -->
          </div>
          <div class="jumbotron p-3 bg-dark" v-if="buyhbd.checked">
            <div id="dluxhbdquote">
              <h2 class="lead my-0"><b>{{TOKEN}}: ${{(dexapi ? dexapi.markets.hbd.tick : 0 )* hbdprice.hive_dollar.usd}}</b></h2>
            </div>
            <!-- <input id="dluxhbdusd" :value="dexapi.markets ? dexapi.markets.hbd.tick : 0" class="d-none"> -->
          </div>
        </div>
      </div>
      <div id="market" class="row text-center">
        <div class="mt-2 col-lg-3">
          <h5>Market</h5>
          <div class="container-fluid mt-3">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-outline-warning active">
                <input name="buypair" type="radio" id="buyhive" :checked="buyhive.checked" @click="togglecoin();setValue('buyHiveTotal', '');setValue('sellHiveTotal', '');setValue('buyHBDTotal', '0');setValue('sellHBDTotal', '0')">
                HIVE </label>
              <label class="btn btn-outline-warning">
                <input type="radio" name="buypair" id="buyhbd" :checked="buyhbd.checked" @click="togglecoin();setValue('buyHBDTotal', '');setValue('sellHBDTotal', '');setValue('buyHiveTotal', '0');setValue('sellHiveTotal', '0')">
                HBD </label>
            </div>
          </div>
        </div>
        <div class="col-lg-9" v-if="buyhive.checked">
          <div class="row">
            <div class="mt-2 col">
              <h5>Bid</h5>
              <i class="fab fa-hive mr-1"></i>{{hivebuys[0] ? hivebuys[0].rate : 0}}<br>
              <i class="fas fa-dollar-sign mx-1"></i>{{(hivebuys[0] ? hivebuys[0].rate : 0 ) * hiveprice.hive.usd}} </div>
            <div class="mt-2 col">
              <h5>Ask</h5>
              <i class="fab fa-hive mr-1"></i>{{hivesells[0] ? hivesells[0].rate : 0}}<br>
              <i class="fas fa-dollar-sign mx-1"></i>{{(hivesells[0] ? hivesells[0].rate : 0 ) * hiveprice.hive.usd}} </div>
            <div class="mt-2 col">
              <h5>Last</h5>
              <i class="fab fa-hive mr-1"></i>{{dexapi.markets ? dexapi.markets.hive.tick : 0}} <br>
              <i class="fas fa-dollar-sign mx-1"></i>{{(dexapi.markets ? dexapi.markets.hive.tick : 0 ) * hiveprice.hive.usd}} </div>
            <div class="mt-2 col">
              <h5>24h Volume</h5>
              <i class="fab fa-hive mr-1"></i>{{volume.hive}}<br>
			        <i class="fas fa-dollar-sign mx-1"></i>{{volume.hive * hiveprice.hive.usd}}
            </div>
          </div>
        </div>
        <div class="col-lg-9" v-if="buyhbd.checked">
          <div class="row">
            <div class="mt-2 col">
              <h5>Bid</h5>
              <i class="fab fa-hive mr-1"></i>{{hbdbuys[0] ? hbdbuys[0].rate : 0}}<br>
              <i class="fas fa-dollar-sign mx-1"></i>{{(hbdbuys[0] ? hbdbuys[0].rate : 0 ) * hbdprice.hive_dollar.usd}} </div>
            <div class="mt-2 col">
              <h5>Ask</h5>
              <i class="fab fa-hive mr-1"></i>{{hbdsells[0] ? hbdsells[0].rate : 0}}<br>
              <i class="fas fa-dollar-sign mx-1"></i>{{(hbdsells[0] ? hbdsells[0].rate : 0 ) * hbdprice.hive_dollar.usd}} </div>
            <div class="mt-2 col">
              <h5>Last</h5>
              <i class="fab fa-hive mr-1"></i>{{dexapi.markets ? dexapi.markets.hive.tick : 0}} <br>
              <i class="fas fa-dollar-sign mx-1"></i>{{(dexapi.markets ? dexapi.markets.hive.tick : 0 ) * hbdprice.hive_dollar.usd}} </div>
            <div class="mt-2 col">
              <h5>24h Volume</h5>
              <i class="fab fa-hive mr-1"></i>{{volume.hbd}}<br>
              <i class="fas fa-dollar-sign mx-1"></i>{{volume.hbd * hbdprice.hive_dollar.usd}}
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
              <input type="radio" name="timescale" id="hourbtn" is="dmx-radio">
              1H </label>
            <label class="btn btn-info">
              <input type="radio" name="timescale" id="daybtn" is="dmx-radio">
              1D </label>
            <label class="btn btn-info">
              <input type="radio" name="timescale" id="weekbtn" is="dmx-radio">
              1W </label>
            <label class="btn btn-info">
              <input type="radio" name="timescale" id="monthbtn" is="dmx-radio">
              1M </label>
            <label class="btn btn-info">
              <input type="radio" name="timescale" id="yearbtn" is="dmx-radio">
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
              <table role="table" aria-busy="false" aria-colcount="6" class="table table-dark bg-darker text-white-50 table-striped table-hover table-borderless mb-0" id="useropenorders">
                <thead role="rowgroup" class="">
                  <tr role="row" class="">
                    <th role="columnheader" class="" aria-colindex="1" > <div class="d-flex align-items-center">
                      <div class="mr-3">BLOCK</div>
                      <!-- <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" @click="openorders.sort('block','asc')" v-bind:bg-primary="openorders.sort.dir == 'asc'  && openorders.sort.on == 'block'"> <i class="fas fa-caret-up"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" @click="openorders.sort('block','desc')" v-bind:bg-primary="openorders.sort.dir == 'desc'  && openorders.sort.on == 'block'"> <i class="fas fa-caret-down"></i></button> -->
                    </div>
                    </th>
                    <th role="columnheader" class="" aria-colindex="2" > <div class="d-flex align-items-center">
                      <div class="mr-3">{{TOKEN}}</div>
                      <!-- <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" @click="openorders.sort('amount','asc')" v-bind:bg-primary="openorders.sort.dir == 'asc'  && openorders.sort.on == 'amount'"> <i class="fas fa-caret-up"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" @click="openorders.sort('amount','desc')" v-bind:bg-primary="openorders.sort.dir == 'desc'  && openorders.sort.on == 'amount'"> <i class="fas fa-caret-down"></i></button> -->
                    </div>
                    </th>
                    <th role="columnheader" class="" aria-colindex="3" > <div class="d-flex align-items-center">
                      <div class="mr-3">HIVE/HBD</div>
                      <!-- <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" @click="openorders.sort('hbd','asc')" v-bind:bg-primary="openorders.sort.dir == 'asc'  && openorders.sort.on == 'hbd'"> <i class="fas fa-caret-up"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" @click="openorders.sort('hbd','desc')" v-bind:bg-primary="openorders.sort.dir == 'desc'  && openorders.sort.on == 'hbd'"> <i class="fas fa-caret-down"></i></button> -->
                    </div>
                    </th>
                    <th role="columnheader" class="" aria-colindex="4" > <div class="d-flex align-items-center">
                      <div class="mr-3">Filled</div>
                      <!-- <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" @click="openorders.sort('hive','asc')" v-bind:bg-primary="openorders.sort.dir == 'asc'  && openorders.sort.on == 'hive'"> <i class="fas fa-caret-up"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" @click="openorders.sort('hive','desc')" v-bind:bg-primary="openorders.sort.dir == 'desc'  && openorders.sort.on == 'hive'"> <i class="fas fa-caret-down"></i></button> -->
                    </div>
                    </th>
                    <th role="columnheader" class="" aria-colindex="5" > <div class="d-flex align-items-center">
                      <div class="mr-3">RATE</div>
                      <!-- <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" @click="openorders.sort('rate','asc')" v-bind:bg-primary="openorders.sort.dir == 'asc'  && openorders.sort.on == 'rate'"> <i class="fas fa-caret-up"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" @click="openorders.sort('rate','desc')" v-bind:bg-primary="openorders.sort.dir == 'desc'  && openorders.sort.on == 'rate'"> <i class="fas fa-caret-down"></i></button> -->
                    </div>
                    </th>
                    <th role="columnheader" class="" aria-colindex="6" > <div class="d-flex align-items-center">
                      <div class="mr-3">TYPE</div>
                      <!-- <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" @click="openorders.sort('type','asc')" v-bind:bg-primary="openorders.sort.dir == 'asc'  && openorders.sort.on == 'type'"> <i class="fas fa-caret-up"></i></button>
                      <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" @click="openorders.sort('type','desc')" v-bind:bg-primary="openorders.sort.dir == 'desc'  && openorders.sort.on == 'type'"> <i class="fas fa-caret-down"></i></button> -->
                    </div>
                    </th>
                    <th role="columnheader" class="" aria-colindex="7"> <div class="d-flex align-items-center">
                      <div class="mr-3">&nbsp;</div>
                    </div>
                    </th>
                  </tr>
                </thead>
                <tbody role="rowgroup">
                  <tr role="row" class="" v-for="order in openorders">
                    <td role="cell" class="" aria-colindex="1">{{order.block}}</td>
                    <td role="cell" class="" aria-colindex="2">{{(order.amount/1000).toFixed(3)}}</td>
                    <td role="cell" class="" aria-colindex="3">{{order.nai}}</td>
                    <td role="cell" class="" aria-colindex="4">{{order.percentFilled}}%</td>
                    <td role="cell" class="" aria-colindex="5" v-bind:text-danger="(type == 'hive:sell' || type == 'hbd:sell')" v-bind:class="{'text-success':(order.type == 'hive:buy' || order.type == 'hbd:buy')}">{{order.rate}}</td>
                    <td role="cell" class="" aria-colindex="6" v-bind:text-danger="(type == 'hive:sell' || type == 'hbd:sell')" v-bind:class="{'text-success':(order.type == 'hive:buy' || order.type == 'hbd:buy')}">{{order.type}}</td>
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
            <form name="buy" class="form-horizontal needs-validation">
              <div class="form-group" id="buy-type" aria-labelledby="buy-type-label">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 bv-no-focus-ring col-form-label" id="buy-type-label">Order Type</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-warning active">
                          <input type="radio" name="buyType" id="buylimit" :checked="buylimit.checked" @click="togglebuylimit();setValue('buyQuantity', '');setValue('buyHours','720')">
                          LIMIT </label>
                        <label class="btn btn-outline-warning">
                          <input type="radio" name="buyType" id="buymarket" checked="buymarket.checked" @click="togglebuylimit();setValue('buyQuantity','0');setValue('buyHours','0')">
                          MARKET </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group"for="buyQuantity" id="buy-qty" aria-labelledby="buy-qty-label" v-if="!buymarket.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="buy-qty-label">Quantity</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" required class="form-control bg-dark border-dark text-white-50" v-model="buyQuantity" id="buyQuantity" placeholder="0" min="0.001" step="0.001" aria-required="true" :readonly="buymarket.checked">
                      <div class="input-group-append">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">
							<a href="#" v-if="buyPrice.value > 0" class="d-none mr-2 badge badge-primary" @click="setValue('buyQuantity', accountapi.balance/buyPrice.value)">MAX</a>
							{{TOKEN}}
							 </div>
                      </div>
                      <div class="invalid-feedback"> Minimum quantity is 0.001 </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" for="buyPrice" id="buy-price" aria-labelledby="buy-price-label" v-if="!buymarket.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="buy-total-label">Price</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input id="buyPrice" type="number" v-model="buyPrice" placeholder="0" required step="0.000001" min="0" aria-required="true" class="form-control bg-dark border-dark text-white-50"  :readonly="buymarket.checked">
                      <div class="input-group-append">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">
							<a v-if="buyQuantity.value > 0" href="#" class="d-none mr-2 badge badge-primary" @click="setValue('buyPrice', accountapi.balance/buyQuantity.value)">MAX</a>
							<span v-if="buyhive.checked">HIVE</span>
							<span v-if="buyhbd.checked">HBD</span>
							/{{TOKEN}}</div>
                      </div>
                      <div class="invalid-feedback"> Minimum price is 0.000001 </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" for="buyHours" id="buy-hours" aria-labelledby="buy-hours-label" v-if="!buymarket.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="buy-total-label">Expiration</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input id="buyHours" v-model="buyHours" type="number" required step="1" min="1" max="720" aria-required="true" class="form-control bg-dark border-dark text-white-50"  :readonly="buymarket.checked">
                      <div class="input-group-append">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">HOURS</div>
                      </div>
                      <div class="invalid-feedback"> Expiration must be between 1 and 720 hours </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" for="buyHiveTotal" id="buy-hive-total" aria-labelledby="buy-hive-total-label" v-if="buyhive.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="buy-hive-total-label">Total</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" class="form-control bg-dark border-dark text-info" v-bind:disabled-input="buylimit.checked" :readonly="buyhbd.checked" v-model="buyHiveTotal" id="buyHiveTotal" placeholder="0" min="0.001" step="0.001" aria-required="true" :max="accountapi.balance">
                      <div class="input-group-append">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">HIVE</div>
                      </div>
                      <div class="invalid-feedback"> Your balance is {{accountapi.balance}} - minimum order is 0.001 </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" for="buyHBDTotal" id="buy-hbd-total" aria-labelledby="buy-hbd-total-label" v-if="buyhbd.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="buy-hbd-total-label">Total</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" class="form-control bg-dark border-dark text-info" v-bind:disabled-input="buylimit.checked" :readonly="buyhive.checked" v-model="buyHBDTotal" id="buyHBDTotal" placeholder="0" min="0.001" step="0.001" :max="accountapi.hbd_balance" aria-required="true">
                      <div class="input-group-append">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">HBD</div>
                      </div>
                      <div class="invalid-feedback"> Your balance is {{accountapi.hbd_balance}} - minimum order is 0.001 </div>
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
            <form name="sell" class="form-horizontal needs-validation">
              <div class="form-group" id="sell-type" aria-labelledby="sell-type-label">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 bv-no-focus-ring col-form-label" id="sell-type-label">Order Type</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-warning active">
                          <input type="radio" name="sellType" id="selllimit" :checked="selllimit.checked" @click="toggleselllimit();setValue('sellPrice', '');setValue('sellHours', '720')">
                          LIMIT </label>
                        <label class="btn btn-outline-warning">
                          <input type="radio" name="sellType" id="sellmarket" :checked="sellmarket.checked" @click="toggleselllimit();setValue('sellPrice', '0');setValue('sellHours', '0')">
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
                      <input type="number" required class="form-control bg-dark border-dark text-white-50" v-model="sellQuantity" id="sellQuantity" placeholder="0" min="0.004" step="0.001" aria-required="true" :max="(accountapi.balance/1000)">
                      <div class="input-group-append">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">{{TOKEN}}</div>
                      </div>
                      <div class="invalid-feedback"> Your balance is {{(accountapi.balance/1000)}} - minimum quantity is 0.004 </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" for="sellPrice" id="sell-price" aria-labelledby="sell-price-label" v-if="!sellmarket.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="sell-total-label">Price</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input id="sellPrice" type="number" placeholder="0" required step="0.000001" min="0" aria-required="true" class="form-control bg-dark border-dark text-white-50"  :readonly="sellmarket.checked">
                      <div class="input-group-append">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix"><span v-if="buyhive.checked">HIVE</span><span v-if="buyhbd.checked">HBD</span>/{{TOKEN}}</div>
                      </div>
                      <div class="invalid-feedback"> Minimum price is 0.000001 </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" for="sellHours" id="sell-hours" aria-labelledby="sell-hours-label" v-if="!sellmarket.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="sell-total-label">Expiration</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input id="sellHours" type="number" required step="1" min="1" max="720" aria-required="true" class="form-control bg-dark border-dark text-white-50"  :readonly="sellmarket.checked">
                      <div class="input-group-append">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">HOURS</div>
                      </div>
                      <div class="invalid-feedback"> Expiration must be between 1 and 720 hours </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" for="sellHiveTotal" id="sell-hive-total" aria-labelledby="sell-hive-total-label" v-if="buyhive.checked && selllimit.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="sell-hive-total-label">Total</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" class="form-control bg-dark border-dark text-info disabled-input" 
							 :readonly="buyhbd.checked || sellmarket.checked" id="sellHiveTotal" 
							 :v-model="sellHiveTotal"
							  placeholder="0" min="0.004" step="0.001" aria-required="true" :max="balance">
                      <div class="input-group-append">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">HIVE</div>
                      </div>
                      <div class="invalid-feedback"> Minimum total is 0.004 - increase the quantity or price </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group" for="sellHBDTotal" id="sell-hbd-total" aria-labelledby="sell-hbd-total-label" v-if="buyhbd.checked && selllimit.checked">
                <div class="form-row">
                  <legend tabindex="-1" class="col-sm-4 col-form-label" id="sell-hbd-total-label">Total</legend>
                  <div tabindex="-1" role="group" class="col">
                    <div role="group" class="input-group">
                      <input type="number" class="form-control bg-dark border-dark text-info disabled-input" 
							 :readonly="buyhive.checked || sellmarket.checked" id="sellHBDTotal" 
							 :v-model="sellHBDTotal" 
							 placeholder="0" min="0.004" step="0.001" :max="balance" aria-required="true">
                      <div class="input-group-append">
                        <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">HBD</div>
                      </div>
                      <div class="invalid-feedback"> Minimum total is 0.004 - increase the quantity or price </div>
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
                      <td aria-colindex="4" role="cell" class="text-primary"><a href="#" @click="insertBal('{{item.rate}}', 'buyPrice')">{{item.rate}}</a></td>
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
                      <td aria-colindex="1" role="cell" class="text-primary"><a href="#" @click="insertBal('{{item.rate}}', 'sellPrice')">{{item.rate}}</a></td>
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
                      <td aria-colindex="4" role="cell" class=""><a href="#" @click="insertBal('{{item.rate}}', 'buyPrice')">{{item.rate}}</a></td>
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
                      <td aria-colindex="1" role="cell" class=""><a href="#" @click="insertBal('{{item.rate}}', 'sellPrice')">{{item.rate}}</a></td>
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
