<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <title>TabiLong</title>
    <meta name="description" content="TabiLong"/>
    <meta name="keywords" content="VR,オーロラ,旅行,旅,島"/>
    <meta property="og:title" content="TabiLong"/>
    <meta property="og:image" content="/image/logo.jpg"/>
    <meta property="og:site_name" content="TabiLong"/>
    <meta property="og:description" content="新しい旅の魅力をVRで感じよう！"/>

    <link rel="shortcut icon" href="/img/common/favicon.ico">


    <!-- google fonts -->
    <link rel='stylesheet' href='//fonts.googleapis.com/css?family=PT+Sans'>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Droid+Serif:regular,bold"/>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Alegreya+Sans:regular,italic,bold,bolditalic"/>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Nixie+One:regular,italic,bold,bolditalic"/>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Alegreya+SC:regular,italic,bold,bolditalic"/>

    <!-- css -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/style.css" media="screen"/>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/assets/js/html5shiv.js"></script>
    <script src="/assets/js/respond.js"></script>
    <![endif]-->

    <!--[if IE 8]>
    <script src="/assets/js/selectivizr.js"></script>
    <![endif]-->

    <script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js"></script>
    <script>
        async function web3Login() {
            if (!window.ethereum) {
                alert('MetaMask not detected. Please install MetaMask first.');
                return;
            }

            const provider = new ethers.providers.Web3Provider(window.ethereum);

            let response = await fetch('/web3-login-message');
            const message = await response.text();

            await provider.send("eth_requestAccounts", []);
            const address = await provider.getSigner().getAddress();
            const signature = await provider.getSigner().signMessage(message);

            response = await fetch('/web3-login-verify', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    'address': address,
                    'signature': signature,
                    '_token': '{{ csrf_token() }}'
                })
            });
            const data = await response.text();

            console.log(data);
        }
    </script>

</head>
<body>


<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

<div id="drawer-right">
    <div class="cross text-right">
        <a class="toggleDrawer" href="#"><i class="fa fa-times-circle fa-2x"></i></a>
    </div>
    <h2>Navigate</h2>
    <nav>
        <ul class="nav nav-pills nav-stacked">
            <li>
                <a href="#wrapper"><i class="fa fa-home"></i> Home</a>
            </li>
            <li>
                <a href="#portfolio"><i class="fa fa-bookmark"></i> VR movie</a>
            </li>
            <li>
                <a href="#services"><i class="fa fa-tasks"></i> Services</a>
            </li>

            <li>
{{--                <button class="btn btn-primary mt-5" onclick="web3Login();">Log in with MetaMask</button>--}}
                <a href="#" onclick="web3Login();">Log in with MetaMask</a>
            </li>

            <li>
                <a href="#contact"><i class="fa fa-phone-square"></i> Contact</a>
            </li>

        </ul>
    </nav>

</div><!-- #drawer-right -->

