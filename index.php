<?php
// Main template file
get_header();
?>


    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <h1><?php echo get_the_title() ?></h1>

                    <main>
                        <?php
                            //Start the loop
                            if (have_posts()) :
                                while (have_posts()) :
                                    the_post();
                                    the_content();
                                endwhile;
                            endif;
                         ?>
                    </main>

            </div> 
        </div>
    </div>



<?php
get_footer();
?>
