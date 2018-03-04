# LendInvest Tech Test

[Introduction](#introduction) | [Quickstart](#quickstart) | [Approach](#approach) | [Challenges](#challenges) | [Limitations](#limitations)

## Introduction

This is a tech test for [LendInvest](https://www.lendinvest.com/), As per the brief, it is written in PHP, with no external libraries except [Composer](https://getcomposer.org/) and [PHPUnit](https://phpunit.de/), without the use of a database.

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

This application is designed to be run in the command line. You will need to have both [PHP](http://www.php.net/) 7, [Composer](https://getcomposer.org/), and, to run the tests, [PHPUnit](https://phpunit.de/) installed first.

To get started, clone this repository, and install project dependencies using Composer:

```
$ php composer.phar install
```

You will then be able to open the interactive PHP shell to use the application:

```
$ php -a
```

You can satisfy the requirements of the specification as follows.

Requiring the necessary classes:

```
php > include(dirname(__FILE__)."/src/Investor.php");      
php > include(dirname(__FILE__)."/src/Investment.php");
php > include(dirname(__FILE__)."/src/Tranche.php");
```
Initialises the necessary objects:
```

php > $investor1 = new Investor(1000);         
php > $investor2 = new Investor(1000);
php > $investor3 = new Investor(1000);
php > $investor4 = new Investor(1000);

// investors are initialised with a number of pounds, expressed as an integer

php > $trancheA = new Tranche(3);
php > $trancheB = new Tranche(6);

// tranches are initialised with an interest rate, expressed as an integer
```

(Attempting to) invest in tranches:
N.B. to see the  return values printed out, make the entire call as an argument in PHP's `print_r()` [method](http://php.net/manual/en/function.print-r.php).
```

php > $investor1->invest(1000, $trancheA, "2015-10-03");                     ## returns "ok"
php > $investor2->invest(1000, $trancheA, "2015-10-04");                     ## raises an Exception as the tranche is full
php > $investor3->invest(500, $trancheB, "2015-10-10");                      ## returns "ok"
php > $investor4->invest(1100, $trancheB, "2015-10-25");                     ## raises an Exception as the tranche is full


// the invest method takes three arguments:
// - an amount to invest, expressed as an integer
// - the tranche into which the money is being invested, an instance of the Tranche object
// - the date of the investment, expressed as a string
```
Returning the accrued interest:   
(See earlier note on using `print_r()` to return values.)
```
php > $investor1->calculateInterest();                                       ## returns 28.06
php > $investor3->calculateInterest();                                       ## returns 21.29
```

Tests are run using PHPUnit:
```
./vendor/bin/phpunit --bootstrap vendor/autoload.php tests                   ## runs the entire test suite
./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/testFile.php      ## runs an individual test
```
Each can be run with the `--testdox` option preceding the files passed in to display the test results in a prettier, more human-readable format.


## Approach

The first step in this challenge was to establish the core of what was necessary to satisfy the conditions of the specification. I took the decision, for example, not to create a `Loan` class as, whilst it was mentioned in the set up for the project, it was not actually necessary for any of the logic of the challenge. Please see [Limitations](#limitations) for a further discussion of some of the design decisions in this application, and their implications. Throughout this process, I made use of [CRC cards](https://en.wikipedia.org/wiki/Class-responsibility-collaboration_card) in order to get a sense of how the different parts of the application would communicate, but also to ensure that my design would be able to satisfy the requirements of the challenge.

Given that I had never written any PHP before this project, the next step was to learn how to write PHP. In the past when learning a new language or framework, I have often followed a tutorial, changing as necessary to meet my own requirements. With this challenge, however, I took a new approach. Instead of attempting to 'learn PHP', I instead took the decision to use my test-driven approach to development to also drive my learning of the language; I would learn how to create a class, call a method, or build a mock as and when I needed to. This allowed me to keep a tight focus on what needed to be built, and the tools I would need from the PHP toolbox to do so. I found this approach to be of a lot more practical use in learning a new language than following a tutorial.


## Challenges

The main challenge in this test came from the fact that I was using technologies that I had not used before. This mostly came from the testing framework, PHPUnit; being familiar with objected-oriented design in languages such as Ruby and ES6 JavaScript, the patterns in PHP were familiar. PHPUnit, on the other hand, dealt with things like assertions or mock creation in a different way to frameworks that I have used before, such as RSpec, and so working out how to properly use matchers, or create mocks with the correct methods and return values, for example, took me longer than I would have liked. Moreover, the feedback on failing tests or tests with errors felt less comprehensive than it is in RSpec, which made resolving errors, at times, trickier.

The logic element of the application itself proved to be relatively straightforward. The most complex part of this was calculating the interest accrued by an investor over a set period of time - in particular, by working out what the specified figures of £28.06 and £21.29 actually represented. Through trial and error, I established that these were pro-rata figures for interest accrued over the month, increasing in a linear rather than compounding manner. After ascertaining this, I was able to break down the information that performing this calculation would depend on, and then use a test-driven approach to return each of these bits of information, eventually creating a single method that would return the correct interest accrued for any given investment.

I was also challenged by the design process of the application and, more specifically, what information would be stored (and retrieved), and where. The greatest of these was where the method to return the interest accrued by an investor in a given period of time should sit. In the end, I took the decision to leave this method with the `Investor` class; however, in a more sophisticated system that may wish to perform this operation across a greater number of loans, tranches, and investments, it may be better for this method to sit in an overarching `System` class. This abstraction, however, felt like a step too far for this test, and the `Investor` class felt like the next most natural home for it - given it is the investor that is accruing interest.



## Limitations

Given that this challenge included specific instructions not to gold-plate the code, this project is built with as minimal code as possible to satisfy the specifications of the challenge. As such, there are several aspects of the current implementation that make it non-scalable or in other ways limited. For example, values such as 31/10/2015, the end date for the period over which interest was to be calculated, is hard-coded rather than injected. Similarly, as the calculation is only performed over a single-month period, the start date is simply taken as the start date for the investment - for an investment that carried over multiple months, this solution would not scale. Additionally, an investor can only have one investment at a time - this investment being stored to each investor's `$investment` variable. It is easy to imagine these investments being stored to an array in the future, allowing an investor multiple concurrent investments, but this was not a necessary step for this challenge.

Another limitation of the current system is that it does not handle edge cases. This can include anything from a user inputting data in an incorrect format (ideally the program would either coerce the data into the right format or, if that were not possible, print a message informing the user of the correct format of the data), to an investor trying to invest more funds than they have (in the current implementation, an investor may not invest more than a tranche's maximum amount into a given tranche, but they can invest more than they have across multiple tranches).

As mentioned above, it is also possible to imagine that, with further specifications for and development on this project, there might be other classes that emerge as being useful. A `Loan` class, for example, from which the `Tranche` class extends, may be useful to group a selection of tranches together and perform common operations across them. This would facilitate the implementation, for example, of multiple tranches across several loans, with different start and end dates. Furthermore, a `System` class (potentially acting similarly to a Singleton class) may be a useful addition in order to perform calculations for various metrics or data-points across the range of loans and investments that have been created. It logically makes more sense for things such as the `calculateInterest()` method to sit here, rather than with the `Investor` class, but again, creating a `System` class solely for this purpose felt like an unnecessary layer of abstraction for this project.


-----------
If you have any suggestions or feedback on either this project or its documentation, please [open an issue](https://github.com/peterwdj/lendinvest-tech-test/issues/new).
