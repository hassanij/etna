<?php
require_once(dirname(__FILE__). '/twitteroauth/twitteroauth.php');
date_default_timezone_set('UTC');
error_reporting(E_ALL ^ E_DEPRECATED);
$get_csv = array_map('str_getcsv', file(dirname(__FILE__). '/showHashtags.csv'));
$csv = array();


	for ($i = 0; isset($get_csv[$i]); $i++) {
  		$key = $get_csv[$i][1];
  		$value = $get_csv[$i][2];
  		$csv[$key][] = $value;
	}

function connect() {
  mysql_connect("10.104.33.10", "root", "");
  mysql_select_db("dico")
  	or die("Erreur SQL! " . $sql_query . ''. mysql_error() ."\n");
  mysql_query("SET NAMES UTF8");
}

function save_table($json) {
  connect();
  mysql_query('TRUNCATE TABLE dico');
  for($i = 0; isset($dico[$i]); $i++) {
      $sql_query = 'INSERT INTO dico VALUES("'. $dico[$i] .'")';
      $reg = mysql_query($sql_query) 
		or die("Erreur SQL! " .$sql_query. ''.mysql_error() ."\n");
    }
  mysql_query('OPTIMIZE TABLE dico');
  mysql_close();
}

function get_content($channel) {
	$url = "http://94.23.253.36:8080/TiVineWS_V1.0/GetAllContentForPartAndChannel";
	$part = "0";
	$channel = $channel;
	$client_id = "10989836";
	$url_encode = hash_hmac("sha512", $url . $part . $channel . $client_id, "1a24cb309a1eb97d15afd42cde2699");
	$url_fin = $url . "?part=" . $part . "&channel=" . $channel . "&clientId=" . $client_id . "&encodedKey=" . $url_encode;

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url_fin);
	curl_setopt($curl, CURLOPT_POST, TRUE);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/json; charset: utf-8"));
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	$webpage = curl_exec($curl);
	$result = json_decode($webpage, true);
	return $result;
}

function escape($str) {
	$search=array("\\","\0","\n","\r","\x1a","'",'"');
	$replace=array("\\\\","\\0","\\n","\\r","\Z","\'",'\"');
	return str_replace($search,$replace,$str);
}

function save_content($result, $csv, $id) {
	if (isset($csv[$result['programs'][0]['title']]))
	  $h = $csv[$result['programs'][0]['title']];
	else {
	  $results = preg_replace("/[^[:alnum:]]/u", "", $result['programs'][0]['title']);
	  $h[0] = "#" . str_replace(" ", "", $results);
	}
	if (count($h) != 1)
		$hashtag = $h[0] . ", " . $h[1];
	else
		$hashtag = $h[0];
	$result['programs'][0]['desc'] = escape($result['programs'][0]['desc']);
	connect();
	$query  = 'DELETE FROM tivine WHERE chaine="' . $result['programs'][0]['channel'] . '"';
	mysql_query($query)
	  or die("Erreur SQL! " . $sql_query . ''. mysql_error() ."\n");
	$image = $result['programs'][0]['image'];
	$len = strlen($image);
	$pos = strpos($image, "%");
	if ($pos != false)
	  $image = substr($image, 0, $pos);
	$time_start = substr($result['programs'][0]['startTime'], 8, 4);
	$time_end = substr($result['programs'][0]['endTime'], 8, 4);
	$sql_query = 'INSERT INTO tivine(chaine, emission, image, hashtag, resume, caster, id, timestart, timeend) 
			VALUES("'. $result['programs'][0]['channel'] .'", "'. $result['programs'][0]['title'] .'", "'. $image .'", "'. $hashtag .'", "'. $result['programs'][0]['desc'] .'", "'. $result['programs'][0]['cast'] .'", "' . $id . '", "' . $time_start . '", "' . $time_end . '")';
	$reg = mysql_query($sql_query)
		or die("Erreur SQL! " .$sql_query. ''.mysql_error() ."\n");
	return ($h);
}

function get_tweets($hashtag_list, $dico, $id) {
  $tweets_array = array();
  $current_date = date("D M j G:i:s");
  $k = count($hashtag_list);
  $connection = new TwitterOAuth("aBI1MZMGKbXPkuvKmMwq8bzvM",
                                  "BQCfSHW3zymwd2H1xZNk8dDQ4CMMTOKv8XVPngYeMndPngvKji",
                                  "781397600-nHOnppfUXNpBoLzPqEPUWur07kWulKEIQwYEfoLX",
                                  "shBWzuuveEYTQ6rp7ZuYg1hf5SKoM8uEFYCIWIcpLIR4Z");
  for ($j = 0; $j < $k; $j++) {
	$search = $connection->get('search/tweets', array('q' => $hashtag_list[$j], 'lang'=>"fr", 'count' => 50, 'result_type' => "recent"));
		for($i = 0; isset($search->statuses[$i]); $i++) 
			$tweets_array[$i] = $search->statuses[$i]->text;
	}
	words($tweets_array, $dico, $id);
}

function words($tab, $dico, $id) {
	$top_words = "";
  for($i = 0; isset($tab[$i]); $i++)
      $tab[$i] = mb_strtolower($tab[$i], 'UTF-8');

    for ($i = 0; isset($tab[$i]); $i++) {
	$tab[$i] = preg_replace('/[^[:alnum:]#@]/u', ' ', $tab[$i]);
	$new_tab = explode(" ", $tab[$i]);
	for($j = 0; isset($new_tab[$j]); $j++)
	    $tab[$i] = $new_tab;
      }
    for($i = 0; isset($tab[$i]); $i++)
      $tab[$i] = array_values(array_filter($tab[$i]));

   $tab1 = array();
   for ($i = 0; !empty($tab[$i]); $i++) {
     for ($j = 1; !empty($tab[$i][$j]); $j++) {
       if (!array_key_exists($tab[$i][$j], $tab1))
	 $tab1[$tab[$i][$j]] = 1;
      else
	 $tab1[$tab[$i][$j]] += 1;
     }
   }
   arsort($tab1);
   $i = 1;
   foreach ($tab1 as $key => $value) {
     if($i <= 10 && in_array($key, $dico) == true) {
	 		$top_words[$i] = $key;
	 		$i++;
       }
   }
   save_words($top_words, $id);
}


function save_words($words, $id) {
	connect();
	$wordslist = "";
	$query  = 'DELETE FROM mot WHERE id="' . $id . '"';
	mysql_query($query)
		or die("Erreur SQL! " . $sql_query . ''. mysql_error() ."\n");
	if (isset($words[0]))
		$wordslist = $words[0];

	for ($i = 1; isset($words[$i]); $i++)
		$wordslist = $wordslist . ', ' . $words[$i];
	$sql_query = 'INSERT INTO mot(id, words) VALUES("' . $id . '", "' . $wordslist . '")';
	$reg = mysql_query($sql_query)
			or die("Erreur SQL! " .$sql_query. ''.mysql_error() ."\n");
}



$dico = file_get_contents(dirname(__FILE__). '/liste_francais');
$dico = explode("\n", $dico);
connect();
$sql_query = 'ALTER TABLE tivine AUTO_INCREMENT = 1';
$reg = mysql_query($sql_query);
for ($i = 1; $i <= 36; $i++) {
	$save = get_content($i);
	$h = save_content($save, $csv, $i);
	get_tweets($h, $dico, $i);
}
$sql_query = 'ALTER TABLE tivine AUTO_INCREMENT = 1';
$reg = mysql_query($sql_query);
?>
