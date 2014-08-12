<?php

namespace malotor\videoclub;

class NewReleasePrice extends Price { 
	public function getPriceCode() {
		return Movie::NEW_RELEASE; 
	}
	public function getCharge($daysRented) {
		
		$result = $daysRented * 3; 
			
		return $result;
	}

	public function getFrequentRenterPoints($daysRented) {
		// add frequent renter points
		$result = 1;
		// add bonus for a two day new release rental
		if ($daysRented > 1) 
			$result = 2;

		return $result;
	}

}