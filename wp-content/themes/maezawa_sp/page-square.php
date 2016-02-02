<?php
/*
Template Name: not-square
*/
	get_header();
	$cat      = get_the_category();
	$cat      = $cat[0];
	$cat_name = $cat->cat_name;
	$cat_slug = $cat->slug;
	
?>
    <!-- main area -->
    <article>
      <div id="wrapper">
      <!-- main -->
      <div id="main-notside">
      <div class="center">
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
  <section>
      <div class="tittle">
      
      <?php /*
      <img src="<?php print wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>">
      */ ?>
      <h1><?php single_post_title(); ?></h1>
      </div>
      <div class="notside_article">
      <?php
      	//echo $post->post_content;
      	echo apply_filters('the_content', $post->post_content);
      ?>
      <?php

	$tag_name = get_post_meta(get_the_ID(), 'meta_tag_name_1', true);
	if($tag_name){

		$paged = get_query_var('paged');
		//meta_key=ranking&orderby=meta_key&order=asc
		$args = "tag=$tag_name&posts_per_page=30";
		if($paged){
			$args .= "&paged=". $paged;
		}
		
		query_posts( $args );
		// The Loop
		while ( have_posts() ) : the_post();
		
		$image_id = get_post_thumbnail_id();
		$image_url = wp_get_attachment_image_src($image_id, true);
		$category = get_the_category();
		$cat_id   = $category[0]->cat_ID;
		$cat_name = $category[0]->cat_name;
		
	?>

		<!-- pickup_box -->
		<div class="square_pickup_box">
			<a href="<?php the_permalink(); ?>">
				<div class="square_pickup_category" style="background-color: #ffab1a;">
					<h3><?php echo $cat_name; ?> </h3>
				</div>
				<div class="square_pickup_image">
					<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>">
				</div>
				<div class="square_pickup_text">
					<?php the_title(); ?>
				</div>
			</a>

			<!-- ライターリンクをaタグの外に出す -->
			<div class="square_pickup_written">
			<?php if(jpnCheck()) : ?>
				Written by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> on <?php the_time("Y/m/d"); ?>
			<?php else : ?>
				Translated by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> on <?php the_time("Y/m/d"); ?>
			<?php endif; ?>
			</div>
		</div><!-- pickup_box_end -->
<?php
		endwhile;
		//Pagenation 
		pagination($additional_loop->max_num_pages);
		// Reset Query
		wp_reset_query();
	}else{

		$post_list = array();
		$i = 1;
		while($i <= 10){
			
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
		while($i <= 50){
			
			$post_cat = 'meta_post_cat_'.$i;
			$post_cat_val = get_post_meta(get_the_ID(), $post_cat, true);
			
			$post_num = 'meta_post_num_'.$i;
			$post_num_val = get_post_meta(get_the_ID(), $post_num, true);
			
			$post_date = 'meta_post_date_'.$i;
			$post_date_val = get_post_meta(get_the_ID(), $post_date, true);
			
			
			
			if($post_cat_val && $post_num_val){
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
						$post_date   = mysql2date(get_option( 'date_format' ), $post_info->post_date);
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
						
			if(jpnCheck()){
				$html .= '<span class="archive-byline">Written by <a href="http://mcha-jp.com/author/matcha" title="'.$post_author.' による投稿" rel="author">'.$post_author.'</a> on '.$post_date.'</span>';
			}else{
				$html .= '<span class="archive-byline">Translated by <a href="http://mcha-jp.com/author/matcha" title="'.$post_author.' による投稿" rel="author">'.$post_author.'</a> on '.$post_date.'</span>';
			}
						$html .= '<p>'.$post_desc.'</p>';
						$html .= '</div>';
						$html .= '<!--special_togoshiginza_archive-text-->';
						$html .= '</li>';
					}
				}
				$html .= '</ul>';
			}
		}
		$html .= '</div>';
		print $html;
	}
?>

      </div>
  </section>

