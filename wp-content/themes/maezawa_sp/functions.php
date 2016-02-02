<?php

require_once locate_template('lib/ads.php'); //広告関係


add_filter( 'ppp_nonce_life', 'my_nonce_life' );
function my_nonce_life() {
	return 60 * 60 * 24 * 10;	// 10 日間（秒×分×時間×日）
}

//20150203 add kuribayashi
//youtubeハミ出し対応
	if ( !function_exists( 'add_video_container' ) ) {
			function add_video_container( $html, $url, $attr ) {
				if( strpos( $html, '<iframe width' ) !== false ){
					return '<div class="video-container">'.$html.'</div>';
				}else{
					return $html;
			}
		}
	}
	add_filter( 'embed_oembed_html', 'add_video_container', 10, 3 );

/*
 * ソーシャルシェアボタン表示
 * 20150204 add kuribayashi
 *
 */
	function social_share_old(){

		$post_id    = get_the_ID();
		$post_url   = get_the_permalink();
		$post_title = get_the_title();
		$fb_share   = 'https://www.facebook.com/sharer/sharer.php?u='.$post_url.'%3futm_source%3dsocial%26utm_medium%3dfacebook%26utm_campaign%3dshare';
		$tw_share   = 'https://twitter.com/intent/tweet?text='.$post_title.'&url='.$post_url.'%3futm_source%3dsocial%26utm_medium%3dtwitter%26utm_campaign%3dretweet';
		print <<<SOCIAL_SHARE
	<div class="social-share-box">
		
		<div class="fb-share-btn">
			<a href="{$fb_share}" target="_blank" onclick="ga('send', 'event', 'share', 'facebook', '{$post_id}');">Share</a>
		</div><!--fb-share-btn-->
		
		<div class="retw-btn">
			<a href="{$tw_share}" target="_blank" onclick="ga('send', 'event', 'share', 'twitter', '{$post_id}');">Tweet</a>
		</div><!--retw-btn-->

	</div><!--social-share-box-->
SOCIAL_SHARE;
	}


/*
 * アナリティクスイベントとラッキング用コード出力
 * 20150205 add kuribayashi
 *
 */
	function tracking_code(){
		
		$domain_name = $_SERVER[“SERVER_NAME”];

		if(!$domain_name){ $domain_name = 'mcha-jp.com';}

		print <<<EVENT_TRACKING_CODE
	<script type="text/javascript">jQuery(function() {  
	    jQuery("a").click(function(e) {        
	        var ahref = jQuery(this).attr('href');
	        if (ahref.indexOf("{$domain_name}") != -1 || ahref.indexOf("http") == -1 ) {
	            ga('send', 'event', '内部リンク', 'クリック', ahref);} 
	        else { 
	            ga('send', 'event', '外部リンク', 'クリック', ahref);}
	        });
	    });
	</script>
EVENT_TRACKING_CODE;
	}

/*
 * 投稿画面にマニュアル表示
 * 20150209 add kuribayashi
 *
 */
	add_action('admin_menu', 'add_layout_custom_box');
	function add_layout_custom_box() {
	    //ページ編集画面にカスタムセクションを追加
	    add_meta_box('page_layout', 'Layout', 'html_source_for_layout_custom_box', 'page', 'normal', 'high');
	}
	// 中身
	function nskw_meta_box_inside() {
	    echo <<<HTML
	マニュアルは<a href="http://mcha.jp/member/" target="_blank"><font size="5" color="#ff0000"><b>こちら</b></font></a>
	<br>
	ID : member140203<br>
	PASS : member140203
HTML;
	}
	// メタボックスを追加する
	function nskw_meta_box_output() {
	    add_meta_box('nskw_meta_post_page', '<font color="#ff0000">投稿マニュアルをご覧ください</font>', 'nskw_meta_box_inside', 'post', 'side', 'low' );
	}
	// フックする
	add_action('admin_menu', 'nskw_meta_box_output' );

/*
 * アイキャッチ画像を必須項目に
 * 20150209 add kuribayashi
 *
 */
	add_action( 'admin_head-post-new.php', 'my_title_required' );
	add_action( 'admin_head-post.php', 'my_title_required' );

	function my_title_required() {
		print <<<HTML
			<script type="text/javascript">
				jQuery(document).ready(function($){
						$("#post").submit(function(e){
							if('アイキャッチ画像を設定' == $('#postimagediv .inside p a').text()) {
							
								alert('アイキャッチ画像を設定してください');

								$('#ajax-loading').css('visibility', 'hidden');
								$('#publish').removeClass('button-primary-disabled');
								return false;
							}
						});
				});
			</script>
HTML;
	}
/*
 * 記事作成ページインフォメーション自動入力
 *
 */
	add_action( 'admin_footer-post-new.php', 'newPostAddInfo' );
	add_action( 'admin_footer-post.php', 'newPostAddInfo' );

	function newPostAddInfo() {
		if(jpnCheck()){
			print <<<HTML
				<script type="text/javascript">
					if(document.post.content.value == ""){
						p=document.getElementsByName("content");
						
						p.item(0).value  = '<h3>Information</h3>\\r\\n';
						p.item(0).value += '<strong>（店舗名orスポット名or地域名）</strong>\\r\\n\\r\\n';

						p.item(0).value += '住所：\\r\\n';
						p.item(0).value += '営業時間：\\r\\n';
						p.item(0).value += '定休日：\\r\\n';
						p.item(0).value += 'Wi-Fi環境：\\r\\n';
						p.item(0).value += 'クレジットカードの有無と種類：\\r\\n';
						p.item(0).value += '言語対応レベル：\\r\\n';
						p.item(0).value += '他言語メニューの有無：\\r\\n';
						p.item(0).value += '最寄り駅：\\r\\n';
						p.item(0).value += 'アクセス：（○○出口から徒歩△分）\\r\\n';
						p.item(0).value += '価格帯：\\r\\n';
						p.item(0).value += '宗教情報：\\r\\n';
						p.item(0).value += '電話番号：03-xxxx-xxxx\\r\\n';
						p.item(0).value += '公式HP：<a href="http://www.○○○.jp" target="_blank">店舗名</a>';
					}
				</script>
HTML;
		}
	}
	
// remove wp version param from any enqueued scripts
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );






// カスタムフィールド追加
add_action('admin_menu', 'add_custom_fields');
add_action('save_post', 'save_custom_fields');
 
function add_custom_fields() {
 	add_meta_box( 'my_sectionid', '特集一覧追加', 'my_custom_fields', 'page');
}
 
