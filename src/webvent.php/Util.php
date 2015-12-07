<?php


class Util {
    static function listAllFiles($path) {
        print_r(scandir($path));
        $files = [];
        if ($handle = opendir($path)) {
            while (false !== ($entry = readdir($handle))) {
                array_push($files,$entry);
            }
            closedir($handle);
        }else{
            echo "can't open";
        }
        return $files;
    }
}