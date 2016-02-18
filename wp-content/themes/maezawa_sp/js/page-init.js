// Page Init by 3846masa

$(function initFunction() {

  function topBtnInit() {
    var $topBtn = $('#page-top');
    var $window = $(window);
    var $bodyAndHtml = $('body, html');

    $topBtn.hide();
    $window.on('scroll', function() {
      if ($window.scrollTop() > 500) {
        $topBtn.fadeIn();
      } else {
        $topBtn.fadeOut();
      }
    });

    $topBtn.on('click', function() {
      $bodyAndHtml.animate({
        scrollTop: 0
      }, 500);
      return false;
    });
  }

  function collapInit() {
    if (typeof $('.more').collapser != "undefined") {
        $('.more').collapser({
        mode: 'chars',
        truncate: 150,
        showText: 'read more >>',
        hideText: 'close'
      });
    }
  }

  function infScrollInit() {
    if (typeof $('#post-area').cleverInfiniteScroll != "undefined") {
      $('#post-area').cleverInfiniteScroll({
        contentsWrapperSelector: '#post-area',
        contentSelector: '.post',
        nextSelector: '.prev-post a',
        loadImage: MCHA_URL.template + '/images/ajax-loader.gif',
        callback: collapInit
      });
    }
  }

  function fixHeight() {
    $('#wrapper > div').equalHeight();
  }

  // Init.
  topBtnInit();
  collapInit();
  infScrollInit();
  fixHeight();

});
