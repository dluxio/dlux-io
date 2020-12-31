<!DOCTYPE html>
<html>

<head>
    <meta name="GCD" content="YTk3ODQ3ZWZhN2I4NzZmMzBkNTEwYjJl7e03e8817c8089f817fa51a8d666dfc8">
    <meta charset="utf-8">
    <title>decentralized XR experiences</title>
    <meta name="generator" content="Google Web Designer 4.2.0.0802">
    <link href="/xr/gwdiframe_style.css" rel="stylesheet" data-version="4" data-exports-type="gwd-iframe">
    <link href="/xr/gwdtaparea_style.css" rel="stylesheet" data-version="6" data-exports-type="gwd-taparea">
    <script src="https://cdn.jsdelivr.net/npm/@hiveio/hive-js/dist/hive.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/showdown/1.8.5/showdown.min.js"></script>
    <style id="gwd-text-style" type="text/css">
        p {
            margin: 0px;
        }
        
        a {
            color: #008bfd;
        }
        
        h1 {
            margin: 0px;
        }
        
        h2 {
            margin: 0px;
        }
        
        h3 {
            margin: 0px;
        }
    </style>
    <link rel="stylesheet" href="/xr/gwdxr_style.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,italic,600,600italic,700,700italic,800,800italic,400" rel="stylesheet" type="text/css">
    <script data-source="googbase_min.js" data-version="4" data-exports-type="googbase" src="/xr/googbase_min.js"></script>
    <script data-source="gwd_webcomponents_min.js" data-version="5" data-exports-type="gwd_webcomponents" src="/xr/gwd_webcomponents_min.js"></script>
    <script data-source="gwdiframe_min.js" data-version="4" data-exports-type="gwd-iframe" src="/xr/gwdiframe_min.js"></script>
    <script type="text/javascript" src="/xr/gwdid.min.1.0.js" gwd-gwdid-version="1.0"></script>
    <script type="text/javascript" gwd-events="support" src="/xr/gwd-events-support.1.0.js"></script>
    <script>
    <?php 
	if(isset($_COOKIE['user'])){
    	echo "let iAm = '" . $_COOKIE['user']  . "',\n";
        }
    else{
        echo "let iAm = 'Guest',";
        }
;?>
            stateObj, host, hostRep, postDate, user, userImg, userRep, userBal, userVoteVal, postVal, postVotes, postBody, postTitle, author = 'dlux-io',
            <?php 
            echo "author = '".$author."',";
            echo "permlink = '".$permlink."',";
            ;?>
            postKey = `${author}/${permlink}`,
            stateKey = '/dluxar/@' + postKey
    </script>
    <script type="text/javascript" src="/xr/single_xr.js"></script>
    <script type="text/javascript" gwd-events="handlers" src="/xr/gwd_single_xr.js"></script>
    <script type="text/javascript" gwd-events="registration" src="/xr/reg.js"></script>
    <script data-source="gwdtaparea_min.js" data-version="6" data-exports-type="gwd-taparea" src="/xr/gwdtaparea_min.js"></script>
</head>

