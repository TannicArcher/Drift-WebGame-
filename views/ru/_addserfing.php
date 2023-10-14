<?php require_once(ROOT . "/views/" . LANG . "/layouts/_header_cabinet.php"); ?>

    <div class="dt-content">
        <script>
            if (typeof lang === 'undefined') lang = {};
            lang['rub'] = 'руб.';
            lang['confirm-delete-1'] = 'Вы уверены что хотите удалить свою ссылку';
            lang['confirm-delete-2'] = 'При удалении возвращается 80% от суммы баланса ссылки.';
            lang['button-delete'] = 'Удалить';
            lang['button-cancel'] = 'Отмена';
            lang['playback'] = 'Возобновить показ';
            lang['settings'] = 'Настройки показа';
            lang['cost-one'] = 'Цена за 1 просмотр';
            lang['left'] = 'Осталось просмотров';
            lang['balance'] = 'Баланс';
            lang['status'] = 'Статус';
            lang['status-pause'] = 'на паузе';
            lang['view-1'] = 'просмотр';
            lang['view-2'] = 'просмотра';
            lang['view-5'] = 'просмотров';
            lang['stop'] = 'Остановить показ';
            lang['status-play'] = 'показывается';
        </script>
        <div class="dt-page__header">
            <h1 class="dt-page__title">
                Мой сёрфинг
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="dt-card taxi-card ad-s-1">
                    <div class="dt-card__body ad-surf-about-box">
                        <p class="game-about mb-0">
                            На этой странице происходит управление Вашими ссылками в «Сёрфинге сайтов». Для пополнения
                            баланса ссылки необходимо иметь средства на <a href="ad-balance.html">рекламном балансе</a>.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="dt-card taxi-card ad-s-2">
                    <div class="dt-card__body ad-surf-buy-box d-flex align-items-center">
                        <div class="w-100">
                            <a class="btn btn-primary btn-block new-btn mb-0" data-target="#surf-added" data-toggle="modal" href="javascript:void(0)">Добавить
                                сайт в сёрфинг</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ad-surf-list">
                <div class="dt-entry__header mb-5">
                    <div class="dt-entry__heading">
                        <h3 class="dt-entry__title">
                            Мои ссылки в сёрфинге
                        </h3>
                    </div>
                </div>
            </div>

            <?php if (count($user_links) > 0) : ?>

                <?php foreach ($user_links as $link) : ?>

                    <div class="col-xl-12 col-lg-6 col-sm-6">
                        <div class="dt-card surfing-card">
                            <script>
                                function onSubmit(token) {
                                    document.getElementById("form").submit();
                                }
                            </script>
                            <style>
                                .ad-surf-actions button, .settings button{
                                    border: none;
                                    outline: none;
                                    background: none;
                                }
                            </style>
                            <form action="" method="POST" class="dt-card__body d-flex ad-surf-box surfing-box">
                                    <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">
                                    <div class="ad-surf-actions">
                                        <a>
                                            <?php if ($link['status'] == 2): ?>
                                                <button type="submit" name="start" value="<?= $link['id']; ?>">
                                                    <i class="fal fa-play-circle"></i><span>Возобновить показ</span>
                                                </button>
                                            <?php elseif ($link['status'] == 1) : ?>
                                                <button type="submit" name="stop" value="<?= $link['id']; ?>">
                                                    <i class="fal fa-pause-circle"></i><span>Приостановить показ</span>
                                                </button>
                                            <?php endif ?>
                                        </a>
                                    </div>
                                    <div class="surf-main">
                                        <div class="surf-title">
                                            <img src="https://www.google.com/s2/favicons?domain=<?= $link['url']; ?>"><a href="<?= $link['id']; ?>" target="_blank"><?= $link['title']; ?></a>
                                        </div>
                                        <div class="surf-info ad-surf-desc">
                                            <div class="settings">
                                                <i class="far fa-cog"></i>
                                                <a data-target="#edit<?= $link['id']; ?>" data-toggle="modal" href="javascript:void(0)">Настройки показа</a>
                                            </div>
                                            <div class="settings">
                                                <a href="">
                                                <button type="submit" name="delete" value="<?= $link['id']; ?>" data-placement="top" data-original-title="Баланс сайта вернется вам на рекламный счет">
                                                    <i class="far fa-shopping-basket"></i> Удалить?
                                                </button>
                                                </a>
                                            </div>
                                            <div class="id">
                                                <i class="far fa-clipboard-list-check"></i>ID: <?= $link['id']; ?>
                                            </div>
                                            <div class="price">
                                                <i class="far fa-wallet"></i>Тариф: <?= $link['name']; ?>
                                            </div>
                                            <div class="count">
                                                <i class="far fa-eye"></i>Осталось просмотров:
                                                <span><?= floor($link['money'] / $link['price']); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ad-surf-info">
                                        <div class="balance">
                                            Баланс:
                                            <a data-target="#ins<?= $link['id']; ?>" data-toggle="modal" href="javascript:void(0)">
                                                <span><?= $link['money']; ?></span>руб.
                                            </a>
                                        </div>
                                        <div class="status">
                                            Статус: <span class="status-1"><?= $statuses[$link['status']]; ?></span>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>

                    <div id="edit<?= $link['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addsurf_modal2" aria-hidden="true">
                        <div class="modal-dialog balancep_modalwidth">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title" id="addsurf_modal2">Редактирование сайта
                                        #<span><?= $link['id']; ?></span></h4>
                                </div>
                                <form action="" method="POST">
                                    <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">
                                    <div class="modal-body">
                                        <div class="form-group m-t-5">
                                            <label>Заголовок рекламного блока:</label>
                                            <div>
                                                <input name="title" type="text" id="btitle" maxlength="70" class="form-control" value="<?= $link['title']; ?>" placeholder="Например: Отличный сайт, смотреть всем!" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>URL сайта:</label>
                                            <div>
                                                <input name="url" type="url" id="burl" class="form-control" placeholder="Например: http://yandex.ru" value="<?= $link['url']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Выберите тариф для показа:</label>
                                            <select name="plan" class="form-control" id="btype">

                                                <?php foreach ($serf_plans as $plan) : ?>

                                                    <option value="<?= $plan['id']; ?>" <? if ($link['plan'] == $plan['id'])
                                                        echo 'selected'; ?>>Тариф "<?= $plan['name']; ?>"
                                                    </option>

                                                <?php endforeach ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="edit" value="<?= $link['id']; ?>" class="btn btn-primary waves-effect waves-light">
                                            Обновить настройки
                                        </button>
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">
                                            Отмена
                                        </button>
                                    </div>
                                </form>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <div id="ins<?= $link['id']; ?>" class="modal fade addsurfmodalbalance" tabindex="-1" role="dialog" aria-labelledby="addsurf_modal3" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title" id="addsurf_modal3">Баланс ссылки
                                        #<span id="iid"><?= $link['id']; ?></span></h4>
                                </div>
                                <div class="modal-body text-center">
                                    <div class="addsurf_balance"><i class="mdi mdi-square-inc-cash"></i> Актуальный
                                        баланс: <span><?= $link['money']; ?></span></div>
                                    <hr class="m-t-15 m-b-15">
                                    <form action="" method="POST">
                                        <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">
                                        <div class="form-group">
                                            <label style="letter-spacing:1px;">Пополнить баланс сайта:</label>
                                            <div>
                                                <input name="sum" type="text" maxlength="9" class="form-control" placeholder="Введите сумму... (руб.)" required>
                                            </div>
                                        </div>
                                        <button type="submit" name="insert" value="<?= $link['id']; ?>" class="btn btn-primary waves-effect waves-light btn-block">
                                            Пополнить баланс
                                        </button>
                                    </form>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

                <?php endforeach ?>

            <?php else : ?>

                <div class="col-lg-12">
                    <h4 class="text-center surfnoneh4" style="color: #333;">Вы не добавили ни одного сайта в
                        сёрфинг</h4>
                </div>

            <?php endif ?>
        </div>
        <div aria-hidden="true" aria-labelledby="model-surf-added" class="modal fade" id="surf-added" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="model-surf-added">
                            Добавление сайта в сёрфинг
                        </h3>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="card m-b-15">
                            <div class="card-body d-flex align-items-center">
                                <div class="">
                                    <p class="page-about">
                                        <b>«Сёрфинг сайтов»</b> - это универсальный и проверенный временем способ
                                        привлечь на свой ресурс огромное количество посетителей. Добавьте сайт в
                                        сёрфинг, и его в тот же момент начнут смотреть наши пользователи.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card m-b-15">
                            <div class="card-body d-flex align-items-center">
                                    <?php foreach ($serf_plans as $plan) : ?>
                                        <div class="col-md-4">
                                            <div class="panel panel-default">
                                                <div class="panel-body text-center">
                                                    <h3 class="m-t-0 m-b-10 profilemst addsurf_topzag"><i class="fa fa-car text-danger m-r-15"></i><b>Тариф "<?=$plan['name']; ?>"</b></h3>
                                                    <hr>
                                                    <h5 class="addsurf_h5 m-t-15"><i class="fa fa-cube"></i> Переход после просмотра: <?=($plan['transition'] == 1) ? '<div class="text-primary">ДА</div>' : '<div class="text-danger">НЕТ</div>'; ?></h5>
                                                    <h5 class="addsurf_h5"><i class="fa fa-bug"></i> Защита от автокликеров: <div class="text-primary">ДА</div></h5>
                                                    <h5 class="addsurf_h5"><i class="fa fa-clock-o"></i> Время просмотра сайта: <div><?=$plan['view_time']; ?> секунд</div></h5>
                                                    <h5 class="addsurf_h5 m-b-15"><i class="fa fa-eercast"></i> Выделение в списке: <?=($plan['highlight'] > 1) ? '<div class="text-primary">ДА</div>' : '<div class="text-danger">НЕТ</div>'; ?></h5>
                                                    <hr>
                                                    <h5 class="m-b-0 m-t-15 addsurf_price">Цена за 1000 просмотров: <?=$plan['price'] * 1000; ?> руб.</h5>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                            </div>
                        </div>
                        <div class="card ad-add-card mb-0">
                            <div class="card-header card-nav border-bottom-0">
                                <div class="d-flex">
                                    <h3 class="dt-card__title fw-500">
                                        Форма добавления
                                    </h3>
                                </div>
                            </div>
                            <form action="" method="POST">
                                <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">

                                <div class="card-body">
                                    <div class="form-group form-row">
                                        <label class="col-xl-3 col-form-label fw-500" for="ad-surf-title">Заголовок ссылки</label>
                                        <div class="col-xl-9">
                                            <input aria-describedby="ad-surf-title" class="form-control" id="ad-surf-title" maxlength="70" name="title" placeholder="Например: Хороший сайт, всем рекомендую!" required="" type="text">
                                            <small class="form-text small-500" id="ad-surf-title">
                                                Заголовок должен состоять из 10-70 символов
                                            </small>
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-xl-3 col-form-label fw-500" for="ad-surf-url">Адрес сайта</label>
                                        <div class="col-xl-9">
                                            <input aria-describedby="ad-surf-url" class="form-control" id="ad-surf-url" maxlength="255" name="url" placeholder="https://google.com/" required="" type="text">
                                            <small class="form-text small-500" id="ad-surf-url">
                                                URL сайта который будут смотреть наши пользователи
                                            </small>
                                        </div>
                                    </div>
                                    <div class="form-group form-row m-b-10">
                                        <label class="col-xl-3 col-form-label fw-500" for="ad-surf-timer">Выберите тариф для показа</label>
                                        <div class="col-xl-9">
                                            <select class="form-control" id="ad-surf-timer" name="plan" required="">
                                                <?php foreach ($serf_plans as $plan) : ?>
                                                    <option value="<?= $plan['id']; ?>">Тариф "<?= $plan['name']; ?>"</option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex ad-s-footer">
                                    <div class="w-100">
                                        <button class="btn btn-primary text-uppercase new-btn" type="submit" name="add">
                                            Добавить сайт в сёрфинг
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once(ROOT . "/views/" . LANG . "/layouts/_footer_cabinet.php"); ?>