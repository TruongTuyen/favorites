<?php namespace SimpleFavorites\Config;

use SimpleFavorites\Helpers;
use SimpleFavorites\Config\SettingsRepository;

/**
* Plugin Settings
*/
class Settings {

	/**
	* Settings Repository
	*/
	private $settings_repo;


	public function __construct()
	{
		$this->settings_repo = new SettingsRepository;
		add_action( 'admin_init', array( $this, 'registerSettings' ) );
		add_action( 'admin_menu', array( $this, 'registerSettingsPage' ) );
	}


	/**
	* Register the settings page
	*/
	public function registerSettingsPage()
	{
		add_options_page( 
			__('Simple Favorites Settings', 'simplefavorites'),
			__('Simple Favorites', 'simplefavorites'),
			'manage_options',
			'simple-favorites', 
			array( $this, 'settingsPage' ) 
		);
	}


	/**
	* Display the Settings Page
	* Callback for registerSettingsPage method
	*/
	public function settingsPage()
	{
		$tab = ( isset($_GET['tab']) ) ? $_GET['tab'] : 'general';
		include( Helpers::view('settings/settings') );
	}


	/**
	* Register the settings
	*/
	public function registerSettings()
	{
		register_setting( 'simple-favorites-general', 'simplefavorites_dependencies' );
	}


}