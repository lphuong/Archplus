<?php

/**
 * Created by PHUONGLQ-SOFTPLUS.
 * User: Admin
 * Date: 7/25/2015
 * Time: 1:20 AM
 */
class Database
{
// Store the single instance of Database
    private static $m_pInstance;

    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_pass = 'vertrigo';
    private $db_name = 'dbtest';

    // Private constructor to limit object instantiation to within the class
    private function __construct()
    {
        mysql_connect($this->db_host, $this->db_user, $this->db_pass);
        mysql_select_db($this->db_name);
    }

    // Getter method for creating/returning the single instance of this class
    public static function getInstance()
    {
        if (!self::$m_pInstance) {
            self::$m_pInstance = new Database();
        }
        return self::$m_pInstance;
    }

    public function query($query)
    {
        return mysql_query($query);
    }

}