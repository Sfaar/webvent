<?php
require_once('Venture.php');
require_once('RenderVent.php');
require_once('PageVent.php');
require_once('ContentVent.php');

class WebVent{
  public static function factory($venture){
    if($venture instanceof Venture){
      switch($venture->vent()){
        case VentEnum::Render:
          return new RenderVent($venture);
        case VentEnum::Page:
          return new PageVent($venture);
        case VentEnum::Content:
          return new ContentVent($venture);
        default:
          echo 'X'.$venture->vent();
      }
    }
  }
}