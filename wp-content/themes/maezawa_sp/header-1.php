<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta property="og:image" content="<?php if (function_exists('wp_get_attachment_thumb_url')) {echo wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID)); }?>" />


<title><?php wp_title( '-', true, 'right' ); ?></title>

<!--language select-->
<script language="javascript">
<!--
function navi(obj) {
 url = obj.options[obj.selectedIndex].value;
 if(url != "") {
   location.href = url;
  }
}
//-->
</script><!--language select-->


<!--[if lt IE 9]>


<!-- area select -->
<link rel="stylesheet" type="text/css" href="style.css" />
<script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.droppy.js"></script>
<script type='text/javascript'>
  $(function() {
    $('#nav').droppy({
        speed: 100
    });
  });
</script><!-- area select -->



<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/iecss.css" />
<![endif]-->
<?php if(get_option('ht_favicon')) { ?><link rel="shortcut icon" href="<?php echo get_option('ht_favicon'); ?>" /><?php } ?>
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php $analytics = get_option('ht_tracking'); if ($analytics) { echo stripslashes($analytics); } ?>

<?php wp_head(); ?>

<style type="text/css">
<?php $customcss = get_option('ht_customcss'); if ($customcss) { echo stripslashes($customcss); } ?>
</style>
</head>



<body <?php body_class(); ?>>



<div id="site_special_sakura">

	<?php if(get_option('ht_wall_ad')) { ?>

	<div id="wallpaper">

		<?php if(get_option('ht_wall_url')) { ?>

		<a href="<?php echo get_option('ht_wall_url'); ?>" class="wallpaper-link"></a>

		<?php } ?>

	</div><!--wallpaper-->

	<?php } ?>

	<div id="wrapper">

		<div id="header-wrapper">

			<div id="top-header-wrapper" style="margin-top: 0px; margin-bottom: 45px;">

				<div id="top-nav">

					<?php wp_nav_menu(array('theme_location' => 'secondary-menu')); ?>

				</div><!--top-nav-->

				<div id="content-social">

					<ul>

						<?php if(get_option('ht_facebook')) { ?>

						<li><a href="http://www.facebook.com/<?php echo get_option('ht_facebook'); ?>" alt="Facebook" class="fb-but" target="_blank"></a></li>

						<?php } ?>

						<?php if(get_option('ht_twitter')) { ?>

						<li><a href="http://www.twitter.com/<?php echo get_option('ht_twitter'); ?>" alt="Twitter" class="twitter-but" target="_blank"></a></li>

						<?php } ?>

						<?php if(get_option('ht_pinterest')) { ?>

						<li><a href="http://www.pinterest.com/<?php echo get_option('ht_pinterest'); ?>" alt="Pinterest" class="pinterest-but" target="_blank"></a></li>

						<?php } ?>

						<?php if(get_option('ht_instagram')) { ?>

						<li><a href="http://www.instagram.com/<?php echo get_option('ht_instagram'); ?>" alt="Instagram" class="instagram-but" target="_blank"></a></li>

						<?php } ?>

						<?php if(get_option('ht_google')) { ?>

						<li><a href="<?php echo get_option('ht_google'); ?>" alt="Google Plus" class="google-but" target="_blank"></a></li>

						<?php } ?>

						<?php if(get_option('ht_youtube')) { ?>

						<li><a href="http://www.youtube.com/user/<?php echo get_option('ht_youtube'); ?>" alt="YouTube" class="youtube-but" target="_blank"></a></li>

						<?php } ?>

						<?php if(get_option('ht_linkedin')) { ?>

						<li><a href="http://www.linkedin.com/company/<?php echo get_option('ht_linkedin'); ?>" alt="Linkedin" class="linkedin-but" target="_blank"></a></li>

						<?php } ?>

						<li><a href="<?php bloginfo('rss_url'); ?>" alt="RSS Feed" class="rss-but"></a></li>

					</ul>

				</div><!--content-social-->



 	                	<div id="language">	
		                <form method=post>
