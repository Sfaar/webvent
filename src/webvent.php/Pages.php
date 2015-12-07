<?php
include_once("Util.php");

class PageVent{

    public function all(){
        Util::listAllFiles(".");
    }

}