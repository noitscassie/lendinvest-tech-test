<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
include(dirname(__FILE__)."/../src/Investment.php");

class InvestmentTest extends TestCase
{
  public function testGetStartDate() {
    $investment = new Investment("2015-10-03", 6);
    $this->assertEquals(date_create("2015-10-03"), $investment->getStartDate());
  }

  public function testGetInterestRate() {
    $investment = new Investment("2015-10-03", 6);
    $this->assertEquals(6, $investment->getInterestRate());
  }
}
