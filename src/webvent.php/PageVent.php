<?php
include_once("Util.php");
include_once("AbstractVent.php");

class PageVent extends AbstractVent {

  static $pageTypes = ["md", "txt", "html"];
  static $pagePath = "pages";

  public function __construct(Venture $venture) {
    parent::__construct($venture);
  }

  function __toString() {
    return "";
  }

  public function all() {
    return Util::listAllFiles(self::$pagePath, "");
  }

  public function page($url){
    $pagePath = self::$pagePath;
    return $this->_page("$pagePath/$url")."\n";
  }

  private function _page($url) {
    if (is_dir($url)) {
      return $this->_page("$url/index");
    } else {
      foreach (self::$pageTypes as $ext) {
        $fileName = "$url.$ext";
        if (is_file($fileName)) {
          return file_get_contents($fileName);
        }
      }
    }
    return "Page not found";
  }

  public function respond() {
    echo $this->page($this->venture->verse());
  }
}