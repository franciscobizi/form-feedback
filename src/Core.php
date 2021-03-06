<?php
namespace FBF;

use FBF\inc\FBF_Tables;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * 
 * Core class that manage the plugin
 * 
 * @author Francisco Bizi <dev@support.com>
 * 
 */
final class Core
{

    function __construct()
    {
        
        $this->init();
        
	}
    
	private function init()
	{
        $this->load_on_init();

		add_action('wp_enqueue_scripts',			[$this, '_fbf_enquee_scripts']);
        add_action('admin_enqueue_scripts',			[$this, '_fbf_admin_scripts']);
        
        //ajax 
        add_action('wp_ajax_fbf_requests',          [$this, '_fbf_ajax_requests']);
        add_action('wp_ajax_nopriv_fbf_requests',   [$this, '_fbf_ajax_requests']);
    }

    public function load_on_init()
    {
        require_once dirname(__FILE__) . "/inc/FBF_Admin_Menu.php";
        require_once dirname(__FILE__) . "/inc/FBF_Tables.php";
        require_once dirname(__FILE__) . "/shortcodes/form-shortcode.php";
    }

    public function _fbf_ajax_requests()
    {
        require_once dirname(__FILE__)."/inc/ajax.php";
    }

    public function _fbf_admin_scripts()
    {
        wp_enqueue_style("fbf-admin-style", plugins_url('/src/assets/css/admin-styles.css', dirname(__FILE__)) ,false, time(), 'all');
    }

    public function _fbf_enquee_scripts()
    {
        wp_enqueue_style("fbf-style", plugins_url('/src/assets/css/styles.css', dirname(__FILE__)) ,false, time(), 'all');
        wp_enqueue_script("fbf-js", plugins_url('/src/assets/js/script.js', dirname(__FILE__)), array('jquery'), time(), true);
        wp_localize_script('fbf-js', 'ajax_var', 
                                array(
                                        'endpoint' => admin_url('admin-ajax.php'),
                                    ));
    }
    
    function fbf_install()
    {
        FBF_Tables::tableUp();
    }

    function fbf_uninstall()
    {
        FBF_Tables::tableDown();
    }
    
}