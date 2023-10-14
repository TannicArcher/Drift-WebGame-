
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta content="Ваш личный аккаунт в проекте Drift" name="description">
    <title><?=NAME; ?> - <?=$_title; ?></title>
    <link href="/public/account/assets/images/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="/public/account/assets/fonts/noir-pro/styles.css" rel="stylesheet">
    <link href="/public/account/vendors/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="/public/account/vendors/gaxon-icon/styles.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ac19895ea3.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700&display=swap&subset=cyrillic" rel="stylesheet">
    <link href="/public/account/vendors/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="/public/account/vendors/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="/public/account/assets/css/style.min.css" rel="stylesheet">
    <link href="/public/account/assets/css/media.css" rel="stylesheet">
</head>
<body class="dt-layout--full-width">

<div class="dt-loader-container">
    <div class="dt-loader">
        <svg class="circular" viewbox="25 25 50 50">
            <circle class="path" cx="50" cy="50" fill="none" r="20" stroke-miterlimit="10" stroke-width="2"></circle>
        </svg>
    </div>
</div>


<div class="dt-root">
    <div class="dt-root__inner">
        <div class="dt-topbar">
            <div class="dt-container">
                <div class="dt-topbar__inner">
                    <div class="d-flex align-items-center text-truncate mr-2">
                        <i class="far fa-rss"></i>
                        <span class="text-truncate">Теперь у нас есть <a class="sublink" href="https://tlg.name/driftchat" target="_blank">ЧАТ в Telegram</a>, присоединяйтесь!</span>
                    </div>
                    <ul class="dt-list dt-list-xl dt-list-bordered text-uppercase">
                        <li class="dt-list__item">
                            <a class="dt-list__link" href="https://vk.com/driftbiz" target="_blank">
                                <i class="fab fa-vk"></i>
                                Мы в ВКонтакте</a>
                        </li>
                        <li class="dt-list__item">
                            <a class="dt-list__link" href="https://tlg.name/driftbiz" target="_blank">
                                <i class="fab fa-telegram-plane"></i>
                                Мы в Telegram</a>
                        </li>
                        <li class="dt-list__item">
                            <a class="dt-list__link" href="https://tlg.name/driftchat" target="_blank">
                                <i class="fas fa-comments-alt"></i>
                                Telegram ЧАТ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <header class="dt-header">
            <div class="dt-header__container">
                <div class="dt-brand">
                    <div class="dt-brand__tool" data-toggle="main-sidebar">
                        <div class="hamburger-inner"></div>
                    </div>
                    <span class="dt-brand__logo">
                        <a class="dt-brand__logo-link" href="/">
                            <img class="dt-brand__logo-img" src="/public/account/assets/images/logo.png">
                        </a>
                    </span>
                </div>
                <div class="dt-header__toolbar">
                    <form class="search-box d-none d-lg-flex align-items-center top-menu">
                        <a class="" href="/">Главная</a>
                        <a class="" href="/marketing">Маркетинг</a>
                        <a class="contest-top" href="/contests">Конкурсы</a>
                        <a class="" href="/payouts">Выплаты</a>
                        <a class="" href="/reviews">Отзывы</a>
                        <a class="" href="/help">Поддержка</a>
                    </form>
                    <div class="dt-nav-wrapper">
                        <ul class="dt-nav top-time">
                            <li class="dt-nav__item dt-notification">
                                <div class="dt-nav__link no-arrow server-time">
                                    <span data-original-title="Серверное время (UTC+3)" data-placement="bottom" data-toggle="tooltip"><i class="fal fa-clock"></i><span id="servertime"><?=date('H:i:s')?></span></span>
                                </div>
                            </li>
                        </ul>
                        <script>
                            setInterval(function () {
                                var time = document.getElementById('servertime').innerHTML;
                                time = time.split(':');
                                var hour = parseInt(time[0]);
                                var minute = parseInt(time[1]);
                                var second = parseInt(time[2]);
                                ++second;
                                if (second >= 60) {
                                    second = 0;
                                    ++minute;
                                    if (minute >= 60) {
                                        minute = 0;
                                        ++hour;
                                        if (hour >= 24) {
                                            hour = 0;
                                        }
                                    }
                                }
                                document.getElementById('servertime').innerHTML = (hour < 10 ? "0" + hour : hour) + ":" + (minute < 10 ? "0" + minute : minute) + ":" + (second < 10 ? "0" + second : second);
                            }, 1000);
                        </script>
                        <ul class="dt-nav">
                            <li class="dt-nav__item dropdown top-user-block">
                                <a aria-expanded="false" aria-haspopup="true" class="dt-nav__link dropdown-toggle no-arrow dt-avatar-wrapper" data-toggle="dropdown" href="javascript:void(0)"><img class="dt-avatar size-30" data-prop="avatar" src="/public/account/assets/images/avatars/avatar-none.png">
                                    <span class="dt-avatar-info d-none d-sm-block"><span class="dt-avatar-name"><?=$this->user_data['user']; ?></span></span></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="dt-avatar-wrapper flex-nowrap p-3 mt-n2 bg-gradient-orange text-white rounded-top">
                                        <img class="dt-avatar" data-prop="avatar" src="/public/account/assets/images/avatars/avatar-none.png">
                                        <span class="dt-avatar-info"><span class="dt-avatar-name dt-avatar-on"><?=$this->user_data['user']; ?></span></span>
                                    </div>
                                    <a class="dropdown-item" href="/cabinet"><i class="icon icon-user icon-fw mr-2 mr-sm-1"></i>Мой
                                        кабинет</a>
                                    <a class="dropdown-item" href="/settings"><i class="icon icon-settings icon-fw mr-2 mr-sm-1"></i>Настройки</a>
                                    <a class="dropdown-item logout" ref="/exit"><i class="icon icon-logout icon-fw mr-2 mr-sm-1"></i>Выход из аккаунта</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <main class="dt-main">

            <aside class="dt-sidebar ps" id="main-sidebar">
                <div class="dt-sidebar__container">
                    <div class="menu-user-box">
                        <div class="dt-avatar-wrapper">
                            <img class="dt-avatar mr-2" data-prop="avatar" src="/public/account/assets/images/avatars/avatar-none.png">
                            <div class="dt-avatar-info">
                                <div class="dt-avatar-name text-truncate">
                                    <?=$this->user_data['user']; ?>
                                </div>
                                <span class="user-id"><a class="cursor-pointer" href="/settings"><i class="fas fa-cog"></i> Настройки</a></span>
                            </div>
                        </div>
                    </div>
                    <a href="/insert">
                        <div class="d-flex menu-balance2">
                            <span><i class="fas fa-shopping-cart mr-1"></i> Для покупок</span>
                            <span class="ml-auto" data-balance="rub-in"><?=sprintf("%.2f", $this->user_data['money_b']); ?></span>&nbsp;руб.
                        </div>
                    </a> <a href="/payment">
                        <div class="d-flex menu-balance2">
                            <span><i class="fas fa-wallet mr-1"></i> Для выплат</span>
                            <span class="ml-auto" data-balance="rub-out"><?=sprintf("%.2f", $this->user_data['money_p']); ?></span>&nbsp;руб.
                        </div>
                    </a> <a href="/insertserfing">
                        <div class="d-flex menu-balance2">
                            <span><i class="fas fa-megaphone mr-1"></i> Для рекламы</span>
                            <span class="ml-auto" data-balance="rub-adv"><?=sprintf("%.2f", $this->user_data['money_r']); ?></span>&nbsp;руб.
                        </div>
                    </a>
                    <div class="menu-reserve justify-content-center d-flex">
                        <div class="media">
                            <img class="img-fluid mr-5 size-40" src="/public/account/assets/images/other/reserve.svg">
                            <div class="media-body text-center">
                                <div class="title">
                                    Резерв для выплат:
                                </div>
                                <div class="sum">
                                    9 599 163 руб.
                                </div>
                                <a data-target="#reserve-modal" data-toggle="modal" href="javascript:void(0)">
                                    Что это такое?
                                </a>
                            </div>
                        </div>
                    </div>
                    <ul class="dt-side-nav">
                        <li class="dt-side-nav__item dt-side-nav__header">
                            <span class="dt-side-nav__text">Главное меню</span>
                        </li>
                        <li class="dt-side-nav__item">
                            <a class="dt-side-nav__link" href="/cabinet" title="Кабинет пользователя"><i aria-hidden="true" class="fas fa-tachometer-fast"></i> <span class="dt-side-nav__text">Кабинет пользователя</span></a>
                        </li>
                        <li class="dt-side-nav__item">
                            <a class="dt-side-nav__link" href="/taxi" title="Мой «Таксопарк»"><i aria-hidden="true" class="fas fa-taxi"></i> <span class="dt-side-nav__text">Мой «Таксопарк»</span> <span class="badge menu-badge" data-taxi="count"><?=$this->counters['deposits']; ?></span></a>
                        </li>
