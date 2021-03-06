<?php


use malotor\videoclub\Movie;
use malotor\videoclub\Rental;
use malotor\videoclub\Customer;
use malotor\videoclub\Price;

class RefactoringTestCase extends PHPUnit_Framework_TestCase {
	
	function setUp() {
		$this->movie = new Movie('BenHur', 0);
		$this->rental = new Rental($this->movie, 10);
		$this->customer = new Customer('John Doe');
		$this->customer->addRental($this->rental);
	}

	function testMovie() {

		$this->assertEquals('BenHur', $this->movie->getTitle());
		$this->assertEquals(0, $this->movie->getPriceCode());

	}

	function testRental() {

		$this->assertInstanceOf('\malotor\videoclub\Movie', $this->rental->getMovie());
		$this->assertEquals(10, $this->rental->getDaysRented());

	}

	function testCustomer() {

		//$this->customer->addRental($this->rental);
		$this->assertEquals('John Doe', $this->customer->getName());

	}

	function testCustomerStatement() {

		$output = "Rental Record for John Doe:\n\tBenHur:\t14\nAmount owed is 14\nYou earned 1 frequent renter points";

		$this->assertEquals($output, $this->customer->statement());

	}

	function testNewReleaseCustomerStatement() {

		$movie = new Movie('The lord of the rings', 1);
		$rental = new Rental($movie, 10);
		$customer = new Customer('John Doe');

		$customer->addRental($rental);

		$output = "Rental Record for John Doe:\n\tThe lord of the rings:\t30\nAmount owed is 30\nYou earned 2 frequent renter points";

		$this->assertEquals($output, $customer->statement());

	}


	function testChildrenCustomerStatement() {

		$movie = new Movie('Toy Story', 2);
		$rental = new Rental($movie, 10);
		$customer = new Customer('John Doe');

		$customer->addRental($rental);

		$output = "Rental Record for John Doe:\n\tToy Story:\t12\nAmount owed is 12\nYou earned 1 frequent renter points";

		$this->assertEquals($output, $customer->statement());

	}

	function testSeveralCustomerStatement() {

		$movie = new Movie('The lord of the rings', 1);
		$rental = new Rental($movie, 10);

		$movie2 = new Movie('Toy Story', 2);
		$rental2 = new Rental($movie2, 10);

		$this->customer->addRental($rental);
		$this->customer->addRental($rental2);

		$output = "Rental Record for John Doe:\n\tBenHur:\t14\n\tThe lord of the rings:\t30\n\tToy Story:\t12\nAmount owed is 56\nYou earned 4 frequent renter points";

		$this->assertEquals($output, $this->customer->statement());

	}

	function testHtmlStatement() {
		$movie = new Movie('The lord of the rings', 1);
		$rental = new Rental($movie, 10);

		$movie2 = new Movie('Toy Story', 2);
		$rental2 = new Rental($movie2, 10);

		$this->customer->addRental($rental);
		$this->customer->addRental($rental2);

		$output = "<h1>Rental Record for <em>John Doe</em></h1>\nBenHur: 14<br>\nThe lord of the rings: 30<br>\nToy Story: 12<br>\n<p>Amount owed is <em>56</em></p>\n<p>You earned <em>4</em> frequent renter points</p>";

		$this->assertEquals($output, $this->customer->htmlStatement());
	}

}
