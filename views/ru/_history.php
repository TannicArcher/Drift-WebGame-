<?php require_once(ROOT . "/views/" . LANG . "/layouts/_header_start.php"); ?>

<div class="main-sphere">
    <div class="container">
        <div class="col-xs-12">
            <div class="content-box clearfix">

                <div class="balances">
                    <div class="balances-item">
                        <img src="/assets/images/insert-w.png" alt="">
                        <div class="balances-right">
                            <span class="balances-title">Всего пополнено:</span>
                        
                        <?php foreach ($this->currs as $row) : ?>

                            <span><?=sprintf("%.2f", $this->user_data['insert_sum_'.strtolower($row['name'])]); ?> <i class="fa fa-<?=strtolower($row['name']); ?>"></i></span>&nbsp;&nbsp;

                        <?php endforeach; ?>

                        </div>
                    </div>
                    <div class="balances-item">
                        <img src="/assets/images/reinvest-w.png" alt="">
                        <div class="balances-right">
                            <span class="balances-title">Всего реинвестировано:</span>

                        <?php foreach ($this->currs as $row) : ?>

                            <span><?=sprintf("%.2f", $this->user_data['reinsert_sum_'.strtolower($row['name'])]); ?> <i class="fa fa-<?=strtolower($row['name']); ?>"></i></span>&nbsp;&nbsp;

                        <?php endforeach; ?>

                        </div>
                    </div>
                    <div class="balances-item">
                        <img src="/assets/images/payment-w.png" alt="">
                        <div class="balances-right">
                            <span class="balances-title">Всего выплачено:</span>

                        <?php foreach ($this->currs as $row) : ?>

                            <span><?=sprintf("%.2f", $this->user_data['payment_sum_'.strtolower($row['name'])]); ?> <i class="fa fa-<?=strtolower($row['name']); ?>"></i></span>&nbsp;&nbsp;

                        <?php endforeach; ?>

                        </div>
                    </div>
                </div>

            <table cellspacing="4" cellpadding="4" border="0" class="table" width="100%">   
                <tr>
                    <td class="inheader">Дата</td>
                    <td class="inheader">Операция</td>
                    <td class="inheader">Система</td>
                    <td class="inheader">Сумма</td>
                    <td class="inheader">Статус</td>
                </tr>

            <?php if (count($opers)>0) :

                foreach ($opers as $key => $row) : ?>

                <tr>
                    <td><?=date("d-m-Y", $row['date_add']); ?></td>
                    <td><?=$row['oper']; ?></td>
                    <td><?=$row['payment_system']; ?></td>
                    <td><?=sprintf("%.2f", $row['sum']); ?> <?=$row['valuta']; ?></td>
                    <td><?=$row['status']; ?></td>
                </tr>
                
                <?php endforeach; ?>

            <?php else : ?>

                <tr>
                    <td colspan="5" align="center"><div class="alert alert-danger">Операций не найдено!</div></td>
                </tr>

            <?php endif; ?>

        </table>

        <?PHP echo $navigation; ?>

            </div>
        </div>
    </div>
</div>

<?php require_once(ROOT . "/views/" . LANG . "/layouts/_footer.php"); ?>