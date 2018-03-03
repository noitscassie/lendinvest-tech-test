# LendInvest Tech Test

[Introduction](#introduction) | [Quickstart](#quickstart) | [Approach](#approach) | [Challenges](#challenges) | [Miscellaneous Notes](#miscellaneous-notes)

## Introduction

This is a tech test for [LendInvest](https://www.lendinvest.com/), As per the brief, it is written in PHP, with no external libraries except [Composer](https://getcomposer.org/) and [PHP Unit](https://phpunit.de/), without the use of a database.

The specification for the project is, given a loan beginning 01/10/2015 and ending 15/11/2015:
  - The loan has 2 tranches, A and B, ( at 3% and 6% monthly interest rate respectively).
  - Each tranche has 1,000 pounds available.
  - There are four investors, each with 1,000 pounds in his or her virtual wallet.
    - As “Investor 1” I’d like to invest 1,000 pounds on the tranche “A” on 03/10/2015: “ok”.
    - As “Investor 2” I’d like to invest 1 pound on the tranche “A” on 04/10/2015: “exception”.
    - As “Investor 3” I’d like to invest 500 pounds on the tranche “B” on 10/10/2015: “ok”.
    - As “Investor 4” I’d like to invest 1,100 pounds on the tranche “B” 25/10/2015: “exception”.
  - On 01/11/2015 the system runs the interest calculation for the period 01/10/2015 -> 31/10/2015:
    - “Investor 1” earns 28.06 pounds
    - “Investor 3” earns 21.29 pounds

  The image below shows a working, command-line implementation of a solution to this specification.

  ![Command-line solution](readme_images/solution.png)



## Quickstart



## Approach



## Challenges



## Limitations
