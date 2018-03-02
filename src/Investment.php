<?php
declare(strict_types=1);

class Investment {
  var $startDate;
  var $interestRate;
  var $investor;
  var $amount;

  function __construct($startDate, $interestRate, $investor, $amount) {
    $this->startDate = date_create($startDate);
    $this->interestRate = $interestRate;
    $this->investor = $investor;
    $this->amount = $amount;
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

  function getAmount() {
    return $this->getAmount;
  }
}
