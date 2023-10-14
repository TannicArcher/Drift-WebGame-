<?PHP

class Sender
{
    
	
	public static function SendAfterReg($u, $mail, $u1)
	{
		switch (LANG) 
		{
			case 'ru':
				$text = "Благодарим вас за регистрацию в системе в системе \"".HOST."\"\r\n";
				$text.= "Для подтверждения регистрации перейдите по ссылке ниже: \r\n";
				$text.= "".PROTOCOL."://".HOST."/mailcheck/?hs=$u&hss=$u1\r\n";
			
				$subject = "Завершение регистрации в системе \"".HOST."\"";
				break;
			case 'eng':
				$text = "Thank you for registering with the system in the system \"".HOST."\"\r\n";
				$text.= "Your data to enter the user's personal area: \r\n";
				$text.= "Login: ".$user."\r\n";
				$text.= "Password: ".$pass."\r\n";
				$subject = "Completion of registration in the system \"".HOST."\"";
				break;
		}

		return self::SendMail($mail, $subject, $text);
		
	}

	public static function SendApplicationLink($mail, $link)
	{

		switch (LANG) 
		{
			case 'ru':
				$text = "Кто то пытается сбросить пароль от вашего аккаунта в системе \"".HOST."\"\r\n";
				$text.= "Если это не вы, просто проигнорируйте это сообщение \r\n";
				$text.= "Ссылка для сброса пароля: \r\n";
				$text.= "".PROTOCOL."://".HOST."/".$link."\r\n";
				$subject = "Сброс пароля в системе \"".HOST."\"";
				break;
			case 'eng':
				$text = "Someone tries to reset the password from your account in the system \"".HOST."\"\r\n";
				$text.= "If it's not you, just ignore this message \r\n";
				$text.= "Link to reset your password: \r\n";
				$text.= "<a href='".PROTOCOL."://".HOST."/".$link."'>".HOST."/".$link."</a>\r\n";
				$subject = "Resetting the password in the system \"".HOST."\"";
				break;
		}
	
		return self::SendMail($mail, $subject, $text);
		
	}

	public static function SendNewPassword($mail, $password)
	{

		switch (LANG) 
		{
			case 'ru':
				$text = "Сброс пароля в системе \"".HOST."\"\r\n";
				$text.= "Ваш новый пароль: \r\n";
				$text.= $password."\r\n";
				$subject = "Сброс пароля в системе \"".HOST."\"";
				break;
			case 'eng':
				$text = "Resetting the password in the system \"".HOST."\"\r\n";
				$text.= "Your new password: \r\n";
				$text.= $password."\r\n";
				$subject = "Resetting the password in the system \"".HOST."\"";
				break;
		}
	
		return self::SendMail($mail, $subject, $text);
		
	}

	public static function SendPayPass($mail, $pass)
	{

		switch (LANG) 
		{
			case 'ru':
				$text = "Сброс платёжного пароля в системе \"".HOST."\"\r\n";
				$text.= "Ваш новый платёжный пароль: \r\n";
				$text.= $pass."\r\n";
				$subject = "Сброс пароля в системе \"".HOST."\"";
				break;
			case 'eng':
				$text = "Resetting the payment password in the system \"".HOST."\"\r\n";
				$text.= "Your new billing password: \r\n";
				$text.= $pass."\r\n";
				$subject = "Resetting the password in the system \"".HOST."\"";
				break;
		}
	
		return self::SendMail($mail, $subject, $text);
		
	}

	private static function encodedString($string)
	{
	
		return '=?UTF-8?B?' . base64_encode( $string ) . '?=';
	
	}
	
	private static function Headers()
	{
	
		$headers = "MIME-Version: 1.0\r\n";
		$headers.= "Content-type: text/plain; charset=utf8\r\n";
		$headers.= "Date: ".date( "r" )."\r\n";
		$headers.= "From: support@".HOST." \r\n";
	
		return $headers;
	
	}
	
	private static function SendMail($to, $subject, $message){
		
		switch (LANG) 
		{
			case 'ru':
				$message .= "\r\n----------------------------------------------------
				\r\nСообщение было выслано роботом, пожалуйста, не отвечайте на него!";
				break;
			case 'eng':
				$message .= "\r\n----------------------------------------------------
				\r\nThe message was sent by the robot, please do not reply to it!";
				break;
		}
		
		return (mail($to, self::encodedString($subject), $message, self::Headers())) ? true : false;
	
	}
	
}
