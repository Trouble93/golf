<?php

$fields = get_fields();
$args = [
    'posts_per_page' => 6,
    'post_type'      => 'post',
];

$query = new WP_Query($args);
$recentPosts = $fields['category_block']; ?>
<section class="category-block container">
    <h2 class="category-block-title"><?php echo($fields['category_title']) ?></h2>
    <div class="all-cat-block">
        <?php
        foreach ($recentPosts as $key => $value) {
        $color = get_field('cat_color', 'category_' . get_the_category($value)[0]->term_id); ?>
        <div class="block">

                <a href="<?php echo get_the_permalink($value) ?? '' ?>" class="category-post-image">  <?php echo get_the_post_thumbnail($value, 'full'); ?></a>
                <div class="category-post-text">
                    <a class="category-post-title" href="<?php echo get_the_permalink($value) ?? '' ?>">    <?php echo get_the_title($value) ?? '' ?></a>
            <p class="category-description"><?php echo get_the_excerpt($value) ?? '' ?></p>
            <a class="category-post-cat" href="<?php echo get_term_link((get_the_category($value)[0]->term_id)) ?>"
               style="color: <?php echo $color ?? ''; ?>"><?php echo get_the_category($value)[0]->name ?? '' ?></a>
        </div>
    </div>
    <?php
    } ?>
    </div>
    <a class="category-button-link" href="<?php echo get_term_link((get_the_category($value)[0]->term_id)) ?>">
        <?php echo $fields['category_button']; ?>
    </a>

</section>
