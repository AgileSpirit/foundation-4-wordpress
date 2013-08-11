<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Agile_Spirit
 * @since Agile Spirit 1.0
 */
?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
    <div>
      <?php _e( 'Featured post', 'agilespirit' ); ?>
    </div>
    <?php endif; ?>
    <header class="entry-header">
      <?php the_post_thumbnail(); ?>
      <?php if ( is_single() ) : ?>
      <h2><?php the_title(); ?></h2>
      <?php else : ?>
      <h2>
        <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
      </h2>
      <?php endif; // is_single() ?>
      <div class="entry-meta">
        <?php agilespirit_entry_meta(); ?>
        <?php edit_post_link( __( 'Edit', 'agilespirit' ), '<span class="edit-link">', '</span>' ); ?>
      </div><!-- .entry-meta -->
      <br>
      <br>
    </header><!-- .entry-header -->

    <?php if ( is_search() ) : // Only display Excerpts for Search ?>
    <div class="entry-summary">
      <?php the_excerpt(); ?>
    </div><!-- .entry-summary -->
    <?php else : ?>
    <div class="entry-content">
      <?php the_content( __( 'Continue reading <span>&rarr;</span>', 'agilespirit' ) ); ?>
      <?php wp_link_pages( array( 'before' => '<div>' . __( 'Pages:', 'agilespirit' ), 'after' => '</div>' ) ); ?>
    </div><!-- .entry-content -->
    <?php endif; ?>

    <footer class="entry-meta">
      <?php if ( comments_open() && ! is_single() ) : ?>
        <div class="comments-link">
          <?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'agilespirit' ) . '</span>', __( 'One comment so far', 'agilespirit' ), __( 'View all % comments', 'agilespirit' ) ); ?>
        </div><!-- .comments-link -->
      <?php endif; // comments_open() ?>

      <?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
        <div>
          <div>
            <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentytwelve_author_bio_avatar_size', 68 ) ); ?>
          </div><!-- .author-avatar -->
          <div>
            <h2><?php printf( __( 'About %s', 'agilespirit' ), get_the_author() ); ?></h2>
            <p><?php the_author_meta( 'description' ); ?></p>
            <div>
              <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
                <?php printf( __( 'View all posts by %s <span>&rarr;</span>', 'agilespirit' ), get_the_author() ); ?>
              </a>
            </div><!-- .author-link -->
          </div><!-- .author-description -->
        </div><!-- .author-info -->
      <?php endif; ?>
    </footer><!-- .entry-meta -->
  </article><!-- #post -->
