<?php require_once(ROOT . "/views/" . LANG . "/layouts/_header_login.php"); ?>

<div class="form-body without-side">
    <div class="row">
        <div class="img-holder">
            <div class="bg"></div>
            <div class="info-holder">
                <img alt="" src="/public/auth/images/graphic6.svg">
            </div>
        </div>
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>
                        Вход в Аккаунт
                    </h3>
                    <p>
                        Заполните все поля формы и нажмите кнопку «Вход» для получения доступа к Вашему аккаунту в Drift.
                    </p>
                    <div class="page-links">
                        <a class="active">Вход</a> <a href="/signup">Регистрация</a>
                    </div>
                    <form action="/login" method="POST">
                        <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">

                        <input class="form-control" name="log_email" type="text"     placeholder="Введите Логин или Email" required="">
                        <input class="form-control" name="pass"      type="password" placeholder="Введите Пароль" required="">

                        <div class="form-button">
                            <button class="ibtn" type="submit"><i aria-hidden="true" class="fas fa-sign-in-alt"></i> Вход</button>
                            <a href="/recovery">Забыли пароль?</a>
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