<?php
get_header();
$blockField = get_fields();
$categoryName = get_the_category()[0]->name;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = [

    'posts_per_page' => 6,
    'post_type'      => 'post',
    'paged'          => $paged,
    'category_name'  => $categoryName,
];
$query = new WP_Query($args);
$total_pages = $query->max_num_pages; ?>
<div class="content">
    <div class="bread-crumb">
        <a href="<?php echo home_url() ?>"><?php _e('Hjem') ?></a>
        <span></span>
    </div>
    <div class="item-container">
        <?php if ($query->have_posts()) :
        while ($query->have_posts()) :
        $query->the_post();
        $color = get_field('cat_color', 'category_' . get_queried_object()->term_id); ?>
        <div class="item">

                <a  class="category-single-image" href="<?php echo get_the_permalink() ?>"><?php echo get_the_post_thumbnail() ?></a>
                <div class="category-text">
                    <a class="category-post-title" href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?? '' ?></a>
                      <p class="category-description"><?php echo get_the_excerpt() ?? ''; ?></p>
            <span class="category-post-cat" style="color: <?php echo $color ?? ''; ?>"><?php echo get_queried_object()->name ?? ''; ?></span>
        </div>
    </div>
        <?php
        endwhile;

        endif; ?>
</div>

</div>


<?php if ($total_pages > 1) {

    $prev = '<img src=' . get_template_directory_uri() . '/assets/images/leftarrow.svg>';
    $next = '<img src=' . get_template_directory_uri() . '/assets/images/rightarrow.svg>';

    if ($total_pages > 1) {
        $args = [
            'current'   => max(1, get_query_var('paged')),
            'total'     => $total_pages,
            'prev_text' => $prev,
            'next_text' => $next,
        ];
        ?>
        <div class="pagination-links">
            <?php echo paginate_links($args); ?>
        </div>

    <?php }
}
wp_reset_postdata();

get_footer();
?>



