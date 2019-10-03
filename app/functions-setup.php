<?php
/**
 * Theme setup functions.
 *
 * This file holds basic theme setup functions executed on appropriate hooks
 * with some opinionated priorities based on theme dev, particularly working
 * with child theme devs/users, over the years. I've also decided to use
 * anonymous functions to keep these from being easily unhooked. WordPress has
 * an appropriate API for unregistering, removing, or modifying all of the
 * things in this file. Those APIs should be used instead of attempting to use
 * `remove_action()`.
 *
 * @package   TheeTheme
 * @author    TheeDigital <admin@theedigital.com>
 * @copyright 2018 TheeDigital
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://theedigital.com
 */

namespace TheeTheme;

/**
 * Set up theme support.  This is where calls to `add_theme_support()` happen.
 *
 * @link   https://developer.wordpress.org/reference/functions/add_theme_support/
 * @link   https://developer.wordpress.org/themes/basics/theme-functions/
 * @link   https://developer.wordpress.org/reference/functions/load_theme_textdomain/
 * @link   https://github.com/WordPress/gutenberg/blob/master/docs/extensibility/theme-support.md
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'after_setup_theme', function() {

	// Sets the theme content width. This variable is also set in the
	// `resources/scss/settings/_dimensions.scss` file.
	$GLOBALS['content_width'] = 750;

	// Load theme translations.
	load_theme_textdomain( 'TheeTheme', get_parent_theme_file_path( 'resources/lang' ) );

	// Automatically add the `<title>` tag.
	add_theme_support( 'title-tag' );

	// Automatically add feed links to `<head>`.
	add_theme_support( 'automatic-feed-links' );

	// Adds featured image support.
	add_theme_support( 'post-thumbnails' );

	// Add selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Wide and full alignment. The styles for alignment is housed in the
	// `resources/scss/utilities/_alignment.scss` file.
	add_theme_support( 'align-wide' );

	// Outputs HTML5 markup for core features.
	add_theme_support( 'html5', [
		'caption',
		'comment-form',
		'comment-list',
		'gallery',
		'search-form'
	] );

	// Add custom logo support.
	add_theme_support( 'custom-logo', [
		'width'       => null,
		'height'      => null,
		'flex-width'  => null,
		'flex-height' => false,
		'header-text' => ''
	] );

	// Editor color palette. These colors are also defined in the
	// `resources/scss/settings/_colors.scss` file.
	add_theme_support( 'editor-color-palette', [
		[
			'name'  => __( 'Charcoal', 'TheeTheme' ),
			'slug'  => 'charcoal',
			'color' => '#282c34'
		],
		[
			'name'  => __( 'Regent', 'TheeTheme' ),
			'slug'  => 'regent',
			'color' => '#8c97a7',
		],
		[
			'name'  => __( 'Husk', 'TheeTheme' ),
			'slug'  => 'husk',
			'color' => '#B9A364',
		],
		[
			'name'  => __( 'Red Stage', 'TheeTheme' ),
			'slug'  => 'red-stage',
			'color' => '#b15330',
		]
	] );

	// Editor block font sizes. These font sizes are also defined in the
	// `resources/scss/settings/_fonts.scss` file.
	add_theme_support( 'editor-font-sizes', [
		[
			'name'      => __( 'Small', 'TheeTheme' ),
			'shortName' => __( 'S', 'TheeTheme' ),
			'size'      => 12,
			'slug'      => 'small'
		],
		[
			'name'      => __( 'Regular', 'TheeTheme' ),
			'shortName' => __( 'M', 'TheeTheme' ),
			'size'      => 16,
			'slug'      => 'regular'
		],
		[
			'name'      => __( 'Large', 'TheeTheme' ),
			'shortName' => __( 'L', 'TheeTheme' ),
			'size'      => 36,
			'slug'      => 'large'
		],
		[
			'name'      => __( 'Larger', 'TheeTheme' ),
			'shortName' => __( 'XL', 'TheeTheme' ),
			'size'      => 48,
			'slug'      => 'larger'
		]
	] );

}, 5 );

/**
 * Adds support for the custom background feature. This is in its own function
 * hooked to `after_setup_theme` so that we can give it a later priority.  This
 * is so that child themes can more easily overwrite this feature.  Note that
 * overwriting the background should be done *before* rather than after.
 *
 * @link   https://developer.wordpress.org/reference/functions/add_theme_support/#custom-background
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'after_setup_theme', function() {

	add_theme_support( 'custom-background', [
		'default-image'          => '',
		'default-preset'         => 'default',
		'default-position-x'     => 'left',
		'default-position-y'     => 'top',
		'default-size'           => 'auto',
		'default-repeat'         => 'repeat',
		'default-attachment'     => 'scroll',
		'default-color'          => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	] );

}, 15 );

/**
 * Adds support for the custom header feature. This is in its own function
 * hooked to `after_setup_theme` so that we can give it a later priority.  This
 * is so that child themes can more easily overwrite this feature.  Note that
 * overwriting the header should be done *before* rather than after.
 *
 * @link   https://developer.wordpress.org/reference/functions/add_theme_support/#custom-header
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'after_setup_theme', function() {

	add_theme_support( 'custom-header', [
		'default-image'          => '',
		'random-default'         => false,
		'width'                  => 750,
		'height'                 => 422,
		'flex-height'            => false,
		'flex-width'             => false,
		'default-text-color'     => '',
		'header-text'            => true,
		'uploads'                => true,
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
		'video'                  => false,
		'video-active-callback'  => 'is_front_page'
	] );

}, 15 );

/**
 * Register menus.
 *
 * @link   https://developer.wordpress.org/reference/functions/register_nav_menus/
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'init', function() {

	register_nav_menus( [
		'primary' => esc_html_x( 'Primary', 'nav menu location', 'TheeTheme' )
	] );

}, 5 );

/**
 * Register image sizes. Even if adding no custom image sizes or not adding
 * "thumbnails," it's still important to call `set_post_thumbnail_size()` so
 * that plugins that utilize the `post-thumbnail` size will have a properly-sized
 * thumbnail that matches the theme design.
 *
 * @link   https://developer.wordpress.org/reference/functions/set_post_thumbnail_size/
 * @link   https://developer.wordpress.org/reference/functions/add_image_size/
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'init', function() {

	// Set the `post-thumbnail` size.
	set_post_thumbnail_size( 178, 100, true );

	// Register custom image sizes.
	add_image_size( 'TheeTheme-medium', 750, 422, true );

}, 5 );

/**
 * Register sidebars.
 *
 * @link   https://developer.wordpress.org/reference/functions/register_sidebar/
 * @link   https://developer.wordpress.org/reference/functions/register_sidebars/
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'widgets_init', function() {

	$args = [
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget__title">',
		'after_title'   => '</h3>'
	];

	register_sidebar( [
		'id'   => 'primary',
		'name' => esc_html_x( 'Primary', 'sidebar', 'TheeTheme' )
	] + $args );

}, 5 );

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once 'providers/class-tgm-plugin-activation.php';

/**
 * Register the required/recommended plugins for this theme
 */
