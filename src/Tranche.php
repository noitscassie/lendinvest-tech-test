<?php
declare(strict_types=1);

class Tranche {
  var $maximumAvailable = 1000;
  var $currentlyInvested = 0;
  var $interestRate;

  function __construct($interestRate) {
    $this->interestRate = $interestRate;
  }

  public function getRemainingAvailable() {
    return $this->maximumAvailable - $this->currentlyInvested;
  }

  public function addFunds($amount) {
    $newAmount = $this->currentlyInvested + $amount;
    if ($newAmount <= $this->maximumAvailable) {
      $this->setCurrentlyInvested($newAmount);
    } else {
      throw new Exception("exception");
    }
  }

  private function setCurrentlyInvested($amount) {
    $this->currentlyInvested = $amount;
  }
}
