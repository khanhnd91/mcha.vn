<?php //�L���֌W�̊֐����܂Ƃ߂Ă��܂� kuribayashi
//require_once('init.php'); //�ݒ�֌W
	function getMyHostName(){
		return  htmlspecialchars($_SERVER['HTTP_HOST'], ENT_QUOTES); //���݂̃z�X�g���A�O�̂��߃G�X�P�[�v
	}
	/*
	function getHostList(){
		return array(
			'EN'   => 'mcha-jp.com',    //�p��
			'KR'   => 'mcha-kr.com',    //�؍���
			'TW'   => 'mcha-tw.com',    //������ȑ�
			'CN'   => 'mcha-cn.com',    //������ɑ�
			'ID'   => 'mcha-id.com',    //�C���h�l�V�A��
			'TH'   => 'mcha-th.com',    //�^�C��
			'JP'   => 'mcha.jp',        //���{��
			'EASY' => 'mcha-easy.com'); //�₳�������{��
	}
	*/
	function getLang(){
		
		$my_host   = getMyHostName();
		$host_list = getHostList();
		
		return array_search($my_host,$host_list);
	}
	
	//-------------------------
	// �g�b�v�y�[�W�E��L��
	//-------------------------
	function getTopAds(){
		
		$lang = getLang();
		
		switch($lang){
			case 'EN':
				print <<<ADSCODE
<!-- �s�p��t �g�b�v�E�� -->
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
<!-- �s�؍���t �g�b�v�E�� -->
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
<!-- �s������ �ɑ̎��t �g�b�v�E�� -->
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
<!-- �s������ �ȑ̎��t �g�b�v�E�� -->
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
<!-- �s�C���h�l�V�A��t  �g�b�v�E�� -->
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
<!-- �s�^�C��t �g�b�v�E�� -->
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
<!-- �s�₳�������{��t �g�b�v�E�� -->
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
<!-- �s���{��t �g�b�v�E�� -->
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
	// �g�b�v�y�[�W�c��
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
<!-- �s�؍���t �g�b�v�c�� -->
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
<!-- �s������ �ɑ̎��t �g�b�v�c�� -->
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
<!-- �s������ �ȑ̎��t �g�b�v�c�� -->
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
<!-- �s�C���h�l�V�A��t �g�b�v �c�� -->
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
<!-- �s�₳�������{��t �g�b�v�c�� -->
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
	// �L���y�[�W�E��
	//-------------------------
	function getPostSideTopAds(){
		
		$lang = getLang();
		
		switch($lang){
			case 'EN':
				print <<<ADSCODE
<!-- �s�p��t �L���E�� -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="2854735433"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			case 'KR':
				print <<<ADSCODE
<!-- �s�؍���t �L���E�� -->
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
<!-- �s������ �ɑ̎��t �L���E�� -->
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
<!-- �s������ �ȑ̎��t �L���E�� -->
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
<!-- �s�C���h�l�V�A��t �L���E�� -->
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
<!-- �s�^�C��t �L���E�� -->
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
<!-- �s�₳�������{��t �L���E�� -->
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
<!-- �s�x�g�i����t �L���E�� -->
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
<!-- �s���{��t �L���E�� -->
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
	// �L���y�[�W�E��
	//-------------------------
	function getSideBtmAds(){
		
		$lang = getLang();
		
		switch($lang){
			case 'EN':
				print <<<ADSCODE
<!-- �s�p��t �L���E�� -->
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
<!-- �s�؍���t �L���E�� -->
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
<!-- �s������ �ɑ̎��t �L���E�� -->
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
<!-- �s������ �ȑ̎��t �L���E�� -->
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
<!-- �s�C���h�l�V�A��t �L���E�� -->
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
<!-- �s�^�C��t �L���E�� -->
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
<!-- �s�₳�������{��t �L���E�� -->
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
<!-- �s���{��t �L���E�� -->
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
	// �L����
	//-------------------------
	function getPostBtm(){
		
		$lang = getLang();
		
		switch($lang){
			case 'EN':
				print <<<ADSCODE
<!-- �s�p��t �L���� -->
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
<!-- �s�؍���t �L���� -->
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
<!-- �s������ �ɑ̎��t �L���� -->
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
<!-- �s������ �ȑ̎��t �L���� -->
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
<!-- �s�C���h�l�V�A��t �L���� -->
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
<!-- �s�^�C��t �L���� -->
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
<!-- �s�₳�������{��t �L���� -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-7767132976038267"
     data-ad-slot="4976813032"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
ADSCODE;
				break;
				
			default://JP
				print <<<ADSCODE
<!-- �s���{��t �L���� -->
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
<!-- �s�p��mobile�t�^�C�g���� -->
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
<!-- �s�؍���mobile�t�^�C�g���� -->
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
<!-- �s������ �ɑ̎�mobile�t�^�C�g���� -->
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
<!-- �s������ �ȑ̎�mobile�t �^�C�g���� -->
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
<!-- �s�C���h�l�V�A��mobile�t�^�C�g���� -->
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
<!-- �s�^�C��mobile�t�^�C�g���� -->
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
<!-- �s�₳�������{��mobile�t�^�C�g���� -->
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
<!-- �s���{��mobile�t�^�C�g���� -->
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
<!-- �s�p��mobile�t�I�[�o�[���C -->
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
<!-- �s�؍���mobile�t�I�[�o�[���C -->
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
<!-- �s������ �ɑ̎�mobile�t�I�[�o�[���C -->
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
<!-- �s������ �ȑ̎�mobile�t�I�[�o�[���C -->
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
<!-- �s�C���h�l�V�A��mobile�t�^�C�g���� -->
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
<!-- �C���h�l�V�A��mobile�t�I�[�o�[���C -->
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
<!-- �s�₳�������{��mobile�t�I�[�o�[���C -->
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
<!-- �s���{��mobile�t�I�[�o�[���C -->
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