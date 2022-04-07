import Vue from "https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.esm.browser.js";
import Navue from "/js/navue.js";
import LogVue from "/js/loginvue.js";
import FootVue from "/js/footvue.js";

const { TradingVue } = TradingVueJs; //vue 2 only
// export default {
//     components: {
//       Navue
//     }
//   }

let url = location.href.replace(/\/$/, "");
let lapi = "";
if (location.search) {
  const string = location.search.replace("?", "");
  let params = string.split("&");
  for (let i = 0; i < params.length; i++) {
    let param = params[i].split("=");
    if (param[0] == "api") {
      lapi = param[1];
    }
  }
  window.history.replaceState(null, null, "dex?api=" + lapi);
}
if (location.hash && !lapi) {
  const hash = url.split("#");
  if (hash[1].includes("dlux")) {
    lapi = "https://token.dlux.io";
  } else if (hash[1].includes("larynx")) {
    lapi = "https://spkinstant.hivehoneycomb.com";
  }
}
if (!lapi) {
  lapi = localStorage.getItem("lapi") || "https://token.dlux.io";
}
console.log(lapi);
if (
  lapi == "https://token.dlux.io" ||
  lapi == "https://spkinstant.hivehoneycomb.com"
) {
  console.log("using defaults");
  window.history.replaceState(null, null, "dex");
}
let user = localStorage.getItem("user") || "GUEST";
let hapi = localStorage.getItem("hapi") || "https://api.hive.blog";
console.log({
  lapi,
});

