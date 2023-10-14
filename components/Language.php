<?PHP

/**
 *
 */
class Language
{

    public static $errs            = array();
    public static $title;
    public static $languages       = array('ru');
    public static $defaultlanguage = 'ru';

    public static function setDefaultLanguage ()
    {

        if (isset($_COOKIE['lang'])) {
            if (array_search($_COOKIE['lang'], self::$languages) === FALSE)
                $_SESSION['lang'] = self::$defaultlanguage;

            else $_SESSION['lang'] = $_COOKIE['lang'];

        } else {
            $_SESSION['lang'] = self::$defaultlanguage;

            setcookie("lang", self::$defaultlanguage, time() + 2592000);
        }

    }

    public static function setLanguage ($lang)
    {

        $lang = self::checkLanguage($lang);

        setcookie("lang", $lang, time() + 2592000);

        $_SESSION['lang'] = $lang;

    }

    public static function checkLanguage ($lang)
    {

        if (array_search($lang, self::$languages) === FALSE)
            return self::$defaultlanguage;

        else return $lang;

    }

    public static function getTitle ($module, $lang)
    {
        $method = $lang . "Titles";

        self::$method($module);

        return self::$title;
    }

    public static function getErrors ($module, $lang, $config = false, $params = false)
    {

        $lang = self::checkLanguage($lang);

        $method = $lang . "Errors";

        self::$method($module, $config, $params);

        return self::$errs;

    }

    private static function ruTitles ($module)
    {
        switch ($module) {
            case 'MainNotFound':
                self::$title = 'Страница не найдена';
                break;
            case 'MainSuccess':
                self::$title = 'Успешно';
                break;
            case 'MainFail':
                self::$title = 'Ошибка';
                break;
            case 'MainIndex':
                self::$title = 'Главная';
                break;
            case 'MainMarketing':
                self::$title = 'Маркетинг';
                break;
            case 'MainTerms':
                self::$title = 'Правила';
                break;
            case 'MainStats':
                self::$title = 'Статистика';
                break;
            case 'MainPayouts':
                self::$title = 'Выплаты';
                break;
            case 'MainCompetitions':
                self::$title = 'Конкурсы';
                break;
            case 'MainFeedback':
                self::$title = 'Отзывы';
                break;
            case 'MainContacts':
                self::$title = 'Контакты';
                break;
            case 'MainLogin':
                self::$title = 'Авторизация';
                break;
            case 'MainSignup':
                self::$title = 'Регистрация';
                break;
            case 'MainRecovery':
                self::$title = 'Восстановить пароль';
                break;
            case 'AccountCabinet':
                self::$title = 'Мой кабинет';
                break;
            case 'AccountPark':
                self::$title = 'Мой парк';
                break;
            case 'AccountLeaders':
                self::$title = 'Гонка лидеров';
                break;
            case 'AccountLottery':
                self::$title = 'Лотерея';
                break;
            case 'AccountRefKing':
                self::$title = 'Король рефералов';
                break;
            case 'AccountInsert':
                self::$title = 'Пополнить счёт';
                break;
            case 'AccountPayment':
                self::$title = 'Заказ выплаты';
                break;
            case 'AccountExchange':
                self::$title = 'Обмен баланса';
                break;
            case 'AccountInsertserfing':
                self::$title = 'Пополнение рекламного баланса';
                break;
            case 'AccountReferals':
                self::$title = 'Список рефералов';
                break;
            case 'AccountPartnership':
                self::$title = 'Партнерская программа';
                break;
            case 'AccountPromo':
                self::$title = 'Рекламные материалы';
                break;
            case 'AccountSettings':
                self::$title = 'Настройки аккаунта';
                break;
            case 'AccountQuests':
                self::$title = 'Оплачиваемые квесты';
                break;
            case 'AccountBonus':
                self::$title = 'Ежедневный бонус';
                break;
            case 'AccountCalculator':
                self::$title = 'Калькулятор дохода';
                break;
            case 'SerfingSerfing':
                self::$title = 'Сёрфинг сайтов';
                break;
            case 'SerfingAdd':
                self::$title = 'Панель управления сёрфингом';
                break;
        }
    }

