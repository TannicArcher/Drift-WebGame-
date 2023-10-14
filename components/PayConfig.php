<?PHP
class PayConfig 
{

	# Payeer Настройки (sci)
	public $shopID = 658800909;
	public $secretW = "ZWqffuI1KN87gerB";
	
	# Payeer Настройки (api)
	public $AccountNumber = 'P41561575';
	public $apiId = 981533400;
	public $apiKey = 'ehvsBx5oVMUFpKaC';

	# Freekassa Настройки (sci)
	public $fkId = 33766;
	public $fkSecret = 'jqdgi3tf';
	public $fkSecret2 = 'xowiu3jb';

	# AdvCash Настройки (sci)
	public $advEmail = 'vit7@gmail.com';
	public $advKey = 'IuJJeAT2';
	public $advName = 'Moty';

	# AdvCash Настройки (api)
	public $advApiEmail = 'v017@gmail.com';
	public $advApiKey = 'I2g02g0S0b2';
	public $advApiName = 'Motoney';

	# Yandex Money Настройки (sci)
	public $yandexSecret = '9Zu23nXL/aFI';
	public $yandexAcc = '410018185';

	# Yandex Money Настройки (api)
	public $yandexClientID = 'DBDF99D3001783482CDC62';
	public $yandexApiSecret = 'E69EEC95CC77D';
	public $yandexApiTock = false;

	public function yandexRedirecturi ()
	{
		return PROTOCOL."://".HOST."/handler/ymtocken";
	}

	# Настройки ВКонтакте
	public $vk_group_id = 157165511;
	public $vk_id = 7378116;
	public $vk_key = '4C4RyUCOst9c2dSJVjXv';

	public function vk_redirect_uri ()
	{
		return  PROTOCOL."://".HOST."/handler/vk";
	}
	
	# Настройки ReCaptcha
	public $rc_site_key = '6LfaRQ4UAAAAADnLsUbVTSrBJAkRUBvzf91MDIHJ';
	public $rc_secret_key = '6LfaRQ4UAAAAAIlStdS9VZl5ObFUA_mKwe0W7CeB';

}

