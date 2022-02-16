<?php
get_header();
$s = $_GET['s'] ?? ' ';
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$query = new WP_Query([
    's'             => $s,
    'paged'         => $paged,
    'post_type'     => 'post',
    'post_per_page' => 8,
]);
$total_pages = $query->max_num_pages; ?>
<div class="content">
    <div class="search-page">
        <?php
        if ($query->have_posts())
            while ($query->have_posts()) : $query->the_post(); ?>
                <div class="posts">
                   <?php echo get_the_post_thumbnail() ?>
                    <a class="post-title" href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?? '' ?></a>
                </div>
            <?php endwhile; ?>
    </div>
</div>
<?php
$prev = '<img src=' . get_template_directory_uri(). '/assets/images/leftarrow.svg>';
$next = '<img src=' . get_template_directory_uri(). '/assets/images/rightarrow.svg>';
?>
<?php if ($total_pages > 1) {
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
 wp_reset_postdata();

get_footer(); ?>
