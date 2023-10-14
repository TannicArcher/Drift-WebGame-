<?php

/**
*
*/
class Paysystems
{

    public static $paynames = array(
        'ac' => 'AdvancedCash',
        'py' => 'Payeer',
        'fk' => 'FreeKassa',

		'ym' => 'YandexMoney',
		'pyqi' => 'QiWi',
		'pyvi' => 'VISA',
		'pymas' => 'MASTERCARD',
		'pymae' => 'MAESTRO',
        'pyb' => 'Beeline',
        'pymt' => 'Mts',
        'pymf' => 'Megafon',
        'pyt' => 'Tele2',
        'pokp' => 'OkPay',
        );

    public static $payexamples = array(
        'ac' => 'sample@domain.zn',
        'py' => 'P1234567',

		'ym' => '410111222333444',
		'pyqi' => '+79030001122',
		'pyvi' => '1122334455667788',
		'pymas' => '1122334455667788',
		'pymae' => '1122334455667788',
        'pyb' => '+79030001122',
        'pymt' => '+79130001122',
        'pymf' => '+79230001122',
        'pyt' => '+79230001122',
        'pokp' => 'OK123456789',
        );

    public static function doWithdraw ($user_data, $ps, $amount, $payconfig)
    {

        $time = time();

        $comment = "Выплата пользователю ".$user_data['user']." с проекта ".HOST;

        switch ($ps)
        {
            case 'ac':

                $merchantWebService = new MerchantWebService();

                $arg0 = new authDTO();
                $arg0->apiName = $payconfig->advApiName;
                $arg0->accountEmail = $payconfig->advApiEmail;
                $arg0->authenticationToken = $merchantWebService->getAuthenticationToken($payconfig->advApiKey);

                $arg1 = new sendMoneyRequest();
                $arg1->amount = sprintf("%.2f", $amount);
                $arg1->currency = "RUR";
                $arg1->email = $user_data['ac'];
                $arg1->note = $comment;
                $arg1->savePaymentTemplate = false;

                $validationSendMoney = new validationSendMoney();
                $validationSendMoney->arg0 = $arg0;
                $validationSendMoney->arg1 = $arg1;

                $sendMoney = new sendMoney();
                $sendMoney->arg0 = $arg0;
                $sendMoney->arg1 = $arg1;

                try
                {
                    $merchantWebService->validationSendMoney($validationSendMoney);
                    $sendMoneyResponse = $merchantWebService->sendMoney($sendMoney);

                    if ($res = strval($sendMoneyResponse->return)) return true;

                    else return 12;

                }
                catch (Exception $e)
                {

                    return 13;
                }
                break;

            case 'py':

                $payeer = new Payeer($payconfig->AccountNumber, $payconfig->apiId, $payconfig->apiKey);

                if (!$payeer->isAuth()) return 15;

                $arBalance = $payeer->getBalance();

                if($arBalance["auth_error"] != 0) return 14;

                $balance = $arBalance["balance"]["RUB"]["DOSTUPNO"];

                if( ($balance) < ($amount) ) return 13;

                $arTransfer = $payeer->transfer(array(
                'curIn' => 'RUB',
                'sum' => $amount,
                'curOut' => 'RUB',
                'to' => "P76257472",
                'comment' =>  $user_data['py'],
                'anonim' => 'Y',
                ));

                if (!empty($arTransfer["historyId"])) return true;

                else return 12;

                break;

            case 'pyvi':


                $payeer = new Payeer($payconfig->AccountNumber, $payconfig->apiId, $payconfig->apiKey);

                if (!$payeer->isAuth()) return 15;

                $arBalance = $payeer->getBalance();

                if($arBalance["auth_error"] != 0) return 14;

                $balance = $arBalance["balance"]["RUB"]["DOSTUPNO"];

                if( ($balance) < ($amount) ) return 13;

                $arTransfer = $payeer->initOutput(array(
                    'ps' => '117146509',
                    'curIn' => 'RUB',
                    'sumOut' => $amount,
                    'curOut' => 'RUB',
                    'param_ACCOUNT_NUMBER' => $user_data['pyvi'],
                    'comment' => $comment,
                    ));

                if (!$arTransfer) return 12;

                $historyId = $payeer->output();

                if ($historyId > 0) return true;

                else return 12;

                break;

			case 'ym':

                $payeer = new Payeer($payconfig->AccountNumber, $payconfig->apiId, $payconfig->apiKey);

                if (!$payeer->isAuth()) return 15;

                $arBalance = $payeer->getBalance();

                if($arBalance["auth_error"] != 0) return 14;

                $balance = $arBalance["balance"]["RUB"]["DOSTUPNO"];

                if( ($balance) < ($amount) ) return 13;

                $arTransfer = $payeer->initOutput(array(
                    'ps' => '57378077',
                    'curIn' => 'RUB',
                    'sumOut' => $amount,
                    'curOut' => 'RUB',
                    'param_ACCOUNT_NUMBER' => $user_data['ym'],
                    'comment' => $comment,
                    ));

                if (!$arTransfer) return 12;

                $historyId = $payeer->output();

                if ($historyId > 0) return true;

                else return 12;

                break;

			case 'pyb':

                $payeer = new Payeer($payconfig->AccountNumber, $payconfig->apiId, $payconfig->apiKey);

                if (!$payeer->isAuth()) return 15;

                $arBalance = $payeer->getBalance();

                if($arBalance["auth_error"] != 0) return 14;

                $balance = $arBalance["balance"]["RUB"]["DOSTUPNO"];

                if( ($balance) < ($amount) ) return 13;

                $arTransfer = $payeer->initOutput(array(
                    'ps' => '24898938',
                    'curIn' => 'RUB',
                    'sumOut' => $amount,
                    'curOut' => 'RUB',
                    'param_ACCOUNT_NUMBER' => $user_data['pyb'],
                    'comment' => $comment,
                    ));

                if (!$arTransfer) return 12;

                $historyId = $payeer->output();

                if ($historyId > 0) return true;

                else return 12;

                break;



            case 'pyqi':

                $payeer = new Payeer($payconfig->AccountNumber, $payconfig->apiId, $payconfig->apiKey);

                if (!$payeer->isAuth()) return 15;

                $arBalance = $payeer->getBalance();

                if($arBalance["auth_error"] != 0) return 14;

                $balance = $arBalance["balance"]["RUB"]["DOSTUPNO"];

                if( ($balance) < ($amount) ) return 13;

                $arTransfer = $payeer->initOutput(array(
                    'ps' => '26808',
                    'curIn' => 'RUB',
                    'sumOut' => $amount,
                    'curOut' => 'RUB',
                    'param_ACCOUNT_NUMBER' => $user_data['pyqi'],
                    'comment' => $comment,
                    ));

                if (!$arTransfer) return $payeer->getErrors();

                $historyId = $payeer->output();

                if ($historyId > 0) return $payeer->getErrors();

                else return 12;

                break;

			case 'pyvi':

                $payeer = new Payeer($payconfig->AccountNumber, $payconfig->apiId, $payconfig->apiKey);

                if (!$payeer->isAuth()) return 15;

                $arBalance = $payeer->getBalance();

                if($arBalance["auth_error"] != 0) return 14;

                $balance = $arBalance["balance"]["RUB"]["DOSTUPNO"];

                if( ($balance) < ($amount) ) return 13;

                $arTransfer = $payeer->initOutput(array(
                    'ps' => '244385496',
                    'curIn' => 'RUB',
                    'sumOut' => $amount,
                    'curOut' => 'RUB',
                    'param_ACCOUNT_NUMBER' => $user_data['pyvi'],
                    'comment' => $comment,
                    ));

                if (!$arTransfer) return 12;

                $historyId = $payeer->output();

                if ($historyId > 0) return true;

                else return 12;

                break;

			case 'pymas':

                $payeer = new Payeer($payconfig->AccountNumber, $payconfig->apiId, $payconfig->apiKey);

                if (!$payeer->isAuth()) return 15;

                $arBalance = $payeer->getBalance();

                if($arBalance["auth_error"] != 0) return 14;

                $balance = $arBalance["balance"]["RUB"]["DOSTUPNO"];

                if( ($balance) < ($amount) ) return 13;

                $arTransfer = $payeer->initOutput(array(
                    'ps' => '57644634',
                    'curIn' => 'RUB',
                    'sumOut' => $amount,
                    'curOut' => 'RUB',
                    'param_ACCOUNT_NUMBER' => $user_data['pymas'],
                    'comment' => $comment,
                    ));

                if (!$arTransfer) return 12;

                $historyId = $payeer->output();

                if ($historyId > 0) return true;

                else return 12;

                break;

			case 'pymae':

                $payeer = new Payeer($payconfig->AccountNumber, $payconfig->apiId, $payconfig->apiKey);

                if (!$payeer->isAuth()) return 15;

                $arBalance = $payeer->getBalance();

                if($arBalance["auth_error"] != 0) return 14;

                $balance = $arBalance["balance"]["RUB"]["DOSTUPNO"];

                if( ($balance) < ($amount) ) return 13;

                $arTransfer = $payeer->initOutput(array(
                    'ps' => '244773909',
                    'curIn' => 'RUB',
                    'sumOut' => $amount,
                    'curOut' => 'RUB',
                    'param_ACCOUNT_NUMBER' => $user_data['pymae'],
                    'comment' => $comment,
                    ));

                if (!$arTransfer) return 12;

                $historyId = $payeer->output();

                if ($historyId > 0) return true;

                else return 12;

                break;

            case 'pymt':

                $payeer = new Payeer($payconfig->AccountNumber, $payconfig->apiId, $payconfig->apiKey);

                if (!$payeer->isAuth()) return 15;

                $arBalance = $payeer->getBalance();

                if($arBalance["auth_error"] != 0) return 14;

                $balance = $arBalance["balance"]["RUB"]["DOSTUPNO"];

                if( ($balance) < ($amount) ) return 13;

                $arTransfer = $payeer->initOutput(array(
                    'ps' => '24899291',
                    'curIn' => 'RUB',
                    'sumOut' => $amount,
                    'curOut' => 'RUB',
                    'param_ACCOUNT_NUMBER' => $user_data['pymt'],
                    'comment' => $comment,
                    ));

                if (!$arTransfer) return 12;

                $historyId = $payeer->output();

                if ($historyId > 0) return true;

                else return 12;

                break;

            case 'pymf':

                $payeer = new Payeer($payconfig->AccountNumber, $payconfig->apiId, $payconfig->apiKey);

                if (!$payeer->isAuth()) return 15;

                $arBalance = $payeer->getBalance();

                if($arBalance["auth_error"] != 0) return 14;

                $balance = $arBalance["balance"]["RUB"]["DOSTUPNO"];

                if( ($balance) < ($amount) ) return 13;

                $arTransfer = $payeer->initOutput(array(
                    'ps' => '24899391',
                    'curIn' => 'RUB',
                    'sumOut' => $amount,
                    'curOut' => 'RUB',
                    'param_ACCOUNT_NUMBER' => $user_data['pymf'],
                    'comment' => $comment,
                    ));

                if (!$arTransfer) return 12;

                $historyId = $payeer->output();

                if ($historyId > 0) return true;

                else return 12;

                break;

            case 'pyt':

                $payeer = new Payeer($payconfig->AccountNumber, $payconfig->apiId, $payconfig->apiKey);

                if (!$payeer->isAuth()) return 15;

                $arBalance = $payeer->getBalance();

                if($arBalance["auth_error"] != 0) return 14;

                $balance = $arBalance["balance"]["RUB"]["DOSTUPNO"];

                if( ($balance) < ($amount) ) return 13;

                $arTransfer = $payeer->initOutput(array(
                    'ps' => '95877310',
                    'curIn' => 'RUB',
                    'sumOut' => $amount,
                    'curOut' => 'RUB',
                    'param_ACCOUNT_NUMBER' => $user_data['pyt'],
                    'comment' => $comment,
                    ));

                if (!$arTransfer) return 12;

                $historyId = $payeer->output();

                if ($historyId > 0) return true;

                else return 12;

                break;

            case 'pokp':

                $payeer = new Payeer($payconfig->AccountNumber, $payconfig->apiId, $payconfig->apiKey);

                if (!$payeer->isAuth()) return 15;

                $arBalance = $payeer->getBalance();

                if($arBalance["auth_error"] != 0) return 14;

                $balance = $arBalance["balance"]["RUB"]["DOSTUPNO"];

                if( ($balance) < ($amount) ) return 13;

                $arTransfer = $payeer->initOutput(array(
                    'ps' => '1652561',
                    'curIn' => 'RUB',
                    'sumOut' => $amount,
                    'curOut' => 'RUB',
                    'param_ACCOUNT_NUMBER' => $user_data['pokp'],
                    'comment' => $comment,
                    ));

                if (!$arTransfer) return 12;

                $historyId = $payeer->output();

                if ($historyId > 0) return true;

                else return 12;

                break;

            default:
                return 12;
                break;
        }
    }

