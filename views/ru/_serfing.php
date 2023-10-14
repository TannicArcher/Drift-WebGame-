<?php require_once(ROOT . "/views/" . LANG . "/layouts/_header_cabinet.php"); ?>


    <script src="/assets/scripts/jquery-3.1.0.min.js"></script>
    <script src="/assets/js/serfing.js"></script>

    <script>

        function goserf(obj) {

            setTimeout(function () {

                obj.parentNode.parentNode.parentNode.parentNode.classList.add('bg-light');

                var myReq = new XMLHttpRequest();

                function succFunc(e) {
                    var tckns = [];
                    tckn = myReq.responseText;
                    console.log(tckn);
                    tckns = document.querySelectorAll('input[name="_tocken"]');
                    tckns.forEach(function (item, i, tckns) {
                        item.value = tckn;
                    });
                }

                myReq.open("POST", "/serfing/gettocken", true);
                myReq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                myReq.onreadystatechange = succFunc;
                myReq.send();

            }, 200)

        }

    </script>

    <div class="dt-content">
        <div class="dt-page__header">
            <h1 class="dt-page__title">
                Сёрфинг сайтов
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-9 col-lg-12">
                <div class="dt-card taxi-card p-0 mb-0">
                    <div class="dt-card__body p-0">
                        <div class="row">
                            <div class="col-xl-12 surfing-about-box">
                                <div class="taxi-flex-container">
                                    <h3 class="game-about-title">
                                        О сёрфинге
                                    </h3>
                                    <p class="game-about">
                                        Сёрфинг сайтов — это самый простой способ получить дополнительный доход на
                                        баланс «для выплат». Просто просматривайте сайты наших рекламодателей и
                                        зарабатывайте деньги за каждый просмотр!
                                    </p>
                                    <p class="game-about m-b-0">
                                        <b>Порядок просмотра:</b> 1. Нажмите по заголовку любой из ссылок. 2. На
                                        открывшейся странице появится таймер с оставшимся временем до окончания
                                        просмотра. 3. Выполните простую проверку на робота.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 mb-0">
                <div class="dt-card taxi-card">
                    <div class="dt-card__body surfing-buy-box d-flex align-items-center">
                        <div class="text-center">
                            <div class="dt-card__heading">
                                <h4 class="mb-0 surfing-order">
                                    Нужны просмотры, рефералы или клиенты? Закажите показ Вашего сайта в сёрфинге!
                                </h4>
                            </div>
                            <a class="btn btn-primary new-btn btn-sm m-t-15" href="/serfing/add">Купить просмотры</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="dt-entry__header mb-5 m-t-15">
                    <div class="dt-entry__heading">
                        <h3 class="dt-entry__title">
                            Список ссылок
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-6">
                <?php foreach ($serfs as $serf) :
                    if ($serf['highlight'] == 2) {
                        $serf['highlight'] = 'vip';
                    }
                    if ($serf['highlight'] == 3) {
                        $serf['highlight'] = 'vip';
                    }
                    ?>
                    <style>
                        .surf-title button{
                            border: none;
                            outline: none;
                            background: none;
                        }
                    </style>
                    <div class="col-md-12 col-sm-6">
                        <div class="dt-card surfing-card">
                            <div class="dt-card__body d-flex surfing-box <?= $serf['highlight']; ?>" data-id="<?= $serf['id']; ?>">
                                <div class="surf-main">
                                    <div class="surf-title">
                                        <form action="/serfing/<?= $serf['id']; ?>" method="POST" target="_blank" style="display: block">
                                            <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">

                                            <img src="https://www.google.com/s2/favicons?domain=<?= $serf['url']; ?>">
                                            <button type="submit" onclick="goserf(this);"><?= $serf['title']; ?></button>
                                        </form>
                                    </div>
                                    <div class="surf-info">
                                        <div class="surf-timer">
                                            <i class="far fa-clock"></i>Таймер: <?= $serf['view_time']; ?> сек.
                                        </div>
                                        <div class="surf-price">
                                            <i class="far fa-wallet"></i>Оплата за
                                            просмотр: <?= $serf['click_price']; ?> руб.
                                        </div>
                                        <div class="surf-window">
                                            <i class="fal fa-window"></i>Активное окно
                                        </div>
                                    </div>
                                </div>
                                <div class="surf-actions dropdown d-flex align-items-center">
                                    <button aria-expanded="false" aria-haspopup="true" class="btn btn-light dropdown-toggle" data-toggle="dropdown" type="button">
                                        Меню ссылки
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="https://online.drweb.com/result/?url=<?= $serf['url']; ?>" target="_blank"><i class="fas fa-eye-evil"></i>
                                            Проверить на вирусы</a>
                                        <div class="dropdown-divider"></div>
                                        <div class="information">
                                            <b>Номер ссылки:</b> #<?= $serf['id']; ?><br>
                                            <b>Осталось просмотров:</b> <?= floor($serf['money'] / $serf['price']); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach ?>
            </div>
        </div>
    </div>


<?php require_once(ROOT . "/views/" . LANG . "/layouts/_footer_cabinet.php"); ?>