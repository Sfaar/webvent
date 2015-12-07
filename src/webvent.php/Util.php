<?php


class Util {
    static function listAllFiles($base, $path) {
        print $base.' -> '.$path;
        $files = [];
        foreach(scandir($base.'/'.$path) as $f){
            if(is_dir($f) && $f!='.' && $f!='..'){
                print_r(self::listAllFiles($base, $path.'/'.$f));
            }else{
                print $f."\n";
                array_push($f, $path.'/'.$f);
            }
        }
        return $files;
    }
}