<?php
include_once("Venture.php");
include_once("Response.php");

abstract class AbstractVent{
  /** @var  Venture */
  protected $venture;

  /** @return Response */
  abstract public function respond();

  public function __construct(Venture $venture) {
    $this->venture = $venture;
  }

}