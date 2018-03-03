<?php
declare(strict_types=1);

class Tranche {
  var $maximumAvailable = 1000;
  var $currentlyInvested = 0;
  var $interestRate;

  function __construct($interestRate) {
    $this->interestRate = $interestRate;
  }

  function getMaximumAvailable() {
    return $this->maximumAvailable;
  }

  function getCurrentlyInvested() {
    return $this->currentlyInvested;
  }

  function setCurrentlyInvested($amount) {
    $this->currentlyInvested = $amount;
  }

  function getRemainingAvailable() {
    return $this->maximumAvailable - $this->currentlyInvested;
  }

  function getInterestRate() {
    return $this->interestRate;
  }

  function addFunds($amount) {
    $newAmount = $this->currentlyInvested + $amount;
    if ($newAmount <= $this->maximumAvailable) {
      $this->setCurrentlyInvested($newAmount);
    } else {
      throw new Exception("exception");
    }
  }
}
