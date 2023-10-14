<?php 

/**
* Обработчики платежей
*/
class HandlerController
{

	private $payconfig;
	private $config;

	
	function __construct()
	{

		$this->payconfig = new PayConfig();

		$this->config = Settings::getSettings();
	}

	public function actionYmtocken ($res = NULL)
	{

		if ($this->payconfig->yandexApiTock !== false)
		{

			header("Location: /");

			return;
		} 

		require_once(ROOT . "/components/YandexMoney/api.php");

		$id = $this->payconfig->yandexClientID;

		$uri = $this->payconfig->yandexRedirecturi();

		$secret = $this->payconfig->yandexApiSecret;

		$scope = array('account-info operation-history operation-details payment-p2p');

		if ($res == NULL)
		{
			$go = YandexMoney\API::buildObtainTokenUrl($id, $uri, $scope);

			header("Location: " . $go);

			return;
		}

		parse_str(trim($res, '?'), $code);

		$access_token_response = YandexMoney\API::getAccessToken($id, $code['code'], $uri, $secret);

		$tocken = $access_token_response->access_token;

		$file = ROOT . "/config/ymtock.txt";

		if (!file_exists($file)) 
		{
			$fp = fopen($file, "w");

			fwrite($fp, "YM tocken -> ".$tocken);

			fclose($fp);
		}

	}

	public function actionPy ()
	{
		// Глушим если нет данных
		if (!isset($_POST["m_operation_id"]) || !isset($_POST["m_sign"])) 
		{
			Header("Location: /");
			return;
		}

		$m_key = $this->payconfig->secretW;

		$arHash = array($_POST['m_operation_id'],
				$_POST['m_operation_ps'],
				$_POST['m_operation_date'],
				$_POST['m_operation_pay_date'],
				$_POST['m_shop'],
				$_POST['m_orderid'],
				$_POST['m_amount'],
				$_POST['m_curr'],
				$_POST['m_desc'],
				$_POST['m_status'],
				$m_key);

		$sign_hash = strtoupper(hash('sha256', implode(":", $arHash)));

		if ($_POST["m_sign"] == $sign_hash && $_POST['m_status'] == "success")
		{

			$insid = intval($_POST['m_orderid']);

			$insert_row = Insert::getInsertRow($insid);

			if ($insert_row === false) exit;

			if ($insert_row["sum"] > $_POST['m_amount']) exit;

			if ($insert_row["status"] > 0) exit;

			$this->doInsert($insid, $insert_row);

			exit;
		}

		exit;
		

	}

	public function actionFk ()
	{

		// Глушим если нет данных
		if (!isset($_POST['SIGN']))
		{
			Header("Location: /");
			return;
		}
		
		$hash = md5($this->payconfig->fkId.":".$_POST['AMOUNT'].":".$this->payconfig->fkSecret2.":".$_POST['MERCHANT_ORDER_ID']);

		if ($hash == $_POST['SIGN'])
		{

			$insid = intval($_POST['MERCHANT_ORDER_ID']);

			$insert_row = Insert::getInsertRow($insid);

			if ($insert_row === false) exit;

			if ($insert_row["sum"] > $_POST['AMOUNT']) exit;

			if ($insert_row["status"] > 0) exit;

			$this->doInsert($insid, $insert_row);

			exit;
		}

		exit;

	}

	public function actionAc ()
	{

		//Глушим если нет данных
		if (!isset($_POST["ac_order_id"]) || !isset($_POST["ac_hash"]))
		{
			Header("Location: /");
			return;
		}
		
		$ac_key = $this->payconfig->advKey;

		$sign_hash = hash("sha256", 
			$_POST['ac_transfer'].":".
			$_POST['ac_start_date'].":".
			$_POST['ac_sci_name'].":".
			$_POST['ac_src_wallet'].":".
			$_POST['ac_dest_wallet'].":".
			$_POST['ac_order_id'].":".
			$_POST['ac_amount'].":".
			$_POST['ac_merchant_currency'].":".
			$ac_key);

		if ($_POST["ac_hash"] == $sign_hash)
		{

			$insid = intval($_POST['ac_order_id']);

			$insert_row = Insert::getInsertRow($insid);

			if ($insert_row === false) exit;

			if ($insert_row["status"] > 0) exit;

			if ($insert_row['sum'] > $_POST['ac_amount']) exit;

			$this->doInsert($insid, $insert_row);

			exit;
		}

		exit;

	}

