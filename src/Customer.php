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

	//Delegate method
	protected function amountFor($rental) {
		return $rental->getCharge();
	}
	//Delegate method
	protected function frequentRenderPoint($rental) {
		return $rental->getFrequentRenterPoints();
	}

	public function statement() { 
		$totalAmount = 0;
		$frequentRenterPoints = 0;
		//Enumeration rentals = _rentals.elements();
		
		$result = "Rental Record for " . $this->getName() . ":\n"; 

		foreach ($this->rentals as $each ) {

			// add frequent renter points
			$frequentRenterPoints += $each->getFrequentRenterPoints();

			//show figures
			$result .= "\t" . $each->getMovie()->getTitle() . ":\t" .  $each->getCharge() . "\n";

			$totalAmount += $each->getCharge();
		}
		//add footer lines 
		$result .= "Amount owed is " . $totalAmount . "\n";
		$result .= "You earned " . $frequentRenterPoints . " frequent renter points";
		
		return $result; 
	}
}
