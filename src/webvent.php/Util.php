<?php


class Util {
    static function listAllFiles($base, $path) {
        $files = [];
        foreach(scandir($base.'/'.$path) as $f){
            if(is_dir($f) && $f!='.' && $f!='..'){
                print_r(self::listAllFiles($base, $path.'/'.$f));
            }else{
                array_push($f, $path.'/'.$f);
            }
        }
        return $files;
    }
}