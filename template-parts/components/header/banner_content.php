<?php
//Get all banner options
$title = get_field('banner_title');
$subtitle = get_field('banner_subtitle');
$text = get_field('banner_text');
$button = get_field('banner_button');
$image = get_field('banner_image');

?>
<div class="banner_content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="page-title"><?= $title ? $title : get_the_title(); ?></h1>

                <?php if($subtitle): ?>
                    <h2 class="page-subtitle"><?= $subtitle ?></h2>
                <?php endif; ?>

                <?= $text ?>

                <a class="button" href="<?= $button['url']; ?>"><?= $button['title']; ?></a>
            </div>
            <div class="col-md-6 img_container">
                <img class="lazyload side-img img-fluid" data-src="<?= $image['url']?>">    
            </div>
        </div>
        

        
    </div>
</div>