    public static function prepeareParams ($paysystem, $amount, $lid, $user, $payconfig)
    {

        switch ($paysystem)
        {
            case 'py':
                $m_shop = $payconfig->shopID;
                $m_orderid = $lid;
                $m_amount = number_format($amount, 2, ".", "");
                $m_curr = "RUB";
                $m_desc = base64_encode(HOST." - USER ".$user['user']);
                $m_key = $payconfig->secretW;

                $arHash = array(
                 $m_shop,
                 $m_orderid,
                 $m_amount,
                 $m_curr,
                 $m_desc,
                 $m_key
                );
                $sign = strtoupper(hash('sha256', implode(":", $arHash)));

                $params = array(
                    'location' => 'https://payeer.com/api/merchant/m.php',
                    'method' => 'get',
                    'm_shop' => $m_shop,
                    'm_orderid' => $m_orderid,
                    'm_amount' => $m_amount,
                    'm_curr' => $m_curr,
                    'm_desc' => $m_desc,
                    'm_sign' => $sign,
                    );
                return $params;
                break;

            case 'fk':
                $sum = number_format($amount, 2, ".", "");
                $sign = md5($payconfig->fkId.":".$sum.":".$payconfig->fkSecret.":".$lid);

                $params = array(
                    'location' => 'http://www.free-kassa.ru/merchant/cash.php',
                    'method' => 'get',
                    'm' => $payconfig->fkId,
                    'oa' => $sum,
                    'o' => $lid,
                    's' => $sign,
                    );
                return $params;
                break;

            case 'ac':
                $sign = hash("sha256", $payconfig->advEmail.":".$payconfig->advName.":".$amount.":RUB:".$payconfig->advKey.":".$lid);
                $params = array(
                    'location' => 'https://wallet.advcash.com/sci/',
                    'method' => 'post',
                    'ac_account_email' => $payconfig->advEmail,
                    'ac_sci_name' => $payconfig->advName,
                    'ac_amount' => $amount,
                    'ac_currency' => 'RUB',
                    'ac_order_id' => $lid,
                    'ac_sign' => $sign,
                    );
                return $params;
                break;

            case 'ym':
                $params = array(
                    'location' => 'https://money.yandex.ru/quickpay/confirm.xml',
                    'method' => 'post',
                    'receiver' => $payconfig->yandexAcc,
                    'sum' => $amount * 1.05,
                    'writable-sum' => 'false',
                    'formcomment' => '', //comment
                    'short-dest' => '', //comment
                    'targets' => $lid, //comment
                    'writable-targets' => 'false',
                    'label' => $lid, //tag
                    'quickpay-form' => 'shop',
                    'paymentType' => 'PC',
                    'comment-needed' => 'true',
                    'comment' => $lid,
                    'fio' => 0,
                    'mail' => 0,
                    'phone' => 0,
                    'address' => 0
                );
                return $params;
            default:
                return false;
                break;
        }
    }

