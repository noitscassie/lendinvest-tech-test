<?php
declare(strict_types=1);

class Investor {
  var $cash;
  function __construct($cash) {
    $this->cash = $cash;
  }

  function getCash() {
    return $this->cash;
  }
}
