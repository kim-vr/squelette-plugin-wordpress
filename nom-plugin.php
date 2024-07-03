<?php 

/**
 *
 * Ce fichier est lu par WordPress afin de générer les informations du plugin dans le plugin 
 * admin area. Ce fichier implémente également toutes les dépendances utilisées par le plugin,
 * enregistre les fonctions d'activation et de désactivation du plugin, et définie une fonction
 * qui lance le plugin.
 *
 * @package           Nom_Plugin
 * @wordpress-plugin
 * Plugin Name:       Nom du plugin
 * Description:       Description du plugin
 * Version:           1.0.0
 * Author:            Autheur du plugin
 */

// Si ce fichier est directement appelé, abandonner.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// A renommer et à mettre à jour si de nouvelles versions sont créées (utiliser SemVer - https://semver.org)
define( 'NOM_PLUGIN_VERSION', '1.0.0' );

// Le code qui se lance à l'activation du plugin
function activate_nom_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/classe-nom-plugin-activator.php';
	Nom_Plugin_Activator::activate();
}

// Le code qui se lance à la désactivation du plugin

function deactivate_nom_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/classe-nom-plugin-deactivator.php';
	Nom_Plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_nom_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_nom_plugin' );

// La classe du contenu principal du plugin : définie l'internationnalisation,
// les hooks côté admin et hooks coté client 
require plugin_dir_path( __FILE__ ) . 'includes/classe-nom-plugin.php';

//Démarrer l'exécution du plugin
function run_nom_plugin(){

    $plugin = new Nom_Plugin();
    $plugin->run();

}
run_nom_plugin();