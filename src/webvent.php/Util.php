<?php


class Util {
  static function listAllFiles($base, $path) {
    $files = [];
    foreach (scandir($base . $path) as $f) {
      if ($f == '.' || $f == '..') {
        //ignore
      } elseif (is_dir($f)) {
        $files = array_merge($files, self::listAllFiles($base, $path . $f. '/' ));
      } else {
        array_push($files, $path . $f);
      }
    }
    return $files;
  }
}