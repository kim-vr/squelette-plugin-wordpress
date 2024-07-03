<?php

/**
 * Enregistre tous les filters et actions pour ce plugin
 *
 * Liste de tous les hooks enregistrés dans le plugin 
 * et les enregistrer dans l'API WordPress. Appelle la fonction
 * run pour exécuter la liste d'actions et de filters.
 *
 * @package    Nom_Plugin
 * @subpackage Nom_Plugin/includes
 */


class Nom_Plugin_Loader {

    // Tableau des actions enregsitrés avec WordPress
    protected $actions;

    // Tableau des filters enregsitrés avec WordPress
    protected $filters;

    // Initialise la collection pour les actions et filters
    public function __construct() {

        $this->actions = array();
        $this->filters = array();

    }

    // Ajouter une nouvelle action à la collection
    public function add_action( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->actions = $this->add( $this->actions, $hook, $component, $callback, $priority, $accepted_args );
	}

    // Ajouter un nouveau filter à la collection
    public function add_filter( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->filters = $this->add( $this->filters, $hook, $component, $callback, $priority, $accepted_args );
	}

    // Une fonction utilitaire permettant d'enregistrer les hooks (actions & filters) dans une seule collection
    private function add( $hooks, $hook, $component, $callback, $priority, $accepted_args ) {

		$hooks[] = array(
			'hook'          => $hook,
			'component'     => $component,
			'callback'      => $callback,
			'priority'      => $priority,
			'accepted_args' => $accepted_args
		);

		return $hooks;

	}

    // Enregistrer les filters et actions avec WordPress
    public function run() {

		foreach ( $this->filters as $hook ) {
			add_filter( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}

		foreach ( $this->actions as $hook ) {
			add_action( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}

	}
}