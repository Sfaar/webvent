<?php
include_once('Venture.php');
include_once('PageVent.php');
class VentFactory{
  public static function make($venture){
    if($venture instanceof Venture){
      switch($venture->vent()){
        case VentEnum::Page:
          return new PageVent($venture);
      }
    }
  }
}