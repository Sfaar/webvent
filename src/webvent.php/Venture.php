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

  private static function isContentType($path) {
    $parts = explode(".", $path);
    return count($parts) > 1;
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

  private function init() {
    (array_key_exists('venture', $this->request))
       ? $this->initWithVenture()
       : $this->initNonVenture();
  }

  private function initWithVenture() {
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
    // transparent content access and render redirect
    if ($this->vent == VentEnum::None) {
      $this->forwardContentOrRender();
    }
  }

  private function forwardContentOrRender() {
    $uPath = $this->request['venture'];
    $this->verse = $uPath;
    $this->vent = self::isContentType($uPath)
       ? VentEnum::Content
       : $this->vent = VentEnum::Render;
  }

  private function initNonVenture() {
    $this->vent = VentEnum::Render;
    $this->verse = $this->server['QUERY_STRING'];
  }
}