<?php require_once(ROOT . "/views/" . LANG . "/layouts/_header_cabinet.php"); ?>

<style>
    .insert_new_btn {
        color: #fff;
        font-weight: 700;
        border: none;
        border-top-right-radius: 50px;
        border-bottom-right-radius: 50px;
        border-bottom-left-radius: 50px;
        border-top-left-radius: 50px;
        outline: none;
        -webkit-transition: 333ms ease-in-out;
        transition: 333ms ease-in-out;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        padding: 10px 38px 10px;
        margin-top: 10px;
        font-size: 15px;
        letter-spacing: 1px;
        background-color: #ff8c00;
        /* -webkit-box-shadow: 0 10px 15px 0 rgba(255,140,0,.2);*/
        /*box-shadow: 0 7px 15px 0 rgba(255,140,0,.2);*/
    }

    .insert_new_btn:hover {
        color: #fff;
        -webkit-transition: 133ms ease-in-out;
        transition: 133ms
        ease-in-out-webkit-box-shadow: 0 7px 30px 0 rgba(255, 140, 0, .4));
        box-shadow: 0 7px 30px 0 rgba(255, 140, 0, .4);
    }

    .insert_new_input {
        border-radius: 50px;
        margin-bottom: 15px;
        letter-spacing: 1px;
        text-align: center;
        background-color: #fdfdfd;
        height: 41px;
        font-size: 12px;
    }

    .insert_new_input:focus::-webkit-input-placeholder {
        color: transparent
    }

    .insert_new_input:focus::-moz-placeholder {
        color: transparent
    }

    .insert_new_input:focus:-moz-placeholder {
        color: transparent
    }

    .insert_new_input:focus:-ms-input-placeholder {
        color: transparent
    }

    .settings_new_label {
        padding: 0 15px;
        font-weight: 300;
        letter-spacing: 1px;
        font-size: 11px;
        color: #484848;
        width: 100%;
    }

    .settings_new_label a {
        text-align: right;
        float: right;
        color: #9c2e0b;
        cursor: help;
    }

    .settings_new_label a:hover {
        color: #d22;
    }

    .insert_new_btn:active {
        color: #fff !important;
    }

    .insert_new_btn:focus {
        color: #fff !important;
    }

    .settings_pmodal {
        font-size: 13px;
        letter-spacing: 1px;
        text-align: justify;
    }

    .settings_modal_btn {
        letter-spacing: 1px;
        font-size: 13px;
    }
</style>

<div class="page-content-wrapper ">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <hr>
                                <div class="ideas_coment text-center">Изменение пароля:</div>
                                <hr class="m-b-10">
                                <center>
                                    <div class="alert alert-info">Только буквы и цифры!</div>
                                </center>
                                <div class="text-center m-t-10">
                                    <form action="" method="POST" class="settings_formbox">
                                        <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">
                                        <div class="form-group">
                                            <input name="old" class="form-control" maxlength="20" minlength="6" type="password" required="" placeholder="Введите актуальный пароль">
                                        </div>
                                        <div class="form-group">
                                            <input name="new" class="form-control" maxlength="20" minlength="6" type="password" required="" placeholder="Введите новый пароль">
                                        </div>
                                        <div class="form-group">
                                            <input name="re_new" class="form-control" maxlength="20" minlength="6" type="password" required="" placeholder="Повторите новый пароль">
                                        </div>
                                        <button type="submit" class="btn waves-effect btn-primary btn-block calc_btn">
                                            <i class="fa fa-cog"></i> Изменить пароль
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

<!--                    <div class="col-lg-12">-->
<!--                        <div class="panel panel-primary">-->
<!--                            <div class="panel-body">-->
<!--                                <hr>-->
<!--                                <div class="ideas_coment text-center">Платежный пин код:<br/><font color="#FF0000">Должен-->
<!--                                        состоять только из цифр!</font></div>-->
<!--                                <hr class="m-b-10">-->
<!--                                <div class="text-center m-t-10">-->
<!--                                    <form action="" method="POST" class="settings_formbox">-->
<!--                                        <input type="hidden" name="_tocken" value="--><?//= Session::$tocken; ?><!--">-->
<!--                                        <div class="form-group">-->
<!--                                            <input name="pin" class="form-control" maxlength="8" minlength="8" type="password" required="" placeholder="Введите пин-код">-->
<!--                                        </div>-->
<!--                                        <button type="submit" class="btn waves-effect btn-primary btn-block calc_btn">-->
<!--                                            <i class="fa fa-cogs"></i> Установить пин-код-->
<!--                                        </button>-->
<!--                                    </form>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->


                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <hr>
                                <div class="ideas_coment text-center">Кошельки для выплат:</div>
                                <hr class="m-b-10">

                                <?php foreach ($activesystems as $row) : ?>

                                    <?php if ($row['active_payment'] == 0)
                                        continue; ?>

                                    <form action="" method="POST">
                                        <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">
                                        <input type="hidden" name="system" value="<?= $row['name']; ?>">
                                        <div class="form-group">
                                            <label class="settings_new_label"><?= $row['fullname']; ?></label>
                                            <input name="purse" type="text" class="form-control balancei_input insert_new_input" placeholder="<?= $row['example']; ?>" value="<?php if ($this->user_data[$row['name']] != '0')
                                                echo $this->user_data[$row['name']]; ?>">
                                        </div>
                                        <button type="submit" class="btn waves-light btn-block balancei_btngo insert_new_btn">
                                            Сохранить изменения
                                        </button>
                                    </form>
                                    <br>
                                    <br>

                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- container -->
</div> <!-- Page content Wrapper -->

<?php require_once(ROOT . "/views/" . LANG . "/layouts/_footer_cabinet.php"); ?>
