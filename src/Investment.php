<?php
declare(strict_types=1);

class Investment {
  var $startDate;
  var $interestRate;
  var $amount;

  function __construct($startDate, $interestRate, $amount) {
    $this->startDate = strtotime($startDate);
    $this->interestRate = $interestRate;
    $this->amount = $amount;
  }

  function getStartDate() {
    return $this->startDate;
  }

  function getInterestRate() {
    return $this->interestRate;
  }

  function getAmount() {
    return $this->getAmount;
  }

  function calculateDaysInvested() {
    $endDate = strtotime("2015-10-31");
    $duration = $endDate - $this->startDate;
    $daysInvested = floor($duration/60/60/24) + 1;
    return $daysInvested;
  }

  function calculatePercentageOfMonthInvested() {
    $daysInvested = $this->calculateDaysInvested();
    $daysInMonth = 31;
    $percentageOfMonthInvested = $daysInvested / $daysInMonth;
    return $percentageOfMonthInvested;
  }

  function calculateFullMonthInterest() {
    $fullMonthInterest = $this->amount * ($this->interestRate / 100);
    return $fullMonthInterest;
  }

  function calculateInterest() {
    $fullMonthInterest = $this->calculateFullMonthInterest();
    $percentageOfMonthInvested = $this->calculatePercentageOfMonthInvested();
    $actualInterest = $fullMonthInterest * $percentageOfMonthInvested;
    return round($actualInterest, 2);
  }
}
