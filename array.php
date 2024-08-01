<?php
// Example: Create an array from 1 to 50
$array1 = range(601, 610);
$array2 = range(801, 810);
$array3 = range(1001, 1010);

$evenNumbers = range(601, 610, 1);
$egiht = range(801, 810, 1);
foreach ($evenNumbers as $num) {
	foreach($egiht as $scound)
	{
    echo $scound . ' ';
}
echo $num . ' ';
}
?>