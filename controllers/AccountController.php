<?php

/**
 *
 */
class AccountController
{

    public $usid;
    public $user_data;
    public $counters;
    public $config;

    function __construct ()
    {

        $this->usid = User::isLogged();

        $this->user_data = User::getDataById($this->usid);

        $this->counters = User::getCounters($this->usid);

        $this->config = Settings::getSettings();

        Session::tockenSecurity();
    }

    public function actionCabinet ()
    {

        // редирект если гость
        if (!$this->usid) {
            Header("Location: /");
            return;
        }

        $_title = Language::getTitle('AccountCabinet', LANG);

        $user_stat = User::getUserStat($this->user_data);

        $this->user_data['days'] = floor((time() - $this->user_data['date_reg']) / 60 / 60 / 24);

        $deposits = Deposit::getUserDeposits($this->usid);
        $plans = Deposit::getPlans();

        // подключаем вид
        require_once(ROOT . "/views/" . LANG . "/_cabinet.php");

    }

    public function actionStats ()
    {

        $_title = Language::getTitle('MainStats', LANG);

        $stats = Info::getStats($this->config);

        $pays = Info::getLastPays();

        $inserts = Info::getLastInserts();

        $periodsum = Info::getPeriodSum();

        $top_referals = Info::getTopReferals();

        $top_pays = Info::getTopPays();

        $top_speed = Info::getTopSpeed();

        $top_referals_money = Info::getTopReferalsMoney();

        // подключаем вид
        require_once(ROOT . "/views/" . LANG . "/_stats.php");

    }

    public function actionPark ()
    {

        // редирект если гость
        if (!$this->usid) {
            Header("Location: /");
            return;
        }

        $_title = Language::getTitle('AccountPark', LANG);

        if (isset($_POST['buy']) && isset($_POST['plan'])) {

            // получаем необходимые данные
            $langerrors = Language::getErrors('AccountPark', LANG, $this->config);

            $plan = Deposit::getPlan(intval($_POST["plan"]));

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken']))
                $errors = $langerrors['s'];

            // Проверяем план на существование
            if ($errors === false && $plan === false)
                $errors = $langerrors[1];

            // Проверяем хватает ли денег
            if ($errors === false && $plan['price'] > $this->user_data['money_b'])
                $errors = $langerrors[2];

            if ($plan['col_limit'] == 0) {
                $limit = false;
            } else {
                if ($plan['col_limit'] <= $plan['col_activated']) {
                    $limit = true;
                } else {
                    $limit = false;
                }
            }

            if ($errors === false && $limit)
                $errors = $langerrors[5];

            if ($errors === false) {

                // изымаем сумму
                User::takeSum($this->usid, 'money_b', $plan['price']);

                // зачисляем депозит
                Deposit::doDeposit($this->user_data, $plan);

                $params = array(
                    'col_activated' => intval($plan['col_activated'] + 1),
                );
                Deposit::updatePlanSettings($params, $plan['id']);

                $errors = $langerrors[3];

            }
        }

        if (isset($_POST['swap'])) {

            // получаем необходимые данные
            $langerrors = Language::getErrors('AccountPark', LANG, $this->config);

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken']))
                $errors = $langerrors['s'];

            // Проверяем хватает ли для обмена
            if ($errors === false && $this->user_data['money_k'] < 0.01)
                $errors = $langerrors[1];

            if ($errors === false) {

                $change = $this->config['change_balance'];

                // зачисляем сумму
                if ($change == 100) {
                    User::takeSum($this->usid, 'money_p', $this->user_data['money_k'], true);
                } else {

                    $percent = $this->user_data['money_k'] / 100 * $change;
                    $sumB    = $this->user_data['money_k'] - $percent;
                    $sumP    = $this->user_data['money_k'] - $sumB;

                    User::takeSum($this->usid, 'money_b', $sumB, true);
                    User::takeSum($this->usid, 'money_p', $sumP, true);
                }

                // изымаем сумму
                User::takeSum($this->usid, 'money_k', $this->user_data['money_k']);

                $errors = $langerrors[4];

            }
        }

        $contr = new AjaxController;

        $change = $this->config['change_balance'];

        $contr->actionBalance();

        $this->user_data = User::getDataById($this->usid);
        $user_stat = User::getUserStat($this->user_data);

        $deposits = Deposit::getUserDeposits($this->usid);
        $plans = Deposit::getPlans();

        // подключаем вид
        require_once(ROOT . "/views/" . LANG . "/_park.php");

    }

