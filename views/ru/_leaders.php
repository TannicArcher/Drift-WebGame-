<?php require_once(ROOT . "/views/" . LANG . "/layouts/_header_cabinet.php"); ?>

<div class="dt-content">
    <div class="profile__banner">
        <div class="profile__banner-detail">
            <div class="dt-page__header">
                <h1 class="dt-page__title" style="color:#fff;">
                    Гонка лидеров
                </h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="dt-card taxi-card mb-5">
                <div class="dt-card__body leader-about-box">
                    <div class="media mb-5">
                        <img class="img-fluid mr-4 size-60" src="/public/account/assets/images/other/leader-img.png">
                        <div class="media-body align-self-center">
                            <div class="h2 mb-1 leader-new-title">
                                Ваш бонус: <?= $this->user_data['day'] + $this->user_data['week'] + $this->user_data['month'] + $this->user_data['year']; ?>%
                            </div>
                            <span class="d-block leader-new-about">Обновление данных происходит раз в час.</span>
                        </div>
                    </div>
                    <p class="game-about mb-0">
                        Гонка лидеров разделена на 4 разнообразные категорий, Вы можете стать лидером в любой из них, либо в нескольких категориях сразу. Вы будете занимать позицию в списке лидеров и получать бонус к скорости заработка до тех пор, пока другие участники не опередят Вас.
                    </p>
                    <p class="game-about about-last-p text-dark">
                        <i aria-hidden="true" class="fal fa-info"></i>Бонус к скорости применяется одновременно для всех автомобилей. Все бонусы суммируются, это значит что Вы можете одновременно получать бонус являясь лидером сразу в нескольких категориях, вплоть до 100% к скорости в сумме.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="elementor-element elementor-element-3362570 tcd-animation-slide-top tcd-tabs-style2 tcd-tabs-v-left elementor-widget elementor-widget-ute-tabs" data-element_type="widget" data-id="3362570" data-widget_type="ute-tabs.default">
                <div class="elementor-widget-container">
                    <div class="tcd-tabs-panel">
                        <div class="row">
                            <div class="col-xl-3">
                                <ul class="nav nav-tabs">
                                    <li class="tab-nav-item active" data-target="tab-day">
                                        <i aria-hidden="true" class="fas fa-calendar-alt"></i> <span>Лидеры за 24 часа</span>
                                    </li>
                                    <li class="tab-nav-item" data-target="tab-week">
                                        <i aria-hidden="true" class="fas fa-calendar-alt"></i> <span>Лидеры за 7 дней</span>
                                    </li>
                                    <li class="tab-nav-item" data-target="tab-mounth">
                                        <i aria-hidden="true" class="fas fa-calendar-alt"></i> <span>Лидеры за 30 дней</span>
                                    </li>
                                    <li class="tab-nav-item" data-target="tab-year">
                                        <i aria-hidden="true" class="fas fa-calendar-alt"></i> <span>Лидеры за 365 дней</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xl-9">
                                <div class="tab-content">
                                    <div class="tab-pane tab-day active" style="display: block;">
                                        <div class="dt-card taxi-card mb-5">
                                            <div class="dt-card__body leader-about-box">
                                                <div class="media">
                                                    <img class="img-fluid mr-7 leader-new-img" src="/public/account/assets/images/other/leader-24.png">
                                                    <div class="media-body align-self-center">
                                                        <p class="game-about mb-0">
                                                            Пять «Лидеров за 24 часа», которые пополнили свой баланс «для покупок» на наибольшую сумму в течение 24 часов получают % бонуса к своей скорости заработка.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12 mb-4">
                                                <div class="dt-card taxi-about-stat-box leader-time">
                                                    <div class="dt-card__body p-0">
                                                        <div class="media">
                                                            <div class="media-body">
                                                                <div class="trending-section">
                                                                    <span class="value h2 leader-new-info-sum"></span>
                                                                    <div style="display:inline">
                                                                        <span class="value h2 leader-new-info-sum"><?=date("d/m/Y в H:i", $leads['0']['next_date']); ?></span>
                                                                    </div>
                                                                </div>
                                                                <p class="mb-0 taxi-info-desc">
                                                                    Следующий период
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dt-card taxi-card mb-5">
                                            <div class="dt-card__body leader-about-box p-0">
                                                <div class="table-responsive">
                                                    <table class="table mb-0 table-fluid leader-table leader-daily">
                                                        <thead>
                                                        <tr>
                                                            <th class="text-left" scope="col">
                                                                Логин пользователя
                                                            </th>
                                                            <th scope="col">
                                                                Сумма пополнений
                                                            </th>
                                                            <th scope="col">
                                                                Бонус
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php if (isset($leads['0']['users'])) : ?>
                                                            <?php foreach ($leads['0']['users'] as $user) : ?>
                                                                <tr>
                                                                    <td>
                                                                        <a><i class="far fa-user-circle"></i><?=$user['user']; ?></a>
                                                                    </td>
                                                                    <td>
                                                                        <?=$user['amount']; ?> <span>руб.</span>
                                                                    </td>
                                                                    <td>
                                                                        <?php if (isset($user['place'])) : ?>
                                                                        +<?=$leads['0'][$user['place']."m"]; ?>%
                                                                        <?php endif; ?>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane tab-week" style="display: none;">
                                        <div class="dt-card taxi-card mb-5">
                                            <div class="dt-card__body leader-about-box">
                                                <div class="media">
                                                    <img class="img-fluid mr-7 leader-new-img" src="/public/account/assets/images/other/leader-7.png">
                                                    <div class="media-body align-self-center">
                                                        <p class="game-about mb-0">
                                                            Пять «Лидеров за 7 дней», которые пополнили свой баланс «для покупок» на наибольшую сумму в течение недели получают % бонуса к своей скорости заработка.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="dt-card taxi-about-stat-box leader-time mb-4">
                                                    <div class="dt-card__body p-0">
                                                        <div class="media">
                                                            <div class="media-body">
                                                                <div class="trending-section">
                                                                    <span class="value h2 leader-new-info-sum"></span>
                                                                    <div style="display:inline">
                                                                        <span class="value h2 leader-new-info-sum"><?=date("d/m/Y в H:i", $leads['1']['next_date']); ?></span>
                                                                    </div>
                                                                </div>
                                                                <p class="mb-0 taxi-info-desc">
                                                                    Следующий период
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dt-card taxi-card mb-5">
                                            <div class="dt-card__body leader-about-box p-0">
                                                <div class="table-responsive">
                                                    <table class="table mb-0 table-fluid leader-table leader-daily">
                                                        <thead>
                                                        <tr>
                                                            <th class="text-left" scope="col">
                                                                Логин пользователя
                                                            </th>
                                                            <th scope="col">
                                                                Сумма пополнений
                                                            </th>
                                                            <th scope="col">
                                                                Бонус
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php if (isset($leads['1']['users'])) : ?>
                                                            <?php foreach ($leads['1']['users'] as $user) : ?>
                                                                <tr>
                                                                    <td>
                                                                        <a><i class="far fa-user-circle"></i><?=$user['user']; ?></a>
                                                                    </td>
                                                                    <td>
                                                                        <?=$user['amount']; ?> <span>руб.</span>
                                                                    </td>
                                                                    <td>
                                                                        <?php if (isset($user['place'])) : ?>
                                                                            +<?=$leads['1'][$user['place']."m"]; ?>%
                                                                        <?php endif; ?>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane tab-mounth" style="display: none;">
                                        <div class="dt-card taxi-card mb-5">
                                            <div class="dt-card__body leader-about-box">
                                                <div class="media">
                                                    <img class="img-fluid mr-7 leader-new-img" src="/public/account/assets/images/other/leader-30.png">
                                                    <div class="media-body align-self-center">
                                                        <p class="game-about mb-0">
                                                            Пять «Лидеров за 30 дней», которые пополнили свой баланс «для покупок» на наибольшую сумму в течение месяца получают от 1 до 10% бонуса к своей скорости заработка в разделах «Таксопарк» и «Каршеринг».
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12 mb-4">
                                                <div class="dt-card taxi-about-stat-box leader-time">
                                                    <div class="dt-card__body p-0">
                                                        <div class="media">
                                                            <div class="media-body">
                                                                <div class="trending-section">
                                                                    <span class="value h2 leader-new-info-sum"></span>
                                                                    <div style="display:inline">
                                                                        <span class="value h2 leader-new-info-sum"><?=date("d/m/Y в H:i", $leads['2']['next_date']); ?></span>
                                                                    </div>
                                                                </div>
                                                                <p class="mb-0 taxi-info-desc">
                                                                    Следующий период
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dt-card taxi-card mb-5">
                                            <div class="dt-card__body leader-about-box p-0">
                                                <div class="table-responsive">
                                                    <table class="table mb-0 table-fluid leader-table leader-daily">
                                                        <thead>
                                                        <tr>
                                                            <th class="text-left" scope="col">
                                                                Логин пользователя
                                                            </th>
                                                            <th scope="col">
                                                                Сумма пополнений
                                                            </th>
                                                            <th scope="col">
                                                                Бонус
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php if (isset($leads['2']['users'])) : ?>
                                                            <?php foreach ($leads['2']['users'] as $user) : ?>
                                                                <tr>
                                                                    <td>
                                                                        <a><i class="far fa-user-circle"></i><?=$user['user']; ?></a>
                                                                    </td>
                                                                    <td>
                                                                        <?=$user['amount']; ?> <span>руб.</span>
                                                                    </td>
                                                                    <td>
                                                                        <?php if (isset($user['place'])) : ?>
                                                                            +<?=$leads['2'][$user['place']."m"]; ?>%
                                                                        <?php endif; ?>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane tab-year" style="display: none;">
                                        <div class="dt-card taxi-card mb-5">
                                            <div class="dt-card__body leader-about-box">
                                                <div class="media">
                                                    <img class="img-fluid mr-7 leader-new-img" src="/public/account/assets/images/other/leader-365.png">
                                                    <div class="media-body align-self-center">
                                                        <p class="game-about mb-0">
                                                            Пять «Лидеров за 365 дней», которые пополнили свой баланс «для покупок» на наибольшую сумму в течение этого года получают от 1 до 10% бонуса к своей скорости заработка в разделах «Таксопарк» и «Каршеринг».
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12 mb-4">
                                                <div class="dt-card taxi-about-stat-box leader-time">
                                                    <div class="dt-card__body p-0">
                                                        <div class="media">
                                                            <div class="media-body">
                                                                <div class="trending-section">
                                                                    <span class="value h2 leader-new-info-sum"></span>
                                                                    <div style="display:inline">
                                                                        <span class="value h2 leader-new-info-sum"><?=date("d/m/Y в H:i", $leads['3']['next_date']); ?></span>
                                                                    </div>
                                                                </div>
                                                                <p class="mb-0 taxi-info-desc">
                                                                    Следующий период
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dt-card taxi-card mb-5">
                                            <div class="dt-card__body leader-about-box p-0">
                                                <div class="table-responsive">
                                                    <table class="table mb-0 table-fluid leader-table leader-daily">
                                                        <thead>
                                                        <tr>
                                                            <th class="text-left" scope="col">
                                                                Логин пользователя
                                                            </th>
                                                            <th scope="col">
                                                                Сумма пополнений
                                                            </th>
                                                            <th scope="col">
                                                                Бонус
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php if (isset($leads['3']['users'])) : ?>
                                                            <?php foreach ($leads['3']['users'] as $user) : ?>
                                                                <tr>
                                                                    <td>
                                                                        <a><i class="far fa-user-circle"></i><?=$user['user']; ?></a>
                                                                    </td>
                                                                    <td>
                                                                        <?=$user['amount']; ?> <span>руб.</span>
                                                                    </td>
                                                                    <td>
                                                                        <?php if (isset($user['place'])) : ?>
                                                                            +<?=$leads['3'][$user['place']."m"]; ?>%
                                                                        <?php endif; ?>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
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
        </div>
    </div>
</div>

<?php require_once(ROOT . "/views/" . LANG . "/layouts/_footer_cabinet.php"); ?>
