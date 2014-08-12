<?php

namespace malotor\videoclub;

class Movie {

	const CHILDRENS = 2; 
	const REGULAR = 0; 
	const NEW_RELEASE = 1;

	private $title; 
	private $price;

	public function __construct($title, $priceCode) { 
		$this->title = $title;
		$this->setPriceCode($priceCode); 
	}

	public function getPriceCode() { 
		return $this->price->getPriceCode();
	}

	public function setPriceCode($arg) { 
		switch ($arg) {
			case Movie::REGULAR: 
				$this->price = new RegularPrice(); 
			break;
			case Movie::NEW_RELEASE:
				$this->price = new NewReleasePrice(); 
			break;
			case Movie::CHILDRENS:
				$this->price = new ChildrensPrice(); 
			break;
			default:
				throw new Exception("Incorrect Price Code");
		}
	}

	public function getTitle() { 
		return $this->title;
	}


	public function getCharge($daysRented) {
		return $this->price->getCharge($daysRented);
	}

	//Delegate method
	public function getFrequentRenterPoints($daysRented) {
		return $this->price->getFrequentRenterPoints($daysRented);
	}


}
