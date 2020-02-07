<?php
/**
 * Block Name: Testimonials
 *
 * This is the template that displays the testimonials loop block.
 */

$argType = get_field( 'loop_argument_type' );
if( $argType == "count" ) :
  $args = array( 
    'orderby' => 'title',
    'post_type' => 'testimonial',
    'posts_per_page' => get_field( 'testimonial_count' )
  );
else:
  $testimonials = get_field( 'select_testimonials' );
  $args = array( 
    'orderby' => 'title',
    'post_type' => 'testimonial',
    'post__in' => $testimonials
  );
endif;

$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) :
    while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      
      <div class="testimonial">
				<b><?php the_title(); ?></b> <br>
				<b><?php the_field('testimonial_org_name', get_the_ID()); ?></b> <br>
        <small><?php the_field('testimonial_text', get_the_ID()); ?></small>
      </div>
    
    <?php endwhile; ?>
<?php endif;?>