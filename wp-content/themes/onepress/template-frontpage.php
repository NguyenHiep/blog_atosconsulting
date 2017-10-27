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
          $paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
          $args = array(
              'post_type'      => 'post',
              'post_status'    => 'publish',
              'posts_per_page' => 10,
              'paged'          => $paged
          );
          $the_query  = new WP_Query($args);
          ?>
          <?php if ( $the_query->have_posts() ) : ?>

              <?php /* Start the Loop */ ?>
              <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                  <?php
                     get_template_part( 'template-parts/content', 'list-home' );
                  ?>

              <?php endwhile; ?>
            <div class="nav-links">
              <?php if (get_previous_posts_link()) : ?>
                <div class="nav-previous">
                    <?php previous_posts_link('Newer Posts'); ?>
                </div>
              <?php endif; ?>

              <?php if (get_next_post_link()) : ?>
                <div class="nav-next">
                    <?php  next_posts_link( 'Older Posts', $the_query->max_num_pages ); ?>
                </div>
              <?php endif; ?>
            </div>
              <?php


             /* wp_link_pages( array(
                  'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'onepress' ),
                  'after'  => '</div>',
              ) );*/
              /*echo paginate_links(array(
                  'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                  'total'        => $the_query->max_num_pages,
                  'current'      => max(1, get_query_var('page')),
                  'format'       => '?paged=%#%',
                  'show_all'     => false,
                  'type'         => 'plain',
                  'end_size'     => 2,
                  'mid_size'     => 1,
                  'prev_next'    => true,
                  'prev_text'    => sprintf('<i></i> %1$s', __('Newer Posts', 'onepress')),
                  'next_text'    => sprintf('%1$s <i></i>', __('Older Posts', 'onepress')),
                  'add_args'     => false,
                  'add_fragment' => '',
              ));*/
              ?>
              <?php wp_reset_postdata(); ?>

          <?php else : ?>

              <?php get_template_part( 'template-parts/content', 'none' ); ?>

          <?php endif; ?>

      </main><!-- #main -->
    </div><!-- #primary -->

      <?php if ( $layout != 'no-sidebar' ) { ?>
          <?php get_sidebar(); ?>
      <?php } ?>

  </div><!--#content-inside -->
</div><!-- #content -->

<?php get_footer(); ?>

