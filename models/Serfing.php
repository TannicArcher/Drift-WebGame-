<?php 

/**
* 
*/
class Serfing
{

	public static function getUnviewedSerfings ($usid)
	{

		$db = Db::getConnection();

		$serfs = array();

		$sql = 'SELECT ident FROM db_serfing_view WHERE user_id = :usid AND date_add + INTERVAL 24*60*60 SECOND > NOW()';

        $result = $db->prepare($sql);

        $result->bindParam(':usid', $usid, PDO::PARAM_INT);

        $result->execute();

        $ids = '';

        while ($row = $result->fetch()) 
        {
        	if ($ids != '') $ids .= ',';

        	$ids .= $row['ident'];

        }

        if ($ids != '')
        {
        	$sql = 'SELECT db_serfing_plans.*, (db_serfing_plans.id) plan_id, db_serfing.* FROM db_serfing LEFT JOIN db_serfing_plans ON db_serfing.plan = db_serfing_plans.id WHERE db_serfing.status = 1 AND db_serfing.money > db_serfing_plans.price AND db_serfing.id NOT IN ('.$ids.') ORDER BY db_serfing_plans.highlight DESC';

        	$result = $db->query($sql);

        }
        else
        {
        	$sql = 'SELECT db_serfing_plans.*, (db_serfing_plans.id) plan_id, db_serfing.* FROM db_serfing LEFT JOIN db_serfing_plans ON db_serfing.plan = db_serfing_plans.id WHERE db_serfing.status = 1 AND db_serfing.money > db_serfing_plans.price ORDER BY db_serfing_plans.highlight DESC';

        	$result = $db->query($sql);

        }

        while ($row = $result->fetch()) $serfs[] = $row;

        return $serfs;
	}

	public static function checkUnviewedSerfing ($usid, $serfid)
	{
		$db = Db::getConnection();

		$sql = 'SELECT COUNT(*) FROM db_serfing_view WHERE user_id = :usid AND ident = :serfid AND date_add + INTERVAL 24*60*60 SECOND > NOW()';

        $result = $db->prepare($sql);

        $result->bindParam(':usid', $usid, PDO::PARAM_INT);

        $result->bindParam(':serfid', $serfid, PDO::PARAM_INT);

        $result->execute();

        if ($result->fetchColumn() == 0) return true;

        return false;

        
	}

	/**
	 * @param int
	 * @return bool
	 */
	public static function issetSerfing ($serfid, $usid = false)
	{
		$db = Db::getConnection();

		if ($usid === false) 
		{
			$sql = 'SELECT COUNT(*) FROM db_serfing WHERE id = :serfid';

			$result = $db->prepare($sql);

			$result->bindParam(':serfid', $serfid, PDO::PARAM_INT);
		}
		else
		{
			$sql = 'SELECT COUNT(*) FROM db_serfing WHERE id = :serfid AND user_id = :usid';

			$result = $db->prepare($sql);

			$result->bindParam(':serfid', $serfid, PDO::PARAM_INT);

			$result->bindParam(':usid', $usid, PDO::PARAM_INT);
		}

		$result->execute();

		if ($result->fetchColumn() == 1) return $serfid;

		return false;
	}

	/**
	 * @param int
	 * @return array
	 */
	public static function getSerfingData ($serfid)
	{
		$db = Db::getConnection();

		$sql = 'SELECT db_serfing_plans.*, db_serfing.* FROM db_serfing LEFT JOIN db_serfing_plans ON db_serfing.plan = db_serfing_plans.id WHERE db_serfing.id = :serfid';

		$result = $db->prepare($sql);

		$result->bindParam(':serfid', $serfid, PDO::PARAM_INT);

		$result->execute();

		return $result->fetch();
	}

	/**
	 * @param int
	 * @param array
	 */
	public static function addView ($usid, $serf_data)
	{
		$db = Db::getConnection();

		$sql = 'SELECT COUNT(*) FROM db_serfing_view WHERE user_id = :usid AND ident = :serf_id';

		$result = $db->prepare($sql);

		$result->bindParam(':usid', $usid, PDO::PARAM_INT);

		$result->bindParam(':serf_id', $serf_data['id'], PDO::PARAM_INT);

		$result->execute();

		if ($result->fetchColumn() > 0)
		{

			$sql = 'SELECT * FROM db_serfing_view WHERE user_id = :usid AND ident = :serf_id';

			$result = $db->prepare($sql);

			$result->bindParam(':usid', $usid, PDO::PARAM_INT);

			$result->bindParam(':serf_id', $serf_data['id'], PDO::PARAM_INT);

			$result->execute();

			$view_data = $result->fetch();

			$sql = 'UPDATE db_serfing_view SET date_add = NOW() WHERE id = :viewid';

			$result = $db->prepare($sql);

			$result->bindParam(':viewid', $view_data['id'], PDO::PARAM_INT);

			$result->execute();
		}

		else
		{
			$sql = 'INSERT INTO db_serfing_view (ident, date_add, user_id) VALUES (:ident, NOW(), :usid)';

			$result = $db->prepare($sql);

			$result->bindParam(':ident', $serf_data['id'], PDO::PARAM_INT);

			$result->bindParam(':usid', $usid, PDO::PARAM_INT);

			$result->execute();
		}

	}

