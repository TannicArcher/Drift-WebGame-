<?php require_once(ROOT . "/views/" . LANG . "/layouts/_header_home.php"); ?>

<?php if ($this->usid) : ?>
    <section class="section section-lg bg-default">
        <div class="section-wave">
            <svg height="46px" preserveaspectratio="none" viewbox="0 0 1920 46" width="1920px" x="0px" y="0px">
                <path d="M1920,0.5c-82.8,0-109.1,44-192.3,44c-78.8,0-116.2-44-191.7-44c-77.1,0-115.9,44-192,44c-78.2,0-114.6-44-192-44c-78.4,0-115.3,44-192,44c-76.9-0.1-119-44-192-44c-77,0-115.2,44-192,44c-73.6,0-114-44-190.9-44c-78.5,0-117.2,44-194.1,44c-75.9,0-113-44-191-44V46h1920V0.5z"></path>
            </svg>
        </div>
        <div class="container text-center">
            <div class="row justify-content-sm-center">
                <div class="col-md-10 col-xl-8">
                    <h3>
                        Добавление отзыва
                    </h3>
                    <hr class="divider divider-left divider-default modal-hr">
                    <form action="" method="POST" class="form">
                        <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">
<!--                    <form class="rd-mailform mt-15" id="form-reviews" name="form-reviews">-->
                        <div class="row row-20">
                            <div class="col-sm-12">
                                <div class="form-wrap">
                                    <textarea class="form-input reviews-textarea" id="review-text" maxlength="750" name="text" placeholder="Опишите причины по которым Вы любите Drift, мы рады каждому отзыву!" required=""></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 offset-custom-4">
                                <div class="form-button text-center">
                                    <button class="button button-secondary button-nina" type="submit">Отправить отзыв
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

    <section class="section section-lg bg-gray-lighter">
        <div class="section-wave">
            <svg height="46px" preserveaspectratio="none" viewbox="0 0 1920 46" width="1920px" x="0px" y="0px">
                <path d="M1920,0.5c-82.8,0-109.1,44-192.3,44c-78.8,0-116.2-44-191.7-44c-77.1,0-115.9,44-192,44c-78.2,0-114.6-44-192-44c-78.4,0-115.3,44-192,44c-76.9-0.1-119-44-192-44c-77,0-115.2,44-192,44c-73.6,0-114-44-190.9-44c-78.5,0-117.2,44-194.1,44c-75.9,0-113-44-191-44V46h1920V0.5z"></path>
            </svg>
        </div>
        <div class="container container-bigger">
            <div class="row row-ten row-50 justify-content-md-center justify-content-xl-between" data-section="reviews-list">
                <div class="col-lg-12 text-center">
                    <h4 class="modal-title">
                        Отзывы пользователей
                    </h4>
                    <hr class="divider divider-left divider-default modal-hr">
                </div>
                <div class="col-md-12 blog-masonry-column row">
                    <?php foreach ($feedbacks as $feedback) : ?>

                        <article class="post-blog col-md-5" data-id="<?= $feedback['id']; ?>" data-p="<?= $feedback['date_add']; ?>">
                            <div class="post-blog-caption">
                                <div class="post-blog-caption-body">
                                    <div class="quote-classic-header">
                                        <img class="quote-classic-image" src="/public/account/assets/images/avatars/avatar-none.png">
                                        <div class="quote-classic-meta">
                                            <p class="quote-classic-cite"><?= $feedback['user']; ?></p>
                                            <p class="quote-classic-small">Пользователь</p>
                                        </div>
                                    </div>
                                    <div class="quote-boxed-text">
                                        <?= $feedback['text']; ?>
                                    </div>
                                </div>
                                <div class="post-blog-caption-footer reviews-footer">
                                    <time>
                                        <span aria-hidden="true" class="icon novi-icon icon-md-middle icon-gray-1 far fa-calendar-alt"></span>
                                        <?= date("d.m.Y", $feedback['date_add']); ?>
                                    </time>
                                    <span>#<?= $feedback['id']; ?></span>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
                <?php if (isset($navigation)) : ?>
                    <div class="container">
                        <div class="col-md-12 text-center" style="padding-bottom:50px;">
                            <?= $navigation; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>


    <section class="organic-farm-2 sec-space-bottom" style="margin-top:50px;">

        <img alt="" src="/assets/desing/img/extra/sec-img-7.png" class="left-bottom-img"/>
        <img alt="" src="/assets/desing/img/extra/sec-img-8.png" class="right-top-img"/>

        <div class="title-wrap" style="margin-bottom: 5px;">
            <h4 class="sub-title"> пользователи пишут </h4>
            <h2 class="section-title">
                <span class="round-shape">   <strong> отзывы <img src="/assets/desing/img/icons/logo-icon.png" alt=""></strong> </span>
            </h2>
        </div>

        <div class="container txt">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center" style="margin-top:10px;">
                    <h3 class="fsz-16" style="margin-top:0px;margin-bottom: 0;font-size:13px;">
                        <i class="fa fa-star fb-star"></i>
                        <i class="fa fa-star fb-star"></i>
                        <i class="fa fa-star fb-star"></i>
                        <span class="light-font">Мы </span> <strong>на форумах: </strong>
                        <i class="fa fa-star fb-star"></i>
                        <i class="fa fa-star fb-star"></i>
                        <i class="fa fa-star fb-star"></i>
                    </h3>
                    <span class="divider-2 crl-bg"></span>

                    <div class="block-inline pera">
                        <a href="#" target="_blank"><img src="https://via.placeholder.com/88x31"></a>
                        <a href="#" target="_blank"><img src="https://via.placeholder.com/88x31"></a>
                        <a href="#" target="_blank"><img src="https://via.placeholder.com/88x31"></a>
                        <a href="#" target="_blank"><img src="https://via.placeholder.com/88x31"></a>

                    </div>

                    <h3 class="fsz-16" style="margin-top: 20px;margin-bottom: 0;font-size:13px;">
                        <i class="fa fa-star fb-star"></i>
                        <i class="fa fa-star fb-star"></i>
                        <i class="fa fa-star fb-star"></i>
                        <span class="light-font">Мы </span> <strong>на мониторингах: </strong>
                        <i class="fa fa-star fb-star"></i>
                        <i class="fa fa-star fb-star"></i>
                        <i class="fa fa-star fb-star"></i>
                    </h3>
                    <span class="divider-2 crl-bg"></span>

                    <div class="block-inline pera">
                        <a href="#" target="_blank"><img src="https://via.placeholder.com/88x31"></a>
                        <a href="#" target="_blank"><img src="https://via.placeholder.com/88x31"></a>
                        <a href="#" target="_blank"><img src="https://via.placeholder.com/88x31"></a>
                        <a href="#" target="_blank"><img src="https://via.placeholder.com/88x31"></a>
                    </div>
                    <div class="divider-full-1"></div>
                </div>
            </div>

            <?php if ($this->usid) : ?>

                <style>
                    .textarea {
                        font-family: Roboto;
                        font-size: 13px;
                        font-weight: 400;
                        position: relative;
                        display: inline-block;
                        height: 108px;
                        padding: 13px;
                        resize: vertical;
                        border: 2px solid #d9e2eb;
                        border-radius: 2px;
                        outline: none;
                        -ms-touch-action: manipulation;
                        touch-action: manipulation;
                    }

                    .textarea::-webkit-input-placeholder {
                        opacity: 1;
                        color: #a5b8cc;
                    }

                    .textarea::-moz-placeholder {
                        opacity: 1;
                        color: #a5b8cc;
                    }

                    .textarea:-ms-input-placeholder {
                        opacity: 1;
                        color: #a5b8cc;
                    }

                    .textarea::placeholder {
                        opacity: 1;
                        color: #a5b8cc;
                    }

                    .textarea_fullwidth {
                        width: 100%;
                    }
                </style>

                <div class="container">
                    <div class="title-wrap" style="margin-bottom: 5px;">
                        <h4 class="sub-title"> Добавь свой отзыв </h4>
                    </div>
                    <form action="" method="POST" class="form"  onsubmit="return false">
                        <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">
                        <div class="form__row row">
                            <div class="col-md-12">
                                <textarea name="text" class="textarea textarea_fullwidth" maxlength="750" placeholder="Введите текст отзыва, 80 - 750 символов"></textarea>
                            </div>
                        </div>
                        <div class="form__row row">
                            <div class="col-md-12">
                                <button class="btn btn" type="submit" style="float:right; width: 100%;">
                                    <span class="btn__text">Добавить отзыв</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            <?php endif; ?>

            <div class="row masonry" style="margin-top:50px;">
                <?php foreach ($feedbacks as $feedback) : ?>
                    <div class="col-md-6 col-sm-12 item">
                        <div class="inner">
                            <span class="fa fa-quote-left"></span>
                            <div class="feedback-body">
                                <p>«<?= $feedback['text']; ?>»</p>
                            </div>
                            <div class="testi-img">
                                <a><img src="/assets/images/nouser.png"></a>
                                <div class="name"><?= $feedback['user']; ?></div>
                                <div class="subheader green">
                                    <i class="fa fa-clock-o"></i> <?= date("d.m.Y", $feedback['date_add']); ?></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if (isset($navigation)) : ?>
                <div class="container">
                    <div class="col-md-12 text-center" style="padding-bottom:50px;">
                        <?= $navigation; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

<?php require_once(ROOT . "/views/" . LANG . "/layouts/_footer.php"); ?>