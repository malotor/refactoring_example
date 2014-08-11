<?php

namespace malotor\videoclub;

class ChildrensPrice extends Price {
	public function getPriceCode() {
		return Movie::CHILDRENS;
	} 
}