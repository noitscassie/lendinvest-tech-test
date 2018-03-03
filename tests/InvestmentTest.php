<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
include(dirname(__FILE__)."/../src/Investment.php");

class InvestmentTest extends TestCase
{
  public function setUp() {
    $this->investment = new Investment("2015-10-03", 3, 1000);
  }

  public function testStartDateProperty() {
    $startDatePropertyExists = property_exists($this->investment, "startDate");
    $this->assertSame(true, $startDatePropertyExists);
    $this->assertEquals(strtotime("2015-10-03"), $this->investment->startDate);
  }

  public function testInterestRatePropertyExists() {
    $interestRatePropertyExists = property_exists($this->investment, "interestRate");
    $this->assertEquals(true, $interestRatePropertyExists);
  }

  public function testAmountPropertyExists() {
    $amountPropertyExists = property_exists($this->investment, "amount");
    $this->assertEquals(true, $amountPropertyExists);
  }

  public function testCalculateDaysInvested() {
    $this->assertEquals(29, $this->investment->calculateDaysInvested());
  }

  public function testCalculatePercentageOfMonthInvested() {
    $this->assertEquals(0.935483870968, $this->investment->calculatePercentageOfMonthInvested());
  }

  public function testCalculateFullMonthInterest() {
    $this->assertEquals(30, $this->investment->calculateFullMonthInterest());
  }

  public function testCalculateInterest() {
    $this->assertEquals(28.06, $this->investment->calculateInterest());
  }
}
