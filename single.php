<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Agile_Spirit
 * @since Agile Spirit 1.0
 */

get_header(); ?>

  <div id="primary" class="content-area">
    <div id="content" role="main" class="site-content large-9 columns">

      <?php /* The loop */ ?>
      <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'content', get_post_format() ); ?>
        <?php agilespirit_post_nav(); ?>
        <?php comments_template(); ?>

      <?php endwhile; ?>

    </div><!-- #content -->
  </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>