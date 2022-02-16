<?php
$blockField = get_fields('option');
?>

<footer class="footer">
    <div class="black-footer">
        <div class="footer-main">
            <span class="footer-bg"></span>
            <div class="footer-text">
                <h2 class="footer-title main-text"><?php echo $blockField['footer_title'] ?? ''; ?></h2>
                <p class="footer-description"><?php echo $blockField['footer_description'] ?? ''; ?></p>
            </div>
            <div class="footer-menu">
                <span class="footer-cat main-text"><?php _e('Kategorier') ?></span>
                <?php wp_nav_menu(['theme_location' => 'footer_menu']); ?>
            </div>
            <div class="footer-submenu">
                <span class="footer-links main-text"><?php _e('Linker') ?></span>
                <?php wp_nav_menu(['theme_location' => 'footer_submenu']); ?>
            </div>
            <div class="footer-image">
                <span class="footer-subtitle main-text"><?php echo $blockField['footer_subtitle'] ?? ''; ?></span>
                <?php echo wp_get_attachment_image($blockField['footer_image']['ID'] ?? '', 'full') ?>
            </div>
        </div>
        <div class="social-links">
            <?php
            if ($blockField) {
                foreach ($blockField['footer_social'] as $field) { ?>
                    <a href="<?php echo $field['social_link']['url'] ?>" class="soc-link"><?php echo wp_get_attachment_image($field['image_link']['ID'] ?? '', 'full') ?></a>
                <?php } } ?>
        </div>
    </div>
    <div class="footer-logo">
        <?php echo get_custom_logo(); ?>
        <span class="redactor"><?php echo $blockField['footer_redactor'] ?? ''; ?></span>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
