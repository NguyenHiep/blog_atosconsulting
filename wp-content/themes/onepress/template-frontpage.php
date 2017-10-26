<?php
/**
 *Template Name: Frontpage
 *
 * @package OnePress
 */

get_header();

$layout = onepress_get_layout();
?>

<div id="content" class="site-content">
  <div id="content-inside" class="clearfix container <?php echo esc_attr( $layout ); ?>">
    <div id="primary" class="content-area">
      <main id="main" class="site-main" role="main">
          <?php
            // the query
            $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish','posts_per_page'=>6));
          ?>
          <?php if ( $wpb_all_query->have_posts() ) : ?>

              <?php /* Start the Loop */ ?>
              <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>

                  <?php
                     get_template_part( 'template-parts/content', 'list-home' );
                  ?>

              <?php endwhile; ?>
              <?php //wp_reset_postdata(); ?>
              <?php the_posts_navigation(); ?>

          <?php else : ?>

              <?php //get_template_part( 'template-parts/content', 'none' ); ?>

          <?php endif; ?>

      </main><!-- #main -->
    </div><!-- #primary -->

      <?php if ( $layout != 'no-sidebar' ) { ?>
          <?php get_sidebar(); ?>
      <?php } ?>

  </div><!--#content-inside -->
</div><!-- #content -->

<?php get_footer(); ?>

