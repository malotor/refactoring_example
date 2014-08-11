<?php

namespace malotor\videoclub;

class Customer {
	
	private $name;
	private $rentals = array();
	
	public function __construct($name) { 
		$this->name = $name;
	}
	
	public function addRental(Rental $arg) { 
		$this->rentals[] = $arg;
	}

	public function getName (){
		return $this->name; 
	}

	private function getTotalCharge() {
		$totalAmount = 0;
		foreach ($this->rentals as $each ) {
			$totalAmount += $each->getCharge();
		}
		return $totalAmount;
	}

	private function getTotalFrequentRenterPoints() {
		$result = 0;
		foreach ($this->rentals as $each ) {
			// add frequent renter points
			$result += $each->getFrequentRenterPoints();
		}
		return $result;
	}

	public function statement() { 
		
		$result = "Rental Record for " . $this->getName() . ":\n"; 

		foreach ($this->rentals as $each ) {
			//show figures
			$result .= "\t" . $each->getMovie()->getTitle() . ":\t" .  $each->getCharge() . "\n";

		}
		//add footer lines 
		$result .= "Amount owed is " . $this->getTotalCharge() . "\n";
		$result .= "You earned " . $this->getTotalFrequentRenterPoints() . " frequent renter points";
		
		return $result; 
	}

	public function htmlStatement() { 
		
		$result = "<h1>Rental Record for <em>" . $this->getName() . "</em></h1>\n"; 


		foreach ($this->rentals as $each ) {
			//show figures
			$result .= $each->getMovie()->getTitle() . ": " .  $each->getCharge() . "<br>\n";

		}
		//add footer lines 
		$result .= "<p>Amount owed is <em>" . $this->getTotalCharge() . "</em></p>\n";
		$result .= "<p>You earned <em>" . $this->getTotalFrequentRenterPoints() . "</em> frequent renter points</p>";
		
		return $result; 
	}
}
