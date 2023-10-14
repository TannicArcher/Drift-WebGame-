<?php require_once(ROOT . "/views/admin/layouts/_header_adm.php"); ?>
<?php if (isset($errors))
    echo $errors; ?>

    <div class="row col-lg-12">

        <?php foreach ($leads as $lead) : ?>
            <div class="col-md-4">
                <div class="card">
                    <h5 class="card-header">--- Гонка <?= $lead['term']; ?> дней (день) ---</h5>
                    <div class="card-body">

                        <form action="" method="post">
                            <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">
                            <input type="hidden" name="id" value="<?= $lead['id']; ?>">
                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label">Длительность:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="term" class="form-control" value="<?= $lead['term'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label">Награда за 1-ое место (%):</label>
                                <div class="col-sm-4">
                                    <input type="text" name="1m" class="form-control" value="<?= $lead['1m']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label">Награда за 2-ое место (%):</label>
                                <div class="col-sm-4">
                                    <input type="text" name="2m" class="form-control" value="<?= $lead['2m']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label">Награда за 3-ое место (%):</label>
                                <div class="col-sm-4">
                                    <input type="text" name="3m" class="form-control" value="<?= $lead['3m']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label">Награда за 4-ое место (%):</label>
                                <div class="col-sm-4">
                                    <input type="text" name="4m" class="form-control" value="<?= $lead['4m']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label">Награда за 5-ое место (%):</label>
                                <div class="col-sm-4">
                                    <input type="text" name="5m" class="form-control" value="<?= $lead['5m']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-8 col-form-label">Дата окончания (UNIX):</label>
                                <div class="col-sm-4">
                                    <input type="text" name="next_date" class="form-control" value="<?= $lead['next_date'] ?>">
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