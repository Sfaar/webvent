Various Setup
-------------

##Enable MIMO
In response to request for media file, WebVent writes to HTTP response header
the file content type (MIME). This can be done in two ways:
1. Using PHP's fileinfo module: if you chose this, enable PHP's
    `extension=php_fileinfo` in php.ini
2. The fallback option is to detect it by file extension. When WebVent cannot
    find `php_fileinfo` extension, it fallbacks to this option.
