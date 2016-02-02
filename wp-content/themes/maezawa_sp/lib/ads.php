<?php //広告関係の関数をまとめています kuribayashi
//require_once('init.php'); //設定関係
	function getMyHostName(){
		return  htmlspecialchars($_SERVER['HTTP_HOST'], ENT_QUOTES); //現在のホスト名、念のためエスケープ
	}
	
	function getHostLists(){
		return array(
			'EN'   => 'mcha-jp.com',    //英語
			'KR'   => 'mcha-kr.com',    //韓国語
			'TW'   => 'mcha-tw.com',    //中国語簡体
			'CN'   => 'mcha-cn.com',    //中国語繁体
			'ID'   => 'mcha-id.com',    //インドネシア語
			'TH'   => 'mcha-th.com',    //タイ語
			'JP'   => 'mcha.jp',        //日本語
			'VN'   => 'mcha.vn',        //ベトナム語
			'EASY' => 'mcha-easy.com'); //やさしい日本語
	}
	
	function getLang(){
		
		$my_host   = getMyHostName();
		$host_list = getHostLists();
		
		return array_search($my_host,$host_list);
	}
	
	//-------------------------
	// トップページ右上広告
	//-------------------------
	function getTopAds(){
		
		$lang = getLang();
		
		switch($lang){
			case 'EN':
				print <<<ADSCODE
<!-- 《英語》 トップ右上 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="4889871838"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'KR':
				print <<<ADSCODE
<!-- 《韓国語》 トップ右上 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="7816755834"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'TW':
				print <<<ADSCODE
<!-- 《中国語 繁体字》 トップ右上 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="7677155034"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'CN':
				print <<<ADSCODE
<!-- 《中国語 簡体字》 トップ右上 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="1630621434"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'ID':
				print <<<ADSCODE
<!-- 《インドネシア語》  トップ右上 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="2570264639"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'TH':
				print <<<ADSCODE
<!-- 《タイ語》 トップ右上 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="6910573439"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'EASY':
				print <<<ADSCODE
<!-- 《やさしい日本語》 トップ右上 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="7408286639"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			default://JP
				print <<<ADSCODE
<!-- 《日本語》 トップ右上 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="3413138638"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
		}
	}
	//-------------------------
	// トップページ縦長
	//-------------------------
	function getTopLongAds(){
		
		$lang = getLang();
		
		switch($lang){
			case 'EN':
				print <<<ADSCODE

ADSCODE;
				break;
				
			case 'KR':
				print <<<ADSCODE
<!-- 《韓国語》 トップ縦長 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:120px;height:600px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="1770222236"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'TW':
				print <<<ADSCODE
<!-- 《中国語 繁体字》 トップ縦長 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:120px;height:600px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="9153888237"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'CN':
				print <<<ADSCODE
<!-- 《中国語 簡体字》 トップ縦長 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:120px;height:600px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="4584087838"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'ID':
				print <<<ADSCODE
<!-- 《インドネシア語》 トップ 縦長 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:120px;height:600px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="6721262638"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'TH':
				print <<<ADSCODE

ADSCODE;
				break;
				
			case 'EASY':
				print <<<ADSCODE
<!-- 《やさしい日本語》 トップ縦長 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:120px;height:600px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="4454820232"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			default://JP
				print <<<ADSCODE

ADSCODE;
				break;
		}
	}
	
	//-------------------------
	// 記事ページ右上
	//-------------------------
	function getPostSideTopAds(){
		
		$lang = getLang();
		
		switch($lang){
			case 'EN':
				print <<<ADSCODE
<!-- 《英語》 記事右上_336 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="5822132634"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'KR':
				print <<<ADSCODE
<!-- 《韓国語》 記事右上 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="9293489038"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'TW':
				print <<<ADSCODE
<!-- 《中国語 繁体字》 記事右上 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="4723688635"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'CN':
				print <<<ADSCODE
<!-- 《中国語 簡体字》 記事右上 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="3107354630"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'ID':
				print <<<ADSCODE
<!-- 《インドネシア語》 記事右上 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="2430663837"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'TH':
				print <<<ADSCODE
<!-- 《タイ語》 記事右上 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="8387306634"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'EASY':
				print <<<ADSCODE
<!-- 《やさしい日本語》 記事右上 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="1361753035"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'VN':
				print <<<ADSCODE
<!-- 《ベトナム語》 記事右上 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="6439537430"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			default://JP
				print <<<ADSCODE
<!-- 《日本語》 記事右上 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="8761668236"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
		}
	}
	
	//-------------------------
	// 記事ページ右下
	//-------------------------
	function getSideBtmAds(){
		
		$lang = getLang();
		
		switch($lang){
			case 'EN':
				print <<<ADSCODE
<!-- 《英語》 記事右下 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="7284935032"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'KR':
				print <<<ADSCODE
<!-- 《韓国語》 記事右下 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="2023346638"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'TW':
				print <<<ADSCODE
<!-- 《中国語 繁体字》 記事右下 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="6593147039"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'CN':
				print <<<ADSCODE
<!-- 《中国語 簡体字》 記事右下 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="2162947438"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'ID':
				print <<<ADSCODE
<!-- 《インドネシア語》 記事右下 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="9546613433"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'TH':
				print <<<ADSCODE
<!-- 《タイ語》 記事右下 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="9864039831"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'EASY':
				print <<<ADSCODE
<!-- 《やさしい日本語》 記事右下 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="9686214237"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			default://JP
				print <<<ADSCODE
<!-- 《日本語》 記事右下 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="4191867833"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
		}
	}
	
	//-------------------------
	// 記事下
	//-------------------------
	function getPostBtm(){
		
		$lang = getLang();
		
		switch($lang){
			case 'EN':
				print <<<ADSCODE
<!-- 《英語》 記事下 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="6453546237"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'KR':
				print <<<ADSCODE
<!-- 《韓国語》 記事下 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="7790678639"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'TW':
				print <<<ADSCODE
<!-- 《中国語 繁体字》 記事下 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="3360479031"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'CN':
				print <<<ADSCODE
<!-- 《中国語 簡体字》 記事下 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="7930279430"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'ID':
				print <<<ADSCODE
<!-- 《インドネシア語》 記事下 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="5486705036"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'TH':
				print <<<ADSCODE
<!-- 《タイ語》 記事下 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="6313945432"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'EASY':
				print <<<ADSCODE
<!-- 《やさしい日本語》 記事下 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="4976813032"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'VN':
				print <<<ADSCODE
<!-- 《ベトナム語》 記事下 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="9393003832"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			default://JP
				print <<<ADSCODE
<!-- 《日本語》 記事下 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="8834079836"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
		}
	}
        
        function getPostBtmMobile(){
		
		$lang = getLang();
		
		switch($lang){
			case 'EN':
				print <<<ADSCODE
<!-- 《英語mobile》タイトル下 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:320px;height:100px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="5139005035"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'KR':
				print <<<ADSCODE
<!-- 《韓国語mobile》タイトル下 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:320px;height:100px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="3522671038"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'TW':
				print <<<ADSCODE
<!-- 《中国語 繁体字mobile》タイトル下 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:320px;height:100px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="8092471437"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'CN':
				print <<<ADSCODE
<!-- 《中国語 簡体字mobile》 タイトル下 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:320px;height:100px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="6615738237"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'ID':
				print <<<ADSCODE
<!-- 《インドネシア語mobile》タイトル下 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="9569204635"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>"
ADSCODE;
				break;
				
			case 'TH':
				print <<<ADSCODE
<!-- 《タイ語mobile》タイトル下 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:320px;height:100px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="2045937830"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'EASY':
				print <<<ADSCODE
<!-- 《やさしい日本語mobile》タイトル下 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:320px;height:100px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="2185538637"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			default://JP
				print <<<ADSCODE
<!-- 《日本語mobile》タイトル下 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:320px;height:100px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="8232072232"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
		}
	}
        
        function getPostOverlayAds(){
		
		$lang = getLang();
		
		switch($lang){
			case 'EN':
				print <<<ADSCODE
<!-- 《英語mobile》オーバーレイ -->
<ins class="adsbygoogle"
     style="display:inline-block;width:320px;height:50px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="1906337035"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'KR':
				print <<<ADSCODE
<!-- 《韓国語mobile》オーバーレイ -->
<ins class="adsbygoogle"
     style="display:inline-block;width:320px;height:50px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="1766736238"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'TW':
				print <<<ADSCODE
<!-- 《中国語 繁体字mobile》オーバーレイ -->
<ins class="adsbygoogle"
     style="display:inline-block;width:320px;height:50px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="6336536636"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'CN':
				print <<<ADSCODE
<!-- 《中国語 簡体字mobile》オーバーレイ -->
<ins class="adsbygoogle"
     style="display:inline-block;width:320px;height:50px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="3383070234"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'ID':
				print <<<ADSCODE
<!-- 《インドネシア語mobile》タイトル下 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="9569204635"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>"
ADSCODE;
				break;
				
			case 'TH':
				print <<<ADSCODE
<!-- インドネシア語mobile》オーバーレイ -->
<ins class="adsbygoogle"
     style="display:inline-block;width:320px;height:50px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="7813269838"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

ADSCODE;
				break;
				
			case 'EASY':
				print <<<ADSCODE
<!-- 《やさしい日本語mobile》オーバーレイ -->
<ins class="adsbygoogle"
     style="display:inline-block;width:320px;height:50px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="9429603831"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			default://JP
				print <<<ADSCODE
<!-- 《日本語mobile》オーバーレイ -->
<ins class="adsbygoogle"
     style="display:inline-block;width:320px;height:50px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="7952870632"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
		}
	}
?>