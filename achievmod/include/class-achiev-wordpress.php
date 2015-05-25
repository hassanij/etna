<?php
class Achiev_Wordpress {
	public static function init() 
	{
		if (get_option('achiev-comments_enable', 1)) 
		{
			add_action('wp_set_comment_status', array(Achiev_Wordpress, 'wp_set_comment_status'), 10, 2);
			add_action('comment_post', array(Achiev_Wordpress, 'comment_post'), 10, 2);
		}
		if (get_option('achiev-welcome', "0") !== "0")
			add_action('user_register', array(Achiev_Wordpress,'user_register'));
	}
	

	public static function user_register($user_id) 
	{
		Achiev::setpoint(Achiev::getpoint($user_id) + get_option('achiev-welcome', 0), $user_id);
	}
	
	public static function wp_set_comment_status($id, $status) 
	{
		$user = get_user_by('email', get_comment_author_email($id));
		if ($user) 
		{
			if ($status == "approve") 
				Achiev::setpoint(Achiev::getpoint($user->ID) + get_option('achiev-comments', 1), $user->ID);
			else if ($status == "hold" || $status == "spam" || $status == "delete" || $status == "trash") 
				Achiev::setpoint(Achiev::getpoint($user->ID) - get_option('achiev-comments', 1), $user->ID);
			}
	}
	
	public static function comment_post($id, $status) 
	{
		$user = get_user_by('email', get_comment_author_email($id));
		if ($user) 
			if ($status == "1") 
				Achiev::setpoint(Achiev::getpoint($user->ID) + get_option('achiev-comments', 1), $user->ID);
	}	
}
Achiev_Wordpress::init();