<div id="wrapper">

    <div id="header" class="content-block header-wrapper">
        <div class="header-wrapper-inner">
            <section class="top clearfix">
                <div class="pull-left">
                    <h1><a class="logo" href="/"><img src="/image/logo.jpg" border="0" width="50"/>TabiLong</a></h1>
                </div>
                <div class="pull-right">
                    <a class="toggleDrawer" href="#"><i class="fa fa-bars fa-2x"></i></a>
                </div>
            </section>
            <section class="center">
                <div class="slogan">
                    TabiLong
                </div>
                <div class="secondary-slogan">
                    TabiLong VR movie world tour.
                </div>
            </section>
            <section class="bottom">
                <a id="scrollToContent" href="#">
                    <img src="/assets/images/arrow_down.png">
                </a>
            </section>
        </div>
    </div><!-- header -->

    <div class="content-block" id="portfolio">
        <div class="container">
            <header class="block-heading cleafix">
                <a href="#" class="btn btn-o btn-lg pull-right">View All</a>
                <h1>VR movie</h1>
                <p>360°VR動画で旅体験をしよう</p>
            </header>
            <section class="block-body">
                <div class="row">
                    <div class="col-sm-4">
                        <a href="https://vr.tabilong.com/vr/id/1/" class="recent-work" style="background-image:url(/image/kashima.jpg)">
                            <span class="btn btn-o-white">[JAPAN]北条鹿島(愛媛)</span>
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a href="https://vr.tabilong.com/vr/id/2/" class="recent-work" style="background-image:url(/image/gate.jpg)">
                            <span class="btn btn-o-white">[JAPAN]TOKYO GATE BRIDGE</span>
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a href="https://vr.tabilong.com/vr/id/3/" class="recent-work" style="background-image:url(/image/rain.jpg)">
                            <span class="btn btn-o-white">[JAPAN]レインボーブリッジ</span>
                        </a>
                    </div>

                    <div class="col-sm-4">
                        <a href="https://vr.tabilong.com/vr/id/4/" class="recent-work" style="background-image:url(/image/hk.jpg)">
                            <span class="btn btn-o-white">[HONG KONG]香港</span>
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a href="https://vr.tabilong.com/vr/id/5/" class="recent-work" style="background-image:url(/image/kr.jpg)">
                            <span class="btn btn-o-white">[KOREA]南大門</span>
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a href="https://vr.tabilong.com/vr/id/6/" class="recent-work" style="background-image:url(/image/fuji.jpg)">
                            <span class="btn btn-o-white">[JAPAN]富士山</span>
                        </a>
                    </div>



                </div>
            </section>
            <br />
        </div>
    </div><!-- #portfolio -->


    <div class="content-block" id="login">
        <div class="container text-center">
            <header class="block-heading cleafix">
                <h1>Login</h1>
            </header>
            <section class="block-body">
                                <button class="btn btn-primary mt-5" onclick="web3Login();">Log in with MetaMask</button>
<br />
                @if (Route::has('login'))
                    @auth
                            <a href="{{ url('dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">DashBoard</a>
                    @else
                        @if (Route::has('register'))
                                <a href="{{ route('login') }}" target="_blank" class="text-sm text-gray-700 dark:text-gray-500 underline">Email Login</a>
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Email Register</a>
                                <a href="{{route('login.google.redirect') }}">Google Login / Register</a>
                        @endif
                    @endauth

                @endif

            </section>
            <br />
        </div>
    </div><!-- #portfolio -->


    <div class="content-block parallax" id="services">
        <div class="container text-center">
            <header class="block-heading cleafix">
                <h1>Our Services</h1>
                <p>about what we do</p>
            </header>
            <section class="block-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="service">
                            <i class="fa fa-send-o"></i>
                            <h2>魅力的な旅の紹介</h2>
                            <p>没入感のある360°VRを提供し、旅の感動を紹介し、お客様に提供します.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service">
                            <i class="fa fa-bolt"></i>
                            <h2>5G Quality</h2>
                            <p>5G時代の最先端スマホで楽しめる高速通信を活かしたコンテンツ！5Gスマホで旅を楽しもう！</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service">
                            <i class="fa fa-camera-retro"></i>
                            <h2>Photography</h2>
                            <p>地球温暖化により常に変化している地球の自然を、研究目的などで利用できるよう360°動画でアーカイブし後世に残します</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div><!-- #services -->

    <div class="content-block" id="contact">
        <div class="container text-center">
            <header class="block-heading cleafix">
                <h1>Contact Us</h1>
                <p>Feel free to drop us a line.</p>
            </header>
            <section class="block-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form class="" action="/index/send_message/" method="post" role="form">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-white" id="subject" placeholder="Your Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-white" id="exampleInputEmail2" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control form-control-white" placeholder="Write Something" required></textarea>
                            </div>
                            <input type="submit" class="btn btn-o-white" value="Say Hello">
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div><!-- #contact -->


    <div class="content-block" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">&copy; TabiLogn Since 2023</div>
                <div class="col-xs-6 text-right">Theme by <a href="https://themewagon.com/" target="_blank">ThemeWagon</a></div>
            </div>
        </div>
    </div><!-- #footer -->
</div><!--/#wrapper-->

<script src="/assets/js/jquery-2.2.4.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/jquery.actual-1.0.19.min.js"></script>
<script src="/assets/js/jquery.scrollTo-1.4.14.min.js"></script>
<script src="/assets/js/script.js"></script>

</body>
</html>
