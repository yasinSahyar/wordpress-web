<?php

// Set up
add_theme_support('menus');

// includes
include(get_template_directory() . '/includes/front/enqueue.php');
include(get_template_directory() . '/includes/setup.php');
include(get_template_directory() . '/includes/front/widgets.php');

// Action & Filter hooks
add_action('wp_enqueue_scripts', 'techco_enqueue');
add_action('after_setup_theme', 'techco_setup_theme');
add_action('widgets_init', 'techco_widgets');

// Shortcodes
// Force enable Custom Fields (if hidden by theme or block editor)
add_filter('acf/settings/remove_wp_meta_box', '__return_false');


// Register Custom Post Type: Product
function create_product_post_type() {
    $labels = array(
        'name'                  => _x('Products', 'Post Type General Name', 'techco'),
        'singular_name'         => _x('Product', 'Post Type Singular Name', 'techco'),
        'menu_name'             => __('Products', 'techco'),
        'name_admin_bar'        => __('Product', 'techco'),
        'add_new'               => __('Add New', 'techco'),
        'add_new_item'          => __('Add New Product', 'techco'),
        'edit_item'             => __('Edit Product', 'techco'),
        'new_item'              => __('New Product', 'techco'),
        'view_item'             => __('View Product', 'techco'),
        'all_items'             => __('All Products', 'techco'),
        'search_items'          => __('Search Products', 'techco'),
        'not_found'             => __('No products found', 'techco'),
        'not_found_in_trash'    => __('No products found in Trash', 'techco'),
    );

    $args = array(
        'label'                 => __('Product', 'techco'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'),
        'public'                => true,
        'has_archive'           => true,
        'rewrite'               => array('slug' => 'products'),
        'menu_icon'             => 'dashicons-cart', // WordPress icon
        'show_in_rest'          => true, // Gutenberg compatibility
    );

    register_post_type('product', $args);
}
add_action('init', 'create_product_post_type');


// functions.php dosyasına ekleyebilirsin
if (have_posts()) :
    while (have_posts()) : the_post();
        // Ürün başlığı
        the_title('<h1>', '</h1>');
        
        // Ürün resmi
        the_post_thumbnail();
        
        // Fiyat ve açıklamayı ekleyelim (ACF'den alınacak)
        $price = get_field('price');  // Fiyat alanı
        $description = get_field('description');  // Açıklama alanı

        if ($price) {
            echo '<p><strong>Price:</strong> $' . esc_html($price) . '</p>';
        }
        
        if ($description) {
            echo '<p>' . esc_html($description) . '</p>';
        }
    endwhile;
endif;


// Bootstrap CSS ve JS dosyalarını dahil et
function add_bootstrap_to_theme() {
    // Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');

    // Bootstrap JS
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'add_bootstrap_to_theme');



// AJAX handler – ürün filtrele
function ajax_filter_products() {
    $category = $_POST['category'];

    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
    );

    if (!empty($category)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_category',
                'field' => 'slug',
                'terms' => $category
            )
        );
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php the_title(); ?></h5>
                        <p><?php echo get_post_meta(get_the_ID(), 'price', true); ?> ₺</p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>
        <?php endwhile;
    else :
        echo '<p>No products found.</p>';
    endif;

    wp_die();
}
add_action('wp_ajax_filter_products', 'ajax_filter_products');
add_action('wp_ajax_nopriv_filter_products', 'ajax_filter_products');


// AJAX: İletişim formunu işleme
function handle_contact_form() {
    $name    = sanitize_text_field($_POST['name']);
    $email   = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);

    // İsteğe bağlı: Veritabanına kaydet (custom table de yapılabilir)
    wp_mail(get_option('admin_email'), 'New Contact Message', "From: $name <$email>\n\n$message");

    echo "Your message has been sent successfully!";
    wp_die();
}
add_action('wp_ajax_handle_contact_form', 'handle_contact_form');
add_action('wp_ajax_nopriv_handle_contact_form', 'handle_contact_form');
