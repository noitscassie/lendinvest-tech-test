<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
include(dirname(__FILE__)."/../src/Investor.php");

class InvestorTest extends TestCase
{
  public function testCash()
  {
    $warren = new Investor(1000);
    $cash = $warren->getCash();
    $this->assertSame(1000, $cash);
  }
}
