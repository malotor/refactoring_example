<?php


namespace malotor\videoclub;


class Rental {

	private $movie;
	private $daysRented;

	public function __construct(Movie $movie, $daysRented) { 
		$this->movie = $movie;
		$this->daysRented = $daysRented;
	}
	public function getDaysRented() {
		return $this->daysRented; 
	}
	public function getMovie() { 
		return $this->movie;
	} 
	public function getCharge() {
		$result = 0;
		
		switch ($this->getMovie()->getPriceCode()) {
			case Movie::REGULAR: 
				$result += 2;
				if ($this->getDaysRented() > 2)
					$result += ($this->getDaysRented() - 2) * 1.5; 
			break;
			case Movie::NEW_RELEASE:
				$result += $this->getDaysRented() * 3; 
			break;
			case Movie::CHILDRENS:
				$result += 1.5;
				if ($this->getDaysRented() > 3)
					$result += ($this->getDaysRented() - 3) * 1.5; 
			break;
		}
		return $result;
	}

	//Delegate method
	public function getFrequentRenterPoints() {
		// add frequent renter points
		$frequentRenterPoints=1;
		// add bonus for a two day new release rental
		if (($this->getMovie()->getPriceCode() == Movie::NEW_RELEASE) && $this->getDaysRented() > 1) 
			$frequentRenterPoints = 2;

		return $frequentRenterPoints;

	}


}