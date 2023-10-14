<?php

/**
 *
 */
class MainController
{

    public $usid;
    public $user_data;
    public $usname;
    public $config;
    public $ps;

    function __construct ()
    {

        $this->usid = User::isLogged();

        $this->user_data = User::getDataById($this->usid);

        $this->usname = $this->user_data['user'];

        $this->config = Settings::getSettings();

        $this->ps = Paysystems::getActiveSystems();

        Session::tockenSecurity();
    }

    public function actionNotfound ()
    {

        http_response_code(404);

        $_title = Language::getTitle('MainNotFound', LANG);

        // подключаем вид
        require_once(ROOT . "/views/" . LANG . "/_404.php");

    }

    public function actionSuccess ()
    {

        $_title = Language::getTitle('MainSuccess', LANG);

        $stats = Info::getStats($this->config);

        // подключаем вид
        require_once(ROOT . "/views/" . LANG . "/_index.php");

        echo "<script>setTimeout(function(){swal('Успешно', 'Баланс успешно пополнен', 'success')}, 100);</script>";

    }

    public function actionFail ()
    {

        $_title = Language::getTitle('MainFail', LANG);

        $stats = Info::getStats($this->config);

        // подключаем вид
        require_once(ROOT . "/views/" . LANG . "/_index.php");

        echo "<script>setTimeout(function(){swal('Ошибка', 'Произошла ошибка', 'error')}, 100);</script>";

    }

    public function actionIndex ($ref = 0)
    {

        if ($ref != 0) {
            if (!$this->usid) {

                $referer = (isset($ref) && intval($ref) > 0) ? intval($ref) : 0;

                $referer = (User::checkIssetUser($referer)) ? $referer : 0;

                Referals::addRefVisit($referer);

                Referals::setReferer($referer);

            }

            header("Location: /");
            return;
        }

        $_title = Language::getTitle('MainIndex', LANG);
        $recaptcha = new Recaptcha();
        $stats = Info::getStats($this->config);
        $pays = Info::getLastPays();
        $inserts = Info::getLastInserts();

        // подключаем вид
        require_once(ROOT . "/views/" . LANG . "/_index.php");

    }

    public function actionMarketing ()
    {

        $_title = Language::getTitle('MainMarketing', LANG);

        $plans = Deposit::getPlans();

        // подключаем вид
        require_once(ROOT . "/views/" . LANG . "/_marketing.php");

    }

    public function actionTerms ()
    {

        $_title = Language::getTitle('MainTerms', LANG);

        // подключаем вид
        require_once(ROOT . "/views/" . LANG . "/_terms.php");

    }

    public function actionCompetitions ()
    {

        $_title = Language::getTitle('MainCompetitions', LANG);

        $referal_competition = Competition::getActiveReferalCompetition();

        $invest_competition = Competition::getActiveInvestCompetition();

        // подключаем вид
        require_once(ROOT . "/views/" . LANG . "/_competitions.php");

    }

    public function actionPayouts ()
    {

        $_title = Language::getTitle('MainPayouts', LANG);
        $stats = Info::getStats($this->config);
        $pays = Info::getLastPays();

        // подключаем вид
        require_once("views/" . LANG . "/_payouts.php");

    }

    public function actionFeedback ($page = 1)
    {

        $_title = Language::getTitle('MainFeedback', LANG);

        if (isset($_POST['text']) && !empty($_POST['text'])) {

            $langerrors = Language::getErrors('MainFeedback', LANG);

            $errors = false;

            $text = Validator::isClean($_POST['text']);

            $text = htmlspecialchars($text);

            if (!Session::checkTockenSecurity($_POST['_tocken']))
                $errors = $langerrors['s'];

            if ($errors === false && strlen($text) > 500)
                $errors = $langerrors[1];

            if ($errors === false && !Feedback::checkUnactiveFeedbacks($this->usid))
                $errors = $langerrors[2];

            if ($errors === false) {

                Feedback::addFeedback($this->usid, $this->usname, $text);

                $errors = $langerrors[3];
            }
        }

        $nav = new Paginator();

        // Записей на страницу
        $on_page = 10;

        $page = intval($page);

        $page = $nav->issetPage('MainFeedback', $on_page, $page);

        $feedbacks = Feedback::getActiveFeedbacks($nav, $page, $on_page);

        // Получаем строку с пагинацией
        $navigation = $nav->getPagination('MainFeedback', $page, $on_page, false, $this->usid);

        // подключаем вид
        require_once("views/" . LANG . "/_feedback.php");

    }

