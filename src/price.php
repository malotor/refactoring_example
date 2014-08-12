<?php

namespace malotor\videoclub;

abstract class Price { 

	abstract public function getPriceCode();

	abstract public function getCharge($daysRented);

	public function getFrequentRenterPoints($daysRented) {
		return 1;
	}	
}

