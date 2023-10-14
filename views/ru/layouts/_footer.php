<footer class="section page-footer page-footer-alternative bg-gray-darker">
    <div class="container-wide">
        <div class="row row-50 justify-content-sm-center justify-content-xl-between">
            <div class="col-md-6 col-xl-4 stats">
                <img alt="" class="logo-inverse mb-35" height="51" src="/public/index/images/logo-white.png" width="130">
                <p class="footer-text">
                    <?= NAME; ?> - это не просто экономическая игра с выводом денег, а целый сервис, в котором Вы
                    сможете хорошо провести свое время и заработать.
                </p>
                <p class="footer-text">
                    Мы даем возможность заработать реальные деньги без необходимости инвестировать, а просто играя в
                    увлекательную игру.
                </p><br>
                <a href="https://megakassa.ru/" target="_blank"><img alt="Megakassa" class="megakassa" src="/public/index/images/megakassa.png"></a>
                <a href="//showstreams.tv/"><img src="//www.free-kassa.ru/img/fk_btn/16.png" title="Бесплатный видеохостинг"></a>

            </div>
            <div class="col-md-6 col-xl-4 footer-navigation">
                <h6 class="mb-35">
                    Навигация
                </h6>
                <div class="footer-list">
                    <ul>
                        <li>
                            <a href="index.htm"><i class="fal fa-angle-right"></i> Главная</a>
                        </li>
                        <li>
                            <a href="marketing.html"><i class="fal fa-angle-right"></i> Маркетинг</a>
                        </li>
                        <li>
                            <a href="contests.html"><i class="fal fa-angle-right"></i> Конкурсы</a>
                        </li>
                        <li>
                            <a href="reviews.html"><i class="fal fa-angle-right"></i> Отзывы</a>
                        </li>
                        <li>
                            <a href="payouts.html"><i class="fal fa-angle-right"></i> Выплаты</a>
                        </li>
                        <li>
                            <a href="/help"><i class="fal fa-angle-right"></i> Поддержка</a>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <a href="terms.html"><i class="fal fa-angle-right"></i> Правила проекта</a>
                        </li>
                        <li>
                            <a href="/login"><i class="fal fa-angle-right"></i>
                                Регистрация
                            </a>
                        </li>
                        <li>
                            <a href="/signup"><i class="fal fa-angle-right"></i>
                                Вход
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <h6 class="mb-35">
                    Зеркала
                </h6>
                <div class="footer-url">
                    <div class="footer-url-left">drift.biz</div>
                    <div class="footer-url-right">основной</div>
                </div>
                <div class="footer-url">
                    <div class="footer-url-left">drift.cash</div>
                    <div class="footer-url-right">зеркало</div>
                </div>
                <div class="footer-url">
                    <div class="footer-url-left">drift.farm</div>
                    <div class="footer-url-right">зеркало</div>
                </div>
                <div class="footer-url">
                    <div class="footer-url-left">drift.bar</div>
                    <div class="footer-url-right">зеркало</div>
                </div>
                <p class="footer-last-p">
                    Зеркала необходимы для поддержания работоспособности проекта в случае недоступности основного
                    адреса.
                </p>
            </div>
        </div>
        <div class="divider-xl"></div>
        <div class="row align-items-sm-center row-30 text-left">
            <div class="col-xl-8 text-xl-left footer-last-nav">
                <ul class="page-footer-inline-list">
                    <li>
                        <a href="index.htm">Главная</a>
                    </li>
                    <li>
                        <a href="marketing.html">Маркетинг</a>
                    </li>
                    <li>
                        <a href="contests.html">Конкурсы</a>
                    </li>
                    <li>
                        <a href="reviews.html">Отзывы</a>
                    </li>
                    <li>
                        <a href="payouts.html">Выплаты</a>
                    </li>
                    <li>
                        <a href="/help">Поддержка</a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-xl-4 text-center text-xl-right">
                <p class="rights">
                    <a href="https://driftgames.cc" target="_blank"><img src="/public/index/images/driftgames.png"></a>
                </p>
            </div>
        </div>
    </div>
</footer>
</div>


<script>
    if (typeof lang === 'undefined') lang = {};
    lang['footer-sum-fill'] = 'Сумма пополнений';
    lang['footer-sum-payout'] = 'Сумма выплат';
</script>
<script src="/public/index/js/core.min.js"></script>
<script src="/public/index/js/script.js"></script>
<script src="/public/account/vendors/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="/public/account/assets/js/custom/sweet-alert.js"></script>
<script src="/public/account/assets/js/custom/notification-alert.js"></script>
<!--<script src="/public/js/_core.js"></script>-->
<link href="/public/auth\css\swal.css" rel="stylesheet" type="text/css">
<script>
    window.TalkMeSetup = {language: "ru"};
</script>

<script>
    function ajaxSignup() {
        var form = $('#signup');
        form.submit(function () {'use strict',
            $.post("/signup",
                { reg_login: $('#signup_login').val(), reg_email: $('#signup_email').val(), reg_pass: $('#signup_pass').val(), reg_re_pass: $('#signup_repass').val(), _tocken: $('#signup_tocken').val(), ajax: 1 },
                function(result){

                    res = JSON.parse(result);

                    console.log(res);

                    $('#signup_tocken').val(res['new_tocken']);

                    swal(res['mess'][0], res['mess'][1], res['mess'][2]);

                });
            return false;
        });
    };
    if ($('#signup').length > 0) {
        ajaxSignup();
    }
</script>
<?php if (isset($errors) && $errors !== false) : ?>
    <script>
        setTimeout(function () {
            swal('<?=$errors[0]; ?>', '<?=$errors[1]; ?>', '<?=$errors[2]; ?>');
        }, 100);
    </script>
<?php endif; ?>


</body>
</html>