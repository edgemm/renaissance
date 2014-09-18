<div id="breadcrumbs">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home','ElegantEstate') ?></a>
        <span class="separate"> &raquo; </span>
        <a href="/giving-back">Giving Back </a>
        <span class="separate"> &raquo; </span>
        <?php the_title(); ?>
</div>

<?php

$GLOBALS['parent_cat'] = 266;
$GLOBALS['rh_current_post'] = get_the_ID();
$GLOBALS['setTemplate'] = "gb";

// title for filter area
$filter_title = "Giving Back";

// include featured post area at top
include( locate_template( 'includes/featured-entry.php' ) );
?>

<div class="full_entry giving-back clearfix">
<?php
// include posts from parent_cat and filters - gfh
include( locate_template( 'includes/rh-post-archive.php' ) );
?>
</div>