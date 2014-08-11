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

	protected function amountFor($rental) {
		$result = 0;
		
		switch ($rental->getMovie()->getPriceCode()) {
			case Movie::REGULAR: 
				$result += 2;
				if ($rental->getDaysRented() > 2)
					$result += ($rental->getDaysRented() - 2) * 1.5; 
			break;
			case Movie::NEW_RELEASE:
				$result += $rental->getDaysRented() * 3; 
			break;
			case Movie::CHILDRENS:
				$result += 1.5;
				if ($rental->getDaysRented() > 3)
					$result += ($rental->getDaysRented() - 3) * 1.5; 
			break;
		}
		return $result;
	}

	public function statement() { 
		$totalAmount = 0;
		$frequentRenterPoints = 0;
		//Enumeration rentals = _rentals.elements();
		
		$result = "Rental Record for " . $this->getName() . ":\n"; 

		foreach ($this->rentals as $each ) {

			$thisAmount = $this->amountFor($each);
			
			// add frequent renter points
			$frequentRenterPoints++;
			// add bonus for a two day new release rental
			if (($each->getMovie()->getPriceCode() == Movie::NEW_RELEASE) && $each->getDaysRented() > 1) 
				$frequentRenterPoints ++;
			//show figures
			$result .= "\t" . $each->getMovie()->getTitle() . ":\t" . $thisAmount . "\n";

			$totalAmount += $thisAmount;
		}
		//add footer lines 
		$result .= "Amount owed is " . $totalAmount . "\n";
		$result .= "You earned " . $frequentRenterPoints . " frequent renter points";
		
		return $result; 
	}
}
