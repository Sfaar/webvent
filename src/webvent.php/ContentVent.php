<?php

require_once('AbstractVent.php');
require_once('MediaResponse.php');

class ContentVent extends AbstractVent{
  public static $contentDir = "contents";

  public function __construct(Venture $venture) {
    parent::__construct($venture);
  }


  /** @return Response */
  public function respond() {
    return $this->getContent($this->venture->verse());
  }

  public function getContent($contentURI) {
    $contentPath = self::$contentDir;
    return $this->_getContent("$contentPath/$contentURI");
  }

  private function _getContent($path) {
    if (is_dir($path)) {
      return Response::NOT_FOUND();
    } else {
        if (is_file($path)) {
          return MediaResponse::FileOk($path);
        }
      }
    return Response::NOT_FOUND();
  }
}