function my_custom_fields() {
	global $post;
	
	//タグ入力
	$tag_name = 'meta_tag_name_1';
	$meta_tag_name = get_post_meta($post->ID,$tag_name,true);
	echo "<p>タグ名 ";
	echo '：<input type="text" name="meta_tag_name_1" value="'.esc_html($meta_tag_name).'" size="10" /></p>';
	echo "<p>http://mcha.jp/tag/<b style='color:#F00;'>saga</b> （タグページURLの赤字部分を入力）</p>";
	echo "<br>";
	
	//カテゴリ入力
	$i = 1;
	while($i <= 10){
		$cat_name = 'meta_cat_name_'.$i;
		$meta_cat_name = get_post_meta($post->ID,$cat_name,true);

		echo "<p>カテゴリNo.{$i} ";
		echo '：<input type="text" name="meta_cat_name_'.$i.'" value="'.esc_html($meta_cat_name).'" size="70" /></p>';
		$i++;
	}
	
	//カテゴリNo、記事No、公開日入力欄
	$i = 1;
	while($i <= 50){
		$cat = 'meta_post_cat_'.$i;
		$name = 'meta_post_num_'.$i;
		$date = 'meta_post_date_'.$i;

		$meta_post_cat = get_post_meta($post->ID,$cat,true);
		$meta_post_num  = get_post_meta($post->ID,$name,true);
		$meta_post_date = get_post_meta($post->ID,$date,true);
		
		echo "<p>【記事_{$i}】 ";
		echo 'カテゴリNo：<input type="text" name="meta_post_cat_'.$i.'" value="'.esc_html($meta_post_cat).'" size="3" />　';
		echo '投稿ID：<input type="text" name="meta_post_num_'.$i.'" value="'.esc_html($meta_post_num).'" size="7" />　';
		echo '公開日：<input type="date" name="meta_post_date_'.$i.'" value="'.esc_html($meta_post_date).'" size="8" /></p>';
		$i++;
	}
}
 
// カスタムフィールドの値を保存
function save_custom_fields( $post_id ) {

	//タグ名保存
	$tag_name = 'meta_tag_name_1';
	if(!empty($_POST[$tag_name])){
		update_post_meta($post_id, $tag_name, $_POST[$tag_name] );
	}else{
		delete_post_meta($post_id, $tag_name);
	}

	$i = 1;
	while($i <= 10){
		
		$cat_name = 'meta_cat_name_'.$i;
		if(!empty($_POST[$cat_name])){
			update_post_meta($post_id, $cat_name, $_POST[$cat_name] );
		}else{
			delete_post_meta($post_id, $cat_name);
		}
		$i++;
	}

	$i = 1;
	while($i <= 50){
		
		$cat = 'meta_post_cat_'.$i;
		if(!empty($_POST[$cat])){
			update_post_meta($post_id, $cat, $_POST[$cat] );
		}else{
			delete_post_meta($post_id, $cat);
		}
		
		$name = 'meta_post_num_'.$i;
		if(!empty($_POST[$name])){
			update_post_meta($post_id, $name, $_POST[$name] );
		}else{
			delete_post_meta($post_id, $name);
		}
	
		$date = 'meta_post_date_'.$i;
		if(!empty($_POST[$date])){
			update_post_meta($post_id, $date, $_POST[$date] );
		}else{
			delete_post_meta($post_id, $date);
		}
		$i++;
	}
}

function edit_images_before_upload($file) { 
	if ($file['type'] == 'image/jpeg') { 
		$image = wp_get_image_editor($file['file']); 
		if (! is_wp_error($image)) { 
			$exif = exif_read_data($file['file']); 
			$orientation = $exif['Orientation']; 
			$max_width = 1300; 
			$max_height = 1300; 
			$size = $image->get_size(); 
			$width = $size['width']; 
			$height = $size['height']; 
			if ($width > $max_width || $height > $max_height) { 
				$image->resize($max_width, $max_height, false); 
			} 
			if (! empty($orientation)) { 
				switch ($orientation) { 
					case 8: 
						$image->rotate(90); 
						break; 
					case 3: 
						$image->rotate(180); 
						break; 
					case 6: 
						$image->rotate(-90); 
						break; 
				} 
			} 
			$image->save($file['file']); 
		} 
	} 
	return $file; 
} 
add_action('wp_handle_upload', 'edit_images_before_upload');

add_filter('content_save_pre','test_save_pre');
function test_save_pre($content){
    global $allowedposttags;
 
    // iframeとiframeで使える属性を指定する
    $allowedposttags['iframe'] = array('class' => array () , 'src'=>array() , 'width'=>array(),
    'height'=>array() , 'frameborder' => array() , 'scrolling'=>array(),'marginheight'=>array(),
    'marginwidth'=>array());
 
    return $content;
}

//add_filter('user_can_richedit', create_function('' , 'return false;'), 50);

// add shortcode to show eyecatch of post
// [post id="1234"]
function display_post_shortcode($atts) {
    $post_id = $atts['id'];
    $html = '<div class="post_in_article"><div class="post_in_left">';
    $html .= '<a href="' . get_permalink($post_id) . '">'
        . get_the_post_thumbnail( $post_id, "post-thumb" );
    $html .= '</a></div>';
    $html .= '<div class="post_in_right">';
    $html .= '<a href="' . get_permalink($post_id) . '">'
        . get_the_title($post_id);
    $html .= '</a></div></div>';
    return $html;
}
add_shortcode( 'post', 'display_post_shortcode' );

//RSSにアイキャッチ画像追加
function rss_post_thumbnail($content) {
global $post;
if(has_post_thumbnail($post->ID)) {
$content = '<p>' . get_the_post_thumbnail($post->ID) . '</p>' . $content;
}
return $content;
}
add_filter('the_excerpt_rss', 'rss_post_thumbnail');
add_filter('the_content_feed', 'rss_post_thumbnail');

function new_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');



function getHostList(){
	return array(
				'English'        => 'mcha-jp.com',
				'한국어'         => 'mcha-kr.com',
				'中文简体'       => 'mcha-cn.com',
				'中文繁體'       => 'mcha-tw.com',
				'Indonesian'     => 'mcha-id.com',
				'ภาษาไทย'        => 'mcha-th.com',
				'Vietnamese'     => 'mcha.vn',
				'日本語'         => 'mcha.jp',
				'やさしい日本語' => 'mcha-easy.com');
}

// サイドバーウィジェット
register_sidebar(array(
     'name' => 'side-widget', //作成するウィジェットの名前（お好きな名前で）
     'before_widget' => '<div class="widddget">', //ウィジェットを囲む開始タグ
     'after_widget' => '</div>', //ウィジェットを囲む終了タグ
     'before_title' => '<h3>', //ウィジェットタイトルを囲む開始タグ
     'after_title' => '</h3>', //ウィジェットタイトルを囲む終了タグ
));

