<?php
	$thumb = '';
	$thmbWidth = 110;
	$thmbHeight = 110;
	$thmbClass = 'related-thmb';
	$titletext = get_the_title();
	$thumbnail = get_thumbnail($thmbWidth,$thmbHeight,$thmbClass,$titletext,$titletext);
	$thumb = $thumbnail["thumb"];
?>
						<div class="related-post">
							<a class="related-thmb-link" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php if ( has_post_thumbnail() ) {
								$attr = array(
									'class' => $thmbClass,
									'title' => get_the_title()
								);
								the_post_thumbnail( 'thumbnail', $attr );
							} else if ( $thumb <> '' && get_option('elegantestate_thumbnails_index') == 'on' ) {
								echo print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext , $thmbWidth, $thmbHeight, $thmbClass);
							} else {
								echo '<img class="' . $thmbClass . '" src="/wp-content/themes/renaissance-homes_ee-child_2.4/images/rh_related_thmb.jpg"  alt="" title="' . get_the_title() . '" width="' . $thmbWidth . '" height="' . $thmbHeight . '">';
							} ?>
							</a>
							<a class="related-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>				
						</div> <!-- end .related-post -->