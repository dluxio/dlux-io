/*!
 DMXzone Formatter
 Version: 1.1.5
 (c) 2018 DMXzone.com
 @build 2018-09-19 13:17:27
 */
dmx.Formatters("global", {
  default: function(t, n) {
    return null == t ? n : t;
  },
  string: function(t) {
    return String(t);
  },
  number: function(t) {
    return Number(t);
  },
  date: function(t) {
    "number" == typeof t && (t *= 1e3),
      "string" == typeof t && "now" == t.toLowerCase() && (t = null);
    var n = t ? new Date(t) : new Date();
    return "Invalid Date" == n.toString() ? null : n.toISOString();
  }
}),
  dmx.Formatters("array", {
    hasItems: function(t) {
      return !!t.length;
    },
    contains: function(t, n) {
      return -1 < t.indexOf(n);
    },
    join: function(t, n) {
      return t.join(n);
    },
    count: function(t) {
      return t.length;
    },
    top: function(t, n) {
      return t.slice(0, n);
    },
    last: function(t, n) {
      return t.slice(-n);
    },
    slice: function(t, n, r) {
      return t.slice(n, r);
    },
    reverse: function(t) {
      return t.slice(0).reverse();
    },
    countUpVotes(a){
      let b = 0
      for (let i=0;i<a.length;i++){
        if (parseInt(a[i].percent) > 0){
          b++
        }
      }
      return b
    },
    countDownVotes(a){
      let b = 0
      for (let i=0;i<a.length;i++){
        if (parseInt(a[i].percent) < 0){
          b++
        }
      }
      return b
    },
    randomize: function(t) {
      var n,
        r,
        e = dmx.randomizer(this.seed * dmx.hashCode(t)),
        u = t.length;
      for (t = t.slice(0); 0 !== u; )
        (r = Math.floor(e() * u--)), (n = t[u]), (t[u] = t[r]), (t[r] = n);
      return t;
    },
    filter: function(t, n) {
      return t.filter(function(t) {
        return dmx.parse(n, new dmx.DataScope(t, this));
      }, this);
    },
    map: function(t, n) {
      return t.map(function(t) {
        return dmx.parse(n, new dmx.DataScope(t, this));
      }, this);
    },
    where: function(t, r, e, u) {
      return (
        (u = u || "=="),
        t.filter(function(t) {
          var n = dmx.parse(r, new dmx.DataScope(t, this));
          switch (u) {
            case "startsWith":
              return 0 === String(n).indexOf(e);
            case "endsWith":
              return String(n).substr(-e.length) === e;
            case "contains":
              return -1 !== String(n).indexOf(e);
            case "inArray":
              return -1 !== e.indexOf(n);
            case "fuzzySearch":
              return (function(t, n) {
                var r = t.length,
                  e = n.length;
                if (r < e) return !1;
                if (e === r) return t === n;
                t: for (var u = 0, a = 0; u < e; u++) {
                  for (var i = n.charCodeAt(u); a < r; )
                    if (t.charCodeAt(a++) === i) continue t;
                  return !1;
                }
                return !0;
              })(String(n), e);
            case "==":
              return n == e;
            case "===":
              return n === e;
            case "!=":
              return n != e;
            case "!==":
              return n !== e;
            case "<":
              return n < e;
            case "<=":
              return n <= e;
            case ">":
              return e < n;
            case ">=":
              return e <= n;
          }
          return !0;
        })
      );
    },
    values: function(t, n) {
      return t.map(function(t) {
        return dmx.parse(n, new dmx.DataScope(t, this));
      });
    },
    groupBy: function(t, e) {
      return t.reduce(function(t, n) {
        var r = dmx.parse(e, new dmx.DataScope(n, this));
        return t[r] || (t[r] = []), t[r].push(n), t;
      }, {});
    },
    unique: function(t, n) {
      return (
        n &&
          (t = t.map(function(t) {
            return dmx.parse(n, new dmx.DataScope(t, this));
          })),
        Object.keys(
          t.reduce(function(t, n) {
            return (t[JSON.stringify(n)] = 1), t;
          }, {})
        ).map(function(t) {
          return JSON.parse(t);
        })
      );
    },
    sort: function(t, r) {
      return t.slice(0).sort(function(t, n) {
        return (
          r &&
            ((t = dmx.parse(r, new dmx.DataScope(t, this))),
            (n = dmx.parse(r, new dmx.DataScope(n, this)))),
          t < n ? -1 : n < t ? 1 : 0
        );
      });
    },
    min: function(t, r) {
      return t.reduce(function(t, n) {
        return (
          r && (n = dmx.parse(r, new dmx.DataScope(n, this))),
          (n = Number(n)) < t ? n : t
        );
      }, 1 / 0);
    },
    max: function(t, r) {
      return t.reduce(function(t, n) {
        return (
          r && (n = dmx.parse(r, new dmx.DataScope(n, this))),
          t < (n = Number(n)) ? n : t
        );
      }, -1 / 0);
    },
    sum: function(t, r) {
      return t.reduce(function(t, n) {
        return (
          r && (n = dmx.parse(r, new dmx.DataScope(n, this))),
          t + (n = Number(n))
        );
      }, 0);
    },
    avg: function(t, r) {
      return (
        t.reduce(function(t, n) {
          return (
            r && (n = dmx.parse(r, new dmx.DataScope(n, this))),
            t + (n = Number(n))
          );
        }, 0) / t.length
      );
    },
    default: function(t) {
      return t;
    }
  }),
  dmx.Formatters("number", {
    inRange: function(t, n, r) {
      return n <= t && t <= r;
    },
    abs: function(t) {
      return Math.abs(t);
    },
    ceil: function(t) {
      return Math.ceil(t);
    },
    floor: function(t) {
      return Math.floor(t);
    },
    max: function(t, n) {
      return Math.max(t, n);
    },
    min: function(t, n) {
      return Math.min(t, n);
    },
    pow: function(t, n) {
      return Math.pow(t, n);
    },
    round: function(t, n) {
      var r = Math.pow(10, n || 0),
        e = t * r;
      return Math.round(e) / r;
    },
    pad: function(t, n) {
      for (var r = t < 0 ? "-" : "", e = String(Math.abs(t)); e.length < n; )
        e = "0" + e;
      return r + e;
    },
    toFixed: function(t, n) {
      return t.toFixed(n);
    },
    rep: function (rep2){
        console.log('ip ' + rep2)
        if (rep2 == null) return rep2;
        let rep = String(rep2);
        const neg = rep.charAt(0) === '-';
        rep = neg ? rep.substring(1) : rep;
        console.log('new ' + rep)
        let out = log10(rep);
        if (isNaN(out)) out = 0;
        out = Math.max(out - 9, 0); // @ -9, $0.50 earned is approx magnitude 1
        out = (neg ? -1 : 1) * out;
        out = out * 9 + 25; // 9 points per magnitude. center at 25
        // base-line 0 to darken and < 0 to auto hide (grep rephide)
        out = parseInt(out);
        return out;
        function log10(str) {
          console.log('trigger log10: '+str)
          const leadingDigits = parseInt(str.substring(0, 4));
          const log = Math.log(leadingDigits) / Math.LN10 + 0.00000001;
          const n = str.length - 1;
          return n + (log - parseInt(log));
        }
      },
    formatNumber: function(t, n, r, e) {
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
    formatCurrency: function(t, n, r, e, u) {
      if (isNaN(t) || !isFinite(t)) return "Invalid Amount";
      (n = n || "$"), (r = r || "."), (e = e || ","), (u = null != u ? u : 2);
      var a = t < 0,
        i = Math.abs(t)
          .toFixed(u)
          .split("."),
        o = i[0],
        c = 1 < i.length ? r + i[1] : "";
      if (e)
        for (var s = /(\d+)(\d{3})/; s.test(o); )
          o = o.replace(s, "$1" + e + "$2");
      return (a ? "-" : "") + n + o + c;
    },
    formatSize: function(t, n, r) {
      if (isNaN(t) || !isFinite(t)) return "Invalid Size";
      n = n || 2;
      for (
        var e = r ? 1024 : 1e3,
          u = r ? ["KiB", "MiB", "GiB", "TiB"] : ["KB", "MB", "GB", "TB"],
          a = 3;
        0 <= a;
        a--
      ) {
        var i = Math.pow(e, a + 1);
        if (i <= t) {
          t /= i;
          var o = Math.pow(10, n);
          return (t = Math.round(t * o) / o) + u[a];
        }
      }
      return t + "B";
    },
    default: function(t) {
      return t;
    },
    toString: function(t) {
      return String(t);
    },
    toDate: function(t) {
      return new Date(1e3 * t).toISOString();
    }
  }),
  (function() {
    function e(t) {
      var n = function(t) {
        return ("00" + t).substr(-2);
      };
      return (
        ("0000" + t.getFullYear()).substr(-4) +
        "-" +
        n(t.getMonth() + 1) +
        "-" +
        n(t.getDate()) +
        " " +
        n(t.getHours()) +
        ":" +
        n(t.getMinutes()) +
        ":" +
        n(t.getSeconds())
      );
    }
    function h(t) {
      var n,
        r,
        e = 0,
        u = [1, 4, 5, 6, 7, 10, 11];
      if ("now" == t.toLowerCase()) return new Date();
      if (
        (n = /^(\d{4}|[+\-]\d{6})(?:-(\d{2})(?:-(\d{2}))?)?(?:[T ](\d{2}):(\d{2})(?::(\d{2})(?:\.(\d{3}))?)?(?:(Z)|([+\-])(\d{2})(?::(\d{2}))?)?)?$/.exec(
          t
        ))
      ) {
        for (var a, i = 0; (a = u[i]); ++i) n[a] = +n[a] || 0;
        return (
          (n[2] = (+n[2] || 1) - 1),
          (n[3] = +n[3] || 1),
          void 0 === n[8]
            ? new Date(n[1], n[2], n[3], n[4], n[5], n[6], n[7])
            : ("Z" !== n[8] &&
                void 0 !== n[9] &&
                ((e = 60 * n[10] + n[11]), "+" === n[9] && (e = 0 - e)),
              new Date(Date.UTC(n[1], n[2], n[3], n[4], n[5] + e, n[6], n[7])))
        );
      }
      return (n = /^(\d{2}):(\d{2})(?::(\d{2}))?$/.exec(t))
        ? ((r = new Date()).setHours(+n[1] || 0),
          r.setMinutes(+n[2] || 0),
          r.setSeconds(+n[3] || 0),
          r)
        : new Date(t);
    }
    function u(t) {
      return (
        t.setHours(0), t.setMinutes(0), t.setSeconds(0), t.setMilliseconds(0), t
      );
    }
    dmx.Formatters("string", {
      startsWith: function(t, n) {
        return 0 === t.indexOf(n);
      },
      endsWith: function(t, n) {
        var r = t.length - n.length,
          e = t.lastIndexOf(n);
        return -1 !== e && e === r;
      },
      contains: function(t, n) {
        return -1 !== t.indexOf(n);
      },
      notContains: function(t, n) {
        return -1 === t.indexOf(n);
      },
      search: function(n, t, r) {
        return String(t)
          .split(/\s+/)
          [r ? "every" : "some"](function(t) {
            return -1 !== n.indexOf(t);
          });
      },
      fuzzySearch: function(t, n) {
        var r = t.length,
          e = n.length;
        if (r < e) return !1;
        if (e === r) return t === n;
        t: for (var u = 0, a = 0; u < e; u++) {
          for (var i = n.charCodeAt(u); a < r; )
            if (t.charCodeAt(a++) === i) continue t;
          return !1;
        }
        return !0;
      },
      test: function(t, n) {
        return n.test(t);
      },
      lowercase: function(t) {
        return t.toLowerCase();
      },
      uppercase: function(t) {
        return t.toUpperCase();
      },
      scat: function(s){
        let t = JSON.parse(s)
        if(t.vrHash)return 'VR'
        else if (t.arHash)return 'AR'
        else return 'BLOG'
      },
      parseJSON: function(g){
        return JSON.parse(g)
      },
      toString: function(n){
        return toString(n)
      },
      rep: function (rep2){
        if (rep2 == null) return rep2;
        let rep = String(rep2);
        const neg = rep.charAt(0) === '-';
        rep = neg ? rep.substring(1) : rep;
        let out = log10(rep);
        if (isNaN(out)) out = 0;
        out = Math.max(out - 9, 0); // @ -9, $0.50 earned is approx magnitude 1
        out = (neg ? -1 : 1) * out;
        out = out * 9 + 25; // 9 points per magnitude. center at 25
        // base-line 0 to darken and < 0 to auto hide (grep rephide)
        out = parseInt(out);
        return out;
        function log10(str) {
          const leadingDigits = parseInt(str.substring(0, 4));
          const log = Math.log(leadingDigits) / Math.LN10 + 0.00000001;
          const n = str.length - 1;
          return n + (log - parseInt(log));
        }
      },
      slugify: function(t) {
        return t
          .toLowerCase()
          .replace(/[^\w\s]/g, "")
          .replace(/[_\s]+/g, "-")
          .replace(/-+/g, "-")
          .replace(/^-/, "");
      },
      camelize: function(t) {
        return t.trim().replace(/(\-|_|\s)+(.)?/g, function(t, n, r) {
          return r ? r.toUpperCase() : "";
        });
      },
      capitalize: function(t) {
        return t.substr(0, 1).toUpperCase() + t.substr(1).toLowerCase();
      },
      dasherize: function(t) {
        return t
          .replace(/[_\s]+/g, "-")
          .replace(/([A-Z])/g, "-$1")
          .replace(/-+/g, "-")
          .toLowerCase();
      },
      humanize: function(t) {
        var n = t
          .replace(/([a-z\d])([A-Z+])/g, "$1_$2")
          .replace(/[-\s]+/g, "_")
          .replace(/_+/g, " ")
          .trim();
        return n.substr(0, 1).toUpperCase() + n.substr(1).toLowerCase();
      },
      underscore: function(t) {
        return t
          .trim()
          .replace(/([a-z\d])([A-Z]+)/g, "$1_$1")
          .replace(/[-\s]+/g, "_")
          .toLowerCase();
      },
      titlecase: function(t) {
        return t.toLowerCase().replace(/(?:^|\s)\S/g, function(t) {
          return t.toUpperCase();
        });
      },
      camelcase: function(t) {
        return t.toLowerCase().replace(/\s+(\S)/g, function(t, n) {
          return n.toUpperCase();
        });
      },
      substr: function(t, n, r) {
        return t.substr(n, r);
      },
      substring: function(t, n, r) {
        return t.substring(n, r);
      },
      replace: function(t, n, r) {
        return (
          "string" == typeof n && (n = new RegExp(dmx.escapeRegExp(n), "g")),
          t.replace(n, r)
        );
      },
      removeMD: function(md, options) {
        options = options || {};
        options.listUnicodeChar = options.hasOwnProperty('listUnicodeChar') ? options.listUnicodeChar : false;
        options.stripListLeaders = options.hasOwnProperty('stripListLeaders') ? options.stripListLeaders : true;
        options.gfm = options.hasOwnProperty('gfm') ? options.gfm : true;
        options.useImgAltText = options.hasOwnProperty('useImgAltText') ? options.useImgAltText : false;
        var output = md || '';
        output = output.replace(/^(-\s*?|\*\s*?|_\s*?){3,}\s*$/gm, '');
        try {
        if (options.stripListLeaders) {
        if (options.listUnicodeChar)
          output = output.replace(/^([\s\t]*)([\*\-\+]|\d+\.)\s+/gm, options.listUnicodeChar + ' $1');
        else
          output = output.replace(/^([\s\t]*)([\*\-\+]|\d+\.)\s+/gm, '$1');
        }
        if (options.gfm) {
        output = output
          .replace(/\n={2,}/g, '\n')
          .replace(/~{3}.*\n/g, '')
          .replace(/~~/g, '')
          .replace(/`{3}.*\n/g, '');
        }
        output = output
        .replace(/<[^>]*>/g, '')
        .replace(/^[=\-]{2,}\s*$/g, '')
        .replace(/\[\^.+?\](\: .*?$)?/g, '')
        .replace(/\s{0,2}\[.*?\]: .*?$/g, '')
        .replace(/\!\[(.*?)\][\[\(].*?[\]\)]/g, options.useImgAltText ? '$1' : '')
        .replace(/\[(.*?)\][\[\(].*?[\]\)]/g, '$1')
        .replace(/^\s{0,3}>\s?/g, '')
        .replace(/^\s{1,2}\[(.*?)\]: (\S+)( ".*?")?\s*$/g, '')
        .replace(/^(\n)?\s{0,}#{1,6}\s+| {0,}(\n)?\s{0,}#{0,} {0,}(\n)?\s{0,}$/gm, '$1$2$3')
        .replace(/([\*_]{1,3})(\S.*?\S{0,1})\1/g, '$2')
        .replace(/([\*_]{1,3})(\S.*?\S{0,1})\1/g, '$2')
        .replace(/(`{3,})(.*?)\1/gm, '$2')
        .replace(/`(.+?)`/g, '$1')
        .replace(/\n{2,}/g, '\n\n');
        } catch(e) {
        console.error(e);
        return md;
        }
        return output;
        },                  
      trim: function(t) {
        return t.trim();
      },
      trimLeft: function(t) {
        return t.replace(
          /^[\x09\x0A\x0B\x0C\x0D\x20\xA0\u1680\u180E\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200A\u202F\u205F\u3000\u2028\u2029\uFEFF]*/,
          ""
        );
      },
      trimRight: function(t) {
        return t.replace(
          /[\x09\x0A\x0B\x0C\x0D\x20\xA0\u1680\u180E\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200A\u202F\u205F\u3000\u2028\u2029\uFEFF]*$/,
          ""
        );
      },
      concat: function(t, n) {
        return t.concat(n);
      },
      trunc: function(t, n, r, e) {
        return (
          (r = !!r),
          (e = e || "…"),
          t.length > n &&
            ((t = t.substr(0, n)),
            r && -1 !== t.indexOf(" ") && (t = t.substr(0, t.lastIndexOf(" "))),
            (t += e)),
          t
        );
      },
      stripTags: function(t) {
        return t.replace(/<[^>]+>/g, "");
      },
      padStart: function(t, n, r) {
        if (((r = r || " "), n <= t.length)) return t;
        for (var e = n - t.length; r.length < e; ) r += r;
        return r.substr(0, e) + t;
      },
      padEnd: function(t, n, r) {
        if (((r = r || " "), n <= t.length)) return t;
        for (var e = n - t.length; r.length < e; ) r += r;
        return t + r.substr(0, e);
      },
      repeat: function(t, n) {
        for (var r = "", e = 0; e < n; e++) r += t;
        return r;
      },
      wordCount: function(t) {
        return t.trim().split(/\s+/).length;
      },
      split: function(t, n) {
        return t.split(n);
      },
      default: function(t) {
        return t;
      },
      toNumber: function(t) {
        return Number(t);
      },
      toDate: function(t) {
        var n = h(t);
        return "Invalid Date" == n.toString() ? null : e(n);
      },
      toUTCDate: function(t) {
        var n = h(t);
        return "Invalid Date" == n.toString() ? null : n.toISOString();
      },
      getYear: function(t) {
        var n = h(t);
        return "Invalid Date" == n.toString() ? null : n.getFullYear();
      },
      getMonth: function(t) {
        var n = h(t);
        return "Invalid Date" == n.toString() ? null : n.getMonth();
      },
      getDate: function(t) {
        var n = h(t);
        return "Invalid Date" == n.toString() ? null : n.getDate();
      },
      getDay: function(t) {
        var n = h(t);
        return "Invalid Date" == n.toString() ? null : n.getDay();
      },
      addYears: function(t, n) {
        var r = h(t);
        return "Invalid Date" == r.toString()
          ? null
          : (r.setFullYear(r.getFullYear() + n), e(r));
      },
      addMonths: function(t, n) {
        var r = h(t);
        return "Invalid Date" == r.toString()
          ? null
          : (r.setMonth(r.getMonth() + n), e(r));
      },
      addWeeks: function(t, n) {
        var r = h(t);
        return "Invalid Date" == r.toString()
          ? null
          : (r.setDate(r.getDate() + 7 * n), e(r));
      },
      addDays: function(t, n) {
        var r = h(t);
        return "Invalid Date" == r.toString()
          ? null
          : (r.setDate(r.getDate() + n), e(r));
      },
      addHours: function(t, n) {
        var r = h(t);
        return "Invalid Date" == r.toString()
          ? null
          : (r.setHours(r.getHours() + n), e(r));
      },
      addMinutes: function(t, n) {
        var r = h(t);
        return "Invalid Date" == r.toString()
          ? null
          : (r.setMinutes(r.getMinutes() + n), e(r));
      },
      addSeconds: function(t, n) {
        var r = h(t);
        return "Invalid Date" == r.toString()
          ? null
          : (r.setSeconds(r.getSeconds() + n), e(r));
      },
      yearsUntil: function(t, n) {
        var r = h(t),
          e = h(n);
        return "Invalid" == r.toString() || "Invalid" == e.toString()
          ? null
          : e.getFullYear() - r.getFullYear();
      },
      monthsUntil: function(t, n) {
        var r = h(t),
          e = h(n);
        return "Invalid" == r.toString() || "Invalid" == e.toString()
          ? null
          : 12 * e.getFullYear() +
              e.getMonth() -
              (12 * r.getFullYear() + r.getMonth());
      },
      weeksUntil: function(t, n) {
        var r = h(t),
          e = h(n);
        return "Invalid" == r.toString() || "Invalid" == e.toString()
          ? null
          : Math.floor((e - r) / 6048e5);
      },
      daysUntil: function(t, n) {
        var r = u(h(t)),
          e = u(h(n));
        return "Invalid" == r.toString() || "Invalid" == e.toString()
          ? null
          : Math.round((e - r) / 864e5);
      },
      hoursUntil: function(t, n) {
        var r = h(t),
          e = h(n);
        return "Invalid" == r.toString() || "Invalid" == e.toString()
          ? null
          : Math.floor((e - r) / 36e5);
      },
      minutesUntil: function(t, n) {
        var r = h(t),
          e = h(n);
        return "Invalid" == r.toString() || "Invalid" == e.toString()
          ? null
          : Math.floor((e - r) / 6e4);
      },
      secondsUntil: function(t, n) {
        var r = h(t),
          e = h(n);
        return "Invalid" == r.toString() || "Invalid" == e.toString()
          ? null
          : Math.floor((e - r) / 1e3);
      },
      timeUntil: function(t, n, r) {
        var e = function(t) {
            return (t < 10 ? "0" : "") + t;
          },
          u = h(t),
          a = h(n);
        if ("Invalid" == u.toString() || "Invalid" == a.toString()) return null;
        var i = Math.floor((a - u) / 1e3),
          o = Math.floor(i / 60),
          c = Math.floor(o / 60);
        return (
          (i -= 60 * o),
          r
            ? ((o -= 60 * c), e(c) + ":" + e(o) + ":" + e(i))
            : e(o) + ":" + e(i)
        );
      },
      toISODate: function(t) {
        var n = h(t);
        if ("Invalid Date" == n.toString()) return null;
        var r = function(t) {
          return ("00" + t).substr(-2);
        };
        return (
          ("0000" + n.getFullYear()).substr(-4) +
          "-" +
          r(n.getMonth() + 1) +
          "-" +
          r(n.getDate())
        );
      },
      toISOTime: function(t) {
        var n = h(t);
        if ("Invalid Date" == n.toString()) return null;
        var r = function(t) {
          return ("00" + t).substr(-2);
        };
        return (
          r(n.getHours()) + ":" + r(n.getMinutes()) + ":" + r(n.getSeconds())
        );
      },
      formatDate: function(t, n) {
        var r = h(t);
        if ("Invalid Date" == r.toString()) return null;
        var e = function(t) {
            return ("00" + t).substr(-2);
          },
          u = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
          ],
          a = [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec"
          ],
          i = [
            "Sunday",
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday",
            "Saturday"
          ],
          o = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
          c = r.getFullYear(),
          s = r.getMonth(),
          l = r.getDate(),
          f = r.getDay(),
          d = r.getHours(),
          g = r.getMinutes(),
          m = r.getSeconds();
        return n.replace(/[yMdHhmsaA]+/g, function(t) {
          switch (t) {
            case "yyyy":
              return ("0000" + c).substr(-4);
            case "yy":
              return e(c);
            case "y":
              return c;
            case "MMMM":
              return u[s];
            case "MMM":
              return a[s];
            case "MM":
              return e(s + 1);
            case "M":
              return s + 1;
            case "dddd":
              return i[f];
            case "ddd":
              return o[f];
            case "dd":
              return e(l);
            case "d":
              return l;
            case "HH":
              return e(d);
            case "H":
              return d;
            case "hh":
              return e(d % 12 || 12);
            case "h":
              return d % 12 || 12;
            case "mm":
              return e(g);
            case "m":
              return g;
            case "ss":
              return e(m);
            case "s":
              return m;
            case "a":
              return d < 12 ? "am" : "pm";
            case "A":
              return d < 12 ? "AM" : "PM";
          }
          return t;
        });
      },
      toTimestamp: function(t) {
        var n = h(t);
        return "Invalid Date" == n.toString()
          ? null
          : Math.floor(n.getTime() / 1e3);
      }
    });
  })(),
  dmx.Formatters("object", {
    keys: function(t) {
      return Object.keys(t);
    },
    values: function(n) {
      return Object.keys(n).map(function(t) {
        return n[t];
      });
    },
    hasKey: function(t, n) {
      return -1 !== Object.keys(t).indexOf(n);
    },
    hasValue: function(n, t) {
      return (
        -1 !==
        Object.keys(n)
          .map(function(t) {
            return n[t];
          })
          .indexOf(t)
      );
    },
    default: function(t) {
      return t;
    }
  }),
  dmx.Formatters("boolean", {
    default: function(t) {
      return t;
    },
    toString: function(t) {
      return String(t);
    },
    toNumber: function(t) {
      return Number(t);
    },
    then: function(t, n, r) {
      return t ? n : r;
    }
  }),
  dmx.Formatters("undefined", {
    default: function(t, n) {
      return n;
    }
  }),
  dmx.Formatters("null", {
    default: function(t, n) {
      return n;
    }
  });
//# sourceMappingURL=../maps/dmxFormatter.js.map
