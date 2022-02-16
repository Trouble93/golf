<?php
$blockField = get_fields();
$rowPosts = $blockField['row_posts_post'];
?>
<section class="row-posts container">
    <?php $number = $blockField['row_posts_number'];
    ?>
    <?php
    foreach ($rowPosts as $key => $value) {
        if ($key < $number) {
            ?>
            <div class="row-posts-post">

                <a href="<?php echo get_the_permalink($value) ?? '' ?>" class="row-posts-image"><?php echo get_the_post_thumbnail($value); ?></a>
                <div class="row-posts-text">
                    <a class="row-posts-title" href="<?php echo get_the_permalink($value) ?? '' ?>"> <?php echo get_the_title($value) ?? '' ?></a>
                    <?php
                    $color = get_field('cat_color', 'category_' . get_the_category($value)[0]->term_id); ?>
                    <a class="category-row-posts" href="<?php echo get_term_link((get_the_category($value)[0]->term_id)) ?>"
                       style="color: <?php echo $color ?? ''; ?>"><?php echo get_the_category($value)[0]->name ?? '' ?></a>
                </div>
            </div>
        <?php } }
    ?>

</section>