    public function actionContacts ()
    {

        $_title = Language::getTitle('MainContacts', LANG);

        // подключаем вид
        require_once(ROOT . "/views/" . LANG . "/_contacts.php");

    }

    /**
     * Экшн для AJAX логина
     */
    public function actionLogin ()
    {

        $_title = Language::getTitle('MainLogin', LANG);

        // получаем необходимые данные
        $langerrors = Language::getErrors('MainLogin', LANG);

        // проверяем, не авторизован ли пользователь
        if ($this->usid) {
            if (isset($_POST['ajax']) && $_POST['ajax'] == 1) {
                $errors['mess']   = $langerrors[6];
                $errors['status'] = 'error';
            } else {
                Header("Location: /");
                return;
            }
        } elseif (isset($_POST['log_email']) && !empty($_POST['log_email'])) {

            $email_v = Validator::isMail($_POST['log_email']);

            if ($email_v === false)
                $email_v = Validator::isLogin($_POST['log_email']);

            $email = $email_v;

            $password = Validator::isPassword($_POST['pass']);

            $password = Func::cryptPassword($password);

            $errors = false;

//            if (!Session::checkTockenSecurity($_POST['_tocken']))
//                $errors = $langerrors['s'];

            // проверяем валидность email
            if ($errors === false && $email === false) {
                if (isset($_POST['ajax']) && $_POST['ajax'] == 1) {
                    $errors['mess']   = $langerrors[1];
                    $errors['status'] = 'error';
                } else {
                    $errors = $langerrors[1];
                }
            }

            // проверяем валидность пароля
            if ($errors === false && $password === false) {
                if (isset($_POST['ajax']) && $_POST['ajax'] == 1) {
                    $errors['mess']   = $langerrors[2];
                    $errors['status'] = 'error';
                } else {
                    $errors = $langerrors[2];
                }
            }

            if ($errors === false)
                $log_data = User::getDataByEmail($email);

            // проверяем есть ли пользователь с таким email/логин
            if ($errors === false && $log_data === false) {
                if (isset($_POST['ajax']) && $_POST['ajax'] == 1) {
                    $errors['mess']   = $langerrors[3];
                    $errors['status'] = 'error';
                } else {
                    $errors = $langerrors[3];
                }
            }

            // проверяем правильность пароля
            if ($errors === false && $log_data["pass"] != $password) {
                if (isset($_POST['ajax']) && $_POST['ajax'] == 1) {
                    $errors['mess']   = $langerrors[4];
                    $errors['status'] = 'error';
                } else {
                    $errors = $langerrors[4];
                }
            }

            // проверяем не забанен ли
            if ($errors === false && $log_data["banned"] == 1) {
                if (isset($_POST['ajax']) && $_POST['ajax'] == 1) {
                    $errors['mess']   = $langerrors[5];
                    $errors['status'] = 'error';
                } else {
                    $errors = $langerrors[5];
                }
            }

            if ($errors === false) {

                $ip = Func::GetUserIp();

                Session::setSessionId($log_data["id"]);

                $usid = User::signIn($log_data, $ip);

                if (isset($_POST['ajax']) && $_POST['ajax'] == 1) {
                    $errors['mess']   = $langerrors[7];
                    $errors['status'] = 'ok';
                } else {
                    $errors = $langerrors[7];

                    Header("Location: /cabinet");

                    return;
                }
            }
        }

        if (isset($_POST['ajax']) && $_POST['ajax'] == 1) {
            if (isset($errors) && !empty($errors))
                echo json_encode($errors);
        } else require_once(ROOT . "/views/" . LANG . "/_login.php");

    }

