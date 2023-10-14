<?php 

/**
* 
*/
class Insert
{

	public static function getInsertRow ($insid)
	{

		$db = Db::getConnection();

		$sql = 'SELECT COUNT(*) FROM db_insert WHERE id = :insid';

		$result = $db->prepare($sql);

		$result->bindParam(':insid', $insid, PDO::PARAM_INT);

		$result->execute();

		if ($result->fetchColumn() == 0) return false;

		$sql = 'SELECT * FROM db_insert WHERE id = :insid';

		$result = $db->prepare($sql);

		$result->bindParam(':insid', $insid, PDO::PARAM_INT);

		$result->execute();

		return $result->fetch();

	}

	public static function updateRowStatus ($insid)
	{

		$db = Db::getConnection();

		$sql = 'UPDATE db_insert SET status = 1 WHERE id = :insid';

		$result = $db->prepare($sql);

		$result->bindParam(':insid', $insid, PDO::PARAM_INT);

		$result->execute();

	}

	public static function updateInserts ($usid, $sum)
	{

		$db = Db::getConnection();

		$sql = 'UPDATE users_002 SET insert_sum = insert_sum + :sum WHERE id = :usid';

		$result = $db->prepare($sql);

		$result->bindParam(':sum', $sum, PDO::PARAM_STR);
		$result->bindParam(':usid', $usid, PDO::PARAM_INT);

		$result->execute();

	}

	/**
	 * @param array
	 * @param float
	 * @param array
	 * @return int
	 */
	public static function prepeareInsert ($user_data, $amount, $paysystem, $type = 1)
	{

		$time = time();

		$db = Db::getConnection();

		$sql = 'INSERT INTO db_insert (user_id, user, payment_system, sum, date_add, type) VALUES (:usid, :usname, :psname, :sum, :time, :type)';
		
		$result = $db->prepare($sql);

		$result->bindParam(':usid', $user_data['id'], PDO::PARAM_INT);
		$result->bindParam(':usname', $user_data['user'], PDO::PARAM_STR);
		$result->bindParam(':psname', $paysystem['name'], PDO::PARAM_STR);
		$result->bindParam(':sum', $amount, PDO::PARAM_STR);
		$result->bindParam(':time', $time, PDO::PARAM_INT);
		$result->bindParam(':type', $type, PDO::PARAM_INT);

		$result->execute();

		return $db->lastInsertId();

	}

	public static function getAllInserts ($nav, $on_page, $page, $type)
	{

		$module = ($type == 2) ? 'AdminInserts' : 'AdminReinserts';

		$inserts = array();

		$db = Db::getConnection();

		// Получаем строку запроса
        $sql = $nav->getQuery($module, $page, $on_page);

        $result = $db->Query($sql);

		while ($row = $result->fetch()) $inserts[] = $row;

    	return $inserts;

	}

	public static function getDaysInserts ()
	{

		$days_money = array();

		$days_insert = array();

		$db = Db::getConnection();

		$sql = 'SELECT * FROM db_insert WHERE status = 1 ORDER BY id DESC';

		$result = $db->query($sql);

		while($data = $result->fetch())
		{

			$index = date("d.m.Y", $data["date_add"]);

			$days_insert[$index] = (isset($days_insert[$index])) ? $days_insert[$index] + 1 : 1;

			$days_money[$index] = (isset($days_money[$index])) ? $days_money[$index] + $data["sum"] : $data["sum"];


			$days_money[$index] = (isset($days_money[$index])) ? $days_money[$index] : 0;

		}

		$final[] = $days_money;

		$final[] = $days_insert;

		return $final;

	}

}