    public function actionLeaders ()
    {
        $db = Db::getConnection();
        // редирект если гость
        if (!$this->usid) {
            Header("Location: /");
            return;
        }

        $_title = Language::getTitle('AccountLeaders', LANG);

        $leads = Competition::leadersGetAllCompetition();

        foreach ($leads as $lead) {

            if (isset($lead['users'])) {

                foreach ($lead['users'] as $user) {

                    if (isset($user['place'])) {

                        $pr = $lead[$user['place'] . "m"];
                        $us = $user['user'];

                        if ($lead['term'] == 1) {
                            $sql = "UPDATE users_002 SET day='$pr' WHERE user='$us'";
                            $db->query($sql);
                        }
                        if ($lead['term'] == 7) {
                            $sql = "UPDATE users_002 SET week='$pr' WHERE user='$us'";
                            $db->query($sql);
                        }
                        if ($lead['term'] == 30) {
                            $sql = "UPDATE users_002 SET month='$pr' WHERE user='$us'";
                            $db->query($sql);
                        }
                        if ($lead['term'] == 365) {
                            $sql = "UPDATE users_002 SET year='$pr' WHERE user='$us'";
                            $db->query($sql);
                        }

                    }
                }
            }
        }

        // подключаем вид
        require_once(ROOT . "/views/" . LANG . "/_leaders.php");

    }

    public function actionLottery ()
    {
        $db = Db::getConnection();
        // редирект если гость
        if (!$this->usid) {
            Header("Location: /");
            return;
        }

        $_title = Language::getTitle('AccountLottery', LANG);

        if (isset($_POST["user_take"])) {

            $lott_avialable = Competition::lotteryIsTakeAvailable($this->usid);

            $langerrors = Language::getErrors('AccountLottery', LANG);

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken']))
                $errors = $langerrors['s'];

            if ($errors === false && $lott_avialable === false)
                $errors = $langerrors[1];

            if ($errors === false) {

                Competition::lotteryAddUserToRaffle($this->user_data, time());

                $this->user_data = User::getDataById($this->usid);

                $langerrors = Language::getErrors('AccountLottery', LANG, false);

                $errors = $langerrors[2];
            }

        }

        $lott_avialable   = Competition::lotteryIsTakeAvailable($this->usid);
        $curr_lott_users  = Competition::lotteryGetCurrentUsers();
        $lasts_lott_users = Competition::lotteryGetLastsUsers();
        $last_lott_users  = Competition::lotteryGetLastInfo();
        $lottery_info     = Competition::lotteryGetConfig();

        // подключаем вид
        require_once(ROOT . "/views/" . LANG . "/_lottery.php");

    }