    /**
     * Экшн для AJAX регистрации
     */
    public function actionSignup ()
    {

        $_title = Language::getTitle('MainSignup', LANG);

        $settings = Settings::getSettings();

        // получаем необходимые данные
        $langerrors = Language::getErrors('MainSignup', LANG);

        $recaptcha = new Recaptcha();

        $errors = false;
        // проверяем, не авторизован ли пользователь
        if ($this->usid) {

            if (isset($_POST['ajax'])) {
                $errors['mess']   = $langerrors[9];
                $errors['status'] = 'error';

            } else {
                Header("Location: /");
                return;
            }
        } elseif (isset($_POST['reg_email']) && !empty($_POST['reg_email'])) {

            //echo json_encode($_POST);
            // Валидация данных
            $email = Validator::isMail($_POST['reg_email']);

            $login = Validator::isLogin($_POST['reg_login']);

            $password = Validator::isPassword($_POST['reg_pass']);

            $ip = Func::GetUserIp();

            // проверяем валидность email
            if ($errors === false && $email === false) {
                if (isset($_POST['ajax']) && $_POST['ajax'] == 1) {
                    $errors['mess']       = $langerrors[1];
                    $errors['status']     = 'error';
                    $errors['new_tocken'] = Session::$tocken;
                } else {
                    $errors = $langerrors[1];
                }
            }

            // проверяем валидность логина
            if ($errors === false && $login === false) {
                if (isset($_POST['ajax']) && $_POST['ajax'] == 1) {
                    $errors['mess']       = $langerrors[2];
                    $errors['status']     = 'error';
                    $errors['new_tocken'] = Session::$tocken;
                } else {
                    $errors = $langerrors[2];
                }
            }

            // проверяем валидность пароля
            if ($errors === false && $password === false) {
                if (isset($_POST['ajax']) && $_POST['ajax'] == 1) {
                    $errors['mess']       = $langerrors[3];
                    $errors['status']     = 'error';
                    $errors['new_tocken'] = Session::$tocken;
                } else {
                    $errors = $langerrors[3];
                }
            }

            // проверяем есть ли пользователь с таким email
            if ($errors === false)
                $free_email = User::checkFreeEmail($email);

            if ($errors === false && $free_email === false) {
                if (isset($_POST['ajax']) && $_POST['ajax'] == 1) {
                    $errors['mess']       = $langerrors[4];
                    $errors['status']     = 'error';
                    $errors['new_tocken'] = Session::$tocken;
                } else {
                    $errors = $langerrors[4];
                }
            }

            // проверяем есть ли пользователь с таким логином
            if ($errors === false)
                $free_login = User::checkFreeLogin($login);

            if ($errors === false && $free_login === false) {
                if (isset($_POST['ajax']) && $_POST['ajax'] == 1) {
                    $errors['mess']       = $langerrors[5];
                    $errors['status']     = 'error';
                    $errors['new_tocken'] = Session::$tocken;
                } else {
                    $errors = $langerrors[5];
                }
            }

            // проверяем совпадают ли пароли
            if ($errors === false && $_POST['reg_re_pass'] != $password) {
                if (isset($_POST['ajax']) && $_POST['ajax'] == 1) {
                    $errors['mess']       = $langerrors[6];
                    $errors['status']     = 'error';
                    $errors['new_tocken'] = Session::$tocken;
                } else {
                    $errors = $langerrors[6];
                }
            }

            // проверяем на мультиаккаунты
            if ($errors === false)
                $no_multi = User::checkMulty($ip);

            if ($errors === false && $no_multi === false) {
                if (isset($_POST['ajax']) && $_POST['ajax'] == 1) {
                    $errors['mess']       = $langerrors[7];
                    $errors['status']     = 'error';
                    $errors['new_tocken'] = Session::$tocken;
                } else {
                    $errors = $langerrors[7];
                }
            }
            if ($errors === false) {

                // id реферера 1 ур.
                $referer_id = (isset($_SESSION["ref"]) ? User::checkIssetUser($_SESSION["ref"]) : 0) ? $_SESSION["ref"] : 0;

                // Получаем массив рефереров
                $referers = Referals::getReferersId($settings, $referer_id);

                // Шифруем пароль
                $password_crypt = Func::cryptPassword($password);

                Sender::SendAfterReg($login, $email, $password);
                User::reCaptcha();
                // регистрируем
                $usid = User::signUp($login, $email, $password_crypt, $ip, $referers);

                if ($this->config['reg_bonus'] != 0) {

                    $this->user_data = User::getDataById($usid);

                    $plan = Deposit::getPlan($this->config['reg_bonus']);

                    // зачисляем депозит
                    Deposit::doDeposit($this->user_data, $plan);
                }

                if ($referer_id > 0 && $this->config['ref_bonus'] > 0) {
                    User::takeSum($referer_id, 'money_b', $this->config['ref_bonus'], true);
                }

                if (isset($_POST['ajax']) && $_POST['ajax'] == 1) {
                    $errors['mess']       = $langerrors[8];
                    $errors['status']     = 'ok';
                    $errors['new_tocken'] = Session::$tocken;
                } else {
                    $errors = $langerrors[8];
                }
            }
        }

        if (isset($_POST['ajax']) && $_POST['ajax'] == 1) {
            // выдаём ошибку и статус в формате json
            if (isset($errors) && !empty($errors))
                echo json_encode($errors);
        } else {
            // подключаем вид
            require_once(ROOT . "/views/" . LANG . "/_signup.php");
        }

    }

