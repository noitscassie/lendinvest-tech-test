<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
include(dirname(__FILE__)."/../src/Investor.php");

class InvestorTest extends TestCase
{
  public function setUp() {
    $this->warren = new Investor(1000);
    $this->fakeTranche = $this->getMockBuilder(Tranche::class)
                        ->disableOriginalConstructor()
                        ->setMethods(["addFunds", "getInterestRate"])
                        ->getMock();
    $this->fakeTranche->method("getInterestRate")
    ->willReturn(3);
  }

  public function testCashPropertyExists()
  {
    $cashPropertyExists = property_exists($this->warren, "cash");
    $this->assertSame(true, $cashPropertyExists);
  }

  public function testGetInvestment() {
    $investment = $this->warren->getInvestment();
    $this->assertSame(null, $investment);
  }

  public function testInvest()
  {
    $this->fakeTranche->expects($this->once())
                ->method('addFunds')
                ->with($this->equalTo(500));
    $this->assertSame("ok", $this->warren->invest(500, $this->fakeTranche, "2015-10-03"));
    $this->assertSame(500, $this->warren->cash);
    $this->assertInstanceOf(Investment::class, $this->warren->investment);
  }

  public function testCalculateInterest() {
    $this->warren->invest(1000, $this->fakeTranche, "2015-10-03");
    $this->assertSame(28.06, $this->warren->calculateInterest());
  }
}
