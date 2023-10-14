<?php 

/**
* 
*/
class Recovery
{

    public static function checkLastRecoverys ($email)
    {

        $time = time() - 60*60*24;

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM db_recovery WHERE email = :email AND date_add > :time';

        $result = $db->prepare($sql);

        $result->bindParam(':email', $email, PDO::PARAM_STR);

        $result->bindParam(':time', $time, PDO::PARAM_STR);

        $result->execute();

        if ($result->fetchColumn() > 0) return false;

        return true;

    }

    public static function setApplication ($email, $usid, $ip, $key)
    {
        $time = time();

        $db = Db::getConnection();

        $sql = 'INSERT INTO db_recovery (email, user_id, ip, date_add, _key) VALUES (:email, :usid, :ip, :time, :key)';

        $result = $db->prepare($sql);

        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':usid', $usid, PDO::PARAM_INT);
        $result->bindParam(':ip', $ip, PDO::PARAM_STR);
        $result->bindParam(':time', $time, PDO::PARAM_INT);
        $result->bindParam(':key', $key, PDO::PARAM_STR);

        $result->execute();

    }

    public static function getLink ($key)
    {
        
        return "recovery/reset/".$key;

    }

    public static function getRowByKey ($key)
    {

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM db_recovery WHERE _key = :key AND status = 0';

        $result = $db->prepare($sql);

        $result->bindParam(':key', $key, PDO::PARAM_STR);

        $result->execute();

        if ($result->fetchColumn() == 0) return false;

        $sql = 'SELECT * FROM db_recovery WHERE _key = :key AND status = 0';

        $result = $db->prepare($sql);

        $result->bindParam(':key', $key, PDO::PARAM_STR);

        $result->execute();

        return $result->fetch();

    }

    public static function updateRowStatus ($row)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE db_recovery SET status = 1 WHERE _key = :key';

        $result = $db->prepare($sql);

        $result->bindParam(':key', $key['_key'], PDO::PARAM_STR);

        $result->execute();

    }

}
