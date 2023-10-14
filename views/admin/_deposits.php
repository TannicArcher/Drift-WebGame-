<?php require_once(ROOT . "/views/admin/layouts/_header_adm.php"); ?>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">

                    <div class="col-md-12">
                        <div class="button-list">
                            <a class="btn btn-secondary" href="/admin/deposits">История покупок</a>

                            <a class="btn btn-lighten-info" href="/admin/deposits/days">История покупок по дням</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="mt-0 header-title mb-3">История покупок</h4>

                <div class="table-responsive responsive-table-plugin">
                    <table class="table mb-0">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Пользователь</td>
                            <td>Имя</td>
                            <td>Дата операции</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($deposits as $row) : ?>

                            <tr class="htt">
                                <td><?=$row["id"]; ?></td>
                                <td><a href="/admin/users/edit/<?=$row["user_id"]; ?>" class="stn"><?=$row["user"]; ?></a></td>
                                <td><?=$row["name"]; ?></td>
                                <td><?=date("d.m.Y в H:i:s",$row["date_add"]); ?></td>
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