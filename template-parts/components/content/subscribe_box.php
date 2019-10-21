<?php
//Get all subscribe box info
$image = get_field('subscribe_box_image_before');
$complete_image = get_field('subscribe_box_image_complete');
$title = get_field('subscribe_box_title');
$description = get_field('subscribe_box_description');

wp_localize_script('gamekoopjes-js', 'subscribe', [
    'complete' => $complete_image,
    'before' => $image
]);

?>
<div class="subscribe_box">
    <div class="container">
        <div class="subscribe_box__inner">
            <img class="lazyload img-fluid subscribe_box__image" data-src="<?= $image['url']?>" alt="">

            <div class="subscribe_box__content">
                <h3 class="subscribe_box__title"><?= $title?></h3>
                <?= $description; ?>

                <div class="subscribe_box_content__form">
                    <?php gravity_form( 1, false, false, false, '', false ); ?>
                </div>

            </div>
            


        </div>
    </div>
</div>