<?php
$handle = fopen("../data/cine.csv", "r");
$tab = array();
while (($data = fgetcsv($handle, 10000, ";")) !== FALSE)
  $tab = $data;
$lol = str_replace(", ", ",", $tab[0]);
$pos = explode("\r", $lol);
$json = json_encode($pos, JSON_FORCE_OBJECT);
echo $json;