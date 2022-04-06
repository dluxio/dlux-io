### Securing a DEX 
HoneyComb in one sentence would be: Software helping us agree to control an account. For chains like SPK there will hopefully be several multi-sig accounts allowing DEX trading of 3 internal tokens against at least 2 coins. Internal DEXs are much easier to secure than DEXs than control external funds, like a Hive wallet. Worst case you can fork to secure internal assets, where the worst case for a Hive wallet is complete loss of the funds and accounts. Some things that aren't even an issue with securing a DEX still play into security for people. Such as spoofing a front end that tells end users the DEX wallet is at the wrong place. Being security minded is the only path forward in an ecosystem where DeFi has been hacked collectively for hundreds of millions of dollars. 

This DEX tries to maintain a functional amount of Liquidity that is also small enough to not be a target. 

#### Refunds

Every block (3 seconds) the nodes determine how much Hive can be held, and if they are over that limit will trigger order cancels for the lowest priced buy orders. 


![The Lowest Markey Buy Depth](https://files.peakd.com/file/peakd-hive/disregardfiat/23tbMAyNXfN6BTL2ce8hX2r84JKUhSUjRqY8TNXCA31v83K7nH8UG1mACG8aJe1NMKVog.png)

Refunding this 10 Hive order at the bottom is most prudent. There aren't even 10M Larynx in circulation, therefore it's providing almost no utility. 

The first "Lever" the node operator have to prevent canceling of orders is "DEX Slope." The Second is "DEX Max"

Actual Code: 
```js
function maxAllowed(stats, tick, remaining, crate) {
    const max = stats.safetyLimit * tick * (1 - ((crate/tick) * (stats.dex_slope/100))) * (stats.dex_max/100)
    return max > remaining ? 0 : parseInt(remaining - max)
}
```
Market orders and refunds are equally as dangerous to handle... But overall there is no way to prevent accounts from sending the DEX any amount of HIVE/HBD. The above code kicks in when a Limit order is still unfilled, or there are no more sell orders for a Market order to buy. 
* Remaining: The amount of Hive/HBD that will be packaged into an open order.
* Max: The ammount the DEX will allow to be in an open order.
   * safetyLimit: The collective holdings of the smallest half of the DEX collateral
   * tick: The last executed price in this market(this trade included)
   * crate: calculated rate. Specified Rate, or last executed rate for market orders.
   * dex_slope: The size penalty for rates under the tick
   * dex_max: The size relative to the safetyLimit

What this means in action:

The last price was 1/10 (10 cents) and I want to put in a limit order for 9 cents.
If the dex_max(DM) is 100%, the dex_slope(DS) is 0% and the 5 smallest gov balances of the 10 node runners is 1000 Tokens-safety limit(SL). Then I can place an order of 100 Hive. Anything after this gets refunded.

DM:  50% DS:  0% for 9cents: 50 Hive
DM: 100% DS 100% for 9cents: 90 Hive
DM:  50% DS 100% for 9cents: 45 Hive
DM:  10% DS 100% for 9cents:  9 Hive
DM: 100% DS  50% for 5cents: 75 Hive
DM: 100% DS 100% for 5cents: 50 Hive

Encouraging good quality liquidity, and keeping it available should be the goal. Over the past 24 Hours nearly $3000 has moved through the account with as little as $500 of Liquidity in the account. This means our DEX is functional, and never mind how secure the network is, $500 probably isn't enough to even try and hack it.

#### DEX Fees

One of the other important levers accounts can currently control is the DEX Fee. Currently it's pushing .6%. This means that Roughly $18 was collected in fees. Which over a month would be ~$540. Or possible $21.6 per consensus node operator with the current 25 node limit. This could be adjusted as high as 1% or as low as nil. In the future all kinds of feedback metrics is possible to better the asset interface and security. It's important to note, that as long as you can contribute liquidity to this network you'll be paid the same per block. 

#### DAO Claim Vote

The SPK CC has another lever called the DAO claim vote. This determines the relative size of tokens will be allocated into the SPK DAO. Only about 70M of the 350M tokens were claimed in March and the initial plan was to move all unclaimed tokens into the DAO. However, holding ~400% of the liquid tokens in a DAO significantly impacts their ability to hold value when distributed. So the network will only claim up to 100% and likely significantly less to improve the overall value and stability for it's current claimers and purchasers. The default is 15%. 