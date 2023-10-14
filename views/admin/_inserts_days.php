<?php require_once(ROOT . "/views/admin/layouts/_header_adm.php"); ?>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">

                    <div class="col-md-12">
                        <div class="button-list">
                            <a class="btn btn-lighten-info" href="/admin/inserts">История пополнений</a>

                            <a class="btn btn-secondary" href="/admin/inserts/days">История пополнений по дням</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="mt-0 header-title mb-3">История пополнений по дням</h4>

                <div class="table-responsive responsive-table-plugin">
                    <table class="table mb-0">
                        <thead>
                        <tr>
                            <th>Дата</th>
                            <th>Пополнений</th>
                            <th>На сумму</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach($days_money as $date => $sum) : ?>

                            <tr>
                                <td><b><?=$date; ?></b></td>
                                <td><?=$days_insert[$date]; ?> шт.</td>
                                <td><?=$sum; ?> руб.</td>
                            </tr>

                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

<?php echo $navigation; ?>

<?php require_once(ROOT . "/views/admin/layouts/_footer_adm.php"); ?>