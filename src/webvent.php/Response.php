<?php
include_once("ContentType.php");
include_once("HttpStatus.php");
class Response {
  public $contentType;
  public $status;
  public $content;

  /**
   * Response constructor.
   * @param $content
   * @param $contentType
   * @param $status
   */
  public function __construct($content = "",
                              $contentType = ContentType::TEXT,
                              $status = HttpStatus::OK) {
    $this->content = $content;
    $this->contentType = $contentType;
    $this->status = $status;
  }

  public static function NOT_FOUND() {
    return new Response("Not Found", ContentType::TEXT, HttpStatus::NotFound);
  }

  public function reply() {
    header("Content-Type:" . $this->contentType, true, $this->status);
    echo $this->content;
  }

}