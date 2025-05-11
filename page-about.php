<?php
/* Template Name: About Us Page */
get_header(); ?>

<div class="container my-5">
    <h1 class="mb-4">About Us</h1>
    
    <div class="row mb-5">
        <div class="col-md-6">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/aboutql.png" alt="About Image" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6">
            <h3>Our Mission</h3>
            <p>We are a small business committed to delivering quality products and services to our customers. With a team of passionate professionals, we aim to create value and build lasting relationships.</p>
            <h3>Our Vision</h3>
            <p>To become a trusted name in our industry by continuously improving and adapting to the needs of our clients.</p>
        </div>
    </div>

    <div class="team-section">
        <h2 class="mb-4">Meet the Team</h2>
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/aboutql1.png" class="img-fluid rounded-circle mb-2" style="width:150px;">
                <h5>John Doe</h5>
                <p>CEO & Founder</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/aboutql2.png" class="img-fluid rounded-circle mb-2" style="width:150px;">
                <h5>Jane Smith</h5>
                <p>Product Manager</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/aboutql3.png" class="img-fluid rounded-circle mb-2" style="width:150px;">
                <h5>Mark Johnson</h5>
                <p>Developer</p>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
