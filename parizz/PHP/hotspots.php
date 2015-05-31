<?php
$handle = fopen("../data/hotstops.csv", "r");
$tab = array();
$i = 0;
$j = 0;
while (($data = fgetcsv($handle, 10000, ",")) !== FALSE)
{
	if($j != 0)
    $tab[$i] = $data[5];
    $j++;
    $i++;
}
$json = json_encode($tab);
echo $json;