<?php
$fields = get_fields();
$menuHeader = get_fields('option')

?>


<section class="main-bg container">
    <div class="home-menu">
        <div class="home-page-menu">
            <?php wp_nav_menu(['theme_location' => 'header_menu']); ?>
        </div>
        <div class="links-menu">
            <a class="skolen" href="#"><?php echo $field['skolen_link'] ?? '' ?></a>
            <a class="guiden" href="#"><?php echo $field['guiden_link'] ?? '' ?></a>
            <a class="box" href="#"><?php echo $field['box_link'] ?? '' ?></a>

        </div>
    </div>
    <div class="content-wrapper">
        <div class="posts-first">
            <?php
            foreach ($fields['first_block'] as $ID) {
            $color = get_field('cat_color', 'category_' . get_the_category($ID)[0]->term_id); ?>
            <div class="first-column">
                <a class="post-title-first" href="<?php echo get_the_permalink($ID) ?? '' ?>">
                    <div class="first-column-image">   <?php echo get_the_post_thumbnail($ID, 'full'); ?></div>
                    <div class="post-text1">
                    <?php echo get_the_title($ID) ?? '' ?></a>
                <p class="first-description"><?php echo get_the_excerpt($ID) ?? '' ?>       </p>
                <a class="category-post" href="<?php echo get_term_link((get_the_category($ID)[0]->term_id)) ?>"
                   style="color: <?php echo $color ?? ''; ?>"><?php echo get_the_category($ID)[0]->name ?? '' ?></a>
            </div>
        </div>
        <?php
        } ?>
    </div>
    <div class="posts-second">
        <?php
        if ($fields) {
        foreach ($fields['second_block'] as $ID) {

        $color = get_field('cat_color', 'category_' . get_the_category($ID)[0]->term_id); ?>
        <div class="second-column">
            <a class="post-title-second" href="<?php echo get_the_permalink($ID) ?? '' ?>">
                <div class="second-column-post-image"> <?php echo get_the_post_thumbnail($ID, 'full'); ?></div>
                <div class="post-text">
                <?php echo get_the_title($ID) ?? '' ?></a>
            <a class="category-post" href="<?php echo get_term_link((get_the_category($ID)[0]->term_id)) ?>"
               style="color: <?php echo $color ?? ''; ?>"><?php echo get_the_category($ID)[0]->name ?? '' ?></a>
        </div>
    </div>
    <?php }
    } ?>
    </div>
    <div class="posts-third">
        <h2 class="third-column-title"><?php echo $fields['third_column_title'] ?? '' ?></h2>
        <?php $number = $fields['posts']; ?>
        <?php $args = [
            'posts_per_page' => $number,
            'post_type'      => 'post',
            'orderby'        => 'date',
        ];

        $query = new WP_Query($args);

        if ($query->have_posts()) {
        while ($query->have_posts()) {
        $query->the_post(); ?>
        <div class="third-column-solopost">
            <a class="post-title-third" href="<?php the_permalink() ?>">
                <div class="third-column-image"><?php echo get_the_post_thumbnail(); ?></div>
                <div class="post-third-column-text">
                    <span class="post-date"><?php echo (the_time('H:i •') . get_the_date(' d. M')) ?? ''; ?></span>
                <?php the_title() ?></a>
        </div>
    </div>
<?php }
} else {
    echo 'No posts,found';
}
wp_reset_postdata();
?>

</section>