    public function actionRefking ()
    {

        // редирект если гость
        if (!$this->usid) {
            Header("Location: /");
            return;
        }
        $_title = Language::getTitle('AccountRefKing', LANG);


        if (isset($_POST["yes"])) {

            $refking_config = Competition::refkingGetConfig();
            $refking_available = Competition::refkingIsTakeAvailable($this->usid);
            $langerrors = Language::getErrors('AccountRefking', LANG);
            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken']))
                $errors = $langerrors['s'];

            if ($errors === false && $refking_available === false)
                $errors = $langerrors[1];

            if ($errors === false && $refking_config['buy_sum'] > $this->user_data['money_b'])
                $errors = $langerrors[2];

            if ($errors === false) {

                Competition::refkingDeleteOldKing();

                User::takeSum($this->usid, 'money_b', $refking_config['buy_sum'] );

                $params = array(
                    'king_id' => intval($this->usid),
                    'king_name' => $this->user_data['user'],
                    'king_date_start' => time(),
                );
                Competition::refkingUpdateConfig($params);

                $errors = $langerrors[3];
            }

        }

        $refking_config = Competition::refkingGetConfig();
        $refking_available = Competition::refkingIsTakeAvailable($this->usid);
        $refking_get_king = Competition::refkingGetKing();
        $refking_get_lasts_king = Competition::refkingGetLastsKings();
        $refking_get_last = Competition::refkingGetLastInfo();


        // подключаем вид
        require_once(ROOT . "/views/" . LANG . "/_refking.php");
    }

    public function actionInsert ()
    {

        // редирект если гость
        if (!$this->usid) {
            Header("Location: /");
            return;
        }

        $_title = Language::getTitle('AccountInsert', LANG);

        // получаем необходимые данные
        $langerrors = Language::getErrors('AccountInsert', LANG, $this->config);

        if (isset($_POST["amount"]) && isset($_POST["ps"])) {

            $paysystem = Validator::isSystem($_POST["ps"]);

            $paysystem = Paysystems::getPaysystem($paysystem);

            $amount = floatval($_POST['amount']);

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken']))
                $errors = $langerrors['s'];

            // Проверяем валидность системы
            if ($errors === false && $paysystem === false)
                $errors = $langerrors[1];

            // Проверяем доступна ли платёжка
            if ($errors === false && Paysystems::isActive($paysystem['name']) === false)
                $errors = $langerrors[2];

            // Проверяем доступна ли платёжка (для пополнений)
            if ($errors === false && Paysystems::isActive($paysystem['name'], 'insert') === false)
                $errors = $langerrors[2];

            // Проверяем нижний порог
            if ($errors === false && $amount < $this->config['min_ins'])
                $errors = $langerrors[3];

            // Проверяем верхний порог
            if ($errors === false && $amount > $this->config['max_ins'])
                $errors = $langerrors[4];

            if ($errors === false) {

                $payconfig = new PayConfig();

                $lid = Insert::prepeareInsert($this->user_data, $amount, $paysystem);

                $params = Paysystems::prepeareParams($paysystem['name'], $amount, $lid, $this->user_data, $payconfig);

                if ($params !== false) {
                    echo Paysystems::getForm($params);

                    return;
                }
            }

        }

        $paysystems = Paysystems::getActiveSystems();

        $statuses = array(
            0 => $langerrors[20],
            1 => $langerrors[21],
        );

        $last_inserts = User::getLastUserInserts($this->usid, $statuses, Paysystems::$paynames);

        // подключаем вид
        require_once(ROOT . "/views/" . LANG . "/_insert.php");

    }

