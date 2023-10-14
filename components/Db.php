<?php

/**
 * 
 */
class Db
{


    public static function getConnection()
    {

        $paramsPath = ROOT . '/config/database.php';

        $params = include($paramsPath);

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";

        $db = new PDO($dsn, $params['user'], $params['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);

        $db->exec("set names utf8");

        return $db;
    }

}
