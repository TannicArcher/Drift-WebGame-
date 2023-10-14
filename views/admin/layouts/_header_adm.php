<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Админка</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/assetsAdmin/images/favicon.ico">

    <!--Morris Chart-->
    <link rel="stylesheet" href="/assets/assetsAdmin/libs/morris-js/morris.css"/>

    <!-- App css -->
    <link href="/assets/assetsAdmin/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />
    <link href="/assets/assetsAdmin/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/assetsAdmin/css/app.min.css" rel="stylesheet" type="text/css"/>

</head>

<body>

<!-- Begin page -->
<div id="wrapper">

    <!-- Topbar Start -->
    <div class="navbar-custom">
        <ul class="list-unstyled topnav-menu float-right mb-0">

            <li class="d-none d-sm-block">
                <form class="app-search" action="/admin/users/search" method="post">
                    <div class="app-search-box">
                        <div class="input-group">
                            <input type="text" name="user" class="form-control" placeholder="Поиск пользователя по логину">
                            <div class="input-group-append">
                                <button class="btn" type="submit">
                                    <i class="fe-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </li>

            <li class="notification-list">
                <a class="nav-link waves-effect" href="/admin/handlepayments" role="link">
                    <i class="fe-bell noti-icon"></i>
                    <span class="badge badge-danger rounded-circle noti-icon-badge"><?=$this->newpayments; ?></span>
                </a>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="/assets/assetsAdmin/images/users/user-1.jpg" alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ml-1">
                                Admin <i class="mdi mdi-chevron-down"></i>
                            </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="/cabinet" class="dropdown-item notify-item">
                        <i class="fe-log-in"></i>
                        <span>В кабинет</span>
                    </a>

                    <!-- item-->
                    <a href="/" class="dropdown-item notify-item">
                        <i class="fe-home"></i>
                        <span>На сайт</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="/admin/settings/account" class="dropdown-item notify-item">
                        <i class="fe-lock"></i>
                        <span>Смена пароля</span>
                    </a>
                    <a href="/admin/exit" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </li>


        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="/admin/stats class=" class="logo text-center">
               <span class="logo-lg">
                   <h2 class="text-success">Farm Engine</h2>
               </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile disable-btn waves-effect">
                    <i class="fe-menu"></i>
                </button>
            </li>

            <li>
                <h4 class="page-title-main">Dashboard</h4>
            </li>

            <li class="nav-item">
                <a class="nav-link">Серверное время: <?=date("d.m.Y H:i", time()); ?></a>
            </li>

            <li class="nav-item">
                <a class="nav-link">Серверный часовой пояс: <?=date("O"); ?></a>
            </li>

        </ul>
    </div>
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">

        <div class="slimscroll-menu">

            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul class="metismenu" id="side-menu">

                    <li class="menu-title">Generals</li>
                    <li>
                        <a href="/admin/handlepayments">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span class="badge badge-warning float-right"><?=$this->newpayments; ?></span>
                            <span> Заявки на выплаты</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/users">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span> Список пользователей </span>
                        </a>
                    </li>
<!--                    <li>-->
<!--                        <a href="/admin/multy">-->
<!--                            <i class="mdi mdi-view-dashboard"></i>-->
<!--                            <span> Мультиаккаунты </span>-->
<!--                        </a>-->
<!--                    </li>-->

                    <li class="menu-title">Statistic</li>
                    <li>
                        <a href="/admin/stats">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span> Статистика </span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/inserts">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span> История пополнений </span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/payments">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span> История выплат </span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/deposits">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span> История покупок </span>
                        </a>
                    </li>


                    <li class="menu-title">Other</li>
                    <li>
                        <a href="/admin/feedback/new">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span class="badge badge-warning float-right"><?=$this->newfeedbacks; ?></span>
                            <span> Отзывы  </span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/serfing/new">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span class="badge badge-warning float-right"><?=$this->newserfings; ?></span>
                            <span> Серфинг </span>
                        </a>
                    </li>

                    <li class="menu-title">Additional earnings</li>
                    <li>
                        <a href="/admin/competition/invest">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span> Конкурсы </span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/leaders">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span> Гонка лидеров </span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/lottery">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span> Лотерея </span>
                        </a>
                    </li>

                    <li class="menu-title">Settings</li>
                    <li>
                        <a href="/admin/settings">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span> Общие настройки </span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/plans">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span> Настройки планов </span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/paysystems">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span> Настройки платёжек </span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/serfingplans">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span> Настройки серфинга </span>
                        </a>
                    </li>




                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
