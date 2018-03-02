<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
include(dirname(__FILE__)."/../src/Investment.php");

class InvestmentTest extends TestCase
{
  public function setUp() {
    $fakeInvestor = $this->getMockBuilder(Investor::class)
                         ->disableOriginalConstructor()
                         ->getMock();
    $this->investment = new Investment("2015-10-03", 3, $fakeInvestor, 1000);
  }

  public function testGetStartDate() {
    $this->assertEquals(strtotime("2015-10-03"), $this->investment->getStartDate());
  }

  public function testGetInterestRate() {
    $this->assertEquals(3, $this->investment->getInterestRate());
  }

  public function testGetInvestor() {
    $this->assertInstanceOf(Investor::class, $this->investment->getInvestor());
  }

  public function testGetAmount() {
    $this->assertEquals(1000, $this->investment->amount);
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
  //
  // public function testCalculateInterest() {
  //   $this->
  // }
}