    public function actionPayment ()
    {

        // редирект если гость
        if (!$this->usid) {
            Header("Location: /");
            return;
        }

        $_title = Language::getTitle('AccountPayment', LANG);

        if (isset($_POST["amount"]) && isset($_POST["system"])) {

            $amount = floatval($_POST["amount"]);

            $ps = Validator::isSystem($_POST["system"]);

            $paysystem = Paysystems::getPaysystem($ps);

            //$pay_pass = Validator::isPayPass($_POST["pin"]);

            $last_withdraw = User::getLastWithdrawTime($this->usid);

            $langerrors = Language::getErrors('AccountPayment', LANG, $this->config, $paysystem);

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken']))
                $errors = $langerrors['s'];

            // Проверяем установлен ли пин
            //if ($errors === false && $this->user_data['pay_pass'] == '0') $errors = $langerrors[1];

            // Проверяем валидность системы
            if ($errors === false && $paysystem === false)
                $errors = $langerrors[2];

            // Проверяем валидность пароля
            //if ($errors === false && $pay_pass === false) $errors = $langerrors[3];

            // Проверяем доступна ли платёжка
            if ($errors === false && Paysystems::isActive($ps) === false)
                $errors = $langerrors[4];

            // Проверяем доступна ли платёжка (для выплат)
            if ($errors === false && Paysystems::isActive($ps, 'payment') === false)
                $errors = $langerrors[4];

            // Проверяем прописан ли кошель
            if ($errors === false && $this->user_data[$paysystem['name']] == '0')
                $errors = $langerrors[5];

            // Проверяем правильность пароля
            //if ($errors === false) $pay_pass = Func::cryptPassword($pay_pass);

            //if ($errors === false && $pay_pass != $this->user_data['pay_pass']) $errors = $langerrors[6];

            // Проверяем временное ограничение
            if ($errors === false && $last_withdraw + ($this->config['pay_timeout'] * 60 * 60) > time())
                $errors = $langerrors[7];

            // Проверяем выплату по нижнему ограничению
            if ($errors === false && $amount < $paysystem['min_pay'])
                $errors = $langerrors[8];

            // Проверяем выплату по верхнему ограничению
            if ($errors === false && $amount > $paysystem['max_pay'])
                $errors = $langerrors[9];

            // Проверяем хватает ли денег
            if ($errors === false && $this->user_data["money_p"] < $amount)
                $errors = $langerrors[10];

            if ($errors === false) {

                $payconfig = new PayConfig();

                if (Paysystems::isActive($paysystem['name'], 'payment') == 1) {

                    $result = Paysystems::doWithdraw($this->user_data, $paysystem['name'], $amount, $payconfig);

                    if ($result === true) {

                        $lid = Withdraw::prepeareWithdraw($this->user_data, $this->user_data[$paysystem['name']], $paysystem, $amount, Paysystems::isActive($paysystem['name'], 'payment'));

                        Withdraw::doWithdraw($lid);
                        $errors = $langerrors[11];
                    } else {
                        $errors = $langerrors[$result];
                    }

                } elseif (Paysystems::isActive($paysystem['name'], 'payment') == 2) {

                    $lid = Withdraw::prepeareWithdraw($this->user_data, $this->user_data[$paysystem['name']], $paysystem, $amount, Paysystems::isActive($paysystem['name'], 'payment'));

                    $errors = $langerrors[16];
                }
            }
        }

        $langerrors = Language::getErrors('AccountPayment', LANG);

        $paysystems = Paysystems::getActiveSystems(true);

        $this->user_data = User::getDataById($this->usid);

        $statuses = array(
            0 => $langerrors[20],
            1 => $langerrors[21],
            2 => $langerrors[22],
            3 => $langerrors[23],
        );

        $last_payments = User::getLastUserPayments($this->usid, $statuses, Paysystems::$paynames);

        // подключаем вид
        require_once(ROOT . "/views/" . LANG . "/_payment.php");
    }

    public function actionExchange ()
    {

        // редирект если гость
        if (!$this->usid) {
            Header("Location: /");
            return;
        }

        $_title = Language::getTitle('AccountExchange', LANG);

        if (isset($_POST["amount"]) && isset($_POST["change"])) {

            $langerrors = Language::getErrors('AccountExchange', LANG);

            $amount = floatval($_POST["amount"]);

            switch ($_POST["change"]) {
                case '1':
                    $from = 'money_p';
                    $to   = 'money_b';
                    break;

                case '2':
                    $from = 'money_p';
                    $to   = 'money_r';
                    break;

                default:
                    $from = false;
                    $to   = false;
                    break;
            }

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken']))
                $errors = $langerrors['s'];

            // Проверяем тип
            if ($errors === false && $from === false)
                $errors = $langerrors[1];

            // Проверяем нижний порог
            if ($errors === false && $amount < 1)
                $errors = $langerrors[2];

            // Проверяем хватает ли денег
            if ($errors === false && $amount > $this->user_data[$from])
                $errors = $langerrors[3];

            if ($errors === false) {
                // зачисляем сумму
                User::takeSum($this->usid, $to, $amount, true);

                // изымаем сумму
                User::takeSum($this->usid, $from, $amount);

                $this->user_data = User::getDataById($this->usid);

                $errors = $langerrors[4];
            }
        }

        // подключаем вид
        require_once(ROOT . "/views/" . LANG . "/_exchange.php");
    }

