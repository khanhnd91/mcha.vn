<?php
/*
Template Name: page-special
*/
?>



<?php get_header(); ?>



<div id="main">

	<div id="content-wrapper">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="breadcrumb">

			<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

		</div><!--breadcrumb-->

		<div id="title-main">

			<h1 class="headline-page"><?php the_title(); ?></h1>

		</div><!--title-main-->
        
        

		<div id="home-main" class="full">

			<div id="post-area" <?php post_class(); ?>>

				<div id="social-box" class="full2">

					<ul class="post-social">

						<li>

							<a href="http://twitter.com/share" class="twitter-share-button" data-lang="en" data-count="horizontal">Tweet</a>

						</li>

						<li>

							<g:plusone size="medium" annotation="inline" width="120"></g:plusone>

						</li>

						<li>

							<?php $pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>

<a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($post->ID)); ?>&media=<?php echo $pinterestimage[0]; ?>&description=<?php the_title(); ?>" class="pin-it-button" count-layout="horizontal">Pin It</a>

						</li>

						<li>

							<div class="fb-like" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div>

						</li>

					</ul>

				</div><!--social-box-->



					<?php $ht_featured_img = get_option('ht_featured_img'); if ($ht_featured_img == "true") { ?>

						<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { /* if post has a thumbnail */ ?>

						<div class="post-image">

							<?php the_post_thumbnail('full'); ?>

						</div><!--post-image-->

						<?php } ?>

					<?php } ?>




					<?php the_content(); ?>

<?php

	$post_list = array();
	$i = 1;
	while($i <= 7){
		
		$cat_name = 'meta_cat_name_'.$i;
		$cat_name_val = get_post_meta(get_the_ID(), $cat_name, true);
		if($cat_name){
			$post_list[] = array(
								"cat_num" => $i,
								"cat"     => $cat_name_val);
		}
		$i++;
	
	}

	//$post_list = array();
	$i = 1;
	while($i <= 20){
		
		$post_cat = 'meta_post_cat_'.$i;
		$post_cat_val = get_post_meta(get_the_ID(), $post_cat, true);
		
		$post_num = 'meta_post_num_'.$i;
		$post_num_val = get_post_meta(get_the_ID(), $post_num, true);
		
		$post_date = 'meta_post_date_'.$i;
		$post_date_val = get_post_meta(get_the_ID(), $post_date, true);
		
		
		
		if($post_cat_val && $post_num_val && $post_date_val){
			foreach($post_list as &$cat_list){

				if($cat_list['cat_num'] == $post_cat_val){
					$cat_list['post_list'][] = array("post_num"  => $post_num_val,
												  "post_date" => $post_date_val);
				}
			}
			unset($cat_list);
		}
		$i++;
	
	}
	
	$toDay = date( "Y-m-d", time() );
	$html  = '<div id="content-area_special_togoshiginza" class="full2">';
	foreach($post_list as $cat_list){
	
		if($cat_list['post_list']){
			
			$html .= '<h3 style="border-bottom: 1px dotted #93C7E2;
  border-left: 8px solid #93C7E2;">'.$cat_list['cat'].'</h3>';
			$html .= '<ul class="archive-list" style="padding-bottom:10px;">';
			foreach($cat_list['post_list'] as $post){
				if($toDay >= $post['post_date'] ){
				
					$post_info   = get_post($post['post_num']);
					$post_url    = $post_info->guid;
					$title       = $post_info->post_title;
					$post_date   = $post_info->post_date;
					$post_author = get_userdata($post_info->post_author);
					$post_author = $post_author->data->display_name;
					$post_desc   = get_post_meta($post['post_num'], _aioseop_description, true);
					$post_thum   = wp_get_attachment_url(get_post_thumbnail_id( $post['post_num'] ));
					
					$html .= '<li><div class="archive-image">';
					$html .= '<a href="'.$post_url.'">';
					$html .= '<img style="width:300px;" src="'.$post_thum.'"';
					$html .= ' style="display: block;"><noscript>&lt;img width="300" height="194" src="'.$post_thum.'" class="attachment-medium-thumb wp-post-image" /&gt;</noscript>';
					$html .= '</a></div><!--archive-image-->';

					$html .= '<div class="special_togoshiginza_archive-text">';
					$html .= '<h2><a href="'.$post_url.'">'.$title.'</a></h2>';
					$html .= '<span class="archive-byline">Translated by <a href="http://mcha-jp.com/author/matcha" title="'.$post_author.' による投稿" rel="author">'.$post_author.'</a> on '.$post_date.'</span>';
					$html .= '<p>'.$post_desc.'</p>';
					$html .= '</div>';
					$html .= '<!--special_togoshiginza_archive-text-->';
					$html .= '</li>';
				}
			}
			$html .= '</ul>';
		}
	}
	$html .= '<h3 style="margin-top: 40px;border-bottom: 1px dotted #93C7E2;border-left: 8px solid #93C7E2;">SAGA APP</h3>';
        $html .= '<div><a target="_blank" href="http://saga-travelsupport.com/lp/">';
        $html .= '<img style="margin-top: 5px;width: 100%;" src="'.get_stylesheet_directory_uri().'/images/sagabanner.png">';
        $html .= '</a></div>';
	$html .= '</div>';
	
	print $html;
?>











					<?php posts_nav_link(); ?>

				</div><!--content-area-->

			</div><!--post-area-->

		</div><!--home-main-->

		<?php endwhile; endif; ?>

<?php get_footer(); ?>
