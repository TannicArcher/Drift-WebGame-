<?php 

/**
* 
*/
class Competition
{


	public static function getActiveReferalCompetition ()
	{

	   $db = Db::getConnection();

	   $sql = 'SELECT COUNT(*) FROM db_ref_competition WHERE status = 0';

        $result = $db->query($sql);

        if ($result->fetchColumn() == 0) return false; 

        $sql = 'SELECT * FROM db_ref_competition WHERE status = 0';

        $result = $db->query($sql);

        $competition = $result->fetch();

        $competition['users'] = array();

        $sql = 'SELECT * FROM db_ref_competition_users LEFT JOIN users_001 ON db_ref_competition_users.user_id = users_001.id ORDER BY db_ref_competition_users.points DESC';

        $result = $db->query($sql);

        while ($row = $result->fetch()) 
        {
        	$competition['users'][] = $row;
        }

        return $competition;

	}

	public static function getActiveInvestCompetition ()
	{

	   $db = Db::getConnection();

	   $sql = 'SELECT COUNT(*) FROM db_inv_competition WHERE status = 0';

        $result = $db->query($sql);

        if ($result->fetchColumn() == 0) return false; 

        $sql = 'SELECT * FROM db_inv_competition WHERE status = 0';

        $result = $db->query($sql);

        $competition = $result->fetch();

        $competition['users'] = array();

        $sql = 'SELECT * FROM db_inv_competition_users LEFT JOIN users_001 ON db_inv_competition_users.user_id = users_001.id ORDER BY db_inv_competition_users.points DESC';

        $result = $db->query($sql);

        while ($row = $result->fetch()) 
        {
        	$competition['users'][] = $row;
        }

        return $competition;

	}

    public static function getEndedInvestCompetitions ()
    {

        $db = Db::getConnection();

        $competitions = array();

        $sql = 'SELECT COUNT(*) FROM db_inv_competition WHERE status = 1';

        $result = $db->query($sql);

        if ($result->fetchColumn() == 0) return false; 

        $sql = 'SELECT * FROM db_inv_competition WHERE status = 1';

        $result = $db->query($sql);

        while ($row = $result->fetch()) 
        {
            
            $sql_in = 'SELECT * FROM db_inv_competition_winers WHERE comp_id = :comp_id';

            $result_in = $db->prepare($sql_in);

            $result_in->bindParam(':comp_id', $row['id'], PDO::PARAM_INT);

            $result_in->execute();

            while ($row_in = $result_in->fetch()) 
            {
                $row['winers'][] = $row_in;
            }

            $competitions[] = $row;
        }

        return $competitions;

    }

    public static function getEndedReferalCompetitions ()
    {

        $db = Db::getConnection();

        $competitions = array();

        $sql = 'SELECT COUNT(*) FROM db_ref_competition WHERE status = 1';

        $result = $db->query($sql);

        if ($result->fetchColumn() == 0) return false; 

        $sql = 'SELECT * FROM db_ref_competition WHERE status = 1';

        $result = $db->query($sql);

        while ($row = $result->fetch()) 
        {
            
            $sql_in = 'SELECT * FROM db_ref_competition_winers WHERE comp_id = :comp_id';

            $result_in = $db->prepare($sql_in);

            $result_in->bindParam(':comp_id', $row['id'], PDO::PARAM_INT);

            $result_in->execute();

            while ($row_in = $result_in->fetch()) 
            {
                $row['winers'][] = $row_in;
            }

            $competitions[] = $row;
        }

        return $competitions;

    }

    public static function updateReferalsPoints($insert_row, $user_data, $referer_data)
    {

        $competition = self::getActiveReferalCompetition();

        if (!$competition || $competition['date_end'] < time()) return;
        
        if($user_data['date_reg'] < $competition['date_add']) return;

        if (count($competition['users']) > 0) 
        {
            foreach ($competition['users'] as $user) 
            {
                if ($referer_data['id'] == $user['user_id'])
                {
                    $db = Db::getConnection();

                    $sql = 'UPDATE db_ref_competition_users SET points = points + :points WHERE user_id = :usid';

                    $result = $db->prepare($sql);

                    $result->bindParam(':points', $insert_row['sum'], PDO::PARAM_STR);

                    $result->bindParam(':usid', $referer_data['id'], PDO::PARAM_INT);

                    $result->execute();

                    return;
                }
            }
        }

        $db = Db::getConnection();

        $sql = 'INSERT INTO db_ref_competition_users (user, user_id, points) VALUES (:user, :usid, :points)';

        $result = $db->prepare($sql);

        $result->bindParam(':user', $referer_data['user'], PDO::PARAM_STR);

        $result->bindParam(':usid', $referer_data['id'], PDO::PARAM_INT);

        $result->bindParam(':points', $insert_row['sum'], PDO::PARAM_STR);

        $result->execute();

        return;
  
    }

