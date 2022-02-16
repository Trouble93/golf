<?php
global $post;

get_header();
$fields = get_fields();
$recentAuthor = get_user_by('ID', $post->post_author);
$authorDisplayName = $recentAuthor->display_name;
$postId = $post->ID;
$categoryName = (get_the_category($postId)[0]->name);
$categoryLink = get_category_link(get_the_category($postId)[0]->term_id);
?>
<main class="single-page-content">

    <div class="bread-crumb">
        <a href="<?php echo home_url() ?>"><?php _e('Hjem') ?></a>
        <span></span>
        <a href="<?php echo $categoryLink ?>"><?php echo $categoryName ?></a>
        <a href="<?php echo get_the_permalink($postId) ?>"><?php echo $post->post_title ?></a>
    </div>
    <div class="all-columns">
        <div class="single-main-content">
            <div class="single-post">
                <h2 class="single-post-title"><?php echo $post->post_title ?></h2>
                <p class="single-post-description"><?php echo $post->post_excerpt ?></p>
                <div class="author-published">
                    <span class="author"><?php _e('Av: ', 'golf');
                        echo $authorDisplayName ?></span>
                    <span class="published"><?php _e('Publisert: ' , 'golf');
                        echo $post->post_date ?></span>
                </div>
                <span class="single-post-image"><?php echo get_the_post_thumbnail() ?></span>
                <p class="single-image-caption"><?php echo get_the_post_thumbnail_caption($postId) ?></p>
            </div>
            <div class="single-post-auto">
                <?php the_content(); ?>
                <div class="single-posts-links">
                    <span><?php _e('Del denne', 'golf') ?></span>
                    <div class="single-links-images">
                        <a class="twitter-single-post" href="#"></a>
                        <a class="mail-single-post" href="#"></a>
                        <a class="facebook-single-post" href="#"></a>
                    </div>
                </div>
            </div>

        </div>
        <div class="single-second-column">
            <h2 class="single-second-column-title"><?php echo $fields['second_column_title'] ?? '' ?></h2>

            <?php $args = [
                'posts_per_page' => 7,
                'post_type'      => 'post',
                'orderby'        => 'date',
            ];

            $query = new WP_Query($args);
            ?>
            <?php
            if ($query->have_posts()) {
            while ($query->have_posts()) {
            $query->the_post(); ?>
            <div class="single-second-column-post">
                <a class="single-second-column-post-title" href="<?php echo get_the_permalink() ?? '' ?>">
                    <span class="single-second-column-image"><?php echo get_the_post_thumbnail(); ?></span>
                    <div class="single-second-column-text">
                        <span class="single-post-date"><?php echo (the_time('H:i •') . get_the_date(' d. M')) ?? ''; ?></span>
                    <?php echo $post->post_title ?></a>
            </div>
        </div>
        <?php }
        } else {
            _e('No posts,found', 'golf');
        }

        wp_reset_postdata();
        ?>

        <div class="posts-third">
            <?php $args = [
                'posts_per_page' => 3,
                'category_name'  => $categoryLink,
                'post_type'      => 'post',
                'orderby'        => 'date',

            ];
            $query = new WP_Query($args);
            if ($query->have_posts()) {
            while ($query->have_posts()) {
            $color = get_field('cat_color', 'category_' . get_the_category($postId)[0]->term_id);
            $query->the_post(); ?>
            <div class="single-third-column-solopost">
                <a class="single-post-title-third" href="<?php echo get_the_permalink() ?? '' ?>">
                    <span class="single-third-column-image"><?php echo get_the_post_thumbnail(); ?></span>
                    <div class="post-third-column-text">
                    <?php echo $post->post_title ?></a>
                <a class="category-post-title-third" href="<?php echo $categoryLink ?>"
                   style="color: <?php echo $color ?? ''; ?>"><?php echo $categoryName ?></a>
            </div>
        </div>
    <?php }
    } else {
        _e('No posts,found', 'golf');
    }

    wp_reset_postdata();
    ?>
    </div>
    </div>


</main>
<div class="single-post-container">
    <h2 class="category-main-title"><?php echo $categoryName ?></h2>
    <div class="single-post-category-content">
        <?php


        $recentPosts = get_posts([
            'posts_per_page' => 6,
            'category_name'  => $categoryLink,
            'post_type'      => 'post',
        ]);

        foreach ($recentPosts as $post) {
            setup_postdata($post);

            $color = get_field('cat_color', 'category_' . get_the_category($post)[0]->term_id);
            ?>

            <div class="single-post-category-block">
                <span class="single-post-category-image"><?php echo get_the_post_thumbnail() ?></span>
                <div class="category-text">
                    <a class="single-post-category-title" href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a>
                    <span class="single-post-category-description"><?php echo $post->post_excerpt ?></span>
                    <a class="category-post-cat" href="<?php echo get_term_link((get_the_category($postId)[0]->term_id)) ?>"
                       style="color: <?php echo $color ?? ''; ?>"><?php echo $categoryName ?></a>
                </div>
            </div>

            <?php
        }
        wp_reset_postdata();
        ?>
    </div>
    <a class="category-button-link" href="<?php echo get_term_link((get_the_category($postId)[0]->term_id)) ?>">
        <?php _e('Gå til', 'golf') ?><?php echo $categoryName;
        ?>
    </a>
</div>
<?php get_footer(); ?>