<select onChange="navi(this)">
<!-- valueにURLを記入 -->
<option value=""> Language 
<option value="http://mcha-jp.com">English
<option value="http://mcha-cn.com">中文简体
<option value="http://mcha-tw.com">中文繁體
<option value="http://mcha-kr.com">한국어
<option value="http://mcha.jp">日本語
<option value="http://mcha-easy.com">やさしい日本語
</select>
</form>
                		</div><!--select-language-->
		
			</div><!--top-header-wrapper-->

			<?php if(get_option('ht_ad_layout') == 'Above Logo') { ?>

			<?php if(get_option('ht_leader_ad')) { ?>

			<div id="leader-wrapper">

				<div id="ad-970">

					<?php $ad970 = get_option('ht_leader_ad'); if ($ad970) { echo stripslashes($ad970); } ?>

				</div><!--ad-970-->

			</div><!--leader-wrapper-->

			<?php } ?>

			<div id="logo-wrapper" itemscope itemtype="http://schema.org/Organization">

				<?php if(get_option('ht_logo')) { ?>

					<a itemprop="url" href="<?php echo home_url(); ?>"><img itemprop="logo" style="padding-bottom: 0px; padding-top: 0px; margin-top: -25px; margin-bottom: 0px; border-top-width: 0px; width: 280px; height: 70px;" src="<?php echo get_option('ht_logo'); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>

				<?php } else { ?>

					<a itemprop="url" href="<?php echo home_url(); ?>"><img itemprop="logo" src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a>

				<?php } ?>

			</div><!--logo-wrapper-->

			<?php } else { ?>

			<?php if(get_option('ht_leader_ad')) { ?>

			<div id="leader-small">

				<div id="ad-728">

					<?php $ad970 = get_option('ht_leader_ad'); if ($ad970) { echo stripslashes($ad970); } ?>

				</div><!--ad-728-->

			</div><!--leader-small-->

			<?php } ?>

			<div id="logo-small" itemscope itemtype="http://schema.org/Organization">

				<?php if(get_option('ht_logo')) { ?>

					<a itemprop="url" href="<?php echo home_url(); ?>"><img itemprop="logo" src="<?php echo get_option('ht_logo'); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>

				<?php } else { ?>

					<a itemprop="url" href="<?php echo home_url(); ?>"><img itemprop="logo" src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a>

				<?php } ?>

			</div><!--logo-small-->

			<?php } ?>

		</div><!--header-wrapper-->

 

		<div id="nav-wrapper">

<ul id="nav" class="droppy">
    <li><a href="#">Select Area ▼</a>
        <ul>
            <li><a href="#">東京都内23区</a>
                    <ul class="dropdown2">
                    <li><a href="http://mcha.jp/tag/tokyo_area1">東京駅・銀座・日本橋</a></li>
                    <li><a href="http://mcha.jp/tag/tokyo_area2">赤坂・六本木・麻布</a></li>
                    <li><a href="http://mcha.jp/tag/tokyo_area3">渋谷・青山・恵比寿・目黒</a></li>
                    <li><a href="http://mcha.jp/tag/tokyo_area5">新宿・中野・杉並</a></li>
                    <li><a href="http://mcha.jp/tag/tokyo_area6">池袋・赤羽・板橋・練馬</a></li>
                    <li><a href="http://mcha.jp/tag/tokyo_area7">御茶ノ水・水道橋・飯田橋</a></li>
                    <li><a href="http://mcha.jp/tag/tokyo_area8">上野・浅草・両国</a></li>
               	　　</ul>
                <li><a href="http://mcha.jp/tag/kansai-area">京都・大阪</a></li>
	　　</li>
                
        </ul>
    </li>
	</ul><!--select-area-->

			<ul class="main-nav">

				<?php wp_nav_menu(array('theme_location' => 'primary-menu')); ?>

			</ul><!--main-nav-->

			<div id="nav-mobi">

 				<?php wp_nav_menu(array( 'theme_location' => 'primary-menu', 'items_wrap' => '<select><option value="#">'.__('Menu', 'mvp-text').'</option>%3$s</select>', 'walker' => new select_menu_walker() )); ?>

			</div><!--nav-mobi-->

			<div id="main-search">

				<?php get_search_form(); ?>

			</div><!--main-search-->

		</div><!--nav-wrapper-->