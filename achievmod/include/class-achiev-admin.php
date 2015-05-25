<?php

class Achiev_Admin {
	public static function init() 
	{
		add_action('admin_notices', array(Achiev_Admin, 'admin_notices'));
		add_action('admin_menu', array(Achiev_Admin, 'admin_menu'), 40);
	}
	
	public static function admin_notices() 
	{
		if (!empty(Achiev_Admin::$notices)) 
			foreach (Achiev_Admin::$notices as $notice) 
				echo $notice;
	}
	
	public static function admin_menu() 
	{
		$admin_page = add_menu_page(
				__( 'Achiev' ),
				__( 'Achiev' ),
				'manage_options',
				'point',
				array( Achiev_Admin, 'point_menu')
		);
	}

	public static function point_menu() 
	{
		$alert = "";
		if (isset($_POST['submit'])) 
		{
			add_option('achiev-comments_enable', $_POST['achiev_comments_enable']); 
			update_option('achiev-comments_enable', $_POST['achiev_comments_enable']);
			
			add_option('achiev-comments', $_POST['achiev_comments']);
			update_option('achiev-comments', $_POST['achiev_comments']);
				
			add_option('achiev-welcome', $_POST['achiev_welcome']);
			update_option('achiev-welcome', $_POST['achiev_welcome']);

			$label = (isset($_POST['achiev_label']) && $_POST['achiev_label'] !== "")?$_POST['achiev_label']:"";
			add_option('achiev-point_label', $label);
			update_option('achiev-point_label', $label);
				
			$alert="Saved";
		}
		
		if ($alert != "")
			echo '<div style="background-color: #ffffe0;border: 1px solid #993;padding: 1em;margin-right: 1em;">' . $alert . '</div>';
		?>
		
			<h2><?php echo 'Point Options'; ?></h2>
			<hr>
			<form method="post" action="">
				<div class="wrap" style="border: 1px solid #ccc; padding:10px;">
					<h3><?php echo 'General'; ?></h3>
					<div class="achiev-admin-line">
						<div class="achiev-admin-label">
							Point label
						</div>
						<div class="achiev-admin-value">
							<?php 
								$label = get_option('achiev-point_label', 'points');
							?>
							<input type="textbox" name="achiev_label" value="<?php echo $label; ?>">
						</div>
					</div>
				</div>
				
				<div class="wrap" style="border: 1px solid #ccc; padding:10px;">
					<h3><?php echo 'Comments'; ?></h3>
					<div class="achiev-admin-line">
						<div class="achiev-admin-label">
							Enable comments points
						</div>
						<div class="achiev-admin-label">
							<?php 
								$enable_comments = get_option('achiev-comments_enable', 1);
							?>
							<input type="checkbox" name="achiev_comments_enable" value="1" <?php echo $enable_comments=="1"?" checked ":""?>>
						</div>
					</div>
					<div class="achiev-admin-line">
						<div class="achiev-admin-label">
							Comments points
						</div>
						<div class="achiev-admin-label">
							<?php 
								$enable_comments = get_option('achiev-comments_enable', 1);
							?>
							<input type="textbox" name="achiev_comments" value="<?php echo get_option('achiev-comments', 1); ?>" size="4">
						</div>
					</div>
				</div>
		
				<div class="wrap" style="border: 1px solid #ccc; padding:10px;">
					<h3><?php echo 'Others'; ?></h3>
					<div class="achiev-admin-line">
						<div class="achiev-admin-label">
							Welcome points
						</div>
						<div class="achiev-admin-label">
							<input type="textbox" name="achiev_welcome" value="<?php echo get_option('achiev-welcome', "0"); ?>" size="4">
						</div>
					</div>
				</div>
				
				<div class="achiev-admin-line">
					<?php submit_button("Save"); ?>
				</div>
		    	<?php settings_fields('achiev-settings'); ?>
		    </form>
			
		<?php 
	}
	
}