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
		
		return $this->movie->getFrequentRenterPoints($this->daysRented);

	}


}