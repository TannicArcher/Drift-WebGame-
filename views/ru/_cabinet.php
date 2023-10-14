<?php require_once(ROOT . "/views/" . LANG . "/layouts/_header_cabinet.php"); ?>


    <div class="dt-content">
        <script>
            if (typeof lang === "undefined") lang = {};
            lang["rub"] = "руб.";
            lang["speed-hour"] = "Скорость в час";
            lang["confirm-email"] = "Подтверждение E-mail";
            lang["confirm-email-mod"] = "Введите E-mail адрес на который будет отправлено письмо со ссылкой для его подтверждения";
            lang["enter-email"] = "ВВЕДИТЕ E-MAIL";
            lang["send"] = "Отправить";
            lang["close"] = "Закрыть";
        </script>
        <div class="dt-page__header">
            <h1 class="dt-page__title">
                Кабинет пользователя
            </h1>
        </div>
        <div class="row">
            <script>
                if (typeof global === 'undefined') global = {};
            </script>
            <div class="col-xl-4 order-xl-0 order-2">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="dt-card dt-card-performance index-info-card mb-5">
                            <div class="dt-card__header bg-primary text-white">
                                <div class="dt-card__heading"></div>
                                <div class="dt-card__tools">
                                    <a class="d-inline-block text-white" href="/settings"><i class="icon icon-settings icon-lg icon-fw"></i></a>
                                </div>
                            </div>
                            <div class="dt-card__body text-center">
                                <img class="dt-avatar user-avatar size-90 index-avatar" src="/public/account/assets/images/avatars/avatar-none.png">
                                <div class="dt-avatar-info mb-4 d-block">
                                    <h4 class="h2 dt-avatar-name mb-1">
                                        <?=$this->user_data['user']; ?>
                                    </h4>
                                    <span class="d-block desc">Пользователь</span>
                                </div>
                                <div class="d-inline-block mr-2">
                                    <div class="trending-section justify-content-center text-primary">
                                        <span class="value h2 sum"><?= sprintf("%.2f", $this->user_data['insert_sum']); ?> <span>руб.</span></span>
                                    </div>
                                    <p class="mb-0 f-12 desc">Пополнено</p>
                                </div>
                                <div class="d-inline-block">
                                    <div class="trending-section justify-content-center text-primary">
                                        <span class="value h2 sum"><?= sprintf("%.2f", $this->user_data['payment_sum']); ?> <span>руб.</span></span>
                                    </div>
                                    <p class="mb-0 f-12 desc">Выплачено</p>
                                </div>
                            </div>
                            <div class="index-second-block">
                                <ul class="dt-list flex-column profile-info">
                                    <li class="dt-list__item">
                                        <div class="d-flex align-items-center">
                                            <span class="mr-1 link-site"><i class="fas fa-user-tag"></i>Логин</span>
                                            <span class="ml-auto"><?=$this->user_data['user']; ?></span>
                                        </div>
                                    </li>
                                    <li class="dt-list__item">
                                        <div class="d-flex align-items-center">
                                            <span class="mr-1 link-site"><i class="fas fa-passport"></i>ID в системе</span>
                                            <span class="ml-auto">#<?=$this->user_data['id']; ?></span>
                                        </div>
                                    </li>
                                    <li class="dt-list__item">
                                        <div class="d-flex align-items-center">
                                            <span class="mr-1 link-site"><i class="fas fa-head-side"></i>Меня пригласил</span>
                                            <span class="ml-auto"><span class="empty"><?= ($this->user_data['referer1']) ? $this->user_data['referer1'] : 'сам пришёл'; ?></span></span>
                                        </div>
                                    </li>
                                    <li class="dt-list__item">
                                        <div class="d-flex align-items-center">
                                            <span class="mr-1 link-site"><i class="fas fa-clock"></i>Время на проекте</span>
                                            <span class="ml-auto"><?= $this->user_data['days']; ?> дней</span>
                                        </div>
                                    </li>
                                </ul>
                                <div class="profile-info-separator"></div>
                                <ul class="dt-list flex-column profile-info">
                                    <li class="dt-list__item">
                                        <div class="d-flex align-items-center">
                                            <span class="mr-1 link-site"><i class="fas fa-mouse-pointer"></i>Клики в сёрфинге</span>
                                            <span class="ml-auto"><?= $this->user_data['serf_clicks']; ?> кл.</span>
                                        </div>
                                    </li>
                                    <li class="dt-list__item">
                                        <div class="d-flex align-items-center">
                                            <span class="mr-1 link-site"><i class="fas fa-sack-dollar"></i>Доход с рефералов</span>
                                            <span class="ml-auto"><?= sprintf("%.2f", $this->user_data['from_referals1'] + $this->user_data['from_referals2'] + $this->user_data['from_referals3'] + $this->user_data['from_referals4'] + $this->user_data['from_referals5']); ?> руб.</span>
                                        </div>
                                    </li>
                                    <li class="dt-list__item">
                                        <div class="d-flex align-items-center">
                                            <span class="mr-1 link-site"><i class="fas fa-user-alt"></i>Количество рефералов</span>
                                            <span class="ml-auto"><?= $this->user_data['count_ref1'] + $this->user_data['count_ref2'] + $this->user_data['count_ref3'] + $this->user_data['count_ref4'] + $this->user_data['count_ref5']; ?> шт.</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="row">
                    <div class="col-md-4 col-6">
                        <div class="dt-card index-balance-card mb-5">
                            <div class="dt-card__body index-balance-body">
                                <a class="index-balance-link" href="/insert"><span class="badge badge-primary badge-top-right">Пополнить</span></a>
                                <div class="media">
                                    <i class="icon icon-orders-new icon-4x mr-xl-4 mr-3 align-self-center account-new-icon"></i>
                                    <div class="media-body">
                                        <p class="mb-1 sum">
                                            <?=sprintf("%.2f", $this->user_data['money_b']); ?> руб.
                                        </p><span class="d-block desc">Баланс для покупок</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <div class="dt-card index-balance-card mb-5">
                            <div class="dt-card__body index-balance-body">
                                <a class="index-balance-link" href="/payment"><span class="badge badge-primary badge-top-right">Выплатить</span></a>
                                <div class="media">
                                    <i class="icon icon-revenue icon-4x mr-xl-4 mr-3 align-self-center account-new-icon"></i>
                                    <div class="media-body">
                                        <p class="mb-1 sum">
                                            <?=sprintf("%.2f", $this->user_data['money_p']); ?> руб.
                                        </p><span class="d-block desc">Баланс для выплат</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="dt-card index-balance-card mb-5">
                            <div class="dt-card__body index-balance-body">
                                <a class="index-balance-link" href="/insertserfing"><span class="badge badge-primary badge-top-right">Пополнить</span></a>
                                <div class="media">
                                    <i class="icon icon-megaphone icon-4x mr-xl-4 mr-3 align-self-center account-new-icon"></i>
                                    <div class="media-body">
                                        <p class="mb-1 sum">
                                            <?=sprintf("%.2f", $this->user_data['money_r']); ?> руб.
                                        </p><span class="d-block desc">Баланс для рекламы</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dt-card dt-chart overflow-hidden mb-5 index-card">
                    <div class="dt-card__body index-chart-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-7 dt-entry__header">
                                    <div class="dt-card__heading">
                                        <h3 class="dt-entry__title">
                                            График скорости аккаунта
                                        </h3>
                                    </div>
                                </div>
                                <canvas height="120" id="index-taxi-chart"></canvas>
                                <script>
                                    if (typeof global === 'undefined') global = {};
                                    if (typeof global['taxigraph'] === 'undefined') global['taxigraph'] = {};
                                    if (typeof global['taxigraph']['labels'] === 'undefined') global['taxigraph']['labels'] = [];
                                    if (typeof global['taxigraph']['data'] === 'undefined') global['taxigraph']['data'] = [];
                                </script>
                                <script>
                                    global.taxigraph.labels.push(<?=date('d.m')?>);
                                    global.taxigraph.data.push(<?= sprintf("%.4f", $this->user_data['speed']); ?>);
                                    global.taxigraph.labels.push(<?=date('d.m')?>);
                                    global.taxigraph.data.push(<?= sprintf("%.4f", $this->user_data['speed']); ?>);
                                    global.taxigraph.labels.push(<?=date('d.m')?>);
                                    global.taxigraph.data.push(<?= sprintf("%.4f", $this->user_data['speed']); ?>);
                                    global.taxigraph.labels.push(<?=date('d.m')?>);
                                    global.taxigraph.data.push(<?= sprintf("%.4f", $this->user_data['speed']); ?>);
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="dt-card dt-chart overflow-hidden mb-5 index-card">
                            <div class="dt-card__body index-chart-body">
                                <div class="mb-5 dt-entry__header">
                                    <div class="dt-card__heading">
                                        <h3 class="dt-entry__title">
                                            Авто в аккаунте
                                        </h3>
                                    </div>
                                </div>
                                <div class="w-100 ps-custom-scrollbar ps ps--active-x" style="padding: 0px 20px;">
                                    <ul class="dt-list dt-list-xxl dt-list-bordered flex-nowrap index-car-list">
                                        <?php foreach ($deposits as $deposit) : ?>

                                            <li class="dt-list__item text-center col">
                                                <div class="dt-avatar-wrapper flex-column">
                                                    <img class="mb-3" src="/public/account/assets/images/items/taxi-<?= $deposit['plan']; ?>.png">
                                                    <div class="dt-avatar-info">
                                                        <span class="dt-avatar-name mb-1 text-nowrap fw-500 taxi-list-name f-13"><?= $plans[$deposit['plan']]['name']; ?></span>
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
            </div>
        </div>
    </div>


<?php require_once(ROOT . "/views/" . LANG . "/layouts/_footer_cabinet.php"); ?>
