<?php require_once(ROOT . "/views/admin/layouts/_header_adm.php"); ?>
<?= (isset($errors)) ? $errors : ''; ?>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">

                    <div class="col-md-12">
                        <div class="button-list">
                            <a class="btn btn-secondary" href="/admin/feedback">Одобренные отзывы</a>

                            <a class="btn btn-lighten-info" href="/admin/feedback/new">Новые отзывы</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="mt-0 header-title mb-3">Новые отзывы</h4>

                <div class="table-responsive responsive-table-plugin">
                    <table class="table mb-0">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Пользователь</th>
                            <th>Отзыв</th>
                            <th>Дата</th>
                            <th>Операция</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach($feedbacks as $row) : ?>
                            <tr>
                                <th><?=$row["id"]; ?></th>
                                <td><a href="/admin/users/edit/<?=$row["user_id"]; ?>" class="stn"><?=$row["user"]; ?></a></td>
                                <td><?=$row["text"]; ?></td>
                                <td><?=date("d.m.Y в H:i:s",$row["date_add"]); ?></td>
                                <td>
                                    <form action="" method="POST">
                                        <input type="hidden" name="_tocken" value="<?=Session::$tocken; ?>">
                                        <input type="hidden" name="id" value="<?=$row['id']; ?>">
                                        <button type="submit" name="delete" class="btn btn-lighten-danger waves-effect btn-xs">Удалить</button>
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

<?php echo $navigation; ?>

<?php require_once(ROOT . "/views/admin/layouts/_footer_adm.php"); ?>