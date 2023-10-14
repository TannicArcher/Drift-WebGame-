<?php require_once(ROOT . "/views/" . LANG . "/layouts/_header_cabinet.php"); ?>

<div class="dt-content">
    <div class="dt-page__header">
        <h1 class="dt-page__title">
            Калькулятор прибыли
        </h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="dt-card profit-calc-page">
                <div class="dt-card__body profit-calc-body">
                    <form id="calc-form" name="calc-form">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="dt-card taxi-card profit-calc-card m-b-15">
                                    <div class="form-row card-body">
                                        <div class="dt-card__heading col-lg-12 m-b-5">
                                            <h3 class="dt-card__title">
                                                <i class="far fa-taxi mr-3"></i><span class="align-bottom">Мой «Автопарк»</span>
                                            </h3>
                                            <h5 class="m-t-15 m-b-0 profit-calc-desc">
                                                Введите кол-во авто для расчета прибыли
                                            </h5>
                                        </div>
                                        <?php foreach ($plans as $plan) : ?>
                                            <div class="col-xl-4 col-sm-6 m-t-15">
                                                <label for="car-1-1"><?=$plan['name']; ?></label>
                                                <input class="form-control" id="car<?=$plan['id']; ?>" name="vertical-spin" placeholder="Введите кол-во" type="number" value="0">
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <button class="profit-calc-btn btn btn-primary btn-lg m-t-20 mb-5 new-btn" type="button" onclick="calculate();">Рассчитать прибыль</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row" id="calc-result">
                        <div class="col-xl-12">
                            <div class="dt-card taxi-about-box mt-5 mb-0">
                                <div class="dt-card__body taxi-about-card">
                                    <div class="row">
                                        <div class="col-xl-12 d-flex align-items-center">
                                            <div class="d-flex justify-content-center w-100">
                                                <div class="profit-calc-result-box">
                                                    <div>
                                                        <h3>
                                                            <span id="dhd1">0</span><span>руб.</span>
                                                        </h3>
                                                        <label>Прибыль за 1 час</label>
                                                    </div>
                                                    <div>
                                                        <h3>
                                                            <span id="dhd2">0</span><span>руб.</span>
                                                        </h3>
                                                        <label>Прибыль за 24 часа</label>
                                                    </div>
                                                    <div>
                                                        <h3>
                                                            <span id="dhd3">0</span><span>руб.</span>
                                                        </h3>
                                                        <label>Прибыль за 30 дней</label>
                                                    </div>
                                                    <div>
                                                        <h3>
                                                            <span id="dhd4">0</span><span>руб.</span>
                                                        </h3>
                                                        <label>Прибыль за 365 дней</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
var cars=[];

<?php foreach ($plans as $plan) : ?>

  cars[<?=$plan['id']; ?>]=<?=$plan['perc']; ?>;

<?php endforeach; ?>

function number_format( number, decimals, dec_point, thousands_sep ) {

  var i, j, kw, kd, km;

  if( isNaN(decimals = Math.abs(decimals)) ){
    decimals = 2;
  }
  if( dec_point == undefined ){
    dec_point = ",";
  }
  if( thousands_sep == undefined ){
    thousands_sep = ".";
  }

  i = parseInt(number = (+number || 0).toFixed(decimals)) + "";

  if( (j = i.length) > 3 ){
    j = j % 3;
  } else{
    j = 0;
  }

  km = (j ? i.substr(0, j) + thousands_sep : "");
  kw = i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands_sep);
  kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).replace(/-/, 0).slice(2) : "");


  return km + kw + kd;
}


function calculate() {
  var h1=0;
  var h24=0;
  var d30=0;
  var d365=0;
  for(var i=1;i<=<?=count($plans); ?>;i++) {
    h1+=cars[i]*parseInt($("#car"+i).val());
    h24+=cars[i]*parseInt($("#car"+i).val())*24;
    d30+=cars[i]*parseInt($("#car"+i).val())*24*30;
    d365+=cars[i]*parseInt($("#car"+i).val())*24*365;
  }
  $("#dhd1").html(number_format(h1, 4, '.', ' ')+" руб.");
  $("#dhd2").html(number_format(h24, 3, '.', ' ')+" руб.");
  $("#dhd3").html(number_format(d30, 2, '.', ' ')+" руб.");
  $("#dhd4").html(number_format(d365, 0, '.', ' ')+" руб.");
}
</script>

<?php require_once(ROOT . "/views/" . LANG . "/layouts/_footer_cabinet.php"); ?>
