<?php
	session_start();
  include $_SERVER['DOCUMENT_ROOT'] . "/solid/db/db_connector.php";

  	//1. 현재페이지가 없다면 1페이지로 셋팅
    $page = isset($_GET["page"]) ? $_GET["page"] : 1;

    //2. 전체 레코드 수
    $sql = "select * from question order by num desc";
    $select_result = mysqli_query($con, $sql);
    $total_record = mysqli_num_rows($select_result);

    //3. 페이지당 글 수 를 넣는다.
    $scale = 5;

    //4. 전체 페이지 수 ($total_page) 계산
    $total_page=($total_record !== 0) ? ceil($total_record / $scale) : 0;

    //4-1. 표시할 페이지($page)에 따라 $start 계산
    $start = ($page - 1) * $scale;

    //5. 현재 페이지 레코드 결과값을 저장하기위해서 배열선언
    $list = array();

    //6. 해당되는 페이지 레코드를 가져와서 배열에 넣고 회원번호 포함
    $sql = "select * from question order by num asc LIMIT {$start}, {$scale}";
    $select_result = mysqli_query($con, $sql);

    for ($i=0; $row=mysqli_fetch_assoc($select_result); $i++){
      $list[$i] = $row;
      //회원번호
      $list_num = $total_record - ($page - 1) * $scale;
      $list[$i]['no'] = $list_num - $i;
    }
    mysqli_close($con);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Solid</title>
  <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/solid/Solid Css/SOLIDmain.css?.afkqwesadkkster">
  <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/solid/Solid Css/SOLIDfooter.css?.aqwessadd">
  <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/solid/Solid Css/SOLIDheader.css?.5ssaassasasa12sdda">
  <link rel="stylesheet" type="text/css" href="./css/question.css">
</head>

<body>
  <header>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/solid/header.php"; ?>
  </header>

  <section>
    <div id="board_box">
      <br><br><br>
      <h3>
        문의게시판 > 목록
      </h3>
      <!-- 에러메세지 출력 -->
      <?php if(isset($_GET['error'])){?>
      <div id="check" style="color:red">
        <?= $_GET['error']; ?>
      </div>
      <?php } ?>

      <!-- 성공메세지 출력 -->
      <?php if(isset($_GET['success'])){?>
      <div id="check" style="color:blue">
        <?= $_GET['success']; ?>
      </div>
      <?php } ?>
      <ul id="board_list">
        <li>
          <span class="col1">번호</span>
          <span class="col2">제목</span>
          <span class="col3">글쓴이</span>
          <span class="col4">첨부</span>
          <span class="col5">등록일</span>
          <span class="col6">조회</span>
        </li>
        <?php 
				

					for($i=0; $i<count($list); $i++){
				?>
        <li>
          <span class="col1"><?= $i+1 ?></span>
          <span class="col2_1"><a
              href="question_view.php?num=<?= $list[$i]['num'] ?>"><?= $list[$i]['subject'] ?></a></span>
          <span class="col3"><?= $list[$i]['name'] ?></span>
          <span class="col5"><?= $list[$i]['regist_day'] ?></span>
          <span class="col6"><?= $list[$i]['hit'] ?></span>
        </li>
        <?php } ?>
      </ul>
      <?php
				//===========================================================
				//7. 현재 페이지 처리 함수
				$url = "./question_list.php?page=";
				$write_page = get_paging($scale, $page, $total_page, $url);
				//===========================================================
				//데이터베이스 접속 종료
			
			?>
      <!-- page  -->
      <ul id="page_num">
        <li><?= $write_page ?></li>
      </ul>
      <ul class="buttons">
        <?php
				//회원일 경우에만 목록과 글쓰기 버튼을 사용할 수 있다.
				if(!$userid){
			?>
        <li><button onclick="location.href='question_list.php'">목록</button></li>
        <?php
				}else{
					?>
        <li><button onclick="location.href='question_list.php'">목록</button></li>
        <li><button type="button" onclick="location.href='question_form.php'">글쓰기</button></li>
        <?php
				}
			?>
      </ul>
    </div> <!-- board_box -->
  </section>
  <footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/solid/footer.php";?>
  </footer>
  </div>
</body>

</html>