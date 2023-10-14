<?php require_once(ROOT . "/views/" . LANG . "/layouts/_header_cabinet.php"); ?>

<script src="/assets/scripts/jquery-3.1.0.min.js"></script>
<script src="/assets/js/serfing.js"></script>
<script>

  function goserf(obj) {

    setTimeout(function(){

      obj.parentNode.parentNode.parentNode.parentNode.classList.add('surfblockopen');

      var myReq = new XMLHttpRequest();

      function succFunc (e){
        var tckns = [];
        tckn = myReq.responseText;
        console.log(tckn);
        tckns = document.querySelectorAll('input[name="_tocken"]');
        tckns.forEach(function(item, i, tckns) {
          item.value = tckn;
        });
      }

      myReq.open("POST", "/serfing/gettocken", true);
      myReq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      myReq.onreadystatechange = succFunc;
      myReq.send();

    }, 200)

  }

</script>

<style>
.surflinkgoto{
  display: inline;
  padding: 0;
  border: none;
  background: none;
}
</style>

<div class="page-content-wrapper ">
  <div class="container">
    <div class="row">
      <div col-lg-6 col-lg-offset-3 style="padding-left: 11px; padding-right:12px;">
        <div class="panel panel-default">
          <div class="panel-body">
            <p class="raceinfotext m-b-0"><font color="#333333">Нажмите по заголовку любой из доступных ссылок, дождитесь окончания таймера и получайте деньги на свой баланс для вывода! Средства заработанные в сёрфинге Вы можете тратить на покупку активов, либо вывести их из проекта любым удобным для Вас способом!</font> <!--<br /><br /> <font color="#FF0000"><center>Игра под названием <b>ХУТОРЯНКА</b> является лохотроном! Обходите сайт стороной!</center></font>--></p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-lg-12">
        <div class="panel panel-default ">
          <div class="panel-body text-center">
            <p class="text-muted m-b-10 m-t-0"><code class="profilemsd">Вам требуются посетители или рефералы?</code></p>
            <button type="button" class="btn waves-effect btn-default" onclick="location.href='/serfing/add';"> <i class="mdi mdi-bullhorn"></i> Разместить сайт в сёрфинге</button>
          </div>
        </div>
      </div>
	  <div class="col-lg-4 col-lg-12">
        <div class="panel panel-default ">
          <div class="panel-body text-center">
            <p class="text-muted m-b-10 m-t-0"><code class="profilemsd">Хотите пополнить баланс серфинга?</code></p>
            <button type="button" class="btn waves-effect btn-default" onclick="location.href='/insertserfing';"> <i class="mdi mdi-bullhorn"></i> Пополнить баланс серфинга</button>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12" >

      <?php foreach ($serfs as $serf) : ?>
        
        <div class="panel panel-default surfblock<?=$serf['highlight']; ?>">
          <div class="panel-body">
            <div class="surflink">
            
              <h4>
              
			  <form action="/serfing/<?=$serf['id']; ?>" method="POST" target="_blank" style="display: block">
                <input type="hidden" name="_tocken" value="<?=Session::$tocken; ?>">
                <button type="submit" onclick="goserf(this);" class="surflinkgoto waves-effect">«<?=$serf['title']; ?>»</button>
              </form>
              </h4>
              <h6><span class="surftimer"><i class="fa fa-clock-o"></i> Время просмотра: <?=$serf['view_time']; ?> сек.</span><span class="surfprice"><i class="fa fa-money"></i> Оплата: <?=$serf['click_price']; ?> руб.</span><span class="surfviewleft">Осталось <?=floor($serf['money']/$serf['price']); ?> просмотров</span></h6>
            </div>
          </div>
        </div>

      <?php endforeach ?>

      </div>        
    </div><!-- end row -->
  </div><!-- container -->
</div> <!-- Page content Wrapper -->


<?php require_once(ROOT . "/views/" . LANG . "/layouts/_footer_cabinet.php"); ?>