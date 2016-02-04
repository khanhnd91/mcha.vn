<?php
global $my_host;
$hostList = getHostList();

$jp_flg = 0;
if ($my_host == $hostList['日本語']) {
    $jp_flg = 1;
}
?>



<?php if (is_single() or is_page()) : ?>

    <!-- footer -->



    <?php if (is_single()) : ?>
        <footer style="display:none;">
    <?php else: ?>
            <footer>
        <?php endif; ?>

            <div id="footer">
                <div class="footer_contents">
                    <div class="footer_menu">
                        <a href="<?php bloginfo('home'); ?>/about">
                            <p><?php if ($jp_flg) {
        echo "MATCHAとは";
    } else {
        echo "About";
    } ?>
                            </p>
                        </a>

                        <a href="<?php bloginfo('home'); ?>/partner">
                            <p><?php if ($jp_flg) {
        echo "パートナーメディア";
    } else {
        echo "Partner Media";
    } ?>
                            </p>
                        </a>

                        <?php if ($jp_flg): ?>

                            <a href="https://www.wantedly.com/projects/21494">
                                <p>ライター募集</p>
                            </a>

                        <?php else: ?>

                            <a href="http://mcha-jp.com/translator">
                                <p>Recruiting Translators</p>
                            </a>

                        <?php endif; ?>

                        <?php
                        /*
                          <a href="#">
                          <p>プライバシー・ポリシー
                          </p>
                          </a>
                         */
                        ?>

    <?php if ($jp_flg): ?>
                            <a href="<?php bloginfo('home'); ?>/contact">
                                <p>お問い合わせ 
                                </p>
                            </a>
    <?php endif; ?>




                    </div>
                    <div class="footer_sns">
                        <p><?php if ($jp_flg) {
        echo "ソーシャルメディア";
    } else {
        echo "SocialMedia";
    } ?>
                        </p>
                        <a href="https://www.facebook.com/mcha.jp">
                            <img src="<?php bloginfo('template_directory'); ?>/images/menu/facebook.png">
                        </a>
                        <a href="https://twitter.com/MATCHA_global">
                            <img src="<?php bloginfo('template_directory'); ?>/images/menu/twitter.png">
                        </a>
                        <a href="https://plus.google.com/+Mchajpcom/about">
                            <img src="<?php bloginfo('template_directory'); ?>/images/menu/google_plus.png">
                        </a>
                        <a href="https://www.pinterest.com/MATCHAglobal">
                            <img src="<?php bloginfo('template_directory'); ?>/images/menu/pin.png">
                        </a>
                        <a href="https://instagram.com/matcha_japan/">
                            <img src="<?php bloginfo('template_directory'); ?>/images/menu/instagram.png">
                        </a>
                    </div>
                </div>
                <address><p>&#169;<a href='http://matcha-jp.com/'> MATCHA, Inc.</a></p></address>
            </div>
        </footer>
<?php endif; ?>
    <!-- js -->
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/accordion.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/menu.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/map.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/collapser.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.clever-infinite-scroll.js"></script>





    <?php
    /*
      <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.lazyload.min.js"></script>



      <script>
      jQuery(function($){
      $("img.lazy").lazyload({
      effect: 'fadeIn',
      effectspeed: 500
      });

      });
     */
    ?>
    <!-- page-top -->
    <p id="page-top">
        <a href="#all">▲</a>
    </p>
</script>
<!-- ページトップJS -->
<script type="text/javascript">
    $(function() {
        var topBtn = $('#page-top');
        topBtn.hide();
        $(window).scroll(function() {
            if ($(this).scrollTop() > 500) {
                topBtn.fadeIn();
            } else {
                topBtn.fadeOut();
            }
        });
        //スクロールしてトップ
        topBtn.click(function() {
            $('body,html').animate({
                scrollTop: 0
            }, 500);
            return false;
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.more').collapser({
            mode: 'chars',
            truncate: 150,
            showText: 'read more',
            hideText: 'close'
        });
    });
</script>

<script>
    // When you use default selectors
    // $('#post-area').cleverInfiteScroll();

    // When you use custom selectors
    $('#post-area').cleverInfiniteScroll({
        contentsWrapperSelector: '#post-area',
        contentSelector: '.post',
        nextSelector: '.prev-post a',
        loadImage: '<?php bloginfo('template_directory'); ?>/images/ajax-loader.gif',
        callback: function() {
            $('.more').collapser({
                mode: 'chars',
                truncate: 150,
                showText: 'read more',
                hideText: 'close'
            });
        }
    });
</script>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/footerFixed.js"></script>
<!-- wrapper高さ統一（footer固定） -->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.equalheight.min.js"></script>
<script>
$(document).ready(function() {
    $('#wrapper > div').equalHeight(); //高さを揃えたい要素を指定
});
</script>

<?php
/*
  if(!is_home()){
  print <<<SCRIPT
  <script>
  $(window).load(function(){
  // サイドバーの固定するレイヤー
  var navi = $('.fixed-item');
  // メインのレイヤー
  var main  = $('#wrapper');
  // 固定するレイヤーの初期位置
  var target_top = navi.offset().top - parseInt(navi.css('margin-top'),10);
  // メインレイヤーの初期位置
  var sub_top = main.offset().top - parseInt(main.css('margin-top'),10);
  // スクロールする上限
  var sub_scroll = main.offset().top + main.outerHeight(true) - navi.outerHeight(true) - parseInt(navi.css('margin-top'),10);
  if (navi.outerHeight(true) + target_top < main.outerHeight(true) + sub_top) {
  $(window).scroll(function () {
  var ws = $(window).scrollTop();
  $('.scroll').text(ws);
  if (ws > sub_scroll) {
  //navi.css({position:'fixed', top: sub_scroll - ws + 'px'});
  } else if(ws > target_top) {
  navi.css({position:'fixed', top: '110px'});
  } else {
  navi.css({position:'relative', top: '110px'});
  }
  });
  }
  });
  </script>
  SCRIPT;
  }
 */
?>

<?php wp_footer(); ?>
</body>
</html>