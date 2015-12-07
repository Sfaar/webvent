<?php


class Util {
    static function listAllFiles($path) {
        if ($handle = opendir($path)) {
            echo "Directory handle: $handle\n";
            echo "Entries:\n";

            /* This is the correct way to loop over the directory. */
            while (false !== ($entry = readdir($handle))) {
                echo "$entry\n";
            }

            closedir($handle);
        }
    }
}