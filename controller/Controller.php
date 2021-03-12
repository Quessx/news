<?php


class Controller
{

    public function model($model){

        require_once 'model/'.$model.'.php';

        return new $model();
    }

    public function view($view, $data = []){
        if(file_exists('view/' . $view . '.php')){
            require_once 'view/'.$view.'.php';

            return new $view();
        } else {
            die("View does not exists");
        }
    }

}