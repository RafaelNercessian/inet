<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

$content = strip_shortcodes(get_the_content());

?>

<div class="card mt-2">
	<?php
	if (lightspeed_can_show_post_thumbnail() ): ?>
		<div class='img-wrap'>
			<?
			$thumb = get_the_post_thumbnail(get_the_ID(), 'medium');
			echo "<a href='" . get_the_permalink()."'>" . $thumb . "</a>";
			?>
		</div>
	<?php endif; ?>
	
	<div class="card-body">
		<h5 class="card-title"><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h5>
        <div class="entry-meta d-flex flex-row"><?php lightspeed_posted_on(); ?> <span class="sep">&bull;</span> <?php lightspeed_reading_time(); ?></div>
		<p class="card-text">
			<?php
				//Display 10 words from the content...
				echo wp_trim_words($content, 33, "...")  . " <a href='".get_the_permalink()."'><em>Read more</em>.</a>"; 
			?>
		</p>
	</div>
        
</div>

