<?php require_once(ROOT . "/views/" . LANG . "/layouts/_header_home.php"); ?>

    <section class="section section-variant-1 bg-gray-lighter" id="cars" style="fill:#f7f7f7;">
        <div class="section-wave">
            <svg height="46px" preserveaspectratio="none" viewbox="0 0 1920 46" width="1920px" x="0px" y="0px">
                <path d="M1920,0.5c-82.8,0-109.1,44-192.3,44c-78.8,0-116.2-44-191.7-44c-77.1,0-115.9,44-192,44c-78.2,0-114.6-44-192-44c-78.4,0-115.3,44-192,44c-76.9-0.1-119-44-192-44c-77,0-115.2,44-192,44c-73.6,0-114-44-190.9-44c-78.5,0-117.2,44-194.1,44c-75.9,0-113-44-191-44V46h1920V0.5z"></path></svg>
        </div>
        <div class="container container-wide">
            <div class="row justify-content-xl-end row-30">
                <div class="col-xl-12">
                    <div class="about-car-paralax text-center">
                        <div class="parallax-text-wrap">
                            <h3>
                                Маркетинг автомобилей
                            </h3>
                        </div>
                        <hr class="divider divider-default">
                    </div>
                </div>
            </div>
            <div class="row row-30 row-xxl">
                <?php foreach ($plans as $plan) :

                    $percent = 100 - round($plan['inh']); // Необходимый процент
                    $number_percent = $plan['price'] / 100 * $percent;
                    $obr = $plan['price'] - $number_percent;
                    ?>

                    <div class="col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                        <div class="product">
                            <div class="product-title">
                                <h4 class="about-car-title">Hyundai Solaris</h4>
                                <hr class="divider divider-default about-car-divinder">
                            </div>
                            <div class="product-image">
                                <img src="public/account/assets/images/items/taxi-<?= $plan['id']; ?>.png">
                            </div>
                            <div class="product-price">
                                <h6 class="about-car-info">Раздел:</h6>
                                <div class="">
                                    <h6 class="about-car-info">Таксопарк</h6>
                                </div>
                                <h6 class="about-car-info">Скорость:</h6>
                                <div class="">
                                    <h6 class="about-car-info"><?= sprintf("%.4f", $plan['perc']); ?> руб. / час</h6>
                                </div>
                                <h6 class="about-car-info">Окупаемость:</h6>
                                <div class="">
                                    <h6 class="about-car-info"><?= round($plan['inh']); ?>% в мес.</h6>
                                </div>
                            </div>
                            <div class="product-button">
                                <a class="button button-secondary button-nina button-sm about-car-btn" href="taxi.html">Купить за <?= $plan['price']; ?> руб.</a>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </section>



<?php require_once(ROOT . "/views/" . LANG . "/layouts/_footer.php"); ?>