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
			echo '<h3 class"title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
			echo '<p class="date">' . get_the_date('d F Y') . '</p>';
			echo '</div>';
		endwhile;
	endif;
	wp_reset_postdata();

}
add_shortcode('news_column', 'news_column_function');
?>