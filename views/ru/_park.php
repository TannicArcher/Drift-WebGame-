<?php require_once(ROOT . "/views/" . LANG . "/layouts/_header_cabinet.php"); ?>

    <div class="dt-content">
        <script>if (typeof lang === 'undefined') lang = {};
            lang['rub'] = 'руб.';
            lang['income-hour'] = 'Доход за час';
            lang['income-day'] = 'Доход за сутки';
            lang['income-week'] = 'Доход за неделю';
            lang['income-month'] = 'Доход за месяц';
            lang['earned-car'] = 'Заработано машиной';
            lang['lifetime'] = 'Срок жизни';
            lang['days'] = 'дней';
            lang['buy-date'] = 'Дата покупки';
            lang['empty'] = 'отсутствует';</script>
        <div class="dt-page__header"><h1 class="dt-page__title">Таксопарк</h1></div>
        <div class="row">
            <div class="col-xl-4 col-sm-12 col-taxi-1 order-lg-1">
                <div class="dt-card overflow-hidden taxi-about-box">
                    <div class="dt-card__body game-balance-box">
                        <div class="text-center">
                            <img class="game-img mb-5" src="public\account\assets\images\other\taxi.png">
                            <div class="dt-card__heading"><h3 class="dt-card__title fw-500">
                                    <i class="icon icon-revenue mr-2 icon-xl"></i><span class="align-bottom">Баланс Таксопарка:</span>
                                </h3></div>
                            <div class="align-items-baseline text-center m-t-10">
                                <span class="display-3 text-dark game-balance"><span id="bls" data-game-balance="<?= sprintf("%.8f", $this->user_data['money_k']); ?>"><?= sprintf("%.8f", $this->user_data['money_k']); ?></span> р.</span>
                            </div>
                            <h3 class="dt-card__title m-t-5">
                                <span class="text-custom-primary taxi-speed"><i class="fas fa-tachometer-alt mr-2"></i><span data-taxi-total-hour-speed="<?= sprintf("%.8f", $this->user_data['speed']); ?>"><?= sprintf("%.4f", $this->user_data['speed']); ?></span> р. / час </span>
                            </h3>

                            <?php if ($this->user_data['money_k'] < 0.01) : ?>

                                <p class="text-muted m-b-0 m-t-15">
                                    <code class="carserrorbox">Снять деньги с кассы можно как только накопится хотя бы
                                        0.01 руб!</code>
                                </p>

                            <?php else : ?>

                                <form action="" method="post">
                                    <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">
                                    <button type="submit" name="swap" class="btn btn-primary new-btn m-t-20">
                                        <i class="fa fa-money"></i> Собрать прибыль
                                    </button>
                                </form>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-12 col-taxi-2">
                <div class="row">
                    <div class="col-12">
                        <div class="dt-card taxi-about-box">
                            <div class="dt-card__body taxi-about-card">
                                <div class="row">
                                    <div class="col-xl-12 taxi-about-card-body d-flex align-items-center">
                                        <div class="taxi-flex-container">
                                            <h3 class="game-about-title">
                                                О таксопарке
                                                <a href="helpcenter.html" class="align-items-center about-video"><i class="icon icon-play-circle-o mr-2"></i>Смотреть
                                                    видео</a>
                                            </h3>
                                            <p class="game-about">Таксопарк - это начало вашего пути в
                                                проекте. Сразу после регистрации, для максимально быстрого
                                                знакомства с проектом Вы получаете свое первое такси -
                                                «<?= Vars::getRegBonus(); ?>». </p>
                                            <p class="game-about">Каждая машина зарабатывает фиксированную
                                                сумму за каждый час работы. Всего для покупки в Таксопарке
                                                доступны <?= Vars::getCountPlans(); ?> авто, у каждого разная цена,
                                                скорость и
                                                окупаемость.</p>
                                            <p class="game-about about-last-p"><i class="fal fa-info"></i>Вы
                                                можете купить любую машину неограниченное количество раз.
                                                Срок работы у всех авто 180 дней с момента покупки, по
                                                истечению этого срока авто перестает приносить прибыль и
                                                удаляется из списка.</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="dt-card taxi-about-stat-box">
                            <div class="dt-card__body p-0">
                                <div class="media">
                                    <i class="icon icon-dashboard2 dt-icon-bg-big bg-primary text-primary m-r-20"></i>
                                    <div class="media-body">
                                        <div class="trending-section"><span class="value h2 taxi-info-sum"><div style="display:inline" data-taxi-total-hour="<?= sprintf("%.4f", $this->user_data['speed']); ?>"><?= sprintf("%.4f", $this->user_data['speed']); ?></div> <span>руб.</span></span>
                                        </div>
                                        <p class="mb-0 taxi-info-desc">Скорость в час</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="dt-card taxi-about-stat-box">
                            <div class="dt-card__body p-0">
                                <div class="media">
                                    <i class="icon icon-double-check-circle dt-icon-bg-big bg-dark text-dark m-r-20"></i>
                                    <div class="media-body">
                                        <div class="trending-section">
                                            <span class="value h2 taxi-info-sum w-100"><div style="display:inline" data-taxi-bonus="0"><?= $this->user_data['day'] + $this->user_data['week'] + $this->user_data['month'] + $this->user_data['year']; ?></div>% <span><a href="/leaders" class="bonus-link">подробнее</a></span></span>
                                        </div>
                                        <p class="mb-0 taxi-info-desc">Бонус к скорости</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="dt-card taxi-new-list-card mb-5">
                    <div class="dt-card__body p-0">
                        <div class="dt-entry__header mb-6">
                            <div class="dt-card__heading">
                                <h3 class="dt-entry__title">Авто в таксопарке (<span data-taxi="count"><?= $user_stat['deps_count']; ?></span>)</h3>
                            </div>
                        </div>
                        <div class="w-100 ps-custom-scrollbar ps ps--active-x" style="padding: 0px 20px;">
                            <ul class="dt-list dt-list-xxl dt-list-bordered flex-nowrap" data-path="list">
                                <?php foreach ($deposits as $deposit) : ?>
                                    <li class="dt-list__item text-center col">
                                        <div class="dt-avatar-wrapper flex-column">
                                            <a class="tl-img" data-placement="bottom" tabindex="0" data-trigger="focus" role="button" data-toggle="popover" title="<?= $plans[$deposit['plan']]['name']; ?>" data-html="true" data-content="<b>Дата покупки:</b> <?= date("d.m.Y в H:i", $deposit['date_add']) ?>">
                                                <img src="/public/account/assets/images/items/taxi-<?= $deposit['plan']; ?>.png" class="mb-3 taxi-list-img">
                                            </a>
                                            <div class="dt-avatar-info">
                                                <span class="dt-avatar-name mb-1 text-nowrap taxi-list-name"><?= $plans[$deposit['plan']]['name']; ?></span>
                                                <span class="f-12 tl-date" data-toggle="tooltip" data-placement="bottom" data-original-title="Дата покупки"><?= date("d.m.Y", $deposit['date_add']) ?></span>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-sm-8">

            <?php foreach ($plans as $plan) : ?>
                <div class="col-xl-4 col-sm-6">
                    <div class="card taxi-itemcard">
                        <h4 class="card-header">
                            <div class="card-title text-center"><?= $plan['name']; ?></div>
                        </h4>
                        <div class="card-body">
                            <img src="/public/account/assets/images/items/taxi-<?= $plan['id']; ?>.png" class="game-img">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <div class="flex-1 media">
                                            <i class="icon icon-dashboard2 dt-icon-bg bg-primary text-primary m-r-20"></i>
                                            <div class="media-body">
                                                <h4 class="mb-1"><?= sprintf("%.4f", $plan['perc']); ?>
                                                    <span>руб.</span>
                                                </h4><span class="media-desc">Скорость в час</span></div>
                                        </div>
                                        <a href="#" data-toggle="modal" data-target="#taxi-feature"><i class="icon icon-arrow-right icon-xl"></i></a>
                                    </div>
                                    <div class="dt-indicator-item__info items-bar" data-fill="100" data-max="100">
                                        <div class="dt-indicator-item__bar">
                                            <div class="dt-indicator-item__fill bg-primary"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <div class="flex-1 media">
                                            <i class="icon icon-revenue2 dt-icon-bg bg-dark text-dark m-r-20"></i>
                                            <div class="media-body">
                                                <h4 class="mb-1">
                                                    <?= round($plan['inh']); ?>% <span>в мес.</span>
                                                </h4>
                                                <span class="media-desc">Окупаемость</span></div>
                                        </div>
                                        <a href="#" data-toggle="modal" data-target="#taxi-feature"><i class="icon icon-arrow-right icon-xl"></i></a>
                                    </div>
                                    <div class="dt-indicator-item__info items-bar" data-fill="<?= round($plan['inh']); ?>" data-max="100">
                                        <div class="dt-indicator-item__bar">
                                            <div class="dt-indicator-item__fill bg-dark"></div>
                                        </div>
                                    </div>
                                </div>
                                <? if ($plan['col_limit'] != 0) : ?>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="flex-1 media">
                                                <h5 class="profileinfoh5 text-danger">Доступно для покупки:
                                                    <span><?= $plan['col_activated']; ?>/<?= $plan['col_limit']; ?> шт.</span>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                <? endif; ?>
                                <div class="col-xl-12 game-buy-1">
                                    <form action="" method="POST">
                                        <input type="hidden" name="plan" value="<?= $plan['id']; ?>">
                                        <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">
                                        <button type="submit" name="buy" class="btn btn-primary btn-block btn-sm">
                                            <i class="mdi mdi-cart"></i> Купить машину (<?= $plan['price']; ?>
                                            ₽)
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:void(0)" class="btn btn-light btn-block rounded-0 text-uppercase" data-toggle="modal" data-target="#taxi-feature">
                            Все характеристики
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="modal fade" id="taxi-feature" tabindex="-1" role="dialog" aria-labelledby="modal-feature" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="modal-feature">Характеристики авто</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card modal-card m-b-0">
                            <div class="card-header card-nav border-bottom-0 border-top">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h3 class="dt-card__title car-header">Таблица доходности</h3></div>
                                <ul class="card-header-tabs nav nav-tabs nav-tabs-sm nav-scroll mx-0" role="tablist">
                                    <li class="nav-item game-modal-nav">
                                        <a class="nav-link active" data-toggle="tab" href="#profit-cars" role="tab" aria-controls="profit-cars" aria-selected="true">Автомобили</a>
                                    </li>
                                    <li class="nav-item game-modal-nav">
                                        <a class="nav-link" href="/calc" target="_blank">Калькулятор прибыли</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div id="profit-cars" class="tab-pane active">
                                    <div class="card-body p-0">
                                        <div class="table-responsive profit-table">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                <tr>
                                                    <th class="text-left" scope="col">Наименование</th>
                                                    <th class="" scope="col">Раздел</th>
                                                    <th class="" scope="col">Цена</th>
                                                    <th class="" scope="col">Окупаемость</th>
                                                    <th class="" scope="col">В час</th>
                                                    <th class="" scope="col">В сутки</th>
                                                    <th class="" scope="col">В неделю</th>
                                                    <th class="" scope="col">В месяц</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="text-left">
                                                        <img src="/public/account/assets/images/items/taxi-1.png">
                                                        Hyundai Solaris
                                                    </td>
                                                    <td>Таксопарк</td>
                                                    <td>10 руб.</td>
                                                    <td>20% в мес.</td>
                                                    <td>0.0027 <span>руб.</span></td>
                                                    <td>0.0666 <span>руб.</span></td>
                                                    <td>0.4666 <span>руб.</span></td>
                                                    <td>2 <span>руб.</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                        <img src="/public/account/assets/images/items/taxi-2.png">
                                                        Skoda Octavia
                                                    </td>
                                                    <td>Таксопарк</td>
                                                    <td>99 руб.</td>
                                                    <td>26% в мес.</td>
                                                    <td>0.0357 <span>руб.</span></td>
                                                    <td>0.858 <span>руб.</span></td>
                                                    <td>6.006 <span>руб.</span></td>
                                                    <td>25.74 <span>руб.</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                        <img src="/public/account/assets/images/items/taxi-3.png">
                                                        Toyota Camry
                                                    </td>
                                                    <td>Таксопарк</td>
                                                    <td>299 руб.</td>
                                                    <td>28% в мес.</td>
                                                    <td>0.1162 <span>руб.</span></td>
                                                    <td>2.7906 <span>руб.</span></td>
                                                    <td>19.5346 <span>руб.</span></td>
                                                    <td>83.72 <span>руб.</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                        <img src="/public/account/assets/images/items/taxi-4.png">
                                                        BMW 520i
                                                    </td>
                                                    <td>Таксопарк</td>
                                                    <td>699 руб.</td>
                                                    <td>30% в мес.</td>
                                                    <td>0.2912 <span>руб.</span></td>
                                                    <td>6.99 <span>руб.</span></td>
                                                    <td>48.93 <span>руб.</span></td>
                                                    <td>209.7 <span>руб.</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                        <img src="/public/account/assets/images/items/taxi-5.png">
                                                        Porsche Panamera
                                                    </td>
                                                    <td>Таксопарк</td>
                                                    <td>1 490 руб.</td>
                                                    <td>31% в мес.</td>
                                                    <td>0.6415 <span>руб.</span></td>
                                                    <td>15.3966 <span>руб.</span></td>
                                                    <td>107.7766 <span>руб.</span></td>
                                                    <td>461.9 <span>руб.</span></td>
                                                </tr>

                                                <tr>
                                                    <td class="text-left">
                                                        <img src="/public/account/assets/images/items/taxi-6.png">
                                                        Mercedes Maybach
                                                    </td>
                                                    <td>Таксопарк</td>
                                                    <td>6 990 руб.</td>
                                                    <td>32% в мес.</td>
                                                    <td>3.1066 <span>руб.</span></td>
                                                    <td>74.56 <span>руб.</span></td>
                                                    <td>521.92 <span>руб.</span></td>
                                                    <td>2 236.8 <span>руб.</span></td>
                                                </tr>

