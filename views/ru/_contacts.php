<?php require_once(ROOT . "/views/" . LANG . "/layouts/_header_home.php"); ?>

    <section class="section section-variant-2 bg-default text-center">
        <div class="section-wave">
            <svg height="46px" preserveaspectratio="none" viewbox="0 0 1920 46" width="1920px" x="0px" y="0px">
                <path d="M1920,0.5c-82.8,0-109.1,44-192.3,44c-78.8,0-116.2-44-191.7-44c-77.1,0-115.9,44-192,44c-78.2,0-114.6-44-192-44c-78.4,0-115.3,44-192,44c-76.9-0.1-119-44-192-44c-77,0-115.2,44-192,44c-73.6,0-114-44-190.9-44c-78.5,0-117.2,44-194.1,44c-75.9,0-113-44-191-44V46h1920V0.5z"></path></svg>
        </div>
        <div class="container-wide">
            <div class="row row-50 justify-content-sm-center">
                <div class="col-xl-8 col-xxl-4">
                    <div class="box-cta box-cta-vertical">
                        <h3 class="box-cta-title">
                            Вам нужна помощь<br class="d-md">
                            по проекту?
                        </h3>
                        <p class="contact-info">
                            Наши сотрудники технической поддержки<br class="d-md">
                            ответят на все Ваши вопросы.
                        </p><a class="button button-secondary" href="https://vk.me/driftbiz" target="_blank"><i class="far fa-comments-alt"></i> Задать вопрос</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section section-variant-2 bg-gray-lighter text-center">
        <div class="container container-wide">
            <div class="row row-50 row-custom-bordered">
                <div class="col-sm-6 col-lg-3 order-lg-0 order-2">
                    <div class="counter-wrap new">
                        <span class="icon novi-icon icon-secondary far fa-mail-bulk"></span>
                        <h6 class="contacts-feat-title">
                            E-mail
                        </h6>
                        <div class="box-simple-text contacts-feat-text">
                            support@drift.biz<br>
                            English / Russian
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="counter-wrap new">
                        <span class="icon novi-icon icon-secondary fab fa-vk"></span>
                        <h6 class="contacts-feat-title">
                            VK поддержка
                        </h6><a class="btn btn-primary btn-sm contact-question" href="https://vk.me/driftbiz" role="button" target="_blank">Задать вопрос</a>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="counter-wrap new">
                        <span class="icon novi-icon icon-secondary far fa-user-headset"></span>
                        <h6 class="contacts-feat-title">
                            Live поддержка
                        </h6><a class="btn btn-primary btn-sm contact-question" href="#" onclick="TalkMe('openSupport'); return false;" role="button" target="_blank">Задать вопрос</a>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="counter-wrap new">
                        <span class="icon novi-icon icon-secondary far fa-map-marker-alt"></span>
                        <h6 class="contacts-feat-title">
                            Адрес
                        </h6>
                        <div class="box-simple-text contacts-feat-text">
                            5 Jewry Street, London<br>
                            United Kingdom EC3N 2EX
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section section-variant-2 bg-default text-center">
        <div class="container-wide">
            <div class="row row-50 justify-content-sm-center">
                <div class="col-lg-12 col-xl-9 col-xxl-6">
                    <div class="box-cta box-cta-vertical">
                        <div class="contact-company text-left">
                            <a class="gallery-item gallery-item-fullwidth" data-lightgallery="item" href="public/index/images/certificate.jpg" target="_blank"><img src="public/index/images/certificate-1.jpg"></a>
                            <h4 class="modal-title">
                                Юридическая информация
                            </h4>
                            <hr class="divider divider-left divider-default modal-hr">
                            <p>
                                Проект <?=NAME?> разработан и управляется международной компанией DRIFT GAMES LTD зарегистрированной в Великобритании по адресу 5 Jewry Street, London EC3N 2EX.
                            </p><a class="btn btn-primary company-link" href="https://beta.companieshouse.gov.uk/company/12403547" role="button" target="_blank"><i class="far fa-search"></i>Проверить регистрацию</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php require_once(ROOT . "/views/" . LANG . "/layouts/_footer.php"); ?>