<?php 
/**
* 
*/
class Captcha
{
	
	public static function setCaptch ()
	{
		header('Content-type: image/png'); 

		header("Cache-Control: no-store, no-cache, must-revalidate");

		$width = 136; 
		$height = 47;

		$img = imagecreatetruecolor($width, $height);

		$randbg = rand(1,2);

		$img = imageCreateFromPng(ROOT . '/assets/captcha/bg'.$randbg.'.png');


		$type = rand(1,2);

		if ($type == 1)
		{
		  $capchaResult = rand(1, 8);

		  for ($i=1; $i <= $capchaResult; $i++)
		  { 
		    $stars = imageCreateFromPng(ROOT . '/assets/captcha/star'.rand(1,3).'.png');
		    
		    $x = 15*$i+1;
		  
		    $y = rand(0,1)*16+2;
		  
		    ImageCopy($img, $stars, $x, $y, 0, 0, 16, 16);
		  } 
		}
		else if ($type == 2)
		{ 
		  $font = ROOT . '/assets/captcha/flow_b.ttf';

		  $fontsize = rand(15,20);

		  $img = imagecreatetruecolor($width, $height);

		  $randbg = rand(1,2);

		  $img = imageCreateFromPng(ROOT . '/assets/captcha/bg'.$randbg.'.png');

		  $capchaText = '';
		  $capchaResult = 0;
		 

		  $a = rand(1, 8);
		  $b = rand(1, 8);

		  $z = $a + $b;

		  if ($a == $b)
		  {
		    $a = 6;
		    $b = 2;
		    $capchaText = $a . '-' . $b;
		    $capchaResult = $a - $b;
		  }
		  else if ($z <= 8)
		  {
		    $capchaText = $a . '+' . $b;
		    $capchaResult = $a + $b;
		  } 
		  else if ($z > 8 && $a > $b)
		  {
		    $capchaText = $a . '-' . $b;
		    $capchaResult = $a - $b;
		  } 
		  else if ($z > 8 && $a < $b)
		  {
		    $capchaText = $b . '-' . $a;
		    $capchaResult = $b - $a;
		  }
		  else
		  {
		    $capchaText = $a . '+' . $b;
		    $capchaResult = $a + $b;
		  } 

		  for ($i = 0; $i < strlen($capchaText); $i++)
		  {   
		    $litteral = $capchaText[$i]; 
		    
		    if ($i == 0) 
		    { 
		      $x = ($width - rand(60, 120));            
		    }
		    else
		    {
		      $x = $x + rand(15,20);
		    } 
		     
		    
		    $y = $height - (($height - ($fontsize - rand(1,9))) / 2);    
		    
		    $color = imagecolorallocate($img, 250, 250, 250 ); 
		    
		    $naklon = rand(-10, 10);
		    
		    imagettftext($img, $fontsize, $naklon, $x, $y, $color, $font, $litteral);
		  }
		}

		$_SESSION['view']['captcha'] = $capchaResult;

		imagepng($img); 

		imagedestroy($img);
	}

	public static function getCodekCkick($dek)
	{
		$codek[1] = array(
	   		1 => '2',
		    2 => '6',
			3 => '3',
			4 => '4',
			5 => '5',
		    6 => '1',
			7 => '7',
			8 => '8'
		);

	   	$codek[2] = array(
	   		1 => '3',
		    2 => '2',
			3 => '8',
			4 => '4',
			5 => '5',
		    6 => '7',
			7 => '6',
			8 => '1'
		);

	   	$codek[3] = array(
	   		1 => '8',
		    2 => '2',
			3 => '4',
			4 => '7',
			5 => '5',
		    6 => '6',
			7 => '3',
			8 => '1'
		);

		if (isset($codek[$dek])) return $codek[$dek];

		return false;
	}
}