<?php
    if(!isset($page))
        $page = 1;

    $start = ($page -1) * 10 +1;    
    $URL = "https://search.naver.com/search.naver?where=news&sm=tab_pge&query=%EC%82%BC%EC%84%B1%EC%A0%84%EC%9E%90&start=$start";

    // CURL : clientURL
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $URL);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // 요청결과를 문자열로 반환
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //원격서버의 인증서 유효성검사

    $response = curl_exec($curl);
?>
<div class="row">
    <div class="col">
        <textarea class='form-control' rows='15'><?php echo $response ?></textarea>
    </div>
</div>