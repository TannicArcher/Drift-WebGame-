<?php require_once(ROOT . "/views/admin/layouts/_header_adm.php"); ?>



    <div class="row">
        <div class="col-xl-3 col-md-6 offset-xl-1">
            <div class="card-box widget-user">
                <div class="text-center">
                    <h2 class="font-weight-normal text-primary" data-plugin="counterup"><?=$data_stats["all_users"]; ?></h2>
                    <h5>Зарегистрировано пользователей (чел)</h5>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card-box widget-user">
                <div class="text-center">
                    <h2 class="font-weight-normal text-pink" data-plugin="counterup"><?=sprintf("%.2f",$data_stats["insert_sum"]); ?></h2>
                    <h5>Введено пользователями (руб)</h5>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card-box widget-user">
                <div class="text-center">
                    <h2 class="font-weight-normal text-warning" data-plugin="counterup"><?=sprintf("%.2f",$data_stats["payment_sum"]); ?></h2>
                    <h5>Выплачено пользователям (руб)</h5>
                </div>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-xl-3 col-md-6">
            <div class="card-box">
                <h4 class="header-title mt-0 mb-3">Денег на покупки</h4>

                <div class="widget-box-2">
                    <div class="widget-detail-2 text-right">
                        <h2 class="font-weight-normal mb-1"><?=sprintf("%.2f",$data_stats["money_b"]); ?> руб.</h2>
                        <p class="text-muted mb-3">общая сумма</p>
                    </div>
                    <div class="progress progress-bar-alt-pink progress-sm">
                        <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card-box">
                <h4 class="header-title mt-0 mb-3">Денег на вывод</h4>

                <div class="widget-box-2">
                    <div class="widget-detail-2 text-right">
                        <h2 class="font-weight-normal mb-1"><?=sprintf("%.2f",$data_stats["money_p"]); ?> руб.</h2>
                        <p class="text-muted mb-3">общая сумма</p>
                    </div>
                    <div class="progress progress-bar-alt-success progress-sm">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card-box">
                <h4 class="header-title mt-0 mb-3">Денег на рекламу</h4>

                <div class="widget-box-2">
                    <div class="widget-detail-2 text-right">
                        <h2 class="font-weight-normal mb-1"><?=sprintf("%.2f",$data_stats["money_r"]); ?> руб.</h2>
                        <p class="text-muted mb-3">общая сумма</p>
                    </div>
                    <div class="progress progress-bar-alt-primary progress-sm">
                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card-box">
                <h4 class="header-title mt-0 mb-3">Денег на кассах</h4>

                <div class="widget-box-2 text-right">
                    <div class="widget-detail-2">
                        <h2 class="font-weight-normal mb-1"><?=sprintf("%.2f",$data_stats["money_k"]); ?> руб.</h2>
                        <p class="text-muted mb-3">общая сумма</p>
                    </div>
                    <div class="progress progress-bar-alt-dark progress-sm">
                        <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

    </div>

<?php require_once(ROOT . "/views/admin/layouts/_footer_adm.php"); ?>