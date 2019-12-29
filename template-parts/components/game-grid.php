<?php

    $query = [
        'post_type' => 'games',
        'post_status' => 'publish',
        'posts_per_page' => 24,
        'orderby' => 'publish_date',
        'order' => 'DESC'
    ];

    $loop = new WP_Query($query);
?>
<div class="game-grid">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="game-grid__search">
                    <h2>Zoek een game</h2>
                    <input type="search" id="game_search">
                    <button class="search_button">
                        Zoek
                    </button>
                </div>
            </div>
            <?= get_games($loop->posts); ?>
        </div>
    </div>
</div>