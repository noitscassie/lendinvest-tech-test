<?php
declare(strict_types=1);

class Tranche {
  var $maximumAvailable = 1000;
  var $currentlyInvested = 0;
  function addFunds() {}

  function getMaximumAvailable() {
    return $this->maximumAvailable;
  }

  function getCurrentlyInvested() {
    return $this->currentlyInvested;
  }

  function getRemainingAvailable() {
    return $this->maximumAvailable - $this->currentlyInvested;
  }
}