// サイドバーウィジェット
register_sidebar(array(
     'name' => 'post-bottom-widget', //作成するウィジェットの名前（お好きな名前で）
     'before_widget' => '<div class="post-bottom-widddget">', //ウィジェットを囲む開始タグ
     'after_widget' => '</div>', //ウィジェットを囲む終了タグ
     'before_title' => '<h3>', //ウィジェットタイトルを囲む開始タグ
     'after_title' => '</h3>', //ウィジェットタイトルを囲む終了タグ
));

function removeWidthHeight($string){
	$res = preg_replace('/( width| height)=("|\')[0-9]*("|\')/','',$string);
	return $res;
}

function getAreaMenu(){

	global $my_host;
	if($my_host == 'mcha-id.com'){
		print <<<AREA
			<li>
				<a><span>Tokyo</span></a>
				<ul>
					<li><a href="http://mcha-id.com/tag/tokyo-area3">Shibuya・Ebisu・Daikanyama</a></li>
					<li><a href="http://mcha-id.com/tag/tokyo-area4">Shinjuku・Yoyogi・Okubo</a></li>
					<li><a href="http://mcha-id.com/tag/tokyo-area6">Harajuku・Omotesando・Aoyama</a></li>
					<li><a href="http://mcha-id.com/tag/tokyo-area10">Akihabara・Kanda・Suidobashi</a></li>
					<li><a href="http://mcha-id.com/tag/tokyo-area11">Ueno・Asakusa・Nippori</a></li>
				</ul>
				<li><a href="http://mcha-id.com/tag/kansai-area">Kyoto・Osaka</a></li>
			</li>
AREA;
	}else if($my_host == 'mcha.jp'){
		print <<<AREA
			<li>
				<a><span>東京</span></a>
				<ul>
					<li><a href="http://mcha.jp/tag/tokyo-area2">東京・日本橋</a></li>
					<li><a href="http://mcha.jp/tag/tokyo-area11">上野・浅草・日暮里</a></li>
					<li><a href="http://mcha.jp/tag/tokyo-area10">秋葉原・神田・水道橋</a></li>
					<li><a href="http://mcha.jp/tag/tokyo-area3">渋谷・恵比寿・代官山</a></li>
					<li><a href="http://mcha.jp/tag/tokyo-area6">原宿・表参道・青山</a></li>
					<li><a href="http://mcha.jp/tag/tokyo-area4">新宿・代々木・大久保</a></li>
					<li><a href="http://mcha.jp/tag/tokyo-area19">中野・西荻窪・吉祥寺</a></li>
					<li><a href="http://mcha.jp/tag/tokyo-area5">池袋・高田馬場・早稲田</a></li>
					<li><a href="http://mcha.jp/tag/tokyo-area7">六本木・麻布・広尾</a></li>
					<li><a href="http://mcha.jp/tag/tokyo-area1">銀座・新橋・有楽町</a></li>
					<li><a href="http://mcha.jp/tag/tokyo-area9">四ツ谷・市ヶ谷・飯田橋</a></li>
					<li><a href="http://mcha.jp/tag/tokyo-area13">築地・お台場</a></li>
					<li><a href="http://mcha.jp/tag/tokyo-area26">町田・稲城・多摩</a></li>
					<li><a href="http://mcha.jp/tag/tokyo-area17">東急沿線</a></li>
				</ul>
				<li class=""><a href="http://mcha.jp/tag/kansai-area" class="">京都・大阪</a></li>
				<li class=""><a href="http://mcha.jp/okayama" class="">岡山</a></li>
			</li>
AREA;
	}else if($my_host == 'mcha-jp.com'){
		print <<<AREA
			<li>
				<a><span>Tokyo</span></a>
				<ul>
					<li><a href="http://mcha-jp.com/tag/tokyo-area2">Tokyo・Nihonbashi</a></li>
					<li><a href="http://mcha-jp.com/tag/tokyo-area3">Shibuya・Ebisu・Daikanyama</a></li>
					<li><a href="http://mcha-jp.com/tag/tokyo-area4">Shinjuku・Yoyogi・Okubo</a></li>
					<li><a href="http://mcha-jp.com/tag/tokyo-area5">Ikebukuro・Takadanobaba・Waseda</a></li>
					<li><a href="http://mcha-jp.com/tag/tokyo-area6">Harajuku・Omotesando・Aoyama</a></li>
					<li><a href="http://mcha-jp.com/tag/tokyo-area10">Akihabara・Kanda・Suidobashi</a></li>
					<li><a href="http://mcha-jp.com/tag/tokyo-area11">Ueno・Asakusa・Nippori</a></li>
					<li><a href="http://mcha-jp.com/tag/tokyo-area14">Hamamatsucho・Tamachi・Shinagawa</a></li>
					<li><a href="http://mcha-jp.com/tag/tokyo-area19">Nakano・Nishiogikubo・Kichijoji</a></li>
					<li><a href="http://mcha-jp.com/tag/tokyo-area22">Otsuka・Sugamo・Akabane</a></li>
				</ul>
				<li><a href="http://mcha-jp.com/tag/kansai-area">Kyoto・Osaka</a></li>
				<li><a href="http://mcha-jp.com/okayama">Okayama</a></li>
			</li>
AREA;
	}else if($my_host == 'mcha-kr.com'){
		print <<<AREA
			<li>
				<a><span>Tokyo</span></a>
				<ul>
					<li><a href="http://mcha-kr.com/tag/tokyo-area2">Tokyo・Nihonbashi</a></li>
					<li><a href="http://mcha-kr.com/tag/tokyo-area3">Shibuya・Ebisu・Daikanyama</a></li>
					<li><a href="http://mcha-kr.com/tag/tokyo-area5">Ikebukuro・Takadanobaba・Waseda</a></li>
					<li><a href="http://mcha-kr.com/tag/tokyo-area6">Harajuku・Omotesando・Aoyama</a></li>
					<li><a href="http://mcha-kr.com/tag/tokyo-area10">Akihabara・Kanda・Suidobashi</a></li>
					<li><a href="http://mcha-kr.com/tag/tokyo-area11">Ueno・Asakusa・Nippori</a></li>
					<li><a href="http://mcha-kr.com/tag/tokyo-area19">Nakano・Nishiogikubo・Kichijoji</a></li>
				</ul>
			</li>
AREA;
	}else if($my_host == 'mcha-tw.com'){
		print <<<AREA
			<li>
				<a><span>東京</span></a>
				<ul>
					<li><a href="http://mcha-tw.com/tag/tokyo-area3">澀谷・惠比壽・代官山</a></li>
					<li><a href="http://mcha-tw.com/tag/tokyo-area4">新宿・代代木・大久保</a></li>
					<li><a href="http://mcha-tw.com/tag/tokyo-area5">池袋・高田馬場・早稻田</a></li>
					<li><a href="http://mcha-tw.com/tag/tokyo-area6">原宿・表參道・青山</a></li>
					<li><a href="http://mcha-tw.com/tag/tokyo-area10">秋葉原・神田・水道橋</a></li>
					<li><a href="http://mcha-tw.com/tag/tokyo-area11">上野・淺草・日暮里</a></li>
					<li><a href="http://mcha-tw.com/tag/tokyo-area19">中野・西荻窪・吉祥寺</a></li>
				</ul>
			</li>
AREA;
	}else if($my_host == 'mcha-cn.com'){
		print <<<AREA
			<li>
				<a><span>東京</span></a>
				<ul>
					<li><a href="http://mcha-cn.com/tag/tokyo-area1">银座・新桥・有乐町</a></li>
					<li><a href="http://mcha-cn.com/tag/tokyo-area2">东京・日本桥</a></li>
					<li><a href="http://mcha-cn.com/tag/tokyo-area3">涩谷 ・惠比寿 ・代官山</a></li>
					<li><a href="http://mcha-cn.com/tag/tokyo-area4">新宿 ・代代木・大久保</a></li>
					<li><a href="http://mcha-cn.com/tag/tokyo-area5">池袋 ・高田马场 ・早稻田</a></li>
					<li><a href="http://mcha-cn.com/tag/tokyo-area6">原宿・表参道・青山</a></li>
					<li><a href="http://mcha-cn.com/tag/tokyo-area7">六本木・西麻布・广尾</a></li>
					<li><a href="http://mcha-cn.com/tag/tokyo-area8">赤坂・永田町・溜池山王</a></li>
					<li><a href="http://mcha-cn.com/tag/tokyo-area9">四谷・市谷・饭田桥</a></li>
					<li><a href="http://mcha-cn.com/tag/tokyo-area10">秋叶原・神田・水道桥</a></li>
					<li><a href="http://mcha-cn.com/tag/tokyo-area11">上野・浅草・日暮里</a></li>
					<li><a href="http://mcha-cn.com/tag/tokyo-area12">两国・锦糸町・小岩</a></li>
					<li><a href="http://mcha-cn.com/tag/tokyo-area13">筑地・台场</a></li>
					<li><a href="http://mcha-cn.com/tag/tokyo-area14">滨松町・田町・品川</a></li>
					<li><a href="http://mcha-cn.com/tag/tokyo-area15">大井・蒲田・羽田机场</a></li>
					<li><a href="http://mcha-cn.com/tag/tokyo-area16">目黑・白金・五反田</a></li>
					<li><a href="http://mcha-cn.com/tag/tokyo-area17">东急铁路</a></li>
					<li><a href="http://mcha-cn.com/tag/tokyo-area18">京王・小田急铁路</a></li>
					<li><a href="http://mcha-cn.com/tag/tokyo-area19">中野・西荻洼・吉祥寺</a></li>
					<li><a href="http://mcha-cn.com/tag/tokyo-area20">西武铁路</a></li>
					<li><a href="http://mcha-cn.com/tag/tokyo-area21">板桥・东武铁路</a></li>
					<li><a href="http://mcha-cn.com/tag/tokyo-area22">大冢・巢鸭・赤羽</a></li>
					<li><a href="http://mcha-cn.com/tag/tokyo-area23">千手・绫濑・葛饰</a></li>
					<li><a href="http://mcha-cn.com/tag/tokyo-area24">小金井・国分寺・国立</a></li>
					<li><a href="http://mcha-cn.com/tag/tokyo-area25">调布・府中・狛江</a></li>
					<li><a href="http://mcha-cn.com/tag/tokyo-area26">町田・稻城・多摩</a></li>
					<li><a href="http://mcha-cn.com/tag/tokyo-area27">西东京市区域</a></li>
					<li><a href="http://mcha-cn.com/tag/tokyo-area28">立川市・八王子市区域</a></li>
					<li><a href="http://mcha-cn.com/tag/tokyo-area29">福生市・青梅市区域</a></li>
					<li><a href="http://mcha-cn.com/tag/tokyo-area30">伊豆・小笠原岛屿</a></li>
				</ul>
			</li>
AREA;
	}else if($my_host == 'mcha-th.com'){
		print <<<AREA
			<li>
				<a><span>Tokyo</span></a>
				<ul>
					<li><a href="http://mcha-th.com/?tag=tokyo-area11">Ueno・Asakusa・Nippori</a></li>
					<li><a href="http://mcha-th.com/?tag=tokyo-area3">Shibuya・Ebisu・Daikanyama</a></li>
				</ul>
			</li>
AREA;
	}else if($my_host == 'mcha-easy.com'){
		print <<<AREA
			<li>
				<a><span><ruby>東京<rt>とうきょう</rt></ruby></span></a>
				<ul>
					<li><a href="http://mcha-easy.com/tag/tokyo-area3"><ruby>渋谷<rt>しぶや</rt></ruby>・<ruby>恵比寿<rt>えびす</rt></ruby>・<ruby>代官山<rt>だいかんやま</rt></ruby></a></li>
					<li><a href="http://mcha-easy.com/tag/tokyo-area6"><ruby>原宿<rt>はらじゅく</rt></ruby>・<ruby>表参道<rt>おもてさんどう</rt></ruby>・<ruby>青山<rt>あおやま</rt></ruby></a></li>
					<li><a href="http://mcha-easy.com/tag/tokyo-area11"><ruby>上野<rt>うえの</rt></ruby>・<ruby>浅草<rt>あさくさ</rt></ruby>・<ruby>日暮里<rt>にっぽり</rt></ruby></a></li>
					<li><a href="http://mcha-easy.com/tag/tokyo-area13"><ruby>築地<rt>つきじ</rt></ruby>・<ruby>お台場<rt>おだいば</rt></ruby></a></li>
				</ul>
				<li><a href="http://mcha-easy.com/tag/kansai-area"><ruby>京都<rt>きょうと</rt></ruby>・<ruby>大阪<rt>おおさか</rt></ruby></a></li>
			</li>
AREA;
	}else if($my_host == 'mcha.vn'){
		print <<<AREA
			<li>
				<a><span>Tokyo</span></a>
				<ul>
					<li><a href="http://mcha.vn/tag/tokyo-area2">Tokyo・Nihonbashi</a></li>
					<li><a href="http://mcha.vn/tag/tokyo-area3">Shibuya・Ebisu・Daikanyama</a></li>
					<li><a href="http://mcha.vn/tag/tokyo-area4">Shinjuku・Yoyogi・Okubo</a></li>
					<li><a href="http://mcha.vn/tag/tokyo-area5">Ikebukuro・Takadanobaba・Waseda</a></li>
					<li><a href="http://mcha.vn/tag/tokyo-area6">Harajuku・Omotesando・Aoyama</a></li>
					<li><a href="http://mcha.vn/tag/tokyo-area10">Akihabara・Kanda・Suidobashi</a></li>
					<li><a href="http://mcha.vn/tag/tokyo-area11">Ueno・Asakusa・Nippori</a></li>
					<li><a href="http://mcha.vn/tag/tokyo-area14">Hamamatsucho・Tamachi・Shinagawa</a></li>
					<li><a href="http://mcha.vn/tag/tokyo-area19">Nakano・Nishiogikubo・Kichijoji</a></li>
					<li><a href="http://mcha.vn/tag/tokyo-area22">Otsuka・Sugamo・Akabane</a></li>
				</ul>
			</li>
AREA;
	}
}

