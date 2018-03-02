<?php
declare(strict_types=1);

class Investment {
  var $startDate;
  var $interestRate;

  function __construct($startDate, $interestRate) {
    $this->startDate = date_create($startDate);
    $this->interestRate = $interestRate;
  }

  function getStartDate() {
    return $this->startDate;
  }

  function getInterestRate() {
    return $this->interestRate;
  }
}
