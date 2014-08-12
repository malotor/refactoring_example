<?php

namespace malotor\videoclub;

class RegularPrice extends Price {
	public function getPriceCode() { 
		return Movie::REGULAR;
	}
	public function getCharge($daysRented) {
		$result = 2;
		if ($daysRented > 2)
			$result += ($daysRented - 2) * 1.5; 
		
		return $result;
	}
	public function getFrequentRenterPoints($daysRented) {
		// add frequent renter points
		$result = 1;

		return $result;
	}

}