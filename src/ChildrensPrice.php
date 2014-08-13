<?php

namespace malotor\videoclub;

class ChildrensPrice extends Price {
	public function getPriceCode() {
		return Movie::CHILDRENS;
	} 
	public function getCharge($daysRented) {
		return $daysRented > 3 ? 1.5 + ($daysRented - 3) * 1.5 : 1.5;
	}

}