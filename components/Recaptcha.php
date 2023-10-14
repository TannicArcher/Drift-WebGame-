<?php 
/**
* 
*/
class Recaptcha
{

	public $url = 'https://www.google.com/recaptcha/api/siteverify';

	public $sitekey;

	public $secretkey;

	function __construct ()
	{

		$payconfig = new PayConfig();

		$this->secretkey = $payconfig->rc_secret_key;

		$this->sitekey = $payconfig->rc_site_key;

	}
	
	public function checkCaptcha($response)
	{

		$query = $this->url.'?secret='.$this->key.'&response='.$response.'&remoteip='.$_SERVER["REMOTE_ADDR"];

		$data = json_decode(file_get_contents($query));

		return $data;

	}
}