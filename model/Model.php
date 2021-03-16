<?php

class Model extends Curl
{
    private $db;

    private $servername = "localhost";
    private $db_user = "root";
    private $db_pass = "root";
    private $db_name = "news";

    public function __construct(){
        $this->connectdb($this->servername, $this->db_user, $this->db_pass, $this->db_name);
    }




    public function connectdb($servername, $db_user, $db_pass, $db_name){
        $this->db = mysqli_connect($servername, $db_user, $db_pass, $db_name);

        return $this;
    }
}