<?php

	global $my_host;
	$hostList = getHostList();
	
	$jp_flg=0;
	if($my_host==$hostList['日本語']){
		$jp_flg=1;
	}
	
?>
      <!-- sidebar -->
      <div class="sidebar">

      <!-- sidebar ad -->
      <section>
        <div class="ad">
        <?php getPostSideTopAds(); ?>
        </div>
      </section>
<?php
	if(is_home()){
		//特集一覧
		dynamic_sidebar('side-widget');
	}

/*
      <!-- japan map -->
      <section>
      <div class="map_tittle">Area 
      </div>
      <div class="map">
      <div class="pin">
      <div class="tohoku">
      <a href="#">
        <div class="hokkaido">HOKKAIDO 
        </div>
      </a>
      <a href="#">
        <div class="aomori">AOMORI 
        </div>
      </a>
      <a href="#">
        <div class="iwate">IWATE 
        </div>
      </a>
      <a href="#">
        <div class="miyagi">MIYAGI 
        </div>
      </a>
      <a href="#">
        <div class="akita">AKITA 
        </div>
      </a>
      <a href="#">
        <div class="yamagata">YAMAGATA 
        </div>
      </a>
      <a href="#">
        <div class="fukushima">FUKUSHIMA 
        </div>
      </a>
      </div>
      <div class="kanto">
      <a href="#">
        <div class="tokyo">TOKYO 
        </div>
      </a>
      <a href="#">
        <div class="kanagawa">KANAGAWA 
        </div>
      </a>
      <a href="#">
        <div class="saitama">SAITAMA 
        </div>
      </a>
      <a href="#">
        <div class="chiba">CHIBA 
        </div>
      </a>
      <a href="#">
        <div class="ibaraki">IBARAKI 
        </div>
      </a>
      <a href="#">
        <div class="tochigi">TOCHIGI 
        </div>
      </a>
      <a href="#">
        <div class="gunma">GUNMA 
        </div>
      </a>
      <a href="#">
        <div class="yamanashi">YAMANASHI 
        </div>
      </a>
      <a href="#">
        <div class="nigata">NIGATA 
        </div>
      </a>
      <a href="#">
        <div class="nagano">NAGANO 
        </div>
      </a>
      </div>
      <div class="tokai">
      <a href="#">
        <div class="aichi">AICHI 
        </div>
      </a>
      <a href="#">
        <div class="gifu">GIFU 
        </div>
      </a>
      <a href="#">
        <div class="shizuoka">SHIZUOKA 
        </div>
      </a>
      <a href="#">
        <div class="mie">MIE 
        </div>
      </a>
      <a href="#">
        <div class="osaka">OSAKA 
        </div>
      </a>
      <a href="#">
        <div class="hyogo">HYOGO 
        </div>
      </a>
      <a href="#">
        <div class="kyoto">KYOTO 
        </div>
      </a>
      <a href="#">
        <div class="shiga">SHIGA 
        </div>
      </a>
      <a href="#">
        <div class="nara">NARA 
        </div>
      </a>
      <a href="#">
        <div class="wakayama">WAKAYAMA 
        </div>
      </a>
      </div>
      <div class="chugoku">
      <a href="#">
        <div class="tottori">TOTTORI 
        </div>
      </a>
      <a href="#">
        <div class="shimane">SHIMANE 
        </div>
      </a>
      <a href="#">
        <div class="okayama">OKAYAMA 
        </div>
      </a>
      <a href="#">
        <div class="hiroshima">HIROSHIMA 
        </div>
      </a>
      <a href="#">
        <div class="yamaguchi">YAMAGUCHI 
        </div>
      </a>
      <a href="#">
        <div class="tokushima">TOKUSHIMA 
        </div>
      </a>
      <a href="#">
        <div class="kagawa">KAGAWA 
        </div>
      </a>
      <a href="#">
        <div class="ehime">EHIME 
        </div>
      </a>
      <a href="#">
        <div class="kochi">KOCHI 
        </div>
      </a>
      </div>
      <div class="kyushu">
      <a href="#">
        <div class="fukuoka">FUKUOKA 
        </div>
      </a>
      <a href="#">
        <div class="saga">SAGA 
        </div>
      </a>
      <a href="#">
        <div class="nagasaki">NAGASAKI 
        </div>
      </a>
      <a href="#">
        <div class="kumamoto">KUMAMOTO 
        </div>
      </a>
      <a href="#">
        <div class="oita">OITA 
        </div>
      </a>
      <a href="#">
        <div class="miyazaki">MIYAZAKI 
        </div>
      </a>
      <a href="#">
        <div class="kagoshima">KAGOSHIMA 
        </div>
      </a>
      <a href="#">
        <div class="okinawa">OKINAWA 
        </div>
      </a>
      </div>
      </div>
      <ul class="prefectly" id="visited">
        <li data-pref="ac" class="ac">A</li>
        <!-- 愛知 -->
        <li data-pref="am" class="am">B</li>
        <!-- 青森 -->
        <li data-pref="at" class="at">C</li>
        <!-- 秋田 -->
        <li data-pref="cb" class="cb">D</li>
        <!-- 千葉 -->
        <li data-pref="eh" class="eh">E</li>
        <!-- 愛媛 -->
        <li data-pref="fk" class="fk">F</li>
        <!-- 福井 -->
        <li data-pref="fo" class="fo">G</li>
        <!-- 福岡 -->
        <li data-pref="fs" class="fs">H</li>
        <!-- 福島 -->
        <li data-pref="gf" class="gf">I</li>
        <!-- 岐阜 -->
        <li data-pref="gm" class="gm">J</li>
        <!-- 群馬 -->
        <li data-pref="hg" class="hg">K</li>
        <!-- 兵庫 -->
        <li data-pref="hk" class="hk">L</li>
        <!-- 北海道 -->
        <li data-pref="hs" class="hs">M</li>
        <!-- 広島 -->
        <li data-pref="ig" class="ig">N</li>
        <!-- 茨城 -->
        <li data-pref="ik" class="ik">O</li>
        <!-- 石川 -->
        <li data-pref="it" class="it">P</li>
        <!-- 岩手 -->
        <li data-pref="ka" class="ka">Q</li>
        <!-- 香川 -->
        <li data-pref="kg" class="kg">R</li>
        <!-- 鹿児島 -->
        <li data-pref="km" class="km">S</li>
        <!-- 熊本 -->
        <li data-pref="kn" class="kn">T</li>
        <!-- 神奈川 -->
        <li data-pref="ko" class="ko">U</li>
        <!-- 高知 -->
        <li data-pref="kt" class="kt">V</li>
        <!-- 京都 -->
        <li data-pref="me" class="me">W</li>
        <!-- 三重 -->
        <li data-pref="mg" class="mg">X</li>
        <!-- 宮城 -->
        <li data-pref="mz" class="mz">Y</li>
        <!-- 宮崎 -->
        <li data-pref="ng" class="ng">Z</li>
        <!-- 新潟 -->
        <li data-pref="nn" class="nn">a</li>
        <!-- 長野 -->
        <li data-pref="nr" class="nr">b</li>
        <!-- 奈良 -->
        <li data-pref="ns" class="ns">c</li>
        <!-- 長崎 -->
        <li data-pref="on" class="on">d</li>
        <!-- 沖縄 -->
        <li data-pref="os" class="os">e</li>
        <!-- 大阪 -->
        <li data-pref="ot" class="ot">f</li>
        <!-- 大分 -->
        <li data-pref="oy" class="oy">g</li>
        <!-- 岡山 -->
        <li data-pref="sa" class="sa">h</li>
        <!-- 佐賀 -->
        <li data-pref="sg" class="sg">i</li>
        <!-- 滋賀 -->
        <li data-pref="sn" class="sn">j</li>
        <!-- 島根 -->
        <li data-pref="so" class="so">k</li>
        <!-- 静岡 -->
        <li data-pref="st" class="st">l</li>
        <!-- 埼玉 -->
        <li data-pref="tg" class="tg">m</li>
        <!-- 栃木 -->
        <li data-pref="tk" class="tk">n</li>
        <!-- 東京 -->
        <li data-pref="to" class="to">o</li>
        <!-- 徳島 -->
        <li data-pref="tt" class="tt">p</li>
        <!-- 鳥取 -->
        <li data-pref="ty" class="ty">q</li>
        <!-- 富山 -->
        <li data-pref="wk" class="wk">r</li>
        <!-- 和歌山 -->
        <li data-pref="yg" class="yg">s</li>
        <!-- 山口 -->
        <li data-pref="ym" class="ym">t</li>
        <!-- 山形 -->
        <li data-pref="yn" class="yn">u</li>
        <!-- 山梨 -->
      </ul>
      </div>
      </section>
*/

	//ランキング表示
	displayRanking();

