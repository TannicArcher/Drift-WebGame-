<?php require_once(ROOT . "/views/admin/layouts/_header_adm.php"); ?>
<?php if (isset($errors))
    echo $errors; ?>

    <div class="row">
        <form class="row col-lg-12" action="" method="post">
            <input type="hidden" name="_tocken" value="<?=Session::$tocken; ?>">

            <div class="col-md-4">
                <div class="card">
                    <h5 class="card-header">--- Реферальная программа ---</h5>
                    <div class="card-body">

                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label">Вложенность уровней рефералки:</label>
                                <div class="col-sm-4">
                                    <select name="ref_lvls" class="custom-select">
                                        <option value="1" <?=($settings['ref_lvls'] == 1) ? "selected" : ""; ?>>1 уровневая</option>
                                        <option value="2" <?=($settings['ref_lvls'] == 2) ? "selected" : ""; ?>>2 уровневая</option>
                                        <option value="3" <?=($settings['ref_lvls'] == 3) ? "selected" : ""; ?>>3 уровневая</option>
                                        <option value="4" <?=($settings['ref_lvls'] == 4) ? "selected" : ""; ?>>4 уровневая</option>
                                        <option value="5" <?=($settings['ref_lvls'] == 5) ? "selected" : ""; ?>>5 уровневая</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label">Проценты реферу 1ур:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="ref1" value="<?=$settings["ref1"]; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label">Проценты реферу 2ур:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="ref2" value="<?=$settings["ref2"]; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label">Проценты реферу 3ур:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="ref3" value="<?=$settings["ref3"]; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label">Проценты реферу 4ур:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="ref4" value="<?=$settings["ref4"]; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label">Проценты реферу 5ур:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="ref5" value="<?=$settings["ref5"]; ?>">
                                </div>
                            </div>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <h5 class="card-header">--- Настройки ограничений пополнения ---</h5>
                    <div class="card-body">

                        <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Минимальная сумма:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="min_ins" value="<?=$settings["min_ins"]; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Максимальная сумма:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="max_ins" value="<?=$settings["max_ins"]; ?>">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card">
                    <h5 class="card-header">--- Настройки ограничений вывода ---</h5>
                    <div class="card-body">

                        <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Часовое ограничение:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="pay_timeout" value="<?=$settings["pay_timeout"]; ?>">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h5 class="card-header">--- Настройки ежедневного бонуса ---</h5>
                    <div class="card-body">

                        <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Минимальный бонус:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="min_bonus" value="<?=$settings["min_bonus"]; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Максимальная бонус:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="max_bonus" value="<?=$settings["max_bonus"]; ?>">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">--- Настройка % с пополнение на вывод ---</h5>
                    <div class="card-body">

                        <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Процентов на вывод:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="change_balance" value="<?=$settings["change_balance"]; ?>">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-12 row">
                <div class="card col-md-7">
                    <h5 class="card-header">--- Бонус и квесты ---</h5>
                    <div class="card-body">

                        <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Бонус при регистрации:</label>
                            <div class="col-sm-4">
                                <select name="reg_bonus" class="custom-select">
                                    <option value="0" <?=($settings['reg_bonus'] == 0) ? "selected" : ""; ?>>без бонуса</option>
                                    <?php foreach ($plans as $plan) : ?>
                                        <option value="<?=$plan['id']; ?>" <?=($settings['reg_bonus'] == $plan['id']) ? "selected" : ""; ?>><?=$plan['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Награда за квест вступить в группу вк (руб.):</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="vk_quest_bonus" value="<?=$settings["vk_quest_bonus"]; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Награда за квест 1000 кликов серфинга (руб.):</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="serf_quest_bonus" value="<?=$settings["serf_quest_bonus"]; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Награда за квест 50 рефералов (руб.):</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="ref_quest_bonus" value="<?=$settings["ref_quest_bonus"]; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Бонус за реферала 1ур. (руб.):</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="ref_bonus" value="<?=$settings["ref_bonus"]; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Бонус при пополнении (для покупок) (%):</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="insert_b_bonus" value="<?=$settings["insert_b_bonus"]; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-8 col-form-label">Бонус при пополнении (для рекламы) (%):</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="insert_r_bonus" value="<?=$settings["insert_r_bonus"]; ?>">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <button type="submit" name="yes" class="btn btn-block btn-lighten-info">Сохранить</button>
        </form>
    </div>

<?php require_once(ROOT . "/views/admin/layouts/_footer_adm.php"); ?>