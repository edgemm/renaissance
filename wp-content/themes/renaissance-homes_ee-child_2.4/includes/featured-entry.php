<?php
// get YouTube id from full URL
$f_video_url = get_post_meta($post->ID,'video_url',true);
parse_str( parse_url( $f_video_url, PHP_URL_QUERY ), $f_video );

// get subtitle of post
$subtitle = get_post_meta($post->ID,'post_subtitle',true);

// set parameters if used on page - gfh
if ( is_page() ) $mainPageClass = " is_main";

?>
<div class="featured-entry full_entry clearfix<?php echo $mainPageClass; ?>">
        <?php if ( isset( $f_video['v'] ) ) { // show video if url is supplied - gfh ?>
        <iframe class="featured-entry-view" width="443" height="249" src="//www.youtube.com/embed/<?php echo $f_video['v']; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
        <!-- the value is ...<?php echo $f_video['v']; ?>... if it is of set, of course -->
        <?php } else if ( has_post_thumbnail() ) { //use featured image if no video
                $feat_attr = array(
                        'class' => 'featured-entry-view-thmb',
                        'title' => get_the_title()
                ); ?>
        <div class="featured-entry-view">
                <?php the_post_thumbnail( 'featured-view', $feat_attr ); ?>
        </div>
        <?php } ?>
        <div class="featured-entry-content">
                <div class="featured-entry-heading">
                        <h2 class="featured-entry-title">
                        <?php
                        if ( is_page() ) echo '<a class="featured-entry-title-link" href="' . get_permalink() . '">';
                        the_title();
                        if ( is_page() ) echo '</a>';
                        ?>
                        </h2>
                        <?php if ( $subtitle == true ) { ?>
                        <p class="featured-entry-subtitle rh-subtitle"><?php echo $subtitle; ?></p>
                        <?php } ?>
                </div>
                <div class="featured-entry-desc">
                <?php
                // show excerpt if main page - gfh
                if ( is_page() ) {
                
                        $postContent = get_the_content(); // get post content to check length & print - gfh	
                        $postLength = 435; // length to cut off content on main page - gfh
                
                        if ( strlen( $postContent ) > $postLength ) {
                                $pPos = strpos( $postContent, '</p>' );
                
                                if ( $pPos !== false ) {
                                        $pPosEnd = $pPos + 4;
                                        $postExcerpt = substr( $postContent, 0, $pPosEnd );
                                        $postContent = $postExcerpt;
                                } else {
                                        $postContent = substr( $postContent, 0, $postLength ) . "...";
                                }
                        }
                
                        $postContent .= '<a class="featured-entry-readmore" href="' . get_permalink() . '" title="Read more of this article">Read More &raquo;</a>';
                        
                        echo $postContent;
                } else {
                        the_content(); // show full content if single post - gfh
                }
                ?>
                </div>
        </div>
</div> <!-- end .featured-entry -->