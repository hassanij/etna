<?php

function connect() {
  mysql_connect("10.104.33.10", "ed", "ed");
  mysql_select_db("dico")
    or die("Erreur SQL! " .$sql_query. ''.mysql_error() ."\n");
  mysql_query("SET NAMES UTF8");
}
connect();
$sql = "SELECT * FROM tivine WHERE id=" . $_GET['id'];
$t = mysql_fetch_array(mysql_query($sql));
mysql_query("SET NAMES UTF8");
echo json_encode($t);
?>