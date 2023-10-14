<?php 

/**
* 
*/
class Feedback
{

	public static function getActiveFeedbacks ($nav, $page, $on_page = 20)
	{

		$db = Db::getConnection();

        $feedbacks = array();

		$sql = $nav->getQuery('MainFeedback', $page, $on_page);

        $result = $db->query($sql);

        while ($row = $result->fetch()) 
        {
        	$feedbacks[] = $row;
        }

        return $feedbacks;

	}

    public static function getNewFeedbacks ($nav, $page, $on_page = 20)
    {

        $db = Db::getConnection();

        $feedbacks = array();

        $sql = $nav->getQuery('AdminFeedbacknew', $page, $on_page);

        $result = $db->query($sql);

        while ($row = $result->fetch()) 
        {
            $feedbacks[] = $row;
        }

        return $feedbacks;

    }

    public static function checkUnactiveFeedbacks ($usid)
    {

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM db_feedback WHERE user_id = :usid AND status = 0';

        $result = $db->prepare($sql);

        $result->bindParam(':usid', $usid, PDO::PARAM_INT);

        $result->execute();

        if ($result->fetchColumn() > 3) return false;

        return true;

    }

    public static function addFeedback ($usid, $usname, $text)
    {

        $db = Db::getConnection();

        $time = time();

        $sql = 'INSERT INTO db_feedback (user_id, user, text, date_add) VALUES (:usid, :usname, :text, :time)';

        $result = $db->prepare($sql);

        $result->bindParam(':usid', $usid, PDO::PARAM_INT);

        $result->bindParam(':usname', $usname, PDO::PARAM_STR);

        $result->bindParam(':text', $text, PDO::PARAM_STR);

        $result->bindParam(':time', $time, PDO::PARAM_INT);

        $result->execute();

    }

    public static function isUnactiveFeedback ($id)
    {
        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM db_feedback WHERE id = :id AND status = 0';

        $result = $db->prepare($sql);

        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->execute();

        if ($result->fetchColumn() > 0) return $id;

        return false;
    }

    public static function aceptFeedback ($id)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE db_feedback SET status = 1 WHERE id = :id';

        $result = $db->prepare($sql);

        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->execute();

    }

    public static function issetFeedback ($id)
    {
        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM db_feedback WHERE id = :id';

        $result = $db->prepare($sql);

        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->execute();

        if ($result->fetchColumn() > 0) return $id;

        return false;
    }

    public static function deleteFeedback ($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM db_feedback WHERE id = :id';

        $result = $db->prepare($sql);

        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->execute();

    }


}
