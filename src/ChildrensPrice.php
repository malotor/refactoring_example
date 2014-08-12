<?php

namespace malotor\videoclub;

class ChildrensPrice extends Price {
	public function getPriceCode() {
		return Movie::CHILDRENS;
	} 
	public function getCharge($daysRented) {

		$result = 1.5;
		if ($daysRented > 3)
			$result += ($daysRented - 3) * 1.5; 
			
		return $result;
	}

	public function getFrequentRenterPoints($daysRented) {
		// add frequent renter points
		$result = 1;
		return $result;
	}

}