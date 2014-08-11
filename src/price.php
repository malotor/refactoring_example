<?php

abstract class Price { 
	abstract funtcion getPriceCode();
}

class ChildrensPrice extends Price {
	public function getPriceCode() {
		return Movie::CHILDRENS;
	} 
}

class NewReleasePrice extends Price { 
	public function getPriceCode() {
		return Movie::NEW_RELEASE; 
	}
}

class RegularPrice extends Price {
	public function getPriceCode() { 
		return Movie::REGULAR;
	} 
}