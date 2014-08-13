<?php

namespace malotor\videoclub;

class RegularPrice extends Price {
	public function getPriceCode() { 
		return Movie::REGULAR;
	}
	public function getCharge($daysRented) {
		return $daysRented > 2 ? 2 + ($daysRented - 2) * 1.5 : 2;
	}

}