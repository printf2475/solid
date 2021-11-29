<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
        <title>Solid</title>
	<link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/solid/FTXcss/FTXmain.css">
	<link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/solid/FTXcss/FTXfooter.css">
	<link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/solid/FTXcss/FTXheader.css">
	<link rel="stylesheet" type="text/css" href="./css/notice.css">
	</head>

	<body>
		<header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/solid/header.php"; ?>
		</header>
        <?php
            if (!$userid) {
                echo("<script>
				alert('로그인 후 이용해주세요!');
				history.go(-1);
				</script>
			");
                exit;
            }
        ?>
		<section>
			<div id="board_box">
				<br><br><br>
				<h3 id="board_title">
					문의게시판 > 글 쓰기
				</h3>
				<form name="board_form" method="post"
				      action="dmi_question.php?mode=insert&id=<?= $userid ?>&name=<?= $username ?>"
				      enctype="multipart/form-data">
					<ul id="board_form">
						<!-- <li>
							<span class="col1">작성자 : </span>
							<span class="col2"><?= $userid ?></span>
						</li> -->
						<li id="read_pw">
							<span class="col1">비밀번호 : </span>
							<span class="col2"><input autocomplete="off" type="password" name="read_pw"></span>
						</li>
						<li id="read_subject">
							<span class="col1">제목 : </span>
							<span class="col2"><input autocomplete="off" name="subject" type="text"></span>
						</li>
						<li id="text_area">
							<span class="col1">내용 : </span>
							<span class="col2">
							<textarea name="content"></textarea>
						</span>
						</li>
						<li>
							<span class="col1"> 첨부 파일</span>
							<span class="col2"><input type="file" name="upfile"></span>
						</li>
					</ul>
					<ul class="buttons">
						<li>
							<button type="button" onclick="location.href='file_upload.php'">완료</button>
						</li>
						<li>
							<button type="button" onclick="location.href='question_list.php'">목록</button>
						</li>
					</ul>
				</form>
			</div> <!-- board_box -->
		</section>
		<footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/solid/footer.php"; ?>
		</footer>
	</body>

</html>