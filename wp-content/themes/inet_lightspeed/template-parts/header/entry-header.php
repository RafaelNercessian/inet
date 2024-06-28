<?php
/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?>

<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
<?php if ( ! is_page() ) : ?>
<div class="entry-meta mb-2">
	<?php lightspeed_posted_on(); ?> <span class="sep">&bull;</span> <?php lightspeed_reading_time(); ?>
</div><!-- .entry-meta -->

<figure class="wp-caption alignnone mb-1">
    <?php 
        $thumb_id = get_post_thumbnail_id();
        echo wp_get_attachment_image($thumb_id, 'full', false, array('class'=>'nolazy')); 
    ?>
    <figcaption class="wp-caption-text"><?php the_post_thumbnail_caption(); ?></figcaption>
</figure>

<?php endif; ?>
