<?php require_once(ROOT . "/views/" . LANG . "/layouts/_header_cabinet.php"); ?>

<div class="dt-content">
    <script>
        if(typeof lang === 'undefined') lang = {};lang['enter-code'] = 'Введите код-пароль';lang['enter-code-text'] = 'Для продолжения требуется ввести код-пароль';lang['enter-code-plr'] = 'ВВЕДИТЕ КОД';lang['btn-continue'] = 'Продолжить';lang['btn-close'] = 'Закрыть';
    </script>
    <div class="dt-page__header">
        <h1 class="dt-page__title">
            Выплата заработка
        </h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="dt-card taxi-card">
                <div class="deposit-currency d-flex">
                    <div class="title">
                        1. Выберите валюту:
                    </div>
                    <ul class="card-header-pills nav nav-pills ml-7" role="tablist">
                        <li class="nav-item">
                            <a aria-controls="tab-rub" aria-selected="true" class="nav-link fw-500 active show" data-toggle="tab" data-valute="rub" href="#tab-rub" role="tab">RUB</a>
                        </li>
                    </ul>
                </div>
                <div class="dt-card__body">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tab-rub">
                            <div class="row currency-list media-pays-list">

                            <?php foreach ($paysystems as $paysystem) : ?>

                                    <div class="col-xl-3 col-lg-6 col-sm-6 col-sm-6 col-12 payout-box">
                                        <div class="payout-block" data-target="#model-payout_<?= $paysystem['id']; ?>" data-toggle="modal">
                                            <img src="/public/account/assets/images/ps/<?= $paysystem['name']; ?>.png">
                                            <div class="payout-footer">
                                                <div class="line">
                                                    min <?= $paysystem['min_pay']; ?> rub.
                                                    <div>Комиссия: <?= sprintf("%.2f", $paysystem['comis']); ?>%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div aria-hidden="true" class="modal fade" id="model-payout_<?= $paysystem['id']; ?>" role="dialog">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content payout-modal">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="model-payout">
                                                    Выплата заработка
                                                </h3>
                                                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="payout-img">
                                                    <img src="/public/account/assets/images/ps/<?= $paysystem['name']; ?>.png">
                                                    <div class="payout-footer">
                                                        <div class="line">
                                                            min <span data-name="min"><?= $paysystem['min_pay']; ?></span> rub.
                                                            <div>
                                                                Комиссия: <span data-name="commission"><?= sprintf("%.2f", $paysystem['comis']); ?>%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card payout-modal-card mb-0">
                                                    <div class="card-body">
                                                        <form action="" method="POST">
                                                            <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">
                                                            <input type="hidden" name="system" value="<?= $paysystem['name']; ?>">
                                                            <div class="form-group">
                                                                <label class="payout-label fw-500">Сумма выплаты</label>
                                                                <input aria-describedby="payout-sum" autocomplete="off" class="form-control" data-check="numDec-2" id="payout-sum" maxlength="7" name="amount" placeholder="Введите сумму в рублях" required="" type="text" value="">
                                                            </div>
                                                            <div class="form-group mb-0 btn-separator">
                                                                <button class="btn btn-primary btn-block new-btn text-uppercase" type="submit">Заказать выплату</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="paymodal_<?= $paysystem['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog balancep_modalwidth">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title" id="myModalLabel">Форма заказа выплаты</h4>
                                            </div>
                                            <form class="balancei_form" action="" method="POST">
                                                <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">
                                                <input type="hidden" name="system" value="<?= $paysystem['name']; ?>">
                                                <div class="modal-body">
                                                    <div class="balancep_modaling">
                                                        <img id="imgid" src="/assets/ps/<?= $paysystem['name']; ?>.png"></div>
                                                    <hr class="balancep_hr">
                                                    <h5 class="balancep_h5">Комиссия:
                                                        <span><?= sprintf("%.2f", $paysystem['comis']); ?> %</span></h5>
                                                    <h5 class="balancep_h5">Мин. сумма: <span><?= $paysystem['min_pay']; ?> руб.</span>
                                                    </h5>
                                                    <h5 class="balancep_h5">Макс. сумма: <span><?= $paysystem['max_pay']; ?> руб.</span>
                                                    </h5>
                                                    <hr class="balancep_hr">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control balancei_input insert_new_input" maxlength="5" placeholder="Введите сумму выплаты... (руб.)" name="amount">
                                                    </div>
                                                    <!--<div class="form-group">
                                                      <input type="text" value="" autocomplete="off" class="form-control balancei_input insert_new_input" placeholder="Введите свой платежный пин-код" name="pin">
                                                    </div>-->
                                                    <font color="#0066FF">
                                                        <center>Заказывайте немного меньше, чем имеется на счёте!</center>
                                                    </font>
                                                </div>
                                                <div class="modal-footer" style="border-top: 1px solid #f8f8f8;">
                                                    <button type="submit" class="btn waves-light btn-block balancei_btngo insert_new_btn" style="margin-top: 0;margin-bottom: 15px;">
                                                        Заказать выплату
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <ul class="faq-list">
                <li class="">
                    <span class="round"><i></i></span>
                    <div>
                        <div class="q">
                            <i class="fal fa-question-circle"></i><b>Как происходит выплата заработка?</b><abbr class="fal fa-chevron-down"></abbr>
                        </div>
                        <div class="a" style="display: none;">
                            <p>
                                Для заказа выплаты из проекта необходимо выбрать валюту и способ выплаты заработка, после чего откроется окно в котором нужно ввести свой кошелек, сумму выплаты и нажать на кнопку «Заказать выплату». Выплаты обрабатываются в автоматическом режиме в течение 15 минут, выплаты на криптовалютные кошельки осуществляются в течение 60 минут. В редких случаях возможны задержки выплат, однако время ожидания выплаты не может превышать 24 часа.
                            </p>
                        </div>
                    </div>
                </li>
                <li class="">
                    <span class="round"><i></i></span>
                    <div>
                        <div class="q">
                            <i class="fal fa-question-circle"></i><b>Откуда берется комиссия при выплате?</b><abbr class="fal fa-chevron-down"></abbr>
                        </div>
                        <div class="a" style="display: none;">
                            <p>
                                Мы не взимаем дополнительную комиссию при пополнении или выплатах, комиссии при обработке платежа устанавливают сами платежные системы и агрегаторы платежей, к сожалению изменить или убрать их невозможно.
                            </p>
                            <p>
                                Администрация проекта Drift постоянно работает в направлении уменьшения потерь денежных средств наших пользователей из-за комиссий, мы всегда в поиске наиболее оптимальных способов проведения пополнений и выплат.
                            </p>
                        </div>
                    </div>
                </li>
                <li class="">
                    <span class="round"><i></i></span>
                    <div>
                        <div class="q">
                            <i class="fal fa-question-circle"></i><b>Что делать если моя выплата не приходит?</b><abbr class="fal fa-chevron-down"></abbr>
                        </div>
                        <div class="a" style="display: none;">
                            <p>
                                Если с момента выплаты прошло более 24 часов, а средства до сих пор не зачислены то, пожалуйста, <a href="/help">напишите нам</a>.
                            </p>
                        </div>
                    </div>
                </li>
                <li class="">
                    <span class="round"><i></i></span>
                    <div>
                        <div class="q">
                            <i class="fal fa-question-circle"></i><b>Куда обратиться если у меня появился вопрос?</b><abbr class="fal fa-chevron-down"></abbr>
                        </div>
                        <div class="a" style="display: none;">
                            <p>
                                По любым вопросам и предложениям связанным с проектом Вы можете обратиться в <a href="/help">техническую поддержку</a> проекта.
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <?php if (count($last_payments) > 0) : ?>

        <div class="col-lg-12 mt-20">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title racetabletitle"><i class="fa fa-list-ul"></i> Ваши последние выплаты
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Дата выплаты</th>
                                        <th class="text-center">Сумма выплаты</th>
                                        <th class="text-center">Платежная система</th>
                                        <th class="text-center">Реквизиты</th>
                                        <th class="text-center">Статус</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php foreach ($last_payments as $payment) : ?>

                                        <tr class="text-center">
                                            <td><?= date("d/m/Y в H:i", $payment['date_add']); ?></td>
                                            <td><?= sprintf("%.2f", $payment['sum']); ?> руб.</td>
                                            <td><?= $payment['payment_system']; ?></td>
                                            <td><?= $payment['purse']; ?></td>
                                            <td><?= $payment['status']; ?></td>
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

    <?php endif; ?>
</div>

<?php require_once(ROOT . "/views/" . LANG . "/layouts/_footer_cabinet.php"); ?>
