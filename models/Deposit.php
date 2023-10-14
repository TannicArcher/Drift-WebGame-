<?php 

/**
* 
*/
class Deposit
{

	/**
	 * @param array
	 * @param array
	 */
	public static function doDeposit ($user_data, $plan)
	{

		$time = time();

		$db = Db::getConnection();

		$sql = 'INSERT INTO db_deposits (user_id, user, plan, date_add) VALUES (:usid, :usname, :plan, :time)';

		$result = $db->prepare($sql);

		$result->bindParam(':usid', $user_data['id'], PDO::PARAM_INT);
		$result->bindParam(':usname', $user_data['user'], PDO::PARAM_STR);
		$result->bindParam(':plan', $plan['id'], PDO::PARAM_INT);
		$result->bindParam(':time', $time, PDO::PARAM_INT);

		$result->execute();

	}

	public static function getUserDeposits ($usid)
	{

		$deposits = array();

		$db = Db::getConnection();

		$sql = 'SELECT COUNT(*) FROM db_deposits WHERE user_id = :usid';

		$result = $db->prepare($sql);

		$result->bindParam(':usid', $usid, PDO::PARAM_INT);

		$result->execute();

		if ($result->fetchColumn() == 0) return $deposits;

		$sql = 'SELECT db_deposits.*, db_plans.perc FROM db_deposits LEFT JOIN db_plans ON db_plans.id = db_deposits.plan WHERE db_deposits.user_id = :usid';

		$result = $db->prepare($sql);

		$result->bindParam(':usid', $usid, PDO::PARAM_INT);

		$result->execute();

		while ($row = $result->fetch()) 
		{

			$deposits[] = $row;
		}

		return $deposits;

	}

	public static function getPlans ()
	{

		$db = Db::getConnection();

		$plans = array();

		$sql = 'SELECT * FROM db_plans';

		$result = $db->query($sql);

		while ($row = $result->fetch()) 
		{
			$row['inh'] = $row['perc'] * 31 * 24 / ($row['price'] / 100);

			$plans[] = $row;
		}

		return $plans;

	}

	public static function getPlan ($id)
	{

		$db = Db::getConnection();

		$sql = 'SELECT COUNT(*) FROM db_plans WHERE id = :id';

		$result = $db->prepare($sql);

		$result->bindParam(':id', $id, PDO::PARAM_INT);

		$result->execute();

		if ($result->fetchColumn() == 0) return false;

		$sql = 'SELECT * FROM db_plans WHERE id = :id';

		$result = $db->prepare($sql);

		$result->bindParam(':id', $id, PDO::PARAM_INT);

		$result->execute();

		$plan = $result->fetch(); 

		$plan['inh'] = $plan['perc'] * 31 * 24 / ($plan['price'] / 100);

		return $plan;


	}

	public static function updatePlanSettings ($params, $id)
	{

		$sql = 'UPDATE db_plans SET ';

		foreach ($params as $key => $value) 
		{
			$sql .= $key.' = "'.$value.'" ,';
		}

		$sql = substr($sql, 0, -2);

		$sql .= ' WHERE id = '.$id;

		$db = Db::getConnection();

		$db->query($sql);

	}

	public static function getAllDeposits ($nav, $on_page, $num_p)
	{

		$deposits = array();

		$db = Db::getConnection();

		// Получаем строку запроса
        $query = $nav->getQuery('AdminDeposits', $num_p, $on_page);

        $result = $db->query($query);

		while ($row = $result->fetch()) 
		{

			$deposits[] = $row;
		}

    	return $deposits;

	}

	public static function getDaysDeposits ()
	{

		$days_deposits = array();

		$db = Db::getConnection();

		$sql = 'SELECT * FROM db_deposits ORDER BY id DESC';

		$result = $db->query($sql);

		while($data = $result->fetch())
		{

			$index = date("d.m.Y", $data["date_add"]);

			$days_deposits[$index] = (isset($days_deposits[$index])) ? $days_deposits[$index] + 1 : 1;

		}

		return $days_deposits;

	}

}
