<div class="social-share-wrapper mb-1">
    
    <hr>
    
    <h3>Share this!</h3>
    
    <ul class="share-btns d-flex flex-row">
        
        <li class="facebook" onclick="PopupCenter('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>','<?php the_title(); ?>','450','450');">
            <img src="<?php _e(get_stylesheet_directory_uri()); ?>/img/facebook.svg" alt="Share on Facebook" width="32" height="32">
        </li>
        
        <li class="twitter" onclick="PopupCenter('http://twitter.com/share?text=<?php the_title(); ?>&url=<?php the_permalink() ?>','<?php the_title(); ?>','450','450');">
            <img src="<?php _e(get_stylesheet_directory_uri()); ?>/img/twitter.svg" alt="Share on Twitter" width="32" height="32">
        </li>
        
        <li class="linkedin" onclick="PopupCenter('https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>&title=<?php the_title(); ?>&summary='+decodeURIComponent('<?php echo urlencode(get_the_excerpt()); ?>'),'<?php the_title(); ?>','650','650');">
                <img src="<?php _e(get_stylesheet_directory_uri()); ?>/img/linkedin.svg" alt="Share on LinkedIN" width="32" height="32">
        </li>
        
        <li class="email">
            <a href="mailto:?subject=<?php the_title(); ?> by <?php echo get_bloginfo('name'); ?>&body=A great article: <?php the_permalink(); ?>"
               title="Share by Email">
                <img src="<?php _e(get_stylesheet_directory_uri()); ?>/img/mail.svg" alt="Share by email" width="32" height="32">
            </a>
        </li>
        
    </ul>
    
</div>