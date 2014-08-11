<?php

namespace malotor\videoclub;

class NewReleasePrice extends Price { 
	public function getPriceCode() {
		return Movie::NEW_RELEASE; 
	}
}