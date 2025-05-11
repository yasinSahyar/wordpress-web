<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <?php wp_head(); ?>
    </head>

    <body>

        <div class="container">
           <div class="row">
               <div class="col-xs-12">
                   <nav class="navbar navbar-default">
                     <div class="container-fluid">
                       <!-- Brand and toggle get grouped for better mobile display -->
                       <div class="navbar-header">
                         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                           <span class="sr-only">Toggle navigation</span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                         </button>

                         <!-- LOGO (Görsel olarak göster) -->
                         <a class="navbar-brand" href="<?php echo home_url(); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.jpg" alt="Site Logo" style="height: 50px;">
                         </a>
                       </div>

                       <!-- Navbar menu -->
                       <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                         <?php
                          wp_nav_menu(array(
                              'theme_location'=>'primary',
                              'container' => false,
                              'menu_class' => 'nav navbar-nav navbar-right'
                           ));
                          ?>
                       </div><!-- /.navbar-collapse -->
                     </div><!-- /.container-fluid -->
                   </nav>
               </div><!-- /.col -->
            </div><!-- /.row -->
