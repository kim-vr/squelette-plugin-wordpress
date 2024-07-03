<?php

class Nom_Plugin_Public {
    
    private $plugin_name;
    private $version;

    public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

    public function initialisation_shortcode() {
        add_shortcode('nom_shortcode', [$this, 'fonction_de_callback']);
    }

    public function fonction_de_callback() {
        //TODO
    }

    public function enqueue_scripts() {

        //TODO
        //wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/plugin-name-admin.js', array( 'jquery' ), $this->version, false );
	
    }

    public function enqueue_styles() {
        //TODO
        //wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/plugin-name-admin.css', array(), $this->version, 'all' );
	
    }


    
}