<?php
    $topbar = get_field('topbar', 'option');
    
    if($topbar):
        ?>
        <div class="topbar">
            <p><?= strip_tags($topbar['content']); ?> <a class="button" href="<?= $topbar['button']['url']; ?>"><?= $topbar['button']['title']; ?></a></p>
        </div>
        <?php
    endif;
?>
<nav id="site-navigation" class="main-navigation navbar navbar-expand-lg">
    <div class="overlay"></div>
    <div class="overlay_2"></div>
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