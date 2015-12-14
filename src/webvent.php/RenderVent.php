<?php

require_once('AbstractVent.php');

class RenderVent extends AbstractVent {

  private static function getRenderPage($renderUrl) {
    return str_replace("##VENT##RENDER##PAGE##", $renderUrl,
       file_get_contents('render/index.html'));
  }

  /** @return Response */
  public function respond() {
    return Response::OK()
       ->setContent(self::getRenderPage($this->venture->verse()));
  }
}