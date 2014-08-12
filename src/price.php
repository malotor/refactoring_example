<?php

namespace malotor\videoclub;

abstract class Price { 

	abstract public function getPriceCode();

	abstract public function getCharge($daysRented);

	public function getFrequentRenterPoints($daysRented) {
		// add frequent renter points
		$result = 1;
		// add bonus for a two day new release rental
		if (($this->getPriceCode() == Movie::NEW_RELEASE) && $daysRented > 1) 
			$result = 2;

		return $result;
	}
	
}

