class HoneyComb {
    constructor(domain, user){
        this.domain = domain.substr(domain.length-2) === '/' ? domain : `${domain}/`
        this.ready = false
        this.fallbacks = []
        this.user = user || ''
        this.init();
    }
    init(){
        fetch(`${this.domain}api/protocol`).then(res => res.json()).then(res => {
            this.multisig = res.multisig
            this.domain_id = res.node
            this.jsontoken = res.jsontoken
            this.prefix = res.prefix
            this.consensus = res.consensus
            this.ready = true
            this.ping(this.consensus)
        })
    }
    ping(consensus){
        const now = new Date()
        for(var node in consensus){
            fetch(`${consensus[node].domain.substr(domain.length-2) === '/' ? domain : `${domain}/`}api/protocol`).then(r=>r.json()).then(res=>{
                const ping = new Date() - now
                if(res.node == node){
                    this.fallbacks.push({node,ping,domain:consensus[node].domain.substr(domain.length-2) === '/' ? domain : `${domain}/`})
                }
                if(this.ready.node == this.domain_id){
                    this.ping = ping
                }
            })
        }
    }
    get fallbacks(){
        this.fallbacks.sort((a,b) => a.ping - b.ping)
        return this.fallbacks
    }
    set domain(domain){
        this.domain = domain.substr(domain.length-2) === '/' ? domain : `${domain}/`
        this.ready = false
        this.init()
    }
    get ready(){
        return this.ready
    }
    get domain(){
        return this.domain
    }
    get vitals(){
        return {
            domain: this.domain,
            domain_id: this.domain_id,
            jsontoken: this.jsontoken,
            prefix: this.prefix,
            multisig: this.multisig,
            ping: this.ping,
            fallbacks: this.fallbacks,
            ready: this.ready
        }
    }
    broadcastTransfer(cj, msg){
        return new Promise((resolve, reject) => {
            this.hive_sign([this.user, [
                        ['transfer', {
                            to: cj.to,
                            from: this.user,
                            amount: `${parseFloat((cj.hive ? cj.hive : cj.hbd)/1000).toFixed(3)} ${cj.hive?'HIVE':'HBD'}`,
                            memo: cj.memo
                        }]
                    ], 'active'])
                .then(r => {
                    resolve(r)
                })
                .catch(e => { reject(e) })
            })
    }
    broadcastCJA(cj, id, msg){
        return new Promise((resolve, reject) => {
        this.hive_sign([this.user, [
                        ['custom_json', {
                            "required_auths": [this.user],
                            "required_posting_auths": [],
                            "id": id,
                            "json": JSON.stringify(cj)
                        }]
                    ], 'active'])
                .then(r => {
                    resolve(r)
                })
                .catch(e => { reject(e) })
            })
    }
    hive_sign(op) {
         return new Promise((resolve, reject) => {
             if (window.hive_keychain) {
                 try {
                     window.hive_keychain.requestBroadcast(op[0], op[1], op[2], function(response) {
                         resolve(response)
                     });
                 } catch (e) {
                     reject(e)
                 }
             } else {
                 reject({ "error": "Hive Keychain is not installed." })
             }
         })
    }
}