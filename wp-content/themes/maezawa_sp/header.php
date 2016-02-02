<!DOCTYPE html>
<html lang="ja">
  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <!-- meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
    <!-- SEO -->
    <!-- CSS -->
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>lib/assets/css/prefectly.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>css/common.css" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>css/header.css" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>css/main.css" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>css/sidebar.css" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>css/footer.css" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/responsive.css" type="text/css" />
    <!-- js -->
 	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
 	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
 	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/slider.js"></script>
 	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/accordion.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/map.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/modal.js"></script>
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>


<!--OGP開始-->
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@matcha_global" />
<meta property="fb:app_id" content="668305889871442" />
<meta property="og:locale" content="ja_JP">
<?php
if (is_single() or is_page()){ // 投稿記事
     if(have_posts()): while(have_posts()): the_post();
          echo '<meta property="og:description" content="'.get_the_excerpt().'">';echo "\n";//抜粋から
     endwhile; endif;
     echo '<meta property="og:type" content="article">';echo "\n";
     echo '<meta property="og:url" content="'; the_permalink(); echo '">';echo "\n";//投稿記事パーマリンク
     echo '<meta property="og:title" content="'; wp_title( '-', true, 'right' ); echo '">';echo "\n";//「一般設定」で入力したブログのタイトル
} else {//投稿記事以外（ホーム、カテゴリーなど）
     echo '<meta property="og:type" content="blog">';echo "\n";
     echo '<meta property="og:description" content="'; bloginfo('description'); echo '">';echo "\n";//「一般設定」で入力したブログの説明文
     echo '<meta property="og:title" content="'; bloginfo('name'); echo '">';echo "\n";//「一般設定」で入力したブログのタイトル
     echo '<meta property="og:url" content="'; bloginfo('url'); echo '">';echo "\n";//「一般設定」で入力したブログのURL
}
?>
<meta property="og:site_name" content="<?php bloginfo('name'); ?>">
<?php
$str = $post->post_content;
$searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';//投稿記事に画像があるか調べる
if (is_single() or is_page()){//投稿記事か固定ページの場合
if (has_post_thumbnail()){//アイキャッチがある場合
     $image_id = get_post_thumbnail_id();
     $image = wp_get_attachment_image_src( $image_id, 'full');
     echo '<meta property="og:image" content="'.$image[0].'">';echo "\n";
} else if ( preg_match( $searchPattern, $str, $imgurl ) && !is_archive()) {//アイキャッチは無いが画像がある場合
     echo '<meta property="og:image" content="'.$imgurl[2].'">';echo "\n";
} else {//画像が1つも無い場合
     echo '<meta property="og:image" content="http://mcha.jp/wp-content/uploads/2014/04/facebook_img.png">';echo "\n";
}
} else {//投稿記事や固定ページ以外の場合（ホーム、カテゴリーなど）
     echo '<meta property="og:image" content="http://mcha.jp/wp-content/uploads/2014/04/facebook_img.png">';echo "\n";
}
?>
<!--OGP完了-->


    <?php
		if(is_home()){
			print "<title> MATCHA - 訪日外国人観光客向けWebマガジン</title>";
		}else{
			print "<title>";
			single_post_title();
			print "| MATCHA - 訪日外国人観光客向けWebマガジン</title>";
		}
    ?>
    
    <meta name="author" content="MATCHA">
    <meta name="copyright" content="MATCHA">
    <!-- CSS -->
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" type="text/css" />
    <!-- favicon -->
    <link rel="icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" type="image/vnd.microsoft.icon">
    <!-- canonical -->
    <link rel="canonical" href="#">
    <?php wp_head(); ?>
    
    
    
    
    <?php if(is_front_page()): ?>
	<style type="text/css">  
	<!--
	#main {margin-top: 0px;}
	.sidebar {margin-top: 100px;}
	@media screen and (max-width: 960px){
	#main {margin-top: 62px;}
	}
	-->  
	</style>  
    <?php endif; ?>
    
    
  </head>
  <body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



    <!-- header -->
    <header>
      <div class="nav">
        <div class="logo">
          <a href="<?php bloginfo('home'); ?>">
            <img src="<?php bloginfo('template_directory'); ?>/images/logo1.png">
          </a>
        </div>
        <div class="button">
          <img id="menu" onclick="changeIMG()" src="<?php bloginfo('template_directory'); ?>/images/menu/icon_menu_open.jpg" alt="menu_button">
        </div>
        <!-- responsive_menu -->
        <nav>
          <div class="responsive_menu">
            <!-- loop start -->
            <ul class="tab">
              <li class="tab_content">
                <label class="tab_label" for="menu1">
                  <img src="<?php bloginfo('template_directory'); ?>/images/menu/items.jpg">
                </label>
              </li>
              <li class="tab_content">
                <label class="tab_label" for="menu2">
                  <img src="<?php bloginfo('template_directory'); ?>/images/menu/spot.jpg">
                </label>
              </li>
              <li class="tab_content">
                <label class="tab_label" for="menu3">
                  <img src="<?php bloginfo('template_directory'); ?>/images/menu/sns.jpg">
                </label>
              </li>
              <li class="tab_content">
                <label class="tab_label" for="menu4">
                  <img src="<?php bloginfo('template_directory'); ?>/images/menu/search.jpg">
                </label>
              </li>
              <li class="tab_content">
                <label class="tab_label" for="menu5">
                  <img src="<?php bloginfo('template_directory'); ?>/images/menu/japan.jpg">
                </label>
              </li>
            </ul>
            <!-- loop end -->
            <!-- menu2 -->
            <input class="tab_input" type="radio" name="menu" id="menu2">
            <div class="tab_text">
              <p class="arrow_box" style="left:25%">
              </p>
              <div class="tab_contentbox">
              <?php getAreaMenuMobile(); ?>
              </div>
            </div>
            <!-- menu3 -->
            <input class="tab_input" type="radio" name="menu" id="menu3">
            <div class="tab_text">
              <p class="arrow_box" style="left:45%">
              <div class="tab_contentbox">
                <!-- loop start -->
                <div class="tab_menu3">
                  <a href="https://www.facebook.com/mcha.jp">
                    <img src="<?php bloginfo('template_directory'); ?>/images/menu/facebook.png">
                  </a>
                </div>
                <div class="tab_menu3">
                  <a href="https://twitter.com/MATCHA_global">
                    <img src="<?php bloginfo('template_directory'); ?>/images/menu/twitter.png">
                  </a>
                </div>
                <div class="tab_menu3">
                  <a href="https://www.pinterest.com/MATCHAglobal">
                    <img src="<?php bloginfo('template_directory'); ?>/images/menu/pin.png">
                  </a>
                </div>
                <div class="tab_menu3">
                  <a href="https://plus.google.com/+Mchajpcom/about">
                    <img src="<?php bloginfo('template_directory'); ?>/images/menu/google_plus.png">
                  </a>
                </div>
                <div class="tab_menu3">
                  <a href="https://instagram.com/matcha_japan/">
                    <img src="<?php bloginfo('template_directory'); ?>/images/menu/instagram.png">
                  </a>
                </div>
                <!-- loop end -->
              </div>
            </div>
            <!-- menu4 -->
            <input class="tab_input" type="radio" name="menu" id="menu4">
            <div class="tab_text">
              <p class="arrow_box" style="left:66%">
              <div class="tab_contentbox">
                <!-- loop start -->
                <div class="tab_menu4">
                  <a href="#">
                  