?>
<?php if(!is_home()) : /* topには出さない */ ?>
      <!-- new article -->
      <section>
        <div class="new_article">
        <div class="new_article_tittle">New posts 
        </div>
        <!-- loop start -->
        
        
<?php
	$args = 'posts_per_page=5';
	query_posts( $args );
	// The Loop
	while ( have_posts() ) : the_post();
	
	$image_id = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src($image_id, true);
	$category = get_the_category();
	$cat_id   = $category[0]->cat_ID;
	$cat_name = $category[0]->cat_name;
?>
        <a href="<?php the_permalink(); ?>" onclick="ga('send', 'event', 'matcha', 'new_post', '<?php the_ID(); ?>');">
          <div class="new_article_box">
          <div class="new_article_category" style="background-color: #ffab1a;">
          <h3><?php echo $cat_name; ?> </h3>
          </div>
          <div class="new_article_image">
          <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>">
          </div>
          <div class="new_article_text"><?php the_title(); ?>
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
      </section>
<?php endif;?>

<?php
/*
      <!-- ranking -->
      <section>
        <div class="ranking">
        <div class="ranking_tittle">Ranking 
        </div>
        <!-- tab1 -->
        <div class="section-">
        <input class="section-radio" id="tab1" name="tab" type="radio" checked>
        <label class="section-name section-one" for="tab1">本日</label>
        <div class="section-content">
        <span class="section-inner">
          <!-- loop start -->
          <a href="#">
            <div class="ranking_box">
            <div class="ranking_category">
            <h3>1 </h3>
            </div>
            <div class="ranking_image">
            <img src="<?php bloginfo('template_directory'); ?>/images/sample/pack7-1024x682.jpg">
            </div>
            <div class="ranking_text">日本みやげにもぴったり！ インスタントお味噌汁の作り方 
            </div>
            </div>
          </a>
          <a href="#">
            <div class="ranking_box">
            <div class="ranking_category">
            <h3>2 </h3>
            </div>
            <div class="ranking_image">
            <img src="<?php bloginfo('template_directory'); ?>/images/sample/hashi1.jpg">
            </div>
            <div class="ranking_text">いまさら聞けない お箸の持ち方と基本的なマナー５つ 
            </div>
            </div>
          </a>
          <a href="#">
            <div class="ranking_box">
            <div class="ranking_category">
            <h3>3 </h3>
            </div>
            <div class="ranking_image">
            <img src="<?php bloginfo('template_directory'); ?>/images/sample/th__MG_0274.jpg">
            </div>
            <div class="ranking_text">東急ハンズで買える 高品質＆和の心を感じるメイド・イン・ジャパン プロダクト5選 
            </div>
            </div>
          </a>
          <a href="#">
            <div class="ranking_box">
            <div class="ranking_category">
            <h3>4 </h3>
            </div>
            <div class="ranking_image">
            <img src="<?php bloginfo('template_directory'); ?>/images/sample/ureshinoashiyu-model.jpg">
            </div>
            <div class="ranking_text">日本三大美肌の湯を気軽に体験。嬉野の足湯どころ 
            </div>
            </div>
          </a>
          <a href="#">
            <div class="ranking_box">
            <div class="ranking_category">
            <h3>5 </h3>
            </div>
            <div class="ranking_image">
            <img src="<?php bloginfo('template_directory'); ?>/images/sample/DSC04001.jpg">
            </div>
            <div class="ranking_text">ただ暑いというわけではない「日本の夏」と気をつけておきたい熱中症 
            </div>
            </div>
          </a>
          <!-- loop end -->
        </span>
        </div>
        </div>
        <!-- tab2 -->
        <div class="section-">
        <input class="section-radio" id="tab2" name="tab" type="radio">
        <label class="section-name section-two" for="tab2">週間</label>
        <div class="section-content">
        <span class="section-inner">
          <!-- loop start -->
          <a href="#">
            <div class="ranking_box">
            <div class="ranking_category">
            <h3>1 </h3>
            </div>
            <div class="ranking_image">
            <img src="<?php bloginfo('template_directory'); ?>/images/sample/hashi1.jpg">
            </div>
            <div class="ranking_text">いまさら聞けない お箸の持ち方と基本的なマナー５つ 
            </div>
            </div>
          </a>
          <a href="#">
            <div class="ranking_box">
            <div class="ranking_category">
            <h3>2 </h3>
            </div>
            <div class="ranking_image">
            <img src="<?php bloginfo('template_directory'); ?>/images/sample/th__MG_0274.jpg">
            </div>
            <div class="ranking_text">東急ハンズで買える 高品質＆和の心を感じるメイド・イン・ジャパン プロダクト5選 
            </div>
            </div>
          </a>
          <a href="#">
            <div class="ranking_box">
            <div class="ranking_category">
            <h3>3 </h3>
            </div>
            <div class="ranking_image">
            <img src="<?php bloginfo('template_directory'); ?>/images/sample/pack7-1024x682.jpg">
            </div>
            <div class="ranking_text">日本みやげにもぴったり！ インスタントお味噌汁の作り方 
            </div>
            </div>
          </a>
          <a href="#">
            <div class="ranking_box">
            <div class="ranking_category">
            <h3>4 </h3>
            </div>
            <div class="ranking_image">
            <img src="<?php bloginfo('template_directory'); ?>/images/sample/ureshinoashiyu-model.jpg">
            </div>
            <div class="ranking_text">日本三大美肌の湯を気軽に体験。嬉野の足湯どころ 
            </div>
            </div>
          </a>
          <a href="#">
            <div class="ranking_box">
            <div class="ranking_category">
            <h3>5 </h3>
            </div>
            <div class="ranking_image">
            <img src="<?php bloginfo('template_directory'); ?>/images/sample/DSC04001.jpg">
            </div>
            <div class="ranking_text">ただ暑いというわけではない「日本の夏」と気をつけておきたい熱中症 
            </div>
            </div>
          </a>
          <!-- loop end -->
        </span>
        </div>
        </div>
        <!-- tab3 -->
        <div class="section-">
        <input class="section-radio" id="tab3" name="tab" type="radio">
        <label class="section-name section-three" for="tab3">月間</label>
        <div class="section-content">
        <span class="section-inner">
          <!-- loop start -->
          <a href="#">
            <div class="ranking_box">
            <div class="ranking_category">
            <h3>1 </h3>
            </div>
            <div class="ranking_image">
            <img src="<?php bloginfo('template_directory'); ?>/images/sample/DSC04001.jpg">
            </div>
            <div class="ranking_text">ただ暑いというわけではない「日本の夏」と気をつけておきたい熱中症 
            </div>
            </div>
          </a>
          <a href="#">
            <div class="ranking_box">
            <div class="ranking_category">
            <h3>2 </h3>
            </div>
            <div class="ranking_image">
            <img src="<?php bloginfo('template_directory'); ?>/images/sample/hashi1.jpg">
            </div>
            <div class="ranking_text">いまさら聞けない お箸の持ち方と基本的なマナー５つ 
            </div>
            </div>
          </a>
          <a href="#">
            <div class="ranking_box">
            <div class="ranking_category">
            <h3>3 </h3>
            </div>
            <div class="ranking_image">
            <img src="<?php bloginfo('template_directory'); ?>/images/sample/pack7-1024x682.jpg">
            </div>
            <div class="ranking_text">日本みやげにもぴったり！ インスタントお味噌汁の作り方 
            </div>
            </div>
          </a>
          <a href="#">
            <div class="ranking_box">
            <div class="ranking_category">
            <h3>4 </h3>
            </div>
            <div class="ranking_image">
            <img src="<?php bloginfo('template_directory'); ?>/images/sample/ureshinoashiyu-model.jpg">
            </div>
            <div class="ranking_text">日本三大美肌の湯を気軽に体験。嬉野の足湯どころ 
            </div>
            </div>
          </a>
          <a href="#">
            <div class="ranking_box">
            <div class="ranking_category">
            <h3>5 </h3>
            </div>
            <div class="ranking_image">
            <img src="<?php bloginfo('template_directory'); ?>/images/sample/th__MG_0274.jpg">
            </div>
            <div class="ranking_text">東急ハンズで買える 高品質＆和の心を感じるメイド・イン・ジャパン プロダクト5選 
            </div>
            </div>
          </a>
          <!-- loop end -->
        </span>
        </div>
        </div>
        </div>
      </section>

      <!-- special -->
      */
      
      
      /*
      <section>
        <div class="special">
        <div class="special_tittle">Special 
        </div>
        <!-- loop start -->
        <a href="#">
          <div class="special_image">
          <img src="<?php bloginfo('template_directory'); ?>/images/special/saga_cup_c_SAGA_400166.jpg">
          </div>
        </a>
        <a href="#">
          <div class="special_image">
          <img src="<?php bloginfo('template_directory'); ?>/images/special/special_tokyuhands1.jpg">
          </div>
        </a>
        <a href="#">
          <div class="special_image">
          <img src="<?php bloginfo('template_directory'); ?>/images/special/wakuratop4.jpg">
          </div>
        </a>
        <a href="#">
          <div class="special_image">
          <img src="<?php bloginfo('template_directory'); ?>/images/special/11.jpg">
          </div>
        </a>
        <a href="#">
          <div class="special_image">
          <img src="<?php bloginfo('template_directory'); ?>/images/special/special_togoshiginzaJP1.jpg">
          </div>
        </a>
        <a href="#">
          <div class="special_image">
          <img src="<?php bloginfo('template_directory'); ?>/images/special/kamakura_top_banner1.png">
          </div>
        </a>
        <!-- loop end -->
        </div>
      </section>
      */