// createApp({ // vue 3
var app = new Vue({
  // vue 2
  el: "#app", // vue 2
  data() {
    return {
      ohlcv: [],
      chart: {
        id: "honeycomb_tv",
        width: 600,
        height: 400,
        toolbar: true,
        overlays: false,
        bg: `#111215`,
      },
      barcount: 500,
      barwidth: 3600000 * 6,
      nowtime: new Date().getTime(),
      agoTime: new Date().getTime() - 86400000,
      account: user,
      hasDrop: false,
      dropnai: "",
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
          usd: 1,
        },
      },
      hbdprice: {
        hive_dollar: {
          usd: 1,
        },
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
            tick: 0.001,
          },
          hbd: {
            tick: 0.001,
          },
        },
      },
      prefix: "",
      multisig: "",
      jsontoken: "",
      node: "",
      behind: "",
      stats: {},
      behindTitle: "",
      TOKEN: "LARYNX",
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
      buyHbdTotal: 0,
      sellHiveTotal: 0,
      sellHbdTotal: 0,
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
        hbd_usd: 0,
      },
      sendTo: "",
      sendAmount: 0,
      sendMemo: "",
      sendAllowed: false,
      sendHiveTo: "",
      sendHiveAllowed: false,
      sendHiveAmount: 0,
      sendHiveMemo: "",
      sendHBDTo: "",
      sendHBDAllowed: false,
      sendHBDAmount: 0,
      sendHBDMemo: "",
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
        typed: false,
      },
      features: {
        claim_id: "claim",
        claim_S: "Airdrop",
        claim_B: true,
        claim_json: "drop",
        rewards_id: "shares_claim",
        rewards_S: "Rewards",
        rewards_B: true,
        rewards_json: "claim",
        rewardSel: false,
        reward2Gov: false,
        send_id: "send",
        send_S: "Send",
        send_B: true,
        send_json: "send",
        powup_id: "power_up",
        powup_B: false,
        pow_val: "",
        powdn_id: "power_down",
        powdn_B: false,
        powsel_up: true,
        govup_id: "gov_up",
        govup_B: true,
        gov_val: "",
        govsel_up: true,
        govdn_id: "gov_down",
        govdn_B: true,
        node: {
          id: "node_add",
          opts: [
            {
              S: "Domain",
              type: "text",
              info: "https://no-trailing-slash.com",
              json: "domain",
              val: "",
            },
            {
              S: "DEX Fee Vote",
              type: "number",
              info: "500 = .5%",
              max: 1000,
              min: 0,
              json: "bidRate",
              val: "",
            },
            {
              S: "DEX Max Vote",
              type: "number",
              info: "10000 = 100%",
              max: 10000,
              min: 0,
              json: "dm",
              val: "",
            },
            {
              S: "DEX Slope Vote",
              type: "number",
              info: "10000 = 100%",
              max: 10000,
              min: 0,
              json: "ds",
              val: "",
            },
            {
              S: "DAO Claim Vote",
              type: "number",
              info: "1500 = 15%",
              max: 10000,
              min: 0,
              json: "dv",
              val: "",
            },
          ],
        },
      },
      accountinfo: {},
      filterusers: {
        checked: true,
        value: "",
      },
      filteraccount: {
        checked: false,
        value: "",
        usera: false,
        userd: false,
        gova: false,
        govd: true,
        apia: false,
        apid: false,
      },
      lockgov: {
        checked: true,
      },
      unlockgov: {
        checked: false,
      },
      buyhive: {
        checked: true,
      },
      buyhbd: {
        checked: false,
      },
      buylimit: {
        checked: true,
      },
      buymarket: {
        checked: false,
      },
      selllimit: {
        checked: true,
      },
      sellmarket: {
        checked: false,
      },
      pwrup: {
        checked: true,
      },
      pwrdown: {
        checked: false,
      },
      govlock: {
        checked: true,
      },
      govunlock: {
        checked: false,
      },
    };
  },
  beforeDestroy() {
    window.removeEventListener("resize", this.onResize);
  },
  components: {
    TradingVue,
    "nav-vue": Navue,
    "log-vue": LogVue,
    "foot-vue": FootVue,
  },
  methods: {
    onResize(event) {
      this.chart.width = this.$refs.chartContainer.scrollWidth - 15;
      this.chart.height = this.chart.width / 2.5;
      this.$refs.dumbo.style = `width: ${this.chart.width}px; height: ${
        this.chart.height + 30
      }px;`;
    },
    saveNodeSettings() {
      let updates = {};
      for (var i = 0; i < this.features.node.opts.length; i++) {
        if (this.features.node.opts[i].val) {
          updates[this.features.node.opts[i].json] =
            this.features.node.opts[i].val;
        }
      }
      broadcastCJA(
        updates,
        `${this.prefix}${this.features.node.id}`,
        `Updating ${this.TOKEN} Node...`,
        lapi.split("://")[1]
      );
    },
    dropClaim() {
      broadcastCJA(
        {
          claim: true,
        },
        `${this.prefix}${this.features.claim_id}`,
        `Claiming ${this.TOKEN}...`,
        lapi.split("://")[1]
      );
    },
    rewardClaim() {
      broadcastCJA(
        {
          gov: this.features.reward2Gov,
        },
        `${this.prefix}${this.features.rewards_id}`,
        `Claiming ${this.TOKEN}...`,
        lapi.split("://")[1]
      );
    },
    power() {
      if (this.features.pow_val && this.powFormValid)
        broadcastCJA(
          {
            amount: parseInt(this.features.pow_val * 1000),
          },
          `${this.prefix}${
            this.features.powsel_up
              ? this.features.powup_id
              : this.features.powdn_id
          }`,
          `${this.features.powsel_up ? "" : "Down-"}Powering ${this.TOKEN}...`,
          lapi.split("://")[1]
        );
    },
    gov() {
      if (this.features.gov_val && this.govFormValid)
        broadcastCJA(
          {
            amount: parseInt(this.features.gov_val * 1000),
          },
          `${this.prefix}${
            this.features.govsel_up
              ? this.features.govup_id
              : this.features.govdn_id
          }`,
          `${this.features.govsel_up ? "" : "Un-"}Locking ${this.TOKEN}...`,
          lapi.split("://")[1]
        );
    },
    checkAccount(name, key) {
      fetch("https://anyx.io", {
        body: `{\"jsonrpc\":\"2.0\", \"method\":\"condenser_api.get_accounts\", \"params\":[[\"${this[name]}\"]], \"id\":1}`,
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        method: "POST",
      })
        .then((r) => {
          return r.json();
        })
        .then((re) => {
          if (re.result.length) this[key] = true;
          else this[key] = false;
        });
    },
    tokenSend() {
      if (!this.sendFormValid) return;
      if (this.sendAllowed) {
        broadcastCJA(
          {
            to: this.sendTo,
            amount: parseInt(this.sendAmount * 1000),
            memo: this.sendMemo,
          },
          `${this.prefix}send`,
          `Trying to send ${this.TOKEN}...`,
          lapi.split("://")[1]
        );
      } else alert("Username not found");
    },
    sendhive() {
      if (!this.hiveFormValid) return;
      if (this.sendHiveAllowed)
        broadcastTransfer({
          to: this.sendHiveTo,
          hive: this.sendHiveAmount * 1000,
          memo: this.sendHiveMemo,
        });
      else alert("Account Not Found");
    },
    sendhbd() {
      if (!this.hbdFormValid) return;
      if (this.sendHBDAllowed)
        broadcastTransfer({
          to: this.sendHBDTo,
          hbd: this.sendHBDAmount * 1000,
          memo: this.sendHBDMemo,
        });
      else alert("Account Not Found");
    },
    bcalc(k) {
      switch (k) {
        case "t":
          this.buyQuantity = parseFloat(this.buyQuantity);
          if (this.bform.cl) {
            if (this.buyhive.checked)
              this.buyPrice = (this.buyHiveTotal / this.buyQuantity).toFixed(6);
            else
              this.buyPrice = (this.buyHbdTotal / this.buyQuantity).toFixed(6);
          } else {
            if (this.buyhive.checked)
              this.buyHiveTotal = (this.buyPrice * this.buyQuantity).toFixed(3);
            else
              this.buyHbdTotal = (this.buyPrice * this.buyQuantity).toFixed(3);
          }
          break;
        case "p":
          this.buyPrice = parseFloat(this.buyPrice);
          if (this.bform.cl) {
            if (this.buyhive.checked)
              this.buyQuantity = (this.buyHiveTotal / this.buyPrice).toFixed(3);
            else
              this.buyQuantity = (this.buyHbdTotal / this.buyPrice).toFixed(3);
          } else {
            if (this.buyhive.checked)
              this.buyHiveTotal = (this.buyPrice * this.buyQuantity).toFixed(3);
            else
              this.buyHbdTotal = (this.buyPrice * this.buyQuantity).toFixed(3);
          }
          break;
        case "c":
          if (this.buyhive.checked)
            this.buyHiveTotal = parseFloat(this.buyHiveTotal);
          else this.buyHbdTotal = parseFloat(this.buyHbdTotal);
          if (this.buylimit.checked) {
            if (this.bform.pl) {
              if (this.buyhive.checked)
                this.buyQuantity = (this.buyHiveTotal / this.buyPrice).toFixed(
                  3
                );
              else
                this.buyQuantity = (this.buyHbdTotal / this.buyPrice).toFixed(
                  3
                );
            } else {
              if (this.buyhive.checked)
                this.buyPrice = (this.buyHiveTotal / this.buyQuantity).toFixed(
                  6
                );
              else
                this.buyPrice = (this.buyHbdTotal / this.buyQuantity).toFixed(
                  6
                );
            }
          }
          break;
        default:
      }
    },
    localStoreSet(k, v) {
      localStorage.setItem(k, v);
    },
    scalc(k) {
      switch (k) {
        case "t":
          this.sellQuantity = parseFloat(this.sellQuantity);
          if (this.sform.cl) {
            if (this.buyhive.checked)
              this.sellPrice = (this.sellHiveTotal / this.sellQuantity).toFixed(
                6
              );
            else
              this.sellPrice = (this.sellHbdTotal / this.sellQuantity).toFixed(
                6
              );
          } else {
            if (this.buyhive.checked)
              this.sellHiveTotal = (this.sellPrice * this.sellQuantity).toFixed(
                3
              );
            else
              this.sellHbdTotal = (this.sellPrice * this.sellQuantity).toFixed(
                3
              );
          }
          break;
        case "p":
          this.sellPrice = parseFloat(this.sellPrice);
          if (this.sform.cl) {
            if (this.buyhive.checked)
              this.sellQuantity = (this.sellHiveTotal / this.sellPrice).toFixed(
                3
              );
            else
              this.sellQuantity = (this.sellHbdTotal / this.sellPrice).toFixed(
                3
              );
          } else {
            if (this.buyhive.checked)
              this.sellHiveTotal = (this.sellPrice * this.sellQuantity).toFixed(
                3
              );
            else
              this.sellHbdTotal = (this.sellPrice * this.sellQuantity).toFixed(
                3
              );
          }
          break;
        case "c":
          if (this.buyhive.checked)
            this.sellHiveTotal = parseFloat(this.sellHiveTotal);
          else this.sellHbdTotal = parseFloat(this.sellHbdTotal);
          if (this.selllimit.checked) {
            if (this.sform.pl) {
              if (this.buyhive.checked)
                this.sellQuantity = (
                  this.sellHiveTotal / this.sellPrice
                ).toFixed(3);
              else
                this.sellQuantity = (
                  this.sellHbdTotal / this.sellPrice
                ).toFixed(3);
            } else {
              if (this.buyhive.checked)
                this.sellPrice = (
                  this.sellHiveTotal / this.sellQuantity
                ).toFixed(6);
              else
                this.sellPrice = (
                  this.sellHbdTotal / this.sellQuantity
                ).toFixed(6);
            }
          }
          break;
        default:
      }
    },
    block(o) {
      switch (o) {
        case "t":
          this.bform.tl = !this.bform.tl;
          this.bform.cl = false;
          this.bform.pl = !this.bform.tl;
          break;
        case "c":
          this.bform.cl = !this.bform.cl;
          this.bform.tl = false;
          this.bform.pl = !this.bform.cl;
          break;
        case "p":
          this.bform.pl = !this.bform.pl;
          this.bform.cl = !this.bform.pl;
          this.bform.tl = false;
          break;
        default:
          this.bform.cl = false;
          this.bform.tl = false;
          this.bform.pl = true;
          break;
      }
    },
    slock(o) {
      switch (o) {
        case "t":
          this.sform.tl = !this.sform.tl;
          this.sform.cl = false;
          this.sform.pl = !this.sform.tl;
          break;
        case "c":
          this.sform.cl = !this.sform.cl;
          this.sform.tl = false;
          this.sform.pl = !this.sform.cl;
          break;
        case "p":
          this.sform.pl = !this.sform.pl;
          this.sform.cl = !this.sform.pl;
          this.sform.tl = false;
          break;
        default:
          this.sform.cl = false;
          this.sform.tl = false;
          this.sform.pl = true;
          break;
      }
    },
    toFixed(value, decimals) {
      return Number(value).toFixed(decimals);
    },
    parseFloat(value) {
      return parseFloat(value);
    },
    toUpperCase(value) {
      return value.toUpperCase();
    },
    formatNumber(t, n, r, e) {
      if (typeof t != "number") t = parseFloat(t);
      if (isNaN(t)) return "Invalid Number";
      if (!isFinite(t)) return (t < 0 ? "-" : "") + "infinite";
      (r = r || "."), (e = e || "");
      var u = t < 0;
      t = Math.abs(t);
      var a = (null != n && 0 <= n ? t.toFixed(n) : t.toString()).split("."),
        i = a[0],
        o = 1 < a.length ? r + a[1] : "";
      if (e)
        for (var c = /(\d+)(\d{3})/; c.test(i); )
          i = i.replace(c, "$1" + e + "$2");
      return (u ? "-" : "") + i + o;
    },
    togglecoin(coin) {
      this.buyhive.checked = coin == "hive" ? true : false;
      this.buyhbd.checked = coin == "hbd" ? true : false;
      if (coin == "hive") {
        this.buyPrice = this.hivesells[0].rate;
        this.sellPrice = this.hivebuys[0].rate;
      } else {
        this.buyPrice = this.hbdsells[0].rate;
        this.sellPrice = this.hbdbuys[0].rate;
      }
    },
    togglebuylimit(type) {
      this.buylimit.checked = type == "limit" ? true : false;
      this.buymarket.checked = type == "market" ? true : false;
    },
    toggleselllimit(type) {
      this.selllimit.checked = type == "limit" ? true : false;
      this.sellmarket.checked = type == "market" ? true : false;
    },
    toggleAPI(ip) {
      this.filteraccount.usera = ip == "usera" ? true : false;
      this.filteraccount.userd = ip == "userd" ? true : false;
      this.filteraccount.apia = ip == "apia" ? true : false;
      this.filteraccount.apid = ip == "apid" ? true : false;
      this.filteraccount.gova = ip == "gova" ? true : false;
      this.filteraccount.govd = ip == "govd" ? true : false;
    },
    toggleOrders(ip) {
      this.orders.blocka = ip == "blocka" ? true : false;
      this.orders.blockd = ip == "blockd" ? true : false;
      this.orders.coina = ip == "coina" ? true : false;
      this.orders.coind = ip == "coind" ? true : false;
      this.orders.tokena = ip == "tokena" ? true : false;
      this.orders.tokend = ip == "tokend" ? true : false;
      this.orders.ratea = ip == "ratea" ? true : false;
      this.orders.rated = ip == "rated" ? true : false;
      this.orders.typea = ip == "typea" ? true : false;
      this.orders.typed = ip == "typed" ? true : false;
      this.orders.filleda = ip == "filleda" ? true : false;
      this.orders.filledd = ip == "filledd" ? true : false;
    },
    setValue(key, value) {
      if (key.split(".").length > 1) {
        let keys = key.split(".");
        let obj = this[keys[0]];
        for (let i = 1; i < keys.length; i++) {
          if (i == keys.length - 1) {
            obj[keys[i]] = value;
          } else {
            obj = obj[keys[i]];
          }
        }
      } else {
        this[key] = value;
      }
    },
    setApi(url) {
      // remove trailing slash
      if (url.substr(-1) == "/") {
        url = url.substr(0, url.length - 1);
      }
      let api =
        url ||
        prompt("Please enter your API", "https://spkinstant.hivehoneycomb.com");
      if (url.indexOf("https://") == -1) {
        alert("https is required");
        return;
      }
      if (api != null) {
        if (location.hash && api) {
          location.hash = "";
        }
        localStorage.setItem("lapi", api);
        location.search = "?api=" + api;
      }
    },
    suggestValue(key, value) {
      if (key.split(".").length > 1) {
        let keys = key.split(".");
        let obj = this[keys[0]];
        for (let i = 1; i < keys.length; i++) {
          if (i == keys.length - 1) {
            if (!obj[keys[i]]) obj[keys[i]] = value;
          } else {
            obj = obj[keys[i]];
          }
        }
      } else {
        if (!this[key]) this[key] = value;
      }
    },
    atref(key) {
      return `/@${key}`;
    },
    setMem(key, value, reload) {
      if (value.indexOf("https://") == -1) {
        alert("https:// is required for security reasons");
        return;
      } else if (value[value.length - 1] == "/") {
        value = value.substring(0, value.length - 1);
      }
      localStorage.setItem(key, value);
      if (reload) {
        location.reload();
      }
    },
    sort(item, key, method) {
      switch (method) {
        case "asc":
          this[item].sort((a, b) => {
            return a[key] < b[key] ? -1 : 1;
          });
          break;
        case "desc":
        default:
          this[item].sort((a, b) => {
            return a[key] > b[key] ? -1 : 1;
          });
      }
    },
    focus(id) {
      document.getElementById(id).focus();
    },
    searchRunners() {
      const term = this.filteraccount.value;
      if (term) {
        this.filteraccount.checked = true;
        this.filteraccount.value = term;
        this.filterusers.checked = false;
        this.filterusers.value = "";
        this.runnersSearch = this.runners.reduce((acc, runner) => {
          if (runner.account.toLowerCase().includes(term.toLowerCase())) {
            acc.push(runner);
          } else if (runner.api.toLowerCase().includes(term.toLowerCase())) {
            acc.push(runner);
          }
          return acc;
        }, []);
      } else {
        this.filteraccount.checked = false;
        this.filteraccount.value = "";
        this.filterusers.checked = true;
        this.filterusers.value = "";
      }
    },
    validateForm(formKey, validKey) {
      var Container = document.getElementById(formKey);
      if (Container.querySelector("input:invalid")) this[validKey] = false;
      else this[validKey] = true;
    },
    buyDEX() {
      if (!this.buyFormValid) return;
      var allowed = false;
      const reqs = [this.$refs.buyQty];
      console.log(reqs[0]);
      var andthen = " at market rate",
        rate = undefined,
        hours = 720;
      if (!buymarket.checked) {
        rate = parseFloat(
          (this.buyhive.checked ? this.buyHiveTotal : this.buyHbdTotal) /
            this.buyQuantity
        ).toFixed(6);
        andthen = ` at ${rate} ${this.buyhive.checked ? "HIVE" : "HBD"} per ${
          this.TOKEN
        }`;
      }
      if (this.buyhive.checked)
        broadcastTransfer(
          {
            to: this.multisig,
            hive: this.buyHiveTotal * 1000,
            memo: JSON.stringify({
              rate: this.buyPrice,
              hours: this.buyHours,
            }),
          },
          `Buying ${this.TOKEN} with ${parseFloat((hive || hbd) / 1000).toFixed(
            3
          )} ${hive ? "HIVE" : "HBD"} ${andthen}`,
          lapi.split("://")[1]
        );
      else if (!this.buyhive.checked)
        broadcastTransfer(
          {
            to: this.multisig,
            hbd: this.buyHbdTotal * 1000,
            memo: JSON.stringify({
              rate: this.buyPrice,
              hours: this.buyHours,
            }),
          },
          `Buying ${this.TOKEN} with ${parseFloat((hive || hbd) / 1000).toFixed(
            3
          )} ${hive ? "HIVE" : "HBD"} ${andthen}`,
          lapi.split("://")[1]
        );
    },
    sellDEX() {
      if (!this.sellFormValid) return;
      var andthen = " at market rate",
        dlux = parseInt(parseFloat(this.sellQuantity) * 1000),
        hive = parseInt(parseFloat(this.sellHiveTotal) * 1000),
        hbd = parseInt(parseFloat(this.sellHbdTotal) * 1000),
        hours = parseInt(this.sellHours);
      if (hive || hbd) {
        const price = parseFloat(
          dlux / (this.buyhive.checked ? hive : hbd)
        ).toFixed(6);
        andthen = ` at ${price} ${this.buyhive.checked ? "HIVE" : "HBD"} per ${
          this.TOKEN
        }`;
      }
      if (this.buyhive.checked && dlux)
        broadcastCJA(
          {
            [this.TOKEN.toLocaleLowerCase()]: dlux,
            hive,
            hours,
          },
          `${this.prefix}dex_sell`,
          `Selling ${parseFloat(dlux / 1000).toFixed(3)} ${
            this.TOKEN
          }${andthen}`,
          lapi.split("://")[1]
        );
      else if (!this.buyhive.checked && dlux)
        broadcastCJA(
          {
            [this.TOKEN.toLocaleLowerCase()]: dlux,
            hbd,
            hours,
          },
          `${this.prefix}dex_sell`,
          `Selling ${parseFloat(dlux / 1000).toFixed(3)} ${
            this.TOKEN
          }${andthen}`,
          lapi.split("://")[1]
        );
    },
    cancelDEX(txid) {
      if (txid)
        broadcastCJA(
          {
            txid,
          },
          `${this.prefix}dex_clear`,
          `Canceling: ${txid}`,
          lapi.split("://")[1]
        );
    },
    getHistorical() {
      const pair = this.buyhive.checked ? "hive" : "hbd";
      const numbars = this.barcount;
      const period = parseInt(this.barwidth);
      const now = this.nowtime;
      var startdate = new Date(now - period * numbars).getTime();
      var currentBucket = startdate;
      const dex = this.dexapi;
      if (!dex.markets.hive.his) return;
      const current_block = this.stats.lastIBlock;
      const buckets = Object.keys(dex.markets[pair].days);
      buckets.sort(function (a, b) {
        return parseInt(a) - parseInt(b);
      });
      var bars = [],
        current = {
          o: 0,
          h: 0,
          l: 0,
          c: 0,
          v: 0,
        };
      for (var i = 0; i < buckets.length; i++) {
        if (
          new Date(
            now - 3000 * (current_block - parseInt(buckets[i]))
          ).getTime() > currentBucket
        ) {
          if (!bars.length) {
            while (
              new Date(
                now - 3000 * (current_block - parseInt(buckets[i]))
              ).getTime() >
              currentBucket + period
            ) {
              bars.push({
                x: currentBucket,
                o: dex.markets[pair.toLowerCase()].days[buckets[i]].o,
                h: dex.markets[pair.toLowerCase()].days[buckets[i]].o,
                l: dex.markets[pair.toLowerCase()].days[buckets[i]].o,
                c: dex.markets[pair.toLowerCase()].days[buckets[i]].o,
                v: 0,
              });
              currentBucket = new Date(currentBucket + period).getTime();
            }
          } else {
            while (
              new Date(
                now - 3000 * (current_block - parseInt(buckets[i]))
              ).getTime() >
              currentBucket + period
            ) {
              bars.push({
                x: currentBucket,
                o: bars[bars.length - 1].c,
                h: bars[bars.length - 1].c,
                l: bars[bars.length - 1].c,
                c: bars[bars.length - 1].c,
                v: 0,
              });
              currentBucket = new Date(currentBucket + period).getTime();
            }
          }
          if (dex.markets[pair.toLowerCase()].days[buckets[i]].t > current.h)
            current.h = dex.markets[pair.toLowerCase()].days[buckets[i]].t;
          if (dex.markets[pair.toLowerCase()].days[buckets[i]].b < current.l)
            current.l = dex.markets[pair.toLowerCase()].days[buckets[i]].b;
          current.c = dex.markets[pair.toLowerCase()].days[buckets[i]].c;
          current.v += dex.markets[pair.toLowerCase()].days[buckets[i]].v;
          if (
            buckets[i + 1] &&
            new Date(
              now - 3000 * (current_block - parseInt(buckets[i + 1]))
            ).getTime() >
              currentBucket + period
          ) {
            bars.push({
              x: currentBucket,
              o: current.o,
              h: current.h,
              l: current.l,
              c: current.c,
              v: current.v,
            });
            currentBucket = new Date(currentBucket + period).getTime();
            current.o = current.c;
            current.h = current.c;
            current.l = current.c;
            current.c = current.c;
            current.v = 0;
          } else if (!buckets[i + 1]) {
            bars.push({
              x: currentBucket,
              o: current.o,
              h: current.h,
              l: current.l,
              c: current.c,
              v: current.v,
            });
          }
        }
      }
      let items = Object.keys(dex.markets[pair.toLowerCase()].his);
      for (var i = 0; i < items.length; i++) {
        if (
          new Date(
            now - 3000 * (current_block - parseInt(items[i].split(":")[0]))
          ).getTime() > currentBucket
        ) {
          if (!bars.length) {
            while (
              new Date(
                now - 3000 * (current_block - parseInt(items[i].split(":")[0]))
              ).getTime() >
              currentBucket + period
            ) {
              bars.push({
                x: currentBucket,
                o: parseFloat(
                  dex.markets[pair.toLowerCase()].his[items[i]].price
                ),
                h: parseFloat(
                  dex.markets[pair.toLowerCase()].his[items[i]].price
                ),
                l: parseFloat(
                  dex.markets[pair.toLowerCase()].his[items[i]].price
                ),
                c: parseFloat(
                  dex.markets[pair.toLowerCase()].his[items[i]].price
                ),
                v: 0,
              });
              currentBucket = new Date(currentBucket + period).getTime();
            }
          } else {
            while (
              new Date(
                now - 3000 * (current_block - parseInt(items[i].split(":")[0]))
              ).getTime() >
              currentBucket + period
            ) {
              bars.push({
                x: currentBucket,
                o: bars[bars.length - 1].c,
                h: bars[bars.length - 1].c,
                l: bars[bars.length - 1].c,
                c: bars[bars.length - 1].c,
                v: 0,
              });
              currentBucket = new Date(currentBucket + period).getTime();
            }
          }
          if (
            parseFloat(dex.markets[pair.toLowerCase()].his[items[i]].price) >
            current.h
          )
            current.h = parseFloat(
              dex.markets[pair.toLowerCase()].his[items[i]].price
            );
          if (
            parseFloat(dex.markets[pair.toLowerCase()].his[items[i]].price) <
            current.l
          )
            current.l = parseFloat(
              dex.markets[pair.toLowerCase()].his[items[i]].price
            );
          current.c = parseFloat(
            dex.markets[pair.toLowerCase()].his[items[i]].price
          );
          current.v += parseFloat(
            dex.markets[pair.toLowerCase()].his[items[i]].target_vol
          );
          if (
            items[i + 1] &&
            new Date(
              now -
                3000 * (current_block - parseInt(items[i + 1].split(":")[0]))
            ).getTime() >
              currentBucket + period
          ) {
            bars.push({
              x: currentBucket,
              o: current.o,
              h: current.h,
              l: current.l,
              c: current.c,
              v: current.v,
            });
            currentBucket = new Date(currentBucket + period).getTime();
            current.o = parseFloat(
              dex.markets[pair.toLowerCase()].his[items[i]].price
            );
            current.h = parseFloat(
              dex.markets[pair.toLowerCase()].his[items[i]].price
            );
            current.l = parseFloat(
              dex.markets[pair.toLowerCase()].his[items[i]].price
            );
            current.c = parseFloat(
              dex.markets[pair.toLowerCase()].his[items[i]].price
            );
            current.v = 0;
          } else if (!items[i + 1]) {
            bars.push({
              x: currentBucket,
              o: current.o,
              h: current.h,
              l: current.l,
              c: current.c,
              v: current.v,
            });
          }
        }
      }
      var newBars = [];
      for (var i = 0; i < bars.length; i++) {
        newBars.push([
          bars[i].x,
          bars[i].o,
          bars[i].h,
          bars[i].l,
          bars[i].c,
          bars[i].v,
        ]);
      }
      this.ohlcv = newBars;
    },
    getQuotes() {
      fetch(
        "https://api.coingecko.com/api/v3/simple/price?ids=hive&amp;vs_currencies=usd"
      )
        .then((response) => response.json())
        .then((data) => {
          this.hiveprice = data;
        });
      fetch(
        "https://api.coingecko.com/api/v3/simple/price?ids=hive_dollar&amp;vs_currencies=usd"
      )
        .then((response) => response.json())
        .then((data) => {
          this.hbdprice = data;
        });
    },
    getNodes() {
      fetch(this.lapi + "/runners")
        .then((response) => response.json())
        .then((data) => {
          this.runners = data.result.sort((a, b) => {
            return b.g - a.g;
          });
        });
      fetch(this.lapi + "/markets")
        .then((response) => response.json())
        .then((data) => {
          this.nodes = data.markets.node;
          this.stats = data.stats;
        });
    },
    getProtocol() {
      fetch(this.lapi + "/api/protocol")
        .then((response) => response.json())
        .then((data) => {
          this.prefix = data.prefix;
          this.multisig = data.multisig;
          this.jsontoken = data.jsontoken;
          this.TOKEN = data.jsontoken.toUpperCase();
          location.hash = data.jsontoken;
          this.node = data.node;
          this.features = data.features ? data.features : this.features;
          this.behind = data.behind;
          this.behindTitle = data.behind + " Blocks Behind Hive";
          fetch(this.lapi + "/api/recent/HIVE_" + this.TOKEN + "?limit=1000")
            .then((response) => response.json())
            .then((data) => {
              this.volume.hive =
                data.recent_trades.reduce((a, b) => {
                  if (b.trade_timestamp > this.agoTime)
                    return a + parseInt(parseFloat(b.target_volume) * 1000);
                  else return a;
                }, 0) / 1000;
              this.volume.token_hive =
                data.recent_trades.reduce((a, b) => {
                  if (b.trade_timestamp > this.agoTime)
                    return a + parseInt(parseFloat(b.base_volume) * 1000);
                  else return a;
                }, 0) / 1000;
              this.recenthive = data.recent_trades.sort((a, b) => {
                return (
                  parseInt(b.trade_timestamp) - parseInt(a.trade_timestamp)
                );
              });
            });
          fetch(this.lapi + "/api/recent/HBD_" + this.TOKEN + "?limit=1000")
            .then((response) => response.json())
            .then((data) => {
              this.volume.hbd =
                data.recent_trades.reduce((a, b) => {
                  if (b.trade_timestamp > this.agoTime)
                    return a + parseInt(parseFloat(b.target_volume) * 1000);
                  else return a;
                }, 0) / 1000;
              this.volume.token_hbd =
                data.recent_trades.reduce((a, b) => {
                  if (b.trade_timestamp > this.agoTime)
                    return a + parseInt(parseFloat(b.base_volume) * 1000);
                  else return a;
                }, 0) / 1000;
              this.recenthbd = data.recent_trades.sort((a, b) => {
                return (
                  parseInt(b.trade_timestamp) - parseInt(a.trade_timestamp)
                );
              });
            });
        });
    },
    getTokenUser(user) {
      fetch(this.lapi + "/@" + user)
        .then((response) => response.json())
        .then((data) => {
          this.balance = (data.balance / 1000).toFixed(3);
          this.bartoken = this.balance;
          this.barpow = (
            (data.poweredUp + data.granted - data.granting) /
            1000
          ).toFixed(3);
          this.bargov = (data.gov / 1000).toFixed(3);
          this.accountapi = data;
          console.log(
            "claim logic",
            new Date().getMonth() + 1,
            data.drop?.last_claim,
            data.drop?.availible.amount
          );
          if (
            new Date().getMonth() + 1 != parseInt(data.drop?.last_claim, 16) &&
            data.drop?.availible.amount > 0
          ) {
            this.hasDrop = true;
            this.dropnai = `${parseFloat(
              data.drop.availible.amount /
                Math.pow(10, data.drop.availible.precision)
            ).toFixed(data.drop.availible.precision)} ${
              data.drop.availible.token
            }`;
          }
          this.openorders = data.contracts.reduce((acc, cur) => {
            cur.nai = `${
              cur.type.split(":")[0] == "hive"
                ? parseFloat(cur.hive / 1000).toFixed(3)
                : parseFloat(cur.hbd / 1000).toFixed(3)
            } ${cur.type.split(":")[0] == "hive" ? "HIVE" : "HBD"}`;
            if (
              cur.partials &&
              cur.partials.length &&
              cur.type.split(":")[1] == "sell"
            ) {
              const filled = cur.partials.reduce(function (a, c) {
                return a + c.coin;
              }, 0);
              cur.percentFilled = parseFloat(
                (100 * filled) / (cur.hive ? cur.hive : cur.hbd + filled)
              ).toFixed(2);
              acc.push(cur);
            } else if (cur.partials && cur.partials.length) {
              const filled = cur.partials.reduce(function (a, c) {
                return a + c.token;
              }, 0);
              cur.percentFilled = parseFloat(
                (100 * filled) / (cur.amount + filled)
              ).toFixed(2);
              acc.push(cur);
            } else {
              cur.percentFilled = "0.00";
              acc.push(cur);
            }
            console.log({
              acc,
            });
            return acc;
          }, []);
        });
    },
    getHiveUser(user) {
      fetch(hapi, {
        body: `{"jsonrpc":"2.0", "method":"condenser_api.get_accounts", "params":[["${user}"]], "id":1}`,
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        method: "POST",
      })
        .then((response) => response.json())
        .then((data) => {
          this.accountinfo = data.result[0];
          this.barhive = this.accountinfo.balance;
          this.barhbd = this.accountinfo.hbd_balance;
        });
    },
    popDEX() {
      fetch(this.lapi + "/dex")
        .then((response) => response.json())
        .then((data) => {
          this.hivebuys = data.markets.hive.buys
            .sort(function (a, b) {
              return parseFloat(b.rate) - parseFloat(a.rate);
            })
            .reduce((acc, cur) => {
              if (!acc.length || acc[acc.length - 1].rate != cur.rate) {
                cur.total = cur.hive + (acc[acc.length - 1]?.total || 0);
                cur.at = cur.amount + (acc[acc.length - 1]?.amount || 0);
                acc.push(cur);
              } else {
                acc[acc.length - 1].total =
                  cur.hive + acc[acc.length - 1].total;
                acc[acc.length - 1].hive = cur.hive + acc[acc.length - 1].hive;
                acc[acc.length - 1].amount =
                  cur.amount + acc[acc.length - 1].amount;
                acc[acc.length - 1].at = cur.amount + acc[acc.length - 1].at;
              }
              return acc;
            }, []);
          this.hivesells = data.markets.hive.sells
            .sort(function (a, b) {
              return parseFloat(a.rate) - parseFloat(b.rate);
            })
            .reduce((acc, cur) => {
              if (!acc.length || acc[acc.length - 1].rate != cur.rate) {
                cur.total = cur.hive + (acc[acc.length - 1]?.total || 0);
                cur.at = cur.amount + (acc[acc.length - 1]?.amount || 0);
                acc.push(cur);
              } else {
                acc[acc.length - 1].total =
                  cur.hive + acc[acc.length - 1].total;
                acc[acc.length - 1].hive = cur.hive + acc[acc.length - 1].hive;
                acc[acc.length - 1].amount =
                  cur.amount + acc[acc.length - 1].amount;
                acc[acc.length - 1].at = cur.amount + acc[acc.length - 1].at;
              }
              return acc;
            }, []);
          this.hbdbuys = data.markets.hbd.buys
            .sort(function (a, b) {
              return parseFloat(b.rate) - parseFloat(a.rate);
            })
            .reduce((acc, cur) => {
              if (!acc.length || acc[acc.length - 1].rate != cur.rate) {
                cur.total = cur.hbd + (acc[acc.length - 1]?.total || 0);
                cur.at = cur.amount + (acc[acc.length - 1]?.amount || 0);
                acc.push(cur);
              } else {
                acc[acc.length - 1].total = cur.hbd + acc[acc.length - 1].total;
                acc[acc.length - 1].hbd = cur.hbd + acc[acc.length - 1].hbd;
                acc[acc.length - 1].amount =
                  cur.amount + acc[acc.length - 1].amount;
                acc[acc.length - 1].at = cur.amount + acc[acc.length - 1].at;
              }
              return acc;
            }, []);
          this.hbdsells = data.markets.hbd.sells
            .sort(function (a, b) {
              return parseFloat(a.rate) - parseFloat(b.rate);
            })
            .reduce((acc, cur) => {
              if (!acc.length || acc[acc.length - 1].rate != cur.rate) {
                cur.total = cur.hbd + (acc[acc.length - 1]?.total || 0);
                cur.at = cur.amount + (acc[acc.length - 1]?.amount || 0);
                acc.push(cur);
              } else {
                acc[acc.length - 1].total = cur.hbd + acc[acc.length - 1].total;
                acc[acc.length - 1].hbd = cur.hbd + acc[acc.length - 1].hbd;
                acc[acc.length - 1].amount =
                  cur.amount + acc[acc.length - 1].amount;
                acc[acc.length - 1].at = cur.amount + acc[acc.length - 1].at;
              }
              return acc;
            }, []);
          this.dexapi = data;
          this.getHistorical();
          if (this.hivesells[0]) this.buyPrice = this.hivesells[0].rate;
          if (this.hivebuys[0]) this.sellPrice = this.hivebuys[0].rate;
        });
    },
  },
  mounted() {
    this.chart.width = this.$refs.chartContainer.scrollWidth - 15;
    this.chart.height = this.chart.width / 2.5;
    this.$refs.dumbo.style = `width: ${this.chart.width}px; height: ${
      this.chart.height + 30
    }px;`;
    window.addEventListener("resize", this.onResize);
    this.getQuotes();
    this.getNodes();
    this.getProtocol();
    this.popDEX(user);
    if (user != "GUEST") this.getTokenUser(user);
    if (user != "GUEST") this.getHiveUser(user);
  },
  computed: {
    chartTitle: {
      get() {
        return `${this.TOKEN}:${this.buyhive.checked ? "HIVE" : "HBD"}`;
      },
    },
    minbuy: {
      get() {
        return parseFloat(
          parseFloat(parseFloat(this.buyPrice / 1000).toFixed(3)) + 0.001
        ).toFixed(3);
      },
    },
    minsell: {
      get() {
        var a;
        if (this.buyhive.checked) a = (0.001 / this.sellPrice).toFixed(3);
        else a = (0.001 / this.sellPrice).toFixed(3);
        return a;
      },
    },
    maxhbuy: {
      get() {
        return this.buymarket.checked
          ? "100000.000"
          : parseFloat(
              (this.dexapi.markets.hive.tick *
                (this.stats.dex_max / 100) *
                (1 -
                  (this.buyPrice / this.dexapi.markets.hive.tick) *
                    (this.stats.dex_slope / 100)) *
                this.stats.safetyLimit) /
                1000
            ).toFixed(3);
      },
    },
    maxdbuy: {
      get() {
        return this.buymarket.checked
          ? "100000.000"
          : parseFloat(
              (this.dexapi.markets.hbd.tick *
                (this.stats.dex_max / 100) *
                (1 -
                  (this.buyPrice / this.dexapi.markets.hbd.tick) *
                    (this.stats.dex_slope / 100)) *
                this.stats.safetyLimit) /
                1000
            ).toFixed(3);
      },
    },
    marketCap: {
      get() {
        if (this.buyhive.checked)
          return `${parseFloat(
            (this.stats.tokenSupply / 1000) *
              this.hiveprice.hive.usd *
              this.dexapi.markets.hive.tick
          ).toFixed(2)}`;
        else
          return `${parseFloat(
            (this.stats.tokenSupply / 1000) *
              this.hbdprice.hive_dollar.usd *
              this.dexapi.markets.hbd.tick
          ).toFixed(2)}`;
      },
    },
    isnode: {
      get() {
        return this.nodes[this.user] ? true : false;
      },
    },
  },
}); // vue 2
// }).mount('#app') // vue 3
