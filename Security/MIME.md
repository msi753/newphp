# MIME 이란?

Multipurpose Internet Mail Extensions의 약자로 '파일 변환'을 뜻함

이메일과 함께 동봉할 파일을 텍스트 문자로 전환해서 전달하기 위해 개발됨

ASCII표준에 따라 UUEncode방식을 사용했으나, BINARY 파일들을 전송해야 하는 문제가 발생하면서 사용됨

```
바이너리파일 --인코딩--> 텍스트파일
            <--디코딩--
```

MIME으로 인코딩한 파일은 Content-type 정보를 파일의 앞부분에 담게된다.(바이트의 스트림을 보낸다)

> 다양한 타입 중 일부 예시
+ Multipart Related MIME타입

    Content-Type: Multipart/related (기본형태)

+ Application 타입

    Content-Type: x-www-form-urlencode (폼 형태, 대용량 바이너리 데이터에 적합)

    Content-Type: multipart/formed-data (폼 형태, 대부분 사용)