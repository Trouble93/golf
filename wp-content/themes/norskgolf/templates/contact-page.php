<?php
/*
Template Name:Contact page
*/

?>
<?php get_header();
$fields = get_fields();
?>
<div class="contact-page">
    <div class="bread-crumb">
        <a href="<?php echo home_url() ?>"><?php _e('Hjem', 'golf') ?></a>
        <span></span>
        <a href="<?php echo get_page_link() ?>"><?php echo $fields['contact_title'] ?? ''; ?></a>
    </div>
    <div class="contact-container">
        <div class="contact-address">
            <h2 class="contact-title"><?php echo $fields['contact_title'] ?? ''; ?></h2>
            <p class="contact-description"><?php echo $fields['contact_description'] ?? ''; ?></p>
            <h2 class="contact-person-title"><?php echo $fields['contact_person_title'] ?? ''; ?></h2>
            <div class="contact-employees">

                <?php
                if ($fields) {
                    foreach ($fields['contact_person'] as $field) {
                        $image = $field['contact_person_image'] ?>
                        <div class="contact-person">
                            <div class="contact-person-image">
                                <?php echo wp_get_attachment_image($image['ID'] ?? '', 'full'); ?>
                            </div>
                            <div class="person-information">
                                <span class="contact-person-name"><?php echo $field['contact_person_name'] ?? ''; ?></span>
                                <span class="contact-person-position"><?php echo $field['contact_person_position'] ?? ''; ?></span>
                                <a class="contact-person-number" href="tel:<?php echo $field['contact_person_number'] ?? ''; ?>"><?php echo $field['contact_person_number'] ?? ''; ?></a>
                                <a class="contact-person-email" href="mailto:<?php echo $field['contact_person_email'] ?? ''; ?>"><?php echo $field['contact_person_email'] ?? ''; ?></a>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
        </div>
        <div class="sales">
            <h2 class="sales-title"><?php echo $fields['sales_title'] ?? ''; ?></h2>
            <p class="sales-contact-person"><?php echo $fields['sales_contact_person'] ?? ''; ?></p>
            <p class="sales-contact-epost"><?php echo $fields['sales_epost'] ?? ''; ?></p>
            <p class="sales-contact-klikk"><?php echo $fields['sales_klikk'] ?? ''; ?></p>
        </div>
        <div class="email-addresses">
            <h2 class="email-title"><?php echo $fields['emails_title'] ?? ''; ?></h2>
            <div class="all-emails">
                <?php
                if ($fields) {
                    foreach ($fields['contact_emails'] as $field) { ?>
                        <div class="position-email">
                            <span class="position"><?php echo $field['position_email'] ?? ''; ?> </span>
                            <a href="mailto:<?php echo $field['email_address'] ?? ''; ?>"><?php echo $field['email_address'] ?? ''; ?> </a>
                        </div>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
    <div id="map" class="gmap" data-lat="<?php echo $fields['lat']?>" data-lng="<?php echo $fields['lng']?>">

    </div>
</div>
<?php get_footer(); ?>