    public function actionInsertserfing ()
    {

        // редирект если гость
        if (!$this->usid) {
            Header("Location: /");
            return;
        }

        $_title = Language::getTitle('AccountInsertserfing', LANG);

        // получаем необходимые данные
        $langerrors = Language::getErrors('AccountInsert', LANG, $this->config);

        if (isset($_POST["amount"]) && isset($_POST["ps"])) {

            $paysystem = Validator::isSystem($_POST["ps"]);

            $paysystem = Paysystems::getPaysystem($paysystem);

            $amount = floatval($_POST['amount']);

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken']))
                $errors = $langerrors['s'];

            // Проверяем валидность системы
            if ($errors === false && $paysystem === false)
                $errors = $langerrors[1];

            // Проверяем доступна ли платёжка
            if ($errors === false && Paysystems::isActive($paysystem['name']) === false)
                $errors = $langerrors[2];

            // Проверяем доступна ли платёжка (для пополнений)
            if ($errors === false && Paysystems::isActive($paysystem['name'], 'insert') === false)
                $errors = $langerrors[2];

            // Проверяем нижний порог
            if ($errors === false && $amount < $this->config['min_ins'])
                $errors = $langerrors[3];

            // Проверяем верхний порог
            if ($errors === false && $amount > $this->config['max_ins'])
                $errors = $langerrors[4];

            if ($errors === false) {

                $payconfig = new PayConfig();

                $lid = Insert::prepeareInsert($this->user_data, $amount, $paysystem, 2);

                $params = Paysystems::prepeareParams($paysystem['name'], $amount, $lid, $this->user_data, $payconfig);

                if ($params !== false) {
                    echo Paysystems::getForm($params);

                    return;
                }
            }

        }

        $paysystems = Paysystems::getActiveSystems();

        $statuses = array(
            0 => $langerrors[20],
            1 => $langerrors[21],
        );

        $last_inserts = User::getLastUserInserts($this->usid, $statuses, Paysystems::$paynames, 2);

        // подключаем вид
        require_once(ROOT . "/views/" . LANG . "/_insertserfing.php");

    }

    public function actionReferals ($l = 1)
    {

        // редирект если гость
        if (!$this->usid) {
            Header("Location: /");
            return;
        }

        $_title = Language::getTitle('AccountReferals', LANG);

        $lvl = (intval($l) > 0 && intval($l) <= $this->config['ref_lvls']) ? intval($l) : 1;

        $referer_data = Referals::getReferer($this->usid);

        $ref_link = Referals::getReferalLink($this->usid);

        $referals = Referals::getReferalsLvl($this->usid, $lvl);

        require_once(ROOT . "/views/" . LANG . "/_referals.php");

    }

    public function actionPartnership ()
    {

        // редирект если гость
        if (!$this->usid) {
            Header("Location: /");
            return;
        }

        $_title = Language::getTitle('AccountPartnership', LANG);
        $ref_link = Referals::getReferalLink($this->usid);
        if ($this->user_data['referer1'] == null) {$referer = "---";}else{$referer = $this->user_data['referer1'];}

        require_once(ROOT . "/views/" . LANG . "/_partnership.php");

    }

    public function actionPromo ()
    {

        // редирект если гость
        if (!$this->usid) {
            Header("Location: /");
            return;
        }

        $_title = Language::getTitle('AccountPromo', LANG);

        $referer_data = Referals::getReferer($this->usid);

        $ref_link = Referals::getReferalLink($this->usid);

        require_once(ROOT . "/views/" . LANG . "/_promo.php");

    }

