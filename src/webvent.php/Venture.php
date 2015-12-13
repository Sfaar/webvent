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
  private $_request;
  private $_server;

  public function __construct($request, $server) {
    $this->_request = $request;
    $this->_server = $server;
    $this->setVentVerse();
  }

  private function setVentVerse() {
    if (array_key_exists('venture', $this->_request)) {
      $this->setupVent();
    } else {
      $this->setupNonVent();
    }
  }

  private function setupVent() {
    $parts = explode("/", $this->_request['venture'], 2);
    $count = count($parts);
    if ($count > 0) {
      $this->_verse = $count > 1 ? $parts[1] : "";
      switch (strtolower($parts[0])) {
        case "~vent.page":
          $this->_vent = VentEnum::Page;
          break;
      }
    }
  }

  private function setupNonVent() {
    $this->_vent = VentEnum::NonVent;
    $this->_verse = $this->_server['QUERY_STRING'];
  }

  public function vent() {
    return $this->_vent;
  }

  public function verse() {
    return $this->_verse;
  }

  public function request() {
    return $this->_request;
  }

  public function server() {
    return $this->_server;
  }


}