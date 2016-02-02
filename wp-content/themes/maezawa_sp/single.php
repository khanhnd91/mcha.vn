<?php
	get_header();
	$cat      = get_the_category();
	$cat      = $cat[0];
	$cat_name = $cat->cat_name;
	$cat_slug = $cat->slug;
	$user_ID = $post->post_author;
?>
    <!-- main area -->
    <article>
      <div id="wrapper">
      <!-- main -->
      <div id="main">
      <div class="center">
<div id="post-area">
      <nav id="breadcrumbs">
          <ol>
            <li itemscope="itemscope" itemtype="#">
              <a itemprop="url" href="<?php bloginfo('home'); ?>">
                <span itemprop="title">Top</span>
              </a>
            </li>
            <li itemscope="itemscope" itemtype="#">
              <a itemprop="url" href="<?php bloginfo('home'); ?>/category/<?php echo $cat_slug; ?>">
                <span itemprop="title"><?php echo $cat_name; ?></span>
              </a>
            </li>
          </ol>
        </nav>
      </section>
  <!-- article -->
	  <div class="post">
	  <section id="post-area">
	      <div class="tittle">
	      <img src="<?php print wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>">
	      <h1><?php the_title(); ?></h1>
	      <div class="written"> 
	      <?php if(jpnCheck()) : ?>
				Written by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID', $user_ID)); ?>"><?php the_author_meta('display_name',$user_ID); ?></a> on <?php the_time("Y/m/d"); ?>
			<?php else : ?>
				Translated by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID', $user_ID)); ?>"><?php the_author_meta('display_name',$user_ID); ?></a> on <?php the_time("Y/m/d"); ?>
			<?php endif; ?>
	      </div>
	      
	      <div class="tag_area">
	<?php
		$tagList = get_the_tags();
		foreach($tagList as $tag){
			if($tag->name == 'Featured' or $tag->name == 'featured' or $tag->name == '未分類'){
				//
			}else{
				print '<a href="./tag/'.$tag->slug.'"><div class="tag">'.$tag->name.'</div></a>';
			}
		}
	?>
	      </div><!--tag_area-->
	      </div>

	      <div class="article">
	      <!--more-->
	      <div class="more">

	      <?php
	      	//echo $post->post_content;
	      	echo apply_filters('the_content', $post->post_content);
	      ?>

	      </div><!--more end-->

	      </div>

	  </section>

	<section>
	  <!-- social -->
	  <?php social_share(); ?>
	  </div>


<?php
	if(jpnCheck()) :
	
		$abFlg = rand ( 0,1);
		if($abFlg){
			$ab = 'A';
		}else{
			$ab = 'B';
		}
?>
<!-- writer_recruit -->
	<section>
	<a href='https://www.wantedly.com/projects/31140' onclick="ga('send', 'event', 'matcha', 'recruit', '<?php echo $ab; ?>')">

	  <div class="writer_recruit">
	  	<img src="<?php bloginfo('template_directory'); ?>/images/recruit_writer_<?php echo $ab; ?>.jpg">
	  </div>

	</a>
	</section>
