<?php
try{
  if(array_key_exists('venture', $_REQUEST)){
    include_once("Venture.php");
    include_once("VentFactory.php");
    $venture = new Venture($_REQUEST, $_SERVER);
    $vent = VentFactory::make($venture);
    $vent->respond()->reply();
    exit;
  }
}catch (Exception $e){
  echo $e;
}


include_once("PageVent.php");
echo 'Welcomes';


echo 'Bye';

