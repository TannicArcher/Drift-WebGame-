<?php require_once(ROOT . "/views/" . LANG . "/layouts/_header_cabinet.php"); ?>

<div class="dt-content">
    <script>
        if (typeof lang === 'undefined') lang = {};
        lang['qiwi-title'] = 'QIWI Пополнение';
        lang['qiwi-desc'] = 'Для пополнения своего баланса через QIWI пожалуйста, введите свой номер QIWI кошелька.';
        lang['send'] = 'Отправить';
        lang['close'] = 'Закрыть';
    </script>
    <div class="dt-page__header">
        <h1 class="dt-page__title">
            Пополнение баланса «для рекламы»
        </h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger m-b-20">
                <i aria-hidden="true" class="far fa-exclamation-triangle mr-2"></i><b>Внимание!</b> Данная страница
                предназначена для пополнения баланса «для рекламы»! Баланс «для рекламы» используется для покупки
                просмотров ссылки в разделе «Сёрфинг сайтов». Если Вы хотели пополнить свой баланс «для покупок» то,
                пожалуйста, перейдите в <a href="/insert">соответствующий раздел</a>.
            </div>
        </div>

        <?php foreach ($paysystems as $paysystem) : ?>

            <?php if ($paysystem['active_insert'] == 0)
                continue; ?>

            <form class="col-lg-4" method="POST" action="">
                <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">
                <input type="hidden" name="ps" value="<?= $paysystem['name']; ?>">

                <div class="col-lg-12">
                    <div class="dt-card taxi-card">
                        <div class="dt-card__body">
                            <div class="tab-content">
                                <div class="tab-pane active show" id="tab-rub">
                                    <div class="form-group m-b-30">
                                        <label class="m-r-10 fw-500 deposit-sum" for="rub-sum">1. Сумма пополнения</label>
                                        <input class="form-control form-control-lg deposit-input" data-check="num" id="rub-sum" maxlength="10" name="amount" placeholder="Введите сумму в рублях" required="" style="width:250px;" type="text">
                                    </div>
                                    <div class="row currency-list">
                                        <div class="col-lg-12">
                                            <div class="cur-block" data-payment="payeer">
                                                <img src="/public/account/assets/images/ps/<?= $paysystem['name']; ?>.png">
                                            </div>
                                        </div>
                                    </div>
                                    <label class="fw-500 deposit-sum m-t-30">2. Пополните баланс на сайте платежной системы</label>
                                    <div class="form-group m-b-0 m-t-5">
                                        <button class="btn btn-primary text-uppercase new-btn" type="submit">
                                            Перейти к пополнению
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        <?php endforeach; ?>
    </div>
</div>

<?php require_once(ROOT . "/views/" . LANG . "/layouts/_footer_cabinet.php"); ?>