<form method="get" id="searchform" action="<?php bloginfo('home'); ?>" _lpchecked="1">

	<input type="text" class="search_text" name="s" id="s" value="" placeholder="search" />

	<input type="image" src="<?php bloginfo('template_directory'); ?>/images/menu/search_button.png" class="search_button" />

</form>




                  </a>
                </div>
                <!-- loop end -->
              </div>
            </div>
            <!-- menu5 -->
            <input class="tab_input" type="radio" name="menu" id="menu5" checked>
            <div class="tab_text">
              <p class="arrow_box" style="left:87%">
              </p>
              <div class="tab_contentbox">
                <!-- loop start -->
                
				<?php
				
				global $my_host;
				$hostList = getHostList();
				
				foreach($hostList as $lang => $host){
					if($host != $my_host){
						$langList .= '<div class="tab_menu5"><a href="http://'.$host.'">'.$lang.'</a></div>';
					}
				}
				print $langList;
				?>
                <!-- loop end -->
              </div>
            </div>
            <!-- menu1 -->
            <input class="tab_input" type="radio" name="menu" id="menu1" checked>
            <div class="tab_text">
              <p class="arrow_box" style="left:18px">
              </p>
              <div class="tab_contentbox">
                <!-- loop start -->
                
                
                
<?php
	$cat_all = get_terms( "category", "fields=all&get=all" );
	foreach($cat_all as $value):
	
		if($value->name == '未分類'
		or $value->name == 'EVENT'
		or $value->name == '活動'
		or $value->name == 'PERISTIWA'){ continue; } //該当したらスキップ
