<?php
try{
  if(array_key_exists('venture', $_GET)){
    include_once("Venture.php");
    include_once("VentFactory.php");
    $venture = new Venture($_GET['venture']);
    $vent = VentFactory::make($venture);
    $vent->respond();
    exit;
  }
}catch (Exception $e){
  echo $e;
}


include_once("PageVent.php");
echo 'Welcomes';


echo 'Bye';

