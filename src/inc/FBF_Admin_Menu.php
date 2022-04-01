<?php
namespace FBF\inc;

class FBF_Admin_Menu {

	public function __construct() {
		add_action('admin_menu', array($this, 'fbf_register_menu'), 9);
	}

	public function fbf_register_menu() {
		add_menu_page(
			$page_title 	= esc_html__( 'Form Feedback', 'fbf' ),
			$menu_title 	= esc_html__( 'Form Feedback', 'fbf' ),
			$capability 	= 'manage_options',
			$menu_slug 		= 'load_list_feedback',
			$function 		=  array( $this , 'fbf_menu_render'),
			$icon_url 		= 'dashicons-screenoptions'
		);
	}

	public function fbf_menu_render() {
		global $wpdb;

		$table_name = $wpdb->prefix."fbf_feedbacks";

		$res = $wpdb->get_results(
			"SELECT * FROM {$table_name} ORDER BY id DESC"
		);

		if ( !current_user_can( 'manage_options' ) )  {
            wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'fbf' ) );
        }

		if(!empty($res)){
			include_once dirname(__FILE__) . "/../templates/list_view.php";
		}else{
			echo "<h3 class='fbf-title'>No items at the moment!</h3>";
		}
	}

}

new FBF_Admin_Menu();
