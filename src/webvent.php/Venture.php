<?php
include_once("VentEnum.php");
/**
 * Class Venture
 *
 * Any URL presented to WebVent specifies a venture. A venture is directed
 * at a vent along with a verse. A vent is expected to yield a response.
 */
class Venture {
  private $_vent;
  private $_verse;

  public function __construct($url){
    $parts = explode("/",$url, 2);
    if(count($parts)==2){
      switch(strtolower($parts[0])){
        case "~vent.page":
          $this->_vent= VentEnum::Page;
          $this->_verse = $parts[1];
      }
    }
  }

  public function vent(){ return $this->_vent;}
  public function verse(){ return $this->_verse;}

}