    public static function getForm ($params)
    {
        $form = "<center><form id='form' action='";

        $location = array_shift($params);

        $form .= $location."' method='";

        $method = array_shift($params);

        $form .= $method."'>";

        foreach ($params as $key => $value)
        {
            $form .="<input type='hidden' name='".$key."' value='".$value."'>";
        }

        $form .= "<input type='submit' value='оплатить'>";

        $form .= "</form></center>";

        $form .= "<script>document.getElementById('form').submit();</script>";

        return $form;

    }
    /**
     * @param string
     * @param bool
     * @return bool
     */
    public static function isActive($ps, $type = false)
    {

        $db = Db::getConnection();

        if ($type === false)
        {

            $sql = 'SELECT COUNT(active) FROM db_paysystems WHERE name = :ps';

            $result = $db->prepare($sql);

            $result->bindParam(':ps', $ps, PDO::PARAM_STR);

            $result->execute();

            if ($result->fetchColumn() == 0) return false;

            $sql = 'SELECT active FROM db_paysystems WHERE name = :ps';

            $result = $db->prepare($sql);

            $result->bindParam(':ps', $ps, PDO::PARAM_STR);

            $result->execute();

            if ($result->fetchColumn() == 1) return true;

            return false;

        }
        else
        {

            $sql = 'SELECT COUNT(*) FROM db_paysystems WHERE name = :ps';

            $result = $db->prepare($sql);

            $result->bindParam(':ps', $ps, PDO::PARAM_STR);

            $result->execute();

            if ($result->fetchColumn() == 0) return false;

            $sql = 'SELECT * FROM db_paysystems WHERE name = :ps';

            $result = $db->prepare($sql);

            $result->bindParam(':ps', $ps, PDO::PARAM_STR);

            $result->execute();

            $row = $result->fetch();

            if ($row['active_'.$type] == 1) return 1;

            if ($row['active_'.$type] == 2) return 2;

            return false;

        }

    }

