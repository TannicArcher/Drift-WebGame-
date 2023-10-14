<?php 

/**
* 
*/
class Info
{

	public static function getStats ($config)
	{
        $paramsPath = ROOT . '/config/defines.php';

		$db = Db::getConnection();

		$stats = array();

		$need = time() - 60 * 60 * 24;

		$sql = 'SELECT (SELECT COUNT(*) FROM users_002) all_users, (SELECT SUM(sum) FROM db_insert WHERE status = 1) all_insert, (SELECT SUM(sum) FROM db_payment WHERE status = 1) all_payment, (SELECT COUNT(*) FROM users_001 WHERE date_reg > :need) new_users';

        $result = $db->prepare($sql);

        $result->bindParam(':need', $need, PDO::PARAM_INT);

        $result->execute();

        $stats = $result->fetch();

        $stats['days_work'] = floor((time() - $config['date_start'])/60/60/24) + 1;

        return $stats;
	}

	public static function getLastPays ()
	{

		$db = Db::getConnection();

		$last_pays = array();

		$sql = 'SELECT * FROM db_payment LEFT JOIN db_paysystems ON db_payment.payment_system = db_paysystems.name WHERE db_payment.status = 1 ORDER BY db_payment.id DESC LIMIT 20';

        $result = $db->query($sql);

        while ($row = $result->fetch()) $last_pays[] = $row;

        return $last_pays;
	}

	public static function getLastInserts ()
	{

		$db = Db::getConnection();

		$last_ins = array();

		$sql = 'SELECT * FROM db_insert LEFT JOIN db_paysystems ON db_insert.payment_system = db_paysystems.name WHERE db_insert.status = 1 ORDER BY db_insert.id DESC LIMIT 20';

		$result = $db->query($sql);

        while ($row = $result->fetch()) $last_ins[] = $row;

        return $last_ins;
	}

	public static function getLastBonuses ()
	{

		$db = Db::getConnection();

		$last_bonuses = array();

		$sql = 'SELECT * FROM db_bonus ORDER BY date_add DESC LIMIT 20';

		$result = $db->query($sql);

        while ($row = $result->fetch()) $last_bonuses[] = $row;

        return $last_bonuses;
	}

	/**
	 * @param array
	 * @param float
	 * @param int
	 */
	public static function addBonus ($user_data, $amount, $time)
	{

		$db = Db::getConnection();

		$sql = 'INSERT INTO db_bonus (user_id, user, sum, date_add) VALUES (:usid, :usname, :amount, :time)';

		$result = $db->prepare($sql);

		$result->bindParam(':usid', $user_data['id'], PDO::PARAM_INT);

		$result->bindParam(':usname', $user_data['user'], PDO::PARAM_STR);

		$result->bindParam(':amount', $amount, PDO::PARAM_STR);

		$result->bindParam(':time', $time, PDO::PARAM_INT);

		$result->execute();


	}

	public static function getPeriodSum ($period = 7)
	{

		$db = Db::getConnection();

		$need = time() - 60 * 60 * 24 * $period;

		$sql = 'SELECT (SELECT SUM(sum) FROM db_payment WHERE date_add > :need AND status = 1) payment_sum, (SELECT SUM(sum) FROM db_insert WHERE date_add > :need AND status = 1) insert_sum';

        $result = $db->prepare($sql);

        $result->bindParam(':need', $need, PDO::PARAM_INT);

        $result->execute();

        return $result->fetch();
	}

	public static function getTopReferals ()
	{

		$db = Db::getConnection();

		$referals = array();

		$sql = 'SELECT * FROM users_003 LEFT JOIN users_001 ON users_003.id = users_001.id ORDER BY users_003.count_ref1 DESC LIMIT 5';

		$result = $db->query($sql);

        while ($row = $result->fetch()) $referals[] = $row;

        return $referals;
	}

	public static function getTopPays ()
	{

		$db = Db::getConnection();

		$payments = array();

		$sql = 'SELECT * FROM users_002 LEFT JOIN users_001 ON users_002.id = users_001.id ORDER BY users_002.payment_sum DESC LIMIT 5';

		$result = $db->query($sql);

        while ($row = $result->fetch()) $payments[] = $row;

        return $payments;
	}

	public static function getTopSpeed ()
	{

		$db = Db::getConnection();

		$speeds = array();

		//$sql = 'SELECT users_001.user, users_001.date_reg, (SELECT SUM(db_plans.perc) FROM db_deposits LEFT JOIN db_plans ON db_deposits.plan = db_plans.id WHERE db_deposits.user_id = users_001.id) AS speed FROM users_001 ORDER BY speed DESC LIMIT 5';

		//$sql = 'SELECT users_001.user, users_001.date_reg, (SELECT SUM(db_plans.perc) FROM db_deposits LEFT JOIN db_plans ON db_deposits.plan = db_plans.id WHERE db_deposits.user_id = users_001.id) AS speed FROM db_deposits LEFT JOIN users_001 ON users_001.id = db_deposits.user_id ORDER BY speed DESC LIMIT 5';

		$sql = 'SELECT db_deposits.user, SUM(db_plans.perc) AS speed FROM db_deposits LEFT JOIN db_plans ON db_deposits.plan = db_plans.id LEFT JOIN users_001 ON db_deposits.user_id = users_001.id GROUP BY db_deposits.user ORDER BY speed DESC LIMIT 5';

		$result = $db->query($sql);

        while ($row = $result->fetch()) $speeds[] = $row;

        //print_r($speeds);

        return $speeds;
	}

	public static function getTopReferalsMoney ()
	{

		$db = Db::getConnection();

		$refs = array();

		$sql = 'SELECT (users_003.from_referals1 + users_003.from_referals2 + users_003.from_referals3 + users_003.from_referals4 + users_003.from_referals5) AS ref_sum, users_001.* FROM users_003 LEFT JOIN users_001 ON users_003.id = users_001.id ORDER BY ref_sum DESC LIMIT 5';

		$result = $db->query($sql);

        while ($row = $result->fetch()) $refs[] = $row;

        return $refs;
	}

	public static function getAdminStats ()
	{

		$db = Db::getConnection();

		$sql = 'SELECT COUNT(id) all_users, SUM(payment_sum) payment_sum, SUM(insert_sum) insert_sum, SUM(money_b) money_b, SUM(money_p) money_p, SUM(money_r) money_r, SUM(money_k) money_k FROM users_002';

		$result = $db->query($sql);

        return $result->fetch();
	}

}
