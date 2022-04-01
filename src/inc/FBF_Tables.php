<?php

namespace FBF\inc;

class FBF_Tables
{
    public static function tableUp()
    {
        global $wpdb;

		$charset_collate = $wpdb->get_charset_collate();

		$schema = "CREATE TABLE {$wpdb->prefix}fbf_feedbacks (
			id bigint(200) NOT NULL auto_increment,
			name varchar(255) NOT NULL,
			email  varchar(200) NOT NULL,
			phone varchar(100) NOT NULL,
			created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY  (id)
		) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $schema );

    }

    public static function tableDown()
    {
        global $wpdb;
        $table_name = $wpdb->prefix."fbf_feedbacks";
        $wpdb->query( "DROP TABLE IF EXISTS {$table_name}" );
    }
}
