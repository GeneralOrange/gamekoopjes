<?php
    $topbar = get_field('topbar', 'option');
    
    if($topbar['toggle']):
        ?>
        <div class="topbar">
            <p><?= strip_tags($topbar['content']); ?> <a class="button" href="<?= $topbar['button'] ? $topbar['button']['url'] : ''; ?>"><?= $topbar['button'] ? $topbar['button']['title']: ''; ?></a></p>
        </div>
        <?php
    endif;
?>
<nav id="site-navigation" class="main-navigation navbar navbar-expand-lg">
    <div class="overlay"></div>
    <div class="overlay_2"></div>
    <div class="container">

        <div class="site-branding <?= is_page_template('page-templates/landing-page.php') ? 'landing-branding' : '';?>">
            <?php
            /**
             * Include custom logo
             */
            echo get_logo();
            ?>
        </div><!-- .site-branding -->

        <!-- Brand and toggle get grouped for better mobile display -->
        <?php
            if(!is_page_template('page-templates/landing-page.php')): ?>
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
            endif;
        ?>
    </div><!-- .container -->
</nav><!-- #site-navigation -->