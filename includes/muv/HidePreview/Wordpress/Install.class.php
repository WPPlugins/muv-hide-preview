<?php

namespace muv\HidePreview\Wordpress;

use muv\HidePreview\Classes\DBTables;


defined('ABSPATH') OR exit;


class Install {

    
    public static function init() {
	
	self::updateTables();
    }

    
    private static function updateTables() {

	
	global $wpdb;

	
	$tables = DBTables::getTables();
	
	
	$sql = "CREATE TABLE IF NOT EXISTS " . $tables['intversion'] . " ( 
				`identifier` VARCHAR(50) NOT NULL,
				`version` INT(10) UNSIGNED NOT NULL,
				`created_at` DATETIME NOT NULL,
				PRIMARY KEY (`identifier`, `version`)
				)";
	$wpdb->query($sql);

	$updateRoot = dirname(dirname(dirname(dirname(__DIR__)))) . '/update/';

	
	$sollVersion = count(glob($updateRoot . '/*.inc.php'));

	
	$sql = $wpdb->prepare("select max(version) from " . $tables['intversion'] . " where identifier = %s", 
		MUV_HP_UPATE_IDENTIFIER);

	$istVersionSql = $wpdb->get_var($sql);
	$istVersion = (empty($istVersionSql)) ? 0 : (integer) $istVersionSql;

	
	if ($istVersion < $sollVersion) {
	    
	    for ($i = $istVersion; $i < $sollVersion; $i++) {
		
		$updateFile = $updateRoot . str_pad($i + 1, 4, '0', STR_PAD_LEFT) . '.inc.php';

		
		if (file_exists($updateFile)) {
		    include $updateFile;
		}
		
		$sql = $wpdb->prepare("INSERT INTO " . $tables['intversion'] .
			" (`identifier`, `version`, `created_at`) VALUES (%s, %d, NOW())", MUV_HP_UPATE_IDENTIFIER, $i + 1);

		$wpdb->query($sql);
	    }
	}
    }

}
