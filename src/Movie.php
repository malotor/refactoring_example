<?php

namespace malotor\videoclub;


class Movie {

	const CHILDRENS = 2; 
	const REGULAR = 0; 
	const NEW_RELEASE = 1;

	private $title; 
	private $priceCode;

	public function __construct($title, $priceCode) { 
		$this->title = $title;
		$this->priceCode = $priceCode; 
	}

	public function getPriceCode() { 
		return $this->priceCode;
	}

	public function setPriceCode($arg) { 
		$this->priceCode = $arg;
	}

	public function getTitle() { 
		return $this->title;
	}


	public function getCharge($daysRented) {
		$result = 0;
		
		switch ($this->getPriceCode()) {
			case Movie::REGULAR: 
				$result += 2;
				if ($daysRented > 2)
					$result += ($daysRented - 2) * 1.5; 
			break;
			case Movie::NEW_RELEASE:
				$result += $daysRented * 3; 
			break;
			case Movie::CHILDRENS:
				$result += 1.5;
				if ($daysRented > 3)
					$result += ($daysRented - 3) * 1.5; 
			break;
		}
		return $result;
	}

}