<!--                                                <tr>-->
<!--                                                    <td class="text-left">-->
<!--                                                        <img src="/public/account/assets/images/items/carsharing-5.png">-->
<!--                                                        Audi RS7-->
<!--                                                    </td>-->
<!--                                                    <td>Каршеринг</td>-->
<!--                                                    <td>3 990 руб.</td>-->
<!--                                                    <td>31,5% в мес.</td>-->
<!--                                                    <td>1.7456 <span>руб.</span></td>-->
<!--                                                    <td>41.895 <span>руб.</span></td>-->
<!--                                                    <td>293.265 <span>руб.</span></td>-->
<!--                                                    <td>1 256.85 <span>руб.</span></td>-->
<!--                                                </tr>-->
<!--                                                <tr>-->
<!--                                                    <td class="text-left">-->
<!--                                                        <img src="/public/account/assets/images/items/carsharing-4.png">-->
<!--                                                        Mercedes E class-->
<!--                                                    </td>-->
<!--                                                    <td>Каршеринг</td>-->
<!--                                                    <td>999 руб.</td>-->
<!--                                                    <td>30,5% в мес.</td>-->
<!--                                                    <td>0.4231 <span>руб.</span></td>-->
<!--                                                    <td>10.1565 <span>руб.</span></td>-->
<!--                                                    <td>71.0955 <span>руб.</span></td>-->
<!--                                                    <td>304.69 <span>руб.</span></td>-->
<!--                                                </tr>-->
<!--                                                <tr>-->
<!--                                                    <td class="text-left">-->
<!--                                                        <img src="/public/account/assets/images/items/carsharing-2.png">-->
<!--                                                        Audi A3-->
<!--                                                    </td>-->
<!--                                                    <td>Каршеринг</td>-->
<!--                                                    <td>149 руб.</td>-->
<!--                                                    <td>27% в мес.</td>-->
<!--                                                    <td>0.0558 <span>руб.</span></td>-->
<!--                                                    <td>1.341 <span>руб.</span></td>-->
<!--                                                    <td>9.387 <span>руб.</span></td>-->
<!--                                                    <td>40.23 <span>руб.</span></td>-->
<!--                                                </tr>-->
<!--                                                <tr>-->
<!--                                                    <td class="text-left">-->
<!--                                                        <img src="/public/account/assets/images/items/carsharing-1.png">-->
<!--                                                        Volkswagen Polo-->
<!--                                                    </td>-->
<!--                                                    <td>Каршеринг</td>-->
<!--                                                    <td>49 руб.</td>-->
<!--                                                    <td>25% в мес.</td>-->
<!--                                                    <td>0.017 <span>руб.</span></td>-->
<!--                                                    <td>0.4083 <span>руб.</span></td>-->
<!--                                                    <td>2.8583 <span>руб.</span></td>-->
<!--                                                    <td>12.25 <span>руб.</span></td>-->
<!--                                                </tr>-->
<!--                                                <tr>-->
<!--                                                    <td class="text-left">-->
<!--                                                        <img src="/public/account/assets/images/items/carsharing-6.png">-->
<!--                                                        Bentley Mulsanne-->
<!--                                                    </td>-->
<!--                                                    <td>Каршеринг</td>-->
<!--                                                    <td>9 990 руб.</td>-->
<!--                                                    <td>32,5% в мес.</td>-->
<!--                                                    <td>4.5093 <span>руб.</span></td>-->
<!--                                                    <td>108.225 <span>руб.</span></td>-->
<!--                                                    <td>757.575 <span>руб.</span></td>-->
<!--                                                    <td>3 246.75 <span>руб.</span></td>-->
<!--                                                </tr>-->
<!--                                                <tr>-->
<!--                                                    <td class="text-left">-->
<!--                                                        <img src="/public/account/assets/images/items/carsharing-3.png">-->
<!--                                                        BMW 320i-->
<!--                                                    </td>-->
<!--                                                    <td>Каршеринг</td>-->
<!--                                                    <td>499 руб.</td>-->
<!--                                                    <td>29% в мес.</td>-->
<!--                                                    <td>0.2009 <span>руб.</span></td>-->
<!--                                                    <td>4.8236 <span>руб.</span></td>-->
<!--                                                    <td>33.7656 <span>руб.</span></td>-->
<!--                                                    <td>144.71 <span>руб.</span></td>-->
<!--                                                </tr>-->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function funcSuccessgetBallance(error) {
            var result = JSON.parse(error);
            var balance = parseFloat(result).toFixed(8);
            $('#bls').html(balance);
        }

        function getBallance() {
            setInterval(function () {
                $.ajax({
                    url: '/ajax/balance',
                    type: 'POST',
                    data: {type: 'ajax'},
                    dataType: 'html',
                    success: funcSuccessgetBallance
                })
            }, 1000)
        }

        getBallance();
    </script>

<?php require_once(ROOT . "/views/" . LANG . "/layouts/_footer_cabinet.php"); ?>