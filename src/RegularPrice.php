<?php

namespace malotor\videoclub;

class RegularPrice extends Price {
	public function getPriceCode() { 
		return Movie::REGULAR;
	}
}