function getAreaMenuMobile(){

	global $my_host;
	if($my_host == 'mcha-id.com'){
		print <<<AREA
			<!-- loop start -->
			<ul class="tab_menu2">
				<li style="padding:0;">
					<a><span>Tokyo</span></a>
					<!-- loop start -->
					<ul>
						<li><a href="http://mcha-id.com/tag/tokyo-area3">Shibuya・Ebisu・Daikanyama</a></li>
						<li><a href="http://mcha-id.com/tag/tokyo-area4">Shinjuku・Yoyogi・Okubo</a></li>
						<li><a href="http://mcha-id.com/tag/tokyo-area6">Harajuku・Omotesando・Aoyama</a></li>
						<li><a href="http://mcha-id.com/tag/tokyo-area10">Akihabara・Kanda・Suidobashi</a></li>
						<li><a href="http://mcha-id.com/tag/tokyo-area11">Ueno・Asakusa・Nippori</a></li>
					</ul>
					<li><a href="http://mcha-id.com/tag/kansai-area">Kyoto・Osaka</a></li>
				</li>
			</ul>
			<!-- loop end -->
AREA;
	}else if($my_host == 'mcha.jp'){
		print <<<AREA
			<!-- loop start -->
			<ul class="tab_menu2">
				<li style="padding:0;">
					<a><span>東京</span></a>
					<!-- loop start -->
					<ul>
						<li><a href="http://mcha.jp/tag/tokyo-area2">東京・日本橋</a></li>
						<li><a href="http://mcha.jp/tag/tokyo-area11">上野・浅草・日暮里</a></li>
						<li><a href="http://mcha.jp/tag/tokyo-area10">秋葉原・神田・水道橋</a></li>
						<li><a href="http://mcha.jp/tag/tokyo-area3">渋谷・恵比寿・代官山</a></li>
						<li><a href="http://mcha.jp/tag/tokyo-area6">原宿・表参道・青山</a></li>
						<li><a href="http://mcha.jp/tag/tokyo-area4">新宿・代々木・大久保</a></li>
						<li><a href="http://mcha.jp/tag/tokyo-area19">中野・西荻窪・吉祥寺</a></li>
						<li><a href="http://mcha.jp/tag/tokyo-area5">池袋・高田馬場・早稲田</a></li>
						<li><a href="http://mcha.jp/tag/tokyo-area7">六本木・麻布・広尾</a></li>
						<li><a href="http://mcha.jp/tag/tokyo-area1">銀座・新橋・有楽町</a></li>
						<li><a href="http://mcha.jp/tag/tokyo-area9">四ツ谷・市ヶ谷・飯田橋</a></li>
						<li><a href="http://mcha.jp/tag/tokyo-area13">築地・お台場</a></li>
						<li><a href="http://mcha.jp/tag/tokyo-area26">町田・稲城・多摩</a></li>
						<li><a href="http://mcha.jp/tag/tokyo-area17">東急沿線</a></li>
					</ul>
					<li class=""><a href="http://mcha.jp/tag/kansai-area" class="">京都・大阪</a></li>
					<li class=""><a href="http://mcha.jp/okayama" class="">岡山</a></li>
				</li>
			</ul>
			<!-- loop end -->
AREA;
	}else if($my_host == 'mcha-jp.com'){
		print <<<AREA
			<!-- loop start -->
			<ul class="tab_menu2">
				<li style="padding:0;">
					<a><span>Tokyo</span></a>
					<!-- loop start -->
					<ul>
						<li><a href="http://mcha-jp.com/tag/tokyo-area2">Tokyo・Nihonbashi</a></li>
						<li><a href="http://mcha-jp.com/tag/tokyo-area3">Shibuya・Ebisu・Daikanyama</a></li>
						<li><a href="http://mcha-jp.com/tag/tokyo-area4">Shinjuku・Yoyogi・Okubo</a></li>
						<li><a href="http://mcha-jp.com/tag/tokyo-area5">Ikebukuro・Takadanobaba・Waseda</a></li>
						<li><a href="http://mcha-jp.com/tag/tokyo-area6">Harajuku・Omotesando・Aoyama</a></li>
						<li><a href="http://mcha-jp.com/tag/tokyo-area10">Akihabara・Kanda・Suidobashi</a></li>
						<li><a href="http://mcha-jp.com/tag/tokyo-area11">Ueno・Asakusa・Nippori</a></li>
						<li><a href="http://mcha-jp.com/tag/tokyo-area14">Hamamatsucho・Tamachi・Shinagawa</a></li>
						<li><a href="http://mcha-jp.com/tag/tokyo-area19">Nakano・Nishiogikubo・Kichijoji</a></li>
						<li><a href="http://mcha-jp.com/tag/tokyo-area22">Otsuka・Sugamo・Akabane</a></li>
					</ul>
					<li><a href="http://mcha-jp.com/tag/kansai-area">Kyoto・Osaka</a></li>
					<li><a href="http://mcha-jp.com/okayama">Okayama</a></li>
				</li>
			</ul>
			<!-- loop end -->
AREA;
	}else if($my_host == 'mcha-kr.com'){
		print <<<AREA
			<!-- loop start -->
			<ul class="tab_menu2">
				<li style="padding:0;">
					<a><span>Tokyo</span></a>
					<!-- loop start -->
					<ul>
						<li><a href="http://mcha-kr.com/tag/tokyo-area2">Tokyo・Nihonbashi</a></li>
						<li><a href="http://mcha-kr.com/tag/tokyo-area3">Shibuya・Ebisu・Daikanyama</a></li>
						<li><a href="http://mcha-kr.com/tag/tokyo-area5">Ikebukuro・Takadanobaba・Waseda</a></li>
						<li><a href="http://mcha-kr.com/tag/tokyo-area6">Harajuku・Omotesando・Aoyama</a></li>
						<li><a href="http://mcha-kr.com/tag/tokyo-area10">Akihabara・Kanda・Suidobashi</a></li>
						<li><a href="http://mcha-kr.com/tag/tokyo-area11">Ueno・Asakusa・Nippori</a></li>
						<li><a href="http://mcha-kr.com/tag/tokyo-area19">Nakano・Nishiogikubo・Kichijoji</a></li>
					</ul>
				</li>
			</ul>
			<!-- loop end -->
AREA;
	}else if($my_host == 'mcha-tw.com'){
		print <<<AREA
			<!-- loop start -->
			<ul class="tab_menu2">
				<li style="padding:0;">
					<a><span>東京</span></a>
					<!-- loop start -->
					<ul>
						<li><a href="http://mcha-tw.com/tag/tokyo-area3">澀谷・惠比壽・代官山</a></li>
						<li><a href="http://mcha-tw.com/tag/tokyo-area4">新宿・代代木・大久保</a></li>
						<li><a href="http://mcha-tw.com/tag/tokyo-area5">池袋・高田馬場・早稻田</a></li>
						<li><a href="http://mcha-tw.com/tag/tokyo-area6">原宿・表參道・青山</a></li>
						<li><a href="http://mcha-tw.com/tag/tokyo-area10">秋葉原・神田・水道橋</a></li>
						<li><a href="http://mcha-tw.com/tag/tokyo-area11">上野・淺草・日暮里</a></li>
						<li><a href="http://mcha-tw.com/tag/tokyo-area19">中野・西荻窪・吉祥寺</a></li>
					</ul>
				</li>
			</ul>
			<!-- loop end -->
AREA;
	}else if($my_host == 'mcha-cn.com'){
		print <<<AREA
			<!-- loop start -->
			<ul class="tab_menu2">
				<li style="padding:0;">
					<a><span>東京</span></a>
					<!-- loop start -->
					<ul>
						<li><a href="http://mcha-cn.com/tag/tokyo-area1">银座・新桥・有乐町</a></li>
						<li><a href="http://mcha-cn.com/tag/tokyo-area2">东京・日本桥</a></li>
						<li><a href="http://mcha-cn.com/tag/tokyo-area3">涩谷 ・惠比寿 ・代官山</a></li>
						<li><a href="http://mcha-cn.com/tag/tokyo-area4">新宿 ・代代木・大久保</a></li>
						<li><a href="http://mcha-cn.com/tag/tokyo-area5">池袋 ・高田马场 ・早稻田</a></li>
						<li><a href="http://mcha-cn.com/tag/tokyo-area6">原宿・表参道・青山</a></li>
						<li><a href="http://mcha-cn.com/tag/tokyo-area7">六本木・西麻布・广尾</a></li>
						<li><a href="http://mcha-cn.com/tag/tokyo-area8">赤坂・永田町・溜池山王</a></li>
						<li><a href="http://mcha-cn.com/tag/tokyo-area9">四谷・市谷・饭田桥</a></li>
						<li><a href="http://mcha-cn.com/tag/tokyo-area10">秋叶原・神田・水道桥</a></li>
						<li><a href="http://mcha-cn.com/tag/tokyo-area11">上野・浅草・日暮里</a></li>
						<li><a href="http://mcha-cn.com/tag/tokyo-area12">两国・锦糸町・小岩</a></li>
						<li><a href="http://mcha-cn.com/tag/tokyo-area13">筑地・台场</a></li>
						<li><a href="http://mcha-cn.com/tag/tokyo-area14">滨松町・田町・品川</a></li>
						<li><a href="http://mcha-cn.com/tag/tokyo-area15">大井・蒲田・羽田机场</a></li>
						<li><a href="http://mcha-cn.com/tag/tokyo-area16">目黑・白金・五反田</a></li>
						<li><a href="http://mcha-cn.com/tag/tokyo-area17">东急铁路</a></li>
						<li><a href="http://mcha-cn.com/tag/tokyo-area18">京王・小田急铁路</a></li>
						<li><a href="http://mcha-cn.com/tag/tokyo-area19">中野・西荻洼・吉祥寺</a></li>
						<li><a href="http://mcha-cn.com/tag/tokyo-area20">西武铁路</a></li>
						<li><a href="http://mcha-cn.com/tag/tokyo-area21">板桥・东武铁路</a></li>
						<li><a href="http://mcha-cn.com/tag/tokyo-area22">大冢・巢鸭・赤羽</a></li>
						<li><a href="http://mcha-cn.com/tag/tokyo-area23">千手・绫濑・葛饰</a></li>
						<li><a href="http://mcha-cn.com/tag/tokyo-area24">小金井・国分寺・国立</a></li>
						<li><a href="http://mcha-cn.com/tag/tokyo-area25">调布・府中・狛江</a></li>
						<li><a href="http://mcha-cn.com/tag/tokyo-area26">町田・稻城・多摩</a></li>
						<li><a href="http://mcha-cn.com/tag/tokyo-area27">西东京市区域</a></li>
						<li><a href="http://mcha-cn.com/tag/tokyo-area28">立川市・八王子市区域</a></li>
						<li><a href="http://mcha-cn.com/tag/tokyo-area29">福生市・青梅市区域</a></li>
						<li><a href="http://mcha-cn.com/tag/tokyo-area30">伊豆・小笠原岛屿</a></li>
					</ul>
				</li>
			</ul>
			<!-- loop end -->
AREA;
	}else if($my_host == 'mcha-th.com'){
		print <<<AREA
			<!-- loop start -->
			<ul class="tab_menu2">
				<li style="padding:0;">
					<a><span>Tokyo</span></a>
					<!-- loop start -->
					<ul>
						<li><a href="http://mcha-th.com/?tag=tokyo-area11">Ueno・Asakusa・Nippori</a></li>
						<li><a href="http://mcha-th.com/?tag=tokyo-area3">Shibuya・Ebisu・Daikanyama</a></li>
					</ul>
				</li>
			</ul>
			<!-- loop end -->
AREA;
	}else if($my_host == 'mcha-easy.com'){
		print <<<AREA
			<!-- loop start -->
			<ul class="tab_menu2">
				<li style="padding:0;">
					<a><span>Tokyo</span></a>
					<!-- loop start -->
					<ul>
						<li><a href="http://mcha-easy.com/tag/tokyo-area3"><ruby>渋谷<rt>しぶや</rt></ruby>・<ruby>恵比寿<rt>えびす</rt></ruby>・<ruby>代官山<rt>だいかんやま</rt></ruby></a></li>
						<li><a href="http://mcha-easy.com/tag/tokyo-area6"><ruby>原宿<rt>はらじゅく</rt></ruby>・<ruby>表参道<rt>おもてさんどう</rt></ruby>・<ruby>青山<rt>あおやま</rt></ruby></a></li>
						<li><a href="http://mcha-easy.com/tag/tokyo-area11"><ruby>上野<rt>うえの</rt></ruby>・<ruby>浅草<rt>あさくさ</rt></ruby>・<ruby>日暮里<rt>にっぽり</rt></ruby></a></li>
						<li><a href="http://mcha-easy.com/tag/tokyo-area13"><ruby>築地<rt>つきじ</rt></ruby>・<ruby>お台場<rt>おだいば</rt></ruby></a></li>
					</ul>
					</li><li><a href="http://mcha-easy.com/tag/kansai-area"><ruby>京都<rt>きょうと</rt></ruby>・<ruby>大阪<rt>おおさか</rt></ruby></a></li>
				</li>
			</ul>
			<!-- loop end -->
AREA;
	}else if($my_host == 'mcha.vn'){
		print <<<AREA
			<!-- loop start -->
			<ul class="tab_menu2">
				<li style="padding:0;">
					<a><span><ruby>東京<rt>とうきょう</rt></ruby></span></a>
					<!-- loop start -->
					<ul>
						<li><a href="http://mcha.vn/tag/tokyo-area2">Tokyo・Nihonbashi</a></li>
						<li><a href="http://mcha.vn/tag/tokyo-area3">Shibuya・Ebisu・Daikanyama</a></li>
						<li><a href="http://mcha.vn/tag/tokyo-area4">Shinjuku・Yoyogi・Okubo</a></li>
						<li><a href="http://mcha.vn/tag/tokyo-area5">Ikebukuro・Takadanobaba・Waseda</a></li>
						<li><a href="http://mcha.vn/tag/tokyo-area6">Harajuku・Omotesando・Aoyama</a></li>
						<li><a href="http://mcha.vn/tag/tokyo-area10">Akihabara・Kanda・Suidobashi</a></li>
						<li><a href="http://mcha.vn/tag/tokyo-area11">Ueno・Asakusa・Nippori</a></li>
						<li><a href="http://mcha.vn/tag/tokyo-area14">Hamamatsucho・Tamachi・Shinagawa</a></li>
						<li><a href="http://mcha.vn/tag/tokyo-area19">Nakano・Nishiogikubo・Kichijoji</a></li>
						<li><a href="http://mcha.vn/tag/tokyo-area22">Otsuka・Sugamo・Akabane</a></li>
					</ul>
				</li>
			</ul>
			<!-- loop end -->
AREA;
	}
}

