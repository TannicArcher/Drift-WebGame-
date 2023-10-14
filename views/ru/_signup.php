<?php require_once(ROOT . "/views/" . LANG . "/layouts/_header_login.php"); ?>

<div class="form-body without-side">
    <div class="row">
        <div class="img-holder">
            <div class="bg"></div>
            <div class="info-holder"><img src="/public/auth/images/graphic6.svg" alt=""></div>
        </div>
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items"><h3>Регистрация Аккаунта</h3>
                    <p>Заполните простую форму для бесплатной регистрации собственного аккаунта в проекте Drift.</p>
                    <div class="page-links"><a class="active">Регистрация</a> <a href="/login">Вход</a></div>
                    <form id='demo-form' action="" method="POST">
                        <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">

                        <div class="form-wrap">
                            <input class="form-control" type="text" name="reg_login" placeholder="Введите Логин" minlength="3" maxlength="20" autocomplete="off" required="">
                            <i class="fal fa-info-square form-info" aria-hidden="true"><span class="tooltiptext">Логин - это ваше уникальное имя в проекте, которое видят другие пользователи. Логин дожен состоять из 5-20 символов</span></i>
                        </div>
                        <div class="form-wrap">
                            <input class="form-control" type="email" name="reg_email" placeholder="Введите E-mail" minlength="5" maxlength="128" autocomplete="off" required="">
                            <i class="fal fa-info-square form-info" aria-hidden="true"><span class="tooltiptext">Введите существующий E-mail адрес для восстановления пароля в случае его утраты</span></i>
                        </div>
                        <div class="form-wrap">
                            <input class="form-control" type="password" name="reg_pass" placeholder="Введите Пароль" minlength="5" autocomplete="off" required="">
                            <i class="fal fa-info-square form-info" aria-hidden="true"><span class="tooltiptext">Введите пароль, который будет использоваться для входа в ваш аккаунт в проекте Drift</span></i>
                        </div>
                        <div class="form-wrap">
                            <input class="form-control" type="password" name="reg_re_pass" placeholder="Повторите Пароль" minlength="5" autocomplete="off" required="">
                            <i class="fal fa-info-square form-info" aria-hidden="true"><span class="tooltiptext">Введите свой пароль еще раз, что-бы убедиться в том что они совпадают</span></i>
                        </div>
                        <div class="form-button reg">
                            <button type="submit" class="ibtn btn-block">
                                <i class="fas fa-user-plus" aria-hidden="true"></i> Создать аккаунт
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
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