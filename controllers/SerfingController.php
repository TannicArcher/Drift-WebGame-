<?php 

/**
* 
*/
class SerfingController
{

	public $usid;
	public $user_data;
	public $counters;
	
	function __construct()
	{
		$this->usid = User::isLogged();

		$this->user_data = User::getDataById($this->usid);

		// редирект если гость
		if (!$this->usid)
		{
			Header("Location: /");
			return;
		}

		$this->counters = User::getCounters($this->usid);

	}

	public function actionSerfing ()
	{

		Session::tockenSecurity();

		$_title = Language::getTitle('SerfingSerfing', LANG);

		$serfs = Serfing::getUnviewedSerfings($this->usid);

		// подключаем вид
		require_once(ROOT . "/views/" . LANG . "/_serfing.php");
	}

	public function actionAdd ()
	{

		Session::tockenSecurity();

		$_title = Language::getTitle('SerfingAdd', LANG);

		$langerrors = Language::getErrors('SerfingAdd', LANG);

		$serf_plans = Serfing::getPlans();

		$statuses = array(
			0 => $langerrors[30],
			1 => $langerrors[31],
			2 => $langerrors[32],
			);

		if (isset($_POST["add"])) 
		{ 

 			$plan = Serfing::issetPlan(intval($_POST['plan']));

 			$title = Validator::isClean(strval($_POST['title']));

 			$url = Validator::isUrl(strval($_POST['url']));
 			$urlz = Validator::isUrl2(strval($_POST['url']));
 			if($urlz===false)
 			{
 			    $errors = $langerrors[64];
 			}

 			$errors = false;

 			if (!Session::checkTockenSecurity($_POST['_tocken'])) $errors = $langerrors['s'];

 			// Проверяем план
 			if ($errors === false && $plan === false) $errors = $langerrors[1];

 			// Проверяем заголовок
 			if ($errors === false && $title === false) $errors = $langerrors[2];

 			// Проверяем заголовок
 			if ($errors === false && iconv_strlen($title, 'UTF-8') < 7 || iconv_strlen($title, 'UTF-8') > 50) $errors = $langerrors[2];

 			// Проверяем URL
 			if ($errors === false && $url === false) $errors = $langerrors[3];

 			if ($errors === false && $urlz===true) 
 			{
 				// добавляем на модерацию
    			Serfing::addSerfing($plan, $title, $url, $this->user_data);

    			$errors = $langerrors[4];
 			}
 			else
 			{
 			    $errors = $langerrors[64];
 			}
 		}

 		if (isset($_POST['delete']) && !empty($_POST['delete']))
 		{

 			$id = Serfing::issetSerfing(intval($_POST['delete']), $this->usid);

 			$errors = false;

 			if (!Session::checkTockenSecurity($_POST['_tocken'])) $errors = $langerrors['s'];

 			// проверяем существование серфинга у юзера
 			if ($errors === false && $id === false) $errors = $langerrors[1];

 			if ($errors === false)
 			{

 				$serf_data = Serfing::getSerfingData($id);

 				// Возвращаем ловандос
 				User::takeSum($this->usid, 'money_r', $serf_data['money'], true);

 				// Удаляем серф
 				Serfing::deleteSerfing($id);

 				$this->user_data = User::getDataById($this->usid);

 				$errors = $langerrors[5];
 			}
 		}

 		if (isset($_POST['start']) && !empty($_POST['start']))
 		{

 			$id = Serfing::issetSerfing(intval($_POST['start']), $this->usid);

 			$errors = false;

 			if (!Session::checkTockenSecurity($_POST['_tocken'])) $errors = $langerrors['s'];

 			// проверяем существование серфинга у юзера
 			if ($errors === false && $id === false) $errors = $langerrors[1];

 			if ($errors === false) $serf_data = Serfing::getSerfingData($id);

 			// проверяем статус
 			if ($errors === false && $serf_data['status'] != 2) $errors = $langerrors[1];

 			if ($errors === false)
 			{

 				$params = array(
 					'status' => 1,
 					);

 				// Меняем статус
 				Serfing::updateSerfing($serf_data['id'], $params);

 				$errors = $langerrors[6];
 			}
 		}

 		if (isset($_POST['stop']) && !empty($_POST['stop']))
 		{

 			$id = Serfing::issetSerfing(intval($_POST['stop']), $this->usid);

 			$errors = false;

 			if (!Session::checkTockenSecurity($_POST['_tocken'])) $errors = $langerrors['s'];

 			// проверяем существование серфинга у юзера
 			if ($errors === false && $id === false) $errors = $langerrors[1];

 			if ($errors === false) $serf_data = Serfing::getSerfingData($id);

 			// проверяем статус
 			if ($errors === false && $serf_data['status'] != 1) $errors = $langerrors[1];

 			if ($errors === false)
 			{

 				$params = array(
 					'status' => 2,
 					);

 				// Меняем статус
 				Serfing::updateSerfing($serf_data['id'], $params);

 				$errors = $langerrors[7];
 			}
 		}

 		if (isset($_POST['edit']) && !empty($_POST['edit']))
 		{

 			$id = Serfing::issetSerfing(intval($_POST['edit']), $this->usid);

 			$title = Validator::isClean(strval($_POST['title']));

 			$url = Validator::isUrl($_POST['url']);
 			$urlz = Validator::isUrl2(strval($_POST['url']));
 		

 			$plan = Serfing::issetPlan(intval($_POST['plan']));

 			$errors = false;

 			if (!Session::checkTockenSecurity($_POST['_tocken'])) $errors = $langerrors['s'];

 			// проверяем существование серфинга у юзера
 			if ($errors === false && $id === false) $errors = $langerrors[1];

 			// Проверяем план
 			if ($errors === false && $plan === false) $errors = $langerrors[1];

 			// Проверяем заголовок
 			if ($errors === false && $title === false) $errors = $langerrors[2];

 			// Проверяем заголовок
 			if ($errors === false && iconv_strlen($title, 'UTF-8') < 7 || iconv_strlen($title, 'UTF-8') > 50) $errors = $langerrors[2];

 			// Проверяем URL
 			if ($errors === false && $url === false) $errors = $langerrors[3];

 			if ($errors === false && $urlz===true)
 			{

 				$params = array(
 					'title' => $title,
 					'url' => $url,
 					'plan' => $plan,
 					);

 				// Меняем статус
 				Serfing::updateSerfing($id, $params);

 				$errors = $langerrors[8];
 			}
 			else
 			{
 			    $errors = $langerrors[64];
 			}
 		}

 		if (isset($_POST['insert']) && !empty($_POST['insert']) && $_POST['sum'] >= 1)
 		{

 			$id = Serfing::issetSerfing(intval($_POST['insert']), $this->usid);

 			$amount = floatval($_POST['sum']);

 			$errors = false;

 			if (!Session::checkTockenSecurity($_POST['_tocken'])) $errors = $langerrors['s'];

 			// проверяем существование серфинга у юзера
 			if ($errors === false && $id === false) $errors = $langerrors[1];

 			// Проверяем хватает ли денег
 			if ($errors === false && $amount > $this->user_data['money_r']) $errors = $langerrors[9];

 			if ($errors === false)
 			{

 				// Снимаем деньги
 				User::takeSum($this->usid, 'money_r', $amount);

 				// Добавляем на серф
 				Serfing::insertSum($id, $amount);

 				$this->user_data = User::getDataById($this->usid);

 				$errors = $langerrors[10];
 			}
 		}

 		$user_links = Serfing::getUserLinks($this->user_data);

		// подключаем вид
		require_once(ROOT . "/views/" . LANG . "/_addserfing.php");
	}