//Pagenation
function pagination($pages = '', $range = 2)
{
     $showitems = ($range * 2)+1;//表示するページ数（５ページを表示）
 
     global $paged;//現在のページ値
     if(empty($paged)) $paged = 1;//デフォルトのページ
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;//全ページ数を取得
         if(!$pages)//全ページ数が空の場合は、１とする
         {
             $pages = 1;
         }
     }
 
     if(1 != $pages)//全ページが１でない場合はページネーションを表示する
     {
		 echo "<div class=\"pagenation\">\n";
		 echo "<ul>\n";
		 //Prev：現在のページ値が１より大きい場合は表示
         if($paged > 1) echo "<li class=\"prev\"><a href='".get_pagenum_link($paged - 1)."'>Prev</a></li>\n";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                //三項演算子での条件分岐
                echo ($paged == $i)? "<li class=\"active\">".$i."</li>\n":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>\n";
             }
         }
		//Next：総ページ数より現在のページ値が小さい場合は表示
		if ($paged < $pages) echo "<li class=\"next\"><a href=\"".get_pagenum_link($paged + 1)."\">Next</a></li>\n";
		echo "</ul>\n";
		echo "</div>\n";
     }
}

	function social_share(){

		$post_id    = get_the_ID();
		$post_url   = get_the_permalink();
		$post_title = get_the_title();
		$template   = get_template_directory_uri();
		$fb_share   = 'https://www.facebook.com/sharer/sharer.php?u='.$post_url.'%3futm_source%3dsocial%26utm_medium%3dfacebook%26utm_campaign%3dshare';
		$tw_share   = 'https://twitter.com/intent/tweet?text='.$post_title.'&url='.$post_url.'%3futm_source%3dsocial%26utm_medium%3dtwitter%26utm_campaign%3dretweet';
		$gp_share   = 'https://plus.google.com/share?url='.$post_url.'%3futm_source%3dsocial%26utm_medium%3dgoogleplus%26utm_campaign%3dplus';
		
		print <<<SOCIAL_SHARE
				  <div class="social">
				  <div class="social_box">
				  <!-- loop start -->
				  <a href="{$fb_share}" target="_blank" onclick="ga('send', 'event', 'share', 'facebook', '{$post_id}');">
				    <div class="sns" style="background-color: #305098;">
				    <img src="{$template}/images/menu/facebook.png">share 
				    </div>
				  </a>
				  <a href="{$tw_share}" target="_blank" onclick="ga('send', 'event', 'share', 'twitter', '{$post_id}');">
				    <div class="sns" style="background-color: #00aced;">
				    <img src="{$template}/images/menu/twitter.png">tweet 
				    </div>
				  </a>
				  <a href="{$gp_share}" target="_blank" onclick="ga('send', 'event', 'share', 'googleplus', '{$post_id}');">
				    <div class="sns" style="background-color: #DA4C36;">
				    <img src="{$template}/images/menu/google_plus.png">+1 
				    </div>
				  </a>
				  <!-- loop end -->
				  </div>
SOCIAL_SHARE;
	}

