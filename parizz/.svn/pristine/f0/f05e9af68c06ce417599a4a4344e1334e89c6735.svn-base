<?php
$handle = fopen("../data/preservatifs.csv", "r");
$tab = array();
$i = 0;
$j = 0;
while (($data = fgetcsv($handle, 10000, ",")) !== FALSE)
{
	if($j != 0)
    $tab[$i] = $data[9];
    $j++;
    $i++;
}
$json = json_encode($tab);
echo $json;