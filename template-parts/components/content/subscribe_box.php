<?php
//Get all subscribe box info
$image = get_field('subscribe_box_image_before');
$complete_image = get_field('subscribe_box_image_complete');
$title = get_field('subscribe_box_title');
$description = get_field('subscribe_box_desc');

wp_localize_script('gamekoopjes-js', 'subscribe', [
    'complete' => $complete_image,
    'before' => $image
]);

?>
<div class="subscribe_box">
    <div class="container">
        <div class="subscribe_box__inner">
            <img class="lazyload img-fluid subscribe_box__image" data-src="<?= $image['url']?>" alt="">

            <div>
                <h3 class="subscribe_box__title"><?= $title?></h3>
            </div>
            

            <?= $description; ?>

            <a class="subscribe_box__button" href="#">Inschrijven</a>
        </div>
    </div>
</div>