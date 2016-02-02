<?php
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
      <div id="main">
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
      
      <h1><?php single_post_title(); ?></h1>
      </div>
      <div class="article">
      <?php
      	//echo $post->post_content;
      	echo apply_filters('the_content', $post->post_content);
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

<?php get_sidebar(); ?>
    <article></article>
    <!-- 無限読み込み開始 -->
<?php get_footer(); ?>