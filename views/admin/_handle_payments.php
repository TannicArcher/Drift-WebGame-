<?php require_once(ROOT . "/views/admin/layouts/_header_adm.php"); ?>

<?= (isset($errors)) ? $errors : ''; ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="mt-0 header-title mb-3">Заявки на выплаты</h4>

                <div class="table-responsive responsive-table-plugin">
                    <table class="table mb-0">
                        <thead>
                        <tr>
                            <th>Платёжная система</th>
                            <th>Кошелёк</th>
                            <th>Пользователь</th>
                            <th>Сумма</th>
                            <th>Дата</th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($payments as $row) : ?>
                            <tr>
                                <th><?= $paynames[$row['payment_system']]; ?></th>
                                <td><?= $row['purse']; ?></td>
                                <td><?= $row['sum']; ?></td>
                                <td><a href="/admin/users/edit/<?= $row["user_id"]; ?>" class="stn"><?= $row["user"]; ?></a> </td>
                                <td><?= date("d.m.Y H:i", $row['date_add']); ?></td>
                                <td>
                                    <form method="post" action="" style="display: inline-block;">
                                        <input type="hidden" name="batch" value="<?= $row['id']; ?>">
                                        <button type="submit" name="yes" class="btn btn-lighten-success waves-effect btn-xs  width-md">
                                            Выплачено
                                        </button>
                                    </form>
                                    <form method="post" action="" style="display: inline-block;">
                                        <input type="hidden" name="batch" value="<?= $row['id']; ?>">
                                        <button type="submit" name="no" class="btn btn-lighten-danger waves-effect btn-xs  width-md">
                                            Отклонить
                                        </button>
                                    </form>
                                </td>
                            </tr>

                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

<?php require_once(ROOT . "/views/admin/layouts/_footer_adm.php"); ?>