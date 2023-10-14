<?php require_once(ROOT . "/views/admin/layouts/_header_adm.php"); ?>
<?= (isset($errors)) ? $errors : ''; ?>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">

                    <div class="col-md-12">
                        <div class="button-list">
                            <a class="btn btn-secondary" href="/admin/serfing">Одобренные ссылки</a>

                            <a class="btn btn-lighten-info" href="/admin/serfing/new">Новые (остановленные) ссылки</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="mt-0 header-title mb-3">Одобренные ссылки</h4>

            <div class="table-responsive responsive-table-plugin">
                <table class="table mb-0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Пользователь</th>
                        <th>План</th>
                        <th>Заголовок</th>
                        <th>Ссылка</th>
                        <th>Баланс</th>
                        <th>Операция</th>
                    </tr>
                    </thead>
                    <tbody>


                    <?php foreach($serfings as $row) : ?>

                        <tr class="htt">
                            <td><?=$row["id"]; ?></td>
                            <td><a href="/admin/users/edit/<?=$row["user_id"]; ?>" class="stn"><?=$row["user_name"]; ?></a></td>
                            <td><?=$row["name"]; ?></td>
                            <td><?=$row["title"]; ?></td>
                            <td><a href="<?=$row["url"]; ?>" target="_blank" class="stn"><?=$row["url"]; ?></a></td>
                            <td><?=$row["money"]; ?></td>
                            <td>
                                <form action="" method="POST">
                                    <input type="hidden" name="_tocken" value="<?=Session::$tocken; ?>">
                                    <input type="hidden" name="id" value="<?=$row['id']; ?>">
                                    <button type="submit" name="acept" class="btn btn-lighten-success waves-effect btn-xs  width-md">Одобрить</button>
                                    <button type="submit" name="delete" class="btn btn-lighten-danger waves-effect btn-xs  width-md">Удалить</button>
                                </form>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>

<?php echo $navigation; ?>

<?php require_once(ROOT . "/views/admin/layouts/_footer_adm.php"); ?>