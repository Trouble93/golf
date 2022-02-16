<?php
$blockField = get_fields();
?>
<section class="container">
    <div class="big-post" >
    <?php
    if ($blockField) {
        foreach ($blockField['big_post'] as $ID) {
            $color = get_field('cat_color', 'category_' . get_the_category($ID)[0]->term_id); ?>
            <a class="big-post-title" href="<?php echo get_the_permalink($ID) ?? '' ?>">
                <div class="big-post-image">   <?php echo get_the_post_thumbnail($ID, 'full'); ?></div>
            <div class="big-post-text">
               <?php echo get_the_title($ID) ?? '' ?></a>
                <p class="big-post-description"><?php echo get_the_excerpt($ID) ?? '' ?>       </p>
                <a class="big-post-category" href="<?php echo get_term_link((get_the_category($ID)[0]->term_id)) ?>"
                   style="color: <?php echo $color ?? ''; ?>"><?php echo get_the_category($ID)[0]->name ?? '' ?></a>


        <?php } } ?>
    </div>
</section>

