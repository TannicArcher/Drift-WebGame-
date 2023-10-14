<table class="clocktable" style="display: inline-table;">
	<tr>
		<td><img src="/serfing/captcha" alt="Проверка" style="margin: 0 10px 0 0;" /></td>
		<td align="left">

		<?php for($n = 1; $n<=8; $n++) :

			if ($n == 5) echo '<br />'; ?>

			<span class="serfnum" onclick="vernum(<?php echo $codek[$n] ?>);"><?php echo $n; ?></span>

		<?php endfor; ?>

		</td>
	</tr>
</table>