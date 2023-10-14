<?php require_once(ROOT . "/views/" . LANG . "/layouts/_header_cabinet.php"); ?>

    <div class="dt-content">
        <div class="dt-page__header">
            <h1 class="dt-page__title">
                Задания от администрации
            </h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="dt-card taxi-card">
                    <div class="row no-gutters">
                        <div class="col-xl-12 p-10 taxi-about-card-body d-flex align-items-center">
                            <div class="taxi-flex-container">
                                <h3 class="game-about-title">
                                    О заданиях
                                </h3>
                                <p class="game-about">
                                    Здесь размещен список простых заданий от Администрации проекта. Выполняйте эти задания, чтобы получить дополнительные средства на свой баланс «для покупок».
                                </p>
                                <p class="game-about">
                                    Некоторые задания можно выполнять несколько раз с определенным интервалом, однако большинство из представленных заданий можно выполнить только один раз.
                                </p>
                                <p class="game-about about-last-p">
                                    <i class="fal fa-info"></i>Задания «Публикация выплат на форумах» и «Создание видео-обзора проекта» проверяются вручную Администрацией проекта в течении 24-х часов, остальные проверяются автоматически.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dt-entry__header mb-5 m-t-10">
            <div class="dt-entry__heading">
                <h3 class="dt-entry__title">
                    Список заданий
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="card horizontal taxi-card">
                    <div class="card-stacked w-100 tasks-item-box">
                        <div class="card-body">
                            <span class="badge badge-primary text-uppercase tasks-badge mb-2 mr-1 cursor-help" data-original-title="Время спустя которое задание можно будет выполнить снова" data-placement="bottom" data-toggle="tooltip">1 Раз</span><span class="badge badge-light text-uppercase tasks-badge mb-2 cursor-help" data-original-title="Это задание имеет неограниченный срок действия" data-placement="bottom" data-toggle="tooltip">Одноразовое</span>
                            <h3 class="card-title">
                                Подписаться на сообщество проекта во ВКонтакте
                            </h3>
                            <h5 class="card-subtitle m-b-5">
                                Краткое описание
                            </h5>
                            <p class="card-text task-desc">
                                Самый простой квест. Перейдите на
                                <a target="_blank" href="<?= VK; ?>">
                                    официальную страницу проекта<sup><i class="fa fa-external-link"></i></sup>
                                </a>
                                <?= HOST; ?> во ВКонтакте и подпишитесь на сообщество со своей страницы.
                            </p>
                            <div class="w-100 m-t-15">
                                <a class="btn btn-primary new-btn btn-sm d-inline-block" href="/handler/vk?bonus=0">Начать выполнение</a>
                                <div class="tasks-price cursor-help" data-original-title="Оплата за успешное выполнение задания" data-placement="bottom" data-toggle="tooltip">
                                    Оплата: <?= $this->config['vk_quest_bonus']; ?> <span>руб.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card horizontal taxi-card">
                    <div class="card-stacked w-100 tasks-item-box">
                        <div class="card-body">
                            <span class="badge badge-primary text-uppercase tasks-badge mb-2 mr-1 cursor-help" data-original-title="Время спустя которое задание можно будет выполнить снова" data-placement="bottom" data-toggle="tooltip">1 Раз</span><span class="badge badge-light text-uppercase tasks-badge mb-2 cursor-help" data-original-title="Это задание имеет неограниченный срок действия" data-placement="bottom" data-toggle="tooltip">Одноразовое</span>
                            <h3 class="card-title">
                                Просмотреть 1000 сайтов в сёрфинге
                            </h3>
                            <h5 class="card-subtitle m-b-5">
                                Краткое описание
                            </h5>
                            <p class="card-text task-desc">
                                Сделайте 1000 просмотров в разделе «<a href="/serfing">Сёрфинг сайтов</a>» за любой промежуток времени, а затем подавайте отчет.
                            </p>
                            <div class="w-100 m-t-15">
                                <form action="" method="POST">
                                    <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">
                                    <button type="submit" name="serf_quest" class="btn btn-primary new-btn btn-sm d-inline-block">Начать выполнение</button>
                                </form>
                                <div class="tasks-price cursor-help" data-original-title="Оплата за успешное выполнение задания" data-placement="bottom" data-toggle="tooltip">
                                    Оплата: <?= $this->config['serf_quest_bonus']; ?> <span>руб.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card horizontal taxi-card">
                    <div class="card-stacked w-100 tasks-item-box">
                        <div class="card-body">
                            <span class="badge badge-primary text-uppercase tasks-badge mb-2 mr-1 cursor-help" data-original-title="Время спустя которое задание можно будет выполнить снова" data-placement="bottom" data-toggle="tooltip">1 Раз</span><span class="badge badge-light text-uppercase tasks-badge mb-2 cursor-help" data-original-title="Это задание имеет неограниченный срок действия" data-placement="bottom" data-toggle="tooltip">Одноразовое</span>
                            <h3 class="card-title">
                                Набрать 50 рефералов в свою команду
                            </h3>
                            <h5 class="card-subtitle m-b-5">
                                Краткое описание
                            </h5>
                            <p class="card-text task-desc">
                                Пригласите в проект 50 реальных рефералов благодаря «<a href="/partnership">Партнерской программе</a>» за любой промежуток времени, а затем подавайте отчет.
                            </p>
                            <div class="w-100 m-t-15">
                                <form action="" method="POST">
                                    <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">
                                    <button type="submit" name="ref_quest" class="btn btn-primary new-btn btn-sm d-inline-block">
                                        Начать выполнение
                                    </button>
                                </form>
                                <div class="tasks-price cursor-help" data-original-title="Оплата за успешное выполнение задания" data-placement="bottom" data-toggle="tooltip">
                                    Оплата: <?= $this->config['ref_quest_bonus']; ?> <span>руб.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once(ROOT . "/views/" . LANG . "/layouts/_footer_cabinet.php"); ?>