<?php
/*
Template Name:Simple page
*/
?>
<?php get_header(); ?>
<main class="simple-page">
    <div class="bread-crumb">
        <a href="<?php echo home_url() ?>"><?php _e('Hjem', 'golf') ?></a>
        <span></span>
    </div>
    <h2 class="simple-page-title"><?php  the_title() ?></h2>
    <section class="page-content">
        <?php
        while (have_posts()) :
            the_post();
            the_content();
        endwhile;
        ?>
    </section>
</main>
<?php get_footer(); ?>
