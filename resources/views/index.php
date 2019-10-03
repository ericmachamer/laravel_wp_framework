<?php

// Load header/* template.
Hybrid\View\display( 'header', Hybrid\Template\hierarchy() );

// Load hero/* template.
Hybrid\View\display( 'hero', Hybrid\Template\hierarchy() );

// Set up body variables
$sidebar = false;
if(get_field('sidebar') === true) {
	$sidebar = true;
	$sidebar_position = get_field('sidebar_position', 'option');
	$sidebar_size = get_field('sidebar_size', 'option');
	$sidebar_mobile = get_field('sidebar_mobile', 'option');
}

// Set up body html.
?>
<section class="body">
	<div class="container">
		<div class="row">
			<article class="content col-12<?php if($sidebar === true) { ?> col-md-<?php echo 12-$sidebar_size; } ?>">
			<?php
				// Load content/* template.
				Hybrid\View\display( 'content', Hybrid\Template\hierarchy() );
			?>
			</article>
			<?php
				if($sidebar === true) {
			?>
			<aside class="sidebar<?php if($sidebar_mobile !== true) { ?> d-none d-md-block<?php } else { ?> col-12<?php } ?>col-md-<?php echo $sidebar_size; ?>">
				<?php
				// Load sidebar/* template.
				Hybrid\View\display( 'sidebar', Hybrid\Template\hierarchy() );
				?>
			</aside>
			<?php
				}
			?>
		</div>
	</div>
</section>
<?php

// Load footer/* template.
Hybrid\View\display( 'footer', Hybrid\Template\hierarchy() );
