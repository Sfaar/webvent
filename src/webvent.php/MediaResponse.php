<?php
require_once('Response.php');

class MediaResponse extends Response{
  public function send() {
    $fp = fopen($this->content, 'rb');
    header("Content-Type:" . $this->contentType, true, $this->status);
    header("Content-Length: " . filesize($this->content));
    fpassthru($fp);
  }

  /**
   * @param String $path resolved file path
   * @return Response
   */
  public static function FileOk($path){
    return (new MediaResponse())
       ->setStatus(HttpStatus::OK)
       ->setContent($path)
       ->setContentType(self::contentType($path));
  }

  public static function contentType($path){
    $parts = explode(".",$path);
    $last = count($parts)-1;
    $ext = $parts[$last];
    return ContentType::$extToType[$ext];
  }
}