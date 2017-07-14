<?php

namespace muv\HidePreview\Admin\Settings;

use muv\HidePreview\Classes\DefaultSettings;


defined('ABSPATH') OR exit;


class Ausgabe {

    
    public static function init() {
		add_action('admin_init', array(self::class, 'addSettings'));
    }

    
    public static function handleSettings() {
	echo '<form method="post" action="options.php">';

		settings_fields('muv-hp-settings-ausgabe');
		do_settings_sections('muv-hp-settings-ausgabe');
		submit_button();

	echo '</form>';
    }

    
    public static function addSettings() {
	
	add_settings_section('muv-hp-ausgabe', __('Auszugebende Seite', 'muv-hide-preview'),
		array(self::class, 'sectionAusgabeSeiteBeschreibung'), 'muv-hp-settings-ausgabe');

	add_settings_field('muv-hp-ausgabe-typ', __('Typ der Ausgabe', 'muv-hide-preview'),
		array(self::class, 'ausgabeTypHtml'), 'muv-hp-settings-ausgabe', 'muv-hp-ausgabe');
	register_setting('muv-hp-settings-ausgabe', 'muv-hp-ausgabe-typ', array(self::class, 'ausgabeTypValidate'));
    }

    
    public static function sectionAusgabeSeiteBeschreibung() {
	_e('Hier können Sie festlegen, was anstelle Ihrer zu versteckenden Bereiche angezeigt werden soll.', 'muv-hide-preview');
    }

    
    public static function ausgabeTypHtml() {
	$val = (int) (get_option('muv-hp-ausgabe-typ', DefaultSettings::AUSGABE_TYP));
	echo '<select name="muv-hp-ausgabe-typ">';
	echo '<option value="1"' . selected($val, 1) . '>' . __('Plugin-Seite', 'muv-hide-preview') . '</option>';
	echo '<option value="2"' . selected($val, 2) . '>' . __('Leere Seite', 'muv-hide-preview') . '</option>';

	echo '</select>';
    }
    
    
    public static function ausgabeTypValidate($wert) {
	$typ = (int) ($wert);
	if (empty($typ)) {
	    
	    $typ = DefaultSettings::AUSGABE_TYP;
	    add_settings_error('muv-hp-ausgabe-typ'
		    , 'muv-hp-ausgabe-typ'
		    , __('Bitte geben Sie den Typ der Ausgabe an.', 'muv-hide-preview'));
	}
	return $typ;
    }
}
