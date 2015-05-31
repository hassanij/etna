<?php
$handle = fopen("../data/eclairage.csv", "r");
$tab = array();
while (($data = fgetcsv($handle, 10000, ";")) !== FALSE)
{
    if(isset($data[2]) && $data[2] != "libelle")
    {
    	if (!isset($tab[utf8_encode($data[2])]))
	 		$tab[utf8_encode($data[2])] = 1;
      	else
	 		$tab[utf8_encode($data[2])] += 1;
    }
}
$json = json_encode($tab);
echo $json;