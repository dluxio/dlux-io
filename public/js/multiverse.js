var configItem = {
    dlux_api = localStorage.getItem('dlux_api') || 'https://dluxdata.herokuapp.io',
    hive_api = localStorage.getItem('hive_api') || 'https://api.hive.blog'
}
var dlux_links = {
    lists: {

    },
    items: {

    },
    page: {
        a: 50,
        o: 0
    }
}
function dlux_load (type, items, user){
    switch (type) {
        case 'user':
            fetch( `${configItem.dlux_api}/dapps/@${user}`)
            .then(r => {
                return r.json()
            })
            .then(result => {

            })
            break;
        case 'trending':
            fetch( `${configItem.dlux_api}}/trending?a=${items.a}&o=${items.o}`)
            .then(r => {
                return r.json()
            })
            .then(result => {
                
            })
            break;
        case 'promoted':
            fetch( `${configItem.dlux_api}}/promoted?a=${items.a}&o=${items.o}`)
            .then(r => {
                return r.json()
            })
            .then(result => {
                
            })
            break;
        default: //new
            fetch( `${configItem.dlux_api}}/new?a=${items.a}&o=${items.o}`)
            .then(r => {
                return r.json()
            })
            .then(result => {
                
            })
            break;
    }
}

function step_1 (json, items, type, user){
    let list = json.result
    dlux_links.page.o = items.o || 0,
    dlux_links.page.a = items.a || 50
    if(dlux_links.lists[type]){
        if (dlux_links.lists[type].length !== offset){
            for (i; i < dlux_links.lists[type].length;i++){
                dlux_links.lists[type].push(i + dlux_links.page.a)
            }
        } else {

        }
    } else {
       dlux_links.lists[type] = [] 
    }
    var i = 0
    for (item in list) {
        dlux_links.urls[`${list[item].author}/${list[item].permlink}`] = {}
        get_post(list[item].author, list[item].permlink, {id: i + dlux_links.page.o})
        dlux_links.urls[`${list[item].author}/${list[item].permlink}`].dlux = list[item]
        dlux_links.lists[type][i]`${list[item].author}/${list[item].permlink}`
        i++
    }
}

function get_post(author, permlink, options){
    return new Promise((resolve, reject)=>{
        fetch(configItem.hive_api, {
            body: `{"jsonrpc":"2.0", "method":"condenser_api.get_content", "params":["${author}", "${permlink}"], "id":1}`,
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            method: "POST"
        })
        .then(r => {
            return r.json()
        })
        .then(result => {
            // console.log(result)
            dlux_links.urls[`${author}/${permlink}`].get_content = result.result
            renderLink(`${author}/${permlink}`, options.id)
        })
    }) 
}

function renderLink(url, options, scene){
    
}