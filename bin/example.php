<?php

require dirname(dirname(__FILE__)) . '/vendor/autoload.php';

use malotor\videoclub\Movie;
use malotor\videoclub\Rental;
use malotor\videoclub\Customer;

$movie = new Movie('BenHur', 0);
$rental = new Rental($movie, 10);
$customer = new Customer('John Doe');

$movie2 = new Movie('The lord of the rings', 1);
$rental2 = new Rental($movie2, 10);

$movie3 = new Movie('Toy Story', 2);
$rental3 = new Rental($movie3, 10);


$customer->addRental($rental);
$customer->addRental($rental2);
$customer->addRental($rental3);

echo $customer->statement();