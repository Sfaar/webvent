<?php
include_once("Util.php");

class PageVent{


    /**
     * PageVent constructor.
     */
    public function __construct()
    {
    }

    function __toString()
    {
        return "";
    }

    function all(){
        return Util::listAllFiles(".","");
    }

}