<?php
/**
 * Implements example command.
 */
class Woocommerce_Command extends WP_CLI_Command {

	/**
	 * Runs the "install woocommerce pages"
	 * 
	 * ## OPTIONS
	 * 
	 * 
	 * ## EXAMPLES
	 * 
	 *     wp woocommerce install
	 *
	 * @synopsis <name>
	 */
	function install( $args, $assoc_args ) {
		list( $name ) = $args;

		// Print a success message
		WP_CLI::success( "Hello, $name!" );
	}
}

WP_CLI::add_command( 'woocommerce', 'Woocommerce_Command' );