<?php get_header(); ?>
<div id="main">
	<div id="content">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article class="single_article">
				<span class="single_article_title">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</span>
				<div class="single_article_content">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile; else: ?>
			<h2>Sorry!</h2>
		<?php endif; ?>
		<?php
			global $wp_query;
			$big = 999999999;
			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages,
			) );
		?>
	</div>
 	<div class="sidebar">
		<div class="single_sidebar_widget">
			<?php
				wp_nav_menu( array(
				'theme_location' => 'main_menu',
				));
			?>
			<?php if ( ! dynamic_sidebar() ) : ?>
			<?php endif; ?>
		</div>
	</div>
<script>
	$(".single_article_content p:has(img)").addClass("img_container");
</script>
</div>
<?php get_footer(); ?>