?>
                <div class="tab_menu1">
                  <a href="<?php echo get_category_link($value->term_id); ?>"><?php echo $value->name;?></a>
                </div>

<?php endforeach; ?>


    <div class="tab_menu1">
      <a id="modal-open" class="button-link">SPECIAL</a>
    </div>

           
                <!-- loop end -->
              </div>
            </div>
          </div>
        </nav>
        <!-- desktop_menu -->
        <nav>
          <div class="category_menu">
            <!-- loop start -->
<?php
	$cat_all = get_terms( "category", "fields=all&get=all" );
	foreach($cat_all as $value):
	
		if($value->name == '未分類'
		or $value->name == 'EVENT'
		or $value->name == '活動'
		or $value->name == 'PERISTIWA'){ continue; } //該当したらスキップ
?>
            <div class="category">
              <a href="<?php echo get_category_link($value->term_id); ?>"><?php echo $value->name;?></a>
            </div>
<?php endforeach; ?>
            <!-- loop end -->
          </div>
          <!-- menu item -->
          <div class="icon_menu">
            <nav role="navigation">
              <ul>
                <!-- menu1 -->
                <li class="menu-item-has-children">
                  <a href="#">
                    <img src="<?php bloginfo('template_directory'); ?>/images/menu/spot.jpg">
                  </a>
                  <ul class="sub-menu">
                    <p class="arrow_box">
                    </p>
                    <!-- loop start -->
                   <?php getAreaMenu(); ?>
                    <!-- loop end -->
                  </ul>
                </li>

                <!-- menu2 -->
                <li class="menu-item-has-children">
                  <a href="#">
                    <img src="<?php bloginfo('template_directory'); ?>/images/menu/japan.jpg">
                  </a>
                  <ul class="sub-menu">
                    <p class="arrow_box">
                    </p>
                    <!-- loop start -->
					<?php
					/*
					foreach($hostList as $lang => $host){
						if($host != $my_host){
							$langList .= '<li><a href="http://'.$host.'">'.$lang.'</a></li>';
						}
					}*/
					print $langList;
					?>
                    
                  </ul>
                </li>

                <!-- menu3 -->    
                <li>
                  <a href="#">
                  
                  
                  
                    <form method="get" id="searchform" action="<?php bloginfo('home'); ?>" _lpchecked="1">

	<input type="text" class="search_text" name="s" id="s" value="" placeholder="search" />

	<input type="image" src="<?php bloginfo('template_directory'); ?>/images/menu/search_button.png" class="search_button" />

</form>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </nav>
      </header>
      
<!-- ここからモーダルウィンドウ -->

<div class="modal close">
	  <a id="modal-close" cluss="button-link"><img src="<?php bloginfo('template_directory'); ?>/images/close.png"></a>
</div>

<div class="modal modal-content">
	
<!-- モーダルウィンドウのコンテンツ開始 -->


<?php dynamic_sidebar('side-widget'); ?>

	
<!-- モーダルウィンドウのコンテンツ終了 -->
</div>
<!-- ここまでモーダルウィンドウ -->