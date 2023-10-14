<?php require_once(ROOT . "/views/" . LANG . "/layouts/_header_cabinet.php"); ?>

<div class="dt-content">
    <script>
        if(typeof lang === 'undefined') lang = {};lang['rub'] = 'руб.';lang['enter-code'] = 'Введите код-пароль';lang['enter-code-text'] = 'Для продолжения требуется ввести код-пароль';lang['enter-code-plr'] = 'ВВЕДИТЕ КОД';lang['btn-continue'] = 'Продолжить';lang['btn-close'] = 'Закрыть';
    </script>
    <div class="dt-page__header">
        <h1 class="dt-page__title">
            Обмен баланса
        </h1>
    </div>
    <div class="row">
        <div class="col-xl-4 col-md-6">
            <div class="dt-card exchange-card">
                <div class="card-header table-color-header">
                    <h3 class="card-title mb-0 text-center f-20 ls-50">
                        «Выплаты» ⇒ «Покупки»
                    </h3>
                </div>
                <div class="dt-card__body pb-3 pt-7">
                    <div class="ex-info media">
                        <img class="ex-info-img" src="public/account/assets/images/other/exchange.png">
                        <div class="media-body">
                            <div class="line">
                                Минимальная сумма:<span>1 рубль</span>
                            </div>
                            <div class="line">
                                Комиссия при обмене:<span>0%</span>
                            </div>
                        </div>
                    </div>
                    <form action="" method="POST" name="exchange-outin">
                            <input type="hidden" name="_tocken" value="<?=Session::$tocken; ?>">
                            <input type="hidden" name="change" value="1">
                        <div class="form-group">
                            <label class="mb-2 ex-form-label">Введите сумму для обмена</label> <input autocomplete="off" class="form-control" data-check="numDec-2" maxlength="7" name="amount" placeholder="Введите сумму в рублях..." required="" type="text">
                            <div class="m-t-5 small-500">
                                Сумма будет списана с Вашего баланса «для выплат»
                            </div>
                        </div>
                        <div class="form-group mb-0 btn-separator">
                            <button class="btn btn-primary btn-block text-uppercase new-btn mb-0" type="submit">Обменять средства</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="dt-card exchange-card">
                <div class="card-header table-color-header">
                    <h3 class="card-title mb-0 text-center f-20 ls-50">
                        «Выплаты» ⇒ «Реклама»
                    </h3>
                </div>
                <div class="dt-card__body pb-3 pt-7">
                    <div class="ex-info media">
                        <img class="ex-info-img" src="public/account/assets/images/other/exchange.png">
                        <div class="media-body">
                            <div class="line">
                                Минимальная сумма:<span>10 рублей</span>
                            </div>
                            <div class="line">
                                Комиссия при обмене:<span>0%</span>
                            </div>
                        </div>
                    </div>
                    <form action="" method="POST" name="exchange-outadv">
                        <input type="hidden" name="_tocken" value="<?=Session::$tocken; ?>">
                        <input type="hidden" name="change" value="2">
                        <div class="form-group">
                            <label class="mb-2 ex-form-label">Введите сумму для обмена</label> <input autocomplete="off" class="form-control" data-check="numDec-2" maxlength="7" name="amount" placeholder="Введите сумму в рублях..." required="" type="text">
                            <div class="m-t-5 small-500">
                                Сумма будет списана с Вашего баланса «для выплат»
                            </div>
                        </div>
                        <div class="form-group mb-0 btn-separator">
                            <button class="btn btn-primary btn-block text-uppercase new-btn mb-0" type="submit">Обменять средства</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <ul class="faq-list">
                <li class="">
                    <span class="round"><i></i></span>
                    <div>
                        <div class="q">
                            <i class="fal fa-question-circle"></i><b>Зачем нужно обменивать баланс?</b><abbr class="fal fa-chevron-down"></abbr>
                        </div>
                        <div class="a" style="display: none;">
                            <p>
                                Обмены необходимы для грамотного распределения средств между своими балансами. Благодаря этому разделу Вы можете совершить «реинвест» без потери средств на комиссиях. Комиссия при обмене взимается только в направлении «Реклама» ⇒ «Покупки».
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<?php require_once(ROOT . "/views/" . LANG . "/layouts/_footer_cabinet.php"); ?>
