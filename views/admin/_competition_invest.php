<?php require_once(ROOT . "/views/admin/layouts/_header_adm.php"); ?>
<?php if (isset($errors)) echo $errors; ?>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">

                    <div class="col-md-12">
                        <div class="button-list">
                            <a class="btn btn-secondary" href="/admin/competition/invest">Конкурсы инвесторов</a>

                            <a class="btn btn-lighten-info" href="/admin/competition/referal">Конкурсы рефералов</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h4 class="mt-0 header-title mb-3">Завершенные конкурсы инвесторов</h4>

            <div class="row owl-carousel slide-two">
                <?php foreach ($competitions as $row) : ?>
                    <div class="card-box">
                        <h4 class="mt-0 header-title mb-3">Конкурс №<?= $row["id"]; ?></h4>
                        <div class="table-responsive responsive-table-plugin">
                            <table class="table mb-0">
                                <thead>
                                <tr>
                                    <th>1 место</th>
                                    <th>2 место</th>
                                    <th>3 место</th>
                                    <th>4 место</th>
                                    <th>5 место</th>
                                    <th>Начат</th>
                                    <th>Завершён</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <th>
                                        <?php if ($row["1m_sum"] && $row["1m_perc"]) : ?>

                                            <?= $row['1m_sum']; ?> руб. + <?= $row['1m_perc']; ?> %

                                        <?php elseif ($row["1m_sum"] && !$row["1m_perc"]) : ?>

                                            <?= $row['1m_sum']; ?> руб.

                                        <?php elseif (!$row["1m_sum"] && $row["1m_perc"]) : ?>

                                            <?= $row['1m_perc']; ?> %

                                        <?php endif ?>
                                    </th>
                                    <th>
                                        <?php if ($row["2m_sum"] && $row["2m_perc"]) : ?>

                                            <?= $row['2m_sum']; ?> руб. + <?= $row['2m_perc']; ?> %

                                        <?php elseif ($row["2m_sum"] && !$row["2m_perc"]) : ?>

                                            <?= $row['2m_sum']; ?> руб.

                                        <?php elseif (!$row["2m_sum"] && $row["2m_perc"]) : ?>

                                            <?= $row['2m_perc']; ?> %

                                        <?php endif ?>
                                    </th>
                                    <th>
                                        <?php if ($row["3m_sum"] && $row["3m_perc"]) : ?>

                                            <?= $row['3m_sum']; ?> руб. + <?= $row['3m_perc']; ?> %

                                        <?php elseif ($row["3m_sum"] && !$row["3m_perc"]) : ?>

                                            <?= $row['3m_sum']; ?> руб.

                                        <?php elseif (!$row["3m_sum"] && $row["3m_perc"]) : ?>

                                            <?= $row['3m_perc']; ?> %

                                        <?php endif ?>
                                    </th>
                                    <th>
                                        <?php if ($row["4m_sum"] && $row["4m_perc"]) : ?>

                                            <?= $row['4m_sum']; ?> руб. + <?= $row['4m_perc']; ?> %

                                        <?php elseif ($row["4m_sum"] && !$row["4m_perc"]) : ?>

                                            <?= $row['4m_sum']; ?> руб.

                                        <?php elseif (!$row["4m_sum"] && $row["4m_perc"]) : ?>

                                            <?= $row['4m_perc']; ?> %

                                        <?php endif ?>

                                    </th>
                                    <th>
                                        <?php if ($row["5m_sum"] && $row["5m_perc"]) : ?>

                                            <?= $row['5m_sum']; ?> руб. + <?= $row['5m_perc']; ?> %

                                        <?php elseif ($row["5m_sum"] && !$row["5m_perc"]) : ?>

                                            <?= $row['5m_sum']; ?> руб.

                                        <?php elseif (!$row["5m_sum"] && $row["5m_perc"]) : ?>

                                            <?= $row['5m_perc']; ?> %

                                        <?php endif ?>
                                    </th>
                                    <th>
                                        <?= date("d.m.Y в H:i:s", $row["date_add"]); ?>
                                    </th>
                                    <th>
                                        <?= date("d.m.Y в H:i:s", $row["date_end"]); ?>
                                    </th>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <?php if (isset($row['winers'])) : $i = 0; ?>
                            <div class="table-responsive responsive-table-plugin mt-5">
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th>Место</th>
                                        <th>Пользователь</th>
                                        <th>Сумма</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($row['winers'] as $winer) : $i++; ?>
                                        <tr>
                                            <td><?php if ($i <= 5)
                                                    echo $i . ' место'; ?></td>
                                            <td>
                                                <a href="/admin/users/edit/<?= $winer["user_id"]; ?>"><?= $winer["user"]; ?></a>
                                            </td>
                                            <td><?= $winer["sum"]; ?> руб.</td>
                                        </tr>
                                    <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif ?>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h4 class="mt-0 header-title mb-3">Текущий конкурс инвесторов</h4>

            <?php if ($active_competition) : ?>

                <div class="card-box">
                    <h4 class="mt-0 header-title mb-3">Конкурс №<?= $active_competition["id"]; ?></h4>
                    <div class="table-responsive responsive-table-plugin">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th>1 место</th>
                                <th>2 место</th>
                                <th>3 место</th>
                                <th>4 место</th>
                                <th>5 место</th>
                                <th>Начат</th>
                                <th>Завершён</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <th>
                                    <?php if ($active_competition["1m_sum"] && $active_competition["1m_perc"]) : ?>

                                        <?=$active_competition['1m_sum']; ?> руб. + <?=$active_competition['1m_perc']; ?> %

                                    <?php elseif ($active_competition["1m_sum"] && !$active_competition["1m_perc"]) : ?>

                                        <?=$active_competition['1m_sum']; ?> руб.

                                    <?php elseif (!$active_competition["1m_sum"] && $active_competition["1m_perc"]) : ?>

                                        <?=$active_competition['1m_perc']; ?> %

                                    <?php endif ?>
                                </th>
                                <th>
                                    <?php if ($active_competition["2m_sum"] && $active_competition["2m_perc"]) : ?>

                                        <?=$active_competition['2m_sum']; ?> руб. + <?=$active_competition['2m_perc']; ?> %

                                    <?php elseif ($active_competition["2m_sum"] && !$active_competition["2m_perc"]) : ?>

                                        <?=$active_competition['2m_sum']; ?> руб.

                                    <?php elseif (!$active_competition["2m_sum"] && $active_competition["2m_perc"]) : ?>

                                        <?=$active_competition['2m_perc']; ?> %

                                    <?php endif ?>
                                </th>
                                <th>
                                    <?php if ($active_competition["3m_sum"] && $active_competition["3m_perc"]) : ?>

                                        <?=$active_competition['3m_sum']; ?> руб. + <?=$active_competition['3m_perc']; ?> %

                                    <?php elseif ($active_competition["3m_sum"] && !$active_competition["3m_perc"]) : ?>

                                        <?=$active_competition['3m_sum']; ?> руб.

                                    <?php elseif (!$active_competition["3m_sum"] && $active_competition["3m_perc"]) : ?>

                                        <?=$active_competition['3m_perc']; ?> %

                                    <?php endif ?>
                                </th>
                                <th>
                                    <?php if ($active_competition["4m_sum"] && $active_competition["4m_perc"]) : ?>

                                        <?=$active_competition['4m_sum']; ?> руб. + <?=$active_competition['4m_perc']; ?> %

                                    <?php elseif ($active_competition["4m_sum"] && !$active_competition["4m_perc"]) : ?>

                                        <?=$active_competition['4m_sum']; ?> руб.

                                    <?php elseif (!$active_competition["4m_sum"] && $active_competition["4m_perc"]) : ?>

                                        <?=$active_competition['4m_perc']; ?> %

                                    <?php endif ?>

                                </th>
                                <th>
                                    <?php if ($active_competition["5m_sum"] && $active_competition["5m_perc"]) : ?>

                                        <?=$active_competition['5m_sum']; ?> руб. + <?=$active_competition['5m_perc']; ?> %

                                    <?php elseif ($active_competition["5m_sum"] && !$active_competition["5m_perc"]) : ?>

                                        <?=$active_competition['5m_sum']; ?> руб.

                                    <?php elseif (!$active_competition["5m_sum"] && $active_competition["5m_perc"]) : ?>

                                        <?=$active_competition['5m_perc']; ?> %

                                    <?php endif ?>
                                </th>
                                <th>
                                    <?= date("d.m.Y в H:i:s", $active_competition["date_add"]); ?>
                                </th>
                                <th>
                                    <?= date("d.m.Y в H:i:s", $active_competition["date_end"]); ?>
                                </th>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <?php if (count($active_competition['users']) > 0) : $i = 0; ?>
                        <div class="table-responsive responsive-table-plugin mt-5">
                            <table class="table mb-0">
                                <thead>
                                <tr>
                                    <th>Место</th>
                                    <th>Пользователь</th>
                                    <th>Сумма</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($active_competition['users'] as $row) : $i++; ?>
                                    <tr>
                                        <td><?php if ($i <= 5) echo $i.' место'; ?></td>
                                        <td><a href="/admin/users/edit/<?=$row["user_id"]; ?>" class="stn"><?=$row["user"]; ?></a></td>
                                        <td><?=$row["points"]; ?></td>
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif ?>
                </div>

                <div class="col-md-12">
                    <div class="card card-body">
                        <form action="" method="POST">
                            <input type="hidden" name="_tocken" value="<?=Session::$tocken; ?>">
                            <input type="submit" class="btn btn-block btn-lighten-success" name="yes" value="Завершить и зачислить"/>
                            <input type="submit" class="btn btn-block btn-lighten-danger" name="no" value="Отменить без призов"/>
                        </form>
                    </div>
                </div>
            <?php else : ?>

                <div class="col-md-12">
                    <div class="card-box">

                        <form class="form-horizontal" role="form" method="POST">
                            <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Приз за 1 место:</label>
                                <div class="col-sm-5">
                                    <input type="text" name="1m_sum" value="0" class="form-control" placeholder="Руб">
                                    <small id="emailHelp" class="form-text text-muted">Рублей</small>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="1m_perc" value="0" class="form-control" placeholder="%">
                                    <small id="emailHelp" class="form-text text-muted">% от банка конкурса</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Приз за 2 место:</label>
                                <div class="col-sm-5">
                                    <input type="text" name="2m_sum" value="0" class="form-control" placeholder="Руб">
                                    <small id="emailHelp" class="form-text text-muted">Рублей</small>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="2m_perc" value="0" class="form-control" placeholder="%">
                                    <small id="emailHelp" class="form-text text-muted">% от банка конкурса</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Приз за 3 место:</label>
                                <div class="col-sm-5">
                                    <input type="text" name="3m_sum" value="0" class="form-control" placeholder="Руб">
                                    <small id="emailHelp" class="form-text text-muted">Рублей</small>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="3m_perc" value="0" class="form-control" placeholder="%">
                                    <small id="emailHelp" class="form-text text-muted">% от банка конкурса</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Приз за 4 место:</label>
                                <div class="col-sm-5">
                                    <input type="text" name="4m_sum" value="0" class="form-control" placeholder="Руб">
                                    <small id="emailHelp" class="form-text text-muted">Рублей</small>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="4m_perc" value="0" class="form-control" placeholder="%">
                                    <small id="emailHelp" class="form-text text-muted">% от банка конкурса</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Приз за 5 место:</label>
                                <div class="col-sm-5">
                                    <input type="text" name="5m_sum" value="0" class="form-control" placeholder="Руб">
                                    <small id="emailHelp" class="form-text text-muted">Рублей</small>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="5m_perc" value="0" class="form-control" placeholder="%">
                                    <small id="emailHelp" class="form-text text-muted">% от банка конкурса</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Длительность:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="term" value="31" class="form-control" placeholder="Дней">
                                    <small id="emailHelp" class="form-text text-muted">Дней</small>
                                </div>
                            </div>

                            <div class="form-group mb-0 justify-content-end row">
                                <div class="col-sm-9">
                                    <button type="submit" name="start" class="btn btn-lighten-info btn-block waves-effect waves-light">
                                        Запустить
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            <?php endif ?>
        </div>
    </div>


<?php require_once(ROOT . "/views/admin/layouts/_footer_adm.php"); ?>