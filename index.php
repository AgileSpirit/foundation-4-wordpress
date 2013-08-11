<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Agile_Spirit
 * @since Agile Spirit 1.0
 */

get_header(); ?>

	<div id="primary">
		<div id="content" role="main" class="large-9 columns">
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
			  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				  <header class="entry-header">

				  	<!-- Affiche la vignette si elle existe et si le billet ne requiert pas de mot de passe -->
						<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
						<div class="entry-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php endif; ?><!-- .entry-thumbnail -->

						<!-- Affiche le titre sous forme de lien -->
						<h2 class="entry-title">
							<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
						</h2><!-- .entry-title -->

						<div class="entry-meta">
							<?php agilespirit_entry_meta(); ?>
							<br><br>
						</div><!-- .entry-meta -->

				  </header><!-- .entry-header -->

					<div class="entry-summary">
						<?php the_excerpt(); ?>
					</div><!-- .entry-summary -->

				  <footer>
				  	<a href="<?php the_permalink(); ?>" rel="bookmark">Lire la suite...</a>
				  </footer>
				</article>
				<hr>
			<?php endwhile; ?>

		<?php else : ?>

		<?php endif; // end have_posts() check ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>