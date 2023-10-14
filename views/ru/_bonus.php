<?php require_once(ROOT . "/views/" . LANG . "/layouts/_header_cabinet.php"); ?>

<div class="dt-content">
    <script>
        if(typeof lang === 'undefined') lang = {};lang['left'] = 'Осталось';
    </script>
    <div class="dt-page__header">
        <h1 class="dt-page__title">
            Ежедневный бонус
        </h1>
    </div>
    <div class="row">
        <div class="col-xl-4 col-md-5">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card taxi-card2 mb-5">
                        <div class="card-content">
                            <div class="card-body lottery-winner text-center">
                                <img class="bonus-img" src="public/account/assets/images/other/bonus.png">
                                <h3 class="greeting-text cong text-center lottery-title">
                                    Ежедневный бонус
                                </h3>
                                <p class="fw-300 desc">
                                    Сегодня бонус получили <?=Vars::getCountBonusDay()?> человек
                                </p>
                                <?php if (!$bonus_avialable): ?>
                                    <h3 class="ideas_goto">
                                        <a>
                                            <font color="#333333">Следующий бонус Вы сможете забрать через 24 часа!</font>
                                        </a>
                                    </h3>
                                <?php else : ?>
                                    <form action="" method="POST">
                                        <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">
                                        <button class="btn btn-primary btn-sm new-btn glow" type="submit" name="bonus">Получить бонус</button>
                                    </form>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card overflow-hidden table-color-card mb-5">
                        <div class="card-header bg-transparent table-color-header">
                            <h3 class="card-title">
                                Шансы на бонус
                            </h3>
                            <h5 class="card-subtitle mb-0">
                                От <?=$this->config['min_bonus']?> до <?=$this->config['max_bonus']?> рублей
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-md-7">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-12 bonus-stat">
                    <div class="dt-card taxi-card taxi-about-stat-box bonus-new-stat mt-0 mb-5">
                        <div class="dt-card__body p-0">
                            <div class="media">
                                <i class="icon icon-time dt-icon-bg-big bg-primary text-primary m-r-20"></i>
                                <div class="media-body">
                                    <div class="trending-section">
                                        <span class="value h2 taxi-info-sum"><?=Vars::getCountBonusDay()?></span>
                                    </div>
                                    <p class="mb-0 taxi-info-desc">
                                        Бонусов сегодня
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-12 bonus-stat">
                    <div class="dt-card taxi-card taxi-about-stat-box bonus-new-stat mt-0 mb-5">
                        <div class="dt-card__body p-0">
                            <div class="media">
                                <i class="icon icon-task-manager dt-icon-bg-big bg-info text-info m-r-20"></i>
                                <div class="media-body">
                                    <div class="trending-section">
                                        <span class="value h2 taxi-info-sum"><?=Vars::getCountBonus()?></span>
                                    </div>
                                    <p class="mb-0 taxi-info-desc">
                                        Выдано бонусов
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card overflow-hidden table-color-card">
                <div class="card-header bg-transparent table-color-header">
                    <h3 class="card-title">
                        Последние 25 бонусов
                    </h3>
                    <h5 class="card-subtitle mb-0">
                        Последние 25 человек получившие бонус
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive table-color">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase" scope="col">
                                    Логин пользователя
                                </th>
                                <th class="text-uppercase" scope="col">
                                    Дата получения
                                </th>
                                <th class="text-uppercase" scope="col">
                                    Сумма бонуса
                                </th>
                            </tr>
                            </thead>
                            <tbody id="bonus-table">
                            <?php foreach ($last_bonuses as $bonus) : ?>

                                <tr>
                                    <td><?= $bonus['user']; ?></td>
                                    <td><?= date("d/m/Y в H:i", $bonus['date_add']); ?></td>
                                    <td><?= $bonus['sum']; ?> руб.</td>
                                </tr>

                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once(ROOT . "/views/" . LANG . "/layouts/_footer_cabinet.php"); ?>