	public function actionYm ()
	{

		//Глушим если нет данных
		if (!isset($_POST["operation_id"]) || !isset($_POST["sha1_hash"]))
		{
			Header("Location: /");
			return;
		}
		
		$secret = $this->payconfig->yandexSecret;

		$sign_hash = sha1( 
			$_POST['notification_type']."&".
			$_POST['operation_id']."&".
			$_POST['amount']."&".
			$_POST['currency']."&".
			$_POST['datetime']."&".
			$_POST['sender']."&".
			$_POST['codepro']."&".
			$secret."&".
			$_POST['label']);

		if ($_POST["sha1_hash"] == $sign_hash)
		{

			$insid = intval($_POST['label']);

			$insert_row = Insert::getInsertRow($insid);

			if ($insert_row === false) exit;

			if ($insert_row['sum'] > $_POST['amount']) exit;

			if ($insert_row["status"] > 0) exit;

			$this->doInsert($insid, $insert_row);

			exit;
		}

		exit;

	}

	private function doInsert($insid, $insert_row)
	{
		// обновляем статус платежа
		Insert::updateRowStatus($insid);

		// вносим в статистику юзера
		Insert::updateInserts($insert_row['user_id'], $insert_row['sum']);

		if ($insert_row['type'] == 1) 
		{
			// начиляем реферальные
			Referals::doReferalsMoney($insert_row, $this->config);
		}

		$user_data = User::getDataById($insert_row['user_id']);

		// если есть реферер
		if ($user_data['referer1_id'] != 0) 
		{

			$referer_data = User::getDataById($user_data['referer1_id']);

			// конкурс рефералов
			Competition::updateReferalsPoints($insert_row, $user_data, $referer_data);

		}

		// конкурс инвесторов
		Competition::updateInvestPoints($insert_row, $user_data);

		// проводим платёж
		if ($insert_row['type'] == 1)
		{
			$sum = ($this->config['insert_b_bonus'] > 0) ? $insert_row['sum'] + $insert_row['sum'] / 100 * $this->config['insert_b_bonus'] : $insert_row['sum'];

			User::takeSum ($insert_row['user_id'], 'money_b', $sum, true);
		} 

		else 
		{
			$sum = ($this->config['insert_r_bonus'] > 0) ? $insert_row['sum'] + $insert_row['sum'] / 100 * $this->config['insert_r_bonus'] : $insert_row['sum'];

			User::takeSum ($insert_row['user_id'], 'money_r', $sum, true);
		}

		

	}

	public function actionVk ($res = NULL)
	{

		parse_str(trim($res, '?'), $uri_params);

		$vk = new Vk($this->payconfig->vk_id, $this->payconfig->vk_key, $this->payconfig->vk_redirect_uri());

		if (isset($uri_params['code'])) 
		{

		    if (!$vk->access_token_get($uri_params['code']))
		    {

		    	header("Location: /quests/4");

		        return;

		    }
		    else	
		    {

		        $usid = User::isLogged();

		        $vk_user_id = intval($vk->user_id);

		        $state = intval($uri_params['state']);

		        if (!User::checkVkAuthByUid($usid)) 
		        {
		        	header("Location: /quests/4");

		        	return;
		        }

	            if (!User::checkVkAuthByVid($vk_user_id) != 0) 
		        {
		        	header("Location: /quests/3");

		        	return;
		        }

                if (!$vk->user_in_groupT($vk_user_id, $this->payconfig->vk_group_id)) 
                {
		        	header("Location: /quests/2");

		        	return;
		        }

                if ($state != 0) 
                {
		        	header("Location: /quests/1");

		        	return;
		        }
		        else
		        {

                    $vk_user_data = $vk->user_data();

                    $params = array(
                    	'vk_user_id' => $vk_user_id,
                    	'vk_first_name' => $vk_user_data->response[0]->first_name,
                    	'vk_last_name' => $vk_user_data->response[0]->last_name,
                    	'vk_bdate' => $vk_user_data->response[0]->bdate,
                    	'vk_dateadd' => time(),
                    	);

                    User::inserVkData($usid, $params);

                    $user_data = User::getDataById($usid);

                    User::takeSum($usid, 'money_b', $this->config['vk_quest_bonus'], true);

                    header("Location: /quests/5");

                    return;
                }
		    } 

		} 
		else 
		{

		    if (isset($uri_params['bonus'])) $dp = 'state=' . $uri_params['bonus'];

		    else $dp = 'state=0';

		    $vk->get_auth($dp);
		}

	}

}