    public static function updateInvestPoints($insert_row, $user_data)
    {

        $competition = self::getActiveInvestCompetition();

        if (!$competition || $competition['date_end'] < time()) return;

        if (count($competition['users']) > 0) 
        {
            foreach ($competition['users'] as $user) 
            {
                if ($user_data['id'] == $user['user_id'])
                {
                    $db = Db::getConnection();

                    $sql = 'UPDATE db_inv_competition_users SET points = points + :points WHERE user_id = :usid';

                    $result = $db->prepare($sql);

                    $result->bindParam(':points', $insert_row['sum'], PDO::PARAM_STR);

                    $result->bindParam(':usid', $user_data['id'], PDO::PARAM_INT);

                    $result->execute();

                    return;
                }
            }
        }

        $db = Db::getConnection();

        $sql = 'INSERT INTO db_inv_competition_users (user, user_id, points) VALUES (:user, :usid, :points)';

        $result = $db->prepare($sql);

        $result->bindParam(':user', $user_data['user'], PDO::PARAM_STR);

        $result->bindParam(':usid', $user_data['id'], PDO::PARAM_INT);

        $result->bindParam(':points', $insert_row['sum'], PDO::PARAM_STR);

        $result->execute();

        return;
  
    }

    public static function insertInvestWiners($competition)
    {
        $db = Db::getConnection();

        $winers = array();

        $i = 1;

        if (isset($competition['users'])) 
        {

            $sql = 'INSERT INTO db_inv_competition_winers (place, comp_id, user_id, user, sum) VALUES ';

            foreach ($competition['users'] as $user) 
            {

                if ($i > 5 || $competition[$i.'m_sum'] == 0 && $competition[$i.'m_perc'] == 0) break;

                $amount = 0;

                if ($competition[$i.'m_sum'] > 0) $amount += $competition[$i.'m_sum'];

                if ($competition[$i.'m_perc'] > 0) $amount += $user['points'] / 100 * $competition[$i.'m_perc'];

                $winers[] = array(
                    'place' => $i,
                    'comp_id' => $competition['id'],
                    'user_id' => $user['user_id'],
                    'user' => $user['user'],
                    'sum' => $amount,
                    );

                $sql .= '('.$i.', '.$competition["id"].', '.$user["user_id"].', "'.$user["user"].'", '.$amount.'), ';

                $i++;
            }

            $sql = substr($sql, 0, -2);

            $result = $db->query($sql);

        }

        return $winers;
 
    }

    public static function endInvestCompetition($competition)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE db_inv_competition SET status = 1 WHERE id = :id';

        $result = $db->prepare($sql);

        $result->bindParam(':id', $competition['id'], PDO::PARAM_INT);

        $result->execute();

        $sql = 'DELETE FROM db_inv_competition_users';

