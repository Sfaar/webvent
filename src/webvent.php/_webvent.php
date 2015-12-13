<?php
require_once('Venture.php');
require_once('PageVent.php');

class WebVent{
  public static function factory($venture){
    if($venture instanceof Venture){
      switch($venture->vent()){
        case VentEnum::Page:
          return new PageVent($venture);
      }
    }
  }
}