    public function actionSettings ()
    {

        // редирект если гость
        if (!$this->usid) {
            Header("Location: /");
            return;
        }

        $_title = Language::getTitle('AccountSettings', LANG);

        // получаем необходимые данные
        $langerrors = Language::getErrors('AccountSettings', LANG);

        $activesystems = Paysystems::getActiveSystems(true);

        foreach ($activesystems as $key => $value) {
            if ($value['active_payment'] == 0)
                continue;

            $activesystems[$key]['example'] = Paysystems::$payexamples[$value['name']];

            $activesystems[$key]['fullname'] = Paysystems::$paynames[$value['name']];
        }

        // установка кошелька
        if (isset($_POST["purse"]) && isset($_POST["system"]) && !empty($_POST["purse"]) && !empty($_POST["system"])) {

            // Валидация системы
            $paysystem = Validator::isSystem($_POST["system"]);

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken']))
                $errors = $langerrors['s'];

            // Валидация платёжки
            if ($errors === false && $paysystem === false)
                $errors = $langerrors[12];

            // Валидация кошелька
            if ($errors === false)
                $purse = Validator::isPurse($_POST["purse"], $paysystem);

            // Проверяем доступна ли платёжка
            if ($errors === false && Paysystems::isActive($paysystem) === false)
                $errors = $langerrors[13];

            // Валидация кошелька
            if ($errors === false && $purse === false)
                $errors = $langerrors[6];

            // Проверка на уже установленный кошелёк
            if ($errors === false && $this->user_data[$paysystem] != '0')
                $errors = $langerrors[7];

            if ($errors === false) {
                User::setPurse($this->usid, $purse, $paysystem);
                $errors = $langerrors[5];
            }

        }

        // смена пароля
        if (isset($_POST["old"]) && isset($_POST["new"]) && isset($_POST["re_new"]) && !empty($_POST["old"]) && !empty($_POST["new"]) && !empty($_POST["re_new"])) {

            // Валидация паролей
            $old = Validator::isPassword($_POST["old"]);

            $new = Validator::isPassword($_POST["new"]);

            $re_new = Validator::isPassword($_POST["re_new"]);

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken']))
                $errors = $langerrors['s'];

            if ($errors === false && ($old === false OR $new === false OR $re_new === false))
                $errors = $langerrors[3];

            // Проверка старого пароля
            if ($errors === false)
                $old = Func::cryptPassword($old);

            if ($errors === false && $old != $this->user_data['pass'])
                $errors = $langerrors[4];

            // Проверка паролей на совпадение
            if ($errors === false && $new !== $re_new)
                $errors = $langerrors[2];

            if ($errors === false) {

                $new = Func::cryptPassword($new);

                User::changePass($this->usid, $new);

                $errors = $langerrors[1];

            }

        }

        // установка пин-кода
        /*if (isset($_POST["pin"]) && !empty($_POST["pin"]))
        {

            $pin = Validator::isPayPass($_POST["pin"]);

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken'])) $errors = $langerrors['s'];

            if ($errors === false && $this->user_data['pay_pass'] != '0') $errors = $langerrors[15];

            if ($errors === false && $pin === false) $errors = $langerrors[14];

            if ($errors === false)
            {
                $pay_pass_crypt = Func::cryptPassword($pin);

                User::changePayPassword($pay_pass_crypt, $this->usid);

                $errors = $langerrors[16];
            }

        }*/

        $this->user_data = User::getDataById($this->usid);

        require_once(ROOT . "/views/" . LANG . "/_settings.php");

    }

