<?php


class Util {
  static function listAllFiles($base, $path) {
    if ($base == "")       $base = ".";
    $files = [];
    foreach (self::sorted(scandir("$base$path")) as $f) {
      if ($f == '.' || $f == '..') {
        //ignore
      } elseif (self::isDir($base, $path, $f)) {
        $files = array_merge($files, self::listAllFiles($base, self::subDirPath($path, $f)));
      } else {
        array_push($files, "$path/$f");
      }
    }
    return $files;
  }

  static function sorted($a) {
    sort($a);
    return $a;
  }

  static function isDir($base, $path, $f) {
    return is_dir("$base$path/$f");
  }

  static function subDirPath($path, $f) {
    return "$path/$f";
  }

  static function isDir2($base, $path, $f, $deepRoot) {
    if ($deepRoot) {
      if ($base == "/" && $path == "") return is_dir("/$f");
    }
    return is_dir("$base$path/$f");
  }

  static function subDirPath2($base, $path, $f, $deepRoot) {
    if ($deepRoot) {
      if ($base == "/" && $path == "") return "$f";
    }
    return "$path/$f";
  }
}