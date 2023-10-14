<?php require_once(ROOT . "/views/" . LANG . "/layouts/_header_home.php"); ?>

    <section class="section section-variant-2 bg-default payouts-stat-section">
        <div class="section-wave">
            <svg height="46px" preserveaspectratio="none" viewbox="0 0 1920 46" width="1920px" x="0px" y="0px">
                <path d="M1920,0.5c-82.8,0-109.1,44-192.3,44c-78.8,0-116.2-44-191.7-44c-77.1,0-115.9,44-192,44c-78.2,0-114.6-44-192-44c-78.4,0-115.3,44-192,44c-76.9-0.1-119-44-192-44c-77,0-115.2,44-192,44c-73.6,0-114-44-190.9-44c-78.5,0-117.2,44-194.1,44c-75.9,0-113-44-191-44V46h1920V0.5z"></path></svg>
        </div>
        <div class="container container-bigger">
            <div class="row row-30 justify-content-sm-center text-center">
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="counter-wrap new">
                        <span class="icon novi-icon icon-secondary far fa-wallet"></span>
                        <div class="heading-3">
                            <span class="counter counter-sum" data-step="3000"><?= sprintf("%.2f", $stats['all_payment']); ?></span> <span class="counter-desc">руб.</span>
                        </div>
                        <p>Сумма выплат</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="counter-wrap new">
                        <span class="icon novi-icon icon-secondary far fa-receipt"></span>
                        <div class="heading-3">
                            <span class="counter counter-sum" data-step="3000"><?=Vars::getCountPayouts()?></span> <span class="counter-desc">шт.</span>
                        </div>
                        <p>Всего выплат</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section section-variant-2 bg-gray-lighter">
        <div class="section-wave">
            <svg height="46px" preserveaspectratio="none" viewbox="0 0 1920 46" width="1920px" x="0px" y="0px">
                <path d="M1920,0.5c-82.8,0-109.1,44-192.3,44c-78.8,0-116.2-44-191.7-44c-77.1,0-115.9,44-192,44c-78.2,0-114.6-44-192-44c-78.4,0-115.3,44-192,44c-76.9-0.1-119-44-192-44c-77,0-115.2,44-192,44c-73.6,0-114-44-190.9-44c-78.5,0-117.2,44-194.1,44c-75.9,0-113-44-191-44V46h1920V0.5z"></path></svg>
        </div>
        <div class="container container-bigger">
            <div class="row row-30 justify-content-sm-center text-center">
                <div class="col-lg-6">
                    <h4 class="modal-title">
                        Больше выплат
                    </h4>
                    <hr class="divider divider-left divider-default modal-hr">
                    <div class="payouts-forums">
                        <a class="btn btn-primary" href="https://mmgp.com/showthread.php?t=646046" role="button" target="_blank">MMGP</a> <a class="btn btn-primary" href="https://vsemmoney.ru/topic/31002-driftbiz-onlayn-simulyator-taksoparka/" role="button" target="_blank">vsemmoney</a> <a class="btn btn-primary" href="http://www.moneymaker.team/index.php?threads/drift-biz.16636/" role="button" target="_blank">moneymaker</a> <a class="btn btn-primary" href="https://profithunters.ru/threads/drift-biz-onlajn-simuljator-taksoparka.5355/" role="button" target="_blank">profithunters</a> <a class="btn btn-primary" href="https://finforum.net/threads/drift-biz-onlajn-simuljator-taksoparka.24198/" role="button" target="_blank">finforum</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h4 class="modal-title">
                        Мы на мониторингах
                    </h4>
                    <hr class="divider divider-left divider-default modal-hr">
                    <div class="payouts-forums">
                        <a class="btn btn-primary" href="https://profit-hunters.biz/obzor-i-otzyvy-investicionnoj-platformy-drift-lichnyj-vybor/" role="button" target="_blank">profithunters</a> <a class="btn btn-primary" href="https://well-money.biz/viewstr/driftprotect" role="button" target="_blank">WELLMONEY</a> <a class="btn btn-primary" href="http://moniktop.ru/ferma-info/1208" role="button" target="_blank">MONIKTOP</a> <a class="btn btn-primary" href="https://bizoninvest.com/partner_view/104" role="button" target="_blank">bizoninvest</a> <a class="btn btn-primary" href="http://monhyip.net/hyip/drift" role="button" target="_blank">monhyip</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section section-lg bg-default">
        <div class="section-wave">
            <svg height="46px" preserveaspectratio="none" viewbox="0 0 1920 46" width="1920px" x="0px" y="0px">
                <path d="M1920,0.5c-82.8,0-109.1,44-192.3,44c-78.8,0-116.2-44-191.7-44c-77.1,0-115.9,44-192,44c-78.2,0-114.6-44-192-44c-78.4,0-115.3,44-192,44c-76.9-0.1-119-44-192-44c-77,0-115.2,44-192,44c-73.6,0-114-44-190.9-44c-78.5,0-117.2,44-194.1,44c-75.9,0-113-44-191-44V46h1920V0.5z"></path></svg>
        </div>
        <div class="container container-bigger">
            <div class="row row-ten row-30 justify-content-md-center justify-content-xl-between">
                <div class="col-lg-12 text-center">
                    <h4 class="modal-title">
                        Последние 100 выплат
                    </h4>
                    <hr class="divider divider-left divider-default modal-hr">
                    <div class="table-novi table-custom-responsive payouts-table">
                        <table class="table-custom table-color-header">
                            <thead>
                            <tr>
                                <th>Логин пользователя</th>
                                <th>Сумма выплаты</th>
                                <th>Дата выплаты</th>
                                <th>Платежная система</th>
                                <th>Статус выплаты</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($pays as $pay) : ?>

                                <tr>
                                    <td>
                                        <a class="wall"><i class="far fa-user-circle"></i><?= $pay['user']; ?></a>
                                    </td>
                                    <td><?= sprintf("%.2f", $pay['sum']); ?> руб.</td>
                                    <td><?= date("d/m/Y H:i", $insert['date_add']);; ?></td>
                                    <td><?= $pay['fullname']; ?></td>
                                    <td class="status-2">Выплачено</td>
                                </tr>

                            <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php require_once(ROOT . "/views/" . LANG . "/layouts/_footer.php"); ?>