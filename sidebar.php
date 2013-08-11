<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage Agile_Spirit
 * @since Agile Spirit 1.0
 */
?>

  <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
    <aside class="large-3 columns">
      <br>
      <div id="secondary" role="complementary">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
      </div><!-- #secondary -->
    </aside>
  <?php endif; ?>