<?php get_header(); ?>

<style>
@media screen and (max-width: 960px) {
  /* .special {display: none;} */
  .special_tittle {display: block;}
  .special_image {display: block;}
}
</style>

    <!-- main area -->
    <article>
      <!-- top image -->
      <div class="container">

      <div class="wideslider">
      <ul>
      
<?php
	$usedPostList = array();
	$args  = '&posts_per_page=5&tag=Featured';	
	query_posts( $args );
	// The Loop
	while ( have_posts() ) : the_post();
	
	$image_id  = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src($image_id, true);
	$category  = get_the_category();
	$cat_id    = $category[0]->cat_ID;
	$cat_name  = $category[0]->cat_name;
	$usedPostList[] = $post->ID;
?>

        <li>
          <a href="<?php the_permalink(); ?>">
            <p><?php the_title(); ?>
            </p>
            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="">
            
            <?php
            /*
            <div class="author_img_top">
            <?php echo removeWidthHeight(get_avatar(get_the_author_meta( 'ID' ))); ?><?php the_author(); ?>
            </div>
            */
            ?>
          </a>
        </li>
<?php
	endwhile;
	// Reset Query
	wp_reset_query();
?>

      </ul>
      </div>

      </div>
      <div id="wrapper">
      <!-- main -->
      <div id="main">
      <div class="center">
      <section>
        <!-- pick up -->
        <div class="pickup">
        <div class="pickup_tittle">Latest Articles</div>





<?php
	//ピックアップ記事表示
	$args = '&posts_per_page=-1&tag=pickup';
	query_posts( $args );
	// The Loop
	while ( have_posts() ) : the_post();
	
	$image_id = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src($image_id, true);
	$category = get_the_category();
	$cat_id   = $category[0]->cat_ID;
	$cat_name = $category[0]->cat_name;
	$usedPostList[] = $post->ID;

?>
	<!-- pickup_box -->
	<div class="pickup_box">
		<a href="<?php the_permalink(); ?>">
			<div class="pickup_category" style="background-color: #ffab1a;">
				<h3>PickUp</h3>
			</div>
			<div class="pickup_image">
				<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>">
			</div>
			<div class="pickup_text">
				<?php the_title(); ?>
				<p><?php the_excerpt(); ?></p>
			</div>
		</a>
		<!-- ライターリンクをaタグの外に出す -->
		<div class="pickup_written">
		<?php if(jpnCheck()) : ?>
			Written by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> on <?php the_time("Y/m/d"); ?>
		<?php else : ?>
			Translated by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> on <?php the_time("Y/m/d"); ?>
		<?php endif; ?>
		</div>
	</div><!-- pickup_box_end -->

<?php
	endwhile;
	// Reset Query
	wp_reset_query();
?>


<?php

	$args = '&posts_per_page=20';
	$paged = get_query_var('paged');
	if($paged){
		$args = '&posts_per_page=20&paged='. $paged;
	}
	query_posts( $args );
	// The Loop
	while ( have_posts() ) : the_post();
	
	//スライダー、PickUpで使われている記事はスキップする。
	foreach($usedPostList as $postId){
		$skipFlg = 0;
		
		if($postId == $post->ID){
			$skipFlg = 1;
			break;
		}
	}
	
	if($skipFlg){
		continue;
	}
	
	$image_id = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src($image_id, true);
	$category = get_the_category();
	$cat_id   = $category[0]->cat_ID;
	$cat_name = $category[0]->cat_name;

?>
	<!-- pickup_box -->
	<div class="pickup_box">
		<a href="<?php the_permalink(); ?>">
			<div class="pickup_category" style="background-color: #ffab1a;">
				<h3><?php echo $cat_name; ?> </h3>
			</div>
			<div class="pickup_image">
				<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>">
			</div>
			<div class="pickup_text">
				<?php the_title(); ?>
				<p><?php the_excerpt(); ?></p>
			</div>
		</a>
		<!-- ライターリンクをaタグの外に出す -->
		<div class="pickup_written">
		<?php if(jpnCheck()) : ?>
			Written by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> on <?php the_time("Y/m/d"); ?>
		<?php else : ?>
			Translated by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> on <?php the_time("Y/m/d"); ?>
		<?php endif; ?>
		</div>
	</div><!-- pickup_box_end -->

<?php
	endwhile;
	// Reset Query
	wp_reset_query();
?>
        </div>
      </section>
<?php
//Pagenation 

if (function_exists("pagination")) {
	pagination($additional_loop->max_num_pages);
}
?>
      </div>
      </div>
<?php get_sidebar(); ?>
    <article></article>
    <!-- 無限読み込み開始 -->
<?php get_footer(); ?>