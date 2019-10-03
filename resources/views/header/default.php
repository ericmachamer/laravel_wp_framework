<!DOCTYPE html>
<html <?php Hybrid\Attr\display( 'html' ) ?>>

<head>
<?php wp_head() ?>
</head>

<body <?php Hybrid\Attr\display( 'body' ) ?>>

<div class="app">

	<header class="app-header">
		<div class="container">
			<div class="row">
				<div class="col-5">
					<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'TheeTheme' ) ?></a>

					<div class="app-header__branding">
						<?php the_custom_logo() ?>
					</div>
				</div>
				<div class="col-7">
					<?php Hybrid\View\display( 'nav/menu', 'primary', [ 'location' => 'primary' ] ) ?>
				</div>
			</div>
		</div>
	</header>
