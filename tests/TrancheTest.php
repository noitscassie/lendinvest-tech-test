<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
include(dirname(__FILE__)."/../src/Tranche.php");

class TrancheTest extends TestCase
{
  public function setUp() {
    $this->tranche = new Tranche();
  }

  public function testMaximumAvailable()
  {
    $this->assertSame(1000, $this->tranche->getMaximumAvailable());
  }

  public function testCurrentlyInvested()
  {
    $this->assertSame(0, $this->tranche->getCurrentlyInvested());
  }

  public function testGetRemainingAvailable()
  {
    $this->assertSame(1000, $this->tranche->getRemainingAvailable());
  }

  public function testAddFunds()
  {
    $this->tranche->addFunds(1000);
    $this->assertSame(1000, $this->tranche->getCurrentlyInvested());
    $this->expectExceptionMessage("exception");
    $this->tranche->addFunds(1);
  }
}
