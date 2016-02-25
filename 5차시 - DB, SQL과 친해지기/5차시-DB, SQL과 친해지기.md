# DB, SQL과 친해지기
> 이제 진짜 웹을 해봅니다.
> 회원가입하고, 글을 쓰고 하는거죠.
> 프레임워크 사용법을 익혀봅니다.

[TOC]

## 데이터 전송방식
웹에서의 전송방식은 크게 `POST`와 `GET` 두 가지가 있다.

### GET
> `GET`은 많이들 봤을 것이다.

`GET`은 짧은 데이터를 빠르게 보내고자 할때, 보안할 필요 없는 정보일때 `GET` 방식을 사용한다.

### POST
> `POST`는 웹개발자가 아니라면 보지 못했을 것이다.

`POST`는 큰 데이터를 안전하게 보내고자 할때, 보안이 필요한 정보를 보낼때 `POST` 방식을 사용한다.
`POST`의 예는 수업에서 실습을 통해 직접 다루어보도록하겠다.

## DB연동하기(프레임워크 사용 X)
### DB란?
`DB`란 `Data Base`의 약자로 데이터를 모아두는 곳을 말한다.

### 준비과정
PHP에서 DB의 정보를 사용하려면 몇가지 준비가 필요하다.
아래의 코드를 봐보자.
```php
// mysql 접속 계정 정보
$host = 'localhost'; // 보통 그대로 둔다
$user = 'user_name'; // 사용자의 이름, 아이디를 적어준다
$password = 'password'; // 사용자의 비밀번호를 적어준다
$db = 'database'; // 사용할 DB 명을 적어준다

// 접속
$conn = mysql_connect($mysql_host, $mysql_user, $mysql_password);
$dbconn = mysql_select_db($mysql_db, $conn);

// charset 설정, 설정하지 않으면 기본 mysql 설정으로 됨, 대체적으로 euc-kr를 많이 사용
mysql_query("set names utf8"); // charset UTF8
```

아래의 예제들은 모두 위의 코드가 작성되어 있는 것을 전제로하여 진행된다.

### SELECT문
> 데이터를 가져온다

SELECT DB에서 데이터를 선택하여 가져온다.

```php
//쿼리, news 라는 테이블이 존재, id, title, content 필드가 존재할 경우
$query = "SELECT `id`, `title`, `content` FROM `news`";
```

### INSERT문
> 데이터를 넣는다.

INSERT 말그대로 DB에 데이터를 넣어준다.

```php
$query = "INSERT INTO `news`(`id`, `title`, `content`) VALUES ("dexterastin", "hello db!!", "wow!")";
```

### UPDATE문
> 데이터를 바꿔준다.

UPDATE 말그대로 기존에 DB에 있던 데이터를 다른 데이터로 업데이트 해준다.

```php
//쿼리, news 라는 테이블이 존재, id, title, content 필드가 존재할 경우
$query = "UPDATE SET `content`="nono~" WHERE `id`='dexterastin'";
```

위에서 `SELECT`로 불러온 데이터는 `var_dump`로 확인할 것이다.
자세한 사용법은 아래에서 다루도록하겠다.

## Medoo 프레임워크 사용하기
> 프레임워크란
> **재사용할 수 있는 수많은 코드를 프레임워크로 통합함으로써 개발자가 새로운 애플리케이션을 위한 표준 코드를 다시 작성하지 않아도 같이 사용된다.**
> 라고 위키 백과가 말했다.

>한마디로 지금까지 우리가 `모종삽`으로 삽질을 했다면 `프레임워크`는 그 작업을 `모터달린 포크레인`으로 한다고고 비유 할 수 있겠다.

### Medoo프레임워크란?
앞으로 수업에서 사용하게 될 프레임워크는 Medoo라는 PHP datebase 프레임워크다.

### 설정
1. medoo.min.php파일을 수정해야한다.
```php
// ... 부분을 자신의 DB정보와 맞게 수정한다.
protected $database_type = "...";
protected $charset = "...";
protected $database_name = "...";
protected $server = "localhost";
protected $username = "...";
protected $password = "...";
protected $database_file;
protected $socket;
```

2. 프레임워크를 사용하기 위해서는 require을 사용하여 파일을 불러주어야한다.
```php
require 'medoo.min.php';
```

3. Medoo 객체를 하나 생성해주자.
```php
$database = new medoo();
```

모든 준비가 끝났다. 이제 `INSERT`, `UPDATE`, `SELECT`를 실습해보자.

### SELECT문

```php
$datas = $database -> select("user", ["id"=>"gihyun", "password"="secret"]);
```

위의 코드를 분석해보자.
1. SELECT문을 사용할 것이다.
2. user 테이블에서 값을 가져올것이다.
3. id가 gihyun, password가 secret인 데이터를 가져올것이다.
4. 가져온 데이터를 $datas 변수에 담는다.

변수에 담긴 값은 배열이다.
배열을 사용하는 것처럼 [index]로 사용할수도 있지만 더 효율적인 방법을 배워보자

```php
foreach ($datas as $data) {
	ehco "id:" . $data["id"]. " | password:" . $data["password"] . "<br/>";
}
```
`foreach`문은 배열에 있는 값 전부를 출력해준다.
위에서 저번에 배운 `key`, `value`로 매칭된 배열이 사용되었다.

그냥 특정 index의 값을 다루고 싶다면

```php
echo $datas[0]['name'];
```
이렇게 접근하면 된다.

### INSERT문

```php
$database -> insert("user", ["id"=>"yang", "password"=>"hello"]);
```
위의 코드를 분석해보자.
1. INSERT문을 사용할 것이다.
2. user 테이블에 값을 넣을 것이다.
3. id은 yang, password는 hello로 넣은것이다.

### UPDATE문

```php
$database -> update("user", ["name"=>"gihyun yang"], ["id"=>"yang"]);
```
위의 코드를 분석해보자.
1. UPDATE문을 사용할 것이다.
2. user에 있는 값을 바꿀 것이다.
3. id가 yang인 것의 name을 gihyun yang으로 바꿀것이다.

위에서 배운것에 비해 매우 직관적이다.

> 질문은 dexterastin@gmail.com 로 해주세요.
Copyright(c)2016 Gihyun Yang. All rights reserved
위 교육자료는 `설리번프로젝트`의 `작심10시간-나만의 웹서비스만들기`에서 사용하는 교육자료입니다.