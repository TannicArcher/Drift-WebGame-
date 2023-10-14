<?PHP
class Vk{
	public $client_id;
	public $vk_key;
	public $redirect_uri;
	public $error = false;
	public $error_text = '';
	public $api_version = '5.53';
	
	public $access_token = '';
	public $expires_in = '';
	public $user_id = 0;
	
	private function curl_get($url)
	{
		if( $curl = curl_init() ){
			curl_setopt($curl, CURLOPT_URL, $url);
    			curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    			$data = curl_exec($curl);
    			$return = json_decode($data);
    			curl_close($curl); 
    			if($return->error != ''){
				$this->error = true;
				$this->error_text = "curl: URL='{$url}'; DATA='{$data}'";
				return false;	
			}  			
    			return $return;	
		}else{
			$error = true;
			$error_text = 'curl error';
			return false;
		}
	}
	
	public function get_auth($state='')
	{
		$url = 'https://oauth.vk.com/authorize';
		if($state == ''){
			header("Location: {$url}?client_id={$this->client_id}&redirect_uri={$this->redirect_uri}&response_type=code&v={$this->api_version}");
		}else{
			header("Location: {$url}?client_id={$this->client_id}&redirect_uri={$this->redirect_uri}&response_type=code&v={$this->api_version}&{$state}");
		}
		
	}

	public function access_token_get($code)
	{
		$url = 'https://oauth.vk.com/access_token';
		if($code == ''){
			$this->error = true;
			$this->error_text = 'invalid code';
			return false;
		}
		$url = "{$url}?client_id={$this->client_id}&client_secret={$this->vk_key}&redirect_uri={$this->redirect_uri}&code={$code}";
		if($return = $this->curl_get($url)){			
			$this->access_token = $return->access_token;
    			$this->expires_in = $return->expires_in;
    			$this->user_id = $return->user_id;
    			return true;
		}else{
			return false;
		}		
	}
	
	public function get_method($method_name,$parametrs,$token=true)
	{
		$url = 'https://api.vk.com/method';
		if($method_name == ''){
			$this->error = true;
			$this->error_text = 'invalid method_name';
			return false;
		}
		if($parametrs == ''){
			$this->error = true;
			$this->error_text = 'invalid parametrs';
			return false;
		}
		if($this->access_token == '' && $token){
			$this->error = true;
			$this->error_text = 'invalid access_token';
			return false;
		}
		if($token){
			$url = "{$url}/{$method_name}?{$parametrs}&access_token={$this->access_token}&v={$this->api_version}";
		}else{
			$url = "{$url}/{$method_name}?{$parametrs}&v={$this->api_version}";
		}		
		return $this->curl_get($url);
	}
	
	# методы получения данных
	public function user_data()
	{
		return $this->get_method('users.get',"user_ids={$this->user_id}&fields=bdate");
	}

	public function user_in_groupT($user_id,$group_id)
	{
		$data = $this->get_method('groups.isMember',"user_id={$user_id}&group_id={$group_id}&extended=1",true);
		if($data->response->member){
			return true;
		}else{
			return false;
		}
	}

	public function user_in_groupNT($user_id,$group_id)
	{
		$data = $this->get_method("groups.isMember","user_id={$user_id}&group_id={$group_id}&extended=1",false);
		if($data->response->member){
			return true;
		}else{
			return false;
		}
	}

	public function user_in_repost($user_id,$search_post=0)
	{
		$res = $this->get_method("wall.get","owner_id={$user_id}",true);
		foreach($res->response->items AS $post){
			if($post->copy_history[0]->id == $search_post) return true;
		}
		return false;
	}

	public function isAppUser($user_id)
	{
		$res = $this->get_method("users.isAppUser","user_id={$user_id}",true);
		if($res->response == 1) return true;
		return false;
	}

	public function friends_isAppUser($user_id)
	{
		return $this->get_method("friends.getAppUsers","user_id={$user_id}",true);
	}

	public function friends_get($user_id)
	{
		return $this->get_method("friends.get","user_id={$user_id}",true);
	}
	
	public function __construct($id,$key,$url)
	{
		if($id != '' && $key != ''){
			$this->client_id = $id;
			$this->vk_key = $key;
			$this->redirect_uri = $url;	
		}else{
			$this->error = true;
			$this->error_text = 'id or key error';
		}		
	} 


}
