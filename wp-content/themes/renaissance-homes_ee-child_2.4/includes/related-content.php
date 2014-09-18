<?php // hide related posts if box is checked - gfh
if ( !get_field( 'toggle_related_content' ) ) {
?>
        <div class="related">
                <h3 class="related-headline">Related Content</h3>
                <div class="related-posts">
        <?php
                $args = array(
                        'post_type'		=> 'post',
                        'category__not_in'	=> array( 136, 281 ),
                        'orderby'      		=> 'rand',
                        'posts_per_page' 	=> 5
                );

                remove_all_filters('posts_orderby');
                $the_query = new WP_Query( $args );

                if ($the_query->have_posts()) {
                        while ( $the_query->have_posts() ) :
                                $the_query->the_post();
                                include( locate_template( 'entry-related-post.php' ) );					
                        endwhile;
                }
        ?>
                </div>
        </div>
}
?>