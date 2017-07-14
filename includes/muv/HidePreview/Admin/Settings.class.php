<?php

namespace muv\HidePreview\Admin;


defined('ABSPATH') OR exit;


class Settings {

    
    public static function init() {
		Settings\Hinweis::init();
	Settings\Verstecken::init();
	Settings\Freischalten::init();
	Settings\Ausgabe::init();
    }

    
    public static function handleSettings() {
	
	if (!current_user_can('manage_options')) {
	    wp_die(__('Sie haben nicht das Recht, diese Seite zu sehen!', 'muv-hide-preview'));
	}
	echo '<div class="wrap muv muv-hide-preview">';

	echo '<h1><i class="fa fa-fw fa-cog"></i> ' . __('Einstellungen', 'muv-hide-preview') . '</h1>';

	settings_errors();

	
	$activeTab = filter_input(INPUT_GET, 'tab');
	if (empty($activeTab)) {
	    $activeTab = 'hinweis';
	}

	

	echo '<h2 class="nav-tab-wrapper">';

	echo '<a href="?page=muv-hp-einstellungen&tab=hinweis" class="nav-tab ' . (($activeTab === 'hinweis') ? 'nav-tab-active' : '') . '">' .
		'<i class="fa fa-fw fa-info-circle"></i> ' . __('Hinweis', 'muv-hide-preview') .
		'</a>';

	echo '<a href="?page=muv-hp-einstellungen&tab=verstecken" class="nav-tab ' . (($activeTab === 'verstecken') ? 'nav-tab-active' : '') . '">' .
		'<i class="fa fa-fw fa-eye-slash"></i> ' . __('Verstecken', 'muv-hide-preview') .
		'</a>';

	echo '<a href="?page=muv-hp-einstellungen&tab=freischalten" class="nav-tab ' . (($activeTab === 'freischalten') ? 'nav-tab-active' : '') . '">' .
		'<i class="fa fa-fw fa-eye"></i> ' . __('Anzeige freischalten', 'muv-hide-preview') .
		'</a>';

	echo '<a href="?page=muv-hp-einstellungen&tab=ausgabe" class="nav-tab ' . (($activeTab === 'ausgabe') ? 'nav-tab-active' : '') . '">' .
		'<i class="fa fa-fw fa-desktop"></i> ' . __('Ausgabe', 'muv-hide-preview') .
		'</a>';

	echo '</h2>';

	
	switch ($activeTab) {
	    case 'hinweis': Settings\Hinweis::zeigeHinweis();
		break;
	    case 'verstecken': Settings\Verstecken::handleSettings();
		break;
	    case 'freischalten': Settings\Freischalten::handleSettings();
		break;
	    case 'ausgabe': Settings\Ausgabe::handleSettings();
		break;
	}

	echo '</div>';
    }

}
