<?php

namespace App\Config;

use PDO;
use PDOException;

class Connection
{
    private $db = 'api';
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private static $instance;

    public function Connect()
    {
        if (!isset(self::$instance)) {
            try {
                self::$instance =
                    new PDO('mysql: host=' . $this->host . ';dbname=' . $this->db .
                        ';charset=utf8', $this->user, $this->pass);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Erro de conexão - ' . $e->getMessage());
            }
        }

        return self::$instance;
    }
}
