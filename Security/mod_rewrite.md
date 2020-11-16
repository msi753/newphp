> 아파치 내장 모듈

    서버 request를 정해진 rule에 의해서 다른 url 또는 file로 보내는 모듈
    URL 라우팅(routing) 기능

> 설정 범위
+ httpd.conf 전역     RewriteEngine On|Off

+ virtual host 영역

+ directory 영역

+ .htaccess 영역 등...

> 예시
```
# newphp.co.kr 에서 newphp.or.kr으로
RewriteCond %{HTTP_HOST} newphp.co.kr
RewriteRule ^(.*)$http://www.newphp.or.kr%{REQUEST_URI} {L,R=301}
```
```
#https에서 http로
RewriteCond %{HTTP:X-Forwarded-Proto} = https
RewriteRule ^(.*)$http://%{HTTP_HOST}%{REQUEST_URI} {L,R=301}

RewriteCond %{REQUEST_URI} ^/secure_page/
RewriteCond %{HTTPS} !on
RewriteRule ^(.*)$ https://%{HTTP_HOST}$1 [R,L]
```

> Clean URL

    http://www.example.com/Blog/Posts.php?Year=2006&Month=12&Day=19  과 같이 복잡한 URL 을 http://www.example.com/Blog/2006/12/19/  처럼 깔끔한 URL 로 재작성하는 기능이다.

    짧은 URL 은 사용자 친화적이라 기억하기도 쉽고 RESTFul 웹서비스를 제공하기에도 용이하다.

> 웹사이트 재배치
    최상위 URL 이 변경(old.example.com 에서 new.example.com)되었고 사이트의 구성도 새로 만들었지만 검색 엔진에 등록되거나 외부에서 링크된 기존의 URL 도 잃고 싶지 않을수 있다.

    먼저 기존 URL 에 있는 HTML 마다 새로운 URL 에 대한 링크를 다음과 같이 추가할 수 있다.

    <meta http-equiv="refresh" content="0; url=http://new.example.com/" />

> 간단한 URL 에 대한 전환이 필요할 경우 굳이 복잡한 mod_rewrite 대신 Redirect 지시자를 사용하는 게 좋다. 사이트를 개편하여 메인의 html 호출을 전환해야 한다면 다음과 같이 설정할 수 있다. 

    Redirect /index.html http://www.example.com/index.jsp

> 엔진과 로깅

    RewriteLog logs/rewrite.log
    RewriteLogLevel 9

참고:https://www.lesstif.com/linux-infra-book/mod_rewrite-url-18219493.html