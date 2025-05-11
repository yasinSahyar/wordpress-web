<?php
/* Template Name: Home Page */
get_header(); 
?>

<div class="container-fluid p-0">
    <!-- Hero Section -->
    <div class="hero bg-dark text-white text-center py-5" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/aboutql.png'); background-size: cover; background-position: center;">
        <div class="container py-5" style="background: rgba(0,0,0,0.5);">
            <h1 class="display-4">Welcome to Our Company</h1>
            <p class="lead">We provide top-notch solutions tailored for your business.</p>
            <a href="/contact" class="btn btn-primary btn-lg mt-3">Get in Touch</a>
        </div>
    </div>

    <!-- About / Intro Section -->
    <div class="container my-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2>Who We Are</h2>
                <p>We are a growing small business dedicated to helping our clients thrive through innovative products and personalized service. Our team of experts is ready to support your goals.</p>
                <a href="/about-us" class="btn btn-outline-secondary">Learn More</a>
            </div>
            <div class="col-md-6">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/aboutql3.png" class="img-fluid rounded shadow" alt="About Us Image">
            </div>
        </div>
    </div>

    <!-- Featured Products or Services -->
    <div class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">Our Products</h2>
            <div class="row">
                <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 3
                );
                $products = new WP_Query($args);
                if ($products->have_posts()) :
                    while ($products->have_posts()) : $products->the_post(); ?>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('medium'); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?php the_title(); ?></h5>
                                    <p class="card-text"><?php echo wp_trim_words(get_the_content(), 15); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">View Product</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p class="text-center">No products available.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>

echo "<div style='color:red'>TEMPLATE WORKING</div>";
