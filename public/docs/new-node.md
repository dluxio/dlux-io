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
