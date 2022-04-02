<!doctype html>
<html lang="en" class="h-100">

<head>
  <title>DLUX - DEX</title>
  <?php
  $path = $_SERVER['DOCUMENT_ROOT'];
  $path .= "/mod/header.php";
  include_once($path);
  ?>
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
  <script type="module" src="/js/dex-vue.js"></script>
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
                      <div class="dropdown-divider bg-light d-none"></div>
                      <a class="dropdown-item text-white-50 d-none" href="#/" @click="setApi()">Manual</a>
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
                      <form id="sendForm" @submit.prevent="validateForm('sendForm', 'sendFormValid');tokenSend()" class="needs-validation" novalidate>
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
                      <form name="pwrlarynx" id="powForm" @submit.prevent="validateForm('powForm', 'powFormValid');power()" class=" needs-validation" novalidate>
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
                          <button id="pwruplarynxmodalsend" type="submit" class="btn btn-primary" v-if="features.powsel_up">Power Up<i class="fas fa-arrow-alt-circle-up ml-2"></i></button>
                          <button id="pwrdownlarynxmodalsend" type="submit" class="btn btn-primary" v-if="!features.powsel_up">Power Down<i class="fas fa-arrow-alt-circle-down ml-2"></i></button>
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
                      <form name="govlarynx" id="govForm" @submit.prevent="validateForm('govForm', 'govFormValid');gov()" class="needs-validation" novalidate>
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
                      <form name="sendhive" id="hiveForm" @submit.prevent="validateForm('hiveForm', 'hiveFormValid');sendhive()" class=" needs-validation" novalidate>
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
                          <button id="sendhivemodalsend" type="submit" class="btn btn-danger">Send<i class="fas fa-paper-plane ml-2"></i></button>
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
                      <form name="sendhbd" id="hbdForm" @submit.prevent="validateForm('hbdForm', 'hbdFormValid');sendhbd()" class="needs-validation" novalidate>
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
                          <button id="sendhbdmodalsend" type="submit" class="btn btn-success">Send<i class="fas fa-paper-plane ml-2"></i></button>
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
                              <input type="radio" name="buyType" id="buylimit" checked @click="togglebuylimit('limit');setValue('buyQuantity', 0);setValue('buyHours','720');setValue('buyPrice', buyhive.checked ? hivesells[0]?.rate || '0' : hbdsells[0]?.rate || '0');block()">
                              LIMIT </label>
                            <label class="btn btn-outline-warning">
                              <input type="radio" name="buyType" id="buymarket" @click="togglebuylimit('market');setValue('buyQuantity','0');setValue('buyHours','0');setValue('buyHiveTotal',0);setValue('buyPrice', 0);setValue('buyHBDTotal',0);block()">
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
                <form id="sellForm" @submit.prevent="validateForm('sellForm', 'sellFormValid');sellDEX()" name="sell" class="form-horizontal needs-validation" novalidate>
                  <div class="form-group" id="sell-type" aria-labelledby="sell-type-label">
                    <div class="form-row">
                      <legend tabindex="-1" class="col-sm-4 bv-no-focus-ring col-form-label" id="sell-type-label">Order Type</legend>
                      <div tabindex="-1" role="group" class="col">
                        <div role="group" class="input-group">
                          <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-outline-warning active">
                              <input type="radio" name="sellType" id="selllimit" checked @click="toggleselllimit('limit');setValue('sellHours', 720);setValue('sellPrice', buyhive.checked ? hivebuys[0]?.rate || 0 : hbdbuys[0]?.rate || 0 );slock()">
                              LIMIT </label>
                            <label class="btn btn-outline-warning">
                              <input type="radio" name="sellType" id="sellmarket" @click="toggleselllimit('market');setValue('sellHours', 0);setValue('sellPrice', 0);setValue('sellHiveTotal', 0);setValue('sellHBDTotal', 0);slock()">
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
                    <button type="submit" class="btn btn-danger">Sell</button>
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

</html>