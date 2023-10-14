<?php require_once(ROOT . "/views/" . LANG . "/layouts/_header_cabinet.php"); ?>

    <div class="dt-content">
        <script>
            if(typeof lang === 'undefined') lang = {};lang['copy-bufer'] = 'Ссылка скопирована в буфер обмена';lang['refs'] = 'Рефералы';
        </script>
        <div class="dt-page__header">
            <h1 class="dt-page__title">
                Партнерская программа
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-8">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="dt-card taxi-card mt-0 mb-5 taxi-about-stat-box partner-stat-box">
                            <div class="dt-card__body p-0">
                                <div class="media">
                                    <i class="icon icon-revenue dt-icon-bg-big bg-primary text-primary m-r-20"></i>
                                    <div class="media-body">
                                        <div class="trending-section">
                                            <span class="value h2 taxi-info-sum"><?= sprintf("%.2f", $this->user_data['from_referals1'] + $this->user_data['from_referals2'] + $this->user_data['from_referals3'] + $this->user_data['from_referals4'] + $this->user_data['from_referals5']); ?> <span>руб.</span></span>
                                        </div>
                                        <p class="mb-0 taxi-info-desc">
                                            Доход с рефералов
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="dt-card taxi-card mt-0 mb-5 taxi-about-stat-box partner-stat-box">
                            <div class="dt-card__body p-0">
                                <div class="media">
                                    <i class="icon icon-users dt-icon-bg-big bg-dark text-dark m-r-20"></i>
                                    <div class="media-body">
                                        <div class="trending-section">
                                            <span class="value h2 taxi-info-sum"><?= $this->user_data['count_ref1'] + $this->user_data['count_ref2'] + $this->user_data['count_ref3'] + $this->user_data['count_ref4'] + $this->user_data['count_ref5']; ?> <span>чел.</span></span>
                                        </div>
                                        <p class="mb-0 taxi-info-desc">
                                            Кол-во рефералов
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="dt-card taxi-card mt-0 mb-5 taxi-about-stat-box partner-stat-box">
                            <div class="dt-card__body p-0">
                                <div class="media">
                                    <i class="icon icon-users dt-icon-bg-big bg-dark text-dark m-r-20"></i>
                                    <div class="media-body">
                                        <div class="trending-section">
                                            <span class="value h2 taxi-info-sum"><?=$referer?></span>
                                        </div>
                                        <p class="mb-0 taxi-info-desc">
                                            Ваш Upline
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="dt-card taxi-card mb-5 mt-0">
                            <div class="dt-card__body partner-card-2 partner-link-card">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="partner-label m-t-0">
                                            Ваша реферальная ссылка:
                                        </div>
                                        <div class="input-group mb-0">
                                            <input class="form-control partner-link" readonly="readonly" type="text" value="<?= $ref_link; ?>">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" type="button"><i class="fas fa-copy"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="dt-card taxi-card mb-5">
                            <div class="dt-card__body partner-card-2">
                                <h3 class="game-about-title m-b-20">
                                    Описание партнерской программы
                                </h3>
                                <p class="game-about">
                                    Партнерская программа — это основной способ заработка без инвестиций. Приглашайте своих друзей и знакомых в проект через свои реферальные ссылки и получайте доход!
                                </p>
                                <p class="game-about mb-0">
                                    С каждого зарегистрировавшегося пользователя через реферальную ссылку Вы будете получать вознаграждение за определенные действия которые он будет совершать.
                                </p>
                                <h3 class="game-about-title m-b-20 m-t-25">
                                    Перечень вознаграждений
                                </h3>
                                <?php for ($i = 1; $i <= $this->config['ref_lvls']; $i++) : ?>
                                    <div class="partner-pays">
                                        <i class="far fa-long-arrow-alt-right"></i><span class="badge badge-primary mr-1"><?= $this->config['ref' . $i]; ?> %</span> от суммы пополнения реферала <?= $i; ?> уровня
                                    </div>
                                <?php endfor; ?>
                                <span class="badge badge-primary partner-badge">Все вознаграждения зачисляются на баланс «для выплат»</span>
                                <p class="game-about about-last-p">
                                    <i aria-hidden="true" class="fal fa-info"></i>Строго запрещено самостоятельно регистрировать аккаунты по собственной реферальной ссылке с целью получения дополнительной выгоды. Нарушение карается блокировкой.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-xl-12 col-md-6">
                        <div class="dt-card partner-card mb-5">
                            <div class="card-header bg-transparent table-color-header">
                                <h3 class="card-title">
                                    Подробная статистика
                                </h3>
                                <h5 class="card-subtitle mb-0">
                                    Расширенная реферальная статистика
                                </h5>
                            </div>
                            <?php for ($i = 1; $i <= $this->config['ref_lvls']; $i++) : ?>
                                <div class="dt-card__body pb-0 pt-0">
                                    <div class="media border-bottom align-items-center py-5">
                                        <div class="media-body">
                                            <div class="dt-widget__title fw-500">
                                                Общий доход с рефералов <?= $i; ?> ур.
                                            </div>
                                            <div class="dt-widget__subtitle partner-stat-count">
                                                <i class="far fa-users"></i><?= $this->user_data['count_ref' . $i]; ?> рефералов
                                            </div>
                                        </div>
                                        <span class="d-block min-w-60 text-center ml-2"><span class="d-block partner-stat-sum"><?= sprintf("%.2f", $this->user_data['from_referals' . $i]); ?> <span>руб.</span></span></span>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once(ROOT . "/views/" . LANG . "/layouts/_footer_cabinet.php"); ?>