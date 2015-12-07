<?php
include_once("Util.php");

class PageVent{

    public function all(){
        echo "listing all";
        Util::listAllFiles("webvent.php");
    }

}