        $result = $db->query($sql);
    }

    public static function addInvestCompetition($params)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO db_inv_competition (1m_sum, 2m_sum, 3m_sum, 4m_sum, 5m_sum, 1m_perc, 2m_perc, 3m_perc, 4m_perc, 5m_perc, date_add, date_end) VALUES (:1m_sum, :2m_sum, :3m_sum, :4m_sum, :5m_sum, :1m_perc, :2m_perc, :3m_perc, :4m_perc, :5m_perc, :date_add, :date_end)';

        $result = $db->prepare($sql);

        $result->bindParam(':1m_sum', $params['1m_sum'], PDO::PARAM_STR);

        $result->bindParam(':2m_sum', $params['2m_sum'], PDO::PARAM_STR);

        $result->bindParam(':3m_sum', $params['3m_sum'], PDO::PARAM_STR);

        $result->bindParam(':4m_sum', $params['4m_sum'], PDO::PARAM_STR);

        $result->bindParam(':5m_sum', $params['5m_sum'], PDO::PARAM_STR);

        $result->bindParam(':1m_perc', $params['1m_perc'], PDO::PARAM_STR);

        $result->bindParam(':2m_perc', $params['2m_perc'], PDO::PARAM_STR);

        $result->bindParam(':3m_perc', $params['3m_perc'], PDO::PARAM_STR);

        $result->bindParam(':4m_perc', $params['4m_perc'], PDO::PARAM_STR);

        $result->bindParam(':5m_perc', $params['5m_perc'], PDO::PARAM_STR);

        $result->bindParam(':date_add', $params['date_add'], PDO::PARAM_STR);

        $result->bindParam(':date_end', $params['date_end'], PDO::PARAM_STR);

        $result->execute();
    }

    public static function insertReferalWiners($competition)
    {
        $db = Db::getConnection();

        $winers = array();

        $i = 1;

        if (isset($competition['users'])) 
        {

            $sql = 'INSERT INTO db_ref_competition_winers (place, comp_id, user_id, user, sum) VALUES ';

            foreach ($competition['users'] as $user) 
            {

                if ($i > 5 || $competition[$i.'m_sum'] == 0 && $competition[$i.'m_perc'] == 0) break;

                $amount = 0;

                if ($competition[$i.'m_sum'] > 0) $amount += $competition[$i.'m_sum'];

                if ($competition[$i.'m_perc'] > 0) $amount += $user['points'] / 100 * $competition[$i.'m_perc'];

                $winers[] = array(
                    'place' => $i,
                    'comp_id' => $competition['id'],
                    'user_id' => $user['user_id'],
                    'user' => $user['user'],
                    'sum' => $amount,
                    );

                $sql .= '('.$i.', '.$competition["id"].', '.$user["user_id"].', "'.$user["user"].'", '.$amount.'), ';

                $i++;
            }

            $sql = substr($sql, 0, -2);

            $result = $db->query($sql);

        }

        return $winers;
 
    }

    public static function endReferalCompetition($competition)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE db_ref_competition SET status = 1 WHERE id = :id';

        $result = $db->prepare($sql);

        $result->bindParam(':id', $competition['id'], PDO::PARAM_INT);

        $result->execute();

        $sql = 'DELETE FROM db_ref_competition_users';

        $result = $db->query($sql);
    }

    public static function addReferalCompetition($params)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO db_ref_competition (1m_sum, 2m_sum, 3m_sum, 4m_sum, 5m_sum, 1m_perc, 2m_perc, 3m_perc, 4m_perc, 5m_perc, date_add, date_end) VALUES (:1m_sum, :2m_sum, :3m_sum, :4m_sum, :5m_sum, :1m_perc, :2m_perc, :3m_perc, :4m_perc, :5m_perc, :date_add, :date_end)';

        $result = $db->prepare($sql);

        $result->bindParam(':1m_sum', $params['1m_sum'], PDO::PARAM_STR);

        $result->bindParam(':2m_sum', $params['2m_sum'], PDO::PARAM_STR);

        $result->bindParam(':3m_sum', $params['3m_sum'], PDO::PARAM_STR);

        $result->bindParam(':4m_sum', $params['4m_sum'], PDO::PARAM_STR);

        $result->bindParam(':5m_sum', $params['5m_sum'], PDO::PARAM_STR);

        $result->bindParam(':1m_perc', $params['1m_perc'], PDO::PARAM_STR);

        $result->bindParam(':2m_perc', $params['2m_perc'], PDO::PARAM_STR);

        $result->bindParam(':3m_perc', $params['3m_perc'], PDO::PARAM_STR);

        $result->bindParam(':4m_perc', $params['4m_perc'], PDO::PARAM_STR);

        $result->bindParam(':5m_perc', $params['5m_perc'], PDO::PARAM_STR);

        $result->bindParam(':date_add', $params['date_add'], PDO::PARAM_STR);

        $result->bindParam(':date_end', $params['date_end'], PDO::PARAM_STR);

        $result->execute();
    }



    public static function leadersGetCompetitions($time){

        $db = Db::getConnection();

        $competitions = array();

        $sql = 'SELECT * FROM db_leaders WHERE next_date < :time';

        $result = $db->prepare($sql);

        $result->bindParam(':time', $time, PDO::PARAM_INT);

        $result->execute();

        while ($row = $result->fetch()) $competitions[] = $row;

        return $competitions;

    }

    public static function leadersSetNewDate($name, $next_date){
        $db = Db::getConnection();

        $sql = 'UPDATE db_leaders SET next_date = :next_date WHERE name = :name';

        $result = $db->prepare($sql);

        $result->bindParam(':next_date', $next_date, PDO::PARAM_INT);

        $result->bindParam(':name', $name, PDO::PARAM_STR);

        $result->execute();
    }

    public static function leadersGetAllCompetition(){
        $db = Db::getConnection();

        $leads = array();

        $sql = 'SELECT * FROM db_leaders';

        $result = $db->query($sql);

        while ($row = $result->fetch()) 
        {

            $need_time = $row['next_date'] - ($row['term'] * 60 * 60 * 24);

            $sql_in = 'SELECT user, SUM(sum) AS amount FROM db_insert WHERE date_add > :need_time AND status = 1 GROUP BY user ORDER by amount DESC';

            $result_in = $db->prepare($sql_in);

            $result_in->bindParam(':need_time', $need_time, PDO::PARAM_INT);

            $result_in->execute();

            $i = 1;

            while ($row_in = $result_in->fetch()) 
            {

                if ($i > 20) break;

                if ($row_in['amount'] == 0) break;

                if ($i <= 5) $row_in['place'] = $i;

                $row['users'][] = $row_in;

                $i ++;
            }

            $leads[] = $row;
        }

        return $leads;
    }

    public static function leadersCheckCompetition($id)
    {

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM db_leaders WHERE id = :id';

        $result = $db->prepare($sql);

        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->execute();

        if ($result->fetchColumn() == 1) return true;

        return false;

    }

    public static function leadersUpdateCompetition ($params, $id)
    {

        $sql = 'UPDATE db_leaders SET ';

        foreach ($params as $key => $value) 
        {
            $sql .= $key.' = "'.$value.'" ,';
        }

        $sql = substr($sql, 0, -2);

        $sql .= ' WHERE id = '.$id;

        $db = Db::getConnection();

        $db->query($sql);

    }



    public static function lotteryGetLotInfo ($rs = 'name'){

        $db = Db::getConnection();

        $id = $db->query('SELECT * FROM db_lottery WHERE id = 1')->fetch();
        $id = $id['lott_item'];

        $result  = $db->prepare("SELECT * FROM db_plans WHERE id = ?");
        $result->execute(array($id));
        $data = $result->fetch();
        return $data[$rs];

    }

    public static function lotteryIsTakeAvailable ($usid){

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM db_lottery_users WHERE user_id = :usid';

        $result = $db->prepare($sql);

        $result->bindParam(':usid', $usid, PDO::PARAM_INT);

        $result->execute();

        if ($result->fetchColumn() > 0) return false;

        return true;

    }

    public static function lotteryGetConfig (){
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM db_lottery WHERE id = 1')->fetch();
        return $result;
    }

    public static function lotteryGetUsersCount (){
        $db = Db::getConnection();
        $result = $db->query('SELECT COUNT(*) FROM db_lottery_users')->fetchColumn();
        return $result;
    }

    public static function lotteryGetCurrentUsers ()
    {

        $db = Db::getConnection();

        $curr_lott = array();

        $sql = 'SELECT * FROM db_lottery_users ORDER BY add_time DESC LIMIT 20';

        $result = $db->query($sql);

        while ($row = $result->fetch()) $curr_lott[] = $row;

        return $curr_lott;
    }

    public static function lotteryGetLastsUsers (){
        $db = Db::getConnection();

        $lasts_lott = array();

        $sql = 'SELECT * FROM db_lottery_winers ORDER BY id DESC LIMIT 20';

        $result = $db->query($sql);
        while ($row = $result->fetch()) $lasts_lott[] = $row;

        return $lasts_lott;
    }

    public static function lotteryGetLastInfo (){
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM db_lottery_winers ORDER BY id DESC LIMIT 1')->fetch();
        return $result;
    }
    
    public static function lotterySetNewDate($nextdate){
        $db = Db::getConnection();

        $sql = 'UPDATE db_lottery SET date_update = :next_date WHERE id = 1';
        $result = $db->prepare($sql);
        $result->bindParam(':next_date', $nextdate, PDO::PARAM_INT);
        $result->execute();
        return $result;
    }

    public static function lotteryAddUserToRaffle ($user_data, $time ){

        $db = Db::getConnection();

        $sql = 'INSERT INTO db_lottery_users (user, user_id, add_time) VALUES (:username, :user_id, :add_time)';

        $result = $db->prepare($sql);
        $result->bindParam(':username', $user_data['user'], PDO::PARAM_STR);
        $result->bindParam(':user_id', $user_data['id'], PDO::PARAM_INT);
        $result->bindParam(':add_time', $time, PDO::PARAM_INT);

        $result->execute();

    }

    public static function lotteryAddRaffle ($lott_item, $lott_name, $user_id, $user, $count_all, $date_start, $date_end){

        $db = Db::getConnection();

        $sql = 'INSERT INTO db_lottery_winers (lott_item, lott_name, user_id, user, count_users, date_start, date_end) VALUES (:lott_item, :lott_name, :user_id, :user, :count_users, :date_start, :date_end)';

        $result = $db->prepare($sql);

        $result->bindParam(':lott_item', $lott_item, PDO::PARAM_INT);
        $result->bindParam(':lott_name', $lott_name, PDO::PARAM_STR);

        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result->bindParam(':user', $user, PDO::PARAM_STR);

        $result->bindParam(':count_users', $count_all, PDO::PARAM_INT);

        $result->bindParam(':date_start', $date_start, PDO::PARAM_INT);
        $result->bindParam(':date_end', $date_end, PDO::PARAM_INT);

        $result->execute();


    }

    public static function lotteryDeleteUsersInRaffle () {
        $db = Db::getConnection();
        $sql = 'DELETE FROM db_lottery_users';
        $result = $db->query($sql);
    }



    public static function refkingGetConfig ($usid){
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM db_refking WHERE id = 1')->fetch();
        return $result;
    }

    public static function refkingIsTakeAvailable ($usid){
        $refking_config = Competition::refkingGetConfig();
        if ($refking_config['king_id'] == $usid){
            return false;
        } else{
            return true;
        }
    }

    public static function refkingGetKing ($usid){
        $refking_config = Competition::refkingGetConfig();

        if ($refking_config['king_id'] == 0){
            return "Король не избран";
        } else{
            return $refking_config['king_name'];
        }

    }

    public static function refkingGetLastsKings (){
        $db = Db::getConnection();

        $lasts_kings = array();
        $sql = 'SELECT * FROM db_refking_lasts ORDER BY id DESC LIMIT 20';
        $result = $db->query($sql);
        while ($row = $result->fetch()) $lasts_kings[] = $row;

        return $lasts_kings;
    }

    public static function refkingGetLastInfo (){
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM db_refking_lasts ORDER BY id DESC LIMIT 1')->fetch();
        return $result;
    }

    public static function refkingUpdateConfig ($params){
        $db = Db::getConnection();
        $sql = 'UPDATE db_refking SET ';

        foreach ($params as $key => $value) {
            $sql .= $key.' = "'.$value.'" ,';
        }
        $sql = substr($sql, 0, -2);
        $sql .= ' WHERE id = 1';
        $db = Db::getConnection();

        $db->query($sql);
    }

    public static function refkingAddLastKing ($user_id, $user, $date_start, $date_end){
        $db = Db::getConnection();
        $sql = 'INSERT INTO db_refking_lasts (user_id, user, date_start, date_end) VALUES (:user_id, :username, :date_start, :date_end)';

        $result = $db->prepare($sql);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result->bindParam(':username', $user, PDO::PARAM_STR);
        $result->bindParam(':date_start', $date_start, PDO::PARAM_INT);
        $result->bindParam(':date_end', $date_end, PDO::PARAM_INT);

        $result->execute();
    }

    public static function refkingDeleteOldKing (){
        $refking_config = Competition::refkingGetConfig();
        Competition::refkingUpdateConfig(array(
            'king_id' => 0,
            'king_name' => '',
        ));

        if ($refking_config['king_id'] !== 0){
            Competition::refkingAddLastKing($refking_config['king_id'], $refking_config['king_name'], $refking_config['king_date_start'], time());
        }
    }











}
