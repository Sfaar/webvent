<?php
include_once("VentEnum.php");

/**
 * Class Venture
 *
 * Any URL presented to WebVent specifies a venture. A venture is directed
 * at a vent along with a verse. A vent is expected to yield a response.
 */
class Venture {
  private $vent;
  private $verse;
  private $request;
  private $server;

  public function __construct($request, $server) {
    $this->request = $request;
    $this->server = $server;
    $this->init();
  }

  private function init() {
    if (array_key_exists('venture', $this->request)) {
      $this->initWebVenture();
    } else {
      $this->initNonVenture();
    }
  }

  private function initWebVenture() {
    $parts = explode("/", $this->request['venture'], 2);
    $count = count($parts);
    if ($count > 0) {
      $this->verse = $count > 1 ? $parts[1] : "";
      switch (strtolower($parts[0])) {
        case "~vent.page":
          $this->vent = VentEnum::Page;
          break;
        case "~vent.content":
          $this->vent = VentEnum::Content;
          break;
        default:
          $this->vent = VentEnum::None;
          break;
      }
    }
    // transparent page and content access
    if($this->vent==VentEnum::None){
      $uPath = $this->request['venture'];
      $this->verse = $uPath;
      if(self::isContentType($uPath)) {
        $this->vent = VentEnum::Content;
      }else{
        $this->vent = VentEnum::Render;
      }
    }
  }

  private static function isContentType($path){
    $parts = explode(".",$path);
    return count($parts)>1;
  }

  private function initNonVenture() {
    $this->vent = VentEnum::NonVent;
    $this->verse = $this->server['QUERY_STRING'];
  }

  public function vent() {
    return $this->vent;
  }

  public function verse() {
    return $this->verse;
  }

  public function request() {
    return $this->request;
  }

  public function server() {
    return $this->server;
  }
}