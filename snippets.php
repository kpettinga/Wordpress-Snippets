<?php
/**
 * Wordpress Snippets
 * ------------------
 * A list of usefuu
 */
 
 
// SANITIZE STRINGS
// strips a string of an extra characters and replaces spaces with '-'. Useful for converting strings into hash tags for links.

function sanitize($title) {
	$chacters = array('&','.',',','/',':',';','(',')','!','@','#','$','%','*','_','+','=','|','[',']','{','}');
	$title_clean = str_replace($chacters, '', strtolower(str_replace(' ', '-', $title)));
	echo $title_clean;
}

 
?>