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
    $this->investment = new Investment("2015-10-03", 6, $fakeInvestor);
  }

  public function testGetStartDate() {
    $this->assertEquals(date_create("2015-10-03"), $this->investment->getStartDate());
  }

  public function testGetInterestRate() {
    $this->assertEquals(6, $this->investment->getInterestRate());
  }

  public function testGetInvestor() {
    $this->assertInstanceOf(Investor::class, $this->investment->getInvestor());
  }
}