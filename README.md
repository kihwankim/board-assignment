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
* 비밀번호 검증

## 테이블 필수 항목
* ID(int)
* 작성자(varchar)
* 제목(varchar)
* 내용(text)
* 등록 시간(datetime)
* 업데이트시간(datetime)
* 패스워드(varchar)

## 화면 구성도

### 메인화면
<img width="1440" alt="board main page" src="https://user-images.githubusercontent.com/19687080/105117198-7164ca80-5b0f-11eb-983b-8056aede63f8.png">

### 게시판 정보
<img width="1422" alt="boad view" src="https://user-images.githubusercontent.com/19687080/104897511-cdb6d580-59bb-11eb-89a2-5630d5d90466.png">

### 게시판 데이터 생성 페이지
<img width="1438" alt="create" src="https://user-images.githubusercontent.com/19687080/105117161-5e51fa80-5b0f-11eb-8cd1-de069559b070.png">

### 게시판 수정
<img width="1440" alt="boardedit" src="https://user-images.githubusercontent.com/19687080/105117353-b12bb200-5b0f-11eb-8c9e-fc7405bcd286.png">

### 게시판 삭제
<img width="1423" alt="delete" src="https://user-images.githubusercontent.com/19687080/105117234-82154080-5b0f-11eb-8bdd-5620f79851e7.png">

### 게시판 input data validate검사
<img width="1439" alt="wrong data input" src="https://user-images.githubusercontent.com/19687080/105117277-92c5b680-5b0f-11eb-9ab4-9dfb4e97c46b.png">

### edit 페이지 비밀번호 검증 실패
<img width="1438" alt="password wrong" src="https://user-images.githubusercontent.com/19687080/105117417-c7d20900-5b0f-11eb-87d2-b6c0b7633b7f.png">

### database 구조
```sql
CREATE TABLE board(
	id INT PRIMARY KEY auto_increment,
    writer VARCHAR(30),
    title varchar(45),
    pw varchar(70),
    description TEXT(1000),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    updated_at datetime on update CURRENT_TIMESTAMP
);


insert into board(id, title, writer, description, pw)  
    values(1, 'title1', 'abc', "hello this is first data", '$2y$10$9yhVOO.cCYzxA3lvpnvxweqb1O3d1N8qQXo8ReEwRHd8cFpRIW4oW'),
            (2, 'title2', 'bdc', "hello this is second data", '$2y$10$9yhVOO.cCYzxA3lvpnvxweqb1O3d1N8qQXo8ReEwRHd8cFpRIW4oW'),
            (3, 'title3', 'efg', "hello this is third data", '$2y$10$9yhVOO.cCYzxA3lvpnvxweqb1O3d1N8qQXo8ReEwRHd8cFpRIW4oW'),
            (4, 'title4', 'afda', "hello this is fourth data", '$2y$10$9yhVOO.cCYzxA3lvpnvxweqb1O3d1N8qQXo8ReEwRHd8cFpRIW4oW'),
            (5, 'title5', 'afd', "hello this is", '$2y$10$9yhVOO.cCYzxA3lvpnvxweqb1O3d1N8qQXo8ReEwRHd8cFpRIW4oW'),
            (6, 'title6', 'fdsf', "hello this is this is", '$2y$10$9yhVOO.cCYzxA3lvpnvxweqb1O3d1N8qQXo8ReEwRHd8cFpRIW4oW'),
            (7, 'title7', 'vdsv', "hello this is  hola !!!", '$2y$10$9yhVOO.cCYzxA3lvpnvxweqb1O3d1N8qQXo8ReEwRHd8cFpRIW4oW'),
            (8, 'title8', '13', "there are a lot of data", '$2y$10$9yhVOO.cCYzxA3lvpnvxweqb1O3d1N8qQXo8ReEwRHd8cFpRIW4oW'),
            (9, 'title9', 'fd', "this is second data", '$2y$10$9yhVOO.cCYzxA3lvpnvxweqb1O3d1N8qQXo8ReEwRHd8cFpRIW4oW'),
            (10, 'title10', 'fadf', "this is next data", '$2y$10$9yhVOO.cCYzxA3lvpnvxweqb1O3d1N8qQXo8ReEwRHd8cFpRIW4oW'),
            (11, 'title11', 'fdasf', "this is test data", '$2y$10$9yhVOO.cCYzxA3lvpnvxweqb1O3d1N8qQXo8ReEwRHd8cFpRIW4oW');
        
```
