# HoneyComb

This is a Decentralized Autonomous Organization built on the HIVE ecosystem. Customize it as you need

Powering: dlux.io (DLUX), and the 3speak.tv (SPK Claim Chain)

This software builds a network of peers that use HIVE to post and interpret transactions. This allows these peers to come to a consensus and elect peers to run tasks. Distributing computing in this way allows a vast amount of potential applications, DeFi, and oracle services. By distributing authority to perform transactions we can have a frictionless(no intermediate tokens, no central authority, no intrinsic fees) way to cross asset boundaries(HIVE/COMB) with no information asymmetries, ie Finance without securities by definition... just free speech: As no party is required to perfom any function, or prevented from performing any function, no promises are made by peers. Network Incentives (COMB) alone are enough to maintain trust.

* Send: Use custom_json with active permission, "ACJ" to send OPEN_TOEK tokens
* Illiquid voting state. Power up and down TOKEN for voting and delegation with ACJ
* Illiquid governance token for determining consensus and collateral.
* Chron to execute virtual operations: expire trades, powerdown stake, enforce penalties etc...
* Hive posts that benefit the configured account at > the configured % are: 
   * entered into a voting eligible content pool
   * optionally have their IPFS content pinned with rtrades(3rd party service)
   * can be programmed for any other function
* Users can vote on content with weight, using custom json with posting permissions.
* Have a daily pool of 10 full votes, and 1 in 10000 fine control of voting stake.
* State is saved to IPFS every 5 minutes for fast automatic starts and restarts, also used to determine consensus
* LevelDB with custom transactional handlers for transactional writes
* JSON express server API
* Token sales from the configured account with HIVE transfers
* Token sales set with pricing feedback.
* 2/3rds consensus algorithm
* automatic messaging to join network ad-hoc
* ability to delete node from list(turn off escrow queue)
* report consensus
* distribute TOKENS to configured account delegators and keep running total
   * Used for auto voting on content with delegation
* pay nodes for processing trusted state, facilitating an escrow/dex transaction or running a smart contract.
   * Effectively mining TOKENS with Hive Resource Credits
* establishes a 5%(configurable) inflation rate and distributes rewards to run the network
* Automated accounting post from configured account or mirrors
* Track interactions on a rolling feed via block_num and TXID.
* Automates IPFS pinning for OPEN_TOKEN votable content from configured account or mirrors
* 2 way DEX
  * HIVE:OPEN_TOKEN & HBD:OPEN_TOKEN pairs
  * On state trade history with daily reductions to high/low/volume
  * Price/collateral controls from Volume Weighted Moving Average
  * Enforcement of collateral
* Partial fills of DEX orders `1.0.0`
* Multi-signature deterministic control of community capital
* NFT/smart contract system

***

This software is meant to be run as a public API for decentralized token data.

While it runs it verifies other nodes are operating correctly and confirms this by posting a customJson transaction to Hive. 288(configurable) messages will be required per day per node operator. More Resource Credits will be required to handle escrow transactions and transfers.

Deploy from heroku or similar and set ENV variables with a hive name and active key. Deploy from home computer for maximum account security.

* `account` - dlux-io
* `active` - active posting key (will run escrow transactions for rewards) !! *caution while in testing* !!
* `domain` - `https://<token-api>.<a-domain>.com` or `http://<static-ip>:<port>`



