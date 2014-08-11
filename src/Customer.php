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

	public function statement() { 
		
		$frequentRenterPoints = 0;
		//Enumeration rentals = _rentals.elements();
		
		$result = "Rental Record for " . $this->getName() . ":\n"; 

		foreach ($this->rentals as $each ) {

			// add frequent renter points
			$frequentRenterPoints += $each->getFrequentRenterPoints();

			//show figures
			$result .= "\t" . $each->getMovie()->getTitle() . ":\t" .  $each->getCharge() . "\n";

		}
		//add footer lines 
		$result .= "Amount owed is " . $this->getTotalCharge() . "\n";
		$result .= "You earned " . $frequentRenterPoints . " frequent renter points";
		
		return $result; 
	}
}
