<?php 

/**
* 
*/
class Withdraw
{

	public static function prepeareWithdraw($user_data, $purse, $paysystem, $amount, $type)
    {

    	$db = Db::getConnection();

    	$time = time();

    	$status = ($type == 1) ? 0 : 3;

    	$sql = 'UPDATE users_002 SET money_p = money_p - :amount WHERE id = :usid';

    	$result = $db->prepare($sql);

    	$result->bindParam(':amount', $amount, PDO::PARAM_STR);

    	$result->bindParam(':usid', $user_data['id'], PDO::PARAM_INT);

    	$result->execute();

    	$sql = 'INSERT INTO db_payment (user, user_id, purse, sum, payment_system, date_add, status) VALUES (:usname, :usid, :purse, :amount, :psname, :time, :status)';

    	$result = $db->prepare($sql);

    	$result->bindParam(':usname', $user_data['user'], PDO::PARAM_STR);
    	$result->bindParam(':usid', $user_data['id'], PDO::PARAM_INT);
    	$result->bindParam(':purse', $purse, PDO::PARAM_STR);
    	$result->bindParam(':amount', $amount, PDO::PARAM_STR);
    	$result->bindParam(':psname', $paysystem['name'], PDO::PARAM_STR);
    	$result->bindParam(':time', $time, PDO::PARAM_INT);
    	$result->bindParam(':status', $status, PDO::PARAM_INT);

    	$result->execute();

    	return $db->lastInsertId();

    }

    public static function doWithdraw($lid)
    {

    	$db = Db::getConnection();

    	$sql = 'SELECT * FROM db_payment WHERE id = :lid';

    	$result = $db->prepare($sql);

    	$result->bindParam(':lid', $lid, PDO::PARAM_INT);

    	$result->execute();

    	$payment_data = $result->fetch();

    	if($payment_data['status'] == 1) return false;

    	$sql = 'UPDATE users_002 SET payment_sum = payment_sum + :amount WHERE id = :usid';

    	$result = $db->prepare($sql);

    	$result->bindParam(':amount', $payment_data['sum'], PDO::PARAM_STR);

    	$result->bindParam(':usid', $payment_data['user_id'], PDO::PARAM_INT);

    	$result->execute();

    	$sql = 'UPDATE db_payment SET status = 1 WHERE id = :lid';

    	$result = $db->prepare($sql);

    	$result->bindParam(':lid', $lid, PDO::PARAM_INT);

    	$result->execute();

    	return true;

    }

    public static function canselWithdraw($lid)
    {

    	$db = Db::getConnection();

    	$sql = 'SELECT * FROM db_payment WHERE id = :lid';

    	$result = $db->prepare($sql);

    	$result->bindParam(':lid', $lid, PDO::PARAM_INT);

    	$result->execute();

    	$payment_data = $result->fetch();

    	if($payment_data['status'] == 2) return false;

    	$sql = 'UPDATE users_002 SET money_p = money_p + :amount WHERE id = :usid';

    	$result = $db->prepare($sql);

    	$result->bindParam(':amount', $payment_data['sum'], PDO::PARAM_STR);

    	$result->bindParam(':usid', $payment_data['user_id'], PDO::PARAM_INT);

    	$result->execute();

    	$sql = 'UPDATE db_payment SET status = 2 WHERE id = :lid';

    	$result = $db->prepare($sql);

    	$result->bindParam(':lid', $lid, PDO::PARAM_INT);

    	$result->execute();

		return true;

    }

	public static function getAllPayments ($nav, $on_page, $num_p)
	{

		$payments = array();

		$db = Db::getConnection();

		// Получаем строку запроса
        $query = $nav->getQuery('AdminPayments', $num_p, $on_page);

        $result = $db->query($query);

		while ($row = $result->fetch()) 
		{

			$payments[] = $row;
		}

    	return $payments;

	}

	public static function getDaysPayments ()
	{

		$days_money = array();

		$days_payment = array();

		$db = Db::getConnection();

		$sql = 'SELECT * FROM db_payment WHERE status = 1 ORDER BY id DESC';

		$result = $db->query($sql);

		while($data = $result->fetch())
		{

			$index = date("d.m.Y", $data["date_add"]);

			$days_payment[$index] = (isset($days_payment[$index])) ? $days_payment[$index] + 1 : 1;

            $days_money[$index] = (isset($days_money[$index])) ? $days_money[$index] + $data["sum"] : $data["sum"];

            $days_money[$index] = (isset($days_money[$index])) ? $days_money[$index] : 0;

		}


		$final[] = $days_money;

		$final[] = $days_payment;

		return $final;

	}

	public static function getHandlePayments ()
	{

		$payments = array();

		$db = Db::getConnection();

		$sql = 'SELECT * FROM db_payment WHERE status = 3 ORDER BY id DESC';

        $result = $db->query($sql);

		while ($row = $result->fetch()) 
		{

			$payments[] = $row;
		}

    	return $payments;

	}


}
