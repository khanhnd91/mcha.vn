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
                                echo 'MATCHAとは';
                            } else {
                                echo 'About';
                            } ?>
                        </p>
                    </a>

                    <a href="<?php bloginfo('home'); ?>/partner">
                        <p><?php if ($jp_flg) {
                            echo 'パートナーメディア';
                        } else {
                            echo 'Partner Media';
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

                <?php if ($jp_flg): ?>
                    <a href="<?php bloginfo('home'); ?>/contact">
                        <p>お問い合わせ
                        </p>
                    </a>
                <?php endif; ?>
            </div>
            <div class="footer_sns">
                <p><?php if ($jp_flg) {
                    echo 'ソーシャルメディア';
                } else {
                    echo 'SocialMedia';
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
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/slider.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/menu.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.clever-infinite-scroll.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/modal.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/footerFixed.js"></script>
<!-- wrapper高さ統一（footer固定） -->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.equalheight.min.js"></script>

<?php //Mobile分岐
if(wp_is_mobile()) {
?>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/collapser.js"></script>

<?php }// end if wp_is_mobile ?>

<!-- page-top -->
<p id="page-top">
    <a href="#all">▲</a>
</p>
<!-- ページトップJS -->
<script src="<?php bloginfo('template_directory'); ?>/js/page-init.js"></script>

<?php wp_footer(); ?>
</body>
</html>