?>


<?php if( ( is_home() or is_single() or is_page() ) and !wp_is_mobile() ) : /*モバイル判別*/?>
<!-- about -->
             <section>
              <div class="side_about">
                <div class="side_about_tittle">about MATCHA </div>
                <div class="side_about_box">
                <?php if ( $jp_flg ) : ?>
                
                  <a href="<?php bloginfo('home'); ?>/about"><p>MATCHAとは</p></a>
                  <a href="<?php bloginfo('home'); ?>/partner"><p>パートナーメディア</p></a>
                 
                <?php else : ?>
                
                  <a href="<?php bloginfo('home'); ?>/about"><p>About</p></a>
                  <a href="<?php bloginfo('home'); ?>/partner"><p>Partner Media</p></a>
                  <a href="http://mcha-jp.com/translator"><p>Recruiting Translators</p></a>
                
                <?php endif; ?>
                </div>
              </div>
            </section>

            <!-- social -->
             <section>
              <div class="side_social">
                <div class="side_social_tittle">Social </div>
                <div class="side_social_box">

                <a href="https://www.facebook.com/mcha.jp" target="_blank"><div class="side_facebook"><img src="<?php bloginfo('template_directory'); ?>/images/menu/facebook.png"></div></a>
                <a href="https://twitter.com/MATCHA_global" target="_blank"><div class="side_twitter"><img src="<?php bloginfo('template_directory'); ?>/images/menu/twitter.png"></div></a>
                <a href="https://plus.google.com/+Mchajpcom/about" target="_blank"><div class="side_google_plus"><img src="<?php bloginfo('template_directory'); ?>/images/menu/google_plus.png"></div></a>
                <a href="https://www.pinterest.com/MATCHAglobal" target="_blank"><div class="side_pin"><img src="<?php bloginfo('template_directory'); ?>/images/menu/pin.png"></div></a>
                <a href="https://instagram.com/matcha_japan/" target="_blank"><div class="side_instagram"><img src="<?php bloginfo('template_directory'); ?>/images/menu/instagram.png"></div></a>

              </div>
              </div>
            </section>
            
			<?php if ( $jp_flg ) : ?>
            <!-- recruit -->
             <section>
              <div class="side_recruit">
                <div class="side_recruit_tittle">Recruit </div>
                <a href="https://www.wantedly.com/projects/21494" target="_blank"><div class="side_recruit_image"><img src="<?php bloginfo('template_directory'); ?>/images/menu/recruit.jpg"></div></a>
                <a href="https://www.wantedly.com/projects/18043" target="_blank"><div class="side_recruit_image"><img src="http://image.mcha.jp/wp-content/uploads/2015/08/recruit_h2.jpg"></div></a>
                
                
              </div>
            </section>
			<?php endif; ?>

