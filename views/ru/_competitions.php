<?php require_once(ROOT . "/views/" . LANG . "/layouts/_header_home.php"); ?>


    <section class="section section-lg section-2-columns bg-gray-lighter" data-auth="<?=$this->user_data['user']; ?>">
        <div class="section-wave">
            <svg height="46px" preserveaspectratio="none" viewbox="0 0 1920 46" width="1920px" x="0px" y="0px">
                <path d="M1920,0.5c-82.8,0-109.1,44-192.3,44c-78.8,0-116.2-44-191.7-44c-77.1,0-115.9,44-192,44c-78.2,0-114.6-44-192-44c-78.4,0-115.3,44-192,44c-76.9-0.1-119-44-192-44c-77,0-115.2,44-192,44c-73.6,0-114-44-190.9-44c-78.5,0-117.2,44-194.1,44c-75.9,0-113-44-191-44V46h1920V0.5z"></path>
            </svg>
        </div>
        <div class="container container-bigger">
            <div class="row row-ten row-30 justify-content-md-center justify-content-xl-between">
                <?php if ($invest_competition) : ?>
                    <div class="col-md-9 col-lg-5 col-xxl-5">
                        <div class="text-center">
                            <h3 class="contest-title">
                                Конкурс инвесторов # <?= $invest_competition['id'] ?>
                            </h3>
                            <div class="divider divider-default contest-adapt-2"></div>
                        </div>
                        <article class="inline-message">
                            <div class="contest-line">
                                Старт конкурса:
                                <span class="date"><?= date("d/m/Y в H:i", $invest_competition['date_add']); ?></span>
                            </div>
                            <div class="contest-line">
                                Окончание конкурса:
                                <span class="date"><?= date("d/m/Y в H:i", $invest_competition['date_end']); ?></span>
                            </div>
                        </article>
                        <article class="inline-message">
                            <div class="contest-terms mt-0">
                                <div class="title">
                                    Описание конкурса:
                                </div>
                                <p>
                                    Мы выплачиваем дополнительный бонус лидерам проекта по сумме пополнений баланса «для
                                    покупок» в течении месяца. Чтобы стать одним из участников конкурса Вам необходимо
                                    пополнить свой баланс «для покупок» любым из доступных способов пополнения баланса.
                                </p>
                            </div>
                        </article>
                        <article class="inline-message">
                            <div class="contest-terms">
                                <div class="title">
                                    Условия конкурса:
                                </div>
                                <ul class="list-marked terms-list">
                                    <li>В конкурсе может участвовать любой пользователь проекта
                                    </li>
                                    <li>Призы победителям выплачиваются на баланс «для выплат»
                                    </li>
                                    <li>Приз зачисляется сразу после завершения конкурса
                                    </li>
                                    <li>Конкурс
                                        заканчивается <?= date("d/m/Y в H:i", $invest_competition['date_end']); ?>
                                    </li>
                                </ul>
                            </div>
                        </article>
                        <article class="inline-message">
                            <div class="text-center contest-timer-title">
                                Осталось до окончания:
                            </div>
                            <div class="countdown-wrap">
                                <div class="DateCountdown time-circles" data-countdown="data-countdown" data-from="<?= date("Y-m-d H:i:s", $invest_competition['date_add']); ?>" data-to="<?= date("Y-m-d H:i:s", $invest_competition['date_end']); ?>">
                                    <div class="countdown-block countdown-block-days">
                                        <svg class="countdown-circle" data-progress-days="" height="130" viewbox="0 0 200 200" width="130" x="0" y="0">
                                            <circle class="countdown-circle-bg" cx="100" cy="100" r="68"></circle>
                                            <circle class="countdown-circle-fg clipped" cx="100" cy="100" r="78"></circle>
                                        </svg>
                                        <div class="countdown-content">
                                            <div class="countdown-counter" data-counter-days="">
                                                00
                                            </div>
                                            <div class="countdown-title">
                                                Дней
                                            </div>
                                        </div>
                                    </div>
                                    <div class="countdown-block countdown-block-hours">
                                        <svg class="countdown-circle" data-progress-hours="" height="130" viewbox="0 0 200 200" width="130" x="0" y="0">
                                            <circle class="countdown-circle-bg" cx="100" cy="100" r="68"></circle>
                                            <circle class="countdown-circle-fg clipped" cx="100" cy="100" r="78"></circle>
                                        </svg>
                                        <div class="countdown-content">
                                            <div class="countdown-counter" data-counter-hours="">
                                                00
                                            </div>
                                            <div class="countdown-title">
                                                Часов
                                            </div>
                                        </div>
                                    </div>
                                    <div class="countdown-block countdown-block-minutes">
                                        <svg class="countdown-circle" data-progress-minutes="" height="130" viewbox="0 0 200 200" width="130" x="0" y="0">
                                            <circle class="countdown-circle-bg" cx="100" cy="100" r="68"></circle>
                                            <circle class="countdown-circle-fg clipped" cx="100" cy="100" r="78"></circle>
                                        </svg>
                                        <div class="countdown-content">
                                            <div class="countdown-counter" data-counter-minutes="">
                                                00
                                            </div>
                                            <div class="countdown-title">
                                                Минут
                                            </div>
                                        </div>
                                    </div>
                                    <div class="countdown-block countdown-block-seconds">
                                        <svg class="countdown-circle" data-progress-seconds="" height="130" viewbox="0 0 200 200" width="130" x="0" y="0">
                                            <circle class="countdown-circle-bg" cx="100" cy="100" r="68"></circle>
                                            <circle class="countdown-circle-fg clipped" cx="100" cy="100" r="78"></circle>
                                        </svg>
                                        <div class="countdown-content">
                                            <div class="countdown-counter" data-counter-seconds="">
                                                00
                                            </div>
                                            <div class="countdown-title">
                                                Секунд
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <div class="table-novi table-custom-responsive contest-table">
                            <table class="table-custom table-color-header">
                                <thead>
                                <tr>
                                    <th>Позиция</th>
                                    <th>Логин участника</th>
                                    <th>Сумма пополнений</th>
                                    <th>Приз</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php if (isset($invest_competition['users'])) : $i = 0; ?>

                                    <?php foreach ($invest_competition['users'] as $user) : $i++; ?>

                                        <?php if ($i > 5)
                                            break; ?>

                                        <tr>
                                            <td><?= $user['user']; ?></td>
                                            <td><?= date("d/m/Y в H:i", $user['date_reg']); ?></td>
                                            <td><?= sprintf("%.2f", $user['points']); ?> руб.</td>

                                            <?php if ($i <= 5) : ?>
                                                <td class="tdactive">
                                                    <?php if ($invest_competition[$i . 'm_sum'] > 0 && $invest_competition[$i . 'm_perc'] > 0) : ?>
                                                        <?= $invest_competition[$i . 'm_sum']; ?> руб. + <?= $invest_competition[$i . 'm_perc']; ?> % от суммы
                                                    <?php elseif ($invest_competition[$i . 'm_sum'] == 0 && $invest_competition[$i . 'm_perc'] > 0) : ?>
                                                        <?= $invest_competition[$i . 'm_perc']; ?> % от суммы
                                                    <?php elseif ($invest_competition[$i . 'm_sum'] > 0 && $invest_competition[$i . 'm_perc'] == 0) : ?>
                                                        <?= $invest_competition[$i . 'm_sum']; ?> руб.
                                                    <?php endif ?>
                                                </td>
                                            <?php else : ?>
                                                <td>--</td>
                                            <?php endif; ?>
                                        </tr>

                                    <?php endforeach; ?>

                                <?php else: ?>
                                    <tr>
                                        <td colspan="4">Участников еще нет</td>
                                    </tr>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($referal_competition) : ?>
                    <div class="col-md-9 col-lg-5 col-xxl-5">
                        <div class="text-center">
                            <h3 class="contest-title">
                                Конкурс рефералов # <?= $invest_competition['id'] ?>
                            </h3>
                            <div class="divider divider-default contest-adapt-2"></div>
                        </div>
                        <article class="inline-message">
                            <div class="contest-line">
                                Старт конкурса:
                                <span class="date"><?= date("d/m/Y в H:i", $referal_competition['date_add']); ?></span>
                            </div>
                            <div class="contest-line">
                                Окончание конкурса:
                                <span class="date"><?= date("d/m/Y в H:i", $referal_competition['date_end']); ?></span>
                            </div>
                        </article>
                        <article class="inline-message">
                            <div class="contest-terms mt-0">
                                <div class="title">
                                    Описание конкурса:
                                </div>
                                <p>
                                    Благодаря конкурсу рефералов мы выплатим дополнительное вознаграждение десяти
                                    пользователям с наибольшей суммой пополнений баланса «для покупок» рефералами 1
                                    уровня за время проведения конкурса. Учитываются как новые так и старые рефералы.
                                </p>
                            </div>
                        </article>
                        <article class="inline-message">
                            <div class="contest-terms">
                                <div class="title">
                                    Условия конкурса:
                                </div>
                                <ul class="list-marked terms-list">
                                    <li>В конкурсе может участвовать любой пользователь проекта
                                    </li>
                                    <li>Призы победителям выплачиваются на баланс «для выплат»
                                    </li>
                                    <li>Приз зачисляется сразу после завершения конкурса
                                    </li>
                                    <li>Конкурс заканчивается <?= date("d/m/Y в H:i", $referal_competition['date_end']); ?>
                                    </li>
                                </ul>
                            </div>
                        </article>
                        <article class="inline-message">
                            <div class="text-center contest-timer-title">
                                Осталось до окончания:
                            </div>
                            <div class="countdown-wrap">
                                <div class="DateCountdown time-circles" data-countdown="data-countdown" data-from="<?= date("Y-m-d H:i:s", $referal_competition['date_add']); ?>" data-to="<?= date("Y-m-d H:i:s", $referal_competition['date_end']); ?>">
                                    <div class="countdown-block countdown-block-days">
                                        <svg class="countdown-circle" data-progress-days="" height="130" viewbox="0 0 200 200" width="130" x="0" y="0">
                                            <circle class="countdown-circle-bg" cx="100" cy="100" r="68"></circle>
                                            <circle class="countdown-circle-fg clipped" cx="100" cy="100" r="78"></circle>
                                        </svg>
                                        <div class="countdown-content">
                                            <div class="countdown-counter" data-counter-days="">
                                                00
                                            </div>
                                            <div class="countdown-title">
                                                Дней
                                            </div>
                                        </div>
                                    </div>
                                    <div class="countdown-block countdown-block-hours">
                                        <svg class="countdown-circle" data-progress-hours="" height="130" viewbox="0 0 200 200" width="130" x="0" y="0">
                                            <circle class="countdown-circle-bg" cx="100" cy="100" r="68"></circle>
                                            <circle class="countdown-circle-fg clipped" cx="100" cy="100" r="78"></circle>
                                        </svg>
                                        <div class="countdown-content">
                                            <div class="countdown-counter" data-counter-hours="">
                                                00
                                            </div>
                                            <div class="countdown-title">
                                                Часов
                                            </div>
                                        </div>
                                    </div>
                                    <div class="countdown-block countdown-block-minutes">
                                        <svg class="countdown-circle" data-progress-minutes="" height="130" viewbox="0 0 200 200" width="130" x="0" y="0">
                                            <circle class="countdown-circle-bg" cx="100" cy="100" r="68"></circle>
                                            <circle class="countdown-circle-fg clipped" cx="100" cy="100" r="78"></circle>
                                        </svg>
                                        <div class="countdown-content">
                                            <div class="countdown-counter" data-counter-minutes="">
                                                00
                                            </div>
                                            <div class="countdown-title">
                                                Минут
                                            </div>
                                        </div>
                                    </div>
                                    <div class="countdown-block countdown-block-seconds">
                                        <svg class="countdown-circle" data-progress-seconds="" height="130" viewbox="0 0 200 200" width="130" x="0" y="0">
                                            <circle class="countdown-circle-bg" cx="100" cy="100" r="68"></circle>
                                            <circle class="countdown-circle-fg clipped" cx="100" cy="100" r="78"></circle>
                                        </svg>
                                        <div class="countdown-content">
                                            <div class="countdown-counter" data-counter-seconds="">
                                                00
                                            </div>
                                            <div class="countdown-title">
                                                Секунд
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <div class="table-novi table-custom-responsive contest-table">
                            <table class="table-custom table-color-header">
                                <thead>
                                <tr>
                                    <th>Позиция</th>
                                    <th>Логин участника</th>
                                    <th>Сумма пополнений</th>
                                    <th>Приз</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (isset($referal_competition['users'])) : $i = 0; ?>

                                    <?php foreach ($referal_competition['users'] as $user) : $i++; ?>

                                        <?php if ($i > 5)
                                            break; ?>

                                        <tr>
                                            <td><?= $user['user']; ?></td>
                                            <td><?= date("d/m/Y в H:i", $user['date_reg']); ?></td>
                                            <td><?= sprintf("%.2f", $user['points']); ?> руб.</td>


                                            <?php if ($i <= 5) : ?>

                                                <td class="tdactive">

                                                    <?php if ($referal_competition[$i . 'm_sum'] > 0 && $referal_competition[$i . 'm_perc'] > 0) : ?>

                                                        <?= $referal_competition[$i . 'm_sum']; ?> руб. + <?= $referal_competition[$i . 'm_perc']; ?> % от суммы

                                                    <?php elseif ($referal_competition[$i . 'm_sum'] == 0 && $referal_competition[$i . 'm_perc'] > 0) : ?>

                                                        <?= $referal_competition[$i . 'm_perc']; ?> % от суммы

                                                    <?php elseif ($referal_competition[$i . 'm_sum'] > 0 && $referal_competition[$i . 'm_perc'] == 0) : ?>

                                                        <?= $referal_competition[$i . 'm_sum']; ?> руб.

                                                    <?php endif ?>

                                                </td>

                                            <?php else : ?>

                                                <td> -</td>

                                            <?php endif; ?>

                                        </tr>

                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4">Участников еще нет</td>
                                    </tr>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

<?php require_once(ROOT . "/views/" . LANG . "/layouts/_footer.php"); ?>