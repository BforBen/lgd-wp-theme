<?php
/**
 * Template Name: Voice Landing
 */

$args = array(
    'post_type'=> 'voice_post',
    'orderby'    => 'date',
    'order'    => 'DESC',
    'posts_per_page' => 15,
    );              

$the_query = new WP_Query( $args );

get_header(); ?>

<div class="row small-up-2 medium-up-3">
	<?php
	if ( $the_query->have_posts() ) :
		while ( $the_query->have_posts() ) : $the_query->the_post();
			get_template_part( 'template-parts/page/content', 'voice-post' );
		endwhile;
	else :
		get_template_part( 'template-parts/post/content', 'none' );
	endif; ?>
</div>

<?php get_footer();
