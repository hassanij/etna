<?php 
require('../../../wp-load.php');
$id = get_current_user_id();
echo $id . "</br>";
$karma = Achiev::getpoint( $id );
echo $karma;
?> 