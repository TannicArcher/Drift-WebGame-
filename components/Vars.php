<?PHP

class Vars
{

    public static function getCountPlans ()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT COUNT(*) FROM db_plans')->fetchColumn();
        return $result;
    }

    public static function getCountPayouts ()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT COUNT(*) FROM db_payment WHERE status = 1')->fetchColumn();
        return $result;
    }

    public static function getRegBonus ($row = "name")
    {
        $db = Db::getConnection();

        $id = $db->query('SELECT reg_bonus FROM db_config')->fetch();
        $id = $id['reg_bonus'];

        $result  = $db->prepare("SELECT * FROM db_plans WHERE id = ?");
        $result->execute(array($id));
        $data = $result->fetch();
        return $data[$row];
    }

    public static function getMaxPercentPlans ()
    {
        $db = Db::getConnection();

        $result  = $db->query("SELECT * FROM db_plans ORDER BY perc DESC LIMIT 1");
        $row = $result->fetch();
        $percent = $row['perc'] * 31 * 24 / ($row['price'] / 100);
        return $percent;
    }

    public static function getMaxSumSerfing ()
    {
        $db = Db::getConnection();

        $result  = $db->query("SELECT * FROM db_serfing_plans ORDER BY price DESC LIMIT 1");
        $row = $result->fetch();
        $price = $row['price'];
        return $price;
    }


    public static function getCountBonus ()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT COUNT(*) FROM db_bonus')->fetchColumn();
        return $result;
    }

    public static function getCountBonusDay ()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT COUNT(*) FROM db_bonus WHERE date_add > '.(time()-86400).' ')->fetchColumn();
        return $result;
    }

}
