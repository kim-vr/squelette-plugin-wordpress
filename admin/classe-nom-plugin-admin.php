<?php


/**
 * Gestion des appareils côté admin
 *
 * Définit le nom du plugin, la version, et des exemples de hooks pour
 * "enqueue" le css et javascript au plugin côté admin.
 *
 * @package    Nom_Plugin
 * @subpackage Nom_Plugin/admin
 */

 class Nom_Plugin_Admin {

    private $plugin_name;
    private $version;

    public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

    public function creer_menu(){
        add_menu_page(
            'Titre', //Titre de la page
            'Menu', //Texte du menu
            'manage_options', //Capacité requise
            'page-appelee', //Slug de la page
            [$this, 'fonction_callback'] //Fonction de rappel 
        );
    }

    function fonction_callback() {
        //TODO
    }

    // Enregistrer la stylesheet pour le côté admin 
    // Seulement un exemple
    // Une instance de cette classe doit être définie dans Gestion_Appareils_Loader puisque
    // tous les hooks sont définis dans cette classe
    // Gestion_Appareils_Loader va ensuite créer la relation entre les hooks définis et les fonctions définis dans cette classe
    public function enqueue_styles() {
        //TODO
        //wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/plugin-name-admin.css', array(), $this->version, 'all' );
	
    }

    // Enregistrer le Javascript pour le côté admin 
    // Seulement un exemple
    // Une instance de cette classe doit être définie dans Gestion_Appareils_Loader puisque
    // tous les hooks sont définis dans cette classe
    // Gestion_Appareils_Loader va ensuite créer la relation entre les hooks définis et les fonctions définis dans cette classe
    public function enqueue_scripts() {

        //TODO
        //wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/plugin-name-admin.js', array( 'jquery' ), $this->version, false );
	
    }

 }