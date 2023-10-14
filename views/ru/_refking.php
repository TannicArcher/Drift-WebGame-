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
            Король рефералов
        </h1>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-4 col-md-6 lottery-3-card">
                    <div class="card taxi-card2">
                        <div class="card-content">
                            <div class="card-body lottery-winner text-center">
                                <img class="lottery-img" src="/public/account/assets/images/other/lottery-cup.png">
                                <h3 class="greeting-text cong text-center lottery-title">
                                    <?=$refking_get_king?>
                                </h3>
                                <p class="fw-300 desc">
                                   /\ Текущий король /\
                                </p>
                                <p class="fw-300 desc">
                                    <b>Стоимость коронации: <?=$refking_config['buy_sum']?> рублей</b>
                                </p>
                                <form action="" method="POST">
                                    <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">
                                    <? if (!$refking_available): ?>
                                        <h3 class="text-success"><i class="fa fa-clock-o"></i> Вы являетесь королем рефералов! <i class="fa fa-clock-o"></i></h3>
                                    <? else: ?>
                                        <button class="btn btn-primary new-btn btn-sm glow" type="submit" name="yes">
                                            Стать королем
                                        </button>
                                    <? endif; ?>
                                </form>
                                <div class="task-modal-report-warning">
                                    Предыдущий король<br>
                                    <span data-lottery="expires"><?=$refking_get_last['user']?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 lottery-1-card">
                    <div class="card taxi-card2">
                        <div class="card-content">
                            <div class="card-body lottery-winner">
                                <div class="taxi-flex-container">
                                    <h3 class="game-about-title">
                                        О режиме
                                    </h3>
                                    <p class="page-about">
                                        Все же хотели почувствовать "Рефоводом" и зарабатывать неограниченное кол-во денег на своих рефералах, не вложив не копейки? Мы готовы помочь вам с этим, и предоставлять вам всех свободных рефералов проекта.
                                    </p>
                                    <p class="page-about mb-0">
                                        <b>Как это работает?</b> <br>
                                        Если вы являетесь "королем", то все зарегистрированные пользователи будут становиться вашими рефералами, и от пополнения реферала вы будете получать установленный системой.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card overflow-hidden table-color-card">
                        <div class="card-header bg-transparent table-color-header">
                            <h3 class="card-title">
                                Предыдущие 20 королей
                            </h3>
                            <h5 class="card-subtitle mb-0">
                                Последние 20 человек получившие корону
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive table-color">
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase">Логин пользователя</th>
                                        <th class="text-uppercase">Начало правления</th>
                                        <th class="text-uppercase">Конец правления</th>
                                    </tr>
                                    </thead>
                                    <tbody id="bonus-table">
                                    <?php foreach ($refking_get_lasts_king as $row) :?>
                                        <tr>
                                            <td><?= $row['user']; ?></td>
                                            <td><?= date("d/m/Y в H:i", $row['date_start']); ?></td>
                                            <td><?= date("d/m/Y в H:i", $row['date_end']); ?></td>
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
