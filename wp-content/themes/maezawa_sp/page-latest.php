<?php

	/* Template Name: Latest News */

?>

<?php get_header(); ?>

<div id="category-header">
	<h3 class="cat-header"><?php the_title(); ?></h3>
</div><!--category-header-->
<div id="main">
	<div id="content-wrapper">
		<div class="breadcrumb">
			<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
		</div><!--breadcrumb-->
		<div id="home-main">
			<div id="archive-wrapper">
				<ul class="archive-list">
					<?php
									$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
									$args= array(
										'posts_per_page' => 14,
										'paged' => $paged
									);
									query_posts($args);
					?>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<li>
						<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
						<div class="archive-image">
							<a href="<?php the_permalink() ?>">
							<?php the_post_thumbnail('medium-thumb'); ?>
							<?php if (get_comments_number()==0) { ?>
							<?php } else { ?>
								<div class="comment-bubble">
									<span class="comment-count"><?php comments_number( '0', '1', '%' ); ?></span>
								</div><!--comment-bubble-->
							<?php } ?>
							</a>
						</div><!--archive-image-->
						<?php } ?>
						<div class="archive-text">
							<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
							<span class="archive-byline"><?php _e( 'By', 'mvp-text' ); ?> <?php the_author_posts_link(); ?> <?php _e( 'on', 'mvp-text' ); ?> <?php the_time('F j, Y'); ?></span>
							<p><?php echo excerpt(26); ?></p>
						</div><!--archive-text-->
					</li>
					<?php endwhile; endif; ?>
				</ul>
			</div><!--archive-wrapper-->
			<div class="nav-links">
				<?php if (function_exists("pagination")) { pagination($wp_query->max_num_pages); } ?>
			</div><!--nav-links-->
		</div><!--home-main-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>