<body class="htmlNoPages">
    <div class="gwd-div-iyo5 gwd-div-1fi4" id="info">
        <svg class="gwd-rect-nd9b gwd-svg-10ji" id="info-bg" data-gwd-shape="rectangle"></svg>
        <div class="gwd-div-1i8k" id="info-body">
            <div class="gwd-div-1lkk" id="post-header">
                <svg class="gwd-rect-1jxz" id="post-header-bg" data-gwd-shape="rectangle"></svg>
                <div class="gwd-div-11jd" id="author-profile">
                    <div class="gwd-div-1n5n" id="author-txt-div">
                        <p class="gwd-a-1i66 gwd-a-trba" id="author-name">
                            <a id="author-name-a" href="/"></a>
                        </p>
                        <p class="gwd-a-1i66 gwd-p-1kor" id="post-date"></p>
                        <img class="gwd-img-rpfe" id="author-pic" src="https://ipfs.io/ipfs/QmS1kYPivxqPgpzgkBP8Pw2eQaqHaPtnZRU7fpqG1UF7DX" crossorigin="anonymous"></div>
                </div>
                <div class="gwd-div-1ows gwd-div-1lnz gwd-gen-3emigwdanimation" id="author-btns">
                    <div class="gwd-div-1rqc gwd-div-xfmy gwd-div-qmap gwd-gen-r7gmgwdanimation gwd-div-136m gwd-gen-1rmugwdanimation gwd-div-1u91 gwd-div-1qdn gwd-div-1sn1" id="author-follow-btn">
                        <svg class="gwd-rect-1aqt gwd-svg-1hlm gwd-gen-1noxgwdanimation gwd-svg-19jt gwd-gen-zprjgwdanimation gwd-rect-1e8t gwd-svg-1k6v" data-gwd-shape="rectangle"></svg>
                        <span class="gwd-span-hmzp gwd-span-vufj gwd-span-xc61 gwd-gen-sdk2gwdanimation gwd-span-8i72 gwd-gen-ffomgwdanimation gwd-span-8a20 gwd-span-1ls5">follow</span>
                        <gwd-taparea class="gwd-taparea-7jae gwd-taparea-aoqg gwd-gen-1dcxgwdanimation gwd-taparea-1l4s" id="follow-taparea"></gwd-taparea>
                    </div>
                    <div class="gwd-div-1rqc gwd-div-12wt gwd-gen-12w6gwdanimation gwd-gen-179mgwdanimation gwd-div-1g9m gwd-div-g221 gwd-div-1c6d gwd-div-cdcu" id="author-mute-btn">
                        <svg class="gwd-rect-1aqt gwd-svg-1n7w gwd-gen-ghg5gwdanimation gwd-rect-12s5 gwd-svg-a6ii" data-gwd-shape="rectangle"></svg>
                        <span class="gwd-span-hmzp gwd-span-1pj8 gwd-gen-1wpegwdanimation gwd-span-1x97 gwd-span-1mff">mute</span>
                        <gwd-taparea class="gwd-taparea-7jae gwd-taparea-bq0y gwd-taparea-649t gwd-taparea-un87 gwd-taparea-1roz" id="mute-taparea"></gwd-taparea>
                    </div>
                    <div class="gwd-div-1rqc gwd-gen-r7gmgwdanimation gwd-div-xfmy gwd-div-1ivj gwd-div-mov9 gwd-gen-kh5lgwdanimation gwd-gen-zr4vgwdanimation gwd-div-1hl9 gwd-div-1xa7 gwd-div-qe6k" id="author-pay-btn">
                        <svg class="gwd-rect-1aqt gwd-svg-kjte gwd-svg-4akp gwd-gen-7w2wgwdanimation gwd-gen-kulxgwdanimation" data-gwd-shape="rectangle"></svg>
                        <span class="gwd-span-hmzp gwd-gen-sdk2gwdanimation gwd-span-vufj gwd-span-1b8n gwd-span-9d7b gwd-gen-du8jgwdanimation gwd-span-1klx gwd-span-m2bc">pay</span>
                        <gwd-taparea class="gwd-taparea-7jae gwd-taparea-bq0y gwd-taparea-1vvl gwd-gen-1fuigwdanimation" id="pay-taparea"></gwd-taparea>
                    </div>
                    <div class="gwd-div-1rqc gwd-div-12wt gwd-gen-12w6gwdanimation gwd-gen-179mgwdanimation gwd-div-65c5" id="author-delegate-btn">
                        <svg class="gwd-rect-1aqt gwd-svg-1n7w gwd-gen-ghg5gwdanimation gwd-rect-hz5c" data-gwd-shape="rectangle"></svg>
                        <span class="gwd-span-hmzp gwd-span-1pj8 gwd-gen-1wpegwdanimation gwd-span-o8ob">delegate</span>
                        <gwd-taparea class="gwd-taparea-7jae gwd-taparea-bq0y gwd-taparea-649t gwd-taparea-5r3k gwd-taparea-1b8n" id="delegate-taparea"></gwd-taparea>
                    </div>
                </div>
            </div>
            <div class="gwd-div-1exg" id="post-body"></div>
        </div>
        <div class="gwd-div-1i36" id="info-footer">
            <svg class="gwd-rect-1f4g gwd-gen-stnngwdanimation gwd-svg-1wik" id="info-footer-bg" data-gwd-shape="rectangle"></svg>
            <div class="gwd-div-1qyd gwd-gen-1v5fgwdanimation" id="footer-btns">
                <div class="gwd-div-1get gwd-gen-1wxngwdanimation" id="value-votes">
                    <svg class="gwd-rect-1g98 gwd-svg-1l16 gwd-rect-1qif gwd-rect-nasd gwd-rect-1hx4 gwd-gen-1dcfgwdanimation" id="value-oval" data-gwd-shape="rectangle"></svg>
                    <span class="gwd-span-97gt gwd-gen-1cn0gwdanimation" id="value-txt">Calculating...</span></div>
                <div class="gwd-div-vvu2 gwd-gen-9lu1gwdanimation" id="reblog-btn">
                    <svg class="gwd-rect-1g98 gwd-svg-1l16 gwd-rect-1qif gwd-gen-v6t5gwdanimation" id="reblog-oval" data-gwd-shape="rectangle"></svg>
                    <img class="gwd-img-92aa gwd-gen-1wt0gwdanimation" id="reblogIcon" src="https://ipfs.io/ipfs/QmWzwtEcfBwdKC2xaDsdrhpgmLTooxAAQFLqiewzHbHhuw" alt="reblog">
                    <gwd-taparea class="gwd-taparea-jl2t gwd-gen-1ft8gwdanimation" id="reblog-taparea"></gwd-taparea>
                </div>
                <div class="gwd-div-1iou gwd-gen-1tekgwdanimation" id="upvote-btn">
                    <svg class="gwd-rect-1g98 gwd-svg-1l16 gwd-rect-1qif gwd-rect-nasd gwd-gen-1vukgwdanimation gwd-svg-1otk" id="upvote-oval" data-gwd-shape="rectangle"></svg>
                    <div class="gwd-div-15bk gwd-gen-c2trgwdanimation" data-gwd-group="chevron">
                        <svg class="gwd-line-1mg8 gwd-svg-z0vt gwd-svg-1fik gwd-svg-172j gwd-svg-2ea8 gwd-svg-dv0k gwd-grp-1xp3" data-gwd-shape="line" preserveAspectRatio="none" viewBox="0 0 32.829 32.829" data-gwd-grp-id="chevLeft">
                            <line class="gwd-grp-1xp3" x1="2.121" x2="30.707" y1="30.707" y2="2.121"></line>
                        </svg>
                        <svg class="gwd-line-1mg8 gwd-svg-1kjf gwd-grp-1xp3" data-gwd-shape="line" preserveAspectRatio="none" viewBox="0 0 32.829 32.829" data-gwd-grp-id="chevRight">
                            <line class="gwd-grp-1xp3" x1="2.121" x2="30.707" y1="2.121" y2="30.707"></line>
                        </svg>
                    </div>
                    <gwd-taparea class="gwd-taparea-118r gwd-gen-w55agwdanimation" id="upvote-taparea"></gwd-taparea>
                </div>
            </div>
        </div>
        <svg class="gwd-rect-1f4g gwd-gen-stnngwdanimation gwd-svg-1wik gwd-rect-apnl gwd-svg-11fd" id="info-header-bg" data-gwd-shape="rectangle"></svg>
    </div>
    <div class="gwd-div-1cvq" id="shutter-btn">
        <svg class="gwd-oval-267n" data-gwd-shape="oval" preserveAspectRatio="none" viewBox="0 0 181 181">
            <ellipse cx="50%" cy="50%" rx="90.5" ry="90.5"></ellipse>
        </svg>
        <svg class="gwd-oval-vuui" data-gwd-shape="oval" preserveAspectRatio="none" viewBox="0 0 208 208">
            <ellipse cx="50%" cy="50%" rx="99" ry="99"></ellipse>
        </svg>
        <gwd-taparea class="gwd-taparea-tlc3" id="shutter-taparea">
        </gwd-taparea>
    </div>
    <div class="gwd-div-iyo5 gwd-div-11ba" id="side-menu" style="float: left;">
        <svg class="gwd-rect-nd9b gwd-rect-1skq" id="menu-bg" data-gwd-shape="rectangle"></svg>
        <div class="gwd-div-1lbq" id="side-menu-scrollable">
            <div class="gwd-div-1un3" id="menu-btns">
                <p class="gwd-p-16nt gwd-p-137l gwd-p-1t7l gwd-p-muqy gwd-p-10yq" id="home-btnt">
                    Home
                    <br>
                    <br>
                </p>
                <p class="gwd-p-16nt gwd-p-11wt gwd-p-agk9 gwd-p-17az gwd-p-1i7e gwd-p-1yyn" id="send-hive">
                    Send Hive</p>
                <p class="gwd-p-16nt gwd-p-11wt gwd-p-1cbm gwd-p-11wu gwd-p-377c gwd-p-17jg gwd-p-zzcz" id="about-btn">
                    About dlux</p>
                <p class="gwd-p-16nt gwd-p-11wt gwd-p-1cbm gwd-p-ms4c" id="logout-btn">
                    Logout</p>
                <svg class="gwd-rect-kpm2 gwd-svg-vhd0 gwd-svg-1tia gwd-svg-at21 gwd-svg-mkwv" data-gwd-shape="rectangle"></svg>
                <svg class="gwd-rect-kpm2 gwd-svg-1n2k" data-gwd-shape="rectangle"></svg>
                <svg class="gwd-rect-kpm2 gwd-svg-vsd8" data-gwd-shape="rectangle"></svg>
                <gwd-taparea class="gwd-taparea-1p3m gwd-taparea-1nh1" id="home-taparea"></gwd-taparea>
                <gwd-taparea class="gwd-taparea-1p3m gwd-taparea-55n9" id="sendhive-taparea"></gwd-taparea>
                <gwd-taparea class="gwd-taparea-1p3m gwd-taparea-cgtn" id="about-taparea"></gwd-taparea>
                <gwd-taparea class="gwd-taparea-1p3m gwd-taparea-ni98" id="logout-taparea"></gwd-taparea>
            </div>
            <div class="gwd-div-1lps gwd-div-5x8n" id="user-profile">
                <img class="gwd-img-zdtc gwd-img-8be3" id="user-pic" src="https://ipfs.io/ipfs/QmbxgtR7NwUcJ4rT2FwmmuQHjXdmwjHr1Ga3P5Krj876QM">
                <span class="gwd-gen-g2rvgwdanimation gwd-span-2nts gwd-span-1yot" id="user-name-txt"><br class="gwd-br-nan5"></span>
                <span class="gwd-span-1df5" id="user-voteval-txt"></span>
                <gwd-taparea class="gwd-taparea-9ixg" id="userprofile-taparea"></gwd-taparea>
            </div>
        </div>
        <svg class="gwd-rect-1f4g gwd-gen-stnngwdanimation gwd-svg-1wik gwd-rect-apnl gwd-svg-11fd" id="side-menu-header-bg" data-gwd-shape="rectangle"></svg>
    </div>
    <div class="gwd-div-1mlc" id="header">
        <div class="gwd-div-1rze gwd-div-w6qa gwd-div-16pj" id="info-xr-btn">
            <svg class="gwd-rect-1g98 gwd-svg-np1o" id="info-xr-bg" data-gwd-shape="rectangle"></svg>
            <svg class="gwd-rect-1g98 gwd-rect-jdse gwd-svg-rhxd" id="info-selectionbox" data-gwd-shape="rectangle"></svg>
            <svg class="gwd-rect-1g98 gwd-rect-jdse gwd-svg-qxom" id="xr-selectionbox" data-gwd-shape="rectangle"></svg>
            <p class="gwd-a-tpk6 gwd-p-1e2b" id="info-txt">info</p>
            <p class="gwd-a-tpk6 gwd-p-80i6" id="xr-txt">XR</p>
            <gwd-taparea class="gwd-taparea-1u5r gwd-taparea-zhn6 gwd-taparea-1sih" id="info-taparea"></gwd-taparea>
            <gwd-taparea class="gwd-taparea-1u5r gwd-taparea-zhn6 gwd-taparea-1uca" id="xr-taparea"></gwd-taparea>
        </div>
        <div class="gwd-div-1rze gwd-div-vndf" id="menu-btn">
            <svg class="gwd-rect-1g98 gwd-svg-1l16" data-gwd-shape="rectangle"></svg>
            <div class="gwd-div-rhf8" id="hamburger-icon">
                <svg class="gwd-line-7k6l gwd-svg-1vi2" data-gwd-shape="line" preserveAspectRatio="none" viewBox="0 0 60 7">
                    <line x1="0" x2="60" y1="3.5" y2="3.5"></line>
                </svg>
                <svg class="gwd-line-7k6l gwd-svg-15hf" data-gwd-shape="line" preserveAspectRatio="none" viewBox="0 0 60 7">
                    <line x1="0" x2="60" y1="3.5" y2="3.5"></line>
                </svg>
                <svg class="gwd-line-7k6l gwd-svg-1kdb" data-gwd-shape="line" preserveAspectRatio="none" viewBox="0 0 60 7">
                    <line x1="0" x2="60" y1="3.5" y2="3.5"></line>
                </svg>
            </div>
            <gwd-taparea class="gwd-taparea-1u5r gwd-taparea-elkj" id="menu-taparea"></gwd-taparea>
        </div>
        <div class="gwd-div-1rze gwd-div-vndf gwd-div-f555" id="close-btn">
            <svg class="gwd-rect-1g98 gwd-svg-1l16" data-gwd-shape="rectangle"></svg>
            <svg class="gwd-line-x0uw gwd-svg-9apc" data-gwd-shape="line" preserveAspectRatio="none" viewBox="0 0 53.3 53.3">
                <line x1="1.768" x2="51.532" y1="51.532" y2="1.768"></line>
            </svg>
            <svg class="gwd-line-x0uw gwd-svg-4rmw" data-gwd-shape="line" preserveAspectRatio="none" viewBox="0 0 53.3 53.3">
                <line x1="1.768" x2="51.532" y1="51.532" y2="1.768"></line>
            </svg>
            <gwd-taparea class="gwd-taparea-1u5r gwd-taparea-elkj" id="close-taparea"></gwd-taparea>
        </div>
    </div>
</body>

</html>