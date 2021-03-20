<?php

class Model
{
    private $db;

    private $servername = "localhost";
    private $db_user = "root";
    private $db_pass = "root";
    private $db_name = "news";

    public function __construct(){
        $this->connectdb($this->servername, $this->db_user, $this->db_pass, $this->db_name);
    }

    public function dataEntry() {
        $contents = new GetContents();
        $contents->header();
        $contents->contents();
        $contents->saveImg();

        echo $contents->arrRes['style'];

        $contents->name;
        $row = $this->selectData()[0];

        foreach ($row as $key => $value){
            if($row[$key] != ''){
                if($row[$key] == $contents->arrRes[$key]){
                    return false;
                }
            }
        }

        $sql = "INSERT INTO main (`title`, `paragraph`, `images`, `video`, `content-header`, `content-text`, `name`) VALUES ('" . $contents->arrRes['title'] . "', '" . $contents->arrRes['paragraph'] . "', '" . $contents->arrRes['images'] . "', '" . $contents->arrRes['video'] . "','" . $contents->arrRes['content-header'] . "','" . $contents->arrRes['content-text'] . "','" . $contents->arrRes['name'] . "');";

        if(mysqli_query($this->db, $sql)){}
        else {
            echo "Error: ". $sql. "<br>". mysqli_error($this->db);
        }
    }

    public function selectData (){
        $sql = "SELECT * FROM main ORDER BY id DESC";
        $result = mysqli_query($this->db, $sql);
        $arr = array();

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                unset($row['id']);
                $arr[] = $row;
            }
        } else {
            echo "0 results";
        }
        return $arr;
    }

    public function connectdb($servername, $db_user, $db_pass, $db_name){
        $this->db = mysqli_connect($servername, $db_user, $db_pass, $db_name);

        return $this;
    }
}