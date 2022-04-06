### To Build Your Own Token

Branch this and find this part of `config.js`

*TOKEN CONFIGS -- ALL COMMUNITY RUNNERS NEED THESE SAME VALUES*

`const starting_block = 49988008;` //from what block does your token start

`const prefix = 'dlux_'` //Community token name for Custom Json IDs

`const TOKEN = 'DLUX'` //Token name

`const tag = 'dlux'` //https://the-front-end.com/`tag`/@`leader`/`permlink`

`const jsonTokenName = 'dlux'` //what customJSON in Escrows and sends is looking for

`const leader = 'dlux-io'` //Default account to pull state from, will post daily

`const ben = 'dlux-io'` //Account where comment benifits trigger token action

`const delegation = 'dlux-io'` //account people can delegate to for rewards

`const msaccount = 'dac.escrow'` //account controlled by community leaders

`const mainAPI = 'token.dlux.io'` //leaders API probably

`const mainFE = 'dlux.io'` //frontend for content

`const mainIPFS = 'a.ipfs.dlux.io'` //IPFS service

`const mainICO = 'robotolux'` //Account collecting ICO HIVE

Then alter the `state.js` with balances and other starting information
