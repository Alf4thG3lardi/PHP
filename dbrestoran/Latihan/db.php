<?php 
    class DB {
        public $host = "127.0.0.1";
        public $user = "root";
        public $password = "";
        public $database = "dbrestoran-2";

        public function __construct()
        {
            echo "function construct";
        }
        public function selectData()
        {
            echo "select data";
        }
        public function getDataBase()
        {
            return $this->database;
        }
        public function tampil()
        {
            $this->selectData();
        }
        public static function InsertData()
        {
            echo "static function";
        }
    }

    DB::InsertData;
    $db = new DB;
?>