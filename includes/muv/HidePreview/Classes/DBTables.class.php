<?php

namespace muv\HidePreview\Classes;


defined('ABSPATH') OR exit;


class DBTables {

    
    public static function getTables() {
	global $wpdb;

	
	$tables['intversion'] = $wpdb->prefix . 'muv_sh_intversion';

	
	return $tables;
    }

}
