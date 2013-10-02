<?php
/**
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
 * Source: http://digwp.com/2013/01/display-blog-posts-on-page-with-navigation/
 * Notes: Create pagination for posts on custom page templates. 
 * ----------------------------------------------------------------------------- */	

//store wp_query in a variable
$temp = $wp_query; $wp_query= null;

//set your parameters
$wp_query = new WP_Query(); $wp_query->query('showposts=5' . '&paged='.$paged);
while ($wp_query->have_posts()) : $wp_query->the_post();

//your content here

endwhile;

//Pagination conditional statements
if ($paged > 1) { ?>

<nav id="nav-posts" class="navigation-post">
	<div class="centered">
		<div class="prev"><?php next_posts_link('Previous'); ?></div>
		<div class="next"><?php previous_posts_link('Next'); ?></div>
	</div>
</nav>

<?php } else { ?>

<nav id="nav-posts" class="navigation-post">
	<div class="centered">
		<div class="prev"><?php next_posts_link('Previous'); ?></div>
	</div>
</nav>

<?php } wp_reset_postdata(); ?>







<?php
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
 
 
 
 
 
 
<?php // END //////////// ?>