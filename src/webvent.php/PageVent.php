<?php
include_once("Util.php");

class PageVent {

  static $pageTypes = ["md", "txt", "html"];
  static $pagePath = "pages";

  /**
   * PageVent constructor.
   */
  public function __construct() {
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

}