<?php
/*
  <!-- social -->
  <section>
      <div class="social">
      <div class="social_box">
      <!-- loop start -->
      <a href="#">
        <div class="sns" style="background-color: #305098;">
        <img src="img/menu/facebook.png">share 
        </div>
      </a>
      <a href="#">
        <div class="sns" style="background-color: #00aced;">
        <img src="img/menu/twitter.png">tweet 
        </div>
      </a>
      <a href="#">
        <div class="sns" style="background-color: #DA4C36;">
        <img src="img/menu/google_plus.png">+1 
        </div>
      </a>
      <!-- loop end -->
      </div>

      <!-- social_ad -->
      <div class="ad">
      <img src="img/sample/ad.jpg">
      </div>
      </div>
  </section>


  <!-- author -->
  <section>
      <div class="author">
      <p>Author
      </p>
      <div class="author_img">
      <img src="img/author/ai_yoneda.jpg">
      </div>
      <div class="author_name">
      <a href="#">AI Yoneda</a>
      </div>
      <div class="author_text"> 
      </div>
      <div class="author_social">
      <a href="#">
        <img src="img/author/facebook.png">
      </a>
      <a href="#">
        <img src="img/author/twitter.png">
      </a>
      <a href="#">
        <img src="img/author/google.png">
      </a>
      </div>
      </div>
  </section>


  <!-- related article -->
  <section>
      <div class="related_article">
      <p>Related article
      </p>
      <div class="related_article_area">
      <!-- loop start -->
      <a href="#">
        <div class="related_article_box">
        <div class="related_article_category" style="background-color: #ffab1a;">
        <h3>FOOD 
        </h3>
        </div>
        <div class="related_article_image">
        <img src="img/sample/pack7-1024x682.jpg">
        </div>
        <div class="related_article_text">日本みやげにもぴったり！ インスタントお味噌汁の作り方 
        </div>
        </div>
      </a>
      <a href="#">
        <div class="related_article_box">
        <div class="related_article_category" style="background-color: #d44c4c;">
        <h3>HOW TO 
        </h3>
        </div>
        <div class="related_article_image">
        <img src="img/sample/hashi1.jpg">
        </div>
        <div class="related_article_text">いまさら聞けない お箸の持ち方と基本的なマナー５つ 
        </div>
        </div>
      </a>
      <a href="#">
        <div class="related_article_box">
        <div class="related_article_category" style="background-color: #4fb8c4;">
        <h3>SHOP 
        </h3>
        </div>
        <div class="related_article_image">
        <img src="img/sample/th__MG_0274.jpg">
        </div>
        <div class="related_article_text">東急ハンズで買える 高品質＆和の心を感じるメイド・イン・ジャパン プロダクト5選 
        </div>
        </div>
      </a>
      <!-- loop end -->
      </div>

      <div class="related_article_area">
      <!-- loop start -->
      <a href="#">
        <div class="related_article_box">
        <div class="related_article_category" style="background-color: #ffab1a;">
        <h3>FOOD 
        </h3>
        </div>
        <div class="related_article_image">
        <img src="img/sample/edf4b17a9cfc8639689e3d45e699ce52.jpg">
        </div>
        <div class="related_article_text">老舗料亭をリノベーション。赤坂「あかりまど」で大正ロマンを感じる 
        </div>
        </div>
      </a>
      <a href="#">
        <div class="related_article_box">
        <div class="related_article_category" style="background-color: #dbd15c;">
        <h3>SPOT 
        </h3>
        </div>
        <div class="related_article_image">
        <img src="img/sample/ureshinoashiyu-model.jpg">
        </div>
        <div class="related_article_text">日本三大美肌の湯を気軽に体験。嬉野の足湯どころ 
        </div>
        </div>
      </a>
      <a href="#">
        <div class="related_article_box">
        <div class="related_article_category" style="background-color: #68c44f;">
        <h3>CULTURE 
        </h3>
        </div>
        <div class="related_article_image">
        <img src="img/sample/DSC04001.jpg">
        </div>
        <div class="related_article_text">ただ暑いというわけではない「日本の夏」と気をつけておきたい熱中症 
        </div>
        </div>
      </a>
      <!-- loop end -->
      </div>
      </div>
  </section>
*/
?>

</div>
</div>

    <article></article>
    <!-- 無限読み込み開始 -->
<?php get_footer(); ?>