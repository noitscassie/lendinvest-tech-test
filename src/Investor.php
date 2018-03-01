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

  function invest($amount, $tranche) {
    $this->decreaseCash($amount);
    $tranche->addFunds($amount);
  }

  private function decreaseCash($amount) {
    $this->cash = $this->cash - $amount;
  }
}
