<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
include(dirname(__FILE__)."/../src/Tranche.php");

class TrancheTest extends TestCase
{
  public function setUp() {
    $this->tranche = new Tranche(6);
  }

  public function testMaximumAvailablePropertyExists()
  {
    $maximumAvailablePropertyExists = property_exists($this->tranche, "maximumAvailable");
    $this->assertSame(true, $maximumAvailablePropertyExists);
  }

  public function testCurrentlyInvestedPropertyExists()
  {
    $currentlyInvestedPropertyExists = property_exists($this->tranche, "currentlyInvested");
    $this->assertSame(true, $currentlyInvestedPropertyExists);
  }

  public function testGetRemainingAvailable()
  {
    $this->assertSame(1000, $this->tranche->getRemainingAvailable());
  }

  public function testInterestRatePropertyExists()
  {
    $interestRatePropertyExists = property_exists($this->tranche, "interestRate");
    $this->assertSame(true, $interestRatePropertyExists);  }

  public function testAddFunds()
  {
    $this->tranche->addFunds(1000);
    $this->assertSame(1000, $this->tranche->currentlyInvested);
    $this->expectExceptionMessage("exception");
    $this->tranche->addFunds(1);
  }
}
