<?php
declare(strict_types=1);

class Tranche {
  var $maximumAvailable = 1000;
  function addFunds() {}

  function displayMaximumAvailable() {
    return $this->maximumAvailable;
  }
}
