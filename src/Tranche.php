<?php
declare(strict_types=1);

class Tranche {
  var $maximumAvailable = 1000;
  var $currentlyInvested = 0;

  function addFunds($amount) {
    $newAmount = $this->currentlyInvested + $amount;
    $this->setCurrentlyInvested($newAmount);
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
}
