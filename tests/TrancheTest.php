<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
include(dirname(__FILE__)."/../src/Tranche.php");

class TrancheTest extends TestCase
{
  public function testMaximumAvailable()
  {
    $tranche = new Tranche();
    $this->assertSame(1000, $tranche->getMaximumAvailable());
  }

  public function testCurrentlyInvested()
  {
    $tranche = new Tranche();
    $this->assertSame(0, $tranche->getCurrentlyInvested());
  }
}
