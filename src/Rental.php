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
	//Delegated method
	public function getCharge() {
		
		return $this->movie->getCharge($this->daysRented);
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