<?php
require_once 'config.php';
class Database
{
   public $cid;
   function __construct()
   {
       $this->open_db_connection();
   }
    public function open_db_connection(){
        $this->cid = new mysqli(hostname,dbuser,dbpass,dbname);
        if (mysqli_connect_errno()){
            die("Database Connection failed". mysqli_error());
        }
    }
    public function query($sql){
       return $result = $this->cid->query($sql);
    }
    private function confirm_query($result){
        if (!$result){
            die("Query Failed");
        }
    }
    public function escape_string($string){
        return $escaped_string = mysqli_real_escape_string($this->cid,$string);
    }

    public function insert_the_id()
    {
        return mysqli_insert_id($this->cid);
    }

    function randomPassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 5; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
}

   $database  = new Database();