<?php endif; /*モバイル判別*/?>

            <!-- feedback -->
             <section>
              <div style="position: relative;" class="side_feedback">
              
              <?php if ( $jp_flg ) : ?>
              
                <a href="https://docs.google.com/forms/d/1zMP7hUX6IGxkqqdOL0q7ODC6ooXbilZ-hGqfAWMyy2s/viewform" target="_blank">
                	<img style="width:100%" src="<?php bloginfo('template_directory'); ?>/images/feedback_jp.png">
                </a>
              
              <?php else : ?>
              
                <a href="https://docs.google.com/forms/d/1Tz6SowcPKXgk2ZRaj30WMFiXzb-eVwBC4LK7bS0ZzOQ/viewform" target="_blank">
                	<img style="width:100%" src="<?php bloginfo('template_directory'); ?>/images/feedback.png">
                </a>
              
              <?php endif; ?>
              </div>
            </section>

            <!-- marketer -->
             <section>
              <div style="position: relative;" class="side_feedback">
              
              <?php if ( $my_host == 'mcha-jp.com' ) : ?>
              
                <a href="https://www.wantedly.com/projects/16080" target="_blank">
                	<img style="width:100%" src="<?php bloginfo('template_directory'); ?>/images/marketer.jpg">
                </a>
              
              <?php endif; ?>
              </div>
            </section>
<?php
	if(!is_home()){
		print "<div class='fixed-item'>";
		//特集一覧
		dynamic_sidebar('side-widget');
		
		print "</div>";
	}
?>
      </div>
      </div>
    </article>