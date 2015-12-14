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
       ->setContentType(self::detectMIMEType($path));
  }

  private static function detectMIMEType($path) {
    return function_exists('finfo_open')
       ? self::getFileMime($path)
       : self::getMimeByExt($path);
  }

  private static function getFileMime($path){
    $fi = new finfo(FILEINFO_MIME_TYPE);
    $contentType = $fi->file($path);
    return $contentType;
  }


  private static function getMimeByExt($path){
    error_log("php_fileinfo extension not found",0);
    $parts = explode(".",$path);
    $last = count($parts)-1;
    $ext = $parts[$last];
    return ContentType::$extToType[$ext];
  }
}