<?php
include_once("Util.php");
include_once("AbstractVent.php");

class PageVent extends AbstractVent {

  static $pageType = [
     "md" => ContentType::MARKDOWN,
     "markdown" => ContentType::MARKDOWN,
     "txt" => ContentType::PLAINTEXT,
     "html" => ContentType::HTML
  ];

  static $pagesDir = "pages";

  public function __construct(Venture $venture) {
    parent::__construct($venture);
  }

  public static function all() {
    return Util::listAllFiles(self::$pagesDir, "");
  }

  function __toString() {
    return "";
  }

  /** @return Response */
  public function respond() {
    return $this->providePage($this->venture->verse());
  }

  public function providePage($pageURI) {
    $pagePath = self::$pagesDir;
    return $this->_providePage("$pagePath/$pageURI");
  }

  private function _providePage($path) {
    if (is_dir($path)) {
      return $this->_providePage("$path/index");
    } else {
      foreach (array_keys(self::$pageType) as $ext) {
        $fileName = "$path.$ext";
        if (is_file($fileName)) {
          return Response::OK()
            ->setContent(file_get_contents($fileName))
            ->setContentType(self::$pageType[$ext]);
        }
      }
    }
    return Response::NOT_FOUND();
  }
}