function jpnCheck(){
	global $my_host;
	$hostList = getHostList();
	
	$jp_flg=0;
	if($my_host==$hostList['日本語']){
		$jp_flg=1;
	}
	return $jp_flg;
}


/////////////////////////////////////

// Register Custom Background

/////////////////////////////////////



$custombg = array(

	'default-color' => 'eeeeee',

);

add_theme_support( 'custom-background', $custombg );



/////////////////////////////////////

// Register Thumbnails

/////////////////////////////////////



if ( function_exists( 'add_theme_support' ) ) {

add_theme_support( 'post-thumbnails' );

set_post_thumbnail_size( 620, 400, true );

add_image_size( 'post-thumb', 620, 400, true );

add_image_size( 'medium', 300, 194, true );

add_image_size( 'medium-thumb', 300, 194, true );

add_image_size( 'square-thumb', 240, 225, true );

add_image_size( 'small-thumb', 85, 54, true );

}
//wp_footerに追加
function adds_footer() {

	global $my_host;
	//英語版のみ
	if($my_host == 'mcha-jp.com' and is_home()){
		print <<<ADD_FOOTER
			<!-- crazy egg -->
			<script type="text/javascript">
			setTimeout(function(){var a=document.createElement("script");
			var b=document.getElementsByTagName("script")[0];
			a.src=document.location.protocol+"//script.crazyegg.com/pages/scripts/0037/5388.js?"+Math.floor(new Date().getTime()/3600000);
			a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
			</script>
ADD_FOOTER;
	}
}
add_action('wp_footer', 'adds_footer');

//スマホ表示分岐
function is_mobile(){
    $useragents = array(
        'iPhone', // iPhone
        'iPod', // iPod touch
        'Android.*Mobile', // 1.5+ Android *** Only mobile
        'Windows.*Phone', // *** Windows Phone
        'dream', // Pre 1.5 Android
        'CUPCAKE', // 1.5+ Android
        'blackberry9500', // Storm
        'blackberry9530', // Storm
        'blackberry9520', // Storm v2
        'blackberry9550', // Storm v2
        'blackberry9800', // Torch
        'webOS', // Palm Pre Experimental
        'incognito', // Other iPhone browser
        'webmate' // Other iPhone browser
    );
    $pattern = '/'.implode('|', $useragents).'/i';
    return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}

/**
 * ランキング関連
 */

//公開済み記事IDを配列で取得する
function getAllPostId(){

	$postListObj = get_posts('posts_per_page=-1');	
	$postIdList = array();
	
	foreach($postListObj as $post){ $postIdList[] = $post->ID; }
	
	return $postIdList;
}

//記事IDから直近7日のPVを取得
function getWeeklyView($post_id){

	global $wpdb;
	$start_date = date('Y-m-d', strtotime('-7 day'));
	$end_date   = date('Y-m-d', strtotime('-1 day'));
	$query      = "select sum(pageviews) from ".$wpdb->prefix."popularpostssummary where postid = $post_id and view_date >= '$start_date' and view_date <= '$end_date';";
	
	return $wpdb->get_var($query);
}

function autoLoadChk(){
	
	$flg = 0;
	if($_GET['autoload']){
		$flg = 1;
	}
	return $flg;
}

//公開済み記事IDリストにView数を追加する
function setPostListToView($postIdList){
	
	$postList = array();
	foreach($postIdList as $post_id){
		
		$view = getWeeklyView($post_id);
		
		//if($view){ 現状だとPVの付く記事が10記事以上存在しない可能性があるためコメントアウト
			$postList[] = array(
							'post_id' => $post_id,
							'view'    => $view);
		//}
	}
	
	foreach ($postList as $key => $value){
		$key_id[$key] = $value['view'];
	}
	array_multisort ( $key_id , SORT_DESC , $postList);
	
	return $postList;
}

function reloadedRanking(){
	global $wpdb;
	$postList = setPostListToView(getAllPostId());
	
	//一度中身削除する
	$wpdb->query('DELETE FROM wp_ranking WHERE post_id <> 00000;');
	
	$i = 1;
	foreach($postList as $post){

		date_default_timezone_set('asia/tokyo');
		$today = date("Y-m-d H:i:s");
		$query = "INSERT INTO wp_ranking (post_id, rank,ranking,created_at) VALUES ({$post['post_id']},1,{$i},'{$today}')";
		$wpdb->query($query);
		$i++;
		if($i == 11){ break; }
	}
}

function getRanking(){

	global $wpdb;
	$query      = "select ranking, post_id, created_at from wp_ranking where rank = 1;";
	
	return $wpdb->get_results($query);
}

//ランキングを表示させる
function displayRanking(){
	$diplay_num   = 5; //表示件数
	$postRankList = getRanking();
	$yesterday    = date('Y-m-d', strtotime('-1 day', time()));
	$created_at   = $postRankList[0]->created_at;
	
	//ランキングがなければ作成
	if(!$postRankList){
		reloadedRanking();
		$postRankList = getRanking();
	}
	//ランキングの作成日が前日以前であればランキング再作成
	if($created_at < $yesterday){
		reloadedRanking();
		$postRankList = getRanking();
	}
	
print <<<RANKING_HEADER
      <!-- new article -->
      <section>
        <div class="new_article">
        <div class="new_article_tittle">Ranking 
        </div>
        <!-- loop start -->
RANKING_HEADER;

	$i = 1;
	foreach($postRankList as $post){
		if($i > $diplay_num){
			break;
		}
		$post_id   = $post->post_id;
		$post_info = get_post($post->post_id);
		
		$title     = get_the_title($post_id);
		$permalink = get_permalink($post_id);
		$thumb     = wp_get_attachment_url(get_post_thumbnail_id($post_id));
		$cat       = get_the_category($post_id);
		$category  = $cat[0]->name;
		
		print <<<RANKING
        <a href="{$permalink}" onclick="ga('send', 'event', 'matcha', 'ranking', '{$i}');">
          <div class="new_article_box">
          <div class="new_article_category" style="background-color: #FF5B5B !important;">
          <h3>No.{$i}</h3>
          </div>
          <div class="new_article_image">
          <img src="{$thumb}">
          </div>
          <div class="new_article_text">{$title}
          </div>
          </div>
        </a>
RANKING;
	$i++;
	}//foreach end

		print <<<RANKING_FOOTER
        <!-- loop end -->
        </div>
      </section>
RANKING_FOOTER;
}

/* 投稿画面のタイトルに文字カウンター */
function excerpt_count_js(){
echo '<script>jQuery(document).ready(function(){
jQuery("#titlewrap").after("<div style=\"position:absolute;top:5px;right:5px;color:#666;\"><small>文字数: </small><input type=\"text\" value=\"0\" maxlength=\"3\" size=\"3\" id=\"title_counter\" readonly=\"\" style=\"background:#fff;\"></div>");
jQuery("#title_counter").val(jQuery("#title").val().length);
jQuery("#title").keyup( function() {
jQuery("#title_counter").val(jQuery("#title").val().length);
});
});</script>';
}
add_action( 'admin_head-post.php', 'excerpt_count_js');
add_action( 'admin_head-post-new.php', 'excerpt_count_js');