    private static function ruErrors ($module, $config, $params)
    {
        switch ($module) {
            case 'SerfingAdd':
                $errs = array(
                    1 => array(0 => 'Ошибка', 1 => 'Ошибка данных', 2 => 'error'),
                    2 => array(0 => 'Ошибка', 1 => 'Неверный формат заголовка', 2 => 'error'),
                    3 => array(0 => 'Ошибка', 1 => 'Неверный формат ссылки', 2 => 'error'),
                    64 => array(0 => 'Ошибка', 1 => 'Неверный формат ссылки', 2 => 'error'),
                    4 => array(0 => 'Успешно', 1 => 'Сайт успешно добавлен!', 2 => 'success'),
                    5 => array(0 => 'Успешно', 1 => 'Ссылка удалена', 2 => 'success'),
                    6 => array(0 => 'Успешно', 1 => 'Ссылка запущена', 2 => 'success'),
                    7 => array(0 => 'Успешно', 1 => 'Ссылка приостановлена', 2 => 'success'),
                    8 => array(0 => 'Успешно', 1 => 'Ссылка отредактирована', 2 => 'success'),
                    9 => array(0 => 'Ошибка', 1 => 'Укажите сумму заказа чуть меньше', 2 => 'error'),
                    10 => array(0 => 'Успешно', 1 => 'Ссылка пополнена', 2 => 'success'),
                    30 => 'ожидает модерации',
                    31 => 'запущен',
                    32 => 'приостановлен',
                );
                break;
            case 'AccountSettings':
                $errs = array(
                    1 => array(0 => 'Успешно', 1 => 'Новый пароль успешно установлен', 2 => 'success'),
                    2 => array(0 => 'Ошибка', 1 => 'Пароль и повтор пароля не совпадают', 2 => 'error'),
                    3 => array(0 => 'Ошибка', 1 => 'Пароль имеет неверный формат', 2 => 'error'),
                    4 => array(0 => 'Ошибка', 1 => 'Старый пароль заполнен неверно', 2 => 'error'),
                    5 => array(0 => 'Успешно', 1 => 'Кошелек успешно привязан', 2 => 'success'),
                    6 => array(0 => 'Ошибка', 1 => 'Неверный формат кошелька', 2 => 'error'),
                    7 => array(0 => 'Ошибка', 1 => 'Кошелёк можно указать только 1 раз', 2 => 'error'),
                    10 => array(0 => 'Ошибка', 1 => 'Пароли не совпадают', 2 => 'error'),
                    12 => array(0 => 'Ошибка', 1 => 'Ошибка данных', 2 => 'error'),
                    13 => array(0 => 'Ошибка', 1 => 'Платёжная система временно недоступна', 2 => 'error'),
                    /*14 => array(0 => 'Ошибка', 1 => 'Неверный формат пин-кода (8 символов)', 2 => 'error'),
                    15 => array(0 => 'Ошибка', 1 => 'Пин-код можно установить только 1 раз', 2 => 'error'),
                    16 => array(0 => 'Успешно', 1 => 'Пин-код успешно установлен', 2 => 'success'),*/
                );
                break;
            case 'AccountQuests':
                $errs = array(
                    6 => array(0 => 'Ошибка', 1 => 'Вы уже получали бонус', 2 => 'error'),
                    7 => array(0 => 'Ошибка', 1 => 'Условие квеста не выполнено', 2 => 'error'),
                    8 => array(0 => 'Успешно', 1 => 'Вам зачислен бонус в размере ' . $config["serf_quest_bonus"] . ' руб.', 2 => 'success'),
                    9 => array(0 => 'Успешно', 1 => 'Вам зачислен бонус в размере ' . $config["ref_quest_bonus"] . ' руб.', 2 => 'success'),
                );
                break;
            case 'AccountBonus':
                $errs = array(
                    1 => array(0 => 'Ошибка', 1 => 'Ошибка данных', 2 => 'error'),
                    2 => array(0 => 'Успешно', 1 => 'Вам зачислен бонус в размере ' . $params["sum"] . ' руб.', 2 => 'success'),
                );
                break;
            case 'AccountLottery':
                $errs = array(
                    1 => array(0 => 'Ошибка', 1 => 'Вы уже участвуйте в данной лотерей', 2 => 'error'),
                    2 => array(0 => 'Успешно', 1 => 'Вы были успешно добавлены в тираж лотереи', 2 => 'success'),
                );
                break;
            case 'AccountRefking':
                $errs = array(
                    1 => array(0 => 'Ошибка', 1 => 'Вы уже являетесь королем рефералов', 2 => 'error'),
                    2 => array(0 => 'Ошибка', 1 => 'У вас недостаточно средств для покупки статуса "Короля"', 2 => 'error'),
                    3 => array(0 => 'Успех', 1 => 'Ваша коронации была успешно завершена', 2 => 'success'),
                );
                break;
            case 'AccountExchange':
                $errs = array(
                    1 => array(0 => 'Ошибка', 1 => 'Ошибка данных', 2 => 'error'),
                    2 => array(0 => 'Ошибка', 1 => 'Минимальная сумма - 1 руб.', 2 => 'error'),
                    3 => array(0 => 'Ошибка', 1 => 'Недостаточно денег закажите чуть меньше', 2 => 'error'),
                    4 => array(0 => 'Успешно', 1 => 'Обмен произошёл успешно', 2 => 'success'),
                );
                break;
            case 'AccountPayment':
                $errs = array(
                    1 => array(0 => 'Ошибка', 1 => 'Перед заказом выплаты, необходимо указать пин код в настройках аккаунта', 2 => 'error'),
                    2 => array(0 => 'Ошибка', 1 => 'Ошибка данных', 2 => 'error'),
                    3 => array(0 => 'Ошибка', 1 => 'Неверный формат пароля', 2 => 'error'),
                    4 => array(0 => 'Ошибка', 1 => 'Платёжная система временно недоступна', 2 => 'error'),
                    5 => array(0 => 'Ошибка', 1 => 'Перед заказом выплаты, необходимо установить кошелёк настройках аккаунта', 2 => 'error'),
                    6 => array(0 => 'Ошибка', 1 => 'Неверный пин-код', 2 => 'error'),
                    7 => array(0 => 'Ошибка', 1 => 'Выплата доступна 1 раз в ' . $config["pay_timeout"] . ' часа(ов)', 2 => 'error'),
                    8 => array(0 => 'Ошибка', 1 => 'Минимальная сумма для вывода ' . $params["min_pay"] . ' руб.', 2 => 'error'),
                    9 => array(0 => 'Ошибка', 1 => 'Максимальная сумма для вывода ' . $params["max_pay"] . ' руб.', 2 => 'error'),
                    10 => array(0 => 'Ошибка', 1 => 'Недостаточно средств для вывода, укажите немного меньше', 2 => 'error'),
                    11 => array(0 => 'Успешно', 1 => 'Выплачено!', 2 => 'success'),
                    12 => array(0 => 'Ошибка', 1 => 'Внутренняя ошибка(1)', 2 => 'error'),
                    13 => array(0 => 'Ошибка', 1 => 'Внутренняя ошибка(2)', 2 => 'error'),
                    14 => array(0 => 'Ошибка', 1 => 'Внутренняя ошибка(3)', 2 => 'error'),
                    15 => array(0 => 'Ошибка', 1 => 'Внутренняя ошибка(4)', 2 => 'error'),
                    16 => array(0 => 'Успешно', 1 => 'Заявка успешно создана', 2 => 'success'),
                    20 => 'В обработке',
                    21 => 'Выполнена',
                    22 => 'Отменена',
                    23 => 'Ожидание',
                );
                break;
            case 'AccountInsert':
                $errs = array(
                    1 => array(0 => 'Ошибка', 1 => 'Ошибка данных', 2 => 'error'),
                    2 => array(0 => 'Ошибка', 1 => 'Платёжная система временно недоступна', 2 => 'error'),
                    3 => array(0 => 'Ошибка', 1 => 'Минимальная сумма пополнения - ' . $config["min_ins"] . ' руб.', 2 => 'error'),
                    4 => array(0 => 'Ошибка', 1 => 'Максимальная сумма пополнения - ' . $config["max_ins"] . ' руб.', 2 => 'error'),
                    20 => 'В обработке',
                    21 => 'Выполнена',
                );
                break;
            case 'AccountPark':
                $errs = array(
                    1 => array(0 => 'Ошибка', 1 => 'Ошибка данных', 2 => 'error'),
                    2 => array(0 => 'Ошибка', 1 => 'Недостаточно средств', 2 => 'error'),
                    3 => array(0 => 'Успешно', 1 => 'Покупка совершена', 2 => 'success'),
                    4 => array(0 => 'Успешно', 1 => 'Обмен произошёл успешно', 2 => 'success'),
                    5 => array(0 => 'Ошибка', 1 => 'Все кусты уже раскупили', 2 => 'error'),
                );
                break;
            case 'MainFeedback':
                $errs = array(
                    1 => array(0 => 'Ошибка', 1 => 'Максимальное количество символов - 500', 2 => 'error'),
                    2 => array(0 => 'Ошибка', 1 => 'Максимальное количество отзывов на модерацию - 3', 2 => 'error'),
                    3 => array(0 => 'Успешно', 1 => 'Отзыв отправлен на модерацию', 2 => 'success'),
                );
                break;
            case 'MainLogin':
                $errs = array(
                    1 => array(0 => 'Ошибка', 1 => 'Неверный формат логина/email', 2 => 'error'),
                    2 => array(0 => 'Ошибка', 1 => 'Неверный формат пароля', 2 => 'error'),
                    3 => array(0 => 'Ошибка', 1 => 'Пользователь с данным логином/email не найден', 2 => 'error'),
                    4 => array(0 => 'Ошибка', 1 => 'Неверный пароль', 2 => 'error'),
                    5 => array(0 => 'Ошибка', 1 => 'Ваш аккаунт заблокирован!', 2 => 'error'),
                    6 => array(0 => 'Ошибка', 1 => 'Доступ запрещён', 2 => 'error'),
                    7 => array(0 => 'Успешно', 1 => 'Вы успешно авторизовались', 2 => 'success'),
                );
                break;
            case 'MainSignup':
                $errs = array(
                    1 => array(0 => 'Ошибка', 1 => 'Неверный формат email', 2 => 'error'),
                    2 => array(0 => 'Ошибка', 1 => 'Неверный формат логина', 2 => 'error'),
                    3 => array(0 => 'Ошибка', 1 => 'Неверный формат пароля', 2 => 'error'),
                    4 => array(0 => 'Ошибка', 1 => 'Данный email занят', 2 => 'error'),
                    5 => array(0 => 'Ошибка', 1 => 'Данный логин занят', 2 => 'error'),
                    6 => array(0 => 'Ошибка', 1 => 'Пароли не совпадают', 2 => 'error'),
                    32 => array(0 => 'Ошибка', 1 => 'Вы не прошли капчу', 2 => 'error'),
                    7 => array(0 => 'Ошибка', 1 => 'С данного IP уже проводилась регистрация', 2 => 'error'),
                    8 => array(0 => 'Успешно', 1 => 'Вы успешно зарегистрировались, используйте форму входа', 2 => 'success'),
                    9 => array(0 => 'Ошибка', 1 => 'Доступ запрещён', 2 => 'error'),
                    20 => array(0 => 'Ошибка', 1 => 'Заполните каптчу', 2 => 'error'),
                    21 => array(0 => 'Ошибка', 1 => 'Неправильная каптча2', 2 => 'error'),
                );
                break;
            case 'MainRecovery':
                $errs = array(
                    1 => array(0 => 'Ошибка', 1 => 'Неверный формат email', 2 => 'error'),
                    2 => array(0 => 'Ошибка', 1 => 'Пользователь с данным email не найден', 2 => 'error'),
                    3 => array(0 => 'Ошибка', 1 => 'От вас уже поступали заявки в течении 24 часов', 2 => 'error'),
                    4 => array(0 => 'Успешно', 1 => 'Данные для сброса высланы вам на email', 2 => 'success'),
                    5 => array(0 => 'Ошибка', 1 => 'Возможно, вы ошиблись при вводе ссылки', 2 => 'error'),
                    6 => array(0 => 'Успешно', 1 => 'Новый пароль выслан вам на email', 2 => 'success'),
                );
                break;
        }
        self::$errs = $errs + array('s' => array(0 => 'Ошибка', 1 => 'Ошибка доступа, попробуйте еще раз.', 2 => 'error'));

    }

}
