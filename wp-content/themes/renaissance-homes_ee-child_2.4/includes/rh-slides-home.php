<?php
$slide_thmb_url = wp_get_attachment_image_src( get_post_thumbnail_id( $slides->ID ), 'full' );
$slide_thmb_alttitle = trim( strip_tags( get_the_title() ) );
?>
<div class="rh-slide">
    <!--<div class="rh-slide-container">
        <div class="rh-slide-content">
            <h2 class="rh-slide-headline"><?php the_title(); ?></h2>
            <div class="rh-slide-desc"><?php the_content(); ?></div>
        </div>
    </div>-->
    <img class="rh-slide-img" src="<?php echo $slide_thmb_url['0']; ?>" alt="<?php echo $slide_thmb_alttitle; ?>" />
</div>