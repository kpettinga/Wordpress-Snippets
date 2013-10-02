<?php
/*
 * WORDPRESS SNIPPETS
 * A list of code snippets I find myself using in almost every wordpress theme
 * ----------------------------------------------------------------------------- */
 
 
 
 
 
 
/* SANITIZE STRINGS
 * Notes: strips a string of an extra characters and replaces spaces with '-'. Useful for converting strings into hash tags for links.
 * ----------------------------------------------------------------------------- */	

function sanitize($title) {
	$chacters = array('&','.',',','/',':',';','(',')','!','@','#','$','%','*','_','+','=','|','[',']','{','}');
	$title_clean = str_replace($chacters, '', strtolower(str_replace(' ', '-', $title)));
	echo $title_clean;
}






/* POST PAGINATION
 * Source: http://codex.wordpress.org/Function_Reference/paginate_links
 * Notes: Create pagination for posts (of any type) on custom page templates. 
 * ----------------------------------------------------------------------------- */	

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;	
$args = array(
	'post_type' => 'post',
	'posts_per_page' => 5,
	'paged' => $paged,
);
$the_query = new WP_Query( $args );

while ($the_query->have_posts()) : $the_query->the_post();
// content within the loop...
endwhile;

$big = 999999999; // need an unlikely integer
echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $the_query->max_num_pages
) );
wp_reset_postdata();






/* ADD GOOGLE ANALYTICS TO THE FOOTER
 * Source: http://digwp.com/2010/03/wordpress-functions-php-template-custom-functions/
 * Notes: First, obviously you want to replace the “UA-123456-1” with your actual GA code. Second, you may want to check out the three currently available Analytics options (http://perishablepress.com/press/2010/01/24/3-ways-track-google-analytics/) and modify the code accordingly. Currently, this function is using the newer “ga.js” tracking code, but that is easily changed to either of the other methods.
 * ----------------------------------------------------------------------------- */	

function add_google_analytics() {
	echo '<script src="http://www.google-analytics.com/ga.js" type="text/javascript"></script>';
	echo '<script type="text/javascript">';
	echo 'var pageTracker = _gat._getTracker("UA-XXXXX-X");';
	echo 'pageTracker._trackPageview();';
	echo '</script>';
}
add_action('wp_footer', 'add_google_analytics');

 
 
 
 
 
<?php /* END */ ?>