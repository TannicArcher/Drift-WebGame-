<!DOCTYPE html>
<html class="wide wow-animation" lang="ru">
<head>
    <title><?=$_title; ?> | <?=NAME; ?></title>

    <meta content="<?=NAME; ?> - это не просто экономическая игра с выводом денег, а целый сервис, в котором Вы сможете хорошо провести свое время и заработать." name="description">
    <meta charset="utf-8">
    <meta content="width=device-width, height=device-height, initial-scale=1.0" name="viewport">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <link href="/public/index\images\favicon.ico" rel="icon" type="image/x-icon">
    <link href="/public/index\css\bootstrap.min.css" rel="stylesheet">
    <link href="/public/index\css\style.min.css" rel="stylesheet">
    <link href="/public/index\css\fonts.min.css" rel="stylesheet">
    <link href="/public/account\assets\fonts\noir-pro\styles.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ac19895ea3.js">
    </script>
    <style>
        .ie-panel{display:none;background:#212121;padding:10px 0;box-shadow:3px 3px 5px 0 rgba(0,0,0,.3);clear:both;text-align:center;position:relative;z-index:1}html.ie-10 .ie-panel,html.lt-ie-10 .ie-panel{display:block}
    </style>
</head>
<body>
<div class="ie-panel">
    <a href="http://windows.microsoft.com/en-US/internet-explorer/"><img alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." height="42" src="/public/index/images/ie8-panel/warning_bar_0000_us.jpg" width="820"></a>
</div>
<div class="page-loader">
    <div class="preloader-wrapper preloader-big active">
        <div class="spinner-layer spinner-blue">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div>
            <div class="gap-patch">
                <div class="circle"></div>
            </div>
            <div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>
        <div class="spinner-layer spinner-red">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div>
            <div class="gap-patch">
                <div class="circle"></div>
            </div>
            <div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>
        <div class="spinner-layer spinner-yellow">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div>
            <div class="gap-patch">
                <div class="circle"></div>
            </div>
            <div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>
        <div class="spinner-layer spinner-green">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div>
            <div class="gap-patch">
                <div class="circle"></div>
            </div>
            <div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>
    </div>
</div>

<div class="page">
    <header class="section page-header breadcrumbs-custom-wrap bg-gradient bg-secondary-2">
        <div class="rd-navbar-wrap rd-navbar-default">
            <nav class="rd-navbar" data-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-lg-stick-up-offset="1px" data-md-layout="rd-navbar-fixed" data-md-stick-up-offset="1px" data-sm-layout="rd-navbar-fixed" data-sm-stick-up-offset="1px" data-stick-up="true" data-stick-up-offset="1px" data-xl-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xl-stick-up-offset="1px" data-xxl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-stick-up-offset="1px" data-xxx-lstick-up-offset="1px" data-xxxl-device-layout="rd-navbar-static" data-xxxl-layout="rd-navbar-static">
                <div class="rd-navbar-inner">
                    <div class="rd-navbar-panel">
                        <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                        <div class="rd-navbar-brand">
                            <a class="brand-name" href="/"><img alt="" class="logo-inverse" height="51" src="/public/index/images/logo-dark.png" width="130"></a>
                        </div>
                    </div>
                    <div class="rd-navbar-aside-right">
                        <div class="rd-navbar-nav-wrap">
                            <ul class="rd-navbar-nav">
                                <li class="rd-nav-item">
                                    <a class="rd-nav-link" href="/">Главная</a>
                                </li>
                                <li class="rd-nav-item">
                                    <a class="rd-nav-link" href="/marketing">Маркетинг</a>
                                </li>
                                <li class="rd-nav-item">
                                    <a class="rd-nav-link" href="/contests">Конкурсы</a>
                                </li>
                                <li class="rd-nav-item">
                                    <a class="rd-nav-link" href="/payouts">Выплаты</a>
                                </li>
                                <li class="rd-nav-item">
                                    <a class="rd-nav-link" href="/reviews">Отзывы</a>
                                </li>
                                <li class="rd-nav-item">
                                    <a class="rd-nav-link" href="/help">Поддержка</a>
                                </li>

                                <?php if (!$this->usid) : ?>
                                    <li class="rd-nav-item reg-link">
                                        <a class="rd-nav-link" href="/signup"><i class="fas fa-user-plus"></i> Регистрация</a>
                                    </li>
                                    <li class="rd-nav-item reg-link">
                                        <a class="rd-nav-link" href="/login"><i class="fas fa-home"></i> Вход в аккаунт</a>
                                    </li>
                                <?php else : ?>
                                    <li class="rd-nav-item reg-link">
                                        <a class="rd-nav-link" href="/cabinet"><i class="fas fas fa-user-cowboy"></i> Кабинет пользователя</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="rd-navbar-aside-right-inner">

                            <?php if (!$this->usid) : ?>
                                <div class="rd-navbar-shop">
                                    <a class="rd-navbar-shop-icon fas fa-home" href="/login"><span>ВХОД</span></a>
                                </div>
                                <div class="rd-navbar-shop">
                                    <a class="rd-navbar-shop-icon fas fa-user-plus" href="/signup"><span>РЕГИСТРАЦИЯ</span></a>
                                </div>
                            <?php else : ?>
                                <div class="rd-navbar-shop">
                                    <a class="rd-navbar-shop-icon fas fa-user-cowboy" href="/cabinet" aria-hidden="true"><span>КАБИНЕТ ПОЛЬЗОВАТЕЛЯ</span></a>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <section class="breadcrumbs-custom breadcrumbs-custom-svg">
            <div class="container">
                <p class="heading-1 breadcrumbs-custom-title other-title">
                    <?=$_title; ?>
                </p>
            </div>
            <div class="parallax-scene-js parallax-scene" data-scalar-x="5" data-scalar-y="10" style="transform: translate3d(0px, 0px, 0px); transform-style: preserve-3d; backface-visibility: hidden;">
                <div class="layer-01">
                    <div class="layer" data-depth="0.25" style="transform: translate3d(-8.12609e-27px, -1.35532e-27px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: relative; display: block; left: 0px; top: 0px;">
                        <img alt="" height="133" src="/public/index/images/parallax-scene-01-132x133.png" width="132">
                    </div>
                </div>
                <div class="layer-02">
                    <div class="layer" data-depth=".55" style="transform: translate3d(-1.78774e-26px, -2.9817e-27px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: absolute; display: block; left: 0px; top: 0px;">
                        <img alt="" height="208" src="/public/index/images/parallax-scene-02-186x208.png" width="186">
                    </div>
                </div>
                <div class="layer-03">
                    <div class="layer" data-depth="0.1" style="transform: translate3d(-3.25044e-27px, -5.42127e-28px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: absolute; display: block; left: 0px; top: 0px;">
                        <img alt="" height="120" src="/public/index/images/parallax-scene-03-108x120.png" width="108">
                    </div>
                </div>
                <div class="layer-04">
                    <div class="layer" data-depth="0.25" style="transform: translate3d(-8.12609e-27px, -1.35532e-27px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: absolute; display: block; left: 0px; top: 0px;">
                        <img alt="" height="145" src="/public/index/images/parallax-scene-04-124x145.png" width="124">
                    </div>
                </div>
                <div class="layer-05">
                    <div class="layer" data-depth="0.15" style="transform: translate3d(-4.87565e-27px, -8.13191e-28px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: absolute; display: block; left: 0px; top: 0px;">
                        <img alt="" height="101" src="/public/index/images/parallax-scene-05-100x101.png" width="100">
                    </div>
                </div>
                <div class="layer-06">
                    <div class="layer" data-depth="0.65" style="transform: translate3d(-2.11278e-26px, -3.52383e-27px, 0px); transform-style: preserve-3d; backface-visibility: hidden; position: absolute; display: block; left: 0px; top: 0px;">
                        <img alt="" height="243" src="/public/index/images/parallax-scene-06-240x243.png" width="180">
                    </div>
                </div>
            </div>
        </section>
    </header>