<!--                        <li class="dt-side-nav__item">-->
<!--                            <a class="dt-side-nav__link" href="/carsharing" title="Мой «Каршеринг»"><i aria-hidden="true" class="fas fa-cars"></i> <span class="dt-side-nav__text">Мой «Каршеринг»</span> <span class="badge menu-badge" data-carsharing="count">--><?//=$this->counters['deposits']; ?><!--</span></a>-->
<!--                        </li>-->
                        <li class="dt-side-nav__item">
                            <a class="dt-side-nav__link dt-side-nav__arrow" href="javascript:void(0)" title="Заработок"><i aria-hidden="true" class="fas fa-sack-dollar"></i> <span class="dt-side-nav__text">Заработок</span></a>
                            <ul class="dt-side-nav__sub-menu">
                                <li class="dt-side-nav__item">
                                    <a class="dt-side-nav__link" href="/serfing" title="Сёрфинг сайтов"><i aria-hidden="true" class="far fa-mouse-alt"></i> <span class="dt-side-nav__text">Сёрфинг сайтов</span></a>
                                </li>
                                <li class="dt-side-nav__item">
                                    <a class="dt-side-nav__link" href="/quests" title="Задания"><i aria-hidden="true" class="far fa-hammer"></i> <span class="dt-side-nav__text">Задания</span></a>
                                </li>
                                <li class="dt-side-nav__item">
                                    <a class="dt-side-nav__link" href="/lottery" title="Лотерея"><i aria-hidden="true" class="far fa-dice"></i> <span class="dt-side-nav__text">Лотерея</span></a>
                                </li>
                                <li class="dt-side-nav__item">
                                    <a class="dt-side-nav__link" href="/refking" title="Король рефералов"><i aria-hidden="true" class="far fa-calendar"></i> <span class="dt-side-nav__text">Король рефералов</span></a>
                                </li>
                                <li class="dt-side-nav__item">
                                    <a class="dt-side-nav__link" href="/bonus" title="Ежедневный бонус"><i aria-hidden="true" class="far fa-gift"></i> <span class="dt-side-nav__text">Ежедневный бонус</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="dt-side-nav__item dt-side-nav__header">
                            <span class="dt-side-nav__text">Полезное</span>
                        </li>
                        <li class="dt-side-nav__item">
                            <a class="dt-side-nav__link" href="/leaders" style="color: #bf0000;" title="Гонка лидеров"><i aria-hidden="true" class="fas fa-flag-checkered"></i> <span class="dt-side-nav__text">Гонка лидеров</span> <span class="badge menu-badge"><?= $this->user_data['day'] + $this->user_data['week'] + $this->user_data['month'] + $this->user_data['year']; ?>%</span></a>
                        </li>
                        <li class="dt-side-nav__item">
                            <a class="dt-side-nav__link" href="/stats" title="Статистика проекта"><i aria-hidden="true" class="fas fa-chart-bar"></i> <span class="dt-side-nav__text">Статистика проекта</span></a>
                        </li>
                        <li class="dt-side-nav__item dt-side-nav__header">
                            <span class="dt-side-nav__text">Операции с балансом</span>
                        </li>
                        <li class="dt-side-nav__item">
                            <a class="dt-side-nav__link" href="/insert" title="Пополнение баланса"><i aria-hidden="true" class="fas fa-inbox-in"></i> <span class="dt-side-nav__text">Пополнение баланса</span></a>
                        </li>
                        <li class="dt-side-nav__item">
                            <a class="dt-side-nav__link" href="/payment" title="Выплата заработка"><i aria-hidden="true" class="fas fa-sign-out-alt"></i> <span class="dt-side-nav__text">Выплата заработка</span></a>
                        </li>
                        <li class="dt-side-nav__item">
                            <a class="dt-side-nav__link" href="/exchange" title="Обмен баланса"><i aria-hidden="true" class="fas fa-exchange"></i> <span class="dt-side-nav__text">Обмен баланса</span></a>
                        </li>
                        <li class="dt-side-nav__item dt-side-nav__header">
                            <span class="dt-side-nav__text">Партнерский раздел</span>
                        </li>
                        <li class="dt-side-nav__item">
                            <a class="dt-side-nav__link" href="/partner" title="Партнерская программа"><i aria-hidden="true" class="fas fa-handshake"></i> <span class="dt-side-nav__text">Партнерская программа</span></a>
                        </li>
                        <li class="dt-side-nav__item">
                            <a class="dt-side-nav__link" href="/referals" title="Мои рефералы"><i aria-hidden="true" class="fas fa-users"></i> <span class="dt-side-nav__text">Мои рефералы</span> <span class="badge menu-badge"><?= $this->user_data['count_ref1'] + $this->user_data['count_ref2'] + $this->user_data['count_ref3'] + $this->user_data['count_ref4'] + $this->user_data['count_ref5']; ?> чел.</span></a>
                        </li>
                        <li class="dt-side-nav__item">
                            <a class="dt-side-nav__link" href="/promo" title="Рекламные материалы"><i aria-hidden="true" class="fas fa-images"></i> <span class="dt-side-nav__text">Рекламные материалы</span></a>
                        </li>
                        <li class="dt-side-nav__item dt-side-nav__header">
                            <span class="dt-side-nav__text">Кабинет рекламодателя</span>
                        </li>
                        <li class="dt-side-nav__item">
                            <a class="dt-side-nav__link" href="/serfing/add" title="Мои сайты в сёрфинге"><i aria-hidden="true" class="fas fa-mouse"></i> <span class="dt-side-nav__text">Мои сайты в сёрфинге</span> <span class="badge menu-badge">0</span></a>
                        </li>
                        <li class="dt-side-nav__item">
                            <a class="dt-side-nav__link" href="/insertserfing" title="Рекламный баланс"><i aria-hidden="true" class="fas fa-bullhorn"></i> <span class="dt-side-nav__text">Рекламный баланс</span></a>
                        </li>
                        <li class="dt-side-nav__item dt-side-nav__header">
                            <span class="dt-side-nav__text">Разное</span>
                        </li>
                        <li class="dt-side-nav__item">
                            <a class="dt-side-nav__link" href="/calc" title="Калькулятор прибыли"><i aria-hidden="true" class="fas fa-calculator"></i> <span class="dt-side-nav__text">Калькулятор прибыли</span></a>
                        </li>
                        <li class="dt-side-nav__item">
                            <a class="dt-side-nav__link" href="/terms" title="Правила проекта"><i aria-hidden="true" class="fas fa-clipboard-list-check"></i> <span class="dt-side-nav__text">Правила проекта</span></a>
                        </li>
                        <li class="dt-side-nav__item">
                            <a class="dt-side-nav__link" href="/help" title="Техническая поддержка"><i aria-hidden="true" class="fas fa-question-square"></i> <span class="dt-side-nav__text">Тех. поддержка</span></a>
                        </li>
                    </ul>
                </div>
            </aside>

            <div class="dt-content-wrapper">