    public static function getActiveSystems($isPayment)
    {

        $db = Db::getConnection();

        if ($isPayment){
            $paysystems = array();
            $sql = 'SELECT COUNT(*) FROM db_paysystems WHERE active = 1 AND active_payment != 0';
            $result = $db->query($sql);

            if ($result->fetchColumn() == 0) return $paysystems;
            $sql = 'SELECT * FROM db_paysystems WHERE active = 1 AND active_payment != 1';
            $result = $db->query($sql);
        } else {
            $paysystems = array();
            $sql = 'SELECT COUNT(*) FROM db_paysystems WHERE active = 1';
            $result = $db->query($sql);

            if ($result->fetchColumn() == 0) return $paysystems;
            $sql = 'SELECT * FROM db_paysystems WHERE active = 1';
            $result = $db->query($sql);
        }


        while ($row = $result->fetch()) $paysystems[] = $row;
        return $paysystems;
    }

    public static function getPaysystemsSettings()
    {

        $paysystems = array();

        $db = Db::getConnection();

        $sql = 'SELECT * FROM db_paysystems';

        $result = $db->query($sql);

        while ($row = $result->fetch()) $paysystems[] = $row;

        return $paysystems;
    }

    /**
     * @param string
     * @return array/bool
     */
    public static function getPaysystem($name)
    {

        if ($name == false) return false;

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM db_paysystems WHERE name = :name';

        $result = $db->prepare($sql);

        $result->bindParam(':name', $name, PDO::PARAM_STR);

        $result->execute();

        if ($result->fetchColumn() == 0) return false;

        $sql = 'SELECT * FROM db_paysystems WHERE name = :name';

        $result = $db->prepare($sql);

        $result->bindParam(':name', $name, PDO::PARAM_STR);

        $result->execute();

        return $result->fetch();

    }

    public static function updatePaysystemsSettings($params, $name)
    {

        $db = Db::getConnection();

        $args = array();

        $sql = 'UPDATE db_paysystems SET ';

        foreach ($params as $key => $value)
        {

            $sql .= $key." = :".$key.", ";

            $args[':'.$key] = $value;
        }

        $args[':name'] = $name;

        $sql = substr($sql, 0, -2);

        $sql .=" WHERE name = :name";

        $result = $db->prepare($sql);

        $result->execute($args);

    }


}
