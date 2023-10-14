<?php 

/**
* 
*/
class AjaxController
{

	public $usid;
	public $user_data;
	
	function __construct()
	{
		$this->usid = User::isLogged();

		$this->user_data = User::getDataById($this->usid);

	}

	public function actionBalance ()
	{

		if (!$this->usid) 
		{
			echo json_encode(array('error' => 'data error'));

			return;
		}

		$time = time();

		if ($this->user_data['lastupdate'] == $time) return;

		if ($this->user_data['speed'] > 0) {

			if ($this->user_data['lastupdate'] == 0)
			{
				User::updateLastUpdate($time, $this->usid);

				$this->user_data = User::getDataById($this->usid);
			}

			User::updateBalances($this->user_data);

			User::updateLastUpdate($time, $this->usid);

		} else {
			User::updateLastUpdate(0, $this->usid);
		}

		$this->user_data = User::getDataById($this->usid);

		if (isset($_POST['type']) && $_POST['type'] == 'ajax') echo json_encode($this->user_data['money_k']);
	}

}
