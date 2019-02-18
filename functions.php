<?php

if ( ! function_exists( 'bodukwpapi_bootstrap' ) ) {

	/**
	 * Initialize the plugin.
	 */
	function bodukwpapi_bootstrap() {

		load_plugin_textdomain( 'bodukwpapi', false, __DIR__ . '/languages' );

		// Register the bodukwpapi template
		bodukwpapi_add_template(
			'bodukwpapi-template.php',
			esc_html__( 'bodukwpapi', 'bodukwpapi' )
		);

		// Add our template(s) to the dropdown in the admin
		add_filter(
			'theme_page_templates',
			function ( array $templates ) {
				return array_merge( $templates, bodukwpapi_get_templates() );
			}
		);

		// Ensure our template is loaded on the front end
		add_filter(
			'template_include',
			function ( $template ) {

				if ( is_singular() ) {

					$assigned_template = get_post_meta( get_the_ID(), '_wp_page_template', true );

					if ( bodukwpapi_get_template( $assigned_template ) ) {

						if ( file_exists( $assigned_template ) ) {
							return $assigned_template;
						}

						$file = wp_normalize_path( plugin_dir_path( __FILE__ ) . '/templates/' . $assigned_template );

						if ( file_exists( $file ) ) {
							return $file;
						}
					}
				}

				return $template;

			}
		);

	}
}

if ( ! function_exists( 'bodukwpapi_get_templates' ) ) {

	/**
	 * Get all registered templates.
	 *
	 * @return array
	 */
	function bodukwpapi_get_templates() {
		return (array) apply_filters( 'bodukwpapi_templates', array() );
	}
}

if ( ! function_exists( 'bodukwpapi_get_template' ) ) {

	/**
	 * Get a registered template.
	 *
	 * @param string $file Template file/path
	 *
	 * @return string|null
	 */
	function bodukwpapi_get_template( $file ) {
		$templates = bodukwpapi_get_templates();

		return isset( $templates[ $file ] ) ? $templates[ $file ] : null;
	}
}

if ( ! function_exists( 'bodukwpapi_add_template' ) ) {

	/**
	 * Register a new template.
	 *
	 * @param string $file Template file/path
	 * @param string $label Label for the template
	 */
	function bodukwpapi_add_template( $file, $label ) {
		add_filter(
			'bodukwpapi_templates',
			function ( array $templates ) use ( $file, $label ) {
				$templates[ $file ] = $label;

				return $templates;
			}
		);
	}
}




