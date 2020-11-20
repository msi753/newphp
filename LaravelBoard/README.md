```
├-app
│  ├─auth
│  ├─contoroller
│  ├─image
│  ├─lib
│  ├─middlewares
│  └─providers
|
├─bootstrap
│       app.php     DB연결 및 해제, 세션 시작, cache 디렉토리
|
├─config
│   database.php
│   error.php
│   session.php
|
├─public
│   app.css
│   app.js
│   index.php   도큐먼트 루트   require_once dirname(__DIR__).'/bootstrap/app.php'; request-요청들에 대한 진입점 역할과 오토로딩을 설정
|
├─resources 뷰
│  └─views
│       └─layouts
│           app.php
|
├─routes    세션 상태, CSRF 보호, 쿠키 암호화 기능
│   web.php 
|
├─storage   이미지파일 로그 세션 저장
│  └─app
│     └─images
│  ├─logs
│  └─sessions
|
| README.md

```


웹서버apache에서 요청이 오면 public/index.php에 전달
오토로더 정의해서 bootstrap/app.php에서 서비스 컨테이너에서 인스턴스를 생성해서 response를 반환한다.

커널 부팅(부트스트래핑)과정에서 중요한 것은 서비스 프로바이더를 로딩하는 것이다.
서비스 프로바이더는 프레임워크의 데이터베이스, 큐, validation, 라우팅 컴포넌트와 같은 다양한 컴포넌트의 부트스트래핑(부팅과 같은 기초 작업들)의 처리를 책임집니다.

app/Providers 서비스 프로바이더가 등록된 후 부트스트래핑 과정을 마친 Request는 라우터 처리를 위해서 전달될 것입니다. 라우터는 라우팅 또는 컨트롤러로 요청-request을 전달할뿐만 아니라, 임의의 특정 라우트에 지정된 미들웨어도 실행합니다.

HTTP커널은 요청 처리 전에 middlewares를 거치는데, auth, csrf등을 체크한다.

요약하자면,
애플리케이션의 인스턴스가 생성되고, 서비스 프로바이더가 등록된후 부트스트래핑 과정을 마친 프로그램이 요청을 처리합니다. 매우 간단합니다!

요청(public/index.php) -> 부트스트래핑(bootstrap/app.php) -> 프로바이더(app/providers) -> 라우트(routes/web.php) -> 미들웨어(app/middlewares) -> 응답

