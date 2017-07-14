<?php

namespace muv\HidePreview\Admin\Settings;


defined('ABSPATH') OR exit;


class Freischalten {

    
    public static function init() {
	
	add_action('admin_init', array(self::class, 'addSettings'));
	
	add_action('admin_menu', array(self::class, 'addAdminMenuItem'));

	
	if (isset($_SESSION['muv-hp-anzeige-link-neu']) && ($_SESSION['muv-hp-anzeige-link-neu']) === 1) {
	    unset($_SESSION['muv-hp-anzeige-link-neu']);
	    add_action('admin_notices', array(self::class, 'freischaltLinkNeuBerechnet'));
	}
    }

    
    public static function addAdminMenuItem() {
	
	add_submenu_page(NULL, '', '', 'manage_options', 'muv-hp-anzeige-link-neu', array(self::class, 'erzeugeNeuenFreischaltKey'));
    }

    
    public static function erzeugeNeuenFreischaltKey() {
	
	check_admin_referer('muv-hp-anzeige-link-neu');

	
	if (!current_user_can('manage_options')) {
	    wp_die(__('Sie haben nicht das Recht, diese Seite zu sehen!', 'muv-minishop'));
	}

	
	update_option('muv-hp-freischalten-key', bin2hex(openssl_random_pseudo_bytes(15)), 'no');
	
	$_SESSION['muv-hp-anzeige-link-neu'] = 1;
	
	wp_redirect('admin.php?page=muv-hp-einstellungen&tab=freischalten');
    }

    
    public static function freischaltLinkNeuBerechnet() {
	echo '<div class="notice notice-success">';
	echo '<p>';
	echo __('<b>Der Link zum Freischalten der versteckten Bereiche wurde neu erzeugt.</b>' .
		' Bitte beachten Sie, dass ein Zugriff mit dem alten Link ab sofort nicht mehr möglich ist.', 'muv-hide-preview');
	echo '</p>';
	echo '</div>';
    }

    
    public static function handleSettings() {
	echo '<form method="post" action="options.php">';

	
	settings_fields('muv-hp-settings-freischalten');
	
	do_settings_sections('muv-hp-settings-freischalten');
	
	
	echo '</form>';
    }

    
    public static function addSettings() {
	
	add_settings_section('muv-hp-freischalten-link', __('Freischalt-Link', 'muv-hide-preview'), array(self::class, 'sectionFreischaltLinkBeschreibung'), 'muv-hp-settings-freischalten');
    }

    
    public static function sectionFreischaltLinkBeschreibung() {
	echo __('Nach dem Aufrufen des folgenden Freischalt-Link ist der Zugriff auf alle versteckten Bereiche möglich.<br>' .
		'Geben Sie deshalb diesen Link nur an die Personen weiter, die ihre versteckten Bereiche sehen sollen.', 'muv-hide-preview');
	echo '<br><br>';
	echo '<input readonly type="text" class="gross" value="' . 
	esc_url(get_bloginfo('url')) . '/muv-hide-preview/freischalten/' . esc_html(get_option('muv-hp-freischalten-key', '')) . 
		'">';
	
	echo '<br><br><a href="' . wp_nonce_url('admin.php?page=muv-hp-anzeige-link-neu', 'muv-hp-anzeige-link-neu') .
	'" class="button"><i class="fa fa-refresh"> </i> ' .
	__('Freischalt-Link neu erstellen', 'muv-hide-preview') . '</a><br><br>';
    }

}
