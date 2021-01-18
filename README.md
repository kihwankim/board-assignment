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
<img width="1439" alt="board" src="https://user-images.githubusercontent.com/19687080/104897549-d9a29780-59bb-11eb-8ff0-08a1360c629c.png">


### 게시판 정보
<img width="1422" alt="boad view" src="https://user-images.githubusercontent.com/19687080/104897511-cdb6d580-59bb-11eb-89a2-5630d5d90466.png">

### 게시판 데이터 생성 페이지
<img width="1433" alt="add page" src="https://user-images.githubusercontent.com/19687080/104897384-a6600880-59bb-11eb-9874-c1cbdfc19f19.png">


### 게시판 수정
<img width="1417" alt="edit" src="https://user-images.githubusercontent.com/19687080/104897438-b7107e80-59bb-11eb-96c5-acf58531ce7e.png">


### 게시판 삭제
<img width="1421" alt="check before delete" src="https://user-images.githubusercontent.com/19687080/104897300-90eade80-59bb-11eb-8397-d4491f994c4b.png">

### 게시판 input data validate검사
<img width="1440" alt="error for exceed data len" src="https://user-images.githubusercontent.com/19687080/104897762-1c646f80-59bc-11eb-8072-d1a380b5fc50.png">


### database 구조
```sql
    CREATE TABLE board(
	id INT PRIMARY KEY AUTO_INCREMENT,
    writer VARCHAR(30),
    title varchar(45),
    description TEXT(1000),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    updated_at DATETIME
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