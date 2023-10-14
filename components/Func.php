<?PHP

class Func
{

	
	public static function IpToInt($ip)
	{ 
		$ip = ip2long($ip); 
		($ip < 0) ? $ip += 4294967296 : true; 
		return $ip; 
	}
	
	public static function IntToIP($int)
	{ 
  		return long2ip($int);  
	}
	
	public static function GetUserIp()
	{
	
		if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) AND !empty($_SERVER['HTTP_X_FORWARDED_FOR']))
		{
			
			$client_ip = ( !empty($_SERVER['REMOTE_ADDR']) ) ? $_SERVER['REMOTE_ADDR'] : ( ( !empty($_ENV['REMOTE_ADDR']) ) ? $_ENV['REMOTE_ADDR'] : "unknown" );
  			$entries = preg_split('[, ]', $_SERVER['HTTP_X_FORWARDED_FOR']);

  			reset($entries);
			
			while (list(, $entry) = each($entries))
			{
				$entry = trim($entry);
				if ( preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list) )
			 	{
				
					$private_ip = array(
					  '/^0\./',
					  '/^127\.0\.0\.1/',
					  '/^192\.168\..*/',
					  '/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/',
					  '/^10\..*/');
	
					$found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);
	
					if ($client_ip != $found_ip)
					{
					   	$client_ip = $found_ip;
					   	break;
					}
					
				}
				
			}
		
			return $client_ip;
		
		}
		else return ( !empty($_SERVER['REMOTE_ADDR']) ) ? $_SERVER['REMOTE_ADDR'] : ( ( !empty($_ENV['REMOTE_ADDR']) ) ? $_ENV['REMOTE_ADDR'] : "unknown" );
	
	}

	public static function newKey ($length = 8)
	{
		return substr(md5(time()), 0, $length);
	}

	public static function cryptPassword ($password)
	{
		$options = array(
			'salt' => md5('dsaasdsd783216e861yusadhasdtadhs'),
		    'cost' => 10
		    );
		return password_hash($password, PASSWORD_DEFAULT, $options);
	}

	
}
