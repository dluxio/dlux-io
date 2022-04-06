### Running A Node

### Prerequisites

* This software has been tested on Node.js version 10 through 15
* Node.js and git are required

### Server Installation
Detailed Instructions also at /docs/setup.md
Which include Docker and IPFS linking

* Clone this repository

`git clone https://github.com/disregardfiat/honeycomb.git`

* Navigate to the root directory of token

`cd honeycomb`

* Set configuration variables

`nano .env` or your favorite editor

`account=hiveaccount
active=hiveactivekey`

* Quit editor and save changes

* Install

`npm install`

* Start

`npm start`

### Recommendations

* Script a way to automatically git pull to stay up to date with daily changes.
* Setup a system service to restart on quits to keep your node online.

### Cloud Installation

* Choose a cloud provider
* Fork this repository
* Connect your fork to the cloud server
* Set configuration variables

`account=hiveaccount`

`active=hiveactivekey`

# Set Up Node

## Prereqs
* Hive Account with ~100 HP
* Additional Hive Key Pair

## (Privex) Docker Deploy
* This will run IPFS. Ensure you select a region appropriate VPS in SWEDEN or USA
* A Dual-Core 1GB / 25GB should be fine (Check with specific community for additional requirements)
* Instructions for Ubuntu follow:
* `sudo apt install docker docker-compose` --install dependencies
* `git clone https://github.com/disregardfiat/honeycomb.git` --download this repo
* `cd honeycomb` --change working directory
* Edit your node specifics via `touch .env && nano .env`
   * Contents: 
```
account="hiveaccount"
active=5JactivePrivateKey
msowner=5KadditionalPrivateKey
mspublic=STMpublickey
```
* `sudo docker-compose build` --Build Docker environment
* `sudo docker-compose up` --Deploy Docker environment

### nginx setup
* `sudo apt install nginx certbot python3-certbot-nginx`
    Select `nginx-full`
* `sudo nano /etc/nginx/sites-availible/default`
   * Enter and save:
```
server{
server_name location.yourdomain.io;

        location / {
                proxy_pass http://127.0.0.1:3001;
                proxy_http_version 1.1;
                proxy_set_header Upgrade $http_upgrade;
                proxy_set_header Connection 'upgrade';
                proxy_set_header Host $host;
        }
}
```
* `sudo systemctl reload nginx`
* Ensure your DNS information points to your server and run `sudo certbot`