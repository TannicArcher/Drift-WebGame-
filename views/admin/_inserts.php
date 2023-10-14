<?php require_once(ROOT . "/views/admin/layouts/_header_adm.php"); ?>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">

                    <div class="col-md-12">
                        <div class="button-list">
                            <a class="btn btn-secondary" href="/admin/inserts">История пополнений</a>

                            <a class="btn btn-lighten-info" href="/admin/inserts/days">История пополнений по дням</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="mt-0 header-title mb-3">История пополнений</h4>

                <div class="table-responsive responsive-table-plugin">
                    <table class="table mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Пользователь</th>
                            <th>Сумма</th>
                            <th>Платёжка</th>
                            <th>Счёт</th>
                            <th>Дата операции</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($inserts as $row) : ?>
                            <tr>
                                <td><?= $row["id"]; ?></td>
                                <td><a href="/admin/users/edit/<?= $row["user_id"]; ?>"><?= $row["user"]; ?></a></td>
                                <td><?= $row["sum"]; ?></td>
                                <td><?= $row["payment_system"]; ?></td>
                                <td><?= $types[$row["type"]]; ?></td>
                                <td><?= date("d.m.Y в H:i:s", $row["date_add"]); ?></td>
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