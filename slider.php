  <?php $args = array(
  'order' => 'ASC',
  'post__in' => array( 258,194,175 ));
  $my_query = new WP_Query( $args );?>
  <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
  <h2><?php the_title(); ?></h2>
  <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>


