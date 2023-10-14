<?php require_once(ROOT . "/views/admin/layouts/_header_adm.php"); ?>
<?php if (isset($errors))
    echo $errors; ?>

    <div class="row">
        <form class="row col-lg-12" action="" method="post">
            <input type="hidden" name="_tocken" value="<?=Session::$tocken; ?>">

            <div class="col-md-12 row">
                <div class="col-md-6">
                    <div class="card">
                        <h5 class="card-header">--- Админ аккаунт ---</h5>
                        <div class="card-body">
                            <blockquote class="blockquote">
                                <p class="mb-0">Для смены просто введите новые данные.</p>
                            </blockquote>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Логин:</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="login" placeholder="Введите новый логин">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Пароль:</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="password" placeholder="Введите новый пароль">
                                </div>
                            </div>
                            <button type="submit" name="yes" class="btn btn-block btn-lighten-info">Сохранить</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php require_once(ROOT . "/views/admin/layouts/_footer_adm.php"); ?>