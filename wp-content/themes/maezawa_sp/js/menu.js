$(function(){
    // 「id="jQueryBox"」を非表示
    $(".responsive_menu").css("display", "none");
 
    // 「id="jQueryPush"」がクリックされた場合
    $(".button img").click(function(){
        // 「id="jQueryBox"」の表示、非表示を切り替える
        $(".responsive_menu").toggle();
    });
});


//画像を配列に格納する
var img = new Array();

img[0] = new Image();
img[0].src = "wp-content/themes/new_matcha/images/menu/icon_menu_open.jpg";
img[1] = new Image();
img[1].src = "wp-content/themes/new_matcha/images/menu/icon_menu_close.jpg";
//画像番号用のグローバル変数
var cnt=0;
//画像切り替え関数
function changeIMG(){
  //画像番号を進める
  if (cnt == 1)
  { cnt=0; }
  else
  { cnt++; }
  //画像を切り替える
  document.getElementById("menu").src=img[cnt].src;
}