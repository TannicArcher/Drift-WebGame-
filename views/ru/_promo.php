<?php require_once(ROOT . "/views/" . LANG . "/layouts/_header_cabinet.php"); ?>

    <div class="dt-content">
        <script>
            if(typeof lang === 'undefined') lang = {};lang['link-bufer'] = 'Ссылка скопирована в буфер обмена';
        </script>
        <div class="dt-page__header">
            <h1 class="dt-page__title">
                Рекламные материалы
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="dt-card taxi-card mb-5 mt-0">
                    <div class="dt-card__body partner-card-2 partner-link-card partner-sc1">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="partner-label">
                                    Ваша реферальная ссылка:
                                </div>
                                <div class="input-group mb-0">
                                    <input class="form-control partner-link" readonly="readonly" type="text" value="<?= $ref_link; ?>">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" type="button"><i class="fas fa-copy"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="adsense" style="position:absolute;left:-9999px;">
                    Adblock detector
                </div>
                <div class="alert alert-danger info-box m-b-20 adblock-message" id="promoblockmess">
                    <i aria-hidden="true" class="far fa-exclamation-triangle"></i><b>Внимание!</b> У Вас включен AdBlock, либо подобное расширение скрывающее рекламу, к сожалению по ошибке оно блокирует отображение наших прекрасных баннеров, пожалуйста, отключите его, чтобы увидеть и использовать их для своих нужд.
                </div>
                <div class="card modal-card m-b-0">
                    <div class="promo-header d-flex promo-ban-list">
                        <div class="title m-t-7">
                            Язык баннера:
                        </div>
                        <ul class="card-header-pills nav nav-pills ml-7" role="tablist">
                            <li class="nav-item">
                                <a aria-controls="promo-ru" aria-selected="true" class="nav-link active show" data-toggle="tab" href="#promo-ru" role="tab">Русский</a>
                            </li>
                            <li class="nav-item">
                                <a aria-controls="promo-en" aria-selected="false" class="nav-link" data-toggle="tab" href="#promo-en" role="tab">English</a>
                            </li>
                            <li class="nav-item">
                                <a aria-controls="promo-es" aria-selected="false" class="nav-link" data-toggle="tab" href="#promo-es" role="tab">Español</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="promo-ru">
                            <div class="card-body p-0">
                                <div class="tabs-container tabs-vertical promo-tabs">
                                    <ul class="nav nav-tabs flex-column" role="tablist">
                                        <li class="nav-item">
                                            <a aria-controls="ru-728x90" aria-selected="true" class="nav-link" data-toggle="tab" href="#ru-728x90" role="tab">728x90</a>
                                        </li>
                                        <li class="nav-item">
                                            <a aria-controls="ru-468x60" aria-selected="true" class="nav-link active" data-toggle="tab" href="#ru-468x60" role="tab">468x60</a>
                                        </li>
                                        <li class="nav-item">
                                            <a aria-controls="ru-300x300" aria-selected="true" class="nav-link" data-toggle="tab" href="#ru-300x300" role="tab">300x300</a>
                                        </li>
                                        <li class="nav-item">
                                            <a aria-controls="ru-250x250" aria-selected="true" class="nav-link" data-toggle="tab" href="#ru-250x250" role="tab">250x250</a>
                                        </li>
                                        <li class="nav-item">
                                            <a aria-controls="ru-240x400" aria-selected="true" class="nav-link" data-toggle="tab" href="#ru-240x400" role="tab">240x400</a>
                                        </li>
                                        <li class="nav-item">
                                            <a aria-controls="ru-200x300" aria-selected="true" class="nav-link" data-toggle="tab" href="#ru-200x300" role="tab">200x300</a>
                                        </li>
                                        <li class="nav-item">
                                            <a aria-controls="ru-200x200" aria-selected="true" class="nav-link" data-toggle="tab" href="#ru-200x200" role="tab">200x200</a>
                                        </li>
                                        <li class="nav-item">
                                            <a aria-controls="ru-125x125" aria-selected="true" class="nav-link" data-toggle="tab" href="#ru-125x125" role="tab">125x125</a>
                                        </li>
                                        <li class="nav-item">
                                            <a aria-controls="ru-100x100" aria-selected="true" class="nav-link" data-toggle="tab" href="#ru-100x100" role="tab">100x100</a>
                                        </li>
                                        <li class="nav-item">
                                            <a aria-controls="ru-88x31" aria-selected="true" class="nav-link" data-toggle="tab" href="#ru-88x31" role="tab">88x31</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane" id="ru-728x90">
                                            <div class="card-body">
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/1/728x90.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 297 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/1/728x90.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>


                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/1/728x90.gif"><i class="fas fa-download"></i> Скачать баннер [297 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/2/728x90.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 289 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/2/728x90.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/2/728x90.gif"><i class="fas fa-download"></i> Скачать баннер [289 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/3/728x90.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 35 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/3/728x90.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/3/728x90.png"><i class="fas fa-download"></i> Скачать баннер [35 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/4/728x90.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 131 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/4/728x90.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/4/728x90.png"><i class="fas fa-download"></i> Скачать баннер [131 kb]</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane active" id="ru-468x60">
                                            <div class="card-body">
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/1/468x60.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 146 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/1/468x60.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/1/468x60.gif"><i class="fas fa-download"></i> Скачать баннер [146 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/2/468x60.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 229 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/2/468x60.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/2/468x60.gif"><i class="fas fa-download"></i> Скачать баннер [229 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/3/468x60.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 25 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/3/468x60.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/3/468x60.png"><i class="fas fa-download"></i> Скачать баннер [25 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/4/468x60.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 68 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/4/468x60.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/4/468x60.png"><i class="fas fa-download"></i> Скачать баннер [68 kb]</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="ru-300x300">
                                            <div class="card-body">
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/1/300x300.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 283 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/1/300x300.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/1/300x300.gif"><i class="fas fa-download"></i> Скачать баннер [283 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/2/300x300.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 289 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/2/300x300.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/2/300x300.gif"><i class="fas fa-download"></i> Скачать баннер [289 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/3/300x300.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 45 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/3/300x300.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/3/300x300.png"><i class="fas fa-download"></i> Скачать баннер [45 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/4/300x300.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 157 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/4/300x300.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/4/300x300.png"><i class="fas fa-download"></i> Скачать баннер [157 kb]</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="ru-250x250">
                                            <div class="card-body">
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/1/250x250.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 238 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/1/250x250.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/1/250x250.gif"><i class="fas fa-download"></i> Скачать баннер [238 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/2/250x250.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 290 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/2/250x250.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/2/250x250.gif"><i class="fas fa-download"></i> Скачать баннер [290 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/3/250x250.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 43 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/3/250x250.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/3/250x250.png"><i class="fas fa-download"></i> Скачать баннер [43 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/4/250x250.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 118 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/4/250x250.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/4/250x250.png"><i class="fas fa-download"></i> Скачать баннер [118 kb]</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="ru-240x400">
                                            <div class="card-body">
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/1/240x400.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 293 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/1/240x400.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/1/240x400.gif"><i class="fas fa-download"></i> Скачать баннер [293 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/2/240x400.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 291 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/2/240x400.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/2/240x400.gif"><i class="fas fa-download"></i> Скачать баннер [291 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/3/240x400.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 49 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/3/240x400.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/3/240x400.png"><i class="fas fa-download"></i> Скачать баннер [49 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/4/240x400.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 175 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/4/240x400.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/4/240x400.png"><i class="fas fa-download"></i> Скачать баннер [175 kb]</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="ru-200x300">
                                            <div class="card-body">
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/1/200x300.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 245 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/1/200x300.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/1/200x300.gif"><i class="fas fa-download"></i> Скачать баннер [245 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/2/200x300.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 288 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/2/200x300.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/2/200x300.gif"><i class="fas fa-download"></i> Скачать баннер [288 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/3/200x300.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 33 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/3/200x300.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/3/200x300.png"><i class="fas fa-download"></i> Скачать баннер [33 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/4/200x300.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 101 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/4/200x300.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/4/200x300.png"><i class="fas fa-download"></i> Скачать баннер [101 kb]</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="ru-200x200">
                                            <div class="card-body">
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/1/200x200.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 169 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/1/200x200.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/1/200x200.gif"><i class="fas fa-download"></i> Скачать баннер [169 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/2/200x200.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 241 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/2/200x200.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/2/200x200.gif"><i class="fas fa-download"></i> Скачать баннер [241 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/3/200x200.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 28 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/3/200x200.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/3/200x200.png"><i class="fas fa-download"></i> Скачать баннер [28 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/4/200x200.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 84 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/4/200x200.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/4/200x200.png"><i class="fas fa-download"></i> Скачать баннер [84 kb]</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="ru-125x125">
                                            <div class="card-body">
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/1/125x125.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 84 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/1/125x125.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/1/125x125.gif"><i class="fas fa-download"></i> Скачать баннер [84 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/2/125x125.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 180 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/2/125x125.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/2/125x125.gif"><i class="fas fa-download"></i> Скачать баннер [180 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/3/125x125.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 16 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/3/125x125.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/3/125x125.png"><i class="fas fa-download"></i> Скачать баннер [16 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/4/125x125.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 50 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/4/125x125.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/4/125x125.png"><i class="fas fa-download"></i> Скачать баннер [50 kb]</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="ru-100x100">
                                            <div class="card-body">
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/1/100x100.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 62 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/1/100x100.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/1/100x100.gif"><i class="fas fa-download"></i> Скачать баннер [62 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/2/100x100.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 109 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/2/100x100.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/2/100x100.gif"><i class="fas fa-download"></i> Скачать баннер [109 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/3/100x100.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 14 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/3/100x100.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/3/100x100.png"><i class="fas fa-download"></i> Скачать баннер [14 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/4/100x100.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 35 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/4/100x100.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/4/100x100.png"><i class="fas fa-download"></i> Скачать баннер [35 kb]</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="ru-88x31">
                                            <div class="card-body">
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/1/88x31.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 32 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/1/88x31.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/1/88x31.gif"><i class="fas fa-download"></i> Скачать баннер [32 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/2/88x31.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 70 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/2/88x31.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/2/88x31.gif"><i class="fas fa-download"></i> Скачать баннер [70 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/3/88x31.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 6 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/3/88x31.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/3/88x31.png"><i class="fas fa-download"></i> Скачать баннер [6 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/ru/4/88x31.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 24 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/ru/4/88x31.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/ru/4/88x31.png"><i class="fas fa-download"></i> Скачать баннер [24 kb]</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="promo-en">
                            <div class="card-body p-0">
                                <div class="tabs-container tabs-vertical promo-tabs">
                                    <ul class="nav nav-tabs flex-column" role="tablist">
                                        <li class="nav-item">
                                            <a aria-controls="en-728x90" aria-selected="true" class="nav-link" data-toggle="tab" href="#en-728x90" role="tab">728x90</a>
                                        </li>
                                        <li class="nav-item">
                                            <a aria-controls="en-468x60" aria-selected="true" class="nav-link active" data-toggle="tab" href="#en-468x60" role="tab">468x60</a>
                                        </li>
                                        <li class="nav-item">
                                            <a aria-controls="en-300x300" aria-selected="true" class="nav-link" data-toggle="tab" href="#en-300x300" role="tab">300x300</a>
                                        </li>
                                        <li class="nav-item">
                                            <a aria-controls="en-250x250" aria-selected="true" class="nav-link" data-toggle="tab" href="#en-250x250" role="tab">250x250</a>
                                        </li>
                                        <li class="nav-item">
                                            <a aria-controls="en-240x400" aria-selected="true" class="nav-link" data-toggle="tab" href="#en-240x400" role="tab">240x400</a>
                                        </li>
                                        <li class="nav-item">
                                            <a aria-controls="en-200x300" aria-selected="true" class="nav-link" data-toggle="tab" href="#en-200x300" role="tab">200x300</a>
                                        </li>
                                        <li class="nav-item">
                                            <a aria-controls="en-200x200" aria-selected="true" class="nav-link" data-toggle="tab" href="#en-200x200" role="tab">200x200</a>
                                        </li>
                                        <li class="nav-item">
                                            <a aria-controls="en-125x125" aria-selected="true" class="nav-link" data-toggle="tab" href="#en-125x125" role="tab">125x125</a>
                                        </li>
                                        <li class="nav-item">
                                            <a aria-controls="en-100x100" aria-selected="true" class="nav-link" data-toggle="tab" href="#en-100x100" role="tab">100x100</a>
                                        </li>
                                        <li class="nav-item">
                                            <a aria-controls="en-88x31" aria-selected="true" class="nav-link" data-toggle="tab" href="#en-88x31" role="tab">88x31</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane" id="en-728x90">
                                            <div class="card-body">
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/1/728x90.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 256 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/1/728x90.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/1/728x90.gif"><i class="fas fa-download"></i> Скачать баннер [256 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/2/728x90.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 278 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/2/728x90.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/2/728x90.gif"><i class="fas fa-download"></i> Скачать баннер [278 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/3/728x90.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 35 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/3/728x90.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/3/728x90.png"><i class="fas fa-download"></i> Скачать баннер [35 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/4/728x90.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 131 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/4/728x90.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/4/728x90.png"><i class="fas fa-download"></i> Скачать баннер [131 kb]</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane active" id="en-468x60">
                                            <div class="card-body">
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/1/468x60.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 137 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/1/468x60.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/1/468x60.gif"><i class="fas fa-download"></i> Скачать баннер [137 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/2/468x60.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 234 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/2/468x60.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/2/468x60.gif"><i class="fas fa-download"></i> Скачать баннер [234 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/3/468x60.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 24 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/3/468x60.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/3/468x60.png"><i class="fas fa-download"></i> Скачать баннер [24 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/4/468x60.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 68 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/4/468x60.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/4/468x60.png"><i class="fas fa-download"></i> Скачать баннер [68 kb]</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="en-300x300">
                                            <div class="card-body">
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/1/300x300.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 282 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/1/300x300.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/1/300x300.gif"><i class="fas fa-download"></i> Скачать баннер [282 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/2/300x300.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 294 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/2/300x300.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/2/300x300.gif"><i class="fas fa-download"></i> Скачать баннер [294 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/3/300x300.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 45 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/3/300x300.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/3/300x300.png"><i class="fas fa-download"></i> Скачать баннер [45 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/4/300x300.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 157 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/4/300x300.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/4/300x300.png"><i class="fas fa-download"></i> Скачать баннер [157 kb]</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="en-250x250">
                                            <div class="card-body">
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/1/250x250.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 214 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/1/250x250.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/1/250x250.gif"><i class="fas fa-download"></i> Скачать баннер [214 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/2/250x250.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 276 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/2/250x250.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/2/250x250.gif"><i class="fas fa-download"></i> Скачать баннер [276 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/3/250x250.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 42 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/3/250x250.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/3/250x250.png"><i class="fas fa-download"></i> Скачать баннер [42 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/4/250x250.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 118 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/4/250x250.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/4/250x250.png"><i class="fas fa-download"></i> Скачать баннер [118 kb]</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="en-240x400">
                                            <div class="card-body">
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/1/240x400.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 291 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/1/240x400.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/1/240x400.gif"><i class="fas fa-download"></i> Скачать баннер [291 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/2/240x400.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 289 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/2/240x400.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/2/240x400.gif"><i class="fas fa-download"></i> Скачать баннер [289 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/3/240x400.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 49 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/3/240x400.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/3/240x400.png"><i class="fas fa-download"></i> Скачать баннер [49 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/4/240x400.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 175 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/4/240x400.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/4/240x400.png"><i class="fas fa-download"></i> Скачать баннер [175 kb]</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="en-200x300">
                                            <div class="card-body">
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/1/200x300.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 231 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/1/200x300.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/1/200x300.gif"><i class="fas fa-download"></i> Скачать баннер [231 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/2/200x300.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 291 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/2/200x300.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/2/200x300.gif"><i class="fas fa-download"></i> Скачать баннер [291 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/3/200x300.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 32 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/3/200x300.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/3/200x300.png"><i class="fas fa-download"></i> Скачать баннер [32 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/4/200x300.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 100 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/4/200x300.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/4/200x300.png"><i class="fas fa-download"></i> Скачать баннер [100 kb]</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="en-200x200">
                                            <div class="card-body">
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/1/200x200.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 152 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/1/200x200.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/1/200x200.gif"><i class="fas fa-download"></i> Скачать баннер [152 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/2/200x200.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 227 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/2/200x200.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/2/200x200.gif"><i class="fas fa-download"></i> Скачать баннер [227 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/3/200x200.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 24 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/3/200x200.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/3/200x200.png"><i class="fas fa-download"></i> Скачать баннер [24 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/4/200x200.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 83 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/4/200x200.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/4/200x200.png"><i class="fas fa-download"></i> Скачать баннер [83 kb]</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="en-125x125">
                                            <div class="card-body">
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/1/125x125.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 75 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/1/125x125.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/1/125x125.gif"><i class="fas fa-download"></i> Скачать баннер [75 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/2/125x125.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 164 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/2/125x125.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/2/125x125.gif"><i class="fas fa-download"></i> Скачать баннер [164 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/3/125x125.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 15 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/3/125x125.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/3/125x125.png"><i class="fas fa-download"></i> Скачать баннер [15 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/4/125x125.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 49 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/4/125x125.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/4/125x125.png"><i class="fas fa-download"></i> Скачать баннер [49 kb]</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="en-100x100">
                                            <div class="card-body">
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/1/100x100.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 55 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/1/100x100.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/1/100x100.gif"><i class="fas fa-download"></i> Скачать баннер [55 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/2/100x100.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 109 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/2/100x100.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/2/100x100.gif"><i class="fas fa-download"></i> Скачать баннер [109 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/3/100x100.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 13 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/3/100x100.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/3/100x100.png"><i class="fas fa-download"></i> Скачать баннер [13 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/4/100x100.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 37 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/4/100x100.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/4/100x100.png"><i class="fas fa-download"></i> Скачать баннер [37 kb]</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="en-88x31">
                                            <div class="card-body">
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/1/88x31.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 31 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/1/88x31.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/1/88x31.gif"><i class="fas fa-download"></i> Скачать баннер [31 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/2/88x31.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 69 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/2/88x31.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/2/88x31.gif"><i class="fas fa-download"></i> Скачать баннер [69 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/3/88x31.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 6 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/3/88x31.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/3/88x31.png"><i class="fas fa-download"></i> Скачать баннер [6 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/en/4/88x31.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 24 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/en/4/88x31.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/en/4/88x31.png"><i class="fas fa-download"></i> Скачать баннер [24 kb]</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="promo-es">
                            <div class="card-body p-0">
                                <div class="tabs-container tabs-vertical promo-tabs">
                                    <ul class="nav nav-tabs flex-column" role="tablist">
                                        <li class="nav-item">
                                            <a aria-controls="es-728x90" aria-selected="true" class="nav-link" data-toggle="tab" href="#es-728x90" role="tab">728x90</a>
                                        </li>
                                        <li class="nav-item">
                                            <a aria-controls="es-468x60" aria-selected="true" class="nav-link active" data-toggle="tab" href="#es-468x60" role="tab">468x60</a>
                                        </li>
                                        <li class="nav-item">
                                            <a aria-controls="es-300x300" aria-selected="true" class="nav-link" data-toggle="tab" href="#es-300x300" role="tab">300x300</a>
                                        </li>
                                        <li class="nav-item">
                                            <a aria-controls="es-250x250" aria-selected="true" class="nav-link" data-toggle="tab" href="#es-250x250" role="tab">250x250</a>
                                        </li>
                                        <li class="nav-item">
                                            <a aria-controls="es-240x400" aria-selected="true" class="nav-link" data-toggle="tab" href="#es-240x400" role="tab">240x400</a>
                                        </li>
                                        <li class="nav-item">
                                            <a aria-controls="es-200x300" aria-selected="true" class="nav-link" data-toggle="tab" href="#es-200x300" role="tab">200x300</a>
                                        </li>
                                        <li class="nav-item">
                                            <a aria-controls="es-200x200" aria-selected="true" class="nav-link" data-toggle="tab" href="#es-200x200" role="tab">200x200</a>
                                        </li>
                                        <li class="nav-item">
                                            <a aria-controls="es-125x125" aria-selected="true" class="nav-link" data-toggle="tab" href="#es-125x125" role="tab">125x125</a>
                                        </li>
                                        <li class="nav-item">
                                            <a aria-controls="es-100x100" aria-selected="true" class="nav-link" data-toggle="tab" href="#es-100x100" role="tab">100x100</a>
                                        </li>
                                        <li class="nav-item">
                                            <a aria-controls="es-88x31" aria-selected="true" class="nav-link" data-toggle="tab" href="#es-88x31" role="tab">88x31</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane" id="es-728x90">
                                            <div class="card-body">
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/1/728x90.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 259 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/1/728x90.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/1/728x90.gif"><i class="fas fa-download"></i> Скачать баннер [259 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/2/728x90.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 284 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/2/728x90.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/2/728x90.gif"><i class="fas fa-download"></i> Скачать баннер [284 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/3/728x90.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 36 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/3/728x90.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/3/728x90.png"><i class="fas fa-download"></i> Скачать баннер [36 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/4/728x90.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 131 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/4/728x90.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/4/728x90.png"><i class="fas fa-download"></i> Скачать баннер [131 kb]</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane active" id="es-468x60">
                                            <div class="card-body">
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/1/468x60.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 139 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/1/468x60.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/1/468x60.gif"><i class="fas fa-download"></i> Скачать баннер [139 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/2/468x60.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 218 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/2/468x60.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/2/468x60.gif"><i class="fas fa-download"></i> Скачать баннер [218 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/3/468x60.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 26 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/3/468x60.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/3/468x60.png"><i class="fas fa-download"></i> Скачать баннер [26 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/4/468x60.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 68 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/4/468x60.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/4/468x60.png"><i class="fas fa-download"></i> Скачать баннер [68 kb]</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="es-300x300">
                                            <div class="card-body">
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/1/300x300.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 284 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/1/300x300.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/1/300x300.gif"><i class="fas fa-download"></i> Скачать баннер [284 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/2/300x300.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 296 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/2/300x300.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/2/300x300.gif"><i class="fas fa-download"></i> Скачать баннер [296 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/3/300x300.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 47 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/3/300x300.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/3/300x300.png"><i class="fas fa-download"></i> Скачать баннер [47 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/4/300x300.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 157 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/4/300x300.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/4/300x300.png"><i class="fas fa-download"></i> Скачать баннер [157 kb]</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="es-250x250">
                                            <div class="card-body">
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/1/250x250.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 217 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/1/250x250.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/1/250x250.gif"><i class="fas fa-download"></i> Скачать баннер [217 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/2/250x250.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 276 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/2/250x250.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/2/250x250.gif"><i class="fas fa-download"></i> Скачать баннер [276 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/3/250x250.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 45 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/3/250x250.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/3/250x250.png"><i class="fas fa-download"></i> Скачать баннер [45 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/4/250x250.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 118 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/4/250x250.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/4/250x250.png"><i class="fas fa-download"></i> Скачать баннер [118 kb]</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="es-240x400">
                                            <div class="card-body">
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/1/240x400.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 295 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/1/240x400.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/1/240x400.gif"><i class="fas fa-download"></i> Скачать баннер [295 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/2/240x400.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 296 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/2/240x400.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/2/240x400.gif"><i class="fas fa-download"></i> Скачать баннер [296 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/3/240x400.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 50 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/3/240x400.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/3/240x400.png"><i class="fas fa-download"></i> Скачать баннер [50 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/4/240x400.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 173 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/4/240x400.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/4/240x400.png"><i class="fas fa-download"></i> Скачать баннер [173 kb]</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="es-200x300">
                                            <div class="card-body">
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/1/200x300.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 233 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/1/200x300.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/1/200x300.gif"><i class="fas fa-download"></i> Скачать баннер [233 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/2/200x300.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 297 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/2/200x300.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/2/200x300.gif"><i class="fas fa-download"></i> Скачать баннер [297 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/3/200x300.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 34 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/3/200x300.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/3/200x300.png"><i class="fas fa-download"></i> Скачать баннер [34 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/4/200x300.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 99 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/4/200x300.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/4/200x300.png"><i class="fas fa-download"></i> Скачать баннер [99 kb]</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="es-200x200">
                                            <div class="card-body">
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/1/200x200.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 154 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/1/200x200.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/1/200x200.gif"><i class="fas fa-download"></i> Скачать баннер [154 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/2/200x200.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 226 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/2/200x200.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/2/200x200.gif"><i class="fas fa-download"></i> Скачать баннер [226 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/3/200x200.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 26 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/3/200x200.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/3/200x200.png"><i class="fas fa-download"></i> Скачать баннер [26 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/4/200x200.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 83 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/4/200x200.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/4/200x200.png"><i class="fas fa-download"></i> Скачать баннер [83 kb]</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="es-125x125">
                                            <div class="card-body">
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/1/125x125.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 77 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/1/125x125.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/1/125x125.gif"><i class="fas fa-download"></i> Скачать баннер [77 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/2/125x125.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 166 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/2/125x125.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/2/125x125.gif"><i class="fas fa-download"></i> Скачать баннер [166 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/3/125x125.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 16 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/3/125x125.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/3/125x125.png"><i class="fas fa-download"></i> Скачать баннер [16 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/4/125x125.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 49 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/4/125x125.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/4/125x125.png"><i class="fas fa-download"></i> Скачать баннер [49 kb]</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="es-100x100">
                                            <div class="card-body">
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/1/100x100.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 56 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/1/100x100.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/1/100x100.gif"><i class="fas fa-download"></i> Скачать баннер [56 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/2/100x100.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 110 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/2/100x100.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/2/100x100.gif"><i class="fas fa-download"></i> Скачать баннер [110 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/3/100x100.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 13 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/3/100x100.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/3/100x100.png"><i class="fas fa-download"></i> Скачать баннер [13 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/4/100x100.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 37 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/4/100x100.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/4/100x100.png"><i class="fas fa-download"></i> Скачать баннер [37 kb]</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="es-88x31">
                                            <div class="card-body">
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/1/88x31.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 31 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/1/88x31.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/1/88x31.gif"><i class="fas fa-download"></i> Скачать баннер [31 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/2/88x31.gif">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 69 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/2/88x31.gif">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/2/88x31.gif"><i class="fas fa-download"></i> Скачать баннер [69 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/3/88x31.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 6 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/3/88x31.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/3/88x31.png"><i class="fas fa-download"></i> Скачать баннер [6 kb]</a>
                                                    </div>
                                                </div>
                                                <div class="promo-box">
                                                    <img src="/public/promo/es/4/88x31.png">
                                                    <div class="promo-block promo-banner-info">
                                                        <div class="partner-label">
                                                            Ссылка на баннер:
                                                            <div class="promo-size">
                                                                Размер: 24 kb
                                                            </div>
                                                        </div>
                                                        <div class="input-group mb-0">
                                                            <input class="form-control partner-link" readonly="readonly" type="text" value="https://drifts.bar/public/promo/es/4/88x31.png">
                                                            <div class="input-group-append">
                                                                <a class="btn btn-primary border-radius-0" data-action="copy" data-original-title="Скопировать ссылку" data-placement="top" data-toggle="tooltip" href="javascript:void(0)"><i aria-hidden="true" class="fas fa-copy"></i></a>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-primary new-btn promo-ban-dwn" href="/public/promo/es/4/88x31.png"><i class="fas fa-download"></i> Скачать баннер [24 kb]</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .promo_dev {
            width: 100%;
            margin-bottom: 30px;
            margin-top: 30px;
            border: 1px solid #ddd;
            display: inline-block;
        }
    </style>

    <div class="page-content-wrapper ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 partner_cl">
                    <div class="panel panel-default">
                        <div class="panel-body text-center">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="tabs-vertical-env m-b-0">
                                        <div class="col-lg-1 text-center">
                                            <ul class="nav tabs-vertical">

                                                <li class="active">
                                                    <a href="#v-468" data-toggle="tab" aria-expanded="true">Размер: 468x60</a>
                                                </li>
                                                <li class="">
                                                    <a href="#v-200x300" data-toggle="tab" aria-expanded="false">Размер: 728x90</a>
                                                </li>
                                                <li class="">
                                                    <a href="#v-100" data-toggle="tab" aria-expanded="false">Размер: 100х100</a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="tab-content" style="width: 100%;">

                                                <div class="tab-pane active" id="v-468">
                                                    <div class="row">
                                                        <div class="promo_img">
                                                            <img src="<?= PROTOCOL; ?>://<?= HOST; ?>/assets/banners/ba468.gif">
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="promo_dev"></div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="promo_img">
                                                                <h4 class="m-b-10 m-t-0" style="color:#d20909;">Реферальные ссылки:</h4>
                                                                <h5 class="profileinfoh5">
                                                                    <b class="partner_stath5">Реф. ссылка:</b>
                                                                    <span style="float:none;margin-left: 15px;"> <?= $ref_link; ?></span>
                                                                </h5>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <span class="label label-default promo_label1">Ссылка на баннер:</span>
                                                            <div class="form-group">
                                                                <input type="text" value="<?= PROTOCOL; ?>://<?= HOST; ?>/assets/banners/ba468.gif" onClick="this.select()" class="form-control promo_input">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <a href="<?= PROTOCOL; ?>://<?= HOST; ?>/assets/banners/ba468.gif" download>
                                                                <button type="button" class="btn btn-primary btn-block promo_btn">
                                                                    <i class="fa fa-download"></i> Скачать баннер
                                                                </button>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="promo_dev"></div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="tab-pane" id="v-200x300">
                                                    <div class="row">
                                                        <div class="promo_img">
                                                            <img src="<?= PROTOCOL; ?>://<?= HOST; ?>/assets/banners/ba200.gif">

                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="promo_dev"></div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="promo_img">
                                                                <h4 class="m-b-10 m-t-0" style="color:#d20909;">Реферальные
                                                                    ссылки:</h4>
                                                                <h5 class="profileinfoh5"><b class="partner_stath5">Реф.
                                                                        ссылка:</b>
                                                                    <span style="float:none;margin-left: 15px;"> <?= $ref_link; ?></span>
                                                                </h5>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <span class="label label-default promo_label1">Ссылка на баннер:</span>
                                                            <div class="form-group">
                                                                <input type="text" value="<?= PROTOCOL; ?>://<?= HOST; ?>/assets/banners/ba200.gif" onClick="this.select()" class="form-control promo_input">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <a href="<?= PROTOCOL; ?>://<?= HOST; ?>/assets/banners/ba200.gif" download>
                                                                <button type="button" class="btn btn-primary btn-block promo_btn">
                                                                    <i class="fa fa-download"></i> Скачать баннер
                                                                </button>
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="tab-pane" id="v-100">
                                                    <div class="row">
                                                        <div class="promo_img">
                                                            <img src="<?= PROTOCOL; ?>://<?= HOST; ?>/assets/banners/ba100.gif">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="promo_dev"></div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="promo_img">
                                                                <h4 class="m-b-10 m-t-0" style="color:#d20909;">Реферальные
                                                                    ссылки:</h4>
                                                                <h5 class="profileinfoh5"><b class="partner_stath5">Реф.
                                                                        ссылка:</b>
                                                                    <span style="float:none;margin-left: 15px;"> <?= $ref_link; ?></span>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <span class="label label-default promo_label1">Ссылка на баннер:</span>
                                                            <div class="form-group">
                                                                <input type="text" value="<?= PROTOCOL; ?>://<?= HOST; ?>>/assets/banners/ba200.gif" onClick="this.select()" class="form-control promo_input">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <a href="<?= 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>/assets/banners/ba200.gif" download>
                                                                <button type="button" class="btn btn-primary btn-block promo_btn">
                                                                    <i class="fa fa-download"></i> Скачать баннер
                                                                </button>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="promo_dev"></div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end row -->
        </div><!-- container -->
    </div> <!-- Page content Wrapper -->

<?php require_once(ROOT . "/views/" . LANG . "/layouts/_footer_cabinet.php"); ?>