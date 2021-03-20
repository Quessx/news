<?php

class View extends Model
{
    public function head(){
        return __DIR__.'/html/'.'head.php';
    }

    public function body($body){
        return __DIR__.'/html/'.$body;
    }
}