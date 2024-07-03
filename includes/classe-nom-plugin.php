<?php

/**
 * La classe principale du plugin
 *
 * @since      1.0.0
 * @package    Nom_Plugin
 * @subpackage Nom_Plugin/includes
 */
class Nom_Plugin {

	protected $loader;
	protected $plugin_name;
	protected $version;

    //Définit les fonctionnalités principales du plugin
	public function __construct() {
		if ( defined( 'NOM_PLUGIN_VERSION' ) ) {
			$this->version = NOM_PLUGIN_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'nom-plugin';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

    /**
	 * Gère les différentes dépendances du plugin
	 * Inclut les fichiers qui forment ce plugin
	 * Instancie le loader qui va être utilisé pour enregistrer les hooks
	 */
    private function load_dependencies() {

		// Classe reponsable pour la gestion des actions et filters
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/classe-nom-plugin-loader.php';

		// Classe responsable de la fonctionnalité d'internationnalisation
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-plugin-name-i18n.php';

		// Classe reponsable de la définition des actions de la partie admin
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/classe-nom-plugin-admin.php';

		// Classe reponsable de la définition des actions de la partie client
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/classe-nom-plugin-public.php';

		$this->loader = new Nom_Plugin_Loader();

	}

    // Enregistre tous les hooks niveau admin
   private function define_admin_hooks() {

		$plugin_admin = new Nom_Plugin_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'creer_menu');

	}

	private function set_locale() {

		$plugin_i18n = new Nom_Plugin_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}


	// Enregistre tous les hooks niveau client
	private function define_public_hooks() {

		$plugin_public = new Nom_Plugin_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_styles', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		$this->loader->add_action( 'init', $plugin_public, 'initialisation_shortcode');

	}

    // Lance le loader pour exécuter les hooks avec WordPress
    public function run() {
		$this->loader->run();
	}

    // Nom du plugin
	public function get_plugin_name() {
		return $this->plugin_name;
	}

    // Reference à la classe qui gère les hooks
    public function get_loader() {
		return $this->loader;
	}

	// Version du plugin
	public function get_version() {
		return $this->version;
	}

}