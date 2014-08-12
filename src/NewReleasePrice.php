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
		return $daysRented > 1 ? 2 : 1 ;
	}

}