	public function actionView ($serfid)
	{

		$serfid = Serfing::issetSerfing($serfid);

		if (!$serfid)
		{
			header("Location: /serfing");
			
			return;
		}

		if (!Serfing::checkUnviewedSerfing($this->usid, $serfid))
		{
			header("Location: /serfing");
			
			return;
		}

		Session::tockenSecurity();

		if (!Session::checkTockenSecurity($_POST['_tocken']))
		{
			header("Location: /serfing");
			
			return;
		}

		$serf_data = Serfing::getSerfingData($serfid);

		if ($serf_data['money'] < $serf_data['price'])
		{
			header("Location: /serfing");
			
			return;
		}	

		$_SESSION['view']['cnt'] = md5(session_id() . $this->usid . $serf_data['id']);

	    $_SESSION['view']['id'] = $serf_data['id'];

	    $_SESSION['view']['timer'] = $serf_data['view_time'];

	    $_SESSION['view']['timestart'] = time();

	    $url = '/serfing/frame/' . $_SESSION['view']['cnt'];

		// подключаем вид
		require_once(ROOT . "/views/" . LANG . "/_serfing_view.php");
		
	}

	public function actionFrame ($key)
	{
		// подключаем вид
		require_once(ROOT . "/views/" . LANG . "/_serfing_frame.php");
	}

	public function actionEndview ()
	{

		if (isset($_POST['cnt']) && !empty($_POST['cnt']) && isset($_SESSION['view']['id']) && isset($_SESSION['view']['timer']) && $_POST['cnt'] == $_SESSION['view']['cnt']) 
		{
			$num = intval($_POST['num']);

   			if ($num)
   			{
   				if (time() - $_SESSION['view']['timestart'] < $_SESSION['view']['timer']) exit(0);

		     	$codek = Captcha::getCodekCkick($_SESSION['view']['codek_click']);

		      	foreach ($codek as $k => $v)
		      	{
		      		if ($v == $num)
		      		{
		        		$num = $k;
		        		break;
		      		}
		    	}

		    	if ($num == $_SESSION['view']['captcha'])
		    	{

		    		$serf_data = Serfing::getSerfingData($_SESSION['view']['id']);
		    		
		    		// Добавить просмотр
		    		Serfing::addView($this->usid, $serf_data);

		    		// Списать со счёта серфинга
		    		Serfing::takeMoney($serf_data);

		    		// Зачислить ловандос
		    		User::takeSum($this->usid, 'money_p', $serf_data['click_price'], true);

		    		// Добавить юзеру просмотр
		    		User::addSerfingView($this->usid);

		    		unset($_SESSION['view']);

		    		if ($serf_data["transition"] == 1)
		    		{
		    		 	echo 'OK;1;'.$serf_data["url"];
		    		}
		    		else
		    		{
		    			echo 'OK';
		    		}

		    	}	

		      	else echo 0;

   			}
   			elseif ($num == 0)
			{ 

				$codek_new = rand(1, 3);

				$_SESSION['view']['codek_click'] = $codek_new;

			    $codek = Captcha::getCodekCkick($codek_new);

			    // подключаем вид
				require_once(ROOT . "/views/" . LANG . "/_serfing_captcha.php");

			}
		}

	}

	public function actionCaptcha ()
	{
		Captcha::setCaptch();
	}

	public function actionGettocken ()
	{
		echo $_SESSION['_tocken'];
	}
	
}
