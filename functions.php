<?php

function agilespirit_setup() {
  /*
   * Makes Agile Spirit available for translation.
   *
   * Translations can be added to the /languages/ directory.
   * If you're building a theme based on Ægile Spirit, use a find and
   * replace to change 'agilespirit' to the name of your theme in all
   * template files.
   */
  load_theme_textdomain( 'agilespirit', get_template_directory() . '/languages' );

  // Switches default core markup for search form, comment form, and comments
  // to output valid HTML5.
  add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

  // This theme uses wp_nav_menu() in one location.
  register_nav_menu( 'primary', __( 'Navigation Menu', 'agilespirit' ) );
}
add_action( 'after_setup_theme', 'agilespirit_setup' );


function agilespirit_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Main Widget Area', 'agilespirit' ),
    'id'            => 'sidebar-1',
    'description'   => __( 'Appears in the left side-bar section of the site.', 'agilespirit' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h5 class="widget-title"><strong>',
    'after_title'   => '</strong></h5>',
  ) );
}
add_action( 'widgets_init', 'agilespirit_widgets_init' );

if ( ! function_exists( 'agilespirit_paging_nav' ) ) :
/**
 * Displays navigation to next/previous set of posts when applicable.
 *
 * @since Agile Spirit 1.0
 *
 * @return void
 */
function agilespirit_paging_nav() {
  global $wp_query;

  // Don't print empty markup if there's only one page.
  if ( $wp_query->max_num_pages < 2 )
    return;
  ?>
  <nav class="navigation paging-navigation" role="navigation">
    <h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'agilespirit' ); ?></h1>
    <div class="nav-links">

      <?php if ( get_next_posts_link() ) : ?>
      <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'agilespirit' ) ); ?></div>
      <?php endif; ?>

      <?php if ( get_previous_posts_link() ) : ?>
      <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'agilespirit' ) ); ?></div>
      <?php endif; ?>

    </div><!-- .nav-links -->
  </nav><!-- .navigation -->
  <?php
}
endif;

if ( ! function_exists( 'agilespirit_post_nav' ) ) :
/**
 * Displays navigation to next/previous post when applicable.
*
* @since Agile Spirit 1.0
*
* @return void
*/
function agilespirit_post_nav() {
  global $post;

  // Don't print empty markup if there's nowhere to navigate.
  $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
  $next     = get_adjacent_post( false, '', false );

  if ( ! $next && ! $previous )
    return;
  ?>
  <nav class="navigation post-navigation" role="navigation">
    <h1 class="screen-reader-text"><?php _e( 'Post navigation', 'agilespirit' ); ?></h1>
    <div class="nav-links">

      <?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'agilespirit' ) ); ?>
      <?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'agilespirit' ) ); ?>

    </div><!-- .nav-links -->
  </nav><!-- .navigation -->
  <?php
}
endif;

if ( ! function_exists( 'agilespirit_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own agilespirit_entry_meta() to override in a child theme.
 *
 * @since Agile Spirit 1.0
 *
 * @return void
 */
function agilespirit_entry_meta() {
  if ( is_sticky() && is_home() && ! is_paged() )
    echo '<span class="featured-post">' . __( 'Sticky', 'agilespirit' ) . '</span>';

  if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
    agilespirit_entry_date();

  // Translators: used between list items, there is a space after the comma.
  $categories_list = get_the_category_list( __( ', ', 'agilespirit' ) );
  if ( $categories_list ) {
    echo ' ' . __('in', 'agilespirit') . ' <span class="categories-links">' . $categories_list . '</span>';
  }

  // Translators: used between list items, there is a space after the comma.
  $tag_list = get_the_tag_list( '', __( ', ', 'agilespirit' ) );
  if ( $tag_list ) {
    echo '<span class="tags-links">' . ' ' . __(' concerning ', 'agilespirit') . ' ' . $tag_list . '</span>';
  }

  // Post author
  if ( 'post' == get_post_type() ) {
    _e(' by ', 'agilespirit');
    printf( '<span class="author"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
      esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
      esc_attr( sprintf( __( 'View all posts by %s', 'agilespirit' ), get_the_author() ) ),
      get_the_author()
    );
  }
}
endif;

if ( ! function_exists( 'agilespirit_entry_date' ) ) :
/**
 * Prints HTML with date information for current post.
 *
 * Create your own agilespirit_entry_date() to override in a child theme.
 *
 * @since Agile Spirit 1.0
 *
 * @param boolean $echo Whether to echo the date. Default true.
 * @return string The HTML-formatted post date.
 */
function agilespirit_entry_date( $echo = true ) {
  if ( has_post_format( array( 'chat', 'status' ) ) )
    $format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'agilespirit' );
  else
    $format_prefix = '%2$s';

  $date = sprintf( '<span class="date">' . __('Published on ', 'agilespirit') . '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
    esc_url( get_permalink() ),
    esc_attr( sprintf( __( 'Permalink to %s', 'agilespirit' ), the_title_attribute( 'echo=0' ) ) ),
    esc_attr( get_the_date( 'c' ) ),
    esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
  );

  if ( $echo )
    echo $date;

  return $date;
}
endif;


?>