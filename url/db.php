<?php

namespace Shortener {
    use PDO;

    class Database{

        const DB_HOST = "localhost";
        const DB_USER = "root";
        const DB_PASS = "";

        private $conn;

        public function __construct(){
            try {
                $this->conn = new PDO("mysql:host=".self::DB_HOST.";dbname=shorten", self::DB_USER, self::DB_PASS);
                // set the PDO error mode to exception
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e)
            {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        /**
         * @param $short_url
         * @return mixed
         */
        public function fetch_url($short_url){
            $id = ShortURL::decode($short_url);
//            print("id = " . $id);
            $q = $this->conn->query("SELECT * FROM url WHERE id = '$id'");

            return($q->fetch(PDO::FETCH_ASSOC));

        }

        /**
         * @param $long_url
         * @return string
         */
        public function insert_url($long_url){
            $q = $this->conn->query("SHOW TABLE STATUS LIKE 'url'");
            $next = $q->fetch(PDO::FETCH_ASSOC)['Auto_increment'];
            $short_url = ShortURL::encode($next);
            $user = 1;
            $sql = "INSERT INTO url (user, short_url, long_url) VALUES (:user, :short_url, :long_url)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user', $user, PDO::PARAM_STR);
            $stmt->bindParam(':short_url', $short_url, PDO::PARAM_STR);
            $stmt->bindParam(':long_url', $long_url, PDO::PARAM_STR);
            $stmt->execute();
            return ShortURL::encode($next);
        }

        public function fetch_user($username){
            $sql = "SELECT username, password FROM user WHERE username = :username";
            $stmt = $this->conn->prepare($sql, [PDO::FETCH_ASSOC]);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        }
    }
}