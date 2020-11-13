<?php
/**
 * file upload
 * 
 * php.ini
 * file_uploads = Off           파일 업로드 On/ Off
 * upload_max_filesize = 2M     파일 사이즈 가장 크게
 * max_file_uploads = 20        업로드 가능한 파일 개수
 */
switch($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        echo <<<'HTML'
<form action="/" method="POST" enctype="multipart/form-data">
    <input type="file" name="uploads">
    <input type="submit">
</form>      
HTML;
        break;
    case 'POST':
        $file = $_FILES['uploads'];
        $pathinfo = pathinfo($file['name']);
        $accepts = [
            'png', 'jpg'
        ];
        //php는 업로드 전에 임시파일을 생성함
        if(in_array(strtolower($pathinfo['extension']), $accepts) && is_uploaded_file($file['tmp_name'])) { //확장자 검사, tmp파일 생성 여부 확인
            move_uploaded_file($file['tmp_name'], dirname(__FILE__).'/uploads/'.$file['name']);
        }
        break;
    default:
        http_response_code(404);
}



/**
 * File Downloads
 * 
 * php.ini
 * allow_url_fopen, allow_url_include
 */

//$path = filter_input(INPUT_GET, 'path', FILTER_SANITIZE_STRING);
$path = './MIME.md';
$filepath = realpath(dirname(__DIR__).'/security/'.basename($path));   //dirname(__DIR__)는 D:\myeongsim\newphp
echo $filepath;
if(file_exists($filepath)) {
    $pathinfo = pathinfo($filepath);
    $accepts = [
        'md'
    ];
    if(in_array(strtolower($pathinfo['extension']), $accepts)) {
        header('Content-type: application/octet-stream');                       //이진 파일을 위한 기본값 (MIME 기본타입 중 하나)
        header('Content-Disposition: attachment; filename='.basename($path));   //모든 확장자의 파일들에 대해 다운로드 시 무조건 파일 다운로드 대화상자가 뜨도록 하는 헤더속성.
        header('Content-Transfer-Encoding: binary');                            //전송 데이터의 body를 인코딩한 방법
        header('Content-Length' .filesize($path));
    }
}
readfile($path);



/**
 * php.ini
 * allow_url_fopen  url으로 파일을 오픈하느냐 마느냐
 * allow_url_include 다른 서버에 있는 파일을 읽을 수 있어서 Off를 많이 해둔다
 */
