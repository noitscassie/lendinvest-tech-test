<?php
declare(strict_types=1);

class Investment {
  var $startDate;
  var $interestRate;
  var $investor;

  function __construct($startDate, $interestRate, $investor) {
    $this->startDate = date_create($startDate);
    $this->interestRate = $interestRate;
    $this->investor = $investor;
  }

  function getStartDate() {
    return $this->startDate;
  }

  function getInterestRate() {
    return $this->interestRate;
  }

  function getInvestor() {
    return $this->investor;
  }
}
