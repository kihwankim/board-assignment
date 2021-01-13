# 첫 번째 인턴 과제(게시판)

## FrontEnd : Vue.js

## BackEnd : CodeIgniter4.0.4(PHP Framework)

## 페이지 구성도
* 메인 페이지(전체 게시판)
* 등록 게시물 열람 페이지
* 수정 및 생성 페이지

## 기능 요구사항
* 생성
* 삭제
* 수정

## 테이블 필수 항목
* ID(int)
* 작성자(varchar)
* 제목(varchar)
* 내용(text)
* 등록 시간(datetime)
* 업데이트시간(datetime)

## 화면 구성도

### 메인화면
<img width="1440" alt="main페이지" src="https://user-images.githubusercontent.com/19687080/104142379-acc01480-53fe-11eb-894c-5271ee50a453.png">

### 게시판 정보
<img width="1439" alt="board_detail" src="https://user-images.githubusercontent.com/19687080/104142372-a6ca3380-53fe-11eb-9d66-74ef29c2dabc.png">

### 게시판 데이터 생성 페이지
<img width="1440" alt="create-page" src="https://user-images.githubusercontent.com/19687080/104142377-ab8ee780-53fe-11eb-9925-aa6f45165595.png">

### 게시판 수정
<img width="1436" alt="create page-write" src="https://user-images.githubusercontent.com/19687080/104142376-aa5dba80-53fe-11eb-8bd7-469cdb754747.png">

### database 구조
```sql
    CREATE TABLE board(
	id INT PRIMARY KEY auto_increment,
    writer VARCHAR(30),
    description TEXT(1000),
    create_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    update_at DATETIME
);

insert into board(id, title, writer, description)  
    values(1, 'title1', 'abc', "hello this is first data"),
            (2, 'title2', 'bdc', "hello this is second data"),
            (3, 'title3', 'efg', "hello this is third data"),
            (4, 'title4', 'afda', "hello this is fourth data"),
            (5, 'title5', 'afd', "hello this is"),
            (6, 'title6', 'fdsf', "hello this is this is"),
            (7, 'title7', 'vdsv', "hello this is  hola !!!"),
            (8, 'title8', '13', "there are a lot of data"),
            (9, 'title9', 'fd', "this is second data"),
            (10, 'title10', 'fadf', "this is next data"),
            (11, 'title11', 'fdasf', "this is test data");
```