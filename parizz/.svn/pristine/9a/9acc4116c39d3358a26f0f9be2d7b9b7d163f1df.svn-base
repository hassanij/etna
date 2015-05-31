<?php
$handle = fopen("../data/musee.csv", "r");
$tab = array();
$i = 0;
$j = 0;
while (($data = fgetcsv($handle, 10000, ";")) !== FALSE)
{
	if ($j != 0)
	{
		$tab[$i][0] = $data[0];
    	$tab[$i][1] = $data[2];
    }
    $j++;
    $i++;
}
$json = json_encode($tab);
echo $json;