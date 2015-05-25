<?php
class Achiev_Shortcodes {
	public static function init() 
	{
		add_shortcode('point_users', array(Achiev_Shortcodes, 'point_users'));
		add_shortcode('point_user', array(Achiev_Shortcodes, 'point_user'));
	}

	public static function point_users($attribut, $content = null) 
	{
		$options = shortcode_atts(
				array(
						'limit'  => 10,
						'order_by' => 'achiev',
						'order' => 'DESC'
				),
				$attribut
		);
		extract($options);
		$output = "";
		$pointusers = Achiev::getpointusers($limit, $order_by, $order);

		if (sizeof($pointusers) > 0) 
		{
			foreach ($pointusers as $pointuser) 
			{
				$output .='<div class="achiev-user">';
				$output .= '<span class="achiev-user-username">';
				$output .= get_user_meta($pointuser->user_id, 'nickname', true);
				$output .= ':</span>';
				$output .= '<span class="achiev-user-achiev">';
				$output .= " ". $pointuser->achiev . " " . get_option('achiev-point_label', ACHIEV_DEFAULT_POINT_LABEL);
				$output .= '</span>';
				$output .= '</div>';
			}
		} 
		else 
			$output .= '<p>No users</p>';
		return $output;
	}
	
	public static function point_user($attribut, $content = NULL) 
	{
		$output = "";	
		$options = shortcode_atts(array('id'  => ""), $attribut);
		extract($options);
		if ($id == "") 
			$id = get_current_user_id();
		
		if ($id != 0) 
		{
			$achiev = Achiev::getpoint($id);
			$output .= $achiev;
		}
		return $output;
	}
}
Achiev_Shortcodes::init();
