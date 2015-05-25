<?php
class Achiev_Database 
{
	public static function getpointuser($user_id) 
	{
		global $wpdb;
		$result = $wpdb->get_row("SELECT achiev FROM wp_point_users WHERE user_id = '$user_id'");

		if ($result) 
			$result = $result->achiev;
		else 
			$result = 0;
		return $result;
	}
	
	public static function getpointusers($limit, $order_by, $order)
	{
		global $wpdb;
		
		$result = $wpdb->get_results("SELECT * FROM wp_point_users ORDER BY " . $order_by . " " . $order . " LIMIT 0 ," . $limit);
		return $result;
	}
	
	public static function updatepointuser($achiev, $user_id) 
	{
		global $wpdb;
	
		$table = "wp_point_users";
		
		$rows_affected = $wpdb->update($table, array('achiev' => $achiev) , array('user_id' => $user_id));
		if (!$rows_affected)
			$rows_affected = $wpdb->insert($table, array('user_id' => $user_id, 'achiev' => $achiev));
		return $rows_affected;
	}
}


