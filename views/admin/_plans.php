<?php require_once(ROOT . "/views/admin/layouts/_header_adm.php"); ?>
<?php if (isset($errors))
    echo $errors; ?>


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
                                <label class="col-sm-8 col-form-label">Доход в час руб.:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="perc" class="form-control" value="<?= $plan['perc']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label">Доступно для покупки шт. (0 - без лимита):</label>
                                <div class="col-sm-4">
                                    <input type="text" name="col_limits" class="form-control" value="<?= $plan['col_limit']; ?>">
                                </div>
                            </div>
                            <hr>

                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label">Процент в месяц:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="<?= $plan['perc'] * 31 * 24 / ($plan['price'] / 100); ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label">Всего куплено:</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="<?= $plan['col_activated'];?>" disabled>
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