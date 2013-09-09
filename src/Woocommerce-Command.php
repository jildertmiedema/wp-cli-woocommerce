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
	 * @synopsis 
	 */
	function install( $args, $assoc_args ) {
		if (!is_plugin_active ( 'woocommerce/woocommerce.php') ){
			WP_CLI::error('Woocommerce is not installed');
		}

		if (get_option('_wc_needs_pages')) {

			require_once(WP_PLUGIN_DIR. '/woocommerce/admin/woocommerce-admin-install.php' );
			woocommerce_create_pages();

			delete_option( '_wc_needs_pages' );
			delete_transient( '_wc_activation_redirect' );

			WP_CLI::success( "Installed woocommerce" );
		} else {
			WP_CLI::warning( 'Woocommerce already seems to be installed');
		}
	}
}

WP_CLI::add_command( 'woocommerce', 'Woocommerce_Command' );
