<?php require_once(ROOT . "/views/" . LANG . "/layouts/_header_cabinet.php"); ?>

<div class="dt-content">
    <script>
        if (typeof lang === 'undefined') lang = {};
        lang['participate'] = 'Вы участвуете в лотерее';
        lang['go-participate'] = 'Участвовать в лотерее';
        lang['not-users'] = 'В лотерее пока нет участников';
        lang['results'] = 'Результаты';
        lang['active'] = 'Активная...';
        lang['empty'] = 'Отсутствует';
    </script>
    <div class="dt-page__header">
        <h1 class="dt-page__title">
            Лотерея
        </h1>
    </div>
    <script>
        if (typeof global === 'undefined') global = {};
        if (typeof global['lang'] === 'undefined') global['lang'] = {};
        global['lang']['prize'] = 'Volkswagen Polo';
        global['upd'] = '1542';
    </script>
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-8 lottery-1-card">
                    <div class="card taxi-card2">
                        <div class="card-content">
                            <div class="card-body lottery-winner">
                                <div class="taxi-flex-container">
                                    <h3 class="game-about-title">
                                        О лотерее
                                    </h3>
                                    <p class="page-about">
                                        Лотерея - это еще один способ заработать в проекте без каких-либо инвестиций.
                                        Просто примите участие в лотерее и получите шанс выиграть <b>бесплатный
                                            «<?= Competition::lotteryGetLotInfo() ?>»</b>.
                                    </p>
                                    <p class="page-about mb-0">
                                        <b>Лотерея проходит 1 раз в час.</b> Принять участие может любой пользователь
                                        проекта просто нажав кнопку «Участвовать в лотерее». В случае победы Вы получите
                                        уведомление.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 lottery-2-card">
                    <div class="card taxi-card2 d-flex align-items-center justify-content-center" data-lottery="winner">
                        <div class="card-content">
                            <div class="card-body lottery-winner">
                                <h3 class="greeting-text cong">
                                    Поздравляем <a href="profile/DartSigST.html" target="_blank"><?=$last_lott_users['user']?></a>!
                                </h3>
                                <div class="d-flex justify-content-between align-items-end">
                                    <div class="dashboard-content-left">
                                        <h1 class="font-large-2 text-bold-500 title">
                                            Приз: «<?=$last_lott_users['lott_name']?>»
                                        </h1>
                                        <p class="fw-300 desc">
                                            Стал лучшим среди всех <span data-lottery="winner-count"><?=$last_lott_users['count_users']?></span>
                                            участников прошлой лотереи
                                        </p>
                                        <button class="btn btn-primary btn-sm new-btn glow" data-target="#lottery-results" data-toggle="modal" type="button">
                                            Все победители
                                        </button>
                                    </div>
                                    <div class="dashboard-content-right">
                                        <img class="lottery-img-winner" src="/public/account/assets/images/other/lottery-cup.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 lottery-3-card">
                    <div class="card taxi-card2">
                        <div class="card-content">
                            <div class="card-body lottery-winner text-center">
                                <img class="lottery-img" src="/public/account/assets/images/other/lottery.png">
                                <h3 class="greeting-text cong text-center lottery-title">
                                    Лотерея #<span data-lottery="id"><?= $last_lott_users['id'] + 1 ?></span>
                                </h3>
                                <p class="fw-300 desc">
                                    В лотерее принимают участие <span data-lottery="users"><?= Competition::lotteryGetUsersCount(); ?></span> чел.
                                </p>
                                <form action="" method="POST">
                                    <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">
                                    <? if (!$lott_avialable): ?>
                                        <button type="button" class="btn new-btn btn-sm glow btn-dark" disabled="">
                                            Вы участвуете в лотерее
                                        </button>
                                    <? else: ?>
                                        <button class="btn btn-primary new-btn btn-sm glow" type="submit" name="user_take">
                                            Участвовать в лотерее
                                        </button>
                                    <? endif; ?>
                                </form>
                                <div class="task-modal-report-warning">
                                    Розыгрыш состоится<br>
                                    <span data-lottery="expires"><?= date("d/m/Y в H:i", $lottery_info['date_update']); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card overflow-hidden table-color-card">
                        <div class="card-header bg-transparent table-color-header">
                            <h3 class="card-title">
                                Последние 20 участников
                            </h3>
                            <h5 class="card-subtitle mb-0">
                                Последние участники лотереи #<span data-lottery="id">1977</span>
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive table-color">
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase" scope="col">
                                            Логин участника
                                        </th>
                                        <th class="text-uppercase" scope="col">
                                            Дата участия
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody data-lottery="last-users-list">
                                    <?php foreach ($curr_lott_users as $row) : ?>

                                        <tr>
                                            <td><?= $row['user']; ?></td>
                                            <td><?= date("d/m/Y в H:i", $row['add_time']); ?></td>
                                        </tr>

                                    <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card overflow-hidden table-color-card">
                        <div class="card-header bg-transparent table-color-header">
                            <h3 class="card-title">
                                Последние 20 лотерей
                            </h3>
                            <h5 class="card-subtitle mb-0">
                                Лотереи и их результаты
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive table-color">
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase" scope="col">
                                            Номер
                                        </th>
                                        <th class="text-uppercase" scope="col">
                                            Дата окончания
                                        </th>
                                        <th class="text-uppercase" scope="col">
                                            Действие
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody data-lottery="last-lottery-list">
                                    <?php foreach ($lasts_lott_users as $row) : ?>
                                        <tr>
                                            <td>#<?= $row['id'] ?></td>
                                            <td><?= date("d/m/Y в H:i", $row['date_end']); ?></td>
                                            <td><a data-target="#lottery-results" data-toggle="modal" href="javascript:void(0)">Результаты</a></td>
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
    </div>
    <div aria-hidden="true" aria-labelledby="model-lottery-results" class="modal fade" id="lottery-results" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="model-lottery-results">
                        Результаты лотереи
                    </h3>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card overflow-hidden table-color-card mb-0">
                        <div class="card-header bg-transparent table-color-header">
                            <h3 class="card-title">
                                Последние 20 лотерей
                            </h3>
                            <h5 class="card-subtitle mb-0">
                                Лотереи и их результаты
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive table-color">
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase" scope="col">
                                            Номер
                                        </th>
                                        <th class="text-uppercase" scope="col">
                                            Дата начала
                                        </th>
                                        <th class="text-uppercase" scope="col">
                                            Дата окончания
                                        </th>
                                        <th class="text-uppercase" scope="col">
                                            Кол-во участников
                                        </th>
                                        <th class="text-uppercase" scope="col">
                                            Победитель
                                        </th>
                                        <th class="text-uppercase" scope="col">
                                            Приз
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody data-lottery="last-lottery-list-details">
                                    <?php foreach ($lasts_lott_users as $row) : ?>
                                        <tr>
                                            <td>#<?= $row['id'] ?></td>
                                            <td><?= date("d/m/Y в H:i", $row['date_start']); ?></td>
                                            <td><?= date("d/m/Y в H:i", $row['date_end']); ?></td>
                                            <td><?= $row['count_users'] ?></td>
                                            <td><?= $row['user'] ?></td>
                                            <td><?= $row['lott_name'] ?></td>
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
    </div>
</div>

<?php require_once(ROOT . "/views/" . LANG . "/layouts/_footer_cabinet.php"); ?>
