<?php require_once(ROOT . "/views/admin/layouts/_header_adm.php"); ?>

<?= (isset($errors)) ? $errors : ''; ?>

    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <article class="pricing-column col-md-12">
                    <div class="inner-box card-box">
                        <div class="plan-header p-3 text-center">
                            <h3 class="plan-title">Личные данные</h3>
                        </div>
                        <ul class="plan-stats list-unstyled text-center p-3 mb-0">
                            <li>ID: <?= $users_info["id"]; ?></li>
                            <li>Логин: <?= $users_info["user"]; ?></li>
                            <li>Email: <?= $users_info["email"]; ?></li>
                            <li>Зарегистрирован: <?= date("d.m.Y в H:i:s", $users_info["date_reg"]); ?></li>
                            <li>Последний вход: <?= date("d.m.Y в H:i:s", $users_info["date_login"]); ?></li>
                            <li>Деньги для покупок: <?= sprintf("%.3f", $users_info['money_b']); ?> руб.</li>
                            <li>Деньги для вывода: <?= sprintf("%.3f", $users_info['money_p']); ?> руб.</li>
                            <li>Деньги для рекламы <?= sprintf("%.3f", $users_info['money_r']); ?> руб.</li>
                            <li>Деньги на кассе: <?= sprintf("%.3f", $users_info['money_k']); ?> руб.</li>
                            <li>Текущая скорость: <?= sprintf("%.4f", $users_info["speed"]); ?></li>
                        </ul>
                    </div>
                </article>
            </div>
        </div>

        <div class="col-xl-3 col-md-4">
            <div class="card-box widget-user">
                <div class="text-center">
                    <h2 class="font-weight-normal text-success" data-plugin="counterup">6599</h2>
                    <h5>Пополнено</h5>
                </div>
            </div>

            <div class="card-box widget-user">
                <div class="text-center">
                    <h2 class="font-weight-normal text-danger" data-plugin="counterup">6599</h2>
                    <h5>Выплачено</h5>
                </div>
            </div>

            <div class="card card-body">
                <form class="mb-2" action="" method="post">
                    <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">
                    <input type="hidden" name="banned" value="<?= ($users_info["banned"] > 0) ? 0 : 1; ?>"/>
                    <? if ($users_info["banned"] > 0) : ?>
                        <input type="submit" class="btn btn-block btn-lighten-info" value="Разбанить"/>
                    <? else: ?>
                        <input type="submit" class="btn btn-block btn-lighten-danger" value="Забанить"/>
                    <? endif; ?>
                </form>
                <form class="mb-2" action="" method="post">
                    <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">
                    <input type="submit" class="btn btn-block btn-lighten-info" name="reset_pass" value="Сбросить пин код"/>
                </form>
                <form class="mb-2" action="" method="post">
                    <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">
                    <input type="submit" class="btn btn-block btn-lighten-info" name="reset_pass" value="Сбросить кошельки"/>
                </form>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-header">Операции с балансом</div>
            <div class="card card-body">
                <form action="" method="post">
                    <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <select class="custom-select" name="balance_set">
                                <option value="2">Добавить на баланс</option>
                                <option value="1">Снять с баланса</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <select class="custom-select" name="balance_val">
                                <option value="money_b">для покупок</option>
                                <option value="money_p">для вывода</option>
                                <option value="money_r">для рекламы</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="text" name="sum" value="100" class="form-control" placeholder="Сумма">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="submit" class="btn btn-block btn-lighten-info" name="submit" value="Выполнить"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="row">
                <div class="owl-carousel slide-one">

                    <?php for ($i = 1; $i <= $this->config['ref_lvls']; $i++) : ?>


                        <article class="pricing-column col-md-12">
                            <div class="inner-box card-box">
                                <div class="plan-header p-3 text-center">
                                    <h3 class="plan-title">Реферальная статистика</h3>
                                    <h2 class="plan-price font-weight-normal"><?= $i; ?></h2>
                                    <div class="plan-duration">уровень</div>
                                </div>
                                <ul class="plan-stats list-unstyled text-center p-3 mb-0">
                                    <li>Referer: [<?= $users_info["referer" . $i . "_id"]; ?>
                                        ]<?= $users_info["referer" . $i]; ?></li>
                                    <li>Рефералов: <?= $users_info["count_ref" . $i]; ?> чел.</li>
                                    <li>Заработал на
                                        рефералах: <?= sprintf("%.2f", $users_info["from_referals" . $i]); ?> руб.
                                    </li>
                                    <li>Принес рефереру: <?= sprintf("%.2f", $users_info["to_referer" . $i]); ?>руб.
                                    </li>
                                </ul>
                            </div>
                        </article>

                    <?php endfor; ?>

                </div>
            </div>
        </div><!-- end col -->
    </div>

<?php require_once(ROOT . "/views/admin/layouts/_footer_adm.php"); ?>