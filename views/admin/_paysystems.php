<?php require_once(ROOT . "/views/admin/layouts/_header_adm.php"); ?>
<?php if(isset($errors)) echo $errors; ?>

    <div class="row col-lg-12">

        <?php foreach ($paysystems as $row) : ?>
            <div class="col-md-3">
                <div class="card">
                    <h5 class="card-header">--- Пс <?=strtoupper($row['fullname']); ?> ---</h5>
                    <div class="card-body">
                        <form action="" method="post">
                            <input type="hidden" name="_tocken" value="<?=Session::$tocken; ?>">
                            <input type="hidden" name="name" value="<?=$row["name"]; ?>">


                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label">Доступность:</label>
                                <div class="col-sm-4">
                                    <select class="custom-select" name="active">
                                        <option value="0" <?php if ($row["active"] == 0) echo "selected"; ?>>Отключена</option>
                                        <option value="1" <?php if ($row["active"] == 1) echo "selected"; ?>>Включена</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label">Пополнение:</label>
                                <div name="active_insert" class="col-sm-4">
                                    <select class="custom-select" name="active_insert">
                                        <option value="0" <?php if ($row["active_insert"] == 0) echo "selected"; ?>>Отключена</option>
                                        <?php if ($row['name'] != 'pyb' && $row['name'] != 'pymt' && $row['name'] != 'pymf' && $row['name'] != 'pyt' && $row['name'] != 'pokp') : ?>
                                            <option value="1" <?php if ($row["active_insert"] == 1) echo "selected"; ?>>Включена</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label">Вывод:</label>
                                <div name="active_payment" class="col-sm-4">
                                    <select class="custom-select" name="active_payment">
                                        <option value="0" <?php if ($row["active_payment"] == 0) echo "selected"; ?>>Отключена</option>
                                        <?php if ($row['name'] != 'fk') : ?>
                                            <option value="1" <?php if ($row["active_payment"] == 1) echo "selected"; ?>>Авто</option>
                                            <option value="2" <?php if ($row["active_payment"] == 2) echo "selected"; ?>>Ручные</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label">Комиссия:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="comis" class="form-control" value="<?= $row['comis']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label">Мин. вывод:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="min_pay" class="form-control" value="<?= $row['min_pay']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label">Макс. вывод:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="max_pay" class="form-control" value="<?= $row['max_pay']; ?>">
                                </div>
                            </div>

                            <button type="submit" name="yes" class="btn btn-block btn-lighten-info">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
<?php require_once(ROOT . "/views/admin/layouts/_footer_adm.php"); ?>