/********* Archive.product.php ************/
<form id="filter">
  <select name="category" id="category">
    <option value="">Select Category</option>
    <?php
    $terms = get_terms( 'product_cat' ); // WooCommerce product categories
    foreach ( $terms as $term ) :
      echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
    endforeach;
    ?>
  </select>

  <select name="price" id="price">
    <option value="">Select Price</option>
    <option value="0-50">0 - 50</option>
    <option value="51-100">51 - 100</option>
    <option value="101-150">101 - 150</option>
  </select>

  <button type="submit">Filter</button>
</form>
<div id="response"></div> <!-- This is where the filtered products will be loaded -->

/**********function.php **********/
function enqueue_filter_script() {
    wp_enqueue_script('ajax-filter', get_template_directory_uri() . '/js/ajax-filter.js', array('jquery'), null, true);
    wp_localize_script('ajax-filter', 'ajax_url', array('url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'enqueue_filter_script');

/********** ajax-filter.js ********/
jQuery(function($){
    $('#filter').submit(function(){
        var filter = $('#filter');
        $.ajax({
            url: ajax_url.url, // WordPress AJAX URL
            data: filter.serialize(), // Serialize the form data
            type: 'POST',
            success:function(data){
                $('#response').html(data); // Load the filtered products
            }
        });
        return false;
    });
});


/***************** function.php ********************/
function filter_products() {
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1
    );

    if( isset($_POST['category']) && $_POST['category'] != '' ) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => $_POST['category']
            )
        );
    }

    if( isset($_POST['price']) && $_POST['price'] != '' ) {
        $price_range = explode('-', $_POST['price']);
        $args['meta_query'] = array(
            array(
                'key' => '_price',
                'value' => $price_range,
                'compare' => 'BETWEEN',
                'type' => 'NUMERIC'
            )
        );
    }

    $query = new WP_Query($args);
    if ( $query->have_posts() ) :
        while ( $query->have_posts() ): $query->the_post();
            wc_get_template_part('content', 'product'); // Use WooCommerce template for displaying products
        endwhile;
    else :
        echo 'No products found';
    endif;
    wp_die();
}
add_action('wp_ajax_filter_products', 'filter_products');
add_action('wp_ajax_nopriv_filter_products', 'filter_products');
