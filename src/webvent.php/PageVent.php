<?php
include_once("Util.php");
include_once("AbstractVent.php");

class PageVent extends AbstractVent {

  static $pageType = [
     "md"=>ContentType::MARKDOWN,
     "markdown"=>ContentType::MARKDOWN,
     "txt"=>ContentType::TEXT,
     "html"=>ContentType::HTML
  ];

  static $pagePath = "pages";

  public function __construct(Venture $venture) {
    parent::__construct($venture);
  }

  function __toString() {
    return "";
  }

  public static function all() {
    return Util::listAllFiles(self::$pagePath, "");
  }

  public function page($url){
    $pagePath = self::$pagePath;
    return $this->_page("$pagePath/$url");
  }

  private function _page($url) {
    if (is_dir($url)) {
      return $this->_page("$url/index");
    } else {
      foreach (array_keys(self::$pageType) as $ext) {
        $fileName = "$url.$ext";
        if (is_file($fileName)) {
          return new Response(file_get_contents($fileName),
             self::$pageType[$ext], HttpStatus::OK);
        }
      }
    }
    return Response::NOT_FOUND();
  }

  /** @return Response */
  public function respond() {
    return $this->page($this->venture->verse());
  }
}