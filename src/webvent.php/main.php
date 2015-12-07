<?php
include_once("PageVent.php");
echo 'Welcome';

$pageVent = new PageVent();

print_r($pageVent->all());


echo 'Bye';

