<?php
/*
Template Name:Home page
*/

?>
<?php get_header();
$fieldBlock = get_fields();
?>
<main class="content">
    <?php
    while (have_posts()) :
        the_post();
        the_content();
    endwhile;
    ?>
</main>
<?php get_footer(); ?>
