<?php
class Achiev {
	public static function getpoint($userid) 
	{
		return Achiev_Database::getpointuser($userid);
	}
	
	public static function setpoint($point, $userid) 
	{
		return Achiev_Database::updatepointuser($point, $userid);
	}

	public static function getpointusers($limit, $order_by, $order) 
	{
		return Achiev_Database::getpointusers($limit, $order_by, $order);
	}
}
