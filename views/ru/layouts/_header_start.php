<!DOCTYPE html>
<html class="wide wow-animation" lang="ru">
<head>
    <title><?=NAME; ?> - <?=$_title; ?></title>

    <meta content="<?=NAME; ?> - это не просто экономическая игра с выводом денег, а целый сервис, в котором Вы сможете хорошо провести свое время и заработать." name="description">
    <meta charset="utf-8">
    <meta content="width=device-width, height=device-height, initial-scale=1.0" name="viewport">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <link href="/public/index/images/favicon.ico" rel="icon" type="image/x-icon">
    <link href="/public/index/css/bootstrap.min.css" rel="stylesheet">
    <link href="/public/index/css/style.min.css" rel="stylesheet">
    <link href="/public/index/css/fonts.min.css" rel="stylesheet">
    <link href="/public/account/assets/fonts/noir-pro/styles.css" rel="stylesheet">
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
                                <li class="rd-nav-item active">
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

        <section class="breadcrumbs-custom-svg text-center">
            <div class="swiper-container swiper-slider swiper-slider_height-1 swiper-main" data-autoplay="5500" data-loop="false" data-simulate-touch="false" data-slide-effect="fade">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" data-slide-bg="">
                        <div class="swiper-slide-caption">
                            <div class="container-wide swiper-main-section">
                                <div class="row justify-content-sm-center">
                                    <div class="col-md-10 col-xl-7 index-new-left">
                                        <p class="breadcrumbs-custom-subtitle" data-caption-animate="fxRotateInUp" data-caption-delay="550">
                                            экономическая игра с выводом денег
                                        </p>
                                        <p class="heading-1 breadcrumbs-custom-title" data-caption-animate="blurIn" data-caption-delay="50">
                                            <?=NAME; ?>
                                        </p>
                                        <p class="heading-2" data-caption-animate="fxRotateInDown" data-caption-delay="550">
                                            Стань владельцем собственной автоимперии
                                        </p>
                                        <div class="group-md button-group d-none">
                                            <a class="button btn-header button-nina button-lg" data-caption-animate="fxRotateInDown" data-caption-delay="550" href="/singup">Быстрая регистрация</a> <a class="button btn-header button-nina button-lg" data-caption-animate="fxRotateInDown" data-caption-delay="550" href="/login">Вход в аккаунт</a>
                                        </div>
                                        <div class="row row-0 justify-content-sm-center text-center">
                                            <div class="col-12">
                                                <div class="index-new-stat-border"></div>
                                            </div>
                                            <script>
                                                if (typeof global === 'undefined') global = {};
                                                if (typeof global['stat'] === 'undefined') global['stat'] = {};
                                                if (typeof global['stat']['labels'] === 'undefined') global['stat']['labels'] = [];
                                                if (typeof global['stat']['inout'] === 'undefined') global['stat']['inout'] = {};
                                                if (typeof global['stat']['inout']['fill'] === 'undefined') global['stat']['inout']['fill'] = [];
                                                if (typeof global['stat']['inout']['payout'] === 'undefined') global['stat']['inout']['payout'] = [];

                                                global.stat.labels.push('x');
                                                global.stat.inout.fill.push('data1');
                                                global.stat.inout.payout.push('data2');
                                                global.stat.labels.push('2020-04-23');
                                                global.stat.inout.fill.push('13457160');
                                                global.stat.inout.payout.push('4487188');
                                                global.stat.labels.push('2020-04-24');
                                                global.stat.inout.fill.push('13631807');
                                                global.stat.inout.payout.push('4564780');
                                                global.stat.labels.push('2020-04-25');
                                                global.stat.inout.fill.push('13820120');
                                                global.stat.inout.payout.push('4659985');
                                                global.stat.labels.push('2020-04-26');
                                                global.stat.inout.fill.push('14018505');
                                                global.stat.inout.payout.push('4767003');
                                                global.stat.labels.push('2020-04-27');
                                                global.stat.inout.fill.push('14238319');
                                                global.stat.inout.payout.push('4879971');
                                                global.stat.labels.push('2020-04-28');
                                                global.stat.inout.fill.push('14451945');
                                                global.stat.inout.payout.push('4964519');
                                                global.stat.labels.push('2020-04-29');
                                                global.stat.inout.fill.push('14656900');
                                                global.stat.inout.payout.push('5057737');
                                                global.stat.labels.push('2020-04-30');
                                                global.stat.inout.fill.push('14656900');
                                                global.stat.inout.payout.push('5057737');
                                            </script>
                                            <div class="col-6 col-md-4 col-lg-3 col-xl-3 index-new-stat-1">
                                                <div class="counter-wrap">
                                                    <span class="icon novi-icon icon-secondary far fa-piggy-bank"></span>
                                                    <div class="heading-3">
                                                        <span class="counter counter-sum" data-step="3000"><?= sprintf("%.2f", $stats['all_insert']); ?></span> <span class="counter-desc">руб.</span>
                                                    </div>
                                                    <p>
                                                        Резерв проекта
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-lg-3 col-xl-2 index-new-stat-2">
                                                <div class="counter-wrap">
                                                    <span class="icon novi-icon icon-secondary far fa-users"></span>
                                                    <div class="heading-3">
                                                        <span class="counter counter-sum" data-step="3000"><?= $stats['all_users']; ?></span> <span class="counter-desc">чел.</span>
                                                    </div>
                                                    <p>
                                                        Пользователей
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-lg-3 col-xl-3 index-new-stat-1">
                                                <div class="counter-wrap">
                                                    <span class="icon novi-icon icon-secondary far fa-calendar-alt"></span>
                                                    <div class="heading-3">
                                                        <span class="counter counter-sum" data-step="3000"><?=$stats['days_work']?></span> <span class="counter-desc">дня</span>
                                                    </div>
                                                    <p>
                                                        Время работы
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 index-new-right">
                                        <div class="form-request form-request-modern">
                                            <h4 class="index-new-reg">
                                                Быстрая регистрация
                                            </h4>
                                            <hr class="divider divider-left divider-default modal-hr">
                                            <script>
                                                if(typeof global === 'undefined') global = {};global['salt'] = 'fa55db850a3ef6574aa3d93b87a122dd';

                                                function onSubmit(token) {
                                                    document.getElementById("signup").submit();
                                                }
                                            </script>
                                            <form id='demo-form' action="/signup" method="POST" class="rd-mailform" id="signup">
                                                <input type="hidden" id="signup_tocken" name="_tocken" value="<?=Session::$tocken; ?>">

                                                <div class="row row-20">
                                                    <div class="col-sm-12">
                                                        <div class="form-wrap form-wrap-inline">
                                                            <input autocomplete="off" class="form-input" id="forms-login" maxlength="20" name="reg_login" id="signup_login" required="" type="text"> <label class="form-label rd-input-label" for="forms-login">Введите Логин</label> <i aria-hidden="true" class="fal fa-info-square form-info"><span class="tooltiptext">Логин дожен состоять из 3-20 символов</span></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-wrap form-wrap-inline">
                                                            <input autocomplete="off" class="form-input" id="forms-email" maxlength="128" name="reg_email" id="signup_email" required="" type="email"> <label class="form-label rd-input-label" for="forms-email">Введите E-mail</label> <i aria-hidden="true" class="fal fa-info-square form-info"><span class="tooltiptext">Введите существующий E-mail адрес для восстановления пароля в случае его утраты</span></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-wrap form-wrap-inline">
                                                            <input autocomplete="off" class="form-input" id="forms-pass" name="reg_pass" id="signup_pass" required="" type="password"> <label class="form-label rd-input-label" for="forms-pass">Введите Пароль</label> <i aria-hidden="true" class="fal fa-info-square form-info"><span class="tooltiptext">Пароль должен содержать 5-30 символов</span></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-wrap form-wrap-inline">
                                                            <input autocomplete="off" class="form-input" id="forms-repass" name="reg_re_pass" id="signup_repass" required="" type="password"> <label class="form-label rd-input-label" for="forms-repass">Повторите Пароль</label> <i aria-hidden="true" class="fal fa-info-square form-info"><span class="tooltiptext">Введите свой пароль еще раз</span></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-wrap form-button m-t-20">
                                                    <button class="button button-block button-secondary button-nina btn-sm index-new-reg-btn" type="submit">Создать аккаунт</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="parallax-scene-js parallax-scene" data-scalar-x="5" data-scalar-y="10">
                <div class="layer-01">
                    <div class="layer" data-depth="0.25">
                        <img alt="" height="133" src="/public/index/images/parallax-scene-01-132x133.png" width="132">
                    </div>
                </div>
                <div class="layer-02">
                    <div class="layer" data-depth=".55">
                        <img alt="" height="208" src="/public/index/images/parallax-scene-02-186x208.png" width="186">
                    </div>
                </div>
                <div class="layer-03">
                    <div class="layer" data-depth="0.1">
                        <img alt="" height="120" src="/public/index/images/parallax-scene-03-108x120.png" width="108">
                    </div>
                </div>
                <div class="layer-04">
                    <div class="layer" data-depth="0.25">
                        <img alt="" height="145" src="/public/index/images/parallax-scene-04-124x145.png" width="124">
                    </div>
                </div>
                <div class="layer-05">
                    <div class="layer" data-depth="0.15">
                        <img alt="" height="101" src="/public/index/images/parallax-scene-05-100x101.png" width="100">
                    </div>
                </div>
                <div class="layer-06">
                    <div class="layer" data-depth="0.65">
                        <img alt="" height="243" src="/public/index/images/parallax-scene-06-240x243.png" width="240">
                    </div>
                </div>
            </div>
        </section>
    </header>
