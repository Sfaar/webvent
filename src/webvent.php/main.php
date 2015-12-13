<?php
try {
  require("_webvent.php");
  WebVent::factory(new Venture($_REQUEST, $_SERVER))->respond()->send();
  exit;
} catch (Exception $e) {
  echo $e;
}
