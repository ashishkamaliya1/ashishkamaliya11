<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package alx_ventures
 */

get_header();
?>
<?php
if( have_rows('content') )
{
	while ( have_rows('content') ) : the_row();
    
		if(locate_template('blocks/' . get_row_layout() . '.php'))
		{
			get_template_part( 'blocks/'.get_row_layout().'', 'none' );
		}
		else{
			if( is_user_logged_in() ) {
				echo '<div class="container"><div class="col"><div class="p-3 mb-2 bg-danger text-white">The template /blocks/' .get_row_layout() . '.php does not exist</div></div></div>';
			}
		}
	endwhile;
}else{
	?>
<div class="container">
	<?php 	the_content(); ?>
</div>
<?php
	

}
?>
<?php 
// get_sidebar();
get_footer();
