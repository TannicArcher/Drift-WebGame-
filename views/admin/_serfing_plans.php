<?php require_once(ROOT . "/views/admin/layouts/_header_adm.php"); ?>
<?php if(isset($errors)) echo $errors; ?>

    <div class="row col-lg-12">

        <?php foreach ($plans as $plan) : ?>
            <div class="col-md-4">
                <div class="card">
                    <h5 class="card-header">--- План <b><?=$plan['name']; ?> (<?=$plan['id']; ?>)</b> ---</h5>
                    <div class="card-body">
                        <form action="" method="post">
                            <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">
                            <input type="hidden" name="id" value="<?= $plan['id']; ?>">


                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label">Название:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="name" class="form-control" value="<?= $plan['name'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label">Стоимость:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="price" class="form-control" value="<?= $plan['price']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label">Стоимость клика для рекламодателя:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="click_price" class="form-control" value="<?= $plan['click_price']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label">Время просмотра:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="view_time" class="form-control" value="<?= $plan['view_time']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label">Выделение (приоритет):</label>
                                <div class="col-sm-4">
                                    <select class="custom-select" name="highlight">
                                        <option value="3" <?php if ($plan['highlight'] == 3) echo 'selected'; ?>>1 место</option>
                                        <option value="2" <?php if ($plan['highlight'] == 2) echo 'selected'; ?>>2 место</option>
                                        <option value="1" <?php if ($plan['highlight'] == 1) echo 'selected'; ?>>3 место</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label">Переход после просмотра:</label>
                                <div class="col-sm-4" >
                                    <select class="custom-select" name="transition">
                                        <option value="1" <?php if ($plan['transition'] == 1) echo 'selected'; ?>>Да</option>
                                        <option value="0" <?php if ($plan['transition'] == 0) echo 'selected'; ?>>Нет</option>
                                    </select>
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