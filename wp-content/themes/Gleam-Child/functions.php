<?php
/* News Column shortcode */
function news_column_function( $atts ) {
	extract(shortcode_atts(array(
		'category' => '',
		'count' => '',
	), $atts));

	if (empty($count)) $count = -1;
	$args = array('category__in' => $category, 'posts_per_page' => $count);
	$news_column_query = new WP_Query($args);
	if ($news_column_query->have_posts()) :
		while ($news_column_query->have_posts()) : $news_column_query->the_post();
			echo '<div class="news-column-item">';
			echo '<h3 class="title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
			echo '<p class="date">' . get_the_date('d F Y') . '</p>';
			echo '</div>';
		endwhile;
	endif;
	wp_reset_postdata();

}
add_shortcode('news_column', 'news_column_function');

/**
 * Removes the faulty 'modules.ttf' preload added by the Gleam parent theme
 * using the wp_head hook, which causes the "preloaded but not used" warning.
 */
function gleam_child_remove_preload_action() {
    // The preload function is 'et_preload_fonts' and it is hooked to 'wp_head'.
    // We remove the action here. The priority is assumed to be 10 (default),
    // but often functions are loaded with 1, 5 or 10. Let's try 10 first.
    remove_action( 'wp_head', 'et_preload_fonts' );
}
// We must hook into an action that runs *after* the parent theme's 'add_action'.
// We use a high priority on the 'after_setup_theme' hook to ensure execution order.
add_action( 'after_setup_theme', 'gleam_child_remove_preload_action', 20 );


function gleam_child_enqueue_bug_fix_script() {
    wp_enqueue_script(
        'gleam-child-fix',
        get_stylesheet_directory_uri() . '/js/child-custom.js',
        array( 'jquery', 'jquery-address', 'custom-script' ),
        '1.5',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'gleam_child_enqueue_bug_fix_script', 20 );


// Since the preload function is wrapped in `if ( ! function_exists( 'et_preload_fonts' ) )`,
// we can also disable it entirely by redefining it with an empty function.
// This is a robust way to ensure it never runs, regardless of the hook:

if ( ! function_exists( 'et_preload_fonts' ) ) {
    function et_preload_fonts() {
        // Function is intentionally empty to disable the parent theme's code.
    }
}



?>
