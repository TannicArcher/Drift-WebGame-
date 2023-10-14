<?php require_once(ROOT . "/views/admin/layouts/_header_adm.php"); ?>
<?php if (isset($errors))
    echo $errors; ?>

    <div class="row col-lg-12">

        <div class="col-lg-4">
            <div class="card">
                <h5 class="card-header">Настрока лотерей</h5>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">

                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Лот на розыгрыш:</label>
                            <div class="col-sm-6">
                                <select name="lott_item" class="custom-select">
                                    <?php foreach ($plans as $plan) : ?>
                                        <option value="<?=$plan['id']; ?>" <?=($lottery_info['lott_item'] == $plan['id']) ? "selected" : ""; ?>><?=$plan['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Розыгрыш 1 раз в (часов):</label>
                            <div class="col-sm-6">
                                <input type="text" name="lott_term" class="form-control" value="<?=$lottery_info['lott_term']?>">
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Date_Update:</label>
                            <div class="col-sm-6">
                                <input type="text" name="date_update" class="form-control" value="<?=$lottery_info['date_update']?>" readonly>
                            </div>
                        </div>

                        <button type="submit" name="yes" class="btn btn-block btn-lighten-info">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">

            <blockquote class="blockquote">
                <p class="mb-0">Смена данных розыгрыша должна быть либо до фактического старта на сайта, либо сразу до/после смены цикла!</p>
            </blockquote>
            <blockquote class="blockquote">
                <p class="mb-0">P.s. Если сменить приз до момента розыгрыша, то приз будет начислен тот который вы сменили</p>
            </blockquote>
            <blockquote class="blockquote">
                <p class="mb-0">P.s.s. Если сменить кол-во часов до момента розыгрыша, то кол-во часов будет сменено в след. цикли</p>
            </blockquote>
            <blockquote class="blockquote">
                <p class="mb-0">P.s.s.s. Date_Update сменяется автоматически по крону</p>
            </blockquote>

        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="mt-0 header-title mb-3">Последние 20 розыгрыши лотерей</h4>

                <div class="table-responsive responsive-table-plugin">
                    <table class="table mb-0">
                        <thead>
                        <tr>
                            <th>#Тираж</th>
                            <th>Дата начала</th>
                            <th>Дата окончания</th>
                            <th>Кол-во участников</th>
                            <th>Победитель</th>
                            <th>Приз</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($lasts_lottery as $row) : ?>
                            <tr>
                                <td>#<?=$row['id']?></td>
                                <td><?=date("d/m/Y в H:i", $row['date_start']); ?></td>
                                <td><?=date("d/m/Y в H:i", $row['date_end']); ?></td>
                                <td><?=$row['count_users']?></td>
                                <td><a href="/admin/users/edit/<?=$row['user_id']?>"><?=$row['user']?></a></td>
                                <td>Куст: "<?=$row['lott_name']?>"</td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?=$navigation?>

            </div>

        </div>
    </div>

<?php require_once(ROOT . "/views/admin/layouts/_footer_adm.php"); ?>