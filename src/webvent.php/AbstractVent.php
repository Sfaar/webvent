<?php
include_once("Venture.php");

abstract class AbstractVent{
  /** @var  Venture */
  protected $venture;

  abstract public function respond();

  public function __construct(Venture $venture) {
    $this->venture = $venture;
  }

}