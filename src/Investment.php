<?php
declare(strict_types=1);

class Investment {
  var $startDate;

  function __construct($startDate) {
    $this->startDate = date_create($startDate);
  }

  function getStartDate() {
    return $this->startDate;
  }
}
