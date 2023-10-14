<?php require_once(ROOT . "/views/" . LANG . "/layouts/_header_start.php"); ?>

<div class="main-sphere" style="min-height: 600px;">
    <canvas id="canvas" width="450" height="450"></canvas>
	<div class="bright"></div>
	<a class="rocket" href="/account/cabinet">
		<img src="/assets/images/rocket.png" alt="">
	</a>
	<div class="slogan">
		<h3>успешно</h3>
		<p><a href="/account/cabinet" style="color: #000;">перейти в кабинет</a></p>
	</div>
</div>
<script>
  galaxy();
</script>

<?php require_once(ROOT . "/views/" . LANG . "/layouts/_footer.php"); ?>