<?php endif; ?>



	<!-- 記事がよかったらいいね　ここから -->

	 <!-- 記事がよかったらいいねPC -->
	            <!-- <div class="p-entry__push">
	              <div class="p-entry__pushThumb" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>')"></div>
	              <div class="p-entry__pushLike">
	                
	             <?php if(jpnCheck()) : ?>
	                <p>この記事が気に入ったら<br>いいね！しよう</p>
	             <?php else : ?>
	                <p>like us on facebook.</p>
	             <?php endif; ?>
	                
	                
	                <div class="p-entry__pushButton">
	<div class="fb-like" data-href="https://www.facebook.com/mcha.jp" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
	                </div>
	              
	              <?php if(jpnCheck()) : ?>
	                <p class="p-entry__note">最新情報をお届けします。</p>
	              <?php else : ?>
	                <p>You can get latest information.</p>
	              <?php endif; ?>
	              
	              </div>
	            </div>
	             <div class="p-entry__tw-follow">
	              <div class="p-entry__tw-follow__cont">
	                
	                
	             <?php if(jpnCheck()) : ?>
	                <p class="p-entry__tw-follow__item">TwitterでMATCHAをフォロー！</p>
	             <?php else : ?>
	                <p>follow us on twitter.</p>
	             <?php endif; ?>
	                
	                
	                <a href="https://twitter.com/MATCHA_global" class="twitter-follow-button p-entry__tw-follow__item" data-lang="en" data-show-count="false" data-size="large" data-show-screen-name="false">@MATCHA_global</a>
	                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
	              </div>
	</div> -->

	 <!-- 記事がよかったらいいね　ここまで -->


	
	<?php if(!autoLoadChk()): ?>
	  <!-- social_ad -->
	  <div class="ad">
	  <?php getPostBtm(); ?>
	  </div>
	<?php endif; ?>

	</section>

	  <!-- author -->
	  <section>
	      <div class="author">
	      <p>Author
	      </p>
	      <div class="author_img">
	      <?php echo removeWidthHeight(get_avatar( get_the_author_meta('email',$user_ID), '96' )); ?>
	      </div>
	      <div class="author_name">
	      <a href="<?php echo get_author_posts_url($user_ID); ?>"><?php the_author_meta('display_name',$user_ID); ?></a>
	      </div>
	      <div class="author_text">
	      <?php the_author_meta('description',$user_ID); ?>
	      </div>
	      <div class="author_social">
	      
	     <?php $authordesc = get_the_author_meta( 'facebook',    $user_ID ); if ( ! empty ( $authordesc ) ) { ?><a href="https://www.facebook.com/<?php the_author_meta('facebook', $user_ID); ?>" target="blank"><img src="<?php bloginfo('template_directory'); ?>/images/author/facebook.png"></a><?php } ?>
	     <?php $authordesc = get_the_author_meta( 'twitter',     $user_ID ); if ( ! empty ( $authordesc ) ) { ?><a href="http://www.twitter.com/<?php the_author_meta('twitter', $user_ID); ?>" target="blank"><img src="<?php bloginfo('template_directory'); ?>/images/author/twitter.png"></a><?php } ?>
	     <?php $authordesc = get_the_author_meta( 'google_plus', $user_ID ); if ( ! empty ( $authordesc ) ) { ?><a href="https://plus.google.com/<?php the_author_meta('google_plus', $user_ID); ?>" target="blank"><img src="<?php bloginfo('template_directory'); ?>/images/author/google.png"></a><?php } ?>

	      </div>
	      </div>
	  </section>
	  
	  
	  


	<div class="page-link">
		<div class="prev-post">
			<?php previous_post_link('%link', '<< prev'); ?>
		</div>
		<div class="next-post">
			<?php next_post_link('%link', 'next >>'); ?>
		</div>
	</div>





	  <!-- related article -->
	  <section>
	      <div class="related_article">
	      <p>Related article
	      </p>
	      <div class="related_article_area">
	      <!-- loop start -->
	      

	<?php
		$cat = get_the_category();
		$cat = $cat[0];
		$cat_id = $cat->cat_ID;
		$id = get_the_ID();
		
		$query = array(
					'cat'            => $cat_id ,
					'posts_per_page' => 6, 
					'post__not_in'   => array($id));
		
		
		//query_posts( "cat=$cat_id&posts_per_page=6&post__not_in=$id" );
		query_posts( $query );
		// The Loop
		while ( have_posts() ) : the_post();
		
		$image_id = get_post_thumbnail_id();
		$image_url = wp_get_attachment_image_src($image_id, true);
		$category = get_the_category();
		$cat_id   = $category[0]->cat_ID;
		$cat_name = $category[0]->cat_name;
	?>
	      <a href="<?php the_permalink(); ?>" onclick="ga('send', 'event', 'matcha', 'post_bottom', '<?php the_ID(); ?>');">
	        <div class="related_article_box">
	        <div class="related_article_category" style="background-color: #ffab1a;">
	        <h3><?php echo $cat_name; ?>
	        </h3>
	        </div>
	        <div class="related_article_image">
	        <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>">
	        </div>
	        <div class="related_article_text"><?php the_title(); ?>
	        </div>
	        </div>
	      </a>
	<?php
		endwhile;
		// Reset Query
		wp_reset_query();
	?>
	      <!-- loop end -->
	      </div>
	      </div>
	  </section>
  </div><!-- post -->
</div><!-- post-area -->
</div>
</div>

<?php get_sidebar(); ?>
    <article></article>
    <!-- 無限読み込み開始 -->
<?php get_footer(); ?>