    public function actionQuests ($res = NULL)
    {
        // редирект если гость
        if (!$this->usid) {
            Header("Location: /");
            return;
        }

        $_title = Language::getTitle('AccountQuests', LANG);

        $langerrors = Language::getErrors('AccountQuests', LANG, $this->config);

        if (isset($_POST['serf_quest'])) {

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken']))
                $errors = $langerrors['s'];

            if ($errors === false && $this->user_data['serf_bonus'] == 1)
                $errors = $langerrors[6];

            if ($errors === false && $this->user_data['serf_clicks'] < 1000)
                $errors = $langerrors[7];

            if ($errors === false) {
                User::takeSum($this->usid, 'money_b', $this->config['serf_quest_bonus'], true);

                User::updateSerfQuest($this->usid);

                $errors = $langerrors[8];

                $this->user_data = User::getDataById($this->usid);
            }
        }

        if (isset($_POST['ref_quest'])) {

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken']))
                $errors = $langerrors['s'];

            if ($errors === false && $this->user_data['ref_bonus'] == 1)
                $errors = $langerrors[6];

            if ($errors === false && $this->user_data['count_ref1'] < 50)
                $errors = $langerrors[7];

            if ($errors === false) {
                User::takeSum($this->usid, 'money_b', $this->config['ref_quest_bonus'], true);

                User::updateRefQuest($this->usid);

                $errors = $langerrors[9];

                $this->user_data = User::getDataById($this->usid);
            }
        }

        require_once(ROOT . "/views/" . LANG . "/_quests.php");

        if ($res != NULL) {
            switch ($res) {
                case 1:
                    echo "<script>setTimeout(function(){swal('Ошибка', 'Задание не зарегистрировано в системе!', 'error')}, 100);</script>";
                    break;
                case 2:
                    echo "<script>setTimeout(function(){swal('Ошибка', 'Вы не вступили в группу ВКонтакте!', 'error')}, 100);</script>";
                    break;
                case 3:
                    echo "<script>setTimeout(function(){swal('Ошибка', 'ВК аккаунт уже использовался другим пользователем!', 'error')}, 100);</script>";
                    break;
                case 4:
                    echo "<script>setTimeout(function(){swal('Ошибка', 'Вы уже получали бонус!', 'error')}, 100);</script>";
                    break;
                case 5:
                    echo "<script>setTimeout(function(){swal('Успешно', 'Бонус зачислен', 'success')}, 100);</script>";
                    break;
            }
        }
    }

    public function actionBonus ()
    {

        // редирект если гость
        if (!$this->usid) {
            Header("Location: /");
            return;
        }

        $_title = Language::getTitle('AccountBonus', LANG);

        $max_time = strtotime(date('d.m.Y'));

        if (isset($_POST["bonus"])) {

            $bonus_avialable = User::checkAvialableBonus($this->usid, $max_time);

            $langerrors = Language::getErrors('AccountBonus', LANG);

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken']))
                $errors = $langerrors['s'];

            if ($errors === false && $bonus_avialable === false)
                $errors = $langerrors[1];

            if ($errors === false) {

                $sum = rand($this->config['min_bonus'] * 100, $this->config['max_bonus'] * 100) / 100;

                User::takeSum($this->usid, 'money_b', $sum, true);

                Info::addBonus($this->user_data, $sum, time());

                $this->user_data = User::getDataById($this->usid);

                $langerrors = Language::getErrors('AccountBonus', LANG, false, array('sum' => $sum));

                $errors = $langerrors[2];
            }

        }

        $bonus_avialable = User::checkAvialableBonus($this->usid, $max_time);

        $last_bonuses = Info::getLastBonuses();

        // подключаем вид
        require_once(ROOT . "/views/" . LANG . "/_bonus.php");
    }

    public function actionCalculator ()
    {

        // редирект если гость
        if (!$this->usid) {
            Header("Location: /");
            return;
        }

        $_title = Language::getTitle('AccountCalculator', LANG);

        $plans = Deposit::getPlans();

        // подключаем вид
        require_once(ROOT . "/views/" . LANG . "/_calculator.php");
    }

    public function actionLogout ()
    {
        // редирект если гость
        if (!$this->usid) {
            Header("Location: /");
            return;
        }

        $_SESSION = array();

        Header("Location: /");
    }

}
