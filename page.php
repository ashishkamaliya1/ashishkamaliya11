https://limewire.com/d/uaVxz#NRL958JR4E

https://www.youtube.com/watch?v=qDLePOI9LI0



<?php add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 50);

function iconic_cart_count_fragments( $fragments ) {
    ob_start();
    $fragments['div.zi-mini-cart'] ='<div class="zi-mini-cart">';
    if(WC()->cart->get_cart_contents_count() != 0){
        $fragments['div.zi-mini-cart'] .= '<div class="cart-count">cart<strong>('. WC()->cart->get_cart_contents_count().')</strong></div>';
    }else{
        $fragments['div.zi-mini-cart'] .= '<div class="cart-count">cart<strong>(0)</strong></div>';
    }
    $fragments['div.zi-mini-cart'] .= '</div>';
    return $fragments;
    ob_get_clean();
	https://limewire.com/d/yt9iA#hv97wJwngj
}
https://limewire.com/d/yt9iA#hv97wJwngj
function enqueue_wc_cart_fragments() { 
    wp_enqueue_script( 'wc-cart-fragments' ); 
}
add_action( 'wp_enqueue_scripts', 'enqueue_wc_cart_fragments' );
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
	<div class="zi-mini-cart">
                            <?php 
                                        $pcount = WC()->cart->get_cart_contents_count(); 
                                        if($pcount > 0) { ?>    
                                            <div class="cart-count rrrrr"><p>cart</p> (<strong> <?php echo WC()->cart->get_cart_contents_count(); ?> </strong>) </div>
                                            
                                        <?php }else{?>
                                            <div class="cart-count ffff"> <p>cart</p> <strong>(0)</strong></div>
                                        <?php } ?>
                                        </div>

}
?>
<?php 
// get_sidebar();
get_footer();
