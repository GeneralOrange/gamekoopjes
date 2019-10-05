<nav id="site-navigation" class="main-navigation navbar navbar-expand-lg navbar-light">
    <div class="container">
        <div class="site-branding">
            <?php
            /**
             * Include custom logo
             */
            echo get_logo();
            ?>
        </div><!-- .site-branding -->
        <!-- Brand and toggle get grouped for better mobile display -->
        <button id="mobBtn" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger-menu"></div>	
        </button>
        <?php
        wp_nav_menu( array(
            'theme_location' => 'menu-1',
            'menu_id'        => 'primary-menu',
            'depth'            => 2, // 1 = no dropdowns, 2 = with dropdowns.
            'container'       => 'div',
            'container_class' => 'collapse navbar-collapse',
            'container_id'    => 'bs-example-navbar-collapse-1',
            'menu_class'      => 'navbar-nav ml-auto',
            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
            'walker'          => new WP_Bootstrap_Navwalker(),
        ) );
        ?>
    </div><!-- .container -->
</nav><!-- #site-navigation -->