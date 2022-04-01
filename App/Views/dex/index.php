<!doctype html>
<html lang="en" class="h-100">

<head>
  <title>DLUX - DEX</title>
  <?php
  $path = $_SERVER['DOCUMENT_ROOT'];
  $path .= "/mod/header.php";
  include_once($path);
  ?>
  <!-- noUI slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.4.0/nouislider.min.js" integrity="sha512-mZXUH8DAODwCHioWP3gltQwa953LbABMlzTYwYkKqv8eNxOk37B1HgNNuCMfFxgrpW5C34WJbxPDcM58+s1dJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.4.0/nouislider.css" integrity="sha512-DGB74Gyw93qON+V0QxSRs1er6sqoPyFoy23HBL5LN7MRJBcjeCU22zega+vOEGE0XQLoVrv4ExcaesSTwZQA2w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <template>
    <trading-vue :data="this.$data" />
  </template>
  <!-- <script src="/js/trading-vue.min.js"></script>-->

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
      display: block;
      height: 400px;
      overflow: auto;
    }

    .tbody-scroll-history {
      display: block;
      max-height: 600px;
      overflow: auto;
    }

    .tbody-scroll-nodes {
      display: block;
      max-height: 600px;
      overflow: auto;
    }

    thead,
    tbody tr {
      display: table;
      width: 100%;
      table-layout: fixed;
    }

    .bg-black {
      background-color: black;
    }

    .btn-rb,
    .btn-rb:hover,
    .btn-rb:active,
    .btn-rb:visited {
      background: linear-gradient(45deg, #f79533, #f37055, #ef4e7b, #a166ab, #5073b8, #1098ad, #07b39b, #6fba82);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      border-style: solid;
      border-width: 1px;
      border-image: linear-gradient(45deg, #f79533, #f37055, #ef4e7b, #a166ab, #5073b8, #1098ad, #07b39b, #6fba82) 1;
    }

    .border-rb {
      border-style: solid;
      border-width: 1px;
      border-image: linear-gradient(45deg, #f79533, #f37055, #ef4e7b, #a166ab, #5073b8, #1098ad, #07b39b, #6fba82) 1;
    }

    .background-rb {
      background: linear-gradient(45deg, #f79533, #f37055, #ef4e7b, #a166ab, #5073b8, #1098ad, #07b39b, #6fba82);
      color: #000;
      border: none;
    }

    .dark-divider {
      border-image: linear-gradient(45deg, #f79533, #f37055, #ef4e7b, #a166ab, #5073b8, #1098ad, #07b39b, #6fba82) 1;
    }
  </style>
  <script src="/js/trading-vue.min.js"></script>
  <script src="/js/veeno.min.js"></script>
  <!-- <script src="https://unpkg.com/vee-validate"></script> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/trading-vue-js@1.0.2/dist/trading-vue.min.js"></script> -->
  <script type="module">
    import Vue from 'https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.esm.browser.js'
    const {
      TradingVue
    } = TradingVueJs //vue 2 only
    console.log(veeno)
    const Veeno = veeno.default

    let url = location.href.replace(/\/$/, "");
    let lapi = ''
    if (location.search) {
      const string = location.search.replace('?', '')
      let params = string.split('&')
      for (let i = 0; i < params.length; i++) {
        let param = params[i].split('=')
        if (param[0] == 'api') {
          lapi = param[1]
        }
      }
      window.history.replaceState(null, null, "dex?api=" + lapi);
    }
    if (location.hash && !lapi) {
      const hash = url.split("#");
      if (hash[1].includes('dlux')) {
        lapi = 'https://token.dlux.io'
      } else if (hash[1].includes('larynx')) {
        lapi = 'https://spkinstant.hivehoneycomb.com'
      }
    }
    if (!lapi) {
      lapi = localStorage.getItem('lapi') || 'https://token.dlux.io'
    }
    console.log(lapi)
    if (lapi == 'https://token.dlux.io' || lapi == 'https://spkinstant.hivehoneycomb.com') {
      console.log('using defaults')
      window.history.replaceState(null, null, "dex");
    }
    let user = localStorage.getItem('user') || 'GUEST'
    let hapi = localStorage.getItem('hapi') || 'https://api.hive.blog'
    console.log({
      lapi
    })

    // createApp({ // vue 3
    var app = new Vue({ // vue 2
      el: '#app', // vue 2
      data() {
        return {
          ohlcv: [],
          chart: {
            id: 'honeycomb_tv',
            width: 600,
            height: 400,
            toolbar: true,
            overlays: false,
            bg: `#111215`
          },
          barcount: 500,
          barwidth: 3600000 * 6,
          nowtime: new Date().getTime(),
          agoTime: new Date().getTime() - 86400000,
          account: user,
          isnode: false,
          hasDrop: false,
          dropnai: '',
          balance: "0.000",
          bartoken: "",
          barhive: "",
          barhbd: "",
          bargov: "",
          barpow: "",
          buyFormValid: false,
          sellFormValid: false,
          govFormValid: false,
          powFormValid: false,
          sendFormValid: false,
          hiveFormValid: false,
          hbdFormValid: false,
          lapi: lapi,
          hapi: hapi,
          accountapi: {},
          hiveprice: {
            hive: {
              usd: 1
            }
          },
          hbdprice: {
            hive_dollar: {
              usd: 1
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
          dexapi: {
            markets: {
              hive: {
                tick: 0.001
              },
              hbd: {
                tick: 0.001
              }
            }
          },
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
          volume: {
            hive: 0,
            hbd: 0,
            token_hive: 0,
            token_hbd: 0,
            hive_usd: 0,
            hbd_usd: 0
          },
          sendTo: '',
          sendAmount: 0,
          sendMemo: '',
          sendAllowed: false,
          sendHiveTo: '',
          sendHiveAllowed: false,
          sendHiveAmount: 0,
          sendHiveMemo: '',
          sendHBDTo: '',
          sendHBDAllowed: false,
          sendHBDAmount: 0,
          sendHBDMemo: '',
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
          features: {
            claim_id: 'claim',
            claim_S: 'Airdrop',
            claim_B: true,
            claim_json: 'drop',
            rewards_id: 'shares_claim',
            rewards_S: 'Rewards',
            rewards_B: true,
            rewards_json: 'claim',
            rewardSel: false,
            reward2Gov: false,
            send_id: 'send',
            send_S: 'Send',
            send_B: true,
            send_json: 'send',
            powup_id: 'power_up',
            powup_B: false,
            pow_val: '',
            powdn_id: 'power_down',
            powdn_B: false,
            powsel_up: true,
            govup_id: 'gov_up',
            govup_B: true,
            gov_val: '',
            govsel_up: true,
            govdn_id: 'gov_down',
            govdn_B: true,
            node: {
              id: 'node_add',
              opts: [{
                  S: 'Domain',
                  type: 'text',
                  info: 'https://no-trailing-slash.com',
                  json: 'domain',
                  val: ''
                },
                {
                  S: 'DEX Fee Vote',
                  type: 'number',
                  info: '500 = .5%',
                  max: 1000,
                  min: 0,
                  json: 'bidRate',
                  val: ''
                },
                {
                  S: 'DEX Max Vote',
                  type: 'number',
                  info: '10000 = 100%',
                  max: 10000,
                  min: 0,
                  json: 'dm',
                  val: ''
                },
                {
                  S: 'DEX Slope Vote',
                  type: 'number',
                  info: '10000 = 100%',
                  max: 10000,
                  min: 0,
                  json: 'ds',
                  val: ''
                },
                {
                  S: 'DAO Claim Vote',
                  type: 'number',
                  info: '1500 = 15%',
                  max: 10000,
                  min: 0,
                  json: 'dv',
                  val: ''
                }
              ],
            }
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
          lockgov: {
            checked: true
          },
          unlockgov: {
            checked: false
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
          pwrup: {
            checked: true
          },
          pwrdown: {
            checked: false
          },
          govlock: {
            checked: true
          },
          govunlock: {
            checked: false
          },
        }
      },
      // compilerOptions: {
      //   isCustomElement: tag => tag === 'TradingVue'
      // },
      beforeDestroy() {
        window.removeEventListener('resize', this.onResize)
      },
      components: {
        TradingVue,
        Veeno
      },
      methods: {
        onResize(event) {
          this.chart.width = this.$refs.chartContainer.scrollWidth - 15
          this.chart.height = this.chart.width / 2.5
          this.$refs.dumbo.style = `width: ${this.chart.width}px; height: ${this.chart.height + 30}px;`
        },
        saveNodeSettings() {
          let updates = {};
          for (var i = 0; i < this.features.node.opts.length; i++) {
            if (this.features.node.opts[i].val) {
              updates[this.features.node.opts[i].json] = this.features.node.opts[i].val;
            }
          }
          broadcastCJA(updates, `${this.prefix}${this.features.node.id}`, `Updating ${this.TOKEN} Node...`, lapi.split('://')[1])
        },
        dropClaim() {
          broadcastCJA({
            claim: true
          }, `${this.prefix}${this.features.claim_id}`, `Claiming ${this.TOKEN}...`, lapi.split('://')[1])
        },
        rewardClaim() {
          broadcastCJA({
            gov: this.features.reward2Gov
          }, `${this.prefix}${this.features.rewards_id}`, `Claiming ${this.TOKEN}...`, lapi.split('://')[1])
        },
        power() {
          if (this.features.pow_val) broadcastCJA({
            amount: parseInt(this.features.pow_val * 1000)
          }, `${this.prefix}${this.features.powsel_up ? this.features.powup_id : this.features.powdn_id}`, `${this.features.powsel_up ? '' : 'Down-'}Powering ${this.TOKEN}...`, lapi.split('://')[1])
        },
        gov() {
          if (this.features.gov_val) broadcastCJA({
            amount: parseInt(this.features.gov_val * 1000)
          }, `${this.prefix}${this.features.govsel_up ? this.features.govup_id : this.features.govdn_id}`, `${this.features.govsel_up ? '' : 'Un-'}Locking ${this.TOKEN}...`, lapi.split('://')[1])
        },
        checkAccount(name, key) {
          fetch("https://anyx.io", {
              body: `{\"jsonrpc\":\"2.0\", \"method\":\"condenser_api.get_accounts\", \"params\":[[\"${this[name]}\"]], \"id\":1}`,
              headers: {
                "Content-Type": "application/x-www-form-urlencoded"
              },
              method: "POST"
            })
            .then(r => {
              return r.json()
            })
            .then(re => {
              if (re.result.length) this[key] = true
              else this[key] = false
            })

        },
        tokenSend() {
          console.log(this.sendAllowed, this.sendTo, this.sendAmount, this.sendMemo, this.prefix, this.TOKEN)
          if (this.sendAllowed) {
            broadcastCJA({
              to: this.sendTo,
              amount: parseInt(this.sendAmount * 1000),
              memo: this.sendMemo
            }, `${this.prefix}send`, `Trying to send ${this.TOKEN}...`, lapi.split('://')[1])
          }
          return false
        },
        sendhive() {
          if (this.sendHiveAllowed) broadcastTransfer({
            to: this.sendHiveTo,
            hive: this.sendHiveAmount * 1000,
            memo: this.sendHiveMemo
          })
          else alert('Account Not Found')
        },
        sendhbd() {
          if (this.sendHBDAllowed) broadcastTransfer({
            to: this.sendHBDTo,
            hbd: this.sendHBDAmount * 1000,
            memo: this.sendHBDMemo
          })
          else alert('Account Not Found')
        },
        bcalc(k) {
          switch (k) {
            case 't':
              this.buyQuantity = parseFloat(this.buyQuantity)
              if (this.bform.cl) {
                if (this.buyhive.checked) this.buyPrice = (this.buyHiveTotal / this.buyQuantity).toFixed(6)
                else this.buyPrice = (this.buyHBDTotal / this.buyQuantity).toFixed(6)
              } else {
                if (this.buyhive.checked) this.buyHiveTotal = (this.buyPrice * this.buyQuantity).toFixed(3)
                else this.buyHBDTotal = (this.buyPrice * this.buyQuantity).toFixed(3)
              }
              break;
            case 'p':
              this.buyPrice = parseFloat(this.buyPrice)
              if (this.bform.cl) {
                if (this.buyhive.checked) this.buyQuantity = (this.buyHiveTotal / this.buyPrice).toFixed(3)
                else this.buyQuantity = (this.buyHBDTotal / this.buyPrice).toFixed(3)
              } else {
                if (this.buyhive.checked) this.buyHiveTotal = (this.buyPrice * this.buyQuantity).toFixed(3)
                else this.buyHBDTotal = (this.buyPrice * this.buyQuantity).toFixed(3)
              }
              break;
            case 'c':
              if (this.buyhive.checked) this.buyHiveTotal = parseFloat(this.buyHiveTotal)
              else this.buyHBDTotal = parseFloat(this.buyHBDTotal)
              if (this.buylimit.checked) {
                if (this.bform.pl) {
                  if (this.buyhive.checked) this.buyQuantity = (this.buyHiveTotal / this.buyPrice).toFixed(3)
                  else this.buyQuantity = (this.buyHBDTotal / this.buyPrice).toFixed(3)
                } else {
                  if (this.buyhive.checked) this.buyPrice = (this.buyHiveTotal / this.buyQuantity).toFixed(6)
                  else this.buyPrice = (this.buyHBDTotal / this.buyQuantity).toFixed(6)
                }
              }
              break;
            default:
          }
        },
        localStoreSet(k, v) {
          localStorage.setItem(k, v)
        },
        scalc(k) {
          switch (k) {
            case 't':
              this.sellQuantity = parseFloat(this.sellQuantity)
              if (this.sform.cl) {
                if (this.buyhive.checked) this.sellPrice = (this.sellHiveTotal / this.sellQuantity).toFixed(6)
                else this.sellPrice = (this.sellHBDTotal / this.sellQuantity).toFixed(6)
              } else {
                if (this.buyhive.checked) this.sellHiveTotal = (this.sellPrice * this.sellQuantity).toFixed(3)
                else this.sellHBDTotal = (this.sellPrice * this.sellQuantity).toFixed(3)
              }
              break;
            case 'p':
              this.sellPrice = parseFloat(this.sellPrice)
              if (this.sform.cl) {
                if (this.buyhive.checked) this.sellQuantity = (this.sellHiveTotal / this.sellPrice).toFixed(3)
                else this.sellQuantity = (this.sellHBDTotal / this.sellPrice).toFixed(3)
              } else {
                if (this.buyhive.checked) this.sellHiveTotal = (this.sellPrice * this.sellQuantity).toFixed(3)
                else this.sellHBDTotal = (this.sellPrice * this.sellQuantity).toFixed(3)
              }
              break;
            case 'c':
              if (this.buyhive.checked) this.sellHiveTotal = parseFloat(this.sellHiveTotal)
              else this.sellHBDTotal = parseFloat(this.sellHBDTotal)
              if (this.selllimit.checked) {
                if (this.sform.pl) {
                  if (this.buyhive.checked) this.sellQuantity = (this.sellHiveTotal / this.sellPrice).toFixed(3)
                  else this.sellQuantity = (this.sellHBDTotal / this.sellPrice).toFixed(3)
                } else {
                  if (this.buyhive.checked) this.sellPrice = (this.sellHiveTotal / this.sellQuantity).toFixed(6)
                  else this.sellPrice = (this.sellHBDTotal / this.sellQuantity).toFixed(6)
                }
              }
              break;
            default:
          }
        },
        block(o) {
          switch (o) {
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
        slock(o) {
          switch (o) {
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
        formatNumber(t, n, r, e) {
          if (typeof t != 'number') t = parseFloat(t)
          if (isNaN(t)) return "Invalid Number";
          if (!isFinite(t)) return (t < 0 ? "-" : "") + "infinite";
          (r = r || "."), (e = e || "");
          var u = t < 0;
          t = Math.abs(t);
          var a = (null != n && 0 <= n ? t.toFixed(n) : t.toString()).split("."),
            i = a[0],
            o = 1 < a.length ? r + a[1] : "";
          if (e)
            for (var c = /(\d+)(\d{3})/; c.test(i);)
              i = i.replace(c, "$1" + e + "$2");
          return (u ? "-" : "") + i + o;
        },
        togglecoin(coin) {
          this.buyhive.checked = coin == 'hive' ? true : false
          this.buyhbd.checked = coin == 'hbd' ? true : false
          if (coin == 'hive') {
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
          if (key.split('.').length > 1) {
            let keys = key.split('.')
            let obj = this[keys[0]]
            for (let i = 1; i < keys.length; i++) {
              if (i == keys.length - 1) {
                obj[keys[i]] = value
              } else {
                obj = obj[keys[i]]
              }
            }
          } else {
            this[key] = value
          }
        },
        setApi(url) {
          // remove trailing slash
          if (url.substr(-1) == '/') {
            url = url.substr(0, url.length - 1)
          }
          let api = url || prompt("Please enter your API", "https://spkinstant.hivehoneycomb.com");
          if (url.indexOf('https://') == -1) {
            alert('https is required')
            return
          }
          if (api != null) {
            if (location.hash && api) {
              location.hash = "";
            }
            localStorage.setItem('lapi', api)
            location.search = '?api=' + api
          }
        },
        suggestValue(key, value) {
          if (key.split('.').length > 1) {
            let keys = key.split('.')
            let obj = this[keys[0]]
            for (let i = 1; i < keys.length; i++) {
              if (i == keys.length - 1) {
                if (!obj[keys[i]]) obj[keys[i]] = value
              } else {
                obj = obj[keys[i]]
              }
            }
          } else {
            if (!this[key]) this[key] = value
          }
        },
        atref(key) {
          return `/@${key}`
        },
        setMem(key, value, reload) {
          if (value.indexOf('https://') == -1) {
            alert('https:// is required for security reasons')
            return
          } else if (value[value.length - 1] == '/') {
            value = value.substring(0, value.length - 1)
          }
          localStorage.setItem(key, value)
          if (reload) {
            location.reload()
          }
        },
        sort(item, key, method) {
          switch (method) {
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
        focus(id) {
          document.getElementById(id).focus()
        },
        searchRunners() {
          const term = this.filteraccount.value
          if (term) {
            this.filteraccount.checked = true
            this.filteraccount.value = term
            this.filterusers.checked = false
            this.filterusers.value = ''
            this.runnersSearch = this.runners.reduce((acc, runner) => {
              if (runner.account.toLowerCase().includes(term.toLowerCase())) {
                acc.push(runner)
              } else if (runner.api.toLowerCase().includes(term.toLowerCase())) {
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
        validateForm(formKey, validKey) {
          console.log('vf', formKey, validKey)
          var Container = document.querySelector(`#${formKey}`);
          var badFeedback = Container.querySelector('.is-invalid');
          console.log('bf', badFeedback)
          if (badFeedback.length) this[validKey] = false
          else this[validKey] = true
        },
        buyDEX() {
          if (!this.buyFormValid) return
          var allowed = false
          const reqs = [
            this.$refs.buyQty
          ]
          console.log(reqs[0])
          var andthen = ' at market rate',
            rate = undefined,
            hours = 720
          if (!buymarket.checked) {
            rate = parseFloat((this.buyhive.checked ? this.buyHiveTotal : this.buyHBDTotal) / this.buyQuantity).toFixed(6)
            andthen = ` at ${rate} ${this.buyhive.checked ? 'HIVE' : 'HBD' } per ${this.TOKEN}`
          }
          if (this.buyhive.checked) broadcastTransfer({
            to: this.multisig,
            hive: this.buyHiveTotal * 1000,
            memo: JSON.stringify({
              rate: this.buyPrice,
              hours: this.buyHours
            })
          }, `Buying ${this.TOKEN} with ${parseFloat((hive||hbd)/1000).toFixed(3)} ${hive?'HIVE':'HBD'} ${andthen}`, lapi.split('://')[1])
          else if (!this.buyhive.checked) broadcastTransfer({
            to: this.multisig,
            hbd: this.buyHBDTotal * 1000,
            memo: JSON.stringify({
              rate: this.buyPrice,
              hours: this.buyHours
            })
          }, `Buying ${this.TOKEN} with ${parseFloat((hive||hbd)/1000).toFixed(3)} ${hive ?'HIVE':'HBD'} ${andthen}`, lapi.split('://')[1])
        },
        sellDEX() {
          // if (document.getElementById('sellform').classList.contains('needs-validation')) {
          //   return
          // }
          var andthen = ' at market rate',
            dlux = parseInt(parseFloat(this.sellQuantity) * 1000),
            hive = parseInt(parseFloat(this.sellHiveTotal) * 1000),
            hbd = parseInt(parseFloat(this.sellHBDTotal) * 1000),
            hours = parseInt(this.sellHours)
          if (hive || hbd) {
            const price = parseFloat(dlux / (this.buyhive.checked ? hive : hbd)).toFixed(6)
            andthen = ` at ${price} ${this.buyhive.checked ?'HIVE':'HBD'} per ${this.TOKEN}`
          }
          if (this.buyhive.checked && dlux) broadcastCJA({
            [this.TOKEN.toLocaleLowerCase()]: dlux,
            hive,
            hours
          }, `${this.prefix}dex_sell`, `Selling ${parseFloat(dlux/1000).toFixed(3)} ${this.TOKEN}${andthen}`, lapi.split('://')[1])
          else if (!this.buyhive.checked && dlux) broadcastCJA({
            [this.TOKEN.toLocaleLowerCase()]: dlux,
            hbd,
            hours
          }, `${this.prefix}dex_sell`, `Selling ${parseFloat(dlux/1000).toFixed(3)} ${this.TOKEN}${andthen}`, lapi.split('://')[1])
        },
        cancelDEX(txid) {
          if (txid) broadcastCJA({
            txid
          }, `${this.prefix}dex_clear`, `Canceling: ${txid}`, lapi.split('://')[1])
        },
        getHistorical() {
          const pair = this.buyhive.checked ? 'hive' : 'hbd'
          const numbars = this.barcount
          const period = parseInt(this.barwidth)
          const now = this.nowtime
          var startdate = new Date(now - (period * numbars)).getTime()
          var currentBucket = startdate
          const dex = this.dexapi
          if (!dex.markets.hive.his) return
          const current_block = this.stats.lastIBlock
          const buckets = Object.keys(dex.markets[pair].days)
          buckets.sort(function(a, b) {
            return parseInt(a) - parseInt(b)
          })
          var bars = [],
            current = {
              o: 0,
              h: 0,
              l: 0,
              c: 0,
              v: 0
            }
          for (var i = 0; i < buckets.length; i++) {
            if (new Date(now - (3000 * (current_block - parseInt(buckets[i])))).getTime() > currentBucket) {
              if (!bars.length) {
                while (new Date(now - (3000 * (current_block - parseInt(buckets[i])))).getTime() > currentBucket + period) {
                  bars.push({
                    x: currentBucket,
                    o: dex.markets[pair.toLowerCase()].days[buckets[i]].o,
                    h: dex.markets[pair.toLowerCase()].days[buckets[i]].o,
                    l: dex.markets[pair.toLowerCase()].days[buckets[i]].o,
                    c: dex.markets[pair.toLowerCase()].days[buckets[i]].o,
                    v: 0
                  })
                  currentBucket = new Date(currentBucket + period).getTime()
                }
              } else {
                while (new Date(now - (3000 * (current_block - parseInt(buckets[i])))).getTime() > currentBucket + period) {
                  bars.push({
                    x: currentBucket,
                    o: bars[bars.length - 1].c,
                    h: bars[bars.length - 1].c,
                    l: bars[bars.length - 1].c,
                    c: bars[bars.length - 1].c,
                    v: 0
                  })
                  currentBucket = new Date(currentBucket + period).getTime()
                }
              }
              if (dex.markets[pair.toLowerCase()].days[buckets[i]].t > current.h) current.h = dex.markets[pair.toLowerCase()].days[buckets[i]].t
              if (dex.markets[pair.toLowerCase()].days[buckets[i]].b < current.l) current.l = dex.markets[pair.toLowerCase()].days[buckets[i]].b
              current.c = dex.markets[pair.toLowerCase()].days[buckets[i]].c
              current.v += dex.markets[pair.toLowerCase()].days[buckets[i]].v
              if (buckets[i + 1] && new Date(now - (3000 * (current_block - parseInt(buckets[i + 1])))).getTime() > currentBucket + period) {
                bars.push({
                  x: currentBucket,
                  o: current.o,
                  h: current.h,
                  l: current.l,
                  c: current.c,
                  v: current.v
                })
                currentBucket = new Date(currentBucket + period).getTime()
                current.o = current.c
                current.h = current.c
                current.l = current.c
                current.c = current.c
                current.v = 0
              } else if (!buckets[i + 1]) {
                bars.push({
                  x: currentBucket,
                  o: current.o,
                  h: current.h,
                  l: current.l,
                  c: current.c,
                  v: current.v
                })
              }
            }
          }
          let items = Object.keys(dex.markets[pair.toLowerCase()].his)
          for (var i = 0; i < items.length; i++) {
            if (new Date(now - (3000 * (current_block - parseInt(items[i].split(':')[0])))).getTime() > currentBucket) {
              if (!bars.length) {
                while (new Date(now - (3000 * (current_block - parseInt(items[i].split(':')[0])))).getTime() > currentBucket + period) {
                  bars.push({
                    x: currentBucket,
                    o: parseFloat(dex.markets[pair.toLowerCase()].his[items[i]].price),
                    h: parseFloat(dex.markets[pair.toLowerCase()].his[items[i]].price),
                    l: parseFloat(dex.markets[pair.toLowerCase()].his[items[i]].price),
                    c: parseFloat(dex.markets[pair.toLowerCase()].his[items[i]].price),
                    v: 0
                  })
                  currentBucket = new Date(currentBucket + period).getTime()
                }
              } else {
                while (new Date(now - (3000 * (current_block - parseInt(items[i].split(':')[0])))).getTime() > currentBucket + period) {
                  bars.push({
                    x: currentBucket,
                    o: bars[bars.length - 1].c,
                    h: bars[bars.length - 1].c,
                    l: bars[bars.length - 1].c,
                    c: bars[bars.length - 1].c,
                    v: 0
                  })
                  currentBucket = new Date(currentBucket + period).getTime()
                }
              }
              if (parseFloat(dex.markets[pair.toLowerCase()].his[items[i]].price) > current.h) current.h = parseFloat(dex.markets[pair.toLowerCase()].his[items[i]].price)
              if (parseFloat(dex.markets[pair.toLowerCase()].his[items[i]].price) < current.l) current.l = parseFloat(dex.markets[pair.toLowerCase()].his[items[i]].price)
              current.c = parseFloat(dex.markets[pair.toLowerCase()].his[items[i]].price)
              current.v += parseFloat(dex.markets[pair.toLowerCase()].his[items[i]].target_vol)
              if (items[i + 1] && new Date(now - (3000 * (current_block - parseInt(items[i + 1].split(':')[0])))).getTime() > currentBucket + period) {
                bars.push({
                  x: currentBucket,
                  o: current.o,
                  h: current.h,
                  l: current.l,
                  c: current.c,
                  v: current.v
                })
                currentBucket = new Date(currentBucket + period).getTime()
                current.o = parseFloat(dex.markets[pair.toLowerCase()].his[items[i]].price)
                current.h = parseFloat(dex.markets[pair.toLowerCase()].his[items[i]].price)
                current.l = parseFloat(dex.markets[pair.toLowerCase()].his[items[i]].price)
                current.c = parseFloat(dex.markets[pair.toLowerCase()].his[items[i]].price)
                current.v = 0
              } else if (!items[i + 1]) {
                bars.push({
                  x: currentBucket,
                  o: current.o,
                  h: current.h,
                  l: current.l,
                  c: current.c,
                  v: current.v
                })
              }
            }
          }
          var newBars = []
          for (var i = 0; i < bars.length; i++) {
            newBars.push([bars[i].x, bars[i].o, bars[i].h, bars[i].l, bars[i].c, bars[i].v])
          }
          this.ohlcv = newBars
        }
      },
      mounted() {
        this.chart.width = this.$refs.chartContainer.scrollWidth - 15
        this.chart.height = this.chart.width / 2.5
        this.$refs.dumbo.style = `width: ${this.chart.width}px; height: ${this.chart.height + 30}px;`
        window.addEventListener('resize', this.onResize)
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
            this.runners = data.result.sort((a, b) => {
              return b.g - a.g
            })
          })
        fetch(this.lapi + '/markets')
          .then(response => response.json())
          .then(data => {
            this.nodes = data.markets.node
            if (data.markets.node[user]) this.isnode = true
            this.stats = data.stats
          })
        fetch(this.lapi + '/api/protocol')
          .then(response => response.json())
          .then(data => {
            this.prefix = data.prefix
            this.multisig = data.multisig
            this.jsontoken = data.jsontoken
            this.TOKEN = data.jsontoken.toUpperCase()
            location.hash = data.jsontoken
            this.node = data.node
            this.features = data.features ? data.features : this.features
            this.behind = data.behind
            this.behindTitle = data.behind + ' Blocks Behind Hive'
            fetch(this.lapi + '/api/recent/HIVE_' + this.TOKEN + '?limit=1000')
              .then(response => response.json())
              .then(data => {
                this.volume.hive = data.recent_trades.reduce((a, b) => {
                  if (b.trade_timestamp > this.agoTime) return a + parseInt(parseFloat(b.target_volume) * 1000)
                  else return a
                }, 0) / 1000
                this.volume.token_hive = data.recent_trades.reduce((a, b) => {
                  if (b.trade_timestamp > this.agoTime) return a + parseInt(parseFloat(b.base_volume) * 1000)
                  else return a
                }, 0) / 1000
                this.recenthive = data.recent_trades.sort((a, b) => {
                  return parseInt(b.trade_timestamp) - parseInt(a.trade_timestamp)
                })
              })
            fetch(this.lapi + '/api/recent/HBD_' + this.TOKEN + '?limit=1000')
              .then(response => response.json())
              .then(data => {
                this.volume.hbd = data.recent_trades.reduce((a, b) => {
                  if (b.trade_timestamp > this.agoTime) return a + parseInt(parseFloat(b.target_volume) * 1000)
                  else return a
                }, 0) / 1000
                this.volume.token_hbd = data.recent_trades.reduce((a, b) => {
                  if (b.trade_timestamp > this.agoTime) return a + parseInt(parseFloat(b.base_volume) * 1000)
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
              if (!acc.length || acc[acc.length - 1].rate != cur.rate) {
                cur.total = cur.hive + (acc[acc.length - 1]?.total || 0)
                cur.at = cur.amount + (acc[acc.length - 1]?.amount || 0)
                acc.push(cur)
              } else {
                acc[acc.length - 1].total = cur.hive + acc[acc.length - 1].total
                acc[acc.length - 1].hive = cur.hive + acc[acc.length - 1].hive
                acc[acc.length - 1].amount = cur.amount + acc[acc.length - 1].amount
                acc[acc.length - 1].at = cur.amount + acc[acc.length - 1].at
              }
              return acc
            }, [])
            this.hivesells = data.markets.hive.sells.sort(function(a, b) {
              return parseFloat(a.rate) - parseFloat(b.rate)
            }).reduce((acc, cur) => {
              if (!acc.length || acc[acc.length - 1].rate != cur.rate) {
                cur.total = cur.hive + (acc[acc.length - 1]?.total || 0)
                cur.at = cur.amount + (acc[acc.length - 1]?.amount || 0)
                acc.push(cur)
              } else {
                acc[acc.length - 1].total = cur.hive + acc[acc.length - 1].total
                acc[acc.length - 1].hive = cur.hive + acc[acc.length - 1].hive
                acc[acc.length - 1].amount = cur.amount + acc[acc.length - 1].amount
                acc[acc.length - 1].at = cur.amount + acc[acc.length - 1].at
              }
              return acc
            }, [])
            this.hbdbuys = data.markets.hbd.buys.sort(function(a, b) {
              return parseFloat(b.rate) - parseFloat(a.rate)
            }).reduce((acc, cur) => {
              if (!acc.length || acc[acc.length - 1].rate != cur.rate) {
                cur.total = cur.hbd + (acc[acc.length - 1]?.total || 0)
                cur.at = cur.amount + (acc[acc.length - 1]?.amount || 0)
                acc.push(cur)
              } else {
                acc[acc.length - 1].total = cur.hbd + acc[acc.length - 1].total
                acc[acc.length - 1].hbd = cur.hbd + acc[acc.length - 1].hbd
                acc[acc.length - 1].amount = cur.amount + acc[acc.length - 1].amount
                acc[acc.length - 1].at = cur.amount + acc[acc.length - 1].at
              }
              return acc
            }, [])
            this.hbdsells = data.markets.hbd.sells.sort(function(a, b) {
              return parseFloat(a.rate) - parseFloat(b.rate)
            }).reduce((acc, cur) => {
              if (!acc.length || acc[acc.length - 1].rate != cur.rate) {
                cur.total = cur.hbd + (acc[acc.length - 1]?.total || 0)
                cur.at = cur.amount + (acc[acc.length - 1]?.amount || 0)
                acc.push(cur)
              } else {
                acc[acc.length - 1].total = cur.hbd + acc[acc.length - 1].total
                acc[acc.length - 1].hbd = cur.hbd + acc[acc.length - 1].hbd
                acc[acc.length - 1].amount = cur.amount + acc[acc.length - 1].amount
                acc[acc.length - 1].at = cur.amount + acc[acc.length - 1].at
              }
              return acc
            }, [])
            this.dexapi = data
            this.getHistorical()
            if (this.hivesells[0]) this.buyPrice = this.hivesells[0].rate
            if (this.hivebuys[0]) this.sellPrice = this.hivebuys[0].rate
          })
        if (user != 'GUEST') fetch(this.lapi + '/@' + user)
          .then(response => response.json())
          .then(data => {
            this.balance = (data.balance / 1000).toFixed(3)
            this.bartoken = this.balance
            this.barpow = ((data.poweredUp + data.granted - data.granting) / 1000).toFixed(3)
            this.bargov = (data.gov / 1000).toFixed(3)
            this.accountapi = data
            console.log('claim logic', new Date().getMonth() + 1, data.drop?.last_claim, data.drop?.availible.amount)
            if (new Date().getMonth() + 1 != parseInt(data.drop?.last_claim, 16) && data.drop?.availible.amount > 0) {
              this.hasDrop = true
              this.dropnai = `${parseFloat(data.drop.availible.amount / Math.pow(10, data.drop.availible.precision)).toFixed(data.drop.availible.precision)} ${data.drop.availible.token}`
            }
            this.openorders = data.contracts
              .reduce((acc, cur) => {
                cur.nai = `${cur.type.split(':')[0] == 'hive' ? parseFloat(cur.hive/1000).toFixed(3) : parseFloat(cur.hbd/1000).toFixed(3)} ${cur.type.split(':')[0] == 'hive' ? 'HIVE' : 'HBD'}`
                if (cur.partials && cur.partials.length && cur.type.split(':')[1] == 'sell') {
                  const filled = cur.partials.reduce(function(a, c) {
                    return a + c.coin
                  }, 0)
                  cur.percentFilled = parseFloat(100 * filled / (cur.hive ? cur.hive : cur.hbd + filled)).toFixed(2)
                  acc.push(cur)
                } else if (cur.partials && cur.partials.length) {
                  const filled = cur.partials.reduce(function(a, c) {
                    return a + c.token
                  }, 0)
                  cur.percentFilled = parseFloat(100 * filled / (cur.amount + filled)).toFixed(2)
                  acc.push(cur)
                } else {
                  cur.percentFilled = "0.00"
                  acc.push(cur)
                }
                console.log({
                  acc
                })
                return acc
              }, [])
          })
        if (user != 'GUEST') fetch(hapi, {
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
        chartTitle: {
          get() {
            return `${this.TOKEN}:${this.buyhive.checked ? 'HIVE' : 'HBD'}`
          }
        },
        minbuy: {
          get() {
            return parseFloat(parseFloat(parseFloat(this.buyPrice / 1000).toFixed(3)) + 0.001).toFixed(3)
          }
        },
        minsell: {
          get() {
            return parseFloat(parseFloat(parseFloat(this.sellPrice / 0.001).toFixed(3)) + 0.001).toFixed(3)
          }
        },
        maxhbuy: {
          get() {
            return parseFloat((this.dexapi.markets.hive.tick * (this.stats.dex_max / 100) * (1 - ((this.buyPrice / this.dexapi.markets.hive.tick) * (this.stats.dex_slope / 100))) * this.stats.safetyLimit) / 1000).toFixed(3)
          }
        },
        maxdbuy: {
          get() {
            return parseFloat((this.dexapi.markets.hbd.tick * (this.stats.dex_max / 100) * (1 - ((this.buyPrice / this.dexapi.markets.hbd.tick) * (this.stats.dex_slope / 100))) * this.stats.safetyLimit) / 1000).toFixed(3)
          }
        },
        marketCap: {
          get() {
            if (this.buyhive.checked) return `${parseFloat((this.stats.tokenSupply/1000) * this.hiveprice.hive.usd * this.dexapi.markets.hive.tick).toFixed(2)}`
            else return `${parseFloat((this.stats.tokenSupply/1000) * this.hbdprice.hive_dollar.usd * this.dexapi.markets.hbd.tick).toFixed(2)}`
          }
        },
      }
    }) // vue 2
    // }).mount('#app') // vue 3
  </script>
</head>

<body class="d-flex flex-column bg-darker text-white h-100 padme-t70" id="index">
  <?php
  $path = $_SERVER['DOCUMENT_ROOT'];
  $path .= "/mod/nav.php";
  include_once($path);
  ?>
  <div id="app">
    <main role="main" class="flex-shrink-0 text-white">
      <div class="container-fluid px-0 ">
        <div class="container-fluid fixed-top bg-dark px-0" style="margin-top: 66px; z-index: 900;">
          <div class="d-flex flex-column justify-content-between align-items-center px-3 py-1" style="background-color: black;">
            <div class="d-flex align-itmes-center justify-content-between w-100">
              <div class="d-flex align-items-center">
                <!-- token select -->
                <div id="userselectapi">
                  <div class="dropdown show"> <a class="btn btn-sm btn-dark dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Token </a>
                    <div class="dropdown-menu bg-black rounded">
                      <h6 class="dropdown-header">HIVE / HBD</h6>
                      <a class="dropdown-item text-white-50" href="#/" @click="setApi('https://token.dlux.io')">DLUX</a> <a class="dropdown-item text-white-50" href="#/" @click="setApi('https://spkinstant.hivehoneycomb.com')">LARYNX</a>
                      <div class="dropdown-divider bg-light"></div>
                      <a class="dropdown-item text-white-50" href="#/" @click="setApi()">Manual</a>
                    </div>
                  </div>
                </div>
                <!-- node settings form -->
                <div id="usernode" class="ml-3" v-if="isnode">
                  <div class="dropdown show d-flex align-items-center "><a class="btn btn-sm btn-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-cog"></i></a>
                    <div class="dropdown-menu p-4 text-white-50 text-left bg-black dropdown-menu-left" style="width: 300px">
                      <h6 class="dropdown-header text-center">{{TOKEN}} NODE SETTINGS</h6>
                      <h4 class="text-center text-white-50">@{{account}}</h4>
                      <form name="nodesettings" class="needs-validation" novalidate>
                        <div class="form-group" v-for="opt in features.node.opts">
                          <label :for="opt.json">{{opt.S}}:</label>
                          <div class="input-group">
                            <!-- <div class="input-group-prepend">
                              <div class="input-group-text bg-dark border-dark text-white-50">https://</div>
                            </div> -->
                            <input v-if="opt.type == 'text'" :type="opt.type" v-model="opt.val" class="form-control bg-dark border-dark text-info" :id="opt.json" :placeholder="opt.info">
                            <input v-if="opt.type == 'number'" :type="opt.type" v-model="opt.val" class="form-control bg-dark border-dark text-info" :id="opt.json" :placeholder="opt.info" :max="opt.max" :min="opt.min">
                          </div>
                        </div>
                        <!-- <div class="form-group"> <br>
                          <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="escrowCheck" checked disabled>
                            <label class="custom-control-label" for="escrowCheck">Escrow Agent</label>
                          </div>
                          <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="mirrorCheck" disabled>
                            <label class="custom-control-label" for="mirrorCheck">Mirror Leader</label>
                          </div>
                        </div> -->
                        <div class="text-center mt-3">
                          <button id="savenodesettings" type="button" class="btn btn-secondary" @click="saveNodeSettings()">Save<i class="far fa-save ml-2"></i></button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- node status btn -->
                <div :title="behindTitle" class="d-flex align-items-center mx-3"> <a class="text-center" style="font-size: .7em;" :class="{'text-success':'behind < 30'}" :class="{'text-warning':'behind >= 30 && behind < 60'}" :class="{'text-danger':'behind >= 60'}" type="button" data-toggle="collapse" data-target="#nodedrawer" aria-expanded="false" aria-controls="nodedrawer"> <span class=" p-0 m-0"><i class="fas fa-circle mr-2"></i><span class=" p-0 m-0" v-show="behind < 30">ONLINE</span> <span class=" p-0 m-0" v-show="behind >= 30 && behind <=100">LAGGING</span> <span class=" p-0 m-0" v-show="behind > 100">OFFLINE</span></span> <span class="p-0 m-0 ml-1">({{runners.length}} <i class="fas fa-user-lock"></i>)</span> </a> </div>
              </div>
              <div class="d-flex align-items-center">
                <!-- claim tokens form -->
                <div v-if="hasDrop || accountapi.claim" id="userdlux" class="mx-4">
                  <div class="dropdown show d-flex align-items-center "> <a class="btn btn-sm btn-rb" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Claim <i class="fas fa-gift"></i></a>
                    <div class="dropdown-menu p-4 text-white-50 text-left bg-black dropdown-menu-left" style="width: 300px">
                      <h6 class="dropdown-header text-center">CLAIM {{TOKEN}}</h6>
                      <form v-if="hasDrop" name="claimlarynxad">
                        <div class="form-group">
                          <label>Airdrop:</label>
                          <div class="input-group">
                            <div class="form-control bg-black border-rb text-white text-center">{{dropnai}}</div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="text-center mt-3">
                            <button id="claimlarynxad" type="button" class="btn background-rb" @click="dropClaim()">Claim<i class="fas fa-coins ml-2"></i></button>
                          </div>
                        </div>
                      </form>
                      <div class="d-none dropdown-divider dark-divider"></div>
                      <form v-if="accountapi.claim" name="claimlarynxrewards">
                        <div class="form-group">
                          <label>Rewards:</label>
                          <div class="input-group">
                            <div class="form-control bg-black border-rb text-white text-center">{{toFixed(accountapi.claim/1000,3)}} {{TOKEN}}</div>
                          </div>
                        </div>
                        <div class="custom-control custom-switch" v-if="isnode && features.rewardSel">
                          <input type="checkbox" class="custom-control-input" v-model="features.reward2Gov" id="claimToGov">
                          <label class="custom-control-label" for="claimToGov">Claim 1/2 to Gov</label>
                        </div>
                        <div class="form-group">
                          <div class="text-center mt-3">
                            <button id="claimlarynxrewards" type="button" class="btn background-rb" @click="rewardClaim()">Claim<i class="fas fa-coins ml-2"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-flex align-items-center text-white-50">
                <!-- send token form -->
                <div id="userdlux" class="mx-4" v-if="features.send_B">
                  <div class="dropdown show d-flex align-items-center "><a class="text-warning" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{formatNumber(bartoken,3,'.',',')}} {{TOKEN}}</a>
                    <div class="dropdown-menu p-4 text-white-50 text-left bg-black dropdown-menu-right" style="width: 300px">
                      <h6 class="dropdown-header text-center">SEND {{TOKEN}}</h6>
                      <form @submit.prevent="tokenSend()" class="needs-validation">
                        <div class="form-group">
                          <label for="sendlarynxto">To:</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text bg-dark border-dark text-white-50">@</div>
                            </div>
                            <input class="form-control bg-dark border-dark text-info" v-model="sendTo" @blur="checkAccount('sendTo', 'sendAllowed')" required id="sendlarynxto" type="text" placeholder="Recipient">
                          </div>
                        </div>
                        <div class="form-group">
                          <label id="sendlarynxamountlab" for="sendlarynxamount">Amount:</label>
                          <div class="input-group">
                            <input class="form-control bg-dark border-dark text-info" v-model="sendAmount" required id="sendlarynxamount" type="number" step="0.001" min="0.001" :max="parseFloat(bartoken)" placeholder="0.000">
                            <div class="input-group-append">
                              <div class="input-group-text bg-dark border-dark text-white-50" id="sendformunits"> {{TOKEN}} </div>
                            </div>
                          </div>
                          <div class="small pt-2"><a href="#/" @click="setValue('sendAmount', parseFloat(bartoken))" class="text-warning">{{formatNumber(bartoken,3,'.',',')}} {{TOKEN}}</a> Available</div>
                        </div>
                        <validation-provider v-slot="v">
                          <input v-model="value" type="text">
                        </validation-provider>
                        <div class="form-group" id="sendlarynxmemogroup">
                          <label for="sendlarynxmemo">Memo:</label>
                          <div class="input-group">
                            <input class="form-control bg-dark border-dark text-info" v-model="sendMemo" id="sendlarynxmemo" type="text" placeholder="Include a memo (optional)">
                          </div>
                        </div>
                        <div class="text-center mt-3">
                          <button id="sendlarynxmodalsend" type="submit" class="btn btn-warning">Send<i class="fas fa-paper-plane ml-2"></i></button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- power form -->
                <div id="userdpwr" class="mx-4" v-if="features.powup_B || features.powdn_B">
                  <div class="dropdown show d-flex align-items-center "><a class="text-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{formatNumber(barpow,3,'.',',')}} {{TOKEN}}P</a>
                    <div class="dropdown-menu p-4 text-white-50 text-left bg-black dropdown-menu-right" style="width: 300px">
                      <h6 class="dropdown-header text-center">{{TOKEN}} POWER</h6>
                      <form name="pwrlarynx" class="needs-validation" novalidate>
                        <div class="form-group text-center">
                          <div class="btn-group btn-group-toggle my-2" data-toggle="buttons">
                            <label class="btn btn-outline-primary active">
                              <input type="radio" name="pwrpair" id="pwrup" :checked="features.powsel_up" @click="setValue('features.powsel_up', true)">
                              PWR UP </label>
                            <label class="btn btn-outline-primary">
                              <input type="radio" name="pwrpair" id="pwrdown" :checked="!features.powsel_up" @click="setValue('features.powsel_up', false)">
                              PWR DOWN </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <label id="govuplarynxamountlab">Amount</label>
                          <div class="input-group">
                            <input class="form-control bg-dark border-dark text-primary" v-if="features.powsel_up" v-model="features.pow_val" required id="pwruplarynxamount" type="number" step="0.001" min="0.001" :max="parseFloat(bartoken)" placeholder="0.000">
                            <input class="form-control bg-dark border-dark text-primary" v-if="!features.powsel_up" v-model="features.pow_val" required id="pwrdownlarynxamount" type="number" step="0.001" min="0.001" :max="parseFloat(barpow)" placeholder="0.000">
                            <div class="input-group-append">
                              <div class="input-group-text bg-dark border-dark text-white-50" v-if="features.powsel_up" id="govupformunits"> {{TOKEN}} </div>
                              <div class="input-group-text bg-dark border-dark text-white-50" v-if="!features.powsel_up" id="govdownformunits"> {{TOKEN}}P </div>
                            </div>
                          </div>
                          <div class="small py-2" v-if="features.powsel_up"><a href="#/" @click="setValue('features.pow_val',balance)" class="text-primary">{{formatNumber(bartoken,3,'.',',')}} {{TOKEN}}</a> Available</div>
                          <div class="small py-2" v-if="!features.powsel_up"><a href="#/" @click="setValue('features.pow_val',accountapi.poweredUp/1000)" class="text-primary">{{formatNumber(barpow,3,'.',',')}} {{TOKEN}}P</a> Available</div>
                        </div>
                        <div class="text-center mt-3">
                          <button id="pwruplarynxmodalsend" type="submit" class="btn btn-primary" v-if="features.powsel_up" @click="power()">Power Up<i class="fas fa-arrow-alt-circle-up ml-2"></i></button>
                          <button id="pwrdownlarynxmodalsend" type="submit" class="btn btn-primary" v-if="!features.powsel_up" @click="power()">Power Down<i class="fas fa-arrow-alt-circle-down ml-2"></i></button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- gov form -->
                <div id="userdgov" class="mx-4" v-if="isnode && (features.govup_B || features.govdn_B)">
                  <div class="dropdown show d-flex align-items-center "><a class="text-info" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{formatNumber(bargov,3,'.',',')}} {{TOKEN}}G</a>
                    <div class="dropdown-menu p-4 text-white-50 text-left bg-black dropdown-menu-right" style="width: 300px">
                      <h6 class="dropdown-header text-center">{{TOKEN}} GOVERNANCE</h6>
                      <h4 class="dropdown-header text-center">Current Threshold: {{formatNumber(stats.gov_threshhold/1000,3,'.',',')}}</h4>
                      <form name="govlarynx" @submit.prevent="gov()" class="needs-validation" novalidate>
                        <div class="form-group text-center">
                          <div class="btn-group btn-group-toggle my-2" data-toggle="buttons">
                            <label class="btn btn-outline-info active">
                              <input type="radio" name="govpair" id="govlock" :checked="features.govsel_up" @click="setValue('features.govsel_up', true)">
                              LOCK </label>
                            <label class="btn btn-outline-info">
                              <input type="radio" name="govpair" id="govunlock" :checked="!features.govsel_up" @click="setValue('features.govsel_up', false)">
                              UNLOCK </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <label id="govuplarynxamountlab">Amount</label>
                          <div class="input-group">
                            <input class="form-control bg-dark border-dark text-info" v-if="features.govsel_up" v-model="features.gov_val" required id="govuplarynxamount" type="number" step="0.001" min="0.001" :max="parseFloat(bartoken)" placeholder="0.000">
                            <input class="form-control bg-dark border-dark text-info" v-if="!features.govsel_up" v-model="features.gov_val" required id="govdownlarynxamount" type="number" step="0.001" min="0.001" :max="parseFloat(bargov)" placeholder="0.000">
                            <div class="input-group-append">
                              <div class="input-group-text bg-dark border-dark text-white-50" v-if="features.govsel_up" id="govupformunits"> {{TOKEN}} </div>
                              <div class="input-group-text bg-dark border-dark text-white-50" v-if="!features.govsel_up" id="govdownformunits"> {{TOKEN}}G </div>
                            </div>
                          </div>
                          <div class="small py-2" v-if="features.govsel_up"><a href="#/" @click="setValue('features.gov_val',balance)" class="text-info">{{formatNumber(bartoken,3,'.',',')}} {{TOKEN}}</a> Available</div>
                          <div class="small py-2" v-if="!features.govsel_up"><a href="#/" @click="setValue('features.gov_val',accountapi.gov/1000)" class="text-info">{{formatNumber(bargov,3,'.',',')}} {{TOKEN}}G</a> Locked</div>
                        </div>
                        <div class="text-center">
                          <button id="locklarynxmodalsend" type="submit" class="btn btn-info" v-if="features.govsel_up">Lock Gov<i class="fas fa-lock ml-2"></i></button>
                          <button id="unlocklarynxmodalsend" type="submit" class="btn btn-info" v-if="!features.govsel_up">Unlock Gov<i class="fas fa-lock-open ml-2"></i></button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- send hive form -->
                <div id="userhive" class="mx-4">
                  <div class="dropdown show d-flex align-items-center "><a class="text-danger" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{formatNumber(barhive,3,'.',',')}} HIVE</a>
                    <div class="dropdown-menu p-4 text-white-50 text-left bg-black dropdown-menu-right" style="width: 300px">
                      <h6 class="dropdown-header text-center">SEND HIVE</h6>
                      <form name="sendhive" class="needs-validation" novalidate>
                        <div class="form-group">
                          <label for="sendhiveto">To:</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text bg-dark border-dark text-white-50">@</div>
                            </div>
                            <input class="form-control bg-dark border-dark text-info" @blur="checkAccount('sendHiveTo', 'sendHiveAllowed')" required v-model="sendHiveTo" type="text" placeholder="Recipient">
                          </div>
                        </div>
                        <div class="form-group">
                          <label id="sendhiveamountlab" for="sendhiveamount">Amount:</label>
                          <div class="input-group">
                            <input class="form-control bg-dark border-dark text-info" required v-model="sendHiveAmount" type="number" step="0.001" min="0.001" :max="parseFloat(barhive)" placeholder="0.000">
                            <div class="input-group-append">
                              <div class="input-group-text bg-dark border-dark text-white-50"> HIVE </div>
                            </div>
                          </div>
                          <div class="small pt-2"><a href="#/" @click="setValue('sendHiveAmount',parseFloat(barhive))" class="text-danger">{{formatNumber(barhive,3,'.',',')}} HIVE</a> Available</div>
                        </div>
                        <div class="form-group" id="sendhivememogroup">
                          <label for="sendhivememo">Memo:</label>
                          <div class="input-group">
                            <input class="form-control bg-dark border-dark text-info" id="sendhivememo" type="text" v-model="sendHiveMemo" placeholder="Include a memo (optional)">
                          </div>
                        </div>
                        <div class="text-center mt-3">
                          <button id="sendhivemodalsend" type="submit" class="btn btn-danger" @click="sendhive()">Send<i class="fas fa-paper-plane ml-2"></i></button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- send hbd form -->
                <div id="userhbd" class="mx-4">
                  <div class="dropdown show d-flex align-items-center "><a class="text-success" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{formatNumber(barhbd,3,'.',',')}} HBD</a>
                    <div class="dropdown-menu p-4 text-white-50 text-left bg-black dropdown-menu-right" style="width: 300px">
                      <h6 class="dropdown-header text-center">SEND HBD</h6>
                      <form name="sendhbd" class="needs-validation" novalidate>
                        <div class="form-group">
                          <label for="sendhbdto">To:</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text bg-dark border-dark text-white-50">@</div>
                            </div>
                            <input class="form-control bg-dark border-dark text-info" @blur="checkAccount('sendHBDTo', 'sendHBDAllowed')" required v-model="sendHBDTo" type="text" placeholder="Recipient">
                          </div>
                        </div>
                        <div class="form-group">
                          <label id="sendhbdamountlab" for="sendhbdamount">Amount:</label>
                          <div class="input-group">
                            <input class="form-control bg-dark border-dark text-info" required v-model="sendHBDAmount" type="number" step="0.001" min="0.001" :max="parseFloat(barhbd)" placeholder="0.000">
                            <div class="input-group-append">
                              <div class="input-group-text bg-dark border-dark text-white-50" id="sendhbdformunits"> HBD </div>
                            </div>
                          </div>
                          <div class="small pt-2"><a href="#/" @click="setValue('sendHBDAmount',parseFloat(barhbd))" class="text-success">{{formatNumber(barhbd,3,'.',',')}} HBD</a> Available</div>
                        </div>
                        <div class="form-group" id="sendhbdmemogroup">
                          <label for="sendhbdmemo">Memo:</label>
                          <div class="input-group">
                            <input class="form-control bg-dark border-dark text-info" v-model="sendHBDMemo" type="text" placeholder="Include a memo (optional)">
                          </div>
                        </div>
                        <div class="text-center mt-3">
                          <button id="sendhbdmodalsend" type="submit" class="btn btn-success" @click="sendhbd()">Send<i class="fas fa-paper-plane ml-2"></i></button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- node collapse region -->
            <div id="nodedrawer" class="collapse">
              <div class="py-5">
                <div class="container">
                  <div class="d-flex flex-wrap align-items-center justify-content-between mb-3">
                    <div class="mr-2">
                      <div role="group" class="input-group">
                        <div class="input-group-prepend l-radius-hotfix"><span class="input-group-text bg-dark border-dark text-secondary" @click="focus('filteraccount')"><i class="fas fa-search"></i></span></div>
                        <input type="text" v-on:keyup="searchRunners()" class="form-control bg-dark border-dark text-info" id="filteraccount" v-model="filteraccount.value" @ aria-required="true" placeholder="Search">
                        <div class="input-group-append p-0 m-0">
                          <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix" style="width: 42px"> <span v-if="filteraccount.value"> <a href="#" class="badge badge-secondary" @click="setValue('filteraccount.value','')"><i class="fas fa-times"></i></a> </span> </div>
                        </div>
                      </div>
                    </div>
                    <div class=""> <span class="text-muted">{{lapi}} - {{behind}} block(s) behind HIVE</span> </div>
                  </div>
                  <div class="table-responsive">
                    <table role="table" aria-busy="false" aria-colcount="3" class="table table-dark bg-darker text-white-50 table-striped table-hover table-borderless mb-0" id="larynxnodes">
                      <thead role="rowgroup" class="">
                        <tr role="row" class="">
                          <th role="columnheader" v-bind:class="{'col-sort':filteraccount.usera || filteraccount.userd}" class="" aria-colindex="1">
                            <div class="d-flex align-items-center">
                              <div class="mr-3">USER NAME</div>
                              <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" v-bind:class="{'bg-primary':filteraccount.usera}" @click="sort(!filteraccount.value ? 'runners' : 'runnersSearch','account','asc');toggleAPI('usera')"> <i class="fas fa-caret-up"></i></button>
                              <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" v-bind:class="{'bg-primary':filteraccount.userd}" @click="sort(!filteraccount.value ? 'runners' : 'runnersSearch','account','desc');toggleAPI('userd')"> <i class="fas fa-caret-down"></i></button>
                            </div>
                          </th>
                          <th role="columnheader" v-bind:class="{'col-sort':filteraccount.gova || filteraccount.govd}" class="" aria-colindex="2">
                            <div class="d-flex align-items-center">
                              <div class="mr-3">GOV BAL</div>
                              <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" v-bind:class="{'bg-primary':filteraccount.gova}" @click="sort(!filteraccount.value ? 'runners' : 'runnersSearch','g','asc');toggleAPI('gova')"> <i class="fas fa-caret-up"></i></button>
                              <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" v-bind:class="{'bg-primary':filteraccount.govd}" @click="sort(!filteraccount.value ? 'runners' : 'runnersSearch','g','desc');toggleAPI('govd')"> <i class="fas fa-caret-down"></i></button>
                            </div>
                          </th>
                          <th role="columnheader" v-bind:class="{'col-sort':filteraccount.apia || filteraccount.apid}" class="" aria-colindex="3">
                            <div class="d-flex align-items-center">
                              <div class="mr-3">API (Click to load)</div>
                              <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" v-bind:class="{'bg-primary':filteraccount.apia}" @click="sort(!filteraccount.value ? 'runners' : 'runnersSearch','api','asc');toggleAPI('apia')"> <i class="fas fa-caret-up"></i></button>
                              <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" v-bind:class="{'bg-primary':filteraccount.apid}" @click="sort(!filteraccount.value ? 'runners' : 'runnersSearch','api','desc');toggleAPI('apid')"> <i class="fas fa-caret-down"></i></button>
                            </div>
                          </th>
                        </tr>
                      </thead>
                      <tbody role="rowgroup" class="tbody-scroll-nodes">
                        <tr class="" role="row" v-for="node in runners" v-if="!filteraccount.value">
                          <td role="cell" class="" aria-colindex="1"><a :href="atref(node.account)">@{{node.account}}</a></td>
                          <td role="cell" class="" aria-colindex="2">{{formatNumber(node.g/1000,3,'.',',')}}</td>
                          <td role="cell" class="" aria-colindex="3"><a href="#" @click="setApi(node.api)">{{node.api}}</a></td>
                        </tr>
                        <tr class="" role="row" v-for="node in runnersSearch" v-if="filteraccount.value">
                          <td role="cell" class="" aria-colindex="1"><a :href="atref(node.account)">@{{node.account}}</a></td>
                          <td role="cell" class="" aria-colindex="2">{{formatNumber(node.g/1000,3,'.',',')}}</td>
                          <td role="cell" class="" aria-colindex="3"><a href="#" @click="setApi(node.api)">{{node.api}}</a></td>
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
          <!-- current token tick -->
          <div class="row">
            <div class="col-4">
              <div class="jumbotron p-3 bg-dark" v-if="buyhive.checked">
                <div class="d-flex align-items-center" id="dluxhivequote">
                  <div>
                    <h2 class="lead my-0"><b>{{TOKEN}}: ${{toFixed((dexapi.markets ? dexapi.markets.hive.tick : 0) * hiveprice.hive.usd, 6)}}</b></h2>
                  </div>
                  <div class="ml-auto d-flex align-items-center">
                    <div class="dropdown show d-flex align-items-center p-0 m-0"><a class="text-white py-0 px-2 m-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-info-circle mx-2"></i></a>
                      <div class="dropdown-menu p-4 text-white-50 text-left bg-black dropdown-menu-right">
                        <h6 class="dropdown-header">{{TOKEN}} STATS</h6>
                        <div class="dropdown-divider bg-light"></div>
                        <p class="mb-0">Supply:</p>
                        <p>{{formatNumber(stats.tokenSupply/1000,3,'.',',')}}</p>
                        <div class="dropdown-divider bg-light"></div>
                        <p class="mb-0">Market Cap:</p>
                        <p>${{formatNumber(marketCap,2,'.',',')}}</p>
                        <div class="dropdown-divider bg-light"></div>
                        <p class="mb-0">DEX Fee:</p>
                        <p>{{formatNumber(stats.dex_fee*100,3,'.',',')}}%</p>
                        <div class="dropdown-divider bg-light"></div>
                        <p class="mb-0">Clearing Time:</p>
                        <p class="mb-0">~10 Minutes</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="jumbotron p-3 bg-dark" v-if="buyhbd.checked">
                <div class="d-flex align-items-center" id="dluxhbdquote">
                  <div>
                    <h2 class="lead my-0"><b>{{TOKEN}}: ${{toFixed((dexapi ? dexapi.markets.hbd.tick : 0 )* hbdprice.hive_dollar.usd, 6)}}</b></h2>
                  </div>
                  <div class="ml-auto d-flex align-items-center">
                    <div class="dropdown show d-flex align-items-center p-0 m-0"><a class="text-white py-0 px-2 m-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-info-circle mx-2"></i></a>
                      <div class="dropdown-menu p-4 text-white-50 text-left bg-black dropdown-menu-right">
                        <h6 class="dropdown-header">{{TOKEN}} STATS</h6>
                        <div class="dropdown-divider bg-light"></div>
                        <p class="mb-0">Supply:</p>
                        <p>{{formatNumber(stats.tokenSupply/1000,3,'.',',')}}</p>
                        <div class="dropdown-divider bg-light"></div>
                        <p class="mb-0">Market Cap:</p>
                        <p>${{formatNumber(marketCap,2,'.',',')}}</p>
                        <div class="dropdown-divider bg-light"></div>
                        <p class="mb-0">DEX Fee:</p>
                        <p>{{formatNumber(stats.dex_fee*100,3,'.',',')}}%</p>
                        <div class="dropdown-divider bg-light"></div>
                        <p class="mb-0">Clearing Time:</p>
                        <p class="mb-0">~10 Minutes</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
          </div>
          <!-- market stats -->
          <div id="market" class="row text-center">
            <div class="mt-2 col-lg-3">
              <h5>Market</h5>
              <div class="container-fluid mt-3">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-outline-warning active">
                    <input name="buypair" type="radio" id="buyhive" checked @click="togglecoin('hive');setValue('buyHiveTotal', 0);setValue('sellHiveTotal', 0);setValue('buyHBDTotal', 0);setValue('sellHBDTotal', 0);getHistorical()">
                    HIVE </label>
                  <label class="btn btn-outline-warning">
                    <input type="radio" name="buypair" id="buyhbd" @click="togglecoin('hbd');setValue('buyHBDTotal', 0);setValue('sellHBDTotal', 0);setValue('buyHiveTotal', 0);setValue('sellHiveTotal', 0);getHistorical()">
                    HBD </label>
                </div>
              </div>
            </div>
            <div class="col-lg-9" v-if="buyhive.checked">
              <div class="row">
                <div class="mt-2 col">
                  <h5>Bid</h5>
                  <i class="fab fa-hive mr-1"></i>{{hivebuys[0] ? hivebuys[0].rate : 0}}<br>
                  <i class="fas fa-dollar-sign mx-1"></i>{{toFixed((hivebuys[0] ? hivebuys[0].rate : 0 ) * hiveprice.hive.usd, 6)}}
                </div>
                <div class="mt-2 col">
                  <h5>Ask</h5>
                  <i class="fab fa-hive mr-1"></i>{{hivesells[0] ? hivesells[0].rate : 0}}<br>
                  <i class="fas fa-dollar-sign mx-1"></i>{{toFixed((hivesells[0] ? hivesells[0].rate : 0 ) * hiveprice.hive.usd, 6)}}
                </div>
                <div class="mt-2 col">
                  <h5>Last</h5>
                  <i class="fab fa-hive mr-1"></i>{{dexapi.markets ? dexapi.markets.hive.tick : 0}} <br>
                  <i class="fas fa-dollar-sign mx-1"></i>{{toFixed((dexapi.markets ? dexapi.markets.hive.tick : 0 ) * hiveprice.hive.usd, 6)}}
                </div>
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
                  <i class="fas fa-dollar-sign mx-1"></i>{{toFixed((hbdbuys[0] ? hbdbuys[0].rate : 0 ) * hbdprice.hive_dollar.usd, 6)}}
                </div>
                <div class="mt-2 col">
                  <h5>Ask</h5>
                  <i class="fab fa-hive mr-1"></i>{{hbdsells[0] ? hbdsells[0].rate : 0}}<br>
                  <i class="fas fa-dollar-sign mx-1"></i>{{toFixed((hbdsells[0] ? hbdsells[0].rate : 0 ) * hbdprice.hive_dollar.usd, 6)}}
                </div>
                <div class="mt-2 col">
                  <h5>Last</h5>
                  <i class="fab fa-hive mr-1"></i>{{dexapi.markets ? dexapi.markets.hive.tick : 0}} <br>
                  <i class="fas fa-dollar-sign mx-1"></i>{{toFixed((dexapi.markets ? dexapi.markets.hive.tick : 0 ) * hbdprice.hive_dollar.usd, 6)}}
                </div>
                <div class="mt-2 col">
                  <h5>24h Volume</h5>
                  <i class="fab fa-hive mr-1"></i>{{volume.hbd}}<br>
                  <i class="fas fa-dollar-sign mx-1"></i>{{toFixed(volume.hbd * hbdprice.hive_dollar.usd, 2)}}
                </div>
              </div>
            </div>
          </div>
          <!-- market chart -->
          <div class="marketChart mt-3 mb-3">
            <div id="chartContainer" ref="dumbo">
              <trading-vue :data="this.$data" ref="tvjs" :id="chart.id" :width="chart.width" :height="chart.height" :title-txt="chartTitle" :color-back="chart.bg" />
              <!-- Trading Vue 2 -->
            </div>
            <div class="mt-2 text-center d-flex justify-content-between">
              <div>
                <!-- <script type="text/javascript">
    $('#time-scale').multiselect();
</script>  -->
                <select id="time-scale" class="custom-select bg-darker border-dark text-muted" v-model="barwidth" @change="getHistorical()">
                  <option value="60000">1m</option>
                  <option value="300000">5m</option>
                  <option value="900000">15m</option>
                  <option value="3600000">1h</option>
                  <option value="21600000" selected>6h</option>
                  <option value="86400000">1d</option>
                </select>
              </div>
              <div></div>
              <div>
                <button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#openordersdrawer" aria-expanded="false" aria-controls="openordersdrawer">OPEN ORDERS ({{openorders.length}}) <i class="fas fa-book-reader ml-2"></i></button>
              </div>
            </div>
            <div id="openordersdrawer" class="collapse ">
              <div class="py-5">
                <div v-if="openorders.length == 0" class="text-center text-white-50">
                  <h5>No open orders</h5>
                </div>
                <div class="table-responsive" v-if="openorders.length > 0">
                  <table role="table" aria-busy="false" aria-colcount="7" class="table table-dark bg-darker text-white-50 table-striped table-hover table-borderless mb-0" id="useropenorders">
                    <thead role="rowgroup" class="">
                      <tr role="row" class="">
                        <th role="columnheader" class="" v-bind:class="{'col-sort':orders.blocka || orders.blockd}" aria-colindex="1">
                          <div class="d-flex align-items-center">
                            <div class="mr-3">BLOCK</div>
                            <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" @click="sort('openorders','block','asc');toggleOrders('blocka')" v-bind:class="{'bg-primary':orders.blocka}"> <i class="fas fa-caret-up"></i></button>
                            <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" @click="sort('openorders','block','desc');toggleOrders('blockd')" v-bind:class="{'bg-primary':orders.blockd}"> <i class="fas fa-caret-down"></i></button>
                          </div>
                        </th>
                        <th role="columnheader" class="" v-bind:class="{'col-sort':orders.tokena || orders.tokend}" aria-colindex="2">
                          <div class="d-flex align-items-center">
                            <div class="mr-3">{{TOKEN}}</div>
                            <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" @click="sort('openorders','amount','asc');toggleOrders('tokena')" v-bind:class="{'bg-primary':orders.tokena}"> <i class="fas fa-caret-up"></i></button>
                            <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" @click="sort('openorders','amount','desc');toggleOrders('tokend')" v-bind:class="{'bg-primary':orders.tokend}"> <i class="fas fa-caret-down"></i></button>
                          </div>
                        </th>
                        <th role="columnheader" class="" v-bind:class="{'col-sort':orders.coina || orders.coind}" aria-colindex="3">
                          <div class="d-flex align-items-center">
                            <div class="mr-3">HIVE/HBD</div>
                            <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" @click="sort('openorders','nai','asc');toggleOrders('coina')" v-bind:class="{'bg-primary':orders.coina}"> <i class="fas fa-caret-up"></i></button>
                            <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" @click="sort('openorders','nai','desc');toggleOrders('coind')" v-bind:class="{'bg-primary':orders.coind}"> <i class="fas fa-caret-down"></i></button>
                          </div>
                        </th>
                        <th role="columnheader" class="" v-bind:class="{'col-sort':orders.filleda || orders.filledd}" aria-colindex="4">
                          <div class="d-flex align-items-center">
                            <div class="mr-3">FILLED</div>
                            <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" @click="sort('openorders','percentFilled','asc');toggleOrders('filleda')" v-bind:class="{'bg-primary':orders.filleda}"> <i class="fas fa-caret-up"></i></button>
                            <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" @click="sort('openorders','percentFilled','desc');toggleOrders('filledd')" v-bind:class="{'bg-primary':orders.filledd}"> <i class="fas fa-caret-down"></i></button>
                          </div>
                        </th>
                        <th role="columnheader" class="" v-bind:class="{'col-sort':orders.ratea || orders.rated}" aria-colindex="5">
                          <div class="d-flex align-items-center">
                            <div class="mr-3">RATE</div>
                            <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" @click="sort('openorders','rate','asc');toggleOrders('ratea')" v-bind:class="{'bg-primary':orders.ratea}"> <i class="fas fa-caret-up"></i></button>
                            <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" @click="sort('openorders','rate','desc');toggleOrders('rated')" v-bind:class="{'bg-primary':orders.rated}"> <i class="fas fa-caret-down"></i></button>
                          </div>
                        </th>
                        <th role="columnheader" class="" v-bind:class="{'col-sort':orders.typea || orders.typed}" aria-colindex="6">
                          <div class="d-flex align-items-center">
                            <div class="mr-3">TYPE</div>
                            <button title="Sort Ascending" type="button" class="mx-1 btn btn-sm btn-dark" @click="sort('openorders','type','asc');toggleOrders('typea')" v-bind:class="{'bg-primary':orders.typea}"> <i class="fas fa-caret-up"></i></button>
                            <button title="Sort Descending" type="button" class="mx-1 btn btn-sm btn-dark" @click="sort('openorders','type','desc');toggleOrders('typed')" v-bind:class="{'bg-primary':orders.typed}"> <i class="fas fa-caret-down"></i></button>
                          </div>
                        </th>
                        <th role="columnheader" class="" aria-colindex="7">
                          <div class="d-flex align-items-center">
                            <div class="mr-3">&nbsp;</div>
                          </div>
                        </th>
                      </tr>
                    </thead>
                    <tbody role="rowgroup">
                      <tr role="row" class="" v-for="order in openorders" v-if="!orders.value">
                        <td role="cell" class="" aria-colindex="1">{{order.block}}</td>
                        <td role="cell" class="" aria-colindex="2">{{formatNumber(order.amount/1000,3,'.',',')}}</td>
                        <td role="cell" class="" aria-colindex="3">{{order.nai}}</td>
                        <td role="cell" class="" aria-colindex="4">{{formatNumber(order.percentFilled,3,'.',',')}}%</td>
                        <td role="cell" class="" aria-colindex="5" v-bind:class="{'text-danger':(order.type == 'hive:sell' || order.type == 'hbd:sell'), 'text-success':(order.type == 'hive:buy' || order.type == 'hbd:buy')}">{{formatNumber(order.rate,6,'.',',')}}</td>
                        <td role="cell" class="" aria-colindex="6" v-bind:class="{'text-danger':(order.type == 'hive:sell' || order.type == 'hbd:sell'), 'text-success':(order.type == 'hive:buy' || order.type == 'hbd:buy')}">{{toUpperCase(order.type)}}</td>
                        <td role="cell" class="" aria-colindex="7"><button class="btn btn-sm btn-outline-warning" id="cancelbtn" @click="cancelDEX(order.txid,prefix)">CANCEL</button></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- trade forms -->
          <div id="tradeForms">
            <div class="row">
              <div class="mt-3 col-md-6">
                <h4>Buy {{TOKEN}}</h4>
                <form name="buy" id="buyForm" @submit.prevent="validateForm('buyForm', 'buyFormValid');buyDEX()" class="form-horizontal needs-validation" novalidate>
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
                      <div class="text-right">
                        <div class="small text-muted" v-if="buyhive.checked">BALANCE<br>
                          <a href="#/" @click="setValue('buyHiveTotal',parseFloat(barhive) < maxhbuy? parseFloat(barhive) : maxhbuy)">{{formatNumber(barhive,3,'.',',')}} HIVE</a>
                        </div>
                        <div class="small text-muted" v-if="buyhbd.checked">BALANCE<br>
                          <a href="#/" @click="setValue('buyHBDTotal',parseFloat(barhbd) < maxhbuy? parseFloat(barhbd) : maxhbuy)">{{formatNumber(barhbd,3,'.',',')}} HBD</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group" for="buyQuantity" id="buy-qty" aria-labelledby="buy-qty-label" v-if="buylimit.checked">
                    <div class="form-row">
                      <legend tabindex="-1" class="col-sm-4 col-form-label" id="buy-qty-label">Quantity</legend>
                      <div tabindex="-1" role="group" class="col">
                        <div role="group" class="input-group">
                          <input type="number" v-on:keyup="bcalc('t')" ref="buyQty" required class="form-control bg-dark border-dark text-info" v-model="buyQuantity" id="buyQuantity" placeholder="0" :min="minbuy" step="0.001" aria-required="true" :readonly="bform.tl">
                          <div class="input-group-append">
                            <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix"> {{TOKEN}} <a href="#/" class="ml-3 text-secondary" @click="block('t')"><i class="fas" :class="{'fa-lock':bform.tl, 'fa-unlock-alt':!bform.tl}"></i></a> </div>
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
                          <input id="buyPrice" type="number" v-on:keyup="bcalc('p')" v-model="buyPrice" placeholder="0" required step="0.000001" min="0.000001" aria-required="true" class="form-control bg-dark border-dark text-info" :readonly="bform.pl">
                          <div class="input-group-append">
                            <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix"> <span v-if="buyhive.checked">HIVE</span> <span v-if="buyhbd.checked">HBD</span> /{{TOKEN}} <a href="#/" class="ml-3 text-secondary" @click="block('p')"><i class="fas" :class="{'fa-lock':bform.pl, 'fa-unlock-alt':!bform.pl}"></i></a> </div>
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
                          <input type="number" class="form-control bg-dark text-info border-dark" :readonly="bform.cl" v-model="buyHiveTotal" id="buyHiveTotal" required v-on:keyup="bcalc('c')" placeholder="0" :min="minbuy" step="0.001" :max="parseFloat(barhive) < parseFloat(maxhbuy) ? toFixed(parseFloat(barhive),3) : maxhbuy" aria-required="true">
                          <div class="input-group-append">
                            <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">HIVE <a href="#/" class="ml-3 text-secondary" @click="block('c')" v-if="buylimit.checked"><i class="fas" :class="{'fa-lock':bform.cl, 'fa-unlock-alt':!bform.cl}"></i></a> </div>
                          </div>
                          <div class="invalid-feedback"> Your balance is {{barhive}} - minimum: {{minbuy}} - max: {{parseFloat(barhive) < parseFloat(maxhbuy) ? toFixed(parseFloat(barhive),3) : maxhbuy}}{{parseFloat(barhive) < parseFloat(maxhbuy) ? '' : '(Liquidity)'}}</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group" for="buyHBDTotal" id="buy-hbd-total" aria-labelledby="buy-hbd-total-label" v-if="buyhbd.checked">
                    <div class="form-row">
                      <legend tabindex="-1" class="col-sm-4 col-form-label" id="buy-hbd-total-label">Total</legend>
                      <div tabindex="-1" role="group" class="col">
                        <div role="group" class="input-group">
                          <input type="number" class="form-control bg-dark text-info border-dark" :readonly="bform.cl" v-model="buyHBDTotal" id="buyHBDTotal" required v-on:keyup="bcalc('c')" placeholder="0" :min="minbuy" step="0.001" :max="parseFloat(barhbd) < parseFloat(maxdbuy) ? toFixed(parseFloat(barhbd),3) : maxdbuy" aria-required="true">
                          <div class="input-group-append">
                            <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">HBD <a href="#/" class="ml-3 text-secondary" @click="block('c')" v-if="buylimit.checked"><i class="fas" :class="{'fa-lock':bform.cl, 'fa-unlock-alt':!bform.cl}"></i></a> </div>
                          </div>
                          <div class="invalid-feedback"> Your balance is {{barhbd}} - minimum: {{minbuy}} - max: {{parseFloat(barhbd) < parseFloat(maxdbuy) ? toFixed(parseFloat(barhbd),3) : maxdbuy}}{{parseFloat(barhbd) < parseFloat(maxdbuy) ? '' : '(Liquidity)'}}</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group" for="buyHours" id="buy-hours" aria-labelledby="buy-hours-label" v-if="buylimit.checked">
                    <div class="form-row">
                      <legend tabindex="-1" class="col-sm-4 col-form-label" id="buy-total-label">Expiration</legend>
                      <div tabindex="-1" role="group" class="col">
                        <div role="group" class="input-group">
                          <input id="buyHours" v-model="buyHours" type="number" required step="1" min="1" max="720" aria-required="true" class="form-control bg-dark border-dark text-info" :readonly="buymarket.checked">
                          <div class="input-group-append">
                            <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">HOURS</div>
                          </div>
                          <div class="invalid-feedback"> Expiration must be between 1 and 720 hours </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-right">
                    <button type="submit" class="btn btn-success">Buy</button>
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
                      <div class="text-right">
                        <div class="small text-muted">BALANCE<br>
                          <a href="#/" @click="setValue('sellQuantity',balance)">{{formatNumber(bartoken,3,'.',',')}} {{TOKEN}}</a>
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
                          <input id="sellPrice" v-on:keyup="scalc('p')" v-model="sellPrice" type="number" placeholder="0" required step="0.000001" min="0.000001" aria-required="true" class="form-control bg-dark border-dark text-info" :readonly="sform.pl">
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
                          <input type="number" class="form-control bg-dark border-dark text-info" :readonly="sform.cl" id="sellHiveTotal" required v-model="sellHiveTotal" v-on:keyup="scalc('c')" placeholder="0" min="0.001" step="0.001" aria-required="true">
                          <div class="input-group-append">
                            <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">HIVE<a href="#/" class="ml-3 text-secondary" @click="slock('c')" v-if="selllimit.checked"><i class="fas" :class="{'fa-lock':sform.cl, 'fa-unlock-alt':!sform.cl}"></i></a></div>
                          </div>
                          <div class="invalid-feedback"> Minimum total is 0.001 - increase the Price or use Market Type. </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group" for="sellHBDTotal" id="sell-hbd-total" aria-labelledby="sell-hbd-total-label" v-if="buyhbd.checked && selllimit.checked">
                    <div class="form-row">
                      <legend tabindex="-1" class="col-sm-4 col-form-label" id="sell-hbd-total-label">Total</legend>
                      <div tabindex="-1" role="group" class="col">
                        <div role="group" class="input-group">
                          <input type="number" class="form-control bg-dark border-dark text-info" :readonly="sform.cl" id="sellHBDTotal" v-model="sellHBDTotal" required placeholder="0" min="0.001" step="0.001" aria-required="true">
                          <div class="input-group-append">
                            <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">HBD<a href="#/" class="ml-3 text-secondary" @click="slock('c')" v-if="selllimit.checked"><i class="fas" :class="{'fa-lock':sform.cl, 'fa-unlock-alt':!sform.cl}"></i></a></div>
                          </div>
                          <div class="invalid-feedback"> Minimum total is 0.001 - increase the Price or use Market Type. </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group" for="sellHours" id="sell-hours" aria-labelledby="sell-hours-label" v-if="!sellmarket.checked">
                    <div class="form-row">
                      <legend tabindex="-1" class="col-sm-4 col-form-label" id="sell-total-label">Expiration</legend>
                      <div tabindex="-1" role="group" class="col">
                        <div role="group" class="input-group">
                          <input id="sellHours" v-on:keyup="scalc('c')" v-model="sellHours" type="number" required step="1" min="1" max="720" aria-required="true" class="form-control bg-dark border-dark text-info" :readonly="sellmarket.checked">
                          <div class="input-group-append">
                            <div class="input-group-text bg-dark border-dark text-white-50 r-radius-hotfix">HOURS</div>
                          </div>
                          <div class="invalid-feedback"> Expiration must be between 1 and 720 hours </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-right">
                    <button type="submit" class="btn btn-danger" @click="sellDEX()">Sell</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- HIVE orders -->
          <div id="hiveData" v-if="buyhive.checked">
            <div id="hiveMarketOrders">
              <div class="row">
                <div class="mt-3 col-md-6">
                  <h4>Buy Orders</h4>
                  <div class="table-responsive">
                    <table role="table" aria-busy="false" aria-colcount="4" class="table table-dark bg-darker text-white table-striped table-hover table-borderless" id="hivebuyordertable">
                      <thead role="rowgroup">
                        <tr role="row">
                          <th role="columnheader" scope="col" aria-colindex="1" class="">TOTAL HIVE</th>
                          <th role="columnheader" scope="col" aria-colindex="2" class="">
                            <div>HIVE</div>
                          </th>
                          <th role="columnheader" scope="col" aria-colindex="3" class="">{{TOKEN}}</th>
                          <th role="columnheader" scope="col" aria-colindex="4" class="">
                            <div>BID</div>
                          </th>
                        </tr>
                      </thead>
                      <tbody role="rowgroup" class="tbody-scroll-orders">
                        <tr role="row" v-for="item in hivebuys">
                          <td aria-colindex="1" role="cell" class="">{{formatNumber(item.total/1000,3,'.',',')}}</td>
                          <td aria-colindex="2" role="cell" class="">{{formatNumber(item.hive/1000,3,'.',',')}}</td>
                          <td aria-colindex="3" role="cell" class="">{{formatNumber(item.amount/1000,3,'.',',')}}</td>
                          <td aria-colindex="4" role="cell" class="text-primary"><a href="#/" @click="setValue('buyPrice', item.rate);setValue('sellPrice', item.rate);suggestValue('sellQuantity', item.at > balance ? balance : item.at/1000);suggestValue('sellHiveTotal', item.at > balance ? (balance/item.total)/1000 : item.total/1000 )">{{formatNumber(item.rate,6,'.',',')}}</a></td>
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
                          <th role="columnheader" scope="col" aria-colindex="1" class="">
                            <div>ASK</div>
                          </th>
                          <th role="columnheader" scope="col" aria-colindex="2" class="">{{TOKEN}}</th>
                          <th role="columnheader" scope="col" aria-colindex="3" class="">
                            <div>HIVE</div>
                          </th>
                          <th role="columnheader" scope="col" aria-colindex="4" class="">TOTAL HIVE</th>
                        </tr>
                      </thead>
                      <tbody role="rowgroup" class="tbody-scroll-orders">
                        <tr class="" role="row" v-for="item in hivesells">
                          <td aria-colindex="1" role="cell" class="text-primary"><a href="#/" @click="setValue('buyPrice', item.rate);setValue('sellPrice', item.rate);suggestValue('buyHiveTotal', item.total/1000 );suggestValue('buyQuantity', item.at/1000 )">{{formatNumber(item.rate,6,'.',',')}}</a></td>
                          <td aria-colindex="2" role="cell" class="">{{formatNumber(item.amount/1000,3,'.',',')}}</td>
                          <td aria-colindex="3" role="cell" class="">{{formatNumber(item.hive/1000,3,'.',',')}}</td>
                          <td aria-colindex="4" role="cell" class="">{{formatNumber(item.total/1000,3,'.',',')}}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div id="hiveTradeHistory" ref="chartContainer">
              <div class="row">
                <div class="mt-3 col-12">
                  <h4>Trade History</h4>
                  <div class="table-responsive">
                    <table role="table" aria-busy="false" aria-colcount="4" class="table table-dark bg-darker text-white table-striped table-hover table-borderless" id="hivetradehistorytable">
                      <thead role="rowgroup" class="">
                        <tr role="row">
                          <th role="columnheader" scope="col" aria-colindex="1" class="">PRICE</th>
                          <th role="columnheader" scope="col" aria-colindex="2" class="">QTY</th>
                          <th role="columnheader" scope="col" aria-colindex="3" class="">TIME</th>
                        </tr>
                      </thead>
                      <tbody role="rowgroup" class="tbody-scroll-history">
                        <tr class="" role="row" v-for="item in recenthive">
                          <td aria-colindex="1" role="cell" class="" v-bind:class="{'text-danger': (item.type == 'sell'), 'text-success': (item.type == 'buy')}">{{formatNumber(item.price,6,'.',',')}}</td>
                          <td aria-colindex="2" role="cell" class="">{{formatNumber(item.target_volume,3,'.',',')}}</td>
                          <td aria-colindex="3" role="cell" class="">{{new Date(item.trade_timestamp).toLocaleTimeString()}}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- HBD orders -->
          <div id="hbdData" v-if="buyhbd.checked">
            <div id="hbdMarketOrders">
              <div class="row">
                <div class="mt-3 col-md-6">
                  <h4>Buy Orders</h4>
                  <div class="table-responsive table-scroll">
                    <table role="table" aria-busy="false" aria-colcount="4" class="table table-dark bg-darker text-white table-striped table-hover table-borderless" id="hbdbuyordertable">
                      <thead role="rowgroup" class="">
                        <tr role="row" class="">
                          <th role="columnheader" scope="col" aria-colindex="1" class="">TOTAL HBD</th>
                          <th role="columnheader" scope="col" aria-colindex="2" class="">
                            <div>HBD</div>
                          </th>
                          <th role="columnheader" scope="col" aria-colindex="3" class="">{{TOKEN}}</th>
                          <th role="columnheader" scope="col" aria-colindex="4" class="">
                            <div>BID</div>
                          </th>
                        </tr>
                      </thead>
                      <tbody role="rowgroup" class="tbody-scroll-orders">
                        <tr class="" role="row" v-for="item in hbdbuys">
                          <td aria-colindex="1" role="cell" class="">{{formatNumber(item.total/1000,3,'.',',')}}</td>
                          <td aria-colindex="2" role="cell" class="">{{formatNumber(item.hbd/1000,3,'.',',')}}</td>
                          <td aria-colindex="3" role="cell" class="">{{formatNumber(item.amount/1000,3,'.',',')}}</td>
                          <td aria-colindex="4" role="cell" class=""><a href="#/" @click="setValue('buyPrice', item.rate);setValue('sellPrice', item.rate);suggestValue('sellQuantity', item.at > balance ? balance : item.at/1000);suggestValue('sellHBDTotal', item.at > balance ? (balance/item.total)/1000 : item.total/1000 )">{{formatNumber(item.rate,6,'.',',')}}</a></td>
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
                          <th role="columnheader" scope="col" aria-colindex="1" class="">
                            <div>ASK</div>
                          </th>
                          <th role="columnheader" scope="col" aria-colindex="2" class="">{{TOKEN}}</th>
                          <th role="columnheader" scope="col" aria-colindex="3" class="">
                            <div>HBD</div>
                          </th>
                          <th role="columnheader" scope="col" aria-colindex="4" class="">TOTAL HBD</th>
                        </tr>
                      </thead>
                      <tbody role="rowgroup" class="tbody-scroll-orders">
                        <tr class="" role="row" v-for="item in hbdsells">
                          <td aria-colindex="1" role="cell" class=""><a href="#/" @click="setValue('buyPrice', item.rate);setValue('sellPrice', item.rate);;suggestValue('buyHBDTotal', item.total/1000 );suggestValue('buyQuantity', item.at/1000 )">{{formatNumber(item.rate,6,'.',',')}}</a></td>
                          <td aria-colindex="2" role="cell" class="">{{formatNumber(item.amount/1000,3,'.',',')}}</td>
                          <td aria-colindex="3" role="cell" class="">{{formatNumber(item.hbd/1000,3,'.',',')}}</td>
                          <td aria-colindex="4" role="cell" class="">{{formatNumber(item.total/1000,3,'.',',')}}</td>
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
                          <th role="columnheader" scope="col" aria-colindex="1" class="">PRICE</th>
                          <th role="columnheader" scope="col" aria-colindex="2" class="">QTY</th>
                          <th role="columnheader" scope="col" aria-colindex="3" class="">TIME</th>
                        </tr>
                      </thead>
                      <tbody role="rowgroup" class="tbody-scroll-history">
                        <tr class="" role="row" v-for="item in recenthbd">
                          <td aria-colindex="1" role="cell" class="" v-bind:class="{'text-danger': (item.type == 'sell'), 'text-success': (item.type == 'buy')}">{{formatNumber(item.price,6,'.',',')}}</td>
                          <td aria-colindex="2" role="cell" class="">{{formatNumber(item.target_volume,3,'.',',')}}</td>
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
  $path = $_SERVER['DOCUMENT_ROOT'];
  $path .= "/mod/footer.php";
  include_once($path);
  ?>

  <!-- <script>
    var slider = document.getElementById('scaleslider');

    noUiSlider.create(slider, {
      start: [0, 100],
      connect: true,
      range: {
        'min': 0,
        'max': 100
      }
    });
  </script> -->
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
  for (var i = 0; i < disabletab.length; i++) {
    disabletab[i].setAttribute('tabindex', '-1')
  }
</script>
<!-- <script type="text/javascript" src="/js/chart.js"></script> -->

</html>