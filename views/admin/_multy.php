<?php require_once(ROOT . "/views/admin/layouts/_header_adm.php"); ?>

<div class="s-bk-lf">
	<div class="acc-title">Мультиаккаунты</div>
</div>
<div class="silver-bk"><div class="clr"></div>	
<BR />

<?=(isset($errors)) ? $errors : ''; ?>

<?php if(count($users_info)) : ?>

<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width="99%">
  <tr bgcolor="#efefef">
	<td align="center" width="50" class="m-tb">ID</td>
    <td align="center" width="150" class="m-tb">Логин</td>
    <td align="center" width="150" class="m-tb">Email</td>
    <td align="center" width="90" class="m-tb">IP</td>
	<td align="center" width="100" class="m-tb">Зарегистрирован</td>
	<td align="center" width="100" class="m-tb">Действие</td>
  </tr>

	<?php foreach($users_info as $row) : ?>

	<tr>
		<td align="center" width="50"><?=$row["id"]; ?></td>
	    <td align="center" width="150"><?=$row["user"]; ?></td>
	    <td align="center" width="150"><?=$row["email"]; ?></td>
	    <td align="center" width="90"><?=$row["uip"]; ?></td>
		<td align="center" width="100"><?=date("d.m.Y H:i", $row["date_reg"]); ?></td>
		<td align="center" width="100">
			<form action="" method="POST">
				<input type="hidden" name="_tocken" value="<?=Session::$tocken; ?>">
				<input type="hidden" name="id" value="<?=$row["id"]; ?>">

			<?php if ($row["banned"]): ?>

				<input type="submit" name="yes" value="разбанить">

			<?php else : ?>

				<input type="submit" name="no" value="забанить">
				
			<?php endif ?>

				
			</form>
		</td>
	</tr>

	<?php endforeach; ?>

</table>

<?=$navigation; ?>

<?PHP else : ?>

	<center><b>На данной странице нет записей</b></center><BR />

<?php endif; ?>

</div>
<div class="clr"></div>	

<?php require_once(ROOT . "/views/admin/layouts/_footer_adm.php"); ?>