add_action( 'tgmpa_register', function() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'		=> 'Advanced Custom Fields PRO',
			'slug'		=> 'advanced-custom-fields-pro',
			'source'	=> 'http://connect.advancedcustomfields.com/index.php?p=pro&a=download&k=b3JkZXJfaWQ9MzM0MjB8dHlwZT1kZXZlbG9wZXJ8ZGF0ZT0yMDE0LTA3LTA4IDAxOjM1OjQ4',
			'required'	=> true
		),
		array(
			'name'		=> 'Advanced Custom Fields: Font Awesome Field',
			'slug'		=> 'advanced-custom-fields-font-awesome',
			'required'	=> true
		),
		array(
			'name'      => 'Advanced Custom Fields: Gravityforms Add-on',
			'slug'      => 'acf-gravityforms-add-on',
			'required'  => true
		),
		array(
			'name'		=> 'Yoast SEO',
			'slug'		=> 'wordpress-seo',
			'required'	=> true
		),
		array(
			'name'		=> 'Regenerate Thumbnails',
			'slug'		=> 'regenerate-thumbnails',
			'required'	=> false
		),
		array(
			'name'		=> 'reSmush.it Image Optimizer',
			'slug'		=> 'resmushit-image-optimizer',
			'required'	=> false
		),
		array(
			'name'		=> 'Gravity Forms',
			'slug'		=> 'gravity-forms',
			'source'	=> 'https://s3.amazonaws.com/gravityforms/releases/gravityforms_2.4.14.zip?AWSAccessKeyId=AKIAJC3LQNDWHBOFBQIA&Signature=iBglS1kuqsBZHMK8B%2FEZ%2FAcvXrQ%3D',
			'required'	=> true
		),
		array(
			'name'		=> 'Toolbar Publish Button',
			'slug'		=> 'toolbar-publish-button',
			'required'	=> false
		),
		array(
			'name'		=> 'User Role Editor',
			'slug'		=> 'user-role-editor',
			'required'	=> false
		)
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 */
	$config = array(
		'id'           => 'thee-tgmpa',             // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                    // Automatically activate plugins after installation or not.
		'message'      => ''         			   // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}, 5);
