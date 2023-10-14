<?php 

/**
* 
*/
class Referals
{

	public static function doReferalsMoney ($insert_row, $settings)
	{

        $db = Db::getConnection();

        $sql = 'SELECT * FROM users_003 WHERE id = :usid LIMIT 1';

        $result = $db->prepare($sql);

        $result->bindParam(':usid', $insert_row['user_id'], PDO::PARAM_INT);

        $result->execute();

        $user_referals = $result->fetch();

        $time = time();

        $to_referer = array();

        for ($i = 1; $i <= $settings['ref_lvls']; $i++) 
        {
            $ref_id = $user_referals['referer' . $i . '_id'];

            if ($ref_id > 0) 
            {

                $to_referer[$i] = $insert_row['sum'] * ($settings['ref' . $i] / 100);

                $sql = 'UPDATE users_002 SET money_p = money_p + :to_referer WHERE id = :ref_id';

                $result = $db->prepare($sql);

                $result->bindParam(':to_referer', $to_referer[$i], PDO::PARAM_STR);
                $result->bindParam(':ref_id', $ref_id, PDO::PARAM_STR);

                $result->execute();

                $sql = 'UPDATE users_003 SET from_referals'.$i.' = from_referals'.$i.' + :to_referer WHERE id = :ref_id';

                $result = $db->prepare($sql);

                $result->bindParam(':to_referer', $to_referer[$i], PDO::PARAM_STR);
                $result->bindParam(':ref_id', $ref_id, PDO::PARAM_INT);

                $result->execute();

            }
        }
        
        if (count($to_referer) > 0) 
        {

            $sql = 'UPDATE users_003 SET ';

            foreach ($to_referer as $level => $money) 
            {
                $sql .= "to_referer".$level." = to_referer".$level." + ".$money.",";
            }

            $sql = substr($sql, 0, -1);

            $sql .= " WHERE id = :usid";

            $result = $db->prepare($sql);

            $result->bindParam(':usid', $insert_row['user_id'], PDO::PARAM_INT);

            $result->execute();

        }
        
	}

	public static function getReferersId ($settings, $referer_id)
	{

        $db = Db::getConnection();
        $refking_config = Competition::refkingGetConfig();

        if ($refking_config['king_id'] !=0 ){
            $referer_id = $refking_config['king_id'];
        }

        $referers = array();

        if ($referer_id != 0) 
        {

            $sql = 'SELECT id, user, referer1_id FROM users_003 WHERE id = :referer_id';

            $result = $db->prepare($sql);

            $result->bindParam(':referer_id', $referer_id, PDO::PARAM_INT);

            $result->execute();

            $referers[1] = $result->fetch();

            for ($i = 1; $i <= $settings['ref_lvls'] - 1; $i++) 
            {
                if (!empty($referers[$i]['id'])) 
                {

                    $sql = 'SELECT COUNT(id) FROM users_003 WHERE id = :referer_id';

                    $result = $db->prepare($sql);

                    $result->bindParam(':referer_id', $referers[$i]['referer1_id'], PDO::PARAM_INT);

                    $result->execute();

                    if ($result->fetchColumn() > 0)
                    {

                        $sql = 'SELECT id, user, referer1_id FROM users_003 WHERE id = :referer_id';

                        $result = $db->prepare($sql);

                        $result->bindParam(':referer_id', $referers[$i]['referer1_id'], PDO::PARAM_INT);

                        $result->execute();

                        $referers[$i + 1] = $result->fetch();

                    }
                }
            }
        }
	    return $referers;

	}

	public static function getReferer($usid)
    {

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(referer1) FROM users_003 WHERE id = :usid';

        $result = $db->prepare($sql);

        $result->bindParam(':usid', $usid, PDO::PARAM_INT);

        $result->execute();

        if ($result->fetchColumn() == 0) return false;

        $sql = 'SELECT referer1 FROM users_003 WHERE id = :usid';

        $result = $db->prepare($sql);

        $result->bindParam(':usid', $usid, PDO::PARAM_INT);

        $result->execute();

        return $result->fetchColumn();

    }

    public static function setReferer($referer = 0)
    {

        $_SESSION['ref'] = $referer;

    }

    public static function getReferalsLvl($usid, $lvl = 1)
    {

        $db = Db::getConnection();

        $referals = array();

        $sql = 'SELECT COUNT(users_001.user) FROM users_003 LEFT JOIN users_001 ON users_001.id = users_003.id WHERE referer'.$lvl.'_id = :usid ORDER BY users_001.date_reg DESC';

        $result = $db->prepare($sql);

        $result->bindParam(':usid', $usid, PDO::PARAM_INT);

        $result->execute();

        if ($result->fetchColumn() == 0) return $referals;

        $sql = 'SELECT users_001.user, users_001.email, users_001.date_reg, users_003.to_referer'.$lvl.' FROM users_003 LEFT JOIN users_001 ON users_001.id = users_003.id WHERE referer'.$lvl.'_id = :usid ORDER BY users_001.date_reg DESC';

        $result = $db->prepare($sql);

        $result->bindParam(':usid', $usid, PDO::PARAM_INT);

        $result->execute();

        while($row = $result->fetch()) $referals[] = $row;

        return $referals;

    }

    public static function getReferalLink($usid)
    {

		return PROTOCOL."://".HOST."/ref/".$usid;

    }

    public static function addRefVisit($usid)
    {

        if ($usid == 0) return;

        $db = Db::getConnection();

        $sql = 'UPDATE users_001 SET ref_visits = ref_visits + 1 WHERE id = :usid';

        $result = $db->prepare($sql);

        $result->bindParam(':usid', $usid, PDO::PARAM_INT);

        $result->execute();

    }

}
