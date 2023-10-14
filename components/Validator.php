<?PHP

/**
* 
*/
class Validator
{

    public static function isPassword($password = NULL)
    {
        
        return (is_array($password) OR $password == NULL) ? false : (preg_match("/^[a-zA-Z0-9]{5,20}$/", $password)) ? $password : false;
    
    }

    public static function isPayPass($password = NULL)
    {
        
        return (is_array($password) OR $password == NULL) ? false : (preg_match("/^[a-zA-Z0-9]{8}$/", $password)) ? $password : false;
    
    }

    public static function isLogin($login = NULL)
    {
        
        return (is_array($login) OR $login == NULL) ? false : (preg_match("/^[a-zA-Z0-9]{4,18}$/", $login)) ? $login : false;
    
    }

    public static function isMail($mail = NULL)
    {
        
        return (is_array($mail) OR $mail == NULL) ? false : (preg_match("/^([a-zA-Z0-9\+_\-]+)(\.[a-zA-Z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $mail)) ? $mail : false;
   
    }

    public static function isUrl($url = NULL)
    {
        
        return (is_array($url) OR $url == NULL) ? false : (preg_match("/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-=?]*)*\/?$/", $url)) ? $url : false;
   
    }
     public static function isUrl2($url)
    {
        $finm="https://123es.ml";
 			$finm1="http://123es.ml";
 			
 			$urk="https://";
 			$urkl="http://";
 			$dl=strlen($url);
 			for($i=8;$i<$dl;$i++)
 			{
 			  
 			    if(strcmp(substr($url, $i, 1), "/")===0)
 			    {
 			        break;
 			    }
 			    $d=substr($url, $i, 1);
 			    $urk=$urk.$d;
 			    
 			}
 			for($ir=7;$ir<$dl;$ir++)
 			{
 			  
 			    if(strcmp(substr($url, $ir, 1), "/")===0)
 			    {
 			        break;
 			    }
 			    $dk=substr($url, $ir, 1);
 			    $urkl=$urkl.$dk;
 			    
 			}
 		    $gh=strcmp($urkl, $finm1);
 			$sa=strcmp($urk, $finm);
 			if(($sa==0)||($gh==0))
 			{
 			    return false;
 			    
 			}
 			else
 			{
 			    return true;
 			}

   
    }

    public static function isSystem($system = NULL)
    {
        
        if ($system === 'py' OR $system === 'fk' OR $system === 'ac' OR $system === 'ym' OR $system === 'pyb' OR $system === 'pymt' OR $system === 'pymf' OR $system === 'pyt' OR $system === 'pokp' OR $system === 'pyqi' OR $system === 'pyym' OR $system === 'pyvi' OR $system === 'pymas' OR $system === 'pymae') return $system;

        return false;
   
    }

    public static function isPurse($purse, $system)
    {

        switch ($system) 
        {
        	case 'py':
        		return (is_array($purse)) ? false : (preg_match("/^P[0-9]{7,10}$/", $purse)) ? $purse : false;
        		break;
        	case 'ac':
        		if(is_array($purse) && empty($purse) && strlen($purse) > 255 && strpos($purse,'@') > 64) return false;
				return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $purse)) ? false : strtolower($purse);
        		break;
            case 'ym':
                return (is_array($purse)) ? false : (preg_match("/^41001[0-9]{7,11}$/", $purse)) ? $purse : false;
                break;
            case 'pyb':
                return (is_array($purse)) ? false : (preg_match("/^[\+]{1}[7]{1}[9]{1}[\d]{9}$/", $purse)) ? $purse : false;
                break;
            case 'pymt':
                return (is_array($purse)) ? false : (preg_match("/^[\+]{1}[7]{1}[9]{1}[\d]{9}$/", $purse)) ? $purse : false;
                break;
            case 'pymf':
                return (is_array($purse)) ? false : (preg_match("/^[\+]{1}[7]{1}[9]{1}[\d]{9}$/", $purse)) ? $purse : false;
                break;
            case 'pyt':
                return (is_array($purse)) ? false : (preg_match("/^[\+]{1}[7]{1}[9]{1}[\d]{9}$/", $purse)) ? $purse : false;
                break;
            case 'pokp':
                return (is_array($purse)) ? false : (preg_match("/^([O]{1}[K]{1}[\d]{9}|.*@.*)$/", $purse)) ? $purse : false;
                break;
			case 'pyqi':
                return (is_array($purse)) ? false : (preg_match("/^\+\d{9,15}$/", $purse)) ? $purse : false;
                break;
			case 'pyym':
                return (is_array($purse)) ? false : (preg_match("/^([O]{1}[K]{1}[\d]{9}|.*@.*)$/", $purse)) ? $purse : false;
                break;
			case 'pyvi':
                return (is_array($purse)) ? false : (preg_match("/^([45]{1}[\d]{15}|[6]{1}[\d]{17})$/", $purse)) ? $purse : false;
                break;
			case 'pymas':
                return (is_array($purse)) ? false : (preg_match("/^([O]{1}[K]{1}[\d]{9}|.*@.*)$/", $purse)) ? $purse : false;
                break;
			case 'pymae':
                return (is_array($purse)) ? false : (preg_match("/^([O]{1}[K]{1}[\d]{9}|.*@.*)$/", $purse)) ? $purse : false;
                break;	
        }

        return false;
    }

    public static function isClean($text)
    {
        
        return strip_tags($text);
   
    }

}

?>