    /**
     * Экшн для рековери
     */
    public function actionRecovery ()
    {

        $_title = Language::getTitle('MainRecovery', LANG);

        // получаем необходимые данные
        $langerrors = Language::getErrors('MainRecovery', LANG);

        // проверяем, не авторизован ли пользователь
        if ($this->usid !== false) {
            Header("Location: /");
            return;
        }

        if (isset($_POST['rec_email']) && !empty($_POST['rec_email'])) {

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken']))
                $errors = $langerrors['s'];

            // проверяем валидность email
            if ($errors === false)
                $email = Validator::isMail($_POST['rec_email']);

            if ($errors === false && $email === false)
                $errors = $langerrors[1];

            // проверяем существует ли такой email
            if ($errors === false && !$user_data = User::getDataByEmail($email))
                $errors = $langerrors[2];

            // проверяем наличие заявок за 24 часа
            if ($errors === false && !Recovery::checkLastRecoverys($email))
                $errors = $langerrors[3];

            if ($errors === false) {
                $ip = Func::GetUserIp();

                $key = Func::newKey(32);

                $key_crypted = Func::cryptPassword($key);

                $link = Recovery::getLink($key);

                // Вносим в базу
                Recovery::setApplication($email, $user_data['id'], $ip, $key_crypted);

                // Отсылаем ссылку для сброса
                Sender::SendApplicationLink($email, $link);

                $errors = $langerrors[4];

            }

        }

        // подключаем вид
        require_once(ROOT . "/views/" . LANG . "/_recovery.php");

    }

    public function actionRecoveryreset ($key)
    {

        $langerrors = Language::getErrors('MainRecovery', LANG);

        if (isset($key) && !empty($key)) {
            $key_crypted = Func::cryptPassword($key);

            $row = Recovery::getRowByKey($key_crypted);

            if ($row === false) {
                $errors = $langerrors[5];
            } else {
                $password = Func::newKey(10);

                $password_crypted = Func::cryptPassword($password);

                User::changePass($row['user_id'], $password_crypted);

                Sender::SendNewPassword($row['email'], $password);

                Recovery::updateRowStatus($row);

                $errors = $langerrors[6];
            }
            // подключаем вид
            require_once(ROOT . "/views/" . LANG . "/_login.php");
        } else {
            Header("Location: /");

            return;
        }

    }

}
