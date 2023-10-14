<?php 

/**
* 
*/
class Settings
{

	public static function getSettings ()
	{

		$db = Db::getConnection();

		$sql = 'SELECT * FROM db_config WHERE id = 1';

        $result = $db->query($sql);

        return $result->fetch();
	}

	public static function updateSettings ($params)
	{

		$sql = 'UPDATE db_config SET ';

		foreach ($params as $key => $value) $sql .= $key.' = '.$value.' ,';

		$sql = substr($sql, 0, -2);

		$sql .=' WHERE id = 1';

		$db = Db::getConnection();

		$db->query($sql);
		
	}


}
