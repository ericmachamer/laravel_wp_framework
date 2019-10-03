<?php
/**
 * Template tags.
 *
 * This file holds template tags for the theme. Template tags are PHP functions
 * meant for use within theme templates.
 *
 * @package   TheeTheme
 * @author    TheeDigital <admin@theedigital.com>
 * @copyright 2018 TheeDigital
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://theedigital.com
 */

namespace TheeTheme;

/**
 * Adds ability to add templates
 **/
add_action( 'hybrid/templates/register', function( $templates ) {
	/**
	 * Add template sample.
	 */
	$templates->add(
		'home.php', //relative to views
		[
			'label'      => __( 'Home' ),
			'post_types' => [ 'page' ]
		]
	);
} );

/**
 * Returns the metadata separator.
 *
 * @since  1.0.0
 * @access public
 * @param  string  $sep  String to separate metadata.
 * @return string
 */
function sep( $sep = '' ) {

	return apply_filters(
		'TheeTheme/sep',
		sprintf(
			' <span class="sep">%s</span> ',
			$sep ?: esc_html_x( '&middot;', 'meta separator', 'TheeTheme' )
		)
	);
}
