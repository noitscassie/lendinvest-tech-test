<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
include(dirname(__FILE__)."/../src/Investor.php");
include(dirname(__FILE__)."/../src/Tranche.php");

class InvestorTest extends TestCase
{
  public function testCash()
  {
    $warren = new Investor(1000);
    $cash = $warren->getCash();
    $this->assertSame(1000, $cash);
  }

  public function testInvest()
  {
    $warren = new Investor(1000);
    $tranche = $this->createMock(Tranche::class);
    $warren->invest(500, $tranche);
    $this->assertSame(500, $warren->getCash());
  }
}