	/**
	 * @param array
	 */
	public static function takeMoney ($serf_data)
	{

		$db = Db::getConnection();

		$sql = 'UPDATE db_serfing SET view = view + 1, money = money - :price WHERE id = :serf_id';

		$result = $db->prepare($sql);

		$result->bindParam(':serf_id', $serf_data['id'], PDO::PARAM_INT);

		$result->bindParam(':price', $serf_data['price'], PDO::PARAM_STR);

		$result->execute();
	}

	public static function insertSum ($serfid, $amount)
	{

		$db = Db::getConnection();

		$sql = 'UPDATE db_serfing SET money = money + :amount WHERE id = :serfid';

		$result = $db->prepare($sql);

		$result->bindParam(':serfid', $serfid, PDO::PARAM_INT);

		$result->bindParam(':amount', $amount, PDO::PARAM_STR);

		$result->execute();
	}

	public static function getPlans ()
	{
		$plans = array();

		$db = Db::getConnection();

		$sql = 'SELECT * FROM db_serfing_plans ORDER BY id DESC';

		$result = $db->query($sql);

		while ($row = $result->fetch()) $plans[] = $row;

		return $plans;
	}

	public static function issetPlan ($id)
	{

		$db = Db::getConnection();

		$sql = 'SELECT COUNT(*) FROM db_serfing_plans WHERE id = :id';

		$result = $db->prepare($sql);

		$result->bindParam(':id', $id, PDO::PARAM_INT);

		$result->execute();

		if ($result->fetchColumn() > 0) return $id;

		return false;

	}

	/**
	 * @param int
	 * @param string
	 * @param string
	 * @param array
	 */
	public static function addSerfing ($plan, $title, $url, $user_data)
	{

		$db = Db::getConnection();

		$time = time();

		$sql = 'INSERT INTO db_serfing (user_id, user_name, time_add, title, plan, url, status) VALUES (:usid, :usname, :time, :title, :plan, :url, 2)';

		$result = $db->prepare($sql);

		$result->bindParam(':usid', $user_data['id'], PDO::PARAM_INT);

		$result->bindParam(':usname', $user_data['user'], PDO::PARAM_STR);

		$result->bindParam(':time', $time, PDO::PARAM_INT);

		$result->bindParam(':title', $title, PDO::PARAM_STR);

		$result->bindParam(':plan', $plan, PDO::PARAM_INT);

		$result->bindParam(':url', $url, PDO::PARAM_STR);

		$result->execute();

	}

	public static function deleteSerfing ($id)
	{

		$db = Db::getConnection();

		$sql = 'DELETE FROM db_serfing WHERE id = :id';

		$result = $db->prepare($sql);

		$result->bindParam(':id', $id, PDO::PARAM_INT);

		$result->execute();

	}

	public static function updateSerfing ($serfid, $params)
	{

		$db = Db::getConnection();

		$sql = 'UPDATE db_serfing SET ';

		foreach ($params as $key => $value) $sql .= $key.' = :'.$key.', ';

		$sql = substr($sql, 0, -2);

		$sql .= ' WHERE id = :serfid';

		$result = $db->prepare($sql);

		$args = array();

		foreach ($params as $key => $value) $args[':'.$key] = $value;

		$args[':serfid'] = $serfid;

		$result->execute($args);

	}

	public static function getUserLinks ($user_data)
	{
		$db = Db::getConnection();

		$links = array();

		$sql = 'SELECT db_serfing_plans.*, (db_serfing_plans.id) plan_id, db_serfing.* FROM db_serfing LEFT JOIN db_serfing_plans ON db_serfing.plan = db_serfing_plans.id WHERE db_serfing.user_id = :usid ORDER BY db_serfing.id DESC';

		$result = $db->prepare($sql);

		$result->bindParam(':usid', $user_data['id'], PDO::PARAM_INT);

		$result->execute();

		while ($row = $result->fetch()) $links[] = $row;

		return $links;
	}

	public static function updatePlanSettings ($params, $id)
	{

		$sql = 'UPDATE db_serfing_plans SET ';

		foreach ($params as $key => $value) 
		{
			$sql .= $key.' = "'.$value.'" ,';
		}

		$sql = substr($sql, 0, -2);

		$sql .= ' WHERE id = '.$id;

		$db = Db::getConnection();

		$db->query($sql);

	}

	public static function getAceptedSerfings ($nav, $page, $on_page = 20)
	{

		$db = Db::getConnection();

        $serfings = array();

		$sql = $nav->getQuery('AdminSerfing', $page, $on_page);

        $result = $db->query($sql);

        while ($row = $result->fetch()) 
        {
        	$serfings[] = $row;
        }

        return $serfings;

	}

	public static function getNewSerfings ($nav, $page, $on_page = 20)
	{

		$db = Db::getConnection();

        $serfings = array();

		$sql = $nav->getQuery('AdminSerfingnew', $page, $on_page);

        $result = $db->query($sql);

        while ($row = $result->fetch()) 
        {
        	$serfings[] = $row;
        }

        return $serfings;

	}

	public static function isUnactiveSerfing ($id)
    {
        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM db_serfing WHERE id = :id AND status = 0';

        $result = $db->prepare($sql);

        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->execute();

        if ($result->fetchColumn() > 0) return $id;

        return false;
    }


}
