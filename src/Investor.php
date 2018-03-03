<?php
declare(strict_types=1);

class Investor {
  var $cash;
  var $investment;

  function __construct($cash) {
    $this->cash = $cash;
  }

  function getCash() {
    return $this->cash;
  }

  public function getInvestment() {
    return $this->investment;
  }

  function invest($amount, $tranche, $date) {
    $tranche->addFunds($amount);
    $investment = $this->createInvestment($date, $tranche->getInterestRate(), $amount);
    $this->decreaseCash($amount);
    return "ok";
  }

  private function decreaseCash($amount) {
    $this->cash = $this->cash - $amount;
  }

  private function createInvestment($date, $interestRate, $amount) {
    $this->investment = new Investment($date, $interestRate, $amount);
  }
}
