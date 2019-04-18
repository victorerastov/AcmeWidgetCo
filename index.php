<?php


$baskets = [];
$total = 0;


$baskets = addProduct($baskets, "B01");
$baskets = addProduct($baskets, "B01");
$baskets = addProduct($baskets, "R01");
$baskets = addProduct($baskets, "R01");
$baskets = addProduct($baskets, "R01");

echo(getTotal($baskets));

function getTotal($baskets)
{
	$total = 0;
	$rHalf = 0;
	for($i = 0; $i < count($baskets); $i ++)
	{
		if($baskets[$i] == "R01")
		{
			if($rHalf == 0)
			{
				$total += 32.95;
				$rHalf = 1;
			}
			else if($rHalf == 1)
			{
				$total += (32.95 / 2);
				$rHalf = -1;
			}
			else 
				$total += 32.95;
		}
		if($baskets[$i] == "G01") $total += 24.95;
		if($baskets[$i] == "B01") $total += 7.95;
	}
	if($total < 50) $total += 4.95;
	else if($total < 90) $total += 2.95;
	return $total;
}

function addProduct($baskets, $product)
{
	array_push($baskets, $product);
	return $baskets;
}
