<?php
$postid = get_the_ID();
?>

<?php

$blogcat = get_cat_ID(get_option('elegantestate_blog_cat'));

	// featured image of post
	$thumb = '';
	$width = 159;
	$height = 159;
	$classtext = '';
	$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext);
	$thumb = $thumbnail["thumb"];
	
	$titletext = get_the_title();
	
	// chop up post content for show/hide purposes
	$postContent = get_the_content();
	$hiddenContent = false; // determines if "show more/less" text is displayed
	$postExcerptLength = 194;
	
	if ($thumb <> '' && get_option('elegantestate_thumbnails_index') == 'on') {
		$hiddenContent = true;
		$clipEntry = " clipEntry";
	}
?>

				<div class="entry_content livingGreen-post<?php echo $clipEntry; ?>">
					<h2 class="title<?php if ( $hiddenContent === true ) echo ' toggleMore'; ?>"><a class="title-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php if ($thumb <> '' && get_option('elegantestate_thumbnails_index') == 'on') { ?>
					<div class="small-thumb">
						<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext , $width, $height, $classtext); ?>
						<span class="overlay"></span>
					</div> 	<!-- end .small-thumb -->
					<?php }
		
					the_content();
		
					?>
		
				</div> <!-- end .entry_content -->