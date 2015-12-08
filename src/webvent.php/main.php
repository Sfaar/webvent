<?php
include_once("PageVent.php");
echo 'Welcomes';

$pageVent = new PageVent();

print_r($pageVent->all());
print_r($pageVent->page("about"));
print_r($pageVent->page("a/a"));
print_r($pageVent->page("a/b"));
print_r($pageVent->page("b/b"));


echo 'Bye';

